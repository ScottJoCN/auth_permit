<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>头部</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>
	<header>
     <ul class="rt_nav">
     <?php if($username == ''): ?><li><a href="<?php echo U('Login/index');?>" class="admin_icon" target="_top">登录</a></li>
    <?php else: ?>

      <li><a href="<?php echo U('index/main');?>" target="main-frame" class="website_icon">首页</a></li>
      <li><a href="<?php echo U('Login/logout');?>" class="quit_icon" target="_top">安全退出</a></li><?php endif; ?>
      
     </ul>
    </header>
</body>
</html>