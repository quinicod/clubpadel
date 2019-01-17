-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2018 a las 21:19:19
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubpadel`
--
CREATE DATABASE IF NOT EXISTS `clubpadel` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clubpadel`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquilas`
--

CREATE TABLE `alquilas` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_pista` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `id_hora` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carritos`
--

CREATE TABLE `carritos` (
  `id_producto` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `precio_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `id` int(10) UNSIGNED NOT NULL,
  `hora` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id`, `hora`, `created_at`, `updated_at`) VALUES
(1, '09:00', NULL, NULL),
(2, '10:00', NULL, NULL),
(3, '11:00', NULL, NULL),
(4, '12:00', NULL, NULL),
(5, '13:00', NULL, NULL),
(6, '14:00', NULL, NULL),
(7, '15:00', NULL, NULL),
(8, '16:00', NULL, NULL),
(9, '17:00', NULL, NULL),
(10, '18:00', NULL, NULL),
(11, '19:00', NULL, NULL),
(12, '20:00', NULL, NULL),
(13, '21:00', NULL, NULL),
(14, '22:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`nombre`, `created_at`, `updated_at`) VALUES
('Adidas', '2018-02-23 15:03:04', '2018-02-23 15:03:04'),
('Asics', '2018-02-23 15:02:47', '2018-02-23 15:02:47'),
('Babolat', '2018-02-23 15:03:45', '2018-02-23 15:03:45'),
('Dumlop', '2018-02-23 14:55:22', '2018-02-23 14:55:22'),
('Siux', '2018-02-23 15:03:14', '2018-02-23 15:03:14'),
('Wilson', '2018-02-23 15:02:53', '2018-02-23 15:02:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2013_02_03_013754_create_tipoproductos_table', 1),
(42, '2013_02_03_015245_create_marcas_table', 1),
(43, '2014_10_12_000000_create_users_table', 1),
(44, '2014_10_12_100000_create_password_resets_table', 1),
(45, '2018_01_14_085220_create_horas_table', 1),
(46, '2018_01_15_094246_create_productos_table', 1),
(47, '2018_01_15_094819_create_pistas_table', 1),
(48, '2018_01_15_094936_create_compras_table', 1),
(49, '2018_01_15_095919_create_pedidos_table', 1),
(50, '2018_01_15_095941_create_alquilas_table', 1),
(51, '2018_02_21_103648_create_carritos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_compra` int(10) UNSIGNED NOT NULL,
  `id_producto` int(10) UNSIGNED NOT NULL,
  `unidades` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pistas`
--

CREATE TABLE `pistas` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pistas`
--

