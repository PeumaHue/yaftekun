-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: yaftekun
-- ------------------------------------------------------
-- Server version	5.6.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id_equipo` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_liga` bigint(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_estadio` bigint(10) unsigned DEFAULT NULL,
  `id_usuario` bigint(10) unsigned NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `imagen` tinytext,
  PRIMARY KEY (`id_equipo`),
  KEY `fk_equipo_liga_idx` (`id_liga`),
  CONSTRAINT `fk_equipo_liga` FOREIGN KEY (`id_liga`) REFERENCES `liga` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4294967329 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (1,1,'LANUS',1,1,'2016-05-03 09:09:42',NULL),(4294967295,4294967295,'liga de campeones',3,3,'2016-03-01 00:00:00',NULL),(4294967299,1,'aldosivi',1,1,'2016-05-05 19:57:29','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967300,1,'aldosivi',1,1,'2016-05-05 20:02:10','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967301,1,'aldosivi',1,1,'2016-05-05 20:02:11','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967305,1,'aldosivi',1,1,'2016-05-05 20:02:33','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967306,1,'aldosivi',1,1,'2016-05-05 20:02:34','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967307,1,'aldosivi',1,1,'2016-05-06 13:19:35','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967309,1,'aldosivi',1,1,'2016-05-06 14:27:22','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967310,1,'aldosivi',1,1,'2016-05-06 15:01:09','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967312,1,'aldosivi',1,1,'2016-05-06 15:10:16','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967313,1,'aldosivi',1,1,'2016-05-06 15:16:27','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967314,1,'aldosivi',1,1,'2016-05-06 15:17:34','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967315,1,'aldosivi',1,1,'2016-05-06 15:18:57','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967316,1,'aldosivi',1,1,'2016-05-06 15:19:37','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4294967327,1,'aldosivi',1,1,'2016-05-06 15:22:19','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo_integrante`
--

DROP TABLE IF EXISTS `equipo_integrante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo_integrante` (
  `id_equipo` bigint(10) unsigned NOT NULL,
  `id_participante` bigint(20) unsigned NOT NULL,
  `id_tipo_participante` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id_equipo`,`id_participante`),
  KEY `fk_equipo_integrante_participante_idx` (`id_participante`),
  CONSTRAINT `fk_equipo_integrante_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_integrante_participante` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo_integrante`
--

LOCK TABLES `equipo_integrante` WRITE;
/*!40000 ALTER TABLE `equipo_integrante` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipo_integrante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadio`
--

DROP TABLE IF EXISTS `estadio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estadio` (
  `id_estadio` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `numero` int(10) unsigned DEFAULT NULL,
  `codpostal` varchar(8) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id_estadio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estadio`
--

LOCK TABLES `estadio` WRITE;
/*!40000 ALTER TABLE `estadio` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `liga`
--

DROP TABLE IF EXISTS `liga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `liga` (
  `id_liga` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `id_usuario` bigint(8) unsigned NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id_liga`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `liga`
--

LOCK TABLES `liga` WRITE;
/*!40000 ALTER TABLE `liga` DISABLE KEYS */;
INSERT INTO `liga` VALUES (1,'Primera A',1,'2016-05-05 19:18:53');
/*!40000 ALTER TABLE `liga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participante`
--

DROP TABLE IF EXISTS `participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participante` (
  `id_participante` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_participante` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `numero_camiseta` varchar(2) DEFAULT NULL,
  `id_tipo_posicion_juego` int(11) DEFAULT NULL,
  `id_tipo_estado_jugador` int(11) DEFAULT NULL,
  `numero_carnet_socio` int(11) DEFAULT NULL,
  `trayectoria` varchar(500) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `telefono_celular` varchar(11) DEFAULT NULL,
  `telefono_radio` varchar(15) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_nacimiento` datetime NOT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `piso` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `depto` varchar(4) DEFAULT NULL,
  `codpostal` varchar(8) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `id_estado_civil` int(11) DEFAULT NULL,
  `conyuge_nombre` varchar(50) DEFAULT NULL,
  `id_tipo_doc` int(11) NOT NULL,
  `nro_doc` varchar(8) NOT NULL,
  `cobertura_medica` varchar(50) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_participante`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante`
--

LOCK TABLES `participante` WRITE;
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ronda`
--

DROP TABLE IF EXISTS `ronda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ronda` (
  `id_ronda` bigint(10) unsigned NOT NULL,
  `id_torneo` bigint(10) unsigned NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `id_modalidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_ronda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ronda`
--

LOCK TABLES `ronda` WRITE;
/*!40000 ALTER TABLE `ronda` DISABLE KEYS */;
/*!40000 ALTER TABLE `ronda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suceso`
--

DROP TABLE IF EXISTS `suceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suceso` (
  `id_suceso` int(10) unsigned NOT NULL,
  `id_tipo_suceso` int(10) unsigned NOT NULL,
  `id_partido` int(11) NOT NULL,
  `id_participante` int(11) NOT NULL,
  `minuto` varchar(4) DEFAULT NULL,
  `momento` varchar(45) DEFAULT NULL,
  `ingreso_sustituto` int(11) DEFAULT NULL,
  `receptor_falta` int(11) DEFAULT NULL,
  `id_tipo_amonestacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_suceso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suceso`
--

LOCK TABLES `suceso` WRITE;
/*!40000 ALTER TABLE `suceso` DISABLE KEYS */;
/*!40000 ALTER TABLE `suceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_amonestacion`
--

DROP TABLE IF EXISTS `tipo_amonestacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_amonestacion` (
  `id_tipo_amonestacion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_amonestacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_amonestacion`
--

LOCK TABLES `tipo_amonestacion` WRITE;
/*!40000 ALTER TABLE `tipo_amonestacion` DISABLE KEYS */;
INSERT INTO `tipo_amonestacion` VALUES (1,'TARJETA AMARILLA'),(2,'TARJETA ROJA');
/*!40000 ALTER TABLE `tipo_amonestacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `descripcion_corta` varchar(2) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'DNI','DU'),(2,'LIBRETA CIVICA','LC'),(3,'LIBRETA ENROLAMIENTO','LE'),(4,'SIN INFORMAR','SI');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_estado_civil`
--

DROP TABLE IF EXISTS `tipo_estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_estado_civil` (
  `id_tipo_estado_civil` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`id_tipo_estado_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_estado_civil`
--

LOCK TABLES `tipo_estado_civil` WRITE;
/*!40000 ALTER TABLE `tipo_estado_civil` DISABLE KEYS */;
INSERT INTO `tipo_estado_civil` VALUES (1,'CASADO'),(2,'SOLTERO'),(3,'VIUDO'),(4,'DIVORCIADO'),(5,'SEPARADO DE HECHO');
/*!40000 ALTER TABLE `tipo_estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_estado_jugador`
--

DROP TABLE IF EXISTS `tipo_estado_jugador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_estado_jugador` (
  `id_tipo_estado_jugador` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_estado_jugador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_estado_jugador`
--

LOCK TABLES `tipo_estado_jugador` WRITE;
/*!40000 ALTER TABLE `tipo_estado_jugador` DISABLE KEYS */;
INSERT INTO `tipo_estado_jugador` VALUES (1,'ACTIVO'),(2,'SUSPENDIDO');
/*!40000 ALTER TABLE `tipo_estado_jugador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_modalidad`
--

DROP TABLE IF EXISTS `tipo_modalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_modalidad` (
  `id_tipo_modalidad` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `ida_vuelta` bit(1) DEFAULT NULL,
  `partido_ganado` tinyint(1) DEFAULT NULL,
  `partido_empatado` tinyint(1) DEFAULT NULL,
  `cantidad_partidos_por_turno` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_modalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_modalidad`
--

LOCK TABLES `tipo_modalidad` WRITE;
/*!40000 ALTER TABLE `tipo_modalidad` DISABLE KEYS */;
INSERT INTO `tipo_modalidad` VALUES (1,'TODOS CONTRA TODOS','',3,1,1),(2,'NOCKOUT','',3,1,1),(3,'GRUPOS Y PLAY OFF','',3,1,1);
/*!40000 ALTER TABLE `tipo_modalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_participante`
--

DROP TABLE IF EXISTS `tipo_participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_participante` (
  `id_tipo_participante` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_participante`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_participante`
--

LOCK TABLES `tipo_participante` WRITE;
/*!40000 ALTER TABLE `tipo_participante` DISABLE KEYS */;
INSERT INTO `tipo_participante` VALUES (1,'JUGADOR'),(2,'ARBITRO'),(3,'DIRECTOR TECNICO'),(4,'DELEGADO');
/*!40000 ALTER TABLE `tipo_participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_posicion_juego`
--

DROP TABLE IF EXISTS `tipo_posicion_juego`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_posicion_juego` (
  `id_tipo_posicion_juego` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_posicion_juego`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_posicion_juego`
--

LOCK TABLES `tipo_posicion_juego` WRITE;
/*!40000 ALTER TABLE `tipo_posicion_juego` DISABLE KEYS */;
INSERT INTO `tipo_posicion_juego` VALUES (1,'ARQUERO'),(2,'DEFENSOR'),(3,'VOLANTE'),(4,'DELANTERO');
/*!40000 ALTER TABLE `tipo_posicion_juego` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_provincia`
--

DROP TABLE IF EXISTS `tipo_provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_provincia` (
  `id_tipo_provincia` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `descripcion_corta` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo_provincia`)
) ENGINE=InnoDB AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_provincia`
--

LOCK TABLES `tipo_provincia` WRITE;
/*!40000 ALTER TABLE `tipo_provincia` DISABLE KEYS */;
INSERT INTO `tipo_provincia` VALUES (100,'CAPITAL FEDERAL','CFE'),(101,'BUENOS AIRES','BAI'),(102,'CATAMARCA','CAT'),(103,'CORDOBA','CBA'),(104,'CORRIENTES','COR'),(105,'ENTRE RIOS','ERI'),(106,'JUJUY','JUJ'),(107,'LA RIOJA','LRI'),(108,'MENDOZA','MEN'),(109,'SALTA','SAL'),(110,'SAN JUAN','SJU'),(111,'SAN LUIS','SLU'),(112,'SANTA FE','SFE'),(113,'SANTIAGO DEL ESTERO','SDE'),(114,'TUCUMAN','TUC'),(115,'CHACO','CHA'),(116,'CHUBUT','CHU'),(117,'FORMOSA','FOR'),(118,'LA PAMPA','LPA'),(119,'MISIONES','MIS'),(120,'NEUQUEN','NEU'),(121,'RIO NEGRO','RNE'),(122,'SANTA CRUZ','SCR'),(123,'TIERRA DEL FUEGO','TDF'),(124,'DESCONOCIDA','DES');
/*!40000 ALTER TABLE `tipo_provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_suceso`
--

DROP TABLE IF EXISTS `tipo_suceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_suceso` (
  `id_tipo_suceso` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `descricpion_corta` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_suceso`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_suceso`
--

LOCK TABLES `tipo_suceso` WRITE;
/*!40000 ALTER TABLE `tipo_suceso` DISABLE KEYS */;
INSERT INTO `tipo_suceso` VALUES (1,'GOL',NULL),(2,'PENAL',NULL),(3,'CAMBIO',NULL),(4,'AMONESTACION',NULL),(5,'FALTA',NULL);
/*!40000 ALTER TABLE `tipo_suceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `torneo`
--

DROP TABLE IF EXISTS `torneo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `torneo` (
  `id_torneo` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_liga` bigint(10) unsigned NOT NULL,
  `anio` smallint(4) unsigned NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad_equipos` int(10) unsigned NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`id_torneo`,`id_liga`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneo`
--

LOCK TABLES `torneo` WRITE;
/*!40000 ALTER TABLE `torneo` DISABLE KEYS */;
INSERT INTO `torneo` VALUES (19,2147483647,2016,'Torneo nacional sub 60',14,99,'2016-05-03 12:37:19'),(21,9999,2016,'Torneo nacional 2 sub 60',14,99,'2016-05-03 16:53:14'),(22,9999,2016,'Torneo Final',14,99,'2016-05-03 16:53:54'),(23,9999,2016,'Torneo de Verano',14,99,'2016-05-03 16:53:57');
/*!40000 ALTER TABLE `torneo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` bigint(10) unsigned NOT NULL,
  `kind` varchar(100) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `sub` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `given_name` varchar(100) DEFAULT NULL,
  `family_name` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_verified` varchar(100) DEFAULT NULL,
  `locale` varchar(100) DEFAULT NULL,
  `hd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'yaftekun'
--
/*!50003 DROP PROCEDURE IF EXISTS `equipo_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `equipo_alta`(
  id_liga_IN bigint unsigned,
  nombre_IN varchar(100),
  id_estadio_IN bigint unsigned,
  id_usuario_IN bigint unsigned,
  #fecha_creacion_IN datetime,
  imagen_IN text(100)
)
BEGIN
    INSERT INTO yaftekun.equipo 
    (id_liga,nombre,id_estadio,id_usuario,fecha_creacion,imagen) VALUES 
    (id_liga_IN, nombre_IN, id_estadio_IN, id_estadio_IN, now(), imagen_IN);
	SELECT LAST_INSERT_ID() as id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `equipo_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `equipo_baja`(
	IN id_equipo_IN BIGINT
)
BEGIN
    delete 
	from equipo
    where id_equipo = id_equipo_IN ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `equipo_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `equipo_consulta`(
	IN id_equipo_IN BIGINT,
    IN Id_liga_IN BIGINT
)
BEGIN
	Select id_equipo, id_liga, nombre, id_estadio, id_usuario, fecha_creacion, imagen
    from equipo
    where (id_liga = Id_liga_IN or Id_liga_IN IS NULL)
		AND ( id_equipo = id_equipo_IN or id_equipo_IN IS NULL ) ;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `equipo_editar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `equipo_editar`(
  IN id_equipo_IN bigint,
  IN id_liga_IN bigint(10),
  IN nombre_IN varchar(100),
  IN id_estadio_IN bigint,
  IN id_usuario_IN bigint,
  IN imagen_IN mediumblob
)
BEGIN
	UPDATE equipo 
    SET  
		id_liga 	 = id_liga_IN,
		nombre		 = nombre_IN,
		id_estadio	 = id_estadio_IN,
		id_usuario	 = id_usuario_IN,
		imagen		 = imagen_IN 
    WHERE id_equipo = id_equipo_IN;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `liga_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `liga_alta`(

	IN nombre_IN varchar(100), 
    IN id_usuario_IN bigint
    	
)
BEGIN

	insert into liga (nombre, id_usuario, fecha_creacion) values (nombre_IN, id_usuario_IN, now() );
	Select LAST_INSERT_ID();

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `liga_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `liga_baja`(
	IN id_liga_IN bigint
)
BEGIN
	delete l 
    from liga l 
    left join equipo e on e.id_liga=l.id_liga
    WHERE id_liga = id_liga_IN
    and e.id_liga is null;
    
    select row_count();
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `liga_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `liga_consulta`(
    IN id_liga_IN INT
)
BEGIN
	
    SELECT id_liga,nombre, id_usuario, fecha_creacion 
    FROM liga
    WHERE id_liga = id_liga_IN or id_liga_IN IS NULL;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `liga_editar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `liga_editar`(
	IN id_liga_IN bigint,
	IN nombre_IN varchar(100),
	IN id_usuario_IN bigint
)
BEGIN
	UPDATE liga 
    SET  
		nombre		 = nombre_IN,
		id_usuario	 = id_usuario_IN
    WHERE id_liga = id_liga_IN;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `participante_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `participante_alta`(
	#IN id_participante_IN bigint,
	IN id_tipo_participante_IN int,
	IN nombre_IN varchar(100),
	IN apellido_IN varchar(100),
	IN numero_camiseta_IN varchar(2),
	IN id_tipo_posicion_juego_IN int,
	IN id_tipo_estado_jugador_IN int,
	IN numero_carnet_socio_IN int,
	IN trayectoria_IN varchar(500),
	IN telefono_IN varchar(11),
	IN telefono_celular_IN varchar(11),
	IN telefono_radio_IN varchar(15),
	IN email_IN varchar(100),
	IN fecha_nacimiento_IN datetime,
	IN calle_IN varchar(100),
	IN piso_IN int,
	IN numero_IN int,
	IN depto_IN varchar(4),
	IN codpostal_IN varchar(8),
	IN id_provincia_IN int,
	IN localidad_IN varchar(100),
	IN nacionalidad_IN varchar(50),
	IN id_estado_civil_IN int,
	IN conyuge_nombre_IN varchar(50),
	IN id_tipo_doc_IN int,
	IN nro_doc_IN varchar(8),
	IN cobertura_medica_IN varchar(50),
	#IN fecha_creacion_IN datetime,
	IN id_usuario_IN int unsigned,
    IN id_equipo_IN bigint unsigned#,
    
    #IN id_tipointegranteequipo_IN int
)
BEGIN
	
	declare id_participante_V bigint;  
    
	DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
	BEGIN
		ROLLBACK;
		SELECT 'Error, no se pudo guardar los datos.' as error;
	END;
 
	    
	START TRANSACTION;

	#set id_tipointegranteequipo_IN = coalesce(id_tipointegranteequipo_IN, id_tipo_participante_IN);

	insert into participante 
	(id_tipo_participante   ,nombre   ,apellido   ,numero_camiseta   ,id_tipo_posicion_juego   ,id_tipo_estado_jugador   ,numero_carnet_socio   ,trayectoria   ,telefono   ,telefono_celular   ,telefono_radio   ,email   ,fecha_nacimiento   ,calle   ,piso   ,numero   ,depto   ,codpostal   ,id_provincia   ,localidad   ,nacionalidad   ,id_estado_civil   ,conyuge_nombre   ,id_tipo_doc   ,nro_doc   ,cobertura_medica   ,fecha_creacion ,id_usuario) VALUES
	(id_tipo_participante_IN,nombre_IN,apellido_IN,numero_camiseta_IN,id_tipo_posicion_juego_IN,id_tipo_estado_jugador_IN,numero_carnet_socio_IN,trayectoria_IN,telefono_IN,telefono_celular_IN,telefono_radio_IN,email_IN,fecha_nacimiento_IN,calle_IN,piso_IN,numero_IN,depto_IN,codpostal_IN,id_provincia_IN,localidad_IN,nacionalidad_IN,id_estado_civil_IN,conyuge_nombre_IN,id_tipo_doc_IN,nro_doc_IN,cobertura_medica_IN,now()          ,id_usuario_IN );
	
	
	            
    set id_participante_V = LAST_INSERT_ID();

	
	if id_equipo_IN is not null then
		
        INSERT INTO equipo_integrante 
			(id_equipo   ,id_participante, id_tipo_participante) VALUES
			(id_equipo_IN,id_participante_V, id_tipo_participante_IN);


	end if; 

	COMMIT;

	select id_participante_V as id;
	
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `participante_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `participante_baja`(
	IN id_participante_IN INT,
    IN quitar_de_equipos_IN boolean
)
BEGIN
	DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
	BEGIN
		ROLLBACK;
		SELECT 'Error, no se pudo guardar los datos.' as Error;
	END;
    
	if quitar_de_equipos_IN = true then
    	START TRANSACTION;
    
			delete 
			from equipo_integrante
			where id_participante = id_participante_IN;
			
			delete 
			from participante
			where id_participante = id_participante_IN ;

		COMMIT;

	else
    
		delete p
		from participante p
        left join equipo_integrante ei on p.id_participante=ei.id_participante
		where id_participante = id_participante_IN 
			and ei.id_participante is null;
            
    end if;

    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `participante_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `participante_consulta`(
	
    IN id_participante_IN BIGINT(10),
    IN id_equipo_IN BIGINT
    
)
BEGIN
	
    
    Select p.id_participante, p.id_tipo_participante, e.id_equipo, p.nombre, p.apellido,p.numero_camiseta,p.id_tipo_posicion_juego,p.id_tipo_estado_jugador,
			p.numero_carnet_socio,p.trayectoria,p.telefono,p.telefono_celular,
  		    p.telefono_radio,p.email,p.fecha_nacimiento,p.calle,p.piso,
            p.numero,p.depto,p.codpostal,p.id_provincia,p.localidad,p.nacionalidad,p.id_estado_civil,p.conyuge_nombre,p.id_tipo_doc,p.nro_doc,
		    p.cobertura_medica,p.fecha_creacion,p.id_usuario,
            e.nombre as 'nombre_equipo'
	
    from participante p 
    left join equipo_integrante ei on ei.id_participante = p.id_participante
    left join equipo e on e.id_equipo = ei.id_equipo	
    
    
    where (p.id_participante = id_participante_IN OR id_participante_IN is null )
		and (ei.id_equipo = id_equipo_IN OR id_equipo_IN is null);	
    
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `participante_editar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `participante_editar`(
	IN id_participante_IN bigint,
	IN id_tipo_participante_IN int,
	IN nombre_IN varchar(100),
	IN apellido_IN varchar(100),
	IN numero_camiseta_IN varchar(2),
	IN id_tipoposicion_juego_IN int,
	IN id_tipo_estado_jugador_IN int,
	IN numero_carnet_socio_IN int,
	IN trayectoria_IN varchar(500),
	IN telefono_IN varchar(11),
	IN telefono_celular_IN varchar(11),
	IN telefono_radio_IN varchar(15),
	IN email_IN varchar(100),
	IN fecha_nacimiento_IN datetime,
	IN calle_IN varchar(100),
	IN piso_IN int,
	IN numero_IN int,
	IN depto_IN varchar(4),
	IN codpostal_IN varchar(8),
	IN id_provincia_IN int,
	IN localidad_IN varchar(100),
	IN nacionalidad_IN varchar(50),
	IN id_estado_civil_IN int,
	IN conyuge_nombre_IN varchar(50),
	IN id_tipo_doc_IN int,
	IN nro_doc_IN varchar(8),
	IN cobertura_medica_IN varchar(50),
	#IN fecha_creacion_IN datetime,
	IN id_usuario_IN int unsigned,
    IN id_equipo_IN bigint unsigned,
    
    IN id_tipointegranteequipo_IN int
)
BEGIN

	DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
	BEGIN
		ROLLBACK;
		SELECT 'Error, no se pudo guardar los datos.' as Error;
	END;
   
	START TRANSACTION;

	UPDATE participante
    SET
		id_tipo_participante = id_tipo_participante_IN,
		nombre = nombre_IN ,
		apellido = apellido_IN ,
		numero_camiseta =  numero_camiseta_IN , 
		id_tipoposicion_juego = id_tipoposicion_juego_IN ,
		id_tipo_estado_jugador = id_tipo_estado_jugador_IN ,
		numero_carnet_socio = numero_carnet_socio_IN ,
		trayectoria = trayectoria_IN ,
		telefono = telefono_IN ,
		telefono_celular = telefono_celular_IN ,
		telefono_radio = telefono_radio_IN ,
		email = email_IN ,
		fecha_nacimiento = fecha_nacimiento_IN ,
		calle = calle_IN ,
		piso = piso_IN ,
		numero = numero_IN ,
		depto = depto_IN ,
		codpostal = codpostal_IN ,
		id_provincia = id_provincia_IN ,
		localidad = localidad_IN ,
		nacionalidad = nacionalidad_IN ,
		id_estado_civil = id_estado_civil_IN ,
		conyuge_nombre = conyuge_nombre_IN ,
		id_tipo_doc = id_tipo_doc_IN ,
		nro_doc = nro_doc_IN ,
		cobertura_medica = cobertura_medica_IN ,
		id_usuario = id_usuario_IN 
	where 
		id_participante = id_participante_IN;
        
	if id_equipo_IN is not null then
		if (select count(*) from equipo_integrante where id_participante = id_participante_IN) = 1 then
			update equipo_integrante set
				id_equipo = id_equipo_IN
			where id_participante = id_participante_IN; 
        end if;
    end if;
    
    COMMIT;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `resumen_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `resumen_consulta`()
BEGIN
	declare anio_v 			int;
    declare	total_torneo 	int;
    declare	total_equipo 	int;
    declare	total_jugador 	int;
    declare	total_dt 		int;
    declare	total_arbitros 	int;
    declare	total_delegados int;
    
	SET anio_v  = year(now());

	SET total_torneo 	= (Select count(*) from torneo where anio = anio_v);
    SET total_equipo 	= (Select count(*) from equipo);
    SET total_jugador 	= (Select count(*) from participante where id_tipo_participante = 1);#Jugadores
    SET total_dt 		= (Select count(*) from participante where id_tipo_participante = 3);#DTS
    SET total_arbitros 	= (Select count(*) from participante where id_tipo_participante = 2);#DTS
	SET total_delegados = (Select count(*) from participante where id_tipo_participante = 4);#DTS
    
    select total_torneo, total_equipo, total_jugador, total_dt, total_arbitros, total_delegados;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_amonestacion_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_amonestacion_consulta`()
BEGIN
	select id_tipo_amonestacion, descripcion
    from tipo_amonestacion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_documento_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_documento_consulta`()
BEGIN
	select id_tipo_documento, descripcion, descripcion_corta		
    from tipo_documento;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_estado_civil_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_estado_civil_consulta`()
BEGIN
	select id_tipo_estado_civil, descripcion
    from tipo_estado_civil;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_estado_jugador_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_estado_jugador_consulta`()
BEGIN
	select id_tipo_estado_jugador, descripcion
	from tipo_estado_jugador;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_participante_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_participante_consulta`()
BEGIN
	select id_tipo_participante_juego, descripcion
    from tipo_participante;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_provincia_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_provincia_consulta`()
BEGIN
	select id_tipo_provincia, descripcion, descripcion_corta 
    from tipo_provincia;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `torneo_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_alta`(

	IN id_liga_IN INT,
    IN anio_IN smallint(4),
	IN nombre_IN varchar(200),
    IN cantidad_equipos_IN varchar(200),
    IN id_usuario_IN int

)
BEGIN

	insert into torneo (id_liga, nombre, anio, cantidad_equipos, id_usuario,fecha_creacion) 
				values (id_liga_IN, nombre_IN, anio_IN , cantidad_equipos_IN, id_usuario_IN, now() );
	
    Select LAST_INSERT_ID() as id_torneo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `torneo_baja` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_baja`(

	IN id_torneo_IN bigint

)
BEGIN

    delete 
	from torneo
    where id_torneo = id_torneo_IN ;
    

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `torneo_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_consulta`(

	IN id_torneo_IN bigint , 
    IN anio_IN INT 

)
BEGIN

	
    IF anio_IN is null THEN 
		SET anio_IN  = year(now()) ;
	END IF;

	Select id_liga, id_torneo, anio, nombre, cantidad_equipos, id_usuario, fecha_creacion
    from torneo
    where (id_torneo = id_torneo_IN OR id_torneo_IN is null )
		  AND anio = anio_IN ;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `torneo_editar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_editar`(


	##IN id_liga_IN INT,
    IN id_torneo_IN INT,
    IN anio_IN smallint(4),
	IN nombre_IN varchar(200),
    IN cantidad_equipos_IN varchar(200),
    IN id_usuario_IN int

)
BEGIN


	UPDATE torneo 
    SET  
		anio = anio_IN,
		nombre = nombre_IN,
		cantidad_equipos = cantidad_equipos_IN,
        id_usuario = id_usuario_IN,
        fecha_creacion = now()
        
    WHERE id_torneo = id_torneo_IN;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-13 18:41:59
