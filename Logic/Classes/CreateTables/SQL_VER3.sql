-- CREATE USER 'bucket'@'localhost' IDENTIFIED BY '1234';
-- DROP DATABASE IF EXISTS bucket_db;
-- CREATE DATABASE bucket_db;

-- ----------------------------------------------------
-- Drop views and tables
-- ----------------------------------------------------
DROP VIEW IF EXISTS all_on_user;

DROP TABLE IF EXISTS `bucket_db`.`goalList` ;
DROP TABLE IF EXISTS `bucket_db`.`list` ;
DROP TABLE IF EXISTS `bucket_db`.`goal` ;
DROP TABLE IF EXISTS `bucket_db`.`user` ;

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
  PRIMARY KEY (`ID`) 
  -- UNIQUE INDEX `username_UNIQUE` (`username` ASC) ,
  -- UNIQUE INDEX `email_UNIQUE` (`email` ASC) 
)
ENGINE = InnoDB;

INSERT INTO `bucket_db`.`user` VALUES (1, 1341390184, 'David', 'Lag', 'davidlag', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 35, 'male', 'Student', '1234');
INSERT INTO `bucket_db`.`user` VALUES (2, 1341390186, 'Nicolai', 'Lund', 'nicolailund', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 25, 'male', 'Student', '1234');
INSERT INTO `bucket_db`.`user` VALUES (3, 1341390187, 'Mares', 'Hansen', 'mareshansen', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 22, 'male', 'Model', '1234');
INSERT INTO `bucket_db`.`user` VALUES (4, 1341390188, 'Jóannes', 'Fløtti', 'joannesflotti', 'info@2bucket.dk', 'Copenhagen', 'Denmark', 28, 'female', 'Student', '1234');

-- -----------------------------------------------------
-- Table `bucket_db`.`goal`
-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `bucket_db`.`goal` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `start_date` DATE NOT NULL ,
  `title` VARCHAR(255) NOT NULL ,
  `description` TEXT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `user_id` (`user_id` ASC) ,
  CONSTRAINT `user_id_1`
    FOREIGN KEY (`user_id` )
    REFERENCES `bucket_db`.`user` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `bucket_db`.`goal` VALUES (1, 1, '2013-08-01', 'Travel to Italy', 'Say hi to the pobe and swim in the lake of souls');
INSERT INTO `bucket_db`.`goal` VALUES (2, 1, '2013-08-02', 'Take driver license to motorbike', '...so I can ride into the sunset');
INSERT INTO `bucket_db`.`goal` VALUES (3, 3, '2013-08-22', 'Kill a spider', 'I hate them');
INSERT INTO `bucket_db`.`goal` VALUES (4, 2, '2013-09-01', 'Travel to Italy', 'Say hi to the pobe and swim in the lake of souls');
INSERT INTO `bucket_db`.`goal` VALUES (5, 2, '2013-09-01', 'Travel to Spain', 'Say hi');
INSERT INTO `bucket_db`.`goal` VALUES (6, 2, '2013-09-01', 'Travel to Australia', 'Say hi');


-- -----------------------------------------------------
-- Table `bucket_db`.`list`
-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `bucket_db`.`list` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `description` TEXT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `user_id` (`user_id` ASC) ,
  CONSTRAINT `user_id_2`
    FOREIGN KEY (`user_id` )
    REFERENCES `bucket_db`.`user` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `bucket_db`.`list` VALUES (1, 1, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` VALUES (2, 1, 'Before 40 years', 'All the goals I want to reach before I get 40');
INSERT INTO `bucket_db`.`list` VALUES (3, 2, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` VALUES (4, 3, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` VALUES (5, 4, 'Lifelong', 'This is my life long bucket list with all the goals that I want to acheve before I die');
INSERT INTO `bucket_db`.`list` VALUES (6, 2, 'Family', 'This is my list with family things');


-- -----------------------------------------------------
-- Table `bucket_db`.`goalList`
-- -----------------------------------------------------

CREATE  TABLE IF NOT EXISTS `bucket_db`.`goalList` (
  `ID` INT NOT NULL AUTO_INCREMENT ,
  `goal` INT NOT NULL ,
  `list` INT NOT NULL ,
  PRIMARY KEY (`ID`) ,
  INDEX `goal` (`goal` ASC) ,
  INDEX `list` (`list` ASC) ,
  CONSTRAINT `goal`
    FOREIGN KEY (`goal` )
    REFERENCES `bucket_db`.`goal` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `list`
    FOREIGN KEY (`list` )
    REFERENCES `bucket_db`.`list` (`ID` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `bucket_db`.`goalList` VALUES (1, 1, 1);
INSERT INTO `bucket_db`.`goalList` VALUES (2, 2, 1);
INSERT INTO `bucket_db`.`goalList` VALUES (3, 3, 1);
INSERT INTO `bucket_db`.`goalList` VALUES (4, 4, 2);
INSERT INTO `bucket_db`.`goalList` VALUES (5, 5, 2);
INSERT INTO `bucket_db`.`goalList` VALUES (6, 1, 6);
INSERT INTO `bucket_db`.`goalList` VALUES (7, 2, 3);



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