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
		<span>设置非法关键字</span>
	</div>
	<form action="<?php echo U('runEditFilter');?>" method='post'>
		<table class="table">
			<tr>
				<td width='300' align='right'>需要过滤的关键字（每个关键词之间用'|'分隔）：</td>
				<td>
					<textarea name="filter" cols="100" rows="10"><?php echo ($filter); ?></textarea>
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