INSERT INTO `pistas` (`id`, `estado`, `tipo`, `precio`, `created_at`, `updated_at`) VALUES
(1, 'Disponible', 'Cubierta', 15.00, NULL, NULL),
(2, 'Disponible', 'Cubierta', 15.00, NULL, NULL),
(3, 'Disponible', 'Exterior', 12.00, NULL, NULL),
(4, 'Disponible', 'Exterior', 12.00, NULL, NULL),
(5, 'Disponible', 'Exterior', 12.00, NULL, NULL),
(6, 'Reparacion', 'Exterior', 12.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` double(8,2) NOT NULL,
  `talla` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `marca` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `talla`, `stock`, `marca`, `tipo`, `imagen`, `created_at`, `updated_at`) VALUES
(1, 'Pala', 'Descripcion del articulo', 100.00, 'M', 2, 'Dumlop', 'Pala', 'images/pala2.jpg', '2018-02-23 14:56:06', '2018-02-23 14:56:35'),
(2, 'Calzonas', 'Descripcion del articulo', 25.00, 'M', 5, 'Asics', 'Calzonas', 'images/calzonas1.jpg', '2018-02-23 15:06:40', '2018-02-23 15:06:52'),
(3, 'Calzonas', 'Descripcion del articulo', 30.00, 'S', 8, 'Asics', 'Calzonas', 'images/calzonas2.jpg', '2018-02-23 15:08:46', '2018-02-23 15:08:46'),
(4, 'Camiseta', 'Descripcion del articulo', 40.00, 'L', 10, 'Asics', 'Camiseta', 'images/camiseta1.jpg', '2018-02-23 15:10:06', '2018-02-23 15:10:06'),
(5, 'Camiseta', 'Descripcion del articulo', 35.00, 'S', 5, 'Asics', 'Camiseta', 'images/camiseta2.jpg', '2018-02-23 15:10:42', '2018-02-23 15:10:42'),
(6, 'Camiseta', 'Descripcion del articulo', 40.00, 'M', 6, 'Wilson', 'Camiseta', 'images/camiseta3.jpg', '2018-02-23 15:11:19', '2018-02-23 15:11:19'),
(7, 'Deportivas', 'Descripcion del articulo', 55.00, '38', 10, 'Asics', 'Deportivas', 'images/deportes1.jpg', '2018-02-23 15:11:50', '2018-02-23 15:11:50'),
(8, 'Deportivas', 'Descripcion del articulo', 105.00, '41', 5, 'Asics', 'Deportivas', 'images/deportes2.jpg', '2018-02-23 15:12:21', '2018-02-23 15:12:21'),
(9, 'Gorra', 'Descripcion del articulo', 15.00, 'M', 18, 'Asics', 'Gorra', 'images/gorra1.jpg', '2018-02-23 15:12:53', '2018-02-23 15:12:53'),
(10, 'Gorra', 'Descripcion del articulo', 17.00, 'M', 8, 'Wilson', 'Gorra', 'images/gorra2.jpg', '2018-02-23 15:13:18', '2018-02-23 15:13:18'),
(11, 'Pala', 'Descripcion del articulo', 80.00, 'M', 10, 'Siux', 'Pala', 'images/pala.jpg', '2018-02-23 15:13:59', '2018-02-23 15:13:59'),
(12, 'Pala', 'Descripcion del articulo', 120.00, 'M', 5, 'Dumlop', 'Pala', 'images/pala2.jpg', '2018-02-23 15:14:29', '2018-02-23 15:14:29'),
(13, 'Pala', 'Descripcion del articulo', 90.00, 'M', 12, 'Siux', 'Pala', 'images/pala3.jpg', '2018-02-23 15:15:06', '2018-02-23 15:15:06'),
(14, 'Pala', 'Descripcion del articulo', 140.00, 'M', 30, 'Asics', 'Pala', 'images/pala4.jpg', '2018-02-23 15:15:43', '2018-02-23 15:15:43'),
(15, 'Pala', 'Descripcion del articulo', 180.00, 'M', 3, 'Adidas', 'Pala', 'images/pala5.jpg', '2018-02-23 15:16:20', '2018-02-23 15:16:20'),
(16, 'Pelotas', 'Descripcion del articulo', 10.00, 'Sin talla', 50, 'Dumlop', 'Pelotas', 'images/pelota.jpg', '2018-02-23 15:17:02', '2018-02-23 15:17:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproductos`
--

CREATE TABLE `tipoproductos` (
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipoproductos`
--

INSERT INTO `tipoproductos` (`nombre`, `created_at`, `updated_at`) VALUES
('Calzonas', '2018-02-23 15:03:57', '2018-02-23 15:03:57'),
('Camiseta', '2018-02-23 15:04:03', '2018-02-23 15:04:03'),
('Deportivas', '2018-02-23 15:04:11', '2018-02-23 15:04:11'),
('Gorra', '2018-02-23 15:04:26', '2018-02-23 15:04:26'),
('Muñequeras', '2018-02-23 15:05:58', '2018-02-23 15:05:58'),
('Pala', '2018-02-23 14:55:31', '2018-02-23 14:55:31'),
('Pelotas', '2018-02-23 15:04:19', '2018-02-23 15:04:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroCuenta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usuario',
  `saldo` double(8,2) NOT NULL DEFAULT '0.00',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `telefono`, `email`, `numeroCuenta`, `password`, `role`, `saldo`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', '-_-', '000000000', 'admin@admin.com', 'ES00000000', '$2y$10$v/ki/ggg.nJUhVtQz29D7OlGS1AoV04h8glKrtXs6AdAqHLVJGrGS', 'admin', 0.00, 'qPFw7ezEMDIUG9h8JI0t2jNqboTOUCHIGB8FBRQR2yaG8W7FmB7qTH4M84X4', '2018-02-23 14:59:57', '2018-02-23 14:59:57');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquilas`
--
ALTER TABLE `alquilas`
  ADD PRIMARY KEY (`id_user`,`id_pista`,`fecha`,`id_hora`),
  ADD KEY `alquilas_id_pista_foreign` (`id_pista`),
  ADD KEY `alquilas_id_hora_foreign` (`id_hora`);

--
-- Indices de la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD KEY `carritos_id_producto_foreign` (`id_producto`),
  ADD KEY `carritos_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compras_id_user_foreign` (`id_user`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_compra`,`id_producto`),
  ADD KEY `pedidos_id_producto_foreign` (`id_producto`);

--
-- Indices de la tabla `pistas`
--
ALTER TABLE `pistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_marca_foreign` (`marca`),
  ADD KEY `productos_tipo_foreign` (`tipo`);

--
-- Indices de la tabla `tipoproductos`
--
ALTER TABLE `tipoproductos`
  ADD PRIMARY KEY (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `pistas`
--
ALTER TABLE `pistas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquilas`
--
ALTER TABLE `alquilas`
  ADD CONSTRAINT `alquilas_id_hora_foreign` FOREIGN KEY (`id_hora`) REFERENCES `horas` (`id`),
  ADD CONSTRAINT `alquilas_id_pista_foreign` FOREIGN KEY (`id_pista`) REFERENCES `pistas` (`id`),
  ADD CONSTRAINT `alquilas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carritos_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_id_compra_foreign` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_id_producto_foreign` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_marca_foreign` FOREIGN KEY (`marca`) REFERENCES `marcas` (`nombre`),
  ADD CONSTRAINT `productos_tipo_foreign` FOREIGN KEY (`tipo`) REFERENCES `tipoproductos` (`nombre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
