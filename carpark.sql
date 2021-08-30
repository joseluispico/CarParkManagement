-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 30, 2021 at 06:10 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carPark_projectV2`
--

-- --------------------------------------------------------

--
-- Table structure for table `acceso`
--

CREATE TABLE `acceso` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `tipo_usuario` varchar(50) NOT NULL,
  `dia_registro` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tempo`
--

CREATE TABLE `tempo` (
  `id` int(11) NOT NULL,
  `placa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tempo`
--

INSERT INTO `tempo` (`id`, `placa`) VALUES
(37, 'wsd-343'),
(38, 'DRF-765');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `numeroticket` int(11) NOT NULL,
  `fechaentrada` date DEFAULT NULL,
  `horaentrada` time DEFAULT NULL,
  `monto` int(11) DEFAULT NULL,
  `fechasalida` date DEFAULT NULL,
  `horasalida` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`numeroticket`, `fechaentrada`, `horaentrada`, `monto`, `fechasalida`, `horasalida`) VALUES
(1, '2021-06-06', '11:23:18', 4070, '2021-06-06', '14:33:51'),
(2, '2021-06-06', '11:27:56', 3990, '2021-06-06', '14:36:40'),
(3, '2021-06-06', '11:28:20', 24310, '2021-06-06', '14:41:24'),
(4, '2021-06-13', '10:53:54', 21090, '2021-06-13', '10:54:34'),
(5, '2021-06-13', '10:54:17', 24080, '2021-06-13', '11:03:32'),
(6, '2021-06-13', '11:03:19', 21090, '2021-06-17', '12:03:08'),
(7, '2021-06-13', '11:05:49', 1090, '2021-06-13', '11:23:08'),
(8, '2021-06-13', '11:06:00', 21090, '2021-06-13', '11:06:07'),
(9, '2021-06-13', '11:15:08', 2320, '2021-06-13', '11:44:03'),
(10, '2021-06-13', '11:23:26', 2240, '2021-06-13', '11:52:03'),
(11, '2021-06-13', '11:52:13', 21090, '2021-06-13', '11:52:24'),
(12, '2021-06-17', '12:02:38', 13780, '2021-07-10', '22:38:35'),
(13, '2021-06-17', '12:02:52', 14340, '2021-07-11', '06:39:55'),
(14, '2021-06-17', '12:03:23', 1090, '2021-07-11', '12:46:03'),
(15, '2021-07-11', '13:32:58', 1120, '2021-07-11', '13:46:31'),
(16, '2021-07-11', '13:34:22', 1360, '2021-07-11', '14:04:31'),
(17, '2021-07-11', '13:39:11', 2720, '2021-07-11', '14:05:10'),
(18, '2021-07-11', '13:43:02', 2880, '2021-07-11', '14:08:18'),
(19, '2021-07-11', '13:45:59', 2960, '2021-07-11', '14:10:25'),
(20, '2021-07-11', '13:52:21', 4450, '2021-07-11', '14:10:31'),
(21, '2021-07-11', '13:55:19', 27790, '2021-07-12', '13:21:39'),
(22, '2021-07-11', '13:57:10', 4690, '2021-07-11', '14:12:25'),
(23, '2021-07-11', '13:58:25', 3687, '2021-07-11', '14:16:36'),
(24, '2021-07-11', '14:01:28', 26670, '2021-07-12', '13:22:14'),
(25, '2021-07-11', '14:03:42', 2062, '2021-07-11', '14:24:37'),
(26, '2021-07-11', '14:11:45', 25950, '2021-07-12', '13:22:32'),
(27, '2021-07-12', '13:19:04', 1090, '2021-07-12', '13:22:56'),
(28, '2021-07-12', '13:19:25', 31680, '2021-07-12', '20:56:55'),
(29, '2021-07-12', '13:19:53', 29892, '2021-07-12', '21:00:42'),
(30, '2021-07-12', '13:20:22', 10000, '2021-07-12', '21:04:30'),
(31, '2021-07-15', '12:42:18', 2450, '2021-07-15', '13:25:20'),
(32, '2021-07-15', '13:02:50', 2160, '2021-07-15', '13:29:37'),
(33, '2021-07-15', '13:03:08', 53970, '2021-07-17', '14:10:08'),
(34, '2021-07-15', '13:27:52', 54770, '2021-07-17', '14:10:19'),
(35, '2021-07-17', '14:17:38', 1122570, '2021-08-29', '11:05:38'),
(36, '2021-07-17', '14:17:46', 1161024, '2021-08-30', '04:26:45'),
(37, '2021-07-17', '14:17:53', NULL, NULL, NULL),
(38, '2021-08-29', '11:01:37', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `tipousuario` varchar(50) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `clave`, `nombre`, `apellido`, `tipousuario`, `fecha_registro`, `status`) VALUES
(8, 'jlpa72', '$2y$10$chfG1TnWLa9/g2E6pa3dq.gu0AVIwpoqkoxZUB4y4bQJig4pLkY0O', 'Jose', 'Pico', 'Administrador', '2021-06-18 00:57:44', 1),
(9, 'Juan22', '$2y$10$c4QfNEvh49hD9bgBPr8eO.yk67uSrBfiJP6gQTsCCsaTRpFi36VNq', 'Juan', 'Vivas', 'Administrador', '2021-06-18 00:59:19', 1),
(10, 'rox1988', '$2y$10$43YZZr4vQxTJMWEKIpOP7.2XvWem65tAj64Yb2eOiMYFgTp9XBa0C', 'Roxana', 'Castro', 'Operador', '2021-06-18 01:00:12', 1),
(11, 'maria33', '$2y$10$Uqb7PkWBfZxppWyOToaH..eQF1CaVjHzyLB/OCjcHyOgw3JQLsdde', 'Maria', 'Alvia', 'Operador', '2021-06-18 01:05:44', 1),
(20, 'Test', '$2y$10$H9IspND3pPKhJ1j9wiW7Ie4iJsmI4/gL1xKGt67vGvJWqOSJCo/pq', 'Test', 'Account', 'Administrador', '2021-07-16 00:27:36', 1),
(21, 'jlpa722', '$2y$10$TQGOwHHB66e9Yp1fCDZQbOO.NzhYS50V/RNR/AGFFYq5/QTbElx1y', 'Jose22', 'Pico22', 'Operador', '2021-07-18 00:20:33', 1),
(22, 'jlpa7222', '$2y$10$iUiWugybhE0LSuE.im5mGu.cxSJ5PaTXQnclP5vCQzWd1qyq3gH1S', 'Luis', 'Pico', 'Administrador', '2021-08-29 15:33:58', NULL),
(27, 'Monica', '$2y$10$nCmmKRtcgZGSk/g4t7176uVNb2wDalEtDCJBlUfcGChD0MxyRg4M2', 'Monica', 'Blanco', 'Operador', '2021-08-29 19:11:24', 1),
(28, 'Sara', '$2y$10$0yC7si7W8iNPyLIc7Paim.kpmoNDGNaIuSEfmFR0pbDX8lZAUcIN6', 'Sara', 'Pineda', 'Operador', '2021-08-29 19:12:04', 1),
(29, 'Roberto', '$2y$10$J8tEzE7kMhWThzr.eYUC5u.mU.oX0zJTfw43WPlTSdJWytFhCcyjq', 'Roberto', 'Manriques', 'Operador', '2021-08-30 13:26:17', 1),
(30, 'Rash', '$2y$10$vtnLI0ruoVuEO3vb.hb1B.zggDABPcrp3cTTVdQy0djGDwyGp.tvi', 'Rash', 'Man', 'Administrador', '2021-08-30 13:26:58', 1),
(31, 'Sal01', '$2y$10$V07o6LoFgRhmy55DUhO/leS1ycaL1o08CwtXncUFRYEcq5qC3vp9G', 'Saloni', 'Puri', 'Administrador', '2021-08-30 13:29:41', 1),
(34, 'Cliff', '$2y$10$Qz.xyQREP9gnEVxJ2jq7WuVlYqAHo90HsvYRZ7EH0ujrvwTqaucBq', 'Cliff', 'Burton', 'Operador', '2021-08-30 13:45:06', 1),
(35, 'Monas', '$2y$10$vi5iF4gyGkvF..gFEC0Vbec0cDInR/mOiXP19QZEDjP7HsGV46mDS', 'Monash', 'Burton', 'Operador', '2021-08-30 13:48:48', 1),
(36, 'mindatlasadmin', '$2y$10$SaSRp9AxAveZ305c.5Qa5uhENPpuBts.EL25hHYv8v54ZeJPgE6r.', 'Mind', 'Atlas', 'Administrador', '2021-08-30 13:49:22', 1),
(37, 'Test01', '$2y$10$ai8nLAOvzrYim/HWFpcuPeJw7lfBKXviTvhP2dmU5llzTWM8Wcrbi', 'Test', 'Account', 'Administrador', '2021-08-30 13:51:40', 1),
(38, 'Test02', '$2y$10$gQT/v8gGJ66.63xAmQjfS.UHsGcnGFHzqHVZVRDFhxxTX/cXoQPNC', 'Test02', 'Account', 'Operador', '2021-08-30 13:52:15', 1),
(39, 'jossven', '$2y$10$AuqJx8AeNhGoeZMb45Tp..N4Jo7ub2nZbcbLH6tCHZMnOFrdJKYvy', 'Joss', 'Ven', 'Administrador', '2021-08-30 13:53:49', 1),
(41, 'Test03', '$2y$10$Kksm58W2ClQnOVRchgutPexM/yT.O3jMSHzeSvRVdV4NpJOHwwB/i', 'Test03', 'Account', 'Operador', '2021-08-30 13:59:02', 1),
(42, 'test05', '$2y$10$VkADs4JYICz2n9.dbF/lZO1nJ0XSK1e89RnrcotXC.ik8J/nr86hO', 'Test05', 'Account', 'Operador', '2021-08-30 14:04:22', 1),
(43, 'myTest', '$2y$10$HIjHkppCdxHIvdGpWQab1uEDgq8oqy8kXYi7lNqs8Le26/fcUyhpS', 'MyTest', 'Account', 'Operador', '2021-08-30 14:25:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` int(11) NOT NULL,
  `placa` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `tipovehiculo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `placa`, `modelo`, `tipovehiculo`) VALUES
(1, 'wsd-342', 'Sedan', 'Liviano'),
(2, 'wsd-343', 'Sedan', 'Pesado'),
(3, 'wsd-344', 'Ford', 'Liviano'),
(4, 'VIC-343', 'Toyota', 'Liviano'),
(5, 'VIC-345', 'Hyundai', 'Liviano'),
(6, 'VIC-343', 'Ford', 'Liviano'),
(7, 'wsd-345', 'Hyundai', 'Liviano'),
(8, 'VIC-345', 'Sedan', 'Liviano'),
(9, 'wsd-342', 'Ford', 'Pesado'),
(10, 'VIC-343', 'Ford', 'Pesado'),
(11, 'wsd-344', 'Sedan', 'Liviano'),
(12, 'wsd-342', 'Sedan', 'Liviano'),
(13, 'VIC-343', 'Sedan', 'Liviano'),
(14, 'VIC-345', 'Sedan', 'Liviano'),
(15, 'wsd-342', 'Sedan', 'Liviano'),
(16, 'VIC-345', 'Hyundai', 'Pesado'),
(17, 'wsd-344', 'Ford', 'Liviano'),
(18, 'wsd-343', 'Ford', 'Pesado'),
(19, 'wsd-349', 'Ford', 'Pesado'),
(20, 'VIC-340', 'Sedan', 'Pesado'),
(21, 'VIC-345', 'Sedan', 'Liviano'),
(22, 'NSW-987', 'Sedan', 'Liviano'),
(23, 'NSW', 'BMW', 'Liviano'),
(24, 'wsd', 'Sedan', 'Liviano'),
(25, 'NSW-988', 'BMW', 'Pesado'),
(26, 'NSW-999', 'BMW', 'Liviano'),
(27, 'wsd-344', 'Ford', 'Pesado'),
(28, 'wsd-345', 'Hyundai', '0'),
(29, 'VIC-346', 'BMW', 'Pesado'),
(30, 'VIC-300', 'Toyota', 'Liviano'),
(31, 'wsd-342', 'Sedan', 'Pesado'),
(32, 'VIC-343', 'Ford', 'Pesado'),
(33, 'wsd-344', 'Sedan', 'Liviano'),
(34, 'wsd-345', 'Hyundai', 'Pesado'),
(35, 'wsd-342', 'Sedan', 'Liviano'),
(36, 'VIC-345', 'Ford', 'Pesado'),
(37, 'wsd-343', 'Sedan', 'Pesado'),
(38, 'DRF-765', 'Corsa', 'Liviano');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempo`
--
ALTER TABLE `tempo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`numeroticket`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
