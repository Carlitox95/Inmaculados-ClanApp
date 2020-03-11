-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-10-2019 a las 21:45:39
-- Versión del servidor: 10.3.14-MariaDB
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmaculados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ausencias`
--

DROP TABLE IF EXISTS `ausencias`;
CREATE TABLE IF NOT EXISTS `ausencias` (
  `ID_Ausencia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Miembro` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `Etiqueta_Miembro` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha_Ausencia` date NOT NULL,
  PRIMARY KEY (`ID_Ausencia`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ausencias`
--

INSERT INTO `ausencias` (`ID_Ausencia`, `Nombre_Miembro`, `Etiqueta_Miembro`, `Fecha_Ausencia`) VALUES
(1, 'mainkra', '2YYLLUG0L', '2019-08-14'),
(2, 'byViruZz', 'YQG02JGV', '2019-08-14'),
(3, 'KST', '8Y2Y9VUPQ', '2019-08-14'),
(4, 'ARGYY', '2VQ8LL92J', '2019-08-14'),
(5, 'Hide on Bush', '8980QV8VQ', '2019-08-14'),
(6, 'juani', 'P0CL9YLUQ', '2019-08-14'),
(7, 'CARASSALE', 'R2CQYQPU', '2019-08-14'),
(8, 'Pity New Cuenta', '2L8PJ2GUL', '2019-08-14'),
(9, 'Pity❤✌', '2289JV9C', '2019-08-14'),
(10, 'Lauti.Ciari', '209GYCG8', '2019-08-14'),
(11, 'Puny', '8G802CUG0', '2019-08-14'),
(12, '#teo', 'PP2U8R8C', '2019-08-18'),
(13, 'montypuerco', '8PQ2L9Y88', '2019-08-18'),
(14, 'perrequetengue', '2JQJYVR2C', '2019-08-18'),
(15, 'ARGYY', '2VQ8LL92J', '2019-08-18'),
(16, 'mainkra', '2YYLLUG0L', '2019-08-18'),
(17, 'Joaquin', 'JGVJJ8YG', '2019-08-18'),
(18, 'byViruZz', 'YQG02JGV', '2019-08-18'),
(19, 'KST', '8Y2Y9VUPQ', '2019-08-18'),
(20, 'CARASSALE', 'R2CQYQPU', '2019-08-18'),
(21, 'Pity New Cuenta', '2L8PJ2GUL', '2019-08-18'),
(22, 'Pity❤✌', '2289JV9C', '2019-08-18'),
(23, 'Lauti.Ciari', '209GYCG8', '2019-08-18'),
(24, 'cartel de cali', 'LV88PLGU', '2019-08-18'),
(25, 'Puny', '8G802CUG0', '2019-08-18'),
(26, 'mariolui', '9RVR0P0J9', '2019-08-19'),
(27, '#teo', 'PP2U8R8C', '2019-08-19'),
(28, 'perrequetengue', '2JQJYVR2C', '2019-08-19'),
(29, 'ARGYY', '2VQ8LL92J', '2019-08-19'),
(30, 'mainkra', '2YYLLUG0L', '2019-08-19'),
(31, 'byViruZz', 'YQG02JGV', '2019-08-19'),
(32, 'lucaaaaas', '9V0R02000', '2019-08-19'),
(33, 'delfi', '890VC9RQG', '2019-08-19'),
(34, 'KST', '8Y2Y9VUPQ', '2019-08-19'),
(35, 'Hide on Bush', '8980QV8VQ', '2019-08-19'),
(36, 'CARASSALE', 'R2CQYQPU', '2019-08-19'),
(37, 'Pity New Cuenta', '2L8PJ2GUL', '2019-08-19'),
(38, 'Pity❤✌', '2289JV9C', '2019-08-19'),
(39, 'Lauti.Ciari', '209GYCG8', '2019-08-19'),
(40, 'cartel de cali', 'LV88PLGU', '2019-08-19'),
(41, 'Puny', '8G802CUG0', '2019-08-19'),
(42, 'FITO', '2C9C08LPG', '2019-08-24'),
(43, 'rodeiro puto', '80JRCCP0J', '2019-08-24'),
(44, 'HunterNight', '2QP09PGGL', '2019-08-24'),
(45, 'b4rriosss', 'P8CVQ2QQ0', '2019-08-24'),
(46, 'ARGYY', '2VQ8LL92J', '2019-08-24'),
(47, 'perrequetengue', '2JQJYVR2C', '2019-08-24'),
(48, 'mainkra', '2YYLLUG0L', '2019-08-24'),
(49, 'byViruZz', 'YQG02JGV', '2019-08-24'),
(50, 'delfi', '890VC9RQG', '2019-08-24'),
(51, 'KST', '8Y2Y9VUPQ', '2019-08-24'),
(52, 'Hi Im FoKa', 'QVQRCPVQ', '2019-08-24'),
(53, 'Hide on Bush', '8980QV8VQ', '2019-08-24'),
(54, 'CARASSALE', 'R2CQYQPU', '2019-08-24'),
(55, 'Pity New Cuenta', '2L8PJ2GUL', '2019-08-24'),
(56, 'Pity❤✌', '2289JV9C', '2019-08-24'),
(57, 'Lauti.Ciari', '209GYCG8', '2019-08-24'),
(58, 'cartel de cali', 'LV88PLGU', '2019-08-24'),
(59, 'Puny', '8G802CUG0', '2019-08-24'),
(60, 'MateoCarpYt', '8VQLVVPGJ', '2019-08-24'),
(61, 'montypuerco', '8PQ2L9Y88', '2019-08-28'),
(62, 'Hide on Bush', '8980QV8VQ', '2019-08-28'),
(63, 'CARASSALE', 'R2CQYQPU', '2019-08-28'),
(64, 'cartel de cali', 'LV88PLGU', '2019-08-28'),
(65, 'el lechero', 'VJYGLY00', '2019-08-28'),
(66, 'Puny', '8G802CUG0', '2019-08-28'),
(67, '#teo', 'PP2U8R8C', '2019-08-30'),
(68, 'montypuerco', '8PQ2L9Y88', '2019-08-30'),
(69, 'Goku Black 7u7', 'G0QP9RCR', '2019-08-30'),
(70, 'Conddumarneff', 'PJLP28VCL', '2019-08-30'),
(71, 'pokemon go', '2V20LRC8Y', '2019-08-30'),
(72, 'delfi', '890VC9RQG', '2019-08-30'),
(73, 'Hide on Bush', '8980QV8VQ', '2019-08-30'),
(74, 'cartel de cali', 'LV88PLGU', '2019-08-30'),
(75, 'el lechero', 'VJYGLY00', '2019-08-30'),
(76, 'Puny', '8G802CUG0', '2019-08-30'),
(77, 'MateoCarpYt', '8VQLVVPGJ', '2019-08-30'),
(78, 'chaguer', 'Y20J8RG8R', '2019-08-30'),
(79, 'nacho', '2LPCYLCRG', '2019-09-01'),
(80, '#teo', 'PP2U8R8C', '2019-09-01'),
(81, 'Goku Black 7u7', 'G0QP9RCR', '2019-09-01'),
(82, 'montypuerco', '8PQ2L9Y88', '2019-09-01'),
(83, 'Hide on Bush', '8980QV8VQ', '2019-09-01'),
(84, 'cartel de cali', 'LV88PLGU', '2019-09-01'),
(85, 'Leoneitor', 'QVLJCC2L', '2019-09-01'),
(86, 'Puny', '8G802CUG0', '2019-09-01'),
(87, 'MateoCarpYt', '8VQLVVPGJ', '2019-09-01'),
(88, 'chaguer', 'Y20J8RG8R', '2019-09-01'),
(89, 'Gonzalo', '8JGQLJQ8L', '2019-09-04'),
(90, 'b4rriosss', 'P8CVQ2QQ0', '2019-09-04'),
(91, 'nacho', '2LPCYLCRG', '2019-09-04'),
(92, 'pokemon go', '2V20LRC8Y', '2019-09-04'),
(93, 'Hide on Bush', '8980QV8VQ', '2019-09-04'),
(94, 'cartel de cali', 'LV88PLGU', '2019-09-04'),
(95, 'lucaaaaas', '9V0R02000', '2019-09-04'),
(96, '#teo', 'PP2U8R8C', '2019-09-04'),
(97, 'Leoneitor', 'QVLJCC2L', '2019-09-04'),
(98, 'Puny', '8G802CUG0', '2019-09-04'),
(99, 'MateoCarpYt', '8VQLVVPGJ', '2019-09-04'),
(100, 'chaguer', 'Y20J8RG8R', '2019-09-04'),
(101, 'golt3428', '8P8VYJ8PG', '2019-09-07'),
(102, 'nacho', '2LPCYLCRG', '2019-09-07'),
(103, 'juani', 'P0CL9YLUQ', '2019-09-07'),
(104, 'Auguchito10', '8RQGRLY9G', '2019-09-07'),
(105, 'pokemon go', '2V20LRC8Y', '2019-09-07'),
(106, 'delfi', '890VC9RQG', '2019-09-07'),
(107, 'Rêgąlô çôpąš❤️', '9CUPY992', '2019-09-07'),
(108, 'jjulietar', 'PVPJP0UG8', '2019-09-07'),
(109, 'cartel de cali', 'LV88PLGU', '2019-09-07'),
(110, '#teo', 'PP2U8R8C', '2019-09-07'),
(111, 'Puny', '8G802CUG0', '2019-09-07'),
(112, 'Cry4nide', '8LPQQLJCQ', '2019-09-07'),
(113, 'chaguer', 'Y20J8RG8R', '2019-09-07'),
(114, 'gTarqui', 'LR9Q2VP0', '2019-09-10'),
(115, 'lucaaaaas', '9V0R02000', '2019-09-10'),
(116, 'Rêgąlô çôpąš❤️', '9CUPY992', '2019-09-10'),
(117, 'destructor+yt', '2QLGJ89V9', '2019-09-10'),
(118, 'maximus', 'RYJQL28V', '2019-09-10'),
(119, 'cartel de cali', 'LV88PLGU', '2019-09-10'),
(120, '#teo', 'PP2U8R8C', '2019-09-10'),
(121, 'Puny', '8G802CUG0', '2019-09-10'),
(122, 'Cry4nide', '8LPQQLJCQ', '2019-09-10'),
(123, 'chaguer', 'Y20J8RG8R', '2019-09-10'),
(124, 'gTarqui', 'LR9Q2VP0', '2019-09-15'),
(125, 'golt3428', '8P8VYJ8PG', '2019-09-15'),
(126, 'lauchaco', '2R9URQJ82', '2019-09-15'),
(127, 'nacho', '2LPCYLCRG', '2019-09-15'),
(128, 'CARASSALE', 'R2CQYQPU', '2019-09-15'),
(129, 'Hide on Bush', '8980QV8VQ', '2019-09-15'),
(130, 'Pity❤✌', '2289JV9C', '2019-09-15'),
(131, 'Pity New Cuenta', '2L8PJ2GUL', '2019-09-15'),
(132, 'isaiaspro@#', 'PV80VCVQ8', '2019-09-15'),
(133, 'Goku Black 7u7', 'G0QP9RCR', '2019-09-15'),
(134, 'Rêgąlô çôpąš❤️', '9CUPY992', '2019-09-15'),
(135, 'cartel de cali', 'LV88PLGU', '2019-09-15'),
(136, 'Puny', '8G802CUG0', '2019-09-15'),
(137, 'chaguer', 'Y20J8RG8R', '2019-09-15'),
(138, 'gTarqui', 'LR9Q2VP0', '2019-09-17'),
(139, 'rsv', 'PPU8QQ28', '2019-09-17'),
(140, 'nacho', '2LPCYLCRG', '2019-09-17'),
(141, 'gustarocca', '2Y9PGRYJ0', '2019-09-17'),
(142, 'Pity New Cuenta', '2L8PJ2GUL', '2019-09-17'),
(143, 'Pity❤✌', '2289JV9C', '2019-09-17'),
(144, 'Goku Black 7u7', 'G0QP9RCR', '2019-09-17'),
(145, 'Rêgąlô çôpąš❤️', '9CUPY992', '2019-09-17'),
(146, 'cartel de cali', 'LV88PLGU', '2019-09-17'),
(147, 'Puny', '8G802CUG0', '2019-09-17'),
(148, 'chaguer', 'Y20J8RG8R', '2019-09-17'),
(149, 'gTarqui', 'LR9Q2VP0', '2019-09-22'),
(150, 'rodeiro puto', '80JRCCP0J', '2019-09-22'),
(151, 'Lord Stark', 'JGG9GYPU', '2019-09-22'),
(152, 'b4rriosss', 'P8CVQ2QQ0', '2019-09-22'),
(153, 'CARASSALE', 'R2CQYQPU', '2019-09-22'),
(154, 'BaltaX', 'L8RRGJUP', '2019-09-22'),
(155, 'FVX 278', 'U00QVYJ8', '2019-09-22'),
(156, 'Leoneitor', 'QVLJCC2L', '2019-09-22'),
(157, 'pokemon go', '2V20LRC8Y', '2019-09-22'),
(158, 'tobias 5', '2L2L2VLC8', '2019-09-22'),
(159, 'Rêgąlô çôpąš❤️', '9CUPY992', '2019-09-22'),
(160, 'el lechero', 'VJYGLY00', '2019-09-22'),
(161, 'cartel de cali', 'LV88PLGU', '2019-09-22'),
(162, 'Puny', '8G802CUG0', '2019-09-22'),
(163, 'Cry4nide', '8LPQQLJCQ', '2019-09-22'),
(164, 'chaguer', 'Y20J8RG8R', '2019-09-22'),
(165, 'CARASSALE', 'R2CQYQPU', '2019-09-30'),
(166, 'Hide on Bush', '8980QV8VQ', '2019-09-30'),
(167, '9z crics', 'Y9VG92GQR', '2019-09-30'),
(168, 'Mía kalifha', '9889Q8C8', '2019-09-30'),
(169, 'TOMYjinga98', '8VQLQCPYQ', '2019-09-30'),
(170, 'cartel de cali', 'LV88PLGU', '2019-09-30'),
(171, 'Puny', '8G802CUG0', '2019-09-30'),
(172, 'Cristofer', '8U8RVC2PJ', '2019-10-02'),
(173, 'KST', '8Y2Y9VUPQ', '2019-10-02'),
(174, 'CARASSALE', 'R2CQYQPU', '2019-10-02'),
(175, 'eduardo', '9L0GLRJUP', '2019-10-02'),
(176, '9z crics', 'Y9VG92GQR', '2019-10-02'),
(177, 'Mía kalifha', '9889Q8C8', '2019-10-02'),
(178, 'TOMYjinga98', '8VQLQCPYQ', '2019-10-02'),
(179, 'el lechero', 'VJYGLY00', '2019-10-02'),
(180, 'cartel de cali', 'LV88PLGU', '2019-10-02'),
(181, 'Puny', '8G802CUG0', '2019-10-02'),
(182, 'Cristofer', '8U8RVC2PJ', '2019-10-04'),
(183, 'Ari', '2RPGV2R8G', '2019-10-04'),
(184, 'Gonzalo', '8JGQLJQ8L', '2019-10-04'),
(185, 'CARASSALE', 'R2CQYQPU', '2019-10-04'),
(186, 'FVX 278', 'U00QVYJ8', '2019-10-04'),
(187, '9z crics', 'Y9VG92GQR', '2019-10-04'),
(188, 'Mía kalifha', '9889Q8C8', '2019-10-04'),
(189, 'TOMYjinga98', '8VQLQCPYQ', '2019-10-04'),
(190, 'Simón665', '2Q29Q0LU2', '2019-10-04'),
(191, 'el lechero', 'VJYGLY00', '2019-10-04'),
(192, 'cartel de cali', 'LV88PLGU', '2019-10-04'),
(193, 'Puny', '8G802CUG0', '2019-10-04'),
(194, 'gTarqui', 'LR9Q2VP0', '2019-10-06'),
(195, 'Ari', '2RPGV2R8G', '2019-10-06'),
(196, 'Ari', '2RPGV2R8G', '2019-10-08'),
(197, 'rodeiro puto', '80JRCCP0J', '2019-10-08'),
(198, 'Conddumarneff', 'PJLP28VCL', '2019-10-08'),
(199, 'CARASSALE', 'R2CQYQPU', '2019-10-08'),
(200, 'tsubasa ozora', 'PRGYUPC9Q', '2019-10-08'),
(201, 'willy183 Bv', '8CP2P2URU', '2019-10-08'),
(202, 'BOUZA', 'Y280GYP0G', '2019-10-08'),
(203, 'Mía kalifha', '9889Q8C8', '2019-10-08'),
(204, 'destructor+yt', '2QLGJ89V9', '2019-10-08'),
(205, 'el lechero', 'VJYGLY00', '2019-10-08'),
(206, 'cartel de cali', 'LV88PLGU', '2019-10-08'),
(207, 'Puny', '8G802CUG0', '2019-10-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `ID_Log` int(255) NOT NULL AUTO_INCREMENT,
  `Fecha_Log` date NOT NULL,
  `Hora_Log` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Tipo_Log` varchar(255) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_Log`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`ID_Log`, `Fecha_Log`, `Hora_Log`, `Tipo_Log`) VALUES
(1, '2019-10-16', '18:23', 'Update Miembros'),
(2, '2019-10-16', '18:24', 'Update Miembros'),
(3, '2019-10-16', '18:28', 'Update Miembros'),
(4, '2019-10-16', '18:28', 'Update Miembros'),
(5, '2019-10-16', '18:39', 'Update Miembros'),
(6, '2019-10-16', '18:39', 'Update Miembros'),
(7, '2019-10-16', '18:44', 'Update Miembros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

DROP TABLE IF EXISTS `miembros`;
CREATE TABLE IF NOT EXISTS `miembros` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Miembro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Etiqueta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pertenece` tinyint(1) NOT NULL,
  `Ingreso` date NOT NULL,
  `Egreso` date NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`ID`, `Miembro`, `Etiqueta`, `Pertenece`, `Ingreso`, `Egreso`) VALUES
