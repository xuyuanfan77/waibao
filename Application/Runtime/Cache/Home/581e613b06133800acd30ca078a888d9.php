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
        <link rel="stylesheet" href="/waibao/Public/front/touzhu-js16.css">
        <script type="text/javascript">
            var nub = new Array(0, 0, 0, 1, 3, 6, 10, 15, 21, 25, 27, 27, 25, 21, 15, 10, 6, 3, 1);
            var nub1 = new Array(0, 0, 1, 3, 6, 10, 15, 21, 28, 36, 45, 55, 63);
            var mode = new Array([3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18], //全包
            [3, 5, 7, 9, 11, 13, 15, 17], //单
            [4, 6, 8, 10, 12, 14, 16, 18], //双
            [11, 12, 13, 14, 15, 16, 17, 18], //大
            [3, 4, 5, 6, 7, 8, 9, 10], //小
            [9, 10, 11, 12, 8, 13, ], //中
            [3, 4, 5, 6, 7, 14, 15, 16, 17, 18], //边
            [11, 13, 15, 17], //大单
            [3, 5, 7, 9], //小单
            [12, 14, 16, 18], //大双
            [4, 6, 8, 10], //小双
            [14, 15, 16, 17, 18], //大边
            [3, 4, 5, 6, 7], //小边
            [3, 5, 7, 15, 17], //单边
            [4, 6, 14, 16, 18], //双边
            [10], //0尾
            [11], //1尾
            [12], //2尾
            [3, 13], //3尾
            [4, 14], //4尾
            [3, 4, 5, 10, 11, 12, 13, 14], //小尾
            [5, 15], //5尾
            [6, 16], //6尾
            [7, 17], //7尾
            [8, 18], //8尾
            [9], //9尾
            [5, 6, 7, 8, 9, 15, 16, 17, 18], //大尾
            [3, 6, 9, 12, 15, 18], //3余0
            [4, 7, 10, 13, 16], //3余1
            [5, 8, 11, 14, 17], //3余2
            [4, 8, 12, 16], //4余0
            [5, 9, 13, 17], //4余1
            [6, 10, 14, 18], //4余2
            [7, 11, 15], //4余3
            [5, 10, 15], //5余0
            [6, 11, 16], //5余1
            [7, 12, 17], //5余2
            [8, 13, 18], //5余3
            [9, 14] //5余4
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
                <div class="js16-nav-box game-two-nav">
                    <div class="two-nav-head">
                        <a class="head-list sel-color">
                            <strong>极速16首页</strong>
                        </a>
                        <p class="my-touzhu-box clear-fix">
                            <a class="my-touzhu-list " href="<?php echo U('Record/index', array('game'=>'js16'));?>">我的投注</a>
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
                            <?php $__FOR_START_7705__=3;$__FOR_END_7705__=9;for($i=$__FOR_START_7705__;$i < $__FOR_END_7705__;$i+=1){ ?><div class="across_par1_no clear-fix">
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
                                            <a style="display: none;" class="sack_02" href="javascript:void(0);" onclick="clear_input('txt<?php echo ($i); ?>',this);" id="clear_this_val<?php echo ($i); ?>"></a>
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
                            <?php $__FOR_START_7902__=9;$__FOR_END_7902__=13;for($i=$__FOR_START_7902__;$i < $__FOR_END_7902__;$i+=1){ ?><div class="across_par1_no clear-fix">
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
                                            <a style="display: none;" class="sack_02" href="javascript:void(0);" onclick="clear_input('txt<?php echo ($i); ?>',this);" id="clear_this_val<?php echo ($i); ?>"></a>
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
                            <?php $__FOR_START_30911__=13;$__FOR_END_30911__=19;for($i=$__FOR_START_30911__;$i < $__FOR_END_30911__;$i+=1){ ?><div class="across_par1_no clear-fix">
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
                                            <a style="display: none;" class="sack_02" href="javascript:void(0);" onclick="clear_input('txt<?php echo ($i); ?>',this);" id="clear_this_val<?php echo ($i); ?>"></a>
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
                                <strong>
                                    <span id="total_md_lottery2">0</span>
                                </strong>
                                <span class="jindou-logo"></span>
                            </p>
                            <p>
                                <a href="javascript:void(0);" data-game="js16" data-issue="<?php echo ($issueNum); ?>" data-url="/waibao/index.php/Home/Guess/guess" class="suer_insert J_TZBtn">
                                    确认投注
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- 内容 end -->
                <div id="sound_bet" style="display: none"></div>
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