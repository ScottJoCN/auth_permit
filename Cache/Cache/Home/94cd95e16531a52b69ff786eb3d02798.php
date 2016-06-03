<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>编辑用户组</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body style="margin:0px;padding:0px;">
<form action="<?php echo U('Group/edit');?>" method="post">
    <section>
        <h2><strong style="color:grey;">编辑用户组</strong></h2>
      <ul class="ulColumn2">
        <li>
            <span class="item_name" style="width:120px;">用户组名称：</span>
            <input type="text" class="textbox textbox_295" name="group_name" value="<?php echo ($group["group_name"]); ?>" />
        </li>
        <li>
        	<input type="hidden" name="id" value="<?php echo ($group["group_id"]); ?>">
            <span class="item_name" style="width:120px;"></span>
            <input type="submit" class="link_btn"/>
        </li>
      </ul>
    </section>
</form>
</body>
</html>