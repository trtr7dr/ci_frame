/*
Navicat MySQL Data Transfer

Source Server         : open_server
Source Server Version : 50545
Source Host           : localhost:3306
Source Database       : ci3

Target Server Type    : MYSQL
Target Server Version : 50545
File Encoding         : 65001

Date: 2015-10-29 23:55:44
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  `description` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('1', 'sitename', 'CodeIgniter 3 HMVC Site', 'Название сайта');
INSERT INTO `settings` VALUES ('2', 'email', 'info@mail.ru', 'Email');
INSERT INTO `settings` VALUES ('3', 'email_sender', '', 'Email отправителя');
INSERT INTO `settings` VALUES ('5', 'tel1', '+123456-78-90', 'Телефон 1');
INSERT INTO `settings` VALUES ('6', 'tel2', '', 'Телефон 2');
INSERT INTO `settings` VALUES ('7', 'adress', 'Украина', 'Адресс');
INSERT INTO `settings` VALUES ('8', 'yandex_metrika', '', 'Код Yandex.Metrika');
INSERT INTO `settings` VALUES ('9', 'google_analytics', '<!-- google-analytics    -->', 'Код google-analytics');
INSERT INTO `settings` VALUES ('4', 'email_order', '', 'Email для заявок');
INSERT INTO `settings` VALUES ('10', 'captcha', '0', 'Защита форм от ботов');
INSERT INTO `settings` VALUES ('11', 'title_suffix', '', 'Суффикс к title');
INSERT INTO `settings` VALUES ('12', 'send_mail', '0', 'Отправлять на почту');
INSERT INTO `settings` VALUES ('15', 'tel3', '', 'Телефон 3');
