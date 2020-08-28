-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 07:50 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblatian`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_pengguna`
--

CREATE TABLE `master_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nama_pengguna` text NOT NULL,
  `email_pengguna` text NOT NULL,
  `pass_pengguna` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_pengguna`
--

INSERT INTO `master_pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `pass_pengguna`) VALUES
(1, 'admin', 'admin@admin.id', '12345'),
(2, 'fredho pratama', 'ventadet@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_tautan_bundel`
--

CREATE TABLE `master_tautan_bundel` (
  `id_tautan_bundel` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `nama_pengguna` text NOT NULL,
  `nama_tautan_bundel` text NOT NULL,
  `link_tautan` text NOT NULL,
  `status_link` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_tautan_bundel`
--

INSERT INTO `master_tautan_bundel` (`id_tautan_bundel`, `id_pengguna`, `nama_pengguna`, `nama_tautan_bundel`, `link_tautan`, `status_link`) VALUES
(1, 2, 'fredho', 'Tautan Bundel GNFI', 'linkbundle.php', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_pengguna`
--
ALTER TABLE `master_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `master_tautan_bundel`
--
ALTER TABLE `master_tautan_bundel`
  ADD PRIMARY KEY (`id_tautan_bundel`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_tautan_bundel`
--
ALTER TABLE `master_tautan_bundel`
  MODIFY `id_tautan_bundel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_tautan_bundel`
--
ALTER TABLE `master_tautan_bundel`
  ADD CONSTRAINT `master_tautan_bundel_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `master_pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
