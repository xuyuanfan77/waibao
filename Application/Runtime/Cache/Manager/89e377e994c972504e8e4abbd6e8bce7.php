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
	<a type="button" class="btn btn-default" href="<?php echo U('Guessform/index');?>" style="float:right;margin:15px 0px">修改配置</a>
	<table class="table table-hover" style="margin:0px">
		<tr>
			<th>游戏名称</th>
			<th>号码<br/>0-1</th>
			<th>号码<br/>2-3</th>
			<th>号码<br/>4-5</th>
			<th>号码<br/>6-7</th>
			<th>号码<br/>8-9</th>
			<th>号码<br/>10-11</th>
			<th>号码<br/>12-13</th>
			<th>号码<br/>14-15</th>
			<th>号码<br/>16-17</th>
			<th>号码<br/>18-19</th>
			<th>号码<br/>20-21</th>
			<th>号码<br/>22-23</th>
			<th>号码<br/>24-25</th>
			<th>号码<br/>26-27</th>
			<th>单<br/>双</th>
			<th>大<br/>小</th>
			<th>小单<br/>小双</th>
			<th>大单<br/>大双</th>
			<th>极大<br/>极小</th>
		</tr>
		<?php if(is_array($configData)): foreach($configData as $key=>$config): ?><tr>
				<td><?php echo ($key); ?></td>
				<td><?php echo ($config["0"]); ?><br/><?php echo ($config["1"]); ?></td>
				<td><?php echo ($config["2"]); ?><br/><?php echo ($config["3"]); ?></td>
				<td><?php echo ($config["4"]); ?><br/><?php echo ($config["5"]); ?></td>
				<td><?php echo ($config["6"]); ?><br/><?php echo ($config["7"]); ?></td>
				<td><?php echo ($config["8"]); ?><br/><?php echo ($config["9"]); ?></td>
				<td><?php echo ($config["10"]); ?><br/><?php echo ($config["11"]); ?></td>
				<td><?php echo ($config["12"]); ?><br/><?php echo ($config["13"]); ?></td>
				<td><?php echo ($config["14"]); ?><br/><?php echo ($config["15"]); ?></td>
				<td><?php echo ($config["16"]); ?><br/><?php echo ($config["17"]); ?></td>
				<td><?php echo ($config["18"]); ?><br/><?php echo ($config["19"]); ?></td>
				<td><?php echo ($config["20"]); ?><br/><?php echo ($config["21"]); ?></td>
				<td><?php echo ($config["22"]); ?><br/><?php echo ($config["23"]); ?></td>
				<td><?php echo ($config["24"]); ?><br/><?php echo ($config["25"]); ?></td>
				<td><?php echo ($config["26"]); ?><br/><?php echo ($config["27"]); ?></td>
				<td><?php echo ($config["28"]); ?><br/><?php echo ($config["29"]); ?></td>
				<td><?php echo ($config["30"]); ?><br/><?php echo ($config["31"]); ?></td>
				<td><?php echo ($config["32"]); ?><br/><?php echo ($config["33"]); ?></td>
				<td><?php echo ($config["34"]); ?><br/><?php echo ($config["35"]); ?></td>
				<td><?php echo ($config["36"]); ?><br/><?php echo ($config["37"]); ?></td>
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