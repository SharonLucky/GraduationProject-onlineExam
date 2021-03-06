<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>个人中心</title>
  <link href="/exam/Public/css/bootstrap.min.css" rel="stylesheet">
  <link href="/exam/Public/css/common.css" rel="stylesheet">
  <link href="/exam/Public/css/user.css" rel="stylesheet">
  <link href="/exam/Public/Uploadify/uploadify.css" rel="stylesheet">
  <script src="/exam/Public/js/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="/exam/Public/js/jquery-validate.js" type="text/javascript"></script>
  <script src="/exam/Public/js/bootstrap.min.js" type="text/javascript"></script>
  <script src='/exam/Public/Uploadify/jquery.uploadify.min.js' type="text/javascript"></script>
  <script src="/exam/Public/js/city.js" type="text/javascript"></script>
  <script src="/exam/Public/js/edit.js" type="text/javascript"></script>
  <style>
    #fa
  </style>
</head>
<body>
<script type="text/javascript">
  var address = "<?php echo ($user["location"]); ?>";
  var PUBLIC = '/exam/Public';
  var uploadUrl = '<?php echo U("Common/uploadFace");?>';
  var sid = '<?php echo session_id();?>';
  var ROOT = '/exam';

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
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div class="per_slider">
        <div class="user_pic">
          <div class="user-pic-bg"></div>
          <img src="
          <?php if($user["face180"]): ?>/exam/Uploads/<?php echo ($user["face180"]); ?>
          <?php else: ?>
          /exam/Public/images/user-default-pic.jpg<?php endif; ?>" alt="User Pic">
        </div>
        <ul>
          <li>
            <a href="javascript:void(0);" onclick="changeRight(1)">
              <span class="glyphicon glyphicon-align-left"></span>
              <span>个人资料</span>
              <small class="glyphicon glyphicon-chevron-right"></small>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" onclick="changeRight(2)">
              <span class="glyphicon glyphicon-camera"></span>
              <span>头像设置</span>
              <small class="glyphicon glyphicon-chevron-right"></small>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" onclick="changeRight(3)">
              <span class="glyphicon glyphicon-cog"></span>
              <span>修改密码</span>
              <small class="glyphicon glyphicon-chevron-right"></small>
            </a>
          </li>
          <li>
            <a href="javascript:void(0);" onclick="changeRight(4)">
              <span class="glyphicon glyphicon-lock"></span>
              <span>绑定账号</span>
              <small class="glyphicon glyphicon-chevron-right"></small>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-md-9 right-wrap">
      <!--个人资料设置-->
      <div id="set_personal" class="per_right">
        <form id="set_personal1" class="form-horizontal" action="<?php echo U('editBasic');?>" method="post" name="editBasic">

          <div class="form-group">
            <label for="perName" class="col-sm-3 control-label">昵称</label>

            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="text" class="form-control" name='nickname' value='<?php echo ($user["username"]); ?>' placeholder="请输入昵称">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="perName" class="col-sm-3 control-label">性别</label>

            <div class="col-sm-1">
              <label class="radio-inline">
                <input type="radio" name="sex" value="1"
                <?php if($user["sex"] == "男"): ?>checked='checked'<?php endif; ?>
                /> 男
              </label>
            </div>
            <div class="col-sm-1">
              <label class="radio-inline">
                <input type="radio" name="sex" value="2"
                <?php if($user["sex"] == "女"): ?>checked='checked'<?php endif; ?>
                /> 女
              </label>
            </div>
          </div>
          <div class="form-group">
            <label for="city" class="col-sm-3 control-label">所在地</label>
            <div class="col-sm-3">
              <select class="form-control" name="province" id="">
                <option value="">请选择省份</option>
              </select>
            </div>
            <div class="col-sm-3">
              <select class="form-control" name="city">
                <option>请选择城市</option>
              </select>
            </div>

          </div>

          <div class="form-group">
            <label for="perName" class="col-sm-3 control-label">个性签名</label>
            <div class="col-sm-6">
              <textarea id="perSign" class="form-control" name="intro"
                        placeholder="我需要一个长势旺盛的签名……"><?php echo ($user["intro"]); ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-info btn-block">保存修改</button>
            </div>
          </div>


        </form>
      </div>

      <!--头像设置-->
      <div id="set_pic" class="per_right hide">
        <form id="set_pic1" class="form-horizontal" action="<?php echo U('editFace');?>" method="post">
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <img src="
              <?php if($user["face180"]): ?>/exam/Uploads/<?php echo ($user["face180"]); ?>
              <?php else: ?>
              /exam/Public/images/user-default-pic.jpg<?php endif; ?> " id='face-img'/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <input type="file" id="face" name="face" style="margin-left:43px;">
              <input type="hidden" name="face180" value=''>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" class="btn btn-info btn-block">上传头像</button>
            </div>
          </div>
        </form>
      </div>

      <!--修改密码-->
      <div id="set_ps" class="per_right hide">
        <form id="set_ps1" class="form-horizontal" action="<?php echo U('editPwd');?>" name="editPwd" method="post">
          <div class="form-group">
            <label for="old" class="col-sm-3 control-label">当前密码</label>

            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">@</span>
                <input type="password" class="form-control" name="old" id="old" placeholder="请输入当前密码">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="new" class="col-sm-3 control-label">新密码</label>

            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">￥</span>
                <input type="password" class="form-control" name="new" id="new" placeholder="请输入密码">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="newed" class="col-sm-3 control-label">确认密码</label>

            <div class="col-sm-6">
              <div class="input-group">
                <span class="input-group-addon">&</span>
                <input type="password" class="form-control" name="newed" id="newed" placeholder="请输入密码">
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
              <button type="submit" class="btn btn-info btn-block">确认修改</button>
            </div>
          </div>
        </form>
      </div>


      <!--绑定账号-->
      <div id="set_account" class="per_right hide">
        <form id="set_account1" class="form-horizontal" action="" method="post">
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
              <p>绑定第三方帐号，可以直接登录，还可以将内容同步到以下平台，与更多好友分享。</p>
            </div>
          </div>
          <br>
          <div class="form-group">
            <div class="col-sm-2 col-md-offset-3">
              <img src="/exam/Public/images/weixin.png" class="img-responsive center-block">
              <button type="button" class="btn btn-info btn-block">立即绑定</button>
            </div>

            <div class="col-sm-2">
              <img src="/exam/Public/images/xinlang.png" class="img-responsive center-block">
              <button type="button" class="btn btn-info btn-block">立即绑定</button>
            </div>
            <div class="col-sm-2">
              <img src="/exam/Public/images/qq.png" class="img-responsive center-block">
              <button type="button" class="btn btn-info btn-block">立即绑定</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
</body>
</html>