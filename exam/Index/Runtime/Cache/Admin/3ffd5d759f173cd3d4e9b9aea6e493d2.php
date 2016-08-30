<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin登录</title>
  <link rel="stylesheet" type="text/css" href="/exam/Public/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/exam/Public/css/adminlogin.css">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
</head>
<body>
<h2 class="text-center">后台管理员登录</h2>
<form action="<?php echo U(login);?>" method="post" name="login">
<div class='login'>
  <div class='login_title'>Login to your account</div>
  <div class='login_fields'>
    <div class='login_fields__user'>
      <div class="icon">
        <span class="glyphicon glyphicon-user"></span>
      </div>
      <input placeholder='Username' type='text' id="adminname" name="adminname">
      <div class='validation'>
        <img src='/exam/Public/images/tick.png'>
      </div>
      </input>
    </div>

    <div class='login_fields__password'>
      <div class='icon'>
        <span class="glyphicon glyphicon-lock"></span>
      </div>
      <input placeholder='Password' type='password' name="password" id="password">
      <div class='validation'>
        <img src='/exam/Public/images/tick.png'>
      </div>
    </div>
    <div class='login_fields__submit'>
      <input type='submit' value='Log In'>
    </div>
  </div>
</div>
</form>
<script>
  $('input[type="text"],input[type="password"]').focus(function () {
    $(this).prev().animate({'opacity': '0.8'}, 200);
  });
  $('input[type="text"],input[type="password"]').blur(function () {
    $(this).prev().animate({'opacity': '.5'}, 200);
  });
  $('input[type="text"],input[type="password"]').keyup(function () {
    if (!$(this).val() == '') {
      $(this).next().animate({
        'opacity': '1',
        'right': '30'
      }, 200);
    } else {
      $(this).next().animate({
        'opacity': '0',
        'right': '20'
      }, 200);
    }
  });

</script>
</body>
</html>