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
      <li class="active"><a href="<?php echo U('Test/paperList');?>">查看题库</a></li>
      <li><a href="<?php echo U('Test/paperExam');?>">在线考试</a></li>
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

<div clsss="container">
  <div id="list_table">
    {if $type}
    <div class="container paper-content">
      <div class="single_paper">
        <table class="table table-striped font">
          {foreach from=$paper_list item=paper key=no}
          <tr>
            <td>
              <div class="question">
                <span class="question_info">[<?php echo ($no+1); ?>].<?php echo ($paper["question"]); ?></span>
                <button onclick="show_answer('<?php echo ($paper["right_answer"]); ?>')" class="btn btn-info show_answer right">查看答案
                </button>
              </div>
              <div class="answer_info">
                <span class="answer">A.<?php echo ($paper["answer_a"]); ?></span>
                <span class="answer">B.<?php echo ($paper["answer_b"]); ?></span>
                <span class="answer">C.<?php echo ($paper["answer_c"]); ?></span>
                <span class="answer">D.<?php echo ($paper["answer_d"]); ?></span>
              </div>
            </td>
          </tr>
          {foreachelse}
          <tr>
            <td><?php echo ($type); ?>题库中还没有题目</td>
          </tr>
          {/foreach}
        </table>
        <ul class="pagination">
          <li><a href="javascript:load_list(1,'<?php echo ($type); ?>')">«第一页</a></li>
          {if $page_now-2>0}
          <li><a href="javascript:load_list(<?php echo ($page_now-2); ?>,'<?php echo ($type); ?>')"><?php echo ($page_now-2); ?></a></li>
          {/if}
          {if $page_now-1>0}
          <li><a href="javascript:load_list(<?php echo ($page_now-1); ?>,'<?php echo ($type); ?>')"><?php echo ($page_now-1); ?></a></li>
          {/if}
          <li class="active"><a href="#"><?php echo ($page_now); ?></a></li>
          {if $page_now+1<=$page_count}
          <li><a href="javascript:load_list(<?php echo ($page_now+1); ?>,'<?php echo ($type); ?>')"><?php echo ($page_now+1); ?></a></li>
          {/if}
          {if $page_now+2<=$page_count}
          <li><a href="javascript:load_list(<?php echo ($page_now+2); ?>,'<?php echo ($type); ?>')"><?php echo ($page_now+2); ?></a></li>
          {/if}
          <li><a href="javascript:load_list(<?php echo ($page_count); ?>,'<?php echo ($type); ?>')">最后一页»</a></li>
        </ul>
      </div>
    </div>
    {else}
    <div class="container paper-content font">
      <div class="paper_tip">请选择要查看的题库类型：</div>
      <div class="show-paper-btns">
        <button class="btn btn-info" onclick="load_list(1,'PHP')">PHP
        </button>
        <button class="btn btn-info" onclick="load_list(1,'JAVA')">JAVA
        </button>
        <button class="btn btn-info" onclick="load_list(1,'C++')">C++
        </button>
        <button class="btn btn-info" onclick="load_list(1,'MYSQL')">MYSQL
        </button>
      </div>
    </div>
    {/if}
  </div>
  {if !$query}
  <div class="modal font" id="mymodal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
              class="sr-only">Close</span></button>
          <h4 class="modal-title" id="result_title"></h4>
        </div>
        <div class="modal-body">
          <p id="result_msg"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">关闭</button>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  function show_answer(answer) {
    $('#result_title').html('参考答案')
    $('#result_msg').html('答案:' + answer + ',你答对了吗？');
    $("#mymodal").modal("toggle");
  }

  function load_list(page_now, type) {
    $.ajax({
      type: "POST",
      url: "/exam/index.php/Home/Test/paperList",
      data: "type=" + encodeURIComponent(type) + "&page_now=" + page_now + "&act=query",
      dataType: "json",
      success: function (result) {
        $('#list_table').html(result.content);
      }
    })
  }
</script>
</body>
</html>