<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>发红包</title>
</head>
<body>
	<form action="<?php echo U('Index/publish');?>" method="post">
		<table>
			<tr><td><a>金额：</a><input type="text" name="money" class="input"/></td></tr>
			<tr><td><a>个数：</a><input type="text" name="number" class="input"/></td></tr>
			<tr><td>
				<input type="radio" name="distribution" value="1"/>平均
				<input type="radio" name="distribution" value="2"/>随机
			</td></tr>
			<tr><td><input type="submit" name="submit" value="发红包"/></td></tr>
		</table>
	</form>
</body>
</html>