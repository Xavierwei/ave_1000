/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50535
Source Host           : localhost:3306
Source Database       : avene1000

Target Server Type    : MYSQL
Target Server Version : 50535
File Encoding         : 65001

Date: 2014-07-01 16:11:48
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
INSERT INTO `orion_baby` VALUES ('3', '测试', '车的', '男', '2010-01-01 00:00:00', '大富大贵', '深圳', '13512401547', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401719091', '1401899136');
INSERT INTO `orion_baby` VALUES ('4', '测试', '车的', '女', '2000-09-13 00:00:00', '大富大贵', '深圳', '13512401547', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401948892', '1401959663');
INSERT INTO `orion_baby` VALUES ('10', '测试456', '第三方', '男', '1994-03-05 00:00:00', '第三方', '深圳', '62', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401978220', '1401991150');
INSERT INTO `orion_baby` VALUES ('24', '超限额是', '水电费', '男', '2007-10-15 00:00:00', '第三方', '深圳', '1245', '是青春路上的美好，还是无尽等待里的倾心相遇？总会出现这样一个人，他不是你青春年月里憧憬的美好的模样，也不符合你内心的对于那个他的要求，甚至一点都不符合。可是就是这样的一个人的出现，打破了你之前所有的原则。你穿越了无尽的等待，就是为了与这样一个人相遇。可是，这一刻的相遇相知代表不了今生的相依相随；这一刻的相拥惜别代表不了永远的温暖驻守。就这样，一个人出现在你的世界，又毫无声息的消失，就像一切都没发生过一样。只有你自己知道，他来过，也留下了痕迹，这些都存在于内心。', '南京', '中国医学科学院皮肤病医院', '1401961155', '1401961155');
INSERT INTO `orion_baby` VALUES ('26', '覆盖', '梵蒂冈', '男', '2009-03-18 00:00:00', '梵蒂冈', '上海市', '45646', '希望通过这次活动能让我的孩子早日康复', '', '', '1404010918', '1404010918');

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
INSERT INTO `orion_information` VALUES ('26', '3', '3', '3', '3', '1403702575', '1404010883');

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
INSERT INTO `orion_record` VALUES ('3', '/upload/3/2014/6/3_c669e3be9988f5080ee8b068dba04bef.jpg', '/upload/3/2014/6/3_7dbb974be337a1aa3ee8bc6441a0e11e.jpg', '/upload/3/2014/6/3_0c1814e53dd1d3df2723010daf7d09b4.jpg', '/upload/3/2014/6/3_5db63399e6eabccbae773a5459454562.jpg', '/upload/3/2014/6/3_56b71bbffa32dba7664afc4f91d1307b.jpg', '0', '1401893906', '1404015470');
INSERT INTO `orion_record` VALUES ('4', '/upload/4/2014/6/4_63a3d24fa4331d6f18cce8f4cf8a16eb.jpg', '/upload/4/2014/6/4_dced860a6b5185c33e3ef697005cc886.jpg', '', '', '/upload/4/2014/6/4_1aabf29a12d57277f822bcb2a214402f.jpg', '1', '1401948742', '1401956230');
INSERT INTO `orion_record` VALUES ('10', '/upload/10/2014/6/10_03834f8112ef7bf7226c73eeb966f1b3.jpg', '/upload/10/2014/6/10_3e03e1ea2b5b73ebf8d0330fbce41c3b.jpg', '', '', '/upload/10/2014/6/10_d8cad9c4e9044575f851de0ce1249f54.jpg', '1', '1401980821', '1401983008');
INSERT INTO `orion_record` VALUES ('22', '/upload/22/2014/6/22_04730e73a8476f40d904f9088ee29ba4.jpg', '/upload/22/2014/6/22_6daff39e13d187fccc0afdc693587976.jpg', '/upload/22/2014/6/22_3bd5f2b249b46c50765b960d60528be4.jpg', '/upload/22/2014/6/22_2534bebf2a1f6b04cdf14b88fc121789.jpg', '/upload/22/2014/6/22_2ea12c184c363a1fb55b1d2aa696d75b.jpg', '1', '1401901555', '1404014349');
INSERT INTO `orion_record` VALUES ('24', '/upload/24/2014/6/24_e75b741877b365a82a59a266e5e689bb.jpg', '/upload/24/2014/6/24_3fd33c39e06b798565ceef1f138f2942.jpg', '', '', '/upload/24/2014/6/24_a27119b35325e37c86e569c461572cce.jpg', '0', '1401961132', '1404014356');
INSERT INTO `orion_record` VALUES ('26', '/upload/26/2014/6/26_d98ecabd91290dbffa376faeb1421c33.jpg', '/upload/26/2014/6/26_8d2948f93ea290b4c8b8887a304ce1c8.jpg', '', '', '', '0', '1403978359', '1404010893');

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
INSERT INTO `orion_user` VALUES ('26', 'nihao', 'nihao@sdf.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '1403702565', '1404010878', '172.16.111.87');

-- ----------------------------
-- Table structure for orion_visit
-- ----------------------------
DROP TABLE IF EXISTS `orion_visit`;
CREATE TABLE `orion_visit` (
  `vid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '唯一id',
  `ip` char(16) NOT NULL COMMENT '访客ip',
  `createtime` int(11) unsigned NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
