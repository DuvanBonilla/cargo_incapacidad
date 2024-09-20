-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2024 a las 15:38:59
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
-- Base de datos: `cargo_incapacidades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_areatrabajo`
--

CREATE TABLE `tbl_areatrabajo` (
  `IdArea` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_det_incapacidadper`
--

CREATE TABLE `tbl_det_incapacidadper` (
  `id` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Ibc` int(11) NOT NULL,
  `Codigodiagnostico` varchar(10) NOT NULL,
  `Tipotransito` int(11) NOT NULL,
  `Inicialprorroga` int(11) NOT NULL,
  `Tipoincapacidad` int(11) NOT NULL,
  `Fechainicio` date NOT NULL,
  `Fechafinal` date NOT NULL,
  `Dias` int(11) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  `Archivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `IdEmpresa` int(11) NOT NULL,
  `Descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`IdEmpresa`, `Descripcion`) VALUES
(1, 'Solutempo'),
(2, 'Oceanix'),
(3, 'Cargoban OLP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eps`
--

CREATE TABLE `tbl_eps` (
  `IdEps` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_personas`
--

CREATE TABLE `tbl_personas` (
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Eps` int(11) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Areatrabajo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_prorroga`
--

CREATE TABLE `tbl_prorroga` (
  `Idprorroga` int(11) NOT NULL,
  `Descripcion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_prorroga`
--

INSERT INTO `tbl_prorroga` (`Idprorroga`, `Descripcion`) VALUES
(1, 'SI'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursal`
--

CREATE TABLE `tbl_sucursal` (
  `IdSucursal` int(11) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_sucursal`
--

INSERT INTO `tbl_sucursal` (`IdSucursal`, `Descripcion`, `Empresa`) VALUES
(24, 'Admon Santamarta', 3),
(25, 'OPL santamarta', 3),
(26, 'Admon Uraba', 3),
(27, 'OPL Uraba', 3),
(30, 'Oceanix', 2),
(102, '', 1),
(103, '', 1),
(111, '', 1),
(114, '', 1),
(120, '', 1),
(218, 'Medellin', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo`
--

CREATE TABLE `tbl_tipo` (
  `IdTipo` int(11) NOT NULL,
  `Descripcion` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_tipo`
--

INSERT INTO `tbl_tipo` (`IdTipo`, `Descripcion`) VALUES
(1, 'EG'),
(2, 'AT'),
(3, 'LM'),
(4, 'LP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Sucursal` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_areatrabajo`
--
ALTER TABLE `tbl_areatrabajo`
  ADD PRIMARY KEY (`IdArea`);

--
-- Indices de la tabla `tbl_det_incapacidadper`
--
ALTER TABLE `tbl_det_incapacidadper`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`IdEmpresa`);

--
-- Indices de la tabla `tbl_eps`
--
ALTER TABLE `tbl_eps`
  ADD PRIMARY KEY (`IdEps`);

--
-- Volcado de datos para la tabla `tbl_eps`
--

INSERT INTO `tbl_eps` (`IdEps`, `Descripcion`) VALUES
(1, 'COOMEVA'),
(2, 'SURA'),
(3, 'MEDIMAS'),
(4, 'NUEVA EPS'),
(5, 'SAVIA SALUD'),
(6, 'EQUIDAD ARL'),
(7, 'COOSALUD'),
(8, 'SALUD TOTAL'),
(9, 'ASOC MUTUAL SER'),
(10, 'EPS SANITAS'),
(11, 'EPS CAJACOPI'),
(12, 'FAMISANAR'),
(13, 'SURA ARL');
--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`Cedula`);

--
-- Indices de la tabla `tbl_prorroga`
--
ALTER TABLE `tbl_prorroga`
  ADD PRIMARY KEY (`Idprorroga`);

--
-- Indices de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD PRIMARY KEY (`IdSucursal`);

--
-- Indices de la tabla `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  ADD PRIMARY KEY (`IdTipo`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_areatrabajo`
--
ALTER TABLE `tbl_areatrabajo`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_det_incapacidadper`
--
ALTER TABLE `tbl_det_incapacidadper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_eps`
--
ALTER TABLE `tbl_eps`
  MODIFY `IdEps` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_prorroga`
--
ALTER TABLE `tbl_prorroga`
  MODIFY `Idprorroga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  MODIFY `IdTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
