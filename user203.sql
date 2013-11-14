-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-11-2013 a las 13:33:14
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `user203`
--
CREATE DATABASE IF NOT EXISTS `user203` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `user203`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academia`
--

CREATE TABLE IF NOT EXISTS `academia` (
  `idAcademia` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  PRIMARY KEY (`idAcademia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `academia`
--

INSERT INTO `academia` (`idAcademia`, `nombre`) VALUES
(1, 'Computación básica'),
(2, 'Programación básica'),
(3, 'Estructuras y algoritmos'),
(4, 'Ingeniería de software'),
(5, 'Sistemas de Información'),
(6, 'Sistemas Digitales'),
(7, 'Software de Sistemas'),
(8, 'Técnicas Modernas de Prog');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativo`
--

CREATE TABLE IF NOT EXISTS `administrativo` (
  `codigo` int(11) NOT NULL,
  `contrasena` varchar(40) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidoP` varchar(15) NOT NULL,
  `apellidoM` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrativo`
--

INSERT INTO `administrativo` (`codigo`, `contrasena`, `nombre`, `apellidoP`, `apellidoM`, `correo`) VALUES
(20759111, 'abraham', 'Abraham Humberto', 'Mercado', 'Godoy', 'amg_186@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(40) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidoP` varchar(15) NOT NULL,
  `apellidoM` varchar(15) NOT NULL,
  `carrera` varchar(20) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `status` varchar(10) NOT NULL,
  `Github` varchar(30) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `WebPage` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `Codigo_UNIQUE` (`codigo`),
  UNIQUE KEY `Correo_UNIQUE` (`correo`),
  UNIQUE KEY `Github_UNIQUE` (`Github`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=297596112 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`codigo`, `contrasena`, `nombre`, `apellidoP`, `apellidoM`, `carrera`, `correo`, `status`, `Github`, `celular`, `WebPage`) VALUES
