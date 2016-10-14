/*
Navicat MySQL Data Transfer

Source Server         : xuyuanfan
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2016-10-14 17:39:08
*/

SET FOREIGN_KEY_CHECKS=0;

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
  `odds0` float unsigned NOT NULL DEFAULT '1',
  `odds1` float unsigned NOT NULL DEFAULT '1',
  `odds2` float unsigned NOT NULL DEFAULT '1',
  `odds3` float unsigned NOT NULL DEFAULT '1',
  `odds4` float unsigned NOT NULL DEFAULT '1',
  `odds5` float unsigned NOT NULL DEFAULT '1',
  `odds6` float unsigned NOT NULL DEFAULT '1',
  `odds7` float unsigned NOT NULL DEFAULT '1',
  `odds8` float unsigned NOT NULL DEFAULT '1',
  `odds9` float unsigned NOT NULL DEFAULT '1',
  `odds10` float NOT NULL DEFAULT '1',
  `odds11` float unsigned NOT NULL DEFAULT '1',
  `odds12` float unsigned NOT NULL DEFAULT '1',
  `odds13` float unsigned NOT NULL DEFAULT '1',
  `odds14` float unsigned NOT NULL DEFAULT '1',
  `odds15` float unsigned NOT NULL DEFAULT '1',
  `odds16` float unsigned NOT NULL DEFAULT '1',
  `odds17` float unsigned NOT NULL DEFAULT '1',
  `odds18` float unsigned NOT NULL DEFAULT '1',
  `odds19` float unsigned NOT NULL DEFAULT '1',
  `odds20` float unsigned NOT NULL DEFAULT '1',
  `odds21` float unsigned NOT NULL DEFAULT '1',
  `odds22` float unsigned NOT NULL DEFAULT '1',
  `odds23` float unsigned NOT NULL DEFAULT '1',
  `odds24` float unsigned NOT NULL DEFAULT '1',
  `odds25` float unsigned NOT NULL DEFAULT '1',
  `odds26` float unsigned NOT NULL DEFAULT '1',
  `odds27` float unsigned NOT NULL DEFAULT '1',
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
  `userid` char(13) NOT NULL,
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
INSERT INTO `lottery` VALUES ('5800a6b1e711d', '北京快乐8', '786550', '13', '80', '30', '51', '15', '72', '37', '47', '14', '60', '54', '27', '2', '40', '58', '12', '52', '59', '17', '34', '2016-10-14 17:30:00', '2016-10-14 17:34:41');
INSERT INTO `lottery` VALUES ('5800a6b2611fe', '北京PK10', '581122', '8', '7', '1', '3', '9', '6', '4', '2', '10', '5', null, null, null, null, null, null, null, null, null, null, '2016-10-14 17:32:00', '2016-10-14 17:34:42');
INSERT INTO `lottery` VALUES ('5800a6b2e11df', '韩国快乐8', '123744', '3', '4', '7', '12', '16', '19', '23', '26', '30', '33', '35', '38', '44', '49', '52', '56', '58', '64', '67', '70', '2016-10-14 18:34:30', '2016-10-14 17:34:42');

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
INSERT INTO `user` VALUES ('57d1049d88231', 'xuyuanfan11', '123', '100000000', '2016-09-08 14:26:37');
INSERT INTO `user` VALUES ('57d10a4c9abbd', 'xuyuanfan1', '123', '0', '2016-09-08 14:50:52');
INSERT INTO `user` VALUES ('57d10a83b5acc', 'xuyuanfan2', '123', '100000000', '2016-09-08 14:51:47');
INSERT INTO `user` VALUES ('57d10a9ba983f', 'xuyuanfan3', '123', '100000007', '2016-09-08 14:52:11');
INSERT INTO `user` VALUES ('57d10abaf2f2d', 'xuyuanfan4', '123', '79992000', '2016-09-08 14:52:42');

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
