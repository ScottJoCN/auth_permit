<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
 <html>
 <head>
 
 	<title>度房后台</title>
</head>
<frameset rows="70,*" framespacing="0" border="0">
  <frame src="<?php echo U('Index/top');?>" id="header-frame" name="header-frame" frameborder="no" scrolling="no">
  <frameset cols="210,*" framespacing="0" border="0" id="frame-body">
    <frame src="<?php echo U('Index/menu');?>" id="menu-frame" name="menu-frame" frameborder="no" scrolling="yes">
    <frame src="<?php echo U('Index/main');?>" id="main-frame" name="main-frame" frameborder="no" scrolling="yes">
  </frameset>
</frameset>

</html>