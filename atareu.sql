-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/05/2024 às 21:54
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
-- Banco de dados: `atareu`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assunto`
--
use atareu

CREATE TABLE `assunto` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tema` varchar(255) NOT NULL,
  `data_solicitada` datetime DEFAULT NULL,
  `objetivo` varchar(25) NOT NULL,
  `hora_inicial` time DEFAULT NULL,
  `hora_termino` time DEFAULT NULL,
  `tempo_estimado` int(10) DEFAULT NULL,
  `local` varchar(25) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `assunto`
--

INSERT INTO `assunto` (`id`, `data_registro`, `tema`, `data_solicitada`, `objetivo`, `hora_inicial`, `hora_termino`, `tempo_estimado`, `local`, `status`) VALUES
(590, '2024-05-09 13:36:11', 'Realizando pela 1° Vez um teste de impressão de Ata', '2024-04-29 09:16:00', 'Treinamento', '09:16:00', '10:16:00', NULL, 'Ala 3 - Pediatria', 'ABERTA'),
(613, '2024-05-09 13:57:32', 'Teste de alteração de status ', '2024-05-09 10:42:00', 'Consulta', '10:42:00', '11:42:00', NULL, 'Laboratório de Análises C', 'ABERTA'),
(614, '2024-05-10 11:57:10', 'teste tete', '2024-06-04 14:56:00', 'Consulta', '14:56:00', '06:56:00', NULL, 'Ala 2 - Cirurgia Geral', 'ABERTA'),
(615, '2024-05-14 12:52:26', 'teste hoje', '2024-05-27 12:25:00', 'Consulta', '12:25:00', '12:26:00', NULL, 'Sala de Emergência', 'FECHADA'),
(616, '2024-05-15 11:03:19', 'testeste', '2024-05-21 12:02:00', 'Consulta', '12:02:00', '23:02:00', NULL, 'Ala 2 - Cirurgia Geral', 'FECHADA'),
(617, '2024-05-15 12:53:38', 'teste jhozin', '2024-05-24 15:51:00', 'Consulta', '15:51:00', '23:51:00', NULL, 'Sala de Emergência', 'FECHADA'),
(618, '2024-05-16 11:03:25', 'rio grande do sul', '2024-05-29 12:01:00', 'Consulta', '12:01:00', '18:05:00', NULL, 'Ambulatório de Especialid', 'FECHADA'),
(619, '2024-05-20 13:04:18', 'locação motus motus', '2024-05-29 12:15:00', 'Consulta', '12:15:00', '19:15:00', NULL, 'Unidade de Radiologia', 'FECHADA'),
(620, '2024-05-21 11:10:06', 'teste d ehoje ', '2024-05-22 13:09:00', 'Consulta', '13:09:00', '23:09:00', NULL, 'Ambulatório de Especialid', 'FECHADA'),
(621, '2024-05-21 11:13:12', 'jhjn jhon ', '2024-05-22 13:09:00', 'Consulta', '13:09:00', '23:09:00', NULL, 'Ambulatório de Especialid', 'FECHADA');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ata_has_fac`
--

CREATE TABLE `ata_has_fac` (
  `id` int(11) NOT NULL,
  `id_ata` int(11) DEFAULT NULL,
  `facilitadores` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `ata_has_fac`
--

INSERT INTO `ata_has_fac` (`id`, `id_ata`, `facilitadores`) VALUES
(127, 590, 6),
(128, 590, 21),
(129, 590, 10),
(142, 613, 15),
(143, 613, 6),
(144, 614, 6),
(145, 615, 15),
(146, 616, 15),
(147, 616, 6),
(148, 617, 23),
(149, 617, 14),
(150, 617, 4),
(151, 617, 17),
(152, 618, 15),
(153, 618, 11),
(154, 619, 15),
(155, 620, 11),
(156, 621, 15);

-- --------------------------------------------------------

--
-- Estrutura para tabela `deliberacoes`
--

CREATE TABLE `deliberacoes` (
  `id` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `id_ata` int(11) NOT NULL,
  `deliberadores` int(11) DEFAULT NULL,
  `deliberacoes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `deliberacoes`
--

