USE library;
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_role`
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `id` int auto_increment primary key, 	
  `sid` char(9) NOT NULL DEFAULT '' UNIQUE,
  `role` enum('admin','ordinary') NOT NULL DEFAULT 'ordinary',
  CONSTRAINT `tb_role_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `tb_user` (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_role
-- ----------------------------
INSERT INTO `tb_role`(sid, role) VALUES ('000000000', 'admin');
INSERT INTO `tb_role`(sid) VALUES ('160101310');
INSERT INTO `tb_role`(sid) VALUES ('160102205');
INSERT INTO `tb_role`(sid) VALUES ('170101101');
INSERT INTO `tb_role`(sid) VALUES ('170101102');
INSERT INTO `tb_role`(sid) VALUES ('170101103');
INSERT INTO `tb_role`(sid) VALUES ('170102103');
INSERT INTO `tb_role`(sid) VALUES ('170102403');
INSERT INTO `tb_role`(sid) VALUES ('180101206');
INSERT INTO `tb_role`(sid) VALUES ('180203201');
INSERT INTO `tb_role`(sid) VALUES ('180301105');
INSERT INTO `tb_role`(sid) VALUES ('180301115');
INSERT INTO `tb_role`(sid) VALUES ('180301204');
INSERT INTO `tb_role`(sid) VALUES ('180301207');
INSERT INTO `tb_role`(sid) VALUES ('190101110');
INSERT INTO `tb_role`(sid) VALUES ('190101204');
