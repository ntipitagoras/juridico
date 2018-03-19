-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 19-Mar-2018 às 15:31
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juridico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('66635ba7d38fd847a62541781dc77663', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 1521469280, 'a:5:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:14:\"Jonadabe Serra\";s:5:\"email\";s:28:\"jonadabe.serra@kroton.com.br\";s:11:\"nivel-admin\";s:1:\"1\";}'),
('aa1bfec2b42912da4b65eb4be2b18d65', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Mobil', 1521467991, 'a:5:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:14:\"Jonadabe Serra\";s:5:\"email\";s:28:\"jonadabe.serra@kroton.com.br\";s:11:\"nivel-admin\";s:1:\"1\";}'),
('513b2750e887f4d9ee6ba302c1644c09', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 1521467957, 'a:5:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:14:\"Jonadabe Serra\";s:5:\"email\";s:28:\"jonadabe.serra@kroton.com.br\";s:11:\"nivel-admin\";s:1:\"1\";}'),
('812981bae3e83b30334b4db5f55ca37f', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Safari/537.36', 1521464869, 'a:5:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:14:\"Jonadabe Serra\";s:5:\"email\";s:28:\"jonadabe.serra@kroton.com.br\";s:11:\"nivel-admin\";s:1:\"1\";}'),
('5b2bda271779d369530c1f61aa5eea93', '::1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.146 Mobil', 1521465055, 'a:5:{s:9:\"user_data\";s:0:\"\";s:2:\"id\";s:1:\"2\";s:4:\"nome\";s:14:\"Jonadabe Serra\";s:5:\"email\";s:28:\"jonadabe.serra@kroton.com.br\";s:11:\"nivel-admin\";s:1:\"1\";}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encerrados`
--

CREATE TABLE `encerrados` (
  `id` int(11) NOT NULL,
  `requerente` varchar(40) NOT NULL,
  `assunto` varchar(40) NOT NULL,
  `orgao_id` int(11) NOT NULL,
  `data_recebimento` date NOT NULL,
  `comentario` varchar(40) NOT NULL,
  `data_final` date NOT NULL,
  `resultado` varchar(300) NOT NULL,
  `data_finalizacao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `encerrados`
--

INSERT INTO `encerrados` (`id`, `requerente`, `assunto`, `orgao_id`, `data_recebimento`, `comentario`, `data_final`, `resultado`, `data_finalizacao`) VALUES
(8, 'Jonadabe Serra Carneiro', '0', 1, '2018-03-17', 'sasas', '2018-03-10', 'Fim', '2018-03-18'),
(9, 'Thiago R S Lima', 'Atualizei data para 20/03 e orgao para 1', 2, '2018-03-18', '', '2018-03-08', 'Fim 2', '2018-03-18'),
(10, 'Jonadabe Serra Carneiro', '0', 1, '2018-03-17', 'sasas', '2018-03-10', 'Olá', '2018-03-18'),
(11, 'Jonadabe Serra Carneiro', '0', 1, '2018-03-17', 'sasas', '2018-03-10', 'Olá', '2018-03-18'),
(12, 'Thiago R S Lima', 'Atualizei data para 20/03 e orgao para 1', 2, '2018-03-18', '', '2018-03-08', 'Finalizando você também', '2018-03-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `orgaos`
--

CREATE TABLE `orgaos` (
  `id_orgao` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `orgaos`
--

INSERT INTO `orgaos` (`id_orgao`, `nome`) VALUES
(1, 'Procon'),
(2, '14º Tec'),
(3, 'DPU');

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `id` int(11) NOT NULL,
  `requerente` varchar(40) NOT NULL,
  `data_recebimento` date NOT NULL,
  `assunto` varchar(400) NOT NULL,
  `orgao_id` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `data_final` date DEFAULT NULL,
  `usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `processos`
--

INSERT INTO `processos` (`id`, `requerente`, `data_recebimento`, `assunto`, `orgao_id`, `comentario`, `data_final`, `usuario`) VALUES
(11, 'Tiago', '2018-03-21', 'Assunto atualizado', 1, '', '2018-03-19', ''),
(12, 'bruno', '2018-03-20', 'Assunto 3', 3, '', '2018-03-19', ''),
(16, 'Jonadabe Serra Carneiro', '2018-03-07', 'AMAhça', 1, '', '2018-03-27', ''),
(17, 'Jonadabe Serra Carneiro', '2018-03-01', ' cdc', 1, '', '2018-03-27', ''),
(18, 'Jonadabe Serra Carneiro', '2018-03-20', 'dsad', 1, 'sasa', '2018-03-20', ''),
(19, 'Jonadabe Serra Carneiro', '2018-03-20', 'ESSE AQUI', 1, '', '2018-03-20', ''),
(20, 'Jonadabe Serra Carneiro', '2018-03-15', 'AMAhça', 1, '', '2018-03-23', ''),
(21, 'Eu', '2018-03-12', 'Esse vai ser hoje', 1, 'Este é um comentário', '2018-03-18', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(2) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `nivel_admin`) VALUES
(2, 'Jonadabe Serra', 'jonadabe.serra@kroton.com.br', '123', 1),
(3, 'Usuário teste', 'sas@sas', '123456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `encerrados`
--
ALTER TABLE `encerrados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orgao_id` (`orgao_id`);

--
-- Indexes for table `orgaos`
--
ALTER TABLE `orgaos`
  ADD PRIMARY KEY (`id_orgao`);

--
-- Indexes for table `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orgaos` (`orgao_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `encerrados`
--
ALTER TABLE `encerrados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orgaos`
--
ALTER TABLE `orgaos`
  MODIFY `id_orgao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `processos`
--
ALTER TABLE `processos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `encerrados`
--
ALTER TABLE `encerrados`
  ADD CONSTRAINT `encerrados_ibfk_1` FOREIGN KEY (`orgao_id`) REFERENCES `orgaos` (`id_orgao`);

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `fk_orgaos` FOREIGN KEY (`orgao_id`) REFERENCES `orgaos` (`id_orgao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
