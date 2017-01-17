<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>运营管理后台</title>

	<link type="text/css" href="/waibao/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link type="text/css" href="/waibao/Public/css/manager/layout.css" rel="stylesheet"/>
	<script type="text/javascript" src="/waibao/Public/javascript/jquery-1.12.4.js"></script>
	<script type="text/javascript" src="/waibao/Public/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>	
	<nav class="navbar navbar-inverse" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand">运营管理后台</a>
		</div>
		<a class="navbar-text" style="float:right;display:<?php echo ($logoutDispaly); ?>" href="<?php echo U('Account/logout');?>">退出</a>
	</nav>
	<div class="row" style="margin:0px">
		<div class="col-md-2" style="display:<?php echo ($navbarDispaly); ?>">
			<div class="panel panel-default" style="margin:15px 0px">
				<ul class="nav nav-pills nav-stacked" role="tablist" style="text-align:center;">
					<li role="presentation" style="background:<?php echo ($navbarColor[0]); ?>"><a href="<?php echo U('Collect/index');?>">采集配置</a></li>
					<li role="presentation" style="background:<?php echo ($navbarColor[1]); ?>"><a href="<?php echo U('Transform/index');?>">转换配置</a></li>
					<li role="presentation" style="background:<?php echo ($navbarColor[2]); ?>"><a href="<?php echo U('Guess/index');?>">投注配置</a></li>
					<li role="presentation" style="background:<?php echo ($navbarColor[3]); ?>"><a href="<?php echo U('Robot/index');?>">机器人</a></li>
					<li role="presentation" style="background:<?php echo ($navbarColor[4]); ?>"><a href="<?php echo U('Fengkong/index');?>">风控管理</a></li>
					<li role="presentation" style="background:<?php echo ($navbarColor[5]); ?>"><a href="<?php echo U('Odds/index');?>">赔率管理</a></li>
				</ul>
			</div>
		</div>
		<style type="text/css">
.pages {position:relative;width:700px;padding:10px 0px;background-color:#FFF;}
.num,.prev,.next,.current{width:60px;line-height:30px;display:inline-block;margin:0px 2px 0px 2px;text-align:center;}
.num,.prev,.next{color:#000;background-color:#eee;}
.current {color:#FFF;background-color:#008cba;}
.num:hover,.prev:hover,.next:hover{background-color:#008cba;color:#FFF;}
</style>

<div class="col-md-10">
	<a type="button" class="btn btn-default" href="<?php echo U('Transformform/index');?>" style="float:right;margin:15px 0px">修改配置</a>
	<table class="table table-hover" style="margin:0px">
		<tr>
			<th>名称</th>
			<th>数据源</th>
			<th>抽水</th>
			<th>间隔</th>
			<th>提前写入期数</th>
			<th>提前截至时间</th>
			<th>延迟开奖时间</th>
		</tr>
		<?php if(is_array($configData)): foreach($configData as $key=>$config): ?><tr>
				<td><?php echo ($config["name"]); ?></td>
				<td><?php echo ($config["lotteryname"]); ?></td>
				<td><?php echo ($config["water"]); ?></td>
				<td><?php echo ($config["interval"]); ?></td>
				<td><?php echo ($config["aheadissue"]); ?></td>
				<td><?php echo ($config["aheaddeadline"]); ?></td>
				<td><?php echo ($config["delayruntime"]); ?></td>
			</tr><?php endforeach; endif; ?>
	</table>
	<div class="pages">
		<?php echo ($pageShow); ?>
	</div>
</div>
	</div>
	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<p class="navbar-text">版权所有Copyright 2016 by 维度科技</p>
	</nav>
</body>
</html>