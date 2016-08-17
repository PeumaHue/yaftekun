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
-- Table structure for table `asignacion_en_grupo_por_ronda`
--

DROP TABLE IF EXISTS `asignacion_en_grupo_por_ronda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asignacion_en_grupo_por_ronda` (
  `id_asignacion_en_grupo_por_ronda` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_grupo_por_ronda` bigint(20) unsigned NOT NULL,
  `puesto_equipo_a` int(10) unsigned NOT NULL,
  `id_grupo_por_ronda_equipo_a` bigint(20) unsigned NOT NULL,
  `puesto_equipo_b` int(10) unsigned NOT NULL,
  `id_grupo_por_ronda_equipo_b` bigint(20) unsigned NOT NULL,
  `referencia_es_equipo` bit(1) NOT NULL DEFAULT b'1',
  `asignar_por_sorteo` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id_asignacion_en_grupo_por_ronda`),
  KEY `fk_asignacion_en_grupo_por_ronda_grupo_por_ronda_idx` (`id_grupo_por_ronda`),
  CONSTRAINT `fk_asignacion_en_grupo_por_ronda_grupo_por_ronda` FOREIGN KEY (`id_grupo_por_ronda`) REFERENCES `grupo_por_ronda` (`id_grupo_por_ronda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asignacion_en_grupo_por_ronda`
--

LOCK TABLES `asignacion_en_grupo_por_ronda` WRITE;
/*!40000 ALTER TABLE `asignacion_en_grupo_por_ronda` DISABLE KEYS */;
INSERT INTO `asignacion_en_grupo_por_ronda` VALUES (1,2,1,0,10,0,'\0','\0'),(2,17,1,0,10,0,'\0','\0'),(3,18,1,0,10,0,'\0','\0'),(4,19,1,0,10,0,'\0','\0'),(5,20,1,0,12,0,'\0','\0'),(6,21,1,0,10,0,'\0','\0'),(7,22,1,0,11,0,'\0','\0'),(10,25,1,0,11,0,'\0','\0');
/*!40000 ALTER TABLE `asignacion_en_grupo_por_ronda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuentro_participante`
--

DROP TABLE IF EXISTS `encuentro_participante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuentro_participante` (
  `id_participante` bigint(10) unsigned NOT NULL,
  `id_encuentro` bigint(10) unsigned NOT NULL,
  `id_tipo_participante` int(10) unsigned NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `id_equipo` bigint(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_participante`,`id_encuentro`),
  KEY `idequipo` (`id_equipo`),
  KEY `idparticipante` (`id_participante`),
  KEY `fk_encuentro_participante_fixture_idx` (`id_encuentro`),
  KEY `fk_encuentro_participante_tipo_tarticipante_idx` (`id_tipo_participante`),
  CONSTRAINT `fk_encuentro_participante_fixture` FOREIGN KEY (`id_encuentro`) REFERENCES `fixture` (`id_encuentro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_encuentro_participante_participante` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_encuentro_participante_tipo_tarticipante` FOREIGN KEY (`id_tipo_participante`) REFERENCES `tipo_participante` (`id_tipo_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuentro_participante`
--

LOCK TABLES `encuentro_participante` WRITE;
/*!40000 ALTER TABLE `encuentro_participante` DISABLE KEYS */;
/*!40000 ALTER TABLE `encuentro_participante` ENABLE KEYS */;
UNLOCK TABLES;

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
  UNIQUE KEY `ixu_EquipoNombre` (`nombre`),
  KEY `fk_equipo_liga_idx` (`id_liga`),
  CONSTRAINT `fk_equipo_liga` FOREIGN KEY (`id_liga`) REFERENCES `liga` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4294967385 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (0,1,'LIBERADO',1,1,'2016-08-01 00:00:00',NULL),(1,1,'LANUS',1,1,'2016-05-03 09:09:42',NULL),(2,4294967295,'EDITADO',1,1,'2016-03-01 00:00:00','ninguna.png'),(3,1,'aldosivi',1,1,'2016-05-05 19:57:29','C:\\Bitnami\\wampstack-5.6.19-0\\apps\\yaftekun\\db\\imagenes\\aldosivi.png'),(4,1,'boca',1,1,'2016-05-23 15:27:53','boca_juniors.png'),(5,1,'fdsfd',1,1,'2016-05-23 15:47:39','defensa_y_justicia.png'),(6,1,'fdddd',1,1,'2016-05-23 15:47:55','arsenal.png'),(7,1,'peperoncino',1,1,'2016-05-23 17:41:04','banfield.png'),(8,1,'otro',1,1,'2016-05-24 18:16:41','atletico_tucuman.png'),(9,1,'mas',1,1,'2016-05-24 18:17:03','colon.png'),(10,1,'uuuuu',1,1,'2016-05-28 14:03:47',NULL),(4294967343,1,'ppppp',1,1,'2016-05-28 14:14:23',''),(4294967344,1,'iiiiii',1,1,'2016-05-28 14:31:32',NULL),(4294967345,1,'llllllll',1,1,'2016-05-28 14:41:54',NULL),(4294967346,1,'ultimo',2,2,'2016-05-30 00:20:12',NULL),(4294967347,1,'xxxxx',1,1,'2016-06-01 18:15:22',NULL),(4294967349,1,'qqqq',1,1,'2016-06-01 18:17:22',NULL),(4294967350,1,'vvvvvv',1,1,'2016-06-01 18:18:05',NULL),(4294967351,1,'wwwwww',1,1,'2016-06-01 18:18:32',NULL),(4294967352,1,'wq',1,1,'2016-06-01 18:19:12',NULL),(4294967353,1,'45',1,1,'2016-06-01 18:24:41',NULL),(4294967354,1,'123',1,1,'2016-06-01 18:30:15',NULL),(4294967355,1,'789',1,1,'2016-06-01 18:39:16',''),(4294967358,1,'xxxxxxxxxxxxxxxxxxx',1,1,'2016-06-02 20:17:45','belgrano.png'),(4294967359,1,'Prueba 1p',3,1,'2016-06-03 17:50:30','belgrano1.png'),(4294967360,1,'kkkk 1',2,2,'2016-06-03 20:25:43',''),(4294967361,1,'kkkk 2',1,1,'2016-06-03 20:26:06','boca_juniors.png'),(4294967362,1,'wwww 45',1,1,'2016-06-03 20:26:26','atletico_rafaela.png'),(4294967368,1,'ppppqw',3,1,'2016-06-10 16:37:26',''),(4294967373,1,'ioio',1,1,'2016-06-10 17:38:39','a1.gif'),(4294967377,1,'otromas',1,1,'2016-06-22 16:12:46','huracan.png'),(4294967378,1,'perinolonchelodmon',2,1,'2016-06-29 17:44:49','atletico_tucuman5.png'),(4294967379,1,'con imagen',2,1,'2016-06-29 17:46:29','aldosivi3.png'),(4294967381,1,'DEFE',1,1,'2016-06-29 19:17:26','atletico_tucuman6.png'),(4294967382,1,'chota',1,1,'2016-07-01 15:06:15',''),(4294967383,1,'Xeneize',1,1,'2016-07-05 12:24:52','belgrano4.png'),(4294967384,1,'Marian',1,1,'2016-07-06 11:12:41','');
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
  `id_participante` bigint(10) unsigned NOT NULL,
  `id_tipo_participante` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_equipo`,`id_participante`),
  KEY `fk_equipo_integrante_participante_idx` (`id_participante`),
  CONSTRAINT `fk_equipo_integrante_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_equipo_integrante_participante` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo_integrante`
--

LOCK TABLES `equipo_integrante` WRITE;
/*!40000 ALTER TABLE `equipo_integrante` DISABLE KEYS */;
INSERT INTO `equipo_integrante` VALUES (1,62,1),(1,63,1);
/*!40000 ALTER TABLE `equipo_integrante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo_por_torneo`
--

DROP TABLE IF EXISTS `equipo_por_torneo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo_por_torneo` (
  `id_torneo` bigint(19) unsigned NOT NULL,
  `id_equipo` bigint(19) unsigned DEFAULT NULL,
  `numero_equipo_asignado_torneo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_torneo`,`numero_equipo_asignado_torneo`),
  KEY `fk_equipo_por_torneo_equipo_idx` (`id_equipo`),
  CONSTRAINT `fk_equipo_por_torneo_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_equipo_por_torneo_torneo` FOREIGN KEY (`id_torneo`) REFERENCES `torneo` (`id_torneo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo_por_torneo`
--

LOCK TABLES `equipo_por_torneo` WRITE;
/*!40000 ALTER TABLE `equipo_por_torneo` DISABLE KEYS */;
INSERT INTO `equipo_por_torneo` VALUES (72,NULL,1),(72,NULL,2),(72,NULL,3),(72,NULL,4),(72,NULL,5),(72,NULL,6),(72,NULL,7),(72,NULL,8),(72,NULL,9),(72,NULL,10),(73,NULL,1),(73,NULL,2),(73,NULL,3),(73,NULL,4),(73,NULL,5),(73,NULL,6),(73,NULL,7),(73,NULL,8),(73,NULL,9),(73,NULL,10),(74,NULL,1),(74,NULL,2),(74,NULL,3),(74,NULL,4),(74,NULL,5),(74,NULL,6),(74,NULL,7),(74,NULL,8),(74,NULL,9),(74,NULL,10),(75,NULL,1),(75,NULL,2),(75,NULL,3),(75,NULL,4),(75,NULL,5),(75,NULL,6),(75,NULL,7),(75,NULL,8),(75,NULL,9),(75,NULL,10),(77,NULL,1),(77,NULL,2),(77,NULL,3),(77,NULL,4),(77,NULL,5),(77,NULL,6),(77,NULL,7),(77,NULL,8),(77,NULL,9),(77,NULL,10),(79,NULL,1),(79,NULL,2),(79,NULL,3),(79,NULL,4),(79,NULL,5),(79,NULL,6),(79,NULL,7),(79,NULL,8),(79,NULL,9),(79,NULL,10),(79,NULL,11),(82,NULL,1),(82,NULL,2),(82,NULL,3),(82,NULL,4),(82,NULL,5),(82,NULL,6),(82,NULL,7),(82,NULL,8),(82,NULL,9),(82,NULL,10),(82,NULL,11),(82,0,12);
/*!40000 ALTER TABLE `equipo_por_torneo` ENABLE KEYS */;
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
INSERT INTO `estadio` VALUES (1,'INDETERMINADO','',NULL,NULL,NULL,NULL,NULL,1,'2016-01-01 00:00:00'),(2,'INDETERMINADO2','',NULL,NULL,NULL,NULL,NULL,1,'2016-01-01 00:00:00'),(3,'INDETERMINADO3','',NULL,NULL,NULL,NULL,NULL,1,'2016-01-01 00:00:00');
/*!40000 ALTER TABLE `estadio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixture`
--

DROP TABLE IF EXISTS `fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixture` (
  `id_encuentro` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_torneo` bigint(20) unsigned NOT NULL,
  `id_ronda` int(10) unsigned NOT NULL,
  `id_sede` int(11) unsigned NOT NULL,
  `id_grupo` int(10) unsigned NOT NULL,
  `id_equipoa` bigint(20) unsigned DEFAULT NULL,
  `id_equipob` bigint(20) unsigned DEFAULT NULL,
  `fecha_evento` datetime DEFAULT NULL,
  `tantosa` int(11) DEFAULT NULL,
  `tantosb` int(11) DEFAULT NULL,
  `ganador_por_sorteo` bit(1) NOT NULL DEFAULT b'0',
  `son_posiciones` bit(1) NOT NULL DEFAULT b'0',
  `nro_fecha` int(10) unsigned DEFAULT NULL,
  `id_encuentro_fecha` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_encuentro`),
  UNIQUE KEY `idencuentro_UNIQUE` (`id_encuentro`),
  KEY `idequipoa` (`id_equipoa`),
  KEY `idequipob` (`id_equipob`),
  KEY `idtorneo` (`id_torneo`),
  KEY `fk_fixture_sede_idx` (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=1857 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixture`
--

LOCK TABLES `fixture` WRITE;
/*!40000 ALTER TABLE `fixture` DISABLE KEYS */;
INSERT INTO `fixture` VALUES (1,1,1,0,1,1,2,'2016-07-07 00:00:00',NULL,NULL,'\0','\0',1,NULL),(2,1,1,0,1,1,3,'2016-07-02 00:00:00',NULL,NULL,'\0','\0',2,NULL),(3,1,1,0,1,2,3,'2016-07-03 00:00:00',NULL,NULL,'\0','\0',3,NULL),(4,1,1,0,1,1,4,'2016-07-04 00:00:00',NULL,NULL,'\0','\0',3,NULL),(5,1,1,0,1,2,4,'2016-07-05 00:00:00',NULL,NULL,'\0','\0',4,NULL),(6,1,1,0,1,3,4,'2016-07-15 00:00:00',NULL,NULL,'\0','\0',5,NULL),(7,1,1,0,1,1,5,'2016-07-06 00:00:00',NULL,NULL,'\0','\0',4,NULL),(8,1,1,0,1,2,5,'2016-07-08 00:00:00',NULL,NULL,'\0','\0',5,NULL),(9,1,1,0,1,3,5,'2016-07-09 00:00:00',NULL,NULL,'\0','\0',6,NULL),(10,1,1,0,1,4,5,NULL,NULL,NULL,'\0','\0',7,NULL),(11,1,1,0,1,1,6,NULL,NULL,NULL,'\0','\0',5,NULL),(12,1,1,0,1,2,6,NULL,NULL,NULL,'\0','\0',6,NULL),(13,1,1,0,1,3,6,NULL,NULL,NULL,'\0','\0',7,NULL),(14,1,1,0,1,4,6,NULL,NULL,NULL,'\0','\0',8,NULL),(15,1,1,0,1,5,6,NULL,NULL,NULL,'\0','\0',9,NULL),(16,1,1,0,1,1,7,NULL,NULL,NULL,'\0','\0',6,NULL),(17,1,1,0,1,2,7,NULL,NULL,NULL,'\0','\0',7,NULL),(18,1,1,0,1,3,7,NULL,NULL,NULL,'\0','\0',8,NULL),(19,1,1,0,1,4,7,NULL,NULL,NULL,'\0','\0',9,NULL),(20,1,1,0,1,5,7,NULL,NULL,NULL,'\0','\0',10,NULL),(21,1,1,0,1,6,7,NULL,NULL,NULL,'\0','\0',11,NULL),(22,1,1,0,1,1,8,NULL,NULL,NULL,'\0','\0',7,NULL),(23,1,1,0,1,2,8,NULL,NULL,NULL,'\0','\0',8,NULL),(24,1,1,0,1,3,8,NULL,NULL,NULL,'\0','\0',9,NULL),(25,1,1,0,1,4,8,NULL,NULL,NULL,'\0','\0',10,NULL),(26,1,1,0,1,5,8,NULL,NULL,NULL,'\0','\0',11,NULL),(27,1,1,0,1,6,8,NULL,NULL,NULL,'\0','\0',12,NULL),(28,1,1,0,1,7,8,NULL,NULL,NULL,'\0','\0',13,NULL),(29,1,1,0,1,1,9,NULL,NULL,NULL,'\0','\0',8,NULL),(30,1,1,0,1,2,9,NULL,NULL,NULL,'\0','\0',9,NULL),(31,1,1,0,1,3,9,NULL,NULL,NULL,'\0','\0',10,NULL),(32,1,1,0,1,4,9,NULL,NULL,NULL,'\0','\0',11,NULL),(33,1,1,0,1,5,9,NULL,NULL,NULL,'\0','\0',12,NULL),(34,1,1,0,1,6,9,NULL,NULL,NULL,'\0','\0',13,NULL),(35,1,1,0,1,7,9,NULL,NULL,NULL,'\0','\0',14,NULL),(36,1,1,0,1,8,9,NULL,NULL,NULL,'\0','\0',15,NULL),(37,1,1,0,1,1,10,NULL,NULL,NULL,'\0','\0',9,NULL),(38,1,1,0,1,2,10,NULL,NULL,NULL,'\0','\0',10,NULL),(39,1,1,0,1,3,10,NULL,NULL,NULL,'\0','\0',11,NULL),(40,1,1,0,1,4,10,NULL,NULL,NULL,'\0','\0',12,NULL),(41,1,1,0,1,5,10,NULL,NULL,NULL,'\0','\0',13,NULL),(42,1,1,0,1,6,10,NULL,NULL,NULL,'\0','\0',14,NULL),(43,1,1,0,1,7,10,NULL,NULL,NULL,'\0','\0',15,NULL),(44,1,1,0,1,8,10,NULL,NULL,NULL,'\0','\0',16,NULL),(45,1,1,0,1,9,10,NULL,NULL,NULL,'\0','\0',17,NULL),(64,1,2,0,2,1,2,NULL,NULL,NULL,'\0','',11,NULL),(65,1,2,0,2,3,4,NULL,NULL,NULL,'\0','',13,NULL),(66,1,2,0,3,5,6,NULL,NULL,NULL,'\0','\0',15,NULL),(67,1,2,0,3,5,7,NULL,NULL,NULL,'\0','\0',16,NULL),(68,1,2,0,3,6,7,NULL,NULL,NULL,'\0','\0',17,NULL),(69,1,2,0,3,5,8,NULL,NULL,NULL,'\0','\0',17,NULL),(70,1,2,0,3,6,8,NULL,NULL,NULL,'\0','\0',18,NULL),(71,1,2,0,3,7,8,NULL,NULL,NULL,'\0','\0',19,NULL),(72,1,2,0,3,5,9,NULL,NULL,NULL,'\0','\0',18,NULL),(73,1,2,0,3,6,9,NULL,NULL,NULL,'\0','\0',19,NULL),(74,1,2,0,3,7,9,NULL,NULL,NULL,'\0','\0',20,NULL),(75,1,2,0,3,8,9,NULL,NULL,NULL,'\0','\0',21,NULL),(76,1,2,0,3,5,10,NULL,NULL,NULL,'\0','\0',19,NULL),(77,1,2,0,3,6,10,NULL,NULL,NULL,'\0','\0',20,NULL),(78,1,2,0,3,7,10,NULL,NULL,NULL,'\0','\0',21,NULL),(79,1,2,0,3,8,10,NULL,NULL,NULL,'\0','\0',22,NULL),(80,1,2,0,3,9,10,NULL,NULL,NULL,'\0','\0',23,NULL),(144,72,7,0,1,1,2,NULL,NULL,NULL,'\0','\0',1,NULL),(145,72,7,0,1,1,3,NULL,NULL,NULL,'\0','\0',2,NULL),(146,72,7,0,1,2,3,NULL,NULL,NULL,'\0','\0',3,NULL),(147,72,7,0,1,1,4,NULL,NULL,NULL,'\0','\0',3,NULL),(148,72,7,0,1,2,4,NULL,NULL,NULL,'\0','\0',2,NULL),(149,72,7,0,1,3,4,NULL,NULL,NULL,'\0','\0',1,NULL),(150,72,7,0,1,1,5,NULL,NULL,NULL,'\0','\0',4,NULL),(151,72,7,0,1,2,5,NULL,NULL,NULL,'\0','\0',5,NULL),(152,72,7,0,1,3,5,NULL,NULL,NULL,'\0','\0',6,NULL),(153,72,7,0,1,4,5,NULL,NULL,NULL,'\0','\0',7,NULL),(154,72,7,0,1,1,6,NULL,NULL,NULL,'\0','\0',5,NULL),(155,72,7,0,1,2,6,NULL,NULL,NULL,'\0','\0',4,NULL),(156,72,7,0,1,3,6,NULL,NULL,NULL,'\0','\0',7,NULL),(157,72,7,0,1,4,6,NULL,NULL,NULL,'\0','\0',6,NULL),(158,72,7,0,1,5,6,NULL,NULL,NULL,'\0','\0',1,NULL),(159,72,7,0,1,1,7,NULL,NULL,NULL,'\0','\0',6,NULL),(160,72,7,0,1,2,7,NULL,NULL,NULL,'\0','\0',7,NULL),(161,72,7,0,1,3,7,NULL,NULL,NULL,'\0','\0',4,NULL),(162,72,7,0,1,4,7,NULL,NULL,NULL,'\0','\0',5,NULL),(163,72,7,0,1,5,7,NULL,NULL,NULL,'\0','\0',2,NULL),(164,72,7,0,1,6,7,NULL,NULL,NULL,'\0','\0',3,NULL),(165,72,7,0,1,1,8,NULL,NULL,NULL,'\0','\0',7,NULL),(166,72,7,0,1,2,8,NULL,NULL,NULL,'\0','\0',6,NULL),(167,72,7,0,1,3,8,NULL,NULL,NULL,'\0','\0',5,NULL),(168,72,7,0,1,4,8,NULL,NULL,NULL,'\0','\0',4,NULL),(169,72,7,0,1,5,8,NULL,NULL,NULL,'\0','\0',3,NULL),(170,72,7,0,1,6,8,NULL,NULL,NULL,'\0','\0',2,NULL),(171,72,7,0,1,7,8,NULL,NULL,NULL,'\0','\0',1,NULL),(172,72,7,0,1,1,9,NULL,NULL,NULL,'\0','\0',8,NULL),(173,72,7,0,1,2,9,NULL,NULL,NULL,'\0','\0',9,NULL),(174,72,7,0,1,3,9,NULL,NULL,NULL,'\0','\0',10,NULL),(175,72,7,0,1,4,9,NULL,NULL,NULL,'\0','\0',11,NULL),(176,72,7,0,1,5,9,NULL,NULL,NULL,'\0','\0',12,NULL),(177,72,7,0,1,6,9,NULL,NULL,NULL,'\0','\0',13,NULL),(178,72,7,0,1,7,9,NULL,NULL,NULL,'\0','\0',14,NULL),(179,72,7,0,1,8,9,NULL,NULL,NULL,'\0','\0',15,NULL),(180,72,7,0,1,1,10,NULL,NULL,NULL,'\0','\0',9,NULL),(181,72,7,0,1,2,10,NULL,NULL,NULL,'\0','\0',8,NULL),(182,72,7,0,1,3,10,NULL,NULL,NULL,'\0','\0',11,NULL),(183,72,7,0,1,4,10,NULL,NULL,NULL,'\0','\0',10,NULL),(184,72,7,0,1,5,10,NULL,NULL,NULL,'\0','\0',13,NULL),(185,72,7,0,1,6,10,NULL,NULL,NULL,'\0','\0',12,NULL),(186,72,7,0,1,7,10,NULL,NULL,NULL,'\0','\0',15,NULL),(187,72,7,0,1,8,10,NULL,NULL,NULL,'\0','\0',14,NULL),(188,72,7,0,1,9,10,NULL,NULL,NULL,'\0','\0',1,NULL),(712,75,10,1,1,1,2,NULL,NULL,NULL,'\0','\0',1,1),(713,75,10,1,1,10,3,NULL,NULL,NULL,'\0','\0',1,2),(714,75,10,1,1,9,4,NULL,NULL,NULL,'\0','\0',1,3),(715,75,10,1,1,8,5,NULL,NULL,NULL,'\0','\0',1,4),(716,75,10,1,1,7,6,NULL,NULL,NULL,'\0','\0',1,5),(717,75,10,1,1,1,10,NULL,NULL,NULL,'\0','\0',2,1),(718,75,10,1,1,9,2,NULL,NULL,NULL,'\0','\0',2,2),(719,75,10,1,1,8,3,NULL,NULL,NULL,'\0','\0',2,3),(720,75,10,1,1,7,4,NULL,NULL,NULL,'\0','\0',2,4),(721,75,10,1,1,6,5,NULL,NULL,NULL,'\0','\0',2,5),(722,75,10,1,1,1,9,NULL,NULL,NULL,'\0','\0',3,1),(723,75,10,1,1,8,10,NULL,NULL,NULL,'\0','\0',3,2),(724,75,10,1,1,7,2,NULL,NULL,NULL,'\0','\0',3,3),(725,75,10,1,1,6,3,NULL,NULL,NULL,'\0','\0',3,4),(726,75,10,1,1,5,4,NULL,NULL,NULL,'\0','\0',3,5),(727,75,10,1,1,1,8,NULL,NULL,NULL,'\0','\0',4,1),(728,75,10,1,1,7,9,NULL,NULL,NULL,'\0','\0',4,2),(729,75,10,1,1,6,10,NULL,NULL,NULL,'\0','\0',4,3),(730,75,10,1,1,5,2,NULL,NULL,NULL,'\0','\0',4,4),(731,75,10,1,1,4,3,NULL,NULL,NULL,'\0','\0',4,5),(732,75,10,1,1,1,7,NULL,NULL,NULL,'\0','\0',5,1),(733,75,10,1,1,6,8,NULL,NULL,NULL,'\0','\0',5,2),(734,75,10,1,1,5,9,NULL,NULL,NULL,'\0','\0',5,3),(735,75,10,1,1,4,10,NULL,NULL,NULL,'\0','\0',5,4),(736,75,10,1,1,3,2,NULL,NULL,NULL,'\0','\0',5,5),(737,75,10,1,1,1,6,NULL,NULL,NULL,'\0','\0',6,1),(738,75,10,1,1,5,7,NULL,NULL,NULL,'\0','\0',6,2),(739,75,10,1,1,4,8,NULL,NULL,NULL,'\0','\0',6,3),(740,75,10,1,1,3,9,NULL,NULL,NULL,'\0','\0',6,4),(741,75,10,1,1,2,10,NULL,NULL,NULL,'\0','\0',6,5),(742,75,10,1,1,1,5,NULL,NULL,NULL,'\0','\0',7,1),(743,75,10,1,1,4,6,NULL,NULL,NULL,'\0','\0',7,2),(744,75,10,1,1,3,7,NULL,NULL,NULL,'\0','\0',7,3),(745,75,10,1,1,2,8,NULL,NULL,NULL,'\0','\0',7,4),(746,75,10,1,1,10,9,NULL,NULL,NULL,'\0','\0',7,5),(747,75,10,1,1,1,4,NULL,NULL,NULL,'\0','\0',8,1),(748,75,10,1,1,3,5,NULL,NULL,NULL,'\0','\0',8,2),(749,75,10,1,1,2,6,NULL,NULL,NULL,'\0','\0',8,3),(750,75,10,1,1,10,7,NULL,NULL,NULL,'\0','\0',8,4),(751,75,10,1,1,9,8,NULL,NULL,NULL,'\0','\0',8,5),(752,75,10,1,1,1,3,NULL,NULL,NULL,'\0','\0',9,1),(753,75,10,1,1,2,4,NULL,NULL,NULL,'\0','\0',9,2),(754,75,10,1,1,10,5,NULL,NULL,NULL,'\0','\0',9,3),(755,75,10,1,1,9,6,NULL,NULL,NULL,'\0','\0',9,4),(756,75,10,1,1,8,7,NULL,NULL,NULL,'\0','\0',9,5),(775,79,13,1,1,1,2,NULL,NULL,NULL,'\0','\0',1,1),(776,79,13,1,1,NULL,3,NULL,NULL,NULL,'\0','\0',1,2),(777,79,13,1,1,10,4,NULL,NULL,NULL,'\0','\0',1,3),(778,79,13,1,1,9,5,NULL,NULL,NULL,'\0','\0',1,4),(779,79,13,1,1,8,6,NULL,NULL,NULL,'\0','\0',1,5),(780,79,13,1,1,7,7,NULL,NULL,NULL,'\0','\0',1,6),(781,79,13,1,1,1,NULL,NULL,NULL,NULL,'\0','\0',2,1),(782,79,13,1,1,10,2,NULL,NULL,NULL,'\0','\0',2,2),(783,79,13,1,1,9,3,NULL,NULL,NULL,'\0','\0',2,3),(784,79,13,1,1,8,4,NULL,NULL,NULL,'\0','\0',2,4),(785,79,13,1,1,7,5,NULL,NULL,NULL,'\0','\0',2,5),(786,79,13,1,1,7,6,NULL,NULL,NULL,'\0','\0',2,6),(787,79,13,1,1,1,10,NULL,NULL,NULL,'\0','\0',3,1),(788,79,13,1,1,9,NULL,NULL,NULL,NULL,'\0','\0',3,2),(789,79,13,1,1,8,2,NULL,NULL,NULL,'\0','\0',3,3),(790,79,13,1,1,7,3,NULL,NULL,NULL,'\0','\0',3,4),(791,79,13,1,1,7,4,NULL,NULL,NULL,'\0','\0',3,5),(792,79,13,1,1,6,5,NULL,NULL,NULL,'\0','\0',3,6),(793,79,13,1,1,1,9,NULL,NULL,NULL,'\0','\0',4,1),(794,79,13,1,1,8,10,NULL,NULL,NULL,'\0','\0',4,2),(795,79,13,1,1,7,NULL,NULL,NULL,NULL,'\0','\0',4,3),(796,79,13,1,1,7,2,NULL,NULL,NULL,'\0','\0',4,4),(797,79,13,1,1,6,3,NULL,NULL,NULL,'\0','\0',4,5),(798,79,13,1,1,5,4,NULL,NULL,NULL,'\0','\0',4,6),(799,79,13,1,1,1,8,NULL,NULL,NULL,'\0','\0',5,1),(800,79,13,1,1,7,9,NULL,NULL,NULL,'\0','\0',5,2),(801,79,13,1,1,7,10,NULL,NULL,NULL,'\0','\0',5,3),(802,79,13,1,1,6,NULL,NULL,NULL,NULL,'\0','\0',5,4),(803,79,13,1,1,5,2,NULL,NULL,NULL,'\0','\0',5,5),(804,79,13,1,1,4,3,NULL,NULL,NULL,'\0','\0',5,6),(805,79,13,1,1,1,7,NULL,NULL,NULL,'\0','\0',6,1),(806,79,13,1,1,7,8,NULL,NULL,NULL,'\0','\0',6,2),(807,79,13,1,1,6,9,NULL,NULL,NULL,'\0','\0',6,3),(808,79,13,1,1,5,10,NULL,NULL,NULL,'\0','\0',6,4),(809,79,13,1,1,4,NULL,NULL,NULL,NULL,'\0','\0',6,5),(810,79,13,1,1,3,2,NULL,NULL,NULL,'\0','\0',6,6),(811,79,13,1,1,1,6,NULL,NULL,NULL,'\0','\0',7,1),(812,79,13,1,1,6,7,NULL,NULL,NULL,'\0','\0',7,2),(813,79,13,1,1,5,8,NULL,NULL,NULL,'\0','\0',7,3),(814,79,13,1,1,4,9,NULL,NULL,NULL,'\0','\0',7,4),(815,79,13,1,1,3,10,NULL,NULL,NULL,'\0','\0',7,5),(816,79,13,1,1,2,NULL,NULL,NULL,NULL,'\0','\0',7,6),(817,79,13,1,1,1,5,NULL,NULL,NULL,'\0','\0',8,1),(818,79,13,1,1,5,6,NULL,NULL,NULL,'\0','\0',8,2),(819,79,13,1,1,4,7,NULL,NULL,NULL,'\0','\0',8,3),(820,79,13,1,1,3,8,NULL,NULL,NULL,'\0','\0',8,4),(821,79,13,1,1,2,9,NULL,NULL,NULL,'\0','\0',8,5),(822,79,13,1,1,NULL,10,NULL,NULL,NULL,'\0','\0',8,6),(823,79,13,1,1,1,4,NULL,NULL,NULL,'\0','\0',9,1),(824,79,13,1,1,4,5,NULL,NULL,NULL,'\0','\0',9,2),(825,79,13,1,1,3,6,NULL,NULL,NULL,'\0','\0',9,3),(826,79,13,1,1,2,7,NULL,NULL,NULL,'\0','\0',9,4),(827,79,13,1,1,NULL,8,NULL,NULL,NULL,'\0','\0',9,5),(828,79,13,1,1,10,9,NULL,NULL,NULL,'\0','\0',9,6),(829,79,13,1,1,1,3,NULL,NULL,NULL,'\0','\0',10,1),(830,79,13,1,1,3,4,NULL,NULL,NULL,'\0','\0',10,2),(831,79,13,1,1,2,5,NULL,NULL,NULL,'\0','\0',10,3),(832,79,13,1,1,NULL,6,NULL,NULL,NULL,'\0','\0',10,4),(833,79,13,1,1,10,7,NULL,NULL,NULL,'\0','\0',10,5),(834,79,13,1,1,9,8,NULL,NULL,NULL,'\0','\0',10,6),(835,79,13,1,1,1,2,NULL,NULL,NULL,'\0','\0',11,1),(836,79,13,1,1,2,3,NULL,NULL,NULL,'\0','\0',11,2),(837,79,13,1,1,NULL,4,NULL,NULL,NULL,'\0','\0',11,3),(838,79,13,1,1,10,5,NULL,NULL,NULL,'\0','\0',11,4),(839,79,13,1,1,9,6,NULL,NULL,NULL,'\0','\0',11,5),(840,79,13,1,1,8,7,NULL,NULL,NULL,'\0','\0',11,6),(1791,82,16,1,1,1,2,NULL,NULL,NULL,'\0','\0',1,1),(1792,82,16,1,1,12,3,NULL,NULL,NULL,'\0','\0',1,2),(1793,82,16,1,1,11,4,NULL,NULL,NULL,'\0','\0',1,3),(1794,82,16,1,1,10,5,NULL,NULL,NULL,'\0','\0',1,4),(1795,82,16,1,1,9,6,NULL,NULL,NULL,'\0','\0',1,5),(1796,82,16,1,1,8,7,NULL,NULL,NULL,'\0','\0',1,6),(1797,82,16,1,1,1,12,NULL,NULL,NULL,'\0','\0',2,1),(1798,82,16,1,1,11,2,NULL,NULL,NULL,'\0','\0',2,2),(1799,82,16,1,1,10,3,NULL,NULL,NULL,'\0','\0',2,3),(1800,82,16,1,1,9,4,NULL,NULL,NULL,'\0','\0',2,4),(1801,82,16,1,1,8,5,NULL,NULL,NULL,'\0','\0',2,5),(1802,82,16,1,1,7,6,NULL,NULL,NULL,'\0','\0',2,6),(1803,82,16,1,1,1,11,NULL,NULL,NULL,'\0','\0',3,1),(1804,82,16,1,1,10,12,NULL,NULL,NULL,'\0','\0',3,2),(1805,82,16,1,1,9,2,NULL,NULL,NULL,'\0','\0',3,3),(1806,82,16,1,1,8,3,NULL,NULL,NULL,'\0','\0',3,4),(1807,82,16,1,1,7,4,NULL,NULL,NULL,'\0','\0',3,5),(1808,82,16,1,1,6,5,NULL,NULL,NULL,'\0','\0',3,6),(1809,82,16,1,1,1,10,NULL,NULL,NULL,'\0','\0',4,1),(1810,82,16,1,1,9,11,NULL,NULL,NULL,'\0','\0',4,2),(1811,82,16,1,1,8,12,NULL,NULL,NULL,'\0','\0',4,3),(1812,82,16,1,1,7,2,NULL,NULL,NULL,'\0','\0',4,4),(1813,82,16,1,1,6,3,NULL,NULL,NULL,'\0','\0',4,5),(1814,82,16,1,1,5,4,NULL,NULL,NULL,'\0','\0',4,6),(1815,82,16,1,1,1,9,NULL,NULL,NULL,'\0','\0',5,1),(1816,82,16,1,1,8,10,NULL,NULL,NULL,'\0','\0',5,2),(1817,82,16,1,1,7,11,NULL,NULL,NULL,'\0','\0',5,3),(1818,82,16,1,1,6,12,NULL,NULL,NULL,'\0','\0',5,4),(1819,82,16,1,1,5,2,NULL,NULL,NULL,'\0','\0',5,5),(1820,82,16,1,1,4,3,NULL,NULL,NULL,'\0','\0',5,6),(1821,82,16,1,1,1,8,NULL,NULL,NULL,'\0','\0',6,1),(1822,82,16,1,1,7,9,NULL,NULL,NULL,'\0','\0',6,2),(1823,82,16,1,1,6,10,NULL,NULL,NULL,'\0','\0',6,3),(1824,82,16,1,1,5,11,NULL,NULL,NULL,'\0','\0',6,4),(1825,82,16,1,1,4,12,NULL,NULL,NULL,'\0','\0',6,5),(1826,82,16,1,1,3,2,NULL,NULL,NULL,'\0','\0',6,6),(1827,82,16,1,1,1,7,NULL,NULL,NULL,'\0','\0',7,1),(1828,82,16,1,1,6,8,NULL,NULL,NULL,'\0','\0',7,2),(1829,82,16,1,1,5,9,NULL,NULL,NULL,'\0','\0',7,3),(1830,82,16,1,1,4,10,NULL,NULL,NULL,'\0','\0',7,4),(1831,82,16,1,1,3,11,NULL,NULL,NULL,'\0','\0',7,5),(1832,82,16,1,1,2,12,NULL,NULL,NULL,'\0','\0',7,6),(1833,82,16,1,1,1,6,NULL,NULL,NULL,'\0','\0',8,1),(1834,82,16,1,1,5,7,NULL,NULL,NULL,'\0','\0',8,2),(1835,82,16,1,1,4,8,NULL,NULL,NULL,'\0','\0',8,3),(1836,82,16,1,1,3,9,NULL,NULL,NULL,'\0','\0',8,4),(1837,82,16,1,1,2,10,NULL,NULL,NULL,'\0','\0',8,5),(1838,82,16,1,1,12,11,NULL,NULL,NULL,'\0','\0',8,6),(1839,82,16,1,1,1,5,NULL,NULL,NULL,'\0','\0',9,1),(1840,82,16,1,1,4,6,NULL,NULL,NULL,'\0','\0',9,2),(1841,82,16,1,1,3,7,NULL,NULL,NULL,'\0','\0',9,3),(1842,82,16,1,1,2,8,NULL,NULL,NULL,'\0','\0',9,4),(1843,82,16,1,1,12,9,NULL,NULL,NULL,'\0','\0',9,5),(1844,82,16,1,1,11,10,NULL,NULL,NULL,'\0','\0',9,6),(1845,82,16,1,1,1,4,NULL,NULL,NULL,'\0','\0',10,1),(1846,82,16,1,1,3,5,NULL,NULL,NULL,'\0','\0',10,2),(1847,82,16,1,1,2,6,NULL,NULL,NULL,'\0','\0',10,3),(1848,82,16,1,1,12,7,NULL,NULL,NULL,'\0','\0',10,4),(1849,82,16,1,1,11,8,NULL,NULL,NULL,'\0','\0',10,5),(1850,82,16,1,1,10,9,NULL,NULL,NULL,'\0','\0',10,6),(1851,82,16,1,1,1,3,NULL,NULL,NULL,'\0','\0',11,1),(1852,82,16,1,1,2,4,NULL,NULL,NULL,'\0','\0',11,2),(1853,82,16,1,1,12,5,NULL,NULL,NULL,'\0','\0',11,3),(1854,82,16,1,1,11,6,NULL,NULL,NULL,'\0','\0',11,4),(1855,82,16,1,1,10,7,NULL,NULL,NULL,'\0','\0',11,5),(1856,82,16,1,1,9,8,NULL,NULL,NULL,'\0','\0',11,6);
/*!40000 ALTER TABLE `fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `id_grupo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,'Grupo A');
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_por_ronda`
--

DROP TABLE IF EXISTS `grupo_por_ronda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_por_ronda` (
  `id_grupo_por_ronda` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_torneo` bigint(20) unsigned NOT NULL,
  `id_ronda` bigint(20) unsigned NOT NULL,
  `id_tipo_competencia` int(10) unsigned NOT NULL,
  `id_grupo` int(10) unsigned NOT NULL,
  `ida_y_vuelta` bit(1) NOT NULL,
  `cant_participantes` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_grupo_por_ronda`),
  KEY `fk_grupo_por_ronda_grupo_idx` (`id_grupo`),
  KEY `fk_grupo_por_ronda_tipo_competencia_idx` (`id_tipo_competencia`),
  KEY `fk_grupo_por_ronda_ronda_idx` (`id_ronda`),
  CONSTRAINT `fk_grupo_por_ronda_grupo` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_por_ronda_ronda` FOREIGN KEY (`id_ronda`) REFERENCES `ronda` (`id_ronda`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grupo_por_ronda_tipo_competencia` FOREIGN KEY (`id_tipo_competencia`) REFERENCES `tipo_competencia` (`id_tipo_competencia`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_por_ronda`
--

LOCK TABLES `grupo_por_ronda` WRITE;
/*!40000 ALTER TABLE `grupo_por_ronda` DISABLE KEYS */;
INSERT INTO `grupo_por_ronda` VALUES (2,69,5,1,1,'\0',0),(3,69,5,1,1,'\0',0),(4,69,5,1,1,'\0',0),(5,69,5,1,1,'\0',0),(6,69,5,1,1,'\0',0),(7,69,5,1,1,'\0',0),(8,69,5,1,1,'\0',0),(9,69,5,1,1,'\0',0),(17,70,6,1,1,'\0',0),(18,72,7,1,1,'\0',0),(19,75,10,1,1,'\0',10),(20,76,11,1,1,'\0',12),(21,77,12,1,1,'\0',10),(22,79,13,1,1,'\0',11),(25,82,16,1,1,'\0',11);
/*!40000 ALTER TABLE `grupo_por_ronda` ENABLE KEYS */;
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
INSERT INTO `liga` VALUES (1,'Torneo Senior Oficial',1,'2016-05-05 19:18:53');
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
  `id_tipo_participante` int(10) unsigned DEFAULT NULL,
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
  `email` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `piso` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `depto` varchar(4) DEFAULT NULL,
  `codpostal` varchar(8) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `localidad` varchar(100) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT NULL,
  `id_tipo_estado_civil` int(10) unsigned DEFAULT NULL,
  `conyuge_nombre` varchar(50) DEFAULT NULL,
  `id_tipo_doc` int(11) DEFAULT NULL,
  `nro_doc` varchar(8) DEFAULT NULL,
  `cobertura_medica` varchar(50) DEFAULT NULL,
  `fecha_apto_medico` date DEFAULT NULL,
  `nombre_archivo_apto_medico` varchar(100) DEFAULT NULL,
  `nombre_archivo_foto` varchar(100) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `id_usuario` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_participante`),
  KEY `fk_participante_tipo_estado_civil_idx` (`id_tipo_estado_civil`),
  CONSTRAINT `fk_participante_tipo_estado_civil` FOREIGN KEY (`id_tipo_estado_civil`) REFERENCES `tipo_estado_civil` (`id_tipo_estado_civil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participante`
--

LOCK TABLES `participante` WRITE;
/*!40000 ALTER TABLE `participante` DISABLE KEYS */;
INSERT INTO `participante` VALUES (62,1,'Nestor','Craviotto',NULL,NULL,1,NULL,'','','','','','0000-00-00','',0,0,'','',0,'','',NULL,'',1,'21565565','','0000-00-00',NULL,'neuer.jpg','2016-06-21 07:53:48',1),(63,1,'Oscar','Ruggieri',NULL,NULL,0,NULL,'','','','','','0000-00-00','',0,0,'','',0,'','',NULL,'',1,'20269999','','0000-00-00',NULL,'logotorneo7.png','2016-06-21 08:05:19',1),(65,1,'Carlos','Kozlowski','',0,0,0,'','','','','',NULL,'',0,0,'','',0,'','',NULL,'',1,'232323','','0000-00-00','','neuer3.jpg','2016-06-23 12:38:01',1),(66,1,'Marco','Cupo',NULL,NULL,0,NULL,'','','','','','0000-00-00','',0,0,'','',117,'','',NULL,'',1,'12321321','','0000-00-00',NULL,'neuer52.jpg','2016-06-23 14:13:01',1),(73,1,'Mariano','Andolfatto Trolo','',0,0,0,'','','','','',NULL,'',0,0,'','',0,'','',NULL,'',1,'34343434','','0000-00-00','neuer1.jpg','neuer1.jpg','2016-06-24 12:05:15',1),(74,1,'Juan','Chotalargas','',0,0,0,'','','','','','0000-00-00','',0,0,'','',0,'','',NULL,'',3,'0000000','',NULL,'logotorneo1.png','logotorneo1.png','2016-06-29 10:55:36',1),(94,1,'Coco','Channel','',0,0,0,'','','','','','0000-00-00','',0,0,'','',0,'','',NULL,'',1,'123456','','0000-00-00','','no-foto.png','2016-07-06 08:29:35',1),(98,1,'Sergio','Raiputo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1969-12-31',NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'23232',NULL,'1969-12-31',NULL,'no-foto.png','2016-07-06 14:34:23',1),(100,1,'Iglesias','Toti',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2012-01-12',NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'433434',NULL,'1969-12-31',NULL,'neuer41.jpg','2016-07-07 12:14:05',1),(101,1,'Rob','Fag','',0,0,0,'','','','','','1978-10-25','',0,0,'','',0,'','',NULL,'',2,'32323','','1980-10-25','','no-foto.png','2016-07-07 13:17:40',1),(102,2,'Arbitro','Hijo De mil Puta',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1969-12-31',NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'12',NULL,NULL,NULL,'mago_matematico.jpg','2016-07-11 17:08:30',1),(103,2,'Joe','Valachi',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1969-12-31',NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'43',NULL,NULL,NULL,'kafka_recortado.jpg','2016-07-11 17:33:11',1),(104,2,'Juan','cabarulo',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'1969-12-31',NULL,0,0,NULL,NULL,NULL,NULL,NULL,4,NULL,1,'12',NULL,NULL,NULL,'nudos_para_zapatillas.jpg','2016-07-11 17:36:14',1),(109,3,'Jean Carlos','Pelotudo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1978-10-12',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,1,'262626',NULL,NULL,NULL,'neuer42.jpg','2016-07-12 09:30:54',1),(110,3,'Eber','Luduena',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'26262',NULL,NULL,NULL,'no-foto.png','2016-07-12 09:34:59',1),(114,4,'Ernest','Basavilvaso',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'26965501',NULL,NULL,NULL,'images16.jpg','2016-07-12 12:26:44',1),(119,2,'Lino Verga','Topo',NULL,NULL,1,NULL,'Antes era puto',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'232',NULL,NULL,NULL,'no-foto.png','2016-07-12 14:52:23',1),(122,2,'Lorena','Verga',NULL,NULL,1,NULL,'as','1','1','1','456@mail.tuvieja.en.tanga.com','1988-02-22','Falsa',1,123,'1','1',118,'LA CHOTA','Argelino ',NULL,'Tu hermana',1,'343',NULL,NULL,NULL,'no-foto.png','2016-07-12 15:05:22',1),(123,4,'Christoper','London',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'2625',NULL,NULL,NULL,'images15.jpg','2016-07-13 11:50:42',1),(126,1,'as','chotalarga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wew',3,'wew',1,'232',NULL,NULL,NULL,'no-foto.png','2016-07-13 16:17:49',1),(127,3,'Sergio Banana Puerrredon','Raiputo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,1,'343',NULL,NULL,NULL,'no-foto.png','2016-07-13 16:20:03',1),(128,1,'juancito','Juancito',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'23956161',NULL,NULL,NULL,'no-foto.png','2016-07-15 12:30:06',1),(131,2,'as','asd',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'34',NULL,NULL,NULL,'no-foto.png','2016-07-19 16:18:37',1);
/*!40000 ALTER TABLE `participante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_asignacion_en_grupo_por_ronda`
--

DROP TABLE IF EXISTS `pla_asignacion_en_grupo_por_ronda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pla_asignacion_en_grupo_por_ronda` (
  `id_pla_asignacion_en_grupo_por_ronda` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `id_pla_torneo` bigint(19) unsigned NOT NULL,
  `id_pla_ronda` bigint(19) unsigned NOT NULL,
  `id_pla_grupo` bigint(19) unsigned NOT NULL,
  `nro_equipo_a` int(11) DEFAULT NULL,
  `nro_equipo_b` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pla_asignacion_en_grupo_por_ronda`),
  KEY `fk_pla_asignacion_en_grupo_por_ronda_pla_grupo_idx` (`id_pla_grupo`),
  CONSTRAINT `fk_pla_asignacion_en_grupo_por_ronda_pla_grupo` FOREIGN KEY (`id_pla_grupo`) REFERENCES `pla_grupo` (`id_pla_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_asignacion_en_grupo_por_ronda`
--

LOCK TABLES `pla_asignacion_en_grupo_por_ronda` WRITE;
/*!40000 ALTER TABLE `pla_asignacion_en_grupo_por_ronda` DISABLE KEYS */;
INSERT INTO `pla_asignacion_en_grupo_por_ronda` VALUES (1,1,1,1,1,10),(4,6,14,4,1,11),(5,7,15,5,1,5),(6,7,15,6,6,11);
/*!40000 ALTER TABLE `pla_asignacion_en_grupo_por_ronda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_grupo`
--

DROP TABLE IF EXISTS `pla_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pla_grupo` (
  `id_pla_grupo` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `id_pla_torneo` bigint(19) unsigned NOT NULL,
  `id_pla_ronda` bigint(19) unsigned NOT NULL,
  `nombre_grupo` varchar(45) DEFAULT NULL,
  `id_tipo_competencia` int(10) unsigned DEFAULT NULL,
  `ida_y_vuelta` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_pla_grupo`),
  KEY `fk_pla_grupo_pla_ronda_idx` (`id_pla_ronda`),
  CONSTRAINT `fk_pla_grupo_pla_ronda` FOREIGN KEY (`id_pla_ronda`) REFERENCES `pla_ronda` (`id_pla_ronda`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_grupo`
--

LOCK TABLES `pla_grupo` WRITE;
/*!40000 ALTER TABLE `pla_grupo` DISABLE KEYS */;
INSERT INTO `pla_grupo` VALUES (1,1,1,'Grupo A',1,NULL),(4,6,14,'Grupo A',1,NULL),(5,7,15,'Grupo A',1,NULL),(6,7,15,'Grupo B',1,NULL);
/*!40000 ALTER TABLE `pla_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_ronda`
--

DROP TABLE IF EXISTS `pla_ronda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pla_ronda` (
  `id_pla_ronda` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `id_pla_torneo` bigint(19) unsigned NOT NULL,
  `nombre_ronda` varchar(45) DEFAULT NULL,
  `cant_grupos` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_pla_ronda`),
  KEY `pla_ronda_pla_torneo_idx` (`id_pla_torneo`),
  CONSTRAINT `pla_ronda_pla_torneo` FOREIGN KEY (`id_pla_torneo`) REFERENCES `pla_torneo` (`id_pla_torneo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_ronda`
--

LOCK TABLES `pla_ronda` WRITE;
/*!40000 ALTER TABLE `pla_ronda` DISABLE KEYS */;
INSERT INTO `pla_ronda` VALUES (1,1,'Competencia',1),(14,6,'Competencia',1),(15,7,'Competencia',2);
/*!40000 ALTER TABLE `pla_ronda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pla_torneo`
--

DROP TABLE IF EXISTS `pla_torneo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pla_torneo` (
  `id_pla_torneo` bigint(19) unsigned NOT NULL AUTO_INCREMENT,
  `id_liga` bigint(19) unsigned DEFAULT NULL,
  `nombre_plantilla` varchar(45) DEFAULT NULL,
  `nombre_torneo` varchar(45) DEFAULT NULL,
  `cant_participantes` int(10) unsigned DEFAULT NULL,
  `duracion` int(11) DEFAULT NULL,
  `id_unidades_tiempo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_pla_torneo`),
  KEY `fk_pla_torneo_unidades_tiempo_idx` (`id_unidades_tiempo`),
  CONSTRAINT `fk_pla_torneo_unidades_tiempo` FOREIGN KEY (`id_unidades_tiempo`) REFERENCES `unidades_tiempo` (`id_unidades_tiempo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pla_torneo`
--

LOCK TABLES `pla_torneo` WRITE;
/*!40000 ALTER TABLE `pla_torneo` DISABLE KEYS */;
INSERT INTO `pla_torneo` VALUES (1,1,'Una Ronda Todos C/ Todos','Torneo Rapido',10,10,3),(6,1,'Una Ronda Todos C/ Todos','Torneo Rapido',11,10,3),(7,1,'Una Ronda Todos C/ Todos','Torneo Rapido',11,10,3);
/*!40000 ALTER TABLE `pla_torneo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ronda`
--

DROP TABLE IF EXISTS `ronda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ronda` (
  `id_ronda` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_torneo` bigint(10) unsigned NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `id_modalidad` int(10) unsigned NOT NULL,
  `cant_grupos` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_ronda`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ronda`
--

LOCK TABLES `ronda` WRITE;
/*!40000 ALTER TABLE `ronda` DISABLE KEYS */;
INSERT INTO `ronda` VALUES (1,64,'Competencia',0,1),(2,66,'Competencia',0,1),(3,67,'Competencia',0,1),(4,68,'Competencia',0,1),(5,69,'Competencia',0,1),(6,70,'Competencia',0,1),(7,72,'Competencia',0,1),(8,73,'Competencia',0,1),(9,74,'Competencia',0,1),(10,75,'Competencia',0,1),(11,76,'UnicaRonda',0,1),(12,77,'Competencia',0,1),(13,79,'Competencia',0,1),(16,82,'Competencia',0,1);
/*!40000 ALTER TABLE `ronda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sede`
--

DROP TABLE IF EXISTS `sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sede` (
  `id_sede` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_sede`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sede`
--

LOCK TABLES `sede` WRITE;
/*!40000 ALTER TABLE `sede` DISABLE KEYS */;
INSERT INTO `sede` VALUES (1,'Sin Sede Asignada');
/*!40000 ALTER TABLE `sede` ENABLE KEYS */;
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
-- Table structure for table `tipo_competencia`
--

DROP TABLE IF EXISTS `tipo_competencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_competencia` (
  `id_tipo_competencia` int(10) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_competencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_competencia`
--

LOCK TABLES `tipo_competencia` WRITE;
/*!40000 ALTER TABLE `tipo_competencia` DISABLE KEYS */;
INSERT INTO `tipo_competencia` VALUES (1,'Todos contra todos'),(2,'Eliminacion directa'),(3,'Eliminacion directa con sorteo');
/*!40000 ALTER TABLE `tipo_competencia` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_provincia`
--

LOCK TABLES `tipo_provincia` WRITE;
/*!40000 ALTER TABLE `tipo_provincia` DISABLE KEYS */;
INSERT INTO `tipo_provincia` VALUES (100,'CAPITAL FEDERAL','CFE'),(101,'BUENOS AIRES','BAI'),(102,'CATAMARCA','CAT'),(103,'CORDOBA','CBA'),(104,'CORRIENTES','COR'),(105,'ENTRE RIOS','ERI'),(106,'JUJUY','JUJ'),(107,'LA RIOJA','LRI'),(108,'MENDOZA','MEN'),(109,'SALTA','SAL'),(110,'SAN JUAN','SJU'),(111,'SAN LUIS','SLU'),(112,'SANTA FE','SFE'),(113,'SANTIAGO DEL ESTERO','SDE'),(114,'TUCUMAN','TUC'),(115,'CHACO','CHA'),(116,'CHUBUT','CHU'),(117,'FORMOSA','FOR'),(118,'LA PAMPA','LPA'),(119,'MISIONES','MIS'),(120,'NEUQUEN','NEU'),(121,'RIO NEGRO','RNE'),(122,'SANTA CRUZ','SCR'),(123,'TIERRA DEL FUEGO','TDF');
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
  `id_tipo_modalidad` smallint(4) NOT NULL,
  `anio` smallint(4) unsigned NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad_equipos` int(10) unsigned NOT NULL,
  `id_usuario` int(10) unsigned NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_torneo`,`id_liga`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `torneo`
--

LOCK TABLES `torneo` WRITE;
/*!40000 ALTER TABLE `torneo` DISABLE KEYS */;
INSERT INTO `torneo` VALUES (21,9999,2,2016,'Torneo nacional 2 sub 60',8,99,'2016-05-03 16:53:14',NULL,NULL),(22,9999,3,2016,'Torneo Final',122,1,'2016-06-16 14:47:45',NULL,NULL),(31,1,3,2016,'TORNEO LA VERGA 4',44,1,'2016-06-19 22:07:52',NULL,NULL),(38,1,3,2016,'marian trolo 2001',552,1,'2016-07-12 14:52:27',NULL,NULL),(46,0,0,0,'0',0,0,'2016-06-20 15:47:05',NULL,NULL),(51,1,1,2016,'benedict arnold',3,1,'2016-07-12 14:58:02',NULL,NULL),(56,1,2,2016,'rere',3,1,'2016-07-12 14:19:59',NULL,NULL),(57,1,3,2016,'ded',332,1,'2016-07-12 14:35:04',NULL,NULL),(58,1,1,2016,'eeee',22,1,'2016-07-12 14:52:15',NULL,NULL),(59,1,1,2016,'ded',33,1,'2016-07-12 14:52:38',NULL,NULL),(60,1,1,2016,'3434',444,1,'2016-07-12 14:59:07',NULL,NULL),(61,1,1,2016,'2323',2,1,'2016-07-12 15:03:51',NULL,NULL),(62,1,0,2016,'Torneo Rapido',10,1,'2016-07-20 14:56:29','2016-07-21 14:56:29','2017-05-21 14:56:29'),(63,1,1,2016,'Torneo Rapido',10,1,'2016-07-20 14:59:16','2016-07-21 14:59:16','2017-05-21 14:59:16'),(64,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 17:44:38','2016-07-23 17:44:38','2017-05-23 17:44:38'),(65,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 17:49:30','2016-07-23 17:49:30','2017-05-23 17:49:30'),(66,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 17:55:33','2016-07-23 17:55:33','2017-05-23 17:55:33'),(67,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 17:58:06','2016-07-23 17:58:06','2017-05-23 17:58:06'),(68,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 17:58:24','2016-07-23 17:58:24','2017-05-23 17:58:24'),(69,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 18:00:29','2016-07-23 18:00:29','2017-05-23 18:00:29'),(70,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 18:04:55','2016-07-23 18:04:55','2017-05-23 18:04:55'),(71,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 18:30:23','2016-07-23 18:30:23','2017-05-23 18:30:23'),(72,1,1,2016,'Torneo Rapido',10,1,'2016-07-22 18:32:33','2016-07-23 18:32:33','2017-05-23 18:32:33'),(73,1,1,2016,'Torneo Rapido',10,1,'2016-07-27 15:45:01','2016-07-28 15:45:01','2017-05-28 15:45:01'),(74,1,1,2016,'Torneo Rapido',10,1,'2016-07-27 15:46:19','2016-07-28 15:46:19','2017-05-28 15:46:19'),(75,1,1,2016,'Torneo Rapido',10,1,'2016-07-27 15:50:37','2016-07-28 15:50:37','2017-05-28 15:50:37'),(76,1,1,2016,'Prueba 12 equipos',12,1,'2016-07-29 11:15:22','2016-08-01 00:00:00','2016-09-01 00:00:00'),(77,1,1,2016,'Torneo Rapido',10,1,'2016-07-29 11:41:02','2016-07-30 11:41:02','2017-05-30 11:41:02'),(78,0,1,2016,'',0,1,'2016-08-02 16:00:06','2016-08-03 16:00:06',NULL),(79,1,1,2016,'Torneo Rapido',11,1,'2016-08-02 16:07:21','2016-08-03 16:07:21','2017-06-03 16:07:21'),(82,1,1,2016,'Torneo Rapido',11,1,'2016-08-02 16:54:04','2016-08-03 16:54:04','2017-06-03 16:54:04'),(83,0,1,2016,'',0,1,'2016-08-03 14:48:10','2016-08-04 14:48:10',NULL);
/*!40000 ALTER TABLE `torneo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades_tiempo`
--

DROP TABLE IF EXISTS `unidades_tiempo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidades_tiempo` (
  `id_unidades_tiempo` int(10) unsigned NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_unidades_tiempo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidades_tiempo`
--

LOCK TABLES `unidades_tiempo` WRITE;
/*!40000 ALTER TABLE `unidades_tiempo` DISABLE KEYS */;
INSERT INTO `unidades_tiempo` VALUES (1,'DAY'),(2,'WEEK'),(3,'MONTH');
/*!40000 ALTER TABLE `unidades_tiempo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usuario` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'1','m',NULL,'Test','Test',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'yaftekun'
--
/*!50003 DROP PROCEDURE IF EXISTS `ArmarFixture` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `ArmarFixture`(IN v_id_torneo_IN BIGINT)
BEGIN
	/*
    DECLARE v_idasignacion_en_grupo_por_ronda BIGINT UNSIGNED;
	DECLARE v_id_tipo_competencia, v_idgrupo, v_cant_grupos, v_puesto_equipo_a, v_puesto_equipo_b, v_cant_participantes_grupo, v_cant_participantes_torneo INT UNSIGNED;
	DECLARE v_ida_y_vuelta, v_asignar_por_sorteo BIT;
    DECLARE salir bit default 0;
    DECLARE cont_equipos_desde int;
    */
    DECLARE v_id_grupo_por_ronda, v_id_ronda bigint unsigned;
    DECLARE v_id_tipo_competencia, v_id_grupo, v_puesto_equipo_a, v_puesto_equipo_b, v_cant_participantes_grupo, v_id_equipo_LIBERADOR, v_equipo_a_LIBERAR int unsigned;
    DECLARE v_hay_juego_libre boolean;
    DECLARE salir bit default 0;
    DECLARE v_CantFechas, v_CantEncPorFecha, v_ContFecha, v_ContEncuentro, v_PrimerEquipo, v_UltimoEquipo, v_EquipoA, v_EquipoB int;
    
    DECLARE config_torneo CURSOR FOR 
		select gr.id_grupo_por_ronda, gr.id_ronda, gr.id_grupo, gr.id_tipo_competencia , ag.puesto_equipo_a, ag.puesto_equipo_b, gr.cant_participantes
		from grupo_por_ronda gr
		inner join asignacion_en_grupo_por_ronda ag on gr.id_grupo_por_ronda=ag.id_grupo_por_ronda
		where gr.id_torneo=v_id_torneo_IN
        #where gr.id_torneo=75
		order by gr.id_grupo_por_ronda;
        
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET salir = 1;

	OPEN config_torneo;
    
    FETCH config_torneo INTO v_id_grupo_por_ronda, v_id_ronda, v_id_grupo, v_id_tipo_competencia , v_puesto_equipo_a, v_puesto_equipo_b, v_cant_participantes_grupo;
    
    WHILE salir = 0 DO
		if v_id_tipo_competencia = 1 then
#################inserto registros todos contra todos
			set v_hay_juego_libre=mod(v_cant_participantes_grupo,2)=1;
			
            if v_hay_juego_libre then 
				set v_cant_participantes_grupo:=v_cant_participantes_grupo + 1; 
                set v_puesto_equipo_b:=v_puesto_equipo_b + 1; 
                set v_id_equipo_LIBERADOR=(select numero_equipo_asignado_torneo from equipo_por_torneo where id_torneo = v_id_torneo_IN and id_equipo = 0 limit 1);
                select v_cant_participantes_grupo, v_id_equipo_LIBERADOR, v_cant_participantes_grupo;
			end if;
            
			set v_CantFechas:=v_cant_participantes_grupo - 1;
			set v_CantEncPorFecha:=v_cant_participantes_grupo / 2;
			set v_ContFecha=2;
			set v_ContEncuentro=1;
			set v_PrimerEquipo=v_puesto_equipo_a;
			set v_UltimoEquipo=v_puesto_equipo_b;
			set v_EquipoA=v_puesto_equipo_a;
			set v_EquipoB=v_puesto_equipo_a + 1;

			DROP TEMPORARY TABLE IF EXISTS Fechas1; 
			CREATE TEMPORARY TABLE IF NOT EXISTS Fechas1 (idpartido int, equipoA int, equipoB int, NroFecha int) ENGINE=Memory;

			insert into Fechas1 (idpartido, equipoA, equipoB, NroFecha)
			select fila, equipoA, equipoB, NroFecha
			from (
				select 1 equipoA, 2 equipoB, 1 NroFecha, @Fila:=@Fila+1 as fila from equipo_por_torneo a, (select @Fila:=0) r where a.id_torneo=v_id_torneo_IN and @Fila<v_CantEncPorFecha
                #select 1 equipoA, 2 equipoB, 1 NroFecha, @Fila:=@Fila+1 as fila from equipo_por_torneo a, (select @Fila:=0) r where a.id_torneo=75 and @Fila<5
				) t;
			
            DROP TEMPORARY TABLE IF EXISTS tmpTable; 
			CREATE TEMPORARY TABLE IF NOT EXISTS tmpTable ENGINE=Memory AS 
			(select Fechas1.*, @RegA:=@RegA-1 valorA, @RegB:=@RegB+1 valorB from Fechas1, (select @RegA:=v_UltimoEquipo+2)  as ta, (select @RegB:=1) tb where NroFecha=1);
            #select Fechas1.*, @RegA:=@RegA-1 valorA, @RegB:=@RegB+1 valorB from Fechas1, (select @RegA:=10+2)  as ta, (select @RegB:=1) tb where NroFecha=1;
			
			update Fechas1 f
			inner join 
				tmpTable t
			on f.idpartido=t.idpartido
			set
				f.equipoA=t.valorA,
				f.equipoB=t.valorB
			where f.idpartido >1;

			while v_ContFecha<=v_CantFechas do ##Cada fecha de la segunda en adelante
				while v_ContEncuentro<=v_CantEncPorFecha do ##Cada partido.
					if v_ContEncuentro=1 then
						set v_equipoA = 1;
						set v_EquipoB = v_UltimoEquipo + 2 - v_ContFecha;
					else
						if v_ContEncuentro=v_CantEncPorFecha then
							set v_equipoA=(select equipoB from Fechas1 where NroFecha=v_ContFecha - 1 and idpartido=v_CantEncPorFecha); #ultimo partido de la fecha anterior
						else
							set v_equipoA=(select equipoA from Fechas1 where NroFecha=v_ContFecha - 1 and idpartido=v_ContEncuentro + 1); #proximo partido en la fecha anterior
						end if;
						set v_equipoB=(select equipoB from Fechas1 where NroFecha=v_ContFecha - 1 and idpartido= v_ContEncuentro - 1);
					end if;

					insert into Fechas1 (idpartido, equipoA, equipoB, NroFecha) values (v_ContEncuentro, v_EquipoA, v_EquipoB, v_ContFecha);
					
                    set v_ContEncuentro=v_ContEncuentro+1;
				end while;
				   
				set v_ContEncuentro=1;
				set v_ContFecha=v_ContFecha+1;
			
			end while;
            
            select * from Fechas1;
            
            if v_hay_juego_libre then
				set v_equipo_a_LIBERAR=(select max(equipoA) From Fechas1);
				update Fechas1 set equipoA = v_id_equipo_LIBERADOR where equipoA=v_equipo_a_LIBERAR;
                
                set v_equipo_a_LIBERAR=(select max(equipoB) From Fechas1);
                update Fechas1 set equipoB = v_id_equipo_LIBERADOR where equipoB=v_equipo_a_LIBERAR;
            end if;
            
            select v_equipo_a_LIBERAR, v_id_equipo_LIBERADOR;
            
            insert into fixture 
				       (id_torneo,   id_ronda, id_sede,   id_grupo, id_equipoa, id_equipob, fecha_evento, tantosa, tantosb, ganador_por_sorteo, son_posiciones, nro_fecha, id_encuentro_fecha)
            select v_id_torneo_IN, v_id_ronda,      1, v_id_grupo,    equipoA,    equipoB, 		  null,	   null,    null,                  0,              0,  NroFecha, idpartido
            from Fechas1 
            order by NroFecha, idpartido;
                        
            
                        
            DROP TEMPORARY TABLE IF EXISTS Fechas1;
			DROP TEMPORARY TABLE IF EXISTS tmpTable;
###########################################################################

        end if;
        
		FETCH config_torneo INTO v_id_grupo_por_ronda, v_id_ronda, v_id_grupo, v_id_tipo_competencia , v_puesto_equipo_a, v_puesto_equipo_b, v_cant_participantes_grupo;
	END WHILE;
    CLOSE config_torneo;
	
               
            # select FLOOR(RAND() * (<max> - <min> + 1)) + <min> aleatorio en un rango inclusive.
            
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `calendario_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `calendario_consulta`()
begin
		select id_encuentro, fecha_evento FROM fixture where fecha_evento is not null;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `calendario_edita_fecha` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `calendario_edita_fecha`(IN id_encuentro_IN bigint, IN fechaevento_IN datetime)
begin
		update fixture set fechaevento = fechaevento_IN
        where id_encuentro = id_encuentro_IN;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DuplicarPlantillaTorneo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `DuplicarPlantillaTorneo`(v_id_pla_torneo_IN int)
begin
	declare v_id_pla_torneo, v_id_pla_ronda , v_id_pla_grupo, v_id_pla_asignacion_en_grupo_por_ronda int;

	insert into pla_torneo (id_liga, nombre_plantilla, nombre_torneo, cant_participantes, duracion, id_unidades_tiempo)
	select t.id_liga, t.nombre_plantilla, t.nombre_torneo, t.cant_participantes, t.duracion, t.id_unidades_tiempo from pla_torneo t where t.id_pla_torneo=v_id_pla_torneo_IN;

	SELECT LAST_INSERT_ID() into v_id_pla_torneo;
#select v_id_pla_torneo;
	insert into pla_ronda (id_pla_torneo, nombre_ronda, cant_grupos)
	select v_id_pla_torneo, r.nombre_ronda, r.cant_grupos from pla_ronda r inner join pla_torneo t on r.id_pla_torneo=t.id_pla_torneo where t.id_pla_torneo=v_id_pla_torneo_IN;

	SELECT LAST_INSERT_ID() into v_id_pla_ronda;
#select v_id_pla_ronda;
	insert into pla_grupo (id_pla_torneo, id_pla_ronda, nombre_grupo, id_tipo_competencia, ida_y_vuelta)
	select v_id_pla_torneo, v_id_pla_ronda, g.nombre_grupo, g.id_tipo_competencia, g.ida_y_vuelta from pla_grupo g inner join pla_torneo t on g.id_pla_torneo=t.id_pla_torneo where t.id_pla_torneo=v_id_pla_torneo_IN;

	SELECT LAST_INSERT_ID() into v_id_pla_grupo;
#select v_id_pla_grupo;

	insert into pla_asignacion_en_grupo_por_ronda (id_pla_torneo, id_pla_ronda, id_pla_grupo, nro_equipo_a, nro_equipo_b)
	select v_id_pla_torneo, v_id_pla_ronda, v_id_pla_grupo, a.nro_equipo_a, a.nro_equipo_b from pla_asignacion_en_grupo_por_ronda a inner join pla_torneo t on a.id_pla_torneo=t.id_pla_torneo where t.id_pla_torneo=v_id_pla_torneo_IN;
    
    SELECT LAST_INSERT_ID() into v_id_pla_asignacion_en_grupo_por_ronda;
#SELECT v_id_pla_asignacion_en_grupo_por_ronda;

	select v_id_pla_torneo;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `equipo_alta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `equipo_consulta`(
	IN id_equipo_IN BIGINT,
    IN Id_liga_IN BIGINT,
    IN nombre_IN varchar(100),
    IN row_count_IN int,
    IN offset_IN int
)
BEGIN


    if (nombre_IN is null) 
    then
		Select id_equipo, id_liga, nombre, id_estadio, id_usuario, fecha_creacion, imagen
		from equipo
		where (id_liga = Id_liga_IN or Id_liga_IN IS NULL)
			AND ( id_equipo = id_equipo_IN or id_equipo_IN IS NULL ) 
			AND ( nombre like concat('%', nombre_IN ,'%') or nombre_IN IS NULL ) 
		order by id_equipo DESC
		LIMIT row_count_IN OFFSET offset_IN;
	else
		Select id_equipo, nombre
		from equipo
		where  nombre like concat('%', nombre_IN ,'%')
		order by nombre DESC
		LIMIT row_count_IN OFFSET offset_IN;
    end if;

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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `estadio_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `estadio_consulta`(
)
BEGIN
	
    SELECT 
		id_estadio,
		nombre,
		calle,
		numero,
		codpostal,
		localidad,
		provincia,
		telefono,
		id_usuario,
		fecha_creacion
    FROM estadio
    order by nombre;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `fixture_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `fixture_consulta`(IN id_torneo_IN BIGINT)
BEGIN
SELECT `fixture`.`id_encuentro`,
    `fixture`.`id_torneo`,
    `fixture`.`id_ronda`,
    `fixture`.`id_sede`,
    `fixture`.`id_grupo`,
    `fixture`.`id_equipoa`,
    `fixture`.`id_equipob`,
    `fixture`.`fecha_evento`,
    `fixture`.`tantosa`,
    `fixture`.`tantosb`,
    `fixture`.`ganador_por_sorteo`,
    `fixture`.`son_posiciones`,
    `fixture`.`nro_fecha`,
    `fixture`.`id_encuentro_fecha`
FROM `yaftekun`.`fixture`
WHERE id_torneo = id_torneo_IN;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `generar_torneo_desde_plantilla` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `generar_torneo_desde_plantilla`(id_pla_torneo_IN int)
begin

	DECLARE v_id_torneo, v_id_liga, v_id_ronda, v_id_grupo_por_ronda bigint;
	DECLARE v_nombre_torneo, v_nombre_ronda varchar(45);
	DECLARE v_cant_participantes, v_duracion, v_id_unidades_tiempo, v_cant_grupos, v_nro_equipo, v_liberado int;
	DECLARE v_inicio, v_fin datetime;


    select id_liga,   nombre_torneo,   cant_participantes,   duracion,   id_unidades_tiempo
    into v_id_liga, v_nombre_torneo, v_cant_participantes, v_duracion, v_id_unidades_tiempo 
    from pla_torneo 
    where id_pla_torneo=id_pla_torneo_IN;
    
    set v_inicio = now() + interval 1 DAY;

	select case v_id_unidades_tiempo
		when 1 then v_inicio + interval v_duracion DAY 
		when 2 then v_inicio + interval v_duracion WEEK 
		when 3 then v_inicio + interval v_duracion MONTH 
	end
	into v_fin; 
    
	insert into torneo 
		    (id_liga, id_tipo_modalidad,            anio,          nombre,     cantidad_equipos, id_usuario, fecha_creacion, fecha_inicio, fecha_fin)
	select v_id_liga,                 1, YEAR(CURDATE()), v_nombre_torneo, v_cant_participantes,          1,          NOW(),     v_inicio,     v_fin;

	SELECT LAST_INSERT_ID() into v_id_torneo;

	if mod(v_cant_participantes,2)=1 then
		set v_liberado=1;
		set v_cant_participantes = v_cant_participantes + 1;
	else
		set v_liberado=0;
	end if;

	set v_nro_equipo = 1;
	while v_nro_equipo <=v_cant_participantes do
		if (v_liberado=1 and (v_nro_equipo = v_cant_participantes)) then 
			insert into equipo_por_torneo (id_torneo, id_equipo, numero_equipo_asignado_torneo) values(v_id_torneo, 0,  v_nro_equipo);
        else
			insert into equipo_por_torneo (id_torneo, id_equipo, numero_equipo_asignado_torneo) values(v_id_torneo, null,  v_nro_equipo);
        end if;
        set v_nro_equipo = v_nro_equipo + 1;
    end while;

	INSERT INTO ronda 
            (id_torneo,       nombre,   id_modalidad, cant_grupos)
    select v_id_torneo, nombre_ronda, 0 id_modalidad, cant_grupos
	from pla_ronda p 
	where p.id_pla_torneo = id_pla_torneo_IN
	order by p.id_pla_ronda;
    
    SELECT LAST_INSERT_ID() into v_id_ronda;
    
    insert into grupo (nombre)
    select p.nombre_grupo
    from pla_ronda r 
    inner join pla_grupo p on r.id_pla_ronda = p.id_pla_ronda
    left join grupo g on g.nombre = p.nombre_grupo
    where p.id_pla_torneo = id_pla_torneo_IN and
		g.nombre is null;
    
    INSERT INTO grupo_por_ronda 
		    (id_torneo,   id_ronda,   id_tipo_competencia,   id_grupo,   ida_y_vuelta, cant_participantes)
	select v_id_torneo, v_id_ronda, p.id_tipo_competencia, g.id_grupo, p.ida_y_vuelta, a.nro_equipo_b - a.nro_equipo_a + 1 Cant_Participantes
    from pla_ronda r 
    inner join pla_grupo p on r.id_pla_ronda = p.id_pla_ronda
    inner join pla_asignacion_en_grupo_por_ronda a on p.id_pla_torneo = a.id_pla_torneo and p.id_pla_ronda = a.id_pla_ronda and p.id_pla_grupo = a.id_pla_grupo
    inner join grupo g on p.nombre_grupo = g.nombre
    where p.id_pla_torneo = id_pla_torneo_IN
	order by p.id_pla_grupo;

    SELECT LAST_INSERT_ID() into v_id_grupo_por_ronda;

	insert into asignacion_en_grupo_por_ronda 
		    (id_grupo_por_ronda, puesto_equipo_a, puesto_equipo_b, referencia_es_equipo, asignar_por_sorteo)
    select v_id_grupo_por_ronda,  p.nro_equipo_a,  p.nro_equipo_b,                    0,                  0
    from pla_asignacion_en_grupo_por_ronda p
    where p.id_pla_torneo = id_pla_torneo_IN;

	select v_id_torneo as id_torneo;
end ;;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
	IN id_tipo_participante_IN int(10),
    IN nombre_archivo_foto_IN varchar(100),
	IN nombre_IN varchar(100),
	IN apellido_IN varchar(100),
	IN numero_camiseta_IN varchar(2),
	IN id_tipo_posicion_juego_IN int,
	IN id_tipo_estado_jugador_IN int,
	IN numero_carnet_socio_IN int,
	IN id_equipo_IN bigint(10), 
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
	IN id_tipo_estado_civil_IN int,
	IN conyuge_nombre_IN varchar(50),
	IN id_tipo_doc_IN int,
	IN nro_doc_IN varchar(8),
	IN cobertura_medica_IN varchar(50),
	IN fecha_apto_medico_IN datetime,
    IN nombre_archivo_apto_medico_IN varchar(100),
	IN id_usuario_IN int
)
BEGIN
	
	declare id_participante_V bigint;  

	insert into participante 
	(id_tipo_participante   ,nombre   ,apellido   ,numero_camiseta   ,id_tipo_posicion_juego   ,id_tipo_estado_jugador   ,numero_carnet_socio   ,trayectoria   ,telefono   ,telefono_celular   ,telefono_radio   ,email   ,fecha_nacimiento   ,calle   ,piso   ,numero   ,depto   ,codpostal   ,id_provincia   ,localidad   ,nacionalidad   ,id_tipo_estado_civil   ,conyuge_nombre   ,id_tipo_doc   ,nro_doc   ,cobertura_medica   ,fecha_apto_medico   ,nombre_archivo_foto   , nombre_archivo_apto_medico   , fecha_creacion ,id_usuario) VALUES
	(id_tipo_participante_IN,nombre_IN,apellido_IN,numero_camiseta_IN,id_tipo_posicion_juego_IN,id_tipo_estado_jugador_IN,numero_carnet_socio_IN,trayectoria_IN,telefono_IN,telefono_celular_IN,telefono_radio_IN,email_IN,fecha_nacimiento_IN,calle_IN,piso_IN,numero_IN,depto_IN,codpostal_IN,id_provincia_IN,localidad_IN,nacionalidad_IN,id_tipo_estado_civil_IN,conyuge_nombre_IN,id_tipo_doc_IN,nro_doc_IN,cobertura_medica_IN,fecha_apto_medico_IN,nombre_archivo_foto_IN, nombre_archivo_apto_medico_IN,now()         ,id_usuario_IN );
	            
    set id_participante_V = LAST_INSERT_ID();
	
	if id_equipo_IN > 0 then 
		
        INSERT INTO equipo_integrante 
			(id_equipo   ,id_participante, id_tipo_participante) VALUES
			(id_equipo_IN,id_participante_V, id_tipo_participante_IN);

	 end if; 

	select id_participante_V as id_participante;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
    IN id_equipo_IN BIGINT,
    IN id_tipo_participante_IN INT,
    IN nombre_apellido_IN varchar(100),
    IN row_count_IN int,
    IN offset_IN int
)
BEGIN

	if (nombre_apellido_IN is null) 
    then
		set row_count_IN = ifnull(row_count_IN,10);
		set offset_IN = ifnull(offset_IN,0);
		Select p.id_participante, p.id_tipo_participante, e.id_equipo, p.nombre, p.apellido,p.numero_camiseta,p.id_tipo_posicion_juego,p.id_tipo_estado_jugador,
				p.numero_carnet_socio,p.trayectoria,p.telefono,p.telefono_celular,
				p.telefono_radio,p.email,p.fecha_nacimiento,p.calle,p.piso,
				p.numero,p.depto,p.codpostal,p.id_provincia,p.localidad,p.nacionalidad,p.id_tipo_estado_civil,p.conyuge_nombre,p.id_tipo_doc,p.nro_doc,
				p.cobertura_medica,p.fecha_apto_medico,p.nombre_archivo_foto,p.nombre_archivo_apto_medico,p.fecha_creacion,p.id_usuario,
				e.nombre as 'nombre_equipo'
		
		from participante p 
		left join equipo_integrante ei on ei.id_participante = p.id_participante
		left join equipo e on e.id_equipo = ei.id_equipo	
			
		where (p.id_participante = id_participante_IN OR id_participante_IN is null )
			AND (ei.id_equipo = id_equipo_IN OR id_equipo_IN is null)	
			AND (p.id_tipo_participante = id_tipo_participante_IN OR id_tipo_participante_IN is null)
			
		order by p.id_participante DESC
		LIMIT row_count_IN OFFSET offset_IN;
	else
		Select p.id_participante, p.apellido, p.nombre
		from participante p
		where (p.apellido like concat('%', nombre_apellido_IN ,'%') or p.nombre like concat('%', nombre_apellido_IN ,'%')) and (p.id_tipo_participante = id_tipo_participante_IN OR id_tipo_participante_IN is null )
		order by p.apellido DESC;
    end if;
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
	IN nombre_archivo_foto_IN varchar(100),
	IN nombre_IN varchar(100),
	IN apellido_IN varchar(100),
	IN numero_camiseta_IN varchar(2),
	IN id_tipo_posicion_juego_IN int,
	IN id_tipo_estado_jugador_IN int,
	IN numero_carnet_socio_IN int,
    IN id_equipo_IN bigint,
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
	IN id_tipo_estado_civil_IN int,
	IN conyuge_nombre_IN varchar(50),
	IN id_tipo_doc_IN int,
	IN nro_doc_IN varchar(8),
	IN cobertura_medica_IN varchar(50),
	IN fecha_apto_medico_IN datetime,
    IN nombre_archivo_apto_medico_IN varchar(100),
	IN id_usuario_IN int unsigned
)
BEGIN
/*
	DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
	BEGIN
		ROLLBACK;
		SELECT 'Error, no se pudo guardar los datos.' as Error;
	END;
   
	START TRANSACTION;
*/
	UPDATE participante
    SET
		id_tipo_participante = id_tipo_participante_IN,
		nombre = nombre_IN ,
		apellido = apellido_IN ,
		numero_camiseta =  numero_camiseta_IN , 
		id_tipo_posicion_juego = id_tipo_posicion_juego_IN ,
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
		id_tipo_estado_civil = id_tipo_estado_civil_IN ,
		conyuge_nombre = conyuge_nombre_IN ,
		id_tipo_doc = id_tipo_doc_IN ,
		nro_doc = nro_doc_IN ,
		cobertura_medica = cobertura_medica_IN ,
        fecha_apto_medico = fecha_apto_medico_IN,
        nombre_archivo_foto = nombre_archivo_foto_IN,
        nombre_archivo_apto_medico = nombre_archivo_apto_medico_IN,
		id_usuario = id_usuario_IN 
	where 
		id_participante = id_participante_IN;
        /*
	if id_equipo_IN is not null then
		if (select count(*) from equipo_integrante where id_participante = id_participante_IN) = 1 then
			update equipo_integrante set
				id_equipo = id_equipo_IN
			where id_participante = id_participante_IN; 
        end if;
    end if;
    
    COMMIT;
    */
    select * from participante
	where id_participante = id_participante_IN;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ponerNrosFecha` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `ponerNrosFecha`(IN v_torneo BIGINT)
BEGIN
	
    DECLARE v_id_encuentro, v_id_equipoa, v_id_equipob, v_nro_fecha BIGINT UNSIGNED;
    DECLARE salir bit default 0;
    
	DECLARE config_torneo CURSOR FOR 
	select f.id_encuentro, f.id_equipoa, f.id_equipob
	from fixture f
	where f.id_torneo=v_torneo
	order by f.id_encuentro;
    
    DECLARE CONTINUE HANDLER FOR NOT FOUND SET salir = 1;
    
    OPEN config_torneo;
    
    FETCH config_torneo INTO v_id_encuentro, v_id_equipoa, v_id_equipob;
    
    WHILE salir = 0 DO

		set v_nro_fecha = (select coalesce(max(nro_fecha),0)+1
		from fixture
		where (id_equipoa in (v_id_equipoa, v_id_equipob) or id_equipob in (v_id_equipoa, v_id_equipob)) and id_torneo = v_torneo);
        
		update fixture set
			nro_fecha =v_nro_fecha
		where id_encuentro=v_id_encuentro;
        
        FETCH config_torneo INTO v_id_encuentro, v_id_equipoa, v_id_equipob;
        
	END WHILE;
    CLOSE config_torneo;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 DROP PROCEDURE IF EXISTS `tipo_modalidad_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_modalidad_consulta`()
BEGIN
	select * from tipo_modalidad;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_participante_consulta`()
