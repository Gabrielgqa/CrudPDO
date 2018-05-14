-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11-Maio-2018 às 20:39
-- Versão do servidor: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_tarefas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_projetos`
--

CREATE TABLE `tb_projetos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(700) NOT NULL,
  `data_ini` date NOT NULL,
  `data_previsto` date NOT NULL,
  `data_fim` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_setores`
--

CREATE TABLE `tb_setores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `setor` int(11) NOT NULL,
  `ativo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_projetos`
--
ALTER TABLE `tb_projetos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_setores`
--
ALTER TABLE `tb_setores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_projetos`
--
ALTER TABLE `tb_projetos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_setores`
--
ALTER TABLE `tb_setores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Estrutura da tabela `tb_tarefas`
--

CREATE TABLE IF NOT EXISTS `tb_tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tarefa` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `data_ini` date NOT NULL,
  `data_fim` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tarefa` (`id_tarefa`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_tarefa`
--
ALTER TABLE `tb_tarefas`
  ADD CONSTRAINT `tb_tarefas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id`),
  ADD CONSTRAINT `tb_tarefas_ibfk_1` FOREIGN KEY (`id_tarefa`) REFERENCES `tb_tarefas` (`id`);


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
