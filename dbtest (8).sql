-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2017 a las 00:23:16
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbtest`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `idhabitacion` int(11) NOT NULL,
  `habTipo` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`idhabitacion`, `habTipo`, `id`) VALUES
(1, 'Individual', 0),
(2, 'Doble', 0),
(3, 'Triple', 0),
(4, 'Junior', 0),
(5, 'Suite', 0),
(6, 'Suite Nupcial', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL,
  `hotelNom` varchar(50) NOT NULL,
  `hotelDir` varchar(500) NOT NULL,
  `hotelTelf` varchar(50) NOT NULL,
  `hotelHab` varchar(300) NOT NULL,
  `hotelPrecioD` int(50) NOT NULL,
  `hotelPrecioH` int(50) NOT NULL,
  `idusers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id`, `hotelNom`, `hotelDir`, `hotelTelf`, `hotelHab`, `hotelPrecioD`, `hotelPrecioH`, `idusers`) VALUES
(18, 'Podocarpus', 'Jose A. Eguiguren 16-50 entre 18 de Noviembre y Av. Universitaria', '(593) 7 2584912 y 7 2581428', 'Doble', 25, 180, 15),
(19, 'Grand Hotel Loja', 'Av. Manuel AgustÃ­n Aguirre y Rocafuerte esquina.', '(593 7) 2575200 2575201 Fax: 2575202', 'Triple', 30, 190, 17),
(20, 'Romar Royal', '18 de Noviembre y JosÃ© Antonio Eguiguren', '(+593) 7 258 2888', 'Individual', 33, 70, 17),
(21, 'Quo Vadis', 'Av. Isidro Ayora y Av. 8 de Diciembre', 'PBX: 593 - 7 - 2581805 / 2613964', 'Junior\nDoble\nTriple', 47, 170, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `idlugares` int(11) NOT NULL,
  `lugNom` varchar(50) NOT NULL,
  `lugDes` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`idlugares`, `lugNom`, `lugDes`, `id`) VALUES
(1, 'gg', '0', 21),
(2, 'Parque Bolivar', 'SimÃ³n Bolivar de la ciudad de Loja, levantado en homenaje al Tratado Binacional de Paz de ItamaratÃ­', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `idpromo` int(11) NOT NULL,
  `promoDes` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `promociones`
--

INSERT INTO `promociones` (`idpromo`, `promoDes`, `id`) VALUES
(1, 'Mitad de precio', 19),
(2, 'Reserva con nosotros un mÃ­nimo de 3 dÃ­as consecutivos y recibe 10% de descuento en el total de tu co', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `idservicio` int(11) NOT NULL,
  `serDes` varchar(500) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`idservicio`, `serDes`, `id`) VALUES
(35, 'sdsd', 18),
(36, 'xcxc', 39),
(37, 'gg', 39);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `rol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idusers`, `userName`, `userEmail`, `userPass`, `rol`) VALUES
(15, 'hoteloja', 'hoteloja@gmail.com', '51ae8fd3f6b52ffee652ce53ee3e1b8deda4a6238c66d406eac1de447f10814a', 0),
(16, 'administrador', 'administrador@gmail.com', 'b20b0f63ce2ed361e8845d6bf2e59811aaa06ec96bcdb92f9bc0c5a25e83c9a6', 1),
(17, 'maherrera', 'maherrera@utpl.edu.ec', '7ce93e1237509b8e21081989be8979d3762e303173f64aada20bb5ed658083f9', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`idhabitacion`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`idlugares`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`idpromo`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  MODIFY `idhabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `idlugares` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `idpromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
