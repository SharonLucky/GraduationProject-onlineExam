<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>查看题库</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/Hover.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/testTip.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body style="background-color: #edeff0">

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
      <li class="active"><a href="<?php echo U('Paper/paper_list');?>">查看题库</a></li>
      <li><a href="<?php echo U('Paper/paper_exam');?>">在线考试</a></li>
      <li><a href="<?php echo U('Paper/user_score');?>">成绩查询</a></li>
      <li><a href="<?php echo U('Contact/index');?>">联系我们</a></li>
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
    </ul>
  </div>
</nav>

<!--先选择题目的类型-->

<div class="container">
  <div class="text-center listTitle">
    <h4>请选择要查看的题库类型：</h4>
    <i class="glyphicon glyphicon-chevron-down"></i>
  </div>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3">
        <div title="欢迎学习Android课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Android'));?>">
            <i class="iconfont " style="color: #97C024">&#xe601</i>
            <span>Android</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习MYSQL课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'MYSQL'));?>">
            <i class="iconfont" style="color: #468AE3">&#xe604</i>
            <span>MYSQL</span>
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div title="欢迎学习Java课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'JAVA'));?>">
            <i class="iconfont" style="color: orangered">&#xe615</i>
            <span>JAVA</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习ASP.NET课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'ASP.NET'));?>">
            <i class="iconfont" style="color: #0080AB">&#xe614</i>
            <span>ASP.NET</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div title="欢迎学习C++课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'C++'));?>">
            <i class="iconfont" style="color: #2B7D4F">&#xe60d</i>
            <span>C++</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习编译原理课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => '编译原理'));?>">
            <i class="iconfont" style="color: #96ce54">&#xe600</i>
            <span>编译原理</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习XML课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'XML'));?>">
            <i class="iconfont" style="color: #39A9A4">&#xe603</i>
            <span>XML</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习C#课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'C#'));?>">
            <i class="iconfont" style="color: #672179">&#xe616</i>
            <span>C#</span>
          </a>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-3">
        <div title="欢迎学习C语言课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'C'));?>">
            <i class="iconfont" style="color: #2CA0C5">&#xe606</i>
            <span>C</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习JavaScript课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Javascript'));?>">
            <i class="iconfont" style="color: #53C8CE">&#xe609</i>
            <span>JavaScript</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习Ruby课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Ruby'));?>">
            <i class="iconfont" style="color: #D91088">&#xe608</i>
            <span>Ruby</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习操作系统课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => '操作系统'));?>">
            <i class="iconfont" style="color: #3085CD">&#xe60b</i>
            <span>操作系统</span>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3">
        <div title="欢迎学习Linux课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Linux'));?>">
            <i class="iconfont" style="color: #F4BE02">&#xe60c</i>
            <span>Linux</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习PHP课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'PHP'));?>">
            <i class="iconfont" style="color:#5A68A5">&#xe607</i>
            <span>PHP</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习Redis课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Redis'));?>">
            <i class="iconfont" style="color: red">&#xe602</i>
            <span>Redis</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习Nginx课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Nginx'));?>">
            <i class="iconfont" style="color: #369754">&#xe611</i>
            <span>Nginx</span>
          </a>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-md-3">
        <div title="欢迎学习Git课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Git'));?>">
            <i class="iconfont" style="color: #EE5038">&#xe60a</i>
            <span>Git</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习Python课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'Python'));?>">
            <i class="iconfont" style="color: #FAD047">&#xe605;</i>
            <span>Python</span>
          </a>
        </div>
      </div>
      <div class="col-md-3">
        <div title="欢迎学习HTML5课程" class="courseBox">
          <a href="<?php echo U('paperList', array('type' => 'HTML5'));?>">
            <i class="iconfont" style="color:#E44C28">&#xe613</i>
            <span>HTML5</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">

  /*给每个课程标签添加hover类和click事件*/
  $(".courseBox").addClass("hvr-wobble-vertical");
  /*$(".courseBox").click(function () {
   load_list(1, $(this).children('span').html());
   })*/

  /*点击查看正确答案*/
  /* function show_answer(answer) {
   $("#mymodal").modal("toggle");
   }*/

  /*post页数和课程名称*/
  /* function load_list(page_now, type) {
   window.scroll(0, 0)
   $.ajax({
   type: "POST",
   url: "/exam/index.php/Home/Paper/paperList",
   data: "type=" + encodeURIComponent(type) + "&page_now=" + page_now + "&act=query",
   dataType: "json",
   success: function (result) {
   //console.log(result.content);
   $('#list_table').html(result.content);
   }
   })
   }*/
</script>
</body>
</html>