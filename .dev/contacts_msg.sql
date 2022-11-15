-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 15-Nov-2022 às 02:16
-- Versão do servidor: 8.0.28
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `kdmeupet`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacts_msg`
--

DROP TABLE IF EXISTS `contacts_msg`;
CREATE TABLE IF NOT EXISTS `contacts_msg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contato_organizacao` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagem` varchar(250) NOT NULL,
  `aprovado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `contacts_msg`
--

INSERT INTO `contacts_msg` (`id`, `nome`, `email`, `telefone`, `titulo`, `msg`, `contato_organizacao`, `created`, `imagem`, `aprovado`) VALUES
(20, 'Thais Marqui', 'thaismarqui_g@hotmail.com', '18 00000-0000', 'Titulo', 'Gostaria de um contato para uma possível parceria com meu petshop. ', 'Whatsapp: 189979687785', '2022-06-30 23:31:14', '', 1),
(27, '1', '1@gmail.com', '18997687785', 'Organizacao 1', 'Lorem Ipsum', 'Telefone: 1', '2022-11-13 17:37:16', '6ae2e404af5252817206a616ea40ca1b.jpg', 1),
(28, '2', '2@hotmail.com', 'tel2', 'titulo2', 'msg2', 'contato 2', '2022-11-13 17:37:50', '6a3211d6b9bf268ea9ebdaffba84517e.jpg', 1),
(29, '3', '3@gmail.com', 'tel 3', 'titulo 3', 'msg 3', 'contato 3', '2022-11-13 17:38:25', '2bdf30dd2161ddeebde801d8f6b1478c.jpg', 1),
(30, '4', '4@gmail.com', 'tel4 ', 'titulo 4', 'msg4', 'Whatsapp: 4', '2022-11-13 17:42:24', 'c6fdd123d6bad4abbddd9a6542cb4a29.jpg', 1),
(31, '5', '5@gmail.com', 'tel5', 'titulo5', 'msg5', 'Telefone: 5', '2022-11-13 17:43:22', '7d8ffd5002b0ad0fc8fa2166cba94e21.jpg', 1),
(32, '6', '6@gmail.com', 'tel6', 'tiulo6', 'msg6', 'email: organizacao6@gmail.com', '2022-11-13 17:44:08', '5e629775207e159a6f33132f9f524587.jpg', 1),
(34, 'Hebert Teste', 'hebertteste@gmail.com', '18997687785', 'teste', 'teste', 'Telefone: 36529999', '2022-11-14 19:29:53', '3bad026565976ad5a082ad5c826508ac.jpg', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
