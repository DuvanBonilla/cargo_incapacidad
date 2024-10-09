-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 14:51:02
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

--
-- Volcado de datos para la tabla `tbl_areatrabajo`
--

INSERT INTO `tbl_areatrabajo` (`IdArea`, `Descripcion`) VALUES
(1, 'Banacol - Zungo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_det_incapacidadper`
--

CREATE TABLE `tbl_det_incapacidadper` (
  `id` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Fechacontrato` date NOT NULL,
  `Ibc` int(11) NOT NULL,
  `Codigodiagnostico` varchar(10) NOT NULL,
  `Inicialprorroga` int(11) NOT NULL,
  `Tipoincapacidad` int(11) NOT NULL,
  `Fechainicio` date NOT NULL,
  `Fechafinal` date NOT NULL,
  `Totaldias` int(11) NOT NULL,
  `Diascobrar` int(11) NOT NULL,
  `Valorpagado` int(11) NOT NULL,
  `Observaciones` varchar(100) NOT NULL,
  `Archivo` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incapacidades_pagas`
--

CREATE TABLE `tbl_incapacidades_pagas` (
  `Id` int(11) NOT NULL,
  `Cedula` varchar(15) NOT NULL,
  `Fechacontrato` date NOT NULL,
  `Ibc` int(11) NOT NULL,
  `Codigodiagnostico` varchar(10) NOT NULL,
  `Inicialprorroga` int(11) NOT NULL,
  `Tipoincapacidad` int(11) NOT NULL,
  `Fechainicio` date NOT NULL,
  `Fechafinal` date NOT NULL,
  `Totaldias` int(11) NOT NULL,
  `Diascobrar` int(11) NOT NULL,
  `Valorpagado` int(11) NOT NULL,
  `Valordevuelto` int(11) NOT NULL,
  `Observaciones` varchar(50) NOT NULL,
  `Archivo` varchar(50) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `Areatrabajo` int(11) NOT NULL,
  `Fechacontrato` date NOT NULL
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
(1, 'Inicial'),
(2, 'Prorroga');

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
(2, 'EG-T'),
(3, 'AT'),
(4, 'LM'),
(5, 'LP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `Cedula` varchar(15) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Estado` int(11) NOT NULL,
  `Sucursal` int(11) NOT NULL,
  `Usuario` varchar(20) NOT NULL,
  `Contrasena` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`Cedula`, `Nombre`, `Estado`, `Sucursal`, `Usuario`, `Contrasena`) VALUES
('1234', 'paola', 1, 1, 'yessy', '$2y$10$2svriwHMKSIilR/xm0srYeidrcZXXN3d3lzGu3kJymolym1GGcvQK');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `Tipoincapacidad` (`Tipoincapacidad`),
  ADD KEY `Cedula` (`Cedula`),
  ADD KEY `Inicialprorroga` (`Inicialprorroga`);

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
-- Indices de la tabla `tbl_incapacidades_pagas`
--
ALTER TABLE `tbl_incapacidades_pagas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Tipoincapacidad` (`Tipoincapacidad`),
  ADD KEY `tbl_incapacidades_pagas_ibfk_1` (`Cedula`),
  ADD KEY `Inicialprorroga` (`Inicialprorroga`);

--
-- Indices de la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD PRIMARY KEY (`Cedula`,`Fechacontrato`),
  ADD KEY `Empresa` (`Empresa`),
  ADD KEY `Eps` (`Eps`),
  ADD KEY `Areatrabajo` (`Areatrabajo`);

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
  ADD PRIMARY KEY (`Cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_areatrabajo`
--
ALTER TABLE `tbl_areatrabajo`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_det_incapacidadper`
--
ALTER TABLE `tbl_det_incapacidadper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_eps`
--
ALTER TABLE `tbl_eps`
  MODIFY `IdEps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_incapacidades_pagas`
--
ALTER TABLE `tbl_incapacidades_pagas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_prorroga`
--
ALTER TABLE `tbl_prorroga`
  MODIFY `Idprorroga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo`
--
ALTER TABLE `tbl_tipo`
  MODIFY `IdTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_det_incapacidadper`
--
ALTER TABLE `tbl_det_incapacidadper`
  ADD CONSTRAINT `tbl_det_incapacidadper_ibfk_1` FOREIGN KEY (`Tipoincapacidad`) REFERENCES `tbl_tipo` (`IdTipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_det_incapacidadper_ibfk_2` FOREIGN KEY (`Tipoincapacidad`) REFERENCES `tbl_tipo` (`IdTipo`),
  ADD CONSTRAINT `tbl_det_incapacidadper_ibfk_3` FOREIGN KEY (`Cedula`) REFERENCES `tbl_personas` (`Cedula`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_det_incapacidadper_ibfk_4` FOREIGN KEY (`Inicialprorroga`) REFERENCES `tbl_prorroga` (`Idprorroga`);

--
-- Filtros para la tabla `tbl_incapacidades_pagas`
--
ALTER TABLE `tbl_incapacidades_pagas`
  ADD CONSTRAINT `tbl_incapacidades_pagas_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `tbl_personas` (`Cedula`) ON DELETE CASCADE,
  ADD CONSTRAINT `tbl_incapacidades_pagas_ibfk_2` FOREIGN KEY (`Tipoincapacidad`) REFERENCES `tbl_tipo` (`IdTipo`),
  ADD CONSTRAINT `tbl_incapacidades_pagas_ibfk_3` FOREIGN KEY (`Inicialprorroga`) REFERENCES `tbl_prorroga` (`Idprorroga`);

--
-- Filtros para la tabla `tbl_personas`
--
ALTER TABLE `tbl_personas`
  ADD CONSTRAINT `tbl_personas_ibfk_1` FOREIGN KEY (`Empresa`) REFERENCES `tbl_empresa` (`IdEmpresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personas_ibfk_2` FOREIGN KEY (`Eps`) REFERENCES `tbl_eps` (`IdEps`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_personas_ibfk_3` FOREIGN KEY (`Areatrabajo`) REFERENCES `tbl_areatrabajo` (`IdArea`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
