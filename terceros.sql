-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2025 a las 13:41:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tesoreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terceros`
--

CREATE TABLE `terceros` (
  `id` int(11) NOT NULL,
  `tipo_documento` varchar(3) DEFAULT NULL,
  `razon_social` varchar(255) NOT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(1000) NOT NULL,
  `saldo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `terceros`
--

INSERT INTO `terceros` (`id`, `tipo_documento`, `razon_social`, `telefono`, `correo`, `direccion`, `saldo`) VALUES
(1, 'CC', 'PRUEBAS 1', '3147483647', 'pruebas1@gmail.com', 'calle 10', 100000),
(2, 'NIT', 'PRUEBAS 2', '3147483647', 'pruebas2@gmail.com', 'calle 11', 200000),
(3, 'CC', 'PRUEBAS 3', '3147483647', 'pruebas3@gmail.com', 'calle 12', 90000),
(4, 'NIT', 'PRUEBAS 4', '3147483647', 'pruebas4@gmail.com', 'calle 13', 150000),
(5, 'CC', 'PRUEBAS 5', '3147483647', 'pruebas5@gmail.com', 'calle 14', 110000),
(6, 'NIT', 'PRUEBAS 6', '3147483647', 'pruebas6@gmail.com', 'calle 15', 95000),
(7, 'CC', 'PRUEBAS 7', '3147483647', 'pruebas7@gmail.com', 'calle 16', 130000),
(8, 'CC', 'PRUEBAS 8', '3147483647', 'pruebas8@gmail.com', 'calle 17', 80000),
(9, 'NIT', 'PRUEBAS 9', '3147483647', 'pruebas9@gmail.com', 'calle 18', 140000),
(10, 'NIT', 'PRUEBAS 10', '3147483647', 'pruebas10@gmail.com', 'calle 19', 105000),
(11, 'NIT', 'PRUEBAS 11', '3147483647', 'pruebas11@gmail.com', 'calle 20', 125000),
(12, 'CC', 'PRUEBAS 12', '3101122334', 'pruebas12@gmail.com', 'calle 21', 650000),
(13, 'CC', 'PRUEBAS 13', '3223344556', 'pruebas13@gmail.com', 'calle 22', 700000),
(14, 'CC', 'PRUEBAS 14', '3015566778', 'pruebas14@gmail.com', 'calle 23', 750000),
(15, 'CC', 'PRUEBAS 15', '3157788990', 'pruebas15@gmail.com', 'calle 24', 800000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `terceros`
--
ALTER TABLE `terceros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `terceros`
--
ALTER TABLE `terceros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
