-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2017 a las 08:41:07
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acreditacionbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acreditacion`
--

CREATE TABLE `acreditacion` (
  `ACT_ID` int(11) NOT NULL,
  `ACT_ANIO` date NOT NULL,
  `ACT_ACREDITACION` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acreditacion`
--

INSERT INTO `acreditacion` (`ACT_ID`, `ACT_ANIO`, `ACT_ACREDITACION`) VALUES
(0, '0000-00-00', 'Carrera no acreditada'),
(1, '2015-12-01', 'Carrera acreditada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `ALM_ID` int(11) NOT NULL,
  `ALM_RUT` varchar(12) NOT NULL,
  `ALM_NOMBRE` varchar(12) NOT NULL,
  `ALM_APELLIDOS` varchar(12) NOT NULL,
  `CRR_ID` int(11) NOT NULL,
  `STA_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`ALM_ID`, `ALM_RUT`, `ALM_NOMBRE`, `ALM_APELLIDOS`, `CRR_ID`, `STA_ID`) VALUES
(1, '22767921-2', 'Cristian', 'Sanchez', 2, 1),
(2, '22987456-1', 'Emmanuel', 'Ortiz', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `ASG_ID` int(11) NOT NULL,
  `ASG_NOMBRE` varchar(70) NOT NULL,
  `ASG_SECCION` varchar(70) NOT NULL,
  `ALM_ID` int(11) NOT NULL,
  `DCT_ASIGNATURA` int(11) NOT NULL,
  `CRR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`ASG_ID`, `ASG_NOMBRE`, `ASG_SECCION`, `ALM_ID`, `DCT_ASIGNATURA`, `CRR_ID`) VALUES
(11, 'Contabilidad', '70', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `CRR_ID` int(11) NOT NULL,
  `CRR_NOMBRE` varchar(70) NOT NULL,
  `ACT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`CRR_ID`, `CRR_NOMBRE`, `ACT_ID`) VALUES
(1, 'Ingeniería Agrícola', 0),
(2, 'Ingeniería Forestal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `DCT_ID` int(11) NOT NULL,
  `DCT_RUT` varchar(12) NOT NULL,
  `DCT_NOMBRE` varchar(70) NOT NULL,
  `DCT_APELLIDOS` varchar(70) NOT NULL,
  `ASG_ID` int(11) NOT NULL,
  `STD_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`DCT_ID`, `DCT_RUT`, `DCT_NOMBRE`, `DCT_APELLIDOS`, `ASG_ID`, `STD_ID`) VALUES
(1, '17260153-2', 'Jorge', 'Gonzalez', 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `ECT_ID` int(11) NOT NULL,
  `ECT_CANT_ENCUESTAS` int(11) NOT NULL,
  `ECT_FECHA` date NOT NULL,
  `ECT_RESULTADO` int(11) NOT NULL,
  `ALM_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`ECT_ID`, `ECT_CANT_ENCUESTAS`, `ECT_FECHA`, `ECT_RESULTADO`, `ALM_ID`) VALUES
(0, 800, '2017-06-01', 20, 1),
(1, 1500, '2017-06-02', 40, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `MTC_ID` int(11) NOT NULL,
  `MTC_CANTIDAD` int(11) NOT NULL,
  `MTC_FECHA` date NOT NULL,
  `MTC_JORNADA` varchar(70) NOT NULL,
  `ALM_ID` int(11) NOT NULL,
  `CRR_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`MTC_ID`, `MTC_CANTIDAD`, `MTC_FECHA`, `MTC_JORNADA`, `ALM_ID`, `CRR_ID`) VALUES
(1, 30, '2015-06-06', 'Vespertino', 2, 2),
(3, 25, '2011-06-01', 'Diurna', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situacionalumno`
--

CREATE TABLE `situacionalumno` (
  `STA_ID` int(11) NOT NULL,
  `STA_ESTADO` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `situacionalumno`
--

INSERT INTO `situacionalumno` (`STA_ID`, `STA_ESTADO`) VALUES
(0, 'Estudios Congelados'),
(1, 'No titulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `situaciondocente`
--

CREATE TABLE `situaciondocente` (
  `STD_ID` int(11) NOT NULL,
  `STD_CAPACITACION` varchar(70) NOT NULL,
  `STD_POSTGRADO` varchar(70) NOT NULL,
  `ECT_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `situaciondocente`
--

INSERT INTO `situaciondocente` (`STD_ID`, `STD_CAPACITACION`, `STD_POSTGRADO`, `ECT_ID`) VALUES
(0, 'Sin capacitaciones', 'Sin postgrado', 0),
(1, 'Office nivel basico', 'Postgrado Gestión publica', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acreditacion`
--
ALTER TABLE `acreditacion`
  ADD PRIMARY KEY (`ACT_ID`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`ALM_ID`),
  ADD KEY `STA_ID` (`STA_ID`),
  ADD KEY `CRR_ID` (`CRR_ID`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`ASG_ID`),
  ADD KEY `CRR_ID` (`CRR_ID`),
  ADD KEY `CRR_ID_2` (`CRR_ID`),
  ADD KEY `CRR_ID_3` (`CRR_ID`),
  ADD KEY `ALM_ID` (`ALM_ID`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`CRR_ID`),
  ADD KEY `ACT_ID` (`ACT_ID`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`DCT_ID`),
  ADD KEY `STD_ID` (`STD_ID`),
  ADD KEY `ASG_ID` (`ASG_ID`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`ECT_ID`),
  ADD KEY `ALM_ID` (`ALM_ID`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`MTC_ID`),
  ADD KEY `CRR_ID` (`CRR_ID`),
  ADD KEY `ALM_ID` (`ALM_ID`);

--
-- Indices de la tabla `situacionalumno`
--
ALTER TABLE `situacionalumno`
  ADD PRIMARY KEY (`STA_ID`);

--
-- Indices de la tabla `situaciondocente`
--
ALTER TABLE `situaciondocente`
  ADD PRIMARY KEY (`STD_ID`),
  ADD KEY `ECT_ID` (`ECT_ID`),
  ADD KEY `ECT_ID_2` (`ECT_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `ALM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `CRR_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `DCT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `MTC_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`STA_ID`) REFERENCES `situacionalumno` (`STA_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`CRR_ID`) REFERENCES `carreras` (`CRR_ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`CRR_ID`) REFERENCES `carreras` (`CRR_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaturas_ibfk_2` FOREIGN KEY (`ALM_ID`) REFERENCES `alumnos` (`ALM_ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `carreras_ibfk_1` FOREIGN KEY (`ACT_ID`) REFERENCES `acreditacion` (`ACT_ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`STD_ID`) REFERENCES `situaciondocente` (`STD_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `docente_ibfk_2` FOREIGN KEY (`ASG_ID`) REFERENCES `asignaturas` (`ASG_ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `encuestas_ibfk_1` FOREIGN KEY (`ALM_ID`) REFERENCES `alumnos` (`ALM_ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`CRR_ID`) REFERENCES `carreras` (`CRR_ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`ALM_ID`) REFERENCES `alumnos` (`ALM_ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `situaciondocente`
--
ALTER TABLE `situaciondocente`
  ADD CONSTRAINT `situaciondocente_ibfk_1` FOREIGN KEY (`ECT_ID`) REFERENCES `encuestas` (`ECT_ID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
