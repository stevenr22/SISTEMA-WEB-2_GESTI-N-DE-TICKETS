-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-06-2025 a las 02:42:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sysgi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Roles`
--

CREATE TABLE `Roles` (
  `IdRol` int(11) NOT NULL,
  `NomRol` varchar(100) DEFAULT NULL,
  `DescripcionRol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Roles`
--

INSERT INTO `Roles` (`IdRol`, `NomRol`, `DescripcionRol`) VALUES
(1, 'Administrador', 'Control total'),
(2, 'Empleado', 'Privilegios limitados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE `Usuarios` (
  `IdUsu` int(11) NOT NULL,
  `NomUsu` varchar(255) DEFAULT NULL,
  `ApeUsu` varchar(255) DEFAULT NULL,
  `EdadUsu` varchar(255) DEFAULT NULL,
  `DirUsu` varchar(255) DEFAULT NULL,
  `CorreoUsu` varchar(255) DEFAULT NULL,
  `UserNameUsu` varchar(255) DEFAULT NULL,
  `ContraUsu` varchar(255) DEFAULT NULL,
  `IdRol` int(11) DEFAULT NULL,
  `EstadoUsu` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`IdUsu`, `NomUsu`, `ApeUsu`, `EdadUsu`, `DirUsu`, `CorreoUsu`, `UserNameUsu`, `ContraUsu`, `IdRol`, `EstadoUsu`) VALUES
(1, 'Steven Galo', 'Rojas Guerrero', '26', 'Guasmo Sur', 'r@gmail.com', 'srojas', '123', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`IdRol`);

--
-- Indices de la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`IdUsu`),
  ADD KEY `IdRol` (`IdRol`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD CONSTRAINT `Usuarios_ibfk_1` FOREIGN KEY (`IdRol`) REFERENCES `Roles` (`IdRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
