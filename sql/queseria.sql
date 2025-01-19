-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-01-2025 a las 02:15:15
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `queseria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avenas`
--

CREATE TABLE `avenas` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `avenas`
--

INSERT INTO `avenas` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Avena Guifal', 25.00, 'pz', 30.00, 45.00, 'Avena guifal'),
(2, 'Avena Sureste', 1.00, 'pz', 35.00, 55.00, 'Avena sureste'),
(3, 'Avena Secreto del abuelo', 0.00, 'pz', 50.00, 75.00, 'Avena secreto del abuelo'),
(4, 'Avena Campo Mary', 87.00, 'pz', 30.00, 45.00, 'Avena campo mary'),
(5, 'Avena Cacep', 34.00, 'pz', 25.00, 40.00, 'Avena cacep'),
(6, 'Avena Alteza', 32.00, 'pz', 50.00, 75.00, 'Avena alteza'),
(7, 'Avena Tapijulapa', 0.00, 'pz', 40.00, 60.00, 'Avena tapijulapa'),
(8, 'Avena Chamygui', 0.00, 'pz', 50.00, 75.00, 'Avena chamygui'),
(9, 'Avena sureña', 0.00, 'pz', 30.00, 45.00, 'Avena sureña');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carnes_frias`
--

CREATE TABLE `carnes_frias` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carnes_frias`
--

