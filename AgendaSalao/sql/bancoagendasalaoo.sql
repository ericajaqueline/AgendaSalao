-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Ago-2024 às 19:18
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Banco de dados: `bancoagendasalaoo`

-- Limpar tabelas existentes
DROP TABLE IF EXISTS `agendamentos`;
DROP TABLE IF EXISTS `secretarias`;
DROP TABLE IF EXISTS `servicos`;

-- Estrutura da tabela `agendamentos`
CREATE TABLE `agendamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_cliente` varchar(100) NOT NULL,
  `telefone_cliente` varchar(15) DEFAULT NULL,
  `data_agendamento` date NOT NULL,
  `horario_agendamento` time NOT NULL,
  `id_servico` int(11) DEFAULT NULL,
  `id_secretaria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_servico` (`id_servico`),
  KEY `id_secretaria` (`id_secretaria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Estrutura da tabela `secretarias`
CREATE TABLE `secretarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_secretaria` varchar(100) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Estrutura da tabela `servicos`
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_servico` varchar(100) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Inserir dados de exemplo na tabela `servicos`
INSERT INTO `servicos` (`nome_servico`, `descricao`, `preco`) VALUES
('Corte de Cabelo', 'Corte de cabelo masculino e feminino', 50.00),
('Manicure', 'Serviço de manicure e pedicure', 30.00),
('Massagem', 'Massagem relaxante e terapêutica', 80.00);

-- Inserir dados de exemplo na tabela `secretarias`
INSERT INTO `secretarias` (`login`,`nome_secretaria`, `senha`) VALUES
('maria@test.com', 'maria da silva','senha123'),
('joao@mail.com', 'joao ','senha456'),
('admin', 'admin ','123');

-- Inserir dados de exemplo na tabela `agendamentos`
INSERT INTO `agendamentos` (`nome_cliente`, `telefone_cliente`, `data_agendamento`, `horario_agendamento`, `id_servico`, `id_secretaria`) VALUES
('Ana', '111111111', '2024-08-31', '11:40:00', 1, 1),
('Carlos', '222222222', '2024-09-01', '14:00:00', 2, 2),
('Beatriz', '333333333', '2024-09-02', '09:30:00', 3, 1);


-- Adicionar restrições de chave estrangeira
ALTER TABLE `agendamentos`
  ADD CONSTRAINT `agendamentos_ibfk_1` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id`),
  ADD CONSTRAINT `agendamentos_ibfk_2` FOREIGN KEY (`id_secretaria`) REFERENCES `secretarias` (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;