BEGIN
	select id_tipo_participante, descripcion
    from tipo_participante;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tipo_posicion_juego_consulta` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `tipo_posicion_juego_consulta`()
BEGIN
	select id_tipo_posicion_juego, descripcion
    from tipo_posicion_juego;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_alta`(

	IN id_liga_IN INT,
    IN anio_IN smallint(4),
    IN id_tipo_modalidad_IN smallint(4),
	IN nombre_IN varchar(200),
    IN cantidad_equipos_IN varchar(200),
    IN id_usuario_IN int

)
BEGIN

	insert into torneo (id_liga, id_tipo_modalidad, nombre, anio, cantidad_equipos, id_usuario,fecha_creacion) 
				values (id_liga_IN, id_tipo_modalidad_IN, nombre_IN, anio_IN , cantidad_equipos_IN, id_usuario_IN, now() );
    Select LAST_INSERT_ID() as id_torneo;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `torneo_asignar_equipo_real` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `torneo_asignar_equipo_real`(in v_id_torneo_IN bigint, in v_id_equipo_IN bigint, in v_numero_equipo_asignado_torneo_IN int)
begin
	update equipo_por_torneo
		set id_equipo = v_id_equipo_IN
	where 
		id_torneo = v_id_torneo_IN and 
        numero_equipo_asignado_torneo = v_numero_equipo_asignado_torneo_IN and
        ifnull(id_equipo,1) != 0;
