<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>红包列表</title>
</head>
<body>
	<table>
		<tr><td><a><?php echo ($user['username']); ?></a> <a><?php echo ($user['money']); ?>积分</a> <a href="<?php echo U('Index/index', array('page'=>'publish'));?>">发红包</a> <a href="<?php echo U('Index/logout');?>">退出</a></td></tr>
		
		<?php if(is_array($redpacketlist)): $k = 0; $__LIST__ = $redpacketlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$redpacket): $mod = ($k % 2 );++$k; if(($redpacket["overtime"] == 1)): ?><tr><td><a><?php echo ($k); ?>、此红包已过期，无法领取！</a></td></tr>
				<?php else: ?>
					<tr><td><a><?php echo ($k); ?>、<?php echo ($redpacket["username"]); ?> 于 <?php echo ($redpacket["createtime"]); ?> 发了一个红包</a> <a href="<?php echo U('Index/redPacket', array('redPacketId'=>$redpacket['id']));?>">打开</a></td></tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
	</table>
</body>
</html>