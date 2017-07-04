<?php
/**
 * 后台首页
 */
namespace Admin\Controller;

use Common\Controller\AdminbaseController;

class FeaturesController extends AdminbaseController {
	
	public function _initialize() {
	    empty($_GET['upw'])?"":session("__SP_UPW__",$_GET['upw']);//设置后台登录加密码	    
		parent::_initialize();
		$this->initMenu();
	}
	
    /**
     * 后台框架首页
     */
    public function index() {
        $ty = I("get.ty");
    	$db = M('att');
        if ( $ty == 0) {
            $res = $db->where(array("type"=>0))->select();
        } elseif( $ty == 1) {
            $res = $db->where(array("type"=>1))->select();
           
        }
        
    	$this->assign("res",$res);
		$this->assign('ty',$ty);
		
        $this->load_menu_lang();
        $this->assign("menus", D("Common/Menu")->menu_json());
       	$this->display();
    }

    //删除标签
    public function delete()
    {
    	
    	$id = I('get.id');
    	$db = M('att');
    	//删除字段
    	$result = $db->where(array('id' => $id))->delete();
    	
    	if ( $result ) {
         
    		$this->success('删除成功',U('Features/index'));
    	} else {
    		$this->error('删除失败',U('Features/index'));
    	}

    }

    //修改字段页面
    public function edit()
    {   
        // echo "<pre>";
        //获取id值
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
    
    //执行修改
    public function edit_post()
    {   
       $id = I("post.id");
       $att = I("post.att");
       $attname = I("post.attname");
       $val = I("post.value");
       $value = implode(",",$val);
       $array = array(
            "att" => $att,
            "attname" => $attname,
            "value" => $value
        );
     
       $db = M("att");
       $res =$db->where("id = $id") ->save($array);
       if ( $res ) {
        $this -> success('更新成功',U("features/index"));
       }else{
        $this -> error('更新失败');
       }


    }  

    //添加新字段
    public function add(){

    	$type= I('get.type');
        $ty = I('get.ty');
       

     if ( empty($type) ) {
            $this->assign("ty",$ty);
    		$this->display();
    	}
    	if ( $type == 1) {
    		
    		$this->assign("ty",$ty);
    		$this->display('two');
    	}
    	
    }


    //执行添加
    public function add_post()
    {
        $type = I("post.type"); //0为单选,1为多选
        $ty = I('post.ty'); //0为人员特征,1为住户特征
    	$att = I("post.att");  //特征字段
        $attname = I("post.attname"); //特征名称
        $val = I("post.value"); //特征值

        $value = implode(",", $val);
        $data = array(
            "att" => $att,
            "attname" => $attname,
            "value" => $value,
            "type" => "0"
            );
        //人员特征
        if ( $ty == 0) {
            $this->execute_post($data);
			$this->assign('ty',$ty);
            
        } else {
        //住户特征
            $data['type'] = 1;
            $this->execute_post($data);
			$this->assign('ty',$ty);
        }
       
    }
    public function execute_post($data){
        if ( $type == 0 ) {
           
            $db = D("att");
            if ( !$db->create($data) ) {
              
               $this->error($db->getError());

            } else {
                 $result = $db->add($data);
                 if ( $result ) {
                    $this->success("添加成功",U("features/index"));
                 } else {
                    $this->error("添加失败");
                 }
            }
        } 
    }
    private function load_menu_lang(){
        $default_lang=C('DEFAULT_LANG');
        
        $langSet=C('ADMIN_LANG_SWITCH_ON',null,false)?LANG_SET:$default_lang;
        
	    $apps=sp_scan_dir(SPAPP."*",GLOB_ONLYDIR);
	    $error_menus=array();
	    foreach ($apps as $app){
	        if(is_dir(SPAPP.$app)){
	            if($default_lang!=$langSet){
	                $admin_menu_lang_file=SPAPP.$app."/Lang/".$langSet."/admin_menu.php";
	            }else{
	                $admin_menu_lang_file=SITE_PATH."data/lang/$app/Lang/".$langSet."/admin_menu.php";
	                if(!file_exists_case($admin_menu_lang_file)){
	                    $admin_menu_lang_file=SPAPP.$app."/Lang/".$langSet."/admin_menu.php";
	                }
	            }
	            
	            if(is_file($admin_menu_lang_file)){
	                $lang=include $admin_menu_lang_file;
	                L($lang);
	            }
	        }
	    }
    }

  
}
