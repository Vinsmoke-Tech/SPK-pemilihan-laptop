-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 06:50 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pilihlaptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_kriteria`
--

CREATE TABLE `tb_bobot_kriteria` (
  `id` int(10) NOT NULL,
  `merk_type` varchar(30) NOT NULL,
  `kecepatan_prosesor` int(5) NOT NULL,
  `kapasitas_ram` int(5) NOT NULL,
  `kapasitas_penyimpanan` int(5) NOT NULL,
  `vga_card` int(5) NOT NULL,
  `sistem_operasi` int(5) NOT NULL,
  `baterei` int(5) NOT NULL,
  `harga` int(5) NOT NULL,
  `store_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bobot_kriteria`
--

INSERT INTO `tb_bobot_kriteria` (`id`, `merk_type`, `kecepatan_prosesor`, `kapasitas_ram`, `kapasitas_penyimpanan`, `vga_card`, `sistem_operasi`, `baterei`, `harga`, `store_name`) VALUES
(1, 'Acer Aspire 3 ', 3, 3, 1, 2, 2, 1, 3, 'toko01'),
(2, 'Acer aspire 5 A514-54', 2, 1, 2, 1, 1, 3, 1, 'toko01'),
(3, 'Asus vivobook 15 A516JAO', 2, 1, 2, 1, 3, 3, 2, 'toko01'),
(4, 'Lenovo V14', 3, 3, 3, 2, 3, 2, 1, 'toko01'),
(5, 'HP 14sCF2517TU', 2, 1, 1, 1, 1, 3, 2, 'toko01'),
(7, 'asus', 2, 2, 2, 1, 2, 2, 1, 'toko01'),
(8, 'acer', 2, 3, 2, 2, 2, 4, 1, 'toko01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot_normalisasi`
--

CREATE TABLE `tb_bobot_normalisasi` (
  `id` int(10) NOT NULL,
  `merk_type` varchar(30) NOT NULL,
  `kecepatan_prosesor` float NOT NULL,
  `kapasitas_ram` float NOT NULL,
  `kapasitas_penyimpanan` float NOT NULL,
  `vga_card` float NOT NULL,
  `sistem_operasi` float NOT NULL,
  `baterei` float NOT NULL,
  `harga` float NOT NULL,
  `store_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bobot_normalisasi`
--

INSERT INTO `tb_bobot_normalisasi` (`id`, `merk_type`, `kecepatan_prosesor`, `kapasitas_ram`, `kapasitas_penyimpanan`, `vga_card`, `sistem_operasi`, `baterei`, `harga`, `store_name`) VALUES
(1, 'Acer Aspire 3 ', 1, 0.75, 0.333333, 1, 0.666667, 0.25, 0.75, 'toko01'),
(2, 'Acer aspire 5 A514-54', 0.666667, 0.25, 0.666667, 0.5, 0.333333, 0.75, 0.25, 'toko01'),
(3, 'Asus vivobook 15 A516JAO', 0.666667, 0.25, 0.666667, 0.5, 1, 0.75, 0.5, 'toko01'),
(4, 'Lenovo V14', 1, 0.75, 1, 1, 1, 0.5, 0.25, 'toko01'),
(5, 'HP 14sCF2517TU', 0.666667, 0.25, 0.333333, 0.5, 0.333333, 0.75, 0.5, 'toko01'),
(7, 'asus', 0.666667, 0.5, 0.666667, 0.5, 0.666667, 0.5, 0.25, 'toko01'),
(8, 'acer', 0.666667, 0.75, 0.666667, 1, 0.666667, 1, 0.25, 'toko01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laptop`
--

CREATE TABLE `tb_laptop` (
  `id` int(10) NOT NULL,
  `merk_type` varchar(30) NOT NULL,
  `prosesor` varchar(20) NOT NULL,
  `kecepatan_prosesor` varchar(20) NOT NULL,
  `kapasitas_ram` int(5) NOT NULL,
  `kapasitas_penyimpanan` int(5) NOT NULL,
  `vga_card` varchar(20) NOT NULL,
  `sistem_operasi` varchar(20) NOT NULL,
  `baterei` varchar(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `store_name` varchar(15) NOT NULL,
  `image_url` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_laptop`
--

INSERT INTO `tb_laptop` (`id`, `merk_type`, `prosesor`, `kecepatan_prosesor`, `kapasitas_ram`, `kapasitas_penyimpanan`, `vga_card`, `sistem_operasi`, `baterei`, `harga`, `store_name`, `image_url`) VALUES
(1, 'Acer Aspire 3 ', 'AMD Ryzen 3- 3,5ghz', '>3.5 GHz', 8, 256, 'dedicated', 'Windows 10 pro', '6', 5925000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303632343137343630322d312e6a7067),
(2, 'Acer aspire 5 A514-54', 'Intel core i3 –3,1gh', '2.1 - 3.4 GHz', 4, 512, 'onboard', 'Windows 10 home', '8', 7200000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303632343137343733332d312e6a7067),
(3, 'Asus vivobook 15 A516JAO', 'Intel core i3-2,1ghz', '2.1 - 3.4 GHz', 4, 512, 'onboard', 'Windows 11', '8', 6760000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303632343137343835372d312e4a5047),
(4, 'Lenovo V14', 'AMD Ryzen 3- 3,5ghz', '>3.5 GHz', 8, 1000, 'dedicated', 'Windows 11', '7', 7500000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303632343137353031332d312e6a7067),
(5, 'HP 14sCF2517TU', 'Intel core i3-2,1ghz', '2.1 - 3.4 GHz', 4, 256, 'onboard', 'Windows 10 home', '8', 6650000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303632343137353132362d312e4a5047),
(7, 'asus', 'intel i5', '2.1 - 3.4 GHz', 6, 512, 'onboard', 'Windows 10 pro', '7', 8000000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303832393034333431312d312e6a7067),
(8, 'acer', 'intel i7', '2.1 - 3.4 GHz', 8, 512, 'dedicated', 'Windows 10 pro', '9', 7000000, 'toko01', 0x687474703a2f2f6c6f63616c686f73742f70696c69686c6170746f702f6170692f70726f64756374732f32303232303832393035333931342d312e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `tb_seller_agent`
--

CREATE TABLE `tb_seller_agent` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `store_name` varchar(30) NOT NULL,
  `session` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_seller_agent`
--

INSERT INTO `tb_seller_agent` (`id`, `username`, `phone_no`, `password`, `store_name`, `session`) VALUES
(1, 'admin', '089670674442', 'YWRtaW4=', 'toko01', 'toko01-292908082222'),
(2, 'daffa', '0812345678', 'ZGFmZmE=', 'store2', 'store2-191907072222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bobot_kriteria`
--
ALTER TABLE `tb_bobot_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bobot_normalisasi`
--
ALTER TABLE `tb_bobot_normalisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_laptop`
--
ALTER TABLE `tb_laptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_seller_agent`
--
ALTER TABLE `tb_seller_agent`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bobot_kriteria`
--
ALTER TABLE `tb_bobot_kriteria`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_bobot_normalisasi`
--
ALTER TABLE `tb_bobot_normalisasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_laptop`
--
ALTER TABLE `tb_laptop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_seller_agent`
--
ALTER TABLE `tb_seller_agent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
