-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2023 a las 06:16:45
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ceelbambu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academica`
--

CREATE TABLE `academica` (
  `id` int(11) NOT NULL,
  `encargado` varchar(250) NOT NULL,
  `texto1` varchar(5000) NOT NULL,
  `texto2` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `academica`
--

INSERT INTO `academica` (`id`, `encargado`, `texto1`, `texto2`) VALUES
(1, 'maestro 2', 'La etapa de parvularia es un período crucial en el desarrollo de un niño. Es el primer paso en su viaje educativo y juega un papel fundamental en la construcción de una base sólida para su futuro académico y personal. Asistir a la parvularia no solo es un derecho, sino también una oportunidad valiosa para los niños de explorar, aprender y crecer de manera integral.\r\n\r\nFomento del Aprendizaje Temprano: La parvularia proporciona un entorno educativo diseñado especialmente para los niños pequeños. A través de actividades interactivas y juegos, los niños desarrollan habilidades cognitivas, motoras y sociales de manera natural. Aprenden a expresarse, a resolver problemas y a interactuar con otros, sentando las bases para el aprendizaje a lo largo de la vida.', 'ofrecimiento 1, ofrecimiento 2, ofrecimiento 3, ofreciemiento 4,ofrecimiento 5'),
(2, 'tonito', 'Asistir al primer ciclo de estudios es esencial para el desarrollo integral de los niños. Durante esta etapa, que comprende la educación inicial, parvularia y primaria, los niños adquieren habilidades, conocimientos y valores fundamentales que les servirán a lo largo de su vida.\r\n\r\nLa educación inicial y parvularia les brinda un ambiente seguro y estimulante donde pueden explorar, aprender a través del juego y desarrollar habilidades sociales. Aprenden a compartir, interactuar con sus pares y comunicarse de manera efectiva. Además, se les introduce en conceptos básicos como el lenguaje, las matemáticas y la creatividad, sentando bases sólidas para su aprendizaje futuro.\r\n\r\nLa educación primaria amplía su horizonte de conocimiento y les proporciona herramientas esenciales para enfrentar desafíos académicos y personales. Aprenden a leer, escribir, resolver problemas y comprender conceptos científicos y sociales. También se les inculcan valores como la responsabilidad, la disciplina y el respeto.\r\n\r\nAsistir al primer ciclo de estudios no solo se trata de adquirir habilidades académicas, sino también de formar la base de su desarrollo emocional y social. Los niños aprenden a trabajar en equipo, a expresar sus ideas y a enfrentar situaciones nuevas con confianza. Además, se les inculca la importancia de la curiosidad, la creatividad y el pensamiento crítico.\r\n\r\nEn resumen, el primer ciclo de estudios es fundamental para que los niños crezcan como individuos seguros, con habilidades académicas sólidas y valores fundamentales. Les brinda la oportunidad de explorar, aprender y crecer en un entorno educativo enriquecedor, preparándolos para un futuro exitoso y gratificante.', 'ofrecimiento 1, ofrecimiento 2, ofrecimiento 3, ofreciemiento 4,ofrecimiento 5, ofrecimiento 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(3, 'Hector Esteban Ortega Argueta', 'Hector', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'j8uoygqh3.png', 1, '2023-08-18 04:29:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Administrador', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academica`
--
ALTER TABLE `academica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `user_level` (`user_level`);

--
-- Indices de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academica`
--
ALTER TABLE `academica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
