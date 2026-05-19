-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/05/2026 às 18:50
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ghost_gamer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cli_nome` varchar(110) DEFAULT NULL,
  `email` varchar(110) DEFAULT NULL,
  `nickname` varchar(110) DEFAULT NULL,
  `senha` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `clientes`
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
-- Estrutura para tabela `gpu`
--

CREATE TABLE `gpu` (
  `id_gpu` int(11) NOT NULL,
  `modelo` varchar(40) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `fabricante` varchar(20) DEFAULT NULL,
  `VRAM` int(10) UNSIGNED DEFAULT NULL,
  `tipo_memoria` varchar(20) DEFAULT NULL,
  `clock` int(10) UNSIGNED DEFAULT NULL,
  `boost` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `jogo`
--

CREATE TABLE `jogo` (
  `id_jogo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `empresa_email` varchar(110) DEFAULT NULL,
  `genero` varchar(110) DEFAULT NULL,
  `nucleos` int(10) UNSIGNED DEFAULT NULL,
  `threads` int(10) UNSIGNED DEFAULT NULL,
  `frequencia` decimal(10,0) DEFAULT NULL,
  `ram_gb` int(10) UNSIGNED DEFAULT NULL,
  `vram_gb` int(10) UNSIGNED DEFAULT NULL,
  `armazenamento` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `jogo`
--

INSERT INTO `jogo` (`id_jogo`, `titulo`, `empresa_email`, `genero`, `nucleos`, `threads`, `frequencia`, `ram_gb`, `vram_gb`, `armazenamento`) VALUES
(2, 'patutuinhas', 'LucasberingelaInc@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'adaadsad', 'LucasberingelaInc@gmail.com', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'gggggg', 'LucasberingelaInc@gmail.com', 'rpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `memoria_ram`
--

CREATE TABLE `memoria_ram` (
  `id_ram` int(11) NOT NULL,
  `MODELO` varchar(40) DEFAULT NULL,
  `MARCA` varchar(20) DEFAULT NULL,
  `CAPACIDADE` int(10) UNSIGNED DEFAULT NULL,
  `TIPO` varchar(20) DEFAULT NULL,
  `FREQUENCIA` int(10) UNSIGNED DEFAULT NULL,
  `MODULOS` int(10) UNSIGNED DEFAULT NULL,
  `LATENCIA` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `processador`
--

CREATE TABLE `processador` (
  `id_processador` int(11) NOT NULL,
  `modelo` varchar(40) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `geracao` varchar(20) DEFAULT NULL,
  `nucleo` int(10) UNSIGNED DEFAULT NULL,
  `threads` int(10) UNSIGNED DEFAULT NULL,
  `clock_base` decimal(4,2) DEFAULT NULL,
  `boost` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `gpu`
--
ALTER TABLE `gpu`
  ADD PRIMARY KEY (`id_gpu`);

--
-- Índices de tabela `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id_jogo`);

--
-- Índices de tabela `memoria_ram`
--
ALTER TABLE `memoria_ram`
  ADD PRIMARY KEY (`id_ram`);

--
-- Índices de tabela `processador`
--
ALTER TABLE `processador`
  ADD PRIMARY KEY (`id_processador`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `gpu`
--
ALTER TABLE `gpu`
  MODIFY `id_gpu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id_jogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `memoria_ram`
--
ALTER TABLE `memoria_ram`
  MODIFY `id_ram` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `processador`
--
ALTER TABLE `processador`
  MODIFY `id_processador` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
