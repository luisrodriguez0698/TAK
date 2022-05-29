-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 28-09-2021 a las 20:59:38
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tak-admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `a_materia_prima`
--

CREATE TABLE `a_materia_prima` (
  `id_mp` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `stock` varchar(10) NOT NULL,
  `id_c` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `a_materia_prima`
--

INSERT INTO `a_materia_prima` (`id_mp`, `nombre`, `stock`, `id_c`) VALUES
('MPA', 'Azucar', '80', 'CF'),
('MPBH', 'Bolsa de Hielo', '100', 'CF'),
('MPCH', 'Chantilly', '95', 'CF'),
('MPCR', 'Chocorrol', '85', 'CF'),
('MPCS', 'Café Soluble', '80', 'CF'),
('MPCVP', 'Carlos V Polvo', '100', 'CF'),
('MPEV', 'Escencia de Vainilla', '85', 'CF'),
('MPFG', 'Fresas Congeladas', '70', 'CF'),
('MPG', 'Gansito', '100', 'CF'),
('MPGEC', 'Galleta Emperador de Chocolate', '100', 'CF'),
('MPGO', 'Galletas Oreo', '75', 'CF'),
('MPJH', 'Jarabe Hershe´s', '100', 'CF'),
('MPL', 'Leche', '100', 'CF'),
('MPMG', 'Mini Magnum', '100', 'CF'),
('MPMK', 'Mordisko', '100', 'CF'),
('MPMZ', 'Mazapan', '100', 'CF'),
('MPP', 'Popotes', '100', 'CF'),
('MPPG', 'Pinguino', '100', 'CF'),
('MPSC', 'Stick de Capuchino', '100', 'CF'),
('MPTF', 'Tapa para Frappé', '100', 'CF'),
('MPVF', 'Vaso para Frappé', '100', 'CF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_c` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` varchar(10) NOT NULL,
  `especial` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_c`, `nombre`, `cantidad`, `especial`) VALUES
('CC', 'C. Café', '1', ''),
('CF', 'C. Frappé', '1', ''),
('CG', 'C. Gomas', '1', ''),
('CN', 'C.Nachos', '1', ''),
('CP', 'C. Papa', '1', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formula`
--

CREATE TABLE `formula` (
  `id_f` int(10) NOT NULL,
  `id_pt` varchar(10) NOT NULL,
  `id_mp` varchar(10) NOT NULL,
  `cantidad` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formula`
--

INSERT INTO `formula` (`id_f`, `id_pt`, `id_mp`, `cantidad`) VALUES
(1, 'PTFF', 'MPA', '5'),
(2, 'PTFF', 'MPCR', '5'),
(3, 'PTFF', 'MPCS', '5'),
(4, 'PTFF', 'MPEV', '5'),
(5, 'PTFF', 'MPFG', '10'),
(6, 'PTFO', 'MPA', '1'),
(7, 'PTFO', 'MPCH', '1'),
(8, 'PTFO', 'MPCS', '1'),
(9, 'PTFO', 'MPGO', '5'),
(31, 'PTFP', 'MPA', '2'),
(32, 'PTFP', 'MPBH', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_terminado`
--

CREATE TABLE `producto_terminado` (
  `id_pt` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `id_c` varchar(10) NOT NULL,
  `precio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_terminado`
--

INSERT INTO `producto_terminado` (`id_pt`, `nombre`, `id_c`, `precio`) VALUES
('PTFF', 'Frappé de Fresa', 'CF', ''),
('PTFG', 'Frappé de Gansito', 'CF', ''),
('PTFO', 'Frappé de Oreo', 'CF', ''),
('PTFP', 'Frappé de Pingüino', 'CF', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `a_materia_prima`
--
ALTER TABLE `a_materia_prima`
  ADD PRIMARY KEY (`id_mp`),
  ADD KEY `id_c` (`id_c`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_c`);

--
-- Indices de la tabla `formula`
--
ALTER TABLE `formula`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `id_pt` (`id_pt`),
  ADD KEY `id_mp` (`id_mp`);

--
-- Indices de la tabla `producto_terminado`
--
ALTER TABLE `producto_terminado`
  ADD PRIMARY KEY (`id_pt`),
  ADD KEY `id_c` (`id_c`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `formula`
--
ALTER TABLE `formula`
  MODIFY `id_f` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `a_materia_prima`
--
ALTER TABLE `a_materia_prima`
  ADD CONSTRAINT `a_materia_prima_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `categoria` (`id_c`);

--
-- Filtros para la tabla `formula`
--
ALTER TABLE `formula`
  ADD CONSTRAINT `formula_ibfk_1` FOREIGN KEY (`id_pt`) REFERENCES `producto_terminado` (`id_pt`),
  ADD CONSTRAINT `formula_ibfk_2` FOREIGN KEY (`id_mp`) REFERENCES `a_materia_prima` (`id_mp`);

--
-- Filtros para la tabla `producto_terminado`
--
ALTER TABLE `producto_terminado`
  ADD CONSTRAINT `producto_terminado_ibfk_1` FOREIGN KEY (`id_c`) REFERENCES `categoria` (`id_c`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
