# Host: 127.0.0.1  (Version: 5.5.53)
# Date: 2017-12-12 17:40:26
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "plan"
#

DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) NOT NULL DEFAULT '0',
  `plan_name` varchar(255) NOT NULL DEFAULT '',
  `plan_sex` varchar(255) NOT NULL DEFAULT '',
  `plan_hobby` varchar(255) NOT NULL DEFAULT '',
  `plan_time` varchar(255) NOT NULL DEFAULT '',
  `plan_place` varchar(255) NOT NULL DEFAULT '',
  `plan_phone` varchar(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`plan_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

#
# Data for table "plan"
#

/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
INSERT INTO `plan` VALUES (1,1,'张三','男','嫦娥','2018-1','美国','18810888888'),(2,2,'李四','女','跳舞','2018-2','土耳其','18511695789');
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;

#
# Structure for table "register"
#

DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `trip_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`trip_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "register"
#

/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (1,'1476531193@qq.com','ssssss'),(2,'11111111111@qq.com','111111');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;

#
# Structure for table "submit"
#

DROP TABLE IF EXISTS `submit`;
CREATE TABLE `submit` (
  `submit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `subject` varchar(255) NOT NULL DEFAULT '',
  `body` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`submit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='反馈信息';

#
# Data for table "submit"
#

/*!40000 ALTER TABLE `submit` DISABLE KEYS */;
/*!40000 ALTER TABLE `submit` ENABLE KEYS */;
