-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Set-2025 às 21:26
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cliente`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cli_cod` int(11) NOT NULL,
  `cli_nome` varchar(100) NOT NULL,
  `cli_email` varchar(50) NOT NULL,
  `cli_dtnasc` date NOT NULL,
  `cli_telefone` varchar(15) NOT NULL,
  `cli_end` varchar(70) NOT NULL,
  `cli_sexo` varchar(1) NOT NULL,
  `cli_cid` varchar(35) NOT NULL,
  PRIMARY KEY (`cli_cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`cli_cod`, `cli_nome`, `cli_email`, `cli_dtnasc`, `cli_telefone`, `cli_end`, `cli_sexo`, `cli_cid`) VALUES
(1, 'Lucas Magalhaes', 'lucas.magalhaes31102008@gmail.com', '2008-10-31', '(18)981882630', 'Rua das ruas, 89', 'm', ''),
(2, 'Jose Feguntes', 'jose@torres.com.br', '2004-01-01', '(18)98412445555', 'Rua do barro, 90', 'm', ''),
(3, 'joao', 'jj@jj.com.br', '0000-00-00', '1899983127', 'rua do c', 'f', ''),
(4, 'mano', 'dadsda@fff', '0000-00-00', '123273278', 'kdakdksjdj', 'f', ''),
(22, 'ee', 'dadsda@fff', '0000-00-00', '324142421', 'kdakdksjdj', 'f', ''),
(89, 'Jacinto Pinto Aquino Rego', 'jacintopinto@gmail.com', '2000-02-10', '18994206769', 'Pikadora', 'f', 'Picalandia'),
(11, 'Lucas Bernar', 'lucsa.ber_santos@gmail.cpm', '0000-00-00', '142382109384', 'Rua do maior Viado', 'm', 'Rolandia'),
(17, 'gustavo', 'gustavo@gmail.com', '1980-12-12', '3123123931', 'Camelo', 'f', 'Olho');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
