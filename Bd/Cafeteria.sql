-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cafeteria
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
  `usuario_administrador` varchar(70) NOT NULL,
  `password` varchar(70) DEFAULT NULL,
  `id_lugar` int(6) DEFAULT NULL,
  `id_alimento` int(6) DEFAULT NULL,
  `numero_de_cuenta` varchar(70) DEFAULT NULL,
  `numero_grupo` int(3) DEFAULT NULL,
  `numero_de_trabajador` varchar(70) DEFAULT NULL,
  `RFC` varchar(70) DEFAULT NULL,
  `id_pedido` int(10) DEFAULT NULL,
  `nombre_colegio` varchar(35) DEFAULT NULL,
  `usuario_supervisor` varchar(70) DEFAULT NULL,
  `fk_lugar` int(6) DEFAULT NULL,
  PRIMARY KEY (`usuario_administrador`),
  KEY `fk_lugar` (`id_lugar`),
  KEY `fk_alimento` (`id_alimento`),
  KEY `fk_numero_de_cuenta` (`numero_de_cuenta`),
  KEY `fk_grupo` (`numero_grupo`),
  KEY `fk_numero_de_trabajador` (`numero_de_trabajador`),
  KEY `fk_RFC` (`RFC`),
  KEY `fk_pedido` (`id_pedido`),
  KEY `nombre_colegio` (`nombre_colegio`),
  KEY `usuario_supervisor` (`usuario_supervisor`),
  CONSTRAINT `fk_RFC` FOREIGN KEY (`RFC`) REFERENCES `profesor_o_funcionario` (`RFC`),
  CONSTRAINT `fk_alimento` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id_alimento`),
  CONSTRAINT `fk_grupo` FOREIGN KEY (`numero_grupo`) REFERENCES `grupo` (`Numero_grupo`),
  CONSTRAINT `fk_lugar` FOREIGN KEY (`id_lugar`) REFERENCES `direccion_de_entrega` (`id_lugar`),
  CONSTRAINT `fk_numero_de_cuenta` FOREIGN KEY (`numero_de_cuenta`) REFERENCES `alumno` (`numero_de_cuenta`),
  CONSTRAINT `fk_numero_de_trabajador` FOREIGN KEY (`numero_de_trabajador`) REFERENCES `trabajador` (`numero_de_trabajador`),
  CONSTRAINT `fk_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`),
  CONSTRAINT `nombre_colegio` FOREIGN KEY (`nombre_colegio`) REFERENCES `colegio` (`Nombre_colegio`),
  CONSTRAINT `usuario_supervisor` FOREIGN KEY (`usuario_supervisor`) REFERENCES `supervisor` (`usuario_supervisor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alimento`
--

DROP TABLE IF EXISTS `alimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alimento` (
  `id_alimento` int(6) NOT NULL,
  `Nombre_alimento` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Precio` int(4) DEFAULT NULL,
  `Disponibilidad` int(3) DEFAULT NULL,
  PRIMARY KEY (`id_alimento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alimento`
--

LOCK TABLES `alimento` WRITE;
/*!40000 ALTER TABLE `alimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `alimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `numero_de_cuenta` varchar(70) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `ApellidoPat` varchar(20) DEFAULT NULL,
  `ApellidoMat` varchar(20) DEFAULT NULL,
  `Numero_grupo` int(3) DEFAULT NULL,
  `Password` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`numero_de_cuenta`),
  KEY `Numero_grupo` (`Numero_grupo`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`Numero_grupo`) REFERENCES `grupo` (`Numero_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colegio`
--

DROP TABLE IF EXISTS `colegio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colegio` (
  `Nombre_colegio` varchar(35) NOT NULL,
  PRIMARY KEY (`Nombre_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colegio`
--

LOCK TABLES `colegio` WRITE;
/*!40000 ALTER TABLE `colegio` DISABLE KEYS */;
/*!40000 ALTER TABLE `colegio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `direccion_de_entrega`
--

DROP TABLE IF EXISTS `direccion_de_entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `direccion_de_entrega` (
  `id_lugar` int(6) NOT NULL,
  `Lugar` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_lugar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `direccion_de_entrega`
--

LOCK TABLES `direccion_de_entrega` WRITE;
/*!40000 ALTER TABLE `direccion_de_entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `direccion_de_entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `Numero_grupo` int(3) NOT NULL,
  `Grado` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Numero_grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(10) NOT NULL AUTO_INCREMENT,
  `Hora_de_pedido` time DEFAULT NULL,
  `Fecha_de_pedido` date DEFAULT NULL,
  `Cantidad` int(4) DEFAULT NULL,
  `id_alimento` int(6) DEFAULT NULL,
  `id_lugar` int(6) DEFAULT NULL,
  `numero_de_cuenta` varchar(70) DEFAULT NULL,
  `numero_de_trabajador` varchar(70) DEFAULT NULL,
  `RFC` varchar(70) DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `id_alimento` (`id_alimento`),
  KEY `id_lugar` (`id_lugar`),
  KEY `numero_de_cuenta` (`numero_de_cuenta`),
  KEY `numero_de_trabajador` (`numero_de_trabajador`),
  KEY `RFC` (`RFC`),
  KEY `Status` (`Status`),
  CONSTRAINT `RFC` FOREIGN KEY (`RFC`) REFERENCES `profesor_o_funcionario` (`RFC`),
  CONSTRAINT `Status` FOREIGN KEY (`Status`) REFERENCES `status_pedido` (`Status`),
  CONSTRAINT `id_alimento` FOREIGN KEY (`id_alimento`) REFERENCES `alimento` (`id_alimento`),
  CONSTRAINT `id_lugar` FOREIGN KEY (`id_lugar`) REFERENCES `direccion_de_entrega` (`id_lugar`),
  CONSTRAINT `numero_de_cuenta` FOREIGN KEY (`numero_de_cuenta`) REFERENCES `alumno` (`numero_de_cuenta`),
  CONSTRAINT `numero_de_trabajador` FOREIGN KEY (`numero_de_trabajador`) REFERENCES `trabajador` (`numero_de_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor_o_funcionario`
--

DROP TABLE IF EXISTS `profesor_o_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor_o_funcionario` (
  `RFC` varchar(70) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `ApellidoPat` varchar(20) DEFAULT NULL,
  `ApellidoMat` varchar(20) DEFAULT NULL,
  `Nombre_colegio` varchar(35) DEFAULT NULL,
  `Password` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`RFC`),
  KEY `Nombre_colegio` (`Nombre_colegio`),
  CONSTRAINT `profesor_o_funcionario_ibfk_1` FOREIGN KEY (`Nombre_colegio`) REFERENCES `colegio` (`Nombre_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor_o_funcionario`
--

LOCK TABLES `profesor_o_funcionario` WRITE;
/*!40000 ALTER TABLE `profesor_o_funcionario` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor_o_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_pedido`
--

DROP TABLE IF EXISTS `status_pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_pedido` (
  `Status` varchar(20) NOT NULL,
  PRIMARY KEY (`Status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_pedido`
--

LOCK TABLES `status_pedido` WRITE;
/*!40000 ALTER TABLE `status_pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisor` (
  `usuario_supervisor` varchar(70) NOT NULL,
  `Password` varchar(70) DEFAULT NULL,
  `id_pedido` int(10) DEFAULT NULL,
  PRIMARY KEY (`usuario_supervisor`),
  KEY `id_pedido` (`id_pedido`),
  CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trabajador` (
  `numero_de_trabajador` varchar(70) NOT NULL,
  `Nombre` varchar(20) DEFAULT NULL,
  `ApellidoPat` varchar(20) DEFAULT NULL,
  `ApellidoMat` varchar(20) DEFAULT NULL,
  `Password` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`numero_de_trabajador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trabajador`
--

LOCK TABLES `trabajador` WRITE;
/*!40000 ALTER TABLE `trabajador` DISABLE KEYS */;
/*!40000 ALTER TABLE `trabajador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-29 22:56:59
