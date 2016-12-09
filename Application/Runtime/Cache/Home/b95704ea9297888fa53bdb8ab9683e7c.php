<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
		<title>益智竞猜游戏</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <script src="/waibao/Public/front/jquery-1.11.1.min.js"></script>
        <script src="/waibao/Public/front/slide.js"></script>
		<link rel="stylesheet" href="/waibao/Public/front/common.css">
        <link rel="stylesheet" href="/waibao/Public/front/game-comp.css">
        <link rel="stylesheet" href="/waibao/Public/front/autobet.css">
    </head>
    
    <body>
        <div class="site-nav">
            <div class="width-1000">
                <form action="http://game3799.com/Account/LogOff" id="logoutFormTop" method="post">
                    <p class="site-nav-con">
                        你好，
                        <span class="user-name-color"><?php echo ($userData['username']); ?></span>
                        元宝：0
                        <span class="ingot"></span>
                        <a class="ingot-c">充</a>
                        金豆：<?php echo ($userData['money']); ?>
                        <span class="kdou"></span>
                        <a class="kdou-c">兑</a>
                        <a class="login-out" href="<?php echo U('Index/index', array('page'=>'login'));?>">[退出]</a>
                        <a class="site-nav-list" href="#">保存到桌面</a>
                        <a class="site-nav-list bor-r J_shoucang" href="#">收藏本站</a>
                    </p>
                </form>
            </div>
        </div>
        <div class="main">
            <div class="width-1000 clear-fix">
                <!-- 导航 start -->
                <div class="game-nav-box clear-fix">
                    <ul class="game-nav">
                        <li class="game-nav-list">
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
                        <li class="game-nav-list selected">
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
                                <a class="game-img" href="<?php echo U('Num/index', array('game'=>'jnd28'));?>"></a>
                            </div>
                        </li>
                    </ul>
                    <div class="my-account">
                        <span class="my-account-logo"></span>
                        <span class="my-account-text">我的账户</span>
                        <div class="fenge-box"><span class="jt-01"></span></div>
                        <p class="my-yuanbao-box">
                            <span class="my-yuanbao-text">元宝：0</span>
                            <span class="yuanbao-logo"></span>
                            <a target="_blank" class="chong-url">充</a>
                        </p>
                        <p class="my-yuanbao-box">
                            <span class="my-yuanbao-text">金豆：<?php echo ($userData['money']); ?></span><span class="jindou-logo"></span>
                            <a class="dui-url">兑</a>
                        </p>
                    </div>
                </div>
                <div class="js16-nav-box game-two-nav">
                    <div class="two-nav-head">
                        <a class="head-list sel-color"><strong>极速16首页</strong></a>
                        <p class="my-touzhu-box clear-fix">
                            <a class="my-touzhu-list" href="<?php echo U('Record/index', array('game'=>'js16'));?>">我的投注</a>
							<a class="my-touzhu-list" href="<?php echo U('Mode/index', array('game'=>'js16'));?>">投注模式编辑</a>
							<a class="my-touzhu-list bor-r sel-color" href="<?php echo U('Automatic/index', array('game'=>'js16'));?>">自动投注</a>
                        </p>
                    </div>
                </div>
                <!-- 公正提示 -->
                <div class="kaijiang-box kaijiang-js16">
                    <div class="chengxin-box">
                        <span class="chengxin-logo"></span>
                        <div class="chengxin-text-box">
                            <p class="chengxin-text-01">极速16开奖采用新韩国第三方数据</p>
                            <p class="chengxin-text-02">公平公正 无法作弊</p>
                        </div>
                    </div>
                    <div class="kaijiang-time-box">
                        <div class="J_kjTimeBox">
                            <p class="kaijiang-time-text mar-t">
                                距离第
                                <b><?php echo ($tipData['issue']+1); ?></b>
                                期竞猜截止还有
                                <b class="J_jcTime" data-lasttime="<?php echo ($tipData['deadlinecd']); ?>"><?php echo ($tipData['deadlinecd']); ?></b>
                                秒 开奖还有
                                <b class="J_kjTime" data-lasttime="<?php echo ($tipData['runtimecd']); ?>"><?php echo ($tipData['runtimecd']); ?></b>
                                秒
                            </p>
                            <p class="kaijiang-time-text">
                                第
                                <strong><?php echo ($tipData["issue"]); ?></strong>
								<?php if($userData['control'] == 0): ?>期开奖结果：<?php echo ($tipData["num1"]); ?>+<?php echo ($tipData["num2"]); ?>+<?php echo ($tipData["num3"]); ?>=
									<span class="now-jieguo"><?php echo ($tipData['num1']+$tipData['num2']+$tipData['num3']); ?></span>
								<?php else: ?>
									期开奖结果：<?php echo ($tipData["fknum1"]); ?>+<?php echo ($tipData["fknum2"]); ?>+<?php echo ($tipData["fknum3"]); ?>=
									<span class="now-jieguo"><?php echo ($tipData['fknum1']+$tipData['fknum2']+$tipData['fknum3']); ?></span><?php endif; ?>
                                <a target="_blank" href="#">[官方查询]</a>
                                <a href="#">[游戏帮助]</a>
                            </p>
                        </div>
                        <p class="kaijiang-time-text line-h J_kjIng" style="display: none">
                            第
                            <b><?php echo ($tipData['issue']+1); ?></b>
                            期正在开奖中！
                        </p>
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
                <!-- 导航 end -->
                <!-- 内容 start -->

				<div class="tips-box">
					<p class="tips-p"><strong class="tips-s">自动投注：</strong>网站根据您的要求，开奖前自动帮您投注。完成以下设置即可开始自动投注，而且您随时可以停止自动投注。</p>
				</div>
				<div class="set-out-box js16-box">
					<h4 class="set-h4">设置自动投注期数并开始投注</h4>
					<div class="set-box clear-fix">
						<ul>
							<li class="set-li">
								<p class="set-lil">开始投注设置</p>
								<div class="set-lir">
									<p class="lir-c1">
										开始模式
											<select name="" id="drop_modes" class="lir-sel color0">
												<?php if(is_array($modeData)): foreach($modeData as $key=>$data): if(($data['id'] == $automaticData['modeid'])): ?><option value="<?php echo ($data['id']); ?>" selected="selected"><?php echo ($data['modename']); ?></option>
													<?php else: ?>
														<option value="<?php echo ($data['id']); ?>"><?php echo ($data['modename']); ?></option><?php endif; endforeach; endif; ?>
											</select>
										<a href="<?php echo U('Mode/index', array('game'=>'js16'));?>" class="add-mod"><i class="tri"></i><strong>+</strong>添加模式</a>
										选择自动投注的开始模式自动投注将从这个模式开始
									</p>
									<p class="lir-c2">
										投注期号：
										<input id="issue" class="lir-inp color0" value="<?php echo ($automaticData['issuebg']); ?>" type="text">
										当前已经是第<span class="color0"> <?php echo ($tipData['issue']); ?> </span>期，开始期号必须大于或等于 <span id="issue_now" class="color0"><?php echo ($tipData['issue']+4); ?></span>
									</p>
								</div>
							</li>
							<li class="set-li li-bor">
								<p class="set-lil">停止投注设置</p>
								<div class="set-lir">
									<p class="lir-p">
										投注期数达到：
										<input id="play_num" class="inp-dd" value="<?php echo ($automaticData['issuenum']); ?>" type="text">（不能超过5000）<span> 或 </span>金豆 ≥ 
										<input id="kdou_up" class="inp-dd dd-wd" value="<?php echo ($automaticData['moneymax']); ?>" type="text">（0就不限制）<span> 或 </span>金豆 ≤ 
										<input id="kdou_down" class="inp-dd dd-wd" value="<?php echo ($automaticData['moneymin']); ?>" type="text"><span> 或 </span>金豆不够投注
									</p>
									<p class="lir-p"><span>*以上几项达到任意一项即马上停止自动投注</span></p>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="model-out-box js16-box">
					<h4 class="set-h4">设置自动投注期数并开始投注</h4>
					<p class="model-p">自动投注开启后，系统会根据您的设置进行循环投注，直到达到停止投注的条件。</p>
					<div class="model-box clear-fix" id="my_modes">
						<ul class="md-th clear-fix">
							<li class="bet0 bet-01">投注模式</li>
							<li class="bet0 bet-02">投注金豆数量</li>
							<li class="bet0 bet-05">状态</li>
						</ul>

						<?php if(is_array($modeData)): foreach($modeData as $key=>$data): ?><ul class="clear-fix">
								<li id="lk_tri_4" class="bet0 bet-tri"><i class="tri"></i></li>
								<li class="bet0 bet-06">
									<strong class="lk-win"><?php echo ($data['modename']); ?></strong>
								</li>
								<li class="bet0 bet-02">
									<label class="k-color1"><?php echo ($data['totalmoney']); ?><i class="kdou"></i></label>
									<span style="display: none"><?php echo ($data['id']); ?></span>
								</li>
								<li class="bet0 bet-05">
									<a href="#" class="bet-on"></a>
								</li>
							</ul><?php endforeach; endif; ?>
					</div>
					<p class="add-p"><a href="<?php echo U('Mode/index', array('game'=>'js16'));?>" class="add-btn color0">+添加模式</a></p>
					<a href="#" class="autobet-btn J_autobtn" data-url="/waibao/index.php/Home/Automatic/updateAutoStatus" data-game="js16">
						<?php if(($automaticData['status'] == 1)): ?>结束自动投注
						<?php else: ?>
							开始自动投注<?php endif; ?>
					</a>
				</div>
				<div class="fuceng-html-box"></div>
			</div>
		</div>
		<!-- 内容  end	 -->
		<div class="black-cover"></div>
		<div class="fuceng-html-box suoha-html-box"></div>
        <div class="footer-box">
            <div class="width-1000">
                <p class="text-02 mar-t">申明：游戏中使用到的游戏币等均为游戏道具，不具有任何财产性功能，只限用户本人在游戏中使用。</p>
                <p class="text-02">健康游戏忠告：抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当 适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活</p>
            </div>
        </div>
        <script src="/waibao/Public/front/common.js"></script>
		<script src="/waibao/Public/front/touzhu.js"></script>
		<script src="/waibao/Public/front/autoplay.js"></script>
        <script src="/waibao/Public/front/swfobject.js"></script>
	</body>
</html>