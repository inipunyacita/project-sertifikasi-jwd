-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 12:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_regis`
--

CREATE TABLE `tb_regis` (
  `id_status` int(11) NOT NULL,
  `status_siswa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_regis`
--

INSERT INTO `tb_regis` (`id_status`, `status_siswa`) VALUES
(1, 'Diterima'),
(2, 'Tidak Diterima'),
(3, 'Process'),
(4, 'Cadangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_regissiswa`
--

CREATE TABLE `tb_regissiswa` (
  `id_regissiswa` int(11) NOT NULL,
  `nama_siswa` varchar(150) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `nilai_un` varchar(50) NOT NULL,
  `nilai_uas` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `id_status` int(11) NOT NULL DEFAULT 3,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_regissiswa`
--

INSERT INTO `tb_regissiswa` (`id_regissiswa`, `nama_siswa`, `nisn`, `nilai_un`, `nilai_uas`, `alamat`, `asal_sekolah`, `id_status`, `id_user`) VALUES
(28, 'Putu Citananta Indrawan Sloka', '1915323089', '90', '95', 'Jl Dahlia', 'SMP Negeri 3 Denpasar', 4, 18),
(29, 'Putu Wawan Setiawan', '1915323085', '95', '98', 'Jl Dahlia', 'SMP N 3 Karangasem', 3, 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 untuk User,\r\n1 untuk Admin',
  `status_regis` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0 belum regis siswa, 1 sudah regis siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `pass`, `role`, `status_regis`) VALUES
(12, 'admin', 'admin@gmail.com', 'admin123', 1, 0),
(17, 'user2', 'user2@gmail.com', 'userdua123', 0, 1),
(18, 'I Gede Pasek', 'paseksuardana@gmail.com', 'pasek123', 0, 1),
(19, 'user3', 'user3@gmail.com', 'usertiga123', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_regis`
--
ALTER TABLE `tb_regis`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tb_regissiswa`
--
ALTER TABLE `tb_regissiswa`
  ADD PRIMARY KEY (`id_regissiswa`),
  ADD KEY `id_status` (`id_status`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_regis`
--
ALTER TABLE `tb_regis`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_regissiswa`
--
ALTER TABLE `tb_regissiswa`
  MODIFY `id_regissiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_regissiswa`
--
ALTER TABLE `tb_regissiswa`
  ADD CONSTRAINT `tb_regissiswa_ibfk_1` FOREIGN KEY (`id_status`) REFERENCES `tb_regis` (`id_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
