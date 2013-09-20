-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Vært: localhost
-- Genereringstid: 17. 09 2013 kl. 08:46:07
-- Serverversion: 5.5.9
-- PHP-version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bucket_db`
--

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
  `achieved` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Data dump for tabellen `goal`
--

INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(1, 1, '2013-08-01', 'Travel to Italy', 'Say hi to the pobe and swim in the lake of souls', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(2, 1, '2013-08-02', 'Take driver license to motorbike', '...so I can ride into the sunset', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(3, 3, '2013-08-22', 'Kill a spider', 'I hate them', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(4, 2, '2013-09-01', 'Travel to Italy', 'Say hi to the pobe and swim in the lake of souls', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(5, 2, '2013-09-01', 'Travel to Spain', 'Say hi', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(6, 2, '2013-09-01', 'Travel to Australia', 'Say hi', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(11, 1, '2013-09-26', 'Diving course', 'Make diving master', 0);
INSERT INTO `goal` (`ID`, `user_id`, `start_date`, `title`, `description`, `achieved`) VALUES(13, 1, '2013-10-12', 'Grow a beard', 'Because it''s the manly thing to do', 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `goalList`
--

DROP TABLE IF EXISTS `goalList`;
CREATE TABLE IF NOT EXISTS `goalList` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `achieved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `goal` (`goal`),
  KEY `list` (`list`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Data dump for tabellen `goalList`
--

INSERT INTO `goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(1, 1, 1, 1, 0);
INSERT INTO `goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(2, 1, 2, 2, 0);
INSERT INTO `goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(6, 1, 11, 2, 0);
INSERT INTO `goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(7, 1, 12, 2, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Data dump for tabellen `list`
--

INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES(1, 1, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES(2, 1, 'Before 40 years', 'All the goals I want to reach before I get 40');
INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES(3, 2, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES(4, 3, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES(5, 4, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `list` (`ID`, `user_id`, `name`, `description`) VALUES(6, 2, 'Family', 'This is my list with family things');

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

INSERT INTO `user` (`ID`, `facebook_id`, `first_name`, `last_name`, `username`, `email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) VALUES(1, '1341390184', 'David', 'Lag', 'davidlag', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 35, 'male', 'Student', '1234');
INSERT INTO `user` (`ID`, `facebook_id`, `first_name`, `last_name`, `username`, `email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) VALUES(2, '1341390186', 'Nicolai', 'Lund', 'nicolailund', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 25, 'male', 'Student', '1234');
INSERT INTO `user` (`ID`, `facebook_id`, `first_name`, `last_name`, `username`, `email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) VALUES(3, '1341390187', 'Mares', 'Hansen', 'mareshansen', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 22, 'male', 'Model', '1234');
INSERT INTO `user` (`ID`, `facebook_id`, `first_name`, `last_name`, `username`, `email`, `city`, `country`, `age`, `gender`, `worktitle`, `password`) VALUES(4, '1341390188', 'Jóannes', 'Fløtti', 'joannesflotti', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 28, 'female', 'Student', '1234');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `user_id_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
