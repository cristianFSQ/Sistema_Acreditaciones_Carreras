-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2017 a las 23:22:59
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acreditacion2.0`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ALM_ID` int(11) NOT NULL,
  `ALM_NOMBRE` varchar(70) NOT NULL,
  `ALM_APELLIDO` varchar(70) NOT NULL,
  `ALM_CARRERA` varchar(70) NOT NULL,
  `ALM_SITUACION` varchar(15) NOT NULL,
  `ALM_ANIO_MATRICULA` varchar(20) NOT NULL,
  `ALM_CREDITO_AVAL` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ALM_ID`, `ALM_NOMBRE`, `ALM_APELLIDO`, `ALM_CARRERA`, `ALM_SITUACION`, `ALM_ANIO_MATRICULA`, `ALM_CREDITO_AVAL`) VALUES
(1, 'Mauricio', 'Rivas', 'Ing.Informatica', 'Egresado', '2014', 'si'),
(2, 'Gisselle', 'Coronado', 'Ing.Informatica', 'Estudiante', '2012', 'si'),
(3, 'Cristian', 'Sanchez', 'Ing.Informatica', 'Estudiante', '2009', 'no'),
(4, 'uno', 'unito', 'Ing. Informatica', 'congelado', '2011', 'no'),
(5, 'unos', 'unito', 'Ing. Informatica', 'congelado', '2013', 'no'),
(6, 'unosds', 'unito', 'Ing. Informatica', 'congelado', '2013', 'no'),
(7, 'Luca', 'Jara', 'Ing. Informatica', 'egresado', '2015', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `ID_CARRERA` int(11) NOT NULL,
  `CRR_NOMBRE` varchar(70) NOT NULL,
  `CRR_MATRICULAS_ACTIVAS` int(11) NOT NULL,
  `CRR_SITUACION` varchar(20) NOT NULL,
  `CRR_TITULADOS` int(11) NOT NULL,
  `CRR_ACREDITADA` varchar(10) NOT NULL,
  `CRR_TIPO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`ID_CARRERA`, `CRR_NOMBRE`, `CRR_MATRICULAS_ACTIVAS`, `CRR_SITUACION`, `CRR_TITULADOS`, `CRR_ACREDITADA`, `CRR_TIPO`) VALUES
(1, 'INGENIERIA INFORMATICA', 2000, 'ACTIVA', 350, 'si', 'ingenieria'),
(2, 'INGENIERIA COMERCIAL', 100, 'ACTIVA', 800, 'si', 'ingenieria'),
(3, 'INGENIERIA ADMINISTRACION', 100, 'ACTIVA', 800, 'si', 'ingenieria'),
(4, 'ENFERMERIA', 500, 'ACTIVA', 1, 'no', 'medicina'),
(5, 'ANALISTA PROGRAMADOR', 2593, 'ACTIVA', 4, 'no', 'tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `DCT_ID` int(11) NOT NULL,
  `DCT_RUT` varchar(12) NOT NULL,
  `DCT_NOMBRE` varchar(70) NOT NULL,
  `DCT_APELLIDO` varchar(70) NOT NULL,
  `DCT_POSTGRADO` varchar(10) NOT NULL,
  `DCT_CAPACITACION` varchar(10) NOT NULL,
  `DCT_PORCENTAJE_ED` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`DCT_ID`, `DCT_RUT`, `DCT_NOMBRE`, `DCT_APELLIDO`, `DCT_POSTGRADO`, `DCT_CAPACITACION`, `DCT_PORCENTAJE_ED`) VALUES
(1, '19195223-5', 'mauricio', 'riuvas', 'si', 'si', 75),
(2, '15151515', 'gisselle', 'coronado', 'no', 'no', 50),
(3, '65816511', 'cristian', 'sanchez', 'si', 'si', 72),
(4, '1615613', 'Lucas', 'Jara', 'si', 'si', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `rut` varchar(15) NOT NULL,
  `usuario` varchar(70) NOT NULL,
  `clave` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `rut`, `usuario`, `clave`) VALUES
(1, 'mauricio', 'rivas guevara', '19195223-5', 'elmabri', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ALM_ID`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`ID_CARRERA`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`DCT_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ALM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `ID_CARRERA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `DCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;