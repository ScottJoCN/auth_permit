<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>分配权限</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body>
<div class="page_title">
   <h2 class="fl">分配权限</h2>
</div>
<form action="<?php echo U('group/powerin');?>" method="post">
	<div style="margin:60px;">
		<select class="select" name="groupid">
			<?php if(is_array($gdata)): foreach($gdata as $key=>$vg): ?><option value="<?php echo ($vg["group_id"]); ?>"><?php echo ($vg["group_name"]); ?></option><?php endforeach; endif; ?>
		</select>
	</div>

	<table class="table" style="width:80%;margin:30px;">
		<?php if(is_array($pdata)): foreach($pdata as $key=>$vpdata): ?><tr>
			<td><?php echo ($vpdata["auth_id"]); echo ($vpdata["auth_name"]); ?></td>
			<td>
				<?php if(is_array($apdata)): foreach($apdata as $key=>$va): if($va['auth_pid'] == $vpdata['auth_id']): ?><span style="margin-right:8px;"><input type="checkbox" name="auth_id[]" value="<?php echo ($va["auth_id"]); ?>"><?php echo ($va["auth_id"]); echo ($va["auth_name"]); ?></span><?php endif; endforeach; endif; ?>
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
	<div>
		<span class="item_name" style="width:120px;"></span>
		<input type="submit" class="link_btn" value="分配权限" />
	</div>
</form>
</body>
</html>