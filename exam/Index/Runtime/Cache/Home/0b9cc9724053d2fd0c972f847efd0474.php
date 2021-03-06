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
      <li class="active"><a href="<?php echo U('Paper/paper_exam');?>">在线考试</a></li>
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
<div class="container" id="courseSelected">
  <div class="row">
    <div class="span8 offset-2">
      <div class="course-nav-hd">
        <span>全部课程</span>
      </div>
      <!--专业分类-->
     <!-- <div class="course-nav-row">
        <div class="hd l">专业:</div>
        <div class="bd">
          <ul>
            <li class="course-nav-item on"><a href="/course/list">全部</a></li>
            <li class="course-nav-item"><a href="/course/list/rj" data-id="1" data-ct="rj">软件工程</a></li>
            <li class="course-nav-item"><a href="/course/list/xa" data-id="2" data-ct="xa">信息安全</a></li>
            <li class="course-nav-item"><a href="/course/list/jsj" data-id="3" data-ct="jsj">计算机科学</a></li>
            <li class="course-nav-item"><a href="/course/list/li" data-id="4" data-ct="dayi">物联网工程</a></li>
            <li class="course-nav-item"><a href="/course/list/fa" data-id="5" data-ct="dayi">嵌入式软件</a></li>
            <li class="course-nav-item"><a href="/course/list/yao" data-id="6" data-ct="dayi">通信工程</a></li>
          </ul>
        </div>
      </div>-->
      <!--考试科目List-->
      <div class="course-list">
        <ul>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'Android'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/android.jpg" width="230" height="134"
                     alt="Android在线考试">
              </div>
              <h5>
                <span>Android攻城狮</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Android开发领域技巧测验</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'C'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/C.jpg" width="230" height="135"
                     alt="C语言在线考试">
              </div>
              <h5>
                <span>C语言</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">进入编程世界的必修课-C语言</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'JAVA'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/Java.jpg" width="230" height="135"
                     alt="Java在线考试">
              </div>
              <h5>
                <span>深入浅出Java</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Java开发中你必须懂得常用技能</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'C++'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/Cjiajia.jpg" width="230" height="135"
                     alt="C++在线考试">
              </div>
              <h5>
                <span>C++远征</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">C++亮点技能一键get</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>

          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'Linux'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/Linux.jpg" width="230" height="134"
                     alt="Linux在线考试">
              </div>
              <h5>
                <span>Linux达人养成</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Linux开发者的生存指南</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'C#'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/cshop.jpg" width="230" height="135"
                     alt="C#在线考试">
              </div>
              <h5>
                <span>C#开发</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">带你进入C#的神奇世界</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'MySQL'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/mysql" width="230" height="135"
                     alt="mysql在线考试">
              </div>
              <h5>
                <span>Mysql那些事儿</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">DBA和开发人员必备技能</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'Python'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/Python.jpg" width="230" height="135"
                     alt="Python在线考试">
              </div>
              <h5>
                <span>Python初体验</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">未来您要会的优雅、明确、简单语言</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="<?php echo U('paperGetType', array('type' => 'PHP'));?>">
              <div class="course-list-img">
                <img src="/exam/Public/images/courseBig/php.jpg" width="230" height="135"
                     alt="PHP在线考试">
              </div>
              <h5>
                <span>PHP初体验</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">你还不知道PHP吗，快快加入我们吧。</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </div>
</div>
</body>
</html>