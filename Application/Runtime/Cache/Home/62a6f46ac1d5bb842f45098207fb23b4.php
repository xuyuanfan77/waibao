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
        <link rel="stylesheet" href="/waibao/Public/front/guess.css">
        <link rel="stylesheet" href="/waibao/Public/front/touzhu-new.css">
        <link rel="stylesheet" href="/waibao/Public/front/touzhu-pc28.css">
        <script type="text/javascript">
            var nub = new Array(<?php echo ($configData); ?>);
            var nub1 = new Array(1, 3, 6, 10, 15, 21, 28, 36, 45, 55, 63, 69, 73, 75, 1, 3, 6, 10, 15, 21, 28, 36, 45, 55, 63, 69, 73, 75);
            var mode = new Array([0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27], //全包
            [1, 3, 5, 7, 9, 11, 13, 15, 17, 19, 21, 23, 25, 27], //单
            [0, 2, 4, 6, 8, 10, 12, 14, 16, 18, 20, 22, 24, 26], //双
            [14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27], //大
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13], //小
            [10, 11, 12, 13, 14, 15, 16, 17], //中
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27], //边
            [15, 17, 19, 21, 23, 25, 27], //大单
            [1, 3, 5, 7, 9, 11, 13], //小单
            [14, 16, 18, 20, 22, 24, 26], //大双
            [0, 2, 4, 6, 8, 10, 12], //小双
            [18, 19, 20, 21, 22, 23, 24, 25, 26, 27], //大边
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], //小边
            [1, 3, 5, 7, 9, 19, 21, 23, 25, 27], //单边
            [0, 2, 4, 6, 8, 18, 20, 22, 24, 26], //双边
            [0, 10, 20], //0尾
            [1, 11, 21], //1尾
            [2, 12, 22], //2尾
            [3, 13, 23], //3尾
            [4, 14, 24], //4尾
            [0, 1, 2, 3, 4, 10, 11, 12, 13, 14, 20, 21, 22, 23, 24], //小尾
            [5, 15, 25], //5尾
            [6, 16, 26], //6尾
            [7, 17, 27], //7尾
            [8, 18], //8尾
            [9, 19], //9尾
            [5, 6, 7, 8, 9, 15, 16, 17, 18, 19, 25, 26, 27], //大尾
            [0, 3, 6, 9, 12, 15, 18, 21, 24, 27], //3余0
            [1, 4, 7, 10, 13, 16, 19, 22, 25], //3余1
            [2, 5, 8, 11, 14, 17, 20, 23, 26], //3余2
            [0, 4, 8, 12, 16, 20, 24], //4余0
            [1, 5, 9, 13, 17, 21, 25], //4余1
            [2, 6, 10, 14, 18, 22, 26], //4余2
            [3, 7, 11, 15, 19, 23, 27], //4余3
            [0, 5, 10, 15, 20, 25], //5余0
            [1, 6, 11, 16, 21, 26], //5余1
            [2, 7, 12, 17, 22, 27], //5余2
            [3, 8, 13, 18, 23], //5余3
            [4, 9, 14, 19, 24] //5余4
            );
        </script>
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
                        <a class="login-out" href="javascript:document.getElementById(&#39;logoutFormTop&#39;).submit()">[退出]</a>
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
                        <div class="fenge-box"><span class="jt-01"></span></div>
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
                                期开奖结果：<?php echo ($tipData["num1"]); ?>+<?php echo ($tipData["num2"]); ?>+<?php echo ($tipData["num3"]); ?>=
                                <span class="now-jieguo"><?php echo ($tipData['num1']+$tipData['num2']+$tipData['num3']); ?></span>
                                <a target="_blank" href="http://www.bwlc.gov.cn/bulletin/keno.html">[官方查询]</a>
                                <a href="http://game3799.com/lucky28/guide">[游戏帮助]</a>
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
				<div class="new_betting_form">
					<div class="new_betting_form_left">
						<div class="new_betting_form_left_cap">
							<a id="m_a0" class="sel" onclick="modes_easy_all(0)">简易模式</a><a id="m_a1" onclick="modes_easy_all(1)">标准模式</a>
						</div>
						<!--简易模式-->
						<div id="modes_easy" class="new_betting_simple_model">
							<p>
								<a href="javascript:void(0);" attr="3" class="a1 mode_lottery1">压大<span>(14到27)</span></a>
								<a href="javascript:void(0);" attr="4" style="cursor: pointer" class="a1 mode_lottery1">压小<span>(0到13)</span></a>
							</p>
							<p>
								<a href="javascript:void(0);" attr="1" class="a2 mode_lottery1">单<br><span>奇数1.3.5…27</span></a>
								<a href="javascript:void(0);" attr="2" class="a2 mode_lottery1">双<br><span>偶数0.2.4…26</span></a>
								<a href="javascript:void(0);" attr="5" class="a2 mode_lottery1">中<br><span>10到17</span></a>
								<a href="javascript:void(0);" attr="6" class="a2 mode_lottery1">边<br><span>0-9到18-27</span></a>
							</p>
						</div>
						<!--标准模式-->
						<div id="modes_all" class="new_standard" style="display: none;">
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="0">全包</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="1">单</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="7">大单</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="8">小单</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="13">单边</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="2">双</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="9">大双</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="10">小双</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="14">双边</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="3">大</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="4">小</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="5">中</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="6">边</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="11">大边</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="12">小边</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="15">0尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="16">1尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="17">2尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="18">3尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="19">4尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="21">5尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="22">6尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="23">7尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="24">8尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="25">9尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="20">小尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="26">大尾</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="27">3余0</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="28">3余1</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="29">3余2</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="30">4余0</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="31">4余1</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="32">4余2</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="33">4余3</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="34">5余0</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="35">5余1</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="36">5余2</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="37">5余3</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery" attr="38">5余4</a>
							<a href="javascript:void(0);" class="standard_bg1 mode_lottery">清空</a>
						</div>
					</div>
					<div class="new_betting_form_right">
						<div class="new_betting_form_right_cap">
							自定义模式
							<a id="add_mode" class="a1" href="#">+添加新模式</a>
						</div>
						<div class="new_betting_from_name">
							<ul id="my_modes_name clear-fix"></ul>
						</div>
					</div>
				</div>
                <div class="luck_insert">
                    <!--加倍和赔率-->
                    <div class="insert_par1">
                        <span class="jiazhu">加注</span>
                        <a href="javascript:void(0);" class="double_insert">0.5倍</a>
                        <a href="javascript:void(0);" class="double_insert">0.8倍</a>
                        <a href="javascript:void(0);" class="double_insert">1.2倍</a>
                        <a href="javascript:void(0);" class="double_insert">1.5倍</a>
                        <a href="javascript:void(0);" class="double_insert">2倍</a>
                        <a href="javascript:void(0);" class="double_insert">5倍</a>
                        <a href="javascript:void(0);" class="double_insert">10倍</a>
                        <a href="javascript:void(0);" class="double_insert mode_lottery" attr="0">全包</a>
                        <a href="javascript:void(0);" class="double_insert J_suohaBtn" data-val="<?php echo ($userData['money']); ?>">梭哈</a>
                        <p class="total_md">
                            <strong>
                                <label>总投注金豆：</label>
                                <span id="total_md_lottery">0</span>
                            </strong>
                        </p>
                        <a href="javascript:void(0);" class="total_md_btn J_TZBtn">确认投注</a>
                        <a href="javascript:void(0);" class="the_odds touzhu2">清除</a>
                    </div>
                    <div class="across clear-fix" id="panel">
                        <div class="across_par1 ">
                            <?php $__FOR_START_12216__=0;$__FOR_END_12216__=10;for($i=$__FOR_START_12216__;$i < $__FOR_END_12216__;$i+=1){ ?><div class="across_par1_no clear-fix">
                                    <div class="across_par1_no_left">
                                        <div id="click_number<?php echo ($i); ?>" class="click_number no_left_bg" style="cursor: pointer;"><?php echo ($i); ?></div>
                                    </div>
                                    <div style="display: none;">
                                        <input name="checkboxd" id="checkboxd<?php echo ($i); ?>" value="checkbox" type="checkbox">
                                    </div>
                                    <div class="across_par1_no_right">
                                        <p>
                                            <input class="downhhhh input_modou_txt_null" name="mdp_coin" id="txt<?php echo ($i); ?>"
                                            onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                            maxlength="15" type="text">
                                            <a style="display: none;" class="sack_02" href="javascript:void(0);" onclick="clear_input('txt<?php echo ($i); ?>',this);"
                                            id="clear_this_val<?php echo ($i); ?>">
                                            </a>
                                            <span style="display: none;" id="peilv<?php echo ($i); ?>">
                                                <label>×</label>
                                                <a href="javascript:void(0);" class="multiple" id="<?php echo ($i); ?>" val="0.1">.1</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="0.5" class="multiple">.5</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="2" class="multiple">2</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="10" class="multiple">10</a>
                                            </span>
                                        </p>
                                        <p>
                                            当前赔率:
                                            <span class="color_02" id="this_lottery_odds<?php echo ($i); ?>"><?php echo ($gameOdds[$i]); ?></span>
                                            | 上期赔率:
                                            <span id="last_lottery_odds<?php echo ($i); ?>"><?php echo ($preGameOdds[$i]); ?></span>
                                        </p>
                                    </div>
                                </div><?php } ?>
                        </div>
                        <div class="across_par1 ">
                            <?php $__FOR_START_4497__=10;$__FOR_END_4497__=18;for($i=$__FOR_START_4497__;$i < $__FOR_END_4497__;$i+=1){ ?><div class="across_par1_no clear-fix">
                                    <div class="across_par1_no_left">
                                        <div id="click_number<?php echo ($i); ?>" class="click_number no_left_bg" style="cursor: pointer;"><?php echo ($i); ?></div>
                                    </div>
                                    <div style="display: none;">
                                        <input name="checkboxd" id="checkboxd<?php echo ($i); ?>" value="checkbox" type="checkbox">
                                    </div>
                                    <div class="across_par1_no_right">
                                        <p>
                                            <input class="downhhhh input_modou_txt_null" name="mdp_coin" id="txt<?php echo ($i); ?>"
                                            onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                            maxlength="15" type="text">
                                            <a style="display: none;" class="sack_02" href="javascript:void(0);" onclick="clear_input('txt<?php echo ($i); ?>',this);"
                                            id="clear_this_val<?php echo ($i); ?>">
                                            </a>
                                            <span style="display: none;" id="peilv<?php echo ($i); ?>">
                                                <label>×</label>
                                                <a href="javascript:void(0);" class="multiple" id="<?php echo ($i); ?>" val="0.1">.1</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="0.5" class="multiple">.5</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="2" class="multiple">2</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="10" class="multiple">10</a>
                                            </span>
                                        </p>
                                        <p>
                                            当前赔率:
                                            <span class="color_02" id="this_lottery_odds<?php echo ($i); ?>"><?php echo ($gameOdds[$i]); ?></span>
											| 上期赔率:
                                            <span id="last_lottery_odds<?php echo ($i); ?>"><?php echo ($preGameOdds[$i]); ?></span>
                                        </p>
                                    </div>
                                </div><?php } ?>
                        </div>
                        <div class="across_par1 ">
                            <?php $__FOR_START_22774__=18;$__FOR_END_22774__=28;for($i=$__FOR_START_22774__;$i < $__FOR_END_22774__;$i+=1){ ?><div class="across_par1_no clear-fix">
                                    <div class="across_par1_no_left">
                                        <div id="click_number<?php echo ($i); ?>" class="click_number no_left_bg" style="cursor: pointer;"><?php echo ($i); ?></div>
                                    </div>
                                    <div style="display: none;">
                                        <input name="checkboxd" id="checkboxd<?php echo ($i); ?>" value="checkbox" type="checkbox">
                                    </div>
                                    <div class="across_par1_no_right">
                                        <p>
                                            <input class="downhhhh input_modou_txt_null" name="mdp_coin" id="txt<?php echo ($i); ?>"
                                            onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))"
                                            maxlength="15" type="text">
                                            <a style="display: none;" class="sack_02" href="javascript:void(0);" onclick="clear_input('txt<?php echo ($i); ?>',this);"
                                            id="clear_this_val<?php echo ($i); ?>">
                                            </a>
                                            <span style="display: none;" id="peilv<?php echo ($i); ?>">
                                                <label>×</label>
                                                <a href="javascript:void(0);" class="multiple" id="<?php echo ($i); ?>" val="0.1">.1</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="0.5" class="multiple">.5</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="2" class="multiple">2</a>
                                                <a href="javascript:void(0);" id="<?php echo ($i); ?>" val="10" class="multiple">10</a>
                                            </span>
                                        </p>
                                        <p>
                                            当前赔率:
                                            <span class="color_02" id="this_lottery_odds<?php echo ($i); ?>"><?php echo ($gameOdds[$i]); ?></span>
                                            | 上期赔率:
                                            <span id="last_lottery_odds<?php echo ($i); ?>"><?php echo ($preGameOdds[$i]); ?></span>
                                        </p>
                                    </div>
                                </div><?php } ?>
                        </div>
                        <div class="across_par2">
                            <p class="color_03" align="center">我的总投注金豆</p>
                            <p align="center">
                                <strong><span id="total_md_lottery2">0</span></strong>
                                <span class="jindou-logo"></span>
                            </p>
                            <p>
                                <a href="javascript:void(0);" data-game="pc28" data-issue="<?php echo ($issueNum); ?>"
                                data-url="/waibao/index.php/Home/Guess/guess" class="suer_insert J_TZBtn">
                                    确认投注
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- 内容 end -->
                <div id="sound_bet" style="display: none">
                </div>
                <div class="fuceng-html-box1">
                    <div class="fuceng-box-01">
                        <div class="fc-ttl-box clear-fix">
                            <h6 class="ttl-sp">提示信息</h6>
                            <a href="#" class="fc-close J_closefc"></a>
                        </div>
                        <div class="fc-main-box"></div>
                    </div>
                </div>
                <div class="fuceng-html-box1">
                    <div class="fuceng-box">
                        <div class="fc-ttl-box clear-fix">
                            <h6 class="ttl-sp">提示信息</h6>
                            <a href="#" class="fc-close J_closefc"></a>
                        </div>
                        <div class="fc-main-box"></div>
                    </div>
                </div>
                <div class="fuceng-html-box suoha-html-box"></div>
            </div>
        </div>
        <div class="fuceng-html-box suoha-html-box"></div>
        <div class="footer-box">
            <div class="width-1000">
                <p class="text-02 mar-t">申明：游戏中使用到的游戏币等均为游戏道具，不具有任何财产性功能，只限用户本人在游戏中使用。</p>
                <p class="text-02">健康游戏忠告：抵制不良游戏 拒绝盗版游戏 注意自我保护 谨防受骗上当 适度游戏益脑 沉迷游戏伤身 合理安排时间 享受健康生活</p>
            </div>
        </div>
        <div class="black-cover"></div>
        <script src="/waibao/Public/front/common.js"></script>
        <script src="/waibao/Public/front/touzhu-cz.js"></script>
        <script src="/waibao/Public/front/touzhu.js"></script>
        <script src="/waibao/Public/front/swfobject.js"></script>
    </body>
</html>