-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03/10/2024 às 14:31
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `prefeitura`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `imoveis`
--

CREATE TABLE `imoveis` (
  `inscricao_municipal` int(11) NOT NULL,
  `logadouro` varchar(255) NOT NULL,
  `numero` int(10) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `contribuinte` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `imoveis`
--

INSERT INTO `imoveis` (`inscricao_municipal`, `logadouro`, `numero`, `bairro`, `complemento`, `contribuinte`) VALUES
(1, 'Avenida John Kennedy', 350, 'Morro do Espelho', '', 'Nando Reis'),
(2, 'Rua Menino Deus', 204, 'Santa Teresa', '', 'Nando Reis'),
(3, 'Rua Laranjeiras', 111, 'Rosa Norte', '', 'Cássia Eller'),
(4, 'Rua da Praça', 131, 'Scharlau', 'Apartamento 405', 'Lulu Santos'),
(5, 'Avenida Coronel Cunha', 90, 'Morro do Espelho', 'Casa 25', 'Ivete Sangalo'),
(6, 'Avenida Beira Mar', 400, 'Leblon', '', 'Renato Russo'),
(7, 'Rua Humberto Magalhães', 1072, 'Cristo Rei', '', 'Olivia Rodrigo'),
(8, 'Rua da Água', 901, 'Campestre', '18', 'Carlinhos Brown');

-- --------------------------------------------------------

--
-- Estrutura para tabela `proprietarios`
--

CREATE TABLE `proprietarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `data_nascimento` date NOT NULL,
  `cpf` varchar(12) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `proprietarios`
--

INSERT INTO `proprietarios` (`id`, `nome`, `data_nascimento`, `cpf`, `sexo`, `telefone`, `email`) VALUES
(1, 'Nando Reis', '1963-01-12', '19937871861', 'Masculino', '19731896318', 'nando@gmail.com'),
(2, 'Cássia Eller', '1962-12-10', '83781631978', 'Feminino', '83615738993', ''),
(3, 'Lulu Santos', '1953-06-04', '73263728672', 'Masculino', '', 'lulusantos@gmail.com'),
(4, 'Carlinhos Brown', '1962-11-23', '31801198011', 'Masculino', '', ''),
(5, 'Renato Russo', '1960-03-27', '13651631646', 'Masculino', '87971196137', 'renato@gmail.com'),
(6, 'Ivete Sangalo', '1972-03-27', '19381973613', 'Feminino', '55193901109', 'ivete@gmail.com'),
(7, 'Olivia Rodrigo', '2003-03-20', '18939177197', 'Feminino', '51668965330', 'olivia@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Carlos Wendling', 'cadu@gmail.com', '$2y$10$d4PD5RIl2qm.Lg4TmK/tj.datIhUagBXie0ICCbmZuT94gZRTW3Ea');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `imoveis`
--
ALTER TABLE `imoveis`
  ADD PRIMARY KEY (`inscricao_municipal`);

--
-- Índices de tabela `proprietarios`
--
ALTER TABLE `proprietarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `imoveis`
--
ALTER TABLE `imoveis`
  MODIFY `inscricao_municipal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `proprietarios`
--
ALTER TABLE `proprietarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
