-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 30/06/2022 às 23:36
-- Versão do servidor: 10.5.15-MariaDB-0+deb11u1
-- Versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_animal`
--

CREATE TABLE `cadastro_animal` (
  `c_id` int(11) NOT NULL,
  `c_nomeanimal` varchar(250) DEFAULT NULL,
  `c_foto` varchar(250) DEFAULT NULL,
  `c_descricao` text DEFAULT NULL,
  `c_usuario` int(11) DEFAULT NULL,
  `c_raca` int(11) DEFAULT NULL,
  `c_tamanho` int(11) DEFAULT NULL,
  `c_data` datetime DEFAULT NULL,
  `c_finalizado` int(11) DEFAULT NULL,
  `id_cor` int(11) DEFAULT NULL,
  `c_situacao` int(11) DEFAULT NULL,
  `c_endereco` varchar(200) DEFAULT NULL,
  `c_contato` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_animal`
--

INSERT INTO `cadastro_animal` (`c_id`, `c_nomeanimal`, `c_foto`, `c_descricao`, `c_usuario`, `c_raca`, `c_tamanho`, `c_data`, `c_finalizado`, `id_cor`, `c_situacao`, `c_endereco`, `c_contato`) VALUES
(14, 'Caramelo', '4a2acdf19f6ddec9af85cbbac1062619.jpg', 'Cachorro macho está perdido na rua', 1, 24, 2, '2022-06-26 16:49:40', 0, 3, 1, 'Rua Antonio Veronese, 307', ''),
(15, 'Floquinho', '42b115234ec07526685b1979336142de.jpg', 'Encontrei este cachorro perto do Ginásio de Esportes e trouxe pra casa.', 1, 26, 1, '2022-06-26 18:38:15', 0, 2, 1, 'Rua Chauky Rahal, 62', 'Telefone 18 997687785'),
(16, 'Cachorrinho Perdido', 'df90f4d69631a37ff59f68bc8bdca657.jpg', 'perdi meu doguinho', 1, 44, 3, '2022-06-26 19:38:08', 0, 17, 2, '', ''),
(17, 'Jake', 'de0f9b514c8c9a078f35ea4a7c67761c.jpg', 'Meu cachorro escapou de casa quando abri o portão hoje pela manhã', 1, 44, 2, '2022-06-26 20:08:16', 0, 6, 2, 'Avenida Caetano Zito, 251', 'Tragam em casa'),
(18, 'Costelinha', '', 'Meu cachorro sumiu.', 1, 34, 1, '2022-06-26 20:36:20', 0, 1, 2, 'Jardim Eldorado', ''),
(19, 'teste', '', 'teste', 1, 36, 3, '2022-06-28 20:12:28', 0, 21, 1, 'Rua Ramalho', 'teste'),
(20, 'rex', '', 'fdefefrfrwf', 4, 28, 3, '2022-06-30 11:29:23', 0, 2, 2, 'rua joão paulo tolomei 390', '0560510060560'),
(21, 'Garoto', '', 'fsvfgrvrvrtt', 4, 35, 2, '2022-06-30 11:30:55', 0, 3, 1, 'rua joão paulo tolomei 210', '0514050180'),
(22, 'Snoop', '45a0a84902c2ac8a021f0b21ab67f329.jpeg', 'Animal bravo perdio na cidade de Birigui, não é dócil, não tentar passar a mão.', 4, 38, 2, '2022-06-30 19:59:06', 0, 9, 2, 'rua João paulo tolomei 390', '90909089808018'),
(23, 'Scoob', 'c6999a2b7d7d60d6b421b6c9c27b3393.jpeg', 'Animal perdido na cidade de Birigui, dócil.', 4, 45, 1, '2022-06-30 20:00:37', 0, 3, 2, 'Av. Euclides Miragaia 100', '72389728379179143'),
(24, 'Romeu', '3e3cf5f3dd97f991bfd48b4df0950462.jpg', 'Animal perdido em Araçatuba, dócil. Informações entrar em contato', 4, 37, 2, '2022-06-30 20:01:55', 0, 5, 1, 'Rua dos Buritis 200', '6728638163'),
(25, 'Lola Maria da Praia', '6d5105fe2745542cbe5e0e4c652f3008.jpeg', 'Cachorra perdida próxima a praça Doutor Gama em Birigui', 4, 15, 1, '2022-06-30 20:04:45', 0, 1, 2, 'Rua da Saudades 350', '341342342423432'),
(26, 'Salsicha', 'bd68423b59403ef3cc06ddf5c62c02ae.jpg', 'Vi o animal perdido próximo à Prefeitura de Penápolis', 1, 22, 2, '2022-06-30 20:32:29', 0, 5, 1, 'Av. Marginal Maria Chica', ''),
(27, 'Amarelão', 'e9599069f6c07f7d5bec41e05ce45852.jpg', 'Cachorro dócil', 5, 15, 2, '2022-06-30 20:33:57', 0, 3, 1, 'Parque Maria Chica', '18996396733'),
(28, 'Tusk', 'c4f1eaeb9cd9e14fcb52b65132f500bc.jpg', 'Quem encontrar por favor comunicar, animal dócil.', 5, 44, 3, '2022-06-30 20:43:08', 0, 2, 2, 'Visto por último perto do Parque Industrial', '18996396733');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_cor`
--

CREATE TABLE `cadastro_cor` (
  `c_id` int(11) NOT NULL,
  `c_cor` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_cor`
