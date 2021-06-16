DROP DATABASE IF EXISTS getHired;
CREATE DATABASE getHired;
use getHired;

CREATE TABLE students(
	`id` INT NOT NULL AUTO_INCREMENT,
    `full_name` VARCHAR(150) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `cv` MEDIUMBLOB,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) 
    );
    
    CREATE TABLE companys(
	`id` INT NOT NULL AUTO_INCREMENT,
    `companyname` VARCHAR(250) NOT NULL,
    `decription` varchar(1000) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `contactname` varchar(150) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
	`tel` varchar(50) NOT NULL,
    `logo` MEDIUMBLOB,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
PRIMARY KEY (`id`) 
    );
    
     CREATE TABLE discipline(
	`id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(250) NOT NULL,
PRIMARY KEY (`id`) 
    );
    
        CREATE TABLE jobs(
	`id` INT NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(250) NOT NULL,
    `decription` varchar(1000) NOT NULL,
    `Companyname` VARCHAR(100) NOT NULL,
    `logo` MEDIUMBLOB,
    `applicationdl` date NOT NULL,
    `category` VARCHAR(250) NOT NULL,
PRIMARY KEY (`id`) 
FOREIGN KEY (Companyname) REFERENCES companys(companyname)
FOREIGN KEY (logo) REFERENCES companys(logo)
FOREIGN KEY (category) REFERENCES discipline(name)


    );