-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: web
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `concurso`
--

DROP TABLE IF EXISTS `concurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `concurso` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50)  NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `estado` varchar(50)  NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concurso`
--

LOCK TABLES `concurso` WRITE;
/*!40000 ALTER TABLE `concurso` DISABLE KEYS */;
INSERT INTO `concurso` VALUES (6,'Nombre del Concurso','2023-01-01','2023-02-01','Activado'),(7,'CodingCuo','2023-01-01','2023-02-01','Activado'),(9,'CodingCup2','2023-01-01','2023-02-01','Activado'),(10,'Juan tierras','2023-12-06','2023-12-06','Activado'),(11,'Mi primer codigo','2023-12-08','2023-12-30','Activado'),(12,'Los amos de jaime','2023-12-06','2023-12-24','Activado');
/*!40000 ALTER TABLE `concurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(30)  NOT NULL,
  `estudiante1` varchar(40)  NOT NULL,
  `estudiante2` varchar(40)  NOT NULL,
  `estudiante3` varchar(40)  NOT NULL,
  `Aprobado` varchar(40) DEFAULT NULL,
  `NombreDelCoach` varchar(40)  DEFAULT NULL,
  PRIMARY KEY (`id`)
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (2,'El equipo dinamica','Juan yahir Duran Ruiz','Shrek Segundo','Juan yahir Duran Ruiz','Aprobado','prueba'),(3,'El equipo dinamica','Juan yahir Duran Ruiz','Shrek Segundo','Juan yahir Duran Ruiz','Aprobado','prueba'),(4,'El equipo dinamica','Juan yahir Duran Ruiz','Shrek Segundo','Manuel Lopez Obradorzzz','Aprobado','ertyu'),(10,'El equipo dinamicad','Juan yahir Duran Ruiz','Shrek Segundo','Juan yahir Duran Ruiz','aprobado','Jose antonio');
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'Ejemplo Usuario','ejemplo@correo.com','123123','Universidad XYZ','Coach'),(3,'Ejemplo Usuario','ejemplo@correo.com','123123','Universidad XYZ','Coach'),(4,'ertyu','rtyuio@tyui.com','123123','rthjklñ','Coach'),(5,'Padrino xd','pasame@plis.com','12345','Itsur','Coach'),(6,'prueba','prueba@sii.com','12345','wertyuio dfghjk','Coach'),(7,'prueba','prueba@sii.com','12345','wertyuio dfghjk','Coach'),(8,'Yuli','si@la.com','123456','','Administrador'),(9,'Jose antonio','s20120196@alumnos.itsur.edu.mx','123456','tecnologico','Coach'),(10,'Jose antonio','cristian1013@gmail.com','123456','Itusr','Coach'),(11,'Jose antonio Tierras','s20120196@alumnos.itsur.edu.mx','123456','Tecnologico de monterey','Coach'),(12,'Jose antonio Tierras Negras','s20120196@alumnos.itsur.edu.mx','123456','Tecnologico de monterey','Coach'),(13,'Jose antonio','s20120196@alumnos.itsur.edu.mx','111','','Administrador'),(14,'Juan tierras','cristian1013@gmail.com','123456','','Administrador'),(15,'Yuli Tierras de mi soledad','s20120196@alumnos.itsur.edu.mx','1234567','','Administrador');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-06  0:04:50
