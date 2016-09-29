/*
Navicat MySQL Data Transfer

Source Server         : luoji
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-29 23:10:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `game`
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` char(13) NOT NULL,
  `lotteryname` char(20) NOT NULL,
  `name` char(20) NOT NULL,
  `num1` tinyint(4) unsigned NOT NULL,
  `num2` tinyint(4) unsigned DEFAULT NULL,
  `num3` tinyint(4) unsigned DEFAULT NULL,
  `oddsnum` tinyint(4) unsigned NOT NULL,
  `odds0` float unsigned NOT NULL,
  `odds1` float unsigned DEFAULT NULL,
  `odds2` float unsigned DEFAULT NULL,
  `odds3` float unsigned DEFAULT NULL,
  `odds4` float unsigned DEFAULT NULL,
  `odds5` float unsigned DEFAULT NULL,
  `odds6` float unsigned DEFAULT NULL,
  `odds7` float unsigned DEFAULT NULL,
  `odds8` float unsigned DEFAULT NULL,
  `odds9` float unsigned DEFAULT NULL,
  `odds10` float DEFAULT NULL,
  `odds11` float unsigned DEFAULT NULL,
  `odds12` float unsigned DEFAULT NULL,
  `odds13` float unsigned DEFAULT NULL,
  `odds14` float unsigned DEFAULT NULL,
  `odds15` float unsigned DEFAULT NULL,
  `odds16` float unsigned DEFAULT NULL,
  `odds17` float unsigned DEFAULT NULL,
  `odds18` float unsigned DEFAULT NULL,
  `odds19` float unsigned DEFAULT NULL,
  `odds20` float unsigned DEFAULT NULL,
  `odds21` float unsigned DEFAULT NULL,
  `odds22` float unsigned DEFAULT NULL,
  `odds23` float unsigned DEFAULT NULL,
  `odds24` float unsigned DEFAULT NULL,
  `odds25` float unsigned DEFAULT NULL,
  `odds26` float unsigned DEFAULT NULL,
  `odds27` float unsigned DEFAULT NULL,
  `issue` int(11) unsigned DEFAULT NULL,
  `peoplenum` bigint(20) unsigned DEFAULT NULL,
  `jackpot` bigint(20) unsigned DEFAULT NULL,
  `deadline` datetime DEFAULT NULL,
  `runtime` datetime DEFAULT NULL,
  `statu` tinyint(3) unsigned DEFAULT '0' COMMENT '0、竞猜，1、封盘，2、开奖',
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of game
-- ----------------------------

-- ----------------------------
-- Table structure for `lottery`
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
INSERT INTO `lottery` VALUES ('57ec88d4016e3', '北京快乐8', '783791', '52', '32', '79', '17', '33', '26', '61', '53', '16', '58', '44', '11', '31', '55', '65', '22', '49', '38', '74', '25', '2016-09-29 11:20:00', '2016-09-29 11:21:56');
INSERT INTO `lottery` VALUES ('57ec88d56516e', '北京PK10', '578362', '1', '3', '6', '5', '2', '4', '7', '10', '8', '9', null, null, null, null, null, null, null, null, null, null, '2016-09-29 11:17:00', '2016-09-29 11:21:57');
INSERT INTO `lottery` VALUES ('57ec8c5e1a76e', '北京快乐8', '783794', '4', '36', '53', '8', '45', '62', '23', '30', '14', '68', '27', '44', '20', '67', '31', '42', '18', '63', '48', '26', '2016-09-29 11:35:00', '2016-09-29 11:37:02');
INSERT INTO `lottery` VALUES ('57ec8c6006ea0', '北京PK10', '578365', '3', '6', '5', '9', '10', '4', '8', '7', '2', '1', null, null, null, null, null, null, null, null, null, null, '2016-09-29 11:32:00', '2016-09-29 11:37:04');
INSERT INTO `lottery` VALUES ('57ec9832a299f', '北京快乐8', '783804', '30', '63', '15', '32', '20', '52', '45', '14', '47', '37', '5', '22', '46', '53', '16', '41', '33', '54', '17', '43', '2016-09-29 12:25:00', '2016-09-29 12:27:30');
INSERT INTO `lottery` VALUES ('57ec99150a408', '北京快乐8', '783805', '66', '24', '30', '10', '61', '50', '17', '1', '26', '53', '3', '43', '57', '14', '23', '8', '74', '22', '41', '13', '2016-09-29 12:30:00', '2016-09-29 12:31:17');
INSERT INTO `lottery` VALUES ('57ec9915bc96c', '北京PK10', '578376', '5', '3', '1', '9', '8', '10', '2', '6', '7', '4', null, null, null, null, null, null, null, null, null, null, '2016-09-29 12:27:00', '2016-09-29 12:31:17');
INSERT INTO `lottery` VALUES ('57ec99a03ae3a', '北京PK10', '578377', '7', '10', '3', '6', '4', '9', '8', '1', '2', '5', null, null, null, null, null, null, null, null, null, null, '2016-09-29 12:32:00', '2016-09-29 12:33:36');
INSERT INTO `lottery` VALUES ('57ec9b2fcb5ef', '北京快乐8', '783806', '20', '45', '39', '78', '21', '47', '31', '80', '17', '35', '24', '69', '52', '9', '65', '43', '1', '30', '59', '73', '2016-09-29 12:35:00', '2016-09-29 12:40:15');
INSERT INTO `lottery` VALUES ('57ec9b31188e9', '北京PK10', '578378', '1', '5', '10', '7', '9', '2', '8', '6', '3', '4', null, null, null, null, null, null, null, null, null, null, '2016-09-29 12:37:00', '2016-09-29 12:40:17');
INSERT INTO `lottery` VALUES ('57ecaabb998aa', '北京PK10', '578391', '9', '10', '4', '5', '7', '3', '2', '8', '6', '1', null, null, null, null, null, null, null, null, null, null, '2016-09-29 11:27:00', '2016-09-29 13:46:35');
INSERT INTO `lottery` VALUES ('57ece09b40d99', '北京快乐8', '783866', '13', '75', '55', '18', '1', '34', '60', '5', '47', '66', '15', '26', '12', '80', '20', '40', '14', '79', '29', '37', '2016-09-29 17:35:00', '2016-09-29 17:36:27');
INSERT INTO `lottery` VALUES ('57ece09c9d1e2', '北京PK10', '578437', '10', '4', '6', '2', '8', '5', '3', '9', '7', '1', null, null, null, null, null, null, null, null, null, null, '2016-09-29 17:32:00', '2016-09-29 17:36:28');
INSERT INTO `lottery` VALUES ('57ece13ee612e', '北京PK10', '578438', '10', '4', '2', '1', '8', '7', '6', '5', '9', '3', null, null, null, null, null, null, null, null, null, null, '2016-09-29 17:37:00', '2016-09-29 17:39:10');
INSERT INTO `lottery` VALUES ('57ece2cb044aa', '北京快乐8', '783868', '73', '8', '58', '74', '29', '48', '12', '79', '47', '56', '27', '76', '50', '53', '26', '75', '61', '38', '6', '52', '2016-09-29 17:45:00', '2016-09-29 17:45:47');
INSERT INTO `lottery` VALUES ('57ece2ccda643', '北京PK10', '578439', '2', '7', '8', '4', '9', '3', '6', '5', '10', '1', null, null, null, null, null, null, null, null, null, null, '2016-09-29 17:42:00', '2016-09-29 17:45:48');
INSERT INTO `lottery` VALUES ('57ece3663ccbf', '北京PK10', '578440', '10', '4', '1', '2', '6', '8', '9', '3', '5', '7', null, null, null, null, null, null, null, null, null, null, '2016-09-29 17:47:00', '2016-09-29 17:48:22');
INSERT INTO `lottery` VALUES ('57ed02b66b282', '北京快乐8', '783895', '15', '63', '72', '27', '31', '16', '77', '29', '62', '26', '76', '35', '51', '25', '73', '68', '28', '11', '45', '70', '2016-09-29 20:00:00', '2016-09-29 20:01:58');
INSERT INTO `lottery` VALUES ('57ed02b8274f4', '北京PK10', '578466', '5', '2', '1', '3', '9', '10', '8', '4', '7', '6', null, null, null, null, null, null, null, null, null, null, '2016-09-29 19:57:00', '2016-09-29 20:02:00');

-- ----------------------------
-- Table structure for `receiver`
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
-- Table structure for `redpacket`
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
-- Table structure for `user`
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
-- Procedure structure for `overtimeCheck`
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
-- Event structure for `overtimeCheck`
-- ----------------------------
DROP EVENT IF EXISTS `overtimeCheck`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `overtimeCheck` ON SCHEDULE EVERY 1 DAY STARTS '2016-09-07 14:49:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL overtimeCheck()
;;
DELIMITER ;
