-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2025 at 06:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ktra_example`
--

-- --------------------------------------------------------

--
-- Table structure for table `loaisp`
--

CREATE TABLE `loaisp` (
  `Maloai` varchar(5) NOT NULL,
  `Tenloai` varchar(50) NOT NULL,
  `Mota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaisp`
--

INSERT INTO `loaisp` (`Maloai`, `Tenloai`, `Mota`) VALUES
('sp001', 'quan', ''),
('sp002', 'ao', ''),
('sp003', 'vay', ''),
('sp004', 'giay', ''),
('sp005', 'dep', ''),
('sp006', 'ao khoac', ''),
('sp007', 'do lot nam', ''),
('sp008', 'do lot nu', ''),
('sp009', 'mu', ''),
('sp010', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `Mahang` varchar(5) NOT NULL,
  `Tenhang` varchar(50) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Hinhanh` varchar(30) NOT NULL,
  `Mota` varchar(100) NOT NULL,
  `Giahang` decimal(10,1) NOT NULL,
  `Maloai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`Mahang`, `Tenhang`, `Soluong`, `Hinhanh`, `Mota`, `Giahang`, `Maloai`) VALUES
('mh001', 'quan bo sieu chat', 5, '', '', 150000.0, 'sp001'),
('mh002', 'quan dui tre em', 5, '', '', 50000.0, 'sp001'),
('mh003', 'quan ni', 1, '', '', 120000.0, 'sp001'),
('mh004', 'quan vai', 5, '', '', 300000.0, 'sp001'),
('mh005', 'no buoc toc mau hong', 5, '', '', 20000.0, 'sp010'),
('mh006', 'ao khoac bomber', 1, '', 'ao nay chat vcl', 100000.0, 'sp002'),
('mh007', 'ao da cao cap', 2, '', 'ao sieu cap ngau', 800000.0, 'sp002'),
('mh008', 'ao gio yody', 10, '', '', 600000.0, 'sp002'),
('mh009', 'ao lgbt', 1, '', '', 140000.0, 'sp002'),
('mh010', 'ao ba lo', 10, '', '', 30000.0, 'sp002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`Maloai`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Mahang`),
  ADD KEY `Maloai` (`Maloai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Maloai`) REFERENCES `loaisp` (`Maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
