/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : avene1000

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-07-02 17:36:02
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for orion_admin
-- ----------------------------
DROP TABLE IF EXISTS `orion_admin`;
CREATE TABLE `orion_admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL COMMENT '用户名',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `createtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `login_last_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `lastip` char(16) DEFAULT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orion_admin
-- ----------------------------
INSERT INTO `orion_admin` VALUES ('1', 'admin', 'admin1234', '1328864440', '1398216742', '0', null);

-- ----------------------------
-- Table structure for orion_baby
-- ----------------------------
DROP TABLE IF EXISTS `orion_baby`;
CREATE TABLE `orion_baby` (
  `uid` int(11) unsigned NOT NULL COMMENT '唯一id',
  `name` char(10) NOT NULL COMMENT '姓名',
  `nickname` char(30) NOT NULL COMMENT '昵称',
  `parent` varchar(255) DEFAULT NULL,
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
INSERT INTO `orion_baby` VALUES ('3', '测试', '车的', null, '男', '2010-01-01 00:00:00', '大富大贵', '深圳', '13512401547', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401719091', '1401899136');
INSERT INTO `orion_baby` VALUES ('4', '测试', '车的', null, '女', '2000-09-13 00:00:00', '大富大贵', '深圳', '13512401547', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401948892', '1401959663');
INSERT INTO `orion_baby` VALUES ('10', '测试456', '第三方', null, '男', '1994-03-05 00:00:00', '第三方', '深圳', '62', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401978220', '1401991150');
INSERT INTO `orion_baby` VALUES ('24', '超限额是', '水电费', null, '男', '2007-10-15 00:00:00', '第三方', '深圳', '1245', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401961155', '1401961155');
INSERT INTO `orion_baby` VALUES ('26', '覆盖', '梵蒂冈', '', '男', '2003-03-18 00:00:00', '梵蒂冈', '上海市', '45646', '希望通过这次活动能让我的孩子早日康复', '上海', '', '1404010918', '1404290403');

-- ----------------------------
-- Table structure for orion_information
-- ----------------------------
DROP TABLE IF EXISTS `orion_information`;
CREATE TABLE `orion_information` (
  `uid` int(11) unsigned NOT NULL COMMENT '用户唯一id',
  `one` tinyint(1) unsigned NOT NULL DEFAULT '3' COMMENT '选项1',
  `two` tinyint(1) unsigned NOT NULL DEFAULT '3' COMMENT '选项2',
  `three` tinyint(1) unsigned NOT NULL DEFAULT '3' COMMENT '选项3',
  `four` tinyint(1) unsigned NOT NULL DEFAULT '3' COMMENT '选项4',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(11) unsigned NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`uid`),
  CONSTRAINT `FK_orion_information_uid` FOREIGN KEY (`uid`) REFERENCES `orion_user` (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='信息记录';

-- ----------------------------
-- Records of orion_information
-- ----------------------------
INSERT INTO `orion_information` VALUES ('4', '1', '1', '1', '1', '1402233794', '1402233794');
INSERT INTO `orion_information` VALUES ('5', '3', '3', '3', '3', '1403702483', '1403702483');
INSERT INTO `orion_information` VALUES ('10', '0', '0', '0', '0', '1401974684', '1401974684');
INSERT INTO `orion_information` VALUES ('24', '1', '0', '1', '0', '1401963955', '1401964211');
INSERT INTO `orion_information` VALUES ('26', '3', '3', '3', '3', '1403702575', '1404287544');

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
INSERT INTO `orion_record` VALUES ('3', '/upload/26/2014/7/26_35f9225764680eb4b100b9caad979fd7_thumb.jpg', '/upload/26/2014/7/26_9137449060bdf5f758b1caf6505935f7_thumb.jpg', '', '', '/upload/26/2014/7/26_874d87e996e98648786c17af70da96bf_thumb.jpg', '1', '1401893906', '1404286180');
INSERT INTO `orion_record` VALUES ('4', '/upload/26/2014/7/26_35f9225764680eb4b100b9caad979fd7_thumb.jpg', '/upload/26/2014/7/26_9137449060bdf5f758b1caf6505935f7_thumb.jpg', '', '', '/upload/26/2014/7/26_874d87e996e98648786c17af70da96bf_thumb.jpg', '0', '1401948742', '1404293701');
INSERT INTO `orion_record` VALUES ('10', '/upload/26/2014/7/26_35f9225764680eb4b100b9caad979fd7_thumb.jpg', '/upload/26/2014/7/26_9137449060bdf5f758b1caf6505935f7_thumb.jpg', '', '', '/upload/26/2014/7/26_874d87e996e98648786c17af70da96bf_thumb.jpg', '1', '1401980821', '1404286682');
INSERT INTO `orion_record` VALUES ('22', '/upload/26/2014/7/26_35f9225764680eb4b100b9caad979fd7_thumb.jpg', '/upload/26/2014/7/26_9137449060bdf5f758b1caf6505935f7_thumb.jpg', '', '', '/upload/26/2014/7/26_874d87e996e98648786c17af70da96bf_thumb.jpg', '1', '1401901555', '1404014349');
INSERT INTO `orion_record` VALUES ('24', '/upload/26/2014/7/26_35f9225764680eb4b100b9caad979fd7_thumb.jpg', '/upload/26/2014/7/26_9137449060bdf5f758b1caf6505935f7_thumb.jpg', '', '', '/upload/26/2014/7/26_874d87e996e98648786c17af70da96bf_thumb.jpg', '1', '1401961132', '1404286908');
INSERT INTO `orion_record` VALUES ('26', '/upload/26/2014/7/26_9137449060bdf5f758b1caf6505935f7_thumb.jpg', '/upload/26/2014/7/26_35f9225764680eb4b100b9caad979fd7_thumb.jpg', '', '', '/upload/26/2014/7/26_874d87e996e98648786c17af70da96bf_thumb.jpg', '0', '1403978359', '1404287551');

-- ----------------------------
-- Table structure for orion_user
-- ----------------------------
DROP TABLE IF EXISTS `orion_user`;
CREATE TABLE `orion_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户唯一id',
  `username` char(60) NOT NULL COMMENT '用户名',
  `email` char(100) NOT NULL COMMENT '邮箱',
  `password` char(254) DEFAULT NULL COMMENT '密码',
  `roletype` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '用户类型1普通，2微博',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  `updatetime` int(11) unsigned NOT NULL COMMENT '修改时间',
  `lastip` char(16) NOT NULL COMMENT '最后登录ip',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orion_user
