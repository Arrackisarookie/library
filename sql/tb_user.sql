/*
Navicat MySQL Data Transfer

Source Server         : library
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2018-11-23 22:06:57
*/
USE library;
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_user`
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `sid` char(9) NOT NULL DEFAULT '000000000',
  `username` char(10) NOT NULL DEFAULT '',
  `sex` enum('1','0') NOT NULL DEFAULT '1',
  `birth` date NOT NULL DEFAULT '1000-01-01',
  `school` char(10) NOT NULL DEFAULT '',
  `class` char(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES ('000000000', 'admin', '', '', '', '');
INSERT INTO `tb_user` VALUES ('160101310', '关羽', '1', '2000-01-01', '计算机学院', '计16-3');
INSERT INTO `tb_user` VALUES ('160102205', '貂蝉', '0', '1998-09-03', '计算机学院', '数媒16-1');
INSERT INTO `tb_user` VALUES ('170101101', '王昭君', '0', '1999-01-01', '计算机学院', '计17-1');
INSERT INTO `tb_user` VALUES ('170101102', '刘邦', '1', '1999-01-02', '计算机学院', '计17-1');
INSERT INTO `tb_user` VALUES ('170101103', '刘备', '1', '2001-11-11', '计算机学院', '计17-1');
INSERT INTO `tb_user` VALUES ('170102103', '成吉思汗', '1', '1999-02-02', '计算机学院', '计18-1');
INSERT INTO `tb_user` VALUES ('170102403', '刘禅', '1', '2001-01-01', '计算机学院', '数媒17-4');
INSERT INTO `tb_user` VALUES ('180101206', '张飞', '1', '2000-04-05', '计算机学院', '计18-2');
INSERT INTO `tb_user` VALUES ('180203201', '马克·波罗', '1', '1999-01-01', '经济管理学院', '经管18-2');
INSERT INTO `tb_user` VALUES ('180301105', '韩信', '1', '1999-01-01', '理学院', '数18-1');
INSERT INTO `tb_user` VALUES ('180301115', '武则天', '0', '2001-10-01', '理学院', '数18-1');
INSERT INTO `tb_user` VALUES ('180301204', '刘备', '1', '1999-06-06', '理学院', '数18-2');
INSERT INTO `tb_user` VALUES ('180301207', '鬼谷子', '1', '2000-04-05', '理学院', '数18-2');
INSERT INTO `tb_user` VALUES ('190101110', '杨玉环', '0', '2002-02-03', '计算机学院', '计19-4');
INSERT INTO `tb_user` VALUES ('190101204', '西施', '0', '2003-02-03', '计算机学院', '计19-2');

alter table `tb_user` add `password` varchar(50) not null after `sid`;
update tb_user set password=md5(substring(sid, -6));