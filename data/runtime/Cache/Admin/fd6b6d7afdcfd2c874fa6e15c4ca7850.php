<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>让工作更美好</title>
<link rel="stylesheet" href="/public/other/css/reset-v1.0.min.css">
<link rel="stylesheet" href="/public/other/css/signIn.css" />
<script>
	if (window.parent !== window.self) {
			document.write = '';
			window.parent.location.href = window.self.location.href;
			setTimeout(function () {
					document.body.innerHTML = '';
			}, 0);
	}
</script>
</head>
<body>
<div class="signIn-wrap">
	<div class="header"> <a href="" class="home-page"> <?php echo L('SYS_NAME');?>-<?php echo L('ADMIN_CENTER');?> </a>
		<p> 免费咨询热线： <span>010-89035921</span> </p>
	</div>
	<div class="main">
		<div class="container"> 
			<div class="content">
				<ul class="title">
					<li class="signByAcco selected"><a href="javascript:;">账号登录</a></li>
				</ul>
				<ul class="error">
					<li class="falseInfo hide"><i></i><span>请输入正确的手机号或邮箱</span></li>
					<li class="unregisteredAcco hide"><i></i><span>该账号暂未注册，<a href="register.html">去注册></a></span></li>
				</ul>
				<form class="form-input" name="login" action="<?php echo U('public/dologin');?>" method="post"  autoComplete="off">
					<dl class="Acco">
						<i></i>
						<input type="text" id="js-admin-name" placeholder="请输入手机号或邮箱" name="username" autocomplete="on"  onclick="JavaScript:this.value=''"/>
					</dl>
					<dl class="password">
						<i></i>
						<input type="password" id="admin_pwd" placeholder="请输入登录密码" name="password" autocomplete="on"  onclick="JavaScript:this.value=''"/>
					</dl>
					<!--<dl class="code">
						<input type="text" placeholder="请输入图片验证码" name="verify" value="" />
						<?php echo sp_verifycode_img('length=4&font_size=24&width=180&height=52&use_noise=1&use_curve=0','style="cursor: pointer;" title="点击获取"');?>
					</dl>-->
					
					<!--<div class="wxContent hide"> <a href=""><img src="/admin/themes/simplebootx/Public/assets2/images/i_wx.png" /></a> <a href="">点击登录</a> <span>使用您的微信登录</span> </div>
				<a href="javascript:;" class="remember"> <span class="remember-btn"></span> <span>下次自动登录</span> </a>--> 
					<!--<a href="javascript:;"><?php echo L('LOGIN');?></a>-->
					<button class="signIn" type="submit" name="submit" data-loadingmsg="<?php echo L('LOADING');?>"><?php echo L('LOGIN');?></button>
					<!--<div> <a href="/findpwdguide.html" class="forget">忘记密码</a> </div>-->
				</form>
			</div>
		</div>
	</div>
	<div class="footer">京ICP备XXXXX号-1 Copyright © 2016 万龙达康</div>
</div>
<!--<script src="/admin/themes/simplebootx/Public/assets2/js/jquery-1.9.1.min.js" type="text/javascript" ></script> --> 
<!--<script src="/admin/themes/simplebootx/Public/assets2/js/signIn.min.js" type="text/javascript"></script>--> 
<script>
var GV = {
    ROOT: "/",
    WEB_ROOT: "/",
    JS_ROOT: "public/js/"
};
</script> 
<script src="/public/js/wind.js"></script> 
<script src="/public/js/jquery.js"></script> 
<script type="text/javascript" src="/public/js/common.js"></script> 
<script>
;(function(){
	document.getElementById('js-admin-name').focus();
})();
</script>
</body>
</html>