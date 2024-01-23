-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 12:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `d_barang`
--

CREATE TABLE `d_barang` (
  `Kode_Barang` varchar(30) NOT NULL,
  `Nama_Barang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `d_barang`
--

INSERT INTO `d_barang` (`Kode_Barang`, `Nama_Barang`) VALUES
('09mkmskas8', 'KOMPAS JAM'),
('K0909opak', 'Karung');

-- --------------------------------------------------------

--
-- Table structure for table `d_mutasi`
--

CREATE TABLE `d_mutasi` (
  `No_Bukti` varchar(30) NOT NULL,
  `Tanggal` date NOT NULL,
  `K_Barang` varchar(30) NOT NULL,
  `Indikator_K_M` varchar(30) NOT NULL,
  `Quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `d_mutasi`
--

INSERT INTO `d_mutasi` (`No_Bukti`, `Tanggal`, `K_Barang`, `Indikator_K_M`, `Quantity`) VALUES
('909-109201', '2024-01-23', '09mkmskas8', 'Masuk', 10),
('909-okk', '2024-01-11', 'K0909opak', 'Masuk', 120),
('909-okk-1092012009201', '2024-01-22', '09mkmskas8', 'Masuk', 109),
('909-okk-1092012009201', '2024-01-23', '09mkmskas8', 'Masuk', 121),
('909-okk-1092012009201', '2024-01-25', '09mkmskas8', 'Keluar', 109);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `d_barang`
--
ALTER TABLE `d_barang`
  ADD PRIMARY KEY (`Kode_Barang`);

--
-- Indexes for table `d_mutasi`
--
ALTER TABLE `d_mutasi`
  ADD KEY `K_Barang` (`K_Barang`),
  ADD KEY `No_Bukti` (`No_Bukti`),
  ADD KEY `No_Bukti_2` (`No_Bukti`) USING BTREE;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `d_mutasi`
--
ALTER TABLE `d_mutasi`
  ADD CONSTRAINT `d_mutasi_ibfk_1` FOREIGN KEY (`K_Barang`) REFERENCES `d_barang` (`Kode_Barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
