-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2017 a las 08:57:01
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
-- Base de datos: `cobao`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL,
  `clave` varchar(15) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `grado`, `clave`, `descripcion`) VALUES
(1, 'Matematicas', '1', 'BAMA-I', 'Con descripciÃ³n'),
(2, 'Quimica', '2', 'BAQU-II', 'AquÃ­ la descripciÃ³n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apaterno` varchar(255) DEFAULT NULL,
  `amaterno` varchar(255) DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(255) DEFAULT NULL,
  `rfc` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `curp` varchar(18) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `nombre`, `apaterno`, `amaterno`, `direccion`, `telefono`, `rfc`, `area`, `curp`, `email`) VALUES
(5, 'Leonel', 'Messi', 'A', 'Rosario', '7876543567', 'CCCC 234578 K90', 'Informatica', '', 'messi@contacto.com'),
(6, 'Javier', 'Blake', 'C', 'Ciudad de MÃ©xico', '89876543456', 'BJBJ123456L90', 'MÃºsica', 'BBBB 444444 HDFKSO', 'javier@contacto.com'),
(7, 'Juan', 'Roman', 'Riquelme', 'Buenos Aires', '878787888999', 'ASDF1234456K98', 'MatemÃ¡ticas', '', 'el@contacto.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `apaterno` varchar(30) DEFAULT NULL,
  `amaterno` varchar(30) DEFAULT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL,
  `num_control` varchar(15) DEFAULT NULL,
  `escuela_proce` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `apaterno`, `amaterno`, `curp`, `grado`, `num_control`, `escuela_proce`, `email`, `fecha_nac`, `estado`) VALUES
(1, 'Emma', 'Watson', 'de Bernal', 'WABE890708MLODHS09', '1', '20177000', 'Secundaria Uno', 'emma@cobao.com', '1989-08-09', '1'),
(2, 'Andres', 'Iniesta', 'Abc', 'INAA811209HJDLSM03', '2', '20177001', 'Secundaria Uno', 'andres@cobao.com', '1988-08-09', '1'),
(3, 'asdas', 'askdmsa', 'daspdpsao', 'dapsdkapsod', '1', '20177002', 'asdapd', 'adas@adas', '1999-09-09', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `idper` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `password`, `email`, `tipo`, `idper`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'admin@admin.com', '0', '5'),
(10, 'asdasasd as', '827ccb0eea8a706c4c34a16891f84e7b', 'asdas@asd.cd', '0', '4'),
(11, 'Blake C Javier', '6142a88d730b9aa48eed872142467129', 'javier@contacto.com', '1', '6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
