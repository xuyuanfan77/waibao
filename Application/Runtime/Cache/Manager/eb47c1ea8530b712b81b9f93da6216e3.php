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
		<script>
function submitForm() {
	var information = document.getElementById("information");
	information.submit()
}
</script>

<div class="col-md-10">
	<a type="button" class="btn btn-default" href="<?php echo U('Odds/index');?>" style="float:right;margin:15px 0px">取消修改</a>
	<button type="button" class="btn btn-default" onclick="submitForm()" style="float:right;margin:15px 0px">保存配置</button>
	<div class="panel panel-default" style="margin:60px 0px">
		<div class="panel-body">
			<form id="information" enctype="multipart/form-data" action="<?php echo U('Oddsform/save');?>" method="post" role="form">
				<div class="form-group">
					<label>游戏名称：</label>
					<input type="text" class="form-control" name="gamename" placeholder="游戏名称" value="<?php echo ($configData['gamename']); ?>">
				</div>
				<label>号码0至5：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds0" placeholder="号码0" value="<?php echo ($configData['odds0']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds1" placeholder="号码1" value="<?php echo ($configData['odds1']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds2" placeholder="号码2" value="<?php echo ($configData['odds2']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds3" placeholder="号码3" value="<?php echo ($configData['odds3']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds4" placeholder="号码4" value="<?php echo ($configData['odds4']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds5" placeholder="号码5" value="<?php echo ($configData['odds5']); ?>">
					</div>
				</div>
				<label>号码6至11：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds6" placeholder="号码6" value="<?php echo ($configData['odds6']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds7" placeholder="号码7" value="<?php echo ($configData['odds7']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds8" placeholder="号码8" value="<?php echo ($configData['odds8']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds9" placeholder="号码9" value="<?php echo ($configData['odds9']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds10" placeholder="号码10" value="<?php echo ($configData['odds10']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds11" placeholder="号码11" value="<?php echo ($configData['odds11']); ?>">
					</div>
				</div>
				<label>号码12至17：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds12" placeholder="号码12" value="<?php echo ($configData['odds12']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds13" placeholder="号码13" value="<?php echo ($configData['odds13']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds14" placeholder="号码14" value="<?php echo ($configData['odds14']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds15" placeholder="号码15" value="<?php echo ($configData['odds15']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds16" placeholder="号码16" value="<?php echo ($configData['odds16']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds17" placeholder="号码17" value="<?php echo ($configData['odds17']); ?>">
					</div>
				</div>
				<label>号码18至23：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds18" placeholder="号码18" value="<?php echo ($configData['odds18']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds19" placeholder="号码19" value="<?php echo ($configData['odds19']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds20" placeholder="号码20" value="<?php echo ($configData['odds20']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds21" placeholder="号码21" value="<?php echo ($configData['odds21']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds22" placeholder="号码22" value="<?php echo ($configData['odds22']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds23" placeholder="号码23" value="<?php echo ($configData['odds23']); ?>">
					</div>
				</div>
				<label>号码24至27：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds24" placeholder="号码24" value="<?php echo ($configData['odds24']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds25" placeholder="号码25" value="<?php echo ($configData['odds25']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds26" placeholder="号码26" value="<?php echo ($configData['odds26']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds27" placeholder="号码27" value="<?php echo ($configData['odds27']); ?>">
					</div>
				</div>
				<label>单、双、大、小：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds28" placeholder="单" value="<?php echo ($configData['odds28']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds29" placeholder="双" value="<?php echo ($configData['odds29']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds30" placeholder="大" value="<?php echo ($configData['odds30']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds31" placeholder="小" value="<?php echo ($configData['odds31']); ?>">
					</div>
				</div>
				<label>小单、小双、大单、大双：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds32" placeholder="小单" value="<?php echo ($configData['odds32']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds33" placeholder="小双" value="<?php echo ($configData['odds33']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds34" placeholder="大单" value="<?php echo ($configData['odds34']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds35" placeholder="大双" value="<?php echo ($configData['odds35']); ?>">
					</div>
				</div>
				<label>极大、极小：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds36" placeholder="极大" value="<?php echo ($configData['odds36']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="odds37" placeholder="极小" value="<?php echo ($configData['odds37']); ?>">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
	</div>
	<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
		<p class="navbar-text">版权所有Copyright 2016 by 维度科技</p>
	</nav>
</body>
</html>