<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>添加权限</title>
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>
<section style="margin:20px;">
<h2><strong style="color:grey;">编辑权限</strong></h2>
	<form action="<?php echo U('auth/edit');?>" method="post">
	<ul class="ulColumn2">
		<li>
			<span class="item_name" style="width:120px;">权限名</span>
			<input type="text" class="textbox textbox_295" placeholder="" name="auth_name" value="<?php echo ($authData["auth_name"]); ?>" />
		</li>

		<li>
			<span class="item_name" style="width:120px;">控制器名</span>
			<input type="text" class="textbox textbox_295" placeholder="" name="auth_c" value="<?php echo ($authData["auth_c"]); ?>" />
		</li>

		<li>
			<span class="item_name" style="width:120px;">控制器视图</span>
			<input type="text" class="textbox textbox_295" placeholder="" name="auth_a" value="<?php echo ($authData["auth_a"]); ?>" />
		</li>

		<li>
			<span class="item_name" style="width:120px;">权限分类</span>
			<select class="select" name="auth_pid">
				<option value="0">顶级分类</option>
				<?php if(is_array($auth_f_name)): foreach($auth_f_name as $key=>$v): ?><option value="<?php echo ($v["auth_id"]); ?>" <?php if($v['auth_id'] == $authData['auth_pid']): ?>selected<?php endif; ?> ><?php echo ($v["auth_name"]); ?></option><?php endforeach; endif; ?>
			</select>
		</li>

		<li>
			<input type="hidden" name="id" value="<?php echo ($authData["auth_id"]); ?>">
			<span class="item_name" style="width:120px;"></span>
			<input type="submit" class="link_btn"/>
		</li>
	</ul>
	</form>
</section>
</body>
</html>