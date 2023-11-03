-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/11/2023 às 02:37
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `pessoa_id` int(11) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `contato`
--

INSERT INTO `contato` (`id`, `pessoa_id`, `tipo`, `descricao`) VALUES
(34, 25, 'E-mail', 'wiliam@teste.com.br'),
(35, 26, 'Telefone', '(00)11111-1111'),
(36, 25, 'E-mail', 'teste@gmail.com'),
(37, 26, 'E-mail', 'magazord@magazord.com.br'),
(38, 27, 'Telefone', '(44)99999-4444'),
(39, 29, 'Telefone', '(43)55555-5545'),
(40, 29, 'E-mail', 'aaaa@aaa.com.br'),
(41, 25, 'Telefone', '(47)44444-4444'),
(42, 25, 'Telefone', '(66)66666-6666'),
(43, 25, 'Telefone', '(55)55555-4444');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pessoa`
--

INSERT INTO `pessoa` (`id`, `nome`, `cpf`) VALUES
(25, 'wiliam wessner', '111.111.111-14'),
(26, 'testador', '111.111.111-11'),
(27, 'pedro henrique', '222.222.222-22'),
(29, 'michele', '222.222.222-33'),
(30, 'henrique', '435.456.345-66'),
(31, 'josé', '343.243.332-77'),
(32, 'wiliam wessner', '111.444.555-44'),
(33, 'erfgh', '111.111.111-13'),
(34, 'joão pedro', '111.111.111-15'),
(35, 'teste', '111.124.654-55'),
(36, 'tester', '555.555.555-66'),
(37, 'léo', '222.444.333-33');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa_id` (`pessoa_id`);

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `contato_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
