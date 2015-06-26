CREATE DATABASE  IF NOT EXISTS `DE_GUATE_ARTESANIAS_DB` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `DE_GUATE_ARTESANIAS_DB`;
-- MySQL dump 10.13  Distrib 5.6.24, for linux-glibc2.5 (x86_64)
--
-- Host: localhost    Database: DE_GUATE_ARTESANIAS_DB
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `PRODUCTO`
--

DROP TABLE IF EXISTS `PRODUCTO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCTO` (
  `PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `PRECIO` double DEFAULT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PRODUCTO`),
  KEY `fk_PRODUCTO_EMPRESA1_idx` (`EMPRESA`),
  CONSTRAINT `fk_PRODUCTO_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `EMPRESA` (`EMPRESA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTO`
--

LOCK TABLES `PRODUCTO` WRITE;
/*!40000 ALTER TABLE `PRODUCTO` DISABLE KEYS */;
INSERT INTO `PRODUCTO` (`PRODUCTO`, `TITULO`, `DESCRIPCION`, `PRECIO`, `EMPRESA`) VALUES (1,'BLUSA_DAMA ',' BLUSA DE COLORES  ....',999.99,1),(2,'COLLAR DE JADE','COLLAR HECHO A MANO DE JADE',999.99,1),(3,'COLLAR DE PERLAS','COLLAR HECHO A MANO DE PERLAS',999.99,1),(4,'BLUSA_DIVERS','BLUSA HECHA A MANO',800,1),(5,'COLLAR DE RUBI','COLLAR HECHO A MANO DE RUBI',999.99,1),(6,'COLLAR DE GEMMAS','COLLAR HECHO A MANO DE GEMMAS',999.99,1);
/*!40000 ALTER TABLE `PRODUCTO` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-25 22:17:37