-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2014 at 03:09 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gd_sirs`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `kd_dokter` int(11) NOT NULL AUTO_INCREMENT,
  `kd_poli` int(11) NOT NULL,
  `tgl_kunjungan` int(12) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `nm_dokter` varchar(300) NOT NULL,
  `sip` enum('pagi','siang','malam','') NOT NULL,
  `tmpat_lhr` varchar(300) NOT NULL,
  `no_tlp` varchar(14) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  PRIMARY KEY (`kd_dokter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `kd_poli`, `tgl_kunjungan`, `kd_user`, `nm_dokter`, `sip`, `tmpat_lhr`, `no_tlp`, `alamat`) VALUES
(5, 2, 1410530415, 9, 'Maful Prayoga Arnandi', '', 'Banjarnegara', '0892112312', 'Punggelan, Banjarnegara'),
(6, 2, 1410530573, 9, 'Rasya P Arnandi', '', '', '886789678966', 'Banjarnegara'),
(7, 1, 2014, 10, 'Mama', '', '', '284924', 'Klapa'),
(8, 1, 1410613435, 9, 'Bapa', '', '', '323', 'Kalimanah');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `tgl_kunjungan` date NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `kd_poli` int(11) NOT NULL,
  `jam_kunjungan` time NOT NULL,
  `kd_kunjungan` int(12) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`kd_kunjungan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`tgl_kunjungan`, `no_pasien`, `kd_poli`, `jam_kunjungan`, `kd_kunjungan`) VALUES
('2014-02-19', 16, 2, '06:44:00', 6),
('2014-09-11', 19, 2, '01:37:00', 7),
('2014-09-11', 22, 1, '05:21:00', 8),
('2014-09-11', 18, 1, '05:05:00', 9),
('2014-09-11', 20, 2, '05:20:00', 10);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorium`
--

CREATE TABLE IF NOT EXISTS `laboratorium` (
  `kd_lab` int(11) NOT NULL AUTO_INCREMENT,
  `no_rm` int(11) NOT NULL,
  `hasil_lab` varchar(300) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`kd_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `laboratorium`
--

INSERT INTO `laboratorium` (`kd_lab`, `no_rm`, `hasil_lab`, `ket`) VALUES
(4, 6, 'Berhasil', 'Berhasil Uji Laborat'),
(5, 6, 'Gagal', 'Kekurangan Peralatan'),
(6, 6, 'Berhasil', 'Berhasil melakukan uji coba.'),
(7, 5, 'Berhasil Uji Coba', 'Pengujian kadar gula darah pada pasien');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`kd_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`kd_user`, `username`, `password`, `nama`, `alamat`) VALUES
(9, 'maful', '3532c59f0f59e9fc8b2c9ea41e24b196', 'Maful P Arnandi', 'Klapa, Punggelan, Banjarnegara.');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kd_obat` int(11) NOT NULL AUTO_INCREMENT,
  `nm_obat` varchar(300) NOT NULL,
  `jml_obat` int(11) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `harga` int(25) NOT NULL,
  PRIMARY KEY (`kd_obat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `jml_obat`, `ukuran`, `harga`) VALUES
(1, 'Paracetamol', 10, 10, 10000),
(4, 'Jamu kamu', 20, 2, 200000),
(5, 'Komik', 200, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `no_pasien` int(11) NOT NULL AUTO_INCREMENT,
  `nm_pasien` varchar(300) NOT NULL,
  `j_kel` varchar(100) NOT NULL,
  `agama` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `usia` int(3) NOT NULL,
  `no_tlp` int(14) NOT NULL,
  `nm_kk` varchar(300) NOT NULL,
  `hub_kel` varchar(100) NOT NULL,
  PRIMARY KEY (`no_pasien`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`no_pasien`, `nm_pasien`, `j_kel`, `agama`, `alamat`, `tgl_lhr`, `usia`, `no_tlp`, `nm_kk`, `hub_kel`) VALUES
(16, 'Meni Riatri', 'Wanita', 'Islam', 'Punggelan', '1996-01-06', 18, 123123, 'Sugiarso Sudir', 'Anak Kandung'),
(18, 'Anggit Pratitis', 'Pria', 'Islam', 'Punggelan', '1996-01-06', 18, 123123, 'Sugiarso Sudir', 'Anak Kandung'),
(19, 'Dea Melinda Utami', 'Wanita', 'Islam', 'Punggelan', '2013-01-06', 1, 123123, 'David', 'Anak Kandung'),
(20, 'David', 'Pria', 'Islam', 'Punggelan', '1986-01-06', 24, 123123, 'Prayit', 'Anak Kandung'),
(21, 'Tetuko Abdi Maknapara Faisal', 'Pria', 'Islam', 'Banjar Kulon', '1998-01-06', 16, 2147483647, 'Faisal', 'Anak Kandung'),
(22, 'Azhar Fadillah', 'Pria', 'Islam', 'Pucang', '1998-05-01', 16, 123123, 'Fadil', 'Anak Kandung'),
(23, 'Catur Fery Cahyanto', 'Pria', 'Islam', 'Mandiraja', '1998-05-05', 16, 2147483647, 'Fery', 'Anak Kandung');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE IF NOT EXISTS `poliklinik` (
  `kd_poli` int(11) NOT NULL AUTO_INCREMENT,
  `nm_poli` varchar(300) NOT NULL,
  `lantai` int(11) NOT NULL,
  PRIMARY KEY (`kd_poli`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`kd_poli`, `nm_poli`, `lantai`) VALUES
(1, 'Poli Perut', 4),
(2, 'Poli Hidung dan Tenggorokan', 1),
(4, 'Poli Telinga', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE IF NOT EXISTS `rekam_medis` (
  `no_rm` int(11) NOT NULL AUTO_INCREMENT,
  `kd_tindakan` int(11) NOT NULL,
  `kd_obat` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `no_pasien` int(11) NOT NULL,
  `diagnosa` varchar(300) NOT NULL,
  `resep` varchar(300) NOT NULL,
  `keluhan` varchar(300) NOT NULL,
  `tgl_pemeriksaan` int(12) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`no_rm`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`no_rm`, `kd_tindakan`, `kd_obat`, `kd_user`, `no_pasien`, `diagnosa`, `resep`, `keluhan`, `tgl_pemeriksaan`, `ket`) VALUES
(6, 2, 2, 2, 18, 'stadium', 'Infotermida', 'letih', 1410044752, 'sakit parah'),
(8, 2, 2, 2, 19, 'terjangkit', 'Minum Obat', 'pusing kepala', 1410530415, 'sakit kentut'),
(9, 5, 1, 9, 18, 'terjangkit', '3 kali sehari', 'Nyeri Otot', 1410530573, 'sasasa'),
(10, 5, 1, 9, 16, 'gejala', '2 kali sehari', 'Sakit Pinggang', 1410530415, 'Diberi Obat');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE IF NOT EXISTS `tindakan` (
  `kd_tindakan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tindakan` varchar(300) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`kd_tindakan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`kd_tindakan`, `nm_tindakan`, `ket`) VALUES
(5, 'Rawat Inap', 'Di Rawat di Rumah Sakit'),
(7, 'Rawat Inap', 'UPT Puskesmas 1'),
(8, 'Rawat Jalan', 'Rawat Jalan dengan minum obat teratur');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
