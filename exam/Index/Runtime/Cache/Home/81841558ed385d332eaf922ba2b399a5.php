<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Access-Control-Allow-Origin" content="*">
  <title>成绩查询</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
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
      <li><a href="<?php echo U('Paper/paper_list');?>">查看题库</a></li>
      <li><a href="<?php echo U('Paper/paper_exam');?>">在线考试</a></li>
      <li class="active"><a href="<?php echo U('Paper/user_score');?>">成绩查询</a></li>
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

<div class="container">
  <?php if($times > 0): ?><div class="row exam_times">
      <div class="col-md-5">
        参加了<span class="orange ft20 marLf10"><?php echo ($times); ?></span>次考试
      </div>
    </div>

    <?php else: ?>

    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="text-center martop15">您还未参加考试,没有成绩</div>
      </div>
    </div><?php endif; ?>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <?php if(is_array($user_score)): $i = 0; $__LIST__ = $user_score;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$score): $mod = ($i % 2 );++$i;?><div class="rightItem">
        <span class="dateShow">
          <b><?php echo (substr($score["exam_time"],0,4)); ?></b>
          <em><?php echo (substr($score["exam_time"],5,2)); ?>月<?php echo (substr($score["exam_time"],8,2)); ?>日</em>
          <em><?php echo (substr($score["exam_time"],11,8)); ?></em>
        </span>
          <div class="courseItemList">
            <ul>
              <li>
                <h3>试卷类型:<span><?php echo ($score["type"]); ?></span></h3>
                <?php if($score["total_score"] > 60): ?><div class="scoreTip ft20 orange">
                    考得不错，保持下去 <span class="glyphicon glyphicon-heart"></span>
                  </div>
                  <?php else: ?>
                  <div class="scoreTip ft20">
                    不理想哦，继续努力 <span class="glyphicon glyphicon-thumbs-up"></span>
                  </div><?php endif; ?>
                <div class="studyPoint">
                  成绩:<span class="hotred ft20"> <?php echo ($score["total_score"]); ?></span>分
                  <span class="marLf10">准确率:<span class="scorelv  ft20"><?php echo ($score["total_score"]); ?></span>%</span>
                  <span class="marLf10">用时:
                    <span class="hide hour">
                        <span class="scoreNum hour1 ft20 hourflag<?php echo ($i); ?>"></span>时
                    </span>
                    <span class="hide minute">
                      <span class="scoreNum minute1 ft20 minuteflag<?php echo ($i); ?>"></span>分
                      </span>
                    <span class="hide second">
                       <span class="scoreNum second1 ft20 secondflag<?php echo ($i); ?>"></span>秒
                    </span>
                  </span>
                  <span class="usetime usetime<?php echo ($i); ?>" style="display: none"><?php echo ($score["usetime"]); ?></span>
                </div>
              </li>
            </ul>
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>
</div>
</div>
<script>
  var hour, minute, second;
  //var etime = $(".usetime").html();
  //时分秒的显示
  function show(value,str) {
    if (value > 0) {
      $('.' + str).removeClass('hide');
    }
  }

  //将秒数转为时分秒
  for(var i=1;i<=$('.rightItem').length;i++){
    var etime = $(".usetime"+i).html();
    hour = Math.floor(etime / 3600);    //时
    minute = Math.floor(etime / 60) % 60; //分
    second = Math.floor(etime % 60);      //秒

    $('.hourflag'+i).html(hour);
    $('.minuteflag'+i).html(minute);
    $('.secondflag'+i).html(second);
    show(hour,'hour');
    show(minute,'minute');
    show(second,'second');
  }
</script>
</body>
</html>