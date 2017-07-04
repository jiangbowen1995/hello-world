<?php
namespace Jlhyhome\Controller;
use Common\Controller\HomebaseController; 
class IndexController extends HomebaseController {
	/**
	 *get.ce 为url中给定的参数(分类id) va同理为分类id的值
	 * 江博文   2017.06.06
	 */
	public function index(){
		//配置文件获取公司名称
		$title = C('DEFAULT_title');
		session('title',$title);
		//手机号码
		$phone = C('DEFAULT_phone');
		session('phone',$phone);
		//显示模板
		$nav = M('nav');
		layout(true);
		$res = $nav->where(array('cid'=>1,'parentid'=>0))->order('listorder asc,id asc')->select();
		Session('res',$res);
		$this->assign('res',$res);
		if(I('get.ce')){
			$keywords['b.'.I('get.ce')] = array('EQ',I('get.va'));
		}else{
			//后台点击进入前台，语句没加这个条件
			$keywords['b.term_id'] = array('EQ',35);
		}

		$post = M('posts');
		$keywords['post_status'] = 1;
		//文章表post 文章分类表term　两者关系表 trem_relaitonships 三表关联查询数据

        $posts = $post->field('a.*,c.name as cate_name')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where($keywords)->order("a.id DESC")->select();
        foreach($posts as $k=>$v){
			$posts[$k]['smeta2'] = json_decode($v['smeta']);
			$posts[$k]['arr'] = get_object_vars($posts[$k]['smeta2']);
		}
		//将posts压入session中
		session('poster',$posts);
		$keywordss['post_status'] = 2;
		$postss = $post->field('a.post_content')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where($keywordss)->order("a.id DESC")->select();
		$postsss = $post->field('a.smeta')->join('a left join wldk_term_relationships b on a.id = b.object_id left join wldk_terms c on b.term_id = c.term_id')->where('post_status = 0')->order("a.id DESC")->find();
        $arr = json_decode($postsss['smeta'],true);
        $img = $arr['thumb'];
       $this->assign('img',$img);
		//获取文章内容
		$content = $postss['0']['post_content'];
		//替换空字符串
		$contentt = str_replace(' ','',$content);
		//去除html标签
		$contenttt = strip_tags($contentt);
		//截取
		$contenttt = substr($contenttt,48,256);
		$this->assign('content',$contenttt);
		$this->assign('posts',$posts);
		$this->assign('title',$title);
		$this->assign('phone',$phone);
		$this->display();
	}

	public function baojia(){
		//获取值
		$arr['username'] = I('post.username');
		$arr['phone'] = I('post.phone');
		$arr['email'] = I('post.email');
		$arr['user-type'] = I('post.user-type');
		$arr['company'] = I('post.company');
		$arr['pro-type'] = I('post.pro-type');
		$arr['area'] = I('post.area');
		$arr['zhaobiao'] = I('post.zhaobiao');
		$arr['content'] = I('post.content');
		//检测手机号
		$test = '/^1(3|5|8)[0-9]{9}$/';
		if(!preg_match($test,$arr['phone'])){
			exit('手机号错误......');
		}
		//检测邮箱
		$email = '/\w+@\w+(\.\w+){1,2}/';
		if(!preg_match($email,$arr['email'])){
			exit('邮箱格式错误......');
		}
		if(empty($arr['username'])){exit('联系人不能为空');}
		if(empty($arr['email'])){exit ('邮箱不能为空');}
		if(empty($arr['user-type'])){exit ('用户类型不能为空');}
		if(empty($arr['company'])){exit ('企业名称不能为空');}
		if(empty($arr['zhaobiao'])){exit ('招标方式不能为空');}
		$money = M('money');
		if($ress = $money->add($arr)){
			$this->success('添加成功',U('Jlhyhome/index/index'));
		}else{
			$this->error('添加失败');
		}


 	}

}