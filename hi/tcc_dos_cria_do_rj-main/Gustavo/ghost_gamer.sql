-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jun-2026 às 19:31
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
  `senha` varchar(255) DEFAULT NULL,
  `administrador` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_cliente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cli_nome`, `email`, `nickname`, `senha`, `administrador`) VALUES
(1, 'Rogério Gomes Ferreira', 'Rogersferreira@gmail.com', 'RogerGigaChad', 'banana12345', 0),
(2, 'Patrícia Borges Cardoso', 'pbclinda@gmail.com', 'PapaBorges', 'tenis12345', 0),
(3, 'Tonio Marcelo Rossi', 'rossitoni@gmail.com', 'Rossi', '22334455', 0),
(4, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '22002200', 0),
(5, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '23/08/2008', 0),
(6, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '11112233', 0),
(7, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '11112233', 0),
(8, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '11112233', 0),
(9, 'dvecvececec', 'cecececececec@gmail', 'sdadfwefwf', '333333333', 0),
(10, 'juju', 'cecececececec@gmail', 'sdadfwefwf', '44444444', 0),
(11, 'Pericles', 'edmundo@gmail.com', 'Jusimar', '987654321', 0),
(12, 'Pericles', 'edmundo@gmail.com', 'Jusimar', '$2y$10$HcVzRFbkfGBglJ0U9T.zouVdMEwsBoNSilQGYnf3t/US.yA15sO4C', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `razao_social` varchar(155) NOT NULL,
  `nome_fantasia` varchar(150) NOT NULL,
  `CNPJ` varchar(14) NOT NULL,
  `data_abertura` date DEFAULT NULL,
  `telefone` varchar(14) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `Rua` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(80) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `pais` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gpu`
--

CREATE TABLE IF NOT EXISTS `gpu` (
  `id_gpu` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(40) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `fabricante` varchar(20) DEFAULT NULL,
  `VRAM` int(10) unsigned DEFAULT NULL,
  `tipo_memoria` varchar(20) DEFAULT NULL,
  `clock` int(10) unsigned DEFAULT NULL,
  `boost` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_gpu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `memoria_ram`
--

CREATE TABLE IF NOT EXISTS `memoria_ram` (
  `id_ram` int(11) NOT NULL AUTO_INCREMENT,
  `MODELO` varchar(40) DEFAULT NULL,
  `MARCA` varchar(20) DEFAULT NULL,
  `CAPACIDADE` int(10) unsigned DEFAULT NULL,
  `TIPO` varchar(20) DEFAULT NULL,
  `FREQUENCIA` int(10) unsigned DEFAULT NULL,
  `MODULOS` int(10) unsigned DEFAULT NULL,
  `LATENCIA` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_ram`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processador`
--

CREATE TABLE IF NOT EXISTS `processador` (
  `id_processador` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(40) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `geracao` varchar(20) DEFAULT NULL,
  `nucleo` int(10) unsigned DEFAULT NULL,
  `threads` int(10) unsigned DEFAULT NULL,
  `clock_base` decimal(4,2) DEFAULT NULL,
  `boost` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`id_processador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