(1, 'Nowskyj', '2LYCJG222', 1, '2019-07-26', '0000-00-00'),
(2, 'Derefico', '89GGJRYV0', 1, '2019-07-26', '0000-00-00'),
(3, 'Fruitsalad', '8C9LY9YL8', 1, '2019-07-26', '0000-00-00'),
(4, 'FITO', '2C9C08LPG', 0, '2019-07-26', '2019-08-28'),
(5, 'Ari', '2RPGV2R8G', 1, '2019-07-26', '0000-00-00'),
(6, 'gTarqui', 'LR9Q2VP0', 1, '2019-07-26', '0000-00-00'),
(7, 'Alex', '98CQPYPV', 1, '2019-07-26', '0000-00-00'),
(8, 'rodeiro puto', '80JRCCP0J', 0, '2019-07-26', '2019-09-30'),
(9, 'Gonzalo', '8JGQLJQ8L', 1, '2019-07-26', '0000-00-00'),
(10, 'KST', '8Y2Y9VUPQ', 1, '2019-07-26', '0000-00-00'),
(11, 'perrequetengue', '2JQJYVR2C', 1, '2019-07-26', '0000-00-00'),
(12, 'mainkra', '2YYLLUG0L', 0, '2019-07-26', '2019-08-25'),
(13, 'HunterNight', '2QP09PGGL', 0, '2019-07-26', '2019-08-11'),
(14, 'MAXITRON', 'QUVYPQCU', 0, '2019-07-26', '2019-08-02'),
(15, 'Pity New Cuenta', '2L8PJ2GUL', 0, '2019-07-26', '2019-08-25'),
(16, 'Facu23', 'GVYY8J8P', 0, '2019-07-26', '2019-07-28'),
(17, '#teo', 'PP2U8R8C', 0, '2019-07-26', '2019-09-14'),
(18, 'CarlitoxV95', 'PR20YUQ29', 1, '2019-07-26', '0000-00-00'),
(19, 'CARASSALE', 'R2CQYQPU', 0, '2019-07-26', '2019-08-30'),
(20, 'Joaquin', 'JGVJJ8YG', 0, '2019-07-26', '2019-09-16'),
(21, 'jjulietar', 'PVPJP0UG8', 1, '2019-07-26', '0000-00-00'),
(22, 'byViruZz', 'YQG02JGV', 0, '2019-07-26', '2019-08-25'),
(23, 'fer123', '8QJVUVVVU', 0, '2019-07-26', '2019-08-08'),
(24, 'Pity❤✌', '2289JV9C', 0, '2019-07-26', '2019-08-25'),
(25, 'delfi', '890VC9RQG', 1, '2019-07-26', '0000-00-00'),
(26, 'cartel de cali', 'LV88PLGU', 1, '2019-07-26', '0000-00-00'),
(27, 'BOUZA', 'Y280GYP0G', 1, '2019-07-26', '0000-00-00'),
(28, 'Puny', '8G802CUG0', 0, '2019-07-26', '2019-10-16'),
(29, 'pokemon go', '2V20LRC8Y', 0, '2019-07-26', '2019-09-26'),
(30, 'Derefico', '89GGJRYV0', 1, '2019-07-28', '0000-00-00'),
(31, 'Hi Im FoKa', 'QVQRCPVQ', 0, '2019-07-28', '2019-08-02'),
(32, 'BasiF', '2VR09GU8P', 0, '2019-07-28', '2019-08-02'),
(33, 'Lauti.Ciari', '209GYCG8', 0, '2019-07-28', '2019-08-28'),
(34, 'juani', 'P0CL9YLUQ', 0, '2019-07-29', '2019-09-20'),
(35, 'lauti', '88VPV09P2', 0, '2019-07-29', '2019-07-30'),
(36, 'Agustin', 'PVVRG8Q9Q', 0, '2019-07-29', '2019-08-06'),
(37, 'michell', 'Y9C0JQ2GV', 0, '2019-07-29', '2019-07-31'),
(38, 'Goku Black 7u7', 'G0QP9RCR', 0, '2019-07-29', '2019-09-23'),
(39, '☇Ezequiel☇', '88GV09UQV', 0, '2019-07-30', '2019-07-31'),
(40, 'Hide on Bush', '8980QV8VQ', 0, '2019-07-30', '2019-09-06'),
(41, '_Aczino_', '2J0JVRCV8', 0, '2019-08-02', '2019-08-03'),
(42, 'lucaaaaas', '9V0R02000', 0, '2019-08-05', '2019-09-26'),
(43, 'RODRI XD', '80G88822P', 0, '2019-08-05', '2019-08-08'),
(44, 'Conddumarneff', 'PJLP28VCL', 1, '2019-08-05', '0000-00-00'),
(45, 'ChaCha', 'QYVGQ99C', 0, '2019-08-05', '2019-10-07'),
(46, 'destructor+yt', '2QLGJ89V9', 0, '2019-08-08', '2019-08-10'),
(47, 'ARGYY', '2VQ8LL92J', 0, '2019-08-14', '2019-08-28'),
(48, 'montypuerco', '8PQ2L9Y88', 0, '2019-08-18', '2019-09-04'),
(49, 'mariolui', '9RVR0P0J9', 0, '2019-08-19', '2019-09-22'),
(50, 'maximus', 'RYJQL28V', 1, '2019-08-19', '0000-00-00'),
(51, 'gaspa', '2PV9LQCYJ', 0, '2019-08-20', '2019-08-24'),
(52, 'Hi Im FoKa', 'QVQRCPVQ', 0, '2019-08-21', '2019-08-28'),
(53, 'HunterNight', '2QP09PGGL', 0, '2019-08-24', '2019-08-28'),
(54, 'b4rriosss', 'P8CVQ2QQ0', 0, '2019-08-24', '2019-09-26'),
(55, 'MateoCarpYt', '8VQLVVPGJ', 0, '2019-08-24', '2019-09-10'),
(56, 'el lechero', 'VJYGLY00', 1, '2019-08-28', '0000-00-00'),
(57, 'chaguer', 'Y20J8RG8R', 0, '2019-08-30', '2019-09-22'),
(58, 'nacho', '2LPCYLCRG', 0, '2019-08-31', '2019-09-23'),
(59, 'Leoneitor', 'QVLJCC2L', 0, '2019-08-31', '2019-09-30'),
(60, 'Rêgąlô çôpąš❤️', '9CUPY992', 0, '2019-09-06', '2019-09-26'),
(61, 'golt3428', '8P8VYJ8PG', 0, '2019-09-07', '2019-09-26'),
(62, 'Auguchito10', '8RQGRLY9G', 1, '2019-09-07', '0000-00-00'),
(63, 'Cry4nide', '8LPQQLJCQ', 0, '2019-09-07', '2019-09-22'),
(64, 'destructor+yt', '2QLGJ89V9', 1, '2019-09-10', '0000-00-00'),
(65, 'lauchaco', '2R9URQJ82', 0, '2019-09-14', '2019-09-20'),
(66, 'NicoHerraiz', '2CVPCYUL0', 0, '2019-09-14', '2019-10-07'),
(67, 'gustarocca', '2Y9PGRYJ0', 0, '2019-09-14', '2019-09-22'),
(68, 'Hide on Bush', '8980QV8VQ', 0, '2019-09-14', '2019-10-02'),
(69, 'isaiaspro@#', 'PV80VCVQ8', 0, '2019-09-14', '2019-09-23'),
(70, 'CARASSALE', 'R2CQYQPU', 1, '2019-09-15', '0000-00-00'),
(71, 'Pity❤✌', '2289JV9C', 0, '2019-09-15', '2019-09-22'),
(72, 'Pity New Cuenta', '2L8PJ2GUL', 0, '2019-09-15', '2019-09-22'),
(73, 'Cristofer', '8U8RVC2PJ', 0, '2019-09-16', '2019-09-20'),
(74, 'rsv', 'PPU8QQ28', 0, '2019-09-17', '2019-10-02'),
(75, '_MicaPro_12', 'R0CU908L', 1, '2019-09-17', '0000-00-00'),
(76, 'Joaquin', 'JGVJJ8YG', 0, '2019-09-20', '2019-10-08'),
(77, 'Lord Stark', 'JGG9GYPU', 0, '2019-09-22', '2019-09-30'),
(78, 'BaltaX', 'L8RRGJUP', 0, '2019-09-22', '2019-09-23'),
(79, 'FVX 278', 'U00QVYJ8', 1, '2019-09-22', '0000-00-00'),
(80, 'tobias 5', '2L2L2VLC8', 1, '2019-09-22', '0000-00-00'),
(81, 'lauchaco', '2R9URQJ82', 0, '2019-09-23', '2019-09-25'),
(82, 'TOMYjinga98', '8VQLQCPYQ', 1, '2019-09-23', '0000-00-00'),
(83, 'Simón665', '2Q29Q0LU2', 0, '2019-09-25', '2019-10-16'),
(84, '9z crics', 'Y9VG92GQR', 1, '2019-09-25', '0000-00-00'),
(85, 'gustarocca', '2Y9PGRYJ0', 0, '2019-09-26', '2019-10-05'),
(86, 'lauchaco', '2R9URQJ82', 0, '2019-09-26', '2019-10-04'),
(87, 'juan manuel', '2CLCULJUU', 0, '2019-09-26', '2019-09-27'),
(88, 'LUCRAC02', 'YLL0JQ9VJ', 1, '2019-09-26', '0000-00-00'),
(89, 'Mía kalifha', '9889Q8C8', 0, '2019-09-26', '2019-10-16'),
(90, 'willy183 Bv', '8CP2P2URU', 0, '2019-09-27', '2019-09-27'),
(91, 'dylan', '9UPUQ2PGC', 0, '2019-09-28', '2019-09-28'),
(92, 'eduardo', '9L0GLRJUP', 1, '2019-09-28', '0000-00-00'),
(93, 'Cristofer', '8U8RVC2PJ', 1, '2019-10-01', '0000-00-00'),
(94, 'the mafiakalifa', 'G0GQC9GC', 0, '2019-10-02', '2019-10-03'),
(95, 'rsv', 'PPU8QQ28', 1, '2019-10-03', '0000-00-00'),
(96, 'rodeiro puto', '80JRCCP0J', 1, '2019-10-04', '0000-00-00'),
(97, 'tsubasa ozora', 'PRGYUPC9Q', 1, '2019-10-05', '0000-00-00'),
(98, 'willy183 Bv', '8CP2P2URU', 1, '2019-10-05', '0000-00-00'),
(99, 'Lord Stark', 'JGG9GYPU', 1, '2019-10-09', '0000-00-00'),
(100, 'guillerg', 'G99QC90P', 1, '2019-10-16', '0000-00-00'),
(101, 'Joaquin', 'JGVJJ8YG', 1, '2019-10-16', '0000-00-00'),
(102, 'jorge', 'P09R0Q2JC', 1, '2019-10-16', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