-- ----------------------------
INSERT INTO `orion_user` VALUES ('3', '1286307870', '', '', '2', '1401700872', '1401909862', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('4', '测试', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704613', '1402233762', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('5', '地方2', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704737', '1403702467', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('6', '地方3', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704794', '1401704794', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('7', '地方5', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704887', '1401704887', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('8', '地7', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401704950', '1401704950', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('9', '地方', '15@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401705026', '1401705026', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('10', '你好', '2440@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401807626', '1404009204', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('22', '3962718571', '', '', '2', '1401901441', '1401901442', '127.0.0.1');
INSERT INTO `orion_user` VALUES ('23', '123456', '1@1.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401945550', '1401960818', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('24', '1234567', '1234567@qq.com', 'fcea920f7412b5da7be0cf42b8c93759', '1', '1401960928', '1401960928', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('25', 'dfg', '15as@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1401965978', '1401965978', '172.16.111.87');
INSERT INTO `orion_user` VALUES ('26', 'nihao', 'nihao@sdf.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1403702565', '1404282559', '172.16.111.87');

-- ----------------------------
-- Table structure for orion_visit
-- ----------------------------
DROP TABLE IF EXISTS `orion_visit`;
CREATE TABLE `orion_visit` (
  `vid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `ip` char(16) NOT NULL COMMENT '访客ip',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orion_visit
-- ----------------------------
INSERT INTO `orion_visit` VALUES ('1', '172.16.111.87', '1401985303');
INSERT INTO `orion_visit` VALUES ('2', '172.16.111.87', '1402233536');
INSERT INTO `orion_visit` VALUES ('3', '172.16.111.87', '1402233574');
INSERT INTO `orion_visit` VALUES ('4', '172.16.111.87', '1403702468');
INSERT INTO `orion_visit` VALUES ('5', '172.16.111.134', '1403705815');
INSERT INTO `orion_visit` VALUES ('6', '172.16.111.87', '1403855339');
INSERT INTO `orion_visit` VALUES ('7', '172.16.111.87', '1403964124');
INSERT INTO `orion_visit` VALUES ('8', '172.16.111.87', '1404008245');
INSERT INTO `orion_visit` VALUES ('9', '172.16.111.87', '1404207002');
INSERT INTO `orion_visit` VALUES ('10', '172.16.111.134', '1404210101');
INSERT INTO `orion_visit` VALUES ('11', '172.16.111.87', '1404279273');
INSERT INTO `orion_visit` VALUES ('12', '127.0.0.1', '1404281474');
INSERT INTO `orion_visit` VALUES ('13', '172.16.111.87', '1404282080');

-- ----------------------------
-- View structure for orion_v_user
-- ----------------------------
DROP VIEW IF EXISTS `orion_v_user`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `orion_v_user` AS SELECT
orion_user.uid,
orion_user.username,
orion_user.email,
orion_user.roletype,
orion_baby.`name`,
orion_baby.nickname,
orion_baby.parent,
orion_baby.sex,
orion_baby.birthday,
orion_baby.address,
orion_baby.city,
orion_baby.tel,
orion_baby.reason,
orion_baby.point_city,
orion_baby.point_hospital,
orion_record.avatar,
orion_record.photo1,
orion_record.photo2,
orion_record.photo3,
orion_record.`case`,
orion_record.`status`,
orion_record.createtime
FROM
orion_baby
INNER JOIN orion_user ON orion_baby.uid = orion_user.uid
INNER JOIN orion_record ON orion_record.uid = orion_user.uid ;
