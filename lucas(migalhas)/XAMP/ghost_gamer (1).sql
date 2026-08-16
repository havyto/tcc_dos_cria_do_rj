-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16-Ago-2026 às 22:12
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
  `administrador` enum('usuario','admin') NOT NULL DEFAULT 'usuario',
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cli_nome`, `email`, `nickname`, `senha`, `administrador`) VALUES
(14, 'Gustavo Almeida', 'gustavo.almeida@gmail.com', 'GhostGus', '', 'usuario'),
(15, 'Marina Oliveira', 'marina.oliveira@gmail.com', 'MariGame', '', 'usuario'),
(16, 'Camila Rodrigues', 'camila.rodrigues@gmail.com', 'KamiGG', '$2y$10$ExaW.Jiogt/tGzAU5jpZK.Oh/asT.d3p6BSr8m7tMFarZ1F22yD7S', 'usuario'),
(17, 'Lucas Ferreira', 'lucas.ferreira@gmail.com', 'LkzFPS', '$2y$10$LECIQz5mnKpH0Sz9HMYeg.JRFZxdSD6aKPXGL7DDtS7sX0TMaeZgC', 'usuario'),
(18, 'Rafael Santos', 'rafael.santos@gmail.com', 'RafaX', '$2y$10$5eMUe2ickq8E9j6gDNlakuIHurKzuVqUvfSiP7Q7yOa2DakH6zmPG', 'usuario'),
(21, 'Gustavo Moreira', 'gustavoxmoreira2008@gmail.com', 'Gus', '$2y$10$neGXY7/rNYxeB.1SVDYT4.B8u7wqmlfslQjkGd5IcUAMW6teHQWFm', 'admin'),
(23, 'Lucas Magalhaes', 'lucas.magalhaes31102008@gmail.com', 'Lucas', '$2y$10$bAcdoLDjrbZxrPgvzyrehOpGUbTqAn0PvJcZ1QYewJis.1KWh309q', 'admin'),
(24, 'Lucas Santos', 'lucasbernardinellisan@gmail.com', 'Havyto', '$2y$10$Cx3oIAHR7c8apxkREQo9yOQJsSiED9lXc/J6tZY/m.O/1BlbIWhC2', 'admin');

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
  `pais` char(6) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `razao_social`, `nome_fantasia`, `CNPJ`, `data_abertura`, `telefone`, `email`, `Rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `pais`) VALUES
(1, 'TechNova Games Ltda', 'Ghost Gamer Studios', '12.345.678/000', '2022-08-12', '(11) 98765-432', 'contato@ghostgamer.com', 'Rua das Gameplays', '245', 'Centro', 'SÃ£o Paulo', 'SP', '01001-00', 'Brasil'),
(2, 'PixelStorm Tecnologia Digital Ltda', 'PixelStorm Games', '98.765.432/000', '2012-05-03', '(21) 97654-321', 'suporte@pixelstorm.com', 'Avenida Digital World', '880', 'Vila TecnolÃ³gica', 'Rio de Janeiro', 'RJ', '20040-02', 'Brasil'),
(3, 'NeoArcade Entertainment S.A.', 'NeoArcade', '45.678.901/000', '2002-11-28', '(31) 99876-543', 'contato@neoarcade.com', 'Rua dos E-Sports', '1020', 'Savassi', 'Belo Horizonte', 'MG', '30140-11', 'Brasil'),
(4, 'VegetaTecnologia', 'VegeTec', '123906423232', '2014-05-09', '20993784723', 'VegetablesTec@gmail.com', 'Rua Abara Silva Campos', '453', 'SÃ£o Arnaldo', 'Montes Claros', 'MG', '23784745', 'Brasil'),
(5, 'Heartsetups', 'Heartups', '384612044', '1999-08-28', '196439203', 'heartup@gmail.com', 'Avenida Borges de Medeiros', '33', 'Vila SuÃ­Ã§a', 'Gramado', 'RS', '34526637', 'Brasil'),
(7, 'LightzZZ', 'LightzZZ', '434398093534', '2006-01-03', '1893874893', 'Lightzz@gmail.com', 'Rua New Armstrong', '999', 'Bayro', 'UberlÃ¢ndia', 'SP', '54343973', 'Brasil');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `titulo`, `empresa_email`, `genero`, `nucleos`, `threads`, `frequencia`, `ram_gb`, `vram_gb`, `armazenamento`) VALUES
(4, 'GOGOGOZIIIIIG', 'LucasberingelaInc@gmail.com', 'SimulaÃ§Ã£o', 3, 3, '4', 4, 5, 6),
(7, 'BombPotato', 'VegetablesTec@gmail.com', 'Indie', 3, 4, '3', 6, 1, 20),
(8, 'Godzilla Disaster', 'VegetablesTec@gmail.com', 'Luta', 5, 4, '4', 8, 4, 50),
(9, 'Junker Hospital', 'heartup@gmail.com', 'SimulaÃ§Ã£o', 3, 2, '2', 6, 2, 30),
(10, 'Door Runners', 'suporte@pixelstorm.com', 'Corrida', 4, 5, '5', 8, 6, 68),
(11, 'Darkeness Spike', 'suporte@pixelstorm.com', 'Terror', 6, 5, '6', 8, 8, 80),
(12, 'O Amor Ã© Cego', 'suporte@pixelstorm.com', 'Musical', 7, 7, '7', 7, 7, 7);

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
