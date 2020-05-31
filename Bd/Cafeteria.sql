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
INSERT INTO `administrador` VALUES ('sRiVX8I4YUX+uDnQ2ysle7S0DaL+ul4g4vwIlKpMpHE=','343$2y$10$.OMLRlJ9leXtpuuHdWxLdeHoN//XeaDG89H3nbkePSvHYkFWMCJHO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
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
  `Descripcion` varchar(100) DEFAULT NULL,
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
INSERT INTO `alimento` VALUES (1,'Chilaquiles','Delicisosos chilaquiles con salsa roja',25,10),(2,'Molletes','Deliciosos y con pico de gallo',20,15),(3,'Sandwich de atun','Rico sandwich de atun fresco',15,8),(4,'Torta','Con jamon y queso',15,18),(5,'Cereal con leche','Perfecto si no desayunaste',15,18),(6,'Pasta','Pasta con Atun',25,15),(7,'Yogur','De muchos sabores',10,50),(8,'Cuernito a la Besne','¿Porqie a la Besne? Porque solo lo bueno se llama asi',15,25),(9,'Licuado de Fresa','Deliciosos licuado hecho con leche de vaca',15,20),(10,'Ensalada','Ensalada con pollo y aderezo',25,15),(11,'Coyo caldos','Para los dias romanticos aprovecha 2 maruchan',35,15),(12,'Combo lactobacilo','Aprovecha este combo de un paquete de 5 yakults',35,10),(13,'Fruta','Melon, papaya y sandia',20,15),(14,'Agua de vaso','Aprovecha de la clasica agua de vaso de la prepa 6',15,100),(15,'Capuchino','Bebida nacida en Italia, preparada con café expres',20,18),(16,'Jugo de Naranja','Rico juguito de naranja, no olvides tu vitamina C',20,25),(17,'Combo Caso','Para los días sin dormir Antonio Caso te cuida',50,30),(18,'Te','Muy relajante',15,50),(19,'Combo Juan','Conviertete en un Jedi con este elote, solo tenemos chile que no',12,30),(20,'Baguel','Relleno de queso y jamon',15,20);
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
INSERT INTO `colegio` VALUES ('Alemán'),('Artes_Plásticas'),('Biología'),('Ciencias_sociales'),('Danza'),('Dibujo_Y_Modelado'),('Educación_Física'),('ETE'),('Filosofía'),('Fisica'),('Francés'),('Geografía'),('Historia'),('Informática'),('Inglés'),('Italiano'),('Letras_Clásicas'),('Literatura'),('Matemáticas'),('Morfología,Físiología_y_Salud'),('Música'),('Orientación_Educativa'),('Psicologia_e_Higiene_Mental'),('Química'),('Teatro');
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
INSERT INTO `direccion_de_entrega` VALUES (1,'Cafeteria'),(2,'Patio de sexto'),(3,'Patio de quinto'),(4,'Patio de cuarto'),(5,'Direccion'),(6,'Sala de maestros'),(7,'Salones de dibujo'),(8,'Pulpo'),(9,'Frente al auditorio'),(10,'Pasillo de vestidores'),(11,'Entrada de Canchas');
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
INSERT INTO `grupo` VALUES (401,'Cuarto'),(402,'Cuarto'),(403,'Cuarto'),(404,'Cuarto'),(405,'Cuarto'),(406,'Cuarto'),(407,'Cuarto'),(408,'Cuarto'),(409,'Cuarto'),(410,'Cuarto'),(411,'Cuarto'),(412,'Cuarto'),(413,'Cuarto'),(414,'Cuarto'),(415,'Cuarto'),(416,'Cuarto'),(417,'Cuarto'),(451,'Cuarto'),(452,'Cuarto'),(453,'Cuarto'),(454,'Cuarto'),(455,'Cuarto'),(456,'Cuarto'),(457,'Cuarto'),(458,'Cuarto'),(459,'Cuarto'),(460,'Cuarto'),(461,'Cuarto'),(462,'Cuarto'),(463,'Cuarto'),(464,'Cuarto'),(465,'Cuarto'),(501,'Quinto'),(502,'Quinto'),(503,'Quinto'),(504,'Quinto'),(505,'Quinto'),(506,'Quinto'),(507,'Quinto'),(508,'Quinto'),(509,'Quinto'),(510,'Quinto'),(511,'Quinto'),(512,'Quinto'),(513,'Quinto'),(514,'Quinto'),(515,'Quinto'),(516,'Quinto'),(517,'Quinto'),(518,'Quinto'),(551,'Quinto'),(552,'Quinto'),(553,'Quinto'),(554,'Quinto'),(555,'Quinto'),(556,'Quinto'),(557,'Quinto'),(558,'Quinto'),(559,'Quinto'),(560,'Quinto'),(561,'Quinto'),(562,'Quinto'),(563,'Quinto'),(564,'Quinto'),(601,'Sexto'),(602,'Sexto'),(603,'Sexto'),(604,'Sexto'),(605,'Sexto'),(606,'Sexto'),(607,'Sexto'),(608,'Sexto'),(609,'Sexto'),(610,'Sexto'),(611,'Sexto'),(612,'Sexto'),(613,'Sexto'),(614,'Sexto'),(615,'Sexto'),(616,'Sexto'),(617,'Sexto'),(618,'Sexto'),(619,'Sexto'),(651,'Sexto'),(652,'Sexto'),(653,'Sexto'),(654,'Sexto'),(655,'Sexto'),(656,'Sexto'),(657,'Sexto'),(658,'Sexto'),(659,'Sexto'),(660,'Sexto'),(661,'Sexto'),(662,'Sexto'),(663,'Sexto'),(664,'Sexto');
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
INSERT INTO `supervisor` VALUES ('CXM995A41gDQfkIXAcqqApTajbRFCHNcNS9Y0yvICuM=','547$2y$10$xU8ZySLH7LRVo4YJ4.UXcO/uSYo8xx80UTxYzOi0xj84e5C8zl7m6',NULL),('xv1+DasZyVpfSXaUm1CkH3RjuiAjEOyDM/xv9WFvshM=','156$2y$10$YmZM2zUyhIRIN9rKKZBL7O4FUKIel6vy6dpIbmah/asGWkLZTwSB2',NULL);
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

-- Dump completed on 2020-05-30 21:05:31
