-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2015 at 02:21 AM
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
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `FOTO_BARANG` varchar(500) DEFAULT NULL,
  `KONDISI` varchar(20) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `TANGGAL_PEMBELIAN` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`BARANG_ID`),
  KEY `FK_RELATIONSHIP_2` (`JENIS_BARANG_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`BARANG_ID`, `JENIS_BARANG_ID`, `KODE_BARANG`, `MERK_BARANG`, `NAMA_BARANG`, `FOTO_BARANG`, `KONDISI`, `STATUS`, `TANGGAL_PEMBELIAN`, `jumlah`) VALUES
(4, 1, '', 'AXIOO', NULL, NULL, 'BAIK', NULL, NULL, 0),
(5, 1, '', 'XENOM', NULL, NULL, 'BAIK', NULL, NULL, 1),
(6, 1, '', 'XENOM', NULL, NULL, 'BAIK', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE IF NOT EXISTS `jenis_barang` (
  `JENIS_BARANG_ID` int(11) NOT NULL,
  `JENIS_BARANG` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`JENIS_BARANG_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`JENIS_BARANG_ID`, `JENIS_BARANG`) VALUES
(1, 'Laptop'),
(2, 'Speaker'),
(3, 'Dslr'),
(4, 'proyektor'),
(5, 'handycam'),
(6, 'PocketCam'),
(7, 'Gitar'),
(8, 'MovieCam'),
(9, 'Jimbe');

-- --------------------------------------------------------

--
-- Table structure for table `kritik_dan_saran`
--

CREATE TABLE IF NOT EXISTS `kritik_dan_saran` (
  `kritiksaran_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `kritiksaran` text NOT NULL,
  PRIMARY KEY (`kritiksaran_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `kritik_dan_saran`
--

INSERT INTO `kritik_dan_saran` (`kritiksaran_id`, `nama`, `kritiksaran`) VALUES
(1, 'asrulsujani', 'sa');

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
  PRIMARY KEY (`PEMINJAM_ID`),
  KEY `FK_PEMINJAM_BARANG` (`BARANG_ID`),
  KEY `FK_USER_PEMINJAM` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`PEMINJAM_ID`, `USER_ID`, `BARANG_ID`, `TANGGAL_PINJAM`, `TANGGAL_KEMBALI`) VALUES
(6, 10, 4, '2015-03-02 19:51:10', NULL),
(7, 10, 6, '2015-03-02 19:55:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `TIPE` varchar(100) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `KELAS` varchar(20) NOT NULL,
  `JENIS_KELAMIN` varchar(15) DEFAULT NULL,
  `NO_TELPON` decimal(20,0) NOT NULL,
  `ALAMAT` varchar(200) NOT NULL,
  `BANYAK_MEMINJAM` decimal(8,0) DEFAULT '0',
  `FOTO` varchar(500) DEFAULT NULL,
  `BACKGROUND` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `USERNAME`, `PASSWORD`, `TIPE`, `NAMA`, `KELAS`, `JENIS_KELAMIN`, `NO_TELPON`, `ALAMAT`, `BANYAK_MEMINJAM`, `FOTO`, `BACKGROUND`) VALUES
(2, 'admin', 'admin', 'admin', 'admin', '', NULL, '0', '', NULL, NULL, NULL),
(3, 'ferday', 'ferday', 'user', 'ferdiansyah', 'XII RPL A', 'laki-laki', '62819314068402', 'Padalarang', NULL, '10930935_407321209437627_6976408568037508710_n.jpg', '#000'),
(10, 'yadss', 'yadss', 'user', 'yadi', 'rpl', 'laki-laki', '0', '', '2', 'now kis.png', '#1BBC9B'),
(11, 'acus', 'acus', 'user', 'acus', '10', 'laki-laki', '0', '', NULL, 'default.png', '#1BBC9B');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