--

INSERT INTO `cadastro_cor` (`c_id`, `c_cor`) VALUES
(1, 'Preto'),
(2, 'Branco'),
(3, 'Amarelo'),
(4, 'Laranja'),
(5, 'Marrom'),
(6, 'Cinza'),
(7, 'Cinza Azul'),
(8, 'Bege'),
(9, 'Malhado Branco e Preto'),
(10, 'Malhado Branco e Laranja'),
(11, 'Malhado Branco e Amarelo'),
(12, 'Malhado Branco e Cinza'),
(13, 'Malhado Branco e Cinza Azul'),
(14, 'Malhado Branco e Marrom'),
(15, 'Malhado Branco e Bege'),
(16, 'Malhado Bege e Marrom'),
(17, 'Malhado Preto e Amarelo'),
(18, 'Malhado Amarelo e Laranja'),
(19, 'Malhado Marrom e Preto'),
(20, 'Malhado Bege e Preto'),
(21, 'Malhado três cores ou mais'),
(22, 'Outra');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_gerenciador`
--

CREATE TABLE `cadastro_gerenciador` (
  `g_id` int(11) NOT NULL,
  `g_email` varchar(250) DEFAULT NULL,
  `g_senha` varchar(250) DEFAULT NULL,
  `g_nivel` int(11) DEFAULT NULL,
  `g_nome` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_gerenciador`
--

