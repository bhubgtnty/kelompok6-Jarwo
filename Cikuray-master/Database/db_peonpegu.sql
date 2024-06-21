-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2024 at 06:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_peonpegu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `email`, `no_hp`, `tgl_lahir`, `gambar`, `created`, `modified`) VALUES
(1, 'Jarwo', 'Jarwo', '$2y$10$Uf1sCBPtD574y/aE1iSTcupC02ilcpXn0jXFdaWJBeMTEeiY95bgK', 'Jarwo@gmail.com', '087886802387', '2001-04-23', 'dsa.jpg', '2020-05-04 11:16:10', '2020-05-04 11:16:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_aktivitas`
--

CREATE TABLE `tb_aktivitas` (
  `id_aktivitas` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `data_baru` varchar(100) DEFAULT NULL,
  `data_lama` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_aktivitas`
--

INSERT INTO `tb_aktivitas` (`id_aktivitas`, `nama`, `data_baru`, `data_lama`, `keterangan`, `status`, `created`, `modified`) VALUES
(90, 'derop', '25000', NULL, 'Tambah data transaksi pada tabel tb_transaksi', 'Add', '2024-06-13 21:56:41', '2024-06-13 21:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jalur`
--

CREATE TABLE `tb_jalur` (
  `id_jalur` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_jalur` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `ket_singkat` text DEFAULT NULL,
  `ket_lengkap` text DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jalur`
--

INSERT INTO `tb_jalur` (`id_jalur`, `id_kategori`, `nama_jalur`, `alamat`, `ket_singkat`, `ket_lengkap`, `harga`, `stok`, `gambar`, `created`, `modified`) VALUES
(29, 8, 'Jalur Pendakian Pemancar', 'Pemancar', 'asd', 'asd', 25000, 50, 'pamancar.jpg', '2024-06-12 14:15:32', '2024-06-12 18:51:35'),
(31, 8, 'Jalur Pendakian KiaraJanggot', 'Kiara Janggot', 'asd', 'asd', 20000, 50, 'kiarajanggot.jpg', '2024-06-12 17:49:50', '2024-06-12 17:49:50');

--
-- Triggers `tb_jalur`
--
DELIMITER $$
CREATE TRIGGER `Hapus jalur` AFTER DELETE ON `tb_jalur` FOR EACH ROW INSERT INTO tb_aktivitas(nama, data_lama, status, keterangan, created, modified) VALUES ('RizkiKarianata', old.nama_jalur, 'Delete', 'Hapus data jalur pada tabel tb_jalur', NOW(), NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Tambah jalur` AFTER INSERT ON `tb_jalur` FOR EACH ROW INSERT INTO tb_aktivitas(nama, data_baru, status, keterangan, created, modified) VALUES ('RizkiKarianata', new.nama_jalur, 'Add', 'Tambah data jalur pada tabel tb_jalur', NOW(), NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Ubah jalur` AFTER UPDATE ON `tb_jalur` FOR EACH ROW INSERT INTO tb_aktivitas(nama, data_baru, data_lama, status, keterangan, created, modified) VALUES ('RizkiKarianata', new.nama_jalur, old.nama_jalur, 'Update', 'Ubah data jalur pada tabel tb_jalur', NOW(), NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `created`, `modified`) VALUES
(8, 'Pendakian Gunung', '2024-06-12 14:07:04', '2024-06-12 20:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimoni`
--

CREATE TABLE `tb_testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_jalur` int(11) DEFAULT NULL,
  `pekerjaan` varchar(100) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_jalur` int(11) DEFAULT NULL,
  `jumlah_pesan` int(11) DEFAULT NULL,
  `total_harga` varchar(50) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `bukti` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `kode`, `id_user`, `id_jalur`, `jumlah_pesan`, `total_harga`, `status`, `created`, `modified`, `bukti`) VALUES
(51, 'TRX-666b08a9eb317', 21, 29, 1, '25000', '2', '2024-06-13 21:56:41', '2024-06-13 22:02:08', 'struk.jpg');

--
-- Triggers `tb_transaksi`
--
DELIMITER $$
CREATE TRIGGER `Tambah Transaksi` AFTER INSERT ON `tb_transaksi` FOR EACH ROW INSERT INTO tb_aktivitas(nama, data_baru, status, keterangan, created, modified) SELECT tb_user.nama_lengkap, new.total_harga, 'Add', 'Tambah data transaksi pada tabel tb_transaksi', NOW(), NOW() FROM tb_user WHERE tb_user.id_user = new.id_user
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gambar` varchar(250) DEFAULT 'coretan.png',
  `status` enum('0','1') DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `email`, `no_hp`, `tgl_lahir`, `gambar`, `status`, `created`, `modified`) VALUES
(21, 'derop', 'derop', '$2y$10$.GfD1nm9V5J5xoQKzI8dluT1HbmEwrFMfRwTGCowO8X497v8vlsSq', 'derop@gmail.com', '08122388800', '2001-04-23', '49a4ffacf4feb6bc9e29d7f94631c0dc.jpg', '0', '2024-06-12 14:07:30', '2024-06-12 18:21:50'),
(22, 'sastra', 'sastra', '$2y$10$Ps8G3XW90TSfpoL/.zH3lewEjYBSvnqxbrvfMBA9KXnr0.Ybi3go2', NULL, '088123123', NULL, 'coretan.png', '0', '2024-06-12 18:13:20', '2024-06-12 18:13:20'),
(23, 'asd', 'asd', '$2y$10$rMZyIqnpXbAUl7x8IcTf5eEpQ70D4RTaOUC/2.u0FBhLQ5b2XvI8u', NULL, '089199191', NULL, 'coretan.png', '0', '2024-06-12 19:08:34', '2024-06-12 19:08:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  ADD PRIMARY KEY (`id_aktivitas`);

--
-- Indexes for table `tb_jalur`
--
ALTER TABLE `tb_jalur`
  ADD PRIMARY KEY (`id_jalur`),
  ADD KEY `FK_tb_jalur_tb_kategori` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD PRIMARY KEY (`id_testimoni`),
  ADD KEY `FK_tb_testimoni_tb_user` (`id_user`),
  ADD KEY `FK_tb_testimoni_tb_jalur` (`id_jalur`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `FK_tb_transaksi_tb_user` (`id_user`),
  ADD KEY `FK_tb_transaksi_tb_jalur` (`id_jalur`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_aktivitas`
--
ALTER TABLE `tb_aktivitas`
  MODIFY `id_aktivitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `tb_jalur`
--
ALTER TABLE `tb_jalur`
  MODIFY `id_jalur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  MODIFY `id_testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_jalur`
--
ALTER TABLE `tb_jalur`
  ADD CONSTRAINT `FK_tb_jalur_tb_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_testimoni`
--
ALTER TABLE `tb_testimoni`
  ADD CONSTRAINT `FK_tb_testimoni_tb_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_testimoni_tb_jalur` FOREIGN KEY (`id_jalur`) REFERENCES `tb_jalur` (`id_jalur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `FK_tb_transaksi_tb_user` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tb_transaksi_tb_jalur` FOREIGN KEY (`id_jalur`) REFERENCES `tb_jalur` (`id_jalur`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
