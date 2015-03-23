-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2015 at 07:14 AM
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
  `FOTO_BARANG` varchar(500) DEFAULT NULL,
  `KONDISI` varchar(20) DEFAULT NULL,
  `TANGGAL_PEMBELIAN` date DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT '1',
  `KODE_BARANG` varchar(15) NOT NULL,
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_2` (`JENIS_BARANG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`BARANG_ID`, `JENIS_BARANG_ID`, `MERK_BARANG`, `FOTO_BARANG`, `KONDISI`, `TANGGAL_PEMBELIAN`, `JUMLAH`, `KODE_BARANG`) VALUES
(17, 1, 'AXIOO', NULL, 'BAIK', NULL, 1, '1000'),
(18, 1, 'AXIOO', NULL, 'BAIK', NULL, 1, '1001'),
(19, 1, 'XENOM', NULL, 'BAIK', NULL, 1, '1002'),
(20, 1, 'XENOM', NULL, 'BAIK', NULL, 1, '1003'),
(21, 1, 'XENOM', NULL, 'BAIK', NULL, 1, '1004'),
(22, 5, 'Toshiba', NULL, 'BAIK', NULL, 1, '5000'),
(23, 9, 'Yamaha', NULL, 'BAIK', NULL, 1, '9000'),
(24, 16, 'Toshiba', NULL, 'BAIK', NULL, 1, '16000'),
(25, 16, 'Toshiba', NULL, 'BAIK', NULL, 1, '16001');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `JENIS_BARANG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `JENIS_BARANG` varchar(50) DEFAULT NULL,
  `status` enum('bisa','tidak bisa') NOT NULL DEFAULT 'bisa',
  PRIMARY KEY (`JENIS_BARANG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`JENIS_BARANG_ID`, `JENIS_BARANG`, `status`) VALUES
(1, 'Laptop', 'bisa'),
(2, 'Speaker', 'bisa'),
(3, 'Dslr', 'bisa'),
(4, 'Proyektor', 'bisa'),
(5, 'HandCam', 'bisa'),
(6, 'CamPocket', 'bisa'),
(7, 'Gitar', 'bisa'),
(8, 'MovieCam', 'bisa'),
(9, 'Jimbe', 'bisa'),
(16, 'Mixer', 'bisa');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_dan_saran`
--

CREATE TABLE IF NOT EXISTS `kritik_dan_saran` (
  `KRITIK_DAN_SARAN_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USER_ID` int(11) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `KRITIKSARAN` text,
  PRIMARY KEY (`KRITIK_DAN_SARAN_ID`),
  KEY `FK_USER_KRITIK` (`USER_ID`)
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
  PRIMARY KEY (`PEMINJAM_ID`),
  KEY `FK_PEMINJAM_BARANG` (`BARANG_ID`),
  KEY `FK_USER_PEMINJAM` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=905 ;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`PEMINJAM_ID`, `USER_ID`, `BARANG_ID`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`) VALUES
(101, 4, 17, '2015-03-23 12:50:37', '2015-03-23 12:50:53'),
(102, 4, 18, '2015-03-23 12:52:18', '2015-03-23 12:54:42');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `recent`
--

INSERT INTO `recent` (`RECENT_ID`, `PEMINJAM_ID`, `USER_ID`, `NAMA`, `JENIS`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`) VALUES
(20, 102, 4, 'yadi muhammad r', '1', '2015-03-23 12:52:18', NULL),
(21, 102, 4, 'yadi muhammad r', '1', NULL, '2015-03-23 12:54:42');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(20) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TIPE` varchar(100) DEFAULT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `KELAS` varchar(20) NOT NULL,
  `JENIS_KELAMIN` varchar(15) DEFAULT NULL,
  `NO_TELPON` varchar(15) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `BANYAK_MEMINJAM` decimal(8,0) DEFAULT NULL,
  `FOTO` varchar(500) DEFAULT NULL,
  `BACKGROUND` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `TIPE`, `NAMA`, `KELAS`, `JENIS_KELAMIN`, `NO_TELPON`, `ALAMAT`, `BANYAK_MEMINJAM`, `FOTO`, `BACKGROUND`) VALUES
(3, 'admin', 'admin', 'admin', 'admin', 'admin', 'laki-laki', '089667935047', 'cimahi', NULL, NULL, NULL),
(4, 'yadss', 'yadss', 'user', 'yadi muhammad r', 'XI RPL B', 'laki-laki', '', '', '4', 'default.png', '#1BBC9B');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_RELATIONSHIP_2` FOREIGN KEY (`JENIS_BARANG_ID`) REFERENCES `jenis_barang` (`JENIS_BARANG_ID`);

--
-- Constraints for table `kritik_dan_saran`
--
ALTER TABLE `kritik_dan_saran`
  ADD CONSTRAINT `FK_USER_KRITIK` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`);

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
