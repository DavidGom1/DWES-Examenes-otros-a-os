-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-11-2023 a las 12:19:03
-- Versión del servidor: 8.0.35-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `gen_id` int NOT NULL,
  `gen_nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`gen_id`, `gen_nombre`) VALUES
(1, 'Estrategia'),
(2, 'Acción'),
(3, 'Simulador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `jue_id` int NOT NULL,
  `jue_nombre` varchar(50) NOT NULL,
  `jue_fecha` int NOT NULL,
  `jue_genero` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`jue_id`, `jue_nombre`, `jue_fecha`, `jue_genero`) VALUES
(1, 'Age of Empires', 1997, 1),
(2, 'Age of Empires II', 1999, 1),
(3, 'Gran Turismo 4', 2004, 3),
(4, 'Forza Horizon 5', 2022, 3),
(5, 'Forza Motorsport 8', 2023, 3),
(6, 'Doom Eternal', 2020, 2),
(7, 'Crysis', 2007, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `jug_id` int NOT NULL,
  `jug_nombre` varchar(50) NOT NULL,
  `jug_alias` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`jug_id`, `jug_nombre`, `jug_alias`) VALUES
(1, 'Verónica', 'vero'),
(2, 'Francisco', 'paco'),
(3, 'María', 'mari'),
(4, 'Laura', 'laurfps'),
(5, 'Sofía', 'sofi'),
(6, 'José', 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidas`
--

CREATE TABLE `partidas` (
  `par_id` int NOT NULL,
  `par_fecha` date NOT NULL,
  `par_hora` time NOT NULL,
  `par_juego` int NOT NULL,
  `par_plataforma` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `partidas`
--

INSERT INTO `partidas` (`par_id`, `par_fecha`, `par_hora`, `par_juego`, `par_plataforma`) VALUES
(1, '2023-11-01', '17:01:16', 7, 1),
(2, '2023-11-02', '11:01:16', 7, 1),
(3, '2023-11-02', '11:00:00', 1, 1),
(4, '2023-11-09', '10:00:00', 4, 3),
(5, '2023-11-09', '11:00:00', 7, 1),
(6, '2023-11-09', '12:30:00', 3, 2),
(7, '2023-11-10', '12:00:00', 5, 1),
(8, '2023-11-17', '12:00:00', 2, 1),
(9, '2023-11-17', '12:30:00', 3, 2),
(10, '2023-11-18', '12:00:00', 6, 3),
(11, '2023-11-19', '12:00:00', 2, 1),
(12, '2023-11-24', '12:00:00', 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataformas`
--

CREATE TABLE `plataformas` (
  `pla_id` int NOT NULL,
  `pla_nombre` varchar(40) NOT NULL,
  `pla_fecha` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `plataformas`
--

INSERT INTO `plataformas` (`pla_id`, `pla_nombre`, `pla_fecha`) VALUES
(1, 'PC', 1979),
(2, 'PS2', 2000),
(3, 'XBox Series', 2020),
(4, 'Nintendo Switch', 2017);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuaciones`
--

CREATE TABLE `puntuaciones` (
  `pun_id` int NOT NULL,
  `pun_partida` int NOT NULL,
  `pun_jugador` int NOT NULL,
  `pun_puntuacion` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `puntuaciones`
--

INSERT INTO `puntuaciones` (`pun_id`, `pun_partida`, `pun_jugador`, `pun_puntuacion`) VALUES
(1, 1, 4, 1000),
(2, 1, 2, 800),
(3, 2, 4, 1200),
(4, 2, 2, 1250),
(5, 2, 5, 700),
(6, 3, 6, 1000),
(7, 3, 1, 900),
(8, 3, 3, 1200),
(9, 4, 4, 500),
(10, 4, 5, 800),
(11, 5, 4, 2000),
(12, 6, 6, 700),
(13, 7, 3, 1200),
(14, 7, 2, 1000),
(15, 8, 3, 1200),
(16, 8, 6, 900),
(17, 8, 2, 1300),
(18, 9, 1, 800),
(19, 10, 4, 500),
(20, 10, 3, 800),
(21, 10, 2, 1000),
(22, 10, 6, 700),
(23, 10, 5, 2000),
(24, 11, 3, 800),
(25, 11, 6, 1200),
(26, 12, 2, 1250),
(27, 12, 6, 700),
(28, 12, 5, 1000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`jue_id`),
  ADD KEY `fk_juegos_generos` (`jue_genero`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`jug_id`),
  ADD UNIQUE KEY `jug_alias` (`jug_alias`);

--
-- Indices de la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD PRIMARY KEY (`par_id`),
  ADD KEY `fk_partidas_juego` (`par_juego`),
  ADD KEY `fk_partidas_plataforma` (`par_plataforma`);

--
-- Indices de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  ADD PRIMARY KEY (`pla_id`);

--
-- Indices de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD PRIMARY KEY (`pun_id`),
  ADD KEY `fk_puntuaciones_jugadores` (`pun_jugador`),
  ADD KEY `fk_puntuaciones_partidas` (`pun_partida`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `gen_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `jue_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `jug_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `partidas`
--
ALTER TABLE `partidas`
  MODIFY `par_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plataformas`
--
ALTER TABLE `plataformas`
  MODIFY `pla_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  MODIFY `pun_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD CONSTRAINT `fk_juegos_generos` FOREIGN KEY (`jue_genero`) REFERENCES `generos` (`gen_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `partidas`
--
ALTER TABLE `partidas`
  ADD CONSTRAINT `fk_partidas_juego` FOREIGN KEY (`par_juego`) REFERENCES `juegos` (`jue_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_partidas_plataforma` FOREIGN KEY (`par_plataforma`) REFERENCES `plataformas` (`pla_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `puntuaciones`
--
ALTER TABLE `puntuaciones`
  ADD CONSTRAINT `fk_puntuaciones_jugadores` FOREIGN KEY (`pun_jugador`) REFERENCES `jugadores` (`jug_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_puntuaciones_partidas` FOREIGN KEY (`pun_partida`) REFERENCES `partidas` (`par_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
