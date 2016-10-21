<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0033)http://game3799.com/Lucky28/index -->
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" href="/waibao/Public/front/common.css">
    <script src="/waibao/Public/front/jquery-1.11.1.min.js"></script>
    <script src="/waibao/Public/front/slide.js"></script>
    <title>益智竞猜游戏</title>
    <script>
        var global = {
            live: "http://image.game3799.com/19dou/js"
        }
    </script>

	<link rel="stylesheet" href="/waibao/Public/front/game-comp.css">
    <link rel="stylesheet" href="/waibao/Public/front/guess.css">
	<link rel="stylesheet" href="/waibao/Public/front/mybet.css">
    <script src="/waibao/Public/front/highcharts.js"></script>
    <script src="/waibao/Public/front/exporting.js"></script>
    <link rel="icon" type="image/png" href="http://image.game3799.com/19dou/img/favicon.png">


</head>
<body>

	<div class="site-nav">
		<div class="width-1000">
			<form action="http://game3799.com/Account/LogOff" id="logoutFormTop" method="post">
				<p class="site-nav-con">
					你好，<span class="user-name-color"><?php echo ($userData['username']); ?></span>元宝：0<span class="ingot"></span><a class="ingot-c">充</a>金豆：<?php echo ($userData['money']); ?><span class="kdou"></span><a class="kdou-c">兑</a><a class="login-out" href="<?php echo U('Index/index', array('page'=>'login'));?>">[退出]</a>
					<a class="site-nav-list" href="http://game3799.com/Home/Desktop">保存到桌面</a>
					<a class="site-nav-list bor-r J_shoucang" href="http://game3799.com/Lucky28/index#">收藏本站</a>
				</p>
			</form>
		</div>
	</div>
    <div class="main">
        <div class="width-1000 clear-fix">
            <!-- 导航  start	 -->
            <div class="game-nav-box clear-fix">
                <ul class="game-nav">
                    <li class="game-nav-list selected">
                        <div class="game-logo-box game-logo-pc28">
                            <span class="top-jt"></span>
                            <a class="game-img" href="<?php echo U('Num/index', array('game'=>'pc28'));?>"></a>
                        </div>
                    </li>
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-js28">
                            <span class="top-jt"></span>
                            <a class="game-img" href="<?php echo U('Num/index', array('game'=>'js28'));?>"></a>
                        </div>
                    </li>
                     <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-jnd16">
                            <span class="top-jt"></span>
                            <a class="game-img" href="<?php echo U('Num/index', array('game'=>'js16'));?>"></a>
                        </div>
                    </li>
                    
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-fk28">
                            <span class="top-jt"></span>
                            <a class="game-img" href="<?php echo U('Num/index', array('game'=>'fk28'));?>"></a>
                        </div>
                    </li>
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-fksc">
                            <span class="top-jt"></span>
                            <a class="game-img" href="<?php echo U('Num/index', array('game'=>'fksc'));?>"></a>
                        </div>
                    </li>
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-jnd28">
                            <span class="top-jt"></span>
                            <a class="game-img" href="#"></a>
                        </div>
                    </li>
                </ul>
                <div class="my-account">
                    <span class="my-account-logo"></span>
                    <span class="my-account-text">我的账户</span>
                    <div class="fenge-box">
                        <span class="jt-01"></span>
                    </div>
                    <p class="my-yuanbao-box">
                        <span class="my-yuanbao-text">元宝：0</span>
                        <span class="yuanbao-logo"></span>
                            <a target="_blank" class="chong-url">充</a>
                    </p>
                    <p class="my-yuanbao-box">
                        <span class="my-yuanbao-text">金豆：<?php echo ($userData['money']); ?></span>
                        <span class="jindou-logo"></span>
                        <a class="dui-url">兑</a>
                    </p>
                </div>
            </div>

            <div class="pc28-nav-box game-two-nav">
                <div class="two-nav-head">
                    <a class="head-list sel-color"><strong>PC28首页</strong></a>
                    <p class="my-touzhu-box clear-fix">
                        <a class="my-touzhu-list " href="<?php echo U('Record/index', array('game'=>'pc28'));?>">我的投注</a>  
                    </p>
                </div>
            </div>

