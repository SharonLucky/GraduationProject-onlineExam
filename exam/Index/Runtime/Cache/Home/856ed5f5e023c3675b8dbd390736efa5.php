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
<script type="text/javascript">

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
      <li><a href="<?php echo U('Index/index');?>">首页</a></li>
      <li><a href="<?php echo U('Test/examItem');?>">查看题库</a></li>
      <li class="active"><a href="<?php echo U('Test/index');?>">在线考试</a></li>
      <li><a href="queryScore.html">成绩查询</a></li>
      <li><a href="exchangeForum.html">交流论坛</a></li>
      <li><a href="contactUs.html">联系我们</a></li>
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
<div class="container" id="courseSelected">
  <div class="row">
    <div class="span8 offset-2">
      <div class="course-nav-hd">
        <span>全部课程</span>
      </div>
      <div class="course-nav-row">
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
      </div>
      <div class="course-list">
        <ul>
          <li class="course-one">
            <a href="testBeforeRead.html">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="134" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="testBeforeRead.html">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="135" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="testBeforeRead.html">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="135" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="testBeforeRead.html">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="135" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>

          <li class="course-one">
            <a href="/view/465">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="134" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="#">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="135" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="#">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="135" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
              </div>
                <span class="time-label">
                  开始考试
                </span>
            </a>
          </li>
          <li class="course-one">
            <a href="#">
              <div class="course-list-img">
                <img src="http://img.mukewang.com/55f147640001ae6406000338-240-135.jpg" width="230" height="135" alt="Spring MVC拦截器">
              </div>
              <h5>
                <span>Spring MVC拦截器</span>
              </h5>
              <div class="tips">
                <p class="text-ellipsis">Spring MVC拦截器的期末考查</p>
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

<div class="container" id="testBeforeRead">
  <div class="row">
    <div class="span5 offset4">
      <p class="text-primary text-right">
        <span class="test-title"><b>考试科目 : </b>JAVA</span>
        <span class="test-title"><b>考试类型 : </b>正常考试</span>
      </p>
    </div>
    <hr>
  </div>
  <div class="row">
    <div class="span8 offset2">
      <div class="panel panel-info">
        <div class="panel-heading">
          <i class="btn-lg glyphicon glyphicon-hand-right"></i>
          <span class="panel-title">请仔细阅读考前须知：</span>
        </div>
        <div class="panel-body">
          <div class="test-content">
            <p>一、考试时间 : 150分钟</p>

            <p>二、考试总分 : 100分</p>

            <p>三、考试题型 : 选择题20道共60分、判断题10道共10分、填空题5道共10分</p>

            <p>四、注意事项 :</p>

            <p>1、开始考试后，请确定试卷的完整性，如发现问题请及时与管理员联系;</p>

            <p>2、考试期间，请保持公正的原则进行作答，不得查阅相关资料;</p>

            <p>3、考试要独立完成，不能交头接耳、互传纸条等;</p>

            <p>4、考试前考生必须清理干净座位周围及键盘下面，否则开考后发现有资料的，终止考试，并按作弊处理;</p>

            <p>5、提醒考生，一定要在规定考试时间结束前自行交卷，避免因考试时间用完，屏幕被锁而导致部分答题结果没有保存;</p>

            <p>6、进入考试须知界面后，考生只有选择“已阅读”后，“开始考试并计时”按钮才能使用，单击“开始考试并计时”后，就可以进入考试界面，开始作答;</p>
            <br>

            <p><input type="checkbox" name="agreeTest" style="margin:10px 10px auto auto">我已阅读并同意上述规定</p>
          </div>
        </div>
        <div class="testBtnGroup">
        <span class="test-btn">
          <a class="btn btn-info" href="testPaper.html">开始考试</a><!--disabled="true"-->
          </span>
        <span class="test-btn">
          <a class="btn btn-default" href="onlineTest.html">返回上层</a>
        </span>
        </div>
      </div>
      <!--系统随机抽卷完成，请点击确定开始作答。然后下面有个进度条-->
    </div>
  </div>
</div>
</body>
</html>