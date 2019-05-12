-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-04-2019 a las 18:27:29
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadoctores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `id_doctor` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `paterno` varchar(15) DEFAULT NULL,
  `materno` varchar(15) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `calle` varchar(40) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`id_doctor`, `nombre`, `paterno`, `materno`, `edad`, `sexo`, `estado`, `ciudad`, `calle`, `numero`, `correo`, `pass`, `telefono`) VALUES
(1, 'pedro ', 'piedra', 'pica', 18, 'Hombre', 'jalisco', 'cd guzman', 'comonfor', 22, 'pedro@gmail.com', '123', '4106553'),
(2, 'Cark', 'Chavez', 'Calleja', 25, 'Hombre', 'jalisco', 'guzman', 'ncjdsk,', 12, 'carlos@gmail.com', '123', '41255555');

--
-- Disparadores `doctor`
--
DELIMITER $$
CREATE TRIGGER `enlasardoctor` AFTER INSERT ON `doctor` FOR EACH ROW INSERT INTO usuario_doctor(id_doctor,correo,pass)
VALUES(new.id_doctor,new.correo,new.pass)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `paterno` varchar(15) DEFAULT NULL,
  `materno` varchar(15) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `tipoSangre` varchar(6) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `calle` varchar(40) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `nombre`, `paterno`, `materno`, `telefono`, `edad`, `sexo`, `tipoSangre`, `estado`, `ciudad`, `calle`, `numero`, `correo`, `pass`) VALUES
(2, 'daniel', 'bernal', 'cuevas', '412225', 18, 'on', 'O+', 'jalisco', 'cd guzman', 'Comonfor', 12, 'daniel@gmail.com', '123');

--
-- Disparadores `paciente`
--
DELIMITER $$
CREATE TRIGGER `enlasarpaciente` AFTER INSERT ON `paciente` FOR EACH ROW INSERT INTO usuario_paciente(id_paciente,correo,pass)
values(new.id_paciente,new.correo,new.pass)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `receta`
--

CREATE TABLE `receta` (
  `id_receta` int(11) NOT NULL,
  `id_doctor` int(11) DEFAULT NULL,
  `nombreDoctor` varchar(20) DEFAULT NULL,
  `paternoDoctor` varchar(10) DEFAULT NULL,
  `maternoDoctor` varchar(20) DEFAULT NULL,
  `id_paciente` int(11) DEFAULT NULL,
  `paciente` varchar(40) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `edad` int(11) DEFAULT NULL,
  `peso` int(11) DEFAULT NULL,
  `talla` int(11) DEFAULT NULL,
  `ta` varchar(8) DEFAULT NULL,
  `fe` varchar(8) DEFAULT NULL,
  `temp` int(11) DEFAULT NULL,
  `receta` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `receta`
--

INSERT INTO `receta` (`id_receta`, `id_doctor`, `nombreDoctor`, `paternoDoctor`, `maternoDoctor`, `id_paciente`, `paciente`, `fecha`, `edad`, `peso`, `talla`, `ta`, `fe`, `temp`, `receta`) VALUES
(19, 2, 'Cark', 'Chavez', 'Calleja', NULL, 'jose manuel', '2019-04-27 04:02:43', 18, 10, 10, '180/80', '80', 10, 'diacepan cada 8 hr 20gramos'),
(20, 1, 'pedro ', 'piedra', 'pica', NULL, 'jose manuel', '2019-04-28 02:58:17', 18, 10, 10, 'jo', 'to', 10, 'el chico del 511'),
(25, 1, 'pedro ', 'piedra', 'pica', NULL, 'pepe el toro', '2019-04-28 03:57:23', 18, 0, 1, '180/80', '80', 10, 'jose jose es un drogadictor'),
(26, 1, 'pedro ', 'piedra', 'pica', 2, 'carlos', '2019-04-30 16:12:06', 12, 0, 0, '45', '45', 0, 'cbshbk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_doctor`
--

CREATE TABLE `usuario_doctor` (
  `id_doctor` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_doctor`
--

INSERT INTO `usuario_doctor` (`id_doctor`, `correo`, `pass`) VALUES
(1, 'pedro@gmail.com', '123'),
(2, 'carlos@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_paciente`
--

CREATE TABLE `usuario_paciente` (
  `id_paciente` int(11) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_paciente`
--

INSERT INTO `usuario_paciente` (`id_paciente`, `correo`, `pass`) VALUES
(2, 'daniel@gmail.com', '123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `receta`
--
ALTER TABLE `receta`
  ADD PRIMARY KEY (`id_receta`);

--
-- Indices de la tabla `usuario_doctor`
--
ALTER TABLE `usuario_doctor`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indices de la tabla `usuario_paciente`
--
ALTER TABLE `usuario_paciente`
  ADD PRIMARY KEY (`id_paciente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `receta`
--
ALTER TABLE `receta`
  MODIFY `id_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
