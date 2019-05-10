/*
Navicat MySQL Data Transfer

Source Server         : library
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : library

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2018-11-23 22:06:17
*/

USE library;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_bibliography`
-- ----------------------------
DROP TABLE IF EXISTS `tb_bibliography`;
CREATE TABLE `tb_bibliography` (
  `call_number` char(6) NOT NULL DEFAULT '',
  `biblioname` char(20) NOT NULL DEFAULT '',
  `author` char(10) NOT NULL DEFAULT '',
  `press` char(20) NOT NULL DEFAULT '',
  `publishing_time` year(4) NOT NULL DEFAULT '0000',
  `ISBN` char(17) NOT NULL DEFAULT '000-0-000-00000-0',
  `category` char(10) NOT NULL DEFAULT 'δ?',
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `intro` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`call_number`),
  UNIQUE KEY `ISBN` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_bibliography
-- ----------------------------
INSERT INTO `tb_bibliography` VALUES ('B565', '论法的精神', '孟德斯鸠', '商务印书馆', '2012', '978-7-100-09013-1', '哲学', '44.00', '该书所倡导的法制、政治自由和权力分立是对神学和封建专制的有力抨击，成为此后资产阶级大革命的政治纲领。特别是由孟德斯鸠第一次正式提出的分权与制衡理论，对近代以来的资产阶级政治实践和政治思想产生了直接而深远的影响。');
INSERT INTO `tb_bibliography` VALUES ('I246', '蛙', '莫言', '上海文艺出版社', '2009', '978-7-5321-3676-6', '文学', '27.00', '小说通过讲述从事妇产科工作50多年的乡村女医生姑姑的人生经历，反映新中国近60年波澜起伏的农村生育史，描述国家为了控制人口剧烈增长、实施计划生育国策所走过的艰巨而复杂的历史过程。');
INSERT INTO `tb_bibliography` VALUES ('I247', '围城', '钱钟书', '人民文学出版社', '1991', '978-7-02-002475-9', '文学', '19.00', '本书以主人公方鸿渐的生活道路为主线，表现了人们在婚姻恋爱、教育、生活、事业等种种\"围城\"中的困境。');
INSERT INTO `tb_bibliography` VALUES ('I248', '白鹿原', '陈秋实', '漓江出版社', '2011', '978-7-5302-1011-6', '文学', '32.00', '在从清末民元到建国之初的半个世纪里，一阵阵飓风掠过了白鹿原上空，而每一次的变动都震荡着它的，在我们眼前铺开了一轴恢宏的、动态的、极富纵深感的关于我们民族灵魂的现实主义的画卷。');
INSERT INTO `tb_bibliography` VALUES ('I565', '局外人', '加缪', '上海文艺出版社', '2016', '978-7-5407-7798-2', '文学', '32.00', '小职员默尔索的母亲在养老院病逝了，他对此反应却很平静，。葬礼次日，他就跑去和女人调笑、幽会，十分有悖常情。不久，默尔索受朋友牵累，莫名其妙地开枪打死了一个阿拉伯人。被捕受审期间，他对自己身陷囹圄的状况却表现得十分冷淡漠然、麻木不仁，一副无动于衷、事不关己的模样，仿佛自己是个局外人。');
INSERT INTO `tb_bibliography` VALUES ('TP301', '管理信息系统使用教程 第二版', '王若宾', '人民邮电出版社', '2005', '978-7-11-526615-6', '数据库', '45.00', '内容包括管理信息系统概述、管理信息系统开发综述、系统规划与可行性分析、系统需求建模、结构化系统分析、面向对象的系统分析、系统设计、数据库设计、系统实施与测试、系统运行与维护、信息系统的管理、课程设计实习。');
INSERT INTO `tb_bibliography` VALUES ('TP302', '管理信息系统使用教程 第三版', '王若宾', '人民邮电出版社', '2012', '978-7-11-535684-0', '数据库', '23.00', '本书以课程管理和图书馆管理两个实例贯穿管理信息系统建设的全过程，内容包括管理信息系统概述、管理信息系统开发综述、系统规划与可行性分析、系统需求建模、结构化系统分析、面向对象的系统分析、系统设计、数据库设计、系统实施与测试、系统运维与管理、课程设计实习。');
INSERT INTO `tb_bibliography` VALUES ('TP303', '数据库基础教程', '王月海', '机械工业出版社', '2011', '978-7-11-135592-2', '数据库', '21.90', '计算机组成与系统结构概述、逻辑部件基础、运算方法与实现电路、指令系统、控制器组成原理、主存储器与存储系统等内容。');
INSERT INTO `tb_bibliography` VALUES ('TP304', '计算机组成原理与系统结构', '马礼', ' 人民邮电出版社', '2004', '978-7-115-12059-5', '计算机', '33.00', null);
INSERT INTO `tb_bibliography` VALUES ('TP305', '软件测试程序设计技术', '孙晶', '电子工业出版社', '2015', '978-7-121-27337-7', '计算机', '39.00', '软件测试概述、软件测试基础、TTCN树表描述语言简介、TTCN-3核心语言概述、TTCN-3类型声明、TTCN-3语句与函数、TTCN-3测试配置及操作、等。');
INSERT INTO `tb_bibliography` VALUES ('TP310', '大学计算机', '李凤霞', '高等教育出版社', '2014', '978-7-04-040965-9', '计算机', '28.00', '李凤霞、陈宇峰、史树敏编著的《大学计算机》以基于计算机的问题求解为主线，以计算思维能力培养为目标，以全新的视角组织教学内容，突出计算理论与计算机科学方法，在教学内容中渗透计算思维的基本概念，为读者展示计算机科学的轮廓和相关技术。');
INSERT INTO `tb_bibliography` VALUES ('TP311', 'Python语言程序设计基础', '嵩天', '高等教育出版社', '2017', '978-7-04-047170-0', '编程语言', '39.00', null);
INSERT INTO `tb_bibliography` VALUES ('TP312', 'Visual Basic程序设计教程', '肖彬', '中国电力出版社', '2006', '978-7-50-833895-2', '编程语言', '24.00', '本书是一本介绍Basic语言程序设计的高等学校教材，主要内容包括：Visual Basic 6.0概述、Visual Basic 6.0程序设计方法、Visual Basic 6.0编程基础等。');
