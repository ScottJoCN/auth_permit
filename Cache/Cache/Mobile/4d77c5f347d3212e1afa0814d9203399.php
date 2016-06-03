<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户组列表</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
</head>
<body style="margin:0px;padding:0px;">
<div class="page_title">
   <h2 class="fl">用户组列表</h2>
</div>
<table class="table" style="text-align:center">
    <tr>
        <th>ID</th>
        <th>用户组名</th>
        <th>操作管理</th>
    </tr>
    <?php if(is_array($gdata)): foreach($gdata as $key=>$vg): ?><tr>
        <form action="" method="post">
        <td><?php echo ($vg["group_id"]); ?></td>
        <td><span class="modify_span" style="display:block"><?php echo ($vg["group_name"]); ?></span><span class="modify_txt" style="display:none"><input type="text" name="group_name" value="<?php echo ($vg["group_name"]); ?>"></span></td>
        <td>
            <a href="<?php echo U('Group/authchm',array('id'=>$vg[group_id]));?>">更改权限</a>
            
            <a href="/baidufang/m.php/Group/edit/id/<?php echo ($vg["group_id"]); ?>">编辑</a>
            
            <a onclick="if(confirm('确认要删除吗?')){location.href = '<?php echo U("Group/delete",array("id"=>$vg["group_id"]));?>';}">删除</a>
            <input type="submit" name="" value="更新" class="link_btn" style="display:none">
        </td>
        </form>
    </tr><?php endforeach; endif; ?>
</table>
<form action="<?php echo U('Group/insert');?>" method="post">
    <section>
        <h2><strong style="color:grey;">添加用户组</strong></h2>
      <ul class="ulColumn2">
        <li>
            <span class="item_name" style="width:120px;">用户组名称：</span>
            <input type="text" class="textbox textbox_295" name="group_name"/>
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