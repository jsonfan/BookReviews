-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema redbeltprep
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema redbeltprep
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redbeltprep` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `redbeltprep` ;

-- -----------------------------------------------------
-- Table `redbeltprep`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redbeltprep`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(45) NULL COMMENT '',
  `alias` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redbeltprep`.`books`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redbeltprep`.`books` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `title` VARCHAR(45) NULL COMMENT '',
  `author` VARCHAR(45) NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_books_users_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_books_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `redbeltprep`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `redbeltprep`.`reviews`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redbeltprep`.`reviews` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `rating` INT NULL COMMENT '',
  `comment` VARCHAR(45) NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `book_id` INT NOT NULL COMMENT '',
  `user_id` INT NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `fk_reviews_books1_idx` (`book_id` ASC)  COMMENT '',
  INDEX `fk_reviews_users1_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_reviews_books1`
    FOREIGN KEY (`book_id`)
    REFERENCES `redbeltprep`.`books` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reviews_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `redbeltprep`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
