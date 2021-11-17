-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 16, 2021 at 07:50 AM
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
('131121120603', '500000000.00', '2021-11-13', 'Pembayaran DP 2 Unit A 1 Cluster titan.', NULL, NULL, 'Alex Karsono', 'belum'),
('131121120905', '300000000.00', '2021-11-13', 'Pembayaran DP 1 Unit D 12 Cluster dididi.', NULL, NULL, 'Penelope Saraswati', 'belum');

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
(3, 'Cicilan 10 Tahun', 120);

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
(1, '131121120603', 1, '211113120846', 'Penelope Saraswati', '300000000.00', '2021-11-13', '2021-12-13', 0, 'Pembayaran DP 1 Unit D 12 Cluster dididi.', 'lunas'),
(2, NULL, NULL, '211113120846', 'Penelope Saraswati', '5000000.00', NULL, '2021-12-13', 1, NULL, 'buka');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_tambahan`
--

CREATE TABLE `pembayaran_tambahan` (
  `id` int(11) NOT NULL,
  `id_kwitansi` varchar(12) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pembelian` varchar(12) NOT NULL,
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
(2, 'Penelope Saraswati', '1234567890098765', 'Home Sweet Home, Jawa Tengah', '081987654321', 'Rumah, 16 Apr 1940', 'Belum Kawin', 'Fashion Designer'),
(3, 'Harmadi Lee', '3525103525103525', 'Perumahan Rumah A 1\r\nRT 10 RW 01\r\nKel. Kelurahan\r\nKec. Kecamatan\r\nKota', '080808080808', 'Kota, 28 Sep 1990', 'Belum Kawin', 'Aktuaris'),
(4, 'Alex Karsono', '3737474757576767', '5222 Stonegate Road\r\nDallas, Texas\r\nUSA', '19721234567', 'Dallas, 20 Dec 1997', 'Belum Kawin', 'Wiraswasta');

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
('211113120846', 2, 2, '300000000.00', 3, '2021-11-13', 'berjalan', '900000000.00', '5000000.00', '300000000.00', '0.00', 0, 0);

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
(2, 'Perumahan Home Sweet Home', 10, 'Saturnus');

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
(1, 1, 'dododo', 'C 11', 80, 100, 1, '600000000.00', '750000000.00', 'tersedia'),
(2, 1, 'dididi', 'D 12', 90, 110, 1, '800000000.00', '900000000.00', 'terjual'),
(3, 2, 'titan', 'A 1', 150, 133, 2, '3000000000.00', '4000000000.00', 'tersedia');

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
(3, 'kasir', 'Kasir lah', 'af6b6d1a528cd180d2f92ff34cfdbf71ba32e038', 'kasir'),
(4, 'marketing', 'Test Marketing', '80049f53b4717d350cc62f129a689d2e9f84a754', 'marketing');

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
-- AUTO_INCREMENT for table `metode`
--
ALTER TABLE `metode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran_tambahan`
--
ALTER TABLE `pembayaran_tambahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perumahan`
--
ALTER TABLE `perumahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
