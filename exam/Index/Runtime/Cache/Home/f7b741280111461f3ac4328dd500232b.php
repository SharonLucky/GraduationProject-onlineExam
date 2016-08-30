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
<!--考前阅读-->
<div class="container" id="testBeforeRead">
  <!--考前须知标题-->
  <div class="row">
    <div class="span5 offset4">
      <p class="text-primary text-right">
          <span id="typeTitle" class="test-title">
            <b>考试科目 : </b>
            <span id="type"><?php echo ($type); ?></span>
          </span>
        <span class="test-title"><b>试卷总分 : </b><?php echo ($paperinfo[grade]); ?></span>
      </p>
    </div>
    <hr>
  </div>

  <!--考前须知内容-->
  <div class="row">
    <div class="span8 offset2">
      <div class="panel panel-info">
        <div class="panel-heading">
          <i class="btn-lg glyphicon glyphicon-hand-right"></i>
          <span class="panel-title">请仔细阅读考前须知：</span>
        </div>
        <div class="panel-body">
          <div class="test-content">
            <p>一、考试时间 :<?php echo ($paperinfo[time]/60); ?>分钟</p>

            <p>二、考试题型 : 选择题20道共80分、判断题10道共20分</p>

            <p>三、注意事项 :</p>
            <p>1、为了更好地用户体验,请使用谷歌或火狐浏览器进行作答;</p>

            <p>2、开始考试后，请确定试卷的完整性，如发现问题请及时与管理员联系;</p>

            <p>3、如果答题过程中因电源、网络故障等造成中断，请退出并在重新进入考试；</p>

            <p>4、考试前请关闭其他浏览器窗口，关闭可能弹窗的应用如QQ、屏保等，考试中不要切换到考试窗口之外的区域；</p>

            <p>5、提醒考生，一定要在规定考试时间结束前自行交卷，避免因考试时间用完，屏幕被锁而导致部分答题结果没有保存;</p>

            <br>

            <p><input type="checkbox" name="has_read" id="has_read" style="margin:10px 10px auto auto">我已阅读并同意上述规定</p>
          </div>
        </div>
        <div class="testBtnGroup">
        <span class="test-btn">
          <button class="btn btn-info" type="button" onclick="begin_exam()">开始考试</button><!--disabled="true"-->
          </span>
        <span class="test-btn">
          <a class="btn btn-default" href="<?php echo U('Paper/paper_exam');?>">返回上层</a>
        </span>
        </div>
      </div>
      <!--系统随机抽卷完成，请点击确定开始作答。然后下面有个进度条-->
    </div>
  </div>
</div>
<!--弹出模拟框提示勾选-->
<div class="modal fade" id="mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title text-muted" id="result_title" style="font-size: 16px;">提示信息Tips：</h4>
      </div>
      <div class="modal-body">
        <p class="text-center text-primary" id="result_msg"></p>
      </div>
    </div>
  </div>
</div>
<!--考试题-->
<div class="container" id="exam_paper" style="display: none">
  <div class="col-md-12">
    <!--倒计时-->
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="count-down">
          倒计时<span id="time_left"></span>
          <span id="time" style="display: none"><?php echo ($paperinfo[time]); ?></span>
        </div>
      </div>
    </div>
    <!--题型-->
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="paper-header">
          <div class="paper-type pull-left">
            考试题:<span class="type"><?php echo ($type); ?></span>
          </div>
          <div class="pull-right">
            <span id="paper_now">1</span>/20
          </div>
        </div>

        <!--插入试题-->
        <div id="papers"></div>
      </div>
    </div>
    <!--上一题/下一题翻页-->
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="text-center next_pre">
          <button type="button" class="btn btn-default" id="previous">上一题</button>
          <button type="button" class="btn btn-info" id="next">下一题</button>
          <button type="button" id="commit_btn" class="btn btn-success" style="display:none" onclick="commit_paper()">
            提交试卷
          </button>
        </div>

      </div>
    </div>
  </div>
</div>
<!--考试及格-->
<div class="container-fluid" id="success" style="display: none">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="testTipWrap">
        <img src="/exam/Public/images/success.png">
        <div class="testRightText">
          <h1 class="successBg"></h1>
          <h2>恭喜！你的成绩是：<span class="score"></span></h2>
          <p>“ 就算老师上课讲的是个毛线，我也能将它织成毛衣！哈哈 ”</p>
          <a href="<?php echo U('Paper/paper_exam');?>"><p class="text-center">返回营地-></p></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!--考试不及格-->
