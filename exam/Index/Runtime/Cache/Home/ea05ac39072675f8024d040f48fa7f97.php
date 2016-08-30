<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>查看题库</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/Hover.css" rel="stylesheet">
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


  <div clsss="container">
    <?php if($type): if($paper_list): ?><!--选取题库的标题-->
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-lg">
            <div class="text-center listTitle">
              <p class="orange ft23"><?php echo ($type); ?>题库</p>
            </div>
          </div>
        </div>
        <!--题库的内容-->
        <div class="row">
          <div class="col-md-10 col-md-offset-1">
            <!--考试题展示List-->
            <table class="table table-striped">
              <?php if(is_array($paper_list)): $i = 0; $__LIST__ = $paper_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$paper): $mod = ($i % 2 );++$i;?><tr>
                <td>
                  <div class="paperItem">
                    <div class="ft20">
                      <?php if($_GET['p']): ?><span class="paperItemNum"><?php echo ($_GET['p']*10-10+$i); ?></span>
                        <?php else: ?>
                        <span class="paperItemNum"><?php echo ($i); ?></span><?php endif; ?>

                      <span class="question_info"><?php echo ($paper["question"]); ?></span>
                      <button class="btn btn-info pull-right"  onclick="show_answer('<?php echo ($paper["id"]); ?>')">查看答案</button>
                    </div>
                    <div class="answer_info ">
                      <div class="answer"><span>A.</span><?php echo ($paper["answer_A"]); ?></div>
                      <div class="answer"><span>B.</span><?php echo ($paper["answer_B"]); ?></div>
                      <?php if($paper['answer_C'] != null): ?><div class="answer"><span>C.</span><?php echo ($paper["answer_C"]); ?></div><?php endif; ?>

                      <?php if($paper['answer_D'] != null): ?><div class="answer"><span>D.</span><?php echo ($paper["answer_D"]); ?></div><?php endif; ?>
                    </div>
                  </div>
                </td>
              </tr>
                <!--弹出的查看正确答案的模拟框-->
                <div class="modal" id="<?php echo ($paper["id"]); ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                        <h4 class="modal-title">参考答案</h4>
                      </div>
                      <div class="modal-body">
                        <p>答案是: <?php echo ($paper["right_answer"]); ?> , 你答对了吗？</p>
                      </div>
                    </div>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </table>

            <!--底部翻页-->
            <div style="text-align: center"><div class="page"><?php echo ($page); ?></div></div>

          </div>

        </div>
        <?php else: ?>
        <!--没有题目-->
        <div class="row">
          <div class="col-md-4 col-md-offset-4 col-lg">
            <div class="text-center listTitle">
              <p class="orange ft23"><?php echo ($type); ?>题库中还没有题目</p>
            </div>
          </div>
        </div><?php endif; endif; ?>
  </div>

  <script type="text/javascript">

    /*给每个课程标签添加hover类和click事件*/
    $(".courseBox").addClass("hvr-wobble-vertical");

    /*点击查看正确答案*/
    function show_answer(id) {
      $('#'+id).modal("toggle");
    }
  </script>

</body>
</html>