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
    #all_paper .count-down{
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

    #all_paper .paper-header{
      height: 50px;
    }

    #all_paper .paper-type{
      font-size: 20px;
      font-weight: bold;
      color: #009EE7;
    }
    #all_paper .type{
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
    #paper_now{
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
  </style>
</head>
<body>


<!--在线考试页面-->
<div class="container" id="exam_paper" style="display: none">
  <div class="row">
    <div class="col-md-12">
      <div id="all_paper" style="border:solid 1px red">

        <div class="count-down">
          倒计时<span id="time_left">00:15:00</span>
        </div>

        <div class="paper-header">
          <div class="paper-type">
            单选题<span class="type" id="type">PHP</span>
          </div>
          <div class="pull-right">
            <span id="paper_now">1</span>/20
          </div>
        </div>
        <!--插入试题-->
        <div id="papers"></div>
        <!--button-->
        <div class="next_pre">
          <button type="button" class="btn btn-default" id="previous">上一题</button>
          <button type="button" class="btn btn-info" id="next">下一题</button>
        </div>

        <div class="right" style="display:none" id="commit_btn">
          <button type="button" class="btn btn-success" id="commit_paper" onclick="commit_paper()">提交试卷</button>
        </div>
      </div>
    </div>
  </div>
</div>






</body>
</html>