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
                            <a class="game-img" href="<?php echo U('Num/index');?>"></a>
                        </div>
                    </li>
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-js28">
                            <span class="top-jt"></span>
                            <a class="game-img" href="#"></a>
                        </div>
                    </li>
                     <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-jnd16">
                            <span class="top-jt"></span>
                            <a class="game-img" href="#"></a>
                        </div>
                    </li>
                    
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-fk28">
                            <span class="top-jt"></span>
                            <a class="game-img" href="#"></a>
                        </div>
                    </li>
                    <li class="game-nav-list ">
                        <div class="game-logo-box game-logo-fksc">
                            <span class="top-jt"></span>
                            <a class="game-img" href="#"></a>
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
                        <a class="my-touzhu-list " href="<?php echo U('Record/index');?>">我的投注</a>  
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
        <a href="<?php echo U('Num/index');?>" class="bt-a">继续竞猜 &gt;</a>
    </div>
    <!--div class="trend-box clear-fix"-->
        <!-- 投注 走势 strat -->
        <!--div id="container" class="trend-lf" data-bet="[['10-01','10-02','10-03','10-04','10-05','10-06','10-07'],['0','0','0','0','0','0','0']]" data-highcharts-chart="0"><div class="highcharts-container" id="highcharts-0" style="position: relative; overflow: hidden; width: 657px; height: 190px; text-align: left; line-height: normal; z-index: 0; left: 0.5px; top: 0px;"><svg version="1.1" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="657" height="190"><desc>Created with Highcharts 4.1.3</desc><defs><clipPath id="highcharts-1"><rect x="0" y="0" width="563" height="142"></rect></clipPath></defs><rect x="0" y="0" width="657" height="190" strokeWidth="0" fill="#FFFFFF" class=" highcharts-background"></rect><path fill="none" d="M 35 81.5 L 598 81.5" stroke="#808080" stroke-width="1"></path><g class="highcharts-button" style="cursor:default;" stroke-linecap="round" transform="translate(623,10)"><title>Chart context menu</title><rect x="0.5" y="0.5" width="24" height="22" strokeWidth="1" fill="white" stroke="none" stroke-width="1" rx="2" ry="2"></rect><path fill="#E0E0E0" d="M 6 6.5 L 20 6.5 M 6 11.5 L 20 11.5 M 6 16.5 L 20 16.5" stroke="#666" stroke-width="3" zIndex="1"></path><text x="0" zIndex="1" style="color:black;fill:black;" y="12"></text></g><g class="highcharts-grid" zIndex="1"></g><g class="highcharts-grid" zIndex="1"><path fill="none" d="M 35 81.5 L 598 81.5" stroke="#D8D8D8" stroke-width="1" zIndex="1" opacity="1"></path></g><g class="highcharts-axis" zIndex="2"><path fill="none" d="M 114.5 152 L 114.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 195.5 152 L 195.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 275.5 152 L 275.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 356.5 152 L 356.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 436.5 152 L 436.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 517.5 152 L 517.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 598.5 152 L 598.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 34.5 152 L 34.5 162" stroke="#C0D0E0" stroke-width="1" opacity="1"></path><path fill="none" d="M 35 152.5 L 598 152.5" stroke="#C0D0E0" stroke-width="1" zIndex="7" visibility="visible"></path></g><g class="highcharts-axis" zIndex="2"></g><g class="highcharts-series-group" zIndex="3"><g class="highcharts-series" visibility="visible" zIndex="0.1" transform="translate(35,10) scale(1 1)" clip-path="url(#highcharts-1)"><path fill="none" d="M 40.214285714285715 71 L 120.64285714285714 71 L 201.07142857142858 71 L 281.5 71 L 361.92857142857144 71 L 442.3571428571429 71 L 522.7857142857142 71" stroke="#7cb5ec" stroke-width="2" zIndex="1" stroke-linejoin="round" stroke-linecap="round"></path><path fill="none" d="M 30.214285714285715 71 L 40.214285714285715 71 L 120.64285714285714 71 L 201.07142857142858 71 L 281.5 71 L 361.92857142857144 71 L 442.3571428571429 71 L 522.7857142857142 71 L 532.7857142857142 71" stroke-linejoin="round" visibility="visible" stroke="rgba(192,192,192,0.0001)" stroke-width="22" zIndex="2" class=" highcharts-tracker" style=""></path></g><g class="highcharts-markers highcharts-tracker" visibility="visible" zIndex="0.1" transform="translate(35,10) scale(1 1)" clip-path="url(#highcharts-2)" style=""><path fill="#7cb5ec" d="M 522 67 C 527.328 67 527.328 75 522 75 C 516.672 75 516.672 67 522 67 Z"></path><path fill="#7cb5ec" d="M 442 67 C 447.328 67 447.328 75 442 75 C 436.672 75 436.672 67 442 67 Z"></path><path fill="#7cb5ec" d="M 361 67 C 366.328 67 366.328 75 361 75 C 355.672 75 355.672 67 361 67 Z"></path><path fill="#7cb5ec" d="M 281 67 C 286.328 67 286.328 75 281 75 C 275.672 75 275.672 67 281 67 Z"></path><path fill="#7cb5ec" d="M 201 67 C 206.328 67 206.328 75 201 75 C 195.672 75 195.672 67 201 67 Z"></path><path fill="#7cb5ec" d="M 120 67 C 125.328 67 125.328 75 120 75 C 114.672 75 114.672 67 120 67 Z"></path><path fill="#7cb5ec" d="M 40 67 C 45.328 67 45.328 75 40 75 C 34.672 75 34.672 67 40 67 Z"></path></g></g><text x="309" text-anchor="middle" class="highcharts-title" zIndex="4" style="color:#333333;font-size:18px;fill:#333333;width:593px;" y="24"></text><g class="highcharts-legend" zIndex="7" transform="translate(610,87)"><g zIndex="1"><g><g class="highcharts-legend-item" zIndex="1" transform="translate(8,3)"><path fill="none" d="M 0 11 L 16 11" stroke="#7cb5ec" stroke-width="2"></path><path fill="#7cb5ec" d="M 8 7 C 13.328 7 13.328 15 8 15 C 2.6719999999999997 15 2.6719999999999997 7 8 7 Z"></path><text x="21" style="color:#333333;font-size:12px;font-weight:bold;cursor:pointer;fill:#333333;" text-anchor="start" zIndex="2" y="15">盈余</text></g></g></g></g><g class="highcharts-axis-labels highcharts-xaxis-labels" zIndex="7"><text x="75.21428571428572" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-01</text><text x="155.64285714285714" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-02</text><text x="236.0714285714286" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-03</text><text x="316.5" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-04</text><text x="396.92857142857144" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-05</text><text x="477.35714285714295" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-06</text><text x="557.7857142857143" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:74px;text-overflow:clip;" text-anchor="middle" transform="translate(0,0)" y="171" opacity="1">10-07</text></g><g class="highcharts-axis-labels highcharts-yaxis-labels" zIndex="7"><text x="20" style="color:#606060;cursor:default;font-size:11px;fill:#606060;width:207px;text-overflow:clip;" text-anchor="end" transform="translate(0,0)" y="85" opacity="1">0</text></g><g class="highcharts-tooltip" zIndex="8" style="cursor:default;padding:0;white-space:nowrap;" transform="translate(0,-9999)"><path fill="none" d="M 3 0 L 13 0 C 16 0 16 0 16 3 L 16 13 C 16 16 16 16 13 16 L 3 16 C 0 16 0 16 0 13 L 0 3 C 0 0 0 0 3 0" isShadow="true" stroke="black" stroke-opacity="0.049999999999999996" stroke-width="5" transform="translate(1, 1)"></path><path fill="none" d="M 3 0 L 13 0 C 16 0 16 0 16 3 L 16 13 C 16 16 16 16 13 16 L 3 16 C 0 16 0 16 0 13 L 0 3 C 0 0 0 0 3 0" isShadow="true" stroke="black" stroke-opacity="0.09999999999999999" stroke-width="3" transform="translate(1, 1)"></path><path fill="none" d="M 3 0 L 13 0 C 16 0 16 0 16 3 L 16 13 C 16 16 16 16 13 16 L 3 16 C 0 16 0 16 0 13 L 0 3 C 0 0 0 0 3 0" isShadow="true" stroke="black" stroke-opacity="0.15" stroke-width="1" transform="translate(1, 1)"></path><path fill="rgba(249, 249, 249, .85)" d="M 3 0 L 13 0 C 16 0 16 0 16 3 L 16 13 C 16 16 16 16 13 16 L 3 16 C 0 16 0 16 0 13 L 0 3 C 0 0 0 0 3 0"></path><text x="8" zIndex="1" style="font-size:12px;color:#333333;fill:#333333;" y="20"></text></g><text x="647" text-anchor="end" zIndex="8" style="cursor:pointer;color:#909090;font-size:9px;fill:#909090;" y="185"></text></svg></div></div-->
        <!-- 投注 走势 end -->
        <!--div class="trend-rg">
            <div class="ttl-box clear-fix">
                <div class="int-imgbox">
                    <img src="%E6%88%91%E7%9A%84%E6%8A%95%E6%B3%A8_files/face0.png" alt="" width="38px" height="38px">
                </div>
                <div class="user-box">
                    <span class="username">远航之帆</span>
                    <span class="userid">ID:9490376</span>
                </div>
                <div class="wealth-box">
                    <p class="wt-p">元宝：<strong>0 </strong><i class="ingot"></i><a href="http://game3799.com/Member/Recharge" class="wt-a a-blue">充</a></p>
                    <p class="wt-p">金豆：<strong>0 </strong><i class="kdou"></i><a href="http://game3799.com/Member/IngotExchange" class="wt-a a-pink">兑</a></p>
                </div>
            </div>

            <div class="count-box">
                    <p class="count-p">今日盈亏：<span class="green">0</span><i class="kdou"></i></p>
                <p class="count-p">今日胜率：0.0%</p>
                    <p class="count-p">昨日盈亏：<span class="green">0</span><i class="kdou"></i></p> 
                                    <p class="count-p">上周盈亏：<span class="green">0</span><i class="kdou"></i></p>

                <p class="count-p">竞猜期数：0</p>
                
            </div>
        </div>
    </div-->
</div>
    <div class="array-box pc28-box">
        <!--div class="arr-ttlbox pc28">
            <div class="box-a on">
                <a href="http://game3799.com/lucky28/MyBetStat/1/pages/1" class="rrl-a">按期显示</a>
                <i class="tri"></i>
            </div>
            <i class="shu"></i>
            <div class="box-a box-asp">
                <a href="http://game3799.com/lucky28/MyBetStat/2/pages/1" class="rrl-a">按日显示</a>
                <i class="tri"></i>
            </div>
        </div-->

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