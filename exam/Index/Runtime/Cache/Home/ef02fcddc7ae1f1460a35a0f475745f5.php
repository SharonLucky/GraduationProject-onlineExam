<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <!--  <META http-equiv="Content-Type" content="text/html; charset=utf-8">-->
  <title>注册</title>
  <link href="/exam/Public/css/login.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/jquery-validate.js" type="text/javascript"></script>
  <script src="/exam/Public/js/register.js" type="text/javascript"></script>
  <script src="/exam/Public/js/vector.js" type="text/javascript"></script>

  <script type="text/javascript">
    var checkAccount = "<?php echo U('checkAccount');?>";
    var checkUname = "<?php echo U('checkUname');?>";
    var checkVerify = "<?php echo U('checkVerify');?>";
  </script>
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
      <a href="register.html" style="color:#3291d9;">注册</a>
      <a href="index.html" style="color:dimgrey;">登录</a>
      <span class="borderBottomRegister"></span>
    </div>
    <!--注册界面-->
    <form action="<?php echo U('runRegis');?>" method='post' name='register'>
      <div class="signup">
        <p style="padding:10px; position: relative;" id="siggg">
          <span class="u_logo"></span>
          <input class="ipt" type="text" name='account' id='account' placeholder="请输入用户名"  value="">
        </p>

        <p style="padding:10px;position: relative;">
          <span class="p_logo"></span>
          <input class="ipt" id="password" name="password" type="password" placeholder="请输入密码">
        </p>

        <p style="padding:10px;position: relative;">
          <span class="pa_logo"></span>
          <input class="ipt" id="passwordagain" name="passwordagain" type="password" placeholder="请确认密码">
        </p>
        <p style="padding:10px;position: relative;">
          <span class="pa_logo"></span>
          <input class="ipt" type="text" name='uname' id='uname' placeholder="请输入昵称"/>
        </p>
        <p style="padding:10px;position: relative;">
          <span class="y_logo"></span>
          <input class="ipt2" name='verify'  id='verify' type="text" placeholder="请输入验证码" value="">
          <img class="iptPic" src="<?php echo U('verify');?>" id='verify-img'>
        </p>
        <p style="padding:10px;position: relative;">
          <input class="loginBtn" type="submit" value='马上注册' id='regis'/>
        </p>
      </div>
    </form>
  </div>
</div>
</body>
</html>