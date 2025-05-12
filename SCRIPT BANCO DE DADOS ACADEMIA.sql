-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema academia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema academia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `academia` DEFAULT CHARACTER SET utf8 ;
USE `academia` ;

-- -----------------------------------------------------
-- Table `academia`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `academia`.`Usuario` (
  `idAcademia` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `perfil` INT NOT NULL,
  `sexo` INT NOT NULL,
  `aceiteTermos` TINYINT NOT NULL,
  `dataNascimento` DATE NOT NULL,
  PRIMARY KEY (`idAcademia`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
