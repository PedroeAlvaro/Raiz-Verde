-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Mar-2026 às 16:52
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `raizverde`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `imagem`) VALUES
(1, 'Garrafa Reutilizável', 'Garrafa de aço inoxidável, reutilizável e livre de BPA. Ideal para manter a água fresca durante todo o dia e reduzir o consumo de plástico descartável.', 12.99, 'https://cookandlifestyle.pt/cdn/shop/products/GR-WB-M010_Glass_water_bottle_Olive_t0sz5g.jpg?v=1680686331&width=1024'),
(2, 'Escova de Bambu', 'Escova de dentes feita com cabo de bambu biodegradável. As cerdas são suaves e perfeitas para uma higiene diária responsável com o planeta.', 3.50, 'https://thebamandboo.com/cdn/shop/files/bam-and-boo-grounded-skincare-azores-bamboo-toothbrush-pack-shot-product-00.jpg?v=1712247189'),
(3, 'Saco de Pano', 'Saco de algodão orgânico, resistente e reutilizável. Perfeito para compras e transporte de pequenos objetos sem recorrer a sacos de plástico.', 4.99, 'https://www.google.com/imgres?q=saco%20de%20pano&imgurl=https%3A%2F%2Ftshirtlovers.pt%2Fimages%2Fprodutos%2Fsaco-de-pano-de-alcas-coloridas-impacto-180g-5.jpg&imgrefurl=https%3A%2F%2Ftshirtlovers.pt%2Fprodutos%2Fsacos%2Fsacos-de-alcas%2F1%2Fsaco-de-pano-d'),
(4, 'Palhinhas de Metal', 'Conjunto de palhinhas de aço inox com escova de limpeza. Reutilizáveis, higiénicas e amigas do ambiente.', 6.90, 'https://cdn.shopk.it/usercontent/ograneldasofia/media/images/8593478-120724-palinha_curva_unidade_mind_the_trash-min-800x800.png'),
(5, 'Sabão Natural', 'Sabão feito com ingredientes naturais e biodegradáveis. Ideal para higiene pessoal, com fragrância suave e sem químicos agressivos.', 5.20, 'https://www.tradicaonatural.pt/wp-content/uploads/2023/07/SabaoNatural_2023-Compra-Familiar-600x600.webp'),
(6, 'Champô Sólido', 'Champô em barra, 100% natural, sem plástico e adequado para todos os tipos de cabelo. Proporciona limpeza eficaz e brilho natural.', 8.99, 'https://halfarroba.com/wp-content/uploads/2023/06/307018.png'),
(7, 'Detergente Ecológico', 'Detergente para roupa e louça feito com ingredientes biodegradáveis, eficiente na limpeza e seguro para o ambiente.', 7.50, 'https://almadealecrim.pt/wp-content/uploads/2022/09/Alma-de-Alecrim-Loja-online-Detergente-Ecologico-EcoX-10.jpg'),
(8, 'Copo de Bambu', 'Copo reutilizável feito de bambu natural, perfeito para bebidas frias ou quentes. Leve e durável, ideal para crianças e adultos.', 9.90, 'https://www.ecobrindes.com.br/content/interfaces/cms/userfiles/produtos/copo-ecologico-bambu-eb1299-462.jpg'),
(9, 'Papel Reciclado', 'Papel produzido a partir de fibras recicladas. Excelente para escrita e impressão, contribuindo para a redução de desmatamento.', 2.50, 'https://tendadepapel.pt/cdn/shop/files/papel-reciclado-convites.jpg?v=1729153677&width=1946'),
(10, 'Velas Naturais', 'Velas feitas com cera natural e óleos essenciais. Queimam de forma limpa e proporcionam aroma agradável em qualquer divisão.', 6.75, 'https://www.artigosreligiososloja.pt/uploads/media/images/velas-de-cera-abeja-1.jpg'),
(11, 'Garrafa', '', 9.00, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQQRLfUGy-eFJoLss6Vk5FSotIiy6QfO35Haw&s');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
