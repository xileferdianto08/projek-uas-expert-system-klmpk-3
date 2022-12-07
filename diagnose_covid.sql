-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 05:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnose_covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_diagnosa`
--

CREATE TABLE `hasil_diagnosa` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `solusiId` int(11) NOT NULL,
  `dateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hasil_diagnosa`
--

INSERT INTO `hasil_diagnosa` (`id`, `userId`, `solusiId`, `dateTime`) VALUES
(9, 1, 2, '2022-12-07 05:13:00'),
(10, 1, 1, '2022-12-07 05:13:38'),
(11, 1, 4, '2022-12-07 05:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_gejala`
--

CREATE TABLE `jenis_gejala` (
  `id` int(11) NOT NULL,
  `jenisGejala` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_gejala`
--

INSERT INTO `jenis_gejala` (`id`, `jenisGejala`) VALUES
(1, 'Demam'),
(2, 'Pilek'),
(3, 'Pusing'),
(4, 'Batuk Kering'),
(5, 'Batuk Berdahak'),
(6, 'Detak Jantung Tidak Normal'),
(7, 'Susah Telan'),
(8, 'Sesak Nafas'),
(9, 'Diare'),
(10, 'Menggigil'),
(11, 'Badan Lemas'),
(12, 'Hilang Indra Perasa'),
(13, 'Ruam Pada Kulit'),
(14, 'Mata Merah'),
(15, 'Dada Terasa Berat'),
(16, 'Meriang'),
(17, 'Badan Pegal'),
(18, 'Badan Terasa Dingin pada Malam Hari');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_solusi`
--

CREATE TABLE `jenis_solusi` (
  `id` int(11) NOT NULL,
  `namaSolusi` varchar(255) NOT NULL,
  `solusi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_solusi`
--

INSERT INTO `jenis_solusi` (`id`, `namaSolusi`, `solusi`) VALUES
(1, 'Minum Obat Pereda Demam', 'Jika Gejala Awal mengalami demam lebih dari 37 derajat celsius  Silahkan Minum Pereda demam seperti Paracetamol'),
(2, 'Tetap Terhidrasi\r\n', 'Jika Mengalami Tenggorokan nyeri, silahkan coba dahulu dengan banyak minum air putih'),
(3, 'Istirahat yang Cukup', 'Jika Perasaan Meriang dan lemas cobalah untuk cukup istirahat'),
(4, 'Pantau Gejala', 'Jika Mengalami Batuk, Pilek, Tenggorokan sakit dan demam, silahkan melapor ke bidan daerah agar dipantau selama 14 hari'),
(5, 'Lakukan Isolasi Mandiri (Isoman)', 'Jika Mengalami Batuk, Jehilangan Indra Perasa, Detak Jantung Tidak normal dan demam,selama 14 hari atau lebih, Silahkan melakukan Isolasi Mandiri dirumah.'),
(6, 'Hubungi Dokter', 'Jika Mengalami Batuk, Pilek, Tenggorokan sakit dan demam,selama 14 hari atau lebih dan terasa ada gangguan pernafasan, silahkan melapor ke Rumah sakit atau Puskesmas untuk diperiksa lebih lanjut.');

-- --------------------------------------------------------

--
-- Table structure for table `survei_diagnosa`
--

CREATE TABLE `survei_diagnosa` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `gejalaId` int(11) NOT NULL,
  `diagnosed` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survei_diagnosa`
--

INSERT INTO `survei_diagnosa` (`id`, `userId`, `gejalaId`, `diagnosed`) VALUES
(6, 1, 1, 1),
(7, 1, 2, 1),
(8, 1, 3, 1),
(9, 1, 5, 1),
(10, 1, 7, 1),
(11, 1, 1, 1),
(12, 1, 2, 1),
(13, 1, 10, 1),
(14, 1, 11, 1),
(15, 1, 18, 1),
(16, 1, 11, 1),
(17, 1, 12, 1),
(18, 1, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `password` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `age`, `password`) VALUES
(1, 'Felix Ferdianto', 'felixferdianto13@gmail.com', 20, '11437a6ee53af8c57e9373f7806639b01ceb37ae90cb3a9bbb8031a21d1f4b91ae9a382c75ffd0b08b62d699bae6c0ec179c885df6ad2873d6d38d7d25aad1fb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `penyakitId` (`solusiId`);

--
-- Indexes for table `jenis_gejala`
--
ALTER TABLE `jenis_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_solusi`
--
ALTER TABLE `jenis_solusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survei_diagnosa`
--
ALTER TABLE `survei_diagnosa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `gejalaId` (`gejalaId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_gejala`
--
ALTER TABLE `jenis_gejala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jenis_solusi`
--
ALTER TABLE `jenis_solusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `survei_diagnosa`
--
ALTER TABLE `survei_diagnosa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_diagnosa`
--
ALTER TABLE `hasil_diagnosa`
  ADD CONSTRAINT `hasil_diagnosa_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_diagnosa_ibfk_2` FOREIGN KEY (`solusiId`) REFERENCES `jenis_solusi` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `survei_diagnosa`
--
ALTER TABLE `survei_diagnosa`
  ADD CONSTRAINT `survei_diagnosa_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `survei_diagnosa_ibfk_2` FOREIGN KEY (`gejalaId`) REFERENCES `jenis_gejala` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
