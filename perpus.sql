-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2015 at 08:37 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(3) NOT NULL AUTO_INCREMENT,
  `nm_anggota` varchar(32) DEFAULT NULL,
  `alamat` text,
  `ttl_anggota` text,
  `status_anggota` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nm_anggota`, `alamat`, `ttl_anggota`, `status_anggota`) VALUES
(2, 'achmad', 'bandar jaya', 'bandar jaya, 17 juni 1993', '1'),
(3, 'Solihin', 'tanjung bintang', 'tanjung bintang, 1 januari 1993\r\n', '1'),
(4, 'joko', 'blitang', 'blitang 2 februari 1992', '1'),
(5, 'nelwan', 'bandar lampung ', 'bandar lampung 22 juni 1990', '1'),
(6, 'dodi', 'metro', 'metro, 11 januari 1993', '1'),
(7, 'doni', 'pringsewu', 'pringsewu, 30 januari 1990', '1'),
(8, 'abang', 'nunyai', 'kotabumi, 1 januari 1990', '1');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `kd_buku` int(5) NOT NULL,
  `judul_buku` varchar(32) DEFAULT NULL,
  `pengarang` varchar(32) DEFAULT NULL,
  `jenis_buku` varchar(32) DEFAULT NULL,
  `penerbit` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`kd_buku`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `pengarang`, `jenis_buku`, `penerbit`) VALUES
(23, 'sistem penjualan', 'solihin', 'ta', 'yudhistira'),
(12, 'sistem perpustakaan', 'wahyudi', 'skripsi', 'yudhistira'),
(123, 'basis data', 'badianto', 'buku cetak', 'yudhistira'),
(34, 'android', 'karyono', 'cetak', 'yudhistira'),
(200, 'bahasa arab', 'solihin', 'cetak', 'yudistira');

-- --------------------------------------------------------

--
-- Table structure for table `meminjam`
--

CREATE TABLE IF NOT EXISTS `meminjam` (
  `id_pinjam` int(3) NOT NULL AUTO_INCREMENT,
  `tgl_pinjam` date DEFAULT NULL,
  `jumlah_pinjam` int(2) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `id_anggota` int(3) DEFAULT NULL,
  `kd_buku` varchar(5) DEFAULT NULL,
  `kembali` int(1) NOT NULL,
  PRIMARY KEY (`id_pinjam`),
  KEY `id_anggota` (`id_anggota`),
  KEY `kd_buku` (`kd_buku`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `meminjam`
--

INSERT INTO `meminjam` (`id_pinjam`, `tgl_pinjam`, `jumlah_pinjam`, `tgl_kembali`, `id_anggota`, `kd_buku`, `kembali`) VALUES
(1, '2015-02-03', 1, '2015-02-04', 2, '12', 2),
(3, '2015-02-03', 1, '2015-02-02', 4, '23', 2),
(12, '2015-02-02', 1, '2015-02-02', 3, '23', 2),
(11, '2015-02-02', 1, '2015-02-02', 6, '12', 2),
(10, '2015-02-02', 1, '2015-02-02', 6, '34', 2),
(9, '2015-02-02', 1, '2015-02-03', 5, '123', 2),
(13, '2015-02-03', 1, '2015-02-03', 3, '34', 2),
(14, '2015-02-03', 1, '2015-02-03', 3, '23', 2),
(15, '2015-02-03', 1, '2015-02-03', 4, '123', 2),
(16, '2015-02-17', 1, '2015-02-17', 8, '200', 2),
(17, '2015-04-28', 1, '2015-04-28', 4, '12', 2),
(18, '2015-04-28', 1, '2015-04-28', 5, '12', 2),
(19, '2015-05-11', 1, '2015-05-11', 3, '34', 2),
(20, '2015-05-11', 1, '0000-00-00', 2, '12', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
