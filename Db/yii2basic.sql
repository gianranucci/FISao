-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-11-2019 a las 20:50:32
-- Versión del servidor: 5.7.27-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yii2basic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('ABMCountry', 2, 'Permite alta baja y modificacion.', NULL, NULL, 1569365561, 1569365875),
('countryCreator', 1, '', NULL, NULL, 1569366025, 1569366067),
('countryDeleter', 1, '', NULL, NULL, 1569366059, 1569366122),
('countryManager', 1, '', NULL, NULL, 1569365977, 1569366156),
('countryUpdate', 1, '', NULL, NULL, 1569366087, 1569366145),
('createCountry', 2, '', NULL, NULL, 1569365653, 1569365815),
('deleteCountry', 2, '', NULL, NULL, 1569365845, 1569365845),
('updateCountry', 2, '', NULL, NULL, 1569365832, 1569365832);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('countryManager', 'ABMCountry'),
('ABMCountry', 'createCountry'),
('countryCreator', 'createCountry'),
('ABMCountry', 'deleteCountry'),
('countryDeleter', 'deleteCountry'),
('ABMCountry', 'updateCountry'),
('countryUpdate', 'updateCountry');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE TABLE `canchas` (
  `id_cancha` int(11) NOT NULL,
  `nombre_cancha` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canchas`
--

INSERT INTO `canchas` (`id_cancha`, `nombre_cancha`) VALUES
(1, 'Estadio Municipal'),
(2, 'Paseo Ferroviario'),
(3, 'Cancha Talleres'),
(4, 'Club Independiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Club`
--

CREATE TABLE `Club` (
  `id_club` int(11) NOT NULL,
  `nombre_club` varchar(120) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Club`
--

INSERT INTO `Club` (`id_club`, `nombre_club`, `direccion`) VALUES
(1, 'SEMILLERO ILCEN', NULL),
(2, 'UNION MARITIMA', NULL),
(3, 'RACING', NULL),
(4, 'UNION', NULL),
(5, 'TALLERES', NULL),
(6, 'C.S.D.R.I.G', ''),
(7, 'P.G.A. y O.', NULL),
(8, 'MONUMENTAL', NULL),
(9, 'LOS PICANTITOS', NULL),
(10, 'E.M.I.G', NULL),
(11, 'EL LOCO PERON', NULL),
(12, 'FERRO', NULL),
(13, 'DEP. SIERRA GRANDE', NULL),
(14, 'DEP. CEFERINO', NULL),
(15, 'E.M.P.S.A.E', NULL),
(16, 'BARRILETE COSMICO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('AU', 'Australia', 24016400),
('BR', 'Brazil', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('RU', 'Russia', 146519759),
('US', 'United States', 322976000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `nombre_equipo` varchar(120) DEFAULT NULL,
  `club_id` int(11) DEFAULT NULL,
  `dt_id` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `nombre_equipo`, `club_id`, `dt_id`, `categoria`) VALUES
(37, 'UNION', 4, NULL, 2011),
(38, 'SEMILLERO ILCEN', 1, NULL, 2011),
(39, 'C.S.D.R.I.G', 6, NULL, 2011),
(40, 'P.G.A. y O.', 7, NULL, 2011),
(41, 'BARRILETE COSMICO', 16, NULL, 2011),
(42, 'MONUMENTAL CONESA', 8, NULL, 2011),
(43, 'LOS PICANTITOS', 9, NULL, 2012),
(44, 'UNION', 4, NULL, 2012),
(45, 'UNION MARITIMA', 2, NULL, 2012),
(46, 'P.G.A. y O.', 7, NULL, 2012),
(47, 'DEP.CEFERINO', 14, NULL, 2012),
(48, 'TALLERES', 5, NULL, 2012),
(49, 'BARRILETE COSMICO', 16, NULL, 2012),
(50, 'RACING', 3, NULL, 2012),
(51, 'TALLERES AMARILLO', 5, NULL, 2013),
(52, 'SEMILLERO ILCEM', 1, NULL, 2013),
(53, 'E.M.I.G', 10, NULL, 2013),
(54, 'P.G.A. y O.', 7, NULL, 2013),
(55, 'BARRILETE COSMICO', 16, NULL, 2013),
(56, 'LOS PICANTITOS', 9, NULL, 2013),
(57, 'BARRILETE COSMICO', 16, NULL, 2010),
(58, 'RACING', 3, NULL, 2010),
(59, 'TALLERES', 5, NULL, 2010),
(60, 'C.S.D.R.I.G', 6, NULL, 2010),
(61, 'BARRILETE COSMICO', 16, NULL, 2009),
(63, 'P.G.A. y O.', 7, NULL, 2009),
(64, 'EL LOCO PERON', 11, NULL, 2009),
(65, 'MONUMENTAL CONESA', 8, NULL, 2009),
(66, 'TALLERES', 5, NULL, 2009),
(67, 'C.S.D.R.I.G', 6, NULL, 2009),
(68, 'DEP.SIERRA GRANDE', 13, NULL, 2008),
(69, 'FERRO', 12, NULL, 2008),
(70, 'TALLERES', 5, NULL, 2008),
(71, 'P.G.A. y O.', 7, NULL, 2008),
(72, 'C.S.D.R.I.G', 6, NULL, 2008),
(73, 'DEP.CEFERINO', 14, NULL, 2008),
(74, 'E.M.P.S.A.E', 15, NULL, 2007),
(75, 'MONUMENTAL CONESA', 8, NULL, 2007),
(76, 'C.S.D.R.I.G', 6, NULL, 2007),
(77, 'FERRO', 12, NULL, 2007),
(78, 'TALLERES', 5, NULL, 2007),
(79, 'P.G.A. y O.', 7, NULL, 2007),
(80, 'TALLERES', 5, NULL, 2006),
(81, 'UNION ROJO', 4, NULL, 2006);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` int(11) NOT NULL,
  `torneo_id` int(11) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `torneo_id`, `numero`, `estado`) VALUES
(111, 5, 1, NULL),
(112, 5, 1, NULL),
(113, 5, 2, NULL),
(114, 5, 3, NULL),
(115, 5, 4, NULL),
(116, 5, 5, NULL),
(117, 5, 1, NULL),
(118, 5, 2, NULL),
(119, 5, 3, NULL),
(120, 5, 4, NULL),
(121, 5, 5, NULL),
(122, 5, 1, NULL),
(123, 5, 2, NULL),
(124, 5, 3, NULL),
(125, 5, 4, NULL),
(126, 5, 5, NULL),
(127, 5, 1, NULL),
(128, 5, 2, NULL),
(129, 5, 3, NULL),
(130, 5, 1, NULL),
(131, 5, 2, NULL),
(132, 5, 3, NULL),
(133, 5, 4, NULL),
(134, 5, 5, NULL),
(135, 5, 1, NULL),
(136, 5, 2, NULL),
(137, 5, 3, NULL),
(138, 5, 4, NULL),
(139, 5, 5, NULL),
(140, 5, 6, NULL),
(141, 5, 7, NULL),
(142, 5, 1, NULL),
(143, 5, 2, NULL),
(144, 5, 3, NULL),
(145, 5, 4, NULL),
(146, 5, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `id_gol` int(11) NOT NULL,
  `partido_id` int(11) DEFAULT NULL,
  `jugador_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `cant_goles` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicioCarousel`
--

CREATE TABLE `inicioCarousel` (
  `id_carousel` int(11) NOT NULL,
  `titulo_carousel` varchar(255) DEFAULT NULL,
  `texto_carousel` varchar(255) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `boton_carousel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id_jugador` int(11) NOT NULL,
  `equipo_id` int(11) DEFAULT NULL,
  `nombre_jugador` varchar(120) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `apellido_jugador` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id_jugador`, `equipo_id`, `nombre_jugador`, `categoria`, `apellido_jugador`) VALUES
(1, 49, 'Ramiro', NULL, 'Bernabe'),
(3, 49, 'Jesus', NULL, 'Pasos'),
(4, 37, 'Jugador', NULL, 'Uno'),
(5, 37, 'Jugador', NULL, 'Dos'),
(6, 48, 'Jugador', NULL, 'Uno'),
(7, 48, 'Jugador', NULL, 'Dos'),
(8, 48, 'Jugador', NULL, 'Tres'),
(9, 44, 'Jugador', NULL, 'Uno'),
(10, 44, 'Jugador', NULL, 'Dos'),
(11, 43, 'Jugador', NULL, 'Uno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

CREATE TABLE `liga` (
  `id_liga` int(11) NOT NULL,
  `torneo_id` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1569364037),
('m140209_132017_init', 1569364042),
('m140403_174025_create_account_table', 1569364042),
('m140504_113157_update_tables', 1569364042),
('m140504_130429_create_token_table', 1569364042),
('m140506_102106_rbac_init', 1569365180),
('m140830_171933_fix_ip_field', 1569364042),
('m140830_172703_change_account_table_name', 1569364042),
('m141222_110026_update_ip_field', 1569364042),
('m141222_135246_alter_username_length', 1569364042),
('m150614_103145_update_social_account_table', 1569364043),
('m150623_212711_fix_username_notnull', 1569364043),
('m151218_234654_add_timezone_to_profile', 1569364043),
('m160929_103127_add_last_login_at_to_user_table', 1569364043),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1569365180),
('m180523_151638_rbac_updates_indexes_without_prefix', 1569365180);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `id_partido` int(11) NOT NULL,
  `equipolocal_id` int(11) DEFAULT NULL,
  `equipovisitante_id` int(11) DEFAULT NULL,
  `cancha_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `liga_id` int(11) DEFAULT NULL,
  `num_fecha` int(11) DEFAULT NULL,
  `torneo_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id_partido`, `equipolocal_id`, `equipovisitante_id`, `cancha_id`, `fecha_inicio`, `liga_id`, `num_fecha`, `torneo_id`) VALUES
(113, 80, 81, 2, NULL, 2006, NULL, NULL),
(114, 74, 75, 2, NULL, 2007, NULL, NULL),
(115, 76, 79, 2, NULL, 2007, NULL, NULL),
(116, 77, 78, 2, NULL, 2007, NULL, NULL),
(117, 74, 76, 2, NULL, 2007, NULL, NULL),
(118, 77, 75, 2, NULL, 2007, NULL, NULL),
(119, 78, 79, 2, NULL, 2007, NULL, NULL),
(120, 74, 77, 2, NULL, 2007, NULL, NULL),
(121, 78, 76, 2, NULL, 2007, NULL, NULL),
(122, 79, 75, 2, NULL, 2007, NULL, NULL),
(123, 74, 78, 2, NULL, 2007, NULL, NULL),
(124, 79, 77, 2, NULL, 2007, NULL, NULL),
(125, 75, 76, 2, NULL, 2007, NULL, NULL),
(126, 74, 79, 2, NULL, 2007, NULL, NULL),
(127, 75, 78, 2, NULL, 2007, NULL, NULL),
(128, 76, 77, 2, NULL, 2007, NULL, NULL),
(129, 68, 69, 2, NULL, 2008, NULL, NULL),
(130, 70, 73, 2, NULL, 2008, NULL, NULL),
(131, 71, 72, 2, NULL, 2008, NULL, NULL),
(132, 68, 70, 2, NULL, 2008, NULL, NULL),
(133, 71, 69, 2, NULL, 2008, NULL, NULL),
(134, 72, 73, 2, NULL, 2008, NULL, NULL),
(135, 68, 71, 2, NULL, 2008, NULL, NULL),
(136, 72, 70, 2, NULL, 2008, NULL, NULL),
(137, 73, 69, 2, NULL, 2008, NULL, NULL),
(138, 68, 72, 2, NULL, 2008, NULL, NULL),
(139, 73, 71, 2, NULL, 2008, NULL, NULL),
(140, 69, 70, 2, NULL, 2008, NULL, NULL),
(141, 68, 73, 2, NULL, 2008, NULL, NULL),
(142, 69, 72, 2, NULL, 2008, NULL, NULL),
(143, 70, 71, 2, NULL, 2008, NULL, NULL),
(144, 61, 63, 2, NULL, 2009, NULL, NULL),
(145, 64, 67, 2, NULL, 2009, NULL, NULL),
(146, 65, 66, 2, NULL, 2009, NULL, NULL),
(147, 61, 64, 2, NULL, 2009, NULL, NULL),
(148, 65, 63, 2, NULL, 2009, NULL, NULL),
(149, 66, 67, 2, NULL, 2009, NULL, NULL),
(150, 61, 65, 2, NULL, 2009, NULL, NULL),
(151, 66, 64, 2, NULL, 2009, NULL, NULL),
(152, 67, 63, 2, NULL, 2009, NULL, NULL),
(153, 61, 66, 2, NULL, 2009, NULL, NULL),
(154, 67, 65, 2, NULL, 2009, NULL, NULL),
(155, 63, 64, 2, NULL, 2009, NULL, NULL),
(156, 61, 67, 2, NULL, 2009, NULL, NULL),
(157, 63, 66, 2, NULL, 2009, NULL, NULL),
(158, 64, 65, 2, NULL, 2009, NULL, NULL),
(159, 57, 58, 2, NULL, 2010, NULL, NULL),
(160, 59, 60, 2, NULL, 2010, NULL, NULL),
(161, 57, 59, 2, NULL, 2010, NULL, NULL),
(162, 60, 58, 2, NULL, 2010, NULL, NULL),
(163, 57, 60, 2, NULL, 2010, NULL, NULL),
(164, 58, 59, 2, NULL, 2010, NULL, NULL),
(165, 37, 38, 2, NULL, 2011, NULL, NULL),
(166, 39, 42, 2, NULL, 2011, NULL, NULL),
(167, 40, 41, 2, NULL, 2011, NULL, NULL),
(168, 37, 39, 2, NULL, 2011, NULL, NULL),
(169, 40, 38, 2, NULL, 2011, NULL, NULL),
(170, 41, 42, 2, NULL, 2011, NULL, NULL),
(171, 37, 40, 2, NULL, 2011, NULL, NULL),
(172, 41, 39, 2, NULL, 2011, NULL, NULL),
(173, 42, 38, 2, NULL, 2011, NULL, NULL),
(174, 37, 41, 2, NULL, 2011, NULL, NULL),
(175, 42, 40, 2, NULL, 2011, NULL, NULL),
(176, 38, 39, 2, NULL, 2011, NULL, NULL),
(177, 37, 42, 2, NULL, 2011, NULL, NULL),
(178, 38, 41, 2, NULL, 2011, NULL, NULL),
(179, 39, 40, 2, NULL, 2011, NULL, NULL),
(180, 43, 44, 2, NULL, 2012, NULL, NULL),
(181, 45, 50, 2, NULL, 2012, NULL, NULL),
(182, 46, 49, 2, NULL, 2012, NULL, NULL),
(183, 47, 48, 2, NULL, 2012, NULL, NULL),
(184, 43, 45, 2, NULL, 2012, NULL, NULL),
(185, 46, 44, 2, NULL, 2012, NULL, NULL),
(186, 47, 50, 2, NULL, 2012, NULL, NULL),
(187, 48, 49, 2, NULL, 2012, NULL, NULL),
(188, 43, 46, 2, NULL, 2012, NULL, NULL),
(189, 47, 45, 2, NULL, 2012, NULL, NULL),
(190, 48, 44, 2, NULL, 2012, NULL, NULL),
(191, 49, 50, 2, NULL, 2012, NULL, NULL),
(192, 43, 47, 2, NULL, 2012, NULL, NULL),
(193, 48, 46, 2, NULL, 2012, NULL, NULL),
(194, 49, 45, 2, NULL, 2012, NULL, NULL),
(195, 50, 44, 2, NULL, 2012, NULL, NULL),
(196, 43, 48, 2, NULL, 2012, NULL, NULL),
(197, 49, 47, 2, NULL, 2012, NULL, NULL),
(198, 50, 46, 2, NULL, 2012, NULL, NULL),
(199, 44, 45, 2, NULL, 2012, NULL, NULL),
(200, 43, 49, 2, NULL, 2012, NULL, NULL),
(201, 50, 48, 2, NULL, 2012, NULL, NULL),
(202, 44, 47, 2, NULL, 2012, NULL, NULL),
(203, 45, 46, 2, NULL, 2012, NULL, NULL),
(204, 43, 50, 2, NULL, 2012, NULL, NULL),
(205, 44, 49, 2, NULL, 2012, NULL, NULL),
(206, 45, 48, 2, NULL, 2012, NULL, NULL),
(207, 46, 47, 2, NULL, 2012, NULL, NULL),
(208, 51, 52, 2, NULL, 2013, NULL, NULL),
(209, 53, 56, 2, NULL, 2013, NULL, NULL),
(210, 54, 55, 2, NULL, 2013, NULL, NULL),
(211, 51, 53, 2, NULL, 2013, NULL, NULL),
(212, 54, 52, 2, NULL, 2013, NULL, NULL),
(213, 55, 56, 2, NULL, 2013, NULL, NULL),
(214, 51, 54, 2, NULL, 2013, NULL, NULL),
(215, 55, 53, 2, NULL, 2013, NULL, NULL),
(216, 56, 52, 2, NULL, 2013, NULL, NULL),
(217, 51, 55, 2, NULL, 2013, NULL, NULL),
(218, 56, 54, 2, NULL, 2013, NULL, NULL),
(219, 52, 53, 2, NULL, 2013, NULL, NULL),
(220, 51, 56, 2, NULL, 2013, NULL, NULL),
(221, 52, 55, 2, NULL, 2013, NULL, NULL),
(222, 53, 54, 2, NULL, 2013, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `nombre_tecnico` varchar(90) DEFAULT NULL,
  `apellido_tecnico` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id_tecnico`, `nombre_tecnico`, `apellido_tecnico`) VALUES
(1, 'Patricio', 'Pascolat'),
(2, 'Gian', 'Ranucci');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'oVctv7gIX6tynHf6PLdiHo1TadLjAvyp', 1569364707, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `id_torneo` int(11) NOT NULL,
  `nombre_torneo` varchar(120) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`id_torneo`, `nombre_torneo`, `fecha_inicio`, `fecha_fin`) VALUES
(5, 'automatico', '2019-06-15 00:00:00', '2019-08-30 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'gian', 'gian_sao@live.com.ar', '$2y$12$Pv79b4LUgUo4ffHKwy/LgOZQx6ckxj3tgcUblZLzTkCSrveQOC30e', 'CNtG5ZcEkl_rmcIlAFUZdwFgzX3GOqy4', NULL, NULL, NULL, '127.0.0.1', 1569364707, 1569364707, 0, 1569541325),
(2, 'pacho', 'pacho@gmail.com', '$2y$12$TiCOSh1gVvZNG3HH4UOpk.qFP6./F1nBsAYu9K3fAzrLGZ/g8tQZ.', 'iZKtOOAg-4-xt5e0jd0weI8YivWX-XtS', 1569365941, NULL, NULL, '127.0.0.1', 1569365941, 1569365941, 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `canchas`
--
ALTER TABLE `canchas`
  ADD PRIMARY KEY (`id_cancha`);

--
-- Indices de la tabla `Club`
--
ALTER TABLE `Club`
  ADD PRIMARY KEY (`id_club`);

--
-- Indices de la tabla `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `fk_equipo_1_idx` (`dt_id`),
  ADD KEY `fk_equipo_2_idx` (`club_id`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`),
  ADD KEY `fk_fecha_1_idx` (`torneo_id`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`id_gol`),
  ADD KEY `fk_goles_1_idx` (`jugador_id`);

--
-- Indices de la tabla `inicioCarousel`
--
ALTER TABLE `inicioCarousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id_jugador`),
  ADD KEY `fk_jugador_1_idx` (`equipo_id`);

--
-- Indices de la tabla `liga`
--
ALTER TABLE `liga`
  ADD PRIMARY KEY (`id_liga`),
  ADD KEY `fk_liga_1_idx` (`torneo_id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`id_partido`),
  ADD KEY `fk_partido_2_idx` (`cancha_id`),
  ADD KEY `fk_partido_3_idx` (`equipolocal_id`),
  ADD KEY `fk_partido_4_idx` (`equipovisitante_id`),
  ADD KEY `fk_partido_1_idx` (`torneo_id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tecnico`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`id_torneo`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canchas`
--
ALTER TABLE `canchas`
  MODIFY `id_cancha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `Club`
--
ALTER TABLE `Club`
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `goles`
  MODIFY `id_gol` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inicioCarousel`
--
ALTER TABLE `inicioCarousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `liga`
--
ALTER TABLE `liga`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT de la tabla `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `fk_equipo_1` FOREIGN KEY (`dt_id`) REFERENCES `tecnico` (`id_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_equipo_2` FOREIGN KEY (`club_id`) REFERENCES `Club` (`id_club`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD CONSTRAINT `fk_fecha_1` FOREIGN KEY (`torneo_id`) REFERENCES `torneo` (`id_torneo`);

--
-- Filtros para la tabla `goles`
--
ALTER TABLE `goles`
  ADD CONSTRAINT `fk_goles_1` FOREIGN KEY (`jugador_id`) REFERENCES `jugador` (`id_jugador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `fk_jugador_1` FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `liga`
--
ALTER TABLE `liga`
  ADD CONSTRAINT `fk_liga_1` FOREIGN KEY (`torneo_id`) REFERENCES `torneo` (`id_torneo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `partido`
--
ALTER TABLE `partido`
  ADD CONSTRAINT `fk_partido_1` FOREIGN KEY (`torneo_id`) REFERENCES `torneo` (`id_torneo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_2` FOREIGN KEY (`cancha_id`) REFERENCES `canchas` (`id_cancha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_3` FOREIGN KEY (`equipolocal_id`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_4` FOREIGN KEY (`equipovisitante_id`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