(87466, 'DQRh8Lr5uHmsAwXa', 'nhsk', 'hbkj', 'hbjk', 'INF', 'ajmgo2_186@hotmail.com', 'Activo', NULL, NULL, NULL),
(388383, 'VUGT2rg21GJeHfi5', 'wwwwwwwwww', 'jn', 'jk', 'INF', 'hb@jdjd.com', 'Activo', NULL, NULL, NULL),
(1235677, '12347890', 'Abraham', 'Mercado', 'Godoy', 'INF', 'amg_186@hotmail.com', 'Activo', NULL, NULL, NULL),
(1235678, 'JThUEkthJ0dzEzPU', 'bu', 'bi', 'nji', 'INF', 'ajmg_186@hotmail.com', 'Activo', NULL, NULL, NULL),
(297596111, 'UexbblEY7Xg3Q4Vt', 'Zarai', 'Sanchez', 'Martinez', 'INF', 'aa98@hotmail.com', 'Activo', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE IF NOT EXISTS `asistencia` (
  `idAsistencia` int(11) NOT NULL,
  `dia` date NOT NULL,
  `codigo` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idAsistencia`),
  KEY `fk_Asistencia_Alumno1` (`codigo`),
  KEY `fk_Asistencia_Curso1` (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo`
--

CREATE TABLE IF NOT EXISTS `ciclo` (
  `idCiclo` int(11) NOT NULL AUTO_INCREMENT,
  `ciclo` varchar(5) NOT NULL,
  `fechaIni` date NOT NULL,
  `fechaFin` date NOT NULL,
  PRIMARY KEY (`idCiclo`),
  UNIQUE KEY `Ciclo_UNIQUE` (`ciclo`),
  UNIQUE KEY `idCiclo_UNIQUE` (`idCiclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45683 ;

--
-- Volcado de datos para la tabla `ciclo`
--

INSERT INTO `ciclo` (`idCiclo`, `ciclo`, `fechaIni`, `fechaFin`) VALUES
(45682, '2014B', '2013-11-04', '2013-11-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterioevalucion`
--

CREATE TABLE IF NOT EXISTS `criterioevalucion` (
  `idCriterio` int(11) NOT NULL AUTO_INCREMENT,
  `idCurso` int(11) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `porcentaje` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCriterio`),
  UNIQUE KEY `idCriterio_UNIQUE` (`idCriterio`),
  KEY `fk_CriterioEvalucion_Curso1` (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idCurso` int(11) NOT NULL AUTO_INCREMENT,
  `idMateria` int(11) NOT NULL,
  `seccion` varchar(3) NOT NULL,
  `NRC` int(11) NOT NULL,
  `idCiclo` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`idCurso`),
  UNIQUE KEY `NRC_UNIQUE` (`NRC`),
  UNIQUE KEY `idCurso_UNIQUE` (`idCurso`),
  KEY `fk_Curso_Ciclo1` (`idCiclo`),
  KEY `fk_Curso_Maestro1` (`codigo`),
  KEY `Seccion_UNIQUE` (`seccion`),
  KEY `idMateria` (`idMateria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`idCurso`, `idMateria`, `seccion`, `NRC`, `idCiclo`, `codigo`) VALUES
(8, 5, 'D03', 2455, 45682, 200000004);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasfestivos`
--

CREATE TABLE IF NOT EXISTS `diasfestivos` (
  `idDiasFestivos` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `idCiclo` int(11) NOT NULL,
  PRIMARY KEY (`idDiasFestivos`),
  UNIQUE KEY `idDiasFestivos_UNIQUE` (`idDiasFestivos`),
  KEY `fk_DiasFestivos_Ciclo` (`idCiclo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horariocurso`
--

CREATE TABLE IF NOT EXISTS `horariocurso` (
  `idHorario` int(11) NOT NULL AUTO_INCREMENT,
  `dia` varchar(9) NOT NULL,
  `horaIni` int(11) NOT NULL,
  `horaFin` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  PRIMARY KEY (`idHorario`),
  UNIQUE KEY `idHorario_UNIQUE` (`idHorario`),
  KEY `fk_HorarioCurso_Curso1` (`idCurso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE IF NOT EXISTS `maestro` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `contrasena` varchar(40) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidoP` varchar(15) NOT NULL,
  `apellidoM` varchar(15) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `Codigo_UNIQUE` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=200000005 ;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`codigo`, `contrasena`, `nombre`, `apellidoP`, `apellidoM`, `correo`) VALUES
(200000004, '2c10524f865a67e55f65277564b2bbb39fcdf3c6', 'Patricia', 'Mendoza', 'Sanchez', 'aa98@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `clave` char(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `idAcademia` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMateria`),
  KEY `idAcademia` (`idAcademia`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `clave`, `nombre`, `idAcademia`) VALUES
(1, 'CC100', 'Introducción a la Computación', 1),
(2, 'CC101', 'Taller de Introducción a la Computación', 1),
(3, 'CC102', 'Introducción a la Programación', 2),
(4, 'CC103', 'Taller de Programación Estructurada', 2),
(5, 'CC108', 'Programación Estructurada', 2),
(6, 'CC109', 'Programación para Interfaces', 8),
(7, 'CC200', 'Programación Orientada a Objetos', 8),
(8, 'CC201', 'Taller de Programación Orientada a Objet', 8),
(9, 'CC202', 'Estructura de Datos', 3),
(10, 'CC203', 'Taller de Estructura de Datos', 3),
(11, 'CC204', 'Estructura de Archivos', 3),
(12, 'CC205', 'Taller de Estructura de Archivos', 3),
(13, 'CC206', 'Programación de Sistemas', 7),
(14, 'CC207', 'Taller de Programación de Sistemas', 7),
(15, 'CC208', 'Lenguajes de Programación Comparados', 8),
(16, 'CC209', 'Teoría de la Computación', 3),
(17, 'CC210', 'Arquitectura de Computadoras', 6),
(18, 'CC211', 'Teleinformática', 6),
(19, 'CC212', 'Redes de Computadoras', 6),
(20, 'CC213', 'Taller de Redes de Computadoras', 6),
(21, 'CC300', 'Sistemas Operativos', 7),
(22, 'CC301', 'Taller de Sistemas Operativos', 7),
(23, 'CC302', 'Bases de Datos', 5),
(24, 'CC303', 'Taller de Bases de Datos', 5),
(25, 'CC304', 'Ingeniería de Software I', 4),
(26, 'CC305', 'Ingenieria de Software II', 4),
(27, 'CC306', 'Taller de Ingenieria de Software II', 4),
(28, 'CC307', 'Programación Lógica y Funcional', 8),
(29, 'CC308', 'Taller de Programación Lógica y Funciona', 8),
(30, 'CC309', 'Bases de Datos Avanzadas', 5),
(31, 'CC310', 'Taller de Bases de Datos Avanzadas', 5),
(32, 'CC311', 'Gráficas por Computadora', 7),
(33, 'CC312', 'Taller de Gráficas por Computadora', NULL),
(34, 'CC313', 'Administración de Bases de Datos', 5),
(35, 'CC314', 'Taller de Administración de Bases de Dat', 5),
(36, 'CC315', 'Sistemas de Información Administrativos', 5),
(37, 'CC316', 'Análisis y Diseño de Algoritmos', 3),
(38, 'CC317', 'Compiladores', NULL),
(39, 'CC318', 'Taller de Compiladores', 7),
(40, 'CC319', 'Sistemas Operativos Avanzados', 7),
(41, 'CC320', 'Taller de Sistemas Operativos Avanzados', 7),
(42, 'CC321', 'Fundamentos de Ingeniería de Software', 4),
(43, 'CC322', 'Organización de Computadoras I', 6),
(44, 'CC323', 'Organización de Computadoras II', 6),
(45, 'CC324', 'Redes de Computadoras Avanzadas', 6),
(46, 'CC325', 'Taller de Redes Avanzadas', 6),
(47, 'CC400', 'Sistemas Expertos', 8),
(48, 'CC401', 'Programación de Sistemas Multimedia', 5),
(49, 'CC402', 'Taller de Sistemas Multimedia', 5),
(50, 'CC403', 'Auditoría de Sistemas', 4),
(51, 'CC404', 'Sistemas de Información Financieros', 5),
(52, 'CC405', 'Sistemas de Información para la Manufact', 5),
(53, 'CC406', 'Sistemas de Información para la Toma de ', 5),
(54, 'CC407', 'Proyecto Terminal', 4),
(55, 'CC408', 'Simulación de Sistemas Digitales', 6),
(56, 'CC409', 'Arquitectura de Computadoras Avanzada', 6),
(57, 'CC410', 'Redes Neuronales Artificiales', 8),
(58, 'CC411', 'Computación Tolerante a Fallas', 7),
(59, 'CC413', 'Programación Concurrente y Distribuida', 7),
(60, 'CC414', 'Taller de Programacion Concurrente y Dis', 7),
(61, 'CC415', 'Inteligencia Artificial', 8),
(62, 'CC417', 'Tópicos Selectos de Computación I (Robót', 7),
(63, 'CC417', 'Tópicos Selectos de Computación I (Admin', 7),
(64, 'CC417', 'Tópicos Selectos de Computación I (Contr', 4),
(65, 'CC418', 'Tópicos Selectos de Computación II (Unix', 7),
(66, 'CC419', 'Topicos Selectos de Computación III (Jav', 8),
(67, 'CC419', 'Topicos Selectos de Computación III (Pro', 8),
(68, 'CC420', 'Tópicos Selectos de Informática I (Progr', 7),
(69, 'CC420', 'Tópicos Selectos de Informática I (Inter', 6),
(70, 'CC420', 'Tópicos Selectos de Informática I (Comer', 4),
(71, 'CC421', 'Tópicos Selectos de Informática II (Prog', 7),
(72, 'CC421', 'Tópicos Selectos de Informática II', 8),
(73, 'CC421', 'Tópicos Selectos de Informática II', 4),
(74, 'CC422', 'Tópicos Selectos de Informática III (C#)', 8),
(75, 'CC422', 'Tópicos Selectos de Informática III (Sof', 7),
(76, 'I5882', 'Programación', NULL),
(77, 'I5883', 'Seminario de Solución de Problemas de Pr', NULL),
(78, 'I5884', 'Algoritmia', NULL),
(79, 'I5885', 'Seminario de Solución de Problemas de Al', NULL),
(80, 'I5886', 'Estructuras de Datos I', NULL),
(81, 'I5887', 'Seminario de Solución de Problemas de Es', NULL),
(82, 'I5888', 'Estructuras de Datos II', NULL),
(83, 'I5889', 'Seminario de Solución de Problemas de Es', NULL),
(84, 'I5890', 'Bases de Datos', NULL),
(85, 'I5891', 'Seminario de Solución de Problemas de Ba', NULL),
(86, 'I5898', 'Ingeniería de Software I', NULL),
(87, 'I5899', 'Seminario de Solución de Problemas de In', NULL),
(88, 'I5900', 'Ingeniería de Software II', NULL),
(89, 'I5902', 'Administración de Bases de Datos', NULL),
(90, 'I5903', 'Uso, Adaptación y Explotación de Sistema', NULL),
(91, 'I5904', 'Seminario de Solución de Problemas de Us', NULL),
(92, 'I5905', 'Seguridad de la Información', NULL),
(93, 'I5906', 'Almacenes de Datos (Data Warehouse)', NULL),
(94, 'I5907', 'Administración de Redes', NULL),
(95, 'I5908', 'Administración de Servidores', NULL),
(96, 'I5909', 'Programación para Internet', NULL),
(97, 'I5910', 'Hypermedia', NULL),
(98, 'I5911', 'Minería de Datos', NULL),
(99, 'I5912', 'Clasificación Inteligente de Datos', NULL),
(100, 'I5913', 'Sistemas Basados en Conocimiento', NULL),
(101, 'I5914', 'Seminario de Solución de Problemas de Si', NULL),
(102, 'I5915', 'Teoría de la Computación', NULL),
(103, 'I7022', 'Fundamentos Filosóficos de la Computació', NULL),
(104, 'I7023', 'Arquitectura de Computadoras', NULL),
(105, 'I7024', 'Seminario de Solución de Problemas de Ar', NULL),
(106, 'I7025', 'Traductores de Lenguajes I', NULL),
(107, 'I7026', 'Seminario de Solución de Problemas de Tr', NULL),
(108, 'I7027', 'Traductores de Lenguajes II', NULL),
(109, 'I7028', 'Seminario de Solución de Problemas de Tr', NULL),
(110, 'I7029', 'Sistemas Operativos', NULL),
(111, 'I7030', 'Seminario de Solución de Problemas de Si', NULL),
(112, 'I7031', 'Redes de computadoras y Protocolos de Co', NULL),
(113, 'I7032', 'Seminario de Solución de Problemas de Re', NULL),
(114, 'I7033', 'Sistemas Operativos de Red', NULL),
(115, 'I7034', 'Seminario de Solución de Problemas de Si', NULL),
(116, 'I7035', 'Sistemas Concurrentes y Distribuidos', NULL),
(117, 'I7036', 'Computación tolerante a fallas', NULL),
(118, 'I7037', 'Seguridad', NULL),
(119, 'I7038', 'Inteligencia Artificial I', NULL),
(120, 'I7039', 'Seminario de Solución de Problemas de In', NULL),
(121, 'I7040', 'Inteligencia Artificial II', NULL),
(122, 'I7041', 'Seminario de Solución de Problemas de In', NULL),
(123, 'I7042', 'Simulación por Computadora', NULL),
(124, 'I7609', 'Procesamiento de Bioimágenes', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculado`
--

CREATE TABLE IF NOT EXISTS `matriculado` (
  `codigo` int(11) NOT NULL,
  `idCurso` int(11) NOT NULL,
  `calificacion` varchar(4) DEFAULT NULL,
  KEY `fk_Matricular_Curso1` (`idCurso`),
  KEY `fk_Matricular_Alumno1` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `fk_Asistencia_Alumno1` FOREIGN KEY (`codigo`) REFERENCES `alumno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Asistencia_Curso1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `criterioevalucion`
--
ALTER TABLE `criterioevalucion`
  ADD CONSTRAINT `fk_CriterioEvalucion_Curso1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Curso_Ciclo1` FOREIGN KEY (`idCiclo`) REFERENCES `ciclo` (`idCiclo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Curso_Maestro1` FOREIGN KEY (`codigo`) REFERENCES `maestro` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `diasfestivos`
--
ALTER TABLE `diasfestivos`
  ADD CONSTRAINT `fk_DiasFestivos_Ciclo` FOREIGN KEY (`idCiclo`) REFERENCES `ciclo` (`idCiclo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horariocurso`
--
ALTER TABLE `horariocurso`
  ADD CONSTRAINT `fk_HorarioCurso_Curso1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`idAcademia`) REFERENCES `academia` (`idAcademia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculado`
--
ALTER TABLE `matriculado`
  ADD CONSTRAINT `fk_Matricular_Alumno1` FOREIGN KEY (`codigo`) REFERENCES `alumno` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Matricular_Curso1` FOREIGN KEY (`idCurso`) REFERENCES `curso` (`idCurso`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