INSERT INTO `deliberacoes` (`id`, `id_ata`, `deliberadores`, `deliberacoes`) VALUES
(475, 590, 15, 'DELIBERAÇÃO 1'),
(476, 590, 6, 'DELIBERAÇÃO 1'),
(477, 590, 3, 'DELIBERAÇÃO 2'),
(478, 590, 21, 'DELIBERAÇÃO 3'),
(479, 590, 10, 'DELIBERAÇÃO 3'),
(513, 613, 21, 'Deliberação Normal aqui'),
(514, 613, 14, 'Deliberação Normal aqui'),
(515, 613, 15, '141414141414'),
(516, 613, 0, 'ipuopipio'),
(517, 614, 15, 'rrr'),
(518, 614, 13, 'rrr'),
(519, 615, 15, 'errr'),
(520, 616, 11, 'rtrtrtrt5tt'),
(521, 616, 15, 'werrwrw'),
(522, 616, 15, 'nwdhfwvbdfbdfvfdbfdyfgdndvsbiubidbdvuv dvddbhvdyavdjdfbvfuysdfb dfdctctaduvadgduahjsbahidvtu    vyu vuycvbauhbs acyo c buydcuagyehfbcdcgd8ehdcdvdg d xguhbi hx d'),
(523, 617, 15, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(524, 617, 6, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(525, 617, 13, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(526, 617, 11, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(527, 617, 16, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(528, 617, 9, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(529, 617, 21, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(530, 617, 23, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(531, 617, 22, 'bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhddbfdekdcvb ehdgedbedgbddybbhdd vbfdekdcvb ehdgedbedgbddybbhdd bfdekdcvb ehdgedbedgbddybbhdd'),
(539, 618, 15, 'artret5tt'),
(540, 619, 15, 'rteste jhon'),
(541, 619, 6, 'juntos juntos'),
(542, 620, 17, 'testevtessb'),
(543, 620, 15, 'tyyt'),
(544, 621, 11, 't5465464666'),
(545, 621, 15, 'rtretrett');

-- --------------------------------------------------------

--
-- Estrutura para tabela `facilitadores`
--

CREATE TABLE `facilitadores` (
  `id` int(25) NOT NULL,
  `matricula` int(10) DEFAULT NULL,
  `nome_facilitador` varchar(50) NOT NULL,
  `email_facilitador` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `facilitadores`
--

INSERT INTO `facilitadores` (`id`, `matricula`, `nome_facilitador`, `email_facilitador`) VALUES
(3, 1234, 'Leonard B.', 'joao@example.com'),
(4, 5678, 'João Thiago', 'maria@example.com'),
(5, 9012, 'Pedro Santos', 'pedro@example.com'),
(6, 3456, 'Ana Souza', 'ana@example.com'),
(7, 7890, 'Lucas Pereira', 'lucas@example.com'),
(8, 2345, 'Juliana Lima', 'juliana@example.com'),
(9, 6789, 'Fernanda Costa', 'fernanda@example.com'),
(10, 8901, 'Marcos Vieira', 'marcos@example.com'),
(11, 4321, 'Carla Martins', 'carla@example.com'),
(12, 9876, 'Rodrigo Almeida', 'rodrigo@example.com'),
(13, 6543, 'Camila Santos', 'camila@example.com'),
(14, 3210, 'Gustavo Oliveira', 'gustavo@example.com'),
(15, 8765, 'Amanda Silva', 'amanda@example.com'),
(16, 1098, 'Felipe Rodrigues', 'felipe@example.com'),
(17, 5432, 'Laura Costa', 'laura@example.com'),
(21, 6617, 'Gabriel Gomes Mendes de Souza', 'ggomesmendes2004@gmail.com'),
(22, 6617, 'Gomes Mendes', 'ggomesmendes2004@gmail.com'),
(23, 1141, 'GAGOGAGO', 'ggomesmendes2004@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `locais`
--

CREATE TABLE `locais` (
  `id` int(11) NOT NULL COMMENT 'Primary Key',
  `locais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `locais`
--

INSERT INTO `locais` (`id`, `locais`) VALUES
(4, 'Ala 1 - Clínica Médica'),
(5, 'Ala 2 - Cirurgia Geral'),
(6, 'Ala 3 - Pediatria'),
(7, 'Unidade de Terapia Intensiva (UTI)'),
(8, 'Centro Cirúrgico'),
(9, 'Laboratório de Análises Clínicas'),
(10, 'Sala de Emergência'),
(11, 'Unidade de Radiologia'),
(12, 'Sala de Fisioterapia'),
(13, 'Ambulatório de Especialidades');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(11) NOT NULL COMMENT 'PRIMARY KEY',
  `id_ata` int(11) NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `participantes` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `participantes`
--

INSERT INTO `participantes` (`id`, `id_ata`, `data_registro`, `participantes`) VALUES
(291, 590, '2024-04-29 12:18:00', 22),
(292, 590, '2024-04-29 12:18:00', 14),
(293, 590, '2024-04-29 12:18:00', 4),
(294, 590, '2024-04-29 12:18:00', 17),
(295, 590, '2024-04-29 12:18:00', 3),
(296, 590, '2024-04-29 12:18:00', 7),
(313, 613, '2024-05-09 13:46:42', 6),
(314, 613, '2024-05-09 13:46:42', 13),
(315, 613, '2024-05-10 10:47:22', 0),
(316, 614, '2024-05-10 11:57:31', 15),
(317, 614, '2024-05-10 11:57:31', 6),
(318, 615, '2024-05-14 12:27:50', 17),
(319, 616, '2024-05-15 11:03:02', 6),
(320, 617, '2024-05-15 12:52:17', 15),
(321, 617, '2024-05-15 12:52:17', 11),
(322, 617, '2024-05-15 12:52:17', 23),
(323, 617, '2024-05-15 12:52:17', 8),
(324, 617, '2024-05-15 12:52:17', 3),
(325, 617, '2024-05-15 12:52:17', 10),
(326, 618, '2024-05-16 11:02:45', 6),
(327, 619, '2024-05-20 11:16:32', 6),
(328, 619, '2024-05-20 11:16:32', 14),
(329, 619, '2024-05-20 11:18:23', 13),
(330, 620, '2024-05-21 11:09:24', 13),
(331, 620, '2024-05-21 11:09:49', 15),
(333, 621, '2024-05-21 11:12:53', 8);

-- --------------------------------------------------------

--
-- Estrutura para tabela `textoprinc`
--

CREATE TABLE `textoprinc` (
  `id` int(11) NOT NULL,
  `id_ata` int(11) NOT NULL,
  `texto_princ` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `textoprinc`
--

INSERT INTO `textoprinc` (`id`, `id_ata`, `texto_princ`) VALUES
(6, 590, 'Ata de encontro com o objetivo de realizar o 1° Teste referente a impressão, execução, registro em banco de dados, rota de informação.'),
(24, 613, 'Informando o texto principal '),
(25, 613, 'Informando o texto principal '),
(26, 613, '1414141414'),
(27, 614, '33erwewrr'),
(28, 615, 'rtrtt'),
(29, 616, 'dfwdfrgr3r'),
(30, 617, 'wwwewee'),
(31, 618, 'bvvvvvcxzsxz xzxsczvz zvcxzc '),
(32, 620, 'eerrr'),
(33, 619, 'fsdbucbdcjksdbcdjnckn '),
(34, 621, '56rerwrtrt');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ata_has_fac`
--
ALTER TABLE `ata_has_fac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ata` (`id_ata`);

--
-- Índices de tabela `deliberacoes`
--
ALTER TABLE `deliberacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ata` (`id_ata`);

--
-- Índices de tabela `facilitadores`
--
ALTER TABLE `facilitadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ata` (`id_ata`);

--
-- Índices de tabela `textoprinc`
--
ALTER TABLE `textoprinc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ata` (`id_ata`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assunto`
--
ALTER TABLE `assunto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=622;

--
-- AUTO_INCREMENT de tabela `ata_has_fac`
--
ALTER TABLE `ata_has_fac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de tabela `deliberacoes`
--
ALTER TABLE `deliberacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=546;

--
-- AUTO_INCREMENT de tabela `facilitadores`
--
ALTER TABLE `facilitadores`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'PRIMARY KEY', AUTO_INCREMENT=334;

--
-- AUTO_INCREMENT de tabela `textoprinc`
--
ALTER TABLE `textoprinc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `ata_has_fac`
--
ALTER TABLE `ata_has_fac`
  ADD CONSTRAINT `ata_has_fac_ibfk_1` FOREIGN KEY (`id_ata`) REFERENCES `assunto` (`id`);

--
-- Restrições para tabelas `deliberacoes`
--
ALTER TABLE `deliberacoes`
  ADD CONSTRAINT `deliberacoes_ibfk_1` FOREIGN KEY (`id_ata`) REFERENCES `assunto` (`id`);

--
-- Restrições para tabelas `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `participantes_ibfk_1` FOREIGN KEY (`id_ata`) REFERENCES `assunto` (`id`);

--
-- Restrições para tabelas `textoprinc`
--
ALTER TABLE `textoprinc`
  ADD CONSTRAINT `textoprinc_ibfk_1` FOREIGN KEY (`id_ata`) REFERENCES `assunto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
