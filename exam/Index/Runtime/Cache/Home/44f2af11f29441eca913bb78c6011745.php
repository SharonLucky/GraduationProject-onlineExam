<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>系统公告</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/index.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<script>
  setInterval(scollMessage, 2800);
  function scollMessage() {
    $("#scollMessage ul").animate({top: "-=28px"}, 2000, "swing", function () {
      console.log(12);
      if ($("#scollMessage ul").position().top <= -84) {
        $("#scollMessage ul").css("top", '0');
      }
    })
  }
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
      <li class="active"><a href="<?php echo U('Notice/index');?>">系统公告</a></li>
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
<div class="container-fluid">
  <!--滚动Top Tips-->
  <div class="row">
    <div id="scollMessage">
      <ul>
        <li data-toggle="modal" data-target="#weihu">【维护】“考试中心”及“系统功能”相关数据更新说明<span>2016/1/14</span></li>
        <li data-toggle="modal" data-target="#zhongyaogonggao">【重要公告】填问卷
          赢红包（EXAM2015下半年满意度调研）<span>2016/3/8</span></li>
        <li data-toggle="modal" data-target="#tixing">
          【提醒】考试管理模块下“查看其他科目信息”和“微信公众号管理”功能不可见的说明<span>2016/4/1</span></li>
        <li data-toggle="modal" data-target="#fabu">【发布】5月10日晚在线考试系统V1.9.0版本发布内容通知<span>2016/5/14</span></li>
      </ul>
    </div>
    <!-- 【维护】模态框（Modal） -->
    <div class="modal fade" id="weihu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
              【维护】“考试中心”及“系统功能”相关数据更新说明
            </h4>
          </div>
          <div class="modal-body">
            尊敬的用户：<br>
            您好！<br>
            平台将在2016年1月14日22:00-30日01:00进行版本6.4.8发布维护，期间这考试成绩模块和历史数据导入功能无法使用，给您带来的不便，敬请谅解。<br>
            本次发布内容如下：<br>
            1、考试中心和系统功能增加对内容特殊字符串的校验；<br>
            2、客服中心增加物流公司：韵达快递；<br>
            3、个性化包裹解决“多个订单进行中”误备注的问题；<br>
            如有疑问，欢迎咨询客服<br>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">已读</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 【重要公告】模态框（Modal） -->
    <div class="modal fade" id="zhongyaogonggao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
              【重要公告】填问卷 赢红包（EXAM2015下半年满意度调研）
            </h4>
          </div>
          <div class="modal-body">
            尊敬的用户：
            大家好！
            为更好了解您对我们产品和服务反馈，我司将开展为期2周（2016年1月4日-1月15日）的满意度问卷收集工作帮助提升产品，优化服务。很荣幸邀请到您用几分钟时间帮忙填答这份问卷，本问卷所有数据仅用于统计分析，请您放心填写。您的反馈是我们持续改善产品和服务的动力，谢谢您的帮助与支持！问卷地址
            并为感谢您对我们信息反馈，我们已准备红包及实物奖品，快来填写赢取小奖品吧！
            如有疑问，欢迎联系客服咨询
            EXAM团队
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">已读</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal -->
    </div>
    <!-- 【提醒】模态框（Modal） -->
    <div class="modal fade" id="tixing" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
              【提醒】考试管理模块下“查看其他科目信息”和“微信公众号管理”功能不可见的说明
            </h4>
          </div>
          <div class="modal-body">
            尊敬的用户：
            您好！
            淘宝对卡券平台发券接口做了相应调整，目前发送速度非常慢，而即将到来的年货节也是一轮优惠券发送高峰，鉴于此情况数云诚恳的建议您继续通过内容管理发领取式优惠券或者其他方式来让买家领取实现活动效果。如有优惠券最新进展数云亦会继续同步通知。
            如有疑问，欢迎联系客服咨询
            EXAM团队
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">已读</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          </div>
        </div>
      </div>
    </div>
    <!-- 【发布】模态框（Modal） -->
    <div class="modal fade" id="fabu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">
              【发布】5月10日晚在线考试系统V1.9.0版本发布内容通知
            </h4>
          </div>
          <div class="modal-body">
            尊敬的用户：<br>
            您好！
            平台将在2016年1月5号18时~19时进行忠诚度V1.9.0版本发布，期间只有手淘积分兑换的手机页面会有5分钟无法使用，不会影响到您操作和登录数云平台。
            本次优化发布主要内容如下：
            1、等级规则设置的过滤器条件设置增加“累积订单金额（不含邮费）、单笔订单金额（不含邮费）”的选项；
            2、积分池连接池性能；
            3、其他界面优化。
            如有疑问，欢迎联系客服咨询
            EXAM团队
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary">已读</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!--公告Top Three部分-->
  <div class="row floatLeft topThree">
    <div class="col-md-4">
      <div class="layout layout_left">
        <h4>【最新】JAVA考试功能4月10日起开始上线</h4>

        <div>
          <p>亲爱的用户，你好，本系统新增的JAVA模块的考试功能已经上线了。从4月10日起可以开始使用该功能，欢迎各位用户们积极学习，体验使用。</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="layout layout_center">
        <h4>【最新】软件工程系Android考试6月10日截止</h4>

        <div>
          <p>即日起到2016年6月10日,开放软件工程系Android科目的在线考试功能,请相关用户抓紧时间报名参加考试,考试材料也将同步在网上发布。</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="layout layout_right">
        <h4>【最新】数字逻辑上机测验6月8日开始</h4>

        <div>
          <p>通知：6月8日开始，数字逻辑上机测验考试开始了，平时作业也将同时检查,请相关用户做好考试资料的下载和考试内容的复习工作。</p>
        </div>
      </div>
    </div>

    <!--公告帖子部分-->
    <div class="row">
      <div class="col-md-12">
        <div class="notice">
          <h4  data-toggle="collapse" data-target="#zhiding">
            <span class="orange">【置顶】</span>本系统相关规定须知
          </h4>
          <div id="zhiding" class="collapse">
            本系统主要用于在线考试,给用户提供一个测试相关技能的水平以及掌握程度的平台.系统将会不断推出新的功能,给用户更好地体验.
          </div>
        </div>
      </div>

      <?php if(is_array($noticeInfo)): $i = 0; $__LIST__ = $noticeInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$notice): $mod = ($i % 2 );++$i;?><div class="col-md-12">
          <div class="notice">
            <h4 data-toggle="collapse" data-target="#demo<?php echo ($notice["id"]); ?>">
              <span class="green">【公告】</span><?php echo ($notice["title"]); ?>
            </h4>

            <div id="demo<?php echo ($notice["id"]); ?>" class="collapse">
              <?php echo ($notice["content"]); ?>
              <p class="text-right martop15">
                <span class="green"><?php echo ($notice["admin"]); ?></span>
                <span>发表于</span><?php echo ($notice["time"]); ?>
              </p>
            </div>
          </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
  </div>

  <!--右侧AD部分-->
  <div class="col-md-3 floatLeft">
    <!--广告图片-->
    <div class="layout adView">
      <img src="/exam/Public/images/adBg.jpg">
    </div>
    <div class="layout adView">
      <div class="adBox">
        <p>热门课程</p>
        <ul>
          <li>About-JAVA</li>
          <li>About-C++</li>
          <li>About-Android</li>
          <li>About-C#</li>
          <li>About-操作系统</li>
        </ul>
      </div>
    </div>
    <div class="layout adView">
      <div class="adBox">
        <p>相关链接</p>
        <ul>
          <li><a href="https://teamtreehouse.com/" target="_blank">Treehouse-在线视频教育网站</a></li>
          <li><a href="http://www.Codeschool.com/" target="_blank">Codeschool-在线编程学习网站</a></li>
          <li><a href="http://www.w3school.com.cn/" target="_blank">W3school-各种语言基础学习平台</a></li>
          <li><a href="http://www.fenby.com/" target="_blank">Fenby-初学者的编程练习平台</a></li>
          <li><a href="http://www.imooc.com/" target="_blank">慕课网-程序员的梦工厂</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
</body>
</html>