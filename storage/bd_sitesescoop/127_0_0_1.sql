-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15-Fev-2019 às 23:20
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anderson.seixas`
--
CREATE DATABASE IF NOT EXISTS `anderson.seixas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `anderson.seixas`;
--
-- Database: `db_sitesescoopro`
--
CREATE DATABASE IF NOT EXISTS `db_sitesescoopro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `db_sitesescoopro`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `banners`
--

INSERT INTO `banners` (`id`, `name`, `title`, `link`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Banner Sescoop', 'Sescoop RO', 'https://laravel.com/docs/5.4', 'bg.jpg', NULL, NULL, NULL),
(2, 'Sescoop RO', NULL, 'https://www.sescoop-ro.org.br/', 'banner_teste.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `curso` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instrutor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carga_h` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` time NOT NULL,
  `cidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `local` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publico_alvo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `conteudo_programatico` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `file_01` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_02` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_03` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `destaque_notices`
--

CREATE TABLE `destaque_notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editoria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_01` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_02` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_03` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `destaque_notices`
--

INSERT INTO `destaque_notices` (`id`, `title`, `subtitle`, `editoria`, `data`, `description`, `image_01`, `image_02`, `image_03`, `video`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Principal Notícia 01', 'Sub título da notícia 01', 'Educação', '2019-02-12', 'Com o objetivo de ampliar o portfólio de soluções de produtividade na nuvem, o UOL HOST tornou-se, em 2016, revendedor autorizado do G Suite. O pacote de serviços proporciona às empresas uma forma completamente nova de trabalhar em equipe on-line, usando e-mail, bate-papo, videoconferência e colaboração em tempo real. Com as ferramentas, é possível trabalhar em qualquer lugar, usando celulares, laptops ou tablets. Todas as informações ficam armazenadas em servidores ultraconfiáveis do Google, que têm 99,9% de disponibilidade garantida.', 'notice-image2.png', 'principal_02.png', 'principal_03.png', 'https://www.youtube.com/embed/0aFH1ysbUCU', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `galeries`
--

CREATE TABLE `galeries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `instructors`
--

CREATE TABLE `instructors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado_civil` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rua` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objetivo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idiomas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `informatica` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `licitacoes`
--

CREATE TABLE `licitacoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `number_process` int(11) NOT NULL,
  `modalidade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edital` int(11) NOT NULL,
  `objeto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone_fixo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone_celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_abertura` time DEFAULT NULL,
  `data` date DEFAULT NULL,
  `name_file_01` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_01` date DEFAULT NULL,
  `file_01` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_02` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_02` date DEFAULT NULL,
  `file_02` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_03` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_03` date DEFAULT NULL,
  `file_03` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_04` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_04` date DEFAULT NULL,
  `file_04` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_05` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_05` date DEFAULT NULL,
  `file_05` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_06` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_06` date DEFAULT NULL,
  `file_06` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_07` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_07` date DEFAULT NULL,
  `file_07` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_08` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_08` date DEFAULT NULL,
  `file_08` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_09` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_09` date DEFAULT NULL,
  `file_09` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_010` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_010` date DEFAULT NULL,
  `file_010` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_011` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_011` date DEFAULT NULL,
  `file_011` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_file_012` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_file_012` date DEFAULT NULL,
  `file_012` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `licitacoes`
--

INSERT INTO `licitacoes` (`id`, `number_process`, `modalidade`, `edital`, `objeto`, `status`, `telefone_fixo`, `telefone_celular`, `email`, `hora_abertura`, `data`, `name_file_01`, `data_file_01`, `file_01`, `name_file_02`, `data_file_02`, `file_02`, `name_file_03`, `data_file_03`, `file_03`, `name_file_04`, `data_file_04`, `file_04`, `name_file_05`, `data_file_05`, `file_05`, `name_file_06`, `data_file_06`, `file_06`, `name_file_07`, `data_file_07`, `file_07`, `name_file_08`, `data_file_08`, `file_08`, `name_file_09`, `data_file_09`, `file_09`, `name_file_010`, `data_file_010`, `file_010`, `name_file_011`, `data_file_011`, `file_011`, `name_file_012`, `data_file_012`, `file_012`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1232, 'Pregão', 123, 'Descrição do objeto da licitação Descrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitaçãoDescrição do objeto da licitação', 'Em Andamento', '6688888888', '668888888', 'mail@mail.com', '13:00:00', '2019-02-08', NULL, NULL, 'Edital 011_2018.pdf', NULL, NULL, 'Homologacao PP 013.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5555, 'Tomada de Preços', 12345, 'Objeto exemplo de objeto exemplo - Objeto exemplo de objeto exemploObjeto exemplo de objeto exemploObjeto exemplo de objeto exemploObjeto exemplo de objeto exemploObjeto exemplo de objeto exemplo', 'Em Andamento', '6932221010', '69981818181', 'sescoop-ro@sescoop-ro.org.br', '03:00:00', '2019-02-11', 'Diretrizes atos internos', '2019-02-11', 'Diretriz que regulamenta os atos internos do SESCOOP.pdf', 'Norma de Diárias', '2019-02-13', NULL, 'Norma de Aquisição', '2019-02-14', NULL, 'Norma de Dispensa', '2019-02-18', NULL, 'Norma de Execução', '2019-02-19', NULL, 'Norma de Regularização', '2019-02-20', NULL, 'Compra de Material', '2019-02-22', 'Norma-para-compra-de-mat.-e-serv]-nos-casos-de-dispensa-de-lici.pdf', 'Normas de Controle', '2019-02-26', NULL, 'Regulamento', '2019-02-27', NULL, 'Resolução Fundecoop', '2019-02-21', NULL, 'Resolução Contábeis', '2019-03-01', 'Resolucao-n-1025-2013-demonstracoes-contabeis.pdf', 'Acordo Senalba', '2019-03-05', NULL, NULL, NULL, NULL),
(6, 342423, 'concorrência', 3423434, 'erqwdfasdfdsfdklfjaklsdjfklasdjflksderqwdfasdfdsfdklfjaklsdjfklasdjflksderqwdfasdfdsfdklfjaklsdjfklasdjflksderqwdfasdfdsfdklfjaklsdjfklasdjflksderqwdfasdfdsfdklfjaklsdjfklasdjflksderqwdfasdfdsfdklfjaklsdjfklasdjflksd', 'Em Andamento', '5555555555', '5555555555', 'anderson.mezzo@hotmail.com', '08:00:00', '2019-02-11', 'Anexo Receita', '2019-02-11', 'ANEXO I RECEITA.pdf', 'Anexo Programa', '2019-02-13', 'ANEXO II PROGRAMA.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 9989, 'Pregão', 9890, 'Modelo Exemplo deste objeto de licitação -- Modelo Exemplo deste objeto de licitação -- Modelo Exemplo deste objeto de licitação -- Modelo Exemplo deste objeto de licitação -- Modelo Exemplo deste objeto de licitação -- Modelo Exemplo deste objeto de licitação --', 'Concluído', '6932211456', '69981324567', 'sescoop-ro@sescoop-ro.org.br', '10:00:00', '2019-02-11', 'Anexo I Receita', '2019-02-11', 'ANEXO - I Receita.pdf', 'Anexo II', '2019-02-12', 'ANEXO - II Programas.pdf', 'Anexo III Quadro', '2019-02-13', 'ANEXO - III Quadro Sintese.pdf', 'Anexo IV Economica', '2019-02-14', 'ANEXO - IV Categoria Economica.pdf', 'Detalhamento', '2019-02-15', 'ANEXO- III Detalhamento das Acoes.pdf', 'Reunião', '2019-02-18', 'ATA N 021 Reuniao Extraordinaria CONSAD APROVA PROPOSTA ORCAMENTARIA 2016.pdf', 'Portaria', '2019-02-20', 'Portaria  MTE 275 proposta 2016.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_31_154230_create_banners_table', 1),
(4, '2019_01_31_155133_create_notices_table', 1),
(5, '2019_01_31_155255_create_roles_table', 1),
(6, '2019_01_31_155350_create_role_users_table', 1),
(7, '2019_01_31_155439_create_licitacoes_table', 1),
(8, '2019_01_31_155514_create_transparencies_table', 1),
(9, '2019_01_31_155623_create_instructors_table', 1),
(10, '2019_01_31_155652_create_cursos_table', 1),
(11, '2019_01_31_155715_create_videos_table', 1),
(12, '2019_01_31_155737_create_galeries_table', 1),
(13, '2019_01_31_155804_create_participantes_table', 1),
(14, '2019_02_05_185840_create_destaque_notices_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `editoria` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data` date DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_01` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_02` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_03` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `notices`
--

INSERT INTO `notices` (`id`, `title`, `subtitle`, `editoria`, `data`, `description`, `image_01`, `image_02`, `image_03`, `video`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Teste de outra notícia', 'exemplo teste de outra notícia', 'Educação', '2019-02-14', 'Exemplo de descrição de notícia Exemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notíciaExemplo de descrição de notícia', 'notice-image2.png', 'principal_04.png', 'principal_01.png', NULL, NULL, NULL, NULL),
(6, 'Somos Cooperativismo no Brasil', 'Somos coop no Brasil', 'Geral', '2019-02-14', 'Somos cooperativista do Brasil e do mundooooo Somos cooperativista do Brasil e do mundoooooSomos cooperativista do Brasil e do mundoooooSomos cooperativista do Brasil e do mundoooooSomos cooperativista do Brasil e do mundoooooSomos cooperativista do Brasil e do mundoooooSomos cooperativista do Brasil e do mundooooo', 'img1.png', 'img2.png', 'arrow_right_s.png', NULL, NULL, NULL, NULL),
(7, 'Notícia deste dia', 'Subtítulo da notícia deste dia', 'Saúde', '2019-02-14', 'Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.Saúdo é o que interessa e o resto não tem pressa.', 'img-single.jpg', 'aviso.png', 'AGROPECUARIO.jpg', 'https://www.youtube.com/embed/vs_0_VB9WwI', NULL, NULL, NULL),
(8, 'Cooperativismo no Ramo da Mineração', 'Várias cooperativas são abertas no ramo da mineração.', 'Eventos', '2019-02-14', 'Essa é uma notícia exclusiva do ramo do cooperativismo Essa é uma notícia exclusiva do ramo do cooperativismoEssa é uma notícia exclusiva do ramo do cooperativismoEssa é uma notícia exclusiva do ramo do cooperativismoEssa é uma notícia exclusiva do ramo do cooperativismoEssa é uma notícia exclusiva do ramo do cooperativismoEssa é uma notícia exclusiva do ramo do cooperativismoEssa é uma notícia exclusiva do ramo do cooperativismo', 'n1.png', 'n2.png', 'n3.png', NULL, NULL, NULL, NULL),
(9, 'Casa Stark de Winterfell', 'Enquando um lobo estiver de pé, as ovelhas nunca estarão seguras', 'Economia', '2019-02-18', 'Game of Thrones é a melhor série do universo. - Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.Game of Thrones é a melhor série do universo.', 'passo_1.jpg', 'passo_2.jpg', 'passo_3.jpg', NULL, NULL, NULL, NULL),
(10, 'The bast your live begis naw Coop', 'O melhor da sua vida começa agora (Cooperativismo)', 'Legislativo', '2019-02-14', 'O melhor da sua vida começa agora (Cooperativismo)O melhor da sua vida começa agora (Cooperativismo)O melhor da sua vida começa agora (Cooperativismo)O melhor da sua vida começa agora (Cooperativismo)O melhor da sua vida começa agora (Cooperativismo)O melhor da sua vida começa agora (Cooperativismo)O melhor da sua vida começa agora (Cooperativismo).', 'Carimbo-SomosCoop-400x300.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `participantes`
--

CREATE TABLE `participantes` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `transparencies`
--

CREATE TABLE `transparencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `docMain` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subDoc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_01` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_02` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_03` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_04` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `transparencies`
--

INSERT INTO `transparencies` (`id`, `docMain`, `subDoc`, `document_name`, `ano`, `file_01`, `file_02`, `file_03`, `file_04`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Demonstrações Contábeis', 'Fluxo de Caixa', 'Fluxo de Caixa ldslslsl', '2018', 'Instrumento de Parceria SESCOOP e OCB.pdf', 'NORMA DE PESSOAL.pdf', 'Resolucao UN 1635_2017 Reformulacao RO 2017.pdf', NULL, NULL, NULL, NULL),
(2, 'Contratos', 'Extrato de Dispensa', 'Exemplo de documento de Contrato', '2018', 'Extrato de Dispensa 2016 SESCOOP RO.pdf', 'Extrato de Dispensa 2017 SESCOOP RO.pdf', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sobre` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `formation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idioma` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `image_perfil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `cargo`, `sobre`, `experience`, `formation`, `idioma`, `celular`, `data_nascimento`, `image_perfil`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anderson Seixas', 'anderson.seixas@sescoop-ro.org.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XEUB62AugdBpYl240Hm.QONL8V4nqopytvYwTr6TL.WyeEa6xR07O', '0c9ayrJwR5tb2wVkLOA0aIK1HdrQQLKuKM1bmfL2mXga1NEh9IS2uVRAZqFB', '2019-02-08 20:49:47', '2019-02-08 20:49:47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'O que é Cooperativa de Crédito?', 'https://www.youtube.com/embed/mKvKdSp80z4', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_user_id_foreign` (`user_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destaque_notices`
--
ALTER TABLE `destaque_notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destaque_notices_user_id_foreign` (`user_id`);

--
-- Indexes for table `galeries`
--
ALTER TABLE `galeries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `instructors_email_unique` (`email`);

--
-- Indexes for table `licitacoes`
--
ALTER TABLE `licitacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licitacoes_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notices_user_id_foreign` (`user_id`);

--
-- Indexes for table `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_users_role_id_foreign` (`role_id`),
  ADD KEY `role_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `transparencies`
--
ALTER TABLE `transparencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transparencies_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destaque_notices`
--
ALTER TABLE `destaque_notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeries`
--
ALTER TABLE `galeries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `licitacoes`
--
ALTER TABLE `licitacoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `participantes`
--
ALTER TABLE `participantes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transparencies`
--
ALTER TABLE `transparencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `destaque_notices`
--
ALTER TABLE `destaque_notices`
  ADD CONSTRAINT `destaque_notices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `licitacoes`
--
ALTER TABLE `licitacoes`
  ADD CONSTRAINT `licitacoes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `notices`
--
ALTER TABLE `notices`
  ADD CONSTRAINT `notices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `role_users`
--
ALTER TABLE `role_users`
  ADD CONSTRAINT `role_users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `transparencies`
--
ALTER TABLE `transparencies`
  ADD CONSTRAINT `transparencies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Extraindo dados da tabela `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"snap_to_grid\":\"off\",\"relation_lines\":\"true\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('db_sitesescoopro', 1, 'Shema_db');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"db_sitesescoopro\",\"table\":\"notices\"},{\"db\":\"db_sitesescoopro\",\"table\":\"destaque_notices\"},{\"db\":\"db_sitesescoopro\",\"table\":\"cursos\"},{\"db\":\"db_sitesescoopro\",\"table\":\"videos\"},{\"db\":\"db_sitesescoopro\",\"table\":\"banners\"},{\"db\":\"db_sitesescoopro\",\"table\":\"licitacoes\"},{\"db\":\"db_sitesescoopro\",\"table\":\"transparencies\"},{\"db\":\"db_sitesescoopro\",\"table\":\"users\"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Extraindo dados da tabela `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('db_sitesescoopro', 'cursos', 1, 57, 237),
('db_sitesescoopro', 'galeries', 1, 54, 49),
('db_sitesescoopro', 'instructors', 1, 904, 350),
('db_sitesescoopro', 'participantes', 1, 583, 109),
('db_sitesescoopro', 'transparencies', 1, 890, 66),
('db_sitesescoopro', 'videos', 1, 315, 185);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'db_sitesescoopro', 'licitacoes', '{\"CREATE_TIME\":\"2019-02-08 16:48:26\",\"col_order\":[0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49],\"col_visib\":[1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1]}', '2019-02-11 20:09:55'),
('root', 'db_sitesescoopro', 'notices', '{\"sorted_col\":\"`notices`.`id`  DESC\"}', '2019-02-14 19:24:47'),
('root', 'db_sitesescoopro', 'transparencies', '[]', '2019-02-07 14:48:36');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2019-02-15 22:19:35', '{\"lang\":\"pt\",\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
