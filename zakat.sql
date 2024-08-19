-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2024 at 02:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE `cabang` (
  `id` int NOT NULL,
  `kategori` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_kantor` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `kategori`, `nama_kantor`, `created_at`, `updated_at`) VALUES
(1, 'Wilayah', 'LazisMu Kalimantan Selatan', '2024-01-12 06:52:32', '2024-07-17 06:07:59'),
(2, 'Daerah', 'LazisMu Banjarbaru', NULL, '2024-07-17 07:27:59'),
(4, 'Daerah', 'LazisMu HST', NULL, '2024-07-17 07:27:53'),
(5, 'Daerah', 'LazisMu Banjarmasin', '2024-07-17 07:26:36', '2024-07-17 07:27:47'),
(6, 'Daerah', 'LazisMu Tanah Bumbu', '2024-07-17 07:26:58', '2024-07-17 07:26:58');

-- --------------------------------------------------------

--
-- Table structure for table `dana_zakat`
--

CREATE TABLE `dana_zakat` (
  `id` int NOT NULL,
  `jurnal_id` int DEFAULT NULL,
  `jumlah_dana` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_dana` enum('Fakir','Miskin','Amil','Mualaf','Riqab','Gharim','Fisabillah','Ibnu Sabil') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah_dana_awal` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dana_zakat`
--

INSERT INTO `dana_zakat` (`id`, `jurnal_id`, `jumlah_dana`, `jenis_dana`, `jumlah_dana_awal`, `created_at`, `updated_at`) VALUES
(1, 1, '0.00', 'Fakir', 125000, '2024-07-17 06:09:25', '2024-07-17 08:24:58'),
(2, 1, '0.00', 'Miskin', 125000, '2024-07-17 06:09:25', '2024-07-17 08:13:19'),
(3, 1, '125000.00', 'Amil', 125000, '2024-07-17 06:09:25', '2024-07-17 06:09:25'),
(4, 1, '0.00', 'Mualaf', 125000, '2024-07-17 06:09:25', '2024-07-21 18:42:01'),
(5, 1, '125000.00', 'Riqab', 125000, '2024-07-17 06:09:25', '2024-07-17 06:09:25'),
(6, 1, '0.00', 'Gharim', 125000, '2024-07-17 06:09:25', '2024-07-21 18:39:11'),
(7, 1, '0.00', 'Fisabillah', 125000, '2024-07-17 06:09:25', '2024-07-21 18:40:31'),
(8, 1, '0.00', 'Ibnu Sabil', 125000, '2024-07-17 06:09:25', '2024-07-21 05:04:10'),
(9, 3, '0.00', 'Fakir', 20000, '2024-07-17 06:10:27', '2024-07-17 08:24:58'),
(10, 3, '0.00', 'Miskin', 20000, '2024-07-17 06:10:27', '2024-07-17 08:13:19'),
(11, 3, '20000.00', 'Amil', 20000, '2024-07-17 06:10:27', '2024-07-17 06:10:27'),
(12, 3, '0.00', 'Mualaf', 20000, '2024-07-17 06:10:27', '2024-07-21 18:42:01'),
(13, 3, '20000.00', 'Riqab', 20000, '2024-07-17 06:10:27', '2024-07-17 06:10:27'),
(14, 3, '0.00', 'Gharim', 20000, '2024-07-17 06:10:27', '2024-07-21 18:39:11'),
(15, 3, '0.00', 'Fisabillah', 20000, '2024-07-17 06:10:27', '2024-07-21 18:40:31'),
(16, 3, '0.00', 'Ibnu Sabil', 20000, '2024-07-17 06:10:27', '2024-07-21 05:04:10'),
(17, 5, '0.00', 'Fakir', 625000, '2024-07-17 06:13:44', '2024-07-17 08:24:58'),
(18, 5, '0.00', 'Miskin', 625000, '2024-07-17 06:13:44', '2024-07-17 08:13:19'),
(19, 5, '625000.00', 'Amil', 625000, '2024-07-17 06:13:44', '2024-07-17 06:13:44'),
(20, 5, '0.00', 'Mualaf', 625000, '2024-07-17 06:13:44', '2024-07-21 18:42:01'),
(21, 5, '625000.00', 'Riqab', 625000, '2024-07-17 06:13:44', '2024-07-17 06:13:44'),
(22, 5, '0.00', 'Gharim', 625000, '2024-07-17 06:13:44', '2024-07-21 18:39:11'),
(23, 5, '0.00', 'Fisabillah', 625000, '2024-07-17 06:13:44', '2024-07-21 18:40:31'),
(24, 5, '0.00', 'Ibnu Sabil', 625000, '2024-07-17 06:13:44', '2024-07-21 05:04:10'),
(25, 7, '0.00', 'Fakir', 125000, '2024-07-17 06:20:09', '2024-07-17 08:24:58'),
(26, 7, '0.00', 'Miskin', 125000, '2024-07-17 06:20:09', '2024-07-17 08:13:19'),
(27, 7, '125000.00', 'Amil', 125000, '2024-07-17 06:20:09', '2024-07-17 06:20:09'),
(28, 7, '0.00', 'Mualaf', 125000, '2024-07-17 06:20:09', '2024-07-21 18:42:01'),
(29, 7, '125000.00', 'Riqab', 125000, '2024-07-17 06:20:09', '2024-07-17 06:20:09'),
(30, 7, '0.00', 'Gharim', 125000, '2024-07-17 06:20:09', '2024-07-21 18:39:11'),
(31, 7, '0.00', 'Fisabillah', 125000, '2024-07-17 06:20:09', '2024-07-21 18:40:31'),
(32, 7, '0.00', 'Ibnu Sabil', 125000, '2024-07-17 06:20:09', '2024-07-21 05:04:10'),
(33, 9, '0.00', 'Fakir', 812500, '2024-07-17 06:21:46', '2024-07-17 08:24:58'),
(34, 9, '0.00', 'Miskin', 812500, '2024-07-17 06:21:46', '2024-07-17 08:13:19'),
(35, 9, '812500.00', 'Amil', 812500, '2024-07-17 06:21:46', '2024-07-17 06:21:46'),
(36, 9, '0.00', 'Mualaf', 812500, '2024-07-17 06:21:46', '2024-07-21 18:42:01'),
(37, 9, '812500.00', 'Riqab', 812500, '2024-07-17 06:21:46', '2024-07-17 06:21:46'),
(38, 9, '0.00', 'Gharim', 812500, '2024-07-17 06:21:46', '2024-07-21 18:39:11'),
(39, 9, '0.00', 'Fisabillah', 812500, '2024-07-17 06:21:46', '2024-07-21 18:40:31'),
(40, 9, '0.00', 'Ibnu Sabil', 812500, '2024-07-17 06:21:46', '2024-07-21 05:04:10'),
(41, 11, '0.00', 'Fakir', 1250000, '2024-07-17 06:24:30', '2024-07-17 08:24:58'),
(42, 11, '0.00', 'Miskin', 1250000, '2024-07-17 06:24:30', '2024-07-17 08:13:19'),
(43, 11, '1250000.00', 'Amil', 1250000, '2024-07-17 06:24:30', '2024-07-17 06:24:30'),
(44, 11, '0.00', 'Mualaf', 1250000, '2024-07-17 06:24:30', '2024-07-21 18:42:01'),
(45, 11, '1250000.00', 'Riqab', 1250000, '2024-07-17 06:24:30', '2024-07-17 06:24:30'),
(46, 11, '0.00', 'Gharim', 1250000, '2024-07-17 06:24:30', '2024-07-21 18:39:11'),
(47, 11, '0.00', 'Fisabillah', 1250000, '2024-07-17 06:24:30', '2024-07-21 18:40:31'),
(48, 11, '0.00', 'Ibnu Sabil', 1250000, '2024-07-17 06:24:30', '2024-07-21 05:04:10'),
(49, 13, '0.00', 'Fakir', 937500, '2024-07-17 06:26:07', '2024-07-17 08:24:58'),
(50, 13, '0.00', 'Miskin', 937500, '2024-07-17 06:26:07', '2024-07-17 08:13:19'),
(51, 13, '937500.00', 'Amil', 937500, '2024-07-17 06:26:07', '2024-07-17 06:26:07'),
(52, 13, '0.00', 'Mualaf', 937500, '2024-07-17 06:26:07', '2024-07-21 18:42:01'),
(53, 13, '937500.00', 'Riqab', 937500, '2024-07-17 06:26:07', '2024-07-17 06:26:07'),
(54, 13, '0.00', 'Gharim', 937500, '2024-07-17 06:26:07', '2024-07-21 18:39:11'),
(55, 13, '0.00', 'Fisabillah', 937500, '2024-07-17 06:26:07', '2024-07-21 18:40:31'),
(56, 13, '0.00', 'Ibnu Sabil', 937500, '2024-07-17 06:26:07', '2024-07-21 05:04:10'),
(57, 15, '312500.00', 'Fakir', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(58, 15, '312500.00', 'Miskin', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(59, 15, '312500.00', 'Amil', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(60, 15, '312500.00', 'Mualaf', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(61, 15, '312500.00', 'Riqab', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(62, 15, '312500.00', 'Gharim', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(63, 15, '312500.00', 'Fisabillah', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(64, 15, '312500.00', 'Ibnu Sabil', 312500, '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(65, 17, '4590625.00', 'Fakir', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(66, 17, '4590625.00', 'Miskin', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(67, 17, '4590625.00', 'Amil', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(68, 17, '4590625.00', 'Mualaf', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(69, 17, '4590625.00', 'Riqab', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(70, 17, '4590625.00', 'Gharim', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(71, 17, '4590625.00', 'Fisabillah', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(72, 17, '4590625.00', 'Ibnu Sabil', 4590625, '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(73, 19, '1250000.00', 'Fakir', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(74, 19, '1250000.00', 'Miskin', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(75, 19, '1250000.00', 'Amil', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(76, 19, '1250000.00', 'Mualaf', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(77, 19, '1250000.00', 'Riqab', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(78, 19, '1250000.00', 'Gharim', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(79, 19, '1250000.00', 'Fisabillah', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(80, 19, '1250000.00', 'Ibnu Sabil', 1250000, '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(81, 21, '500000.00', 'Fakir', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(82, 21, '500000.00', 'Miskin', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(83, 21, '500000.00', 'Amil', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(84, 21, '500000.00', 'Mualaf', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(85, 21, '500000.00', 'Riqab', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(86, 21, '500000.00', 'Gharim', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(87, 21, '500000.00', 'Fisabillah', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(88, 21, '500000.00', 'Ibnu Sabil', 500000, '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(89, 23, '437500.00', 'Fakir', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(90, 23, '437500.00', 'Miskin', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(91, 23, '437500.00', 'Amil', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(92, 23, '437500.00', 'Mualaf', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(93, 23, '437500.00', 'Riqab', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(94, 23, '437500.00', 'Gharim', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(95, 23, '437500.00', 'Fisabillah', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(96, 23, '437500.00', 'Ibnu Sabil', 437500, '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(97, 25, '562500.00', 'Fakir', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(98, 25, '562500.00', 'Miskin', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(99, 25, '562500.00', 'Amil', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(100, 25, '562500.00', 'Mualaf', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(101, 25, '562500.00', 'Riqab', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(102, 25, '562500.00', 'Gharim', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(103, 25, '562500.00', 'Fisabillah', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(104, 25, '562500.00', 'Ibnu Sabil', 562500, '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(105, 27, '3125000.00', 'Fakir', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(106, 27, '3125000.00', 'Miskin', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(107, 27, '3125000.00', 'Amil', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(108, 27, '3125000.00', 'Mualaf', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(109, 27, '3125000.00', 'Riqab', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(110, 27, '3125000.00', 'Gharim', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(111, 27, '3125000.00', 'Fisabillah', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(112, 27, '3125000.00', 'Ibnu Sabil', 3125000, '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(113, 29, '750000.00', 'Fakir', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(114, 29, '750000.00', 'Miskin', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(115, 29, '750000.00', 'Amil', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(116, 29, '750000.00', 'Mualaf', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(117, 29, '750000.00', 'Riqab', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(118, 29, '750000.00', 'Gharim', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(119, 29, '750000.00', 'Fisabillah', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(120, 29, '750000.00', 'Ibnu Sabil', 750000, '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(121, 31, '125000.00', 'Fakir', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(122, 31, '125000.00', 'Miskin', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(123, 31, '125000.00', 'Amil', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(124, 31, '125000.00', 'Mualaf', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(125, 31, '125000.00', 'Riqab', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(126, 31, '125000.00', 'Gharim', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(127, 31, '125000.00', 'Fisabillah', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(128, 31, '125000.00', 'Ibnu Sabil', 125000, '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(129, 33, '1250000.00', 'Fakir', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(130, 33, '1250000.00', 'Miskin', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(131, 33, '1250000.00', 'Amil', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(132, 33, '1250000.00', 'Mualaf', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(133, 33, '1250000.00', 'Riqab', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(134, 33, '1250000.00', 'Gharim', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(135, 33, '1250000.00', 'Fisabillah', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(136, 33, '1250000.00', 'Ibnu Sabil', 1250000, '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(137, 35, '0.00', 'Fakir', 2500000, '2024-07-17 07:58:25', '2024-07-17 08:24:58'),
(138, 35, '0.00', 'Miskin', 2500000, '2024-07-17 07:58:25', '2024-07-17 08:13:19'),
(139, 35, '2500000.00', 'Amil', 2500000, '2024-07-17 07:58:25', '2024-07-17 07:58:25'),
(140, 35, '0.00', 'Mualaf', 2500000, '2024-07-17 07:58:25', '2024-07-21 18:42:01'),
(141, 35, '2500000.00', 'Riqab', 2500000, '2024-07-17 07:58:25', '2024-07-17 07:58:25'),
(142, 35, '0.00', 'Gharim', 2500000, '2024-07-17 07:58:25', '2024-07-21 18:39:11'),
(143, 35, '0.00', 'Fisabillah', 2500000, '2024-07-17 07:58:25', '2024-07-21 18:40:31'),
(144, 35, '0.00', 'Ibnu Sabil', 2500000, '2024-07-17 07:58:25', '2024-07-21 05:04:10'),
(146, 37, '76062.50', 'Miskin', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(147, 37, '76062.50', 'Amil', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(148, 37, '76062.50', 'Mualaf', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(149, 37, '76062.50', 'Riqab', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(150, 37, '76062.50', 'Gharim', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(151, 37, '76062.50', 'Fisabillah', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(152, 37, '76062.50', 'Ibnu Sabil', 76063, '2024-07-21 04:28:10', '2024-07-21 04:28:10'),
(153, 39, '0.00', 'Fakir', 312500, '2024-07-21 04:31:18', '2024-07-21 18:38:19'),
(154, 39, '312500.00', 'Miskin', 312500, '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(155, 39, '312500.00', 'Amil', 312500, '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(156, 39, '0.00', 'Mualaf', 312500, '2024-07-21 04:31:18', '2024-07-21 18:42:18'),
(157, 39, '312500.00', 'Riqab', 312500, '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(158, 39, '312500.00', 'Gharim', 312500, '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(159, 39, '312500.00', 'Fisabillah', 312500, '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(160, 39, '312500.00', 'Ibnu Sabil', 312500, '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(161, 41, '0.00', 'Fakir', 125000, '2024-07-21 04:33:23', '2024-07-21 18:38:19'),
(162, 41, '125000.00', 'Miskin', 125000, '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(163, 41, '125000.00', 'Amil', 125000, '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(164, 41, '0.00', 'Mualaf', 125000, '2024-07-21 04:33:23', '2024-07-21 18:42:18'),
(165, 41, '125000.00', 'Riqab', 125000, '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(166, 41, '125000.00', 'Gharim', 125000, '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(167, 41, '125000.00', 'Fisabillah', 125000, '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(168, 41, '125000.00', 'Ibnu Sabil', 125000, '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(169, 43, '0.00', 'Fakir', 336625, '2024-07-21 04:36:08', '2024-07-21 18:38:19'),
(170, 43, '336625.00', 'Miskin', 336625, '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(171, 43, '336625.00', 'Amil', 336625, '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(172, 43, '0.00', 'Mualaf', 336625, '2024-07-21 04:36:08', '2024-07-21 18:42:18'),
(173, 43, '336625.00', 'Riqab', 336625, '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(174, 43, '336625.00', 'Gharim', 336625, '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(175, 43, '336625.00', 'Fisabillah', 336625, '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(176, 43, '336625.00', 'Ibnu Sabil', 336625, '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(177, 45, '0.00', 'Fakir', 299750, '2024-07-21 04:37:40', '2024-07-21 18:38:19'),
(178, 45, '299750.00', 'Miskin', 299750, '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(179, 45, '299750.00', 'Amil', 299750, '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(180, 45, '0.00', 'Mualaf', 299750, '2024-07-21 04:37:40', '2024-07-21 18:42:18'),
(181, 45, '299750.00', 'Riqab', 299750, '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(182, 45, '299750.00', 'Gharim', 299750, '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(183, 45, '299750.00', 'Fisabillah', 299750, '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(184, 45, '299750.00', 'Ibnu Sabil', 299750, '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(185, 47, '250000.00', 'Fakir', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(186, 47, '250000.00', 'Miskin', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(187, 47, '250000.00', 'Amil', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(188, 47, '250000.00', 'Mualaf', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(189, 47, '250000.00', 'Riqab', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(190, 47, '250000.00', 'Gharim', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(191, 47, '250000.00', 'Fisabillah', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(192, 47, '250000.00', 'Ibnu Sabil', 250000, '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(193, 49, '2500000.00', 'Fakir', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(194, 49, '2500000.00', 'Miskin', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(195, 49, '2500000.00', 'Amil', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(196, 49, '2500000.00', 'Mualaf', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(197, 49, '2500000.00', 'Riqab', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(198, 49, '2500000.00', 'Gharim', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(199, 49, '2500000.00', 'Fisabillah', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(200, 49, '2500000.00', 'Ibnu Sabil', 2500000, '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(201, 51, '1875000.00', 'Fakir', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(202, 51, '1875000.00', 'Miskin', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(203, 51, '1875000.00', 'Amil', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(204, 51, '1875000.00', 'Mualaf', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(205, 51, '1875000.00', 'Riqab', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(206, 51, '1875000.00', 'Gharim', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(207, 51, '1875000.00', 'Fisabillah', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(208, 51, '1875000.00', 'Ibnu Sabil', 1875000, '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(210, 53, '1250000.00', 'Miskin', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06'),
(211, 53, '1250000.00', 'Amil', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06'),
(212, 53, '1250000.00', 'Mualaf', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06'),
(213, 53, '1250000.00', 'Riqab', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06'),
(214, 53, '1250000.00', 'Gharim', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06'),
(215, 53, '1250000.00', 'Fisabillah', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06'),
(216, 53, '1250000.00', 'Ibnu Sabil', 1250000, '2024-07-21 19:30:06', '2024-07-21 19:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `inmemo`
--

CREATE TABLE `inmemo` (
  `id` int NOT NULL,
  `kategoridana_id` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `uraian` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `anggaran` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tglpengajuan` date DEFAULT NULL,
  `tglpenyaluran` date DEFAULT NULL,
  `file` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cabang_id` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int NOT NULL,
  `kategoridana_id` int DEFAULT NULL,
  `jenis` enum('Debit','Kredit') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `no_ref` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nomor_akun` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_akun` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci,
  `anggaran` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `program` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cabang_id` int DEFAULT NULL,
  `ket_dana` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `kategoridana_id`, `jenis`, `tgl_transaksi`, `no_ref`, `nomor_akun`, `nama_akun`, `keterangan`, `anggaran`, `program`, `bank`, `cabang_id`, `ket_dana`, `created_at`, `updated_at`) VALUES
(1, 9, 'Kredit', '2023-04-08', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Nurul Mukmina', '1.000.000', NULL, NULL, 1, '<ul><li>Dana 125.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:09:25', '2024-07-17 06:09:25'),
(2, 9, 'Debit', '2023-04-08', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BSI (71355669304)', 'Zakat Nurul Mukmina', '1.000.000', NULL, NULL, 1, NULL, '2024-07-17 06:09:50', '2024-07-17 06:09:50'),
(3, 9, 'Kredit', '2023-04-08', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Ria Fitria Andriani', '160.000', NULL, NULL, 1, '<ul><li>Dana 20.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 20.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:10:27', '2024-07-17 06:10:27'),
(4, 9, 'Debit', '2023-04-08', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BSI (71355669304)', 'Zakat Ria Fitria Andriani', '160.000', NULL, NULL, 1, NULL, '2024-07-17 06:10:55', '2024-07-17 06:10:55'),
(5, 9, 'Kredit', '2023-04-20', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Meldi Muzada Elfa', '5.000.000', NULL, NULL, 1, '<ul><li>Dana 625.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 625.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:13:44', '2024-07-17 06:13:44'),
(6, 9, 'Debit', '2023-04-20', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BSI (71355669304)', 'Zakat Meldi Muzada Elfa', '5.000.000', NULL, NULL, 1, NULL, '2024-07-17 06:14:15', '2024-07-17 06:14:15'),
(7, 9, 'Kredit', '2023-04-21', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Nurhidayah', '1.000.000', NULL, NULL, 1, '<ul><li>Dana 125.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:20:09', '2024-07-17 06:20:09'),
(8, 9, 'Debit', '2023-04-21', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BSI (71355669304)', 'Zakat Nurhidayah', '1.000.000', NULL, NULL, 1, NULL, '2024-07-17 06:20:41', '2024-07-17 06:20:41'),
(9, 9, 'Kredit', '2023-04-10', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Penerimaan Zakat Tunai an Abdul Muthim', '6.500.000', NULL, NULL, 1, '<ul><li>Dana 812.500 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 812.500 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:21:46', '2024-07-17 06:21:46'),
(10, 9, 'Debit', '2023-04-10', NULL, '11102.01.01', 'KAS Besar Zakat', 'Penerimaan Zakat Tunai an Abdul Muthim', '6.500.000', NULL, NULL, 1, NULL, '2024-07-17 06:23:10', '2024-07-17 06:23:10'),
(11, 9, 'Kredit', '2023-10-17', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Penerimaan Zakat Tunai an Ibunda Bpk Mairijani', '10.000.000', NULL, NULL, 1, '<ul><li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:24:30', '2024-07-17 06:24:30'),
(12, 9, 'Debit', '2023-10-17', NULL, '11102.01.01', 'KAS Besar Zakat', 'Penerimaan Zakat Tunai an Ibunda Bpk Mairijani', '10.000.000', NULL, NULL, 1, NULL, '2024-07-17 06:25:12', '2024-07-17 06:25:12'),
(13, 9, 'Kredit', '2023-04-29', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Fathul Jannah', '7.500.000', NULL, NULL, 1, '<ul><li>Dana 937.500 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 937.500 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 06:26:07', '2024-07-17 06:26:28'),
(14, 9, 'Debit', '2023-04-29', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BKS (6500075587)', 'Zakat an Fathul Jannah', '7.500.000', NULL, NULL, 1, NULL, '2024-07-17 06:27:28', '2024-07-17 06:27:28'),
(15, 9, 'Kredit', '2023-06-26', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Hardiono', '2.500.000', NULL, NULL, 2, '<ul><li>Dana 312.500 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:29:55', '2024-07-17 07:29:55'),
(16, 9, 'Debit', '2023-06-26', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI 4449990009', 'Zakat an Hardiono', '2.500.000', NULL, NULL, 2, NULL, '2024-07-17 07:30:53', '2024-07-17 07:31:13'),
(17, 9, 'Kredit', '2023-04-03', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Ficky Zam Zam', '36.725.000', NULL, NULL, 2, '<ul><li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 4.590.625 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:32:11', '2024-07-17 07:32:11'),
(18, 9, 'Debit', '2023-04-03', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI 4449990009', 'Zakat an Ficky Zam Zam', '36.725.000', NULL, NULL, 2, NULL, '2024-07-17 07:32:51', '2024-07-17 07:32:51'),
(19, 9, 'Kredit', '2023-04-08', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Eka Farma Indarto Putra', '10.000.000', NULL, NULL, 2, '<ul><li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:33:40', '2024-07-17 07:33:40'),
(20, 9, 'Debit', '2023-04-08', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI 4449990009', 'Zakat an Eka Farma Indarto Putra', '10.000.000', NULL, NULL, 2, NULL, '2024-07-17 07:34:59', '2024-07-17 07:34:59'),
(21, 9, 'Kredit', '2023-04-11', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Setyawan Hestiwati', '4.000.000', NULL, NULL, 2, '<ul><li>Dana 500.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 500.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:36:04', '2024-07-17 07:36:04'),
(22, 9, 'Debit', '2023-04-11', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI 4449990009', 'Zakat an Setyawan Hestiwati', '4.000.000', NULL, NULL, 2, NULL, '2024-07-17 07:36:33', '2024-07-17 07:36:33'),
(23, 9, 'Kredit', '2023-04-13', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Rina Dirgahayu Ningsih', '3.500.000', NULL, NULL, 2, '<ul><li>Dana 437.500 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 437.500 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:37:16', '2024-07-17 07:37:16'),
(24, 9, 'Debit', '2023-04-13', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI 4449990009', 'Zakat an Rina Dirgahayu Ningsih', '3.500.000', NULL, NULL, 2, NULL, '2024-07-17 07:37:51', '2024-07-17 07:37:51'),
(25, 9, 'Kredit', '2023-04-14', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat an Ijaya', '4.500.000', NULL, NULL, 2, '<ul><li>Dana 562.500 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 562.500 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:38:23', '2024-07-17 07:38:23'),
(26, 9, 'Debit', '2023-04-14', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI 4449990009', 'Zakat an Ijaya', '4.500.000', NULL, NULL, 2, NULL, '2024-07-17 07:38:58', '2024-07-17 07:38:58'),
(27, 9, 'Kredit', '2023-04-24', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'ZAKAT ATAS NAMA SITI RAHMANIAH', '25.000.000', NULL, NULL, 4, '<ul><li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 3.125.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:45:23', '2024-07-17 07:45:23'),
(28, 9, 'Debit', '2023-04-24', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BANK MUAMALAT ZAKAT (6200777888)', 'ZAKAT ATAS NAMA SITI RAHMANIAH', '25.000.000', NULL, NULL, 4, NULL, '2024-07-17 07:47:08', '2024-07-17 07:47:08'),
(29, 9, 'Kredit', '2023-07-25', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'ZAKAT MAL ATAS NAMA H. SAIBATUL HAMDI', '6.000.000', NULL, NULL, 4, '<ul><li>Dana 750.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 750.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:48:06', '2024-07-17 07:48:06'),
(30, 9, 'Debit', '2023-07-25', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BANK MUAMALAT ZAKAT (6200777888)', 'ZAKAT MAL ATAS NAMA H. SAIBATUL HAMDI', '6.000.000', NULL, NULL, 4, NULL, '2024-07-17 07:49:30', '2024-07-17 07:49:30'),
(31, 9, 'Kredit', '2023-08-08', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'ZAKAT ATAS NAMA H. SARBAINI', '1.000.000', NULL, NULL, 4, '<ul><li>Dana 125.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:50:20', '2024-07-17 07:50:20'),
(32, 9, 'Debit', '2023-08-08', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BANK MUAMALAT ZAKAT (6200777888)', 'ZAKAT ATAS NAMA H. SARBAINI', '1.000.000', NULL, NULL, 4, NULL, '2024-07-17 07:50:55', '2024-07-17 07:50:55'),
(33, 9, 'Kredit', '2023-12-18', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan-Profesi', 'ZAKAT ATAS NAMA ARIF FAHRI', '10.000.000', NULL, NULL, 4, '<ul><li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 1.250.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:51:53', '2024-07-17 07:51:53'),
(34, 9, 'Debit', '2023-12-18', NULL, '11102.01.01', 'Kas Bank Dana Zakat-BANK MUAMALAT ZAKAT (6200777888)', 'ZAKAT ATAS NAMA ARIF FAHRI', '10.000.000', NULL, NULL, 4, NULL, '2024-07-17 07:52:26', '2024-07-17 07:52:26'),
(35, 9, 'Kredit', '2024-07-17', NULL, '1', '1', 'tes', '20.000.000', NULL, NULL, 1, '<ul><li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-17 07:58:25', '2024-07-17 07:58:25'),
(36, 9, 'Debit', '2024-07-17', NULL, '1', '1', 'tes', '20.000.000', NULL, NULL, 1, NULL, '2024-07-17 07:58:45', '2024-07-17 07:58:45'),
(39, 9, 'Kredit', '2023-04-17', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Penerimaan Zakat', '2.500.000', NULL, NULL, 5, '<ul><li>Dana 312.500 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 312.500 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:31:18', '2024-07-21 04:31:18'),
(40, 9, 'Debit', '2023-04-17', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7880012128)', 'Penerimaan Zakat', '2.500.000', NULL, NULL, 5, NULL, '2024-07-21 04:31:56', '2024-07-21 04:31:56'),
(41, 9, 'Kredit', '2023-08-30', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Transfer dari Muhammad Iqbal', '1.000.000', NULL, NULL, 5, '<ul><li>Dana 125.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 125.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:33:23', '2024-07-21 04:33:23'),
(42, 9, 'Debit', '2023-08-30', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7880012128)', 'Transfer dari Muhammad Iqbal', '1.000.000', NULL, NULL, 5, NULL, '2024-07-21 04:34:04', '2024-07-21 04:34:04'),
(43, 9, 'Kredit', '2023-03-30', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Donasi Biaya Rumah Sakit', '2.693.000', NULL, NULL, 5, '<ul><li>Dana 336.625 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 336.625 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:36:08', '2024-07-21 04:36:08'),
(44, 9, 'Debit', '2023-03-30', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7880012128)', 'Donasi Biaya Rumah Sakit', '2.693.000', NULL, NULL, 5, NULL, '2024-07-21 04:36:59', '2024-07-21 04:36:59'),
(45, 9, 'Kredit', '2023-12-08', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Setor tunai', '2.398.000', NULL, NULL, 5, '<ul><li>Dana 299.750 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 299.750 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:37:40', '2024-07-21 04:37:40'),
(46, 9, 'Debit', '2023-12-08', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7880012128)', 'Setor tunai', '2.398.000', NULL, NULL, 5, NULL, '2024-07-21 04:38:22', '2024-07-21 04:38:22'),
(47, 9, 'Kredit', '2023-02-09', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Maal Optikal Hamdi', '2.000.000', NULL, NULL, 6, '<ul><li>Dana 250.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 250.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:40:30', '2024-07-21 04:40:30'),
(48, 9, 'Debit', '2023-02-09', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7777776466)', 'Zakat Maal Optikal Hamdi', '2.000.000', NULL, NULL, 6, NULL, '2024-07-21 04:49:02', '2024-07-21 04:49:02'),
(49, 9, 'Kredit', '2023-03-31', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Maal dr.Agus Riyanto', '20.000.000', NULL, NULL, 6, '<ul><li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 2.500.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:49:43', '2024-07-21 04:49:43'),
(50, 9, 'Debit', '2023-03-31', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7777776466)', 'Zakat Maal dr.Agus Riyanto', '20.000.000', NULL, NULL, 6, NULL, '2024-07-21 04:50:17', '2024-07-21 04:50:17'),
(51, 9, 'Kredit', '2023-04-07', NULL, '41299.00.00', 'Penerimaan Zakat Perorangan Lainnya', 'Zakat Maal dr.Hamidi & dr.Dina', '15.000.000', NULL, NULL, 6, '<ul><li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Fakir</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Miskin</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Amil</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Mualaf</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Riqab</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Gharim</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Fisabillah</li>\r\n                <li>Dana 1.875.000 (12.50%) dialokasikan ke Dana Ibnu Sabil</li></ul>', '2024-07-21 04:51:10', '2024-07-21 04:51:10'),
(52, 9, 'Debit', '2023-04-07', NULL, '11102.01.01', 'Kas Bank Dana Zakat- BSI (7777776466)', 'Zakat Maal dr.Hamidi & dr.Dina', '15.000.000', NULL, NULL, 6, NULL, '2024-07-21 04:51:45', '2024-07-21 04:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_dana`
--

CREATE TABLE `kategori_dana` (
  `id` int NOT NULL,
  `nama_kategori` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_dana` enum('Fakir','Miskin','Amil','Mualaf','Riqab','Gharim','Fisabillah','Ibnu Sabil','Bagi Dana Zakat Otomatis','Debit') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_dana`
--

INSERT INTO `kategori_dana` (`id`, `nama_kategori`, `jenis_dana`, `created_at`, `updated_at`) VALUES
(1, 'Dana Fakir', 'Fakir', NULL, NULL),
(2, 'Dana Miskin', 'Miskin', NULL, NULL),
(3, 'Dana Riqab', 'Riqab', NULL, NULL),
(4, 'Dana Gharim', 'Gharim', NULL, NULL),
(5, 'Dana Muallaf', 'Mualaf', NULL, NULL),
(6, 'Dana Sabilillah', 'Fisabillah', NULL, NULL),
(7, 'Dana Ibnu Sabil', 'Ibnu Sabil', NULL, '2024-01-12 20:18:20'),
(8, 'Dana Amil', 'Amil', NULL, '2024-01-12 22:19:54'),
(9, 'Bagi Dana Zakat Otomatis', 'Bagi Dana Zakat Otomatis', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `bobot` float NOT NULL,
  `atribut` enum('benefit','cost') COLLATE utf8mb4_general_ci NOT NULL,
  `kode_kriteria` enum('C1','C2','C3','C4') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `atribut`, `kode_kriteria`, `created_at`, `updated_at`) VALUES
(2, 'Status Pekerjaan', 25, 'cost', 'C1', '2024-01-12 07:34:36', '2024-01-14 01:02:34'),
(3, 'Jumlah Penghasilan', 23, 'cost', 'C2', '2024-01-12 18:55:27', '2024-03-08 06:56:47'),
(4, 'Jumlah Tanggungan', 25, 'benefit', 'C3', '2024-01-12 18:55:35', '2024-01-14 01:03:10'),
(7, 'Status Tempat Tinggal', 27, 'cost', 'C4', '2024-01-12 19:32:19', '2024-01-14 01:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_detail`
--

CREATE TABLE `kriteria_detail` (
  `id` int NOT NULL,
  `kode_kriteria` enum('C1','C2','C3','C4') COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` enum('5','4','3','2','1') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kriteria_detail`
--

INSERT INTO `kriteria_detail` (`id`, `kode_kriteria`, `keterangan`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 'C1', 'tidak bisa bekerja', '1', '2024-03-08 02:54:30', '2024-03-07 20:32:42'),
(2, 'C1', 'pengangguran', '2', '2024-03-08 02:54:48', '2024-03-07 20:32:53'),
(3, 'C1', 'pembantu', '3', '2024-03-08 02:54:48', '2024-03-07 20:33:05'),
(4, 'C1', 'serabutan', '4', '2024-03-08 02:54:48', '2024-03-07 20:33:14'),
(5, 'C1', 'pegawai', '5', '2024-03-08 02:54:48', '2024-03-07 20:33:26'),
(6, 'C2', '< 400ribu', '1', '2024-03-08 02:56:22', '2024-03-07 20:33:39'),
(7, 'C2', '> 400 < 800ribu', '2', '2024-03-08 02:56:22', '2024-03-07 20:33:48'),
(8, 'C2', '> 800 < 1.2jt', '3', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(9, 'C2', '> 1.2jt < 1.6jt', '4', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(10, 'C2', '> 1.6jt', '5', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(11, 'C3', '> 7', '5', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(12, 'C3', '> 5 <7', '4', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(13, 'C3', '>3 <5', '3', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(14, 'C3', '>1 <4', '2', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(15, 'C3', '1 / 0', '1', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(16, 'C4', 'Menumpang dirumah ibadah', '1', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(17, 'C4', 'menumpang ditempat kerja', '2', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(18, 'C4', 'menumpang dirumah saudara', '3', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(19, 'C4', 'sewa', '4', '2024-03-08 02:56:22', '2024-03-08 02:56:22'),
(20, 'C4', 'milik sendiri', '5', '2024-03-08 02:56:22', '2024-03-08 02:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `penerima_zakat`
--

CREATE TABLE `penerima_zakat` (
  `id` int NOT NULL,
  `nama_penerima` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_general_ci,
  `jenis_zakat` enum('Fakir','Miskin','Amil','Mualaf','Riqab','Gharim','Fisabillah','Ibnu Sabil') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cabang_id` int NOT NULL,
  `program` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerima_zakat`
--

INSERT INTO `penerima_zakat` (`id`, `nama_penerima`, `alamat`, `jenis_zakat`, `created_at`, `updated_at`, `cabang_id`, `program`, `nik`, `jenis_kelamin`) VALUES
(12, 'Muhammad Wafi', 'Jl. Sutoyo S RT. 02 Kota Banjarmasin', 'Miskin', '2024-07-17 08:08:50', '2024-07-17 08:08:50', 1, 'Beasiswa Mentari', '6371051005100001', 'Laki-Laki'),
(13, 'Riki Maulana', 'Jl. Antasan Raden RT. 25 Kota Banjarmasin', 'Miskin', '2024-07-17 08:11:16', '2024-07-17 08:11:16', 1, 'Beasiswa Mentari', '6371031112090003', 'Laki-Laki'),
(14, 'Hamdani', 'Jl. AMD 1 No. 29 RT. 3 Buntok Kota Kab, BATOLA', 'Miskin', '2024-07-17 08:12:57', '2024-07-17 08:12:57', 1, 'Biaya Pengobatan', '6204062704720002', 'Laki-Laki'),
(15, 'Ernawati', 'Jl. Merak 2 No. 8 RT. 37 Komplek Keruing Indah Handil Bakti', 'Fakir', '2024-07-17 08:18:49', '2024-07-17 08:18:49', 1, 'Modal Usaha', '6371035302730010', 'Perempuan'),
(16, 'Siti Kamariah', 'Jl. Kaca piring VII Kota Banjarmasin', 'Fakir', '2024-07-17 08:21:13', '2024-07-17 08:21:13', 1, 'Jenazah Dhuafa', '6371057112690032', 'Perempuan'),
(17, 'Rasiman', 'Jl. Cempaka Raya, Wildan Sari 3 Blok IV No. 181', 'Fakir', '2024-07-17 08:23:33', '2024-07-17 08:23:33', 1, 'Biaya Pengobatan', '6371050101560010', 'Laki-Laki'),
(18, 'Toliah', 'Jl. Belakang Stadion Lambung Mangkurat Km. 5.5 RT. 2 Kota Banjarmasin', 'Fakir', '2024-07-17 08:24:40', '2024-07-17 08:24:40', 1, 'Peduli Kemanusiaan', '6472014802600001', 'Perempuan'),
(19, 'Deden Inara', 'Jl. KP. Padang Suka Asih RT. 05 Kab, Bandung', 'Ibnu Sabil', '2024-07-21 04:58:35', '2024-07-21 04:58:35', 1, 'MudikMu Aman', '3528031109730136', 'Laki-Laki'),
(20, 'Heri Istrada', 'Jl. Padat Karya RT. 13 Kel Baru Kota Waringin Barat', 'Ibnu Sabil', '2024-07-21 05:02:15', '2024-07-21 05:02:15', 1, 'MudikMu Aman', '6201020211930001', 'Laki-Laki'),
(21, 'Dede Safutra', 'Jl. Pancasila RT. 22 Arut Selatan Kotawaringin Barat', 'Ibnu Sabil', '2024-07-21 05:03:50', '2024-07-21 05:03:50', 1, 'MudikMu Aman', '6201021304960004', 'Laki-Laki'),
(22, 'Muhammad Syarief', 'Jl. Sulawesi Gg. Maluku RT. 05 Kota Banjarmasin', 'Fakir', '2024-07-21 18:15:53', '2024-07-21 18:15:53', 5, 'Beasiswa Mentari', '6371050811080001', 'Laki-Laki'),
(23, 'Nor\'Ana', 'Jl. Sungai Andai Komp. Herlina Perkasa Blok 1 No. 19 RT. 44 Kota Banjarmasin', 'Fakir', '2024-07-21 18:17:42', '2024-07-21 18:17:42', 5, 'Biaya Pengobatan', '6303074601830001', 'Perempuan'),
(24, 'Sri Wahyuni Istiajit', 'Jl. Sutoyo S Gg. Rahayu No. 7 RT. 11 Kota Banjarmasin', 'Mualaf', '2024-07-21 18:19:57', '2024-07-21 18:19:57', 5, 'Muallaf', '6308056206720001', 'Perempuan'),
(26, 'Yudi Yanto', 'Jl. Bali Gg. Bali No. 23 RT. 11 Kota Banjarmasin', 'Gharim', '2024-07-21 18:23:39', '2024-07-21 18:23:39', 1, 'Peduli Kemanusiaan', '6371040205770013', 'Laki-Laki'),
(27, 'Normansyah', 'Jl. Kelayan Kecil Gg. Seri Begawan RT. 17 Kota Banjarmasin', 'Gharim', '2024-07-21 18:25:17', '2024-07-21 18:25:17', 1, 'Biaya Pengobatan', '6371010502600009', 'Laki-Laki'),
(28, 'Muhammad Yusuf', 'Gelagah Hulu RT. 03 Sungai Tabukan Hulu Sungai Utara', 'Fisabillah', '2024-07-21 18:29:15', '2024-07-21 18:29:15', 1, 'Beasiswa Sang Surya', '6308101108010002', 'Laki-Laki'),
(29, 'Rasya Nor Islami', 'Jl Sutoyo S. Kerokan Rt. 29 Kota Banjarmasin', 'Fakir', '2024-07-21 18:31:46', '2024-07-21 18:31:46', 5, 'Beasiswa Sang Surya', '6371034708090002', 'Perempuan'),
(30, 'Ronal Abdi', 'Jl. Pangeran Samudera RT. 6 Kertak Baru Ulu Kota Banjarmasin', 'Fakir', '2024-07-21 18:33:52', '2024-07-21 18:33:52', 5, 'Biaya Pengobatan', '6308050502870001', 'Laki-Laki'),
(31, 'Michael Andreas Teja', 'Jl. Andi Bandoco Pasangkayu Kab. Mamuju Utara', 'Mualaf', '2024-07-21 18:36:14', '2024-07-21 18:36:14', 1, 'Santunan Mualaf', '7601013662380008', 'Laki-Laki'),
(32, 'Hawi Noprianu', 'Dorong RT. 01 Dorong Kab. Barito Timur Kalteng', 'Mualaf', '2024-07-21 18:37:08', '2024-07-21 18:37:08', 1, 'Santunan Mualaf', '6213011011990004', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_dana`
--

CREATE TABLE `pengaturan_dana` (
  `id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fakir` decimal(10,2) NOT NULL,
  `miskin` decimal(10,2) NOT NULL,
  `amil` decimal(10,2) NOT NULL,
  `mualaf` decimal(10,2) NOT NULL,
  `riqab` decimal(10,2) NOT NULL,
  `gharim` decimal(10,2) NOT NULL,
  `fisabillah` decimal(10,2) NOT NULL,
  `ibnu_sabil` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengaturan_dana`
--

INSERT INTO `pengaturan_dana` (`id`, `created_at`, `updated_at`, `fakir`, `miskin`, `amil`, `mualaf`, `riqab`, `gharim`, `fisabillah`, `ibnu_sabil`) VALUES
(1, '2024-01-13 07:30:51', '2024-07-17 06:07:26', '12.50', '12.50', '12.50', '12.50', '12.50', '12.50', '12.50', '12.50');

-- --------------------------------------------------------

--
-- Table structure for table `penyaluran_dana`
--

CREATE TABLE `penyaluran_dana` (
  `id` int NOT NULL,
  `tgl_perhitungan` date NOT NULL,
  `penerima_id` int NOT NULL,
  `total_dana_diterima` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_zakat` enum('Fakir','Miskin','Amil','Mualaf','Riqab','Gharim','Fisabillah','Ibnu Sabil') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `persentase` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_penyaluran` date DEFAULT NULL,
  `cash_transfer` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penyaluran_dana`
--

INSERT INTO `penyaluran_dana` (`id`, `tgl_perhitungan`, `penerima_id`, `total_dana_diterima`, `jenis_zakat`, `created_at`, `updated_at`, `persentase`, `tgl_penyaluran`, `cash_transfer`, `keterangan`) VALUES
(47, '2023-05-01', 12, '2141722', 'Miskin', '2024-07-17 08:13:19', '2024-07-21 06:16:32', '33.49%', '2023-05-01', 'Cash', 'Bantuan Program beaiswa mentari'),
(48, '2023-05-01', 13, '2141722', 'Miskin', '2024-07-17 08:13:19', '2024-07-21 06:21:37', '33.49%', '2023-05-01', 'Cash', 'Bantuan Program Beasiswa Mentari'),
(49, '2023-05-01', 14, '2111557', 'Miskin', '2024-07-17 08:13:19', '2024-07-21 06:23:32', '33.02%', '2023-05-01', 'Cash', 'Bantuan untuk biaya pengobatan'),
(50, '2023-05-01', 15, '1832962', 'Fakir', '2024-07-17 08:24:58', '2024-07-21 06:24:49', '28.66%', '2023-05-01', 'Cash', 'Bantuan untuk Umkm dan modal usaha'),
(51, '2023-05-01', 16, '1629299', 'Fakir', '2024-07-17 08:24:58', '2024-07-21 06:25:45', '25.48%', '2023-05-01', 'Cash', 'Bantuan untuk penyelenggaraan pemakaman Jenazah dari Dhuafa'),
(52, '2023-05-01', 17, '1670032', 'Fakir', '2024-07-17 08:24:58', '2024-07-21 06:26:15', '26.11%', '2023-05-01', 'Cash', 'Bantuan untuk biaya pengobatan'),
(53, '2023-05-01', 18, '1262707', 'Fakir', '2024-07-17 08:24:58', '2024-07-21 06:26:54', '19.75%', '2023-05-01', 'Cash', 'Bantuan program peduli kemanusiaan'),
(54, '2023-05-01', 19, '2487520', 'Ibnu Sabil', '2024-07-21 05:04:10', '2024-07-21 06:27:34', '38.90%', '2023-05-01', 'Cash', 'Bantuan program MudikMu Aman'),
(55, '2023-05-01', 20, '2238768', 'Ibnu Sabil', '2024-07-21 05:04:10', '2024-07-21 06:28:18', '35.01%', '2023-05-01', 'Cash', 'Bantuan Program MudikMu Aman'),
(56, '2023-05-01', 21, '1668712', 'Ibnu Sabil', '2024-07-21 05:04:10', '2024-07-21 06:28:43', '26.09%', '2023-05-01', 'Cash', 'Bantuan Program MudikMu Aman'),
(57, '2023-05-01', 22, '242661', 'Fakir', '2024-07-21 18:38:19', '2024-07-21 18:38:19', '22.60%', NULL, NULL, NULL),
(58, '2023-05-01', 23, '254727', 'Fakir', '2024-07-21 18:38:19', '2024-07-21 18:38:19', '23.72%', NULL, NULL, NULL),
(59, '2023-05-01', 29, '301650', 'Fakir', '2024-07-21 18:38:19', '2024-07-21 18:38:19', '28.09%', NULL, NULL, NULL),
(60, '2023-05-01', 30, '274837', 'Fakir', '2024-07-21 18:38:19', '2024-07-21 18:38:19', '25.59%', NULL, NULL, NULL),
(61, '2023-05-02', 26, '3607436', 'Gharim', '2024-07-21 18:39:11', '2024-07-21 18:39:11', '56.41%', NULL, NULL, NULL),
(62, '2023-05-02', 27, '2787564', 'Gharim', '2024-07-21 18:39:11', '2024-07-21 18:39:11', '43.59%', NULL, NULL, NULL),
(63, '2023-05-03', 28, '6395000', 'Fisabillah', '2024-07-21 18:40:31', '2024-07-21 18:40:31', '100.00%', NULL, NULL, NULL),
(64, '2023-05-01', 31, '3410667', 'Mualaf', '2024-07-21 18:42:01', '2024-07-21 18:42:01', '53.33%', NULL, NULL, NULL),
(65, '2023-05-01', 32, '2984333', 'Mualaf', '2024-07-21 18:42:01', '2024-07-21 18:42:01', '46.67%', NULL, NULL, NULL),
(66, '2023-05-01', 24, '1073875', 'Mualaf', '2024-07-21 18:42:18', '2024-07-21 18:42:18', '100.00%', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proses_perhitungan`
--

CREATE TABLE `proses_perhitungan` (
  `id` int NOT NULL,
  `tgl_perhitungan` date NOT NULL,
  `penerima_id` int NOT NULL,
  `kode_kriteria` enum('C1','C2','C3','C4') COLLATE utf8mb4_general_ci NOT NULL,
  `nilai` enum('5','4','3','2','1') COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proses_perhitungan`
--

INSERT INTO `proses_perhitungan` (`id`, `tgl_perhitungan`, `penerima_id`, `kode_kriteria`, `nilai`, `created_at`, `updated_at`) VALUES
(57, '2023-05-01', 12, 'C1', '4', '2024-07-17 08:08:50', '2024-07-17 08:08:50'),
(58, '2023-05-01', 12, 'C2', '5', '2024-07-17 08:08:50', '2024-07-17 08:08:50'),
(59, '2023-05-01', 12, 'C3', '4', '2024-07-17 08:08:50', '2024-07-17 08:08:50'),
(60, '2023-05-01', 12, 'C4', '4', '2024-07-17 08:08:50', '2024-07-17 08:08:50'),
(61, '2023-05-01', 13, 'C1', '4', '2024-07-17 08:11:16', '2024-07-17 08:11:16'),
(62, '2023-05-01', 13, 'C2', '5', '2024-07-17 08:11:16', '2024-07-17 08:11:16'),
(63, '2023-05-01', 13, 'C3', '3', '2024-07-17 08:11:16', '2024-07-17 08:11:16'),
(64, '2023-05-01', 13, 'C4', '3', '2024-07-17 08:11:16', '2024-07-17 08:11:16'),
(65, '2023-05-01', 14, 'C1', '4', '2024-07-17 08:12:57', '2024-07-17 08:12:57'),
(66, '2023-05-01', 14, 'C2', '4', '2024-07-17 08:12:57', '2024-07-17 08:12:57'),
(67, '2023-05-01', 14, 'C3', '3', '2024-07-17 08:12:57', '2024-07-17 08:12:57'),
(68, '2023-05-01', 14, 'C4', '4', '2024-07-17 08:12:57', '2024-07-17 08:12:57'),
(69, '2023-05-01', 15, 'C1', '2', '2024-07-17 08:18:49', '2024-07-17 08:18:49'),
(70, '2023-05-01', 15, 'C2', '1', '2024-07-17 08:18:49', '2024-07-17 08:18:49'),
(71, '2023-05-01', 15, 'C3', '3', '2024-07-17 08:18:49', '2024-07-17 08:18:49'),
(72, '2023-05-01', 15, 'C4', '4', '2024-07-17 08:18:49', '2024-07-17 08:18:49'),
(73, '2023-05-01', 16, 'C1', '2', '2024-07-17 08:21:13', '2024-07-17 08:21:13'),
(74, '2023-05-01', 16, 'C2', '1', '2024-07-17 08:21:13', '2024-07-17 08:21:13'),
(75, '2023-05-01', 16, 'C3', '1', '2024-07-17 08:21:13', '2024-07-17 08:21:13'),
(76, '2023-05-01', 16, 'C4', '3', '2024-07-17 08:21:13', '2024-07-17 08:21:13'),
(77, '2023-05-01', 17, 'C1', '2', '2024-07-17 08:23:33', '2024-07-17 08:23:33'),
(78, '2023-05-01', 17, 'C2', '1', '2024-07-17 08:23:33', '2024-07-17 08:23:33'),
(79, '2023-05-01', 17, 'C3', '2', '2024-07-17 08:23:33', '2024-07-17 08:23:33'),
(80, '2023-05-01', 17, 'C4', '4', '2024-07-17 08:23:33', '2024-07-17 08:23:33'),
(81, '2023-05-01', 18, 'C1', '4', '2024-07-17 08:24:40', '2024-07-17 08:24:40'),
(82, '2023-05-01', 18, 'C2', '3', '2024-07-17 08:24:40', '2024-07-17 08:24:40'),
(83, '2023-05-01', 18, 'C3', '3', '2024-07-17 08:24:40', '2024-07-17 08:24:40'),
(84, '2023-05-01', 18, 'C4', '4', '2024-07-17 08:24:40', '2024-07-17 08:24:40'),
(85, '2023-05-01', 19, 'C1', '4', '2024-07-21 04:58:35', '2024-07-21 04:58:35'),
(86, '2023-05-01', 19, 'C2', '3', '2024-07-21 04:58:35', '2024-07-21 04:58:35'),
(87, '2023-05-01', 19, 'C3', '3', '2024-07-21 04:58:35', '2024-07-21 04:58:35'),
(88, '2023-05-01', 19, 'C4', '3', '2024-07-21 04:58:35', '2024-07-21 04:58:35'),
(89, '2023-05-01', 20, 'C1', '4', '2024-07-21 05:02:15', '2024-07-21 05:02:15'),
(90, '2023-05-01', 20, 'C2', '5', '2024-07-21 05:02:15', '2024-07-21 05:02:15'),
(91, '2023-05-01', 20, 'C3', '3', '2024-07-21 05:02:15', '2024-07-21 05:02:15'),
(92, '2023-05-01', 20, 'C4', '3', '2024-07-21 05:02:15', '2024-07-21 05:02:15'),
(93, '2023-05-01', 21, 'C1', '4', '2024-07-21 05:03:50', '2024-07-21 05:03:50'),
(94, '2023-05-01', 21, 'C2', '5', '2024-07-21 05:03:50', '2024-07-21 05:03:50'),
(95, '2023-05-01', 21, 'C3', '1', '2024-07-21 05:03:50', '2024-07-21 05:03:50'),
(96, '2023-05-01', 21, 'C4', '4', '2024-07-21 05:03:50', '2024-07-21 05:03:50'),
(97, '2023-05-01', 22, 'C1', '4', '2024-07-21 18:15:53', '2024-07-21 18:15:53'),
(98, '2023-05-01', 22, 'C2', '3', '2024-07-21 18:15:53', '2024-07-21 18:15:53'),
(99, '2023-05-01', 22, 'C3', '2', '2024-07-21 18:15:53', '2024-07-21 18:15:53'),
(100, '2023-05-01', 22, 'C4', '5', '2024-07-21 18:15:53', '2024-07-21 18:15:53'),
(101, '2023-05-01', 23, 'C1', '4', '2024-07-21 18:17:42', '2024-07-21 18:17:42'),
(102, '2023-05-01', 23, 'C2', '3', '2024-07-21 18:17:42', '2024-07-21 18:17:42'),
(103, '2023-05-01', 23, 'C3', '2', '2024-07-21 18:17:42', '2024-07-21 18:17:42'),
(104, '2023-05-01', 23, 'C4', '4', '2024-07-21 18:17:42', '2024-07-21 18:17:42'),
(105, '2023-05-01', 24, 'C1', '3', '2024-07-21 18:19:57', '2024-07-21 18:19:57'),
(106, '2023-05-01', 24, 'C2', '3', '2024-07-21 18:19:57', '2024-07-21 18:19:57'),
(107, '2023-05-01', 24, 'C3', '3', '2024-07-21 18:19:57', '2024-07-21 18:19:57'),
(108, '2023-05-01', 24, 'C4', '5', '2024-07-21 18:19:57', '2024-07-21 18:19:57'),
(113, '2023-05-02', 26, 'C1', '2', '2024-07-21 18:23:39', '2024-07-21 18:23:39'),
(114, '2023-05-02', 26, 'C2', '1', '2024-07-21 18:23:39', '2024-07-21 18:23:39'),
(115, '2023-05-02', 26, 'C3', '2', '2024-07-21 18:23:39', '2024-07-21 18:23:39'),
(116, '2023-05-02', 26, 'C4', '5', '2024-07-21 18:23:39', '2024-07-21 18:23:39'),
(117, '2023-05-02', 27, 'C1', '4', '2024-07-21 18:25:17', '2024-07-21 18:25:17'),
(118, '2023-05-02', 27, 'C2', '3', '2024-07-21 18:25:17', '2024-07-21 18:25:17'),
(119, '2023-05-02', 27, 'C3', '3', '2024-07-21 18:25:17', '2024-07-21 18:25:17'),
(120, '2023-05-02', 27, 'C4', '5', '2024-07-21 18:25:17', '2024-07-21 18:25:17'),
(121, '2023-05-03', 28, 'C1', '4', '2024-07-21 18:29:15', '2024-07-21 18:29:15'),
(122, '2023-05-03', 28, 'C2', '2', '2024-07-21 18:29:15', '2024-07-21 18:29:15'),
(123, '2023-05-03', 28, 'C3', '1', '2024-07-21 18:29:15', '2024-07-21 18:29:15'),
(124, '2023-05-03', 28, 'C4', '4', '2024-07-21 18:29:15', '2024-07-21 18:29:15'),
(125, '2023-05-01', 29, 'C1', '3', '2024-07-21 18:31:46', '2024-07-21 18:31:46'),
(126, '2023-05-01', 29, 'C2', '3', '2024-07-21 18:31:46', '2024-07-21 18:31:46'),
(127, '2023-05-01', 29, 'C3', '3', '2024-07-21 18:31:46', '2024-07-21 18:31:46'),
(128, '2023-05-01', 29, 'C4', '4', '2024-07-21 18:31:46', '2024-07-21 18:31:46'),
(129, '2023-05-01', 30, 'C1', '4', '2024-07-21 18:33:52', '2024-07-21 18:33:52'),
(130, '2023-05-01', 30, 'C2', '3', '2024-07-21 18:33:52', '2024-07-21 18:33:52'),
(131, '2023-05-01', 30, 'C3', '2', '2024-07-21 18:33:52', '2024-07-21 18:33:52'),
(132, '2023-05-01', 30, 'C4', '3', '2024-07-21 18:33:52', '2024-07-21 18:33:52'),
(133, '2023-05-01', 31, 'C1', '1', '2024-07-21 18:36:14', '2024-07-21 18:36:14'),
(134, '2023-05-01', 31, 'C2', '1', '2024-07-21 18:36:14', '2024-07-21 18:36:14'),
(135, '2023-05-01', 31, 'C3', '2', '2024-07-21 18:36:14', '2024-07-21 18:36:14'),
(136, '2023-05-01', 31, 'C4', '4', '2024-07-21 18:36:14', '2024-07-21 18:36:14'),
(137, '2023-05-01', 32, 'C1', '1', '2024-07-21 18:37:08', '2024-07-21 18:37:08'),
(138, '2023-05-01', 32, 'C2', '1', '2024-07-21 18:37:08', '2024-07-21 18:37:08'),
(139, '2023-05-01', 32, 'C3', '1', '2024-07-21 18:37:08', '2024-07-21 18:37:08'),
(140, '2023-05-01', 32, 'C4', '4', '2024-07-21 18:37:08', '2024-07-21 18:37:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cabang_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `level`, `cabang_id`) VALUES
(3, 'Doni', 'admin@gmail.com', NULL, '$2a$12$qFzks5fkymKJupqPXKwKIubp/mklYRx0XLspaNovq7xbF/iqL9jf.', NULL, '2024-01-01 06:13:08', '2024-07-17 06:07:42', 'admin', 1),
(5, 'BJB', 'bjb@gmail.com', NULL, '$2y$10$N7Hk13V4ZEKC8LplacE7r.jOBinLp7J.Eu1URkmIgB9MVwYHxzu66', NULL, '2024-07-21 18:59:25', '2024-07-21 18:59:25', 'user', 2),
(6, 'HST', 'hst@gmail.com', NULL, '$2y$10$8Hgk69U5Cnh3Su5uuYlQnu9S9oSVxmgDO86OyUaTDot.gjR8OC85.', NULL, '2024-07-21 18:59:43', '2024-07-21 18:59:43', 'user', 4),
(7, 'BJM', 'bjm@gmail.com', NULL, '$2y$10$cbjkzap0ZT2h6YE6J6NXU.RnKg5mOcfs1fxqWhkJcJvMZFsKXKihy', NULL, '2024-07-21 19:00:11', '2024-07-21 19:00:11', 'user', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dana_zakat`
--
ALTER TABLE `dana_zakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inmemo`
--
ALTER TABLE `inmemo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_dana`
--
ALTER TABLE `kategori_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerima_zakat`
--
ALTER TABLE `penerima_zakat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_dana`
--
ALTER TABLE `pengaturan_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyaluran_dana`
--
ALTER TABLE `penyaluran_dana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proses_perhitungan`
--
ALTER TABLE `proses_perhitungan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang`
--
ALTER TABLE `cabang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dana_zakat`
--
ALTER TABLE `dana_zakat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `inmemo`
--
ALTER TABLE `inmemo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `kategori_dana`
--
ALTER TABLE `kategori_dana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kriteria_detail`
--
ALTER TABLE `kriteria_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penerima_zakat`
--
ALTER TABLE `penerima_zakat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pengaturan_dana`
--
ALTER TABLE `pengaturan_dana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penyaluran_dana`
--
ALTER TABLE `penyaluran_dana`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `proses_perhitungan`
--
ALTER TABLE `proses_perhitungan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
