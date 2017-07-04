<?php
namespace Admin\Controller;
use Common\Controller\AdminbaseController;
class HomeController extends AdminbaseController {

    protected $building_model,$home_model;

    public function _initialize() {
        parent::_initialize();
        $this->building_model = D("Common/Building");
        $this->home_model = D("Common/Home");
    }

    public function index() {
        //查找选项1为精确查找 2为模糊查找
    $find = I('request.find');
		$building_num = I('request._num');
		$unit = I('request.unit');
		$num = I('request.num');
		
        $homeType = I('request.homeType');
        $isDel = I("request.isDel");
        if ( $isDel ) {
           $isDel = I("request.isDel");
        } else {
            $isDel = 0;
        }
        if ( $find == 1) {
             if($building_num){
            $where['b.num'] = array('EQ',$building_num);
            }
            if($unit){
                $where['a.unit'] = array('EQ',$unit);
            }
            if($num){
                $where['a.num'] = array('EQ',$num);
            }
        }else{
            if($building_num){
            $where['b.num'] = array('like','%'.$building_num."%");
            }
            if($unit){
                $where['a.unit'] = array('like','%'.$unit."%");
            }
            if($num){
                $where['a.num'] = array('like','%'.$num."%");
            }
        }
		
		$where['is_del'] = array('EQ',$isDel);

        if ( $homeType == 2 ) {
            $where['home_type'] = array("EQ",$homeType);
        }else{
            $where['home_type'] =array("EQ",$homeType);
        }

		$count = $this->home_model->join('a left join wldk_building b on a.building_id = b.id')->where($where)->count();
		$page = $this->page($count, 12);
        $homes = $this->home_model->field('a.*,b.num as building_num')->join('a left join wldk_building b on a.building_id = b.id')->where($where)->order("a.id desc")->limit($page->firstRow, $page->listRows)->select();
       
        $att = $this->flag($homeType);
        foreach ($homes as  $k => $v) {
        			$flag= explode(",", $v['flag']);
        			
        			for ($i=0; $i <count($att) ; $i++) { 
        				if ( in_array( $att[$i]['id'] ,$flag, true) ) {
        					$array[$i][va] = 1;
        					$array[$i][attid] = $att[$i][id];
        					$array[$i][value] = $att[$i][value];
        					

        				}else {
        					$array[$i][va] = 0;
        					$array[$i][attid] = $att[$i][id];
        					$array[$i][value] = $att[$i][value];
        					
        				}
        			}
        			$homes[$k]['flag'] = $array;
        	}

        $this->assign('homeType',$homeType);
        $this->assign('isDel',$isDel);
       	$this->assign('att',$att);
		$this->assign("page", $page->show('Admin'));
		$this->assign("homes",$homes);
        $this->display();
    }

    //多选
    public function lookup_flag($attId,$att,$type = false){
    	

    	
    		if( $type ) {
    		  for ($i=0; $i <count($att) ; $i++) { 
               
        		//attId 下标为0指向 id,下标为1指向多选的值
        		 if ( $att[$i][id] == $attId[0]){
        		 	$arr = $att[$i];
        		 	//分割选项
        		 	$option = explode(',',$arr[value]);
        		 	$att[$i]['value'] = $option[$attId[1]];
        		 	return $att[$i];
        		 	
        			 }	
        		} 
   		 }else {
                  for ($i=0; $i <count($att) ; $i++) { 
                        
                        if (  $att[$i][id] == $attId[0]) {
                            $arr[] = $att[$i];
                            $arr['ty'] = 1;
                         
                        }else{
                            $arr[] = $att[$i];
                            $arr['ty'] = 0;
                        }
                    
                  }

                  return $arr;
                }
        


    }

    //查询所有单选标签
    public function flag($homeType)
    {
    	$db = M('att');
        $map['type']  = $homeType;
    	return $db->where(array($map))->order('id')->select();
    	
    }
    public function add() {
        $where['is-del'] = array('EQ',0);
		$buildings = $this->building_model->where($where)->order('num desc,id desc')->select();
        $type = I('get.type');
          if ($type == '1') {
                $type = '2';
          }else {
                $type = 1;
          }
        $map = array(
                "type" =>$type,
            );
		$attdb = M('att');
        $att =  $attdb->where($map)->order('id')->select();
        $this->assign("type",$type);
		$this->assign("att",$att);		
		$this->assign('buildings',$buildings);
    	$this->display();
    }
    
