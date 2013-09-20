-- CREATE USER 'bucket'@'localhost' IDENTIFIED BY '1234';
-- DROP DATABASE IF EXISTS `bucket_db`;
-- CREATE DATABASE IF NOT EXISTS `bucket_db`;

-- ----------------------------------------------------
-- Drop views and tables
-- ----------------------------------------------------
DROP VIEW IF EXISTS `bucket_db`.`all_on_user`;

DROP TABLE IF EXISTS `bucket_db`.`goalList`;
DROP TABLE IF EXISTS `bucket_db`.`list`;
DROP TABLE IF EXISTS `bucket_db`.`goal`;
DROP TABLE IF EXISTS `bucket_db`.`user`;

SET CHARSET 'UTF8';

-- -----------------------------------------------------
-- Table `bucket_db`.`user`
-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `bucket_db`.`user` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `facebook_id` LONG NULL ,
  `first_name` VARCHAR(255) NOT NULL ,
  `last_name` VARCHAR(255) NOT NULL ,
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255) NOT NULL ,
  `city` VARCHAR(255) NULL ,
  `country` VARCHAR(255) NOT NULL ,
  `age` INT NOT NULL ,
  `gender` VARCHAR(255) NULL ,
  `worktitle` VARCHAR(255) NULL ,
  `password` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`ID`),
  CONSTRAINT uc_username_email UNIQUE (`username`,`email`)
)
ENGINE = InnoDB;

INSERT INTO `bucket_db`.`user` VALUES (1, 1341390184, 'David', 'Lag', 'davidlag', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 35, 'male', 'Student', '1234');
INSERT INTO `bucket_db`.`user` VALUES (2, 1341390186, 'Nicolai', 'Lund', 'nicolailund', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 25, 'male', 'Student', '1234');
INSERT INTO `bucket_db`.`user` VALUES (3, 1341390187, 'Mares', 'Hansen', 'mareshansen', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 22, 'male', 'Model', '1234');
INSERT INTO `bucket_db`.`user` VALUES (4, 1341390188, 'Jóannes', 'Fløtti', 'joannesflotti', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 28, 'female', 'Student', '1234');

-- -----------------------------------------------------
-- Table `bucket_db`.`goal`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `bucket_db`.`goal` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB;

INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(1, 1, '2013-08-01', 'Travel to Italy', 'Say hi to the pobe and swim in the lake of souls');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(2, 1, '2013-08-02', 'Take driver license to motorbike', '...so I can ride into the sunset');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(3, 3, '2013-08-22', 'Kill a spider', 'I hate them');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(4, 2, '2013-09-01', 'Travel to Italy', 'Say hi to the pobe and swim in the lake of souls');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(5, 2, '2013-09-01', 'Travel to Spain', 'Say hi');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(6, 2, '2013-09-01', 'Travel to Australia', 'Say hi');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(11, 1, '2013-09-26', 'Diving course', 'Make diving master');
INSERT INTO `bucket_db`.`goal` (`ID`, `user_id`, `start_date`, `title`, `description`) VALUES(13, 1, '2013-10-12', 'Grow a beard', 'Because it''s the manly thing to do');


-- -----------------------------------------------------
-- Table `bucket_db`.`list`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `bucket_db`.`list` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`ID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB;

INSERT INTO `bucket_db`.`list` (`ID`, `user_id`, `name`, `description`) VALUES(1, 1, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` (`ID`, `user_id`, `name`, `description`) VALUES(2, 1, 'Before 40 years', 'All the goals I want to reach before I get 40');
INSERT INTO `bucket_db`.`list` (`ID`, `user_id`, `name`, `description`) VALUES(3, 2, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` (`ID`, `user_id`, `name`, `description`) VALUES(4, 3, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` (`ID`, `user_id`, `name`, `description`) VALUES(5, 4, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` (`ID`, `user_id`, `name`, `description`) VALUES(6, 2, 'Family', 'This is my list with family things');

-- -----------------------------------------------------
-- Table `bucket_db`.`goalList`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `bucket_db`.`goalList` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `list` int(11) NOT NULL,
  `achieved` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `goal` (`goal`),
  KEY `list` (`list`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB;


INSERT INTO `bucket_db`.`goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(1, 1, 1, 1, 0);
INSERT INTO `bucket_db`.`goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(2, 1, 2, 2, 0);
INSERT INTO `bucket_db`.`goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(6, 1, 11, 2, 0);
INSERT INTO `bucket_db`.`goalList` (`ID`, `user_id`, `goal`, `list`, `achieved`) VALUES(7, 1, 12, 2, 0);

-- ---------------------------------------------------------
-- CREATION OF VIEWS
-- ---------------------------------------------------------

-- -------------------------------------------------
-- View all_on_user. Here the user, goal and list tables are joind where list name and goal title are not empty
-- -------------------------------------------------

CREATE VIEW all_on_user AS
	SELECT distinct u.ID AS user_id, u.first_name, u.last_name, u.username, u.email, u.city, u.country, u.age, u.gender, u.worktitle,
	        l.name AS list_name, l.description AS list_description, 
	        g.title AS goal_title, g.description AS goal_description, g.start_date 
	    FROM user u
	    INNER JOIN list l 
	        ON u.ID = l.user_id
	    INNER JOIN goal g 
	        ON u.Id = g.user_id
	WHERE l.name <> '' AND g.title <> ''