<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>红包</title>
</head>
<body>
	<table>
		<tr><td><a><?php echo ($user['username']); ?></a> <a><?php echo ($user['money']); ?>积分</a> <a>返回</a></td></tr>
		<tr><td><a>你抢了0.01元</a></td></tr>
		<tr><td><a>红包记录：</a></td></tr>
		<tr><td><a>1、李四 于 2016/9/5 11:02 抢了0.01元</a></td></tr>
		<tr><td><a>2、王五 于 2016/9/5 11:02 抢了0.01元</a></td></tr>
		<tr><td><a>3、赵六 于 2016/9/5 11:02 抢了0.01元</a></td></tr>
	</table>
</body>
</html>