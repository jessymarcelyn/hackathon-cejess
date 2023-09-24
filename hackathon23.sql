-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2023 at 03:31 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon23`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `quantity` int(3) NOT NULL,
  `amount` int(9) NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `quantity`, `amount`, `id_wisata`, `id_transaksi`) VALUES
(5, 1, 10000, 1, 14),
(6, 1, 10000, 2, 14),
(7, 1, 10000, 3, 14),
(8, 1, 10000, 4, 14),
(9, 1, 10000, 5, 14),
(10, 1, 10000, 6, 14),
(11, 1, 10000, 7, 14),
(12, 1, 10000, 8, 14),
(13, 1, 10000, 9, 14),
(14, 1, 10000, 10, 14),
(15, 1, 10000, 1, 15),
(16, 1, 10000, 2, 15),
(17, 1, 10000, 3, 15),
(18, 1, 10000, 4, 15),
(19, 1, 10000, 5, 15),
(20, 1, 10000, 6, 15),
(21, 1, 10000, 7, 15),
(22, 1, 10000, 8, 15),
(23, 1, 10000, 9, 15),
(24, 1, 10000, 10, 15),
(25, 2, 20000, 1, 16),
(26, 2, 20000, 2, 16),
(27, 1, 10000, 3, 16),
(28, 2, 20000, 4, 16),
(29, 1, 10000, 5, 16),
(30, 1, 10000, 6, 16),
(31, 1, 10000, 7, 16),
(32, 1, 10000, 8, 16),
(33, 1, 10000, 9, 16),
(34, 1, 10000, 10, 16),
(35, 3, 30000, 1, 17),
(36, 1, 10000, 2, 17),
(37, 0, 0, 3, 17),
(38, 0, 0, 4, 17),
(39, 0, 0, 5, 17),
(40, 0, 0, 6, 17),
(41, 2, 20000, 7, 17),
(42, 0, 0, 8, 17),
(43, 0, 0, 9, 17),
(44, 0, 0, 10, 17);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tanggal_main` date NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `menang` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `email`, `tanggal_main`, `no_telp`, `menang`) VALUES
(1, 'asda@gmail.com', '2023-09-23', '0812313', 0),
(2, 'asdam@gmail.com', '2023-09-23', '0812233445', 0),
(3, 'asdamm@gmail.com', '2023-09-23', '0813456788', 0),
(4, 'asdasd@gmail.com', '2023-09-23', '08123132', 0),
(5, '132@gmail.com', '2023-09-23', '012832813', 0),
(6, 'aksdk@gmail.com', '2023-09-23', '0812312', 0),
(7, 'asdawsd@gmail.com', '2023-09-23', '0812312', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` int(9) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_rekening` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `total_transaksi`, `status`, `id_user`, `nama_rekening`) VALUES
(1, '2023-09-23', 0, 0, 29, 'Budi Santoso'),
(2, '2023-09-23', 0, 0, 29, 'Budi Santoso'),
(3, '2023-09-23', 0, 0, 29, 'Budi Santoso'),
(4, '2023-09-23', 0, 0, 29, 'Budi Santoso'),
(5, '2023-09-23', 0, 0, 30, 'adsda'),
(6, '2023-09-23', 0, 0, 30, 'adsda'),
(7, '2023-09-23', 0, 0, 30, 'adsda'),
(8, '2023-09-23', 0, 0, 30, 'adsda'),
(9, '2023-09-23', 0, 0, 30, 'adsda'),
(10, '2023-09-23', 0, 0, 30, 'adsda'),
(11, '2023-09-23', 0, 0, 30, 'adsda'),
(12, '2023-09-23', 0, 0, 30, 'adsda'),
(13, '2023-09-23', 0, 0, 30, 'adsda'),
(14, '2023-09-23', 0, 0, 30, 'adsda'),
(15, '2023-09-23', 100000, 0, 30, 'adsda'),
(16, '2023-09-23', 130000, 0, 31, 'maria'),
(17, '2023-09-23', 60000, 0, 32, 'maria');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_telp`) VALUES
(1, 'kjjhj', 'bbb@gmail.com', '86543'),
(2, 'asdas', 'aaa@gmail.com', '812312'),
(3, 'asdasas', 'asdad@gmail.com', '812312'),
(4, 'dsfdfs', 'ccc@gmail.com', '08812831'),
(5, 'fdggd', 'ddd@gmail.com', '0812334546'),
(6, 'asdad', 'dinda@gmail.com', '081221241'),
(7, 'asdada', 'dindaa@gmail.com', '0812212412'),
(8, 'asd', 'asddd@gmail.com', '0812392193'),
(9, 'sdfs', 'adsdkk@gmail.com', '081239193'),
(10, 'sdfs', 'adsdkk3@gmail.com', '081239193'),
(11, 'asdad', 'asdsfdsf@gmail.com', '081231'),
(12, 'hkghkg', 'dinda4@gmail.com', '082244'),
(13, 'hkghkg', 'dinda42@gmail.com', '082244'),
(14, 'sdad', 'sdada@gmail.com', '08123132'),
(15, 'akdsakdk', 'akdsakdk@gmail.com', '081238183'),
(16, 'ASDSA', 'sdfs@gmail.com', '0812391392'),
(17, 'sads', 'sfad@gmail.com', '08123919'),
(18, 'gjjh', 'sfd@gmail.com', '08123891'),
(19, 'afd', 'asda@gmail.com', '0812319'),
(20, 'gfdgf', 'dsf@gmail.com', '082183123'),
(21, 'kkkjjk', 'kkkkjkj@gmail.com', '08123456'),
(22, 'adas', 'adas@gmail.com', '0812312'),
(23, 'ASDSA', 'ascd@gmail.com', '08123312'),
(24, 'asdad', 'tina@gmail.com', '0812331'),
(25, 'adsad', 'adsda@gmail.com', '0812312'),
(26, 'asd', 'adskk@gmail.com', '081233'),
(27, 'jhjh', 'tina3@gmail.com', '081234'),
(28, 'asd', 'adsad@gmail.com', '0182313'),
(29, 'sdasd', 'asdwead@gmail.com', '081283813'),
(30, 'DSADA', 'ADSD@GMAIL.COM', '012838123'),
(31, 'asda', 'mmmm@gmail.com', '0812313213'),
(32, 'aksdkadk', 'jjjj@gmail.com', '08123311');

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id_wisata` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wisata`
--

INSERT INTO `wisata` (`id_wisata`, `nama`, `harga`) VALUES
(1, 'Raja Domba', 10000),
(2, 'Rumah Batik', 10000),
(3, 'Rumah Akar', 10000),
(4, 'Sendang Tirto Gumitir', 10000),
(5, 'PPG Wisata Pinus', 10000),
(6, 'Cafe Gumitir', 10000),
(7, 'Terowongan Mrawan', 10000),
(8, 'Stasiun Mrawan', 10000),
(9, 'Kopi Ketakasi', 10000),
(10, 'Pabrik Kopi Mrawan', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `fk_id_wisata` (`id_wisata`),
  ADD KEY `fk_id_transaksi` (`id_transaksi`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id_wisata`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id_wisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `fk_id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`),
  ADD CONSTRAINT `fk_id_wisata` FOREIGN KEY (`id_wisata`) REFERENCES `wisata` (`id_wisata`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
