<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>登录</title>
  <link href="/exam/Public/css/login.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/jquery-validate.js" type="text/javascript"></script>

  <script src="/exam/Public/js/login.js" type="text/javascript"></script>
  <script src="/exam/Public/js/vector.js" type="text/javascript"></script>

</head>
<body>
<div id="container"><div id="output"></div></div>

<div class="top_div">
  <!--上半部蓝色-->
  <div class="loginBox">
    <div class="loginTopPic">
      <div class="tou"></div>
      <div class="initial_left_hand" id="left_hand"></div>
      <div class="initial_right_hand" id="right_hand"></div>
    </div>
    <div class="loginCon">
      <a href='<?php echo U("register");?>' style="color:dimgrey;">注册</a>
      <a href="login.html" style="color:#3291d9;">登录</a>
      <span class="borderBottomLogin"></span>
    </div>
    <!--登录界面-->
    <form action="<?php echo U('login');?>" method='post' name='login'>
      <div class="signin">
        <p style="padding:10px; position: relative;">
          <span class="u_logo"></span>
          <input class="ipt" type="text" name='account' placeholder="请输入用户名" value="">
        </p>
        <p style="padding:10px;position: relative;">
          <span class="p_logo"></span>
          <input class="ipt" id="password2" name='password' type="password" placeholder="请输入密码" value="">
        </p>
        <p style="padding:20px 38px;position: relative">
          <label style="float: left">
            <input type="checkbox" value="" id="auto" name='auto' checked='1'>
            <span class="remember">Remember Me</span>
          </label>
          <!--<a class="forget" href="#">忘记密码？</a>-->
        </p>
        <p style="padding:10px;clear: both">
        <input type="submit" value='马上登录' id='login' class="loginBtn"/>
        </p>
      </div>
    </form>
  </div>
</div>

</body>
</html>