<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>后台首页</title>
  <link rel="stylesheet" href="/exam/Public/css/copy.css" />
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
</head>
<body>
<script type="text/javascript">
  window.onload = function () {
    $('#main').fadeIn(2000);
  }
</script>
<div id='main'>
  <dl>
    <dt>个人信息</dt>
    <dd>上一次登录时间：<span><?php echo (session('logintime')); ?></span></dd>
    <dd>上一次登录IP：<span><?php echo (session('loginip')); ?></span></dd>
    <dd>本次登录时间：<span><?php echo (session('now')); ?></span></dd>
    <dd>本次登录IP：<span><?php echo get_client_ip();?></span></dd>
  </dl>
  <dl>
    <dt>服务器信息</dt>
    <dd>操作系统：<span><?php echo (PHP_OS); ?></span></dd>
    <dd>PHP版本： <span><?php echo (PHP_VERSION); ?></span></dd>
    <dd>服务器环境：<span><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></span></dd>
    <!--<dd>MySQL版本：<span><?php echo mysql_get_server_info();?></span></dd>-->
    <dd>MySQL版本：<span>Ver 14.14 Distrib 5.7.10</span></dd>
  </dl>
  <dl>
    <dt>用户信息</dt>
    <dd>共有注册用户：<span><?php echo ($user); ?></span></dd>
    <dd>被锁定用户：<span><?php echo ($lock); ?></span></dd>
  </dl>
  <dl>
    <dt>试题信息</dt>
    <dd>试题类型：<span><?php echo ($type); ?></span>个</dd>
    <dd>考试人数：<span><?php echo ($people); ?></span>个</dd>
  </dl>
  <dl>
    <dt>公告信息</dt>
    <dd>发布公告：<span><?php echo ($notice); ?></span>个</dd>

  </dl>
  <dl>
    <dt>版权信息</dt>
    <dd>版权所有：在线考试系统 京ICP备10028888号-1</dd>
    <dd>系统开发：宫蕊</dd>
  </dl>
</div>
</body>
</html>