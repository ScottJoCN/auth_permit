<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>主页</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
	<link href="/baidufang/Public/css/bootstrap.min.css" rel="stylesheet">
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
	<script type="text/javascript" src="/baidufang/Public/js/bootstrap.min.js"></script>
</head>

<body style="margin:0px;padding:0px;">
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
<div class="page_title" style="margin-top:50px;">
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
    <?php if(is_array($adminData2)): foreach($adminData2 as $key=>$va): ?><tr>
        <td><?php echo ($va["id"]); ?></td>
        <td><?php echo ($va["uname"]); ?></td>
        <td><?php echo ($va["group_name"]); ?></td>
        <td><?php echo ($va["last_login_ip"]); ?></td>
        <td>
            <?php if($va["last_login_time"] != '' ): echo (date("Y-m-d H:m:s",$va["last_login_time"])); endif; ?>
        </td>
        <td>
		
        <a href="/baidufang/m.php/Admin/edit/id/<?php echo ($va["id"]); ?>" >编辑</a>
        
		<a onclick="if(confirm('确认要删除吗?')){location.href = '<?php echo U("Admin/delete",array("id"=>$va["id"]));?>';}">删除</a>
		
<!--         <a href="#" class="inner_btn">表内按钮</a> -->
        </td>
    </tr><?php endforeach; endif; ?>

</table>
</body>
</html>