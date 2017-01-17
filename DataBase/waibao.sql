/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : waibao

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-01-17 15:23:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
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
-- Table structure for `automatic`
-- ----------------------------
DROP TABLE IF EXISTS `automatic`;
CREATE TABLE `automatic` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` char(13) NOT NULL,
  `gamename` char(20) NOT NULL,
  `modeid` bigint(20) unsigned NOT NULL,
  `issuebg` int(11) unsigned NOT NULL,
  `issuenum` int(11) unsigned NOT NULL,
  `moneymin` bigint(20) unsigned NOT NULL,
  `moneymax` bigint(20) unsigned NOT NULL,
  `status` set('1','0') NOT NULL DEFAULT '1',
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of automatic
-- ----------------------------
INSERT INTO `automatic` VALUES ('3', '57d10a4c9abbd', 'pc28', '18', '803519', '10', '5', '0', '0', '2016-12-08 13:55:22');
INSERT INTO `automatic` VALUES ('4', '57d10a4c9abbd', 'jnd28', '21', '796538', '10', '4', '0', '0', '2016-12-09 14:12:52');
INSERT INTO `automatic` VALUES ('5', '57d10a4c9abbd', 'js28', '19', '177376', '5', '10000', '0', '0', '2016-12-09 14:16:42');
INSERT INTO `automatic` VALUES ('6', '57d10a4c9abbd', 'js16', '23', '177436', '5000', '1', '0', '0', '2016-12-09 15:21:38');
INSERT INTO `automatic` VALUES ('7', '57d10a4c9abbd', 'fksc', '24', '591131', '333', '90', '0', '0', '2016-12-09 15:44:42');

-- ----------------------------
-- Table structure for `game`
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID号',
  `type` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '1：动态赔率类型、2：固定赔率类型',
  `name` char(20) NOT NULL COMMENT '游戏名称',
  `lotteryname` char(20) NOT NULL COMMENT '福彩名称',
  `issue` int(11) unsigned NOT NULL COMMENT '期号',
  `num1` tinyint(4) unsigned DEFAULT NULL COMMENT '开奖号码1',
  `num2` tinyint(4) unsigned DEFAULT NULL COMMENT '开奖号码2',
  `num3` tinyint(4) unsigned DEFAULT NULL COMMENT '开奖号码3',
  `fknum1` tinyint(4) unsigned DEFAULT NULL COMMENT '风控号码1',
  `fknum2` tinyint(4) unsigned DEFAULT NULL COMMENT '风控号码2',
  `fknum3` tinyint(4) unsigned DEFAULT NULL COMMENT '风控号码3',
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
  `spmoney0` int(10) unsigned DEFAULT '0' COMMENT '单',
  `spmoney1` int(10) unsigned DEFAULT '0' COMMENT '双',
  `spmoney2` int(10) unsigned DEFAULT '0' COMMENT '大',
  `spmoney3` int(10) unsigned DEFAULT '0' COMMENT '小',
  `spmoney4` int(10) unsigned DEFAULT '0' COMMENT '小单',
  `spmoney5` int(10) unsigned DEFAULT '0' COMMENT '小双',
  `spmoney6` int(10) unsigned DEFAULT '0' COMMENT '大单',
  `spmoney7` int(10) unsigned DEFAULT '0' COMMENT '大双',
  `spmoney8` int(10) unsigned DEFAULT '0' COMMENT '极大',
  `spmoney9` int(10) unsigned DEFAULT '0' COMMENT '极小',
  `peoplenum` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '中奖人数',
  `jackpot` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '奖金池金额',
  `deadline` datetime NOT NULL COMMENT '竞猜截至时间',
  `runtime` datetime NOT NULL COMMENT '开奖时间',
  `statu` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '0、竞猜，1、封盘，2、正在开奖，3、已开奖',
  `createtime` datetime NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=708 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of game
-- ----------------------------

-- ----------------------------
-- Table structure for `guess`
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
  `spmoney0` int(10) unsigned DEFAULT '0',
  `spmoney1` int(10) unsigned DEFAULT '0',
  `spmoney2` int(10) unsigned DEFAULT '0',
  `spmoney3` int(10) unsigned DEFAULT '0',
  `spmoney4` int(10) unsigned DEFAULT '0',
  `spmoney5` int(10) unsigned DEFAULT '0',
  `spmoney6` int(10) unsigned DEFAULT '0',
  `spmoney7` int(10) unsigned DEFAULT '0',
  `spmoney8` int(10) unsigned DEFAULT '0',
  `spmoney9` int(10) unsigned DEFAULT '0',
  `input` int(10) unsigned DEFAULT NULL COMMENT '投入金额总额',
  `output` int(10) unsigned DEFAULT NULL COMMENT '产出金额总额',
  `createtime` datetime DEFAULT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of guess
-- ----------------------------

-- ----------------------------
-- Table structure for `lottery`
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
) ENGINE=InnoDB AUTO_INCREMENT=440 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lottery
-- ----------------------------

-- ----------------------------
-- Table structure for `mode`
-- ----------------------------
DROP TABLE IF EXISTS `mode`;
CREATE TABLE `mode` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `userid` char(13) NOT NULL,
  `gamename` char(20) NOT NULL,
  `modename` char(20) NOT NULL,
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
  `money10` int(10) unsigned DEFAULT '0',
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
  `totalmoney` int(10) unsigned DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mode
-- ----------------------------
INSERT INTO `mode` VALUES ('23', '57d10a4c9abbd', 'js16', '极速16', '0', '0', '0', '0', '3', '0', '10', '0', '21', '0', '27', '0', '0', '0', '90', '0', '0', '0', '90', '0', '0', '0', '0', '0', '0', '0', '0', '0', '241', '2016-12-09 15:04:04');
INSERT INTO `mode` VALUES ('22', '57d10a4c9abbd', 'pc28', 'PC281', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '75', '0', '69', '0', '55', '0', '36', '0', '21', '0', '10', '0', '3', '0', '269', '2016-12-09 14:14:16');
INSERT INTO `mode` VALUES ('20', '57d10a4c9abbd', 'fk28', '疯狂28', '0', '3', '0', '0', '0', '0', '28', '0', '0', '0', '0', '69', '0', '0', '0', '0', '69', '0', '0', '0', '0', '28', '0', '0', '0', '0', '3', '0', '200', '2016-12-09 14:00:48');
INSERT INTO `mode` VALUES ('19', '57d10a4c9abbd', 'js28', '极速28', '1', '0', '6', '0', '15', '0', '28', '0', '45', '0', '63', '0', '73', '0', '75', '0', '69', '0', '55', '0', '36', '0', '21', '0', '10', '0', '3', '0', '500', '2016-12-09 13:57:21');
INSERT INTO `mode` VALUES ('18', '57d10a4c9abbd', 'pc28', 'PC28', '1', '3', '6', '10', '15', '21', '28', '36', '45', '55', '0', '0', '0', '0', '0', '0', '0', '0', '55', '45', '36', '28', '21', '15', '10', '6', '3', '1', '440', '2016-12-09 13:50:16');
INSERT INTO `mode` VALUES ('21', '57d10a4c9abbd', 'jnd28', '加拿大28', '0', '3', '0', '0', '0', '0', '0', '0', '0', '0', '0', '69', '0', '0', '0', '0', '0', '0', '0', '0', '0', '28', '0', '0', '0', '0', '0', '0', '100', '2016-12-09 14:06:00');
INSERT INTO `mode` VALUES ('24', '57d10a4c9abbd', 'fksc', '疯狂赛车1', '0', '0', '10', '0', '10', '0', '10', '0', '10', '0', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '50', '2016-12-09 15:36:17');
INSERT INTO `mode` VALUES ('26', '57d10a4c9abbd', 'fksc', '疯狂赛车', '0', '10', '10', '10', '10', '10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '50', '2016-12-09 15:44:05');

-- ----------------------------
-- Table structure for `odds`
-- ----------------------------
DROP TABLE IF EXISTS `odds`;
CREATE TABLE `odds` (
  `gamename` char(20) NOT NULL COMMENT '游戏名称',
  `odds0` float unsigned NOT NULL DEFAULT '0',
  `odds1` float unsigned DEFAULT '0',
  `odds2` float unsigned DEFAULT '0',
  `odds3` float unsigned DEFAULT '0',
  `odds4` float unsigned DEFAULT '0',
  `odds5` float unsigned DEFAULT '0',
  `odds6` float unsigned DEFAULT '0',
  `odds7` float unsigned DEFAULT '0',
  `odds8` float unsigned DEFAULT '0',
  `odds9` float unsigned DEFAULT '0',
  `odds10` float unsigned DEFAULT '0',
  `odds11` float unsigned DEFAULT '0',
  `odds12` float unsigned DEFAULT '0',
  `odds13` float unsigned DEFAULT '0',
  `odds14` float unsigned DEFAULT '0',
  `odds15` float unsigned DEFAULT '0',
  `odds16` float unsigned DEFAULT '0',
  `odds17` float unsigned DEFAULT '0',
  `odds18` float unsigned DEFAULT '0',
  `odds19` float unsigned DEFAULT '0',
  `odds20` float unsigned DEFAULT '0',
  `odds21` float unsigned DEFAULT '0',
  `odds22` float unsigned DEFAULT '0',
  `odds23` float unsigned DEFAULT '0',
  `odds24` float unsigned DEFAULT '0',
  `odds25` float unsigned DEFAULT '0',
  `odds26` float unsigned DEFAULT '0',
  `odds27` float unsigned DEFAULT '0',
  `odds28` float unsigned DEFAULT '0',
  `odds29` float unsigned DEFAULT '0',
  `odds30` float unsigned DEFAULT '0',
  `odds31` float unsigned DEFAULT '0',
  `odds32` float unsigned DEFAULT '0',
  `odds33` float unsigned DEFAULT '0',
  `odds34` float unsigned DEFAULT '0',
  `odds35` float unsigned DEFAULT '0',
  `odds36` float unsigned DEFAULT '0',
  `odds37` float unsigned DEFAULT '0',
  PRIMARY KEY (`gamename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of odds
