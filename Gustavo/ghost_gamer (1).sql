-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19-Maio-2026 às 03:12
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ghost_gamer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(110) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `nickname` varchar(110) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cli_nome`, `email`, `nickname`, `senha`) VALUES
(1, 'Rogério Gomes Ferreira', 'Rogersferreira@gmail.com', 'RogerGigaChad', 'banana12345'),
(2, 'Patrícia Borges Cardoso', 'pbclinda@gmail.com', 'PapaBorges', 'tenis12345'),
(3, 'Tonio Marcelo Rossi', 'rossitoni@gmail.com', 'Rossi', '22334455'),
(4, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '22002200'),
(5, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '23/08/2008'),
(6, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '11112233'),
(7, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '11112233'),
(8, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '11112233'),
(9, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '333333333'),
(10, 'juju', 'cecececececec@gmail', 'sdadfwefwf', '44444444');

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE IF NOT EXISTS `jogo` (
  `id_jogo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `empresa_email` varchar(110) DEFAULT NULL,
  `genero` varchar(110) DEFAULT NULL,
  `nucleos` int(10) unsigned DEFAULT NULL,
  `threads` int(10) unsigned DEFAULT NULL,
  `frequencia` decimal(10,0) DEFAULT NULL,
  `ram_gb` int(10) unsigned DEFAULT NULL,
  `vram_gb` int(10) unsigned DEFAULT NULL,
  `armazenamento` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_jogo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `titulo`, `empresa_email`, `genero`, `nucleos`, `threads`, `frequencia`, `ram_gb`, `vram_gb`, `armazenamento`) VALUES
(2, 'patutuinhas', 'LucasberingelaInc@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'adaadsad', 'LucasberingelaInc@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'gggggg', 'LucasberingelaInc@gmail.com', 'rpg', NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
