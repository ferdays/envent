-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2015 at 06:42 AM
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
  `KONDISI` enum('Baik','Kurang baik','Rusak') NOT NULL,
  `TANGGAL_PEMBELIAN` date DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT '1',
  `KODE_BARANG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_2` (`JENIS_BARANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `TANGGAL_KEMBALI` datetime DEFAULT NULL,
  `STATUS` enum('Ada','Tidak') NOT NULL,
  PRIMARY KEY (`PEMINJAM_ID`),
  KEY `FK_PEMINJAM_BARANG` (`BARANG_ID`),
  KEY `FK_USER_PEMINJAM` (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
(3, 'yadss', 'yadss', 'user', 'yadi muhammad rojab', 'XI RPL B', 'laki-laki', 1314041263, '', NULL, 'default.png', '#1BBC9B');

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
  ADD CONSTRAINT `FK_USER_RECENT` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`USER_ID`),
  ADD CONSTRAINT `FK_RECENT_PEMINJAM` FOREIGN KEY (`PEMINJAM_ID`) REFERENCES `peminjam` (`PEMINJAM_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
