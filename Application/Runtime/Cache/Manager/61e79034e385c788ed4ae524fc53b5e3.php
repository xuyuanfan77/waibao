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
	<a type="button" class="btn btn-default" href="<?php echo U('Robotform/index');?>" style="float:right;margin:15px 0px">新增配置</a>
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
			<th>操作</th>
		</tr>
		<?php if(is_array($configData)): foreach($configData as $key=>$config): ?><tr>
				<td><?php echo ($config["gamename"]); ?></td>
				<td><?php echo ($config["money0"]); ?><br/><?php echo ($config["money1"]); ?></td>
				<td><?php echo ($config["money2"]); ?><br/><?php echo ($config["money3"]); ?></td>
				<td><?php echo ($config["money4"]); ?><br/><?php echo ($config["money5"]); ?></td>
				<td><?php echo ($config["money6"]); ?><br/><?php echo ($config["money7"]); ?></td>
				<td><?php echo ($config["money8"]); ?><br/><?php echo ($config["money9"]); ?></td>
				<td><?php echo ($config["money10"]); ?><br/><?php echo ($config["money11"]); ?></td>
				<td><?php echo ($config["money12"]); ?><br/><?php echo ($config["money13"]); ?></td>
				<td><?php echo ($config["money14"]); ?><br/><?php echo ($config["money15"]); ?></td>
				<td><?php echo ($config["money16"]); ?><br/><?php echo ($config["money17"]); ?></td>
				<td><?php echo ($config["money18"]); ?><br/><?php echo ($config["money19"]); ?></td>
				<td><?php echo ($config["money20"]); ?><br/><?php echo ($config["money21"]); ?></td>
				<td><?php echo ($config["money22"]); ?><br/><?php echo ($config["money23"]); ?></td>
				<td><?php echo ($config["money24"]); ?><br/><?php echo ($config["money25"]); ?></td>
				<td><?php echo ($config["money26"]); ?><br/><?php echo ($config["money27"]); ?></td>
				<td><?php echo ($config["spmoney0"]); ?><br/><?php echo ($config["spmoney1"]); ?></td>
				<td><?php echo ($config["spmoney2"]); ?><br/><?php echo ($config["spmoney3"]); ?></td>
				<td><?php echo ($config["spmoney4"]); ?><br/><?php echo ($config["spmoney5"]); ?></td>
				<td><?php echo ($config["spmoney6"]); ?><br/><?php echo ($config["spmoney7"]); ?></td>
				<td><?php echo ($config["spmoney8"]); ?><br/><?php echo ($config["spmoney9"]); ?></td>
				<td><a href="<?php echo U('Robotform/index', array('gamename'=>$config['gamename']));?>">修改</a> <a href="<?php echo U('Robot/del', array('gamename'=>$config['gamename']));?>">删除</a></td>
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