    public function add_post() {
         if ( I('post.num') == "" ) {
            $this->error('房间号不能为空');
        };
        $flag = implode(',',I('post.flag'));
    	$data = array(
    			"building_id" => I('post.building_id'),
    			"unit" => I('post.unit'),
    			"floor" => I('post.floor'),
    			"num" => I('post.num'),
    			"flag" => $flag,
    			"suoxin" => I('post.suoxin'),
                "home_type" => I('post.homeType'),
                'type' => I('post.type'),
    		);
    	
    	$db = M('home');
    	$res = $db->add($data);
    	if ( $res ) {
    		$this->success("添加成功！", U('Home/index',array('homeType'=>'1')));
    	}else{
    		$this->error("添加失败！");
    	}
    
    }

    public function edit() {
        $where['is-del'] = array('EQ',0);
		$buildings = $this->building_model->where($where)->order('num desc,id desc')->select();
		$this->assign('buildings',$buildings);
		
        $id = I("get.id",0,'intval');
        $rs = $this->home_model->where(array("id" => $id))->find();
      
        // $homeType = $rs['home_type']; //获取是个人房 还是单位房
        
        if (I('get.homeType')) {
               $homeType = I('homeType');
        }else {
              $homeType = $rs['home_type'];
        }
       
        //住户当前特征
        $flag = explode(',', $rs['flag']);


       	$att = $this->flag($homeType);

       	for ($i=0; $i <count($att) ; $i++) { 
       		if( in_array($att[$i]['id'],$flag,true) ) {
       			$att[$i]['check'] = 1;
       		}else {
       			$att[$i]['check'] = 0;
       		}
       	}
        
        $this->assign('type',$homeType);
        $this->assign("att",$att);
        $this->assign("data", $rs);
        $this->display();
    }
    
    public function edit_post() {
    	$id = I("post.id");
    	$flag = I("post.flag");
        $flag = implode(",",$flag);
    	$homeType = I('post.homeType');
    	$data = array(
    			"building_id" => I('post.building_id'),
    			"unit" => I('post.unit'),
    			"floor" => I('post.floor'),
    			"num" => I('post.num'),
    			"flag" => $flag,
    			"suoxin" => I('post.suoxin'),
                'type' => I('post.type'),
                "home_type" => $homeType,
    		);
    	
    	$db = M('home');
    	$res = $db->where(array("id"=>$id))->save($data);
        
    	if ( $res ) {
    		$this->success("更新成功！",U("Home/index",array("homeType"=>$homeType)));
    	}else {
    		$this->error("更新失败！");
    	}
    
    }

	public function delete(){

		if(isset($_GET['id'])){
			$id = I("get.id",0,'intval');
    		$homeRes = $this->home_model->where(array('id'=>$id))->save(array("is_del" => "1")); 
				if ($homeRes) {
                    $resdb = M('resident');
                    $resArray['del'] = 1;
                    $resWhere['home_id'] = array('EQ',$id); 
                    $resRes =   $resdb->where($resWhere)->save($resArray);
                    if ($resRes) {
                        $this->success('删除成功',U('home/index',array('homeType' =>'1')));
                    }else{
                          $this->success('删除成功',U('home/index',array('homeType' =>'1')));
                    }
                }else{
                    $this->error('删除住户信息失败',U('home/index',array('homeType' =>'1')));
                }
          
		}
		
		if(isset($_POST['ids'])){
			$ids = I('post.ids/a');
			 
			$homeRes = $this->home_model->where(array('id'=>array('in',$ids)))->save(array("is_del" => 1));
         
            if ($homeRes) {
                  $resStr = implode(',',$ids);
                  $resArray['del'] = 1;
                  $resWhere['home_id'] = array('IN',$resStr);
                  $resdb = M('resident');
                  $resRes =  $resdb->where($resWhere)->save($resArray);
                  if ( $resRes ){
                      $this->success('删除成功',U('home/index',array('homeType' =>'1')));
                  }else{
                  
                       $this->error('删除住户信息成功,删除人员信息失败',U('home/index',array('homeType' =>'1')));
                  }
                    
            }else {
                $this->error('删除住户信息失败',U('home/index',array('homeType' =>'1')));
            }
				
		}
	}

