-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: localhost    Database: de_guate_artesanias_db
-- ------------------------------------------------------
-- Server version	5.6.24-enterprise-commercial-advanced-log

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `ADMINISTRADOR` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(50) DEFAULT NULL,
  `PASS` binary(16) DEFAULT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ADMINISTRADOR`),
  UNIQUE KEY `USUARIO` (`USUARIO`),
  KEY `fk_ADMINISTRADOR_EMPRESA1_idx` (`EMPRESA`),
  CONSTRAINT `fk_ADMINISTRADOR_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'admin','!#/)zW¥§C‰JJ€Ã',1);
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `CATEGORIA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `IMAGEN` int(11) NOT NULL,
  PRIMARY KEY (`CATEGORIA`,`IMAGEN`),
  KEY `fk_CATEGORIA_IMAGEN1_idx` (`IMAGEN`),
  CONSTRAINT `fk_CATEGORIA_IMAGEN1` FOREIGN KEY (`IMAGEN`) REFERENCES `imagen` (`IMAGEN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (-1,'DEFECTO',-1),(1,'BLUSAS  ',-1),(2,'COLLARES',4);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER ELIMINAR_CAT
AFTER UPDATE
   ON CATEGORIA FOR EACH ROW
   
BEGIN
   
    UPDATE PROD_CAT PC,CATEGORIA C
    SET PC.CATEGORIA = -1
    WHERE PC.CATEGORIA = C.CATEGORIA 
    AND C.NOMBRE = 'ELIMINAR';
   
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  `NOMBRE` varchar(50) DEFAULT NULL,
  `SLOGAN` varchar(250) DEFAULT NULL,
  `MISION` varchar(250) DEFAULT NULL,
  `VISION` varchar(250) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `NOVEDADES` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`EMPRESA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'ARTESANIAS','DE GUATEMALA','MISION','VISION','DESCRIPCION',8989898,'GUATEMALA','CORREO@CORREO.COM','NOVEDADES');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagen` (
  `IMAGEN` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(50) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`IMAGEN`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen`
--

LOCK TABLES `imagen` WRITE;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
INSERT INTO `imagen` VALUES (-1,'DEFECTO','./IMAGES/DEFECTO.jpg'),(3,'artesania1','../IMAGES/Aretsania1.jpg'),(4,'a2','../IMAGES/Artesania2.jpg'),(5,'Mantos','../IMAGES/Mantos.JPG');
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;
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

--
-- Temporary view structure for view `imagenes_empresa`
--

DROP TABLE IF EXISTS `imagenes_empresa`;
/*!50001 DROP VIEW IF EXISTS `imagenes_empresa`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `imagenes_empresa` AS SELECT 
 1 AS `IMAGEN`,
 1 AS `TIPO`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `imagenes_rs`
--

DROP TABLE IF EXISTS `imagenes_rs`;
/*!50001 DROP VIEW IF EXISTS `imagenes_rs`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `imagenes_rs` AS SELECT 
 1 AS `IMAGEN`,
 1 AS `LINK`,
 1 AS `RED`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `img_empresa`
--

DROP TABLE IF EXISTS `img_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_empresa` (
  `TIPO` int(11) NOT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  `IMAGEN` int(11) NOT NULL,
  PRIMARY KEY (`TIPO`),
  KEY `fk_IMG_EMPRESA_EMPRESA1_idx` (`EMPRESA`),
  KEY `fk_IMG_EMPRESA_IMAGEN1_idx` (`IMAGEN`),
  CONSTRAINT `fk_IMG_EMPRESA_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_IMG_EMPRESA_IMAGEN1` FOREIGN KEY (`IMAGEN`) REFERENCES `imagen` (`IMAGEN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_empresa`
--

LOCK TABLES `img_empresa` WRITE;
/*!40000 ALTER TABLE `img_empresa` DISABLE KEYS */;
INSERT INTO `img_empresa` VALUES (1,1,-1),(2,1,-1),(3,1,3),(4,1,4),(5,1,4);
/*!40000 ALTER TABLE `img_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img_prod`
--

DROP TABLE IF EXISTS `img_prod`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img_prod` (
  `PRODUCTO` int(11) NOT NULL,
  `IMAGEN` int(11) NOT NULL,
  PRIMARY KEY (`PRODUCTO`,`IMAGEN`),
  KEY `fk_IMG_PROD_IMAGEN1_idx` (`IMAGEN`),
  CONSTRAINT `fk_IMG_PROD_IMAGEN1` FOREIGN KEY (`IMAGEN`) REFERENCES `imagen` (`IMAGEN`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_IMG_PROD_PRODUCTO1` FOREIGN KEY (`PRODUCTO`) REFERENCES `producto` (`PRODUCTO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img_prod`
--

LOCK TABLES `img_prod` WRITE;
/*!40000 ALTER TABLE `img_prod` DISABLE KEYS */;
INSERT INTO `img_prod` VALUES (1,-1),(4,-1),(2,4),(3,4),(5,4),(6,4);
/*!40000 ALTER TABLE `img_prod` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `MARCA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  `IMAGEN` int(11) NOT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`MARCA`,`IMAGEN`),
  KEY `fk_MARCA_EMPRESA1_idx` (`EMPRESA`),
  KEY `fk_MARCA_IMAGEN1_idx` (`IMAGEN`),
  CONSTRAINT `fk_MARCA_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_MARCA_IMAGEN1` FOREIGN KEY (`IMAGEN`) REFERENCES `imagen` (`IMAGEN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'TOTONICAPAN',1,-1,'BLUSAS HECHAS A MANO EN TOTONICAPAN'),(2,'ZACAPA',1,3,'ES MUY BUENA MARCA'),(3,'TECUN',1,3,'ES MUY BUEN AMARCA'),(4,'HUMAN',1,3,'ES MUY BUENA MARCA');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_cat`
--

DROP TABLE IF EXISTS `prod_cat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_cat` (
  `PRODUCTO` int(11) NOT NULL,
  `CATEGORIA` int(11) NOT NULL,
  PRIMARY KEY (`PRODUCTO`,`CATEGORIA`),
  KEY `fk_PROD_CAT_CATEGORIA1_idx` (`CATEGORIA`),
  CONSTRAINT `fk_PROD_CAT_CATEGORIA1` FOREIGN KEY (`CATEGORIA`) REFERENCES `categoria` (`CATEGORIA`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_PROD_CAT_PRODUCTO` FOREIGN KEY (`PRODUCTO`) REFERENCES `producto` (`PRODUCTO`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_cat`
--

LOCK TABLES `prod_cat` WRITE;
/*!40000 ALTER TABLE `prod_cat` DISABLE KEYS */;
INSERT INTO `prod_cat` VALUES (1,1),(4,1),(2,2),(3,2),(5,2),(6,2);
/*!40000 ALTER TABLE `prod_cat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `PRODUCTO` int(11) NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` varchar(250) DEFAULT NULL,
  `PRECIO` double DEFAULT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`PRODUCTO`),
  KEY `fk_PRODUCTO_EMPRESA1_idx` (`EMPRESA`),
  CONSTRAINT `fk_PRODUCTO_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'BLUSA_DAMA ',' BLUSA DE COLORES  ....',999.99,1),(2,'COLLAR DE JADE','COLLAR HECHO A MANO DE JADE',999.99,1),(3,'COLLAR DE PERLAS','COLLAR HECHO A MANO DE PERLAS',999.99,1),(4,'BLUSA_DIVERS','BLUSA HECHA A MANO',800,1),(5,'COLLAR DE RUBI','COLLAR HECHO A MANO DE RUBI',999.99,1),(6,'COLLAR DE GEMMAS','COLLAR HECHO A MANO DE GEMMAS',999.99,1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!50001 DROP VIEW IF EXISTS `productos`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `productos` AS SELECT 
 1 AS `PRODUCTO`,
 1 AS `DESCRIPCION`,
 1 AS `PRECIO`,
 1 AS `CATEGORIA`,
 1 AS `IMAGEN`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `red_social`
--

DROP TABLE IF EXISTS `red_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red_social` (
  `RED_SOCIAL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  `IMAGEN` int(11) NOT NULL,
  PRIMARY KEY (`RED_SOCIAL`,`IMAGEN`),
  KEY `fk_RED_SOCIAL_EMPRESA1_idx` (`EMPRESA`),
  KEY `fk_RED_SOCIAL_IMAGEN1_idx` (`IMAGEN`),
  CONSTRAINT `fk_RED_SOCIAL_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_RED_SOCIAL_IMAGEN1` FOREIGN KEY (`IMAGEN`) REFERENCES `imagen` (`IMAGEN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red_social`
--

LOCK TABLES `red_social` WRITE;
/*!40000 ALTER TABLE `red_social` DISABLE KEYS */;
INSERT INTO `red_social` VALUES (1,'facebook','https://facebook.com',1,-1),(2,'twiter','https://twiter.com',1,-1),(5,'facebook','https://facebook.com',1,-1),(6,'google','https://www.google.com',1,-1);
/*!40000 ALTER TABLE `red_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tienda`
--

DROP TABLE IF EXISTS `tienda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tienda` (
  `TIENDA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `TELEFONO` int(11) DEFAULT NULL,
  `EMPRESA` int(11) NOT NULL DEFAULT '1',
  `IMAGEN` int(11) NOT NULL,
  `ENLACE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TIENDA`,`IMAGEN`),
  KEY `fk_TIENDA_EMPRESA1_idx` (`EMPRESA`),
  KEY `fk_TIENDA_IMAGEN1_idx` (`IMAGEN`),
  CONSTRAINT `fk_TIENDA_EMPRESA1` FOREIGN KEY (`EMPRESA`) REFERENCES `empresa` (`EMPRESA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_TIENDA_IMAGEN1` FOREIGN KEY (`IMAGEN`) REFERENCES `imagen` (`IMAGEN`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tienda`
--

LOCK TABLES `tienda` WRITE;
/*!40000 ALTER TABLE `tienda` DISABLE KEYS */;
INSERT INTO `tienda` VALUES (1,'TOTONICAPAN','TOTONICAPAN',54545454,1,3,'https://TOTONICAPAN.com'),(2,'COBAN','ES UNA TIENDA HERMOSA A LA QUE PUEDES LLEGAR.',85787454,1,4,'https://COBAN.com');
/*!40000 ALTER TABLE `tienda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `imagenes_empresa`
--

/*!50001 DROP VIEW IF EXISTS `imagenes_empresa`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `imagenes_empresa` AS select `i`.`URL` AS `IMAGEN`,`GET_TIPO`(`ie`.`TIPO`) AS `TIPO` from ((`imagen` `i` join `empresa` `e`) join `img_empresa` `ie`) where ((`i`.`IMAGEN` = `ie`.`IMAGEN`) and (`e`.`EMPRESA` = `ie`.`EMPRESA`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `imagenes_rs`
--

/*!50001 DROP VIEW IF EXISTS `imagenes_rs`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `imagenes_rs` AS select `i`.`URL` AS `IMAGEN`,`rs`.`URL` AS `LINK`,`rs`.`NOMBRE` AS `RED` from ((`imagen` `i` join `red_social` `rs`) join `empresa` `e`) where ((`i`.`IMAGEN` = `rs`.`IMAGEN`) and (`rs`.`EMPRESA` = `e`.`EMPRESA`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `productos`
--

/*!50001 DROP VIEW IF EXISTS `productos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `productos` AS select `p`.`TITULO` AS `PRODUCTO`,`p`.`DESCRIPCION` AS `DESCRIPCION`,`p`.`PRECIO` AS `PRECIO`,`c`.`NOMBRE` AS `CATEGORIA`,`i`.`URL` AS `IMAGEN` from ((((`producto` `p` join `categoria` `c`) join `imagen` `i`) join `prod_cat` `pc`) join `img_prod` `ip`) where ((`p`.`PRODUCTO` = `pc`.`PRODUCTO`) and (`c`.`CATEGORIA` = `pc`.`CATEGORIA`) and (`p`.`PRODUCTO` = `ip`.`PRODUCTO`) and (`i`.`IMAGEN` = `ip`.`IMAGEN`)) order by `p`.`PRODUCTO` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-25 23:09:01
