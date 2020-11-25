-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 25-Nov-2020 às 17:12
-- Versão do servidor: 10.4.10-MariaDB
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tccfacil2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexo`
--

DROP TABLE IF EXISTS `anexo`;
CREATE TABLE IF NOT EXISTS `anexo` (
  `id_anexo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `status_anexo` varchar(1) DEFAULT NULL COMMENT '0 - Inativo\n1 - Ativo\n2 - Deletado',
  PRIMARY KEY (`id_anexo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cronograma`
--

DROP TABLE IF EXISTS `cronograma`;
CREATE TABLE IF NOT EXISTS `cronograma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_tcc_id_projeto` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date DEFAULT NULL,
  `atividade` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `status_cronograma` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cronograma_projeto_tcc1_idx` (`projeto_tcc_id_projeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `unidade_id_unidade` int(11) DEFAULT NULL,
  `nome_curso` varchar(255) DEFAULT NULL,
  `inicio_curso` date DEFAULT NULL,
  `fim_curso` date DEFAULT NULL,
  `quantidade_semestre` int(11) DEFAULT NULL,
  `status_curso` varchar(1) DEFAULT NULL COMMENT '0 - Inativo\n1- Ativo',
  `data_captura` date DEFAULT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `unidade_id_unidade` (`unidade_id_unidade`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `unidade_id_unidade`, `nome_curso`, `inicio_curso`, `fim_curso`, `quantidade_semestre`, `status_curso`, `data_captura`) VALUES
(11, 4, 'SISTEMAS DE INFORMAÇÃO', '2017-01-01', '2020-01-01', 9, '1', '2020-11-25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `unidade_id_unidade` int(11) DEFAULT NULL,
  `usuario_id_usuario` int(11) DEFAULT NULL,
  `logradouro` varchar(255) NOT NULL COMMENT 'Possíveis valores:\nAeroporto\nAlameda\nÁrea\nAvenida\nCampo\nChácara\nColônia\nCondomínio\nConjunto\nDistrito\nEsplanada\nEstação\nEstrada\nFavela\nFeira\nJardim\nLadeira\nLago\nLagoa\nLargo\nLoteamento\nMorro\nNúcleo\nParque\nPassarela\nPátio\nPraça\nQuadra\nRecanto\nResidencial\nRodovia\nRua\nSetor\nSítio\nTravessa\nTrecho\nTrevo\nVale\nVereda\nVia\nViaduto\nViela\nVila',
  `endereco` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `complemento` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `uf` varchar(255) NOT NULL,
  `status_endereco` varchar(1) DEFAULT NULL COMMENT '0 - Inativo\n1 - Ativo\n2 - Deletado',
  `data_captura` datetime DEFAULT NULL,
  PRIMARY KEY (`id_endereco`),
  KEY `fk_endereco_unidade1_idx` (`unidade_id_unidade`),
  KEY `fk_endereco_usuario1_idx` (`usuario_id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `usuario_id_usuario` int(11) NOT NULL,
  `projeto_tcc_id_projeto` int(11) NOT NULL,
  `nivel` varchar(255) DEFAULT NULL COMMENT 'orientador\nco-orientador\naluno',
  PRIMARY KEY (`usuario_id_usuario`,`projeto_tcc_id_projeto`),
  KEY `fk_usuario_has_projeto_tcc_projeto_tcc1_idx` (`projeto_tcc_id_projeto`),
  KEY `fk_usuario_has_projeto_tcc_usuario1_idx` (`usuario_id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `equipe`
--

INSERT INTO `equipe` (`usuario_id_usuario`, `projeto_tcc_id_projeto`, `nivel`) VALUES
(31, 3, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

DROP TABLE IF EXISTS `instituicao`;
CREATE TABLE IF NOT EXISTS `instituicao` (
  `id_instituicao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_instituicao` varchar(255) NOT NULL,
  `sigla_instituicao` varchar(255) DEFAULT NULL,
  `cnpj_instituicao` varchar(255) DEFAULT NULL,
  `ie_instituicao` varchar(255) DEFAULT NULL,
  `telefone_instituicao` varchar(255) DEFAULT NULL,
  `email_instituicao` varchar(255) DEFAULT NULL,
  `status_instituicao` varchar(1) DEFAULT NULL COMMENT '0 - Inativo\n1 - Ativo\n2 - Deletado',
  `data_captura` datetime DEFAULT NULL,
  PRIMARY KEY (`id_instituicao`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `instituicao`
--

INSERT INTO `instituicao` (`id_instituicao`, `nome_instituicao`, `sigla_instituicao`, `cnpj_instituicao`, `ie_instituicao`, `telefone_instituicao`, `email_instituicao`, `status_instituicao`, `data_captura`) VALUES
(4, 'INSTITUTO AGUAS CLARAS', 'INACLA', '32.541.455/0001-55', '544.578.965.245', '(18) 3452-9877', 'contato@institutoaguasclaras.com.br', '2', '2020-11-25 11:47:57'),
(5, 'UNIVERSIDADE SANTA MARIA', 'UNIMA', '65.874.845/002', '659.645.897.897', '(17) 6588-98656', 'contato@santamariauni.gov.br', '1', '2020-11-25 12:56:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `interacao`
--

DROP TABLE IF EXISTS `interacao`;
CREATE TABLE IF NOT EXISTS `interacao` (
  `id_interacao` int(11) NOT NULL AUTO_INCREMENT,
  `interacao_id_interacao` int(11) DEFAULT NULL,
  `projeto_tcc_id_projeto` int(11) NOT NULL,
  `id_usuario_de` int(11) NOT NULL,
  `assunto` varchar(60) DEFAULT NULL,
  `id_usuario_para` int(11) NOT NULL,
  `texto` varchar(255) DEFAULT NULL,
  `data_hora_envio` datetime DEFAULT NULL,
  `data_hora_visualizacao` datetime DEFAULT NULL,
  `alertar_ao_responder` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_interacao`),
  KEY `fk_interacao_projeto_tcc1_idx` (`projeto_tcc_id_projeto`),
  KEY `fk_interacao_usuario1_idx` (`id_usuario_de`),
  KEY `fk_interacao_usuario2_idx` (`id_usuario_para`),
  KEY `fk_interacao_interacao1_idx` (`interacao_id_interacao`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `interacao`
--

INSERT INTO `interacao` (`id_interacao`, `interacao_id_interacao`, `projeto_tcc_id_projeto`, `id_usuario_de`, `assunto`, `id_usuario_para`, `texto`, `data_hora_envio`, `data_hora_visualizacao`, `alertar_ao_responder`) VALUES
(5, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:55:34', NULL, NULL),
(6, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:55:48', NULL, NULL),
(7, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:56:16', NULL, NULL),
(8, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:56:23', NULL, NULL),
(9, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:57:07', NULL, NULL),
(10, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:57:42', NULL, NULL),
(11, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 13:59:15', NULL, NULL),
(12, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 14:00:30', NULL, NULL),
(13, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 14:00:47', NULL, NULL),
(14, NULL, 3, 1, 'teste', 1, 'teste', '2020-11-25 14:01:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `interacao_has_doc_associados`
--

DROP TABLE IF EXISTS `interacao_has_doc_associados`;
CREATE TABLE IF NOT EXISTS `interacao_has_doc_associados` (
  `interacao_id_interacao` int(11) NOT NULL,
  `doc_associados_id_doc` int(11) NOT NULL,
  PRIMARY KEY (`interacao_id_interacao`,`doc_associados_id_doc`),
  KEY `fk_interacao_has_doc_associados_doc_associados1_idx` (`doc_associados_id_doc`),
  KEY `fk_interacao_has_doc_associados_interacao1_idx` (`interacao_id_interacao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `linha_pesquisa`
--

DROP TABLE IF EXISTS `linha_pesquisa`;
CREATE TABLE IF NOT EXISTS `linha_pesquisa` (
  `id_linha_pesquisa` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id_curso` int(11) NOT NULL,
  `nome_pesquisa` varchar(255) DEFAULT NULL,
  `descricao_pesquisa` varchar(500) DEFAULT NULL,
  `status_linha_pesquisa` varchar(1) DEFAULT NULL COMMENT '0 - Inativo\n1 - Ativo',
  `data_captura` datetime DEFAULT NULL,
  PRIMARY KEY (`id_linha_pesquisa`),
  KEY `fk_linha_pesquisa_curso1_idx` (`curso_id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `linha_pesquisa`
--

INSERT INTO `linha_pesquisa` (`id_linha_pesquisa`, `curso_id_curso`, `nome_pesquisa`, `descricao_pesquisa`, `status_linha_pesquisa`, `data_captura`) VALUES
(3, 11, 'CIENTIFICA', 'Pesquisa científica.', '1', '2020-11-25 12:34:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `idlog` int(11) NOT NULL AUTO_INCREMENT,
  `acao` varchar(255) DEFAULT NULL COMMENT 'login\nlogoff\ntroca_senha\ninsercao\nalteração\nremoção',
  `alvo` varchar(255) DEFAULT NULL COMMENT 'instituicao\nunidade\nendereço\ncurso\nprojeto_tcc\nlinha_pesquisa\ncronograma\ninteracao\nanexos',
  `ip` varchar(255) DEFAULT NULL,
  `momento` datetime DEFAULT NULL,
  PRIMARY KEY (`idlog`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacao`
--

DROP TABLE IF EXISTS `notificacao`;
CREATE TABLE IF NOT EXISTS `notificacao` (
  `projeto_tcc_id_projeto` int(11) NOT NULL,
  `id_notificacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_destinatario` varchar(255) NOT NULL,
  `tipo_notificacao` varchar(255) DEFAULT NULL,
  `momento_envio` varchar(255) DEFAULT NULL,
  `momento_visualizacao` varchar(255) DEFAULT NULL,
  `ip_visualizacao` varchar(255) DEFAULT NULL,
  `status_notificacao` varchar(1) DEFAULT NULL COMMENT '0 - Inativo\n2 - Ativo\n3 - Deletado',
  PRIMARY KEY (`id_notificacao`),
  KEY `fk_table1_projeto_tcc1_idx` (`projeto_tcc_id_projeto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nome_perfil` varchar(255) DEFAULT NULL COMMENT 'Admin, Diretor, Coordenador, Professor, Aluno',
  `status_perfil` varchar(1) DEFAULT NULL COMMENT '0. inativo\r\n1. ativo\r\n2. deletado',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `nome_perfil`, `status_perfil`) VALUES
(1, 'Administrador(a)', '1'),
(2, 'Diretor(a)', '1'),
(3, 'Coordenador(a)', '1'),
(4, 'Professor(a)', '1'),
(5, 'Aluno(a)', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_tcc`
--

DROP TABLE IF EXISTS `projeto_tcc`;
CREATE TABLE IF NOT EXISTS `projeto_tcc` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `linha_pesquisa_id_linha_pesquisa` int(11) NOT NULL,
  `nome_projeto` varchar(255) DEFAULT NULL,
  `descricao_projeto` text DEFAULT NULL,
  `data_captura` date DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `status_projeto` varchar(1) DEFAULT NULL COMMENT '0. inativo\n1. ativo\n2. deletado',
  PRIMARY KEY (`id_projeto`),
  KEY `fk_projeto_tcc_linha_pesquisa1_idx` (`linha_pesquisa_id_linha_pesquisa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `projeto_tcc`
--

INSERT INTO `projeto_tcc` (`id_projeto`, `linha_pesquisa_id_linha_pesquisa`, `nome_projeto`, `descricao_projeto`, `data_captura`, `data_inicio`, `data_fim`, `status_projeto`) VALUES
(3, 3, 'SISTEMA PARA GERENCIAMENTO DE TCC', 'Criar um sistema que gerencie o trabalho de conclusão de curso.', '2020-11-25', '2018-07-06', '2020-12-20', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

DROP TABLE IF EXISTS `unidade`;
CREATE TABLE IF NOT EXISTS `unidade` (
  `id_unidade` int(11) NOT NULL AUTO_INCREMENT,
  `instituicao_id_instituicao` int(11) NOT NULL,
  `nome_unidade` varchar(255) DEFAULT NULL,
  `sigla_unidade` varchar(255) DEFAULT NULL,
  `cnpj_unidade` varchar(255) DEFAULT NULL,
  `ie_unidade` varchar(255) DEFAULT NULL,
  `telefone_unidade` varchar(255) DEFAULT NULL,
  `status_unidade` varchar(1) DEFAULT NULL COMMENT '0 - inativo\n1 - ativo',
  `data_captura` datetime DEFAULT NULL,
  PRIMARY KEY (`id_unidade`),
  KEY `fk_unidade_instituicao_idx` (`instituicao_id_instituicao`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id_unidade`, `instituicao_id_instituicao`, `nome_unidade`, `sigla_unidade`, `cnpj_unidade`, `ie_unidade`, `telefone_unidade`, `status_unidade`, `data_captura`) VALUES
(4, 4, 'AGUAS CLARAS RP', 'AGUASCRP', '24.522.122/0021-2', '645.478.785.545', '(16) 3987-4521', '1', '2020-11-25 11:49:08');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) DEFAULT NULL,
  `email_usuario` varchar(255) DEFAULT NULL,
  `login_usuario` varchar(255) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `status_usuario` varchar(1) DEFAULT NULL COMMENT '0. inativo\n1. ativo\n2. deletado',
  `admin_usuario` varchar(1) DEFAULT NULL COMMENT 'S = SimN = Não',
  `data_captura` datetime DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nome_usuario`, `email_usuario`, `login_usuario`, `senha_usuario`, `status_usuario`, `admin_usuario`, `data_captura`) VALUES
(1, 'Anderson Lopes de Siqueira', 'contato@andersonls.com.br', 'andersonsiqueira', 'e10adc3949ba59abbe56e057f20f883e', '1', 'S', '2020-11-25 09:21:00'),
(31, 'JOSE ANTONIO DA SILVA', 'joseantonio@gmail.com', 'joseantonio', 'c33367701511b4f6020ec61ded352059', '1', 'N', '2020-11-25 12:34:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_unidade_curso`
--

DROP TABLE IF EXISTS `usuario_unidade_curso`;
CREATE TABLE IF NOT EXISTS `usuario_unidade_curso` (
  `usuario_id_usuario` int(11) NOT NULL,
  `unidade_id` int(11) DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `id_perfil` varchar(255) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  PRIMARY KEY (`usuario_id_usuario`),
  KEY `fk_usuario_unidade_curso_usuario1_idx` (`usuario_id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_unidade_curso`
--

INSERT INTO `usuario_unidade_curso` (`usuario_id_usuario`, `unidade_id`, `curso_id`, `id_perfil`, `data_inicio`, `data_fim`) VALUES
(31, 4, 11, '5', '2017-03-06', '2020-12-20');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cronograma`
--
ALTER TABLE `cronograma`
  ADD CONSTRAINT `fk_cronograma_projeto_tcc1` FOREIGN KEY (`projeto_tcc_id_projeto`) REFERENCES `projeto_tcc` (`id_projeto`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `fk_endereco_unidade1` FOREIGN KEY (`unidade_id_unidade`) REFERENCES `unidade` (`id_unidade`),
  ADD CONSTRAINT `fk_endereco_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `fk_usuario_has_projeto_tcc_projeto_tcc1` FOREIGN KEY (`projeto_tcc_id_projeto`) REFERENCES `projeto_tcc` (`id_projeto`),
  ADD CONSTRAINT `fk_usuario_has_projeto_tcc_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `interacao`
--
ALTER TABLE `interacao`
  ADD CONSTRAINT `fk_interacao_interacao1` FOREIGN KEY (`interacao_id_interacao`) REFERENCES `interacao` (`id_interacao`),
  ADD CONSTRAINT `fk_interacao_projeto_tcc1` FOREIGN KEY (`projeto_tcc_id_projeto`) REFERENCES `projeto_tcc` (`id_projeto`),
  ADD CONSTRAINT `fk_interacao_usuario1` FOREIGN KEY (`id_usuario_de`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `fk_interacao_usuario2` FOREIGN KEY (`id_usuario_para`) REFERENCES `usuario` (`id_usuario`);

--
-- Limitadores para a tabela `interacao_has_doc_associados`
--
ALTER TABLE `interacao_has_doc_associados`
  ADD CONSTRAINT `fk_interacao_has_doc_associados_doc_associados1` FOREIGN KEY (`doc_associados_id_doc`) REFERENCES `anexo` (`id_anexo`),
  ADD CONSTRAINT `fk_interacao_has_doc_associados_interacao1` FOREIGN KEY (`interacao_id_interacao`) REFERENCES `interacao` (`id_interacao`);

--
-- Limitadores para a tabela `linha_pesquisa`
--
ALTER TABLE `linha_pesquisa`
  ADD CONSTRAINT `fk_linha_pesquisa_curso1` FOREIGN KEY (`curso_id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Limitadores para a tabela `notificacao`
--
ALTER TABLE `notificacao`
  ADD CONSTRAINT `fk_table1_projeto_tcc1` FOREIGN KEY (`projeto_tcc_id_projeto`) REFERENCES `projeto_tcc` (`id_projeto`);

--
-- Limitadores para a tabela `projeto_tcc`
--
ALTER TABLE `projeto_tcc`
  ADD CONSTRAINT `fk_projeto_tcc_linha_pesquisa1` FOREIGN KEY (`linha_pesquisa_id_linha_pesquisa`) REFERENCES `linha_pesquisa` (`id_linha_pesquisa`);

--
-- Limitadores para a tabela `unidade`
--
ALTER TABLE `unidade`
  ADD CONSTRAINT `fk_unidade_instituicao` FOREIGN KEY (`instituicao_id_instituicao`) REFERENCES `instituicao` (`id_instituicao`);

--
-- Limitadores para a tabela `usuario_unidade_curso`
--
ALTER TABLE `usuario_unidade_curso`
  ADD CONSTRAINT `fk_usuario_unidade_curso_usuario1` FOREIGN KEY (`usuario_id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
