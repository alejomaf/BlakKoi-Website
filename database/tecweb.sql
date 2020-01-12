-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-01-2020 a las 23:08:27
-- Versión del servidor: 10.4.8-MariaDB
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
-- Base de datos: `tecweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuestionario`
--

CREATE TABLE `cuestionario` (
  `id` int(11) NOT NULL,
  `primera` text NOT NULL,
  `segunda` text NOT NULL,
  `tercera` text NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`id`, `primera`, `segunda`, `tercera`, `id_usuario`) VALUES
(2, 'sdagf', 'sdfga', 'asg', 56),
(3, '', '', '', 56),
(4, '', '', '', 56),
(5, '', '', '', 56),
(6, '', '', '', 56),
(7, '', '', '', 56),
(8, '', '', '', 56),
(9, '', '', '', 56),
(10, '', '', '', 56),
(11, '', '', '', 56),
(12, 'sdfh', 'sdf', 'sdga', 56),
(13, 'sdfh', 'sdf', 'sdga', 56),
(14, '', '', '', 56),
(15, 'dsfh', 'dsf', 'dfs', 56),
(16, 'sgfa', 'asdg', 'asdg', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `idMensaje` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `asunto` text NOT NULL,
  `destinatario` tinyint(1) NOT NULL,
  `fechaEnvio` date NOT NULL,
  `leido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`idMensaje`, `id`, `mensaje`, `asunto`, `destinatario`, `fechaEnvio`, `leido`) VALUES
(1, 1, 'Esto es un mensaje de ejemplo. Esto viene a ser un gran y fantástico mensaje de ejemplo.', 'Mensaje de ejemplo', 1, '2020-01-14', 0),
(6, 74, 'Hola', '', 1, '2020-01-12', 0),
(7, 74, 'Hola2', '', 1, '2020-01-12', 0),
(8, 74, 'Cómo estás?', '', 1, '2020-01-12', 0),
(9, 74, 'Qué tal', '', 1, '2020-01-12', 0),
(10, 74, 'Mamica', '', 1, '2020-01-12', 0),
(11, 74, 'Hello', '', 1, '2020-01-12', 0),
(12, 74, 'Mama mía', '', 1, '2020-01-12', 0),
(13, 74, 'Joe', '', 1, '2020-01-12', 0),
(14, 74, 'Ei', '', 1, '2020-01-12', 0),
(15, 74, 'Joe', '', 1, '2020-01-12', 0),
(16, 74, 'Mamita mía', '', 1, '2020-01-12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `portfolio`
--

CREATE TABLE `portfolio` (
  `id_portfolio` int(11) NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `titulo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `portfolio`
--

INSERT INTO `portfolio` (`id_portfolio`, `enlace`, `descripcion`, `titulo`) VALUES
(53, 'https://www.youtube.com/watch?v=RyVS7R9PN6U', 'ikon', 'ikon'),
(54, 'https://www.youtube.com/watch?v=ZhbEzRkMPo8', 'dfg', 'asdg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_terminacion` date NOT NULL,
  `coste_total` int(11) NOT NULL,
  `informacion` text NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin', 'admin'),
(74, 'ejemplo1', 'ejemplo1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos_proyecto`
--

CREATE TABLE `videos_proyecto` (
  `idVideo` int(11) NOT NULL,
  `tituloVideo` text NOT NULL,
  `descripcionVideo` text NOT NULL,
  `enlace` varchar(100) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `videos_proyecto`
--

INSERT INTO `videos_proyecto` (`idVideo`, `tituloVideo`, `descripcionVideo`, `enlace`, `id_proyecto`) VALUES
(1, '', '', 'ert', 14),
(2, '', '', 'https://www.youtube.com/watch?v=Z60Un18SrNg', 14),
(3, '', '', 'https://www.youtube.com/watch?v=uEtKb-srlK0', 13),
(4, '', '', 'asdadsa', 20),
(12, 'Ejemplo1', 'Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo.', 'https://www.youtube.com/embed/787pabrW5Ds', 123),
(13, 'Ejemplo 2', 'Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo.', 'https://www.youtube.com/embed/787pabrW5Ds', 123);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`idMensaje`);

--
-- Indices de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id_portfolio`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videos_proyecto`
--
ALTER TABLE `videos_proyecto`
  ADD PRIMARY KEY (`idVideo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuestionario`
--
ALTER TABLE `cuestionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `videos_proyecto`
--
ALTER TABLE `videos_proyecto`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
