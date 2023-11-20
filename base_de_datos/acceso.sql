-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2023 a las 01:18:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `acceso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `baloncesto_uba`
--

CREATE TABLE `baloncesto_uba` (
  `Id` int(11) NOT NULL,
  `Cedula` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Numero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `Id` int(11) NOT NULL,
  `Cedula` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Carrera` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_esis`
--

CREATE TABLE `estudiante_esis` (
  `Id` int(11) NOT NULL,
  `Cedula` varchar(50) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Promedio` varchar(50) NOT NULL,
  `Horario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lenguajes_programacion`
--

CREATE TABLE `lenguajes_programacion` (
  `Id` int(11) NOT NULL,
  `Lenguaje1` varchar(50) NOT NULL,
  `Lenguaje2` varchar(50) NOT NULL,
  `Lenguaje3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_esis`
--

CREATE TABLE `materias_esis` (
  `Id` int(11) NOT NULL,
  `Materia1` varchar(50) NOT NULL,
  `Nota1` varchar(50) NOT NULL,
  `Materia2` varchar(50) NOT NULL,
  `Nota2` varchar(50) NOT NULL,
  `Materia3` varchar(50) NOT NULL,
  `Nota3` varchar(50) NOT NULL,
  `Materia4` varchar(50) NOT NULL,
  `Nota4` varchar(50) NOT NULL,
  `Materia5` varchar(50) NOT NULL,
  `Nota5` varchar(50) NOT NULL,
  `Materia6` varchar(50) NOT NULL,
  `Nota6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre_Completo` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Sal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `baloncesto_uba`
--
ALTER TABLE `baloncesto_uba`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estudiante_esis`
--
ALTER TABLE `estudiante_esis`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `lenguajes_programacion`
--
ALTER TABLE `lenguajes_programacion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `materias_esis`
--
ALTER TABLE `materias_esis`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `baloncesto_uba`
--
ALTER TABLE `baloncesto_uba`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `estudiante_esis`
--
ALTER TABLE `estudiante_esis`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lenguajes_programacion`
--
ALTER TABLE `lenguajes_programacion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `materias_esis`
--
ALTER TABLE `materias_esis`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
