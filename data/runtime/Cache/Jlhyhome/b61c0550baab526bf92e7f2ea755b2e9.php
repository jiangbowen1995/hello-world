<?php if (!defined('THINK_PATH')) exit();?><!doctype html>

<html>
<head>
<meta charset="utf-8">
<title><?php echo ($title); ?></title>
<meta name="keywords" content="弱电公司,系统集成公司,,弱电集成,系统集成">
<meta name="description" content="北京建龙浩宇科技有限公司是一家专业科技公司；计算机系统服务；销售计算机、软件及辅助设备、电子产品、电子元件和器件、办公用文具、体育用品、办公用机械；计算机维修；企业管理咨询">
<link href="/themes/simplebootx/Public/work/css/style.css" rel="stylesheet" type="text/css">
<link href="/themes/simplebootx/Public/work/css/flexslider.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="/themes/simplebootx/Public/work/css/theme.min.css" type="text/css"> -->
<style type="text/css">
.jcarousel { position: relative; overflow: hidden; }
.jcarousel ul { width: 20000em; position: relative; }
.jcarousel li { float: left; text-align: center; }
.navigation ul li a.in{
	background: #666;
}
</style>
</head>

<body>
<div class="wrap header clearfix">
	<div class="left logo">
		<h1>
			<a href="/"><img src="/themes/simplebootx/Public/work/images/logo.jpg" alt=""></a>
		</h1>
	</div>
	<div class="right top-menu">
		<ul>
			<li class="li1">
				<a href="#">联系方式</a>
			</li>
			<li>
				<a href="#">收藏我们</a>
			</li>
			<li>
				<a href="#">设为首页</a>
			</li>
		</ul>
	</div>
</div>
<div class="wrap-auto nav-search">
	<div class="wrap">
		<div class="navigation left">
			<ul class="sf-menu" id="navigation">
			<?php if(is_array($res)): foreach($res as $key=>$vo): ?><li class="home">
					<a href="<?php echo ($vo['href']); ?>" class="<?php if($vo['href'] == '/index.php/Jlhyhome/project/index/ce/term_id/va/42' || $vo['href'] == $self) echo 'in'?>"><?php echo ($vo['label']); ?></a>

				</li><?php endforeach; endif; ?>
			</ul>
			
		</div>
	</div>
</div>
<extends name="Public:layout" />
<div class="wrap-aotu">
	<div class="flexslider">
		<ul>
			<li>
				<a href="#" title="专业技术公司"><img src="<?php echo sp_get_image_preview_url($img);?>" alt="专业技术公司" style="width:100%;height:210px"/></a>
			</li>
		</ul>
	</div>
</div>
<div class="wrap clearfix contain">
	<div class="bread-crumb">
		<a href="/">首页</a>
		<span>
		>
		</span>
		<a href="/index.php/Jlhyhome/project/index/ce/term_id/va/42">工程案例</a>
		>
	</div>
	<div class="main right">
		<div class="list">
			<h2>工程案例</h2>
			<p>公司近三年工程一览表：</p>
			<div class="content">
				<ul>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><li><a href="/index.php/Jlhyhome/project/show/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['post_title']); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="pager"></div>
		</div>
	</div>
	
	<div class="side left">
		<div class="box server-area">
			<h3>
				<a href="#">服务范围</a>
			</h3>
			<div class="body clearfix">
				<ul>
				<?php if(is_array($poster)): foreach($poster as $key=>$vo): ?><li>
						<a href="/index.php/Jlhyhome/design/show/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['post_title']); ?></a>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<div class="box  text-list">
			<h3>
				<a href="/index.php/Jlhyhome/about/index/ce/term_id/va/44">联系我们</a>
			</h3>
			<div class="body">
				<ul>
					<li><span>工程热线：01089035921</span></li>
					
					<li><span>密云区行宫街</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div>
<script src="/themes/simplebootx/Public/work/script/jquery.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.easing.js"></script>
<script src="/themes/simplebootx/Public/work/script/hoverIntent.js"></script>
<script src="/themes/simplebootx/Public/work/script/superfish.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.kinMaxShow-1.1.min.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.kwicks.min.js"></script>
<script src="/themes/simplebootx/Public/work/script/custom.js"></script>
</body>
</html>
<div class="wrap-aotu flink-foot">

	<div class="wrap">
		<div class="foot" >
			<ul class="sf-menu" id="navigation" style="padding-left:100px">
			<?php if(is_array($res)): foreach($res as $key=>$vo): ?><li class="home">
					<a href="<?php echo ($vo['href']); ?>"><?php echo ($vo['label']); ?> &nbsp;&nbsp;&nbsp;</a>
				</li><?php endforeach; endif; ?>
			</ul>
			<br><div class="info" style="padding-left:-100px"><?php echo ($title); ?> 版权所有 电话:&nbsp;<?php echo ($phone); ?>（周一至周日 8：00 - 18：00） </div>
		</div>
	</div>

</div>