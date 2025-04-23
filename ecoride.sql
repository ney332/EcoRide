-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 23/04/2025 às 15:26
-- Versão do servidor: 5.7.11
-- Versão do PHP: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecoride`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `Id` int(11) NOT NULL,
  `Nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CPF` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `E-mail` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Telefone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `Data_de_Nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `pessoa`
--

INSERT INTO `pessoa` (`Id`, `Nome`, `CPF`, `E-mail`, `Telefone`, `Data_de_Nascimento`) VALUES
(1, 'Henrique Li', '12277799901', 'henriqque001@gmail.com', '21985213867', '2004-08-11'),
(2, 'Vinicius Li', '11122233344', 'vini001@gmail.com', '21999999999', '2004-09-20'),
(3, 'Vitor Li', '22233344455', 'vitor00011@gmail.com', '21988888888', '2006-02-11'),
(4, 'Sarah', '44455566677', 'sarah99@gmail.com', '21977777777', '2003-07-11'),
(5, 'fernanda camargo', '11122233344', 'higua@gmail.com', '21966666666', '2009-08-11'),
(16, 'Giovanna', '44433399977', 'giovanna04@gmail.com', '21944444444', '2004-07-08'),
(17, 'Giovanna', '44433399977', 'giovanna04@gmail.com', '21944444444', '2004-07-08');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
