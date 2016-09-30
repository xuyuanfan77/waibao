/*
Navicat MySQL Data Transfer

Source Server         : luoji
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-30 17:17:52
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
INSERT INTO `game` VALUES ('57ee27307de29', 'PC28', '北京快乐8', '784035', '1', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 16:44:00', '2016-09-30 16:46:00', '2', '2016-09-30 16:49:52');
INSERT INTO `game` VALUES ('57ee2730a4fc5', 'PC28', '北京快乐8', '784036', '9', '7', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 16:49:00', '2016-09-30 16:51:00', '1', '2016-09-30 16:49:52');
INSERT INTO `game` VALUES ('57ee2730bc59c', 'PC28', '北京快乐8', '784037', null, null, null, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 16:54:00', '2016-09-30 16:56:00', '0', '2016-09-30 16:49:52');
INSERT INTO `game` VALUES ('57ee2730e2055', 'PC28', '北京快乐8', '784038', '3', '6', '4', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 16:59:00', '2016-09-30 17:01:00', '1', '2016-09-30 16:49:52');
INSERT INTO `game` VALUES ('57ee27af68e77', 'PC28', '北京快乐8', '784039', '1', '2', '2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 17:04:00', '2016-09-30 17:06:00', '1', '2016-09-30 16:51:59');
INSERT INTO `game` VALUES ('57ee29e99f808', 'PC28', '北京快乐8', '784040', '1', '5', '4', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 17:02:00', '2016-09-30 17:04:00', '1', '2016-09-30 17:01:29');
INSERT INTO `game` VALUES ('57ee29e9abe65', 'PC28', '北京快乐8', '784041', '9', '4', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 17:07:00', '2016-09-30 17:09:00', '1', '2016-09-30 17:01:29');
INSERT INTO `game` VALUES ('57ee2b38ea9a9', 'PC28', '北京快乐8', '784042', null, null, null, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 17:19:00', '2016-09-30 17:21:00', '0', '2016-09-30 17:07:04');
INSERT INTO `game` VALUES ('57ee2c6125ab8', 'PC28', '北京快乐8', '784043', null, null, null, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 17:24:00', '2016-09-30 17:26:00', '0', '2016-09-30 17:12:01');
INSERT INTO `game` VALUES ('57ee2d8fd59f8', 'PC28', '北京快乐8', '784044', null, null, null, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '0', '0', '2016-09-30 17:29:00', '2016-09-30 17:31:00', '0', '2016-09-30 17:17:03');

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
INSERT INTO `lottery` VALUES ('57ee272f1312d', '北京快乐8', '784035', '5', '56', '40', '2', '29', '49', '61', '18', '41', '37', '66', '19', '42', '31', '73', '12', '34', '20', '58', '47', '2016-09-30 16:45:00', '2016-09-30 16:49:51');
INSERT INTO `lottery` VALUES ('57ee2730487ab', '北京PK10', '578607', '8', '10', '6', '1', '4', '3', '7', '9', '2', '5', null, null, null, null, null, null, null, null, null, null, '2016-09-30 16:47:00', '2016-09-30 16:49:52');
INSERT INTO `lottery` VALUES ('57ee27ae2d0fa', '北京快乐8', '784036', '18', '33', '5', '80', '31', '52', '16', '74', '42', '50', '6', '69', '61', '19', '1', '46', '62', '3', '60', '63', '2016-09-30 16:50:00', '2016-09-30 16:51:58');
INSERT INTO `lottery` VALUES ('57ee2875d023b', '北京PK10', '578608', '9', '3', '6', '8', '1', '4', '5', '2', '10', '7', null, null, null, null, null, null, null, null, null, null, '2016-09-30 16:52:00', '2016-09-30 16:55:17');
INSERT INTO `lottery` VALUES ('57ee28c87bfa4', '北京快乐8', '784037', '77', '7', '34', '16', '58', '53', '4', '57', '46', '1', '26', '55', '62', '9', '48', '37', '75', '11', '52', '30', '2016-09-30 16:55:00', '2016-09-30 16:56:40');
INSERT INTO `lottery` VALUES ('57ee29e868e77', '北京快乐8', '784038', '18', '75', '34', '45', '17', '74', '61', '22', '4', '44', '69', '6', '58', '73', '19', '32', '14', '78', '25', '47', '2016-09-30 16:53:00', '2016-09-30 17:01:28');
INSERT INTO `lottery` VALUES ('57ee29e95d75c', '北京PK10', '578609', '2', '5', '8', '6', '4', '7', '10', '9', '1', '3', null, null, null, null, null, null, null, null, null, null, '2016-09-30 16:57:00', '2016-09-30 17:01:29');
INSERT INTO `lottery` VALUES ('57ee2a55c3bdd', '北京快乐8', '784038', '18', '75', '34', '45', '17', '74', '61', '22', '4', '44', '69', '6', '58', '73', '19', '32', '14', '78', '25', '47', '2016-09-30 17:00:00', '2016-09-30 17:03:17');
INSERT INTO `lottery` VALUES ('57ee2a5ab2935', '北京PK10', '578609', '2', '5', '8', '6', '4', '7', '10', '9', '1', '3', null, null, null, null, null, null, null, null, null, null, '2016-09-30 16:57:00', '2016-09-30 17:03:22');
INSERT INTO `lottery` VALUES ('57ee2b3671b9c', '北京快乐8', '784039', '41', '38', '78', '22', '45', '27', '80', '3', '29', '25', '73', '62', '2', '68', '40', '1', '26', '65', '76', '5', '2016-09-30 17:05:00', '2016-09-30 17:07:02');
INSERT INTO `lottery` VALUES ('57ee2b38c3bdd', '北京PK10', '578610', '1', '6', '4', '7', '9', '3', '8', '10', '2', '5', null, null, null, null, null, null, null, null, null, null, '2016-09-30 17:02:00', '2016-09-30 17:07:04');
INSERT INTO `lottery` VALUES ('57ee2c605d38b', '北京快乐8', '784040', '51', '69', '13', '34', '30', '74', '16', '37', '24', '75', '6', '27', '21', '68', '47', '5', '60', '33', '1', '22', '2016-09-30 17:10:00', '2016-09-30 17:12:00');
INSERT INTO `lottery` VALUES ('57ee2c60f2b5c', '北京PK10', '578611', '8', '10', '6', '1', '9', '2', '7', '3', '5', '4', null, null, null, null, null, null, null, null, null, null, '2016-09-30 17:07:00', '2016-09-30 17:12:01');
INSERT INTO `lottery` VALUES ('57ee2ce93d460', '北京PK10', '578612', '5', '8', '9', '1', '4', '7', '6', '2', '3', '10', null, null, null, null, null, null, null, null, null, null, '2016-09-30 17:12:00', '2016-09-30 17:14:17');
INSERT INTO `lottery` VALUES ('57ee2d8e8a0b5', '北京快乐8', '784041', '37', '56', '14', '48', '63', '21', '30', '15', '75', '29', '45', '20', '72', '33', '38', '19', '69', '49', '27', '12', '2016-09-30 17:15:00', '2016-09-30 17:17:02');

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
  `money` bigint(20) NOT NULL COMMENT '用户总积分',
  `createtime` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('57d1049d88231', 'xuyuanfan11', '123', '100000000', '2016-09-08 14:26:37');
INSERT INTO `user` VALUES ('57d10a4c9abbd', 'xuyuanfan1', '123', '100000004', '2016-09-08 14:50:52');
INSERT INTO `user` VALUES ('57d10a83b5acc', 'xuyuanfan2', '123', '100000000', '2016-09-08 14:51:47');
INSERT INTO `user` VALUES ('57d10a9ba983f', 'xuyuanfan3', '123', '100000007', '2016-09-08 14:52:11');
INSERT INTO `user` VALUES ('57d10abaf2f2d', 'xuyuanfan4', '123', '99999941', '2016-09-08 14:52:42');

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
