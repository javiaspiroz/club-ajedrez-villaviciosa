-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2021 a las 22:51:25
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cav`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE `formulario` (
  `fname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` text COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`fname`, `lname`, `email`, `subject`, `newsletter`, `id`) VALUES
('German', 'Lopez', 'gl@gmail.com', 'Hola, ¿qué horario de atención telefónica tenéis?', 0, 16),
('Pedro', 'Piqueras', 'pedrop@gmail.com', 'Buenas, ¿cuándo empizan el torneo de este año?', 1, 17),
('Julian', 'Martinez', 'jm@hotmail.com', 'Hola,\r\n¿Cúal es el precio mensual de las calses para menores de 12 años?', 1, 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `lname` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`username`, `password`, `fname`, `lname`, `email`) VALUES
('admin', '$2y$10$KO3wmzxX8r6ZJr5s5q.z1OSIMGJOMdc0PyRTqEpxnueBgJJUImk66', 'admin', 'admin', 'admin@cav.es'),
('javier', '$2y$10$/Y7QvoHnX2Pce9bDuE884us9am5s7e2d2EBFsC3rVbjB1CNfsw6ky', 'javier', 'aspiroz', 'javiaspiroz@gmail.com'),
('juan', '$2y$10$bRk4HJqcSdOi2JVc6NTQsOibKNcnz0WC8jmJivRO/fVJW0nGFPEHa', 'Juan', 'Raya', 'juan@test.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
