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
  <span>后台公告列表</span>
</div>
<table class="table">
  <tr>
    <th>ID</th>
    <th>公告标题</th>
    <th>公告内容</th>
    <th>发布者</th>
    <th>发布时间</th>
    <?php if($_SESSION["admin"]): ?><th>操作</th><?php endif; ?>
  </tr>
  <?php if(is_array($notice)): foreach($notice as $key=>$v): ?><tr>
      <td width='30' align='center'><?php echo ($v["id"]); ?></td>
      <td width='120' align='center'><?php echo ($v["title"]); ?></td>
      <td width='320'><?php echo ($v["content"]); ?></td>
      <td width='100' align='center'><?php echo ($v["admin"]); ?></td>
      <td width='100' align='center'><?php echo ($v["time"]); ?></td>
      <!--<td align='center'><?php echo (date('y-m-d', $v["time"])); ?></td>-->
      <td width='120' align='center'>
        <button type="button" class="btn btn-warning">
          <span class="glyphicon glyphicon-cog"></span>
        <a href="<?php echo U('delNotice', array('id' => $v['id']));?>" class='add'>删除公告</a>
          </button>
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