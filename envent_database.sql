-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2015 at 03:29 AM
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
  `KODE_BARANG` varchar(20) NOT NULL,
  `MERK_BARANG` varchar(100) DEFAULT NULL,
  `FOTO_BARANG` varchar(500) DEFAULT NULL,
  `KONDISI` varchar(20) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `TANGGAL_PEMBELIAN` date DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT '1',
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_2` (`JENIS_BARANG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `JENIS_BARANG_ID` int(11) NOT NULL,
  `JENIS_BARANG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`JENIS_BARANG_ID`),
  UNIQUE KEY `JENIS_BARANG` (`JENIS_BARANG`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`JENIS_BARANG_ID`, `JENIS_BARANG`) VALUES
(3, 'Dslr'),
(7, 'Gitar'),
(5, 'HandyCam'),
(9, 'Jimbe'),
(1, 'Laptop'),
(8, 'MovieCam'),
(6, 'PocketCam'),
(4, 'Proyektor'),
(2, 'Speaker');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=706 ;

-- --------------------------------------------------------

--
-- Table structure for table `recent`
--

CREATE TABLE IF NOT EXISTS `recent` (
  `RECENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PEMINJAM_ID` int(11) NOT NULL,
  `NAMA` varchar(100) DEFAULT NULL,
  `JENIS` varchar(50) DEFAULT NULL,
  `TANGGAL_PINJAM` datetime DEFAULT NULL,
  `TANGGAL_KEMBALI` datetime DEFAULT NULL,
  PRIMARY KEY (`RECENT_ID`),
  KEY `FK_RECENT_PEMINJAM` (`PEMINJAM_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
  `NO_TELPON` varchar(15) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `BANYAK_MEMINJAM` decimal(8,0) DEFAULT NULL,
  `FOTO` varchar(500) DEFAULT NULL,
  `BACKGROUND` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `TIPE`, `NAMA`, `KELAS`, `JENIS_KELAMIN`, `NO_TELPON`, `ALAMAT`, `BANYAK_MEMINJAM`, `FOTO`, `BACKGROUND`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'Program', 'laki-laki', '089667935047', 'Padalarang', NULL, NULL, NULL),
(2, 'yadss', 'yadss', 'user', 'Yadi Muhammad R', 'XI RPL B', 'laki-laki', '', '', '5', '10440282_791497177608118_8428294090069473116_n.jpg', '#1BBC9B'),
(3, 'ferday', 'ferday', 'user', 'Perdi Ferdiansyah', 'XI PEMASARAN B', 'laki-laki', '', '', '18', 'fap fap.png', '#1BBC9B'),
(4, 'acus', 'acus', 'user', 'Hendi Agusti', 'XI AGRO B', 'laki-laki', '', '', '2', '21.jpg', '#1BBC9B'),
(5, 'marjan', 'marjan', 'user', 'Marza Ayu Annisa', 'XI TKJ B', 'perempuan', '+62898989898989', 'Batujajar', '3', 'iykwim cewe.jpg', '#1BBC9B'),
(6, 'user', 'user', 'user', 'ini user', 'user', 'laki-laki', '+62', '', '1', 'panji Ambalan copy.png', '#1BBC9B');

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
  ADD CONSTRAINT `FK_RECENT_PEMINJAM` FOREIGN KEY (`PEMINJAM_ID`) REFERENCES `peminjam` (`PEMINJAM_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
