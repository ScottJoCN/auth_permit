<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>主页</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body style="margin:0px;padding:0px;">
<div class="page_title">
   <h2 class="fl">用户列表</h2>
   <a class="fr top_rt_btn" style="margin-right:10px;margin-top:4px;" href="<?php echo U('admin/add');?>">新增</a>
</div>
<table class="table" style="text-align:center">
    <tr>
        <th>ID</th>
        <th>用户名</th>
        <th>所属用户组</th>
        <th>最后登录IP</th>
        <th>最后登录时间</th>
        <th>操作管理</th>
    </tr>
    <?php if(is_array($adminData)): foreach($adminData as $key=>$va): ?><tr>
        <td><?php echo ($va["id"]); ?></td>
        <td><?php echo ($va["uname"]); ?></td>
        <td><?php echo ($va["group_name"]); ?></td>
        <td><?php echo ($va["last_login_ip"]); ?></td>
        <td>
            <?php if($va["last_login_time"] != '' ): echo (date("Y-m-d H:m:s",$va["last_login_time"])); endif; ?>
        </td>
        <td>
        <a href="/baidufang/index.php/Admin/edit/id/<?php echo ($va["id"]); ?>">编辑</a>
        <a onclick="if(confirm('确认要删除吗?')){location.href = '<?php echo U("Admin/delete",array("id"=>$va["id"]));?>';}">删除</a>
<!--         <a href="#" class="inner_btn">表内按钮</a> -->
        </td>
    </tr><?php endforeach; endif; ?>

</table>
</body>
</html>