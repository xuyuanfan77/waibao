/*
Navicat MySQL Data Transfer

Source Server         : xuyuanfan
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2016-10-28 17:36:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` char(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'xuyuanfan1', '123');

-- ----------------------------
-- Table structure for game
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` char(13) NOT NULL,
  `name` char(20) NOT NULL,
  `lotteryname` char(20) NOT NULL,
  `issue` int(11) unsigned NOT NULL,
  `num1` tinyint(4) unsigned DEFAULT NULL,
  `num2` tinyint(4) unsigned DEFAULT NULL,
  `num3` tinyint(4) unsigned DEFAULT NULL,
  `money0` int(10) unsigned DEFAULT '0',
  `money1` int(10) unsigned DEFAULT '0',
  `money2` int(10) unsigned DEFAULT '0',
  `money3` int(10) unsigned DEFAULT '0',
  `money4` int(10) unsigned DEFAULT '0',
  `money5` int(10) unsigned DEFAULT '0',
  `money6` int(10) unsigned DEFAULT '0',
  `money7` int(10) unsigned DEFAULT '0',
  `money8` int(10) unsigned DEFAULT '0',
  `money9` int(10) unsigned DEFAULT '0',
  `money10` int(10) DEFAULT '0',
  `money11` int(10) unsigned DEFAULT '0',
  `money12` int(10) unsigned DEFAULT '0',
  `money13` int(10) unsigned DEFAULT '0',
  `money14` int(10) unsigned DEFAULT '0',
  `money15` int(10) unsigned DEFAULT '0',
  `money16` int(10) unsigned DEFAULT '0',
  `money17` int(10) unsigned DEFAULT '0',
  `money18` int(10) unsigned DEFAULT '0',
  `money19` int(10) unsigned DEFAULT '0',
  `money20` int(10) unsigned DEFAULT '0',
  `money21` int(10) unsigned DEFAULT '0',
  `money22` int(10) unsigned DEFAULT '0',
  `money23` int(10) unsigned DEFAULT '0',
  `money24` int(10) unsigned DEFAULT '0',
  `money25` int(10) unsigned DEFAULT '0',
  `money26` int(10) unsigned DEFAULT '0',
  `money27` int(10) unsigned DEFAULT '0',
  `peoplenum` bigint(20) unsigned NOT NULL DEFAULT '0',
  `jackpot` bigint(20) unsigned NOT NULL DEFAULT '0',
  `deadline` datetime NOT NULL,
  `runtime` datetime NOT NULL,
  `statu` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0、竞猜，1、封盘，2、开奖',
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of game
-- ----------------------------

-- ----------------------------
-- Table structure for guess
-- ----------------------------
DROP TABLE IF EXISTS `guess`;
CREATE TABLE `guess` (
  `id` char(13) NOT NULL,
  `userid` char(13) DEFAULT NULL,
  `gamename` char(20) NOT NULL,
  `gameissue` int(10) unsigned NOT NULL,
  `money0` int(10) unsigned DEFAULT NULL,
  `money1` int(10) unsigned DEFAULT NULL,
  `money2` int(10) unsigned DEFAULT NULL,
  `money3` int(10) unsigned DEFAULT NULL,
  `money4` int(10) unsigned DEFAULT NULL,
  `money5` int(10) unsigned DEFAULT NULL,
  `money6` int(10) unsigned DEFAULT NULL,
  `money7` int(10) unsigned DEFAULT NULL,
  `money8` int(10) unsigned DEFAULT NULL,
  `money9` int(10) unsigned DEFAULT NULL,
  `money10` int(10) unsigned DEFAULT NULL,
  `money11` int(10) unsigned DEFAULT NULL,
  `money12` int(10) unsigned DEFAULT NULL,
  `money13` int(10) unsigned DEFAULT NULL,
  `money14` int(10) unsigned DEFAULT NULL,
  `money15` int(10) unsigned DEFAULT NULL,
  `money16` int(10) unsigned DEFAULT NULL,
  `money17` int(10) unsigned DEFAULT NULL,
  `money18` int(10) unsigned DEFAULT NULL,
  `money19` int(10) unsigned DEFAULT NULL,
  `money20` int(10) unsigned DEFAULT NULL,
  `money21` int(10) unsigned DEFAULT NULL,
  `money22` int(10) unsigned DEFAULT NULL,
  `money23` int(10) unsigned DEFAULT NULL,
  `money24` int(10) unsigned DEFAULT NULL,
  `money25` int(10) unsigned DEFAULT NULL,
  `money26` int(10) unsigned DEFAULT NULL,
  `money27` int(10) unsigned DEFAULT NULL,
  `input` int(10) unsigned DEFAULT NULL,
  `output` int(10) unsigned DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guess
-- ----------------------------

-- ----------------------------
-- Table structure for lottery
-- ----------------------------
DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `id` char(13) NOT NULL,
  `name` char(20) NOT NULL,
  `issue` int(10) unsigned NOT NULL,
  `num1` tinyint(3) unsigned NOT NULL,
  `num2` tinyint(3) unsigned DEFAULT NULL,
  `num3` tinyint(3) unsigned DEFAULT NULL,
  `num4` tinyint(3) unsigned DEFAULT NULL,
  `num5` tinyint(3) unsigned DEFAULT NULL,
  `num6` tinyint(3) unsigned DEFAULT NULL,
  `num7` tinyint(3) unsigned DEFAULT NULL,
  `num8` tinyint(3) unsigned DEFAULT NULL,
  `num9` tinyint(3) unsigned DEFAULT NULL,
  `num10` tinyint(3) unsigned DEFAULT NULL,
  `num11` tinyint(3) unsigned DEFAULT NULL,
  `num12` tinyint(3) unsigned DEFAULT NULL,
  `num13` tinyint(3) unsigned DEFAULT NULL,
  `num14` tinyint(3) unsigned DEFAULT NULL,
  `num15` tinyint(3) unsigned DEFAULT NULL,
  `num16` tinyint(3) unsigned DEFAULT NULL,
  `num17` tinyint(3) unsigned DEFAULT NULL,
  `num18` tinyint(3) unsigned DEFAULT NULL,
  `num19` tinyint(3) unsigned DEFAULT NULL,
  `num20` tinyint(3) unsigned DEFAULT NULL,
  `runtime` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lottery
-- ----------------------------

-- ----------------------------
-- Table structure for receiver
-- ----------------------------
DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver` (
  `id` char(14) NOT NULL COMMENT 'ID号（唯一标识）',
  `receiver` char(14) NOT NULL COMMENT '抢红包者ID号',
  `redpacket` char(14) NOT NULL COMMENT '红包ID号',
  `money` bigint(20) NOT NULL COMMENT '所抢积分',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiver
-- ----------------------------
INSERT INTO `receiver` VALUES ('57d107b636990', '57d102b3280de', '57d10776a5f07', '1', '2016-09-08 14:39:50');
INSERT INTO `receiver` VALUES ('57d10a6890f56', '57d10a4c9abbd', '57d10a61003d0', '6', '2016-09-08 14:51:20');
INSERT INTO `receiver` VALUES ('57d10a8d5f5e1', '57d10a83b5acc', '57d10a61003d0', '0', '2016-09-08 14:51:57');
INSERT INTO `receiver` VALUES ('57d10aa5ef9c5', '57d10a9ba983f', '57d10a61003d0', '7', '2016-09-08 14:52:21');
INSERT INTO `receiver` VALUES ('57d10ac1df28e', '57d10abaf2f2d', '57d10a61003d0', '7', '2016-09-08 14:52:49');
INSERT INTO `receiver` VALUES ('57d10ad875104', '57d10abaf2f2d', '57d10ad3c52c1', '34', '2016-09-08 14:53:12');
INSERT INTO `receiver` VALUES ('57d10aeb3fe56', '57d10a4c9abbd', '57d10ad3c52c1', '18', '2016-09-08 14:53:31');

-- ----------------------------
-- Table structure for redpacket
-- ----------------------------
DROP TABLE IF EXISTS `redpacket`;
CREATE TABLE `redpacket` (
  `id` char(14) NOT NULL COMMENT 'ID号（唯一标识）',
  `publisher` char(14) NOT NULL COMMENT '发红包者ID号',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `money` bigint(20) NOT NULL COMMENT '红包总积分',
  `number` int(11) NOT NULL COMMENT '红包个数',
  `distribution` tinyint(3) unsigned zerofill NOT NULL COMMENT '分配方式（1：平均，2：随机）',
  `overtime` tinyint(3) unsigned zerofill NOT NULL COMMENT '红包是否超时（0：未超时，1：超时）',
  `lasttime` datetime NOT NULL COMMENT '最后一次被抢时间',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of redpacket
-- ----------------------------
INSERT INTO `redpacket` VALUES ('57d10a61003d0', '57d10a4c9abbd', 'xuyuanfan1', '0', '0', '001', '000', '2016-09-08 14:52:49', '2016-09-08 14:51:13');
INSERT INTO `redpacket` VALUES ('57d10ad3c52c1', '57d10abaf2f2d', 'xuyuanfan4', '48', '1', '002', '000', '2016-09-08 14:53:31', '2016-09-08 14:53:07');

-- ----------------------------
-- Table structure for robotconfig
-- ----------------------------
DROP TABLE IF EXISTS `robotconfig`;
CREATE TABLE `robotconfig` (
  `gamename` char(20) NOT NULL,
  `money0` int(10) unsigned DEFAULT NULL,
  `money1` int(10) unsigned DEFAULT NULL,
  `money2` int(10) unsigned DEFAULT NULL,
  `money3` int(10) unsigned DEFAULT NULL,
  `money4` int(10) unsigned DEFAULT NULL,
  `money5` int(10) unsigned DEFAULT NULL,
  `money6` int(10) unsigned DEFAULT NULL,
  `money7` int(10) unsigned DEFAULT NULL,
  `money8` int(10) unsigned DEFAULT NULL,
  `money9` int(10) unsigned DEFAULT NULL,
  `money10` int(10) unsigned DEFAULT NULL,
  `money11` int(10) unsigned DEFAULT NULL,
  `money12` int(10) unsigned DEFAULT NULL,
  `money13` int(10) unsigned DEFAULT NULL,
  `money14` int(10) unsigned DEFAULT NULL,
  `money15` int(10) unsigned DEFAULT NULL,
  `money16` int(10) unsigned DEFAULT NULL,
  `money17` int(10) unsigned DEFAULT NULL,
  `money18` int(10) unsigned DEFAULT NULL,
  `money19` int(10) unsigned DEFAULT NULL,
  `money20` int(10) unsigned DEFAULT NULL,
  `money21` int(10) unsigned DEFAULT NULL,
  `money22` int(10) unsigned DEFAULT NULL,
  `money23` int(10) unsigned DEFAULT NULL,
  `money24` int(10) unsigned DEFAULT NULL,
  `money25` int(10) unsigned DEFAULT NULL,
  `money26` int(10) unsigned DEFAULT NULL,
  `money27` int(10) unsigned DEFAULT NULL,
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
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('57d1049d88231', 'xuyuanfan5', '123', '100000000', '2016-09-08 14:26:37');
INSERT INTO `user` VALUES ('57d10a4c9abbd', 'xuyuanfan1', '123', '99681904', '2016-09-08 14:50:52');
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
