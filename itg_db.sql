-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 27, 2022 at 01:15 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itg_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kwitansi`
--

CREATE TABLE `kwitansi` (
  `id` varchar(12) NOT NULL,
  `biaya` decimal(15,2) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `pencetak` varchar(50) DEFAULT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `sudah_cetak` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kwitansi`
--

INSERT INTO `kwitansi` (`id`, `biaya`, `tanggal_bayar`, `keterangan`, `id_user`, `pencetak`, `nama_pembeli`, `sudah_cetak`) VALUES
('060122015643', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 4 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122022913', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 4 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122023116', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 4 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122023350', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 4 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122023920', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 4 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122024333', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 5 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122024609', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 6 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122031841', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 7 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122050601', '82000000.00', '2022-01-06', 'Pembayaran cicilan ke 1 pembelian Perumahan Home Sweet Home unit E 5 cluster Tethys.', NULL, NULL, 'Alex Karsono', 'belum'),
('060122050713', '16666666.67', '2022-01-06', 'Pembayaran cicilan ke 1 pembelian Perumahan Home Alone unit DD 44 cluster Titania.', NULL, NULL, 'Harmadi Lee', 'belum'),
('060122101142', '25833333.33', '2022-01-06', 'Pembayaran cicilan ke 9 pembelian Perumahan Home Sweet Home unit A 1 cluster Titan.', 1, 'super admin', 'Alex Karsono', 'sudah'),
('060122101319', '25000000.00', '2022-01-06', 'Pembayaran cicilan ke 3 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122101359', '500000000.00', '2022-01-06', 'Pembayaran DP Perumahan Home Alone unit AA 11 cluster Miranda.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('060122101420', '35833333.33', '2022-01-06', 'Pembayaran cicilan ke 1 pembelian Perumahan Home Alone unit AA 11 cluster Miranda.', 9, 'Direktur Keuangan', 'Yaniar Pradityas Effendi', 'sudah'),
('060122103042', '20000000.00', '2022-01-06', 'Pembayaran kelebihan tanah', 8, 'Keuangan', 'Yaniar Pradityas Effendi', 'sudah'),
('131121120603', '500000000.00', '2021-11-13', 'Pembayaran DP 2 Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('131121120905', '300000000.00', '2021-11-13', 'Pembayaran DP 1 Unit D 12 Cluster dididi.', NULL, NULL, 'Penelope Saraswati', 'belum'),
('161121075019', '500000000.00', '2021-11-16', 'Pembayaran DP 1 Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('161121075143', '900000000.00', '2021-11-16', 'Pembayaran DP 2 Unit A 1 Cluster titan.', NULL, NULL, 'Harmadi Lee', 'belum'),
('171121010549', '900000000.00', '2021-11-17', 'Pembayaran DP 2 Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121010728', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014115', '900000000.00', '2021-11-17', 'Pembayaran DP 2 Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014122', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014554', '900000000.00', '2021-11-17', 'Pembayaran DP 2 Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014559', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014720', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 2 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014728', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 3 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121014735', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 4 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121015431', '600000000.00', '2021-11-17', 'Pembayaran DP 1 Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015441', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015444', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 2 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015449', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 3 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015453', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 4 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015457', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 5 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015501', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 6 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015505', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 7 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015509', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 8 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015513', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 9 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015518', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 10 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015522', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 11 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121015527', '12500000.00', '2021-11-17', 'Pembayaran Cicilan Ke 12 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121020218', '3300000000.00', '2021-11-17', 'Pembayaran 2 Unit B 2 Cluster Enceladus.', NULL, NULL, 'Harmadi Lee', 'belum'),
('171121020307', '2000000000.00', '2021-11-17', 'Pembayaran DP 2 Unit C 3 Cluster Mimas.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121020325', '700000000.00', '2021-11-17', 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit C 3 Cluster Mimas.', NULL, NULL, 'Alex Karsono', 'belum'),
('171121023113', '1000000000.00', '2021-11-17', 'Pembayaran DP 3 Unit AA 11 Cluster Miranda.', NULL, NULL, 'Tukiyem Park', 'belum'),
('171121060113', '1000000000.00', '2021-11-17', 'Pembayaran DP 3 Unit CC 33 Cluster Umbriel.', NULL, NULL, 'Harmadi Lee', 'belum'),
('171121124606', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Harmadi Lee', 'belum'),
('171121125732', '25833333.33', '2021-11-17', 'Pembayaran Cicilan Ke 2 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', NULL, NULL, 'Harmadi Lee', 'belum'),
('181121075327', '50000000.00', '2021-11-18', 'Pembayaran Kelebihan tanah pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121075451', '50000000.00', '2021-11-18', 'Pembayaran Kelebihan tanah pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121075516', '50000000.00', '2021-11-18', 'Pembayaran Kelebihan tanah pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121075533', '50000000.00', '2021-11-18', 'Pembayaran Kelebihan tanah pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121075555', '50000000.00', '2021-11-18', 'Pembayaran Kelebihan tanah pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121080719', '50000000.00', '2021-11-18', 'Pembayaran Kelebihan tanah pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121085052', '5000000.00', '2021-11-18', 'Pembayaran tambahan kualitas pada ID pembelian 211117014535.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121120544', '25833333.33', '2021-11-18', 'Pembayaran Cicilan Ke 5 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121120950', '25833333.33', '2021-11-18', 'Pembayaran Cicilan Ke 6 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121122139', '25833333.33', '2021-11-18', 'Pembayaran Cicilan Ke 7 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('181121122148', '25833333.33', '2021-11-18', 'Pembayaran Cicilan Ke 8 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('240122060518', '16666666.67', '2022-01-24', 'Pembayaran cicilan ke 2 pembelian Perumahan Home Alone unit DD 44 cluster Titania.', 1, 'super admin', 'Harmadi Lee', 'sudah'),
('261121011126', '600000000.00', '2021-11-26', 'Pembayaran DP  unit EE 55 cluster Oberon.', NULL, NULL, 'Harmadi Lee', 'belum'),
('261121011710', '1000000000.00', '2021-11-26', 'Pembayaran DP Perumahan Home Alone unit CC 33 cluster Umbriel.', NULL, NULL, 'Tukiyem Park', 'belum'),
('261121012917', '500000000.00', '2021-11-26', 'Pembayaran DP Perumahan Home Sweet Home unit E 5 cluster Tethys.', NULL, NULL, 'Alex Karsono', 'belum'),
('261121012957', '400000000.00', '2021-11-26', 'Pembayaran DP Perumahan Home Alone unit DD 44 cluster Titania.', NULL, NULL, 'Harmadi Lee', 'belum'),
('270122014446', '300000000.00', '2022-01-27', 'Pembayaran tambahan bangunan', NULL, NULL, 'Tukiyem Park', 'belum'),
('281121104327', '1000000000.00', '2021-11-28', 'Pembayaran DP Perumahan Home Alone unit BB 22 cluster Ariel.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('301121100425', '200000000.00', '2021-11-30', 'Pembayaran DP Perumahan Rumah Rumah unit D 12 cluster Dididi.', NULL, NULL, 'Alex Karsono', 'belum'),
('301121100734', '900000000.00', '2021-11-30', 'Pembayaran 1 unit D 12 cluster Dididi.', NULL, NULL, 'Alex Karsono', 'belum'),
('301121100957', '200000000.00', '2021-11-30', 'Pembayaran 2 unit D 4 cluster Dione.', NULL, NULL, 'Yaniar Pradityas Effendi', 'belum'),
('301121101146', '2200000000.00', '2021-11-30', 'Pembayaran Perumahan Home Sweet Home unit D 4 cluster Dione.', 7, 'Direktur Utama', 'Yaniar Pradityas Effendi', 'sudah');

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(25) NOT NULL,
  `banyaknya_cicilan` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id`, `nama_metode`, `banyaknya_cicilan`) VALUES
(1, 'Cash keras', 0),
(2, 'Cash', 1),
(3, 'Cicilan 10 Tahun', 120),
(5, 'Cicilan 1 Tahun', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_kwitansi` varchar(12) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pembelian` varchar(12) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `biaya` decimal(15,2) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `jenis` int(6) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `blokir` enum('buka','blokir','lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `id_kwitansi`, `id_user`, `id_pembelian`, `nama_pembeli`, `biaya`, `tanggal_bayar`, `tanggal_jatuh_tempo`, `jenis`, `keterangan`, `blokir`) VALUES
(1, '131121120603', 1, '211113120846', 'Penelope Saraswati', '300000000.00', '2021-11-13', '2021-11-13', 0, 'Pembayaran DP 1 Unit D 12 Cluster dididi.', 'lunas'),
(2, NULL, NULL, '211113120846', 'Penelope Saraswati', '5000000.00', NULL, '2021-12-13', 1, NULL, 'blokir'),
(4, '161121075143', 1, '211116075127', 'Harmadi Lee', '900000000.00', '2021-11-16', '2021-11-16', 0, 'Pembayaran DP 2 Unit A 1 Cluster titan.', 'lunas'),
(5, '171121124606', 1, '211116075127', 'Harmadi Lee', '25833333.33', '2021-11-17', '2021-12-16', 1, 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(6, '171121125732', 1, '211116075127', 'Harmadi Lee', '25833333.33', '2021-11-17', '2022-01-16', 2, 'Pembayaran Cicilan Ke 2 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(7, '171121010549', 1, '211117010525', 'Alex Karsono', '900000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 2 Unit A 1 Cluster titan.', 'lunas'),
(8, '171121010728', 1, '211117010525', 'Alex Karsono', '25833333.33', '2021-11-17', '2021-12-17', 1, 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(9, '171121014115', 1, '211117011137', 'Alex Karsono', '900000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 2 Unit A 1 Cluster titan.', 'lunas'),
(10, '171121014122', 1, '211117011137', 'Alex Karsono', '25833333.33', '2021-11-17', '2021-12-17', 1, 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(11, '171121014554', 1, '211117014535', 'Alex Karsono', '900000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 2 Unit A 1 Cluster titan.', 'lunas'),
(12, '171121014559', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-17', '2021-12-17', 1, 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(13, '171121014720', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-17', '2022-01-17', 2, 'Pembayaran Cicilan Ke 2 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(14, '171121014728', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-17', '2022-02-17', 3, 'Pembayaran Cicilan Ke 3 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(15, '171121014735', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-17', '2022-03-17', 4, 'Pembayaran Cicilan Ke 4 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster titan.', 'lunas'),
(16, '181121120544', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-18', '2022-04-17', 5, 'Pembayaran Cicilan Ke 5 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', 'lunas'),
(17, '171121015431', 1, '211117015404', 'Tukiyem Park', '600000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 1 Unit C 11 Cluster dododo.', 'lunas'),
(18, '171121015441', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2021-12-17', 1, 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(19, '171121015444', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-01-17', 2, 'Pembayaran Cicilan Ke 2 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(20, '171121015449', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-02-17', 3, 'Pembayaran Cicilan Ke 3 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(21, '171121015453', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-03-17', 4, 'Pembayaran Cicilan Ke 4 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(22, '171121015457', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-04-17', 5, 'Pembayaran Cicilan Ke 5 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(23, '171121015501', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-05-17', 6, 'Pembayaran Cicilan Ke 6 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(24, '171121015505', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-06-17', 7, 'Pembayaran Cicilan Ke 7 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(25, '171121015509', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-07-17', 8, 'Pembayaran Cicilan Ke 8 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(26, '171121015513', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-08-17', 9, 'Pembayaran Cicilan Ke 9 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(27, '171121015518', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-09-17', 10, 'Pembayaran Cicilan Ke 10 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(28, '171121015522', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-10-17', 11, 'Pembayaran Cicilan Ke 11 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(29, '171121015527', 1, '211117015404', 'Tukiyem Park', '12500000.00', '2021-11-17', '2022-11-17', 12, 'Pembayaran Cicilan Ke 12 Pembelian Perumahan Rumah Rumah Unit C 11 Cluster dododo.', 'lunas'),
(30, '171121020218', 1, '211117020205', 'Harmadi Lee', '3300000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran 2 Unit B 2 Cluster Enceladus.', 'lunas'),
(31, '171121020307', 1, '211117020246', 'Alex Karsono', '2000000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 2 Unit C 3 Cluster Mimas.', 'lunas'),
(32, '171121020325', 1, '211117020246', 'Alex Karsono', '700000000.00', '2021-11-17', '2021-12-17', 1, 'Pembayaran Cicilan Ke 1 Pembelian Perumahan Home Sweet Home Unit C 3 Cluster Mimas.', 'lunas'),
(33, '171121023113', 1, '211117023053', 'Tukiyem Park', '1000000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 3 Unit AA 11 Cluster Miranda.', 'lunas'),
(34, NULL, NULL, '211117023053', 'Tukiyem Park', '166666666.67', NULL, '2021-12-17', 1, NULL, 'blokir'),
(35, '171121060113', 1, '211117060045', 'Harmadi Lee', '1000000000.00', '2021-11-17', '2021-11-17', 0, 'Pembayaran DP 3 Unit CC 33 Cluster Umbriel.', 'lunas'),
(36, NULL, NULL, '211117060045', 'Harmadi Lee', '1000000000.00', NULL, '2021-12-17', 1, NULL, 'blokir'),
(37, '181121120950', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-18', '2022-05-17', 6, 'Pembayaran Cicilan Ke 6 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', 'lunas'),
(38, '181121122139', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-18', '2022-06-17', 7, 'Pembayaran Cicilan Ke 7 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', 'lunas'),
(39, '181121122148', 1, '211117014535', 'Alex Karsono', '25833333.33', '2021-11-18', '2022-07-17', 8, 'Pembayaran Cicilan Ke 8 Pembelian Perumahan Home Sweet Home Unit A 1 Cluster Titan.', 'lunas'),
(40, '060122101142', 1, '211117014535', 'Alex Karsono', '25833333.33', '2022-01-06', '2022-08-17', 9, 'Pembayaran cicilan ke 9 pembelian Perumahan Home Sweet Home unit A 1 cluster Titan.', 'lunas'),
(41, '261121011126', 1, '211126011055', 'Harmadi Lee', '600000000.00', '2021-11-26', '2021-11-26', 0, 'Pembayaran DP  unit EE 55 cluster Oberon.', 'lunas'),
(42, NULL, NULL, '211126011055', 'Harmadi Lee', '38333333.33', NULL, '2021-12-26', 1, NULL, 'blokir'),
(43, '261121011710', 1, '211126011638', 'Tukiyem Park', '1000000000.00', '2021-11-26', '2021-11-26', 0, 'Pembayaran DP Perumahan Home Alone unit CC 33 cluster Umbriel.', 'lunas'),
(44, NULL, NULL, '211126011638', 'Tukiyem Park', '18333333.33', NULL, '2021-12-26', 1, NULL, 'blokir'),
(45, '261121012917', 1, '211126012840', 'Alex Karsono', '500000000.00', '2021-11-26', '2021-11-26', 0, 'Pembayaran DP Perumahan Home Sweet Home unit E 5 cluster Tethys.', 'lunas'),
(46, '060122050601', 1, '211126012840', 'Alex Karsono', '82000000.00', '2022-01-06', '2021-12-26', 1, 'Pembayaran cicilan ke 1 pembelian Perumahan Home Sweet Home unit E 5 cluster Tethys.', 'lunas'),
(47, '261121012957', 1, '211126012929', 'Harmadi Lee', '400000000.00', '2021-11-26', '2021-11-26', 0, 'Pembayaran DP Perumahan Home Alone unit DD 44 cluster Titania.', 'lunas'),
(48, '060122050713', 1, '211126012929', 'Harmadi Lee', '16666666.67', '2022-01-06', '2021-12-26', 1, 'Pembayaran cicilan ke 1 pembelian Perumahan Home Alone unit DD 44 cluster Titania.', 'lunas'),
(49, '281121104327', 1, '211128104300', 'Yaniar Pradityas Effendi', '1000000000.00', '2021-11-28', '2021-11-28', 0, 'Pembayaran DP Perumahan Home Alone unit BB 22 cluster Ariel.', 'lunas'),
(50, NULL, NULL, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', NULL, '2021-10-27', 1, NULL, 'blokir'),
(65, NULL, NULL, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', NULL, '2021-11-27', 2, NULL, 'blokir'),
(66, '060122101319', 1, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', '2022-01-06', '2021-12-27', 3, 'Pembayaran cicilan ke 3 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', 'lunas'),
(67, '301121100425', 1, '211130100330', 'Alex Karsono', '200000000.00', '2021-11-30', '2021-11-30', 0, 'Pembayaran DP Perumahan Rumah Rumah unit D 12 cluster Dididi.', 'lunas'),
(69, '301121100734', 1, '211130100715', 'Alex Karsono', '900000000.00', '2021-11-30', '2021-11-30', 0, 'Pembayaran 1 unit D 12 cluster Dididi.', 'lunas'),
(71, '301121101146', 1, '211130101119', 'Yaniar Pradityas Effendi', '2200000000.00', '2021-11-30', '2021-11-30', 0, 'Pembayaran Perumahan Home Sweet Home unit D 4 cluster Dione.', 'lunas'),
(72, '060122023920', 1, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', '2022-01-06', '2022-01-27', 4, 'Pembayaran cicilan ke 4 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', 'lunas'),
(73, '060122024333', 1, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', '2022-01-06', '2022-02-27', 5, 'Pembayaran cicilan ke 5 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', 'lunas'),
(74, '060122024609', 1, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', '2022-01-06', '2022-03-27', 6, 'Pembayaran cicilan ke 6 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', 'lunas'),
(75, '060122031841', 1, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', '2022-01-06', '2022-04-27', 7, 'Pembayaran cicilan ke 7 pembelian Perumahan Home Alone unit BB 22 cluster Ariel.', 'lunas'),
(77, '240122060518', 1, '211126012929', 'Harmadi Lee', '16666666.67', '2022-01-24', '2022-01-26', 2, 'Pembayaran cicilan ke 2 pembelian Perumahan Home Alone unit DD 44 cluster Titania.', 'lunas'),
(78, NULL, NULL, '211126012840', 'Alex Karsono', '82000000.00', NULL, '2022-01-26', 2, NULL, 'blokir'),
(79, NULL, NULL, '211126011638', 'Tukiyem Park', '18333333.33', NULL, '2022-01-26', 2, NULL, 'blokir'),
(80, NULL, NULL, '211126011055', 'Harmadi Lee', '38333333.33', NULL, '2022-01-26', 2, NULL, 'blokir'),
(97, NULL, NULL, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', NULL, '2022-05-27', 8, NULL, 'buka'),
(98, NULL, NULL, '211117014535', 'Alex Karsono', '25833333.33', NULL, '2022-09-17', 10, NULL, 'buka'),
(99, NULL, NULL, '211128104300', 'Yaniar Pradityas Effendi', '25000000.00', NULL, '2022-01-27', 4, NULL, 'buka'),
(100, '060122101359', 1, '220106101334', 'Yaniar Pradityas Effendi', '500000000.00', '2022-01-06', '2022-01-06', 0, 'Pembayaran DP Perumahan Home Alone unit AA 11 cluster Miranda.', 'lunas'),
(101, '060122101420', 1, '220106101334', 'Yaniar Pradityas Effendi', '35833333.33', '2022-01-06', '2022-02-06', 1, 'Pembayaran cicilan ke 1 pembelian Perumahan Home Alone unit AA 11 cluster Miranda.', 'lunas'),
(102, NULL, NULL, '220106101334', 'Yaniar Pradityas Effendi', '35833333.33', NULL, '2022-03-06', 2, NULL, 'buka'),
(103, NULL, NULL, '211126012929', 'Harmadi Lee', '16666666.67', NULL, '2022-02-26', 3, NULL, 'buka'),
(104, NULL, NULL, '211126011055', 'Harmadi Lee', '38333333.33', NULL, '2022-02-26', 3, NULL, 'buka'),
(105, NULL, NULL, '211126011638', 'Tukiyem Park', '18333333.33', NULL, '2022-02-26', 3, NULL, 'buka'),
(106, NULL, NULL, '211126012840', 'Alex Karsono', '82000000.00', NULL, '2022-02-26', 3, NULL, 'buka');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tambahan`
--

CREATE TABLE `pembayaran_tambahan` (
  `id` int(11) NOT NULL,
  `id_kwitansi` varchar(12) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pembelian` varchar(12) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `biaya` decimal(15,2) NOT NULL,
  `tanggal_bayar` date DEFAULT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran_tambahan`
--

INSERT INTO `pembayaran_tambahan` (`id`, `id_kwitansi`, `id_user`, `id_pembelian`, `nama_pembeli`, `biaya`, `tanggal_bayar`, `tanggal_jatuh_tempo`, `keterangan`, `jenis_pembayaran`) VALUES
(4, '181121080719', 1, '211117014535', 'Alex Karsono', '50000000.00', '2021-11-18', '2022-11-18', 'Pembayaran kelebihan tanah pada ID pembelian 211117014535.', 'Kelebihan tanah'),
(5, NULL, NULL, '211113120846', 'Penelope Saraswati', '50000000.00', NULL, '2022-11-13', 'Pembayaran tambahan bangunan pada ID pembelian 211113120846.', 'Tambahan bangunan'),
(8, '181121085052', 1, '211117014535', 'Alex Karsono', '5000000.00', '2021-11-18', '2021-12-18', 'Pembayaran tambahan kualitas pada ID pembelian 211117014535.', 'Tambahan kualitas'),
(9, NULL, NULL, '220106101334', 'Yaniar Pradityas Effendi', '200000.00', NULL, '2022-01-06', 'Pembayaran kelebihan tanah', 'Kelebihan tanah'),
(10, NULL, NULL, '220106101334', 'Yaniar Pradityas Effendi', '200000.00', NULL, '2022-01-30', 'Pembayaran kelebihan tanah', 'Kelebihan tanah'),
(11, '060122103042', 1, '220106101334', 'Yaniar Pradityas Effendi', '20000000.00', '2022-01-06', '2022-01-30', 'Pembayaran kelebihan tanah', 'Kelebihan tanah'),
(12, '270122014446', 1, '211126011638', 'Tukiyem Park', '300000000.00', '2022-01-27', '2022-01-31', 'Pembayaran tambahan bangunan', 'Tambahan bangunan');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id`, `nama_pembeli`, `NIK`, `alamat`, `telepon`, `ttl`, `status_perkawinan`, `pekerjaan`) VALUES
(1, 'Tukiyem Park', '1234567890123456', 'Rumah, Jawa Timur', '081234567890', 'Rumah, 20 May 1950', 'Kawin', 'Trader'),
(2, 'Penelope Saraswati', '1234567890098765', 'Country Road, Jawa Tengah', '081987654321', 'Rumah, 16 Apr 1940', 'Belum Kawin', 'Fashion Designer'),
(3, 'Harmadi Lee', '3525103525103525', 'Perumahan Rumah A 1\r\nRT 10 RW 01\r\nKel. Kelurahan\r\nKec. Kecamatan\r\nKota', '080808080808', 'Kota, 28 Sep 1990', 'Belum Kawin', 'Aktuaris'),
(4, 'Alex Karsono', '3737474757576767', '5222 Stonegate Road\r\nDallas, Texas\r\nUSA', '19721234567', 'Dallas, 20 Dec 1997', 'Belum Kawin', 'Wiraswasta'),
(5, 'Yaniar Pradityas Effendi', '3525105901000001', 'Gresik', '081212121212', 'Gresik, 19 Jan 2000', 'Belum Kawin', 'Software Developer');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(12) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `DP` decimal(15,2) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `status_pembelian` enum('berjalan','dibatalkan','selesai') NOT NULL,
  `harga_beli` decimal(15,2) NOT NULL,
  `cicilan_perbulan` decimal(15,2) NOT NULL,
  `uang_masuk` decimal(15,2) DEFAULT NULL,
  `uang_lainnya` decimal(15,2) DEFAULT NULL,
  `counter` int(11) DEFAULT 0,
  `tunggakan` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_unit`, `id_pembeli`, `DP`, `id_metode`, `tanggal_beli`, `status_pembelian`, `harga_beli`, `cicilan_perbulan`, `uang_masuk`, `uang_lainnya`, `counter`, `tunggakan`) VALUES
('211113120846', 2, 2, '300000000.00', 3, '2021-11-13', 'dibatalkan', '900000000.00', '5000000.00', '300000000.00', '0.00', 0, 0),
('211117014535', 3, 4, '900000000.00', 3, '2021-11-17', 'berjalan', '4000000000.00', '25833333.33', '1132499999.97', '55000000.00', 0, 0),
('211117015404', 1, 1, '600000000.00', 5, '2021-11-17', 'selesai', '750000000.00', '12500000.00', '750000000.00', '0.00', 0, 0),
('211117020205', 4, 3, '3300000000.00', 1, '2021-11-17', 'selesai', '3300000000.00', '0.00', '3300000000.00', '0.00', 0, 0),
('211117020246', 5, 4, '2000000000.00', 2, '2021-11-17', 'selesai', '2700000000.00', '700000000.00', '2700000000.00', '0.00', 0, 0),
('211117023053', 8, 1, '1000000000.00', 5, '2021-11-17', 'dibatalkan', '3000000000.00', '166666666.67', '1000000000.00', '0.00', 0, 0),
('211117060045', 10, 3, '1000000000.00', 2, '2021-11-17', 'dibatalkan', '2000000000.00', '1000000000.00', '1000000000.00', '0.00', 0, 0),
('211126011055', 12, 3, '600000000.00', 5, '2021-11-26', 'berjalan', '1000000000.00', '38333333.33', '600000000.00', '0.00', -2, 2),
('211126011638', 10, 1, '1000000000.00', 3, '2021-11-26', 'berjalan', '2000000000.00', '18333333.33', '1000000000.00', '300000000.00', -2, 2),
('211126012840', 7, 4, '500000000.00', 5, '2021-11-26', 'berjalan', '1400000000.00', '82000000.00', '582000000.00', '0.00', -1, 1),
('211126012929', 11, 3, '400000000.00', 3, '2021-11-26', 'berjalan', '1500000000.00', '16666666.67', '433333333.34', '0.00', 0, 0),
('211128104300', 9, 5, '1000000000.00', 3, '2021-11-28', 'berjalan', '2500000000.00', '25000000.00', '1225000000.00', '0.00', -2, 2),
('211130100330', 2, 4, '200000000.00', 3, '2021-11-30', 'dibatalkan', '1440000000.00', '10333333.33', '200000000.00', '0.00', 0, 0),
('211130100715', 2, 4, '900000000.00', 1, '2021-11-30', 'selesai', '900000000.00', '0.00', '900000000.00', '0.00', 0, 0),
('211130101119', 6, 5, '2200000000.00', 1, '2021-11-30', 'selesai', '2200000000.00', '0.00', '2200000000.00', '0.00', 0, 0),
('220106101334', 8, 5, '500000000.00', 3, '2022-01-06', 'berjalan', '4800000000.00', '35833333.33', '535833333.33', '20000000.00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `perumahan`
--

CREATE TABLE `perumahan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `perumahan`
--

INSERT INTO `perumahan` (`id`, `nama`, `jumlah_unit`, `lokasi`) VALUES
(1, 'Perumahan Rumah Rumah', 23, 'Surabaya'),
(2, 'Perumahan Home Sweet Home', 10, 'Saturnus'),
(3, 'Perumahan Home Alone', 5, 'Uranus');

-- --------------------------------------------------------

--
-- Table structure for table `refresh`
--

CREATE TABLE `refresh` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refresh`
--

INSERT INTO `refresh` (`id`, `tanggal`) VALUES
(1, '2022-01-27');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `id_perumahan` int(11) NOT NULL,
  `cluster` varchar(50) NOT NULL,
  `blok` varchar(50) NOT NULL,
  `tipe_rumah` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `tingkat_rumah` int(11) NOT NULL,
  `BEP` decimal(15,2) DEFAULT NULL,
  `harga_jual` decimal(15,2) DEFAULT NULL,
  `status` enum('terjual','tersedia') NOT NULL DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `id_perumahan`, `cluster`, `blok`, `tipe_rumah`, `luas_tanah`, `tingkat_rumah`, `BEP`, `harga_jual`, `status`) VALUES
(1, 1, 'Dododo', 'C 11', 80, 100, 1, '600000000.00', '750000000.00', 'terjual'),
(2, 1, 'Dididi', 'D 12', 90, 110, 1, '800000000.00', '900000000.00', 'terjual'),
(3, 2, 'Titan', 'A 1', 150, 133, 2, '3000000000.00', '4000000000.00', 'terjual'),
(4, 2, 'Enceladus', 'B 2', 140, 100, 2, '2500000000.00', '3300000000.00', 'terjual'),
(5, 2, 'Mimas', 'C 3', 130, 90, 2, '2000000000.00', '2700000000.00', 'terjual'),
(6, 2, 'Dione', 'D 4', 120, 90, 2, '1400000000.00', '2200000000.00', 'terjual'),
(7, 2, 'Tethys', 'E 5', 110, 80, 2, '900000000.00', '1400000000.00', 'terjual'),
(8, 3, 'Miranda', 'AA 11', 140, 120, 2, '2500000000.00', '3000000000.00', 'terjual'),
(9, 3, 'Ariel', 'BB 22', 130, 110, 2, '2000000000.00', '2500000000.00', 'terjual'),
(10, 3, 'Umbriel', 'CC 33', 120, 100, 2, '1500000000.00', '2000000000.00', 'terjual'),
(11, 3, 'Titania', 'DD 44', 110, 90, 2, '1000000000.00', '1500000000.00', 'terjual'),
(12, 3, 'Oberon', 'EE 55', 100, 80, 2, '500000000.00', '1000000000.00', 'terjual');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('supaa','marketing','dirut','dirut_keuangan','kasir','penagihan','keuangan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `role`) VALUES
(1, 'supaa', 'super admin', '7e438329bbab72f8dc948fbdae0893ad89959b30', 'supaa'),
(3, 'kasir', 'Kasir lah', '8691e4fc53b99da544ce86e22acba62d13352eff', 'kasir'),
(4, 'marketing', 'Test Marketing', 'a286075043d42dcdce8d6668944e827f7a64024f', 'marketing'),
(6, 'penagihan', 'Penagihan', '8ae8158b84af0d45882065e1bf51ecf200ee8c78', 'penagihan'),
(7, 'dirut', 'Direktur Utama', 'b03178f6dd2135699143b4bddb0e37f8c5e1d4a9', 'dirut'),
(8, 'keuangan', 'Keuangan', '1f931595786f2f178358d0af5fe4d75eaee46819', 'keuangan'),
(9, 'dirutk', 'Direktur Keuangan', 'b8f918530fb0852d2a015f5cf072909ad7e00f0b', 'dirut_keuangan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kwitansi`
--
ALTER TABLE `kwitansi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran_tambahan`
--
ALTER TABLE `pembayaran_tambahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perumahan`
--
ALTER TABLE `perumahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refresh`
--
ALTER TABLE `refresh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `pembayaran_tambahan`
--
ALTER TABLE `pembayaran_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
