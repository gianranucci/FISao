-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 24-10-2019 a las 18:56:54
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
(1, 'Talleres', 'hjakdsasd'),
(2, 'San Lorenzo', 'jhaksdsad'),
(3, 'dfsdfsdsds', 'sdfs'),
(4, 'Barrilete Cosmico', 'Islas Malvinas 202'),
(5, 'Equipo 1', 'Direccion 1'),
(6, 'Equipo 2', 'Direccion 2'),
(7, 'Equipo 3', 'Direccion 3'),
(8, 'Equipo 4', 'Direccion 4'),
(9, 'Equipo 5', 'Direccion 5'),
(10, 'Equipo 6', 'Direccion 6'),
(11, 'Equipo 7', 'Direccion 7'),
(12, 'Equipo 8', 'Direccion 8'),
(13, 'Equipo 9', 'Direccion 9'),
(14, 'Equipo 10', 'Direccion 10');

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
(1, 'Talleres 2012', 1, NULL, 2012),
(2, 'Talleres 2013', NULL, NULL, 2012),
(3, 'Independiente', 3, NULL, 2012),
(5, 'Barrilete Cosmico 2012', 4, 1, 2012),
(6, 'equipo azul', 5, NULL, 2012),
(7, 'equipo rojo', 5, NULL, 2012),
(8, 'equipo verde', 5, NULL, 2012),
(9, 'equipo naranja', 5, NULL, 2012),
(10, 'equipo amarillo', 5, NULL, 2012),
(11, 'equipo blanco', 5, NULL, 2012),
(12, 'equipo azul', 6, NULL, 2013),
(13, 'equipo rojo', 6, NULL, 2013),
(14, 'equipo verde', 6, NULL, 2013),
(15, 'equipo naranja', 6, NULL, 2013),
(16, 'equipo amarillo', 6, NULL, 2013),
(17, 'equipo blanco', 6, NULL, 2013),
(18, 'equipo azul', 7, NULL, 2013),
(19, 'equipo rojo', 7, NULL, 2013),
(20, 'equipo verde', 7, NULL, 2013),
(21, 'equipo naranja', 7, NULL, 2013),
(22, 'equipo amarillo', 7, NULL, 2013),
(23, 'equipo blanco', 7, NULL, 2013),
(24, 'equipo azul', 8, NULL, 2013),
(25, 'equipo rojo', 8, NULL, 2013),
(26, 'equipo verde', 8, NULL, 2013),
(27, 'equipo naranja', 8, NULL, 2013),
(28, 'equipo amarillo', 8, NULL, 2013),
(29, 'equipo blanco', 8, NULL, 2013),
(30, 'equipo azul', 9, NULL, 2013),
(31, 'equipo rojo', 9, NULL, 2013),
(32, 'equipo verde', 9, NULL, 2013),
(33, 'equipo naranja', 9, NULL, 2013),
(34, 'equipo amarillo', 9, NULL, 2013),
(35, 'equipo blanco', 9, NULL, 2013),
(36, 'Equipo Cualquiera', 4, NULL, 2014);

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
(1, 1, 1, ''),
(2, 1, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `id_gol` int(11) NOT NULL,
  `partido_id` int(11) DEFAULT NULL,
  `jugador_id` int(11) DEFAULT NULL,
  `equipo_id` int(11) DEFAULT NULL
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
(1, 2, 'Marco Antonio', 2010, 'Solis'),
(4, 1, 'Nombre 1', 2012, 'Apellido1q'),
(5, 2, 'nombre 2', 2012, 'apellido 2'),
(6, 3, 'nombre 3', 2012, 'apellido 3'),
(7, 5, 'nombre 4', 2012, 'apellido 4'),
(8, NULL, '', NULL, ''),
(9, NULL, NULL, NULL, NULL),
(10, 5, 'nombre jugador 1', 2013, 'apellido jugador 1'),
(11, 5, 'nombre jugador 2', 2013, 'apellido jugador 2'),
(12, 5, 'nombre jugador 3', 2013, 'apellido jugador 3'),
(13, 5, 'nombre jugador 4', 2013, 'apellido jugador 4'),
(14, 5, 'nombre jugador 5', 2013, 'apellido jugador 5'),
(15, 5, 'nombre jugador 6', 2013, 'apellido jugador 6'),
(16, 5, 'nombre jugador 7', 2013, 'apellido jugador 7'),
(17, 5, 'nombre jugador 8', 2013, 'apellido jugador 8'),
(18, 5, 'nombre jugador 9', 2013, 'apellido jugador 9'),
(19, 5, 'nombre jugador 10', 2013, 'apellido jugador 10'),
(20, 6, 'nombre jugador 1', 2013, 'apellido jugador 1'),
(21, 6, 'nombre jugador 2', 2013, 'apellido jugador 2'),
(22, 6, 'nombre jugador 3', 2013, 'apellido jugador 3'),
(23, 6, 'nombre jugador 4', 2013, 'apellido jugador 4'),
(24, 6, 'nombre jugador 5', 2013, 'apellido jugador 5'),
(25, 6, 'nombre jugador 6', 2013, 'apellido jugador 6'),
(26, 6, 'nombre jugador 7', 2013, 'apellido jugador 7'),
(27, 6, 'nombre jugador 8', 2013, 'apellido jugador 8'),
(28, 6, 'nombre jugador 9', 2013, 'apellido jugador 9'),
(29, 6, 'nombre jugador 10', 2013, 'apellido jugador 10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liga`
--

CREATE TABLE `liga` (
  `id_liga` int(11) NOT NULL,
  `torneo_id` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `liga`
--

INSERT INTO `liga` (`id_liga`, `torneo_id`, `categoria`) VALUES
(1, 1, 2012);

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
  `fecha_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`id_partido`, `equipolocal_id`, `equipovisitante_id`, `cancha_id`, `fecha_inicio`, `liga_id`, `fecha_id`) VALUES
(1, 1, 5, 2, '2019-07-03 14:00:00', 1, NULL);

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
(1, 'Tomas Porra 2019', '2019-06-15 00:00:00', '2019-08-30 00:00:00');

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
  ADD KEY `fk_partido_1_idx` (`liga_id`),
  ADD KEY `fk_partido_2_idx` (`cancha_id`),
  ADD KEY `fk_partido_3_idx` (`equipolocal_id`),
  ADD KEY `fk_partido_4_idx` (`equipovisitante_id`),
  ADD KEY `fk_partido_5_idx` (`fecha_id`);

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
  MODIFY `id_club` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id_fecha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id_jugador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `liga`
--
ALTER TABLE `liga`
  MODIFY `id_liga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `id_partido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id_torneo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  ADD CONSTRAINT `fk_partido_1` FOREIGN KEY (`liga_id`) REFERENCES `liga` (`id_liga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_2` FOREIGN KEY (`cancha_id`) REFERENCES `canchas` (`id_cancha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_3` FOREIGN KEY (`equipolocal_id`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_4` FOREIGN KEY (`equipovisitante_id`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_partido_5` FOREIGN KEY (`fecha_id`) REFERENCES `fecha` (`id_fecha`);

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
