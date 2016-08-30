<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset=UTF-8">
	<title>系统用户列表</title>
	<link rel="stylesheet" href="/exam/Public/css/commonadmin.css" />
	<script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
</head>
<body>
	<div class='status'>
		<span>修改密码</span>
	</div>
	<form action="<?php echo U('runEditPwd');?>" method='post'>
		<table class="table">
			<tr>
				<td width='45%' align='right'>旧密码：</td>
				<td>
					<input type="password" name='old'/>
				</td>
			</tr>
			<tr>
				<td align='right'>新密码：</td>
				<td>
					<input type="password" name='pwd'/>
				</td>
			</tr>
			<tr>
				<td align='right'>确认密码：</td>
				<td>
					<input type="password" name='pwded'/>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
					<input type="submit" value='保存修改' class='big-btn'/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>