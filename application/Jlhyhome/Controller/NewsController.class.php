<?php
namespace Jlhyhome\Controller;
use Common\Controller\HomebaseController; 
class NewsController extends HomebaseController {
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
		//查询本分类下的文章
	if(I('get.ce')){
			$keywords['b.'.I('get.ce')] = array('EQ',I('get.va'));
			$keywords['post_status'] = 1;
		}
	$post = M('posts');
		$count = $post->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where($keywords)->count();
		$page = $this->page($count,1);
        $posts = $post->field('a.*')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where($keywords)->order("a.id DESC")->limit($page->firstRow,$page->listRows)->select();
        $poster = session('poster');
          $postss = $post->field('a.smeta')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where('post_status = 0')->order("a.id DESC")->find();
        $arr = json_decode($postss['smeta'],true);
        $img = $arr['thumb'];
       $this->assign('img',$img);
       $this->assign("page", $page->show('Admin'));
		$this->assign('poster',$poster);
		$this->assign('posts',$posts);
		$this->assign('title',$title);
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
		$self = '/index.php/Jlhyhome/news/index/ce/term_id/va/46';
		$this->assign('self',$self);
		if($id){
			//通过此id查询该合作详情
			$model = M('posts');
			$ress = $model->where('id ='.$id)->find();
			$this->assign('ress',$ress);
			$this->display();
		}
	}
}