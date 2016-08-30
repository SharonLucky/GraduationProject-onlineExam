<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>系统用户列表</title>
  <link rel="stylesheet" href="/exam/Public/css/commonadmin.css" />
  <script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
</head>
<body>
<div class='status'>
  <span>添加公告</span>
</div>
<form action="<?php echo U('runAddNotice');?>" method='post'>
  <table class="table">
    <tr>
      <td width='20%' align='right'>公告标题：</td>
      <td width='50%'>
        <input type="text" name='title' style="width:85%"/>
      </td>
    </tr>
    <tr>
      <td align='right'>公告内容：</td>
      <td>
        <textarea name='content' cols="130" rows="12"></textarea>
      </td>
    </tr>
    <tr>
      <td colspan='2'>
        <input type="submit" value='保存添加' class='big-btn'/>
      </td>
    </tr>
  </table>
</form>
</body>
</html>