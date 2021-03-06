<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>联系我们</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/Hover.css" rel="stylesheet">
  <link href="/exam/Public/css/contact.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/contact.js" type="text/javascript"></script>
</head>
<body>
<nav class="navbar navbar-inverse" role="navigation">
  <div class="navbar-header">
    <!--折叠展示块按钮-->
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target="#example-navbar-collapse">
      <span class="sr-only">切换导航</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Online examination system</a>
  </div>
  <div class="collapse navbar-collapse" id="example-navbar-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo U('Index/index');?>">首页</a></li>
      <li><a href="<?php echo U('Notice/index');?>">系统公告</a></li>
      <li><a href="<?php echo U('Paper/paper_list');?>">查看题库</a></li>
      <li><a href="<?php echo U('Paper/paper_exam');?>">在线考试</a></li>
      <li><a href="<?php echo U('Paper/user_score');?>">成绩查询</a></li>
      <li class="active"><a href="<?php echo U('Contact/index');?>">联系我们</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-bell"></span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- <span class="glyphicon glyphicon-cog" style="margin-right:5px;"></span>-->
           <?php echo ($loginName); ?>
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo U('UserSetting/index');?>">个人中心</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo U('Index/loginOut');?>">退出登录</a></li>
        </ul>
      </li>
      <!--<li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          欢迎你，{user}<b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo U('UserSetting/index');?>">个人中心</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo U('Index/loginOut');?>">退出登录</a></li>
        </ul>
      </li>-->
    </ul>
  </div>
</nav>

<!--背景图设置-->
<div class="contactBg">
  <img src="/exam/Public/images/contBg.jpg" alt="Responsive background image">

  <div class="contactBgText">
    <h1>'US'</h1>
    <p class="hvr-bounce-in">关于我们</p>
  </div>
</div>
<!--contact us-->
<section id="sendMes">
  <h2 class="text-center">Send Us a message</h2>

  <form id="contact-form" method="post" action="<?php echo U('contactSend');?>">
    <div class="col1">
      <input type="text" name="contactName" id="contactName" onblur="is_trueName($('#contactName'))" placeholder="Enter Your trueName" required>
      <input type="email" name="contactEmail" id="contactEmail" onblur="is_email($('#contactEmail'))" placeholder="Enter Your Email" required>
    </div>
    <div class="col2">
				<textarea name="message" id="message"  placeholder="Pop your message in here…" maxlength="200" required></textarea>
        <button class="contactSubmit" name="submit" type="submit" id="contact_submit">Send Message</button>
    </div>
  </form>
  </div>
  </div>
</section>
<!--Say Hello-->
<div class="content">
  <div class="wrap">
    <h2>Say Hello</h2>

    <p>We’d love to hear from you and answer any questions you may have. Send us an email, complete our project
      planner,
      follow us on Twitter & Dribbble.</p>
    <ul>
      <li>
        <a href="#" title="Send us an email"><span class="email"></span></a>
      </li>
      <li>
        <a href="#" title="Complete our Project Planner"><span class="planner"></span></a>
      </li>
      <li>
        <a href="#" title="Follow us on Twitter"><span class="twitter"></span></a>
      </li>
      <li>
        <a href="#" title="Follow us on Dribbble"><span class="dribbble"></span></a>
      </li>
    </ul>
  </div>
</div>

<footer>
  <p>© Copyright Supereight Studio Ltd. 2016. · All rights reserved. Registered in China · Company number 1234567</p>

  <p>Homegrown hosting by GongRui</p>
</footer>
</body>
</html>