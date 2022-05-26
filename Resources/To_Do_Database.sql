DROP DATABASE IF EXISTS ToDo;
Drop TABLE IF EXISTS Tasks;
DROP TABLE IF EXISTS Users;

CREATE DATABASE ToDo;

USE ToDo;

CREATE TABLE Users(
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(50) NOT NULL UNIQUE ,
	`password` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
	`first_name` VARCHAR(50) NOT NULL,
	`last_name` VARCHAR(50) NOT NULL,
	PRIMARY KEY(`user_id`)
) ENGINE=INNODB;

CREATE TABLE Tasks(
	`task_id` INT NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(80) NOT NULL,
	`description` VARCHAR(4000),
	`account_id` INT NOT NULL,
	`status` ENUM('Not-Started', 'In-Progress', 'Done', 'OverDue') NOT NULL,
	`entry_date` DATE DEFAULT NULL,
	`due_date` DATE DEFAULT NULL,
	PRIMARY KEY(`task_id`),
	FOREIGN KEY(`account_id`)
	REFERENCES Users(`user_id`)
	ON DELETE CASCADE 
) ENGINE=INNODB;