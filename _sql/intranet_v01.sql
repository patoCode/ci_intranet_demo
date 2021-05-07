-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2021 a las 23:48:09
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action`
--

CREATE TABLE `action` (
  `id_action` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `uri` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `icon` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `id_calendar` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mail_notification` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `calendar`
--

INSERT INTO `calendar` (`id_calendar`, `id_site`, `name`, `description`, `color`, `short_key`, `mail_notification`, `status`, `user_created`, `created_at`, `user_updated`, `updated_at`, `is_delete`) VALUES
(1, 3, 'dsads', '<p>\n	dsadsa</p>\n', 'dsadsa', 'dsadsa', 'inactivo', 'activo', '#DEINS', '2021-04-29 03:43:38', NULL, '2021-04-28 21:43:46', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `cat_id_category` int(11) DEFAULT NULL,
  `id_site` int(11) NOT NULL,
  `category` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `objetive_group` int(11) DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `uri` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `cat_id_category`, `id_site`, `category`, `description`, `objetive_group`, `_order`, `uri`, `status`, `user_created`, `created_at`, `user_updated`, `updated_at`, `is_delete`) VALUES
(1, NULL, 3, '1', '<p>\n	2132</p>\n', NULL, 11, '12321321', 'activo', '#DEINS', '2021-04-29 03:14:55', NULL, '2021-04-28 21:15:04', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `initials` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `company_logo` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id_company`, `name`, `initials`, `description`, `company_logo`, `code`, `short_key`, `status`, `created_at`, `user_created`, `updated_at`, `user_updated`, `is_delete`) VALUES
(1, 'ENDETEC', 'ET', '<p>\n	123</p>\n', '06bfe-_foto1.jpg', 'ET-EMP1111', NULL, 'activo', '2021-04-27 19:14:56', NULL, '2021-04-28 02:40:12', '#DEINS', 'vigente'),
(2, 'Despliegue - Sistema Compras ET', 'ET', '<p>\n	wewwwwwww</p>\n', '58da2-d4c17d48d9e0a5ac9986887163f435ec.jpg', 'ET-EMP222', 'CMP-DATA2', 'activo', '2021-04-27 18:29:04', NULL, '2021-04-28 03:00:46', '#DEINS', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE `configuration` (
  `id_configuration` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `_path` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `server_type` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ip` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `id_calendar` int(11) NOT NULL,
  `event` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `color` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `objetive_group` int(11) DEFAULT NULL,
  `notificaion_mail` tinyint(1) DEFAULT NULL,
  `uri` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id_file` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `type` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email_notification` tinyint(1) DEFAULT NULL,
  `objetive_group` int(11) DEFAULT NULL,
  `_path` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `uri` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `slogan` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `id_type_form` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `objetive_group` int(11) DEFAULT NULL,
  `email_notification` tinyint(1) DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `content` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_type`
--

CREATE TABLE `form_type` (
  `id_type_form` int(11) NOT NULL,
  `type` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form_values`
--

CREATE TABLE `form_values` (
  `id_form_values` int(11) NOT NULL,
  `id_form` int(11) NOT NULL,
  `_values` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `is_page` tinyint(1) DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `group_`
--

CREATE TABLE `group_` (
  `id_group` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente',
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `icon` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `color` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `group_`
--

INSERT INTO `group_` (`id_group`, `name`, `description`, `status`, `created_at`, `updated_at`, `user_created`, `user_updated`, `is_delete`, `code`, `icon`, `color`) VALUES
(1, '12', '<p>\n	1221</p>\n', 'activo', '2021-04-29 03:24:12', '2021-04-28 21:24:20', '#DEINS', NULL, 'vigente', '11', '2121', '212121');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id_image` int(11) NOT NULL,
  `id_gallery` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `_path` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `uri_image` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `id_location` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `location` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `gmaps` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`id_location`, `id_company`, `location`, `phone`, `code`, `gmaps`, `short_key`, `status`, `user_created`, `created_at`, `user_updated`, `updated_at`, `is_delete`) VALUES
(1, 1, 'eqw', '332', '32321', '<p>\n	32132</p>\n', '22', 'activo', '#DEINS', '2021-04-28 20:18:27', NULL, '2021-04-28 14:21:03', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `uri` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `icon` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_category`
--

CREATE TABLE `menu_category` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `alias` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `visible` tinyint(1) DEFAULT NULL,
  `_order` int(11) DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_type`
--

CREATE TABLE `menu_type` (
  `id_type` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `message` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `author` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE `page` (
  `id_page` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `content` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `icon` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `friendly_uri` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`id_page`, `id_category`, `title`, `content`, `icon`, `friendly_uri`, `status`, `user_created`, `created_at`, `user_updated`, `updated_at`, `is_delete`) VALUES
(1, 1, 'weq', '<p>\n	ewewqe</p>\n', 'ewq', 'qweqw', 'activo', '#DEINS', '2021-04-29 03:15:14', '#DEINS', '2021-04-29 03:16:15', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `people`
--

CREATE TABLE `people` (
  `id_people` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `pat_surename` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mat_surename` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ci` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `mobile` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `personal_email` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `description` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_action`
--

CREATE TABLE `rol_action` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_action` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `site`
--

CREATE TABLE `site` (
  `id_site` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `slogan` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `code` varchar(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `main_logo` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `prefix_short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `short_key` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `site`
--

INSERT INTO `site` (`id_site`, `id_company`, `name`, `slogan`, `code`, `main_logo`, `prefix_short_key`, `short_key`, `status`, `user_created`, `created_at`, `user_updated`, `updated_at`, `is_delete`) VALUES
(3, 2, 'comunidad', 'Hola bola', 'ET-EMP', '80794-2393352.png', NULL, 'CMP-DATA', 'activo', NULL, '2021-04-28 13:34:24', '#DEINS', '2021-04-28 19:48:53', 'vigente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_site` int(11) NOT NULL,
  `id_people` int(11) NOT NULL,
  `username` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `photo` text COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `location` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ip_phone` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `work_position` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `manager` varchar(500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `notifications_active` tinyint(1) DEFAULT NULL,
  `status` enum('activo','inactivo') COLLATE utf8_spanish2_ci DEFAULT 'activo',
  `user_created` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_updated` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_delete` enum('vigente','borrado') COLLATE utf8_spanish2_ci DEFAULT 'vigente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_group`
--

CREATE TABLE `user_group` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_rol`
--

CREATE TABLE `user_rol` (
  `id_user` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id_action`);

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id_calendar`),
  ADD KEY `fk_r3` (`id_site`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`),
  ADD KEY `fk_r15` (`cat_id_category`),
  ADD KEY `fk_r9` (`id_site`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Indices de la tabla `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id_configuration`),
  ADD KEY `fk_r8` (`id_site`);

--
-- Indices de la tabla `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `fk_r5` (`id_calendar`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `fk_r23` (`id_page`);

--
-- Indices de la tabla `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`),
  ADD KEY `fk_r13` (`id_page`),
  ADD KEY `fk_r22` (`id_type_form`);

--
-- Indices de la tabla `form_type`
--
ALTER TABLE `form_type`
  ADD PRIMARY KEY (`id_type_form`);

--
-- Indices de la tabla `form_values`
--
ALTER TABLE `form_values`
  ADD PRIMARY KEY (`id_form_values`),
  ADD KEY `fk_r14` (`id_form`);

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`),
  ADD KEY `fk_r11` (`id_page`);

--
-- Indices de la tabla `group_`
--
ALTER TABLE `group_`
  ADD PRIMARY KEY (`id_group`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`),
  ADD KEY `fk_r12` (`id_gallery`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `fk_8` (`id_company`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `fk_r4` (`id_type`);

--
-- Indices de la tabla `menu_category`
--
ALTER TABLE `menu_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_r2` (`id_category`),
  ADD KEY `fk_r26` (`id_menu`);

--
-- Indices de la tabla `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_type`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `fk_r6` (`id_site`);

--
-- Indices de la tabla `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`),
  ADD KEY `fk_r10` (`id_category`);

--
-- Indices de la tabla `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id_people`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_action`
--
ALTER TABLE `rol_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_r18` (`id_rol`),
  ADD KEY `fk_r21` (`id_action`);

--
-- Indices de la tabla `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id_site`),
  ADD KEY `fk_r1` (`id_company`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_r19` (`id_people`),
  ADD KEY `fk_r20` (`id_site`);

--
-- Indices de la tabla `user_group`
--
ALTER TABLE `user_group`
  ADD KEY `fk_r24` (`id_user`),
  ADD KEY `fk_r25` (`id_group`);

--
-- Indices de la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD KEY `fk_r16` (`id_user`),
  ADD KEY `fk_r17` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `action`
--
ALTER TABLE `action`
  MODIFY `id_action` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id_calendar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id_configuration` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file`
--
ALTER TABLE `file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `form_type`
--
ALTER TABLE `form_type`
  MODIFY `id_type_form` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `form_values`
--
ALTER TABLE `form_values`
  MODIFY `id_form_values` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `group_`
--
ALTER TABLE `group_`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `id_location` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu_category`
--
ALTER TABLE `menu_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `people`
--
ALTER TABLE `people`
  MODIFY `id_people` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_action`
--
ALTER TABLE `rol_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `site`
--
ALTER TABLE `site`
  MODIFY `id_site` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `fk_r3` FOREIGN KEY (`id_site`) REFERENCES `site` (`id_site`);

--
-- Filtros para la tabla `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_r15` FOREIGN KEY (`cat_id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `fk_r9` FOREIGN KEY (`id_site`) REFERENCES `site` (`id_site`);

--
-- Filtros para la tabla `configuration`
--
ALTER TABLE `configuration`
  ADD CONSTRAINT `fk_r8` FOREIGN KEY (`id_site`) REFERENCES `site` (`id_site`);

--
-- Filtros para la tabla `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_r5` FOREIGN KEY (`id_calendar`) REFERENCES `calendar` (`id_calendar`);

--
-- Filtros para la tabla `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_r23` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`);

--
-- Filtros para la tabla `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `fk_r13` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`),
  ADD CONSTRAINT `fk_r22` FOREIGN KEY (`id_type_form`) REFERENCES `form_type` (`id_type_form`);

--
-- Filtros para la tabla `form_values`
--
ALTER TABLE `form_values`
  ADD CONSTRAINT `fk_r14` FOREIGN KEY (`id_form`) REFERENCES `form` (`id_form`);

--
-- Filtros para la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_r11` FOREIGN KEY (`id_page`) REFERENCES `page` (`id_page`);

--
-- Filtros para la tabla `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk_r12` FOREIGN KEY (`id_gallery`) REFERENCES `gallery` (`id_gallery`);

--
-- Filtros para la tabla `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_8` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_r4` FOREIGN KEY (`id_type`) REFERENCES `menu_type` (`id_type`);

--
-- Filtros para la tabla `menu_category`
--
ALTER TABLE `menu_category`
  ADD CONSTRAINT `fk_r2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`),
  ADD CONSTRAINT `fk_r26` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`);

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_r6` FOREIGN KEY (`id_site`) REFERENCES `site` (`id_site`);

--
-- Filtros para la tabla `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `fk_r10` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);

--
-- Filtros para la tabla `rol_action`
--
ALTER TABLE `rol_action`
  ADD CONSTRAINT `fk_r18` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_r21` FOREIGN KEY (`id_action`) REFERENCES `action` (`id_action`);

--
-- Filtros para la tabla `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `fk_r1` FOREIGN KEY (`id_company`) REFERENCES `company` (`id_company`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_r19` FOREIGN KEY (`id_people`) REFERENCES `people` (`id_people`),
  ADD CONSTRAINT `fk_r20` FOREIGN KEY (`id_site`) REFERENCES `site` (`id_site`);

--
-- Filtros para la tabla `user_group`
--
ALTER TABLE `user_group`
  ADD CONSTRAINT `fk_r24` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_r25` FOREIGN KEY (`id_group`) REFERENCES `group_` (`id_group`);

--
-- Filtros para la tabla `user_rol`
--
ALTER TABLE `user_rol`
  ADD CONSTRAINT `fk_r16` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `fk_r17` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
