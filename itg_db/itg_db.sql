-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Sep 23, 2021 at 06:03 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

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
  `id` int(11) NOT NULL,
  `biaya` decimal(15,2) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` text NOT NULL,
  `pencetak` varchar(50) DEFAULT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `sudah_cetak` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

CREATE TABLE `metode` (
  `id` int(11) NOT NULL,
  `nama_metode` varchar(25) NOT NULL,
  `banyaknya_cicilan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_kwitansi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `biaya` decimal(15,2) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `blokir` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tambahan`
--

CREATE TABLE `pembayaran_tambahan` (
  `id` int(11) NOT NULL,
  `id_kwitansi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `biaya` decimal(15,2) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `jenis_pembayaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `NIK` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `ttl` date NOT NULL,
  `status_perkawinan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `DP` decimal(15,2) NOT NULL,
  `id_metode` int(11) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `status_pembelian` int(2) NOT NULL,
  `harga_beli` decimal(15,2) NOT NULL,
  `cicilan_perbulan` decimal(15,2) NOT NULL,
  `uang_masuk` decimal(15,2) DEFAULT NULL,
  `uang_lainnya` decimal(15,2) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `tunggakan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `id_perumahan` int(11) DEFAULT NULL,
  `cluster` varchar(50) NOT NULL,
  `blok` varchar(50) NOT NULL,
  `tipe_rumah` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `tingkat_rumah` int(11) NOT NULL,
  `BEP` decimal(15,2) DEFAULT NULL,
  `harga_jual` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('supaa','marketing','dirut','dirut_keuangan','kasir','penagihan','keuangan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `nama`, `password`, `role`) VALUES
(1, 'supaa', 'super admin', '7e438329bbab72f8dc948fbdae0893ad89959b30', 'supaa');

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
-- AUTO_INCREMENT for table `kwitansi`
--
ALTER TABLE `kwitansi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran_tambahan`
--
ALTER TABLE `pembayaran_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
