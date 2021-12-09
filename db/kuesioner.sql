-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 06:21 PM
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
-- Database: `kuesioner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `nama_fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
(1, 'Fakultas Ekonomi dan Bisnis'),
(2, 'Fakultas Hukum'),
(3, 'Fakultas Keguruan dan Ilmu Pendidikan'),
(4, 'Fakultas Agama Islam'),
(5, 'Fakultas Teknik'),
(6, 'Fakultas Ilmu Kesehatan'),
(7, 'Fakultas Psikologi dan Humaniora');

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(10) NOT NULL,
  `id_pertanyaan` int(10) DEFAULT NULL,
  `npm` varchar(50) DEFAULT NULL,
  `jawaban` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_pertanyaan`, `npm`, `jawaban`) VALUES
(1, 20, '17.0504.0075', 'Sangat Puas'),
(2, 22, '17.0504.0075', 'Cukup Puas'),
(3, 23, '17.0504.0075', 'Puas'),
(4, 24, '17.0504.0075', 'Tidak Puas'),
(5, 25, '17.0504.0075', 'Sangat Tidak Puas'),
(6, 26, '17.0504.0075', 'Puas'),
(7, 20, '16.0504.0071', 'Tidak Puas'),
(8, 22, '16.0504.0071', 'Sangat Puas'),
(9, 23, '16.0504.0071', 'Puas'),
(10, 24, '16.0504.0071', 'Puas'),
(11, 25, '16.0504.0071', 'Sangat Puas'),
(12, 26, '16.0504.0071', 'Puas'),
(13, 28, '16.0504.0071', 'Tidak Puas'),
(14, 20, '17.0504.0074', 'Puas'),
(15, 22, '17.0504.0074', 'Sangat Tidak Puas'),
(16, 23, '17.0504.0074', 'Cukup Puas'),
(17, 24, '17.0504.0074', 'Sangat Puas'),
(18, 25, '17.0504.0074', 'Sangat Puas'),
(19, 26, '17.0504.0074', 'Puas'),
(20, 28, '17.0504.0074', 'Puas');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Content (Isi)'),
(2, 'Accuracy (Keakuratan)'),
(3, 'Format (Bentuk)'),
(4, 'Ease of Use (Kemudahan Dalam Menggunakan)'),
(5, 'Timeliness (Ketepatan Waktu)');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` varchar(50) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `nomor_handphone` int(15) NOT NULL,
  `id_prodi` int(10) NOT NULL,
  `id_fakultas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `nomor_handphone`, `id_prodi`, `id_fakultas`) VALUES
('16.0504.0071', 'shb', 4347, 14, 5),
('17.0504.0074', 'by', 457, 14, 5),
('17.0504.0075', 'lusiana', 1456741477, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(10) NOT NULL,
  `pertanyaan` text NOT NULL,
  `jwb5` varchar(20) NOT NULL,
  `jwb4` varchar(20) NOT NULL,
  `jwb3` varchar(20) NOT NULL,
  `jwb2` varchar(20) NOT NULL,
  `jwb1` varchar(20) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`, `jwb5`, `jwb4`, `jwb3`, `jwb2`, `jwb1`, `id_kategori`) VALUES
(20, '<p>\r\n	1. hhh</p> \r\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 1),
(22, '<p>\n	2</p>\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 1),
(23, '<p>\n	3</p>\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 2),
(24, '<p>\n	4</p>\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 3),
(25, '<p>\r\n	7 abc</p>\r\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 4),
(26, '<p>\n	rtrtt</p>\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 5),
(28, '<p>\r\n	apa coba</p>\r\n', 'Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas', 2);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` int(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`) VALUES
(1, 'Manajemen (S-1)'),
(2, 'Akuntansi (S-1)'),
(3, 'Ilmu Hukum (S-1)'),
(4, 'Bimbingan Konseling (S-1)'),
(5, 'Pendidikan Guru PAUD (S-1)'),
(6, 'Pendidikan Guru SD (S-1)'),
(7, 'Pendidikan Agama Islam (S-1)'),
(8, 'Hukum Ekonomi Syariah (S-1)'),
(9, 'Pendidikan Guru Madrasah Ibtidaiyah (S-1)'),
(10, 'Manajemen Pendidikan Islam (S-2)'),
(11, 'Teknik Industri (S-1)'),
(12, 'Teknik Informatika (D-3)'),
(13, 'Teknik Otomotif (D-3)'),
(14, 'Teknik Informatika (S-1)'),
(15, 'Ilmu Keperawatan (S-1)'),
(16, 'Keperawatan (D-3)'),
(17, 'Farmasi (S-1)'),
(18, 'Farmasi (D-3)'),
(19, 'Profesi Ners'),
(20, 'Psikologi (S-1)'),
(21, 'Ilmu Komunikasi (S-1)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `mahasiswa` (`npm`) USING BTREE,
  ADD KEY `pertanyaan` (`id_pertanyaan`) USING BTREE;

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD KEY `id_fakultas` (`id_fakultas`),
  ADD KEY `id_prodi` (`id_prodi`,`id_fakultas`) USING BTREE;

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil`
--
ALTER TABLE `hasil`
  ADD CONSTRAINT `hasil_ibfk_2` FOREIGN KEY (`npm`) REFERENCES `mahasiswa` (`npm`),
  ADD CONSTRAINT `hasil_ibfk_3` FOREIGN KEY (`id_pertanyaan`) REFERENCES `pertanyaan` (`id_pertanyaan`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id_prodi`),
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD CONSTRAINT `pertanyaan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
