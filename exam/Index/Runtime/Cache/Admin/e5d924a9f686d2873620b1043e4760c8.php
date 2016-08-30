<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>系统用户列表</title>
  <link rel="stylesheet" href="/exam/Public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/exam/Public/css/commonadmin.css"/>
  <script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
</head>
<body>
<div class='status'>
  <span>后台管理员列表</span>
</div>
<table class="table">
  <tr>
    <th>ID</th>
    <th>管理员名称</th>
    <th>级别</th>
    <th>最后登录时间</th>
    <th>最后登录IP</th>
    <th>账号状态</th>
    <?php if(!$_SESSION["admin"]): ?><th>操作</th><?php endif; ?>
  </tr>
  <?php if(is_array($admin)): foreach($admin as $key=>$v): ?><tr>
      <td width='50' align='center'><?php echo ($v["id"]); ?></td>
      <td width='120' align='center'><?php echo ($v["username"]); ?></td>
      <td align='center'>
        <?php if($v["admin"]): ?>管理员
          <?php else: ?>
          超级管理员<?php endif; ?>
      </td>
      <td align='center'><?php echo (date('y-m-d H:i', $v["logintime"])); ?></td>
      <td align='center'><?php echo ($v["loginip"]); ?></td>
      <td width='70' align='center'>
        <?php if($v["lock"]): ?>锁定
          <?php else: ?>
          未锁定<?php endif; ?>
      </td>

      <?php if(!$_SESSION["admin"]): ?><td width='240' align="center">
          <?php if($v["admin"]): if($v["lock"]): ?><button type="button" class="btn btn-success" style="margin-right: 5px">
                <span class="glyphicon glyphicon-cog"></span>
                <a href="<?php echo U('lockAdmin', array('id' => $v['id'], 'lock' => 0));?>" class='add'>解锁</a>
              </button>
              <?php else: ?>
              <button type="button" class="btn btn-primary" style="margin-right: 5px">
                <span class="glyphicon glyphicon-lock"></span>
                <a href="<?php echo U('lockAdmin', array('id' => $v['id'], 'lock' => 1));?>" class='add'>锁定</a>
              </button><?php endif; ?>
            <button type="button" class="btn btn-warning" style="margin-right: 5px">
              <span class="glyphicon glyphicon-cog"></span>
              <a href='<?php echo U("delAdmin", array("id" => $v["id"]));?>' class='add'>删除</a>
            </button><?php endif; ?>
        </td><?php endif; ?>
    </tr><?php endforeach; endif; ?>
</table>
</body>
</html>