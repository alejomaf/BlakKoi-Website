-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2020 a las 00:28:22
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
  `nombre` varchar(40) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `leido` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cuestionario`
--

INSERT INTO `cuestionario` (`id`, `primera`, `segunda`, `tercera`, `nombre`, `correo`, `leido`) VALUES
(2, 'sdagf', 'sdfga', 'asg', '', '', 0),
(3, '', '', '', '', '', 0),
(4, '', '', '', '', '', 0),
(5, '', '', '', '', '', 0),
(6, '', '', '', '', '', 0),
(7, '', '', '', '', '', 0),
(8, '', '', '', '', '', 0),
(9, '', '', '', '', '', 0),
(10, '', '', '', '', '', 0),
(11, '', '', '', '', '', 0),
(12, 'sdfh', 'sdf', 'sdga', '', '', 0),
(13, 'sdfh', 'sdf', 'sdga', '', '', 0),
(14, '', '', '', '', '', 0),
(15, 'dsfh', 'dsf', 'dfs', '', '', 0),
(23, '', '', '', '', '', 0);

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
(16, 74, 'Mamita mía', '', 1, '2020-01-12', 0),
(17, 74, 'Hola', '', 1, '2020-01-13', 0),
(18, 74, 'Qué tal estás', '', 1, '2020-01-13', 0),
(24, 74, 'Mensaje administrador, intento final', '', 1, '2020-01-16', 0),
(25, 74, 'Y funcionó :)', '', 1, '2020-01-16', 0),
(26, 74, 'Mensaje ueno ', '', 0, '2020-01-16', 0),
(27, 74, 'Pues estoy viendo aquí siendo admin', '', 0, '2020-01-16', 0),
(28, 74, 'Es decir, ahora habiendo aplicado columnas, el mensaje al ser más largo no debería invadir la otra parte del carril ¿no?', '', 0, '2020-01-16', 0),
(29, 74, 'Lo va invadiendo una pequeña parte, no resulta muy molesto', '', 0, '2020-01-16', 0),
(30, 74, 'El scrolldown está ya activado :)', '', 0, '2020-01-16', 0),
(31, 74, 'El automático, esto scrollea ya por su parte', '', 0, '2020-01-16', 0),
(32, 74, 'Y chat directo para escribir cuando se refresca la página', '', 0, '2020-01-16', 0),
(33, 74, '¿Qué dices hombre? Calla ya', '', 1, '2020-01-16', 0);

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

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `id_usuario`, `fecha_inicio`, `fecha_terminacion`, `coste_total`, `informacion`, `nombre`) VALUES
(1, 1, '0000-00-00', '0000-00-00', 0, 'Aquí se guardarán los vídeos que se muestren en el portfolio', 'Portfolio'),
(2, 1, '0000-00-00', '0000-00-00', 0, 'Aquí se guardarán los servicios que se muestren en el inicio.', 'Servicios'),
(10, 74, '2020-01-05', '2020-01-23', 1400, 'Esto es un proyecto de ejemplo. Esto es un proyecto de ejemplo. Esto es un proyecto de ejemplo.', 'La película del siglo'),
(124, 74, '2020-01-15', '0000-00-00', 1300, 'Esto es una fantástica película y estoy esperando que se ejecute en victoria la consulta.', 'Una buena película'),
(125, 74, '2020-01-15', '0000-00-00', 40000, 'Esta película va de un asesino que dispara una pistola perfectamente equipada y tiene dineros.', '007 Un asesino guay');

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
(74, 'ejemplo1', 'ejemplo1'),
(75, 'ejemplo2', '$2y$10$zkvgakd7wuV46l65s3AhWOKtthEcny.QcSVFV917RlN0kT4bBZeSq'),
(77, 'ejemplo3', '$2y$10$2ZbIwARA4/iGt6UkmR9qKu8rPIAatC8gboC1C2n80gCxlPQ7cCUUu'),
(80, 'ejemplo6', 'ejemplo6');

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
(2, 'Hola', 'Hola2', 'Hola3', 14),
(3, '', '', 'https://www.youtube.com/watch?v=uEtKb-srlK0', 13),
(4, '', '', 'asdadsa', 20),
(12, 'Ejemplo1', 'Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo.', 'https://www.youtube.com/watch?v=FgttOW3FroQ', 1),
(13, 'Ejemplo 2', 'Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo. Esto es un ejemplo.', 'https://www.youtube.com/watch?v=FgttOW3FroQ', 1),
(14, 'Buen video', 'Un buen vídeo bastante bien hecho.', 'https://www.youtube.com/watch?v=GpYzK6c4c7s', 1),
(15, 'El mejor violín', 'Uno de los mejores vídeos que podremos ver en nuestros tiempos.', 'https://www.youtube.com/watch?v=_7xXvjUEnb4', 1),
(16, 'Pulled Pork', 'La carne deshilachada deshaciéndote en tu boca, no hay mejor sensación que esa.', 'https://www.youtube.com/watch?v=eURj_CMmcLc', 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `idMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id_portfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `videos_proyecto`
--
ALTER TABLE `videos_proyecto`
  MODIFY `idVideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
