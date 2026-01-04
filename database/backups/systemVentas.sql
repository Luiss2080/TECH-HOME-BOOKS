-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 30-12-2025 a las 23:00:01
-- Versión del servidor: 10.11.13-MariaDB
-- Versión de PHP: 8.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `techhome46x_thb_f`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `codigo_cliente` varchar(20) NOT NULL,
  `nombre_completo` varchar(200) NOT NULL,
  `tipo_cliente` enum('PERSONA','INSTITUCION') NOT NULL DEFAULT 'PERSONA',
  `ci_nit` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `direccion` text DEFAULT NULL,
  `colegio_id` int(11) DEFAULT NULL,
  `nacionalidad` varchar(100) NOT NULL DEFAULT 'Bolivia',
  `departamento` varchar(100) NOT NULL DEFAULT 'Santa Cruz',
  `observaciones` text DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `codigo_cliente`, `nombre_completo`, `tipo_cliente`, `ci_nit`, `telefono`, `email`, `direccion`, `colegio_id`, `nacionalidad`, `departamento`, `observaciones`, `activo`, `fecha_registro`) VALUES
(1, 'CLI-001', 'MARÍA GONZÁLEZ LOPEZ', 'PERSONA', '12345678', '70123456', 'maria.gonzalez@email.com', 'Av. Banzer #123, Zona Norte', 2, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-09-15 10:00:00'),
(2, 'CLI-002', 'COLEGIO SAN ANDRÉS', 'INSTITUCION', '1023456789012', '33456789', 'administracion@sanandres.edu.bo', 'Zona Norte, Calle Principal #456', 2, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-09-20 14:00:00'),
(3, 'CLI-003', 'PEDRO MAMANI QUISPE', 'PERSONA', '87654321', '70789456', 'pedro.mamani@gmail.com', 'Villa 1ro de Mayo, UV-25', 4, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-09-25 16:00:00'),
(4, 'CLI-004', 'UNIDAD EDUCATIVA SANTA ROSA', 'INSTITUCION', '2034567890123', '33789123', 'secretaria@santarosa.edu.bo', 'Barrio Las Flores #789', 3, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-09-28 09:00:00'),
(5, 'CLI-005', 'ANA QUISPE FLORES', 'PERSONA', '45678912', '75987654', 'ana.quispe@gmail.com', 'Plan 3000, UV-45, Mz-12', 5, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-01 11:00:00'),
(6, 'CLI-006', 'ROBERTO VILLARROEL MENDEZ', 'PERSONA', '78912345', '75987654', 'roberto.villarroel@gmail.com', 'Zona Centro, Calle Warnes', 1, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-02 15:00:00'),
(7, 'CLI-007', 'PEÑA  PRUEBA', 'INSTITUCION', '99999999', '756784528', 'cliente2pruebaa@gmail.com', 'calle España', 1, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-25 09:36:22'),
(8, 'CLI-008', 'LUIS MARIO', 'PERSONA', '2131231', '23123123', 'luisrochavela1@gmail.com', '132ewwerwerewr', 2, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-25 09:53:47'),
(9, 'CLI-009', 'MIGUEL ANGEL PINTO ARAMAYO', 'INSTITUCION', '', '72112703', 'pintoaramayomiguelangel@gmail.com', '', 6, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-25 10:51:26'),
(10, 'CLI-010', 'MAURICIO VASQUEZ MENACHO', 'PERSONA', '11329595', '74181117', 'mauriciovasquezmenacho@gmail.com', 'av. banzer', 1, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-28 10:31:25'),
(11, 'CLI-011', 'PEÑA PRUEBA 2', 'PERSONA', '14067067', '75678428', 'cliente3pruebaa@gmail.com', 'Santa Cruz', 1, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-10-31 15:30:17'),
(12, 'CLI-012', 'JOSE DAVID COLQUE BERNABE', 'INSTITUCION', '', '77686714', 'jcolqueberbabe@gmail.com', '3er anillo', 7, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-11-08 09:03:04'),
(13, 'CLI-013', 'JOSE DAVID COLQUE BERNABE', 'INSTITUCION', '', '77686714', 'jcolqueberbabe@gmail.com', '3er anillo', 7, 'Bolivia', 'Santa Cruz', NULL, 1, '2025-11-08 09:03:17'),
(14, 'CLI-014', 'Pruaba SR1', 'INSTITUCION', '14067098', '7777777', 'cliente2pruebaa@gmail.com', '3015', 2, 'Bol', 'Santa Cruz', 'Pruaba SR1', 1, '2025-11-20 01:27:10'),
(15, 'CLI-015', 'PRUEBA SR INTERFAZ', 'PERSONA', '33333333', '756784528', 'cliente2pruebaa@gmail.com', 'calle España', 1, 'Bolivia', 'Santa Cruz', 'Prueba SR Desde la interfaz', 1, '2025-11-20 01:43:34'),
(16, 'CLI-016', 'Prueba SR2', 'INSTITUCION', '778787878', '78787878', 'cliente2pruebaa@gmail.com', '2002', 2, 'SIV', 'Cochabamba', 'Pruena del excel para el SR 2', 1, '2025-11-20 02:01:00'),
(17, 'CLI-017', 'MARTA ADORNO', 'PERSONA', '', '75338022', 'martadorno2@gmail.com', 'Col La Salle', 2, 'Bolivia', 'Santa Cruz', 'Libros', 1, '2025-11-21 18:05:48'),
(18, 'CLI-018', 'SANDRA SANDOVAL MONTAÑO', 'PERSONA', '4834855', '70900027', 'drasandralsm@gmail.com', 'Col La Salle', 2, 'Bolivia', 'Santa Cruz', 'Venta de materiales', 1, '2025-11-21 21:51:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegios`
--

CREATE TABLE `colegios` (
  `id` int(11) NOT NULL,
  `nombre_colegio` varchar(300) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `departamento` varchar(100) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL DEFAULT 'Bolivia',
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario_registro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colegios`
--

INSERT INTO `colegios` (`id`, `nombre_colegio`, `direccion`, `telefono`, `email`, `departamento`, `nacionalidad`, `activo`, `fecha_registro`, `usuario_registro`) VALUES
(1, 'TECH HOME BOLIVIA', 'Zona Norte, Santa Cruz', '70123456', 'info@techhomebolivia.com', 'Santa Cruz', 'Bolivia', 1, '2025-10-24 23:45:55', 1),
(2, 'Colegio La Salle', 'Av. Cristo Redentor', '33456789', 'administracion@lasallescz.edu.bo', 'Santa Cruz', 'Bolivia', 1, '2025-10-24 23:45:55', 1),
(3, 'Unidad Educativa Santa Rosa', 'Barrio Las Flores', '33789123', 'secretaria@santarosa.edu.bo', 'Santa Cruz', 'Bolivia', 1, '2025-10-24 23:45:55', 1),
(4, 'Colegio Nacional El Pari', 'Villa 1ro de Mayo', '33123456', 'direccion@elpari.edu.bo', 'Santa Cruz', 'Bolivia', 1, '2025-10-24 23:45:55', 1),
(5, 'Universidad Privada Domingo Savio', 'Plan 3000', '33987654', 'info@upds.edu.bo', 'Santa Cruz', 'Bolivia', 1, '2025-10-24 23:45:55', 1),
(6, 'SAN PABLO', '5to anillo Av. San Pablo', '', '', 'Santa Cruz', 'Bolivia', 1, '2025-10-25 10:50:23', 50),
(7, 'BELLA ARTE', '3er anillo interno', '', '', 'Santa Cruz', 'Bolivia', 1, '2025-11-08 09:02:53', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_prueba_requests`
--

CREATE TABLE `control_prueba_requests` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `minutes_requested` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'pendiente',
  `creado_en` datetime NOT NULL DEFAULT current_timestamp(),
  `procesado_en` datetime DEFAULT NULL,
  `procesado_por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_rol_permisos`
--

CREATE TABLE `detalle_rol_permisos` (
  `id` int(11) NOT NULL,
  `fk_id_r` int(11) NOT NULL,
  `fk_id_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `detalle_rol_permisos`
--

INSERT INTO `detalle_rol_permisos` (`id`, `fk_id_r`, `fk_id_p`) VALUES
(13, 2, 1),
(14, 2, 2),
(15, 2, 3),
(16, 2, 4),
(17, 2, 5),
(18, 2, 6),
(19, 3, 7),
(20, 3, 8),
(21, 3, 9),
(22, 3, 10),
(23, 3, 11),
(24, 3, 12),
(108, 6, 13),
(109, 6, 14),
(110, 6, 15),
(111, 6, 16),
(112, 6, 17),
(113, 6, 18),
(114, 6, 19),
(115, 6, 20),
(116, 6, 21),
(117, 6, 22),
(118, 6, 23),
(119, 6, 24),
(121, 7, 1),
(122, 7, 2),
(136, 5, 1),
(137, 5, 2),
(138, 5, 3),
(139, 5, 4),
(140, 5, 5),
(141, 5, 6),
(142, 5, 7),
(143, 5, 8),
(144, 5, 9),
(145, 5, 10),
(146, 5, 11),
(147, 5, 12),
(151, 8, 7),
(152, 9, 7),
(153, 9, 8),
(154, 9, 9),
(155, 10, 1),
(156, 10, 2),
(157, 10, 3),
(158, 10, 4),
(159, 10, 5),
(160, 10, 6),
(161, 10, 7),
(162, 10, 8),
(163, 10, 9),
(164, 10, 10),
(165, 10, 11),
(166, 10, 12),
(183, 4, 15),
(184, 4, 19),
(185, 4, 20),
(186, 4, 21),
(192, 11, 25),
(193, 11, 26),
(194, 11, 29),
(195, 11, 28),
(196, 11, 1),
(197, 11, 2),
(198, 11, 3),
(199, 11, 4),
(200, 11, 5),
(201, 11, 6),
(202, 11, 27),
(203, 11, 7),
(204, 11, 8),
(205, 11, 9),
(206, 11, 10),
(207, 11, 11),
(208, 11, 12),
(209, 1, 25),
(210, 1, 26),
(211, 1, 29),
(212, 1, 28),
(213, 1, 1),
(214, 1, 2),
(215, 1, 3),
(216, 1, 4),
(217, 1, 5),
(218, 1, 6),
(219, 1, 27),
(220, 1, 7),
(221, 1, 8),
(222, 1, 9),
(223, 1, 10),
(224, 1, 11),
(225, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emails_enviados`
--

CREATE TABLE `emails_enviados` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `email_destino` varchar(255) NOT NULL,
  `numero_venta` varchar(50) NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `estado` enum('ENVIADO','FALLIDO','PENDIENTE') NOT NULL DEFAULT 'PENDIENTE',
  `intentos` int(11) NOT NULL DEFAULT 1,
  `error_mensaje` text DEFAULT NULL,
  `pdf_ruta_temporal` varchar(500) DEFAULT NULL,
  `tamano_pdf_kb` decimal(10,2) DEFAULT NULL,
  `fecha_envio` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_ultimo_intento` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Registro de correos enviados con PDFs de ventas';

--
-- Volcado de datos para la tabla `emails_enviados`
--

INSERT INTO `emails_enviados` (`id`, `venta_id`, `email_destino`, `numero_venta`, `asunto`, `estado`, `intentos`, `error_mensaje`, `pdf_ruta_temporal`, `tamano_pdf_kb`, `fecha_envio`, `fecha_ultimo_intento`, `ip_address`, `usuario_id`) VALUES
(1, 38, 'cliente2pruebaa@gmail.com', 'VNT-20251110-004', 'Comprobante de Venta - VNT-20251110-004', 'FALLIDO', 1, 'SMTP Error: Could not authenticate.', '/tmp/venta_VNT-20251110-004_1762799852_691230ec6115d.pdf', 322.43, '2025-11-10 14:37:45', '2025-11-10 14:37:45', '189.28.75.186', NULL),
(2, 38, 'cliente2pruebaa@gmail.com', 'VNT-20251110-004', 'Comprobante de Venta - VNT-20251110-004', 'FALLIDO', 1, 'Error al enviar correo: SMTP Error: Could not authenticate.', '/tmp/venta_VNT-20251110-004_1762799852_691230ec6115d.pdf', 322.43, '2025-11-10 14:37:45', '2025-11-10 14:37:45', '189.28.75.186', NULL),
(3, 38, 'cliente2pruebaa@gmail.com', 'VNT-20251110-004', 'Comprobante de Venta - VNT-20251110-004', 'FALLIDO', 1, 'SMTP Error: Could not connect to SMTP host. Failed to connect to server SMTP server error: Failed to connect to server SMTP code: 99 Additional SMTP info: Cannot assign requested address', '/tmp/venta_VNT-20251110-004_1762800282_6912329a19af0.pdf', 322.43, '2025-11-10 14:44:49', '2025-11-10 14:44:49', '189.28.75.186', NULL),
(4, 38, 'cliente2pruebaa@gmail.com', 'VNT-20251110-004', 'Comprobante de Venta - VNT-20251110-004', 'FALLIDO', 1, 'Error al enviar correo: SMTP Error: Could not connect to SMTP host. Failed to connect to server SMTP server error: Failed to connect to server SMTP code: 99 Additional SMTP info: Cannot assign requested address', '/tmp/venta_VNT-20251110-004_1762800282_6912329a19af0.pdf', 322.43, '2025-11-10 14:44:49', '2025-11-10 14:44:49', '189.28.75.186', NULL),
(5, 38, 'cliente2pruebaa@gmail.com', 'VNT-20251110-004', 'Comprobante de Venta - VNT-20251110-004', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-004_1762800962_6912354249940.pdf', 322.43, '2025-11-10 14:56:02', '2025-11-10 14:56:02', '189.28.75.186', NULL),
(6, 39, 'cliente3pruebaa@gmail.com', 'VNT-20251110-005', 'Comprobante de Venta - VNT-20251110-005', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-005_1762801823_6912389f2a78c.pdf', 322.43, '2025-11-10 15:10:23', '2025-11-10 15:10:23', '192.223.115.88', 48),
(7, 40, 'cliente2pruebaa@gmail.com', 'VNT-20251110-006', 'Comprobante de Venta - VNT-20251110-006', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-006_1762803743_6912401f04064.pdf', 322.41, '2025-11-10 15:42:23', '2025-11-10 15:42:23', '181.115.208.223', 48),
(8, 41, 'cliente2pruebaa@gmail.com', 'VNT-20251110-007', 'Comprobante de Venta - VNT-20251110-007', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-007_1762805453_691246cddea53.pdf', 322.43, '2025-11-10 16:10:54', '2025-11-10 16:10:54', '181.115.208.223', 48),
(9, 42, 'mauriciovasquezmenacho@gmail.com', 'VNT-20251110-008', 'Comprobante de Venta - VNT-20251110-008', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-008_1762806665_69124b8971dd4.pdf', 322.43, '2025-11-10 16:31:05', '2025-11-10 16:31:05', '181.115.208.223', 1),
(10, 43, 'cliente3pruebaa@gmail.com', 'VNT-20251110-009', 'Comprobante de Venta - VNT-20251110-009', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-009_1762808073_6912510997a72.pdf', 322.43, '2025-11-10 16:54:34', '2025-11-10 16:54:34', '181.115.208.223', 48),
(11, 44, 'cliente3pruebaa@gmail.com', 'VNT-20251110-010', 'Comprobante de Venta - VNT-20251110-010', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-010_1762808679_69125367a8c03.pdf', 322.42, '2025-11-10 17:04:39', '2025-11-10 17:04:39', '181.115.208.223', 48),
(12, 45, 'cliente3pruebaa@gmail.com', 'VNT-20251110-011', 'Comprobante de Venta - VNT-20251110-011', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-011_1762809161_6912554969a4a.pdf', 322.42, '2025-11-10 17:12:41', '2025-11-10 17:12:41', '181.115.208.223', 48),
(13, 46, 'cliente3pruebaa@gmail.com', 'VNT-20251110-012', 'Comprobante de Venta - VNT-20251110-012', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-012_1762809662_6912573e481f5.pdf', 322.42, '2025-11-10 17:21:02', '2025-11-10 17:21:02', '181.115.208.223', 48),
(14, 47, 'cliente3pruebaa@gmail.com', 'VNT-20251110-013', 'Comprobante de Venta - VNT-20251110-013', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-013_1762809975_6912587737228.pdf', 322.42, '2025-11-10 17:26:15', '2025-11-10 17:26:15', '181.115.208.223', 48),
(15, 48, 'cliente3pruebaa@gmail.com', 'VNT-20251110-014', 'Comprobante de Venta - VNT-20251110-014', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251110-014_1762821463_6912855747c6c.pdf', 322.43, '2025-11-10 20:37:43', '2025-11-10 20:37:43', '190.181.46.187', 48),
(16, 49, 'cliente3pruebaa@gmail.com', 'VNT-20251111-001', 'Comprobante de Venta - VNT-20251111-001', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251111-001_1762838872_6912c958e23b1.pdf', 322.42, '2025-11-11 01:27:53', '2025-11-11 01:27:53', '189.28.75.186', 48),
(17, 50, 'cliente2pruebaa@gmail.com', 'VNT-20251111-002', 'Comprobante de Venta - VNT-20251111-002', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251111-002_1762870743_691345d73dc5b.pdf', 322.60, '2025-11-11 10:19:03', '2025-11-11 10:19:03', '189.28.75.186', 48),
(18, 53, 'cliente3pruebaa@gmail.com', 'VNT-20251111-005', 'Comprobante de Venta - VNT-20251111-005', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251111-005_1762871120_69134750341ef.pdf', 322.43, '2025-11-11 10:25:20', '2025-11-11 10:25:20', '189.28.75.186', 48),
(19, 54, 'cliente3pruebaa@gmail.com', 'VNT-20251113-001', 'Comprobante de Venta - VNT-20251113-001', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-001_1763039207_6915d7e7562c1.pdf', 322.42, '2025-11-13 09:06:47', '2025-11-13 09:06:47', '189.28.75.192', 48),
(20, 55, 'mauriciovasquezmenacho@gmail.com', 'VNT-20251113-002', 'Comprobante de Venta - VNT-20251113-002', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-002_1763062165_69163195198dd.pdf', 322.43, '2025-11-13 15:29:25', '2025-11-13 15:29:25', '181.115.215.64', 1),
(21, 56, 'cliente3pruebaa@gmail.com', 'VNT-20251113-003', 'Comprobante de Venta - VNT-20251113-003', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-003_1763063701_691637950c436.pdf', 322.41, '2025-11-13 15:55:01', '2025-11-13 15:55:01', '189.28.75.192', 48),
(22, 57, 'cliente2pruebaa@gmail.com', 'VNT-20251113-004', 'Comprobante de Venta - VNT-20251113-004', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-004_1763063866_6916383abcb32.pdf', 322.41, '2025-11-13 15:57:47', '2025-11-13 15:57:47', '189.28.75.192', 48),
(23, 58, 'cliente3pruebaa@gmail.com', 'VNT-20251113-005', 'Comprobante de Venta - VNT-20251113-005', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-005_1763064247_691639b79500b.pdf', 322.41, '2025-11-13 16:04:08', '2025-11-13 16:04:08', '189.28.75.192', 48),
(24, 59, 'cliente3pruebaa@gmail.com', 'VNT-20251113-006', 'Comprobante de Venta - VNT-20251113-006', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-006_1763065356_69163e0cef767.pdf', 322.42, '2025-11-13 16:22:37', '2025-11-13 16:22:37', '189.28.75.192', 48),
(25, 60, 'cliente3pruebaa@gmail.com', 'VNT-20251113-007', 'Comprobante de Venta - VNT-20251113-007', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-007_1763066495_6916427f73ce1.pdf', 322.42, '2025-11-13 16:41:36', '2025-11-13 16:41:36', '189.28.75.192', 48),
(26, 61, 'cliente3pruebaa@gmail.com', 'VNT-20251113-008', 'Comprobante de Venta - VNT-20251113-008', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-008_1763066909_6916441d594d2.pdf', 322.42, '2025-11-13 16:48:29', '2025-11-13 16:48:29', '189.28.75.192', 48),
(27, 62, 'cliente3pruebaa@gmail.com', 'VNT-20251113-009', 'Comprobante de Venta - VNT-20251113-009', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251113-009_1763067369_691645e98d4a9.pdf', 322.42, '2025-11-13 16:56:10', '2025-11-13 16:56:10', '189.28.75.192', 48),
(28, 63, 'cliente2pruebaa@gmail.com', 'VNT-20251120-001', 'Comprobante de Venta - VNT-20251120-001', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251120-001_1763618561_691eaf01eaa95.pdf', 322.43, '2025-11-20 02:02:42', '2025-11-20 02:02:42', '189.28.75.192', 48),
(29, 64, 'martadorno2@gmail.com', 'VNT-20251121-001', 'Comprobante de Venta - VNT-20251121-001', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251121-001_1763763123_6920e3b3466e4.pdf', 323.35, '2025-11-21 18:12:03', '2025-11-21 18:12:03', '181.115.208.103', 1),
(30, 78, 'cliente2pruebaa@gmail.com', 'VNT-20251128-001', 'Comprobante de Venta - VNT-20251128-001', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251128-001_1764361454_692a04ee1992b.pdf', 322.42, '2025-11-28 16:24:14', '2025-11-28 16:24:14', '189.28.75.192', 48),
(31, 79, 'cliente2pruebaa@gmail.com', 'VNT-20251128-002', 'Comprobante de Venta - VNT-20251128-002', 'ENVIADO', 1, NULL, '/tmp/venta_VNT-20251128-002_1764363343_692a0c4f5d263.pdf', 322.42, '2025-11-28 16:55:43', '2025-11-28 16:55:43', '189.28.75.192', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas_stock`
--

CREATE TABLE `entradas_stock` (
  `id` int(11) NOT NULL,
  `numero_entrada` varchar(20) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `cantidad_ingresada` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `total_entrada` decimal(10,2) NOT NULL,
  `motivo_entrada` varchar(200) NOT NULL,
  `observaciones` text DEFAULT NULL,
  `estado` enum('PENDIENTE','CONFIRMADA','ANULADA') DEFAULT 'PENDIENTE',
  `tipo_entrada` enum('COMPRA','DEVOLUCION','AJUSTE','CORRECCION') DEFAULT 'COMPRA',
  `usuario_id` int(11) NOT NULL,
  `fecha_entrada` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradas_stock`
--

INSERT INTO `entradas_stock` (`id`, `numero_entrada`, `libro_id`, `cantidad_ingresada`, `precio_unitario`, `total_entrada`, `motivo_entrada`, `observaciones`, `estado`, `tipo_entrada`, `usuario_id`, `fecha_entrada`) VALUES
(6, 'EN000003', 4, 10, 21.00, 210.00, 'Nueva compra', '', 'CONFIRMADA', 'COMPRA', 4, '2025-10-14 21:15:39'),
(10, 'ENT-20251121-001', 8, 20, 68.00, 1360.00, 'Nueva compra', 'Compra de AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 11:54:47'),
(11, 'ENT-20251121-002', 9, 20, 59.00, 1180.00, 'Nueva compra', 'Compra nueva', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:13:55'),
(12, 'ENT-20251121-003', 10, 50, 9.80, 490.00, 'Nueva compra', 'Compra material', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:19:31'),
(13, 'ENT-20251121-004', 11, 25, 6.50, 162.50, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:21:07'),
(14, 'ENT-20251121-005', 12, 50, 6.00, 300.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:22:52'),
(15, 'ENT-20251121-006', 13, 20, 29.00, 580.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:24:53'),
(16, 'ENT-20251121-007', 14, 30, 32.00, 960.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:35:18'),
(17, 'ENT-20251121-008', 15, 800, 0.45, 360.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:39:13'),
(18, 'ENT-20251121-009', 16, 800, 0.45, 360.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:41:39'),
(19, 'ENT-20251121-010', 17, 25, 30.50, 762.50, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:44:32'),
(20, 'ENT-20251121-011', 18, 50, 1.50, 75.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:46:33'),
(21, 'ENT-20251121-012', 19, 60, 5.00, 300.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 16:50:44'),
(22, 'ENT-20251121-013', 20, 10, 68.00, 680.00, 'Nueva compra', 'Fabrica THB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:14:06'),
(23, 'ENT-20251121-014', 21, 20, 8.00, 160.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:15:48'),
(24, 'ENT-20251121-015', 22, 200, 1.80, 360.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:19:14'),
(25, 'ENT-20251121-016', 23, 20, 1.50, 30.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:30:40'),
(26, 'ENT-20251121-017', 24, 50, 19.00, 950.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:34:26'),
(27, 'ENT-20251121-018', 25, 100, 3.50, 350.00, 'Nueva compra', 'Compra DIGICORP', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:37:10'),
(28, 'ENT-20251121-019', 26, 50, 12.40, 620.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:38:42'),
(29, 'ENT-20251121-020', 27, 1000, 0.20, 200.00, 'Nueva compra', 'Compra Electrónica', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:41:43'),
(30, 'ENT-20251121-021', 28, 1000, 0.15, 150.00, 'Nueva compra', 'Compra electrónica', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:44:00'),
(31, 'ENT-20251121-022', 29, 6, 76.00, 456.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:46:19'),
(32, 'ENT-20251121-023', 30, 20, 17.50, 350.00, 'Nueva compra', 'Compra AMB', 'CONFIRMADA', 'COMPRA', 1, '2025-11-21 17:49:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresiones_ventas`
--

CREATE TABLE `impresiones_ventas` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `fecha_impresion` datetime DEFAULT current_timestamp(),
  `ip_address` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `impresiones_ventas`
--

INSERT INTO `impresiones_ventas` (`id`, `venta_id`, `usuario_id`, `fecha_impresion`, `ip_address`) VALUES
(1, 16, 1, '2025-10-24 19:46:59', '190.186.2.134'),
(2, 16, 1, '2025-10-24 20:57:57', '190.186.2.134'),
(3, 16, 1, '2025-10-24 21:09:57', '190.186.2.134'),
(4, 16, 1, '2025-10-24 21:14:43', '190.186.2.134'),
(5, 16, 1, '2025-10-25 06:33:25', '181.115.215.81'),
(6, 21, 47, '2025-10-25 10:04:56', '181.188.162.109'),
(7, 27, 50, '2025-10-25 11:04:27', '181.115.208.74'),
(8, 28, 1, '2025-10-28 21:20:46', '190.181.58.100'),
(9, 27, 1, '2025-10-28 21:20:59', '190.181.58.100'),
(10, 29, 48, '2025-10-31 14:27:28', '189.28.75.67'),
(11, 34, 50, '2025-11-08 09:09:30', '181.115.208.117'),
(12, 35, 48, '2025-11-10 13:45:32', '189.28.75.186'),
(13, 42, 1, '2025-11-10 16:31:21', '181.115.208.223'),
(14, 54, 48, '2025-11-13 09:07:39', '189.28.75.192'),
(15, 63, 48, '2025-11-20 02:09:59', '189.28.75.192'),
(16, 64, 1, '2025-11-21 18:12:26', '181.115.208.103'),
(17, 64, 1, '2025-11-21 21:52:19', '186.121.245.130'),
(18, 64, 1, '2025-11-27 19:35:35', '190.181.46.187'),
(19, 64, 1, '2025-11-27 20:54:59', '186.121.245.130'),
(20, 64, 48, '2025-11-28 16:59:32', '189.28.75.192'),
(21, 64, 48, '2025-12-01 16:47:32', '181.115.208.62'),
(22, 64, 1, '2025-12-15 21:20:31', '190.181.46.187');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado_notifications`
--

CREATE TABLE `invitado_notifications` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `next_notify_at` datetime DEFAULT NULL,
  `interval_minutes` int(11) NOT NULL DEFAULT 2,
  `expires_at` datetime DEFAULT NULL,
  `last_sent_at` datetime DEFAULT NULL,
  `creado_en` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado_trials`
--

CREATE TABLE `invitado_trials` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `verified_at` datetime NOT NULL,
  `duration_minutes` int(11) NOT NULL DEFAULT 5,
  `expires_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `nivel` enum('PRIMARIA','SECUNDARIA') NOT NULL,
  `grado` varchar(50) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock_actual` int(11) NOT NULL DEFAULT 0,
  `stock_minimo` int(11) NOT NULL DEFAULT 5,
  `descripcion` text DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `codigo`, `titulo`, `nivel`, `grado`, `precio_venta`, `stock_actual`, `stock_minimo`, `descripcion`, `activo`, `fecha_registro`) VALUES
(1, 'LIB-P1-001', 'Libro Digital Primaria 1ro TEST', 'PRIMARIA', '1ro Primaria', 25.00, 94, 10, 'Libro digital para primer grado de primaria', 1, '2025-10-01 10:00:00'),
(2, 'LIB-P2-001', 'Libro Digital Primaria 2do TEST', 'PRIMARIA', '2do Primaria', 25.00, 64, 10, 'Libro digital para segundo grado de primaria', 1, '2025-10-01 10:00:00'),
(3, 'LIB-S1-001', 'Libro Digital Secundaria 1ro TEST', 'SECUNDARIA', '1ro Secundaria', 30.00, 72, 10, 'Libro digital para primer grado de secundaria', 1, '2025-10-01 10:00:00'),
(4, 'LIB-S2-001', 'Libro Digital Secundaria 2do TEST', 'SECUNDARIA', '2do Secundaria', 30.00, 53, 10, 'Libro digital para segundo grado de secundaria', 1, '2025-10-01 10:00:00'),
(5, 'LIB-ARD-001', 'Guía Arduino Básico TEST', 'SECUNDARIA', 'Cursos Especiales', 45.00, 49, 5, 'Manual práctico de Arduino para principiantes', 1, '2025-10-01 10:00:00'),
(6, 'TEST-001', 'Libro de Prueba TEST', 'PRIMARIA', 'Test', 44.00, 22, 5, 'Libro para pruebas del sistema', 1, '2025-10-14 10:55:32'),
(7, 'LIB-SS-02', 'ROBOTICA Y TECNOLOGIA 2', 'SECUNDARIA', '2do', 150.00, -2, 5, NULL, 1, '2025-10-25 10:59:11'),
(8, 'DIS-001', 'Arduino UNO CH340 con cable', 'SECUNDARIA', 'TEC', 120.00, 19, 5, NULL, 1, '2025-11-21 11:54:47'),
(9, 'MAT-001', 'Módulo Bluetooth HC-05', 'SECUNDARIA', 'TEC', 65.00, 19, 5, NULL, 1, '2025-11-21 16:13:55'),
(10, 'MAT-002', 'Motor reductor amarillo Doble eje', 'SECUNDARIA', 'TEC', 20.00, 48, 5, NULL, 1, '2025-11-21 16:19:31'),
(11, 'MAT-003', 'Rueda para motor reductor', 'SECUNDARIA', 'TEC', 10.00, 23, 5, NULL, 1, '2025-11-21 16:21:07'),
(12, 'MAT-004', 'Porta pila PAR 3.7 V', 'SECUNDARIA', 'TEC', 18.00, 49, 5, NULL, 1, '2025-11-21 16:22:52'),
(13, 'MAT-005', 'Servomotor MG90 eje metálico', 'SECUNDARIA', 'TEC', 35.00, 20, 5, NULL, 1, '2025-11-21 16:24:53'),
(14, 'MAT-006', 'Puente H L298N', 'SECUNDARIA', 'TEC', 40.00, 29, 5, NULL, 1, '2025-11-21 16:35:18'),
(15, 'MAT-007', 'Cable Jumper 20 cm M-M', 'SECUNDARIA', 'TEC', 0.50, 790, 5, NULL, 1, '2025-11-21 16:39:13'),
(16, 'MAT-008', 'Cable Jumper 20 cm H-M', 'SECUNDARIA', 'TEC', 0.50, 790, 5, NULL, 1, '2025-11-21 16:41:39'),
(17, 'MAT-009', 'Par pilas Cafini recargable 3.7 V', 'SECUNDARIA', 'TEC', 35.00, 24, 5, NULL, 1, '2025-11-21 16:44:32'),
(18, 'MAT-010', 'Interruptor pequeño para proyectos', 'SECUNDARIA', 'TEC', 3.00, 49, 5, NULL, 1, '2025-11-21 16:46:33'),
(19, 'MAT-011', 'Estaño BERA 8mm metro', 'SECUNDARIA', 'TEC', 6.00, 58, 5, NULL, 1, '2025-11-21 16:50:44'),
(20, 'MAT-012', 'Chasis SUMO con 4 tornillos para motor 12.5cm', 'SECUNDARIA', 'TEC', 120.00, 9, 5, NULL, 1, '2025-11-21 17:14:06'),
(21, 'MAT-013', 'Pasta para soldar 10gr', 'SECUNDARIA', 'TEC', 13.00, 19, 5, NULL, 1, '2025-11-21 17:15:48'),
(22, 'MAT-014', 'Termocontraible 3mm metro', 'SECUNDARIA', 'TEC', 5.00, 200, 5, NULL, 1, '2025-11-21 17:19:14'),
(23, 'MAT-015', 'Barra de silicona pequeña', 'SECUNDARIA', 'TEC', 2.00, 18, 5, NULL, 1, '2025-11-21 17:30:40'),
(24, 'MAT-016', 'Sensor Ultrasónico HC-SR04', 'SECUNDARIA', 'TEC', 35.00, 50, 5, NULL, 1, '2025-11-21 17:34:26'),
(25, 'MAT-017', 'Cable de RED UTP CAT-5', 'SECUNDARIA', 'TEC', 6.00, 100, 5, NULL, 1, '2025-11-21 17:37:10'),
(26, 'MAT-018', 'Protoboard mediano 400 pts', 'SECUNDARIA', 'TEC', 20.00, 50, 5, NULL, 1, '2025-11-21 17:38:42'),
(27, 'MAT-019', 'Foquito LED 3mm', 'SECUNDARIA', 'TEC', 0.50, 1000, 5, NULL, 1, '2025-11-21 17:41:43'),
(28, 'MAT-020', 'Resistencia 1/8 220 Ohm', 'SECUNDARIA', 'TEC', 0.50, 1000, 5, NULL, 1, '2025-11-21 17:44:00'),
(29, 'MAT-021', 'Cautin 50W con regulador analógico', 'SECUNDARIA', 'TEC', 100.00, 6, 5, NULL, 1, '2025-11-21 17:46:19'),
(30, 'MAT-022', 'Sensor de lluvia YL-83', 'SECUNDARIA', 'TEC', 40.00, 20, 5, NULL, 1, '2025-11-21 17:49:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_actividades`
--

CREATE TABLE `log_actividades` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `accion` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `creado_en` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `log_actividades`
--

INSERT INTO `log_actividades` (`id`, `usuario_id`, `accion`, `descripcion`, `ip_address`, `user_agent`, `creado_en`) VALUES
(8, 2, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 12:44:22'),
(9, 5, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 12:48:29'),
(10, 5, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 12:49:21'),
(11, 6, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 12:58:38'),
(12, 6, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 12:59:25'),
(13, 6, 'SOLICITUD_RECUPERACION', 'Solicitud de recuperación de contraseña', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 13:01:13'),
(14, 6, 'PASSWORD_RESET', 'Contraseña restablecida exitosamente', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36 Edg/140.0.0.0', '2025-10-03 13:02:04'),
(25, 56, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-12 23:45:55'),
(26, 56, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-12 23:46:50'),
(27, 56, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-12 23:48:15'),
(28, 56, 'SOLICITUD_RECUPERACION', 'Solicitud de recuperación de contraseña', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-12 23:49:19'),
(29, 56, 'PASSWORD_RESET', 'Contraseña restablecida exitosamente', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-12 23:49:49'),
(30, 57, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-13 08:39:19'),
(31, 57, 'REENVIO_VERIFICACION', 'Solicitud de reenvío de verificación', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-13 08:41:30'),
(32, 57, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-13 08:44:34'),
(33, 44, 'REENVIO_VERIFICACION', 'Solicitud de reenvío de verificación', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-13 08:44:55'),
(34, 44, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 08:45:22'),
(35, 44, 'SOLICITUD_RECUPERACION', 'Solicitud de recuperación de contraseña', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-11-13 08:45:48'),
(36, 44, 'PASSWORD_RESET', 'Contraseña restablecida exitosamente', '189.28.75.192', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-13 08:46:11'),
(37, 58, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '131.0.199.149', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-13 16:56:07'),
(38, 58, 'REENVIO_VERIFICACION', 'Solicitud de reenvío de verificación', '131.0.199.149', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-13 16:58:32'),
(39, 58, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '131.0.199.149', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-13 16:59:48'),
(40, 58, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '131.0.199.149', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-13 17:03:54'),
(41, 58, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '131.0.199.149', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-13 17:12:55'),
(42, 59, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.115.171.122', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_5 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.5 Mobile/15E148 Safari/604.1', '2025-11-18 18:13:58'),
(43, 60, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '190.129.19.125', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-19 09:05:54'),
(44, 60, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '190.129.19.125', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-19 09:06:37'),
(45, 60, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '190.129.19.125', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-19 09:07:37'),
(46, 60, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '190.129.19.125', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-19 09:12:54'),
(47, 61, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '189.28.91.191', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-19 14:35:37'),
(48, 62, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.115.171.123', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-19 17:28:53'),
(49, 63, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.115.171.124', 'Mozilla/5.0 (Linux; Android 11; SM-A107M Build/RP1A.200720.012; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36', '2025-11-20 21:41:46'),
(50, 64, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '177.222.98.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-11-22 18:15:24'),
(51, 65, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '177.222.98.250', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', '2025-11-22 18:18:30'),
(52, 65, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '177.222.98.250', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-22 18:19:01'),
(53, 66, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.114.121.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-23 17:05:59'),
(54, 66, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '181.114.121.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-23 17:06:41'),
(55, 66, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '181.114.121.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-23 17:07:44'),
(56, 66, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '181.114.121.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-23 17:08:57'),
(57, 66, 'INVITADO_REMINDER', 'Se envío recordatorio de expiración al invitado.', '181.114.121.3', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-23 17:10:33'),
(58, 67, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.115.171.125', 'Mozilla/5.0 (Linux; Android 15; TECNO KM4 Build/AP3A.240905.015.A2; wv) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/142.0.7444.102 Mobile Safari/537.36', '2025-11-24 17:44:42'),
(59, 68, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.115.171.125', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-24 18:50:19'),
(60, 69, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '177.222.99.215', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/29.0 Chrome/136.0.0.0 Mobile Safari/537.36', '2025-11-24 21:19:18'),
(61, 69, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '181.115.208.175', 'Mozilla/5.0 (iPhone; CPU iPhone OS 26_1_0 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) GSA/395.0.830179879 Mobile/15E148 Safari/604.1', '2025-11-24 21:19:34'),
(62, 70, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '181.188.162.96', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', '2025-11-25 18:09:55'),
(63, 70, 'EMAIL_VERIFICADO', 'Correo electrónico verificado exitosamente', '181.188.162.96', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-25 18:11:39'),
(64, 71, 'REGISTRO_INVITADO', 'Usuario invitado registrado - correo enviado', '192.223.107.223', 'Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', '2025-11-25 22:02:53'),
(65, 9, 'SOLICITUD_RECUPERACION', 'Solicitud de recuperación de contraseña', '158.172.226.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-12-03 18:41:04'),
(66, 9, 'PASSWORD_RESET', 'Contraseña restablecida exitosamente', '158.172.226.133', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', '2025-12-03 18:41:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_movimientos_stock`
--

CREATE TABLE `log_movimientos_stock` (
  `id` int(11) NOT NULL,
  `tipo_operacion` enum('ENTRADA','VENTA','AJUSTE','CORRECCION') NOT NULL,
  `referencia_id` int(11) NOT NULL,
  `referencia_tabla` varchar(50) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `libro_codigo` varchar(20) DEFAULT NULL,
  `libro_titulo` varchar(200) DEFAULT NULL,
  `cantidad_anterior` int(11) NOT NULL,
  `cantidad_movimiento` int(11) NOT NULL,
  `cantidad_nueva` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `total_operacion` decimal(10,2) DEFAULT NULL,
  `motivo` varchar(200) DEFAULT NULL,
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(100) DEFAULT NULL,
  `fecha_log` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `log_movimientos_stock`
--

INSERT INTO `log_movimientos_stock` (`id`, `tipo_operacion`, `referencia_id`, `referencia_tabla`, `libro_id`, `libro_codigo`, `libro_titulo`, `cantidad_anterior`, `cantidad_movimiento`, `cantidad_nueva`, `precio_unitario`, `total_operacion`, `motivo`, `usuario_id`, `usuario_nombre`, `fecha_log`) VALUES
(13, 'VENTA', 1, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 94, -1, 93, 25.00, 25.00, 'Venta a: Cliente Prueba Debug', 1, 'Admin', '2025-10-13 21:36:11'),
(14, 'VENTA', 2, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 93, -1, 92, 25.00, 25.00, 'Venta a: Cliente Test Directo', 1, 'Admin', '2025-10-13 21:38:34'),
(15, 'VENTA', 3, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 92, -1, 91, 50.00, 50.00, 'Venta a: TEST CLIENTE DEBUG', 1, 'Admin', '2025-10-14 09:38:30'),
(16, 'VENTA', 4, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 93, -2, 91, 25.00, 50.00, 'Venta a: Cliente Test Formulario', 1, 'Admin', '2025-10-14 09:39:56'),
(17, 'VENTA', 5, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 93, -4, 89, 25.00, 100.00, 'Venta a: María González', 4, 'Luis', '2025-10-14 09:51:41'),
(18, 'ENTRADA', 1, 'entradas_stock', 1, 'ee', '211', -22, 22, 0, 34.00, 748.00, 'Nueva compra', 4, 'Luis', '2025-10-14 10:55:32'),
(19, 'ENTRADA', 2, 'entradas_stock', 1, 'ee', '211', 19, 3, 22, 34.00, 102.00, 'Nueva compra', 4, 'Luis', '2025-10-14 11:28:00'),
(20, 'VENTA', 6, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 86, -1, 85, 25.00, 25.00, 'Venta a: Cliente de Prueba', 1, 'Admin', '2025-10-14 16:03:38'),
(21, 'VENTA', 7, 'ventas', 1, 'LIB-P1-001', 'Libro Digital Primaria 1ro', 85, -1, 84, 25.00, 25.00, 'Venta a: Cliente Web Test', 1, 'Admin', '2025-10-14 16:10:25'),
(22, 'VENTA', 8, 'ventas', 5, 'LIB-ARD-001', 'Guía Arduino Básico', 58, -9, 49, 45.00, 405.00, 'Venta a: Roberto Villarroel', 4, 'Luis', '2025-10-14 16:58:13'),
(23, 'ENTRADA', 3, 'entradas_stock', 2, 'LIB-P2-001', 'Libro Digital Primaria 2do', 58, 6, 64, 17.50, 105.00, 'Nueva compra', 4, 'Luis', '2025-10-14 20:41:46'),
(24, 'ENTRADA', 4, 'entradas_stock', 4, 'LIB-S2-001', 'Libro Digital Secundaria 2do', 33, 10, 43, 21.00, 210.00, 'Nueva compra', 4, 'Luis', '2025-10-14 21:15:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`) VALUES
(1, 'P1'),
(2, 'P2'),
(3, 'P3'),
(4, 'P4'),
(5, 'P5'),
(6, 'P6'),
(7, 'S1'),
(8, 'S2'),
(9, 'S3'),
(10, 'S4'),
(11, 'S5'),
(12, 'S6'),
(13, 'PC1'),
(14, 'PC2'),
(15, 'PC3'),
(16, 'PC4'),
(17, 'PC5'),
(18, 'PC6'),
(19, 'SC1'),
(20, 'SC2'),
(21, 'SC3'),
(22, 'SC4'),
(23, 'SC5'),
(24, 'SC6'),
(25, 'ENTRADA_STOCK'),
(26, 'GESTION_CLIENTES'),
(27, 'REGISTRO_CLIENTE'),
(28, 'NUEVA_VENTA'),
(29, 'HISTORIAL_STOCK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperacion_password`
--

CREATE TABLE `recuperacion_password` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `creado_en` datetime NOT NULL DEFAULT current_timestamp(),
  `expira_en` datetime NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT 0,
  `usado_en` datetime DEFAULT NULL,
  `ip_solicitud` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `recuperacion_password`
--

INSERT INTO `recuperacion_password` (`id`, `usuario_id`, `token`, `creado_en`, `expira_en`, `usado`, `usado_en`, `ip_solicitud`) VALUES
(1, 48, 'a77eb39025ac79bd232d9185dbeb935e3a8ebcf4c2066753788d4ecacf1dc9c3', '2025-10-30 17:27:31', '2025-10-30 18:27:31', 0, NULL, '189.28.75.67'),
(4, 56, 'fa7854c6ab78e21af617e8872823c102d6f84612b79c48b114ce7ffe961e3708', '2025-11-12 23:49:19', '2025-11-13 00:49:19', 1, '2025-11-12 23:49:49', '189.28.75.192'),
(5, 44, '11b2a815cb4df136b19200a80e67f7f326a679e5f23a08714c76903321efb1a4', '2025-11-13 08:45:48', '2025-11-13 09:45:48', 1, '2025-11-13 08:46:11', '189.28.75.192'),
(6, 9, '00c12f3ee6a68dd0942ba63603215ee14a3e2ff6178109a770b2a0ff1ed7386a', '2025-12-03 18:41:03', '2025-12-03 19:41:03', 1, '2025-12-03 18:41:33', '158.172.226.133');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Profesor Primaria'),
(3, 'Profesor Secundaria'),
(4, 'Invitado'),
(5, 'Profes TECH HOME'),
(6, 'Libro muestra primaria y secundaria'),
(7, 'Profesor primaria 1'),
(8, 'Profesor Secundaria 1'),
(9, 'Profesor Secundaria 1, 2 y 3'),
(10, 'Libro Primaria y Secundaria'),
(11, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `numci` varchar(50) DEFAULT NULL,
  `fenac` date DEFAULT NULL,
  `numtel` varchar(20) DEFAULT NULL,
  `nomcol` varchar(200) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `email_verificado` tinyint(1) NOT NULL DEFAULT 0,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `creado_en` datetime NOT NULL DEFAULT current_timestamp(),
  `actualizado_en` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `numci`, `fenac`, `numtel`, `nomcol`, `email`, `password`, `rol_id`, `email_verificado`, `activo`, `creado_en`, `actualizado_en`) VALUES
(1, 'Gustavo', 'Tantani Mamani', '6276136', '1984-02-28', '70017480', 'Nacional el Pari', 'tantani.m.g@gmail.com', '$2y$10$CMBouHJBkH9lLlebNQu3/OjHaPBTbMGvdSanSgskviYX5.Q1NGL0a', 1, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:36:53'),
(2, 'Mauricio', 'Vasquez Menacho', '11329595', '2004-06-17', '74181117', 'Tech Home', 'mauriciovasquezmenacho@gmail.com', '$2y$10$BgfhSXllXP4DxP48XigKoeX1m3rjwCL8.wvm0N/hQhg/uS3osXP.O', 5, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:37:17'),
(3, 'Amilcar', 'Romero', '15184153', '1999-07-05', '71024388', 'TECHHOME', 'arcamgel20165@gmail.com', '$2y$10$8Is1FsT5rtiWamLW58OiV.Qd4T7.xq40KIbV3zHip3aAE12cgcG9e', 5, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:37:43'),
(4, 'Yorbin Afriel', 'Mier Cabrera', '7745923', '1999-09-12', '68913948', 'Ninguno', 'yorbinmiercabrera@gmail.com', '$2y$10$eXJ8eornvvrWkAvw1yLEaO1PGhLAjZcQ.4dY2H3qXp./kWM3Jy4rG', 5, 1, 1, '2025-09-19 17:30:50', '2025-10-06 16:40:20'),
(5, 'GILMAR CHAVARRIA', NULL, '8639300', '1991-05-06', '68405551', 'ADELA ZAMUDIO', 'u8639400@gmail.com', '$2y$10$QwpSP6l.g2Si3URpq6xO/eje5n7/5n/Ply6Lfq4pUkvsst6.H2BKq', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:25'),
(6, 'Beymar Vargas', NULL, '13707771', '2000-02-02', '75826365', 'Gloria', 'beymarvargas3@gmail.com', '$2y$10$Zqk9k8zNwELzUltU23U/bu6jrl0dJ/U6lEZrYWu5.09joDv.9Db0y', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:30'),
(7, 'Luis Diego Chinari Chura', NULL, '10820263', '1999-01-08', '67281722', 'Monseñor Roger Aubry', 'luischinari@gmail.com', '$2y$10$Z7a5boUx6RGNZrtanOFafe69dmBUxMVlAQlEU2A9N8SMb8V6V48iG', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:34'),
(8, 'Royer Zurita Zeballos', NULL, '9680097', '1993-11-07', '78124651', 'San Agustín', 'royer@colegiosanagustin.edu.bo', '$2y$10$jOcMRgtFu3JKwIGxn0Duw.6YCg1hb26WRwL3v14pY6FZOggyHy7n6', 3, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:39'),
(9, 'mijael tarqui aranibar', NULL, '7808409', '1989-06-12', '76062940', 'Internacional Bilingue', 'cibscmijaeltarquiaranibar@gmail.com', '$2y$10$3K3E/e2Rcmg.hPCVpr4B0e2XWzRRBZnD1wHGnoARbROQFnUdr/81a', 4, 1, 1, '2025-09-19 17:30:50', '2025-12-03 18:41:33'),
(10, 'Oscar Garcia', NULL, '5727989', '1987-06-11', '75166614', 'BTH SARARENDA', 'beytpj1@gmail.com', '$2y$10$YlF0h7U9WLuTFzIRWToWw.ImH6tME/TvjfHHCpI8zgQ2bTrJLKEGS', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:49'),
(11, 'Guillermo Cruz', NULL, '6393933', '1984-09-22', '76368207', 'U.E. Rep. Del Brasil', 'guiller.2284@hotmail.com', '$2y$10$wspAU.xjaLzIbRV2N8eCe.WPaui52Le5T6SpmjryiVi3AfANKPCD.', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:53'),
(12, 'Henry Miguel Mendez Rocha', NULL, '5223377', '1987-04-17', '69444198', 'Jose Carrasco', 'GameadictoHHH@gmail.com', '$2y$10$gY8S6ebCeudkTNInMo4U1eRLblHDMwoVMHRs8U1JSQLrrhgCxo5c.', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:34:59'),
(13, 'Cecilia Nery Montaño Balderrama', NULL, '11349085', '1993-11-11', '78425117', 'LA SALLE', 'cecilianerym@lasallescz.edu.bo', '$2y$10$gUtU3F1VLci/s82XTBO4Be4qb4jQ/yPX312JUPbri1AeZHN80SyCu', 2, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:02'),
(14, 'Dora Angela Soliz', NULL, '6326991', '1985-07-28', '60866088', 'LA SALLE', 'doraangelas@lasallescz.edu.bo', '$2y$10$R8OJ1zkNR2ubS60BIv4du.3yOFIhCXtxqeLpDXkyB3GzDYdX0mPgu', 7, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:05'),
(15, 'NICOLE CASTAÑO', NULL, '3211243321', '2000-03-11', '123132321', 'LASALO', 'ANICOLE.SALVATIERRA0890@GMAIL.COM', '$2y$10$emhusk/AvMQV.0wfSQhs2eN3.K.sdlydj6/9inkl9UvokNia5znSO', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:10'),
(16, 'Thiago Arturo Tantani Mamani', NULL, '1234567', '2024-09-10', '61320004', 'Tech Home', 'arturo@techhomebolivia.com', '$2y$10$r1.eMa2ydzzTt.sHIU4f2OnsBfQaEs9JaQykJafkIiHXFYHaFX7zm', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:15'),
(17, 'Rodrigo Richard Manzano Sandoval', NULL, '8598964', '1992-12-20', '61151413', 'No estoy en colegio', 'rodmanticstyle@gmail.com', '$2y$10$VJEezjto0EMJmdZBAIcPyOBJcgkRIytCwSpEDH38CNagxrhnYpArK', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:18'),
(18, 'Andres Adrian Rementeria Montenegro', NULL, '5422145', '1987-03-25', '75538045', 'Bertolusso', 'arementeriam@gmail.com', '$2y$10$bQs8H8qKHoD5q6r5HGQm5O2vSfG0yhszaivZunS7C0PMNQfA6VTEi', 10, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:25'),
(19, 'Juan Antonio Valle Zegarra', NULL, '8505563-1R', '1991-05-20', '72414258', 'Unidad Educativa Tomas Frias', 'juan20mayo@gmail.com', '$2y$10$WFieNPqazMoZS4gzf0cTT.kUO1usJ2mNwTJVkKWnmkOVrYdBekX7y', 9, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:29'),
(20, 'EMERSON CARRILLO', NULL, '8155148', '1990-02-14', '79025089', 'RD', 'ingemerson90@gmail.com', '$2y$10$XoBoCH8Oc257N4M.jMOc8.FWZ6e0Ka7qWkbp8DkpbgRg0tWUE35be', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:33'),
(21, 'Leonardo', NULL, '9780214', '2002-07-18', '78013456', 'Domingo savio', 'leonardoopenajustiniano2@gmail.com', '$2y$10$IMBNIe7bo8ER.AQcQE14vO29D/ZYp0g9bUSAnziKZK4EqTJqT5buG', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:36'),
(22, 'Analia Cupara copa', NULL, '15004004', '2010-11-07', '74205377', '1 de Abril B', 'analiacuparacopa@gimal.com', '$2y$10$E6TtnESWyUxFxiqQmpT6FekErQOHsGFZRzod2TWyNdq0XStypLTKe', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:41'),
(23, 'Test', NULL, '1234567890', '2025-06-13', '123456789', 'test', 'test@gmail.com', '$2y$10$VVs06xVI4e5zKyfGjZML5usmGNWdPXBr3wyUyi69iPjC7GF5EJefS', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:45'),
(24, 'Adriana Carolina', NULL, '7845870', '1991-06-23', '76389190', 'LA SALLE', 'adrianav@lasallescz.edu.bo', '$2y$10$oldEvF2mnOXFcRv39slCIekCP/a5pyfrTm0OnH.Xo0pDLVAt40i8e', 4, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:49'),
(25, 'Ines Morales Claros', NULL, '6242850', '1989-04-21', '60340487', 'La Salle', 'inesm@lasallescz.edu.bo', '$2y$10$tsmFrwxstaTGS1w64k5zvuRfRRZ8M5QZACkk891Q8MSl5vFuSzGKK', 9, 1, 1, '2025-09-19 17:30:50', '2025-09-19 17:35:53'),
(26, 'Hasmany Cortez Salazar', NULL, '4734207', '1979-10-17', '73989033', 'La Salle', 'hasmanyc@lasallescz.edu.bo', '$2y$10$XQXG6SPBx1YBu7aVkH3yGu3G2EqMOl/xkfrqho6R1WMdLKz1wZoZm', 9, 1, 1, '2025-09-19 17:30:50', '2025-11-12 20:02:28'),
(27, 'jhojan andre uño peñaranda', NULL, '12234556', '2025-02-05', '75386254', 'tomas frias', 'jhojanandre314@gmail.com', '$2y$10$ixqOcGW5uW.S6.F1eWGzr.6gZdo1K9jkyV13NgE1f1JpH0ceiuMqG', 4, 0, 1, '2025-09-19 17:30:50', '2025-09-19 17:30:50'),
(28, 'Daniel Pareja', NULL, '6314756', '1986-05-05', '75060009', 'Cristo Rey', 'daniel.pareja@outlook.com', '$2y$10$I0KvNdnrdvjypC19xOgRn.r1vspqDwfnCy/iq4LK8RgZD/GqIpdky', 4, 0, 1, '2025-09-19 17:30:50', '2025-09-19 17:30:50'),
(29, 'Daniel Santelices', NULL, '13543286', '2011-11-10', '76391380', 'LaSalle', 'dasantelicessilvera@lasallescz.edu.bo', '$2y$10$nUYzmcJJPInWi5BDONV7Hu8AGIWgqcrJLmpCTd5cfaNV3DAGdBd6S', 4, 0, 1, '2025-09-19 17:30:50', '2025-09-19 17:30:50'),
(30, 'Aneliz Siles', NULL, '487443', '1964-09-15', '78003585', 'Internacional San Marcos', 'aneliz.siles@colegiosanmarcos.edu.bo', '$2y$10$wBWyRHZx0KobWlu1EKOJX.WpQiVHeatMZ.GJ/Pnq/CWdS/yVmiIla', 4, 1, 1, '2025-09-19 17:30:50', '2025-11-12 20:02:52'),
(31, 'ELIAS EXEQUIEL PEÑA VACA', NULL, '4671900', '1976-07-20', '75586078', 'COLEGIO INTERNACIONAL SAN MARCOS', 'elias.pv456@gmail.com', '$2y$10$E9Sh4L3FtCZQM2ltk0GSBu.M0ohBHXtqZC0v5VDlnHF2CA9mLF72y', 4, 0, 1, '2025-09-19 17:30:50', '2025-09-19 17:30:50'),
(32, 'Juan Siñani', NULL, '12345678', '1998-08-28', '1234567', '12345678', 'ryogalawliet@gmail.com', '$2y$10$C5In1IpqPAayDD0x9Zi8m.nUSMF9EpOJve4c7ot4LSGaS7ChvtS6.', 4, 0, 1, '2025-09-19 17:30:50', '2025-09-19 17:30:50'),
(33, 'Mario Alberto Saavedra', NULL, '5864718', '1985-10-18', '75652352', 'Rey Jesus', 'msaavedra.1985.2010@gmail.com', '$2y$10$8Uqc3ra6/lKknfyN1XFXtegG/sB4mkIFNxZr9ji6/yvytHDqYx5OS', 4, 0, 1, '2025-09-20 22:29:05', '2025-09-20 22:29:05'),
(34, 'Benjamin Loayza Flores', NULL, '12748273', '2011-11-15', '72277771', 'Unidad Educativa La Salle', 'Bloayzaflores@lasallescz.edu.bo', '$2y$10$cZW54fEry/G/fW5qqCmSV.1K5UzN5CaQLsAPBkCp4kSnmfvpFYFt2', 4, 0, 1, '2025-09-22 08:11:48', '2025-09-22 08:11:48'),
(35, 'MARIEWTTA CIANCANGLINI', NULL, '4397027', '1999-04-24', '72162168', 'la salle', 'pollitoofelix@gmail.com', '$2y$10$cWjewSVd/xJ92wT6VwDoK.mjNGdSlwgoY0s4ox3ribp..URAel7UO', 4, 0, 1, '2025-09-22 08:13:54', '2025-09-22 08:13:54'),
(36, 'Romina Erika Cardozo', NULL, '123456789', '2000-03-04', '62128505', 'La Salle', 'recardozoprado@lasallescz.edu.bo', '$2y$10$eGzhs091PGgKUSYPVdtt1.7SPq2dLVhnShbj1bkqgpZx7hOcGk952', 4, 0, 1, '2025-09-22 08:16:46', '2025-09-22 08:16:46'),
(37, 'Isabella Angelo Buitrago', NULL, '289743030', '2000-01-01', '234345435', '343452342', 'iangelobuitrago@lasallescz.edu.bo', '$2y$10$asioIN3Pw2xT5TPbObaOc.34qfV0YJPBFP23ekwMrMbr3hhUTDtLm', 4, 0, 1, '2025-09-22 08:17:45', '2025-09-22 08:17:45'),
(38, 'Sofia Suarez Suarez', NULL, '12725668', '2000-03-30', '78125615', 'LASALLE', 'ssuarezsuarez@lasallescz.edu.bo', '$2y$10$qB2UwynVcfm/RoYsEEdomu4hLntbPS6oYpel3wH7j8UExKvfi9u/a', 4, 0, 1, '2025-09-22 08:19:42', '2025-09-22 08:19:42'),
(39, 'Luis Fernando Salazar Salguero', NULL, '14557633', '2007-05-10', '77032704', 'Gabriel Rene Moreno', 'salazarsalgueroluisfernando@gmail.com', '$2y$10$rlRhvi5j7PRFf14CkugRY.GgDHeJJcyPLa7Wz2spxBYkCF4fgCqou', 4, 0, 1, '2025-09-24 15:26:36', '2025-09-24 15:26:36'),
(40, 'Luis Mario Rocha Vela', NULL, '16743070', '2004-09-01', '68832828', 'Universidad Privada Domingo Savio', 'luisrochavela1@gmail.com', '$2y$10$Bk1pjgTvm0GSfTpVME8.wOssWL0BpxKuFwQtWpK7JwBu1Dl6o376e', 4, 0, 1, '2025-09-29 15:09:10', '2025-09-29 15:09:10'),
(41, 'Fabrizio Manuel Paz Del Rio', NULL, '12791597', '2012-08-26', '62117793', 'La Salle', 'pazfabrizio1@gmail.com', '$2y$10$E7FyqajTdPgfC/ugUyCgJ.4PDMr9.46u9PCbwlo1kwGSrLIkJyb.i', 4, 0, 1, '2025-09-30 09:47:41', '2025-09-30 09:47:41'),
(43, 'Zulema Rivero Salas', NULL, '6277639', '1984-11-23', '79810742', '15 de mayo', 'zuleid23.zr@gmail.com', '$2y$10$bOj8UJlf/UPwRIy/sDSAbuBGzS3sW43EVG8Z30OcvgvD8M9uLm/vi', 4, 0, 1, '2025-10-06 12:08:12', '2025-10-06 12:08:12'),
(44, 'Leonardo Peña Añez', NULL, '14067067', '2005-06-08', '75678428', 'santa rosa de roca 1', 'leonardopenaanez@gmail.com', '$2y$10$9DHB2ppqDYcXguJYDe0PzuINLDNR82utaKJvUlxmEMqgwkjKdr6lm', 4, 1, 1, '2025-10-06 17:05:38', '2025-11-13 08:46:11'),
(45, 'ESTHER FELIPA ESCOBAR CHOQUE', NULL, '3081828', '1978-05-01', '7 502 0093', '15 DE MAYO', 'echef1978@gmail.com', '$2y$10$U9GKAh1jYMLDE3RXiWlYO.gWICUgODKczyLhQ/M3/GOgfzgFPLARC', 4, 0, 1, '2025-10-07 18:05:13', '2025-10-07 18:05:13'),
(46, 'armando Flores Roca', NULL, '9783498', '2003-04-02', '67844637', 'Boliviano Holandes', 'Armando.flores.r04@gmail.com', '$2y$10$7iYQzrt6xet3TlKNuGB3MusuYy0HaUCMEju143NuYHaxTl7LDYbb6', 5, 0, 1, '2025-10-14 10:35:48', '2025-10-14 10:37:28'),
(47, 'Luis Mario', 'Rocha Vela', '12345001', '1990-01-01', '70000001', 'TECH HOME BOLIVIA', 'luisrochavela990@gmail.com', '$2y$10$Olc7LpuWPGakjNiIe5F8/eVdLxbEAMsIAfp3NSZSR/RO28CszSRwS', 1, 1, 1, '2025-10-24 10:56:32', '2025-10-24 10:56:32'),
(48, 'Cliente Bot', 'Administrador', '12345002', '1990-01-01', '70000002', 'TECH HOME BOLIVIA', 'clientebot6001@gmail.com', '$2y$10$Olc7LpuWPGakjNiIe5F8/eVdLxbEAMsIAfp3NSZSR/RO28CszSRwS', 1, 1, 1, '2025-10-24 10:56:32', '2025-10-24 10:56:32'),
(49, 'Luis Mario', 'Vendedor Sistema', '12345003', '1990-01-01', '70000003', 'TECH HOME BOLIVIA', 'lr0900573@gmail.com', '$2y$10$Olc7LpuWPGakjNiIe5F8/eVdLxbEAMsIAfp3NSZSR/RO28CszSRwS', 11, 1, 1, '2025-10-24 10:56:32', '2025-10-24 10:56:32'),
(50, 'Jessica Ariana Sandy Arteaga', '', '9727923', '2005-09-20', '73621756', 'San Simon', 'jessicasandyarteaga@gmail.com', '$2y$10$KBaHOZsz13FW1Y4uphuPC.YY05hvVr8MR070Xoii.dLS5nX830xsG', 11, 1, 1, '2025-10-25 10:34:13', '2025-10-25 10:46:30'),
(51, 'Florencia Revollo Leniz', '', '5136814', '1979-04-29', '73410939', '1 de abril b', 'florenciarevollo4@gmail.com', '$2y$10$.0iHmcrCf6PInVIcvaH1Huo16KGgbpw.mCC.LQsAWz84Km67UdFMC', 4, 0, 1, '2025-10-30 17:13:11', '2025-10-30 17:13:11'),
(52, 'John Joaquín Clemente Santos', '', '73518372', '2022-11-16', '73872505', '1 de abril \"B\"', 'psantosaricoma@gmail.com', '$2y$10$XAtxRXLzIaH5O3E.4364OuoN3TxZon6Q6R5nGa.m4h6ipkpBd4nZ2', 4, 0, 1, '2025-11-06 20:07:47', '2025-11-06 20:07:47'),
(56, 'Leo Email Prueba', '', '14067067', '2005-02-02', '75678428', 'santa cruz', 'cliente2pruebaa@gmail.com', '$2y$10$epUboU/i8.Tc.qlfGAS2ruD3rKNtaBDFMuvzaysRtQPwh8BjL8YuW', 4, 1, 1, '2025-11-12 23:45:54', '2025-11-12 23:49:49'),
(57, 'Felix Ruiz Peña', '', '14067067', '2002-02-22', '75678428', 'santa cruz', 'cliente3pruebaa@gmail.com', '$2y$10$4lQqamzf3MdL3aOkUu4RQ.ofMAtraVXlCd2.BgttW0ZTAMLVokTuC', 4, 1, 1, '2025-11-13 08:39:18', '2025-11-13 08:44:34'),
(58, 'Nicolás Aldo Alvarez Soto', '', '14753098', '2013-02-14', '72399105', 'Unidad educativa 1ro de abril \"B\"', 'nicolasaldo1402@gmail.com', '$2y$10$aTygaMCk8dfog3AV4nelfuCbUH6jHq7xvlVEZ3D6QrTewA722Sv0q', 4, 1, 1, '2025-11-13 16:56:07', '2025-11-13 16:59:48'),
(59, 'Edwar Mijael Cordova Marin', '', '15118527', '2013-03-04', '73034900', 'Tomás Frias', 'edwarcordovamarin@gmail.com', '$2y$10$mgbcgPYtda/OJgpDNc0qKeDROa69F1NXKQrwYcPq8Y6cWtjYaalE.', 4, 0, 1, '2025-11-18 18:13:58', '2025-11-18 18:13:58'),
(60, 'Rosa Linda Orosco Calle', '', '7098648', '1991-03-09', '73043897', '21 de septiembre', 'calleoroscorosa@gmail.com', '$2y$10$vIPn0JDUNlH1Lt2keJCG1eAFza3LcgGr99OFMhh/ND6eYorvlWhCK', 4, 1, 1, '2025-11-19 09:05:53', '2025-11-19 09:06:37'),
(61, 'Cristian Jesus Olguera Tacuri', '', '123456', '2012-06-19', '63693061', '1ro de abril \"B\"', 'cristianolguera4@gmail.com', '$2y$10$1XuvyZR7TndzIXOEDtnaFOq46sRyIKiZ..nWdnflGOKZe.4tcf6Jm', 4, 0, 1, '2025-11-19 14:35:36', '2025-11-19 14:35:36'),
(62, 'Juan Carlos Mamani Torres, Patricia Torres Condori', '', '6297835', '2013-04-08', '72690689', '1ro de abril B', 'torrescondorip@gmail.com', '$2y$10$bWEMIosQYIKN1UF/GemaEORsl4sYWVDsPVoM8b9cGRpVZ20rE5mqW', 4, 0, 1, '2025-11-19 17:28:53', '2025-11-19 17:28:53'),
(63, 'Sindel Alejandra Farfan Alzu', '', '13165066', '2005-12-08', '75729796', 'Tomas frias', 'angelicaalzu531@gmail.com', '$2y$10$RjJrcOW2IrY2B8yAHe7z7e5YLZf2Pyg4o930XhSqYcpY11Nz9ri3.', 4, 0, 1, '2025-11-20 21:41:46', '2025-11-20 21:41:46'),
(64, '.', '', '1932417', '1981-01-06', '70841229', 'LaSalle', 'ecabrerabravo@gmail.com', '$2y$10$.E09LtEfJSGEOjiQCocG0e/DbZ8hZ3CtyOBqab0RZ4xTqOqCIuFG2', 4, 0, 1, '2025-11-22 18:15:23', '2025-11-22 18:15:23'),
(65, '.', '', '1932417', '1981-01-06', '70841229', 'LaSalle', 'ecabrerabravo@lasallescz.edu.bo', '$2y$10$lK97RvV1eMUdikKT1SOiJ.anGht7T5lAys6KdiJaye9SPBHEIrRLi', 4, 1, 1, '2025-11-22 18:18:29', '2025-11-22 18:19:01'),
(66, 'Eliana Mamani', '', '8620900', '1996-11-20', '72397473', 'Tomás Frías', 'elianamamaniv@gmail.com', '$2y$10$l/oHfIlBS8w.kuwIC4mv6ODOv5SMsTA2VQbdHXBBIhzQ2eLLa/4qq', 4, 1, 1, '2025-11-23 17:05:58', '2025-11-23 17:06:41'),
(67, 'Abiel Isai Mendoza Flores', '', '73896779', '2025-01-12', '+591 73896779', '1ro De abril', 'florestorreselizabeth907@gmail.com', '$2y$10$7J2OdvDIFTfT94VkgGP7jujD4g4aukMyCLEEMaVGUnriRIDXxFD.O', 4, 0, 1, '2025-11-24 17:44:42', '2025-11-24 17:44:42'),
(68, 'Abiel Isai Mendoza Flores', '', '72378379', '2025-01-12', '+591 72378379', '1ro de Abril', 'mendozafloresdarwinmisael@gmail.com', '$2y$10$4If0fWbgeeIejLDg8KNhG.qjfUHqsVra/tBS.N1F2uNpVEPxamhlW', 4, 0, 1, '2025-11-24 18:50:18', '2025-11-24 18:50:18'),
(69, 'Jenipher Bernal', '', '13779591', '2013-02-15', '71643399', 'La salle', 'jeniaba2013@gmail.com', '$2y$10$/l0.SOIOrBHpHbgPGpFMx.b5lLFLG2eZUrB3He2kS2kNg/8Euh/fq', 4, 1, 1, '2025-11-24 21:19:17', '2025-11-24 21:19:34'),
(70, 'Victor Huno Benito Equise', '', '6359630 sc', '1985-12-12', '60829623', 'Centro Educacional Vida Nueva', 'victorbenitoequise@gmail.com', '$2y$10$ihFVKarNkCYmTPDndRPORe5rY8RPvm12MR1Q79SkJSxzdwey1lVZ.', 4, 1, 1, '2025-11-25 18:09:55', '2025-11-25 18:11:39'),
(71, 'Miranda Campos', '', '14991032', '2013-04-01', '60023711', 'La salle', 'mcamposguzman@lasallescz.edu.bo', '$2y$10$h5ji/EDEW9PhnYysnncyS.CKDNtLdWBh.NsrbtdUDF6q1uPZs/kl6', 4, 0, 1, '2025-11-25 22:02:52', '2025-11-25 22:02:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `numero_venta` varchar(20) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `descuento` decimal(10,2) DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `cliente_nombre` varchar(200) DEFAULT NULL,
  `cliente_contacto` varchar(150) DEFAULT NULL,
  `metodo_pago` enum('EFECTIVO','TARJETA','TRANSFERENCIA') DEFAULT 'EFECTIVO',
  `estado` enum('PENDIENTE','COMPLETADA','ANULADA') DEFAULT 'PENDIENTE',
  `usuario_id` int(11) NOT NULL,
  `fecha_venta` datetime DEFAULT current_timestamp(),
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `numero_venta`, `libro_id`, `cantidad`, `precio_unitario`, `descuento`, `subtotal`, `total`, `cliente_nombre`, `cliente_contacto`, `metodo_pago`, `estado`, `usuario_id`, `fecha_venta`, `observaciones`) VALUES
(9, 'VT000001', 1, 1, 25.00, 0.00, 25.00, 25.00, 'Cliente Prueba Debug', 'debug@test.com', 'EFECTIVO', 'ANULADA', 1, '2025-10-13 21:36:11', NULL),
(10, 'VT000002', 1, 1, 25.00, 0.00, 25.00, 25.00, 'Cliente Test Directo', 'test@directo.com', 'EFECTIVO', 'ANULADA', 1, '2025-10-13 21:38:34', NULL),
(11, 'VT000003', 1, 1, 50.00, 0.00, 50.00, 50.00, 'TEST CLIENTE DEBUG', '12345678', 'EFECTIVO', 'ANULADA', 1, '2025-10-14 09:38:30', NULL),
(12, 'VT000004', 1, 2, 25.00, 0.00, 50.00, 50.00, 'Cliente Test Formulario', '70123456', 'EFECTIVO', 'ANULADA', 1, '2025-10-14 09:39:56', NULL),
(13, 'VT000005', 1, 4, 25.00, 0.00, 100.00, 100.00, 'María González', '70123456', 'EFECTIVO', 'ANULADA', 4, '2025-10-14 09:51:41', NULL),
(14, 'VT000006', 1, 1, 25.00, 0.00, 25.00, 25.00, 'Cliente de Prueba', 'test@prueba.com', 'EFECTIVO', 'ANULADA', 1, '2025-10-14 16:03:38', NULL),
(15, 'VT000007', 1, 1, 25.00, 0.00, 25.00, 25.00, 'Cliente Web Test', 'web@test.com', 'EFECTIVO', 'ANULADA', 1, '2025-10-14 16:10:25', NULL),
(16, 'VT000008', 5, 9, 45.00, 0.00, 405.00, 405.00, 'Roberto Villarroel', '75987654', 'EFECTIVO', 'ANULADA', 4, '2025-10-14 16:58:13', NULL),
(17, 'VNT-20251025-001', 2, 1, 25.00, 0.00, 25.00, 25.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-25 09:36:52', NULL),
(18, 'VNT-20251025-002', 6, 3, 44.00, 0.00, 132.00, 132.00, 'MARÍA GONZÁLEZ LOPEZ', '70123456', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 09:38:37', NULL),
(19, 'VNT-20251025-002', 1, 4, 25.00, 0.00, 100.00, 100.00, 'MARÍA GONZÁLEZ LOPEZ', '70123456', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 09:38:37', NULL),
(20, 'VNT-20251025-004', 5, 1, 45.00, 0.00, 45.00, 45.00, 'LUIS MARIO', '23123123', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 09:54:07', NULL),
(21, 'VNT-20251025-005', 5, 1, 45.00, 0.00, 45.00, 45.00, 'LUIS MARIO', '23123123', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 10:04:14', NULL),
(22, 'VNT-20251025-006', 5, 1, 45.00, 0.00, 45.00, 45.00, 'LUIS MARIO', '23123123', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 10:04:42', NULL),
(23, 'VNT-20251025-007', 4, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-25 10:05:48', NULL),
(24, 'VNT-20251025-008', 5, 1, 45.00, 0.00, 45.00, 45.00, 'LUIS MARIO', '23123123', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 10:25:55', NULL),
(25, 'VNT-20251025-009', 4, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-25 10:26:32', NULL),
(26, 'VNT-20251025-010', 1, 1, 25.00, 0.00, 25.00, 25.00, 'LUIS MARIO', '23123123', 'EFECTIVO', 'ANULADA', 47, '2025-10-25 10:26:42', NULL),
(27, 'VNT-20251025-011', 7, 1, 150.00, 30.00, 150.00, 105.00, 'MIGUEL ANGEL PINTO ARAMAYO', '72112703', 'EFECTIVO', 'COMPLETADA', 50, '2025-10-25 11:04:02', NULL),
(28, 'VNT-20251028-001', 7, 1, 150.00, 0.00, 150.00, 150.00, 'MAURICIO VASQUEZ MENACHO', '74181117', 'EFECTIVO', 'ANULADA', 1, '2025-10-28 10:33:33', NULL),
(29, 'VNT-20251031-001', 6, 1, 44.00, 0.00, 44.00, 44.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-31 14:27:13', NULL),
(30, 'VNT-20251031-002', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-31 14:30:33', NULL),
(31, 'VNT-20251031-003', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-31 14:52:38', NULL),
(32, 'VNT-20251031-004', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-10-31 15:07:52', NULL),
(33, 'VNT-20251031-005', 7, 1, 150.00, 0.00, 150.00, 150.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-10-31 15:30:59', NULL),
(34, 'VNT-20251108-001', 7, 1, 150.00, 30.00, 150.00, 105.00, 'JOSE DAVID COLQUE BERNABE', '77686714', 'EFECTIVO', 'COMPLETADA', 50, '2025-11-08 09:04:43', NULL),
(35, 'VNT-20251110-001', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 13:44:49', NULL),
(36, 'VNT-20251110-002', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 14:18:10', NULL),
(37, 'VNT-20251110-003', 6, 1, 44.00, 0.00, 44.00, 44.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 14:19:48', NULL),
(38, 'VNT-20251110-004', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 14:26:46', NULL),
(39, 'VNT-20251110-005', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 15:10:22', NULL),
(40, 'VNT-20251110-006', 6, 2, 44.00, 0.00, 88.00, 88.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 15:42:22', NULL),
(41, 'VNT-20251110-007', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 16:10:53', NULL),
(42, 'VNT-20251110-008', 7, 1, 150.00, 0.00, 150.00, 150.00, 'MAURICIO VASQUEZ MENACHO', '74181117', 'EFECTIVO', 'ANULADA', 1, '2025-11-10 16:31:05', NULL),
(43, 'VNT-20251110-009', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 16:54:33', NULL),
(44, 'VNT-20251110-010', 4, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 17:04:39', NULL),
(45, 'VNT-20251110-011', 1, 1, 25.00, 0.00, 25.00, 25.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 17:12:41', NULL),
(46, 'VNT-20251110-012', 3, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 17:21:01', NULL),
(47, 'VNT-20251110-013', 3, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 17:26:14', NULL),
(48, 'VNT-20251110-014', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-10 20:37:42', NULL),
(49, 'VNT-20251111-001', 4, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-11 01:27:52', NULL),
(50, 'VNT-20251111-002', 2, 1, 25.00, 0.00, 25.00, 25.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-11 10:19:02', NULL),
(51, 'VNT-20251111-002', 3, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-11 10:19:02', NULL),
(52, 'VNT-20251111-002', 7, 1, 150.00, 0.00, 150.00, 150.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-11 10:19:02', NULL),
(53, 'VNT-20251111-005', 5, 1, 45.00, 0.00, 45.00, 45.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-11 10:25:19', NULL),
(54, 'VNT-20251113-001', 7, 1, 150.00, 0.00, 150.00, 150.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 09:06:46', NULL),
(55, 'VNT-20251113-002', 7, 1, 150.00, 0.00, 150.00, 150.00, 'MAURICIO VASQUEZ MENACHO', '74181117', 'EFECTIVO', 'ANULADA', 1, '2025-11-13 15:29:24', NULL),
(56, 'VNT-20251113-003', 2, 4, 25.00, 0.00, 100.00, 100.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 15:55:00', NULL),
(57, 'VNT-20251113-004', 2, 4, 25.00, 0.00, 100.00, 100.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 15:57:46', NULL),
(58, 'VNT-20251113-005', 2, 4, 25.00, 0.00, 100.00, 100.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 16:04:07', NULL),
(59, 'VNT-20251113-006', 1, 2, 25.00, 0.00, 50.00, 50.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 16:22:36', NULL),
(60, 'VNT-20251113-007', 1, 1, 25.00, 0.00, 25.00, 25.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 16:41:35', NULL),
(61, 'VNT-20251113-008', 3, 1, 30.00, 0.00, 30.00, 30.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 16:48:28', NULL),
(62, 'VNT-20251113-009', 1, 1, 25.00, 0.00, 25.00, 25.00, 'PEÑA PRUEBA 2', '75678428', 'EFECTIVO', 'ANULADA', 48, '2025-11-13 16:56:09', NULL),
(63, 'VNT-20251120-001', 5, 1, 45.00, 0.00, 45.00, 45.00, 'Prueba SR2', '78787878', 'EFECTIVO', 'ANULADA', 48, '2025-11-20 02:02:41', NULL),
(64, 'VNT-20251121-001', 10, 2, 20.00, 0.00, 40.00, 40.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(65, 'VNT-20251121-001', 11, 2, 10.00, 0.00, 20.00, 20.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(66, 'VNT-20251121-001', 9, 1, 65.00, 0.00, 65.00, 65.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(67, 'VNT-20251121-001', 16, 10, 0.50, 0.00, 5.00, 5.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(68, 'VNT-20251121-001', 15, 10, 0.50, 0.00, 5.00, 5.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(69, 'VNT-20251121-001', 8, 1, 120.00, 0.00, 120.00, 120.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(70, 'VNT-20251121-001', 14, 1, 40.00, 0.00, 40.00, 40.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(71, 'VNT-20251121-001', 12, 1, 18.00, 0.00, 18.00, 18.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(72, 'VNT-20251121-001', 17, 1, 35.00, 0.00, 35.00, 35.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(73, 'VNT-20251121-001', 18, 1, 3.00, 0.00, 3.00, 3.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(74, 'VNT-20251121-001', 20, 1, 120.00, 0.00, 120.00, 120.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(75, 'VNT-20251121-001', 19, 2, 6.00, 0.00, 12.00, 12.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(76, 'VNT-20251121-001', 21, 1, 13.00, 0.00, 13.00, 13.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(77, 'VNT-20251121-001', 23, 2, 2.00, 0.00, 4.00, 4.00, 'MARTA ADORNO', '75338022', 'EFECTIVO', 'COMPLETADA', 1, '2025-11-21 18:12:02', NULL),
(78, 'VNT-20251128-001', 1, 1, 25.00, 0.00, 25.00, 25.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-28 16:24:13', NULL),
(79, 'VNT-20251128-002', 6, 5, 44.00, 50.00, 220.00, 220.00, 'PEÑA  PRUEBA', '756784528', 'EFECTIVO', 'ANULADA', 48, '2025-11-28 16:55:42', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `verificacion_correos`
--

CREATE TABLE `verificacion_correos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `creado_en` datetime NOT NULL DEFAULT current_timestamp(),
  `expira_en` datetime NOT NULL,
  `usado` tinyint(1) NOT NULL DEFAULT 0,
  `usado_en` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `verificacion_correos`
--

INSERT INTO `verificacion_correos` (`id`, `usuario_id`, `token`, `creado_en`, `expira_en`, `usado`, `usado_en`) VALUES
(1, 2, 'c8caa082967489a68ccdcc3d1be1a33cde6575a603109f79aa363a0ead0e47c7', '2025-10-03 12:44:18', '2025-10-03 12:45:18', 0, NULL),
(2, 5, 'd928b9f9260e249f970109faabfb43f23c526b68c790296af6b2baf1137a2ee5', '2025-10-03 12:48:25', '2025-10-03 12:49:25', 1, '2025-10-03 12:49:21'),
(3, 6, '7db93a4bf7bd48f92cb3e8cd886313ec7b7d555bdd10b1a7b6edb89336cd59c3', '2025-10-03 12:58:34', '2025-10-03 12:59:34', 1, '2025-10-03 12:59:25'),
(4, 50, '2f383ff13d24397cf77e1c343f9210908be64aaea8cf264a17260856fef16267', '2025-10-25 10:34:13', '2025-10-26 10:34:13', 0, NULL),
(5, 51, '1b04c03196ada9c980167530c7ebfc6d82bd9f86a03d9cdfbd693daf85498576', '2025-10-30 17:13:11', '2025-10-31 17:13:11', 0, NULL),
(6, 52, '3b7050b59190090abd95feba167c24a7e680ef102a96289bb04a19469a79735c', '2025-11-06 20:07:47', '2025-11-07 20:07:47', 0, NULL),
(13, 56, '182c384319800f029cb566307f3abe8c772808828e82b472f295edfa509e9223', '2025-11-12 23:45:54', '2025-11-13 23:45:54', 1, '2025-11-12 23:46:50'),
(14, 57, 'c6eb74050385afa812c3d81a751d2978af0bf1f322cfecb3f40bd61b29c220a8', '2025-11-13 08:39:18', '2025-11-14 08:39:18', 0, NULL),
(15, 57, '35369ecc21ccfe5865d48dccbea4969a809ae4cb54f742e985fc8a26b6e337f4', '2025-11-13 08:41:30', '2025-11-14 08:41:30', 1, '2025-11-13 08:44:34'),
(16, 44, '8d547c346b963469ddaa8268f55e6fc904e49ad5ca274acd43559504d22441c0', '2025-11-13 08:44:55', '2025-11-14 08:44:55', 1, '2025-11-13 08:45:22'),
(17, 58, 'b6bba50654fd977f74e62313eea5568160116cbdf0ae82976d973da0a7e1e92c', '2025-11-13 16:56:07', '2025-11-14 16:56:07', 1, '2025-11-13 16:59:48'),
(18, 58, '08624eda5642de87d733b6778f1b0b55f6e5e3f77875498b7093f5b1b68906fe', '2025-11-13 16:58:32', '2025-11-14 16:58:32', 0, NULL),
(19, 59, 'c270e433a98fc566b4b8e756be3f384e8afeb02cedf25438932b1977ff9b8862', '2025-11-18 18:13:58', '2025-11-19 18:13:58', 0, NULL),
(20, 60, '04bb60acc3906685152da561b23878e65dcec7dd9b6108dba2a203a243fb6252', '2025-11-19 09:05:53', '2025-11-20 09:05:53', 1, '2025-11-19 09:06:37'),
(21, 61, '53aa8c0bcea3026456413962e13d8f31310281d5b46ffced3ba736f6b8e8132d', '2025-11-19 14:35:36', '2025-11-20 14:35:36', 0, NULL),
(22, 62, '9b1aeb3c478b44b34d17f529bce892575215fd58f7ddee1e3075a4b277bc1fde', '2025-11-19 17:28:53', '2025-11-20 17:28:53', 0, NULL),
(23, 63, '50b5b8344f7a888a5f602d24f232e37022e2fa8cb82afc960d0646729a1cbe5d', '2025-11-20 21:41:46', '2025-11-21 21:41:46', 0, NULL),
(24, 64, '5d4d6fd8cd7c1bbcfe4a3ffc0aedb610cdfb42ac9e0b500049d57cf316fc7567', '2025-11-22 18:15:23', '2025-11-23 18:15:23', 0, NULL),
(25, 65, 'd7266ded66f7a2655fa55884208b67fecac7eab501d3d5703f35fe384dcc98e9', '2025-11-22 18:18:29', '2025-11-23 18:18:29', 1, '2025-11-22 18:19:01'),
(26, 66, '48738e1c406f2a13301fa5c1eb3c41706811119651967f2bd8ed80da38824ff1', '2025-11-23 17:05:58', '2025-11-24 17:05:58', 1, '2025-11-23 17:06:41'),
(27, 67, '33834fb18f07debf02f70efa5ea3072f9d1279e8deae1a6891496e3ef1ab1414', '2025-11-24 17:44:42', '2025-11-25 17:44:42', 0, NULL),
(28, 68, 'd0705012770360b147eaa6bc6445b8bc2b847e31a064e814a14944a048349bf8', '2025-11-24 18:50:18', '2025-11-25 18:50:18', 0, NULL),
(29, 69, '079ccbfc7dc3c3c75a11b83274c954423d2566d86afa29f87bfb7fe77c907290', '2025-11-24 21:19:17', '2025-11-25 21:19:17', 1, '2025-11-24 21:19:34'),
(30, 70, '53b082178d7213ebad8bd4e328780dc795ed2dcf4421b6189b45a43df0836009', '2025-11-25 18:09:55', '2025-11-26 18:09:55', 1, '2025-11-25 18:11:39'),
(31, 71, 'bc1a8c769a474bf6a4bf7871d686e9fd93020d4a3dc53c7d4e8477096597d8e6', '2025-11-25 22:02:52', '2025-11-26 22:02:52', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_cliente` (`codigo_cliente`),
  ADD KEY `idx_tipo_cliente` (`tipo_cliente`),
  ADD KEY `idx_nacionalidad` (`nacionalidad`),
  ADD KEY `idx_departamento` (`departamento`),
  ADD KEY `fk_colegio` (`colegio_id`);

--
-- Indices de la tabla `colegios`
--
ALTER TABLE `colegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nombre_colegio` (`nombre_colegio`),
  ADD KEY `idx_departamento` (`departamento`),
  ADD KEY `idx_nacionalidad` (`nacionalidad`),
  ADD KEY `fk_usuario_registro` (`usuario_registro`);

--
-- Indices de la tabla `control_prueba_requests`
--
ALTER TABLE `control_prueba_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_control_prueba_usuario` (`usuario_id`);

--
-- Indices de la tabla `detalle_rol_permisos`
--
ALTER TABLE `detalle_rol_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_rol` (`fk_id_r`),
  ADD KEY `fk_detalle_permiso` (`fk_id_p`);

--
-- Indices de la tabla `emails_enviados`
--
ALTER TABLE `emails_enviados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_venta_id` (`venta_id`),
  ADD KEY `idx_email_destino` (`email_destino`),
  ADD KEY `idx_estado` (`estado`),
  ADD KEY `idx_fecha_envio` (`fecha_envio`),
  ADD KEY `idx_estado_fecha` (`estado`,`fecha_envio`),
  ADD KEY `idx_venta_email` (`venta_id`,`email_destino`),
  ADD KEY `fk_email_usuario` (`usuario_id`);

--
-- Indices de la tabla `entradas_stock`
--
ALTER TABLE `entradas_stock`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_entrada` (`numero_entrada`),
  ADD KEY `fk_entrada_libro` (`libro_id`),
  ADD KEY `fk_entrada_usuario` (`usuario_id`);

--
-- Indices de la tabla `impresiones_ventas`
--
ALTER TABLE `impresiones_ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_impresion_venta` (`venta_id`),
  ADD KEY `fk_impresion_usuario` (`usuario_id`);

--
-- Indices de la tabla `invitado_notifications`
--
ALTER TABLE `invitado_notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_unq` (`usuario_id`),
  ADD KEY `fk_invitado_notifications_usuario` (`usuario_id`);

--
-- Indices de la tabla `invitado_trials`
--
ALTER TABLE `invitado_trials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario_unq` (`usuario_id`),
  ADD KEY `fk_invitado_trials_usuario` (`usuario_id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `log_actividades`
--
ALTER TABLE `log_actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_actividades_usuario` (`usuario_id`);

--
-- Indices de la tabla `log_movimientos_stock`
--
ALTER TABLE `log_movimientos_stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_libro` (`libro_id`),
  ADD KEY `fk_log_usuario` (`usuario_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recuperacion_password`
--
ALTER TABLE `recuperacion_password`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recuperacion_usuario` (`usuario_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_rol` (`rol_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_venta_libro` (`libro_id`),
  ADD KEY `fk_venta_usuario` (`usuario_id`),
  ADD KEY `idx_numero_venta` (`numero_venta`);

--
-- Indices de la tabla `verificacion_correos`
--
ALTER TABLE `verificacion_correos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_verificacion_usuario` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `colegios`
--
ALTER TABLE `colegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `control_prueba_requests`
--
ALTER TABLE `control_prueba_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_rol_permisos`
--
ALTER TABLE `detalle_rol_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT de la tabla `emails_enviados`
--
ALTER TABLE `emails_enviados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `entradas_stock`
--
ALTER TABLE `entradas_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `impresiones_ventas`
--
ALTER TABLE `impresiones_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `invitado_notifications`
--
ALTER TABLE `invitado_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invitado_trials`
--
ALTER TABLE `invitado_trials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `log_actividades`
--
ALTER TABLE `log_actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `log_movimientos_stock`
--
ALTER TABLE `log_movimientos_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `recuperacion_password`
--
ALTER TABLE `recuperacion_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `verificacion_correos`
--
ALTER TABLE `verificacion_correos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_clientes_colegio` FOREIGN KEY (`colegio_id`) REFERENCES `colegios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `colegios`
--
ALTER TABLE `colegios`
  ADD CONSTRAINT `fk_colegio_usuario_registro` FOREIGN KEY (`usuario_registro`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `control_prueba_requests`
--
ALTER TABLE `control_prueba_requests`



  ADD CONSTRAINT `fk_control_prueba_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_rol_permisos`
--
ALTER TABLE `detalle_rol_permisos`
  ADD CONSTRAINT `fk_detalle_permiso` FOREIGN KEY (`fk_id_p`) REFERENCES `permisos` (`id`),
  ADD CONSTRAINT `fk_detalle_rol` FOREIGN KEY (`fk_id_r`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `emails_enviados`
--
ALTER TABLE `emails_enviados`
  ADD CONSTRAINT `fk_email_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_email_venta` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entradas_stock`
--
ALTER TABLE `entradas_stock`
  ADD CONSTRAINT `fk_entrada_libro` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `fk_entrada_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `impresiones_ventas`
--
ALTER TABLE `impresiones_ventas`
  ADD CONSTRAINT `fk_impresion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_impresion_venta` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `invitado_notifications`
--
ALTER TABLE `invitado_notifications`
  ADD CONSTRAINT `fk_invitado_notifications_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invitado_trials`
--
ALTER TABLE `invitado_trials`
  ADD CONSTRAINT `fk_invitado_trials_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `log_actividades`
--
ALTER TABLE `log_actividades`
  ADD CONSTRAINT `fk_log_actividades_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `log_movimientos_stock`
--
ALTER TABLE `log_movimientos_stock`
  ADD CONSTRAINT `fk_log_libro` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `fk_log_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `recuperacion_password`
--
ALTER TABLE `recuperacion_password`
  ADD CONSTRAINT `fk_recuperacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `fk_venta_libro` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `fk_venta_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `verificacion_correos`
--
ALTER TABLE `verificacion_correos`
  ADD CONSTRAINT `fk_verificacion_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
