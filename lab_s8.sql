-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-10-2021 a las 23:17:57
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lab_s8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diplomacia`
--

CREATE TABLE `diplomacia` (
  `iddiplomacia` int(11) NOT NULL,
  `idpais` int(11) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `motivo` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `diplomacia`
--

INSERT INTO `diplomacia` (`iddiplomacia`, `idpais`, `fecha`, `motivo`) VALUES
(1, 1, '12/05/2011', 'Creación de un barrio peruano en Argentina para fortalecer la diplomacia pública'),
(2, 2, '15/03/2016', 'Exoneración de visas para los peruanos en el espacio Schengen'),
(3, 4, '01/03/1945', 'Motivo el escaso flujo comercial reportado en la correspondencia'),
(4, 6, '06/06/1882', 'Ambos son miembros de la Alianza del Pacífico, Comunidad Andina y el Foro para el Progreso de América del Sur'),
(5, 5, '01/07/1998', 'Motivo mediante el Acuerdo de Complementación Económica suscrito entre Chile y Perú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flujoproducto`
--

CREATE TABLE `flujoproducto` (
  `idflujo` int(11) NOT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `idpais` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `flujoproducto`
--

INSERT INTO `flujoproducto` (`idflujo`, `idproducto`, `idpais`, `tipo`) VALUES
(1, 2, 1, 'Importado'),
(2, 3, 1, 'Importado'),
(3, 4, 6, 'Importado'),
(4, 5, 7, 'Importado'),
(5, 7, 1, 'Exportado'),
(6, 1, 3, 'Exportado'),
(7, 6, 4, 'Exportado'),
(8, 8, 7, 'Exportado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idpais` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idpais`, `nombre`) VALUES
(1, 'Argentina'),
(2, 'Alemania'),
(3, 'China'),
(4, 'México'),
(5, 'Chile'),
(6, 'Colombia'),
(7, 'Estados Unidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `detalle` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `detalle`) VALUES
(1, 'Algodón', 'Una planta de fibra'),
(2, 'Maiz', '10 - Cereales'),
(3, 'Cebada', '10 - Cereales'),
(4, 'Avena', '10 - Cereales'),
(5, 'Trigo', '10 - Cereales'),
(6, 'Palta', 'Una especia de arbórea'),
(7, 'Hierro', 'Un metal de transición'),
(8, 'Petroleo', 'Un aceite mineral de color oscuro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `contrasena` varchar(45) DEFAULT NULL,
  `nivel` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `contrasena`, `nivel`, `email`) VALUES
(1, 'Miguel Angel', 'Medina Ventura', 'Tecsup2000', 'Administrador', 'mmedina@gmail.com'),
(5, 'Noe Jhon', 'Sierra Sotelo', 'Tecsup2001', 'Administrador', 'nsierra@gmail.com'),
(13, 'Ambar', 'Turin', '1235', 'Usuario', 'aTurin@gmail.com'),
(14, 'Dario Jose', 'Turin Scharff', 'Tecsup1997', 'Administrador', 'dturin@gmail.com'),
(15, 'Diana', 'Turin', 'Tecsup1998', 'Usuario', 'dnturin@gmail.com'),
(19, 'Dario Jose', 'Turin Scharff', 'Tecsup1997', 'Usuario', 'jturin@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `diplomacia`
--
ALTER TABLE `diplomacia`
  ADD PRIMARY KEY (`iddiplomacia`);

--
-- Indices de la tabla `flujoproducto`
--
ALTER TABLE `flujoproducto`
  ADD PRIMARY KEY (`idflujo`),
  ADD KEY `idpais` (`idpais`),
  ADD KEY `idproducto` (`idproducto`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idpais`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diplomacia`
--
ALTER TABLE `diplomacia`
  MODIFY `iddiplomacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `flujoproducto`
--
ALTER TABLE `flujoproducto`
  MODIFY `idflujo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idpais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `flujoproducto`
--
ALTER TABLE `flujoproducto`
  ADD CONSTRAINT `flujoproducto_ibfk_1` FOREIGN KEY (`idpais`) REFERENCES `paises` (`idpais`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flujoproducto_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
