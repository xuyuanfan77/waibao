/*
Navicat MySQL Data Transfer

Source Server         : xuyuanfan
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2016-11-11 17:31:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` char(255) NOT NULL COMMENT 'ID号',
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '123');

-- ----------------------------
-- Table structure for game
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID号',
  `name` char(20) NOT NULL COMMENT '游戏名称',
  `lotteryname` char(20) NOT NULL COMMENT '福彩名称',
  `issue` int(11) unsigned NOT NULL COMMENT '期号',
  `num1` tinyint(4) unsigned DEFAULT NULL COMMENT '开奖号码1',
  `num2` tinyint(4) unsigned DEFAULT NULL COMMENT '开奖号码2',
  `num3` tinyint(4) unsigned DEFAULT NULL COMMENT '开奖号码3',
  `money0` int(10) unsigned DEFAULT '0' COMMENT '号码0的投注金额',
  `money1` int(10) unsigned DEFAULT '0' COMMENT '号码1的投注金额',
  `money2` int(10) unsigned DEFAULT '0' COMMENT '号码2的投注金额',
  `money3` int(10) unsigned DEFAULT '0' COMMENT '号码3的投注金额',
  `money4` int(10) unsigned DEFAULT '0' COMMENT '号码4的投注金额',
  `money5` int(10) unsigned DEFAULT '0' COMMENT '号码5的投注金额',
  `money6` int(10) unsigned DEFAULT '0' COMMENT '号码6的投注金额',
  `money7` int(10) unsigned DEFAULT '0' COMMENT '号码7的投注金额',
  `money8` int(10) unsigned DEFAULT '0' COMMENT '号码8的投注金额',
  `money9` int(10) unsigned DEFAULT '0' COMMENT '号码9的投注金额',
  `money10` int(10) DEFAULT '0' COMMENT '号码10的投注金额',
  `money11` int(10) unsigned DEFAULT '0' COMMENT '号码11的投注金额',
  `money12` int(10) unsigned DEFAULT '0' COMMENT '号码12的投注金额',
  `money13` int(10) unsigned DEFAULT '0' COMMENT '号码13的投注金额',
  `money14` int(10) unsigned DEFAULT '0' COMMENT '号码14的投注金额',
  `money15` int(10) unsigned DEFAULT '0' COMMENT '号码15的投注金额',
  `money16` int(10) unsigned DEFAULT '0' COMMENT '号码16的投注金额',
  `money17` int(10) unsigned DEFAULT '0' COMMENT '号码17的投注金额',
  `money18` int(10) unsigned DEFAULT '0' COMMENT '号码18的投注金额',
  `money19` int(10) unsigned DEFAULT '0' COMMENT '号码19的投注金额',
  `money20` int(10) unsigned DEFAULT '0' COMMENT '号码20的投注金额',
  `money21` int(10) unsigned DEFAULT '0' COMMENT '号码21的投注金额',
  `money22` int(10) unsigned DEFAULT '0' COMMENT '号码22的投注金额',
  `money23` int(10) unsigned DEFAULT '0' COMMENT '号码23的投注金额',
  `money24` int(10) unsigned DEFAULT '0' COMMENT '号码24的投注金额',
  `money25` int(10) unsigned DEFAULT '0' COMMENT '号码25的投注金额',
  `money26` int(10) unsigned DEFAULT '0' COMMENT '号码6的投注金额',
  `money27` int(10) unsigned DEFAULT '0' COMMENT '号码27的投注金额',
  `peoplenum` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '中奖人数',
  `jackpot` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '奖金池金额',
  `deadline` datetime NOT NULL COMMENT '竞猜截至时间',
  `runtime` datetime NOT NULL COMMENT '开奖时间',
  `statu` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0、竞猜，1、封盘，2、正在开奖，3、已开奖',
  `createtime` datetime NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=296 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of game
-- ----------------------------

-- ----------------------------
-- Table structure for guess
-- ----------------------------
DROP TABLE IF EXISTS `guess`;
CREATE TABLE `guess` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID号',
  `userid` char(13) DEFAULT NULL COMMENT '用户ID号',
  `gamename` char(20) NOT NULL COMMENT '游戏名称',
  `gameissue` int(10) unsigned NOT NULL COMMENT '期号',
  `money0` int(10) unsigned DEFAULT NULL COMMENT '号码0投注金额',
  `money1` int(10) unsigned DEFAULT NULL COMMENT '号码1投注金额',
  `money2` int(10) unsigned DEFAULT NULL COMMENT '号码2投注金额',
  `money3` int(10) unsigned DEFAULT NULL COMMENT '号码3投注金额',
  `money4` int(10) unsigned DEFAULT NULL COMMENT '号码4投注金额',
  `money5` int(10) unsigned DEFAULT NULL COMMENT '号码5投注金额',
  `money6` int(10) unsigned DEFAULT NULL COMMENT '号码6投注金额',
  `money7` int(10) unsigned DEFAULT NULL COMMENT '号码7投注金额',
  `money8` int(10) unsigned DEFAULT NULL COMMENT '号码8投注金额',
  `money9` int(10) unsigned DEFAULT NULL COMMENT '号码9投注金额',
  `money10` int(10) unsigned DEFAULT NULL COMMENT '号码10投注金额',
  `money11` int(10) unsigned DEFAULT NULL COMMENT '号码11投注金额',
  `money12` int(10) unsigned DEFAULT NULL COMMENT '号码12投注金额',
  `money13` int(10) unsigned DEFAULT NULL COMMENT '号码13投注金额',
  `money14` int(10) unsigned DEFAULT NULL COMMENT '号码14投注金额',
  `money15` int(10) unsigned DEFAULT NULL COMMENT '号码15投注金额',
  `money16` int(10) unsigned DEFAULT NULL COMMENT '号码16投注金额',
  `money17` int(10) unsigned DEFAULT NULL COMMENT '号码17投注金额',
  `money18` int(10) unsigned DEFAULT NULL COMMENT '号码18投注金额',
  `money19` int(10) unsigned DEFAULT NULL COMMENT '号码19投注金额',
  `money20` int(10) unsigned DEFAULT NULL COMMENT '号码20投注金额',
  `money21` int(10) unsigned DEFAULT NULL COMMENT '号码21投注金额',
  `money22` int(10) unsigned DEFAULT NULL COMMENT '号码22投注金额',
  `money23` int(10) unsigned DEFAULT NULL COMMENT '号码23投注金额',
  `money24` int(10) unsigned DEFAULT NULL COMMENT '号码24投注金额',
  `money25` int(10) unsigned DEFAULT NULL COMMENT '号码25投注金额',
  `money26` int(10) unsigned DEFAULT NULL COMMENT '号码26投注金额',
  `money27` int(10) unsigned DEFAULT NULL COMMENT '号码27投注金额',
  `input` int(10) unsigned DEFAULT NULL COMMENT '投入金额总额',
  `output` int(10) unsigned DEFAULT NULL COMMENT '产出金额总额',
  `createtime` datetime DEFAULT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guess
-- ----------------------------

-- ----------------------------
-- Table structure for lottery
-- ----------------------------
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID号',
  `name` char(20) NOT NULL COMMENT '福彩名称',
  `issue` int(10) unsigned NOT NULL COMMENT '期号',
  `num1` tinyint(3) unsigned NOT NULL COMMENT '号码1',
  `num2` tinyint(3) unsigned DEFAULT NULL COMMENT '号码2',
  `num3` tinyint(3) unsigned DEFAULT NULL COMMENT '号码3',
  `num4` tinyint(3) unsigned DEFAULT NULL COMMENT '号码4',
  `num5` tinyint(3) unsigned DEFAULT NULL COMMENT '号码5',
  `num6` tinyint(3) unsigned DEFAULT NULL COMMENT '号码6',
  `num7` tinyint(3) unsigned DEFAULT NULL COMMENT '号码7',
  `num8` tinyint(3) unsigned DEFAULT NULL COMMENT '号码8',
  `num9` tinyint(3) unsigned DEFAULT NULL COMMENT '号码9',
  `num10` tinyint(3) unsigned DEFAULT NULL COMMENT '号码10',
  `num11` tinyint(3) unsigned DEFAULT NULL COMMENT '号码11',
  `num12` tinyint(3) unsigned DEFAULT NULL COMMENT '号码12',
  `num13` tinyint(3) unsigned DEFAULT NULL COMMENT '号码13',
  `num14` tinyint(3) unsigned DEFAULT NULL COMMENT '号码14',
  `num15` tinyint(3) unsigned DEFAULT NULL COMMENT '号码15',
  `num16` tinyint(3) unsigned DEFAULT NULL COMMENT '号码16',
  `num17` tinyint(3) unsigned DEFAULT NULL COMMENT '号码17',
  `num18` tinyint(3) unsigned DEFAULT NULL COMMENT '号码18',
  `num19` tinyint(3) unsigned DEFAULT NULL COMMENT '号码19',
  `num20` tinyint(3) unsigned DEFAULT NULL COMMENT '号码20',
  `runtime` datetime NOT NULL COMMENT '开奖时间',
  `createtime` datetime NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lottery
-- ----------------------------

-- ----------------------------
-- Table structure for robotconfig
-- ----------------------------
DROP TABLE IF EXISTS `robotconfig`;
CREATE TABLE `robotconfig` (
  `gamename` char(20) NOT NULL COMMENT '游戏名称',
  `money0` int(10) unsigned DEFAULT NULL COMMENT '号码0投注金额',
  `money1` int(10) unsigned DEFAULT NULL COMMENT '号码1投注金额',
  `money2` int(10) unsigned DEFAULT NULL COMMENT '号码2投注金额',
  `money3` int(10) unsigned DEFAULT NULL COMMENT '号码3投注金额',
  `money4` int(10) unsigned DEFAULT NULL COMMENT '号码4投注金额',
  `money5` int(10) unsigned DEFAULT NULL COMMENT '号码5投注金额',
  `money6` int(10) unsigned DEFAULT NULL COMMENT '号码6投注金额',
  `money7` int(10) unsigned DEFAULT NULL COMMENT '号码7投注金额',
  `money8` int(10) unsigned DEFAULT NULL COMMENT '号码8投注金额',
  `money9` int(10) unsigned DEFAULT NULL COMMENT '号码9投注金额',
  `money10` int(10) unsigned DEFAULT NULL COMMENT '号码10投注金额',
  `money11` int(10) unsigned DEFAULT NULL COMMENT '号码11投注金额',
  `money12` int(10) unsigned DEFAULT NULL COMMENT '号码12投注金额',
  `money13` int(10) unsigned DEFAULT NULL COMMENT '号码13投注金额',
  `money14` int(10) unsigned DEFAULT NULL COMMENT '号码14投注金额',
  `money15` int(10) unsigned DEFAULT NULL COMMENT '号码15投注金额',
  `money16` int(10) unsigned DEFAULT NULL COMMENT '号码16投注金额',
  `money17` int(10) unsigned DEFAULT NULL COMMENT '号码17投注金额',
  `money18` int(10) unsigned DEFAULT NULL COMMENT '号码18投注金额',
  `money19` int(10) unsigned DEFAULT NULL COMMENT '号码19投注金额',
  `money20` int(10) unsigned DEFAULT NULL COMMENT '号码20投注金额',
  `money21` int(10) unsigned DEFAULT NULL COMMENT '号码21投注金额',
  `money22` int(10) unsigned DEFAULT NULL COMMENT '号码22投注金额',
  `money23` int(10) unsigned DEFAULT NULL COMMENT '号码23投注金额',
  `money24` int(10) unsigned DEFAULT NULL COMMENT '号码24投注金额',
  `money25` int(10) unsigned DEFAULT NULL COMMENT '号码25投注金额',
  `money26` int(10) unsigned DEFAULT NULL COMMENT '号码26投注金额',
  `money27` int(10) unsigned DEFAULT NULL COMMENT '号码27投注金额',
  PRIMARY KEY (`gamename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of robotconfig
-- ----------------------------
INSERT INTO `robotconfig` VALUES ('pc28', '100', '300', '600', '1000', '1500', '2100', '2800', '3600', '4500', '5500', '6300', '6900', '7300', '7500', '7500', '7300', '6900', '6300', '5500', '4500', '3600', '2800', '2100', '1500', '1000', '600', '300', '100');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` char(14) NOT NULL COMMENT 'ID号（唯一标识）',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `money` bigint(20) unsigned NOT NULL COMMENT '用户总积分',
  `createtime` datetime NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('57d1049d88231', 'xuyuanfan5', '123', '100000000', '2016-09-08 14:26:37');
INSERT INTO `user` VALUES ('57d10a4c9abbd', 'xuyuanfan1', '123', '99356789', '2016-09-08 14:50:52');
INSERT INTO `user` VALUES ('57d10a83b5acc', 'xuyuanfan2', '123', '100021646', '2016-09-08 14:51:47');
INSERT INTO `user` VALUES ('57d10a9ba983f', 'xuyuanfan3', '123', '99949203', '2016-09-08 14:52:11');
INSERT INTO `user` VALUES ('57d10abaf2f2d', 'xuyuanfan4', '123', '99955584', '2016-09-08 14:52:42');
INSERT INTO `user` VALUES ('5800e148ab58f', 'robot', '123456', '0', '2016-10-14 21:44:40');
INSERT INTO `user` VALUES ('5812c71a92cf1', 'xuyuanfan3', '123', '100000000', '2016-10-28 11:33:46');
INSERT INTO `user` VALUES ('5812c7226add1', 'xuyuanfan4', '123', '100000000', '2016-10-28 11:33:54');

-- ----------------------------
-- Procedure structure for overtimeCheck
-- ----------------------------
DROP PROCEDURE IF EXISTS `overtimeCheck`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `overtimeCheck`()
BEGIN
	#Routine body goes here...
	DECLARE v_endloop INT DEFAULT 0;
	DECLARE	v_id CHAR;
	DECLARE	v_publisher CHAR;
	DECLARE v_money BIGINT;
	DECLARE v_cur CURSOR FOR SELECT id,publisher,money FROM redpacket WHERE NOW()-lasttime>=1000000;
	DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_endloop = 1;

	OPEN v_cur;  
  FETCH NEXT FROM v_cur INTO v_id,v_publisher,v_money;
	REPEAT
		IF NOT v_endloop THEN
			UPDATE `user` SET money=money+v_money WHERE id=v_publisher;
			UPDATE redpacket SET money=0,number=0,overtime=1 WHERE id=v_id;
		END IF;
		FETCH NEXT FROM v_cur INTO v_id,v_publisher,v_money;
	UNTIL v_endloop END REPEAT;

	CLOSE v_cur;
END
;;
DELIMITER ;

-- ----------------------------
-- Event structure for overtimeCheck
-- ----------------------------
DROP EVENT IF EXISTS `overtimeCheck`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `overtimeCheck` ON SCHEDULE EVERY 1 DAY STARTS '2016-09-07 14:49:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL overtimeCheck()
;;
DELIMITER ;
