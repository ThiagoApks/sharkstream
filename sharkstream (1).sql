-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Maio-2021 às 04:00
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sharkstream`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nomecategoria` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nomecategoria`) VALUES
(1, 'Canais - Filmes e séries'),
(2, 'Canais - Documentários'),
(3, 'Filmes - Lançamentos'),
(6, 'Filmes - Comédia'),
(7, 'Canais - Infantil'),
(8, 'Canais - Esportes'),
(10, 'Canais - Abertos'),
(12, 'Canais - Notícias'),
(13, 'Canais - Variedade e Músicas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE `links` (
  `id` int(1) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `logo` varchar(1024) NOT NULL,
  `link` varchar(1024) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`id`, `nome`, `logo`, `link`, `categoria`) VALUES
(1, 'Paramount HD', 'http://i.imgur.com/yScrn6s.png', 'http://origin-02.nxplay.com.br/PCBR_HD_NX_9998_/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 1),
(2, 'Comedy Central HD', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Comedy_Central_HD_Logo_2018.svg/1200px-Comedy_Central_HD_Logo_2018.svg.png', 'http://origin-02.nxplay.com.br/CCLB_HD_NXPLAY/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 1),
(3, 'Nickelodeon HD', 'http://i.imgur.com/ZjLSLiY.png', 'http://origin-02.nxplay.com.br/NICK_BR_HD_dr/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 7),
(4, 'Disney XD', 'http://i.imgur.com/zNNIALN.png', 'http://playplusdisney-lh.akamaihd.net/i/pp_dsneyxd@376337/index_720_av-b.m3u8?PEDROJUNIORTUTORIAIS', 7),
(7, 'Fish TV', 'http://i.imgur.com/HXQoT1u.png', 'http://origin-02.nxplay.com.br/FISH_TV_NX/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 2),
(8, 'ESPN Brasil HD', 'http://i.imgur.com/rTXcueh.png', 'http://playplusespn-lh.akamaihd.net/i/pp_espnbra@374460/index_720_av-p.m3u8?PEDROJUNIORTUTORIAIS', 8),
(9, 'Disney JR', 'http://i.imgur.com/H9AY5z4.png', 'http://playplusdisney-lh.akamaihd.net/i/pp_dsneyjr@376337/index_360_av-b.m3u8?PEDROJUNIORTUTORIAIS', 7),
(10, 'TBS HD', 'http://i.imgur.com/XHUoj3n.png', 'http://origin-02.nxplay.com.br/TBS_01/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 1),
(11, 'Record TV', 'https://listaiptv.gratis/logos/imagens/recordtv.png', 'https://playplusspo-lh.akamaihd.net/i/pp_sp@350176/master.m3u8', 10),
(12, 'SBT', 'http://i.imgur.com/7SlZF9B.png', 'https://5a1c76baf08c0.streamlock.net/sbtinterior/50pf8qezghnalfptgsjlsqy4co1893sx/playlist.m3u8?PEDROJUNIORTUTORIAIS', 10),
(13, 'Globo HD', 'http://i.imgur.com/NSHvLCe.png', 'http://live.video.globo.com/h/1402196682759012345678915746027599876543210hM4EA1neMoQoIiUyVn1TNg/k/app/a/A/u/anyone/d/s/hls-globo-rj/hls-globo-rj_2359/playlist.m3u8?PEDROJUNIORTUTORIAIS', 10),
(14, 'Band HD', 'https://listaiptv.gratis/logos/imagens/band.png', 'http://evpp.mm.uol.com.br:1935/geob_band/app/playlist.m3u8', 10),
(15, 'Film&Arts', 'https://cdn.worldvectorlogo.com/logos/film-arts.svg', 'http://origin-02.nxplay.com.br/Film_Arts_Brasil/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 13),
(16, 'Disney Channel HD', 'http://i.imgur.com/ETxffjm.png', 'http://playplusdisney-lh.akamaihd.net/i/pp_dsneych@376337/index_720_av-b.m3u8?PEDROJUNIORTUTORIAIS', 7),
(17, 'Zomoo', 'http://i.imgur.com/WCFVJCx.png', 'http://origin-02.nxplay.com.br/ZOOMOO_HD_NX_01/tracks-v1a1/mono.m3u8?PEDROJUNIORTUTORIAIS', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `listas`
--

INSERT INTO `listas` (`id`, `nome`) VALUES
(1, 'Lista teste'),
(3, 'CastroIPTV');

-- --------------------------------------------------------

--
-- Estrutura da tabela `listas_categorias`
--

CREATE TABLE `listas_categorias` (
  `id` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `listas_categorias`
--

INSERT INTO `listas_categorias` (`id`, `id_lista`, `id_categoria`) VALUES
(6, 1, 1),
(7, 1, 6),
(8, 1, 3),
(9, 1, 2),
(10, 3, 1),
(12, 3, 6),
(13, 3, 3),
(14, 3, 7),
(15, 3, 8),
(16, 3, 10),
(17, 3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_acessos`
--

CREATE TABLE `lista_acessos` (
  `idacesso` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `acesso_expira` datetime NOT NULL,
  `token` varchar(528) NOT NULL,
  `gerado_por` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `lista_acessos`
--

INSERT INTO `lista_acessos` (`idacesso`, `id_lista`, `id_usuario`, `acesso_expira`, `token`, `gerado_por`) VALUES
(8, 3, 5, '2021-05-19 09:18:00', 'd34e14a855097a2b499f5fb636ae63b0', 3),
(9, 3, 5, '2021-06-19 00:00:00', '0cda89989e117adbba3b3910c73bd322', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(128) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `revendedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`, `name`, `role`, `revendedor_id`) VALUES
(3, 'areaseca4@gmail.com', 'E782B0A177ED92A8C678EA0C32DE457975634C219E0C5E73B3E929841684C0B1', 'Thiago Castrado', 2, 0),
(5, 'admin@gmail.com', '0BFCC8F60B3C8F8FEB92BAC7D5354344A6FDF82C280F49F0FE5880A6E31E03F8', 'Admin', 2, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `listas_categorias`
--
ALTER TABLE `listas_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `lista_acessos`
--
ALTER TABLE `lista_acessos`
  ADD PRIMARY KEY (`idacesso`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `links`
--
ALTER TABLE `links`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `listas_categorias`
--
ALTER TABLE `listas_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `lista_acessos`
--
ALTER TABLE `lista_acessos`
  MODIFY `idacesso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
