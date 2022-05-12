-- MySQL Script generated by MySQL Workbench
-- Wed May 11 21:17:00 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema piPet
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema piPet
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `piPet` DEFAULT CHARACTER SET utf8 ;
USE `piPet` ;

-- -----------------------------------------------------
-- Table `piPet`.`entidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`entidade` (
  `id_entidade` INT NOT NULL AUTO_INCREMENT,
  `tipo_entidade` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `sobrenome` VARCHAR(100) NULL,
  `cep` VARCHAR(8) NOT NULL,
  `logradouro` VARCHAR(200) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `cidade` VARCHAR(50) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`id_entidade`),
  UNIQUE INDEX `id_entidade_UNIQUE` (`id_entidade` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `piPet`.`organizacao_pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`organizacao_pessoa` (
  `id_organizacao_pessoa` INT NOT NULL AUTO_INCREMENT,
  `id_organizacao` INT NOT NULL,
  `id_pessoa` INT NOT NULL,
  INDEX `fk_orgpes_organizacao_idx` (`id_organizacao` ASC) VISIBLE,
  INDEX `fk_orgpes_pessoa_idx` (`id_pessoa` ASC) VISIBLE,
  PRIMARY KEY (`id_organizacao_pessoa`),
  UNIQUE INDEX `id_organizacao_pessoa_UNIQUE` (`id_organizacao_pessoa` ASC) VISIBLE,
  CONSTRAINT `fk_orgpes_organizacao`
    FOREIGN KEY (`id_organizacao`)
    REFERENCES `piPet`.`entidade` (`id_entidade`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_orgpes_pessoa`
    FOREIGN KEY (`id_pessoa`)
    REFERENCES `piPet`.`entidade` (`id_entidade`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `piPet`.`tipo_pet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`tipo_pet` (
  `id_tipo_pet` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(50) NOT NULL,
  UNIQUE INDEX `descricao_UNIQUE` (`descricao` ASC) VISIBLE,
  PRIMARY KEY (`id_tipo_pet`),
  UNIQUE INDEX `id_tipo_pet_UNIQUE` (`id_tipo_pet` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `piPet`.`publicacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`publicacao` (
  `id_publicacao` INT NOT NULL AUTO_INCREMENT,
  `tipo_publicacao` INT NOT NULL COMMENT '0 = PERDIDO, 1 = ACHADO, 2 = DOACAO',
  `id_entidade` INT NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_pet` INT NOT NULL,
  `raca` VARCHAR(45) NOT NULL,
  `porte` VARCHAR(45) NOT NULL,
  `cor` VARCHAR(45) NOT NULL,
  `idade` VARCHAR(45) NOT NULL,
  `descricao` BLOB(500) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `logradouro` VARCHAR(200) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `bairro` VARCHAR(50) NOT NULL,
  `cidade` VARCHAR(50) NOT NULL,
  `uf` VARCHAR(2) NOT NULL,
  `situacao` INT NOT NULL COMMENT '0 = ABERTO, 1 = ENCERRADO',
  `data_atualizacao` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_publ_entidade_idx` (`id_entidade` ASC) VISIBLE,
  INDEX `fk_pub_tipo_pet_idx` (`tipo_pet` ASC) VISIBLE,
  PRIMARY KEY (`id_publicacao`),
  UNIQUE INDEX `id_publicacao_UNIQUE` (`id_publicacao` ASC) VISIBLE,
  CONSTRAINT `fk_publ_entidade`
    FOREIGN KEY (`id_entidade`)
    REFERENCES `piPet`.`entidade` (`id_entidade`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_pub_tipo_pet`
    FOREIGN KEY (`tipo_pet`)
    REFERENCES `piPet`.`tipo_pet` (`id_tipo_pet`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `piPet`.`publicacao_comentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`publicacao_comentario` (
  `id_comentario` INT NOT NULL AUTO_INCREMENT,
  `id_publicacao` INT NOT NULL,
  `id_entidade` INT NOT NULL,
  `comentario` BLOB(250) NOT NULL,
  `data_criacao` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  INDEX `fk_pub_com_publicacao_idx` (`id_publicacao` ASC) VISIBLE,
  INDEX `fk_pub_com_entidade_idx` (`id_entidade` ASC) VISIBLE,
  PRIMARY KEY (`id_comentario`),
  UNIQUE INDEX `id_comentario_UNIQUE` (`id_comentario` ASC) VISIBLE,
  CONSTRAINT `fk_pub_com_publicacao`
    FOREIGN KEY (`id_publicacao`)
    REFERENCES `piPet`.`publicacao` (`id_publicacao`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_pub_com_entidade`
    FOREIGN KEY (`id_entidade`)
    REFERENCES `piPet`.`entidade` (`id_entidade`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `piPet`.`entidade_login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`entidade_login` (
  `id_login` INT NOT NULL AUTO_INCREMENT,
  `id_entidade` INT NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE INDEX `id_login_UNIQUE` (`id_login` ASC) VISIBLE,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE,
  INDEX `fk_login_entidade_idx` (`id_entidade` ASC) VISIBLE,
  CONSTRAINT `fk_login_entidade`
    FOREIGN KEY (`id_entidade`)
    REFERENCES `piPet`.`entidade` (`id_entidade`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `piPet`.`entidade_contato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `piPet`.`entidade_contato` (
  `id_contato` INT NOT NULL AUTO_INCREMENT,
  `id_entidade` INT NOT NULL,
  `tipo_contato` INT NOT NULL,
  `contato` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_contato`),
  UNIQUE INDEX `id_contato_UNIQUE` (`id_contato` ASC) VISIBLE,
  INDEX `fk_entidade_contato_idx` (`id_entidade` ASC) VISIBLE,
  CONSTRAINT `fk_entidade_contato`
    FOREIGN KEY (`id_entidade`)
    REFERENCES `piPet`.`entidade` (`id_entidade`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB;

USE `piPet`;

DELIMITER $$
USE `piPet`$$
CREATE DEFINER = CURRENT_USER TRIGGER `piPet`.`publicacao_comentario_AFTER_INSERT` AFTER INSERT ON `publicacao_comentario` FOR EACH ROW
BEGIN
UPDATE `piPet`.`publicacao` 
SET 
    data_atualizacao = CURRENT_TIMESTAMP()
WHERE
    id_publicacao = NEW.id_publicacao;
END$$


DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
