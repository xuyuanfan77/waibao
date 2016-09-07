<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>红包</title>
</head>
<body>
	<table>
		<tr><td><a><?php echo ($user['username']); ?></a> <a><?php echo ($user['money']); ?>积分</a> <a href="<?php echo U('Index/redPacketList');?>">返回</a></td></tr>
		<tr><td><a><?php echo ($money); ?></a></td></tr>
		<tr><td><a>红包记录：</a></td></tr>
		
		<?php if(is_array($redPacketDetail)): foreach($redPacketDetail as $k=>$item): ?><tr><td><a><?php echo ($k); ?>、<?php echo ($item['username']); ?> 于 <?php echo ($item['receiver_createtime']); ?> 抢了<?php echo ($item['receiver_money']); ?>元</a></td></tr><?php endforeach; endif; ?>
	</table>
</body>
</html>