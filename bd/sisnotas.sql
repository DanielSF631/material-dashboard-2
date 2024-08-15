-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2023 a las 19:41:45
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisnotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `ci` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `rol` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id_admin`, `nombres`, `apellidos`, `ci`, `celular`, `rol`, `usuario`, `contrasena`) VALUES
(1, 'daniel apaza huanca', '', 9136352, 63141303, 1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigmateriaestu`
--

CREATE TABLE `asigmateriaestu` (
  `id_asignacion` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asigmateriaestu`
--

INSERT INTO `asigmateriaestu` (`id_asignacion`, `id_estudiante`, `id_materia`, `id_horario`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 2),
(3, 2, 3, 0),
(4, 2, 4, 0),
(5, 2, 2, 0),
(6, 2, 3, 2),
(7, 3, 1, 1),
(8, 3, 2, 0),
(9, 8, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignarmateriadocente`
--

CREATE TABLE `asignarmateriadocente` (
  `id_asignacion` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL,
  `id_horario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignarmateriadocente`
--

INSERT INTO `asignarmateriadocente` (`id_asignacion`, `id_materia`, `id_docente`, `id_horario`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 0),
(3, 3, 2, 0),
(4, 4, 2, 0),
(5, 1, 2, 0),
(6, 4, 3, 1),
(7, 4, 3, 1),
(8, 4, 3, 1),
(9, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `bimestre1` int(11) NOT NULL,
  `bimestre2` int(11) NOT NULL,
  `bimestre3` int(11) NOT NULL,
  `nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `id_estudiante`, `id_materia`, `bimestre1`, `bimestre2`, `bimestre3`, `nota`) VALUES
(1, 1, 1, 50, 45, 60, 7),
(2, 1, 2, 70, 45, 48, 0),
(5, 2, 2, 80, 100, 35, 0),
(6, 3, 1, 25, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre_carrera`) VALUES
(1, 'parvulario'),
(2, 'contabilidad'),
(3, 'administracion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

CREATE TABLE `cronograma` (
  `id_cronograma` int(11) NOT NULL,
  `materia` varchar(100) NOT NULL,
  `actividad` varchar(250) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cronograma`
--

INSERT INTO `cronograma` (`id_cronograma`, `materia`, `actividad`, `fecha`) VALUES
(1, 'legislacion', 'dasdasdsa', '2023-12-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_cuota` int(11) NOT NULL,
  `id_gestion` int(11) NOT NULL,
  `nombre_cuota` varchar(50) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `pagada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_cuota`, `id_gestion`, `nombre_cuota`, `monto`, `fecha_vencimiento`, `pagada`) VALUES
(1, 1, '1ra.', '250.00', '2023-08-21', 0),
(2, 1, '2da.', '250.00', '2023-08-21', 0),
(3, 1, '3ra.', '250.00', '2023-08-21', 0),
(4, 1, '4ta.', '250.00', '2023-08-21', 0),
(5, 1, '5ta.', '250.00', '2023-08-21', 0),
(6, 2, '1ra.', '250.00', '2023-09-26', 0),
(7, 2, '2da.', '250.00', '2023-08-21', 0),
(8, 2, '3ra.', '250.00', '2023-09-26', 0),
(9, 2, '4ta.', '250.00', '2023-08-21', 0),
(10, 2, '5ta.', '250.00', '2023-08-21', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_cursos` int(11) NOT NULL,
  `nombre_curso` varchar(80) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docentes` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `ci` int(11) NOT NULL,
  `celular` int(11) NOT NULL,
  `correro` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `profesion` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docentes`, `nombres`, `apellidos`, `ci`, `celular`, `correro`, `direccion`, `profesion`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'roger', 'chapi cusi', 2233434, 0, '', '', '', 'roger', 'roger', 2),
(2, 'andre', 'chapi alvarez', 43434335, 0, '', '', 'contador', 'andres', 'andres', 2),
(3, 'joel', 'lopez', 11112, 0, '', '', '', 'joel', 'joel', 2),
(4, 'alvaro', 'matha', 1223456, 23432, 'alvaro@gmail.com', 'las lomas', 'contador', '1223456', '1223456', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egreso`
--

CREATE TABLE `egreso` (
  `id_egreso` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `concepto` varchar(250) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `egreso`
--

INSERT INTO `egreso` (`id_egreso`, `fecha`, `concepto`, `monto`) VALUES
(1, '2023-09-05 07:38:43', 'pago mensualidad', '350.00'),
(2, '2023-09-05 12:10:26', 'compra de muebles ', '250.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `ci` int(11) NOT NULL,
  `celular` int(15) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `carrera` int(11) NOT NULL,
  `semestre_actual` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nombres`, `apellidos`, `ci`, `celular`, `correo`, `carrera`, `semestre_actual`, `usuario`, `contrasena`, `rol`) VALUES
(1, 'daniel', 'apaza', 9136352, 0, '0', 1, 1, 'sis9136352', 'daniel', 3),
(2, 'juan', 'apaza alcon', 631412023, 0, '0', 1, 2, 'juan', 'juan', 3),
(3, 'fernandos', 'apaza', 4343435, 0, '0', 1, 1, 'fer', 'fer', 3),
(6, 'juliio', 'capiona alcon', 9136352, 0, '', 2, 1, '', '', 3),
(7, 'angel', 'condoris', 9136353, 6314100, 'dragonussolitari@gmail.com', 3, 2, '', '', 0),
(8, 'ronaldo', 'callisaya ramos', 9136351, 6314100, 'ronaldo@gmail.com', 1, 2, '9136352', '9136352', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `id_gestion` int(11) NOT NULL,
  `nombre_gestion` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `gestion`
--

INSERT INTO `gestion` (`id_gestion`, `nombre_gestion`, `fecha_inicio`, `fecha_fin`, `estado`) VALUES
(1, '2023-1', '2023-02-06', '2023-07-28', 0),
(2, '2023-2', '2023-08-07', '2023-12-15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `dia_semana` varchar(50) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `dia_semana`, `hora_inicio`, `hora_fin`) VALUES
(1, 'lunes', '09:34:09', '12:34:09'),
(2, 'martes', '08:34:09', '11:34:09'),
(3, 'miercoles', '16:00:00', '18:00:00'),
(4, 'jueves', '19:00:00', '21:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `semestre` int(10) NOT NULL,
  `carrera` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre`, `semestre`, `carrera`) VALUES
(1, 'historia', 1, 0),
(2, 'legislacion', 1, 0),
(3, 'derecho', 2, 0),
(4, 'bases biologicas', 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pagos` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_cuota` int(11) NOT NULL,
  `cobrado` int(10) NOT NULL,
  `fecha_pago` datetime NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pagos`, `id_estudiante`, `id_cuota`, `cobrado`, `fecha_pago`, `estado`) VALUES
(1, 1, 1, 1, '2023-08-25 08:05:21', 0),
(2, 1, 2, 1, '2023-08-25 08:05:21', 0),
(3, 1, 3, 1, '2023-08-25 08:05:21', 0),
(4, 1, 4, 1, '2023-08-25 08:05:21', 0),
(5, 1, 5, 1, '2023-08-25 08:05:21', 0),
(6, 3, 1, 1, '2023-08-25 08:39:47', 0),
(7, 3, 2, 1, '2023-08-25 08:39:47', 0),
(8, 3, 3, 1, '2023-08-25 11:10:21', 0),
(9, 3, 4, 1, '2023-08-27 07:55:35', 0),
(10, 2, 1, 1, '2023-08-31 06:37:34', 0),
(11, 2, 2, 1, '2023-08-31 06:37:35', 0),
(30, 7, 1, 1, '2023-09-01 12:58:13', 0),
(31, 7, 2, 1, '2023-09-02 05:48:01', 0),
(32, 7, 2, 1, '2023-09-02 05:48:29', 0),
(33, 7, 2, 1, '2023-09-02 05:48:39', 0),
(34, 7, 2, 1, '2023-09-02 05:48:55', 0),
(35, 7, 3, 1, '2023-09-02 11:02:09', 0),
(36, 7, 4, 1, '2023-09-02 12:05:23', 0),
(37, 7, 5, 1, '2023-09-02 18:30:55', 0),
(38, 3, 5, 1, '2023-09-02 19:00:18', 0),
(39, 8, 1, 1, '2023-09-04 13:39:55', 0),
(40, 8, 2, 1, '2023-09-15 21:31:00', 0),
(41, 8, 3, 1, '2023-09-15 21:31:00', 0),
(42, 1, 6, 1, '2023-09-26 06:17:52', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `rol` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_roles`, `rol`) VALUES
(1, 'adminstrador'),
(2, 'profesor'),
(3, 'estudiante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `nombre`, `direccion`) VALUES
(1, 'El Alto', 'Calle 5, av. Jorge Carrasco'),
(2, 'La Paz', 'Plaza murillo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `asigmateriaestu`
--
ALTER TABLE `asigmateriaestu`
  ADD PRIMARY KEY (`id_asignacion`);

--
-- Indices de la tabla `asignarmateriadocente`
--
ALTER TABLE `asignarmateriadocente`
  ADD PRIMARY KEY (`id_asignacion`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`id_cronograma`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_cuota`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_cursos`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docentes`);

--
-- Indices de la tabla `egreso`
--
ALTER TABLE `egreso`
  ADD PRIMARY KEY (`id_egreso`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pagos`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `asigmateriaestu`
--
ALTER TABLE `asigmateriaestu`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `asignarmateriadocente`
--
ALTER TABLE `asignarmateriadocente`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `id_cronograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_cursos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docentes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `egreso`
--
ALTER TABLE `egreso`
  MODIFY `id_egreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `gestion`
--
ALTER TABLE `gestion`
  MODIFY `id_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
