-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2016 at 10:10 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta_rofiqs`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `kode` char(50) NOT NULL,
  `id_supplier` char(50) NOT NULL,
  `nama` char(255) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `biaya_simpan` int(11) NOT NULL,
  `biaya_pesan` int(11) NOT NULL,
  `lead_time` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode`, `id_supplier`, `nama`, `tanggal_terima`, `jumlah`, `harga_beli`, `harga_jual`, `biaya_simpan`, `biaya_pesan`, `lead_time`) VALUES
('fddf', 'A1', 'dfgdfg', '2015-11-01', 34443, 45454, 433435, 5454, 45454, '353453');

-- --------------------------------------------------------

--
-- Table structure for table `barang_habis_pakai`
--

CREATE TABLE IF NOT EXISTS `barang_habis_pakai` (
  `id` int(11) NOT NULL,
  `id_barang` char(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_habis_pakai`
--

INSERT INTO `barang_habis_pakai` (`id`, `id_barang`, `tanggal`) VALUES
(1, 'fddf', '2015-12-07'),
(2, 'fddf', '2016-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `barang_order`
--

CREATE TABLE IF NOT EXISTS `barang_order` (
  `id` int(11) NOT NULL,
  `id_barang` char(50) NOT NULL,
  `id_supplier` char(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_order` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_order`
--

INSERT INTO `barang_order` (`id`, `id_barang`, `id_supplier`, `jumlah`, `tgl_order`) VALUES
(2, 'fddf', 'A1', 2000, '2016-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `eoq`
--

CREATE TABLE IF NOT EXISTS `eoq` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` char(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `biaya_pesan` int(11) NOT NULL,
  `biaya_simpan` int(11) NOT NULL,
  `biaya_simpan_perunit` int(11) NOT NULL,
  `permintaan` int(11) NOT NULL,
  `eoq` char(255) NOT NULL,
  `lead_time` char(50) NOT NULL,
  `periode` int(11) NOT NULL,
  `rop` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eoq`
--

INSERT INTO `eoq` (`id`, `tanggal`, `id_barang`, `harga_beli`, `biaya_pesan`, `biaya_simpan`, `biaya_simpan_perunit`, `permintaan`, `eoq`, `lead_time`, `periode`, `rop`) VALUES
(1, '2015-12-17', 'fddf', 0, 435435, 5345345, 0, 12, '1.3982325811640897', '564645', 4564, '5645646'),
(2, '2015-12-18', 'fddf', 20, 50, 50, 1000, 50, '0.07071067811865475', '5', 5, '50');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kendaraan`
--

CREATE TABLE IF NOT EXISTS `jenis_kendaraan` (
  `id` int(11) NOT NULL,
  `nama` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kendaraan`
--

INSERT INTO `jenis_kendaraan` (`id`, `nama`) VALUES
(1, 'motor');

-- --------------------------------------------------------

--
-- Table structure for table `mekanik`
--

CREATE TABLE IF NOT EXISTS `mekanik` (
  `id` int(11) NOT NULL,
  `nama` char(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mekanik`
--

INSERT INTO `mekanik` (`id`, `nama`) VALUES
(2, 'testx');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` varchar(10) NOT NULL,
  `nama` char(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kendaraan` int(11) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `alamat`, `jenis_kendaraan`, `tahun`) VALUES
('A1', 'sdfsdf', 'panam', 1, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` char(50) NOT NULL,
  `nama` char(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` char(100) NOT NULL,
  `kota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `alamat`, `telp`, `kota`) VALUES
('A1', 'rendi', 'panam', '876876', 'pku');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_service`
--

CREATE TABLE IF NOT EXISTS `transaksi_service` (
  `id` int(11) NOT NULL,
  `id_mekanik` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_barang` char(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_service`
--

INSERT INTO `transaksi_service` (`id`, `id_mekanik`, `id_pelanggan`, `tanggal`, `id_barang`, `jumlah`, `harga`, `total`) VALUES
(1, 2, 1, '2015-12-02', 'fddf', 345345, 435345, 345345);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` char(255) NOT NULL,
  `username` char(100) NOT NULL,
  `password` char(100) NOT NULL,
  `auth_key` char(50) NOT NULL,
  `level` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `auth_key`, `level`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin', '$2y$13$V4zZ2fsYP/MTrSddKGKlDeZ2U.QGKlIqaMAidK024wwib2Z8WNmNK', 'L37PYcqrnJitLaLzvm9tq49j_pJ6Ftrm', 1, '2015-12-02 01:52:09', '0000-00-00 00:00:00'),
(6, 'pimpinan', 'pimpinan', '$2y$13$bJddle1v.YvF1RdLGSprN.bDMIhTI42MWQnytViI9UEP/No9Ei686', 'EKa8Ko3G4CzWu4u2jRozD3vHCTepEEB6', 3, '2015-12-16 09:08:17', '2015-11-27 23:47:54'),
(7, 'supervisor', 'super', '$2y$13$ylNZqdEIIK4rz.lNxNNoLOWLxHBa7wMorJzM5aw2I40.t8a.KaMAK', '4yWZUX-_XQhpn7JnHDidDh37Sk4IFR2S', 2, '2015-12-01 00:00:00', '2015-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE IF NOT EXISTS `user_level` (
  `id` int(11) NOT NULL,
  `name` char(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `name`) VALUES
(1, 'administrasi umum'),
(2, 'supervisor'),
(3, 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `barang_habis_pakai`
--
ALTER TABLE `barang_habis_pakai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_order`
--
ALTER TABLE `barang_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eoq`
--
ALTER TABLE `eoq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_service`
--
ALTER TABLE `transaksi_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_habis_pakai`
--
ALTER TABLE `barang_habis_pakai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang_order`
--
ALTER TABLE `barang_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `eoq`
--
ALTER TABLE `eoq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jenis_kendaraan`
--
ALTER TABLE `jenis_kendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_service`
--
ALTER TABLE `transaksi_service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
