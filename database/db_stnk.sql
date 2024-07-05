-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 07:24 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_stnk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id_employee` int(11) NOT NULL,
  `nama_employee` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `role` int(1) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id_employee`, `nama_employee`, `username`, `password`, `telepon`, `role`, `is_active`, `foto`, `id_wilayah`) VALUES
(1, 'Mirza Fatqul', 'mirzafatqul', '$2y$10$bV.y5UExm.JV1stHQlHw/e2XnhgO9.uQEispSCjorwnVxkcngESsa', '089684280465', 1, 1, 'user1-128x128.jpg', 5),
(4, 'Indra Ardyansyah', 'Indra123', '$2y$10$R6cjcxSy7snB.iS20YAnkeKPSp55rrtCki3bANjLOTycVnQTSn/d2', '082123982321', 2, 1, 'avatar045.png', 6),
(5, 'Sapto Wibowo', 'sapto123', '$2y$10$otKYS8dgoh9sxR4RrdyEReH6IsIVHh.8NWrlhk0HSR9HVkfr38oMG', '089875564532', 1, 1, 'user8-128x128.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_syarat`
--

CREATE TABLE `tbl_syarat` (
  `id_syarat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `no_pengajuan` varchar(20) DEFAULT NULL,
  `tanggal` int(11) DEFAULT NULL,
  `ktp` int(1) DEFAULT NULL,
  `stnk` int(1) DEFAULT NULL,
  `bpkb` int(1) DEFAULT NULL,
  `surat_kuasa` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_employee` int(11) DEFAULT NULL,
  `id_wilayah` int(11) DEFAULT NULL,
  `date1` int(11) DEFAULT NULL,
  `keterangan1` text DEFAULT NULL,
  `status1` int(1) DEFAULT NULL,
  `date2` int(11) DEFAULT NULL,
  `keterangan2` text DEFAULT NULL,
  `status2` int(1) DEFAULT NULL,
  `date3` int(11) DEFAULT NULL,
  `keterangan3` text DEFAULT NULL,
  `status3` int(1) DEFAULT NULL,
  `date4` int(11) DEFAULT NULL,
  `keterangan4` text DEFAULT NULL,
  `status4` int(1) DEFAULT NULL,
  `finish` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_syarat`
--

INSERT INTO `tbl_syarat` (`id_syarat`, `id_user`, `no_pengajuan`, `tanggal`, `ktp`, `stnk`, `bpkb`, `surat_kuasa`, `status`, `id_employee`, `id_wilayah`, `date1`, `keterangan1`, `status1`, `date2`, `keterangan2`, `status2`, `date3`, `keterangan3`, `status3`, `date4`, `keterangan4`, `status4`, `finish`) VALUES
(18, 16, 'PJ1691942911', 1691942918, 1, 1, 1, 1, 2, 4, 4, 1692032230, 'Sudah Mengambil Formulir', 1, 1692032260, 'Formulir Sudah Diserahkan', 1, 1692032279, 'Sudah Dilakukan Pembayaran Sesuai dengan nominal yang tertera pada lembar pembayaran', 1, 1692032296, 'STNK sudah bisa di ambil', 1, 1692032334),
(20, 15, 'PJ1692035417', 1692035437, 1, 1, 1, 1, 2, 1, 4, 1692111998, 'Sudah Mengambil Formulir', 1, 1692112775, 'Formulir Sudah Diserahkan', 1, 1692113731, 'Sudah Dilakukan Pembayaran Sesuai dengan nominal yang tertera pada lembar pembayaran', 1, 1692117555, 'STNK sudah bisa di ambil', 1, 1692121313),
(21, 16, 'PJ1692035466', 1692035475, 1, 1, 1, 1, 2, 4, 4, 1692089240, 'Sudah Mengambil Formulir', 1, 1692089293, 'Formulir Sudah Diserahkan', 1, 1692120367, 'Sudah Dilakukan Pembayaran Sesuai dengan nominal yang tertera pada lembar pembayaran', 1, 1692120506, 'STNK sudah bisa di ambil', 1, 1692121147),
(22, 16, 'PJ1692121364', 1692121369, 1, 1, 1, 1, 1, 1, 4, 1692121438, 'Sudah Mengambil Formulir', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 16, 'PJ1692157439', 1692157445, 1, 1, 1, 1, 1, 5, 4, 1692161827, 'test', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 16, 'PJ1692161636', 1692161682, 1, 1, 2, 2, 0, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `jalan` text DEFAULT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` varchar(25) NOT NULL,
  `id_wilayah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `no_telepon`, `jalan`, `kelurahan`, `kecamatan`, `username`, `password`, `is_active`, `date_created`, `id_wilayah`) VALUES
(15, 'Mirza Fatqul', '089684280465', 'Jalan Kp. Pulojahe RT 02 RW 10', 'Jatinegara', 'Cakung', 'mirzafatqul', '$2y$10$LEfBFCXlUwDueDcXaxh8l.I01Ynh8ANkPLqZ9GhqlT/VyU8i9aUNu', 1, '1691940025', 4),
(16, 'sapto wibowo', '082123982321', 'Jalan Kp. Pulojahe RT 02 RW 10', 'Jatinegara', 'Cakung', 'sapto123', '$2y$10$8h9A6Km4ok0.CCV2BPR5ou595MB92ZkfP/70OrAlIHmw2J0lR/grm', 1, '1691940397', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wilayah`
--

CREATE TABLE `tbl_wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `kode_wilayah` varchar(25) DEFAULT NULL,
  `nama_wilayah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_wilayah`
--

INSERT INTO `tbl_wilayah` (`id_wilayah`, `kode_wilayah`, `nama_wilayah`) VALUES
(4, 'JKT', 'Jakarta Timur'),
(5, 'JKS', 'Jakarta Selatan'),
(6, 'JKB', 'Jakarta Barat'),
(7, 'TG', 'Tangerang'),
(9, 'BTN', 'Banten'),
(10, 'BKS', 'Bekasi'),
(11, 'DP', 'Depok'),
(12, 'BG', 'Bogor'),
(13, 'BKS-B', 'Bekasi Barat'),
(14, 'BKS-T', 'Bekasi Timur'),
(15, 'CKR', 'Cikarang'),
(16, 'CBT', 'Cibitung');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id_employee`);

--
-- Indexes for table `tbl_syarat`
--
ALTER TABLE `tbl_syarat`
  ADD PRIMARY KEY (`id_syarat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id_employee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_syarat`
--
ALTER TABLE `tbl_syarat`
  MODIFY `id_syarat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_wilayah`
--
ALTER TABLE `tbl_wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
