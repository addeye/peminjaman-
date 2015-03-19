-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2015 at 09:21 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ruangkelas`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik`
--

CREATE TABLE IF NOT EXISTS `akademik` (
  `ID_AKADEMIK` int(11) NOT NULL,
  `ID_JURUSAN` int(11) NOT NULL,
  `ID_FAKULTAS` int(11) NOT NULL,
  `ID_ANGKATAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik`
--

INSERT INTO `akademik` (`ID_AKADEMIK`, `ID_JURUSAN`, `ID_FAKULTAS`, `ID_ANGKATAN`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
  `ID_ANGKATAN` int(11) NOT NULL AUTO_INCREMENT,
  `ANGKATAN` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ANGKATAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`ID_ANGKATAN`, `ANGKATAN`) VALUES
(1, '2014'),
(2, '2013'),
(3, '2012');

-- --------------------------------------------------------

--
-- Table structure for table `asst_dosen`
--

CREATE TABLE IF NOT EXISTS `asst_dosen` (
  `ID_ASST` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_ASST` varchar(100) NOT NULL,
  `NAMA_ASST` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_ASST`),
  UNIQUE KEY `ID_ASST` (`ID_ASST`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `ID_DOSEN` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_DOSEN` varchar(15) NOT NULL,
  `NAMA_DOSEN` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ID_STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_DOSEN`),
  UNIQUE KEY `KODE_DOSEN` (`ID_DOSEN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`ID_DOSEN`, `NIP_DOSEN`, `NAMA_DOSEN`, `PASSWORD`, `ID_STATUS`) VALUES
(4, '197512032005012', 'Naim Rochmawati,S.Kom.,MT', '197512032005012000', 1),
(5, '197912062008011', 'Dedy Rahman Prehanto, S.Kom', '197912062008011000', 1),
(6, '195709121986031', 'Drs. Bernard Djawa, M.Pd.', '195709121986031000', 1),
(7, '196901251995122', 'Anita Qoiriah, S.Kom., M.Kom', '196901251995122000', 1),
(8, '197512032005012', 'Naim Rochmawati, S.Kom., MT', '197512032005012000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE IF NOT EXISTS `fakultas` (
  `ID_FAKULTAS` int(11) NOT NULL AUTO_INCREMENT,
  `FAKULTAS` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_FAKULTAS`),
  UNIQUE KEY `ID_FAKULTAS` (`ID_FAKULTAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`ID_FAKULTAS`, `FAKULTAS`) VALUES
(1, 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `fungsi_ruangan`
--

CREATE TABLE IF NOT EXISTS `fungsi_ruangan` (
  `ID_FUNGRU` int(11) NOT NULL AUTO_INCREMENT,
  `FUNGSI_RUANGAN` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_FUNGRU`),
  UNIQUE KEY `KODE_FUNGKEL` (`ID_FUNGRU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `fungsi_ruangan`
--

INSERT INTO `fungsi_ruangan` (`ID_FUNGRU`, `FUNGSI_RUANGAN`) VALUES
(2, 'Lab Komputer'),
(3, 'Lapangan'),
(4, 'Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `gedung`
--

CREATE TABLE IF NOT EXISTS `gedung` (
  `ID_GEDUNG` int(11) NOT NULL AUTO_INCREMENT,
  `GEDUNG` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_GEDUNG`),
  UNIQUE KEY `GEDUNG` (`ID_GEDUNG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `gedung`
--

INSERT INTO `gedung` (`ID_GEDUNG`, `GEDUNG`) VALUES
(1, 'B1'),
(2, 'A7'),
(3, 'A5'),
(4, 'Lap.');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE IF NOT EXISTS `hari` (
  `ID_HARI` int(2) NOT NULL AUTO_INCREMENT,
  `HARI` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_HARI`),
  UNIQUE KEY `HARI` (`ID_HARI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`ID_HARI`, `HARI`) VALUES
(1, 'SENIN'),
(2, 'SELASA'),
(3, 'RABU'),
(4, 'KAMIS'),
(5, 'JUMAT');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT,
  `PRODI` varchar(255) NOT NULL,
  `KELAS` varchar(255) NOT NULL,
  `ANGKATAN` varchar(255) NOT NULL,
  `SEMESTER` varchar(255) NOT NULL,
  `TAHUN_AJARAN` varchar(255) NOT NULL,
  `HARI` varchar(255) NOT NULL,
  `JAM` varchar(255) NOT NULL,
  `GEDUNG` varchar(255) NOT NULL,
  `LANTAI` varchar(255) NOT NULL,
  `NO_RUANG` varchar(255) NOT NULL,
  `KODE_MK` varchar(255) NOT NULL,
  `MATA_KULIAH` varchar(255) NOT NULL,
  `SKS` varchar(255) NOT NULL,
  `NAMA_DOSEN` varchar(100) NOT NULL,
  `NAMA_ASST` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_JADWAL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `PRODI`, `KELAS`, `ANGKATAN`, `SEMESTER`, `TAHUN_AJARAN`, `HARI`, `JAM`, `GEDUNG`, `LANTAI`, `NO_RUANG`, `KODE_MK`, `MATA_KULIAH`, `SKS`, `NAMA_DOSEN`, `NAMA_ASST`) VALUES
(1, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SENIN', '3', 'B1', '02', '03', '90320202', 'Pendidikan Pancasila', '2', 'Listyaningsih, S.Pd., M.Pd', '-'),
(2, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SENIN', '5', 'A7', '02', '02', '41323310', 'Dasar Pemrograman', '3', 'Yuni Yamasari, S.Kom., M.Kom', '-'),
(3, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SENIN', '8', 'A7', '02', '02', '41323275', 'Prak. Dasar Pemrograman', '2', 'Yuni Yamasari, S.Kom., M.Kom', '-'),
(4, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '1', 'B1', '02', '02', '41323226', 'Kalkulus I', '2', 'Affiati Oktaviarina', '-'),
(5, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '3', 'Lap.', '-', '-', '90220205', 'Pend. Jasmani & Olaraga', '2', 'Drs. Bernard Djawa, M.Pd.', '-'),
(6, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '5', 'B1', '02', '04', '90320202', 'Bahasa Inggris I', '2', 'Anis Trisusana, S.S.,M.Pd ', '-'),
(7, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '7', 'B1', '02', '01', '41323256', 'Pengantar Teknologi Informasi', '2', 'Dedy Rahman Prehanto, S.Kom', '-'),
(8, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'RABU', '5', 'B1', '02', '03', '41323228', 'Statistika & Probabilitas', '2', 'Aries Dwi Indriyanti, S.Kom., M.Kom', '-'),
(9, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'RABU', '7', 'B1', '02', '02', '41323252', 'Rangkaian Digital', '2', 'Dr. Meini Sondang S., M.Pd', '-'),
(10, 'D3 Manajemen Informatika', 'A', '2014', 'GASAL', '2014/2015', 'JUMAT', '3', 'A5', '02', '02', '41323252', 'Rangkaian Digital (TRS)', '2', 'Dr. Meini Sondang S., M.Pd', '-'),
(11, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'SENIN', '1', 'B1', '02', '03', '41423217', 'Manajemen Jaringan Komputer', '2', 'Asmunin, S.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(12, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'SENIN', '3', 'B1', '02', '02', '41323258', 'Sistem Basis Data I', '2', 'Wiyli Yustanti, S.Si., M.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(13, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'SELASA', '1', 'A7', '02', '02', '41423210', 'Bahasa Pemrogaman Lanjut ', '2', 'Drs. Bambang Sujatmiko, MT', '-'),
(14, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'SELASA', '3', 'A7', '02', '02', '41423101', 'Prak. Bhs. Pemrogaman Lanjut ', '1', 'Drs. Bambang Sujatmiko, MT', '-'),
(15, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'RABU', '1', 'B1', '02', '02', '90220204', 'Bahasa Indonesia', '2', 'Hespi Septiana, S.Pd., M.Pd', '-'),
(16, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'RABU', '3', 'B1', '02', '01', '41423228', 'Interaksi Manusia dan Komp.', '2', 'Rina Harimurti, S.Pd., MT.', '-'),
(17, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'RABU', '5', 'B1', '02', '04', '41423214', 'Jaringan Komputer I ', '2', 'Aditya Prapanca, S.T., M.Kom', '-'),
(18, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'KAMIS', '1', 'A7', '02', '01', '41423105', 'Prak. Jaringan komputer I', '1', 'Aditya Prapanca, S.T., M.Kom', '-'),
(19, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'KAMIS', '3', 'B1', '02', '04', '41323253', 'Sistem Informasi Manajemen', '2', 'Ari Kurniawan, S.Kom., MT', '-'),
(20, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'JUMAT', '1', 'A7', '02', '02', '41423108', 'Prak. Manajemen Jarkom', '1', 'Asmunin, S.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(21, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'JUMAT', '3', 'A7', '02', '02', '41323104', 'Prak. Sistem Basis Data I', '1', 'Wiyli Yustanti, S.Si.,  M.Kom', '-'),
(22, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'JUMAT', '7', 'A7', '02', '02', '41323265', 'Grafika Komputer', '2', 'Naim Rochmawati, S.Kom., MT', '-'),
(23, 'D3 Manajemen Informatika', 'A', '2013', 'GASAL', '2014/2015', 'JUMAT', '9', 'A7', '02', '02', '41323111', 'Prak. Grafika Komputer', '1', 'Naim Rochmawati, S.Kom., MT', '-'),
(24, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'SENIN', '1', 'A7', '02', '02', '41323265', 'Grafika Komputer', '2', 'Naim Rochmawati, S.Kom., MT', '-'),
(25, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'SENIN', '3', 'A7', '02', '02', '41323111', 'Prak. Grafika Komputer', '1', 'Naim Rochmawati, S.Kom., MT', '-'),
(26, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'SELASA', '1', 'B1', '02', '03', '41323258', 'Sistem Basis Data I', '2', 'Wiyli Yustanti, S.Si., M.Kom ', 'Ibnu Febri S.Kom., M.Sc'),
(27, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'RABU', '1', 'B1', '02', '01', '41323253', 'Sistem Informasi Manajemen', '2', 'Ari Kurniawan, S.Kom., MT', '-'),
(28, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'RABU', '3', 'B1', '02', '02', '90220204', 'Bahasa Indonesia', '2', 'Hespi Septiana, S.Pd., M.Pd', '-'),
(29, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'RABU', '5', 'B1', '02', '01', '41423228', 'Interaksi Manusia dan Komp.', '2', 'Rina Harimurti, S.Pd., MT.', '-'),
(30, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'RABU', '7', 'B1', '02', '04', '41423214', 'Jaringan Komputer I', '2', 'Aditya Prapanca, S.T., M.Kom', '-'),
(31, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'KAMIS', '1', 'A7', '03', '01', '41423210', 'Bahasa Pemrogaman Lanjut', '2', 'Drs. Bambang Sujatmiko, MT', '-'),
(32, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'KAMIS', '3', 'A7', '03', '01', '41423101', 'Prak. Bhs. Pemrogaman Lanjut', '1', 'Drs. Bambang Sujatmiko, MT', '-'),
(33, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'KAMIS', '5', 'A7', '02', '01', '41423105', 'Prak. Jaringan Komputer I', '1', 'Aditya Prapanca, S.T., M.Kom', '-'),
(34, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'KAMIS', '7', 'B1', '02', '01', '41423217', 'Manajemen Jaringan Komputer', '2', 'Asmunin, S.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(35, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'JUMAT', '1', 'A7', '03', '01', '41323104', 'Prak. Sistem Basis Data I', '1', 'Wiyli Yustanti, S.Si., M.Kom ', 'Ibnu Febri S.Kom., M.Sc'),
(36, 'D3 Manajemen Informatika', 'B', '2013', 'GASAL', '2014/2015', 'JUMAT', '3', 'A7', '02', '01', '41423108', 'Prak. Manajemen Jarkom', '1', 'Asmunin, S.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(37, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'SENIN', '1', 'B1', '02', '02', '41323258', 'Sistem Basis Data I', '2', 'Wiyli Yustanti, S.Si., M.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(38, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'SENIN', '5', 'B1', '02', '02', '41423228', 'Interaksi Manusia dan Komp.', '2', 'Rina Harimurti, S.Pd., MT.', '-'),
(39, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'SENIN', '7', 'B1', '02', '02', '41423214', 'Jaringan Komputer I ', '2', 'Aditya Prapanca, S.T., M.Kom', '-'),
(40, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'SELASA', '3', 'A7', '03', '01', '41323104', 'Prak. Sistem Basis Data I', '1', 'Wiyli Yustanti, S.Si., M.Kom ', 'Ibnu Febri S.Kom., M.Sc'),
(41, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '03', '01', '41423210', 'Bahasa Pemrogaman Lanjut ', '2', 'Drs. Bambang Sujatmiko, MT', '-'),
(42, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'RABU', '3', 'A7', '03', '02', '41423101', 'Prak. Bhs. Pemrogaman Lanjut ', '1', 'Drs. Bambang Sujatmiko, MT', '-'),
(43, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'RABU', '5', 'B1', '02', '04', '90220204', 'Bahasa Indonesia', '2', 'Hespi Septiana, S.Pd., M.Pd', '-'),
(44, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'KAMIS', '1', 'B1', '02', '04', '41323253', 'Sistem Informasi Manajemen', '2', 'Ari Kurniawan, S.Kom., MT', '-'),
(45, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'KAMIS', '3', 'A7', '02', '01', '41423105', 'Prak. Jaringan Komputer I', '1', 'Aditya Prapanca, S.T., M.Kom', '-'),
(46, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'KAMIS', '5', 'B1', '02', '01', '41423217', 'Manajemen Jaringan Komputer', '2', 'Asmunin, S.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(47, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'JUMAT', '1', 'A7', '03', '02', '41323265', 'Grafika Komputer', '2', 'Naim Rochmawati, S.Kom., MT', '-'),
(48, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'JUMAT', '3', 'A7', '03', '02', '41323111', 'Prak. Grafika Komputer', '1', 'Naim Rochmawati, S.Kom., MT', '-'),
(49, 'D3 Manajemen Informatika', 'C', '2013', 'GASAL', '2014/2015', 'JUMAT', '7', 'A7', '02', '01', '41423108', 'Prak. Manajemen Jarkom', '1', 'Asmunin, S.Kom', 'Ibnu Febri S.Kom., M.Sc'),
(50, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'SENIN', '7', 'B1', '02', '04', '41323268', 'Mikroprosesor dan Interfacing', '2', 'I Kadek Dwi Nuryana, ST., M.Kom', 'Salamun Rohman Nudin, S.Kom'),
(51, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'SELASA', '5', 'A7', '03', '01', '41323112', 'Prak. Mikroprosesor & Interfacing', '1', 'I Kadek Dwi Nuryana, ST., M.Kom', 'Salamun Rohman Nudin, S.Kom'),
(52, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '02', '01', '41323118', 'Prak. Sistem Operasi Lanjut*', '1', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(53, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '03', '02', '41323281', 'Prak. Internet & Pemrog. II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(54, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '3', 'A7', '02', '01', '41323117', 'Prak. Jaringan Komputer III*', '1', 'Agus Prihanto, S.Kom., M.Kom', 'Ardhini Warih U, S.Kom., M.Kom'),
(55, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '3', 'A7', '03', '02', '41323119', 'Prak. Data Warehousing*', '1', 'Ricky Eka Putra, S.Kom., M.Kom', '-'),
(56, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '7', '-', '-', '-', '41523304', 'Praktek Industri', '3', 'TIM', '-'),
(57, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'KAMIS', '1', 'B1', '02', '01', '41423212', 'Pemgrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(58, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'KAMIS', '3', 'B1', '02', '03', '41323282', 'Metodologi Penelitian', '2', 'Prof. Dr. H.Ekohariadi. M.Pd.', 'Yuni Yamasari, S.Kom., MT'),
(59, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'KAMIS', '7', 'A7', '02', '01', '41423212', 'Prak. Pemrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(60, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'KAMIS', '9', '-', '-', '-', '-', 'Tugas Akhir', '4', 'TIM', '-'),
(61, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '1', 'B1', '02', '03', '41323280', 'Internet dan Pemrograman  II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(62, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '1', 'B1', '02', '02', '41323278', 'Sistem Operasi Lanjut*', '2', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(63, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '3', 'B1', '02', '02', '41323277', 'Jaringan Komputer III *', '2', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(64, 'D3 MANAJEMEN INFORMATIKA ', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '3', 'B1', '02', '03', '41323279', 'Data Warehousing*', '2', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(65, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'SENIN', '9', 'B1', '02', '04', '41323268', 'Mikroprosesor &  Interfacing', '2', 'I Kadek Dwi Nuryana, ST., M.Kom ', 'Salamun Rohman Nudin, S.Kom'),
(66, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'SELASA', '7', 'A7', '03', '01', '41323112', 'Prak. Mikroprosesor & Interfacing', '1', 'I Kadek Dwi Nuryana, ST., M.Kom ', 'Salamun Rohman Nudin, S.Kom'),
(67, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'SELASA', '9', '-', '-', '-', '-', 'Tugas Akhir', '4', 'TIM', '-'),
(68, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'RABU', '5', 'A7', '02', '01', '41323117', 'Prak. Jaringan Komputer III*', '1', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(69, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'RABU', '5', 'A7', '03', '02', '41323119', 'Prak. Data Warehousing*', '1', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(70, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'RABU', '7', 'A7', '02', '01', '41323118', 'Prak. Sistem Operasi Lanjut*', '1', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(71, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'RABU', '7', 'A7', '03', '02', '41323281', 'Prak. Internet & Pemrog. II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(72, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '3', 'B1', '02', '01', '41423212', 'Pemgrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', ''),
(73, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '5', 'B1', '02', '03', '41323282', 'Metodologi Penelitian', '2', 'Prof. Dr. H.Ekohariadi. M.Pd.', 'Yuni Yamasari, S.Kom., MT'),
(74, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '7', '-', '-', '-', '41523304', 'Praktek Industri', '3', 'TIM', '-'),
(75, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '11', 'A7', '02', '01', '41423212', 'Prak. Pemrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(76, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '7', 'B1', '02', '02', '41323277', 'Jaringan Komputer III *', '2', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(77, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '7', 'B1', '02', '03', '41323279', 'Data Warehousing*', '2', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(78, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '9', 'B1', '02', '03', '41323280', 'Internet dan Pemrograman  II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(79, 'D3 Manajemen Informatika ', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '9', 'B1', '02', '02', '41323278', 'Sistem Operasi Lanjut*', '2', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(80, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'SENIN', '7', '-', '-', '-', '41523304', 'Praktek Industri', '3', 'TIM', '-'),
(81, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'SELASA', '5', 'B1', '02', '04', '41323282', 'Metodologi Penelitian', '2', 'Prof. Dr. H.Ekohariadi. M.Pd.', 'Yuni Yamasari, S.Kom., MT'),
(82, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'SELASA', '7', 'B1', '02', '03', '41323268', 'Mikroprosesor & Interfacing', '2', 'I Kadek Dwi Nuryana, ST., M.Kom ', 'Salamun Rohman Nudin, S.Kom'),
(83, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '02', '01', '41323118', 'Prak. Sistem Operasi Lanjut*', '1', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(84, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '03', '02', '41323281', 'Prak. Internet & Pemrog. II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(85, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'RABU', '3', 'A7', '02', '01', '41323117', 'Prak. Jaringan Komputer III*', '1', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(86, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'RABU', '3', 'A7', '03', '02', '41323119', 'Prak. Data Warehousing*', '1', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(87, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'RABU', '5', 'A7', '02', '01', '41423212', 'Prak. Pemrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(88, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'RABU', '9', '-', '-', '-', '', 'Tugas Akhir', '4', 'TIM', '-'),
(89, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'KAMIS', '5', 'A7', '03', '01', '41323268', 'Prak.Mikroprosesor & Interfacing', '2', 'I Kadek Dwi Nuryana, ST., M.Kom ', 'Salamun Rohman Nudin, S.Kom'),
(90, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'JUMAT', '1', 'B1', '02', '03', '41323280', 'Internet dan Pemrograman  II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(91, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'JUMAT', '1', 'B1', '02', '02', '41323278', 'Sistem Operasi Lanjut*', '2', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(92, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'JUMAT', '3', 'B1', '02', '02', '41323277', 'Jaringan Komputer III *', '2', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(93, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'JUMAT', '3', 'B1', '02', '03', '41323279', 'Data Warehousing*', '2', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(94, 'D3 Manajemen Informatika ', 'C', '2012', 'GASAL', '2014/2015', 'JUMAT', '7', 'B1', '02', '01', '41423212', 'Pemgrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(95, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'SELASA', '1', '-', '-', '-', '41523304', 'Praktek Industri', '3', 'TIM', '-'),
(96, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'SELASA', '7', 'B1', '02', '04', '41323282', 'Metodologi Penelitian', '2', 'Prof. Dr. H.Ekohariadi. M.Pd.', 'Yuni Yamasari, S.Kom., MT'),
(97, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'SELASA', '9', 'B1', '02', '03', '41323268', 'Mikroprosesor & Interfacing', '2', 'I Kadek Dwi Nuryana, ST., M.Kom ', 'Salamun Rohman Nudin, S.Kom'),
(98, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '02', '01', '41423212', 'Prak. Pemrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(99, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'RABU', '5', 'A7', '02', '01', '41323117', 'Prak. Jaringan Komputer III*', '1', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(100, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'RABU', '5', 'A7', '03', '02', '41323119', 'Prak. Data Warehousing*', '1', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(101, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'RABU', '7', 'A7', '02', '01', '41323118', 'Prak. Sistem Operasi Lanjut*', '1', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(102, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'RABU', '7', 'A7', '03', '02', '41323281', 'Prak. Internet & Pemrog. II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(103, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'RABU', '9', '-', '-', '-', '-', 'Tugas Akhir', '4', 'TIM', '-'),
(104, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'KAMIS', '7', 'A7', '02', '01', '41323112', 'Prak. Mikroprosesor & Interfacing', '1', 'I Kadek Dwi Nuryana, ST., M.Kom ', 'Salamun Rohman Nudin, S.Kom'),
(105, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'JUMAT', '3', 'B1', '02', '04', '41423212', 'Pemgrog. Visual Lanjut', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(106, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'JUMAT', '7', 'B1', '02', '02', '41323277', 'Jaringan Komputer III *', '2', 'Agus Prihanto, S.Kom., M.Kom', '-'),
(107, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'JUMAT', '7', 'B1', '02', '03', '41323279', 'Data Warehousing*', '2', 'Ardhini Warih U, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(108, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'JUMAT', '9', 'B1', '02', '03', '41323280', 'Internet dan Pemrograman  II*', '2', 'Joko Catur Condro C, S.Si.,MT', 'Ari Kurniawan, S.Kom., MT'),
(109, 'D3 Manajemen Informatika ', 'D', '2012', 'GASAL', '2014/2015', 'JUMAT', '9', 'B1', '02', '02', '41323278', 'Sistem Operasi Lanjut*', '2', 'M. Syariffudien Zuhrir,S.Pd.,M.T', '-'),
(110, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'SENIN', '7', 'B1', '02', '01', '-', 'Bahasa Inggris I', '2', 'Naim Rochmawati,S.Kom.,MT', 'Ibnu Febri Kurniawan,S.Kom., M.Sc'),
(111, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'SENIN', '5', 'B1', '02', '01', '-', 'Pengantar Teknologi Informasi', '2', 'Dedy Rahman Prehanto, S.Kom', '-'),
(112, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '1', 'Lap.', '-', '-', '-', 'Pendidikan Jasmani', '2', 'Drs. Bernard Djawa, M.Pd.', '-'),
(113, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '5', 'A7', '02', '02', '-', 'Dasar-dasar Pemrograman', '2', 'Anita Qoiriah, S.Kom., M.Kom', '-'),
(114, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'SELASA', '7', 'A7', '02', '02', '-', 'Prak. Dasar-dasar Pemrograman', '2', 'Anita Qoiriah, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(115, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'RABU', '1', 'B1', '02', '03', '-', 'PendidikanPancasila', '2', 'Ali Imron.S.Sos., MA', '-'),
(116, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'KAMIS', '1', 'B1', '02', '02', '51324301', 'Matematika I', '3', 'Yuliani Pujiastuti,S.Si., M.Si', '-'),
(117, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2014', 'GASAL', '2014/2015', 'JUMAT', '1', 'A7', '02', '02', '-', 'Teknik Audio Visual', '3', 'Setya Chendra Wibawa, S.Pd., MT', 'Dwi Fatrianto Suyatno, S.Kom.,M.Kom'),
(118, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'SENIN ', '1', 'B1', '02', '01', '-', 'Pengantar Teknologi Informasi', '2', 'Dedy Rahman Prehanto, S.Kom', '-'),
(119, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'SENIN ', '9', 'B1', '02', '01', '-', 'Bahasa Inggris I', '2', 'Naim Rochmawati,S.Kom.,MT', 'Ibnu Febri Kurniawan,S.Kom., M.Sc'),
(120, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'SELASA', '1', 'Lap.', '-', '-', '-', 'Pendidikan Jasmani', '2', 'Drs. Bernard Djawa, M.Pd.', '-'),
(121, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'SELASA', '4', 'B1', '02', '03', '51324301', 'Matematika I', '3', 'Abdul Haris Rosidi, S.Pd., M.Pd', '-'),
(122, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'RABU', '3', 'B1', '02', '03', '-', 'Pendidikan Pancasila', '2', 'Ali Imron.S.Sos., MA', '-'),
(123, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'KAMIS', '1', 'A7', '02', '02', '-', 'Dasar-dasar Pemrograman', '2', 'Anita Qoiriah, S.Kom., M.Kom', '-'),
(124, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'KAMIS', '3', 'A7', '02', '02', '-', 'Prak. Dasar-dasar Pemrograman', '2', 'Anita Qoiriah, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(125, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2014', 'GASAL', '2014/2015', 'JUMAT', '7', 'A7', '02', '02', '-', 'Teknik Audio Visual', '3', 'Setya Chendra Wibawa, S.Pd., MT', 'Dwi Fatrianto Suyatno, S.Kom.,M.Kom'),
(126, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'SENIN', '3', 'B1', '02', '01', '-', 'Pengantar Teknologi Informasi', '2', 'Dedy Rahman Prehanto, S.Kom', '-'),
(127, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'SENIN', '5', 'B1', '02', '03', '-', 'Pendidikan Pancasila', '2', 'Agus Satmoko,S.Sos., M.Si', '-'),
(128, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'SENIN', '7', 'B1', '02', '03', '-', 'Bahasa Inggris I', '2', 'Rr Hapsari Peni AT, S.Si., MT', 'Arif Widodo, ST., M.Sc'),
(129, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'SELASA', '3', 'Lap.', '', '', '-', 'Pendidikan Jasmani', '2', 'Drs. Bernard Djawa, M.Pd.', '-'),
(130, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'RABU', '1', 'A7', '02', '02', '-', 'Dasar-dasar Pemrograman', '2', 'Anita Qoiriah, S.Kom., M.Kom', '-'),
(131, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'RABU', '3', 'A7', '02', '02', '-', 'Prak. Dasar-dasar Pemrograman', '2', 'Anita Qoiriah, S.Kom., M.Kom', 'Ricky Eka Putra, S.Kom., M.Kom'),
(132, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'RABU', '7', 'A7', '02', '02', '-', 'Teknik Audio Visual', '3', 'Setya Chendra Wibawa, S.Pd., MT', 'Dwi Fatrianto Suyatno, S.Kom.,M.Kom'),
(133, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'C', '2014', 'GASAL', '2014/2015', 'JUMAT', '2', 'A7', '03', '04', '51324301', 'Matematika I ', '3', 'Ika Kurniasari, S.Pd., M.Pd', '-'),
(134, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'SENIN', '1', 'A7', '03', '01', '-', 'PBO', '3', 'Drs. Bambang Sujatmiko, MT', '-'),
(135, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'SENIN', '4', 'B1', '02', '04', '-', 'Komunikasi Data', '3', 'Ignatius Destuardi, S.T.,M.T.', '-'),
(136, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'SELASA', '1', 'B1', '02', '04', '-', 'Aljabar Linier dan Matriks', '2', 'YuniYamasari, S.Kom., M.T', '-'),
(137, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'SELASA', '3', 'B1', '02', '01', '-', 'Evaluasi Pengajaran', '2', 'Prof. Dr. H.Ekohariadi. M.Pd.', 'Rina Harimurti, S.Pd., M.Pd'),
(138, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'SELASA', '5', 'B1', '02', '02', '-', 'ISBD', '2', 'Pambudi Handoyo, S.Sos.,M.A.', '-'),
(139, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'KAMIS', '1', 'A7', '03', '02', '-', 'Basis Data', '3', 'Wiyli Yustanti, S.SiM.Kom', '-'),
(140, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2013', 'GASAL', '2014/2015', 'KAMIS', '7', 'A7', '02', '02', '-', 'Struktur Data', '3', 'Salamun Rohman N.S.Kom., M.Kom', 'Dwi Fatrianto Suyanto, S.Kom., M.Kom'),
(141, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'SENIN', '1', 'B1', '02', '04', '-', 'Komunikasi Data', '3', 'Ignatius Destuardi, S.T.,M.T.', '-'),
(142, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'SENIN', '4', 'A7', '03', '01', '-', 'PBO', '3', 'Drs. Bambang Sujatmiko, MT', '-'),
(143, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'SELASA', '3', 'B1', '02', '04', '-', 'Aljabar Linier dan Matriks', '2', 'Yuni Yamasari, S.Kom., M.T', '-'),
(144, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'SELASA', '5', 'B1', '02', '01', '-', 'Evaluasi Pengajaran', '2', 'Prof. Dr. H.Ekohariadi. M.Pd.', 'Rina Harimurti, S.Pd., M.Pd'),
(145, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'SELASA', '7', 'B1', '02', '02', '-', 'ISBD', '2', 'Pambudi Handoyo, S.Sos.,M.A.', '-'),
(146, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'KAMIS', '4', 'A7', '03', '02', '-', 'Basis Data', '3', 'Wiyli Yustanti, S.SiM.Kom', '-'),
(147, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2013', 'GASAL', '2014/2015', 'KAMIS', '6', 'A7', '02', '02', '-', 'Struktur Data', '3', 'Salamun Rohman N.S.Kom., M.Kom', 'Dwi Fatrianto Suyanto, S.Kom., M.Kom'),
(148, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'SENIN', '1', 'A7', '02', '01', '-', 'Mobile Programming', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', 'Asmunin, S.Kom'),
(149, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'SENIN', '3', 'A7', '02', '01', '-', 'Prak. Mobile Programming', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', 'Asmunin, S.Kom'),
(150, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'SELASA', '1', 'A7', '02', '01', '-', 'Jaringan Komputer Lanjut', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', '-'),
(151, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'SELASA', '3', 'A7', '02', '01', '-', 'Prak. Jaringan Komputer Lanjut', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', '-'),
(152, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '1', 'B1', '02', '04', '51424201', 'Strategi Belajar Mengajar', '2', 'Dr. Meini Sondang S., M.Pd.', '-'),
(153, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '3', 'B1', '02', '04', '904204402', 'Psikologi Pendidikan', '2', 'Ira Darmawanti, P.Si., M.Si', '-'),
(154, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '7', 'B1', '02', '01', '-', 'Embeded System', '2', 'I Kadek Dwi Nuryana, S.Kom., M.Kom', '-'),
(155, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'RABU', '9', 'B1', '02', '03', '-', 'Analisis Perancangan System', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(156, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'KAMIS', '5', 'B1', '02', '04', '-', 'Interaksi Manusia dan Komputer', '2', 'Rina Harimusti, S.Pd.,MT', '-'),
(157, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '1', 'B1', '02', '01', '51324211', 'Statistika', '2', 'Aries Dwi Indriyanti, S.Kom., M.Kom', '-'),
(158, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '9', 'B1', '02', '04', '51424204', 'Kajian Kurikulum SMK', '2', 'Dr. Meini Sondang S., M.Pd.', '-'),
(159, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'A', '2012', 'GASAL', '2014/2015', 'JUMAT', '11', 'B1', '02', '02', '-', 'Prak. Embeded System', '2', 'I Kadek Dwi Nuryana, S.Kom., M.Kom', '-'),
(160, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'SENIN', '7', 'A7', '02', '01', '-', 'Mobile Programming', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', 'Asmunin, S.Kom'),
(161, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'SENIN', '9', 'A7', '02', '01', '-', 'Prak. Mobile Programming', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', 'Asmunin, S.Kom'),
(162, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'SELASA', '7', 'A7', '02', '01', '-', 'Jaringan Komputer Lanjut', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', '-'),
(163, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'SELASA', '9', 'A7', '02', '01', '-', 'Prak. Jaringan Komputer Lanjut', '2', 'IGL Putra Eka P.S.Kom., M.M., M.Kom.', '-'),
(164, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'RABU', '7', 'B1', '02', '03', '-', 'Analisis Perancangan System', '2', 'Andi Iwan Nurhidayat, S.Kom', '-'),
(165, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'RABU', '9', 'B1', '02', '01', '-', 'Embeded System', '2', 'I Kadek Dwi Nuryana, S.Kom., M.Kom', '-'),
(166, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '1', 'B1', '02', '03', '51424201', 'Strategi Belajar Mengajar', '2', 'Dr. Meini Sondang S., M.Pd.', '-'),
(167, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '7', 'B1', '02', '04', '-', 'Interaksi Manusia dan Komputer', '2', 'Rina Harimurti, S.Pd.,MT', '-'),
(168, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'KAMIS', '9', 'B1', '02', '01', '904204402', 'Psikologi Pendidikan', '2', 'Ni Wayan Sukmawati Puspitadewi, P.Si., M.Psi', '-'),
(169, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '3', 'B1', '02', '01', '51324211', 'Statistika', '2', 'Aries Dwi Indriyanti, S.Kom., M.Kom', '-'),
(170, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '7', 'B1', '02', '04', '51424204', 'Kajian Kurikulum SMK', '2', 'Dr. Meini Sondang S., M.Pd.', '-'),
(171, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI', 'B', '2012', 'GASAL', '2014/2015', 'JUMAT', '9', 'B1', '02', '02', '-', 'Prak. Embeded System', '2', 'I Kadek Dwi Nuryana, S.Kom., M.Kom', '-');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE IF NOT EXISTS `jam` (
  `ID_JAM` int(2) NOT NULL AUTO_INCREMENT,
  `JAM` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`ID_JAM`),
  UNIQUE KEY `JAM` (`ID_JAM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`ID_JAM`, `JAM`) VALUES
(1, '1'),
(2, '2'),
(3, '3'),
(4, '4'),
(5, '5'),
(6, '6'),
(7, '7'),
(8, '8'),
(9, '9'),
(10, '10'),
(11, '11'),
(12, '12'),
(13, '13'),
(14, '14');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE IF NOT EXISTS `jurusan` (
  `ID_JURUSAN` int(11) NOT NULL AUTO_INCREMENT,
  `JURUSAN` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_JURUSAN`),
  UNIQUE KEY `JURUSAN` (`ID_JURUSAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`ID_JURUSAN`, `JURUSAN`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `ID_KELAS` int(11) NOT NULL AUTO_INCREMENT,
  `KELAS` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`ID_KELAS`),
  UNIQUE KEY `GEDUNG` (`ID_KELAS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`ID_KELAS`, `KELAS`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'Ulang');

-- --------------------------------------------------------

--
-- Table structure for table `lantai`
--

CREATE TABLE IF NOT EXISTS `lantai` (
  `ID_LANTAI` int(11) NOT NULL AUTO_INCREMENT,
  `LANTAI` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_LANTAI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `lantai`
--

INSERT INTO `lantai` (`ID_LANTAI`, `LANTAI`) VALUES
(2, '02'),
(3, '03'),
(4, '-');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `ID_MAHASISWA` int(11) NOT NULL AUTO_INCREMENT,
  `ID_JURUSAN` int(11) NOT NULL,
  `ID_PRODI` int(11) NOT NULL,
  `ID_KELAS` int(11) NOT NULL,
  `ID_ANGKATAN` int(11) NOT NULL,
  `NIM_MAHASISWA` varchar(11) NOT NULL,
  `NAMA_MAHASISWA` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `ID_STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_MAHASISWA`),
  UNIQUE KEY `KODE_MAHASISWA` (`ID_MAHASISWA`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`ID_MAHASISWA`, `ID_JURUSAN`, `ID_PRODI`, `ID_KELAS`, `ID_ANGKATAN`, `NIM_MAHASISWA`, `NAMA_MAHASISWA`, `PASSWORD`, `ID_STATUS`) VALUES
(10, 1, 1, 1, 1, '115623281', 'iwan', '115623281', 1),
(11, 1, 1, 1, 2, '115623282', 'budi', '115623282', 1),
(15, 1, 1, 1, 3, '115623283', 'kuncoro', '115623283', 1),
(16, 1, 1, 2, 2, '115623284', 'dani', '115623284', 1),
(17, 1, 1, 2, 3, '115623285', 'mikail', '115623285', 1),
(18, 1, 1, 3, 2, '115623286', 'sandy', '115623286', 1),
(19, 1, 1, 3, 3, '115623287', 'budi', '115623287', 1),
(20, 1, 1, 4, 3, '115623288', 'maya', '115623288', 1),
(21, 1, 1, 5, 1, '115623289', 'bono', '115623289', 1),
(22, 1, 2, 1, 1, '115623291', 'nico', '115623291', 1),
(23, 1, 2, 1, 2, '115623292', 'yoona', '115623292', 1),
(24, 1, 2, 1, 3, '115623293', 'Nina', '115623293', 1),
(25, 1, 2, 2, 1, '115623294', 'ludwig', '115623294', 1),
(26, 1, 2, 2, 2, '115623295', 'frank', '115623295', 0),
(27, 1, 2, 2, 3, '115623296', 'jefri', '115623296', 1),
(28, 1, 2, 3, 1, '115623297', 'gaby', '115623297', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mengajar`
--

CREATE TABLE IF NOT EXISTS `mengajar` (
  `ID_MENGAJAR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_DOSEN` int(11) NOT NULL,
  `ID_MK` int(11) NOT NULL,
  `ID_SEMESTER` int(11) NOT NULL,
  `ID_THAJARAN` int(11) NOT NULL,
  PRIMARY KEY (`ID_MENGAJAR`),
  UNIQUE KEY `KODE_MENGAJAR` (`ID_MENGAJAR`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mengajar`
--

INSERT INTO `mengajar` (`ID_MENGAJAR`, `ID_DOSEN`, `ID_MK`, `ID_SEMESTER`, `ID_THAJARAN`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE IF NOT EXISTS `mk` (
  `ID_MK` int(11) NOT NULL AUTO_INCREMENT,
  `KODE_MK` varchar(8) DEFAULT NULL,
  `MATA_KULIAH` varchar(100) NOT NULL,
  `SKS` varchar(2) NOT NULL,
  PRIMARY KEY (`ID_MK`),
  UNIQUE KEY `ID_MK` (`ID_MK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mk`
--

INSERT INTO `mk` (`ID_MK`, `KODE_MK`, `MATA_KULIAH`, `SKS`) VALUES
(1, '90320202', 'Pendidikan Pancasila', '2'),
(2, '41323310', 'Dasar Pemrograman', '3'),
(3, '41323275', 'Prak. Dasar Pemrograman', '2'),
(4, '41323226', 'Kalkulus I', '2'),
(5, '90320202', 'Bahasa Inggris I', '2'),
(6, '90220205', 'Pend. Jasmani & Olaraga', '2');

-- --------------------------------------------------------

--
-- Table structure for table `noruang`
--

CREATE TABLE IF NOT EXISTS `noruang` (
  `ID_NORUANG` int(11) NOT NULL AUTO_INCREMENT,
  `NO_RUANG` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_NORUANG`),
  UNIQUE KEY `ID_NORUANG` (`ID_NORUANG`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `noruang`
--

INSERT INTO `noruang` (`ID_NORUANG`, `NO_RUANG`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(6, '05'),
(7, '-');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
  `ID_PEMESAN` int(11) NOT NULL,
  `ID_JADWAL` int(11) NOT NULL,
  `ID_DOSEN` int(11) NOT NULL,
  `ID_MAHASISWA` int(11) NOT NULL,
  `ID_PENGURUS` int(11) NOT NULL,
  `TANGGAL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_PEMESAN`),
  UNIQUE KEY `PEMESAN` (`ID_PEMESAN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `ID_PENGURUS` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_PENGURUS` varchar(15) NOT NULL,
  `NAMA_PENGURUS` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ID_STATUS` int(11) NOT NULL,
  PRIMARY KEY (`ID_PENGURUS`),
  UNIQUE KEY `KODE_PENGURUS` (`ID_PENGURUS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`ID_PENGURUS`, `NIP_PENGURUS`, `NAMA_PENGURUS`, `PASSWORD`, `ID_STATUS`) VALUES
(1, '123456789012', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE IF NOT EXISTS `pinjam` (
  `ID_PINJAM` int(11) NOT NULL AUTO_INCREMENT,
  `ID_HARI` int(11) NOT NULL,
  `ID_JAM` int(11) NOT NULL,
  `ID_GEDUNG` int(11) NOT NULL,
  `ID_LANTAI` int(11) NOT NULL,
  `ID_NORUANG` int(11) NOT NULL,
  `ID_MK` int(11) NOT NULL,
  `ID_DOSEN` int(11) NOT NULL,
  `ID_ASST` int(11) NOT NULL,
  PRIMARY KEY (`ID_PINJAM`),
  UNIQUE KEY `ID_PINJAM` (`ID_PINJAM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `ID_PRODI` int(11) NOT NULL AUTO_INCREMENT,
  `PRODI` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_PRODI`),
  UNIQUE KEY `KODE_PRODI` (`ID_PRODI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`ID_PRODI`, `PRODI`) VALUES
(1, 'D3 Manajemen Informatika'),
(2, 'S1 PENDIDIKAN TEKNOLOGI INFORMASI');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE IF NOT EXISTS `ruangan` (
  `ID_RUANGAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_GEDUNG` int(11) NOT NULL,
  `ID_LANTAI` int(11) NOT NULL,
  `ID_NORUANG` int(11) NOT NULL,
  `KAPASITAS` int(11) DEFAULT NULL,
  `ID_FUNGRU` int(11) NOT NULL,
  `DENAH_KELAS` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  PRIMARY KEY (`ID_RUANGAN`),
  UNIQUE KEY `RUANG` (`ID_RUANGAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`ID_RUANGAN`, `ID_GEDUNG`, `ID_LANTAI`, `ID_NORUANG`, `KAPASITAS`, `ID_FUNGRU`, `DENAH_KELAS`) VALUES
(1, 3, 2, 2, 125, 4, ''),
(2, 2, 2, 1, 125, 4, ''),
(3, 2, 2, 2, 125, 4, ''),
(4, 4, 4, 7, 200, 3, ''),
(5, 2, 3, 1, 125, 4, ''),
(6, 2, 3, 2, 125, 4, ''),
(7, 2, 3, 4, 125, 4, ''),
(8, 1, 2, 2, 125, 4, ''),
(9, 1, 2, 1, 125, 4, ''),
(10, 1, 2, 3, 125, 4, ''),
(11, 1, 2, 4, 125, 4, ''),
(14, 1, 2, 1, 89, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `ID_SEMESTER` int(11) NOT NULL AUTO_INCREMENT,
  `SEMESTER` varchar(6) NOT NULL,
  PRIMARY KEY (`ID_SEMESTER`),
  UNIQUE KEY `ID_SEMESTER` (`ID_SEMESTER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`ID_SEMESTER`, `SEMESTER`) VALUES
(1, 'GENAP'),
(2, 'GASAL');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `ID_STATUS` int(11) NOT NULL,
  `STATUS` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_STATUS`),
  UNIQUE KEY `KODE_STATUS` (`ID_STATUS`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ID_STATUS`, `STATUS`) VALUES
(0, 'Tidak'),
(1, 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `ID_THAJARAN` int(11) NOT NULL AUTO_INCREMENT,
  `TAHUN_AJARAN` varchar(9) NOT NULL,
  PRIMARY KEY (`ID_THAJARAN`),
  UNIQUE KEY `KODE_THAJAR` (`ID_THAJARAN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`ID_THAJARAN`, `TAHUN_AJARAN`) VALUES
(1, '2014/2015');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE IF NOT EXISTS `web` (
  `id` int(10) NOT NULL,
  `pembuat` varchar(100) DEFAULT NULL,
  `lisensi` varchar(100) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `pembuat`, `lisensi`, `judul`) VALUES
(1, 'Dibuat Oleh UNESA', 'Copyright &copy; 2014 - Unesa, All Rights Reserved', 'AMRK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