<!-- 公正提示 -->
<div class="kaijiang-box kaijiang-pc28">
    <div class="chengxin-box">
        <span class="chengxin-logo"></span>
        <div class="chengxin-text-box">
            <p class="chengxin-text-01">PC28开奖采用北京快乐8第三方数据</p>
            <p class="chengxin-text-02">公平公正  无法作弊</p>
        </div>
    </div>
        <div class="kaijiang-time-box">
            <div class="J_kjTimeBox">
                <p class="kaijiang-time-text mar-t">距离第 <b><?php echo ($tipData['issue']+1); ?></b> 期竞猜截止还有 <b class="J_jcTime" data-lasttime="<?php echo ($tipData['deadlinecd']); ?>"><?php echo ($tipData['deadlinecd']); ?></b> 秒 开奖还有 <b class="J_kjTime" data-lasttime="<?php echo ($tipData['runtimecd']); ?>"><?php echo ($tipData['runtimecd']); ?></b> 秒 </p>
                    <p class="kaijiang-time-text">
                        第<strong><?php echo ($tipData["issue"]); ?></strong>期开奖结果：<?php echo ($tipData["num1"]); ?>+<?php echo ($tipData["num2"]); ?>+<?php echo ($tipData["num3"]); ?>=<span class="now-jieguo"><?php echo ($tipData['num1']+$tipData['num2']+$tipData['num3']); ?></span>
                            <a target="_blank" href="http://www.bwlc.gov.cn/bulletin/keno.html">[官方查询]</a>
                        <a href="http://game3799.com/lucky28/guide">[游戏帮助]</a>
                    </p>
            </div>
            <p class="kaijiang-time-text line-h J_kjIng" style="display: none">第<b><?php echo ($tipData['issue']+1); ?></b>期正在开奖中！</p>
        </div>
    <div class="server-time-box">
        <a class="shengyin-ts shengyin-ts-close" href="#"></a>
        <a class="shuaxin-btn" data-index="1" href="#"></a>
        <span class="time-logo"></span>
        <div class="server-time">
            <p class="time-text">服务器时间</p>
            <p class="J_ServerTime time-text color-red" data-url="/waibao/index.php/Home/Num/getServerTime"></p>
        </div>
    </div>
</div>
<!-- 公正提示 -->

<!-- 导航  end	 -->

<!-- 内容  start	-->
<div class="td-box">
    <div class="bet-ttlbox clear-fix">
        <h2 class="bt-h2">我的投注</h2>
        <a href="<?php echo U('Num/index', array('game'=>'pc28'));?>" class="bt-a">继续竞猜 &gt;</a>
    </div>
</div>
    <div class="array-box pc28-box">
        <div class="amain-box" id="amain" data-url="/lucky28/automodel">
            <table>
                <tbody>
					<tr>
						<th>期号</th>
						<th>开奖时间</th>
						<th>竞猜结果</th>
						<th>投入金豆</th>
						<th>获得金豆</th>
						<th>该期盈亏</th>
						<!--th>操作</th-->
					</tr>
					<?php if(is_array($guessData)): foreach($guessData as $key=>$data): ?><tr>
							<td><?php echo ($data["gameissue"]); ?></td>
							<td><?php echo ($data["runtime"]); ?></td>
							<td><?php echo ($data["num1"]); ?>+<?php echo ($data["num2"]); ?>+<?php echo ($data["num3"]); ?>=<?php echo ($data['num1']+$data['num2']+$data['num3']); ?></td>
							<td><?php echo ($data["input"]); ?></td>
							<td><?php echo ($data["output"]); ?></td>
							<td><?php echo ($data['output']-$data['input']); ?></td>
						</tr><?php endforeach; endif; ?> 
				</tbody>
			</table>
        </div>
    </div>
<!-- 内容  end	 -->
	<div class="list-page-box clear-fix">
		<?php echo ($pageShow); ?>
    </div>


	<div id="sound_bet" style="display: none"></div>

	<div class="fuceng-html-box">
		<div class="fuceng-box">
			<div class="fc-ttl-box clear-fix">
				<h6 class="ttl-sp">提示信息</h6>
				<a href="#" class="fc-close J_closefc"></a>
			</div>
			<div class="fc-main-box">
			</div>
		</div>
	</div>


        </div>
    </div>
    
    <div class="fuceng-html-box suoha-html-box">
    </div>

        <div class="footer-box">
            <div class="width-1000">
                <p class="text-02 mar-t">申明：游戏中使用到的游戏币等均为游戏道具，不具有任何财产性功能，只限用户本人在游戏中使用。</p>
                <p class="text-02">健康游戏忠告：抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当 适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活</p>
            </div>
        </div> 
    <div class="black-cover"></div>
        <div class="fuceng-common-box">
            <div class="fuceng-box">
                <div class="fc-ttl-box clear-fix">
                    <h6 class="ttl-sp">提示信息</h6>
                    <a href="http://game3799.com/Lucky28/index#" class="fc-close J_closefc"></a>
                </div>
                <div class="fc-main-box">
                </div>
            </div>
        </div>
    <style type="text/css">
        #bw {
            position: absolute;
            width: 324px;
            height: 308px;
            top: 0px;
            left: 0px;
            z-index: 9999;
            cursor: pointer;
            display: none;
        }

        .blueWC {
            background: url(http://test123img.73dou.com/3799/abw/black.png) left no-repeat;
            background-position: 1px 42px;
        }

        .whiteWC {
            background: url(http://test123img.73dou.com/3799/abw/white.png) left no-repeat;
            background-position: 1px 42px;
        }

        .no {
            background: url(http://test123img.73dou.com/3799/abw/no.png) left no-repeat;
        }

        .yes {
            background: url(http://test123img.73dou.com/3799/abw/yes.png) left no-repeat;
        }
    </style>
   
    <script src="/waibao/Public/front/common.js"></script>
    <script src="/waibao/Public/front/mybet.js"></script>
    <script src="/waibao/Public/front/swfobject.js"></script>
</body>
</html>