-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/10/2020 às 11:31
-- Versão do servidor: 8.0.21
-- Versão do PHP: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moobi_toy`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `campos_personalizados`
--

CREATE TABLE `campos_personalizados` (
  `id` int NOT NULL,
  `nome` varchar(256) NOT NULL,
  `type` varchar(100) NOT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `nome_coluna` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `campos_personalizados`
--

INSERT INTO `campos_personalizados` (`id`, `nome`, `type`, `ativo`, `nome_coluna`) VALUES
(16, 'Data', 'text', 1, 'data'),
(40, 'imagem', 'text', 1, 'imagem');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int NOT NULL,
  `data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_revendedor` int DEFAULT NULL,
  `id_tp_pagamento` int NOT NULL,
  `valor_venda` decimal(10,2) DEFAULT NULL,
  `parcelas` int DEFAULT NULL,
  `id_usuario` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1:processado|2:pendente|3:finalizado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `data`, `id_revendedor`, `id_tp_pagamento`, `valor_venda`, `parcelas`, `id_usuario`, `status`) VALUES
(70, '2020-10-05 11:11:12', 4, 1, '160.00', 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos_produtos`
--

CREATE TABLE `pedidos_produtos` (
  `id` int NOT NULL,
  `id_pedido` int NOT NULL,
  `id_produto` int NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `quantidade` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `pedidos_produtos`
--

INSERT INTO `pedidos_produtos` (`id`, `id_pedido`, `id_produto`, `ativo`, `quantidade`) VALUES
(20, 70, 32, 1, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int NOT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1',
  `descricao` text,
  `quantidade` int DEFAULT NULL,
  `data` varchar(256) DEFAULT NULL,
  `imagem` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `preco`, `ativo`, `descricao`, `quantidade`, `data`, `imagem`) VALUES
(32, 'Carro com controler remoto', '100.00', 1, 'Carro com controler remoto', 25, NULL, NULL),
(54, 'Boneco', '100.00', 1, 'Carro com controler remoto', 48, NULL, NULL),
(55, 'Carro com controler remoto2', '50.00', 1, 'teste', 30, NULL, NULL),
(56, 'Carro a pilha', '30.00', 1, '', 100, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `revendedores`
--

CREATE TABLE `revendedores` (
  `id` int NOT NULL,
  `revendedor` varchar(256) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `email` varchar(256) NOT NULL,
  `senha` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `revendedores`
--

INSERT INTO `revendedores` (`id`, `revendedor`, `ativo`, `email`, `senha`) VALUES
(1, 'Revendedor Jhon2', 1, 'teste@teste.com', '0afd757b6f7824b175dfb68abaea3dd4'),
(4, 'Revendedor Jhon3', 1, 'revendedor2@teste.com', 'a1661b737b2f37eb3e8bd75b8235cec6');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tp_pagamentos`
--

CREATE TABLE `tp_pagamentos` (
  `id` int NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `tp_pagamentos`
--

INSERT INTO `tp_pagamentos` (`id`, `nome`) VALUES
(1, 'Débito'),
(2, 'Cartão de crédito'),
(3, 'Boleto bancário');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nome` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `senha` varchar(256) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `ativo`) VALUES
(1, 'Alberto', 'moraes_101@hotmail.com', 'a1661b737b2f37eb3e8bd75b8235cec6', 1),
(2, 'Usuario Teste', 'teste@teste.com', 'a1661b737b2f37eb3e8bd75b8235cec6', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `campos_personalizados`
--
ALTER TABLE `campos_personalizados`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `campos_personalizados_nome_coluna_uindex` (`nome_coluna`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_id_recendedores_fk` (`id_revendedor`),
  ADD KEY `pedidos_tp_pagamento_id_fk` (`id_tp_pagamento`),
  ADD KEY `pedidos_usuarios_id_fk` (`id_usuario`);

--
-- Índices de tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_produtos_pedidos_id_fk` (`id_pedido`),
  ADD KEY `pedidos_produtos_produtos_id_fk` (`id_produto`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `produtos_nome_uindex` (`nome`);

--
-- Índices de tabela `revendedores`
--
ALTER TABLE `revendedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `revendedores_email_uindex` (`email`);

--
-- Índices de tabela `tp_pagamentos`
--
ALTER TABLE `tp_pagamentos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_email_uindex` (`email`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `campos_personalizados`
--
ALTER TABLE `campos_personalizados`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `revendedores`
--
ALTER TABLE `revendedores`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tp_pagamentos`
--
ALTER TABLE `tp_pagamentos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_recendedores_fk` FOREIGN KEY (`id_revendedor`) REFERENCES `revendedores` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_tp_pagamento_id_fk` FOREIGN KEY (`id_tp_pagamento`) REFERENCES `tp_pagamentos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_usuarios_id_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Restrições para tabelas `pedidos_produtos`
--
ALTER TABLE `pedidos_produtos`
  ADD CONSTRAINT `pedidos_produtos_pedidos_id_fk` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `pedidos_produtos_produtos_id_fk` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

