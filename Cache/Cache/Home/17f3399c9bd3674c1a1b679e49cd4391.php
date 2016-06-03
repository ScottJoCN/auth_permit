<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>添加用户</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>
<form action="<?php echo U('admin/insert');?>" method="post">
	<section style="margin:20px;">
		<h2><strong style="color:grey;">添加用户</strong></h2>
	<ul class="ulColumn2">
		<li>
			<span class="item_name" style="width:120px;">用户名：</span>
			<input type="text" class="textbox textbox_295" name="uname" placeholder="请输入数字英文..."/>
		</li>
		<li>
			<span class="item_name" style="width:120px;">密码：</span>
			<input type="password" class="textbox textbox_295" name="password"/>
		</li>

		<li>
			<span class="item_name" style="width:120px;">所属用户组：</span>
			<select class="select" name="group_id">
				<?php if(is_array($group)): foreach($group as $key=>$vg): ?><option value="<?php echo ($vg["group_id"]); ?>"><?php echo ($vg["group_name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</li>

		<li>
		<span class="item_name" style="width:120px;"></span>
		<input type="submit" class="link_btn"/>
		</li>
	</ul>
	</section>
</form>
</body>
</html>