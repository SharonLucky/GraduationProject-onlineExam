<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
  <title><?php echo (C("WEBNAME")); ?>-首页</title>
  <link href="/exam/Public/css/index.css" rel="stylesheet">
</head>
<body>
<script>

</script>
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
      <li class="active"><a href="<?php echo U('Index/index');?>">首页</a></li>
      <li><a href="<?php echo U('Notice/index');?>">系统公告</a></li>
      <li><a href="<?php echo U('Paper/paper_list');?>">查看题库</a></li>
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


<div class="container-fluid" style="margin-top:-20px;">
  <!--轮播图-->
  <div class="row">
    <div class="span12">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item  active">
            <img alt="picture3" src="/exam/Public/images/img1.png"/>
            <div class="carousel-caption">
              <h1>Creativity</h1>
              <p style="letter-spacing: 2px;margin:1.5em auto;">看,你的指尖,有改变世界的力量</p>
            </div>
          </div>
          <div class="item">
            <img alt="picture2" src="/exam/Public/images/img3.png"/>
            <div class="carousel-caption">
              <h1>学+(?)=会</h1>
              <p style="letter-spacing: 2px;margin:1.5em auto;">学与会,求与解,你只差一次实战</p>
            </div>
          </div>
          <div class="item">
            <img alt="picture1" src="/exam/Public/images/img2.png">
            <div class="carousel-caption">
              <h1>Super Dream</h1>
              <p style="letter-spacing: 2px;margin:1.5em auto;">十八般武艺,这里是你圆梦的练兵场</p>
            </div>
          </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" style="background-image: none" href="#carousel-example-generic" role="button"
           data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" style="background-image: none" href="#carousel-example-generic" role="button"
           data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
  <!--介绍部分-->
  <div class="row">
    <div class=" col-md-12">

    </div>
  </div>
</div>

<!--<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">

    </div>
    <div class="col-md-12"></div>
    <div class="col-md-12"></div>
  </div>
</div>-->
</body>
</html>