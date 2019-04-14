-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2019 at 02:46 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salfadeco`
--

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

DROP TABLE IF EXISTS `configuration`;
CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(64) DEFAULT NULL,
  `value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `directors_team`
--

DROP TABLE IF EXISTS `directors_team`;
CREATE TABLE IF NOT EXISTS `directors_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(256) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `image_group`
--

DROP TABLE IF EXISTS `image_group`;
CREATE TABLE IF NOT EXISTS `image_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `image_group_item`
--

DROP TABLE IF EXISTS `image_group_item`;
CREATE TABLE IF NOT EXISTS `image_group_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_group_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `image_group` (`image_group_id`),
  KEY `image` (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_date` datetime DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `date_entry` date DEFAULT NULL,
  `biography` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  `qr` varchar(45) DEFAULT NULL,
  `year_birth` int(11) DEFAULT NULL,
  `year_death` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_sport`
--

DROP TABLE IF EXISTS `member_sport`;
CREATE TABLE IF NOT EXISTS `member_sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `sport_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `member` (`member_id`),
  KEY `sport` (`sport_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permition`
--



DROP TABLE IF EXISTS `permition`;
CREATE TABLE IF NOT EXISTS `permition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;



-- --------------------------------------------------------

--
-- Table structure for table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `description` longtext,
  `image_id` int(11) DEFAULT NULL,
  `image_group_id` int(11) DEFAULT NULL,
  `color` varchar(8) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image` (`image_id`),
  KEY `image_group` (`image_group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `text`
--

DROP TABLE IF EXISTS `text`;
CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(45) DEFAULT NULL,
  `text` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `job` varchar(128) DEFAULT NULL,
  `role` enum('ADMIN','EMPLOYEE') DEFAULT 'EMPLOYEE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_permition`
--

DROP TABLE IF EXISTS `user_permition`;
CREATE TABLE IF NOT EXISTS `user_permition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `permition_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`user_id`),
  KEY `permition` (`permition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Constraints for dumped tables
--

--
-- Constraints for table `directors_team`
--
ALTER TABLE `directors_team`
  ADD CONSTRAINT `directors_team_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `directors_team_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`);

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`),
  ADD CONSTRAINT `gallery_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `image_group_item`
--
ALTER TABLE `image_group_item`
  ADD CONSTRAINT `image_group_item_ibfk_1` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`),
  ADD CONSTRAINT `image_group_item_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`),
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`);

--
-- Constraints for table `member_sport`
--
ALTER TABLE `member_sport`
  ADD CONSTRAINT `member_sport_ibfk_1` FOREIGN KEY (`sport_id`) REFERENCES `sport` (`id`),
  ADD CONSTRAINT `member_sport_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

--
-- Constraints for table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `sport_ibfk_1` FOREIGN KEY (`image_group_id`) REFERENCES `image_group` (`id`),
  ADD CONSTRAINT `sport_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Constraints for table `user_permition`
--
ALTER TABLE `user_permition`
  ADD CONSTRAINT `user_permition_ibfk_1` FOREIGN KEY (`permition_id`) REFERENCES `permition` (`id`),
  ADD CONSTRAINT `user_permition_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
