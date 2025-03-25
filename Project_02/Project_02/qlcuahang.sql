-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 07:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlcuahang`
--

-- --------------------------------------------------------

--
-- Table structure for table `mathang`
--

CREATE TABLE `mathang` (
  `maHang` int(11) NOT NULL,
  `tenHang` varchar(50) NOT NULL,
  `giaHang` decimal(10,0) NOT NULL,
  `donViTinh` varchar(10) NOT NULL,
  `hinhAnh` varchar(30) NOT NULL,
  `moTa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mathang`
--

INSERT INTO `mathang` (`maHang`, `tenHang`, `giaHang`, `donViTinh`, `hinhAnh`, `moTa`) VALUES
(1, 'Mì chính', 25000, 'Gói', 'hinh1.jpg', 'Mì chính hãng'),
(2, 'Kem đánh răng PS ngọc trai', 52000, 'Hộp', 'hinh2.jpg', 'Kem đánh răng trắng ngọc trai'),
(3, 'Bột giặt OMo', 200000, 'Gói', 'hinh3.jpg', 'Bột giặt cho máy giặt cửa ngang'),
(4, 'Nước lavie', 50000, 'Thùng', 'hinh4.jpg', 'Nước uống tinh khiết');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mathang`
--
ALTER TABLE `mathang`
  ADD PRIMARY KEY (`maHang`),
  ADD UNIQUE KEY `u_tenHang` (`tenHang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mathang`
--
ALTER TABLE `mathang`
  MODIFY `maHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
