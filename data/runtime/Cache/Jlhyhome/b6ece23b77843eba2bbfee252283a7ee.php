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
					<a href="<?php echo ($vo['href']); ?>" class="<?php if($vo['href'] == '/' || $vo['href'] == $self) echo 'in'?>"><?php echo ($vo['label']); ?></a>

				</li><?php endforeach; endif; ?>
			</ul>
			
		</div>
	</div>
</div>
<extends name="Public:layout"/>
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
	<div class="main left">
		<div class="intro">
			<span><?php echo ($title); ?></span> <?php echo ($content); ?>
			<a href="/index.php?g=Jlhyhome&m=about&a=index&ce=term_id&va=44">【更多信息】</a>
		</div>
		<div class="server block kwicks-con">
			<h3>
				<a href="#">服务范围</a>
			</h3>
			<div class="body">
				<div class="container">
					<ul id="server-kwicks" class='kwicks kwicks-horizontal'>
					<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><li>
							<div class="imgshadown"></div>
							<a href="index.php/Jlhyhome/design/show/id/<?php echo ($vo['id']); ?>" title="<?php echo ($vo['post_title']); ?>"><img src="<?php echo sp_get_image_preview_url($vo['arr']['thumb']);?>"  title=<?php echo ($vo['post_title']); ?>></a>
							<div class="caption">
								<div class="title"><?php echo ($vo['post_title']); ?></div>
							</div>
						</li><?php endforeach; endif; ?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!--<div class="case  block clearfix kwicks-con">
			<h3>
				<a href="#">典型案例</a>
			</h3>
			<div class="body">
				<div class="container">
					<ul id="case-kwicks" class='kwicks kwicks-horizontal'>
						<li>
							<div class="imgshadown"></div>
							<a href="2015/gcal_0701/724.html" title="七中数字化校园"><img src="0701/20150701043221758.jpg" alt="七中数字化校园"></a>
							<div class="caption">
								<div class="title">七中数字化校园</div>
							</div>
						</li>
						<li>
							<div class="imgshadown"></div>
							<a href="2015/gcal_0701/723.html" title="全区中小学门卫监控改造"><img src="0701/20150701040607441.jpg" alt="全区中小学门卫监控改造"></a>
							<div class="caption">
								<div class="title">全区中小学门卫监控改造</div>
							</div>
						</li>
						<li>
							<div class="imgshadown"></div>
							<a href="2015/gcal_0701/722.html" title="十里堡中学、西田各庄中学、新城子中心、一中机房改造工程"><img src="0701/20150701033526393.jpg" alt="十里堡中学、西田各庄中学、新城子中心、一中机房改造工程"></a>
							<div class="caption">
								<div class="title">十里堡中学、西田各庄中学、新城子中心、一中机房改造工程</div>
							</div>
						</li>
						<li>
							<div class="imgshadown"></div>
							<a href="2015/gcal_0701/721.html" title="职业学校机房项目"><img src="0701/20150701025405974.jpg" alt="职业学校机房项目"></a>
							<div class="caption">
								<div class="title">职业学校机房项目</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>-->
