<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head lang="en">
  <meta charset="UTF-8">
  <title>考试未通过</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/testTip.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<!--图片是success 和fail-->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="testTipWrap">
        <img src="images/fail.png">
        <div class="testRightText">
          <h1 class="failBg"></h1>
          <h2>很遗憾！你的成绩是：40分</h2>
          <p>“ 作为曾经的学霸，我只是在从学渣世界返回的时候迷路了而已 ”</p>
          <a href="onlineTest.html"><p class="text-center">返回首页-></p></a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>