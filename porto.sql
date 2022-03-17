-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
<<<<<<< HEAD:porto.sql
-- Tiempo de generación: 17-03-2022 a las 18:11:23
=======
<<<<<<< HEAD:porto.sql
-- Tiempo de generación: 10-01-2022 a las 16:27:12
=======
-- Tiempo de generación: 07-12-2021 a las 17:43:38
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sevenparts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `attribute`
--

INSERT INTO `attribute` (`id`, `name`, `description`) VALUES
(1, 'Gramos', 'grs'),
(2, 'Mililitros', 'ml'),
(3, 'Centimetros cúbicos', 'cm3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attribute_value`
--

CREATE TABLE `attribute_value` (
  `id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tag` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `attribute_value`
--

INSERT INTO `attribute_value` (`id`, `attribute_id`, `name`, `tag`, `created_at`, `updated_at`) VALUES
(1, 1, '50', '50grs', NULL, NULL),
(2, 1, '100', '100grs', NULL, NULL),
(3, 2, '15', '15ml', NULL, NULL),
(4, 2, '30', '30ml', NULL, NULL),
(5, 2, '60', '60ml', NULL, NULL),
(6, 1, '90', '90grs', NULL, NULL),
(7, 2, '120', '120ml', NULL, NULL),
(8, 2, '100', '100ml', NULL, NULL),
(9, 2, '140', '140ml', NULL, NULL),
(10, 2, '10', '10ml', NULL, NULL),
(11, 1, '15', '15grs', NULL, NULL),
(12, 1, '10', '10grs', NULL, NULL),
(13, 1, '500', '500grs', '2021-09-09 01:14:26', '2021-09-09 01:14:26'),
(14, 1, '240', '240grs', '2021-09-09 01:27:39', '2021-09-09 01:27:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canceled_orders`
--

CREATE TABLE `canceled_orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `reason` varchar(75) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `slug` varchar(75) NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `order` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `slug`, `parent_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Sin categorizar', 'Producto sin categorizar.', 'sin-categorizar', 0, 8, '2021-03-05 06:00:00', '2021-03-05 06:00:00'),
<<<<<<< HEAD:porto.sql
(2, 'Jabones', NULL, 'jabones', 4, 2, '2021-03-06 05:07:31', '2021-03-06 05:07:31'),
(3, 'Aceites', NULL, 'aceites', 4, 3, '2021-03-06 05:07:41', '2021-03-06 05:07:41'),
(4, 'Principal', NULL, 'principal', 0, 1, '2021-03-06 05:08:37', '2021-06-22 16:54:15'),
(5, 'Champú', NULL, 'champu', 4, 4, '2021-03-06 05:08:43', '2021-06-22 16:54:36'),
(6, 'Cremas', NULL, 'cremas', 4, 5, '2021-06-22 16:54:46', '2021-06-22 16:54:46'),
(7, 'Canasta', NULL, 'canasta', 4, 6, '2021-10-19 19:42:27', '2021-10-19 19:42:27');
<<<<<<< HEAD:porto.sql
=======
=======
(2, 'Equipos AMD', NULL, 'equipos-amd', 4, 2, '2021-03-06 05:07:31', '2021-11-26 06:54:53'),
(3, 'Equipos Intel', NULL, 'equipos-intel', 4, 3, '2021-03-06 05:07:41', '2021-11-26 06:55:24'),
(4, 'Equipos Gaming', NULL, 'equipos-gaming', 0, 1, '2021-03-06 05:08:37', '2021-11-26 06:55:15'),
(5, 'otros', NULL, 'otros', 4, 4, '2021-03-06 05:08:43', '2021-11-30 19:38:46'),
(7, 'Periféricos', NULL, 'perifericos', 0, 6, '2021-11-26 06:55:40', '2021-11-26 06:55:40'),
(8, 'Mouse', NULL, 'mouse', 7, 8, '2021-11-26 06:55:46', '2021-11-26 06:55:46'),
(9, 'Teclados', NULL, 'teclados', 7, 9, '2021-11-26 06:55:52', '2021-11-26 06:55:52'),
(10, 'Mousepad', NULL, 'mousepad', 7, 10, '2021-11-26 06:56:21', '2021-11-26 06:56:21'),
(11, 'Combos', NULL, 'combos', 7, 11, '2021-11-26 06:56:35', '2021-11-26 06:56:35'),
(12, 'Auriculares', NULL, 'auriculares', 7, 7, '2021-11-26 07:31:36', '2021-11-26 07:31:36'),
(13, 'Componentes', NULL, 'componentes', 0, 12, '2021-11-26 21:08:26', '2021-11-26 21:08:26'),
(14, 'Procesadores Intel', NULL, 'procesadores-intel', 13, 13, '2021-11-26 21:08:40', '2021-11-26 21:08:40'),
(15, 'Procesadores AMD', NULL, 'procesadores-amd', 13, 14, '2021-11-26 21:08:49', '2021-11-26 21:08:49'),
(16, 'Memorias RAM', NULL, 'memorias-ram', 13, 15, '2021-11-26 21:09:08', '2021-11-26 21:09:08');
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combos`
--

CREATE TABLE `combos` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(1024) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(125) NOT NULL,
  `slug` varchar(75) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combos`
--

INSERT INTO `combos` (`id`, `name`, `description`, `price`, `status`, `image`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jabón + Crema 100grs', 'Jabón + Crema 100grs', 600, 1, '/assets/uploads/combos/xzQ7lETX-500x500.png', 'jabon-crema-100grs', '2021-10-09 21:13:27', '2021-10-09 21:13:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo_customer`
--

CREATE TABLE `combo_customer` (
  `id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

<<<<<<< HEAD:porto.sql
=======
--
-- Volcado de datos para la tabla `combo_customer`
--

INSERT INTO `combo_customer` (`id`, `combo_id`, `user_id`, `product_id`, `qty`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 36, 1, '2021-10-19 21:44:21', '2021-10-19 21:44:21', NULL),
(2, 1, 1, 1, 1, '2021-10-19 21:44:21', '2021-10-19 21:44:21', NULL),
(10, 1, 2, 36, 1, '2021-12-21 18:49:57', '2021-12-21 18:50:28', '2021-12-21 18:50:28'),
(11, 1, 2, 2, 1, '2021-12-21 18:49:57', '2021-12-21 18:50:28', '2021-12-21 18:50:28'),
(13, 1, 2, 36, 1, '2021-12-21 18:54:27', '2021-12-21 18:54:52', '2021-12-21 18:54:52'),
(14, 1, 2, 2, 1, '2021-12-21 18:54:27', '2021-12-21 18:54:52', '2021-12-21 18:54:52'),
(16, 1, 2, 36, 1, '2021-12-21 18:57:52', '2021-12-21 19:00:22', '2021-12-21 19:00:22'),
(17, 1, 2, 2, 1, '2021-12-21 18:57:52', '2021-12-21 19:00:22', '2021-12-21 19:00:22'),
(18, 1, 2, 36, 1, '2021-12-21 19:02:14', '2021-12-21 19:02:32', '2021-12-21 19:02:32'),
(19, 1, 2, 1, 1, '2021-12-21 19:02:14', '2021-12-21 19:02:32', '2021-12-21 19:02:32'),
(20, 1, 2, 36, 1, '2021-12-21 19:03:12', '2021-12-21 19:03:38', '2021-12-21 19:03:38'),
(21, 1, 2, 2, 1, '2021-12-21 19:03:12', '2021-12-21 19:03:38', '2021-12-21 19:03:38'),
(22, 1, 2, 48, 1, '2021-12-21 19:03:38', '2022-01-10 19:00:05', '2022-01-10 19:00:05'),
(23, 1, 2, 16, 1, '2021-12-21 19:03:38', '2022-01-10 19:00:05', '2022-01-10 19:00:05'),
(24, 1, 2, 40, 1, '2022-01-10 19:00:05', '2022-01-10 19:02:14', '2022-01-10 19:02:14'),
(25, 1, 2, 3, 1, '2022-01-10 19:00:05', '2022-01-10 19:02:14', '2022-01-10 19:02:14'),
(26, 1, 2, 36, 1, '2022-01-10 19:02:14', '2022-01-10 19:02:14', NULL),
(27, 1, 2, 2, 1, '2022-01-10 19:02:14', '2022-01-10 19:02:14', NULL);

>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combo_item`
--

CREATE TABLE `combo_item` (
  `id` int(11) NOT NULL,
  `combo_id` int(11) NOT NULL,
  `product_type_attribute_value_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `combo_item`
--

INSERT INTO `combo_item` (`id`, `combo_id`, `product_type_attribute_value_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2021-10-09 21:13:27', '2021-10-09 21:13:27'),
<<<<<<< HEAD:porto.sql
(2, 1, 6, 1, '2021-10-09 21:13:27', '2021-10-09 21:13:27'),
(3, 2, 4, 1, '2022-03-15 16:53:58', '2022-03-15 16:53:58'),
(4, 2, 6, 1, '2022-03-15 16:53:58', '2022-03-15 16:53:58');
=======
(2, 1, 6, 1, '2021-10-09 21:13:27', '2021-10-09 21:13:27');
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `plan` int(11) NOT NULL,
  `company_name` varchar(75) NOT NULL,
  `currency` varchar(75) NOT NULL,
  `symbol` varchar(15) NOT NULL,
  `mail` varchar(75) NOT NULL,
  `city` varchar(75) NOT NULL,
  `location` varchar(75) NOT NULL,
  `address` varchar(75) NOT NULL,
  `phone` varchar(75) NOT NULL,
  `cellphone` varchar(75) NOT NULL,
  `facebook` varchar(75) DEFAULT NULL,
  `instagram` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id`, `plan`, `company_name`, `currency`, `symbol`, `mail`, `city`, `location`, `address`, `phone`, `cellphone`, `facebook`, `instagram`) VALUES
(1, 5, 'Sevenparts', 'Dólares', 'U$s', 'contacto@sevenparts.uy', 'Montevideo', 'Cerro', 'Mexico 1891', '0000 00 00', '096 392 243', 'https://www.facebook.com/sevenpartsuy', 'https://www.instagram.com/sevenpartsuy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `discount_type_id` int(11) NOT NULL,
  `code` varchar(75) NOT NULL,
  `description` varchar(75) DEFAULT NULL,
  `discount` int(11) NOT NULL,
  `expiration_date` date DEFAULT NULL,
  `total_usage` int(11) DEFAULT 0,
  `limit_usage` int(11) DEFAULT NULL,
  `min_item` int(11) DEFAULT 0,
  `min_value` int(11) DEFAULT 0,
  `is_active` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coupon_order`
--

CREATE TABLE `coupon_order` (
  `id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `total_discount` int(11) NOT NULL,
  `confirmed` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discount_type`
--

CREATE TABLE `discount_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(75) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `discount_type`
--

INSERT INTO `discount_type` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Monto', 'Monto de descuento del total de la compra.', '2021-04-12 20:41:17', '2021-04-12 20:41:20', '2021-04-12 20:41:32'),
(2, 'Porcentaje', 'Porcentaje de descuento del total de la compra.', '2021-04-12 20:41:22', '2021-04-12 20:41:24', NULL),
(3, 'Envío free', 'Envío gratis.', '2021-04-12 20:41:26', '2021-04-12 20:41:28', '2021-04-12 20:41:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 17, '2021-12-01 19:06:56', '2021-12-01 19:06:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `featured_products`
--

CREATE TABLE `featured_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(75) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `featured_products`
--

INSERT INTO `featured_products` (`id`, `product_id`, `title`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Titulo de prueba', 'Lorem ipsum dolor sit amet, consectetur adipisicing.', '2021-09-28 01:50:54', '2021-09-30 01:17:55', '2021-09-30 01:17:55'),
(2, 57, 'Titulo de prueba', 'Lorem ipsum dolor sit.', '2021-09-28 01:51:17', '2021-09-30 01:17:56', '2021-09-30 01:17:56'),
(3, 1, 'Jabon lavanda', 'Descripcion de prueba.', '2021-10-09 21:28:40', '2021-10-09 21:29:09', '2021-10-09 21:29:09'),
(4, 1, 'Jabon lavanda', 'Descripcion de prueba.', '2021-10-09 21:31:34', '2021-10-09 21:31:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `path`, `created_at`, `updated_at`) VALUES
<<<<<<< HEAD:porto.sql
(1, '/assets/uploads/products/jabon_lavanda.jpg', '2021-03-06 05:17:43', '2021-03-06 05:17:43'),
(2, '/assets/uploads/products/jabon_magnesio.jpg', '2021-03-06 05:19:24', '2021-03-06 05:19:24'),
(3, '/assets/uploads/products/jabon_coco.jpg', '2021-03-06 05:20:47', '2021-03-06 05:20:47'),
(4, '/assets/uploads/products/jabon_bicarbonato_de_sodio.jpg', '2021-03-06 05:23:17', '2021-03-06 05:23:17'),
(5, '/assets/uploads/products/jabon_centella_asiatica.jpg', '2021-03-06 05:25:49', '2021-03-06 05:25:49'),
(6, '/assets/uploads/products/Ja1.jpg', '2021-06-18 20:52:35', '2021-06-18 20:52:35'),
(7, '/assets/uploads/products/Ja2.jpg', '2021-06-18 20:53:55', '2021-06-18 20:53:55'),
(8, '/assets/uploads/products/Ja3.jpg', '2021-06-18 20:54:53', '2021-06-18 20:54:53'),
(9, '/assets/uploads/products/Ja4.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(10, '/assets/uploads/products/Ja5.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(11, '/assets/uploads/products/Ja7.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(12, '/assets/uploads/products/Ja8.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(13, '/assets/uploads/products/Ja9.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(14, '/assets/uploads/products/Ja13.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(15, '/assets/uploads/products/Ja14.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(16, '/assets/uploads/products/Ja15.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(17, '/assets/uploads/products/Ja16.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(18, '/assets/uploads/products/Ja17.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(19, '/assets/uploads/products/Ja18.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(20, '/assets/uploads/products/Ja19.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(21, '/assets/uploads/products/Ja20.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(22, '/assets/uploads/products/Ja21.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(23, '/assets/uploads/products/Ja22.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(24, '/assets/uploads/products/Ja23.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(25, '/assets/uploads/products/Ja24.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(26, '/assets/uploads/products/Ja25.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(27, '/assets/uploads/products/Ja26.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(28, '/assets/uploads/products/Ja27.jpg', '2021-06-18 20:56:22', '2021-06-18 20:56:22'),
(29, '/assets/uploads/products/Ja28.jpg', '2021-06-18 21:31:30', '2021-06-18 21:31:30'),
(30, '/assets/uploads/products/Ja29.jpg', '2021-06-18 21:31:30', '2021-06-18 21:31:30'),
(31, '/assets/uploads/products/Ja30.jpg', '2021-06-18 21:31:30', '2021-06-18 21:31:30'),
(32, '/assets/uploads/products/Ja31.jpg', '2021-06-18 21:31:30', '2021-06-18 21:31:30'),
(33, '/assets/uploads/products/Ja32.jpg', '2021-06-18 21:31:30', '2021-06-18 21:31:30'),
(34, '/assets/uploads/products/Cr1.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(35, '/assets/uploads/products/Cr2.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(36, '/assets/uploads/products/Cr3.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(37, '/assets/uploads/products/Cr4.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(38, '/assets/uploads/products/Cr5.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(39, '/assets/uploads/products/Cr6.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(40, '/assets/uploads/products/Cr7.jpg', '2021-06-18 21:42:19', '2021-06-18 21:42:19'),
(41, '/assets/uploads/products/AN1.jpg', '2021-06-18 21:58:28', '2021-06-18 21:58:28'),
(42, '/assets/uploads/products/contorno-1.jpg', '2021-06-18 22:16:58', '2021-06-18 22:16:58'),
(43, '/assets/uploads/products/aceite-1.jpg', '2021-06-18 22:21:08', '2021-06-18 22:21:08'),
(44, '/assets/uploads/products/aceite-2.jpg', '2021-06-18 22:25:00', '2021-06-18 22:25:00'),
(45, '/assets/uploads/products/balsamo-labial-1.jpg', '2021-06-18 22:28:46', '2021-06-18 22:28:46'),
(46, '/assets/uploads/products/balsamo-labial.jpg', '2021-06-18 22:38:16', '2021-06-18 22:38:16'),
(47, '/assets/uploads/products/500x500.png', '2021-10-19 19:43:59', '2021-10-19 19:43:59');
<<<<<<< HEAD:porto.sql
=======
=======
(47, '/assets/uploads/products/gabinete-tc-army-xz10-mesh-blue.jpg', '2021-09-23 23:39:43', '2021-09-23 23:39:43'),
(48, '/assets/uploads/products/pentium-g5420.jpeg', '2021-09-23 23:43:07', '2021-09-23 23:43:07'),
(49, '/assets/uploads/products/fuente-thermaltake-550w.jpg', '2021-09-23 23:45:38', '2021-09-23 23:45:38'),
(50, '/assets/uploads/products/biostar-h310mph.jpg', '2021-09-23 23:48:12', '2021-09-23 23:48:12'),
(51, '/assets/uploads/products/netac-memoria-shadow-ddr4-2666-8gb-c19-grey.jpg', '2021-09-23 23:51:55', '2021-09-23 23:51:55'),
(52, '/assets/uploads/products/disco-ssd-240-netac.jpg', '2021-09-23 23:53:22', '2021-09-23 23:53:22'),
(53, '/assets/uploads/products/biostar-radeon-rx550-4gb.png', '2021-09-23 23:55:51', '2021-09-23 23:55:51'),
(54, '/assets/uploads/products/teclado-genius-kb100.jpg', '2021-09-24 00:02:04', '2021-09-24 00:02:04'),
(55, '/assets/uploads/products/mouse-genois-x-g200.jpg', '2021-09-24 00:03:26', '2021-09-24 00:03:26'),
(56, '/assets/uploads/products/500x500.png', '2021-09-24 00:21:21', '2021-09-24 00:21:21'),
(57, '/assets/uploads/products/conversor-hdmi-vga-activo.jpeg', '2021-09-24 00:30:08', '2021-09-24 00:30:08'),
(58, '/assets/uploads/products/intel-i3-10100f.jpeg', '2021-09-27 23:52:05', '2021-09-27 23:52:05'),
(59, '/assets/uploads/products/xpg-z1-ddr4.jpg', '2021-09-27 23:56:13', '2021-09-27 23:56:13'),
(60, '/assets/uploads/products/tax-impuesto.png', '2021-09-28 00:00:10', '2021-09-28 00:00:10'),
(61, '/assets/uploads/products/amd-athlon-3000g.jpg', '2021-11-10 00:18:04', '2021-11-10 00:18:04'),
(62, '/assets/uploads/products/biostar-b450m.jpg', '2021-11-10 00:21:40', '2021-11-10 00:21:40'),
(63, '/assets/uploads/products/fuente-evga-500w-80-plus.jpg', '2021-11-10 00:25:42', '2021-11-10 00:25:42'),
(64, '/assets/uploads/products/razer-deathadder-essential-white.png', '2021-11-26 04:24:21', '2021-11-26 04:24:21'),
(65, '/assets/uploads/products/razer-deathadder-essential-white-2.png', '2021-11-26 04:24:21', '2021-11-26 04:24:21'),
(66, '/assets/uploads/products/razer-deathadder-essential-white-3.png', '2021-11-26 04:24:21', '2021-11-26 04:24:21'),
(67, '/assets/uploads/products/razer-deathadder-essential-white-4.png', '2021-11-26 04:24:21', '2021-11-26 04:24:21'),
(68, '/assets/uploads/products/memoria-xpg-z1.png', '2021-11-26 07:16:07', '2021-11-26 07:16:07'),
(69, '/assets/uploads/products/auriculares-razer-kraken-1.png', '2021-11-26 07:35:13', '2021-11-26 07:35:13'),
(70, '/assets/uploads/products/auricualres-razer-kraken-2.png', '2021-11-26 07:35:28', '2021-11-26 07:35:28'),
(71, '/assets/uploads/products/auriculares-razer-kraken-3.png', '2021-11-26 07:35:28', '2021-11-26 07:35:28'),
(72, '/assets/uploads/products/auriculares-razer-kraken-4.png', '2021-11-26 07:35:28', '2021-11-26 07:35:28'),
(73, '/assets/uploads/products/auriculares-razer-kraken-5.png', '2021-11-26 07:35:28', '2021-11-26 07:35:28'),
(74, '/assets/uploads/products/procesador-intel-core-i3-10100f.jpg', '2021-11-26 21:13:34', '2021-11-26 21:13:34'),
(75, '/assets/uploads/products/memoria-ram-netac-1.png', '2021-11-26 21:45:39', '2021-11-26 21:45:39'),
(76, '/assets/uploads/products/memoria-ram-netac-2.png', '2021-11-26 21:45:39', '2021-11-26 21:45:39'),
(77, '/assets/uploads/products/memoria-ram-netac-3.png', '2021-11-26 21:45:39', '2021-11-26 21:45:39'),
(78, '/assets/uploads/products/procesador-intel-core-i5-9600kf.jpg', '2021-11-26 22:03:38', '2021-11-26 22:03:38'),
(79, '/assets/uploads/products/procesador-intel-core-i5-10400f.png', '2021-11-26 22:09:45', '2021-11-26 22:09:45'),
(80, '/assets/uploads/products/gabinete-xz10-blue.jpg', '2021-11-29 17:47:32', '2021-11-29 17:47:32'),
(81, '/assets/uploads/products/gabinete-xz10-blue.jpg', '2021-11-29 17:48:06', '2021-11-29 17:48:06'),
(82, '/assets/uploads/products/gabinete-xg1-white.png', '2021-11-29 17:54:05', '2021-11-29 17:54:05'),
(83, '/assets/uploads/products/xpg-memory-rgb-white.jpg', '2021-12-01 20:57:17', '2021-12-01 20:57:17'),
(84, '/assets/uploads/products/xpg-memory-rgb-white-2.jpg', '2021-12-01 20:57:23', '2021-12-01 20:57:23'),
(85, '/assets/uploads/products/xpg-memory-rgb-white-3.jpg', '2021-12-01 20:57:27', '2021-12-01 20:57:27'),
(86, '/assets/uploads/products/patriot-viper-memory-rgb.jpg', '2021-12-01 21:09:17', '2021-12-01 21:09:17'),
(87, '/assets/uploads/products/patriot-viper-memory-rgb-3.jpg', '2021-12-01 21:09:20', '2021-12-01 21:09:20'),
(88, '/assets/uploads/products/patriot-viper-memory-rgb-2.jpg', '2021-12-01 21:09:43', '2021-12-01 21:09:43'),
(89, '/assets/uploads/products/teamgroup-t-force-delta-rgb-2.jpg', '2021-12-01 22:01:40', '2021-12-01 22:01:40'),
(90, '/assets/uploads/products/teamgroup-t-force-delta-rgb-3.jpg', '2021-12-01 22:01:46', '2021-12-01 22:01:46'),
(91, '/assets/uploads/products/teamgroup-t-force-delta-rgb-4.jpg', '2021-12-01 22:01:49', '2021-12-01 22:01:49'),
(92, '/assets/uploads/products/astra-gear-memory-rgb-2.jpg', '2021-12-03 19:41:24', '2021-12-03 19:41:24'),
(93, '/assets/uploads/products/astra-gear-memory-rgb-3.jpg', '2021-12-03 19:41:28', '2021-12-03 19:41:28'),
(94, '/assets/uploads/products/gabinete-xz10-red.jpg', '2021-12-07 09:28:29', '2021-12-07 09:28:29');
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image_product`
--

CREATE TABLE `image_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `image_product`
--

INSERT INTO `image_product` (`id`, `product_id`, `image_id`) VALUES
<<<<<<< HEAD:porto.sql
=======
<<<<<<< HEAD:porto.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql
(87, 3, 3),
(88, 4, 4),
(89, 5, 5),
(90, 7, 6),
(91, 8, 7),
(92, 9, 8),
(93, 10, 9),
(94, 11, 10),
(95, 2, 2),
(96, 12, 11),
(97, 13, 12),
(98, 14, 13),
(99, 15, 14),
(100, 16, 15),
(101, 17, 16),
(102, 18, 17),
(103, 19, 19),
(104, 20, 18),
(105, 21, 20),
(106, 22, 21),
(107, 23, 22),
(108, 24, 23),
(110, 26, 25),
(111, 27, 26),
(112, 28, 28),
(113, 29, 27),
(114, 30, 29),
(115, 31, 30),
(116, 32, 31),
(117, 33, 32),
(118, 34, 33),
(119, 35, 34),
(120, 36, 34),
(121, 37, 35),
(123, 39, 36),
(124, 40, 36),
(125, 41, 37),
(126, 42, 37),
(128, 44, 38),
(129, 45, 39),
(130, 46, 39),
(131, 47, 40),
(132, 48, 40),
(133, 49, 41),
(134, 50, 41),
(135, 52, 43),
(136, 53, 43),
(137, 54, 43),
(138, 55, 44),
(139, 56, 44),
(140, 43, 38),
(141, 25, 24),
(144, 51, 42),
(145, 57, 46),
(146, 1, 1),
(147, 38, 35),
(148, 60, 47);
<<<<<<< HEAD:porto.sql
=======
=======
(266, 9, 54),
(267, 10, 55),
(269, 12, 56),
(270, 13, 56),
(274, 59, 57),
(281, 11, 56),
(309, 20, 80),
(310, 21, 80),
(314, 67, 80),
(316, 68, 82),
(317, 22, 80),
(318, 1, 47),
(319, 2, 48),
(320, 3, 49),
(321, 4, 50),
(322, 5, 51),
(323, 7, 52),
(324, 8, 53),
(325, 14, 61),
(326, 15, 62),
(327, 16, 63),
(329, 60, 58),
(331, 62, 60),
(342, 28, 79),
(343, 25, 74),
(344, 63, 84),
(345, 63, 85),
(346, 17, 64),
(347, 17, 65),
(348, 17, 66),
(349, 17, 67),
(350, 18, 82),
(351, 19, 82),
(352, 23, 68),
(358, 24, 69),
(359, 24, 70),
(360, 24, 71),
(361, 24, 72),
(362, 24, 73),
(363, 26, 75),
(364, 26, 76),
(365, 26, 77),
(366, 27, 78),
(367, 61, 59),
(368, 64, 87),
(369, 64, 88),
(370, 65, 89),
(371, 65, 90),
(372, 65, 91),
(373, 66, 92),
(374, 66, 93),
(376, 69, 94),
(377, 70, 94),
(379, 71, 94),
(381, 72, 94);
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inbox`
--

CREATE TABLE `inbox` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `sub_total` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `debt` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `provider_id`, `payment_type_id`, `date`, `sub_total`, `total_amount`, `debt`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-09-22', 236, 236, 0, 10, '2021-09-24 00:15:56', '2021-09-24 00:15:56'),
(2, 2, 1, '2021-09-22', 414, 414, 0, 10, '2021-09-24 00:17:13', '2021-09-24 00:17:13'),
(3, 3, 1, '2021-09-25', 178, 178, 0, 10, '2021-09-28 00:01:29', '2021-09-28 00:01:29'),
(4, 1, 1, '2021-11-06', 140, 140, 0, 10, '2021-11-10 00:19:10', '2021-11-10 00:19:10'),
(5, 2, 1, '2021-11-06', 210, 210, 0, 10, '2021-11-10 00:27:11', '2021-11-10 00:27:11'),
(6, 3, 1, '2021-11-28', 204, 204, 0, 10, '2021-11-29 18:07:19', '2021-11-29 18:07:19'),
(7, 3, 1, '2021-12-02', 244, 244, 0, 10, '2021-12-06 19:32:34', '2021-12-06 19:32:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_product`
--

CREATE TABLE `invoice_product` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invoice_product`
--

INSERT INTO `invoice_product` (`id`, `invoice_id`, `product_id`, `unit_price`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, 1, 50, '2021-09-24 00:15:56', '2021-09-24 00:15:56'),
(2, 1, 2, 95, 1, 95, '2021-09-24 00:15:56', '2021-09-24 00:15:56'),
(3, 1, 4, 75, 1, 75, '2021-09-24 00:15:56', '2021-09-24 00:15:56'),
(4, 1, 9, 9, 1, 9, '2021-09-24 00:15:56', '2021-09-24 00:15:56'),
(5, 1, 10, 7, 1, 7, '2021-09-24 00:15:56', '2021-09-24 00:15:56'),
(6, 2, 3, 58, 1, 58, '2021-09-24 00:17:13', '2021-09-24 00:17:13'),
(7, 2, 5, 48, 2, 96, '2021-09-24 00:17:13', '2021-09-24 00:17:13'),
(8, 2, 7, 40, 1, 40, '2021-09-24 00:17:13', '2021-09-24 00:17:13'),
(9, 2, 8, 220, 1, 220, '2021-09-24 00:17:13', '2021-09-24 00:17:13'),
(10, 3, 60, 99, 1, 99, '2021-09-28 00:01:29', '2021-09-28 00:01:29'),
(11, 3, 61, 53, 1, 53, '2021-09-28 00:01:29', '2021-09-28 00:01:29'),
(12, 3, 62, 26, 1, 41, '2021-09-28 00:01:29', '2021-09-28 00:01:29'),
(13, 4, 1, 50, 1, 50, '2021-11-10 00:19:10', '2021-11-10 00:19:10'),
(14, 4, 14, 90, 1, 90, '2021-11-10 00:19:10', '2021-11-10 00:19:10'),
(15, 5, 15, 108, 1, 108, '2021-11-10 00:27:11', '2021-11-10 00:27:11'),
(16, 5, 7, 39, 1, 39, '2021-11-10 00:27:11', '2021-11-10 00:27:11'),
(17, 5, 16, 63, 1, 63, '2021-11-10 00:27:11', '2021-11-10 00:27:11'),
(18, 6, 17, 20, 5, 100, '2021-11-29 18:07:19', '2021-11-29 18:07:19'),
(19, 6, 61, 50, 1, 50, '2021-11-29 18:07:19', '2021-11-29 18:07:19'),
(20, 6, 62, 54, 1, 54, '2021-11-29 18:07:19', '2021-11-29 18:07:19'),
(21, 7, 65, 33, 4, 132, '2021-12-06 19:32:34', '2021-12-06 19:32:34'),
(22, 7, 66, 30, 2, 60, '2021-12-06 19:32:34', '2021-12-06 19:32:34'),
(23, 7, 62, 52, 1, 52, '2021-12-06 19:32:34', '2021-12-06 19:32:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `dto` int(2) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `sold` tinyint(1) DEFAULT 0,
  `canasta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`canasta`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `order_id`, `product_id`, `unit_price`, `dto`, `quantity`, `amount`, `sold`, `created_at`, `updated_at`, `deleted_at`) VALUES
<<<<<<< HEAD:porto.sql
(1, 1, 60, 600, 0, 1, 600, 0, '2021-10-19 21:57:00', '2021-10-19 21:57:00', NULL),
(2, 2, 60, 600, 0, 1, 600, 0, '2021-10-19 22:38:50', '2021-10-19 22:38:50', NULL),
(3, 2, 1, 120, 0, 1, 120, 0, '2021-10-19 22:38:50', '2021-10-19 22:38:50', NULL),
(4, 3, 60, 600, 0, 1, 600, 0, '2021-12-21 19:23:35', '2021-12-21 19:23:35', NULL),
(5, 4, 60, 600, 0, 1, 600, 0, '2022-01-10 19:03:42', '2022-01-10 19:03:42', NULL),
(6, 5, 60, 600, 0, 1, 600, 0, '2022-01-10 19:08:20', '2022-01-10 19:08:20', NULL),
(7, 5, 1, 120, 0, 1, 120, 0, '2022-01-10 19:08:20', '2022-01-10 19:08:20', NULL);
=======
(1, 1, 11, 810, 0, 1, 810, 0, '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(2, 1, 12, 25, 0, 1, 25, 0, '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(3, 1, 9, 10, 0, 1, 10, 0, '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(4, 1, 10, 8, 0, 1, 8, 0, '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(5, 1, 59, 14, 0, 1, 14, 0, '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(6, 2, 13, 625, 0, 1, 625, 0, '2021-10-14 01:36:51', '2021-10-14 01:36:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ger.cs28@gmail.com', '2021-12-07 20:30:55', '2021-12-07 20:30:55', NULL);
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `image` varchar(230) DEFAULT NULL,
  `message` varchar(235) NOT NULL,
  `icon` varchar(75) NOT NULL,
  `path` varchar(125) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notifications`
--

INSERT INTO `notifications` (`id`, `image`, `message`, `icon`, `path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/assets/uploads/products/REkVJKEP-gabinete-tc-army-xz10-mesh-blue.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/1', '2021-09-24 00:15:56', '2021-09-24 00:15:56', NULL),
(2, '/assets/uploads/products/NlrZ3gU8-pentium-g5420.jpeg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/2', '2021-09-24 00:15:56', '2021-09-24 00:15:56', NULL),
(3, '/assets/uploads/products/v6RzhZ75-biostar-h310mph.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/4', '2021-09-24 00:15:56', '2021-09-24 00:15:56', NULL),
(4, '/assets/uploads/products/UsTrB2Xh-teclado-genius-kb100.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/9', '2021-09-24 00:15:56', '2021-09-24 00:15:56', NULL),
(5, '/assets/uploads/products/nZjKbflO-mouse-genois-x-g200.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/10', '2021-09-24 00:15:56', '2021-09-24 00:15:56', NULL),
(6, '/assets/uploads/products/vkGlXPAn-fuente-thermaltake-550w.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/3', '2021-09-24 00:17:13', '2021-09-24 00:17:13', NULL),
(7, '/assets/uploads/products/pjXQBT3z-netac-memoria-shadow-ddr4-2666-8gb-c19-grey.jpg', 'Se agregó stock <strong>(2)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/5', '2021-09-24 00:17:13', '2021-09-24 00:17:13', NULL),
(8, '/assets/uploads/products/pII1LGuo-disco-ssd-240-netac.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/7', '2021-09-24 00:17:13', '2021-09-24 00:17:13', NULL),
(9, '/assets/uploads/products/oaHdX98K-biostar-radeon-rx550-4gb.png', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/8', '2021-09-24 00:17:13', '2021-09-24 00:17:13', NULL),
(10, '/assets/uploads/products/6tYLF9gQ-500x500.png', 'Sin stock.', 'fa fa-warning text-red', '/admin/product/show/11', '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(11, '/assets/uploads/products/yY8dZQJr-500x500.png', 'Sin stock.', 'fa fa-warning text-red', '/admin/product/show/12', '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(12, '/assets/uploads/products/UsTrB2Xh-teclado-genius-kb100.jpg', 'Sin stock.', 'fa fa-warning text-red', '/admin/product/show/9', '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(13, '/assets/uploads/products/nZjKbflO-mouse-genois-x-g200.jpg', 'Sin stock.', 'fa fa-warning text-red', '/admin/product/show/10', '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(14, '/assets/uploads/products/8OlbGZzw-conversor-hdmi-vga-activo.jpeg', 'Sin stock.', 'fa fa-warning text-red', '/admin/product/show/59', '2021-09-24 00:35:18', '2021-09-24 00:35:18', NULL),
(15, '/assets/uploads/products/E3qf46hZ-intel-i3-10100f.jpeg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/60', '2021-09-28 00:01:29', '2021-09-28 00:01:29', NULL),
(16, '/assets/uploads/products/0Z4ZOpGc-xpg-z1-ddr4.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/61', '2021-09-28 00:01:29', '2021-09-28 00:01:29', NULL),
(17, '/assets/uploads/products/2Iha1fPs-tax-impuesto.png', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/62', '2021-09-28 00:01:29', '2021-09-28 00:01:29', NULL),
(18, '/assets/uploads/products/X5ZrHylI-500x500.png', 'Sin stock.', 'fa fa-warning text-red', '/admin/product/show/13', '2021-10-14 01:36:51', '2021-10-14 01:36:51', NULL),
(19, '/assets/uploads/products/REkVJKEP-gabinete-tc-army-xz10-mesh-blue.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/1', '2021-11-10 00:19:10', '2021-11-10 00:19:10', NULL),
(20, '/assets/uploads/products/sg75eBU0-amd-athlon-3000g.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/14', '2021-11-10 00:19:10', '2021-11-10 00:19:10', NULL),
(21, '/assets/uploads/products/XuAb4HTh-biostar-b450m.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/15', '2021-11-10 00:27:11', '2021-11-10 00:27:11', NULL),
(22, '/assets/uploads/products/pII1LGuo-disco-ssd-240-netac.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/7', '2021-11-10 00:27:11', '2021-11-10 00:27:11', NULL),
(23, '/assets/uploads/products/hWOk7HoF-fuente-evga-500w-80-plus.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/16', '2021-11-10 00:27:11', '2021-11-10 00:27:11', NULL),
(24, '/assets/uploads/products/lBa5BtDj-razer-deathadder-essential-white.png', 'Se agregó stock <strong>(5)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/17', '2021-11-29 18:07:19', '2021-11-29 18:07:19', NULL),
(25, '/assets/uploads/products/0Z4ZOpGc-xpg-z1-ddr4.jpg', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/61', '2021-11-29 18:07:19', '2021-11-29 18:07:19', NULL),
(26, '/assets/uploads/products/2Iha1fPs-tax-impuesto.png', 'Se agregó stock <strong>(1)</strong>', 'fa fa-check-circle text-green', '/admin/product/show/62', '2021-11-29 18:07:19', '2021-11-29 18:07:19', NULL),
(27, '/assets/uploads/products/lBa5BtDj-razer-deathadder-essential-white.png', 'A alguien le gustó.', 'fa fa-heart-o text-red', '/product/show/mouse-razer-deathadder-essential-white', '2021-12-01 19:06:56', '2021-12-01 19:06:56', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `shipping_method_id` int(11) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `preference_id` varchar(255) DEFAULT NULL,
  `mercadopago_payment_id` int(11) DEFAULT NULL,
  `mercadopago_merchant_order_id` varchar(255) DEFAULT NULL,
  `redelocker_location_id` int(11) DEFAULT NULL,
  `full_name` varchar(125) NOT NULL,
  `need_shipping` tinyint(1) NOT NULL,
  `shipping_city` varchar(70) DEFAULT NULL,
  `shipping_location` varchar(70) DEFAULT NULL,
  `shipping_address` varchar(75) DEFAULT NULL,
  `shipping_zipcode` varchar(15) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `cellphone` varchar(35) DEFAULT NULL,
  `shipping_cost` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `dto` int(11) NOT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `note` varchar(75) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orders`
--

<<<<<<< HEAD:porto.sql
INSERT INTO `orders` (`id`, `user_id`, `status_id`, `shipping_method_id`, `payment_method_id`, `preference_id`, `mercadopago_payment_id`, `mercadopago_merchant_order_id`, `redelocker_location_id`, `full_name`, `need_shipping`, `shipping_city`, `shipping_location`, `shipping_address`, `shipping_zipcode`, `phone`, `cellphone`, `shipping_cost`, `sub_total`, `dto`, `total_amount`, `note`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 3, 4, 2, '19482779-a6a39c63-5619-40af-9468-84e13e2ac4a7', NULL, NULL, NULL, 'Sevencrows 123', 0, 'Montevideo', '123', '123', '123', '123', NULL, 180, 600, 0, 780, NULL, '2021-10-19 21:57:00', '2021-10-19 22:38:30', NULL),
(2, 1, 1, 3, 2, '19482779-4abe34df-1368-4f84-8b4d-a89d423f34d0', NULL, NULL, NULL, 'Sevencrows 123', 1, 'Montevideo', '123', '123', '213', '123', NULL, 0, 720, 0, 720, NULL, '2021-10-19 22:38:50', '2021-10-19 23:03:03', NULL),
(3, 2, 3, 3, 2, '19482779-5a4e5be2-9d4d-4de1-beab-f9df0e815c6f', NULL, NULL, NULL, 'Administrador 123', 1, 'Montevideo', '123', ' 123', '123', '123', NULL, 0, 600, 0, 600, NULL, '2021-12-21 19:23:35', '2022-01-10 19:02:42', NULL),
(4, 2, 3, 3, 2, '19482779-2986bbae-7c22-4b99-80e6-56d0e1223025', NULL, NULL, NULL, 'Administrador asd', 1, 'Montevideo', 'asd', ' asd', '123', '000000000', NULL, 0, 600, 0, 600, NULL, '2022-01-10 19:03:42', '2022-01-10 19:05:58', NULL),
(5, 2, 1, 3, 2, '19482779-d0b8dddd-34ea-47fd-91bd-b84d1827f926', NULL, NULL, NULL, 'Administrador asd', 1, 'Montevideo', 'Centro', 'Street H.', '1234', '000000000', NULL, 0, 720, 0, 720, NULL, '2022-01-10 19:08:20', '2022-01-10 19:08:58', NULL);
=======
INSERT INTO `orders` (`id`, `user_id`, `status_id`, `shipping_method_id`, `payment_method_id`, `preference_id`, `mercadopago_payment_id`, `mercadopago_merchant_order_id`, `redelocker_location_id`, `full_name`, `need_shipping`, `shipping_city`, `shipping_location`, `shipping_address`, `shipping_zipcode`, `phone`, `cellphone`, `shipping_cost`, `sub_total`, `dto`, `total_amount`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 10, 2, 1, NULL, NULL, NULL, NULL, 'Teto', 1, 'Montevideo', 'Cerro', '-', NULL, '098 036 899', '098 036 899', 0, 867, 0, 867, '2021-09-23 19:35:18', '2021-09-28 00:04:26', NULL),
(2, 3, 10, 2, 1, NULL, NULL, NULL, NULL, 'Jona', 1, 'Montevideo', 'Montevideo', '-', NULL, '098 225 871', '098 225 871', 0, 625, 0, 625, '2021-10-13 20:40:51', '2021-11-10 00:27:53', NULL);
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `token` varchar(85) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `debt` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(125) NOT NULL,
  `tax` int(11) NOT NULL,
  `public_key` varchar(255) DEFAULT NULL,
  `private_key` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `payment_method`
--

INSERT INTO `payment_method` (`id`, `name`, `description`, `tax`, `public_key`, `private_key`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Contrareembolso', 'Pagas al momento de ir a buscar o recibir tu pedido', 0, NULL, NULL, '2020-10-20 03:00:00', '2020-10-20 03:00:00', NULL),
<<<<<<< HEAD:porto.sql
(2, 'MercadoPago', 'Realizá el pago Online con tarjetas de débito/crédito', 0, NULL, NULL, '2020-10-20 03:00:00', '2020-10-20 03:00:00', NULL);
=======
(2, 'MercadoPago', 'Realizá el pago Online con tarjetas de débito/crédito', 0, NULL, NULL, '2020-10-20 03:00:00', '2020-10-20 03:00:00', '2021-12-06 15:50:59');
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_type`
--

CREATE TABLE `payment_type` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `payment_type`
--

INSERT INTO `payment_type` (`id`, `name`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de crédito'),
(3, 'Crédito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name_of_the_plan` varchar(45) NOT NULL,
  `quantity_of_products` int(11) NOT NULL,
  `quantity_of_categories` int(11) NOT NULL,
  `banner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plans`
--

INSERT INTO `plans` (`id`, `name_of_the_plan`, `quantity_of_products`, `quantity_of_categories`, `banner`) VALUES
(1, 'starter', 50, 10, 1),
(2, 'basic', 90, 20, 1),
(3, 'advanced', 150, 30, 3),
(4, 'premium', 300, 50, 5),
(5, 'custom', 999, 999, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(75) NOT NULL,
  `slug` varchar(125) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(125) DEFAULT NULL,
  `embedded_content` varchar(1024) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `product_id`, `title`, `slug`, `description`, `image`, `embedded_content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Noticia de prueba', 'noticia-de-prueba', '<p><div><div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam voluptate recusandae explicabo dolorum minima ut magni dolore rerum reprehenderit placeat, maxime molestias provident voluptatibus dolores repellat nihil, veritatis sequi? Quo, ipsa id!</div></div></p>', '/assets/uploads/posts/miu0G5mf-500x500.png', NULL, '2021-09-28 02:05:02', '2021-09-28 02:10:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_users`
--

CREATE TABLE `posts_users` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `slug` varchar(125) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(70) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `brand` varchar(75) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_final` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `offer` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_delay` int(11) DEFAULT 0,
  `tags` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT NULL,
  `stock_alert` int(11) DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `product_type_id`, `slug`, `category_id`, `name`, `description`, `brand`, `price`, `price_final`, `stock`, `offer`, `image`, `is_featured`, `delivery_delay`, `tags`, `created_at`, `updated_at`, `is_deleted`, `stock_alert`) VALUES
<<<<<<< HEAD:porto.sql
=======
<<<<<<< HEAD:porto.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql
(1, 3, 'jabon-de-lavanda-90grs', 2, 'Jabón de Lavanda 90grs', 'Desestresante. Relajante muscular', 'prueba', 120, 120, 5, 0, '/assets/uploads/products/XPnNLAQI-jabon_lavanda.jpg', 0, 0, NULL, '2021-03-06 05:17:52', '2021-10-09 21:43:11', NULL, 5),
(2, 3, 'jabon-de-magnesio-90grs', 2, 'Jabón de Magnesio 90grs', 'Dolores óseos y musculares. Antiinflamatorio', '', 120, 120, 0, 0, '/assets/uploads/products/obTa6UT4-jabon_magnesio.jpg', 0, 0, NULL, '2021-03-06 05:19:29', '2021-09-15 21:08:52', NULL, 5),
(3, 3, 'jabon-de-coco-90grs', 2, 'Jabón de Coco 90grs', 'Piel suave e hidratada. Antiage', '', 120, 120, 0, 0, '/assets/uploads/products/sr4QgQOO-jabon_coco.jpg', 0, 0, NULL, '2021-03-06 05:20:57', '2021-09-15 21:12:40', NULL, 5),
(4, 3, 'jabon-de-bicarbonato-de-sodio-90grs', 2, 'Jabón de Bicarbonato de Sodio 90grs', 'Regula el PH. Neutraliza olores. Exfoliante', '', 120, 120, 0, 0, '/assets/uploads/products/rcX3t93p-jabon_bicarbonato_de_sodio.jpg', 0, 0, NULL, '2021-03-06 05:23:24', '2021-08-12 04:18:47', NULL, 5),
(5, 3, 'jabon-de-centella-asiatica-90grs', 2, 'Jabón de Centella Asiática 90grs', 'Anticelulitis', '', 120, 120, 0, 0, '/assets/uploads/products/3WttFeuS-jabon_centella_asiatica.jpg', 0, 0, NULL, '2021-03-06 05:25:57', '2021-06-22 16:57:02', NULL, 5),
(7, 3, 'jabon-de-espirulina-90grs', 2, 'Jabón de Espirulina 90grs', 'Remineralizante y depurativo', '', 120, 120, 0, 0, '/assets/uploads/products/JpP8Xbwf-Ja1.jpg', 0, 0, NULL, '2021-06-18 20:52:44', '2021-06-22 16:57:11', NULL, 5),
(8, 3, 'jabon-de-jengibre-90grs', 2, 'Jabón de Jengibre 90grs', 'Antiage y antiinflamatorio', '', 120, 120, 0, 0, '/assets/uploads/products/1TXGbxqZ-Ja2.jpg', 0, 0, NULL, '2021-06-18 20:54:02', '2021-06-22 16:57:20', NULL, 5),
(9, 3, 'jabon-de-naranja-90grs', 2, 'Jabón de Naranja 90grs', 'Revitaliza y refresca', '', 120, 120, 0, 0, '/assets/uploads/products/oaE2GJHm-Ja3.jpg', 0, 0, NULL, '2021-06-18 20:54:57', '2021-06-22 16:57:25', NULL, 5),
(10, 3, 'jabon-de-avena-90grs', 2, 'Jabón de Avena 90grs', 'Piel suave y protegida', '', 120, 120, 0, 0, '/assets/uploads/products/JHc2Ee1X-Ja4.jpg', 0, 0, NULL, '2021-06-18 20:57:15', '2021-06-22 16:57:31', NULL, 5),
(11, 3, 'jabon-de-moringa-90grs', 2, 'Jabón de Moringa 90grs', 'Reafirma y mejora la piel', '', 120, 120, 0, 0, '/assets/uploads/products/SBmEvz6Q-Ja5.jpg', 0, 0, NULL, '2021-06-18 20:58:56', '2021-06-22 16:57:42', NULL, 5),
(12, 3, 'jabon-de-rosa-mosqueta-90grs', 2, 'Jabón de Rosa Mosqueta 90grs', 'Hidratación profunda. Cicatrices, estrías y arrugas', '', 120, 120, 0, 0, '/assets/uploads/products/s2mT8dh9-Ja7.jpg', 0, 0, NULL, '2021-06-18 20:59:46', '2021-06-22 16:57:55', NULL, 5),
(13, 3, 'jabon-de-eucalipto-90grs', 2, 'Jabón de Eucalipto 90grs', 'Balsámico, antiviral y relajante', '', 120, 120, 0, 0, '/assets/uploads/products/yeLNUqM2-Ja8.jpg', 0, 0, NULL, '2021-06-18 21:01:22', '2021-06-22 16:58:03', NULL, 5),
(14, 3, 'jabon-de-calendula-90grs', 2, 'Jabón de Caléndula 90grs', 'Regenerativa. Hidratante. Piel sensible', '', 120, 120, 0, 0, '/assets/uploads/products/hH7KJRfQ-Ja9.jpg', 0, 0, NULL, '2021-06-18 21:09:34', '2021-06-22 16:58:13', NULL, 5),
(15, 3, 'jabon-de-perilla-90grs', 2, 'Jabón de Perilla 90grs', 'Alergias. Dermatitis', '', 120, 120, 0, 0, '/assets/uploads/products/LsTYgUkS-Ja13.jpg', 0, 0, NULL, '2021-06-18 21:10:49', '2021-06-22 16:58:39', NULL, 5),
(16, 3, 'jabon-de-carbon-activado-90grs', 2, 'Jabón de Carbón Activado', 'Limpieza profunda. Pieles grasas', '', 120, 120, 0, 0, '/assets/uploads/products/EhKq3aQA-Ja14.jpg', 0, 0, NULL, '2021-06-18 21:15:53', '2021-08-12 04:12:29', NULL, 5),
(17, 3, 'jabon-de-azufre-90grs', 2, 'Jabón de Azufre 90grs', 'Desinfectante. Hongos. Acné', '', 120, 120, 0, 0, '/assets/uploads/products/wlDH8vNt-Ja15.jpg', 0, 0, NULL, '2021-06-18 21:17:28', '2021-06-22 16:58:51', NULL, 5),
(18, 3, 'jabon-de-afrecho-90grs', 2, 'Jabón de Afrecho 90grs', 'Exfolia, limpia y suaviza', '', 120, 120, 0, 0, '/assets/uploads/products/ILrSpGU1-Ja16.jpg', 0, 0, NULL, '2021-06-18 21:18:21', '2021-06-22 16:58:57', NULL, 5),
(19, 3, 'jabon-de-ruda-90grs', 2, 'Jabón de Ruda 90grs', 'Limpieza y protección energética', '', 120, 120, 0, 0, '/assets/uploads/products/MXznXmy9-Ja18.jpg', 0, 0, NULL, '2021-06-18 21:19:37', '2021-06-22 16:59:04', NULL, 5),
(20, 3, 'jabon-de-palan-palan-90grs', 2, 'Jabón de Palán Palán 90grs', 'Cicatrizante. Llagas y heridas', '', 120, 120, 0, 0, '/assets/uploads/products/yRkTE3YX-Ja17.jpg', 0, 0, NULL, '2021-06-18 21:20:34', '2021-06-22 16:59:10', NULL, 5),
(21, 3, 'jabon-de-cannabis-90grs', 2, 'Jabón de Cannabis 90grs', 'Antiinflamatorio. Regenerador de tejidos', '', 120, 120, 0, 0, '/assets/uploads/products/tzm6woXL-Ja19.jpg', 0, 0, NULL, '2021-06-18 21:21:18', '2021-08-12 04:12:53', NULL, 5),
(22, 3, 'jabon-de-miel-90grs', 2, 'Jabón de Miel 90grs', 'Antibactericida. Antibiótico. Hidratante', '', 120, 120, 0, 0, '/assets/uploads/products/fVvZrOLU-Ja20.jpg', 0, 0, NULL, '2021-06-18 21:22:27', '2021-06-22 16:59:27', NULL, 5),
(23, 3, 'jabon-de-perejil-90grs', 2, 'Jabón de Perejil 90grs', 'Elimina manchas', '', 120, 120, 0, 0, '/assets/uploads/products/KMUrjylX-Ja21.jpg', 0, 0, NULL, '2021-06-18 21:23:27', '2021-06-22 16:59:34', NULL, 5),
(24, 3, 'jabon-de-violeta-90grs', 2, 'Jabón de Violeta 90grs', 'Antioxidante. Antiséptico. Curativo', '', 120, 120, 0, 0, '/assets/uploads/products/soEVJfoS-Ja22.jpg', 0, 0, NULL, '2021-06-18 21:24:09', '2021-06-22 16:59:41', NULL, 5),
(25, 3, 'jabon-de-vainilla-90grs', 2, 'Jabón de Vainilla', 'Reconstituyente. Nutritivo. Humectante', '', 120, 120, 0, 0, '/assets/uploads/products/75dmQCpE-Ja23.jpg', 0, 0, NULL, '2021-06-18 21:24:53', '2021-06-24 23:42:19', NULL, 5),
(26, 3, 'jabon-de-menta-90grs', 2, 'Jabón de Menta 90grs', 'Descongestivo. Relajante. Bactericida.', '', 120, 120, 0, 0, '/assets/uploads/products/W6wcfuc9-Ja24.jpg', 0, 0, NULL, '2021-06-18 21:25:30', '2021-06-22 16:59:53', NULL, 5),
(27, 3, 'jabon-de-hibisco-90grs', 2, 'Jabón de Hibisco 90grs', 'Rejuvenecedor. Antioxidante. Reafirmante', '', 120, 120, 0, 0, '/assets/uploads/products/eqpjYdgA-Ja25.jpg', 0, 0, NULL, '2021-06-18 21:28:38', '2021-08-12 04:19:55', NULL, 5),
(28, 3, 'jabon-de-pachuli-90grs', 2, 'Jabón de Pachuli 90grs', 'Estrés, Ansiedad. Estimulante sexual', '', 120, 120, 0, 0, '/assets/uploads/products/NMbpcQrg-Ja27.jpg', 0, 0, NULL, '2021-06-18 21:29:48', '2021-06-22 17:00:08', NULL, 5),
(29, 3, 'jabon-de-ortiga-90grs', 2, 'Jabón de Ortiga 90grs', 'Urticarias, dermatitis. Desinflamante', '', 120, 120, 0, 0, '/assets/uploads/products/Ghe1SU4V-Ja26.jpg', 0, 0, NULL, '2021-06-18 21:31:00', '2021-06-22 17:00:22', NULL, 5),
(30, 3, 'jabon-de-arnica-90grs', 2, 'Jabón de Árnica 90grs', 'Analgésico. Golpe, torceduras, lesiones', '', 120, 120, 0, 0, '/assets/uploads/products/m9gyxDB9-Ja28.jpg', 0, 0, NULL, '2021-06-18 21:32:06', '2021-06-22 17:00:33', NULL, 5),
(31, 3, 'jabon-de-romero-90grs', 2, 'Jabón de Romero 90grs', 'Energizante. Elasticidad y firmeza', '', 120, 120, 0, 0, '/assets/uploads/products/RLpCz3EE-Ja29.jpg', 0, 0, NULL, '2021-06-18 21:32:49', '2021-06-22 17:00:41', NULL, 5),
(32, 3, 'jabon-de-curcuma-90grs', 2, 'Jabón de Cúrcuma 90grs', 'Antioxidante, exfoliante, cicatrizante', '', 120, 120, 0, 0, '/assets/uploads/products/dT92lDfx-Ja30.jpg', 0, 0, NULL, '2021-06-18 21:34:04', '2021-06-22 17:00:48', NULL, 5),
(33, 3, 'jabon-de-urucum-90grs', 2, 'Jabón de Urucum 90grs', 'Hidratación profunda, bronceador perfecto', '', 120, 120, 0, 0, '/assets/uploads/products/RxXOhplw-Ja31.jpg', 0, 0, NULL, '2021-06-18 21:34:52', '2021-06-22 17:00:55', NULL, 5),
(34, 3, 'jabon-de-manzanilla-90grs', 2, 'Jabón de Manzanilla 90grs', 'Piel sensible, antiinflamatoria, descongestiva', '', 120, 120, 0, 0, '/assets/uploads/products/Qb2igUcm-Ja32.jpg', 0, 0, NULL, '2021-06-18 21:35:34', '2021-06-22 17:01:03', NULL, 5),
(35, 1, 'crema-de-cannabis-50grs', 6, 'Crema de Cannabis 50grs', 'Alivia dolores', '', 350, 350, 0, 0, '/assets/uploads/products/FKkAVaER-Cr1.jpg', 0, 0, NULL, '2021-06-18 21:43:09', '2021-08-12 04:12:14', NULL, 5),
(36, 1, 'crema-de-cannabis-100grs', 6, 'Crema de Cannabis 100grs', 'Alivia dolores', '', 600, 600, 0, 0, '/assets/uploads/products/SlakS8uf-Cr1.jpg', 0, 0, NULL, '2021-06-18 21:44:15', '2021-06-22 17:01:22', NULL, 5),
(37, 1, 'crema-antialergica-50grs', 6, 'Crema Antialérgica 50grs', 'Perilla y ortiga', '', 300, 300, 0, 0, '/assets/uploads/products/Cf28GbMu-Cr2.jpg', 0, 0, NULL, '2021-06-18 21:46:13', '2021-06-22 17:01:31', NULL, 5),
(38, 1, 'crema-antialergica-100grs', 6, 'Crema Antialérgica 100grs', 'Perilla y ortiga', '', 550, 550, 5, 0, '/assets/uploads/products/OSS9Y6Ne-Cr2.jpg', 0, 0, NULL, '2021-06-18 21:46:49', '2021-10-09 21:43:19', NULL, 5),
(39, 1, 'crema-varices-50grs', 6, 'Crema Várices 50grs', 'Hamamelis', '', 300, 300, 0, 0, '/assets/uploads/products/Tx3dZplo-Cr3.jpg', 0, 0, NULL, '2021-06-18 21:47:32', '2021-08-12 04:12:48', NULL, 5),
(40, 1, 'crema-varices-100grs', 6, 'Crema Várices 100grs', 'Hamamelis', '', 550, 550, 0, 0, '/assets/uploads/products/A3d09U1i-Cr3.jpg', 0, 0, NULL, '2021-06-18 21:48:29', '2021-06-22 17:01:56', NULL, 5),
(41, 1, 'crema-antiinflamatoria-50grs', 6, 'Crema Antiinflamatoria 50grs', 'Árnica y romero', '', 300, 300, 0, 0, '/assets/uploads/products/qlcpAUHv-Cr4.jpg', 0, 0, NULL, '2021-06-18 21:49:34', '2021-06-22 17:02:05', NULL, 5),
(42, 1, 'crema-antiinflamatoria-100grs', 6, 'Crema Antiinflamatoria 100grs', 'Árnica y romero', '', 550, 550, 0, 0, '/assets/uploads/products/9TxxuwQn-Cr4.jpg', 0, 0, NULL, '2021-06-18 21:50:26', '2021-06-22 17:02:23', NULL, 5),
(43, 1, 'crema-hidratante-hibisco-y-rosa-mosqueta-50grs', 6, 'Crema Hidratante 50grs', 'Hibisco y Rosa mosqueta', '', 300, 300, 0, 0, '/assets/uploads/products/BHkdkot9-Cr5.jpg', 0, 0, NULL, '2021-06-18 21:51:14', '2021-06-22 17:34:47', NULL, 5),
(44, 1, 'crema-hidratante-hibisco-y-rosa-mosqueta-100grs', 6, 'Crema Hidratante 100grs', 'Hibisco y Rosa mosqueta', '', 550, 550, 0, 0, '/assets/uploads/products/ZfZJRqvs-Cr5.jpg', 0, 0, NULL, '2021-06-18 21:51:49', '2021-08-12 04:12:19', NULL, 5),
(45, 1, 'crema-antihongos-50grs', 6, 'Crema Antihongos 50grs', 'Azufre y Tea Tree', '', 300, 300, 0, 0, '/assets/uploads/products/dsCEbVDF-Cr6.jpg', 0, 0, NULL, '2021-06-18 21:52:32', '2021-06-22 17:02:53', NULL, 5),
(46, 1, 'crema-antihongos-100grs', 6, 'Crema Antihongos 100grs', 'Azufre y Tea Tree', '', 550, 550, 0, 0, '/assets/uploads/products/4QRBuyvk-Cr6.jpg', 0, 0, NULL, '2021-06-18 21:53:12', '2021-08-12 04:13:19', NULL, 5),
(47, 1, 'crema-hidratante-calendula-y-vitamina-e-50grs', 6, 'Crema Hidratante 50grs', 'Calèndula y Vitamina E', '', 300, 300, 0, 0, '/assets/uploads/products/etZuy89h-Cr7.jpg', 0, 0, NULL, '2021-06-18 21:54:45', '2021-06-22 17:03:16', NULL, 5),
(48, 1, 'crema-hidratante-calendula-y-vitamina-e-100grs', 6, 'Crema Hidratante 100grs', '*Borre ésto e ingrese la descripción del producto*', '', 550, 550, 0, 0, '/assets/uploads/products/wq75oX2W-Cr7.jpg', 0, 0, NULL, '2021-06-18 21:55:20', '2021-06-22 17:03:22', NULL, 5),
(49, 6, 'ansiolitico-natural-30ml', 3, 'Ansiolítico natural 30ml', 'Uso interno', '', 270, 270, 0, 0, '/assets/uploads/products/XEUHo1cj-AN1.jpg', 0, 0, NULL, '2021-06-18 22:12:32', '2021-06-22 17:04:16', NULL, 5),
(50, 6, 'ansiolitico-natural-60ml', 3, 'Ansiolítico natural 60ml', 'Uso interno', '', 490, 490, 0, 0, '/assets/uploads/products/B4dTFb7L-AN1.jpg', 0, 0, NULL, '2021-06-18 22:13:06', '2021-06-22 17:04:22', NULL, 5),
(51, 8, 'contorno-de-ojos-15grs', 6, 'Contorno de ojos 15grs', 'Caléndula, Vitamina E y ácido hialurónico', '', 250, 250, 0, 0, '/assets/uploads/products/IN6pw0W5-contorno-1.jpg', 0, 0, NULL, '2021-06-18 22:17:03', '2021-09-30 00:43:34', NULL, 5),
(52, 2, 'aceite-medicinal-de-cannabis-15ml', 3, 'Aceite medicinal de Cannabis 15ml', 'Uso interno. Sublingûal', '', 500, 500, 0, 0, '/assets/uploads/products/rrTUbMAA-aceite-1.jpg', 0, 0, NULL, '2021-06-18 22:21:15', '2021-06-22 17:04:33', NULL, 5),
(53, 2, 'aceite-medicinal-de-cannabis-30ml', 3, 'Aceite medicinal de Cannabis 30ml', 'Uso interno. Sublingûal', '', 850, 850, 0, 0, '/assets/uploads/products/wZu3F3U1-aceite-1.jpg', 0, 0, NULL, '2021-06-18 22:22:09', '2021-08-12 04:12:42', NULL, 5),
(54, 2, 'aceite-medicinal-de-cannabis-60ml', 3, 'Aceite medicinal de Cannabis 60ml', 'Uso interno. Sublingûal', '', 1500, 1500, 0, 0, '/assets/uploads/products/WYLdp0Hq-aceite-1.jpg', 0, 0, NULL, '2021-06-18 22:22:53', '2021-06-22 17:04:49', NULL, 5),
(55, 14, 'aceite-de-rosa-mosqueta-10ml', 3, 'Aceite de Rosa Mosqueta 10ml', 'Macerado en frío. Estrías, cicatrices. Psoriasis', '', 220, 220, 0, 0, '/assets/uploads/products/rOIAQVuZ-aceite-2.jpg', 0, 0, NULL, '2021-06-18 22:25:12', '2021-06-22 17:04:58', NULL, 5),
(56, 14, 'aceite-de-rosa-mosqueta-15ml', 3, 'Aceite de Rosa Mosqueta 15ml', 'Macerado en frío. Estrías, cicatrices. Psoriasis', '', 270, 270, 0, 0, '/assets/uploads/products/UySjy091-aceite-2.jpg', 0, 0, NULL, '2021-06-18 22:25:59', '2021-06-22 17:05:10', NULL, 5),
(57, 10, 'balsamo-labial-10grs', 6, 'Bálsamo labial 10grs', 'Orgánico, comestible e incoloro', '', 150, 150, 0, 0, '/assets/uploads/products/nxEqEH1o-balsamo-labial.jpg', 0, 0, NULL, '2021-06-18 22:28:51', '2021-09-30 00:43:45', NULL, 5),
<<<<<<< HEAD:porto.sql
(60, 21, 'producto-canasta', 7, 'Canasta', 'Producto para interpretar una canasta. No debe ser borrado ni eliminado.', '', 600, 600, 9999, 0, '/assets/uploads/products/mWjHY1Pi-500x500.png', 0, 0, NULL, '2021-10-19 19:44:25', '2022-03-17 20:39:34', 1, 0);
=======
(60, 21, 'producto-canasta', 7, 'Canasta', 'Producto para interpretar una canasta. No debe ser borrado ni eliminado.', '', 600, 600, 9999, 0, '/assets/uploads/products/mWjHY1Pi-500x500.png', 0, 0, NULL, '2021-10-19 19:44:25', '2021-10-19 21:36:53', 1, 0);
=======
(1, 3, 'gabinete-tc-army-xz10-mesh-blue', 5, 'Gabinete TC ARMY XZ10 Mesh Blue', '<p>TC</p>', 'prueba', 50, 50, 0, 0, '/assets/uploads/products/REkVJKEP-gabinete-tc-army-xz10-mesh-blue.jpg', 0, 1, NULL, '2021-03-06 05:17:52', '2021-12-06 19:35:24', 1, 5),
(2, 3, 'intel-dualcore-g5420-gold-coffee-lake', 14, 'Intel Dualcore G5420 Gold Coffee Lake', 'Intel Dualcore G5420 Gold Coffee Lake', '', 95, 95, 0, 0, '/assets/uploads/products/NlrZ3gU8-pentium-g5420.jpeg', 0, 1, NULL, '2021-03-06 05:19:29', '2021-12-06 19:35:30', 1, 5),
(3, 3, 'fuente-thermaltake-550w', 5, 'Fuente Thermaltake 550W', 'Fuente Thermaltake 550W', '', 58, 58, 0, 0, '/assets/uploads/products/vkGlXPAn-fuente-thermaltake-550w.jpg', 0, 1, NULL, '2021-03-06 05:20:57', '2021-12-06 19:35:36', 1, 5),
(4, 3, 'jabon-de-bicarbonato-de-sodio-90grs', 5, 'BIOSTAR H310MHP – Socket 1151', '<p>BIOSTAR H310MHP – Socket 1151<br></p>', '', 75, 75, 0, 0, '/assets/uploads/products/v6RzhZ75-biostar-h310mph.jpg', 0, 1, NULL, '2021-03-06 05:23:24', '2021-12-06 19:35:41', 1, 5),
(5, 3, 'netac-memoria-shadow-ddr4-2666-8gb-c19-grey', 16, 'Memoria NETAC Shadow DDR4 2666 8gb C19 Grey', 'NETAC memoria Shadow DDR4 2666 8gb C19 Grey', '', 48, 48, 0, 0, '/assets/uploads/products/pjXQBT3z-netac-memoria-shadow-ddr4-2666-8gb-c19-grey.jpg', 0, 1, NULL, '2021-03-06 05:25:57', '2021-12-06 19:35:47', 1, 5),
(7, 3, 'jabon-de-espirulina-90grs', 5, 'Disco SSD 240gb NETAC', 'Disco SSD 240gb NETAC', '', 39, 39, 0, 0, '/assets/uploads/products/pII1LGuo-disco-ssd-240-netac.jpg', 0, 1, NULL, '2021-06-18 20:52:44', '2021-12-06 19:35:55', 1, 5),
(8, 3, 'biostar-radeon-rx550-4gb', 5, 'Biostar Radeon Rx550 4GB', 'Biostar Radeon RX550 4GB', '', 220, 220, 0, 0, '/assets/uploads/products/oaHdX98K-biostar-radeon-rx550-4gb.png', 0, 1, NULL, '2021-06-18 20:54:02', '2021-12-06 19:36:07', 1, 5),
(9, 3, 'teclado-genius-kb100', 5, 'Teclado Genius Kb100', 'Teclado Genius Kb100', '', 10, 10, 0, 0, '/assets/uploads/products/UsTrB2Xh-teclado-genius-kb100.jpg', 0, 1, NULL, '2021-06-18 20:54:57', '2021-11-30 19:39:49', 1, 5),
(10, 3, 'mouse-genius-x-g200', 5, 'Mouse Genius X-G200', 'Mouse Genius X-G200', '', 8, 8, 0, 0, '/assets/uploads/products/nZjKbflO-mouse-genois-x-g200.jpg', 0, 1, NULL, '2021-06-18 20:57:15', '2021-11-30 19:39:56', 1, 5),
(11, 3, 'equipo-gamer-intel-g5420-16gb-ssd240-rx550-4gb', 5, 'Equipo Gamer Intel G5420 16gb SSD240 Rx550 4gb', 'Equipo Gamer Intel G5420 16gb SSD240 Rx550 4gb', 'Intel', 810, 810, 0, 0, '/assets/uploads/products/6tYLF9gQ-500x500.png', 0, 1, NULL, '2021-06-18 20:58:56', '2021-11-30 20:24:01', 1, 5),
(12, 3, 'monitor-panavox-17-usado', 5, 'Monitor Panavox 17\' (Usado)', 'Monitor Panavox 17\' (Usado)', '', 25, 25, 0, 0, '/assets/uploads/products/yY8dZQJr-500x500.png', 0, 1, NULL, '2021-06-18 20:59:46', '2021-11-30 19:40:11', 1, 5),
(13, 3, 'equipo-athlon-3000g-16gb-ssd240', 5, 'Equipo Athlon 3000G 16gb SSD240 Fan RGB', 'Equipo Athlon 3000g 16gb SSD240', '', 660, 660, 0, 0, '/assets/uploads/products/X5ZrHylI-500x500.png', 0, 1, NULL, '2021-06-18 21:01:22', '2021-11-30 19:40:27', 1, 5),
(14, 3, 'amd-athlon-3000g', 15, 'AMD Athlon 3000G', '<h1>AMD Athlon 3000G</h1>', 'AMD', 90, 90, 0, 0, '/assets/uploads/products/sg75eBU0-amd-athlon-3000g.jpg', 0, 1, NULL, '2021-06-18 21:09:34', '2021-12-06 19:36:19', 1, 5),
(15, 3, 'biostar-b450mh', 5, 'BIOSTAR B450MH', 'BIOSTAR B450MH', 'BIOSTAR', 108, 108, 0, 0, '/assets/uploads/products/XuAb4HTh-biostar-b450m.jpg', 0, 1, NULL, '2021-06-18 21:10:49', '2021-12-06 19:36:26', 1, 5),
(16, 3, 'fuente-evga-500w-80-plus', 5, 'Fuente EVGA 500W 80 plus', 'Fuente EVGA 500W 80 plus', 'EVGA', 63, 63, 0, 0, '/assets/uploads/products/hWOk7HoF-fuente-evga-500w-80-plus.jpg', 0, 1, NULL, '2021-06-18 21:15:53', '2021-12-06 19:36:34', 1, 5),
(17, 3, 'mouse-razer-deathadder-essential-white', 8, 'Mouse Razer DeathAdder Essential White', '<p></p><p></p><p></p><p></p><p></p><p></p><p></p><p></p><ul><li><b>Sensor óptico de 6400 ppp</b></li><li><b>5 botones Hyperesponse</b></li><li><b>Ciclo de vida de 10 millones de clics</b></li><li><b>Rueda de desplazamiento táctil especial para juegos</b></li><li><b>Diseño ergonómico para diestros</b></li><li><b>Tasa de sondeo de 1000 Hz.</b></li><li><b>Longitud del cable: 2.1 m</b></li></ul><p></p>', 'Razer', 80, 64, 5, 20, '/assets/uploads/products/lBa5BtDj-razer-deathadder-essential-white.png', 1, 1, NULL, '2021-06-18 21:17:28', '2021-12-07 08:34:25', NULL, 5),
(18, 3, 'equipo-pc-gamer-amd-athlon-3000g', 2, 'Equipo AMD Athlon 3000G', '<p><b>Equipo gaming ideal para jugar CS:GO, Valorant, League of Legends, Rocket League y GTA V entre otros.</b><br></p><ul><li><b>Gabinete Gaming&nbsp;vidrio templado -&nbsp;Incluye&nbsp;un&nbsp;fan&nbsp;RGB</b></li><li><b>Motherboard&nbsp;BIOSTAR A320MH - Socket AM4</b></li><li><b>Procesador&nbsp;AMD Athlon 3000G</b></li><li><b>Fuente 400w 80plus</b></li><li><b>Memoria Patriot 8GB DDR4 3200mhz</b></li><li><b>Disco SSD&nbsp;KINGSTON 240Gb</b></li><li><b>Gráficos integrados Radeon Vega 3</b></li></ul><p><b>Te dejamos un video para que veas a cuantos FPS corren los juegos:&nbsp;</b><a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/watch?v=0UkMJrwUxTo\"><b>https://www.youtube.com/watch?v=0UkMJrwUxTo</b></a> </p><p></p>', 'AMD', 425, 425, 0, 0, '/assets/uploads/products/Sbvhm5u0-gabinete-xg1-white.png', 1, 1, NULL, '2021-06-18 21:18:21', '2021-12-07 08:34:59', NULL, 5),
(19, 3, 'equipo-pc-gamer-amd-athlon-3000g-rx550', 2, 'Equipo AMD Athlon 3000G Rx550', '<ul><li><strong>Gabinete Gaming, incluye 1 FAN RGB</strong></li><li><strong>Motherboard Biostar B450MX-S</strong></li><li><strong>Procesador AMD Athlon 3000G</strong></li><li><strong>Fuente Cooler Master MWE 500W 80 Plus</strong></li><li><strong>Memoria Patriot Signature Premium 8GB DDR4 3200mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video&nbsp;RADEON RX550 2GB DDR5</b></li></ul><p><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos:&nbsp;<a href=\"https://www.youtube.com/watch?v=itYU3XcpPKY\" title=\"Link: https://www.youtube.com/watch?v=itYU3XcpPKY\">https://www.youtube.com/watch?v=itYU3XcpPKY</a>﻿</strong><br></b></p>', 'AMD', 625, 625, 0, 0, '/assets/uploads/products/vehDyloa-gabinete-xg1-white.png', 1, 1, NULL, '2021-06-18 21:19:37', '2021-12-07 08:35:17', NULL, 5),
(20, 3, 'equipo-pc-gamer-i3-10100f-rx550', 3, 'Equipo Gaming Intel Core i3 10100f Rx550', '<p></p><ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M﻿</strong></li><li><strong>Procesador Intel Core i3 10100f 3.60GHz﻿</strong></li><li><strong>Fuente Cooler Master Elite V3 500W﻿</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz﻿</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video RADEON RX550 2GB DDR5</b></li></ul><p><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos: <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/watch?v=BoSoa5TrQ9c\" title=\"Link: https://www.youtube.com/watch?v=itYU3XcpPKY\">https://www.youtube.com/watch?v=BoSoa5TrQ9c﻿</a></strong></b></p>﻿<br><p></p>', 'Intel', 690, 690, 0, 0, '/assets/uploads/products/7ubMkMFc-gabinete-xz10-blue.jpg', 1, 1, NULL, '2021-06-18 21:20:34', '2021-12-03 21:18:33', NULL, 5),
(21, 3, 'equipo-pc-gamer-i3-10100f-gtx-1050ti', 3, 'Equipo Gaming Intel Core i3 10100f GTX 1050TI', '<ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M</strong></li><li><strong>Procesador Intel Core i3 10100f 3.60GHz</strong></li><li><strong>Fuente Cooler Master Elite V3 500W</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video ASUS GTX 1050TI 4G﻿</b></li></ul><p><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos: <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/watch?v=BoSoa5TrQ9c\" title=\"Link: https://www.youtube.com/watch?v=BoSoa5TrQ9c\">https://www.youtube.com/watch?v=BoSoa5TrQ9c</a></strong></b></p>', 'Intel', 850, 850, 0, 0, '/assets/uploads/products/PUZVFgok-gabinete-xz10-blue.jpg', 1, 1, NULL, '2021-06-18 21:21:18', '2021-12-03 21:18:40', NULL, 5),
(22, 3, 'equipo-pc-gamer-i3-10100f-gtx-1650', 3, 'Equipo Gaming Intel Core i3 10100f GTX 1650', '<ul><li><strong>Gabinete Gaming vidrio templado - Incluye 4 FAN RGB</strong></li><li><strong>﻿Motherboard GIGABYTE H510M</strong><strong>﻿</strong></li><li><strong>﻿Procesador Intel Core i3 10100f 3.60GHz</strong><strong>﻿</strong></li><li><strong>Fuente 400w 80plus</strong></li><li><strong>Memoria Patriot 8GB DDR4 3200mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><strong>Tarjeta de&nbsp;VIdeo&nbsp;Asus&nbsp;GTX&nbsp;1650&nbsp;Phoenix&nbsp;4GB</strong>﻿</li></ul><p><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos:&nbsp;<a href=\"https://www.youtube.com/watch?v=L33n3TdSjNk\">https://www.youtube.com/watch?v=L33n3TdSjNk</a>﻿</strong></p>', 'Intel', 950, 950, 0, 0, '/assets/uploads/products/7UNvyC8Q-gabinete-xz10-blue.jpg', 1, 1, NULL, '2021-06-18 21:22:27', '2021-12-03 22:17:04', NULL, 5),
(23, 3, 'memorias-xpg-z1-8gb-ddr4', 16, 'Memoria XPG Z1 8GB DDR4 3000mhz', '<ul><li><b>Capacidad: 8GB</b></li><li><b>Frecuencia: 3000mhz</b></li></ul>', 'XPG', 60, 60, 0, 0, '/assets/uploads/products/xIYaNznY-memoria-xpg-z1.png', 1, 1, NULL, '2021-06-18 21:23:27', '2021-12-07 08:35:38', NULL, 5),
(24, 3, 'auriculares-razer-kraken-verde', 12, 'Auriculares Razer Kraken Verde', '<p><b>﻿Los auriculares están equipados con un software de sonido envolvente 7.1 para que disfrutes de un audio posicional preciso mientras juegas. Podrás elegir la dirección por la que suena la acción y así estarás listo para un tiroteo inminente.<br></b><b>Son compatibles con PC, Mac, Xbox One*, PS4, Nintendo Switch y dispositivos móviles con clavija de audio de 3,5 mm.</b>﻿<br></p><ul><li><b>Controladores optimizados de 50 mm</b></li><li><b>Almohadillas de gel refrigerantes</b></li><li><b>Micrófono unidireccional retráctil</b></li><li><b>Compatibilidad multiplataforma</b></li><li><b>Longitud del cable: 1,3 m</b></li><li><b>Peso aproximado: 322 g</b><br></li></ul><p></p><p><b>Más información en:&nbsp;</b><a target=\"_blank\" rel=\"nofollow\" href=\"https://www2.razer.com/es-es/gaming-audio/razer-kraken\"><b>https://www2.razer.com/es-es/gaming-audio/razer-kraken</b></a><b></b></p>', 'Razer', 95, 95, 0, 0, '/assets/uploads/products/P8uxRrQV-auriculares-razer-kraken-1.png', 1, 1, NULL, '2021-06-18 21:24:09', '2021-12-07 08:39:14', NULL, 5),
(25, 3, 'procesador-intel-core-i3-10100f', 14, 'Intel Core i3 10100f 10th GEN', '<p></p><ul><li><b>Nucleos: 4</b></li><li><b>Hilos: 8</b></li><li><b>Frecuencia básica del procesador: 3.60 GHz</b></li><li><b>Frecuencia turbo máxima: 4.30 GHz</b></li></ul><p><br></p><p><br></p>', 'Intel', 145, 145, 1, 0, '/assets/uploads/products/lf4VAzki-procesador-intel-core-i3-10100f.jpg', 1, 1, NULL, '2021-06-18 21:24:53', '2021-12-07 08:33:51', NULL, 5),
(26, 3, 'memoria-ram-netac-8gb-3200mhz', 16, 'Memoria NETAC 8GB DDR4 3200mhz', '<ul><li><i></i><b>Frecuencia: 3200mhz</b></li><li><b>Capacidad: 8GB</b><i></i></li></ul>', 'Netac', 55, 55, 0, 0, '/assets/uploads/products/tGFUK83o-memoria-ram-netac-1.png', 1, 1, NULL, '2021-06-18 21:25:30', '2021-12-07 08:39:55', NULL, 5),
(27, 3, 'procesador-intel-core-i5-9600kf', 14, 'Intel Core i5 9600KF 9th GEN 4.60 GHz Turbo', '<ul><li><b>Núcleos: 6</b></li><li><b>Hilos: 6</b></li><li><b>Frecuencia básica: 3.70 GHz</b></li><li><b>Frecuencia turbo: 4.60 GHz</b></li></ul>', 'Intel', 275, 275, 0, 0, '/assets/uploads/products/nHRViRD9-procesador-intel-core-i5-9600kf.jpg', 1, 1, NULL, '2021-06-18 21:28:38', '2021-12-07 08:40:14', NULL, 5),
(28, 3, 'procesador-intel-core-i5-10400f', 14, 'Intel Core i5 10400f 10th GEN', '<ul><li><strong>Nucleos: 4</strong></li><li><strong>Hilos: 12</strong></li><li><strong>Frecuencia básica del procesador: 2.90 GHz</strong></li><li><strong>Frecuencia turbo máxima: 4.30 GHz</strong></li></ul>', 'Intel', 245, 245, 0, 0, '/assets/uploads/products/Cn8OPjpJ-procesador-intel-core-i5-10400f.png', 1, 1, NULL, '2021-06-18 21:29:48', '2021-12-07 08:32:43', NULL, 5),
(59, 1, 'conversor-hdmi-vga-activo', 5, 'Conversor HDMI-VGA Activo', 'Conversor HDMI-VGA Activo', '', 14, 14, 0, 0, '/assets/uploads/products/8OlbGZzw-conversor-hdmi-vga-activo.jpeg', 0, 1, NULL, '2021-09-24 00:30:13', '2021-11-30 19:41:26', 1, 5),
(60, 1, 'intel-core-i3-10100f', 14, 'Intel Core i3-10100F 3.6GHz LGA1200', 'Intel CPU BX8070110100F Core i3-10100F / 3.6GHz / 6MB LGA1200 4C / 8T', 'Intel', 99, 99, 0, 0, '/assets/uploads/products/E3qf46hZ-intel-i3-10100f.jpeg', 0, 1, NULL, '2021-09-27 23:52:15', '2021-12-06 19:37:29', 1, 5),
(61, 1, 'memorias-xpg-z1-ddr4-8gb-2x8', 16, 'Pack 2x8GB Memoria XPG Z1 DDR4 3000mhz', '<p></p><ul><li><b>Capacidad: 8GB</b></li><li><b>Frecuencia: 3000mhz</b></li></ul><br><p></p>', 'XPG', 110, 110, 0, 0, '/assets/uploads/products/0Z4ZOpGc-xpg-z1-ddr4.jpg', 1, 1, NULL, '2021-09-27 23:56:33', '2021-12-07 08:40:30', NULL, 5),
(62, 1, 'tax', 5, 'Impuesto', 'Impuesto', '', 1, 1, 0, 0, '/assets/uploads/products/2Iha1fPs-tax-impuesto.png', 0, 1, NULL, '2021-09-28 00:00:20', '2021-12-06 19:37:56', 1, 5),
(63, 1, 'memorias-xpg-8gb-ddr4-rgb', 16, 'Memoria XPG 8GB DDR4 3000mhz RGB', '<ul><li><b>Capacidad: 8GB</b></li><li><b>Frecuencia: 3000mhz</b></li><li><b>RGB</b></li></ul>', 'XPG', 80, 80, 0, 0, '/assets/uploads/products/UZT2XRP7-xpg-memory-rgb-white.jpg', 1, 1, NULL, '2021-12-01 20:57:40', '2021-12-07 08:34:17', NULL, 5),
(64, 1, 'memorias-patriot-viper-8gb-ddr4-3200mhz-rgb', 16, 'Memoria Patriot Viper 8GB DDR4 3200mhz RGB White', '<ul><li><b>Capacidad: 8GB</b></li><li><b>Frecuencia: 3200mhz</b></li><li><b>RGB</b></li></ul>', 'Patriot Viper', 80, 80, 0, 0, '/assets/uploads/products/cuQQN7yn-patriot-viper-memory-rgb.jpg', 1, 1, NULL, '2021-12-01 21:09:49', '2021-12-07 08:40:43', NULL, 5),
(65, 1, 'memorias-teamgroup-t-force-8gb-ddr4-3000mhz-rgb', 16, 'Memoria TEAMGROUP T-Force 8GB DDR4 3000mhz RGB', '<ul><li><b>Capacidad: 8GB</b></li><li><b>Frecuencia: 3000mhz</b></li><li><b>RGB</b></li></ul>', 'Teamgroup', 75, 75, 4, 0, '/assets/uploads/products/zw7hFm7P-teamgroup-t-force-delta-rgb.jpg', 1, 1, NULL, '2021-12-01 22:02:12', '2021-12-07 08:40:50', NULL, 5),
(66, 1, 'memorias-astra-gear-8gb-ddr4-3600mhz-rgb', 16, 'Memoria Astra Gear 8GB DDR4 3600mhz RGB', '<ul><li><b>Capacidad: 8GB</b></li><li><b>Frecuencia: 3600mhz</b></li><li><b>RGB</b></li></ul>', 'Astra GEAR', 86, 86, 2, 0, '/assets/uploads/products/X0rFeKs0-astra-gear-memory-rgb.jpg', 1, 1, NULL, '2021-12-03 19:41:33', '2021-12-07 08:40:58', NULL, 5),
(67, 1, 'equipo-pc-gamer-i3-10100f-rx560', 3, 'Equipo Gaming Intel Core i3 10100f Rx560 4gb', '<p></p><ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M</strong></li><li><strong>Procesador Intel Core i3 10100f 3.60GHz</strong></li><li><strong>Fuente&nbsp; 500W&nbsp;80 plus</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video RADEON RX560 4GB DDR5</b></li></ul><p><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos: <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/watch?v=dmGOLd8pfJs\" title=\"Link: https://www.youtube.com/watch?v=BoSoa5TrQ9c\">https://www.youtube.com/watch?v=dmGOLd8pfJs﻿</a></strong></b></p><br><p></p>', 'Intel', 790, 790, 0, 0, '/assets/uploads/products/5LmTGQdr-gabinete-xz10-blue.jpg', 1, 1, NULL, '2021-12-03 21:37:58', '2021-12-03 21:43:21', NULL, 5),
(68, 1, 'equipo-pc-gamer-intel-g5420-rx550', 3, 'Equipo Intel G5420 Rx550', '<ul><li><strong>Gabinete Gaming, incluye 1 FAN RGB</strong></li><li><strong>BIOSTAR H310MHP – Socket 1151</strong></li><li><strong>Intel Dualcore G5420 Gold</strong></li><li><strong>Fuente EZCool 600w 80 Plus RGB</strong></li><li><strong>Memoria Patriot Signature Premium 8GB DDR4 3200mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video RADEON RX550 2GB DDR5</b></li></ul><p><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos: <a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/watch?v=QR6eKBRHqes\" title=\"Link: https://www.youtube.com/watch?v=itYU3XcpPKY\">https://www.youtube.com/watch?v=QR6eKBRHqes﻿</a></strong></b></p>', 'Intel', 615, 615, 0, 0, '/assets/uploads/products/Hf1w22Vn-gabinete-xg1-white.png', 1, 1, NULL, '2021-12-03 22:12:30', '2021-12-03 22:15:46', NULL, 5),
(69, 1, 'equipo-pc-gamer-i5-10400f-rx560', 3, 'Equipo Gaming Intel Core i5 10400f Rx560 4gb', '<p></p><ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M</strong></li><li><strong>Procesador Intel Core i5 10100f 3.60GHz</strong></li><li><strong>Fuente EZCool 600w 80 Plus RGB</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video RADEON RX560 4GB DDR5</b></li></ul><p></p>', 'Intel', 890, 890, 0, 0, '/assets/uploads/products/GPEzNP0A-gabinete-xz10-red.jpg', 1, 0, NULL, '2021-12-07 09:20:31', '2021-12-07 09:28:35', NULL, 5),
(70, 1, 'equipo-pc-gamer-i5-10400f-gtx-1050ti', 3, 'Equipo Gaming Intel Core i5 10400f GTX 1050 Ti', '<p></p><ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M</strong></li><li><strong>Procesador Intel Core i5 10100f 3.60GHz</strong></li><li><strong>Fuente EZCool 600w 80 Plus RGB</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video ASUS GEFORCE GTX 1050TI-4G</b></li></ul><p><b><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos:&nbsp;<a target=\"_blank\" rel=\"nofollow\" href=\"https://www.youtube.com/watch?v=RDaguQxD37U\">https://www.youtube.com/watch?v=RDaguQxD37U</a></strong></b><br></b></p><br><p></p>', 'Intel', 960, 960, 0, 0, '/assets/uploads/products/RvraIyLL-gabinete-xz10-red.jpg', 1, 0, NULL, '2021-12-07 09:38:28', '2021-12-07 09:50:04', NULL, 5),
(71, 1, 'equipo-pc-gamer-i5-10400f-gtx-1650', 3, 'Equipo Gaming Intel Core i5 10400f GTX 1650', '<ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M</strong></li><li><strong>Procesador Intel Core i5 10100f 3.60GHz</strong></li><li><strong>Fuente EZCool 600w 80 Plus RGB</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Tarjeta de video ASUS GEFORCE GTX 1050TI-4G</b></li></ul><p><b><b><b><strong>Te dejamos un video para que veas a cuantos FPS corren los juegos:&nbsp;<a href=\"https://www.youtube.com/watch?v=TkuNoldueYs\" title=\"Link: https://www.youtube.com/watch?v=TkuNoldueYs\">https://www.youtube.com/watch?v=TkuNoldueYs</a>﻿</strong></b></b><br></b></p>', 'Intel', 960, 960, 0, 0, '/assets/uploads/products/XFleSowK-gabinete-xz10-red.jpg', 1, 0, NULL, '2021-12-07 09:51:35', '2021-12-07 09:56:41', NULL, 5),
(72, 1, 'equipo-pc-gamer-i5-10400f-gtx-1660', 3, 'Equipo Gaming Intel Core i5 10400f GTX 1660 Phoenix 6GB', '<ul><li><strong>Gabinete Gaming, incluye 4 FAN RGB</strong></li><li><strong>Motherboard GIGABYTE H510M</strong></li><li><strong>Procesador Intel Core i5 10100f 3.60GHz</strong></li><li><strong>Fuente EZCool 600w 80 Plus RGB</strong></li><li><strong>Memoria Patriot Viper Steel 8GB DDR4 3000mhz</strong></li><li><strong>Disco SSD KINGSTON 240Gb</strong></li><li><b>Asus GeForce GTX 1660 Phoenix 6GB GDDR6</b></li></ul>', 'Intel', 1240, 1240, 0, 0, '/assets/uploads/products/S7dScq32-gabinete-xz10-red.jpg', 1, 0, NULL, '2021-12-07 09:56:35', '2021-12-07 09:56:49', NULL, 5);
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products_users`
--

CREATE TABLE `products_users` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(1024) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_attribute_values`
--

CREATE TABLE `product_attribute_values` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product_attribute_values`
--

INSERT INTO `product_attribute_values` (`id`, `product_id`, `attribute_value_id`, `created_at`, `updated_at`) VALUES
(3, 2, 6, '2021-06-07 17:43:47', '2021-06-07 18:11:31'),
(4, 1, 6, '2021-06-07 18:10:50', '2021-06-07 18:10:50'),
(5, 3, 6, '2021-06-07 18:11:46', '2021-06-07 18:11:46'),
(6, 4, 6, '2021-06-07 18:11:59', '2021-06-07 18:11:59'),
(7, 5, 6, '2021-06-07 18:12:14', '2021-06-07 18:12:14'),
(8, 7, 6, '2021-06-22 17:29:03', '2021-06-22 17:29:03'),
(9, 8, 6, '2021-06-22 17:29:22', '2021-06-22 17:29:22'),
(10, 9, 6, '2021-06-22 17:29:30', '2021-06-22 17:29:30'),
(11, 10, 6, '2021-06-22 17:29:38', '2021-06-22 17:29:38'),
(12, 11, 6, '2021-06-22 17:29:46', '2021-06-22 17:29:46'),
(13, 12, 6, '2021-06-22 17:29:54', '2021-06-22 17:29:54'),
(14, 13, 6, '2021-06-22 17:30:00', '2021-06-22 17:30:00'),
(15, 14, 6, '2021-06-22 17:30:07', '2021-06-22 17:30:07'),
(16, 15, 6, '2021-06-22 17:30:14', '2021-06-22 17:30:14'),
(17, 16, 6, '2021-06-22 17:30:21', '2021-06-22 17:30:21'),
(18, 17, 6, '2021-06-22 17:30:28', '2021-06-22 17:30:28'),
(19, 18, 6, '2021-06-22 17:30:38', '2021-06-22 17:30:38'),
(20, 19, 6, '2021-06-22 17:30:46', '2021-06-22 17:30:46'),
(21, 20, 6, '2021-06-22 17:31:03', '2021-06-22 17:31:03'),
(22, 21, 6, '2021-06-22 17:31:07', '2021-06-22 17:31:07'),
(23, 22, 6, '2021-06-22 17:31:16', '2021-06-22 17:31:16'),
(24, 23, 6, '2021-06-22 17:31:23', '2021-06-22 17:31:23'),
(25, 24, 6, '2021-06-22 17:31:29', '2021-06-22 17:31:29'),
(26, 25, 6, '2021-06-22 17:31:36', '2021-06-22 17:31:36'),
(27, 26, 6, '2021-06-22 17:31:42', '2021-06-22 17:31:42'),
(28, 27, 6, '2021-06-22 17:31:49', '2021-06-22 17:31:49'),
(29, 28, 6, '2021-06-22 17:31:55', '2021-06-22 17:31:55'),
<<<<<<< HEAD:porto.sql
(30, 29, 6, '2021-06-22 17:32:01', '2021-06-22 17:32:01'),
(31, 30, 6, '2021-06-22 17:32:07', '2021-06-22 17:32:07'),
(32, 31, 6, '2021-06-22 17:32:13', '2021-06-22 17:32:13'),
(33, 32, 6, '2021-06-22 17:32:19', '2021-06-22 17:32:19'),
(34, 33, 6, '2021-06-22 17:32:25', '2021-06-22 17:32:25'),
(35, 34, 6, '2021-06-22 17:32:30', '2021-06-22 17:32:30'),
(36, 35, 1, '2021-06-22 17:32:40', '2021-06-22 17:32:40'),
(37, 36, 2, '2021-06-22 17:32:48', '2021-06-22 17:32:48'),
(38, 37, 1, '2021-06-22 17:32:55', '2021-06-22 17:32:55'),
(39, 38, 2, '2021-06-22 17:33:02', '2021-06-22 17:33:02'),
(40, 39, 1, '2021-06-22 17:33:09', '2021-06-22 17:33:09'),
(41, 40, 2, '2021-06-22 17:33:17', '2021-06-22 17:33:17'),
(42, 41, 1, '2021-06-22 17:33:24', '2021-06-22 17:33:24'),
(43, 42, 2, '2021-06-22 17:33:30', '2021-06-22 17:33:30'),
(44, 43, 1, '2021-06-22 17:35:07', '2021-06-22 17:35:07'),
(45, 44, 2, '2021-06-22 17:35:14', '2021-06-22 17:35:14'),
(46, 45, 1, '2021-06-22 17:35:20', '2021-06-22 17:35:20'),
(47, 46, 2, '2021-06-22 17:35:26', '2021-06-22 17:35:26'),
(48, 47, 1, '2021-06-22 17:35:32', '2021-06-22 17:35:32'),
(49, 48, 2, '2021-06-22 17:35:39', '2021-06-22 17:35:39'),
(50, 52, 3, '2021-06-22 17:36:03', '2021-06-22 17:36:03'),
(51, 53, 4, '2021-06-22 17:36:09', '2021-06-22 17:36:09'),
(52, 54, 5, '2021-06-22 17:36:20', '2021-06-22 17:36:20'),
(53, 55, 10, '2021-06-22 17:39:22', '2021-06-22 17:39:22'),
(54, 56, 3, '2021-06-22 17:39:29', '2021-06-22 17:39:29'),
(55, 49, 4, '2021-06-22 17:41:40', '2021-06-22 17:41:40'),
(56, 50, 5, '2021-06-22 17:41:47', '2021-06-22 17:41:47'),
(57, 51, 11, '2021-06-22 17:43:43', '2021-06-22 17:43:43'),
(58, 57, 12, '2021-06-22 17:44:36', '2021-06-22 17:44:36'),
(61, 60, 1, '2021-10-19 19:44:25', '2021-10-19 19:44:25');
<<<<<<< HEAD:porto.sql
=======
=======
(60, 59, 1, '2021-09-24 00:30:13', '2021-09-24 00:30:13'),
(61, 60, 1, '2021-09-27 23:52:15', '2021-09-27 23:52:15'),
(62, 61, 1, '2021-09-27 23:56:33', '2021-09-27 23:56:33'),
(63, 62, 1, '2021-09-28 00:00:20', '2021-09-28 00:00:20'),
(64, 63, 1, '2021-12-01 20:57:40', '2021-12-01 20:57:40'),
(65, 64, 1, '2021-12-01 21:09:49', '2021-12-01 21:09:49'),
(66, 65, 1, '2021-12-01 22:02:12', '2021-12-01 22:02:12'),
(67, 66, 1, '2021-12-03 19:41:33', '2021-12-03 19:41:33'),
(68, 67, 1, '2021-12-03 21:37:58', '2021-12-03 21:37:58'),
(69, 68, 1, '2021-12-03 22:12:30', '2021-12-03 22:12:30'),
(70, 69, 1, '2021-12-07 09:20:31', '2021-12-07 09:20:31'),
(71, 70, 1, '2021-12-07 09:38:28', '2021-12-07 09:38:28'),
(72, 71, 1, '2021-12-07 09:51:35', '2021-12-07 09:51:35'),
(73, 72, 1, '2021-12-07 09:56:35', '2021-12-07 09:56:35');
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product_type`
--

INSERT INTO `product_type` (`id`, `name`, `description`) VALUES
(1, 'Cremas', 'Cremas'),
(2, 'Aceites medicinales', 'Aceites medicinales'),
(3, 'Jabones', 'Jabones'),
(4, 'Champú', 'Champú'),
(5, 'Agua florida', 'Agua florida'),
(6, 'Ansiolítico natural', 'Ansiolítico natural'),
(7, 'Bronceador', 'Bronceador'),
(8, 'Contorno de ojos', 'Contorno de ojos'),
(9, 'Inmunoprotector', 'Inmunoprotector'),
(10, 'Bálsamo labial', 'Bálsamo labial'),
(11, 'Mezcla para Sahumar', 'Mezcla para Sahumar'),
(12, 'Resinas para Sahumar', 'Resinas para Sahumar'),
(13, 'Licor Cannabis medicinal', 'Licor Cannabis medicinal'),
(14, 'Aceite rosa mosqueta', 'Aceite rosa mosqueta'),
(21, 'Canasta', 'Canasta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_type_attribute_value`
--

CREATE TABLE `product_type_attribute_value` (
  `id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `attribute_value_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product_type_attribute_value`
--

INSERT INTO `product_type_attribute_value` (`id`, `product_type_id`, `attribute_value_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 1, 2, NULL, NULL, NULL),
(3, 2, 3, NULL, NULL, NULL),
(4, 2, 4, NULL, NULL, NULL),
(5, 2, 5, NULL, NULL, NULL),
(6, 3, 6, NULL, NULL, NULL),
(7, 4, 9, NULL, NULL, NULL),
(8, 5, 7, NULL, NULL, NULL),
(9, 5, 8, NULL, NULL, NULL),
(10, 14, 10, NULL, NULL, NULL),
(11, 14, 3, NULL, NULL, NULL),
(12, 6, 4, NULL, NULL, NULL),
(13, 6, 5, NULL, NULL, NULL),
(14, 8, 11, NULL, NULL, NULL),
(15, 10, 12, NULL, NULL, NULL),
(33, 21, 1, '2021-10-19 19:44:20', '2021-10-19 19:44:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `business_name` varchar(75) NOT NULL,
  `rut` varchar(45) NOT NULL,
  `city` varchar(75) NOT NULL,
  `location` varchar(75) NOT NULL,
  `address` varchar(75) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `cellphone` varchar(100) DEFAULT NULL,
  `image` varchar(125) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `providers`
--

INSERT INTO `providers` (`id`, `business_name`, `rut`, `city`, `location`, `address`, `phone`, `cellphone`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Thot Computación', '-', 'Montevideo', 'Pocitos', 'Demóstenes 3532', '2623 5549 - 2628 1559', NULL, '/assets/uploads/providers/5qCnrtqv-thot-logo.jpeg', '2021-09-24 00:06:35', '2021-09-28 00:14:23', NULL),
(2, 'Banifox', '-', 'Montevideo', 'Aguada', 'Juan Paullier 2378', '2209 1840 - 2200 2610 - 2201 2250 - 2209 8616', NULL, '/assets/uploads/providers/V7rruWtk-banifox-logo.jpg', '2021-09-24 00:08:52', '2021-09-28 00:14:27', NULL),
(3, 'Tiendamia', '-', 'Montevideo', 'Montevideo', '-', '-', NULL, '/assets/uploads/providers/k0MKsw71-tiendamia-logo.png', '2021-09-27 23:49:32', '2021-09-28 00:14:32', NULL),
(4, 'LOi', '-', 'Montevideo', 'Centro', 'Soriano 800', '-', NULL, '/assets/uploads/providers/lsAhspYN-loi-logo.png', '2021-09-28 00:14:16', '2021-09-28 00:14:16', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Final consumer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping_cost`
--

CREATE TABLE `shipping_cost` (
  `id` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `shipping_cost`
--

INSERT INTO `shipping_cost` (`id`, `cost`) VALUES
(1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shipping_method`
--

CREATE TABLE `shipping_method` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(125) NOT NULL,
  `message` varchar(155) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `shipping_method`
--

INSERT INTO `shipping_method` (`id`, `name`, `description`, `message`, `icon`, `cost`, `is_deleted`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Retiro Pickup La Teja - Av. Carlos M. Ramirez 209 (a pasitos de Agraciada)', 'El cliente irá a buscar su pedido al local', 'Nos pondremos en contacto contigo cuanto tengamos pronto tu pedido', '/assets/dist/images/shipping_methods/home-logo.png', 0, 0, '2020-10-20 03:00:00', '2021-12-01 17:33:19', NULL),
(2, 'Quiero que entreguen mi pedido a la dirección solicitada', 'El pedido será entregado a la dirección solicitada', 'Nos comunicaremos contigo para coordinar fecha y hora para la entrega de tu pedido.', '/assets/dist/images/shipping_methods/delivery-logo-50x50.png', 5, 0, '2020-10-20 03:00:00', '2021-12-01 17:34:07', NULL),
(3, 'Envío a Tres Cruces', 'El envío se hará a Tres Cruces', 'Nos comunicaremos contigo para coordinar fecha y hora para la entrega de tu pedido.', '/assets/dist/images/shipping_methods/tres_cruces-logo-50x50.png', 0, 1, '2020-10-20 03:00:00', '2021-06-24 20:40:09', NULL),
(4, 'Redelocker', 'El pedido será entregado a la dirección del Locker solicitada.', 'Recibiras por Email o SMS el código para retirar tu pedido.', '/assets/dist/images/shipping_methods/redelocker-logo-50x50.png', 180, 1, '2021-05-27 20:35:33', '2021-12-01 17:33:02', NULL),
(5, 'Método de prueba', 'Descripción de prueba', 'Mensaje de prueba', NULL, 555, 1, '2021-06-24 20:29:44', '2021-06-24 20:29:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `description` varchar(150) DEFAULT NULL,
  `bg` varchar(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `name`, `description`, `bg`, `deleted_at`) VALUES
(1, 'Abierto', 'Cuando un usuario llega al paso 3 en la compra web pero aún no escogió método de pago ni de envío.', 'bg-teal', NULL),
(2, 'Expirado', 'Cuando un pedido web pasó mas de 24 horas en estado abierto.', 'bg-gray', NULL),
(3, 'Cancelado', 'Pedido cancelado por el usuario o un administrador.', 'bg-red', NULL),
(4, 'Preparar pedido - Pago', 'Pedido pago para preparar.', 'bg-yellow', NULL),
(5, 'Preparar pedido - Pendiente de pago', 'Pedido pendiente de pago para preparar.', 'bg-yellow', '2021-03-01 13:09:48'),
(6, 'En espera del usuario', 'Pedido a la espera de que el cliente pague y levante su pedido en el local.', 'bg-purple', '2021-03-01 13:09:55'),
(7, 'Pronto para retirar', 'Pedido pago listo para que el usuario lo retire en el local.', 'bg-green', '2021-03-01 13:10:00'),
(8, 'Pendiente de envío', 'Pedido pago listo para ser entregado.', 'bg-yellow', NULL),
(9, 'Pendiente de pago y de envío', 'Pedido pendiente de pago y de envío', 'bg-yellow', '2021-03-01 13:10:07'),
(10, 'Concretado', 'Pedido pago y entregado.', 'bg-blue', NULL),
(11, 'Factura pendiente de pago', 'Factura pendiente de pago', 'bg-yellow', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `lastname` varchar(70) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(70) DEFAULT NULL,
  `location` varchar(70) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL,
  `document` varchar(8) DEFAULT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `cellphone` varchar(25) DEFAULT NULL,
  `business_name` varchar(75) DEFAULT NULL,
  `rut` varchar(50) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `confirmation_code` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `lastname`, `email`, `password`, `city`, `location`, `address`, `document`, `phone`, `cellphone`, `business_name`, `rut`, `confirmed`, `confirmation_code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Sevencrows', NULL, 'admin@admin.com', '$2y$10$DCbQDxg0FMeVKeekcf9qHO39J8DH8OXzy2Xht/YsaaggqM0libZti', '', '', '', '', '', '', '', '', 1, NULL, '2019-11-26 03:00:00', '2020-02-24 18:56:00', '2021-12-06 18:10:19'),
(2, 1, 'SevenParts', NULL, 'sc@sp.uy', '$2y$10$DCbQDxg0FMeVKeekcf9qHO39J8DH8OXzy2Xht/YsaaggqM0libZti', '', '', ' ', '', '', '', '', '', 1, NULL, '2019-11-26 03:00:00', '2020-02-24 18:56:00', NULL),
(3, 3, '', 'Consumidor final', 'customer@customer.com', '$2y$10$/GWQ/LIGshVnOYwFlCSn3Ou6md2Ng8E7RQCwqNzmzXn77DmPxLbze', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', '2019-11-26 03:00:00', '2020-02-19 08:43:43', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_value_attribute_id_foreign` (`attribute_id`);

--
-- Indices de la tabla `canceled_orders`
--
ALTER TABLE `canceled_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `canceled_orders_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indices de la tabla `combos`
--
ALTER TABLE `combos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `combo_customer`
--
ALTER TABLE `combo_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `combo_customer_combo_id_foreign` (`combo_id`),
  ADD KEY `combo_customer_product_id_foreign` (`product_id`),
  ADD KEY `combo_customer_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `combo_item`
--
ALTER TABLE `combo_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupons_discount_type_id_foreign` (`discount_type_id`);

--
-- Indices de la tabla `coupon_order`
--
ALTER TABLE `coupon_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coupon_order_coupon_id_foreign` (`coupon_id`),
  ADD KEY `coupon_order_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `discount_type`
--
ALTER TABLE `discount_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `featured_products`
--
ALTER TABLE `featured_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `featured_products_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `image_product`
--
ALTER TABLE `image_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_image_id_foreign` (`image_id`),
  ADD KEY `image_product_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_provider_id_foreign` (`provider_id`),
  ADD KEY `invoices_status_id_foreign` (`status_id`),
  ADD KEY `invoices_payment_type_id_foreign` (`payment_type_id`);

--
-- Indices de la tabla `invoice_product`
--
ALTER TABLE `invoice_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_product_product_id_foreign` (`product_id`),
  ADD KEY `invoice_product_invoice_id_foreign` (`invoice_id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`order_id`),
  ADD KEY `cart_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`),
  ADD KEY `products_shipping_method_id_foreign` (`shipping_method_id`),
  ADD KEY `orders_payment_method_id_foreign` (`payment_method_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_history_invoice_id_foreign` (`invoice_id`);

--
-- Indices de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `posts_users`
--
ALTER TABLE `posts_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Indices de la tabla `products_users`
--
ALTER TABLE `products_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_users_product_id_foreign` (`product_id`),
  ADD KEY `products_users_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attribute_values_product_id_foreign` (`product_id`),
  ADD KEY `product_attribute_values_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indices de la tabla `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product_type_attribute_value`
--
ALTER TABLE `product_type_attribute_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_type_attribute_value_product_type_id_foreign` (`product_type_id`),
  ADD KEY `product_type_attribute_value_attribute_value_id_foreign` (`attribute_value_id`);

--
-- Indices de la tabla `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping_cost`
--
ALTER TABLE `shipping_cost`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `attribute_value`
--
ALTER TABLE `attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `canceled_orders`
--
ALTER TABLE `canceled_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `combos`
--
ALTER TABLE `combos`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `combo_customer`
--
ALTER TABLE `combo_customer`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `combo_item`
--
ALTER TABLE `combo_item`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coupon_order`
--
ALTER TABLE `coupon_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `discount_type`
--
ALTER TABLE `discount_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `featured_products`
--
ALTER TABLE `featured_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `image_product`
--
ALTER TABLE `image_product`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=382;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `inbox`
--
ALTER TABLE `inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `invoice_product`
--
ALTER TABLE `invoice_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `posts_users`
--
ALTER TABLE `posts_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `products_users`
--
ALTER TABLE `products_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
=======
<<<<<<< HEAD:porto.sql
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
>>>>>>> 84efd05866dcfc45d413ad7e5dcaad7982773363:sevenparts.sql
>>>>>>> ca7eaff6a9cec8835d9a9380bc16a02c84b74082:sevenparts.sql

--
-- AUTO_INCREMENT de la tabla `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `product_type_attribute_value`
--
ALTER TABLE `product_type_attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `shipping_cost`
--
ALTER TABLE `shipping_cost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `shipping_method`
--
ALTER TABLE `shipping_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attribute_value`
--
ALTER TABLE `attribute_value`
  ADD CONSTRAINT `attribute_value_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`);

--
-- Filtros para la tabla `canceled_orders`
--
ALTER TABLE `canceled_orders`
  ADD CONSTRAINT `canceled_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `combo_customer`
--
ALTER TABLE `combo_customer`
  ADD CONSTRAINT `combo_customer_combo_id_foreign` FOREIGN KEY (`combo_id`) REFERENCES `combos` (`id`),
  ADD CONSTRAINT `combo_customer_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `combo_customer_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `coupons`
--
ALTER TABLE `coupons`
  ADD CONSTRAINT `coupons_discount_type_id_foreign` FOREIGN KEY (`discount_type_id`) REFERENCES `discount_type` (`id`);

--
-- Filtros para la tabla `coupon_order`
--
ALTER TABLE `coupon_order`
  ADD CONSTRAINT `coupon_order_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `coupon_order_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `featured_products`
--
ALTER TABLE `featured_products`
  ADD CONSTRAINT `featured_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`),
  ADD CONSTRAINT `image_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_payment_type_id_foreign` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`id`),
  ADD CONSTRAINT `invoices_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`),
  ADD CONSTRAINT `invoices_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Filtros para la tabla `invoice_product`
--
ALTER TABLE `invoice_product`
  ADD CONSTRAINT `invoice_product_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `invoice_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_method` (`id`),
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `products_shipping_method_id_foreign` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_method` (`id`);

--
-- Filtros para la tabla `payment_history`
--
ALTER TABLE `payment_history`
  ADD CONSTRAINT `payment_history_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `posts_users`
--
ALTER TABLE `posts_users`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`);

--
-- Filtros para la tabla `products_users`
--
ALTER TABLE `products_users`
  ADD CONSTRAINT `products_users_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `products_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `product_attribute_values`
--
ALTER TABLE `product_attribute_values`
  ADD CONSTRAINT `product_attribute_values_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_value` (`id`),
  ADD CONSTRAINT `product_attribute_values_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `product_type_attribute_value`
--
ALTER TABLE `product_type_attribute_value`
  ADD CONSTRAINT `product_type_attribute_value_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_value` (`id`),
  ADD CONSTRAINT `product_type_attribute_value_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_type` (`id`);

--
-- Filtros para la tabla `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;