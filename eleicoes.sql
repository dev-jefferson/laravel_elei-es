-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 20/12/2018 às 11:30
-- Versão do servidor: 5.7.23-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `eleicoes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `partido` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `votos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `candidatos`
--

INSERT INTO `candidatos` (`id`, `nome`, `numero`, `partido`, `categoria`, `img`, `votos`) VALUES
(1, 'Bolsonaro', 17, 'PSL', 'Presidente', 'bolsonaro.png', 3),
(3, 'Ciro', 12, 'PDT', 'Presidente', 'ciro.png', 3),
(4, 'Marina', 25, 'PSOL', 'Presidente', 'marina.png', 0),
(5, 'João Amoêdo', 30, 'NOVO', 'Presidente', 'joao.png', 1),
(6, 'Alvaro Dias', 19, 'PODE', 'Presidente', 'alvaro.png', 0),
(7, 'Henrique Meirelles', 15, 'MDB', 'Presidente', 'henrique.png', 1),
(8, 'Geraldo Alckmin', 45, 'PSDB', 'Presidente', 'geraldo.png', 0),
(9, 'Cabo Daciolo', 51, 'PATRIOTA', 'Presidente', 'cabo.png', 4),
(10, 'Luiz Gomes', 46, 'PEN', 'Prefeito', 'luiz.png', 2),
(11, 'Petronilo', 18, 'REDE', 'Prefeito', 'petronilo.png', 0),
(12, 'Carlinhos Pastor', 14, 'PTB', 'Prefeito', 'carlinhos.png', 0),
(14, 'Rosalba', 90, 'PMDB', 'Governador', 'rosalba.png', 0),
(15, 'Garibaldi Alves', 87, 'PSS', 'Governador', 'garibaldi.png', 0),
(16, 'Robinson', 55, 'PSD', 'Governador', 'robinson.png', 1),
(17, 'Fátima', 13, 'PT', 'Governador', 'fatima.png', 0),
(18, 'Kelps', 77, 'SD', 'Prefeito', 'kelps.png', 2),
(20, 'Carlos Eduardo', 11, 'PDT', 'Governador', 'carlos.png', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Fazendo dump de dados para tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_12_17_234005_create_candidatos_table', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
