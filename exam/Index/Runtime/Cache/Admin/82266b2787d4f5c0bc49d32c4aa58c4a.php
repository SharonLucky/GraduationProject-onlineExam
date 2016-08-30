<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset=UTF-8">
  <title>系统用户列表</title>
  <link rel="stylesheet" href="/exam/Public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/exam/Public/css/commonadmin.css">
  <script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
</head>
<body>
<div class='status'>
  <span>系统用户列表</span>
</div>
<table class='table table1'>
  <tr>
    <th>ID</th>
    <th>用户昵称</th>
    <th>头像</th>
    <th>个人信息</th>
    <th>注册时间</th>
    <th>账号状态</th>
    <th>操作</th>
  </tr>
  <?php if(is_array($users)): foreach($users as $key=>$v): ?><tr>
      <td width='40' align='center'><?php echo ($v["id"]); ?></td>
      <td align="center" width='60'><?php echo ($v["username"]); ?></td>
      <td width='80' align='center'>
        <img src="<?php if($v["face"]): ?>/exam/Uploads/<?php echo ($v["face"]); else: ?>/exam/Public/Images/user-default-pic.jpg<?php endif; ?>" width='50' height='50'/>
      </td>
      <td width='220'>
        <ul>
          <li>性别：<?php echo ($v["sex"]); ?></li>
          <li>城市：<?php echo ($v["location"]); ?></li>
          <li>简介：<?php echo ($v["intro"]); ?></li>
        </ul>
      </td>
      <td width='80' align='center'><?php echo (date('Y-m-d', $v["registime"])); ?></td>
      <td width='50' align='center'><?php if($v["lock"]): ?>锁定<?php endif; ?></td>
      <td width='50' align='center'>
        <?php if($v["lock"]): ?><button type="button" class="btn btn-success">
            <span class="glyphicon glyphicon-cog"></span>
            <a href="<?php echo U('lockUser', array('id' => $v['id'], 'lock' => 0));?>" class='add'>解除锁定</a>
          </button>
          <?php else: ?>
          <button type="button" class="btn btn-primary">
            <span class="glyphicon glyphicon-lock"></span>
          <a href="<?php echo U('lockUser', array('id' => $v['id'], 'lock' => 1));?>" class='add'>锁定用户</a>
          </button><?php endif; ?>
      </td>
    </tr><?php endforeach; endif; ?>
  <tr height='50'>
    <td align='center' colspan='7'>
      <div class="page"><?php echo ($page); ?></div>
    </td>
  </tr>
</table>
</body>
</html>