<div class="container-fluid" id="fail" style="display: none">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="testTipWrap">
        <img src="/exam/Public/images/fail.png">
        <div class="testRightText">
          <h1 class="failBg"></h1>
          <h2>很遗憾！你的成绩是：<span class="score"></span></h2>
          <p>“ 作为曾经的学霸，我只是在从学渣世界返回的时候迷路了而已 ”</p>
          <a href="<?php echo U('Paper/paper_exam');?>"><p class="text-center">返回营地-></p></a>
        </div>
      </div>
    </div>
  </div>
  </div>
  <script>
    /*定义全局变量*/
    var h, m, s, hstr, mstr, sstr, timestr;
    var etime,usetime;//考试剩余时间和所用时间
    var str = '';//考试题存放
    var correct = [];//正确答案存放

    var totalTime = $("#time").html(); //总秒数
    var type = $("#type").html();//获取考试类型

    /*考试倒计时*/
    function begin() {
       etime=totalTime;
      setInterval(function () {
        if (etime == '0') {
          commit_paper();
          console.log(2);
        }
        h = Math.floor(etime / 3600);    //时
        m = Math.floor(etime / 60) % 60; //分
        s = Math.floor(etime % 60);      //秒

        h < 0 ? h = 0 : h = h;
        m < 0 ? m = 0 : m = m;
        s < 0 ? s = 0 : s = s;

        h.toString().length < 2 ? hstr = "0" + h.toString() : hstr = h; //1显示01
        m.toString().length < 2 ? mstr = "0" + m.toString() : mstr = m; //1显示01
        s.toString().length < 2 ? sstr = "0" + s.toString() : sstr = s; //1显示01

        timestr = hstr + ":" + mstr + ":" + sstr;
        $('#time_left').html(timestr);

        etime = etime - 1;
        usetime=totalTime-etime;
         //console.log(etime);
        //console.log(usetime);
      }, 1000);

      show_paper(1);

    }

    /*开始考试按钮*/
    function begin_exam() {
      console.log(type);
      console.log(etime);
      var is_read = $('#has_read');

      if (!is_read.prop('checked')) {
        $('#result_msg').html("Don't hurry , 请先仔细阅读考试注意事项");
        $("#mymodal").modal("toggle");
        return;
      }
      //异步获取试题
      $.ajax({
        type: 'POST',
        url: '/exam/index.php/Home/Paper/paperGet',
        data: 'type=' + type,
        dataType: 'JSON',
        success: function (result) {
          console.log(result);
          console.log(result.length);
          for (var i = 1; i <= result.length; i++) {
            var p = result[i - 1];
            correct.push(p.right_answer);

            str += "<div style='display:none' id='paper_" + i + "' datatype='" + p.randomNum + "'>";
            str += "<div class='paper-question'><span class='qusNum'>" + i + ".</span>" + p.question + "</div>";
            str += "<label class='paper-answer'><input type='radio' name='user_answer_" + i + "' value='A'>&nbsp;&nbsp;A、" + p.answer_A + "</label>";
            str += "<label class='paper-answer'><input type='radio' name='user_answer_" + i + "' value='B'>&nbsp;&nbsp;B、" + p.answer_B + "</label>"
            if (p.answer_C) {
              str += "<label class='paper-answer'><input type='radio' name='user_answer_" + i + "' value='C'>&nbsp;&nbsp;C、" + p.answer_C + "</label>";
              str += "<label class='paper-answer'><input type='radio' name='user_answer_" + i + "' value='D'>&nbsp;&nbsp;D、" + p.answer_D + "</label></div>";
            } else {
              str += "</div>"
            }
          }
          //console.log(correct);
          $('#papers').html(str);
          $('#paper_1').show();

        }
      })

      $('#testBeforeRead').hide();
      $('#exam_paper').show();
      $('body').css('background', '#edeff0')
      begin();

    }

    /*上下翻页按钮*/
    function show_paper(paper_num, paper_now) {
      console.log(56);
      if (paper_now) {
        $('#paper_' + paper_now).hide();
      }
      //$('#all_paper').show();
      $('#paper_' + paper_num).show();
      $('#paper_now').html(paper_num);
      //$('.qusNum').html(1+'.');

      if (paper_num - 1 > 0) {
        $('#previous').attr("onclick", "show_paper(" + (paper_num - 1) + "," + paper_num + ")");
      }
      if (paper_num + 1 <= 20) {
        $('#next').attr("onclick", "show_paper(" + (paper_num + 1) + "," + paper_num + ")");
      }
      if (paper_num == 20) {
        $('#commit_btn').show();
      } else {
        $('#commit_btn').hide();
      }
      $('.qusNum').html($('#paper_now').html() + '. ');
    }

    /*得到成绩分数*/
    function get_total_score() {
      var total_score = 0;
      for (var i = 1; i <= 20; i++) {
        var answer = document.getElementsByName("user_answer_" + i);
        var dataType = $('#paper_' + i).attr('dataType');
        for (var j = 0; j < answer.length; j++) {
          if (answer[j].checked) {
            //选择题答对+4分
            if (answer[j].value == correct[j] && dataType <= 100) {
              total_score += 4;
            }
            //判断题答对+2分
            if (answer[j].value == correct[j] && dataType > 100) {
              total_score += 2;
            }
          }

        }
      }
      return total_score;
    }

    /*提交成绩*/
    function commit_paper() {
      var total_score = get_total_score();
      $(".score").html(total_score);
      //var type1 = $('#type').html();

      console.log(usetime);
      console.log(type);
      /*切换背景,图片是白色*/
      $("body").css('background-color','white');
      if (total_score > 60) {
        $(".navbar-inverse,#testBeforeRead,#exam_paper,#fail").css("display", "none");
        $("#success").css("display", "block");
      } else {
        $(".navbar-inverse,#testBeforeRead,#exam_paper,#success").css("display", "none");
        $("#fail").css("display", "block");
      }
      $.ajax({
        type: "POST",
        url: "/exam/index.php/Home/Paper/paperCommit",
        data: "type=" + type+ "&total_score=" + total_score+"&usetime="+usetime,
        dataType: "json",
        success: function () {}
      });
    }
  </script>
</body>
</html>