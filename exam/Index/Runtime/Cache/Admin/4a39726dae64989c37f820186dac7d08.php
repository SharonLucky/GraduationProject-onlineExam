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
		<span>网站设置</span>
	</div>
	<form action="<?php echo U('runEdit');?>" method='post'>
		<table class="table">
			<tr>
				<td width='45%' align='right'>网站名称：</td>
				<td>
					<input type="text" name='webname' value='<?php echo ($webname); ?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>版权信息：</td>
				<td>
					<input type="text" name='copy' class='input-long' value='<?php echo ($copy); ?>'/>
				</td>
			</tr>
			<tr>
				<td align='right'>是否开启注册：</td>
				<td height='30'>
					<input type="radio" name='regis_on' value='1' class='radio' <?php if($REGIS_ON): ?>checked='checked'<?php endif; ?>/>&nbsp;开启&nbsp;&nbsp;
					<input type="radio" name='regis_on' value='0' class='radio'<?php if(!$REGIS_ON): ?>checked='checked'<?php endif; ?>/>&nbsp;暂停
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