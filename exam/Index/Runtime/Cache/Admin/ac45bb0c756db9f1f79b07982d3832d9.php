<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>onlineTest 后台管理中心</title>
  <link rel="stylesheet" href="/exam/Public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/exam/Public/css/indexadmin.css"/>
  <script type="text/javascript" src="/exam/Public/js/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src="/exam/Public/js/bootstrap.min.js"></script>
  <script type="text/javascript" src='/exam/Public/js/index.js'></script>
  <base target="iframe"/>
</head>
<body>
<div id="top">

  <div class='t_title'>OnlineExam 后台管理中心</div>
  <div class='menu'>
    <div id='user'>
      <span class='user_state'>当前管理员：[ <span><?php echo (session('username')); ?></span> ]</span>

        <a href="<?php echo U('loginOut');?>" target='_self' id='login_out'>退出</a>

    </div>
  </div>
</div>
<div id='left'>
  <div class='nav'>
    <div class="nav_u"><span class="pos down">后台首页</span></div>
  </div>
  <ul class='option'>
    <li><a href='<?php echo U("Index/copy");?>'>信息展示</a></li>
  </ul>
  <div class='nav'>
    <div class="nav_u"><span class="pos down">用户管理</span></div>
  </div>
  <ul class='option'>
    <li><a href='<?php echo U("User/index");?>'>系统用户</a></li>
    <li><a href='<?php echo U("User/sechUser");?>'>系统用户检索</a></li>
    <li><a href='<?php echo U("User/admin");?>'>后台管理员</a></li>
    <?php if(!$_SESSION["admin"]): ?><li><a href='<?php echo U("User/addAdmin");?>'>添加管理员</a></li><?php endif; ?>
  </ul>

  <div class='nav'>
    <div class="nav_u"><span class="pos down">试题管理</span></div>
  </div>
  <ul class='option'>
    <li><a href='<?php echo U("Test/index");?>'>查看题库</a></li>
    <li><a href='<?php echo U("Test/addItem");?>'>添加试题</a></li>
  </ul>
  <div class='nav'>
    <div class="nav_u"><span class="pos down">公告管理</span></div>
  </div>
  <ul class='option'>
    <li><a href='<?php echo U("Notice/index");?>'>已有公告</a></li>
    <li><a href='<?php echo U("Notice/addNotice");?>'>添加公告</a></li>
  </ul>
  <div class='nav'>
    <div class="nav_u"><span class="pos down">系统设置</span></div>
  </div>
  <ul class='option'>
    <li><a href='<?php echo U("System/index");?>'>网站设置</a></li>
    <li><a href='<?php echo U("User/editPwd");?>'>修改密码</a></li>
  </ul>
</div>
<div id="right">
  <iframe src="<?php echo U('copy');?>" frameborder="0" name='iframe'></iframe>
</div>
</body>
</html>