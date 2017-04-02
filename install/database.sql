-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: 31-Mar-2017 às 06:30
-- Versão do servidor: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `facebookpub`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigos_recuperacao_senha`
--

CREATE TABLE `codigos_recuperacao_senha` (
  `id` int(11) NOT NULL,
  `email` varchar(120) NOT NULL,
  `codigo` varchar(100) NOT NULL,
  `expirado` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `group_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paginas`
--

CREATE TABLE `paginas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_page` varchar(30) NOT NULL,
  `token` text,
  `curtidas` int(11) NOT NULL,
  `crescimento` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `programacoes`
--

CREATE TABLE `programacoes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titulo_link` varchar(150) DEFAULT NULL,
  `descricao_link` text,
  `imagem_link` varchar(200) DEFAULT NULL,
  `url_link` varchar(255) DEFAULT NULL,
  `imagem_imagem` varchar(200) DEFAULT NULL,
  `titulo_video` varchar(150) DEFAULT NULL,
  `descricao_video` text,
  `link_video` varchar(200) DEFAULT NULL,
  `mensagem_post` text,
  `link_final_postagem` varchar(255) DEFAULT NULL,
  `data_programacao` datetime NOT NULL,
  `repetir_programacao` int(11) DEFAULT '0',
  `intervalo` int(20) DEFAULT NULL,
  `data_final_repeticao` datetime DEFAULT NULL,
  `tipo_programacao` varchar(10) NOT NULL,
  `lugar_postagem` varchar(20) NOT NULL,
  `data_criacao` date NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `programacoes_contas`
--

CREATE TABLE `programacoes_contas` (
  `id` int(11) NOT NULL,
  `id_programacao` int(11) NOT NULL,
  `id_conta` int(11) NOT NULL,
  `post_id` varchar(50) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


--
-- Estrutura da tabela `relatorio_curtidas`
--

CREATE TABLE `relatorio_curtidas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_page` varchar(50) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `token` text,
  `status` int(11) NOT NULL,
  `data_cadastro` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Tabela de cadastro de usuários';

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `admin`, `nome`, `email`, `login`, `senha`, `token`, `status`, `data_cadastro`) VALUES
(1, 1, 'NOME-USER', 'EMAIL-USER', 'LOGIN-USER', 'SENHA-USER', NULL, 1, 'DATA-CADASTRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `website_config`
--

CREATE TABLE `website_config` (
  `id` int(11) NOT NULL,
  `nome_site` varchar(100) NOT NULL,
  `descricao_site` text NOT NULL,
  `linguagem` varchar(10) NOT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `app_id` varchar(150) NOT NULL,
  `app_secret` varchar(150) NOT NULL,
  `purchase_code` VARCHAR(70) DEFAULT NULL,
  `permitir_cadastros` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `website_config`
--

INSERT INTO `website_config` (`id`, `nome_site`, `descricao_site`, `linguagem`, `timezone`, `app_id`,  `app_secret`, `purchase_code`) VALUES
(1, 'FacebookPub', 'FacebookPub Description', 'english', 'America/Sao_Paulo', 'APP-ID', 'APP-SECRET', 'PURCHASE-CODE', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codigos_recuperacao_senha`
--
ALTER TABLE `codigos_recuperacao_senha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programacoes`
--
ALTER TABLE `programacoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programacoes_contas`
--
ALTER TABLE `programacoes_contas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relatorio_curtidas`
--
ALTER TABLE `relatorio_curtidas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_config`
--
ALTER TABLE `website_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codigos_recuperacao_senha`
--
ALTER TABLE `codigos_recuperacao_senha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programacoes`
--
ALTER TABLE `programacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `programacoes_contas`
--
ALTER TABLE `programacoes_contas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `relatorio_curtidas`
--
ALTER TABLE `relatorio_curtidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `website_config`
--
ALTER TABLE `website_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;