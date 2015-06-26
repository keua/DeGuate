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
-- Table structure for table `IMAGEN`
--

DROP TABLE IF EXISTS `IMAGEN`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `IMAGEN` (
  `IMAGEN` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IMAGEN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `IMAGEN`
--

LOCK TABLES `IMAGEN` WRITE;
/*!40000 ALTER TABLE `IMAGEN` DISABLE KEYS */;
INSERT INTO `IMAGEN` (`IMAGEN`, `DESCRIPCION`, `URL`) VALUES (-1,'DEFECTO','./IMAGES/DEFECTO.jpg'),(3,'artesania1','../IMAGES/Aretsania1.jpg'),(4,'a2','../IMAGES/Artesania2.jpg'),(5,'Mantos','../IMAGES/Mantos.JPG');
/*!40000 ALTER TABLE `IMAGEN` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER ELIMINAR_IMAGEN
AFTER UPDATE
   ON IMAGEN FOR EACH ROW
   
BEGIN

	UPDATE IMG_PROD IP,IMAGEN I
    SET IP.IMAGEN = -1
    WHERE IP.IMAGEN = I.IMAGEN 
    AND I.URL = 'ELIMINAR';
    
    UPDATE RED_SOCIAL RS,IMAGEN I
    SET RS.IMAGEN = -1
    WHERE RS.IMAGEN = I.IMAGEN 
    AND I.URL = 'ELIMINAR';
    
    UPDATE CATEGORIA C,IMAGEN I
    SET C.IMAGEN = -1
    WHERE C.IMAGEN = I.IMAGEN 
    AND I.URL = 'ELIMINAR';
    
    UPDATE IMG_EMPRESA IE,IMAGEN I
    SET IE.IMAGEN = -1
    WHERE IE.IMAGEN = I.IMAGEN 
    AND I.URL = 'ELIMINAR';
    
    UPDATE MARCA M,IMAGEN I
    SET M.IMAGEN = -1
    WHERE M.IMAGEN = I.IMAGEN 
    AND I.URL = 'ELIMINAR';
    
    UPDATE TIENDA T,IMAGEN I
    SET T.IMAGEN = -1
    WHERE T.IMAGEN = I.IMAGEN 
    AND I.URL = 'ELIMINAR';
    
   
END */;;
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

-- Dump completed on 2015-06-25 22:17:37
