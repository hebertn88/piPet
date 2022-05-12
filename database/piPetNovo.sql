CREATE DATABASE  IF NOT EXISTS `pipet` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `pipet`;
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
-- Table structure for table `entidade`
--

DROP TABLE IF EXISTS `entidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entidade` (
  `id_entidade` int NOT NULL AUTO_INCREMENT,
  `tipo_entidade` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  PRIMARY KEY (`id_entidade`),
  UNIQUE KEY `id_entidade_UNIQUE` (`id_entidade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidade`
--

LOCK TABLES `entidade` WRITE;
/*!40000 ALTER TABLE `entidade` DISABLE KEYS */;
/*!40000 ALTER TABLE `entidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidade_contato`
--

DROP TABLE IF EXISTS `entidade_contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entidade_contato` (
  `id_contato` int NOT NULL AUTO_INCREMENT,
  `id_entidade` int NOT NULL,
  `tipo_contato` int NOT NULL,
  `contato` varchar(45) NOT NULL,
  PRIMARY KEY (`id_contato`),
  UNIQUE KEY `id_contato_UNIQUE` (`id_contato`),
  KEY `fk_entidade_contato_idx` (`id_entidade`),
  CONSTRAINT `fk_entidade_contato` FOREIGN KEY (`id_entidade`) REFERENCES `entidade` (`id_entidade`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidade_contato`
--

LOCK TABLES `entidade_contato` WRITE;
/*!40000 ALTER TABLE `entidade_contato` DISABLE KEYS */;
/*!40000 ALTER TABLE `entidade_contato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidade_login`
--

DROP TABLE IF EXISTS `entidade_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entidade_login` (
  `id_login` int NOT NULL AUTO_INCREMENT,
  `id_entidade` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(250) NOT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `id_login_UNIQUE` (`id_login`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_login_entidade_idx` (`id_entidade`),
  CONSTRAINT `fk_login_entidade` FOREIGN KEY (`id_entidade`) REFERENCES `entidade` (`id_entidade`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidade_login`
--

LOCK TABLES `entidade_login` WRITE;
/*!40000 ALTER TABLE `entidade_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `entidade_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `organizacao_pessoa`
--

DROP TABLE IF EXISTS `organizacao_pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `organizacao_pessoa` (
  `id_organizacao_pessoa` int NOT NULL AUTO_INCREMENT,
  `id_organizacao` int NOT NULL,
  `id_pessoa` int NOT NULL,
  PRIMARY KEY (`id_organizacao_pessoa`),
  UNIQUE KEY `id_organizacao_pessoa_UNIQUE` (`id_organizacao_pessoa`),
  KEY `fk_orgpes_organizacao_idx` (`id_organizacao`),
  KEY `fk_orgpes_pessoa_idx` (`id_pessoa`),
  CONSTRAINT `fk_orgpes_organizacao` FOREIGN KEY (`id_organizacao`) REFERENCES `entidade` (`id_entidade`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_orgpes_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `entidade` (`id_entidade`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `organizacao_pessoa`
--

LOCK TABLES `organizacao_pessoa` WRITE;
/*!40000 ALTER TABLE `organizacao_pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `organizacao_pessoa` ENABLE KEYS */;
UNLOCK TABLES;

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

--
-- Table structure for table `publicacao_comentario`
--

DROP TABLE IF EXISTS `publicacao_comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `publicacao_comentario` (
  `id_comentario` int NOT NULL AUTO_INCREMENT,
  `id_publicacao` int NOT NULL,
  `id_entidade` int NOT NULL,
  `comentario` tinyblob NOT NULL,
  `data_criacao` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_comentario`),
  UNIQUE KEY `id_comentario_UNIQUE` (`id_comentario`),
  KEY `fk_pub_com_publicacao_idx` (`id_publicacao`),
  KEY `fk_pub_com_entidade_idx` (`id_entidade`),
  CONSTRAINT `fk_pub_com_entidade` FOREIGN KEY (`id_entidade`) REFERENCES `entidade` (`id_entidade`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_pub_com_publicacao` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacao` (`id_publicacao`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacao_comentario`
--

LOCK TABLES `publicacao_comentario` WRITE;
/*!40000 ALTER TABLE `publicacao_comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicacao_comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pet`
--

DROP TABLE IF EXISTS `tipo_pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_pet` (
  `id_tipo_pet` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_pet`),
  UNIQUE KEY `descricao_UNIQUE` (`descricao`),
  UNIQUE KEY `id_tipo_pet_UNIQUE` (`id_tipo_pet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pet`
--

LOCK TABLES `tipo_pet` WRITE;
/*!40000 ALTER TABLE `tipo_pet` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_pet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-11 22:32:01
