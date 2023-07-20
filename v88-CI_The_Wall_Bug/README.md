# The Wall
The Wall lets you register and log in to the registered
account and leave messages and comment on messages that are on
the wall/homepage once logged in.

**Server requirement**
PHP version 7.3.21 or newer is recommended.

It should work on 5.6.40 as well, but we strongly advise you NOT to run
such old versions of PHP, because of potential security and performance
issues, as well as missing features.

WAMPSERVER is recommended if you are using windows.
MAMP is recommended if you are using MAC.

## **Installation**

### Cloning the repository
*Clone repository*
1. Open your Git bash terminal in the desired folder where you run your php files.
```
git clone https://github.com/hh-kigcasan/the_wall_bug.git
```

*If you are using WAMP*
1. Extract the zipped folder inside C:\wamp64\www.
2. Set up a virtual host using wamp. If you don't know how, click the link for 
instruction and follow the Set up Virtual Host with WAMP.
[Virtual Host Setup](http://codedecode.co.in/blog/wordpress/set-up-virtual-host-with-wamp/)
3. Configure the config.php file in ..\application\config and add your virtual host name in `$config['base_url'] = 'http://your-virtual-host-name';`.
4. Check and see if your database credentials and the database name is correct in database.php file located in ..\application\config.
5. Read the instructions on Documentation to fix all bugs and make The Wall fully functional.

*If you are using MAMP*
1. Extract the zipped folder inside MAMP\htdocs.
2. Setup a virtual host because you need to host the index.php inside another folder in htdocs. Click the link and follow the steps to set up a virtual host using MAMP.
[Virtual Host Setup](https://dev.to/crankysparrow/configuring-virtual-hosts-with-mamp-f3i)
3. Follow steps 3 - 5 in *If you are using WAMP*.

### Setting up the database
Copy the SQL query bellow and run it to create the needed database for The Wall.

**Once you have the database created**
* *Make sure to fix the bug in the Registration form first to be able to create/register a new account.*
* *Use that registered account to fix all the other bugs in The Wall to make all the other features usable.*
```
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema thewallv2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema thewallv2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `thewallv2` DEFAULT CHARACTER SET utf8 ;
USE `thewallv2` ;

-- -----------------------------------------------------
-- Table `thewallv2`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thewallv2`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(255) NULL DEFAULT NULL,
  `last_name` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `thewallv2`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thewallv2`.`messages` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `message` TEXT NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_messages_users_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_messages_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `thewallv2`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `thewallv2`.`comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `thewallv2`.`comments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user_id` INT(11) NOT NULL,
  `message_id` INT(11) NOT NULL,
  `comment` TEXT NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `created_at_UNIQUE` (`updated_at` ASC) VISIBLE,
  INDEX `fk_comments_messages1_idx` (`message_id` ASC) VISIBLE,
  INDEX `fk_comments_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_comments_messages1`
    FOREIGN KEY (`message_id`)
    REFERENCES `thewallv2`.`messages` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comments_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `thewallv2`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

```
