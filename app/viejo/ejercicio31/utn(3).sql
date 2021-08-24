-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2021 a las 15:56:05
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `utn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `codigo_de_barra` varchar(6) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `fecha_de_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) VALUES
(1, '900361', 'Westmacott', 'liquido', 33, 15.87, '2021-02-09', '2020-09-26'),
(2, '900362', 'Spirit', 'solido', 45, 66.6, '2020-09-18', '2020-04-14'),
(3, '900363', 'Newgrosh', 'polvo', 0, 68.19, '2020-11-29', '2021-02-11'),
(4, '900364', 'McNickle', 'polvo', 0, 53.51, '2020-11-28', '2020-04-17'),
(5, '900365', 'Hudd', 'solido', 68, 66.6, '2020-12-19', '2020-06-19'),
(6, '900366', 'Schrader', 'polvo', 0, 96.54, '2020-08-02', '2020-04-18'),
(7, '900367', 'Bachellier', 'solido', 59, 66.6, '0202-01-30', '2020-06-07'),
(8, '900368', 'Fleming', 'solido', 38, 66.6, '2020-10-26', '2020-10-03'),
(9, '900369', 'Hurry', 'solido', 44, 66.6, '2020-07-04', '2020-05-30'),
(11, '000001', 'chocolate', 'solido', 0, 66.6, '0000-00-00', '0000-00-00'),
(12, '123456', 'asrock', 'mother', 16, 10050, '2021-04-27', '2021-04-27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_de_registro` date NOT NULL,
  `localidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) VALUES
(1, 'Mariano', 'Kautor', '123456', 'dkantor0@example.com', '2020-01-07', 'Quilmes'),
(2, 'German', 'Gerram', '123456', 'ggerram1@hud.gov', '2020-05-08', 'Berazategui'),
(3, 'Deloris', 'Fosis', '123456', 'bsharpe2@wisc.edu', '2020-11-28', 'Avellaneda'),
(4, 'Brok', 'Neiner', '123456', 'bblazic3@desdev.cn', '2020-12-08', 'Quilmes'),
(5, 'Garrick', 'Brent', '123456', 'gbrent4@theguardian.com', '2020-12-17', 'Moron'),
(6, 'Bili', 'Baus', '123456', 'bhoff5@addthis.com', '2020-11-27', 'Moreno'),
(8, 'nico', 'per', '9876', 'dsf@jjj.poosa', '2021-04-21', ''),
(9, 'nicottt', 'pertt', '98763', 'dsf@jjj.poosa', '2021-04-21', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_de_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id`, `id_producto`, `id_usuario`, `cantidad`, `fecha_de_venta`) VALUES
(1, 1, 1, 2, '2020-07-19'),
(2, 8, 2, 3, '2020-08-16'),
(3, 7, 2, 4, '2021-01-24'),
(4, 6, 3, 5, '2021-01-24'),
(5, 3, 4, 6, '2021-03-30'),
(6, 5, 5, 7, '2021-02-22'),
(7, 3, 4, 6, '2020-12-02'),
(8, 3, 6, 6, '2020-06-10'),
(9, 2, 6, 6, '2021-02-04'),
(10, 1, 6, 1, '2020-05-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
