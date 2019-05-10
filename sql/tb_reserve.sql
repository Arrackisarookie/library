USE library;
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `tb_reserve`
-- ----------------------------
DROP TABLE IF EXISTS `tb_reserve`;
CREATE TABLE `tb_reserve` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` char(9) NOT NULL DEFAULT '000000000',
  `bid` char(9) NOT NULL DEFAULT 'A00000000',
  `reserve_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`),
  KEY `bid` (`bid`),
  CONSTRAINT `tb_reserve_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `tb_user` (`sid`),
  CONSTRAINT `tb_reserve_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `tb_book` (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
