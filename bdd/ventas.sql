-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2020 a las 05:46:58
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(80) NOT NULL,
  `fena` date NOT NULL,
  `genero` varchar(1) NOT NULL,
  `calles` varchar(100) NOT NULL,
  `num` int(11) NOT NULL,
  `telefono` varchar(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contraseña` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`curp`, `nombre`, `apellido`, `fena`, `genero`, `calles`, `num`, `telefono`, `correo`, `contraseña`) VALUES
('PEJI030312MMCRLSA7', 'Administrador', 'Administrador', '1996-07-18', 'F', 'Niños heroes', 0, '7291485531', 'airamlebasi950@gmail.com', '7222840894');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `especialidad` varchar(30) NOT NULL,
  `nomp` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `precioVenta` decimal(5,2) NOT NULL,
  `precioCompra` decimal(5,2) NOT NULL,
  `existencia` decimal(5,2) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `ruta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `especialidad`, `nomp`, `descripcion`, `precioVenta`, `precioCompra`, `existencia`, `nombre`, `ruta`) VALUES
(6, ' Programación', 'Base de datos', 'Guarda información de una empresa', '200.00', '0.00', '2.00', 'descarga.jpe', 'imagenes/descarga.jpe'),
(7, ' Mecánica', 'Figura con soldadura', '1m de altura', '150.00', '70.00', '6.00', 'a2f68bea-f9ef-469b-ba63-7b65f807d234.jpe', 'imagenes/a2f68bea-f9ef-469b-ba63-7b65f807d234.jpe'),
(8, ' Construcción', 'Maqueta casa', 'Elaborada con materiales reales', '800.00', '300.00', '3.00', '18db18f8-413b-4114-993a-2becad7c6e47.jpe', 'imagenes/18db18f8-413b-4114-993a-2becad7c6e47.jpe'),
(9, ' Electricidad', 'Circuito', 'Generar Luz', '200.00', '80.00', '4.00', 'circuito.jpe', 'imagenes/circuito.jpe'),
(10, ' Trabajo Social', 'Encuesta depresión', 'Conocer a las personas', '50.00', '20.00', '5.00', '49c4b0af-c393-41e1-9141-557936201874.jpe', 'imagenes/49c4b0af-c393-41e1-9141-557936201874.jpe'),
(11, ' Electricidad', 'Panel solar', 'Calentar agua', '300.00', '100.00', '5.00', '49c4b0af-c393-41e1-9141-557936201874.jpe', 'imagenes/49c4b0af-c393-41e1-9141-557936201874.jpe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL,
  `curp` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`curp`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curp` (`curp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD CONSTRAINT `productos_vendidos_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_vendidos_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
