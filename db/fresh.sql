-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2023 at 09:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_config`
--

CREATE TABLE `tbl_config` (
  `Id_configuracion` int(11) NOT NULL,
  `Descripcion` varchar(30) NOT NULL,
  `Valor` float NOT NULL,
  `Estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_config`
--

INSERT INTO `tbl_config` (`Id_configuracion`, `Descripcion`, `Valor`, `Estado`) VALUES
(1, 'Precio por Libra', 1.25, 'Activo'),
(2, 'Precio por canasto', 8, 'Activo'),
(3, 'Peso por canasto', 3.5, 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuentas`
--

CREATE TABLE `tbl_cuentas` (
  `Id_cuenta` int(11) NOT NULL,
  `Usuario` varchar(40) NOT NULL,
  `Contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cuentas`
--

INSERT INTO `tbl_cuentas` (`Id_cuenta`, `Usuario`, `Contraseña`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_empleados`
--

CREATE TABLE `tbl_empleados` (
  `Id_empleado` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_empleados`
--

INSERT INTO `tbl_empleados` (`Id_empleado`, `Nombre`, `Apellido`, `Estado`) VALUES
(1, 'Alejandro', 'German', 'Activo'),
(2, 'Gym Carlos', 'Castillo', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_operaciones`
--

CREATE TABLE `tbl_operaciones` (
  `Id_operacion` int(11) NOT NULL,
  `Id_empleado` int(11) NOT NULL,
  `Peso` float NOT NULL,
  `Canasto` float NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL DEFAULT current_timestamp(),
  `Estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_operaciones`
--

INSERT INTO `tbl_operaciones` (`Id_operacion`, `Id_empleado`, `Peso`, `Canasto`, `Fecha`, `Hora`, `Estado`) VALUES
(1, 2, 175, 4, '2023-06-11', '22:10:06', 'Activo'),
(2, 1, 400, 5, '2023-06-12', '02:13:16', 'Activo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prestamos`
--

CREATE TABLE `tbl_prestamos` (
  `Id_prestamo` int(11) NOT NULL,
  `Id_empleado` int(11) NOT NULL,
  `Prestamo` float NOT NULL,
  `Pago` int(1) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Estado` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_prestamos`
--

INSERT INTO `tbl_prestamos` (`Id_prestamo`, `Id_empleado`, `Prestamo`, `Pago`, `Fecha`, `Hora`, `Estado`) VALUES
(1, 1, 100, 1, '2023-06-12', '03:41:52', 'Activo'),
(2, 1, 100, 1, '2023-06-12', '03:42:16', 'Activo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_config`
--
ALTER TABLE `tbl_config`
  ADD PRIMARY KEY (`Id_configuracion`);

--
-- Indexes for table `tbl_cuentas`
--
ALTER TABLE `tbl_cuentas`
  ADD PRIMARY KEY (`Id_cuenta`);

--
-- Indexes for table `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  ADD PRIMARY KEY (`Id_empleado`),
  ADD KEY `Nombre` (`Nombre`);

--
-- Indexes for table `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  ADD PRIMARY KEY (`Id_operacion`),
  ADD KEY `Id_empleado` (`Id_empleado`);

--
-- Indexes for table `tbl_prestamos`
--
ALTER TABLE `tbl_prestamos`
  ADD PRIMARY KEY (`Id_prestamo`),
  ADD KEY `Id_empleado` (`Id_empleado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_config`
--
ALTER TABLE `tbl_config`
  MODIFY `Id_configuracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_cuentas`
--
ALTER TABLE `tbl_cuentas`
  MODIFY `Id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_empleados`
--
ALTER TABLE `tbl_empleados`
  MODIFY `Id_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  MODIFY `Id_operacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_prestamos`
--
ALTER TABLE `tbl_prestamos`
  MODIFY `Id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_operaciones`
--
ALTER TABLE `tbl_operaciones`
  ADD CONSTRAINT `tbl_operaciones_ibfk_1` FOREIGN KEY (`Id_empleado`) REFERENCES `tbl_empleados` (`Id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_prestamos`
--
ALTER TABLE `tbl_prestamos`
  ADD CONSTRAINT `tbl_prestamos_ibfk_1` FOREIGN KEY (`Id_empleado`) REFERENCES `tbl_empleados` (`Id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
