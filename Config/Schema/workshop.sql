
[36mWelcome to CakePHP v2.0.0-beta Console[0m
---------------------------------------------------------------
App : workshop
Path: /Users/lorenzo/Sites/workshop/
---------------------------------------------------------------
Cake Schema Shell
---------------------------------------------------------------
#Workshop sql generated on: 2011-09-01 13:31:07 : 1314883867

DROP TABLE IF EXISTS `courses`;
DROP TABLE IF EXISTS `instructors`;
DROP TABLE IF EXISTS `students`;
DROP TABLE IF EXISTS `users`;


CREATE TABLE `courses` (
	`id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`created` date NOT NULL COMMENT '',	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `instructors` (
	`id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`user_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`course_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',	PRIMARY KEY  (`id`),
	UNIQUE KEY `user_id` (`user_id`, `course_id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `students` (
	`id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`user_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`course_id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',	PRIMARY KEY  (`id`),
	UNIQUE KEY `user_id` (`user_id`, `course_id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;

CREATE TABLE `users` (
	`id` varchar(36) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`full_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`username` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '',
	`last_seen` int(11) NOT NULL COMMENT '',
	`admin` tinyint(1) DEFAULT NULL COMMENT '',	PRIMARY KEY  (`id`))	DEFAULT CHARSET=utf8,
	COLLATE=utf8_general_ci,
	ENGINE=InnoDB;


