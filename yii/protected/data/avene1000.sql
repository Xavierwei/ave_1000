/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : avene1000

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-06-04 02:00:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for orion_baby
-- ----------------------------
DROP TABLE IF EXISTS `orion_baby`;
CREATE TABLE `orion_baby` (
  `uid` int(11) unsigned NOT NULL COMMENT '唯一id',
  `name` char(10) NOT NULL COMMENT '姓名',
  `nickname` char(30) NOT NULL COMMENT '昵称',
  `sex` char(3) NOT NULL DEFAULT '男' COMMENT '性别',
  `birthday` datetime NOT NULL COMMENT '出生日期',
  `address` char(255) NOT NULL COMMENT '地址',
  `city` char(15) NOT NULL COMMENT '城市',
  `tel` char(60) NOT NULL COMMENT '电话',
  `reason` text NOT NULL COMMENT '千家万护',
  `point_city` char(15) NOT NULL COMMENT '推荐医院城市',
  `point_hospital` char(60) NOT NULL COMMENT '推荐医院',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`uid`),
  CONSTRAINT `FK_orion_baby_uid` FOREIGN KEY (`uid`) REFERENCES `orion_user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orion_baby
-- ----------------------------
INSERT INTO `orion_baby` VALUES ('3', '测试过', '车的', '男', '2014-02-01 00:00:00', '大富大贵', '但是风格', '13512401547', '时代发生的发生的', '第三方', '第三方', '1401719091', '1401719102');

-- ----------------------------
-- Table structure for orion_information
-- ----------------------------
DROP TABLE IF EXISTS `orion_information`;
CREATE TABLE `orion_information` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户唯一id',
  `one` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '选项1',
  `two` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '选项2',
  `three` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '选项3',
  `four` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '选项4',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`uid`),
  CONSTRAINT `FK_orion_information_uid` FOREIGN KEY (`uid`) REFERENCES `orion_user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='信息记录';

-- ----------------------------
-- Records of orion_information
-- ----------------------------

-- ----------------------------
-- Table structure for orion_record
-- ----------------------------
DROP TABLE IF EXISTS `orion_record`;
CREATE TABLE `orion_record` (
  `uid` int(11) unsigned NOT NULL COMMENT '唯一id',
  `avatar` char(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '头像',
  `photo1` char(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '患处1',
  `photo2` char(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '患处2',
  `photo3` char(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '患处3',
  `case` char(255) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '病例',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '审核状态',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`uid`),
  CONSTRAINT `FK_orion_record_uid` FOREIGN KEY (`uid`) REFERENCES `orion_user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='电子档案';

-- ----------------------------
-- Records of orion_record
-- ----------------------------

-- ----------------------------
-- Table structure for orion_user
-- ----------------------------
DROP TABLE IF EXISTS `orion_user`;
CREATE TABLE `orion_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户唯一id',
  `username` char(60) NOT NULL COMMENT '用户名',
  `email` char(100) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '邮箱',
  `password` char(254) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL COMMENT '密码',
  `roletype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户类型1普通，2微博',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(11) unsigned NOT NULL COMMENT '修改时间',
  `lastip` char(16) NOT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orion_user
-- ----------------------------
INSERT INTO `orion_user` VALUES ('3', '1286307870', '', '', '2', '1401700872', '1401811131', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('4', '测试', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704613', '1401807093', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('5', '地方2', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704737', '1401704737', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('6', '地方3', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704794', '1401704794', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('7', '地方5', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704887', '1401704887', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('8', '地7', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704950', '1401704950', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('9', '地方', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401705026', '1401705026', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('10', '你好', '2440@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401807626', '1401807626', '172.16.111.87');