INSERT INTO `cadastro_gerenciador` (`g_id`, `g_email`, `g_senha`, `g_nivel`, `g_nome`) VALUES
(1, 'hebertn88@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Hebert do Nascimento'),
(2, 'hebertn88@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Hebert do Nascimento'),
(3, 'lucas@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Lucas Carvalhau Tropardi'),
(4, 'thaismarqui_g@hotmail.com', '698dc19d489c4e4db73e28a713eab07b', 0, 'Thais Marqui Guilherme');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_raca`
--

CREATE TABLE `cadastro_raca` (
  `r_id` int(11) NOT NULL,
  `r_nome` varchar(250) DEFAULT NULL,
  `r_tipos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_raca`
--

INSERT INTO `cadastro_raca` (`r_id`, `r_nome`, `r_tipos`) VALUES
(1, 'Perça', 1),
(2, 'Brithis Shorthair', 1),
(3, 'Sphynx', 1),
(4, 'Siamês', 1),
(5, 'Angorá', 1),
(6, 'Maine Coon', 1),
(7, 'Himalaio', 1),
(8, 'Bengal', 1),
(9, 'Ragdoll', 1),
(10, 'Munchkin', 1),
(11, 'Scottish Fold', 1),
(12, 'Abissínio', 1),
(13, 'Birmanês', 1),
(14, 'SRD', 1),
(15, 'SRD', 2),
(16, 'Pug', 2),
(17, 'Maltês', 2),
(18, 'Shih Tzu', 2),
(19, 'Buldogue', 2),
(20, 'Pit Bull', 2),
(21, 'Spitz Alemão', 2),
(22, 'Dachshund', 2),
(23, 'Pastor Alemão', 2),
(24, 'Basset', 2),
(25, 'Schnauzer', 2),
(26, 'Poodle', 2),
(27, 'Rottweiler', 2),
(28, 'Labrador', 2),
(29, 'Pinscher', 2),
(30, 'Lasha Apso', 2),
(31, 'Golden Retriever', 2),
(32, 'Yorkshire', 2),
(33, 'Border Collie', 2),
(34, 'Beagle', 2),
(35, 'Boxer', 2),
(36, 'Chihuahua', 2),
(37, 'Cocker', 2),
(38, 'Chow Chow', 2),
(39, 'Corgi', 2),
(40, 'Buldogue Francês', 2),
(41, 'Buldogue Inglês', 2),
(42, 'Bull Terrier', 2),
(43, 'Dog de Bordeaux', 2),
(44, 'Husky Siberiano', 2),
(45, 'Fox Paulistinha', 2),
(46, 'Dogo Argentino', 2),
(47, 'Pequinês', 2),
(48, 'Poodle Toy', 2),
(49, 'Dalmata', 2),
(50, 'São Bernardo', 2),
(51, 'Whippet', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_situacao`
--

