-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-06-2022 a las 15:31:58
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
-- Base de datos: `workflowfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoproceso`
--

CREATE TABLE `flujoproceso` (
  `Flujo` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Proceso` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ProcesoSiguiente` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Tipo` varchar(1) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Pantalla` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Rol` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flujoproceso`
--

INSERT INTO `flujoproceso` (`Flujo`, `Proceso`, `ProcesoSiguiente`, `Tipo`, `Pantalla`, `Rol`) VALUES
('F1', 'P1', 'P2', 'I', 'Inicio', 'Alumno'),
('F1', 'P2', 'P3', 'P', 'Documentos', 'Alumno'),
('F1', 'P3', 'P4', 'P', 'Presentar', 'Alumno'),
('F1', 'P4', NULL, 'C', 'AlDia', 'Kardex'),
('F1', 'P5', NULL, 'F', 'CausaNegativa', 'Kardex'),
('F1', 'P6', 'p7', 'P', 'PagoInscripcion', 'Kardex'),
('F1', 'P7', 'p8', 'P', 'ControlDocumentos', 'Kardex'),
('F1', 'P8', 'p9', 'P', 'ElegirCarrera', 'Alumno'),
('F1', 'P9', 'p10', 'P', 'Solicitarcodigo', 'Alumno'),
('F1', 'P10', NULL, 'P', 'CompraCarnet', 'Caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoprocesocondicionante`
--

CREATE TABLE `flujoprocesocondicionante` (
  `Flujo` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Proceso` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ProcesoSI` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ProcesoNO` varchar(3) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flujoprocesocondicionante`
--

INSERT INTO `flujoprocesocondicionante` (`Flujo`, `Proceso`, `ProcesoSI`, `ProcesoNO`) VALUES
('F1', 'P4', 'P6', 'P5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoprocesoseguimiento`
--

CREATE TABLE `flujoprocesoseguimiento` (
  `flujo` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `proceso` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `notramite` int(11) DEFAULT NULL,
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `horafin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flujoprocesoseguimiento`
--

INSERT INTO `flujoprocesoseguimiento` (`flujo`, `proceso`, `notramite`, `usuario`, `fechainicio`, `horainicio`, `fechafin`, `horafin`) VALUES
('F1', 'P1', 1230, 'Luis', '2022-06-15', '09:12:52', '2022-06-15', '13:09:40'),
('F1', 'P1', 1000, 'juan', '2022-06-15', '09:12:52', '2022-06-15', '09:22:35'),
('F1', 'P2', 1000, 'juan', '2022-06-15', '09:22:19', '2022-06-15', '09:22:35'),
('F1', 'P3', 1000, 'juan', '2022-06-15', '09:22:25', '2022-06-15', '09:22:35'),
('F1', 'P4', 1000, 'juan', '2022-06-15', '09:22:35', NULL, NULL),
('F1', 'P2', 1230, 'Luis', '2022-06-15', '13:09:05', '2022-06-15', '13:09:40'),
('F1', 'P3', 1230, 'Luis', '2022-06-15', '13:09:32', '2022-06-15', '13:09:40'),
('F1', 'P4', 1230, 'Luis', '2022-06-15', '13:09:40', NULL, NULL),
('F1', 'P1', 1091, 'pedro', '2022-06-15', '13:15:46', '2022-06-15', '13:16:15'),
('F1', 'P2', 1091, 'pedro', '2022-06-15', '13:16:02', '2022-06-15', '13:16:15'),
('F1', 'P3', 1091, 'pedro', '2022-06-15', '13:16:06', '2022-06-15', '13:16:15'),
('F1', 'P4', 1091, 'pedro', '2022-06-15', '13:16:15', '2022-06-17', '11:28:29'),
('F1', 'P1', 1809, 'carlos', '2022-06-15', '15:34:29', '2022-06-15', '15:34:42'),
('F1', 'P2', 1809, 'carlos', '2022-06-15', '15:34:42', '2022-06-15', '15:34:46'),
('F1', 'P3', 1809, 'carlos', '2022-06-15', '15:34:46', '2022-06-15', '15:34:57'),
('F1', 'P4', 1809, 'carlos', '2022-06-15', '15:34:57', '2022-06-17', '10:13:04'),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '08:55:51', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:02:28', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:04:41', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:06:11', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:07:58', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:09:12', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:11:54', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:16:36', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:17:50', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:25:52', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:27:13', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:27:51', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:29:13', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '09:30:04', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '10:00:08', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '10:07:12', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '10:08:17', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '10:11:23', NULL, NULL),
('F1', 'P5', 1809, 'carlos', '2022-06-17', '10:13:04', NULL, NULL),
('F1', 'P6', 1091, 'pedro', '2022-06-17', '11:28:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rol` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contraseña`, `rol`) VALUES
('juan', '123', 'Alumno'),
('Kardex', '123', 'Kardex'),
('Caja', '123', 'Caja'),
('Luis', '123', 'Alumno'),
('pedro', '123', 'Alumno'),
('carlos', '123', 'Alumno');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
