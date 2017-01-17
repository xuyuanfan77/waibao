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
	<a type="button" class="btn btn-default" href="<?php echo U('Robot/index');?>" style="float:right;margin:15px 0px">取消修改</a>
	<button type="button" class="btn btn-default" onclick="submitForm()" style="float:right;margin:15px 0px">保存配置</button>
	<div class="panel panel-default" style="margin:60px 0px">
		<div class="panel-body">
			<form id="information" enctype="multipart/form-data" action="<?php echo U('Robotform/save');?>" method="post" role="form">
				<div class="form-group">
					<label>游戏名称：</label>
					<input type="text" class="form-control" name="gamename" placeholder="游戏名称" value="<?php echo ($configData['gamename']); ?>">
				</div>
				<label>号码0至5：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="money0" placeholder="号码0" value="<?php echo ($configData['money0']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money1" placeholder="号码1" value="<?php echo ($configData['money1']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money2" placeholder="号码2" value="<?php echo ($configData['money2']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money3" placeholder="号码3" value="<?php echo ($configData['money3']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money4" placeholder="号码4" value="<?php echo ($configData['money4']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money5" placeholder="号码5" value="<?php echo ($configData['money5']); ?>">
					</div>
				</div>
				<label>号码6至11：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="money6" placeholder="号码6" value="<?php echo ($configData['money6']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money7" placeholder="号码7" value="<?php echo ($configData['money7']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money8" placeholder="号码8" value="<?php echo ($configData['money8']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money9" placeholder="号码9" value="<?php echo ($configData['money9']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money10" placeholder="号码10" value="<?php echo ($configData['money10']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money11" placeholder="号码11" value="<?php echo ($configData['money11']); ?>">
					</div>
				</div>
				<label>号码12至17：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="money12" placeholder="号码12" value="<?php echo ($configData['money12']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money13" placeholder="号码13" value="<?php echo ($configData['money13']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money14" placeholder="号码14" value="<?php echo ($configData['money14']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money15" placeholder="号码15" value="<?php echo ($configData['money15']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money16" placeholder="号码16" value="<?php echo ($configData['money16']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money17" placeholder="号码17" value="<?php echo ($configData['money17']); ?>">
					</div>
				</div>
				<label>号码18至23：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="money18" placeholder="号码18" value="<?php echo ($configData['money18']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money19" placeholder="号码19" value="<?php echo ($configData['money19']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money20" placeholder="号码20" value="<?php echo ($configData['money20']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money21" placeholder="号码21" value="<?php echo ($configData['money21']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money22" placeholder="号码22" value="<?php echo ($configData['money22']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money23" placeholder="号码23" value="<?php echo ($configData['money23']); ?>">
					</div>
				</div>
				<label>号码24至27：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="money24" placeholder="号码24" value="<?php echo ($configData['money24']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money25" placeholder="号码25" value="<?php echo ($configData['money25']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money26" placeholder="号码26" value="<?php echo ($configData['money26']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="money27" placeholder="号码27" value="<?php echo ($configData['money27']); ?>">
					</div>
				</div>
				<label>单、双、大、小：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney0" placeholder="单" value="<?php echo ($configData['spmoney0']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney1" placeholder="双" value="<?php echo ($configData['spmoney1']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney2" placeholder="大" value="<?php echo ($configData['spmoney2']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney3" placeholder="小" value="<?php echo ($configData['spmoney3']); ?>">
					</div>
				</div>
				<label>小单、小双、大单、大双：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney4" placeholder="小单" value="<?php echo ($configData['spmoney4']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney5" placeholder="小双" value="<?php echo ($configData['spmoney5']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney6" placeholder="大单" value="<?php echo ($configData['spmoney6']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney7" placeholder="大双" value="<?php echo ($configData['spmoney7']); ?>">
					</div>
				</div>
				<label>极大、极小：</label>
				<div class="row">
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney8" placeholder="极大" value="<?php echo ($configData['spmoney8']); ?>">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control" name="spmoney9" placeholder="极小" value="<?php echo ($configData['spmoney9']); ?>">
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