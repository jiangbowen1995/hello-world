<?php
namespace jlhyhome\Controller;
use Common\Controller\HomebaseController; 
class DesignController extends HomebaseController {
	/**
	 *get.ce 为url中给定的参数(分类id) va同理为分类id的值
	 * 江博文   2017.06.06
	 */
	public function index(){

		layout(true);
		$res = Session('res');
		$this->assign('res',$res);
		$title = Session('title');
		$phone = Session('phone');
		$this->assign('phone',$phone);
		//获取路径信息
		$self = __SELF__;
		// var_dump($self);
		//查询本分类下的文章
	if(I('get.ce')){
			$keywords['b.'.I('get.ce')] = array('EQ',I('get.va'));
			$keywords['post_status'] = 1;
		}
		$post = M('posts');
        $posts = $post->field('a.*,c.name as cate_name')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where($keywords)->order("a.id DESC")->select();
        foreach($posts as $k=>$v){
			$posts[$k]['smeta2'] = json_decode($v['smeta']);
			$posts[$k]['arr'] = get_object_vars($posts[$k]['smeta2']);
		}
		  $postss = $post->field('a.smeta')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where('post_status = 0')->order("a.id DESC")->find();
        $arr = json_decode($postss['smeta'],true);
        $img = $arr['thumb'];
       $this->assign('img',$img);
		$poster = session('poster');
		$this->assign('poster',$poster);
		$this->assign('posts',$posts);
		$this->assign('title',$title);
		$this->assign('self',$self);
		$this->display();

	}

	public function show(){

		
	layout(true);
		//获取id
		$id = I('get.id');
		$res = Session('res');
		$this->assign('res',$res);
		$title = Session('title');
		$this->assign('title',$title);
		$phone = Session('phone');
		$this->assign('phone',$phone);
		$self = '/index.php/Jlhyhome/design/index/ce/term_id/va/36';
		
		if($id){
			//通过此id查询该设计详情
			$model = M('posts');
			$ress = $model->where('id ='.$id)->find();
			$ress['smeta2'] = json_decode($ress['smeta']);
			$ress['arr'] = get_object_vars($ress['smeta2']);
			$this->assign('self',$self);
			$this->assign('ress',$ress);
			$this->display();
		}
		

	}
}