	public function other(){
        if(IS_AJAX){
            $val = I('get.val'); //获取参数
            $array = explode('-',$val);
            $id = $array[0]; 
            $attId = $array[1];
            $va = I('get.va'); //1为是0为否
            $db = M('home');
            $flag = $db->field('flag')->where("id = $id")->find();
            if ($va == "1") {
               $newFalge = explode(',',$flag['flag']);
                foreach ($newFalge as $key => $value) {
                    if ( $newFalge[$key] == $attId ){
                        unset($newFalge[$key]);
                    }
                }
                $newFalge = implode(',', $newFalge);
            }else{
                $newFalge = $flag['flag'].",".$attId;
                
            }
             $data = array(
                    'flag' => $newFalge,
                );
            $res = $db->where(array('id' => $id))->save($data);
            if ($res) {
                $this->ajaxReturn(true);
            }else{
              $this->ajaxReturn(false);
            }
        
        }
		// if(isset($_GET['id'])){
            
		// 	$id = I("get.id");  //居民id
  //           $attId = I('get.attid'); //特征id
  //           $va = I('get.va');
  //           $db = M('home');
  //           $flag = $db->field('flag')->where("id = $id")->find();
  //           if ($va == "1") {
  //              $newFalge = explode(',',$flag['flag']);
  //               foreach ($newFalge as $key => $value) {
  //                   if ( $newFalge[$key] == $attId ){
  //                       unset($newFalge[$key]);
  //                   }
  //               }
  //               $newFalge = implode(',', $newFalge);
  //           }else{
  //               $newFalge = $flag['flag'].",".$attId;
                
  //           }
  //            $data = array(
  //                   'flag' => $newFalge,
  //               );
  //           $res = $db->where(array('id' => $id))->save($data);
  //           if ($res) {
  //               $this->success('更新成功');
  //           }else{
  //               $this->error('更新失败');
  //           }


  //       }
			
	}
	
	public function auto(){
		$buildings = $this->building_model->select();
		foreach($buildings as $vo){
			$unit = $vo['unit'];
			$floor = $vo['floor'];
			for($u_index = 1;$u_index <= $unit;$u_index++){
				for($f_index = 1;$f_index <= $floor;$f_index++){
					for($i=1;$i<=2;$i++){
						$data = array(
							'building_id' => $vo['id'],
							'unit' => $u_index,
							'floor' => $f_index,
							'num' => $f_index.'0'.$i
						);
						$this->home_model->add($data);
					}
				}
			}
		}
		
		$this->success("操作成功！");
	}


    //住户特征
    public function featuresIndex()
    {
        $db = M('att');
        //1为住户特征
        $map['type']  = array('in',array('1','2'));
        $res = $db->where($map)->select();
        $this->assign("res",$res);
        $this->display();
    }

    public function featuresAdd()
    {

       $this->display();
    }

    public function featuresPost()
    {
        $attname = I ('post.attname');
        $att = I('post.att');
        $att = I("post.type");
        
         if ( $attname == "" || $att == "" ) {
            $this->error('特征名称或字段值不能为空');
         }
         $db = D("att");
            if ( !$db->create($data) ) {
              
               $this->error($db->getError());

            } else {
                 $result = $db->add($data);
                 if ( $result ) {
                    $this->success("添加成功");
                 } else {
                    $this->error("添加失败");
                 }
            }
    }

    public function featuresEdit()
    {
        $id = I('get.id');
        $db = M("att");
        $list = $db->where("id = $id")->find();
        $value = explode(",",$list['value']);
        if ( count($value) > 1) {
            $this->assign('value',$value);
            
       } 
        $this->assign('list',$list);
        $this->display();
    }
    public function featuresExecEdit()
    {
       $id = I("post.id");
       $att = I("post.att");
       $attname = I("post.attname");
       // $val = I("post.value");
       // $value = implode(",",$val);
       $array = array(
            "att" => $att,
            "attname" => $attname,
            // "value" => $value
        );
     
       $db = M("att");
       $res =$db->where("id = $id") ->save($array);
       if ( $res ) {
        $this -> success('更新成功');
       }else{
        $this -> error('更新失败');
       }

    }

    public function featuresDelete()
    {
        $id = I('get.id');
        $db = M('att');
        //删除字段
        $result = $db->where(array('id' => $id))->delete();
        
        if ( $result ) {
         
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}
