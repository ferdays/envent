-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2015 at 09:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `envent`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_BARANG_ID` int(11) NOT NULL,
  `MERK_BARANG` varchar(100) DEFAULT NULL,
  `FOTO_BARANG` varchar(500) DEFAULT '../page/foto/barang/default.jpg',
  `KONDISI` enum('Baik','Kurang baik','Rusak') NOT NULL,
  `TANGGAL_PEMBELIAN` date DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT '1',
  `KODE_BARANG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_2` (`JENIS_BARANG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`BARANG_ID`, `JENIS_BARANG_ID`, `MERK_BARANG`, `FOTO_BARANG`, `KONDISI`, `TANGGAL_PEMBELIAN`, `JUMLAH`, `KODE_BARANG`) VALUES
(56, 2, 'Olympic', '../page/foto/barang/iykwim.png', 'Baik', NULL, 1, '2000'),
(58, 1, 'Axoo', '../page/foto/barang/patrick rela.jpg', 'Baik', NULL, 1, '1000'),
(59, 1, 'Axoo', '../page/foto/barang/patrick rela.jpg', 'Baik', NULL, 1, '1001'),
(60, 3, 'Swis', '../page/foto/barang/fap fap.png', 'Baik', NULL, 1, '3000'),
(61, 4, 'Nike', '../page/foto/barang/iykwim.png', 'Baik', NULL, 1, '4000'),
(62, 4, 'Nike', '../page/foto/barang/iykwim.png', 'Baik', NULL, 1, '4001'),
(63, 4, 'Nike', '../page/foto/barang/iykwim.png', 'Baik', NULL, 1, '4002'),
(64, 5, 'Canon', '../page/foto/barang/bahagia itu ya ini.jpg', 'Baik', NULL, 1, '5000'),
(65, 6, 'Sony', '../page/foto/barang/bacaan-doa-qunut-dan-terjemahannya.jpg', 'Baik', NULL, 1, '6000'),
(66, 7, 'Olympic', '../page/foto/barang/fap fap.png', 'Baik', NULL, 1, '7000'),
(67, 7, 'Olympic', '../page/foto/barang/fap fap.png', 'Baik', NULL, 1, '7001'),
(68, 8, 'BenQ', '../page/foto/barang/patrick rela.jpg', 'Baik', NULL, 1, '8000'),
(69, 9, 'Adidas', '../page/foto/barang/senpai yamete.jpg', 'Baik', NULL, 1, '9000'),
(70, 10, 'Iphone', '../page/foto/barang/fap fap.png', 'Baik', NULL, 1, '10000'),
(71, 10, 'Iphone', '../page/foto/barang/fap fap.png', 'Baik', NULL, 1, '10001');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `JENIS_BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_BARANG` varchar(100) NOT NULL,
  `STATUS` enum('Bisa','Tidak bisa') NOT NULL,
  PRIMARY KEY (`JENIS_BARANG_ID`),
  UNIQUE KEY `JENIS_BARANG` (`JENIS_BARANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`JENIS_BARANG_ID`, `JENIS_BARANG`, `STATUS`) VALUES
(1, 'laptop', 'Bisa'),
(2, 'Kursi', 'Tidak bisa'),
(3, 'Jam Dinding', 'Tidak bisa'),
(4, 'Sepatu', 'Bisa'),
(5, 'Camera DSLR', 'Bisa'),
(6, 'Camera Movie', 'Bisa'),
(7, 'Meja', 'Tidak bisa'),
(8, 'Proyektor', 'Bisa'),
(9, 'Bola Basket', 'Bisa'),
(10, 'Handphone', 'Bisa');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_dan_saran`
--

CREATE TABLE IF NOT EXISTS `kritik_dan_saran` (
  `KRITIK_DAN_SARAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) NOT NULL,
  `KRITIK_DAN_SARAN` text NOT NULL,
  PRIMARY KEY (`KRITIK_DAN_SARAN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE IF NOT EXISTS `peminjam` (
  `PEMINJAM_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `BARANG_ID` int(11) NOT NULL,
  `TANGGAL_PINJAM` datetime DEFAULT NULL,
  `TANGGAL_KEMBALI` datetime DEFAULT '0000-00-00 00:00:00',
  `PINJAM` enum('wait','yes','no') DEFAULT NULL,
  `kembali` enum('wait','yes','no') DEFAULT NULL,
  PRIMARY KEY (`PEMINJAM_ID`),
  KEY `FK_PEMINJAM_BARANG` (`BARANG_ID`),
  KEY `FK_USER_PEMINJAM` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`PEMINJAM_ID`, `USER_ID`, `BARANG_ID`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`, `PINJAM`, `kembali`) VALUES
(101, 3, 58, '2015-03-26 14:44:09', '2015-03-26 15:05:45', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE IF NOT EXISTS `recent` (
  `RECENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEMINJAM_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `JENIS` varchar(50) DEFAULT NULL,
  `TANGGAL_PINJAM` datetime DEFAULT NULL,
  `TANGGAL_KEMBALI` datetime DEFAULT NULL,
  PRIMARY KEY (`RECENT_ID`),
  KEY `FK_RECENT_PEMINJAM` (`PEMINJAM_ID`),
  KEY `FK_USER_RECENT` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`RECENT_ID`, `PEMINJAM_ID`, `USER_ID`, `NAMA`, `JENIS`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`) VALUES
(26, 101, 3, 'Yadi Muhammad Rojab', '1', '2015-03-26 14:46:34', NULL),
(29, 101, 3, 'Yadi Muhammad Rojab', '1', NULL, '2015-03-26 15:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TIPE` varchar(100) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `KELAS` varchar(20) NOT NULL,
  `JENIS_KELAMIN` varchar(15) DEFAULT NULL,
  `NIS` int(11) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `BANYAK_MEMINJAM` int(11) DEFAULT NULL,
  `FOTO` varchar(500) DEFAULT NULL,
  `BACKGROUND` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `NIS` (`NIS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `TIPE`, `NAMA`, `KELAS`, `JENIS_KELAMIN`, `NIS`, `ALAMAT`, `BANYAK_MEMINJAM`, `FOTO`, `BACKGROUND`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin ', 'laki-laki', 0, 'admin@admin', NULL, NULL, NULL),
(3, 'yadss', 'yadss', 'user', 'Yadi Muhammad Rojab', 'XI RPL B', 'laki-laki', 1314041263, '', 1, 'pramuka jangan galau.jpg', '#1BBC9B');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`JENIS_BARANG_ID`) REFERENCES `jenis_barang` (`JENIS_BARANG_ID`);

--
-- Constraints for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD CONSTRAINT `FK_PEMINJAM_BARANG` FOREIGN KEY (`BARANG_ID`) REFERENCES `barang` (`BARANG_ID`),
  ADD CONSTRAINT `FK_USER_PEMINJAM` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

--
-- Constraints for table `recent`
--
ALTER TABLE `recent`
  ADD CONSTRAINT `FK_RECENT_PEMINJAM` FOREIGN KEY (`PEMINJAM_ID`) REFERENCES `peminjam` (`PEMINJAM_ID`),
  ADD CONSTRAINT `FK_USER_RECENT` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
