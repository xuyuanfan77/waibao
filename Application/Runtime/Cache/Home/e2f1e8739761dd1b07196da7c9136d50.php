<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>注册</title>
</head>
<body>
	<form action="<?php echo U('Index/register');?>" method="post">
		<table>
			<tr>
				<td><a>用户名：</a><input type="text" name="username" class="input"/></td>
				<td><a>密码：</a><input type="password" name="password" class="input"/></td>
			</tr>
			<tr><td><input type="submit" name="submit" value="注册"/><a href="<?php echo U('Index/index', array('page'=>'login'));?>">登录</a></td></tr>
		</table>
	</form>
</body>
</html>