<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>权限列表</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body style="margin:0px;padding:0px;">
<div>
<div class="page_title">
   <h2 class="fl">权限列表</h2>
   <a class="fr top_rt_btn" style="margin-right:10px;margin-top:4px;" href="<?php echo U('Auth/add');?>">新增</a>
</div>
<table class="table" style="text-align:center">
    <tr>
        <th>ID</th>
        <th>权限名</th>
        <th>权限控制器</th>
        <th>权限视图</th>
        <th>操作管理</th>
    </tr>
    <?php if(is_array($adata)): foreach($adata as $key=>$va): ?><tr>
        <td><?php echo ($va["auth_id"]); ?></td>
        <td><?php echo ($va["auth_name"]); ?></td>
        <td><?php echo ($va["auth_c"]); ?></td>
        <td><?php echo ($va["auth_a"]); ?></td>
        <td>
        <a href="/baidufang/m.php/Auth/edit/id/<?php echo ($va["auth_id"]); ?>">编辑</a>
        <a onclick="if(confirm('确认要删除吗?')){location.href = '<?php echo U("Auth/del",array("id"=>$va["auth_id"]));?>';}" title="删除">删除</a>
<!--         <a href="#" class="inner_btn">表内按钮</a> -->
        </td>
    </tr><?php endforeach; endif; ?>
    </tr>
</table>
 <aside class="paging" style="margin-right:20px;"><?php echo ($page); ?></aside>
</div>
</body>
</html>