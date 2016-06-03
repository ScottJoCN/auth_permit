<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>侧边菜单</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="/baidufang/Public/css/style.css" />
    <script src="/baidufang/Public/js/jquery.js"></script>
    <script src="/baidufang/Public/js/jquery.mCustomScrollbar.concat.min.js"></script>
    </script>
</head>
<body style="margin:0px;padding:0px;">
<aside class="lt_aside_nav content mCustomScrollbar">
<ul>
<?php if(is_array($pdata)): foreach($pdata as $key=>$vpdata): ?><li>
        <dl>
            <dt><?php echo ($vpdata["auth_name"]); ?></dt>
            <?php if(is_array($apdata)): foreach($apdata as $key=>$vapdata): if($vapdata['auth_pid'] == $vpdata['auth_id'] and in_array($vapdata['auth_id'],$getauth_arr)): ?><dd><a href="/baidufang/index.php?m=Home&c=<?php echo ($vapdata["auth_c"]); ?>&a=<?php echo ($vapdata["auth_a"]); ?>" target="main-frame"><?php echo ($vapdata["auth_name"]); ?></a></dd><?php endif; endforeach; endif; ?>
        </dl>
    </li><?php endforeach; endif; ?>
    <!-- <li>
        <dl>
            <dt>用户管理</dt>
            <dd><a href="<?php echo U('admin/index');?>" target="main-frame">用户列表</a></dd>
            <dd><a href="<?php echo U('admin/add');?>" target="main-frame">添加用户</a></dd>
            <dd><a href="<?php echo U('group/index');?>" target="main-frame">用户组管理</a></dd>
            <dd><a href="<?php echo U('group/power');?>" target="main-frame">分配权限</a></dd>
            <dd><a href="<?php echo U('auth/index');?>"  target="main-frame">权限列表</a></dd>
            <dd><a href="<?php echo U('auth/add');?>"  target="main-frame">添加权限</a></dd>
        </dl>
    </li>
    <li>
        <dl>
            <dt>个人中心</dt>
            <dd><a href="#">个人资料</a></dd>
            <dd><a href="#">修改密码</a></dd>
            <dd><a href="#">安全退出</a></dd>
        </dl>
    </li>
    <li>
        <dl>
            <dt>客户画像</dt>
            <dd><a href="#">aa</a></dd>
            <dd><a href="#">bb</a></dd>
        </dl>
    </li>
    <li>
        <dl>
            <dt>客户地图</dt>
            <dd><a href="#">客户1</a></dd>
            <dd><a href="#">客户2</a></dd>
            <dd><a href="#">客户3</a></dd>
        </dl>
    </li>
    <li>
        <dl>
            <dt>新建商品房</dt>
            <dd><a href="#">新建商品房</a></dd>
            <dd><a href="#">新建城市</a></dd>
            <dd><a href="#">新建地区</a></dd>
        </dl>
    </li>
    <li>
        <dl>
            <dt>土地数据</dt>
            <dd><a href="#">站点基础设置</a></dd>
        </dl>
    </li>
    <li>
        <dl>
            <dt>营销管理</dt>
            <dd><a href="#">市场情报</a></dd>
            <dd><a href="#">客户挖掘</a></dd>
            <dd><a href="#">客户预测</a></dd>
        </dl>
    </li> -->
    
    <li>
        <p class="btm_infor">© 度房文化 版权所有</p>
    </li>
</ul>
</aside>
</body>
</html>