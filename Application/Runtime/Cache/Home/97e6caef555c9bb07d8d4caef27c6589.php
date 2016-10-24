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
        <link rel="stylesheet" type="text/css" href="/waibao/Public/front/game-comp.css">
        <link rel="stylesheet" type="text/css" href="/waibao/Public/front/guess.css">
        <link rel="icon" type="image/png" href="http://image.game3799.com/19dou/img/favicon.png">
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
                        <li class="game-nav-list selected">
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
                <div class="fksc-nav-box game-two-nav">
                    <div class="two-nav-head">
                        <a class="head-list sel-color">
                            <strong>疯狂赛车首页</strong>
                        </a>
                        <p class="my-touzhu-box clear-fix">
                            <a class="my-touzhu-list " href="<?php echo U('Record/index', array('game'=>'fksc'));?>">我的投注</a>
                        </p>
                    </div>
                </div>
                <!-- 公正提示 -->
                <div class="kaijiang-box kaijiang-fksc">
                    <div class="chengxin-box">
                        <span class="chengxin-logo"></span>
                        <div class="chengxin-text-box">
                            <p class="chengxin-text-01">疯狂赛车开奖采用北京PK10第三方数据</p>
                            <p class="chengxin-text-02">公平公正 无法作弊</p>
                        </div>
                    </div>
                    <div class="kaijiang-time-box fksc-box">
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
                                期开奖结果：
                                <span class="fk-car car<?php echo ($tipData['num1']); ?>"></span>
                                <a target="_blank" href="http://www.bwlc.net/bulletin/trax.html">[官方查询]</a>
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
                <div class="guess-box fksc-box">
                    <table>
                        <tbody>
                            <tr>
                                <th>游戏期号</th>
                                <th>开奖时间</th>
                                <th>开奖号码</th>
                                <th>奖池总额</th>
                                <th>中奖人数</th>
                                <th>盈亏</th>
                                <th>参与</th>
                            </tr>
                            <?php if(is_array($gameData)): foreach($gameData as $key=>$data): ?><tr>
                                    <td><?php echo ($data["issue"]); ?></td>
                                    <td><?php echo ($data["runtime"]); ?></td>
                                    <?php if($data['statu'] == 0): ?><td>
                                            <span class="js-qus qus-fksc"></span>
                                        </td>
                                    <?php elseif($data['statu'] == 3): ?>
                                        <td>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num1']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num2']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num3']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num4']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num5']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num6']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num7']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num8']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num9']); ?>"></i>
                                            <i class="fk-num<?php echo ($data['lotteryData']['num10']); ?>"></i>
                                            =
                                            <span class="fk-car car<?php echo ($data["num1"]); ?>"></span>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <span class="js-qus qus-fksc"></span>
                                        </td><?php endif; ?>
                                    <td>
                                        <?php echo ($data["jackpot"]); ?>
                                        <i class="kdou"></i>
                                    </td>
                                    <?php if($data['statu'] == 3): ?><td><?php echo ($data["peoplenum"]); ?></td>
                                    <?php else: ?>
                                        <td>-</td><?php endif; ?>
                                    <?php if($data['statu'] == 3): ?><td>
                                            <span class="green">0</span>
                                            <i class="kdou"></i>
                                        </td>
                                    <?php else: ?>
                                        <td>-</td><?php endif; ?>
                                    <?php if($data['statu'] == 0): ?><td>
                                            <a href="<?php echo U('Guess/index', array('game'=>'fksc', 'issue'=>$data['issue']));?>" class="go-jc jc-fksc">竞猜</a>
                                        </td>
                                    <?php elseif($data['statu'] == 1): ?>
                                        <td>
                                            <a class="go-ta">截止竞猜</a>
                                        </td>
                                    <?php elseif($data['statu'] == 2): ?>
                                        <td>
                                            <a class="go-ta">正在开奖</a>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <a class="go-ta">已开奖</a>
                                        </td><?php endif; ?>
                                </tr><?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- 内容 end -->
                <div class="list-page-box clear-fix">
                    <?php echo ($pageShow); ?>
                </div>
                <div id="sound_bet" style="display: none"></div>
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
        <script src="/waibao/Public/front/touzhu.js"></script>
        <script src="/waibao/Public/front/swfobject.js"></script>
    </body>
</html>