-- ----------------------------
INSERT INTO `odds` VALUES ('jnd28', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38');

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
-- Table structure for `robotconfig`
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
  `spmoney0` int(10) unsigned DEFAULT '0',
  `spmoney1` int(10) unsigned DEFAULT '0',
  `spmoney2` int(10) unsigned DEFAULT '0',
  `spmoney3` int(10) unsigned DEFAULT '0',
  `spmoney4` int(10) unsigned DEFAULT '0',
  `spmoney5` int(10) unsigned DEFAULT '0',
  `spmoney6` int(10) unsigned DEFAULT '0',
  `spmoney7` int(10) unsigned DEFAULT '0',
  `spmoney8` int(10) unsigned DEFAULT '0',
  `spmoney9` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`gamename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of robotconfig
-- ----------------------------
INSERT INTO `robotconfig` VALUES ('pc28', '100', '300', '600', '1000', '1500', '2100', '2800', '3600', '4500', '5500', '6300', '6900', '7300', '7500', '7500', '7300', '6900', '6300', '5500', '4500', '3600', '2800', '2100', '1500', '1000', '600', '300', '100', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` char(14) NOT NULL COMMENT 'ID号（唯一标识）',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `money` bigint(20) unsigned NOT NULL COMMENT '用户总积分',
  `control` set('1','0') NOT NULL DEFAULT '0' COMMENT '风控用户标识',
  `createtime` datetime NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('57d1049d88231', 'xuyuanfan5', '123', '100000000', '0', '2016-09-08 14:26:37');
INSERT INTO `user` VALUES ('57d10a4c9abbd', 'xuyuanfan1', '123', '99821184', '0', '2016-09-08 14:50:52');
INSERT INTO `user` VALUES ('57d10a83b5acc', 'xuyuanfan2', '123', '99729972', '0', '2016-09-08 14:51:47');
INSERT INTO `user` VALUES ('57d10a9ba983f', 'xuyuanfan3', '123', '100000000', '1', '2016-09-08 14:52:11');
INSERT INTO `user` VALUES ('57d10abaf2f2d', 'xuyuanfan4', '123', '100000000', '1', '2016-09-08 14:52:42');

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