CREATE TABLE `cadastro_situacao` (
  `s_id` int(11) NOT NULL,
  `s_nome` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_situacao`
--

INSERT INTO `cadastro_situacao` (`s_id`, `s_nome`) VALUES
(1, 'Encontrado'),
(2, 'Perdido');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_tamanho`
--

CREATE TABLE `cadastro_tamanho` (
  `t_id` int(11) NOT NULL,
  `t_nome` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_tamanho`
--

INSERT INTO `cadastro_tamanho` (`t_id`, `t_nome`) VALUES
(1, 'Pequeno porte'),
(2, 'Médio porte'),
(3, 'Grande porte');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_tipo`
--

CREATE TABLE `cadastro_tipo` (
  `t_id` int(11) NOT NULL,
  `t_nome` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_tipo`
--

INSERT INTO `cadastro_tipo` (`t_id`, `t_nome`) VALUES
(1, 'Gato'),
(2, 'Cachorro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cadastro_usuario`
--

CREATE TABLE `cadastro_usuario` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(250) DEFAULT NULL,
  `u_senha` varchar(250) DEFAULT NULL,
  `u_nomecompleto` varchar(250) DEFAULT NULL,
  `u_endereco` varchar(250) DEFAULT NULL,
  `u_telefone` varchar(250) DEFAULT NULL,
  `u_data` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cadastro_usuario`
--

INSERT INTO `cadastro_usuario` (`u_id`, `u_email`, `u_senha`, `u_nomecompleto`, `u_endereco`, `u_telefone`, `u_data`) VALUES
(1, 'hebertn88@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hebert', 'Rua Chauky Rahal, 62', '18997687785', NULL),
(3, 'thaismarqui_g@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Thais Marqui Guilherme', 'Rua Doutor Ramalho Franco', '99141461', NULL),
(4, 'caique.bsa@gmail.com', 'e108498318fb27a485b301b5c01d24eb', 'caique', 'sadadsaasdaqs', '1065106510', NULL),
(5, 'lulu.silva@hotmail.com', '200820e3227815ed1756a6b531e7e0d2', 'Luiz Henrique', 'Rua lulu', '18996396733', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contacts_msg`
--

CREATE TABLE `contacts_msg` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `telefone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `contacts_msg`
--

INSERT INTO `contacts_msg` (`id`, `nome`, `email`, `msg`, `created`, `telefone`) VALUES
(20, 'Thais Marqui', 'thaismarqui_g@hotmail.com', 'Gostaria de um contato para uma possível parceria com meu petshop. ', '2022-06-30 23:31:14', '18 00000-0000');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cadastro_animal`
--
ALTER TABLE `cadastro_animal`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `cadastro_animal_ibfk_1` (`c_usuario`),
  ADD KEY `cadastro_animal_ibfk_3` (`c_tamanho`),
  ADD KEY `cadastro_animal_ibfk_4` (`c_situacao`),
  ADD KEY `cadastro_animal_ibfk_2` (`c_raca`),
  ADD KEY `cadastro_animal_ibfk_5` (`id_cor`);

--
-- Índices de tabela `cadastro_cor`
--
ALTER TABLE `cadastro_cor`
  ADD PRIMARY KEY (`c_id`);

--
-- Índices de tabela `cadastro_gerenciador`
--
ALTER TABLE `cadastro_gerenciador`
  ADD PRIMARY KEY (`g_id`);

--
-- Índices de tabela `cadastro_raca`
--
ALTER TABLE `cadastro_raca`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `cadastro_raca_ibfk_1` (`r_tipos`);

--
-- Índices de tabela `cadastro_situacao`
--
ALTER TABLE `cadastro_situacao`
  ADD PRIMARY KEY (`s_id`);

--
-- Índices de tabela `cadastro_tamanho`
--
ALTER TABLE `cadastro_tamanho`
  ADD PRIMARY KEY (`t_id`);

--
-- Índices de tabela `cadastro_tipo`
--
ALTER TABLE `cadastro_tipo`
  ADD PRIMARY KEY (`t_id`);

--
-- Índices de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  ADD PRIMARY KEY (`u_id`);

--
-- Índices de tabela `contacts_msg`
--
ALTER TABLE `contacts_msg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro_animal`
--
ALTER TABLE `cadastro_animal`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `cadastro_cor`
--
ALTER TABLE `cadastro_cor`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `cadastro_gerenciador`
--
ALTER TABLE `cadastro_gerenciador`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cadastro_raca`
--
ALTER TABLE `cadastro_raca`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `cadastro_situacao`
--
ALTER TABLE `cadastro_situacao`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cadastro_tamanho`
--
ALTER TABLE `cadastro_tamanho`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `cadastro_tipo`
--
ALTER TABLE `cadastro_tipo`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `cadastro_usuario`
--
ALTER TABLE `cadastro_usuario`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `contacts_msg`
--
ALTER TABLE `contacts_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `cadastro_animal`
--
ALTER TABLE `cadastro_animal`
  ADD CONSTRAINT `cadastro_animal_ibfk_1` FOREIGN KEY (`c_usuario`) REFERENCES `cadastro_usuario` (`u_id`),
  ADD CONSTRAINT `cadastro_animal_ibfk_2` FOREIGN KEY (`c_raca`) REFERENCES `cadastro_raca` (`r_id`),
  ADD CONSTRAINT `cadastro_animal_ibfk_3` FOREIGN KEY (`c_tamanho`) REFERENCES `cadastro_tamanho` (`t_id`),
  ADD CONSTRAINT `cadastro_animal_ibfk_4` FOREIGN KEY (`c_situacao`) REFERENCES `cadastro_situacao` (`s_id`),
  ADD CONSTRAINT `cadastro_animal_ibfk_5` FOREIGN KEY (`id_cor`) REFERENCES `cadastro_cor` (`c_id`);

--
-- Restrições para tabelas `cadastro_raca`
--
ALTER TABLE `cadastro_raca`
  ADD CONSTRAINT `cadastro_raca_ibfk_1` FOREIGN KEY (`r_tipos`) REFERENCES `cadastro_tipo` (`t_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
