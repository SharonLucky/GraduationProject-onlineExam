<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>在线考试</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/testTip.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
  <style>
    .count-down {
      text-align: center;
      font-size: 30px;
      background: #37BC9B;
      color: #fff;
      -moz-border-radius: 6px;
      -webkit-border-radius: 6px;
      border-radius: 6px;
      width: 40%;
      margin: 0 auto;
    }

    .paper-header {
      height: 50px;
      margin-bottom:8px;
    }

    .paper-type {
      font-size: 20px;
      font-weight: bold;
      color: #009EE7;
    }

    .type {
      background: #8CADCA;
      color: #fff;
      display: inline-block;
      width: 100px;
      text-align: center;
      margin-left: 10px;
      -moz-border-radius: 6px;
      -webkit-border-radius: 6px;
      border-radius: 6px;
    }

    #paper_now {
      font-size: 20px;
      color: #009EE7;
    }

    #paper .paper-question {
      font-size: 20px;
      margin-bottom: 20px;
    }

    #paper .paper-answer {
      display: block;
      font-weight: normal;
      background: #fff;
      margin-bottom: 20px;
      height: 60px;
      line-height: 60px;
      -moz-border-radius: 6px;
      -webkit-border-radius: 6px;
      border-radius: 6px;
      font-size: 15px;
      padding-left: 10px;
      border: 2px solid #fff;
    }
    .next_pre{
      margin:20px 15px;
    }
    .next_pre button{
      margin:0 12px;
    }
  </style>
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
      <li><a href="<?php echo U('Paper/paper_list');?>">查看题库</a></li>
      <li class="active"><a href="<?php echo U('Paper/paper_exam');?>">在线考试</a></li>
      <li><a href="<?php echo U('Paper/user_score');?>">成绩查询</a></li>
      <li><a href="exchangeForum.html">交流论坛</a></li>
      <li><a href="<?php echo U('Contact/index');?>">联系我们</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-bell"></span></a></li>
      <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-cog" style="margin-right:5px;"></span>
          <b class="caret"></b>
        </a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo U('UserSetting/index');?>">个人中心</a></li>
          <li class="divider"></li>
          <li><a href="<?php echo U('Index/loginOut');?>">退出登录</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<!--在线考试页面-->
<div class="container" id="exam_paper">
  <div class="col-md-12">

    <!--倒计时-->
    <div class="row" style="margin-bottom:20px">
      <div class="col-md-8 col-md-offset-2">
        <div class="count-down">
          倒计时<span id="time_left">00:15:00</span>
        </div>
      </div>
    </div>

    <div class="row" style="border:solid 1px red">
      <div class="col-md-10 col-md-offset-1" style="border:solid 1px blue">
        <!--题型-->
        <div class="paper-header">
          <div class="paper-type pull-left">
            单选题<span class="type" id="type">PHP</span>
          </div>
          <div class="pull-right">
            <span id="paper_now">1</span>/20
          </div>
        </div>

        <!--插入试题-->
        <div id="papers"></div>
      </div>
    </div>

    <div class="row" style="border:solid 1px red">
      <div class="col-md-4 col-md-offset-4" style="border:solid 1px blue">
        <!--上一题/下一题翻页-->
        <div class="text-center next_pre">
          <button type="button" class="btn btn-default" id="previous">上一题</button>
          <button type="button" class="btn btn-info" id="next">下一题</button>
          <button type="button" class="btn btn-success"  id="commit_btn" onclick="commit_paper()">提交试卷</button>
        </div>


      </div>
    </div>

  </div>

</div>
</div>


</body>
</html>