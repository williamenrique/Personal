CREATE DATABASE  IF NOT EXISTS `db_personal` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_personal`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_personal
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.14-MariaDB

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
-- Table structure for table `table_banco`
--

DROP TABLE IF EXISTS `table_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(5) DEFAULT NULL,
  `banco` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_banco`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_banco`
--

LOCK TABLES `table_banco` WRITE;
/*!40000 ALTER TABLE `table_banco` DISABLE KEYS */;
INSERT INTO `table_banco` VALUES (1,'0115','BANCO EXTERIOR, C.A. BANCO UNIVERSAL'),(2,'0116','BANCO OCCIDENTAL DE DESCUENTO BANCO UNIVERSAL, C.A.'),(3,'0128','BANCO CARONI, C.A. BANCO UNIVERSAL'),(4,'0134','BANESCO BANCO UNIVERSAL S.A.C.A.'),(5,'0137','BANCO SOFITASA BANCO UNIVERSAL, C.A.'),(6,'0138','BANCO PLAZA, BANCO UNIVERSAL C.A.'),(7,'0146','BANCO DE LA GENTE EMPRENDEDORA BANGENTE, C.A.'),(8,'0149','BANCO DEL PUEBLO SOBERANO, BANCO DE DESARROLLO'),(9,'0151','BFC BANCO FONDO COMUN C.A. BANCO UNIVERSAL'),(10,'0157','DELSUR BANCO UNIVERSAL, C.A.'),(11,'0163','BANCO DEL TESORO, C.A. BANCO UNIVERSAL'),(12,'0166','BANCO AGRICOLA DE VENEZUELA, C.A. BANCO UNIVERSAL'),(13,'0168','BANCRECER S.A. BANCO DE DESARROLLO'),(14,'0169','MI BANCO, BANCO MICROFINANCIERO, C.A.'),(15,'0171','BANCO ACTIVO, C.A. BANCO UNIVERSAL'),(16,'0172','BANCAMIGA BANCO MICROFINANCIERO, C.A.'),(17,'0173','BANCO INTERNACIONAL DE DESARROLLO, C.A. BANCO UNIVERSAL'),(18,'0174','BANPLUS BANCO UNIVERAL, C.A.'),(19,'0175','BANCO BICENTENARIO BANCO UNIVERSAL, C.A.'),(20,'0176','NOVO BANCO, S.A. SUCURSAL VENEZUELA BANCO UNIVERSAL'),(21,'0177','BANCO DE LA FUERZA ARMADA NACIONAL BOLIVARIANA, B.U.'),(22,'0190','CITIBANK N.A.'),(23,'0191','BANCO NACIONAL CRÉDITO, C.A. BANCO UNIVERSAL');
/*!40000 ALTER TABLE `table_banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cuenta`
--

DROP TABLE IF EXISTS `table_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cuenta` (
  `id_cuenta` int(11) NOT NULL AUTO_INCREMENT,
  `id_banco` int(11) DEFAULT NULL,
  `tipo_cta` varchar(20) DEFAULT NULL,
  `numero_cta` text DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `clave_tlf` varchar(45) DEFAULT NULL,
  `clave_especial` varchar(45) DEFAULT NULL,
  `pregunta1` text DEFAULT NULL,
  `pregunta2` text DEFAULT NULL,
  `pregunta3` text DEFAULT NULL,
  `respuesta1` text DEFAULT NULL,
  `respuesta2` text DEFAULT NULL,
  `respuesta3` text DEFAULT NULL,
  `fecha_mod` date DEFAULT NULL,
  PRIMARY KEY (`id_cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cuenta`
--

LOCK TABLES `table_cuenta` WRITE;
/*!40000 ALTER TABLE `table_cuenta` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_cuenta_user`
--

DROP TABLE IF EXISTS `table_cuenta_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_cuenta_user` (
  `id_user` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_cuenta_user`
--

LOCK TABLES `table_cuenta_user` WRITE;
/*!40000 ALTER TABLE `table_cuenta_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_cuenta_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `pass` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `fechaReg` date DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (1,14607920,'WUN-01','YU5iV2Fld25RWjdET1BRZ215L1E1Zz09','william21enrique@gmail.com','William',NULL,NULL,NULL,NULL,'default.png','system/app/Views/Docs/WUN-01/',1,'2020-11-15'),(2,15769775,'YUN-02','YU5iV2Fld25RWjdET1BRZ215L1E1Zz09','ybet.naca@gmail.com','Ybet',NULL,NULL,NULL,NULL,'default.png','system/app/Views/Docs/YUN-02/',2,'2020-11-15');
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-20 19:52:05
