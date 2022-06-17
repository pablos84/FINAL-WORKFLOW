-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2022 a las 15:32:09
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `matricula` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nombrecompleto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ci` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `coddpto` varchar(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`matricula`, `nombrecompleto`, `ci`, `coddpto`) VALUES
('123', 'juan', '12345', '09'),
('1290', 'Luis', '12345', '01'),
('123', 'pedro', '123', '01'),
('123', 'carlos', '123', '08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnomateria`
--

CREATE TABLE `alumnomateria` (
  `gestion` varchar(11) COLLATE utf8mb4_general_ci NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `situacion` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `matricula` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `requisito` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `noramiite` int(10) DEFAULT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `observaciones` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fechasubida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`matricula`, `requisito`, `noramiite`, `nombre`, `observaciones`, `fechasubida`) VALUES
('123', 'requisito1', 1091, 'FB_IMG_1525959528685.jpg', 'Revisado Kardex', '2022-06-15'),
('123', 'requisito2', 1091, '', 'Falta (Kardex)', '2022-06-15'),
('123', 'requisito3', 1091, '', 'Falta requisito Cédula de Identidad', '2022-06-15'),
('123', 'requisito4', 1091, '', 'Falta requisito Título de Bachiller', '2022-06-15'),
('123', 'requisito1', 1809, 'FB_IMG_1525959497583.jpg', 'Revisado Kardex', '2022-06-15'),
('123', 'requisito2', 1809, '', '', '2022-06-15'),
('123', 'requisito3', 1809, '', '', '2022-06-15'),
('123', 'requisito4', 1809, '', '', '2022-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `materia` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `sigla` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `requisito` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
