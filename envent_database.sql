-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2015 at 02:49 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`BARANG_ID`, `JENIS_BARANG_ID`, `MERK_BARANG`, `FOTO_BARANG`, `KONDISI`, `TANGGAL_PEMBELIAN`, `JUMLAH`, `KODE_BARANG`) VALUES
(1, 1, 'Acer', NULL, 'Baik', NULL, 1, '1000'),
(2, 1, 'Samsung', NULL, 'Kurang baik', NULL, 0, '1001'),
(3, 1, 'xenom', NULL, 'Baik', NULL, 1, '1002'),
(4, 2, 'olympic', '', 'Baik', NULL, 1, '2000'),
(5, 3, 'toshiba', '', 'Baik', NULL, 1, '3000'),
(6, 4, 'yamaha', '', 'Baik', NULL, 1, '4000'),
(7, 5, 'apple', '', 'Baik', NULL, 1, '5000'),
(8, 6, 'iphone', '', 'Baik', NULL, 1, '6000'),
(9, 6, 'iphone', '', 'Baik', NULL, 1, '6001'),
(10, 6, 'iphone', '', 'Baik', NULL, 1, '6002'),
(11, 6, 'iphone', '', 'Baik', NULL, 1, '6003'),
(12, 6, 'iphone', '', 'Baik', NULL, 1, '6004'),
(13, 6, 'iphone', '', 'Baik', NULL, 1, '6005'),
(14, 6, 'iphone', '', 'Baik', NULL, 1, '6006'),
(15, 6, 'iphone', '', 'Baik', NULL, 1, '6007'),
(16, 14, 'swis', '', 'Baik', NULL, 1, '14000'),
(17, 14, 'swis', 'Screenshot_1.png', 'Baik', NULL, 1, '14001'),
(18, 14, 'swis', NULL, 'Baik', NULL, 1, '14002'),
(19, 17, 'faber castel', NULL, 'Baik', NULL, 1, '17000'),
(20, 18, 'adidas', NULL, 'Baik', NULL, 1, '18000'),
(21, 19, 'Nike', NULL, 'Baik', NULL, 1, '19000'),
(22, 19, 'Nike', NULL, 'Baik', NULL, 1, '19001'),
(23, 19, 'Nike', NULL, 'Baik', NULL, 1, '19002'),
(24, 19, 'Nike', NULL, 'Baik', NULL, 1, '19003'),
(25, 19, 'Nike', NULL, 'Baik', NULL, 1, '19004'),
(26, 19, 'Nike', '../page/foto/barang/yadss penempuhan laksana.jpg', 'Baik', NULL, 1, '19005'),
(27, 25, 'Mangudins', '../page/foto/barang/yadss burangrang rame.jpg', 'Baik', NULL, 1, '25000'),
(28, 25, 'Mangudins', '../page/foto/barang/yadss burangrang rame.jpg', 'Baik', NULL, 1, '25001'),
(29, 25, 'Mangudins', '../page/foto/barang/yadss burangrang rame.jpg', 'Baik', NULL, 1, '25002'),
(33, 1, 'VAIO', NULL, 'Baik', NULL, 1, '1003'),
(34, 1, 'VAIO', NULL, 'Baik', NULL, 1, '1004'),
(35, 1, 'VAIO', '../page/foto/barang/Picture2.png', 'Baik', NULL, 1, '1005'),
(36, 1, 'VAIO', '../page/foto/barang/Picture2.png', 'Baik', NULL, 1, '1006'),
(37, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28000'),
(38, 28, 'olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28001'),
(39, 28, 'olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28002'),
(40, 28, 'olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28003'),
(41, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28004'),
(42, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28005'),
(43, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28006'),
(44, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28007'),
(45, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28008'),
(46, 28, 'Olympic', '../page/foto/barang/', 'Baik', NULL, 1, '28009'),
(47, 35, 'Nike', '../page/foto/barang/Screenshot_5.png', 'Baik', NULL, 1, '35000'),
(48, 36, 'Adidas', '../page/foto/barang/Screenshot_26.png', 'Baik', NULL, 1, '36000'),
(49, 36, 'Adidas', '../page/foto/barang/Screenshot_26.png', 'Baik', NULL, 1, '36001'),
(50, 36, 'Adidas', '../page/foto/barang/Screenshot_26.png', 'Baik', NULL, 1, '36002'),
(51, 39, 'PDL', '../page/foto/barang/Untitled-1.png', 'Baik', NULL, 1, '39000'),
(52, 39, 'PDL', '../page/foto/barang/Untitled-1.png', 'Baik', NULL, 1, '39001'),
(53, 41, 'QQ', '../page/foto/barang/1459187_869444979756965_502821816859235038_n.jpg', 'Baik', NULL, 1, '41000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`JENIS_BARANG_ID`, `JENIS_BARANG`, `STATUS`) VALUES
(1, 'laptop', 'Bisa'),
(2, 'kursi', 'Bisa'),
(3, 'handycam', 'Bisa'),
(4, 'gitar', 'Bisa'),
(5, 'ipad', 'Bisa'),
(6, 'handphone', 'Bisa'),
(14, 'jam', 'Bisa'),
(17, 'pensil', 'Bisa'),
(18, 'bola basket', 'Bisa'),
(19, 'Bola Tenis', 'Bisa'),
(25, 'Gawang', 'Bisa'),
(28, 'Meja', 'Tidak bisa'),
(35, 'Sepatu', 'Bisa'),
(36, 'Bola volly', 'Bisa'),
(39, 'Baju', 'Bisa'),
(41, 'Jam Dinding', 'Tidak bisa');

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
  `CONFIRM` enum('Ada','Tidak') NOT NULL,
  PRIMARY KEY (`PEMINJAM_ID`),
  KEY `FK_PEMINJAM_BARANG` (`BARANG_ID`),
  KEY `FK_USER_PEMINJAM` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1703 ;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`PEMINJAM_ID`, `USER_ID`, `BARANG_ID`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`, `CONFIRM`) VALUES
(101, 3, 1, '2015-03-25 10:42:02', '2015-03-25 11:15:50', 'Ada'),
(103, 3, 2, '2015-03-25 11:45:16', '0000-00-00 00:00:00', 'Ada'),
(1702, 3, 19, '2015-03-25 11:32:15', '2015-03-25 11:38:45', 'Ada');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`RECENT_ID`, `PEMINJAM_ID`, `USER_ID`, `NAMA`, `JENIS`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`) VALUES
(5, 1702, 3, 'Yadi Muhammad Rojab', '17', '2015-03-25 11:32:15', NULL),
(6, 1702, 3, 'Yadi Muhammad Rojab', '17', NULL, '2015-03-25 11:38:45'),
(7, 103, 3, 'Yadi Muhammad Rojab', '1', '2015-03-25 11:45:16', NULL);

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
(3, 'yadss', 'yadss', 'user', 'Yadi Muhammad Rojab', 'XI RPL B', 'laki-laki', 1314041263, '', 3, 'pramuka jangan galau.jpg', '#1BBC9B');

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
