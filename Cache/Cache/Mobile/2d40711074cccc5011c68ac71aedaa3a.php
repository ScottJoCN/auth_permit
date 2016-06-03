<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>手机端大数据</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/baidufang/Public/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="/baidufang/Public/js/jquery.min.js"></script>
    <script type="text/javascript" src="/baidufang/Public/js/bootstrap.min.js"></script>
</head>
<body>
<!-- 头部文件 -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Home</a>
    </div>

    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php if($username == ''): ?><li><a href="<?php echo U('Login/index');?>">登录</a></li>
        <?php else: ?>
        

        <?php if(is_array($pdata)): foreach($pdata as $key=>$vpdata): ?><li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($vpdata["auth_name"]); ?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if(is_array($apdata)): foreach($apdata as $key=>$vapdata): if($vapdata['auth_pid'] == $vpdata['auth_id'] and in_array($vapdata['auth_id'],$getauth_arr)): ?><li><a href="/baidufang/m.php?m=Mobile&c=<?php echo ($vapdata["auth_c"]); ?>&a=<?php echo ($vapdata["auth_a"]); ?>"><?php echo ($vapdata["auth_name"]); ?></a></li>
            <!-- <li><a href="<?php echo U('Admin/index');?>"><?php echo ($vapdata["auth_name"]); ?></a></li> --><?php endif; endforeach; endif; ?>
            

          </ul>
      </li>
      <li role="separator" class="divider"></li><?php endforeach; endif; ?>
      <li><a href="<?php echo U('Login/logout');?>">退出</a></li><?php endif; ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

</body>
</html>