-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Jun-2026 às 03:20
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cli_nome`, `email`, `nickname`, `senha`, `administrador`) VALUES
(14, 'Gustavo Almeida', 'gustavo.almeida@gmail.com', 'GhostGus', '$2y$10$pc9O/jaoot.oVYtu.0geN.sx1FMI07mfH74aZNjpHT1LOic7Q1j1.', 'usuario'),
(15, 'Marina Oliveira', 'marina.oliveira@gmail.com', 'MariGames', '$2y$10$ZqxVhGqgVTuuAVXruPnjkOcJcUecjOzqFf7UcJrGxIByfLZvUGwF2', 'usuario'),
(16, 'Camila Rodrigues', 'camila.rodrigues@gmail.com', 'KamiGG', '$2y$10$ExaW.Jiogt/tGzAU5jpZK.Oh/asT.d3p6BSr8m7tMFarZ1F22yD7S', 'usuario'),
(17, 'Lucas Ferreira', 'lucas.ferreira@gmail.com', 'LkzFPS', '$2y$10$LECIQz5mnKpH0Sz9HMYeg.JRFZxdSD6aKPXGL7DDtS7sX0TMaeZgC', 'usuario'),
(18, 'Rafael Santos', 'rafael.santos@gmail.com', 'RafaX', '$2y$10$5eMUe2ickq8E9j6gDNlakuIHurKzuVqUvfSiP7Q7yOa2DakH6zmPG', 'usuario'),
(21, 'Gustavo Moreira', 'gustavoxmoreira2008@gmail.com', 'Gus', '$2y$10$neGXY7/rNYxeB.1SVDYT4.B8u7wqmlfslQjkGd5IcUAMW6teHQWFm', 'admin'),
(22, 'Lucas Santos', 'lucasberlucasbernardinellisan@gmail.com', 'Havyto', '$2y$10$hQ7alZJTarojmKzxIqq0WuqSmPBNGw.Aiz1XJbdpYDgZkp8YxCN7i', 'admin'),
(23, 'Lucas Magalhaes', 'lucas.magalhaes31102008@gmail.com', 'Lucas', '$2y$10$bAcdoLDjrbZxrPgvzyrehOpGUbTqAn0PvJcZ1QYewJis.1KWh309q', 'admin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `razao_social`, `nome_fantasia`, `CNPJ`, `data_abertura`, `telefone`, `email`, `Rua`, `numero`, `bairro`, `cidade`, `estado`, `cep`, `pais`) VALUES
(1, 'TechNova Games Ltda', 'Ghost Gamer Studios', '12.345.678/000', '2022-08-12', '(11) 98765-432', 'contato@ghostgamer.com', 'Rua das Gameplays', '245', 'Centro', 'SÃ£o Paulo', 'SP', '01001-00', 'Br'),
(2, 'PixelStorm Tecnologia Digital Ltda', 'PixelStorm Games', '98.765.432/000', '2012-05-03', '(21) 97654-321', 'suporte@pixelstorm.com', 'Avenida Digital World', '880', 'Vila TecnolÃ³gica', 'Rio de Janeiro', 'RJ', '20040-02', 'Br'),
(3, 'NeoArcade Entertainment S.A.', 'NeoArcade', '45.678.901/000', '2002-11-28', '(31) 99876-543', 'contato@neoarcade.com', 'Rua dos E-Sports', '1020', 'Savassi', 'Belo Horizonte', 'MG', '30140-11', 'Br');

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