INSERT INTO `carnes_frias` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Longaniza Enjamonada', 9.00, 'kg', 120.00, 180.00, 'Longaniza enjamonada'),
(2, 'Longaniza Casera', 9.00, 'pz', 120.00, 180.00, 'Longaniza casera'),
(3, 'Carne Chinameca', 0.00, 'kg', 150.00, 240.00, 'Carne chinameca'),
(4, 'Queso de Puerco', 8.00, 'kg', 300.00, 450.00, 'Queso de puerco'),
(5, 'Cecina', 0.00, 'kg', 200.00, 300.00, 'Cecina de la más alta calidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chocolates`
--

CREATE TABLE `chocolates` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chocolates`
--

INSERT INTO `chocolates` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Chocolate en Polvo', 0.00, 'pz', 50.00, 75.00, 'Chocolate en polvo'),
(2, 'Chocolate en Barra', 30.00, 'pz', 50.00, 75.00, 'Chocolate en barra rico'),
(3, 'Chocolate en Tablilla', 0.00, 'pz', 50.00, 75.00, 'Chocolate en tablilla'),
(4, 'Chocolate suizo', 0.00, 'pz', 130.00, 165.00, 'Chocolate suizo... suizo pedazos'),
(6, 'Chocolate Cabeza Olmeca', 9.00, 'pz', 200.00, 300.00, 'Chocolate cabeza olmeca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horchatas`
--

CREATE TABLE `horchatas` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `horchatas`
--

INSERT INTO `horchatas` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Horchata Teapaneca', 3.00, 'pz', 35.00, 45.00, 'Horchata teapaneca'),
(2, 'Horchata Sureña', 20.00, 'pz', 35.00, 50.00, 'Horchata sureña'),
(3, 'Horchata Chontal', 12.00, 'pz', 50.00, 75.00, 'Horchata chontal'),
(5, 'Horchata Mestiza', 30.00, 'pz', 50.00, 75.00, 'Horchata mestiza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `licores`
--

CREATE TABLE `licores` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `licores`
--

INSERT INTO `licores` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Vino de Jamaica', 0.00, 'pz', 120.00, 200.00, 'Vino de jamaica'),
(2, 'Licor de café', 0.00, 'pz', 120.00, 200.00, 'Licor de café'),
(3, 'Licor de cacao', 0.00, 'pz', 120.00, 200.00, 'Licor de cacao'),
(4, 'Rompope', 2.00, 'pz', 130.00, 210.00, 'Rompope');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panaderia`
--

CREATE TABLE `panaderia` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `panaderia`
--

INSERT INTO `panaderia` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Panetela 6 piezas', 30.00, 'pz', 30.00, 45.00, 'Panetela 6 piezas'),
(2, 'Panetela 4 piezas', 5.00, 'pz', 25.00, 35.00, 'Panetela 4 piezas'),
(3, 'Biscotela', 0.00, 'pz', 30.00, 45.00, 'Biscotela'),
(4, 'Rosquillas', 9.00, 'pz', 30.00, 45.00, 'Rosquillas'),
(5, 'Hojaldras', 0.00, 'pz', 25.00, 40.00, 'Hojaldras'),
(6, 'Bizcochos', 12.00, 'pz', 25.00, 35.00, 'Bizcochos'),
(7, 'Queques', 9.00, 'pz', 17.00, 25.00, 'Queques');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quesos`
--

CREATE TABLE `quesos` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `quesos`
--

INSERT INTO `quesos` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Queso de Hebra', 45.00, 'kg', 120.00, 190.00, 'Rico queso de hebra'),
(2, 'Queso Poro', 10.00, 'pz', 270.00, 400.00, 'Rico queso poro'),
(3, 'Queso de Hoja', 30.00, 'kg', 120.00, 180.00, 'Queso de hoja'),
(14, 'Queso doble crema', 20.00, 'kg', 120.00, 180.00, 'Queso doble crema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salsas`
--

CREATE TABLE `salsas` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) NOT NULL,
  `existencia` decimal(10,2) NOT NULL DEFAULT 0.00,
  `unidad` enum('pz','kg') NOT NULL,
  `reposicion` decimal(10,2) NOT NULL,
  `venta` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `status` enum('Disponible','Agotado') GENERATED ALWAYS AS (case when `existencia` > 0 then 'Disponible' else 'Agotado' end) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salsas`
--

INSERT INTO `salsas` (`id`, `tipo_producto`, `existencia`, `unidad`, `reposicion`, `venta`, `descripcion`) VALUES
(1, 'Salsa Chimay', 9.00, 'pz', 30.00, 45.00, 'Salsa chimay'),
(2, 'Salsa Campo Mary', 0.00, 'pz', 30.00, 45.00, 'No disponible...'),
(3, 'Salsa Pakitas', 0.00, 'pz', 30.00, 45.00, 'No disponible...'),
(4, 'Salsa Molienda Azul', 0.00, 'pz', 50.00, 75.00, 'No disponible...'),
(5, 'Salsa Chipile', 9.00, 'pz', 30.00, 45.00, 'Sin descripción...'),
(6, 'Salsa La Piedad', 30.00, 'pz', 30.00, 45.00, 'Salsa sin piedad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `initials` varchar(2) NOT NULL,
  `bg_color` varchar(7) NOT NULL,
  `text_color` varchar(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password_hash`, `genero`, `initials`, `bg_color`, `text_color`, `created_at`) VALUES
(1, 'Wiki', 'Baez', 'wb@gmail.com', '$2y$10$s2llAiYcoM5o1ewTMuN5UOw2a5Koa9CkuVREfL7oBwe4V7E3Z3LTW', 'mujer', 'WB', '#f3ad4f', '#000000', '2025-01-18 02:56:42'),
(3, 'Jorge', 'Estrada', 'jorge@gmail.com', '$2y$10$sPwzK2NcAsmB63qCOiZ51uOLNW6AXIUGlU.qWam6p0HLaB.ejy7hm', 'hombre', 'JE', '#ceb956', '#000000', '2025-01-18 02:58:28'),
(4, 'paquito', 'sanchez', 'paquito@gmail.com', '$2y$10$AY20BEYPKo0NJzJXYQiQnOK42NLg1I00mMdtPIuGYA1sD88vB4jY2', 'hombre', 'PS', '#b7a090', '#000000', '2025-01-19 00:37:08'),
(5, 'emmauel', 'ferral', 'ferral@gmail.com', '$2y$10$H.XH9TlO53Btpt68x6Ldcu2i0x/L1ZjkjCxz4hps8rKvfBgqW5Vn6', 'hombre', 'EF', '#edfe37', '#000000', '2025-01-19 00:45:40'),
(6, 'Jorgito', 'Estrada', 'jorgito285@gmail.com', '$2y$10$IT9Um5mjDxepajhkyw/hrOzWYm1fveEOiG.mrxCd028V/.nGU3ENi', 'hombre', 'JE', '#fda7d4', '#000000', '2025-01-19 01:09:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avenas`
--
ALTER TABLE `avenas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carnes_frias`
--
ALTER TABLE `carnes_frias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `chocolates`
--
ALTER TABLE `chocolates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horchatas`
--
ALTER TABLE `horchatas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `licores`
--
ALTER TABLE `licores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `panaderia`
--
ALTER TABLE `panaderia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quesos`
--
ALTER TABLE `quesos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salsas`
--
ALTER TABLE `salsas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avenas`
--
ALTER TABLE `avenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `carnes_frias`
--
ALTER TABLE `carnes_frias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `chocolates`
--
ALTER TABLE `chocolates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `horchatas`
--
ALTER TABLE `horchatas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `licores`
--
ALTER TABLE `licores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `panaderia`
--
ALTER TABLE `panaderia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `quesos`
--
ALTER TABLE `quesos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `salsas`
--
ALTER TABLE `salsas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
