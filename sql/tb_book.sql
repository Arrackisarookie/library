/*
Navicat MySQL Data Transfer

Source Server         : library
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2018-11-23 22:06:39
*/
USE library;
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_book`
-- ----------------------------
DROP TABLE IF EXISTS `tb_book`;
CREATE TABLE `tb_book` (
  `bid` char(9) NOT NULL DEFAULT 'A00000000',
  `call_number` char(6) NOT NULL DEFAULT '',
  `state` enum('阅览','在借','库本','预定') NOT NULL DEFAULT '阅览',
  PRIMARY KEY (`bid`),
  KEY `call_number` (`call_number`),
  CONSTRAINT `tb_book_ibfk_1` FOREIGN KEY (`call_number`) REFERENCES `tb_bibliography` (`call_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_book
-- ----------------------------
INSERT INTO `tb_book` VALUES ('C00112711', 'I246', '阅览');
INSERT INTO `tb_book` VALUES ('C00112712', 'I246', '阅览');
INSERT INTO `tb_book` VALUES ('C00196389', 'I247', '库本');
INSERT INTO `tb_book` VALUES ('C00196390', 'I247', '阅览');
INSERT INTO `tb_book` VALUES ('C00224892', 'TP302', '库本');
INSERT INTO `tb_book` VALUES ('C00224893', 'TP302', '阅览');
INSERT INTO `tb_book` VALUES ('C00224894', 'TP302', '预定');
INSERT INTO `tb_book` VALUES ('C00224895', 'TP302', '阅览');
INSERT INTO `tb_book` VALUES ('C00224896', 'TP302', '在借');
INSERT INTO `tb_book` VALUES ('C00290622', 'B565', '阅览');
INSERT INTO `tb_book` VALUES ('C00290623', 'B565', '阅览');
INSERT INTO `tb_book` VALUES ('C00311352', 'I248', '阅览');
INSERT INTO `tb_book` VALUES ('C00311528', 'I247', '在借');
INSERT INTO `tb_book` VALUES ('C00480381', 'TP305', '库本');
INSERT INTO `tb_book` VALUES ('C00480382', 'TP305', '阅览');
INSERT INTO `tb_book` VALUES ('C00480383', 'TP305', '在借');
INSERT INTO `tb_book` VALUES ('C00484509', 'I565', '库本');
INSERT INTO `tb_book` VALUES ('C00484510', 'I565', '在借');
INSERT INTO `tb_book` VALUES ('C00484511', 'I565', '在借');
INSERT INTO `tb_book` VALUES ('C00484512', 'I565', '阅览');
INSERT INTO `tb_book` VALUES ('C00504594', 'TP311', '阅览');
INSERT INTO `tb_book` VALUES ('C00504595', 'TP311', '阅览');
INSERT INTO `tb_book` VALUES ('C00504596', 'TP311', '阅览');
INSERT INTO `tb_book` VALUES ('C00555863', 'TP303', '库本');
INSERT INTO `tb_book` VALUES ('C00555864', 'TP303', '阅览');
INSERT INTO `tb_book` VALUES ('C00561644', 'TP310', '在借');
INSERT INTO `tb_book` VALUES ('C00561645', 'TP310', '阅览');