<!--		<div class="zizhi block clearfix">
			<h3>资质荣誉</h3>
			<div class="body">
				<div class="jcarousel">
					<ul>
						<li><img src="0317/20140317040836344.jpg" alt="ISO9001:2008质量体系认证" />
							<div class="tt">
								<p>ISO9001:2008质量体系认证</p>
							</div>
						</li>
						<li><img src="0317/20140317040615319.jpg" alt="我们弱电公司组织机构代码证" />
							<div class="tt">
								<p>我们弱电公司组织机构代码证</p>
							</div>
						</li>
						<li><img src="0317/20140317040544930.jpg" alt="我们弱电公司税务登记证" />
							<div class="tt">
								<p>我们弱电公司税务登记证</p>
							</div>
						</li>
						<li><img src="0625/20150625052649413.jpg" alt="我们系统集成公司营业执照" />
							<div class="tt">
								<p>我们系统集成公司营业执照</p>
							</div>
						</li>
						<li><img src="0317/20140317120017253.jpg" alt="弱电施工资质证书" />
							<div class="tt">
								<p>弱电施工资质证书</p>
							</div>
						</li>
						<li><img src="0317/20140317115921872.jpg" alt="高新技术企业证书" />
							<div class="tt">
								<p>高新技术企业证书</p>
							</div>
						</li>
						<li><img src="0317/20140317115834251.jpg" alt="设计证书" />
							<div class="tt">
								<p>设计证书</p>
							</div>
						</li>
						<li><img src="0317/20140317115747398.gif" alt="弱电系统集成资质证书" />
							<div class="tt">
								<p>弱电系统集成资质证书</p>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>-->
		<div class="baojia  block">
			<h3>在线工程报价</h3>
			<div class="body clearfix">
				<form action="/index.php?g=Jlhyhome&m=index&a=baojia" method="post">
					<input type="hidden" name="dosubmit" value="1"/>
					<div class="line">
						<label>联系人<span class="red">*</span>
							<input type="text" name="username" />
						</label>
						<label>手机/电话号<span class="red">*</span>
							<input type="text" name="phone" />
						</label>
						<label>邮箱
							<input type="text" name="email" />
						</label>
						<label>客户类型<span class="red">*</span>
							<select name="user-type">
								<option value="甲方">甲方</option>
								<option value="中间商">中间商</option>
							</select>
						</label>
					</div>
					<div class="line">
						<label>企业名称
							<input type="text" name="company" />
						</label>
						<label>工程类型<span class="red">*</span>
							<input type="text" name="pro-type" />
						</label>
						<label>工程地点
							<input type="text" name="area" />
						</label>
						<label>招标方式
							<input type="text" name="zhaobiao" />
						</label>
					</div>
					<div class="line">
						<label>工程基本信息
							<textarea name="content"></textarea>
						</label>
					</div>
					<div class="line">
						<input type="submit"  class="submit" value="获得报价" />
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="side right">
		<div class="box server-area">
			<h3>
				<a href="">服务范围</a>
			</h3>
			<div class="body clearfix">
				<ul>
				<?php if(is_array($posts)): foreach($posts as $key=>$vo): ?><li>
						<a href="index.php/Jlhyhome/design/show/id/<?php echo ($vo['id']); ?>"><?php echo ($vo['post_title']); ?></a>
					</li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<!--<div class="box text-list">
			<h3>
				<a href="listpic.html" class="more">成交公告</a>
			</h3>
			<div class="body">
				<ul>
					<li>
						<a href="2016/cjgg_0304/837.html"  style=""  title="">顺义科技养殖中心强</a>
					</li>
					<li>
						<a href="2016/cjgg_0304/834.html"  style=""  title="">太师庄中学机房改造项目</a>
					</li>
					<li>
						<a href="#"  style=""  title="">职业学校机房项目</a>
					</li>
					<li>
						<a href="#"  style=""  title="">顺义二中音响设备改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">新农村中学数字化校园建设</a>
					</li>
					<li>
						<a href="#"  style=""  title="">安监局LED更新</a>
					</li>
					<li>
						<a href="#"  style=""  title="">四中35套多媒体改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">果园小学24套讲台及多媒体改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">东邵渠中学数字化学校</a>
					</li>
					<li>
						<a href="#"  style=""  title="">李各庄别墅监控安装调试</a>
					</li>
					<li>
						<a href="#"  style=""  title="">河南寨镇政府机房改造，线路更换</a>
					</li>
					<li>
						<a href="#"  style=""  title="">檀营小学监控线路改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">果园小学6间ipad教室安装改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">河南寨小学水库中学机房改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">发改委led改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">十个政府机房改造</a>
					</li>
					<li>
						<a href="#"  style=""  title="">全区63所学校音乐教室音响设备改造...</a>
					</li>
					<li>
						<a href="#"  style=""  title="">顺义五中、南彩中学无线安装改造...</a>
					</li>
					<li>
						<a href="#"  style=""  title="">卫生防疫站安装音响设备，安装移动...</a>
					</li>
				</ul>
			</div>
		</div>-->
		
		<div class="box  text-list">
			<h3>
				<a href="about/">联系我们</a>
			</h3>
			<div class="body">
				<ul>
					<li><span>联系电话：010-89035921</span></li>
					<li><span>密云区滨河园</span></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<script src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.jcarousel.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.easing.js"></script>
<script src="/themes/simplebootx/Public/work/script/hoverIntent.js"></script>
<script src="/themes/simplebootx/Public/work/script/superfish.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.flexslider-min.js"></script>
<script src="/themes/simplebootx/Public/work/script/jquery.kwicks.min.js"></script>
<script src="/themes/simplebootx/Public/work/script/baojia-form.js"></script>
<script src="/themes/simplebootx/Public/work/script/custom.js"></script>
<script type="text/javascript">

$(window).load(function() {

  $('.flexslider').flexslider({

    animation: "slide",prevText: "&nbsp;",nextText: "&nbsp;"

  });

});



$().ready(function(e) { 

  $('.jcarousel').jcarousel({auto:1,scroll:1,wrap: 'circular',buttonNextHTML:null,buttonPrevHTML:null,initCallback: function(carousel){

	 carousel.clip.hover(

		function(){carousel.stopAuto();},

		function(){carousel.startAuto();}

		);}

  });

		/* Add code here*/

});

</script>
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