-- MySQL Script generated by MySQL Workbench
-- Wed Nov 22 20:16:56 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema projetoXdataBase
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema projetoXdataBase
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `projetoXdataBase` DEFAULT CHARACTER SET utf8 ;
USE `projetoXdataBase` ;

-- -----------------------------------------------------
-- Table `projetoXdataBase`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoXdataBase`.`user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `name_user` VARCHAR(60) NOT NULL,
  `email_user` VARCHAR(45) NOT NULL,
  `password_user` VARCHAR(200) NOT NULL,
  `perfilImage_user` VARCHAR(100) NULL,
  `teacher_user` INT NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoXdataBase`.`class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoXdataBase`.`class` (
  `id_class` INT NOT NULL AUTO_INCREMENT,
  `name_class` VARCHAR(60) NOT NULL,
  `number_class` VARCHAR(20) NOT NULL,
  `teacher_user_id` INT NULL,
  PRIMARY KEY (`id_class`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoXdataBase`.`work`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoXdataBase`.`work` (
  `id_work` INT NOT NULL AUTO_INCREMENT,
  `description_work` VARCHAR(1000) NOT NULL,
  `dateCreation_work` VARCHAR(20) NOT NULL,
  `dateSend_work` VARCHAR(20) NULL,
  `image_work` VARCHAR(100) NULL,
  `class_id_class` INT NOT NULL,
  PRIMARY KEY (`id_work`),
  INDEX `fk_work_class1_idx` (`class_id_class` ASC),
  CONSTRAINT `fk_work_class1`
    FOREIGN KEY (`class_id_class`)
    REFERENCES `projetoXdataBase`.`class` (`id_class`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `projetoXdataBase`.`user_has_class`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projetoXdataBase`.`user_has_class` (
  `user_id_user` INT NOT NULL,
  `class_id_class` INT NOT NULL,
  PRIMARY KEY (`user_id_user`, `class_id_class`),
  INDEX `fk_user_has_class_class1_idx` (`class_id_class` ASC),
  INDEX `fk_user_has_class_user_idx` (`user_id_user` ASC),
  CONSTRAINT `fk_user_has_class_user`
    FOREIGN KEY (`user_id_user`)
    REFERENCES `projetoXdataBase`.`user` (`id_user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_has_class_class1`
    FOREIGN KEY (`class_id_class`)
    REFERENCES `projetoXdataBase`.`class` (`id_class`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
