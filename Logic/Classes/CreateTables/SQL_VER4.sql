-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 17. 09 2013 kl. 09:33:09
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bucket_db`
--
CREATE DATABASE IF NOT EXISTS `bucket_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bucket_db`;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `goal`
--

DROP TABLE IF EXISTS `goal`;
CREATE TABLE IF NOT EXISTS `goal` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `goal`
--

INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES
(1, 2, '2013-09-24', 'Adv. kursus', 'Vragdyk og dyk fra båd.'),
(2, 2, '0000-00-00', 'Grow a beard', 'Because it''s the manly thing to do YEAH'),
(3, 2, '2013-10-17', 'Grow a beard 2', 'Because it''s the manly thing to do'),
(4, 1, '2013-10-17', 'Take the big train', 'Because it''s the manly thing to do'),
(5, 1, '2013-10-17', 'A night in the tower', 'Spend a night in the tower with princess Fiona'),
(6, 1, '2013-10-17', '200 km', 'Drive faster than 200 km/h');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `goallist`
--

DROP TABLE IF EXISTS `goallist`;
CREATE TABLE IF NOT EXISTS `goallist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `achieved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `goal` (`goal`),
  KEY `list` (`list`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `goallist`
--

INSERT INTO `goallist` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES
(1, 2, 1, 2, 0),
(2, 2, 2, 1, 0),
(3, 2, 3, 1, 0),
(4, 1, 4, 3, 0),
(5, 1, 5, 3, 0),
(6, 1, 6, 4, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `list`
--

DROP TABLE IF EXISTS `list`;
CREATE TABLE IF NOT EXISTS `list` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `list`
--

INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES
(1, 2, 'Trip to australia', 'So many things to do'),
(2, 2, 'Diving', 'So many things to do'),
(3, 1, 'Disney World', 'Trip to disney world and visit Mickey mouse'),
(4, 1, 'Formula 1', 'My racing life');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `facebook_id` mediumtext,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `worktitle` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `uc_username_email` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`ID`, `facebook_id`, `first_name`, `last_name`, `username`, `email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) VALUES
(1, '1341390184', 'David', 'Lag', 'davidlag', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 35, 'male', 'Student', '1234'),
(2, '1341390186', 'Nicolai', 'Lund', 'nicolailund', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 25, 'male', 'Student', '1234'),
(3, '1341390187', 'Mares', 'Hansen', 'mareshansen', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 22, 'male', 'Model', '1234'),
(4, '1341390188', 'Jóannes', 'Fløtti', 'joannesflotti', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 28, 'female', 'Student', '1234');
