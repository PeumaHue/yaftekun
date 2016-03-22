-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema yaftekun
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema yaftekun
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `yaftekun` DEFAULT CHARACTER SET utf8 ;
USE `yaftekun` ;

-- -----------------------------------------------------
-- Table `yaftekun`.`grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`grupo` (
  `idgrupo` INT(10) UNSIGNED NOT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`idgrupo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`tipo_competencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`tipo_competencia` (
  `idtipo_competencia` INT(10) UNSIGNED NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idtipo_competencia`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`grupo_por_ronda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`grupo_por_ronda` (
  `id_grupo_por_ronda` BIGINT(20) UNSIGNED NOT NULL,
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL,
  `idronda` BIGINT(20) UNSIGNED NOT NULL,
  `idtipo_competencia` INT(10) UNSIGNED NOT NULL,
  `idgrupo` INT(10) UNSIGNED NOT NULL,
  `idayvuelta` BIT(1) NOT NULL,
  `grupoporrondacol` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo_por_ronda`),
  CONSTRAINT `fk_grupo_por_ronda_grupo`
    FOREIGN KEY (`idgrupo`)
    REFERENCES `yaftekun`.`grupo` (`idgrupo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_por_ronda_tipo_competencia`
    FOREIGN KEY (`idtipo_competencia`)
    REFERENCES `yaftekun`.`tipo_competencia` (`idtipo_competencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_grupo_por_ronda_grupo_idx` ON `yaftekun`.`grupo_por_ronda` (`idgrupo` ASC);

CREATE INDEX `fk_grupo_por_ronda_tipo_competencia_idx` ON `yaftekun`.`grupo_por_ronda` (`idtipo_competencia` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`asignacion_en_grupo_por_ronda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`asignacion_en_grupo_por_ronda` (
  `idasignacion_en_grupo_por_ronda` BIGINT(20) UNSIGNED NOT NULL,
  `id_grupo_por_ronda` BIGINT(20) UNSIGNED NOT NULL,
  `puesto_equipo_a` INT(10) UNSIGNED NOT NULL,
  `puesto_equipo_b` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idasignacion_en_grupo_por_ronda`),
  CONSTRAINT `fk_asignacion_en_grupo_por_ronda_grupo_por_ronda`
    FOREIGN KEY (`id_grupo_por_ronda`)
    REFERENCES `yaftekun`.`grupo_por_ronda` (`id_grupo_por_ronda`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_asignacion_en_grupo_por_ronda_grupo_por_ronda_idx` ON `yaftekun`.`asignacion_en_grupo_por_ronda` (`id_grupo_por_ronda` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`equipo` (
  `idequipo` BIGINT(20) UNSIGNED NOT NULL,
  `nombre` VARCHAR(150) NOT NULL,
  `imagen` MEDIUMBLOB NULL DEFAULT NULL,
  PRIMARY KEY (`idequipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`sede` (
  `idsede` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`idsede`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`fixture`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`fixture` (
  `idencuentro` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL,
  `idronda` INT(10) UNSIGNED NOT NULL,
  `idsede` INT(11) UNSIGNED NOT NULL,
  `idgrupo` INT(10) UNSIGNED NOT NULL,
  `idequipoa` BIGINT(20) UNSIGNED NOT NULL,
  `idequipob` BIGINT(20) UNSIGNED NOT NULL,
  `fechaevento` DATETIME NULL DEFAULT NULL,
  `tantosa` INT(11) NULL DEFAULT NULL,
  `tantosb` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`idencuentro`),
  CONSTRAINT `fk_fixture_equipoa`
    FOREIGN KEY (`idequipoa`)
    REFERENCES `yaftekun`.`equipo` (`idequipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fixture_equipob`
    FOREIGN KEY (`idequipob`)
    REFERENCES `yaftekun`.`equipo` (`idequipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_fixture_sede`
    FOREIGN KEY (`idsede`)
    REFERENCES `yaftekun`.`sede` (`idsede`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE UNIQUE INDEX `idencuentro_UNIQUE` ON `yaftekun`.`fixture` (`idencuentro` ASC);

CREATE INDEX `idequipoa` ON `yaftekun`.`fixture` (`idequipoa` ASC);

CREATE INDEX `idequipob` ON `yaftekun`.`fixture` (`idequipob` ASC);

CREATE INDEX `idtorneo` ON `yaftekun`.`fixture` (`idtorneo` ASC);

CREATE INDEX `fk_fixture_sede_idx` ON `yaftekun`.`fixture` (`idsede` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`participante` (
  `idparticipante` BIGINT(20) UNSIGNED NOT NULL,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idparticipante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `yaftekun`.`tipo_participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`tipo_participante` (
  `idtipodeparticipante` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  `descripcion` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`idtipodeparticipante`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`encuentro_participante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`encuentro_participante` (
  `idparticipante` BIGINT(20) UNSIGNED NOT NULL,
  `idencuentro` BIGINT(20) UNSIGNED NOT NULL,
  `idtipodeparticipante` INT(11) UNSIGNED NOT NULL,
  `nombre` VARCHAR(120) NOT NULL,
  `idequipo` BIGINT(20) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`idparticipante`, `idencuentro`),
  CONSTRAINT `fk_encuentro_participante_fixture`
    FOREIGN KEY (`idencuentro`)
    REFERENCES `yaftekun`.`fixture` (`idencuentro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encuentro_participante_participante`
    FOREIGN KEY (`idparticipante`)
    REFERENCES `yaftekun`.`participante` (`idparticipante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encuentro_participante_tipo_tarticipante`
    FOREIGN KEY (`idtipodeparticipante`)
    REFERENCES `yaftekun`.`tipo_participante` (`idtipodeparticipante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `idequipo` ON `yaftekun`.`encuentro_participante` (`idequipo` ASC);

CREATE INDEX `idparticipante` ON `yaftekun`.`encuentro_participante` (`idparticipante` ASC);

CREATE INDEX `fk_encuentro_participante_fixture_idx` ON `yaftekun`.`encuentro_participante` (`idencuentro` ASC);

CREATE INDEX `fk_encuentro_participante_tipo_tarticipante_idx` ON `yaftekun`.`encuentro_participante` (`idtipodeparticipante` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`tipo_evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`tipo_evento` (
  `idtipo_evento` INT(11) UNSIGNED NOT NULL,
  `nombre` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`idtipo_evento`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`evento_por_encuentro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`evento_por_encuentro` (
  `idevento_por_encuentro` BIGINT(20) UNSIGNED NOT NULL,
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL,
  `idtipo_evento` INT(11) UNSIGNED NOT NULL,
  `idparticipante_a` BIGINT(20) UNSIGNED NOT NULL,
  `idparticipante_b` BIGINT(20) UNSIGNED NOT NULL,
  `idencuentro` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`idevento_por_encuentro`),
  CONSTRAINT `fk_eventos_por_encuentro_fixture`
    FOREIGN KEY (`idencuentro`)
    REFERENCES `yaftekun`.`fixture` (`idencuentro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_eventos_por_encuentro_tipo_evento`
    FOREIGN KEY (`idtipo_evento`)
    REFERENCES `yaftekun`.`tipo_evento` (`idtipo_evento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `fk_eventos_por_encuentro_fixture_idx` ON `yaftekun`.`evento_por_encuentro` (`idencuentro` ASC);

CREATE INDEX `fk_eventos_por_encuentro_tipo_evento_idx` ON `yaftekun`.`evento_por_encuentro` (`idtipo_evento` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`sancion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`sancion` (
  `idevento_por_encuentro` BIGINT(20) UNSIGNED NOT NULL,
  `cantidad_fecha_aplicada` INT(10) UNSIGNED NULL DEFAULT NULL,
  `cantidad_fecha_cumplida` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`idevento_por_encuentro`),
  CONSTRAINT `fk_sancione_evento_por_encuentro`
    FOREIGN KEY (`idevento_por_encuentro`)
    REFERENCES `yaftekun`.`evento_por_encuentro` (`idevento_por_encuentro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`tabla_posiciones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`tabla_posiciones` (
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL,
  `idequipo` BIGINT(20) UNSIGNED NOT NULL,
  `posicion` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`idtorneo`, `idequipo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`tipodetorneo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`tipodetorneo` (
  `idtipodetorneo` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `descripcion` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`idtipodetorneo`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `yaftekun`.`torneo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`torneo` (
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `idtipodetorneo` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idtorneo`),
  CONSTRAINT `fk_torneo_tipodetorneo`
    FOREIGN KEY (`idtipodetorneo`)
    REFERENCES `yaftekun`.`tipodetorneo` (`idtipodetorneo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE INDEX `idtipodetorneo` ON `yaftekun`.`torneo` (`idtipodetorneo` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`equipo_integrantes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`equipo_integrantes` (
  `idequipo` BIGINT(20) UNSIGNED NOT NULL,
  `idparticipante` BIGINT(20) UNSIGNED NOT NULL,
  `idtipoparticipante` INT(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`idequipo`, `idparticipante`),
  CONSTRAINT `fk_equipo_integrantes_equipo`
    FOREIGN KEY (`idequipo`)
    REFERENCES `yaftekun`.`equipo` (`idequipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_integrantes_participante`
    FOREIGN KEY (`idparticipante`)
    REFERENCES `yaftekun`.`participante` (`idparticipante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_integrantes_tipo_participante`
    FOREIGN KEY (`idtipoparticipante`)
    REFERENCES `yaftekun`.`tipo_participante` (`idtipodeparticipante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_equipo_integrantes_participante_idx` ON `yaftekun`.`equipo_integrantes` (`idparticipante` ASC);

CREATE INDEX `fk_equipo_integrantes_tipo_participante_idx` ON `yaftekun`.`equipo_integrantes` (`idtipoparticipante` ASC);


-- -----------------------------------------------------
-- Table `yaftekun`.`equipo_por_torneo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`equipo_por_torneo` (
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL,
  `idequipo` BIGINT(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`idtorneo`, `idequipo`),
  CONSTRAINT `fk_equipo_por_torneo_torneo`
    FOREIGN KEY (`idtorneo`)
    REFERENCES `yaftekun`.`torneo` (`idtorneo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_por_torneo_equipo`
    FOREIGN KEY (`idequipo`)
    REFERENCES `yaftekun`.`equipo` (`idequipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_equipo_por_torneo_equipo_idx` ON `yaftekun`.`equipo_por_torneo` (`idequipo` ASC);

-- -----------------------------------------------------
-- Table `yaftekun`.`ronda`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `yaftekun`.`ronda` (
  `idronda` BIGINT(20) UNSIGNED NOT NULL,
  `idtorneo` BIGINT(20) UNSIGNED NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `cant_grupos` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`idronda`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
