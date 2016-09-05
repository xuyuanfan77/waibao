/*
Navicat MySQL Data Transfer

Source Server         : luoji
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-05 17:48:40
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of receiver
-- ----------------------------

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
  `distribution` tinyint(4) NOT NULL,
  `lasttime` datetime NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of redpacket
-- ----------------------------
INSERT INTO `redpacket` VALUES ('1', '4', 'xuyuanfan', '12', '2', '2', '2016-09-05 15:41:20', '2016-09-05 15:41:20');
INSERT INTO `redpacket` VALUES ('2', '4', 'xuyuanfan', '12', '2', '2', '2016-09-05 16:03:00', '2016-09-05 16:03:00');
INSERT INTO `redpacket` VALUES ('3', '4', 'xuyuanfan', '12', '2', '2', '2016-09-05 16:03:37', '2016-09-05 16:03:37');
INSERT INTO `redpacket` VALUES ('4', '4', 'xuyuanfan', '12', '2', '2', '2016-09-05 16:13:10', '2016-09-05 16:13:10');
INSERT INTO `redpacket` VALUES ('5', '4', 'xuyuanfan', '12', '2', '1', '2016-09-05 16:15:09', '2016-09-05 16:15:09');
INSERT INTO `redpacket` VALUES ('6', '4', 'xuyuanfan', '12', '2', '1', '2016-09-05 16:15:51', '2016-09-05 16:15:51');
INSERT INTO `redpacket` VALUES ('7', '4', 'xuyuanfan', '108', '108', '1', '2016-09-05 16:16:34', '2016-09-05 16:16:34');
INSERT INTO `redpacket` VALUES ('8', '3', 'xuyuanfan2', '12', '6', '1', '2016-09-05 16:26:23', '2016-09-05 16:26:23');
INSERT INTO `redpacket` VALUES ('9', '2', 'xuyuanfan1', '16', '8', '2', '2016-09-05 16:36:13', '2016-09-05 16:36:13');
INSERT INTO `redpacket` VALUES ('10', '2', 'xuyuanfan1', '16', '8', '2', '2016-09-05 16:44:39', '2016-09-05 16:44:39');
INSERT INTO `redpacket` VALUES ('11', '2', 'xuyuanfan1', '16', '8', '2', '2016-09-05 17:32:10', '2016-09-05 17:32:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'xuyuanfan', '123456', '0', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES ('2', 'xuyuanfan1', '123', '0', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES ('3', 'xuyuanfan2', '123', '0', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES ('4', 'xuyuanfan', '123', '0', '0000-00-00 00:00:00');
