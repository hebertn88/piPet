-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: pipet
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `publicacao`
--

DROP TABLE IF EXISTS `publicacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicacao` (
  `id_publicacao` int NOT NULL AUTO_INCREMENT,
  `tipo_publicacao` int NOT NULL COMMENT '0 = PERDIDO, 1 = ACHADO, 2 = DOACAO',
  `id_entidade` int NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_pet` int NOT NULL,
  `raca` varchar(45) NOT NULL,
  `porte` varchar(45) NOT NULL,
  `cor` varchar(45) NOT NULL,
  `idade` varchar(45) NOT NULL,
  `descricao` blob NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `situacao` int NOT NULL COMMENT '0 = ABERTO, 1 = ENCERRADO',
  `data_atualizacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_publicacao`),
  UNIQUE KEY `id_publicacao_UNIQUE` (`id_publicacao`),
  KEY `fk_publ_entidade_idx` (`id_entidade`),
  KEY `fk_pub_tipo_pet_idx` (`tipo_pet`),
  CONSTRAINT `fk_pub_tipo_pet` FOREIGN KEY (`tipo_pet`) REFERENCES `tipo_pet` (`id_tipo_pet`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_publ_entidade` FOREIGN KEY (`id_entidade`) REFERENCES `entidade` (`id_entidade`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacao`
--

LOCK TABLES `publicacao` WRITE;
/*!40000 ALTER TABLE `publicacao` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicacao` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-11 22:26:07
