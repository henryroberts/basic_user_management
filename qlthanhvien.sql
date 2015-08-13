-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2015 at 01:44 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlthanhvien`
--

-- --------------------------------------------------------

--
-- Table structure for table `thanh_vien`
--

CREATE TABLE IF NOT EXISTS `thanh_vien` (
`id_thanhvien` int(10) NOT NULL,
  `tai_khoan` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `quyen_truy_cap` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `thanh_vien`
--

INSERT INTO `thanh_vien` (`id_thanhvien`, `tai_khoan`, `mat_khau`, `quyen_truy_cap`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2),
(2, 'demo', '25d55ad283aa400af464c76d713c07ad', 2),
(3, 'quantrivien1', '25d55ad283aa400af464c76d713c07ad', 2),
(4, 'quantrivien2', '25d55ad283aa400af464c76d713c07ad', 2),
(5, 'member1', '25d55ad283aa400af464c76d713c07ad', 1),
(6, 'member2', '25d55ad283aa400af464c76d713c07ad', 1),
(7, 'member3', '25d55ad283aa400af464c76d713c07ad', 1),
(8, 'member4', '25d55ad283aa400af464c76d713c07ad', 1),
(9, 'member5', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `thanh_vien`
--
ALTER TABLE `thanh_vien`
 ADD PRIMARY KEY (`id_thanhvien`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thanh_vien`
--
ALTER TABLE `thanh_vien`
MODIFY `id_thanhvien` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