end ;;
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

	declare v_nombre_grupo varchar(50);

	delete a.*
    from asignacion_en_grupo_por_ronda a
    inner join grupo_por_ronda g on a.id_grupo_por_ronda=g.id_grupo_por_ronda
    where id_torneo = id_torneo_IN;

	drop temporary table if exists nombres_de_grupo;
    
	create temporary table nombres_de_grupo engine=Memory as ( 
		select n.nombre
		from grupo_por_ronda g
		inner join grupo n on g.id_grupo = n.id_grupo
	);

	delete from grupo_por_ronda where id_torneo = id_torneo_IN;
    
    delete g.*
    from grupo g
    inner join nombres_de_grupo n on g.nombre=n.nombre
    left join grupo_por_ronda gr on g.id_grupo=gr.id_grupo
    where gr.id_grupo is null;
    
	delete from ronda where id_torneo = id_torneo_IN ;

	delete from equipo_por_torneo where id_torneo = id_torneo_IN;

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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_consulta`(

	IN id_torneo_IN bigint , 
    IN anio_IN INT,
	IN nombre_IN varchar(200),
    IN row_count_IN int,
    IN offset_IN int
)
BEGIN

	set row_count_IN = ifnull(row_count_IN,10);
    set offset_IN = ifnull(offset_IN,0);

	
    IF anio_IN is null THEN 
		SET anio_IN  = year(now()) ;
	END IF;

	IF nombre_IN is null then
		Select id_liga, id_torneo, id_tipo_modalidad, anio, nombre, 
		cantidad_equipos, id_usuario, fecha_creacion
		from torneo t
		where ((id_torneo = id_torneo_IN OR id_torneo_IN is null )
			  AND anio = anio_IN)
		order by t.id_torneo DESC
		LIMIT row_count_IN OFFSET offset_IN;
	ELSE
		Select id_torneo, nombre
		from torneo t
		where nombre like concat('%', nombre_IN, '%')
		order by t.id_torneo DESC
		LIMIT row_count_IN OFFSET offset_IN;
	END IF;
    
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
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`127.0.0.1` PROCEDURE `torneo_editar`(


	##IN id_liga_IN INT,
    IN id_torneo_IN INT,
    IN anio_IN smallint(4),
	IN id_tipo_modalidad_IN smallint(4),
	IN nombre_IN varchar(200),
    IN cantidad_equipos_IN varchar(200),
    IN id_usuario_IN int

)
BEGIN


	UPDATE torneo 
    SET  
		anio = anio_IN,
        id_tipo_modalidad = id_tipo_modalidad_IN,
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
/*!50003 DROP PROCEDURE IF EXISTS `torneo_obtener_equipo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`%` PROCEDURE `torneo_obtener_equipo`(in v_id_torneo_IN bigint, v_NombreEquipoNoAsignado varchar(100), v_NombreEquipoLiberado varchar(100))
begin
	select et.numero_equipo_asignado_torneo numero, ifnull(if(et.id_equipo=0, v_NombreEquipoLiberado,e.nombre),concat('',et.numero_equipo_asignado_torneo,'', v_NombreEquipoNoAsignado)) descripcion, imagen
	from equipo_por_torneo et
	left join equipo e on et.id_equipo=e.id_equipo
	where id_torneo = v_id_torneo_IN;
end ;;
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

-- Dump completed on 2016-08-10 15:40:01
