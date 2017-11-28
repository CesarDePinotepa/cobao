-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2017 a las 16:45:45
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

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
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` text,
  `ruta2` varchar(100) DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL,
  `estu_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `calificacion_id` int(11) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`, `descripcion`, `ruta2`, `fechaFin`, `ruta`, `estu_id`, `materia_id`, `docente_id`, `calificacion_id`, `estado`) VALUES
(1, 'Practica 1', 'Esto es un comentario de prueba.', NULL, '2017-11-30', '../../archivos/AcuseRFC.pdf', NULL, 3, 8, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `id` int(11) NOT NULL,
  `actividad_id` int(11) DEFAULT NULL,
  `materia_id` int(11) DEFAULT NULL,
  `estu_id` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `ruta` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `actividad_id`, `materia_id`, `estu_id`, `calificacion`, `ruta`) VALUES
(1, 1, 3, 1, 7, '../../archivos/AcuseRFC.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario_foro`
--

CREATE TABLE `comentario_foro` (
  `id_comentario` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `fecha` date NOT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario_foro`
--

INSERT INTO `comentario_foro` (`id_comentario`, `id_tema`, `id_usuario`, `comentario`, `fecha`, `activo`) VALUES
(2, 1, 1, 'Esta es una respuesta', '2017-11-26', 1),
(3, 1, 1, 'Respuesta de un estudiante', '2017-11-26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `grado` char(1) DEFAULT NULL,
  `clave` varchar(15) NOT NULL,
  `descripcion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `grado`, `clave`, `descripcion`) VALUES
(1, 'Matematicas', '1', 'BAMA-I', 0),
(2, 'Quimica', '2', 'BAQU-II', 0),
(3, 'InformÃ¡tica ', '1', 'ESIN-I', 0),
(4, 'Historia Universal', '3', 'CSHIS-III', 0);

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
(105, 'Leonel', 'Messi', 'A', 'Rosario', '7876543567', 'CCCC 234578 K90', 'Informatica', '', 'messi@contacto.com'),
(106, 'Javier', 'Blake', 'C', 'Ciudad de MÃ©xico', '89876543456', 'BJBJ123456L90', 'MÃºsica', 'BBBB 444444 HDFKSO', 'javier@contacto.com'),
(107, 'Juan', 'Roman', 'Riquelme', 'Buenos Aires', '878787888999', 'ASDF1234456K98', 'MatemÃ¡ticas', '', 'el@contacto.com'),
(108, 'Ismael', 'Fuentes ', 'de Garay', 'Col. Napoles, CDMX', '55763248', 'FUGI751113L09', 'MÃºsica', 'FUGI751113HDFJS034', 'tito@contacto.com');

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
  `estado` char(1) DEFAULT NULL,
  `grupo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_categoria`
--

CREATE TABLE `foro_categoria` (
  `id_forocategoria` int(11) NOT NULL,
  `categoria` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_categoria`
--

INSERT INTO `foro_categoria` (`id_forocategoria`, `categoria`) VALUES
(1, 'Preguntas'),
(2, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_foro`
--

CREATE TABLE `foro_foro` (
  `id_foro` int(11) NOT NULL,
  `id_forocategoria` int(11) NOT NULL,
  `foro` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_foro`
--

INSERT INTO `foro_foro` (`id_foro`, `id_forocategoria`, `foro`, `descripcion`) VALUES
(1, 2, 'Titulo de prueba', 'Esta es una descripcion de prueba.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_temas`
--

CREATE TABLE `foro_temas` (
  `id_tema` int(11) NOT NULL,
  `id_foro` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `contenido` text NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `activo` int(1) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `foro_temas`
--

INSERT INTO `foro_temas` (`id_tema`, `id_foro`, `titulo`, `contenido`, `fecha`, `id_usuario`, `activo`, `hits`) VALUES
(1, 1, 'Este es  un titulo de prueba', 'Este es un contenido de prueba.', '2017-11-25', 8, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `semestre` char(1) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `estudiante_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `nombre`, `semestre`, `clave`, `estudiante_id`) VALUES
(1, '101', '1', '2017101', NULL),
(2, '102', '1', '2017102', NULL),
(3, '103', '1', '2017103', NULL),
(4, '301', '3', '2017301', NULL),
(5, '302', '3', '2017302', NULL),
(6, '303', '3', '2017303', NULL),
(7, '501', '5', '2017501', NULL),
(8, '503', '5', '2017503', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_de_docente`
--

CREATE TABLE `materias_de_docente` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `estu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materias_de_docente`
--

INSERT INTO `materias_de_docente` (`id`, `curso_id`, `docente_id`, `estu_id`) VALUES
(5, 1, 5, NULL),
(6, 2, 5, NULL),
(7, 3, 8, NULL),
(8, 4, 8, NULL);

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
(11, 'Blake C Javier', '6142a88d730b9aa48eed872142467129', 'javier@contacto.com', '1', '6'),
(14, 'Fuentes de Garay Ismael', 'be4d6b9a0dc0f06a87c3c68daa0b1e07', 'tito@contacto.com', '1', '8');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario_foro`
--
ALTER TABLE `comentario_foro`
  ADD PRIMARY KEY (`id_comentario`);

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
-- Indices de la tabla `foro_categoria`
--
ALTER TABLE `foro_categoria`
  ADD PRIMARY KEY (`id_forocategoria`);

--
-- Indices de la tabla `foro_foro`
--
ALTER TABLE `foro_foro`
  ADD PRIMARY KEY (`id_foro`);

--
-- Indices de la tabla `foro_temas`
--
ALTER TABLE `foro_temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias_de_docente`
--
ALTER TABLE `materias_de_docente`
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
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `comentario_foro`
--
ALTER TABLE `comentario_foro`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `foro_categoria`
--
ALTER TABLE `foro_categoria`
  MODIFY `id_forocategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `foro_foro`
--
ALTER TABLE `foro_foro`
  MODIFY `id_foro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `foro_temas`
--
ALTER TABLE `foro_temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materias_de_docente`
--
ALTER TABLE `materias_de_docente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
