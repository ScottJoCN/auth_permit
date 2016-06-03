<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>后台登录</title>
<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/baidufang/Public/js/jquery.js"></script>
<script src="/baidufang/Public/js/Particleground.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });

  $("#verify").click(function(){
      var nowTime = new Date().getTime();
      $("#verify").attr('src',"<?php echo U('Login/verify');?>#"+nowTime);
    })

});


</script>
</head>
<body>
  <dl class="admin_login">
    <dt>
      <strong>数据系统</strong>
      <em>Database System</em>
    </dt>

<form action="<?php echo U('Login/dologin');?>" method="post">
    <dd class="user_icon">
      <input type="text" placeholder="账号" class="login_txtbx" name="uname"/>
    </dd>

    <dd class="pwd_icon">
    <input type="password" placeholder="密码" class="login_txtbx" name="password"/>
    <span></span>
    </dd>
    

    <dd class="val_icon">
    <div>
      <input type="text" id="J_codetext" placeholder="验证码" maxlength="4" class="login_txtbx" name="verifyCode"/>
    </div>
    </dd>
    <dd>
      <div style="text-align:center;"><img src="<?php echo U('Login/verify');?>"  id="verify" width="145" height="40" border="1"></div>
    </dd>

    <dd>
    <input type="submit" value="立即登陆" class="submit_btn"/>
    </dd>
</form>
    <dd>
    <p>度房传播版权所有</p>
    </dd>
  </dl>
</body>
</html>