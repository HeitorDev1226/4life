-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema 4life-bd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema 4life-bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `4life-bd` DEFAULT CHARACTER SET utf8 ;
USE `4life-bd` ;

-- -----------------------------------------------------
-- Table `4life-bd`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `4life-bd`.`usuarios` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(20) NOT NULL,
  `sobrenome` VARCHAR(30) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `rua` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `num_casa` INT NOT NULL,
  `cidade` VARCHAR(45) NOT NULL,
  `cep` INT NOT NULL,
  `cart_credit` INT(16) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `cart_credit_UNIQUE` (`cart_credit` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `4life-bd`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `4life-bd`.`categorias` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `nome_catg` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nome_catg_UNIQUE` (`nome_catg` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `4life-bd`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `4life-bd`.`produtos` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `foto_prod` BINARY(100) NOT NULL,
  `nome_prod` VARCHAR(45) NOT NULL,
  `preco_prod` DECIMAL(5,2) NOT NULL,
  `tamanho_prod` VARCHAR(5) NOT NULL,
  `info_prod` VARCHAR(200) NOT NULL,
  `fk_categorias_id` INT(4) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_produto_categorias1_idx` (`fk_categorias_id` ASC) ,
  CONSTRAINT `fk_produto_categorias1`
    FOREIGN KEY (`fk_categorias_id`)
    REFERENCES `4life-bd`.`categorias` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `4life-bd`.`administradores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `4life-bd`.`administradores` (
  `id` INT(4) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(90) NOT NULL,
  `senha` VARCHAR(30) NOT NULL,
  `email` VARCHAR(90) NOT NULL,
  `data_nasc` DATE NOT NULL,
  `cpf` VARCHAR(11) NOT NULL,
  `rg` TINYINT(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC) ,
  UNIQUE INDEX `rg_UNIQUE` (`rg` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `4life-bd`.`pedidos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `4life-bd`.`pedidos` (
  `pedidos_id` INT(4) NOT NULL AUTO_INCREMENT,
  `fk_usuarios_id` INT(4) NOT NULL,
  `fk_produtos_id` INT(4) NOT NULL,
  PRIMARY KEY (`pedidos_id`, `fk_usuarios_id`, `fk_produtos_id`),
  INDEX `fk_cliente_has_produto_produto1_idx` (`fk_produtos_id` ASC) ,
  INDEX `fk_cliente_has_produto_cliente_idx` (`fk_usuarios_id` ASC) ,
  CONSTRAINT `fk_cliente_has_produto_cliente`
    FOREIGN KEY (`fk_usuarios_id`)
    REFERENCES `4life-bd`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_produto_produto1`
    FOREIGN KEY (`fk_produtos_id`)
    REFERENCES `4life-bd`.`produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
