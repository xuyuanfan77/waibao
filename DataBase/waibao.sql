/*
Navicat MySQL Data Transfer

Source Server         : luoji
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-07 18:19:24
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for receiver
-- ----------------------------
DROP TABLE IF EXISTS `receiver`;
CREATE TABLE `receiver` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `receiver` int(11) NOT NULL,
  `redpacket` int(11) NOT NULL,
  `money` float NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiver
-- ----------------------------
INSERT INTO `receiver` VALUES ('1', '4', '1', '6', '2016-09-06 09:25:36');
INSERT INTO `receiver` VALUES ('2', '4', '1', '0', '2016-09-06 09:27:27');
INSERT INTO `receiver` VALUES ('3', '4', '2', '6', '2016-09-06 09:52:05');
INSERT INTO `receiver` VALUES ('4', '4', '7', '1', '2016-09-06 09:54:44');
INSERT INTO `receiver` VALUES ('5', '2', '7', '1', '2016-09-06 09:59:55');
INSERT INTO `receiver` VALUES ('6', '3', '7', '1', '2016-09-06 10:11:54');
INSERT INTO `receiver` VALUES ('7', '5', '7', '1', '2016-09-06 10:16:09');
INSERT INTO `receiver` VALUES ('8', '5', '2', '0', '2016-09-06 10:38:40');
INSERT INTO `receiver` VALUES ('9', '5', '3', '6', '2016-09-06 10:40:58');
INSERT INTO `receiver` VALUES ('10', '4', '3', '0', '2016-09-06 10:41:21');
INSERT INTO `receiver` VALUES ('11', '4', '4', '6', '2016-09-06 10:43:40');
INSERT INTO `receiver` VALUES ('12', '2', '4', '6', '2016-09-06 10:43:55');
INSERT INTO `receiver` VALUES ('13', '5', '12', '1', '2016-09-06 11:09:30');
INSERT INTO `receiver` VALUES ('14', '3', '13', '1', '2016-09-06 11:16:04');
INSERT INTO `receiver` VALUES ('15', '4', '6', '6', '2016-09-07 10:21:16');
INSERT INTO `receiver` VALUES ('16', '4', '9', '2.67', '2016-09-07 10:21:22');
INSERT INTO `receiver` VALUES ('17', '4', '10', '0', '2016-09-07 10:21:34');
INSERT INTO `receiver` VALUES ('18', '4', '8', '2', '2016-09-07 10:23:52');
INSERT INTO `receiver` VALUES ('19', '4', '11', '0', '2016-09-07 10:24:25');
INSERT INTO `receiver` VALUES ('20', '4', '13', '0', '2016-09-07 10:24:41');
INSERT INTO `receiver` VALUES ('21', '2', '10', '0', '2016-09-07 10:32:29');
INSERT INTO `receiver` VALUES ('22', '2', '11', '2.97', '2016-09-07 10:38:22');
INSERT INTO `receiver` VALUES ('23', '3', '10', '3.31', '2016-09-07 10:40:01');
INSERT INTO `receiver` VALUES ('24', '4', '14', '0', '2016-09-07 10:42:06');
INSERT INTO `receiver` VALUES ('25', '2', '14', '0.01', '2016-09-07 10:42:24');
INSERT INTO `receiver` VALUES ('26', '5', '5', '6', '2016-09-07 11:02:38');
INSERT INTO `receiver` VALUES ('27', '6', '5', '6', '2016-09-07 14:46:29');
INSERT INTO `receiver` VALUES ('28', '6', '6', '0', '2016-09-07 15:01:14');
INSERT INTO `receiver` VALUES ('29', '6', '7', '1', '2016-09-07 15:04:27');
INSERT INTO `receiver` VALUES ('30', '6', '8', '2', '2016-09-07 15:05:24');
INSERT INTO `receiver` VALUES ('31', '6', '9', '1.35', '2016-09-07 15:05:50');
INSERT INTO `receiver` VALUES ('32', '6', '13', '1.1', '2016-09-07 15:06:40');

-- ----------------------------
-- Table structure for redpacket
-- ----------------------------
DROP TABLE IF EXISTS `redpacket`;
CREATE TABLE `redpacket` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `publisher` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `money` float NOT NULL,
  `number` int(11) NOT NULL,
  `distribution` tinyint(3) unsigned zerofill NOT NULL,
  `overtime` tinyint(3) unsigned zerofill NOT NULL,
  `lasttime` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of redpacket
-- ----------------------------
INSERT INTO `redpacket` VALUES ('1', '4', 'xuyuanfan', '0', '0', '002', '001', '2016-09-05 09:27:26', '2016-09-05 15:41:20');
INSERT INTO `redpacket` VALUES ('2', '4', 'xuyuanfan', '0', '0', '002', '001', '2016-09-06 10:38:40', '2016-09-05 16:03:00');
INSERT INTO `redpacket` VALUES ('3', '4', 'xuyuanfan', '0', '0', '002', '001', '2016-09-06 10:41:21', '2016-09-05 16:03:37');
INSERT INTO `redpacket` VALUES ('4', '4', 'xuyuanfan', '0', '0', '002', '001', '2016-09-06 10:43:55', '2016-09-05 16:13:10');
INSERT INTO `redpacket` VALUES ('5', '4', 'xuyuanfan', '0', '0', '001', '000', '2016-09-07 14:46:29', '2016-09-05 16:15:09');
INSERT INTO `redpacket` VALUES ('6', '4', 'xuyuanfan', '6', '1', '001', '000', '2016-09-07 10:21:16', '2016-09-05 16:15:51');
INSERT INTO `redpacket` VALUES ('7', '4', 'xuyuanfan', '102', '102', '001', '001', '2016-09-07 15:04:27', '2016-09-05 16:16:34');
INSERT INTO `redpacket` VALUES ('8', '3', 'xuyuanfan2', '8', '4', '001', '000', '2016-09-07 15:05:24', '2016-09-05 16:26:23');
INSERT INTO `redpacket` VALUES ('9', '2', 'xuyuanfan1', '11.98', '6', '002', '000', '2016-09-07 15:05:50', '2016-09-05 16:36:13');
INSERT INTO `redpacket` VALUES ('10', '2', 'xuyuanfan1', '12.69', '5', '002', '000', '2016-09-07 10:40:01', '2016-09-05 16:44:39');
INSERT INTO `redpacket` VALUES ('11', '2', 'xuyuanfan1', '13.03', '6', '002', '000', '2016-09-07 10:38:22', '2016-09-05 17:32:10');
INSERT INTO `redpacket` VALUES ('12', '5', 'xuyuanfan3', '11', '11', '001', '001', '2016-09-06 11:09:30', '2016-09-06 11:09:20');
INSERT INTO `redpacket` VALUES ('13', '3', 'xuyuanfan2', '9.9', '9', '002', '000', '2016-09-07 15:06:39', '2016-09-06 11:14:34');
INSERT INTO `redpacket` VALUES ('14', '3', 'xuyuanfan2', '0', '0', '002', '000', '2016-09-07 10:42:24', '2016-09-07 10:41:47');
INSERT INTO `redpacket` VALUES ('15', '1', 'xuyuanfan4', '0', '0', '002', '001', '2016-09-02 18:05:42', '2016-09-05 18:06:08');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `money` float NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'xuyuanfan4', '123', '133.33', '2016-09-06 11:13:13');
INSERT INTO `user` VALUES ('2', 'xuyuanfan1', '123', '8.98', '2016-09-06 11:13:17');
INSERT INTO `user` VALUES ('3', 'xuyuanfan2', '123', '4.3', '2016-09-06 11:13:19');
INSERT INTO `user` VALUES ('4', 'xuyuanfan', '123', '16.67', '2016-09-06 11:13:23');
INSERT INTO `user` VALUES ('5', 'xuyuanfan3', '123', '102', '2016-09-06 10:15:58');
INSERT INTO `user` VALUES ('6', 'xuyuanfan5', '123', '111.45', '2016-09-07 14:38:38');

-- ----------------------------
-- Procedure structure for overtimeCheck
-- ----------------------------
DROP PROCEDURE IF EXISTS `overtimeCheck`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `overtimeCheck`()
BEGIN
	#Routine body goes here...
	DECLARE v_endloop INT DEFAULT 0;
	DECLARE	v_id INT;
	DECLARE	v_publisher INT;
	DECLARE v_money FLOAT;
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
CREATE DEFINER=`root`@`localhost` EVENT `overtimeCheck` ON SCHEDULE EVERY 1 DAY STARTS '2016-09-07 14:00:00' ON COMPLETION NOT PRESERVE ENABLE DO CALL overtimeCheck()
;;
DELIMITER ;
