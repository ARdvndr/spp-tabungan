-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 12:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppsekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `namalengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'Hari Aspriyono'),
(2, 'admin1', 'admin1', 'Agus Susanto'),
(3, 'user', 'user', 'Hari Aspriyono');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `idbayar` int(10) NOT NULL,
  `idspp` int(10) NOT NULL,
  `nobayar` int(10) NOT NULL,
  `tglbayar` date NOT NULL,
  `jumlah_bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`idbayar`, `idspp`, `nobayar`, `tglbayar`, `jumlah_bayar`) VALUES
(22, 73, 2101050001, '2021-01-05', 100000),
(24, 73, 2101050002, '2021-01-05', 250000),
(25, 74, 2101050003, '2021-01-05', 200000),
(26, 85, 2101050004, '2021-01-05', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idguru` int(5) NOT NULL,
  `namaguru` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idguru`, `namaguru`) VALUES
(1, 'BASUKI'),
(2, 'RAHMAT'),
(3, 'EMILIA'),
(4, 'RATNA'),
(5, 'JUWITA'),
(6, 'RONI'),
(7, 'AS\'AD'),
(8, 'Bapak');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `idsiswa` int(10) NOT NULL,
  `nis` varchar(10) DEFAULT NULL,
  `namasiswa` varchar(40) DEFAULT NULL,
  `kelas` varchar(10) DEFAULT NULL,
  `tahunajaran` int(10) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(21, '2021010001', 'ABC', 'IXA', 1, 350000),
(22, '2021010002', 'DEF', 'IXA', 1, 350000),
(23, '2021010003', 'ABCD', 'IXA', 1, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(10) NOT NULL,
  `idsiswa` int(10) DEFAULT NULL,
  `jatuhtempo` date DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `jumlah` int(20) DEFAULT NULL,
  `tunggakan` int(7) NOT NULL,
  `ket` varchar(20) DEFAULT NULL,
  `idadmin` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `idsiswa`, `jatuhtempo`, `bulan`, `jumlah`, `tunggakan`, `ket`, `idadmin`) VALUES
(73, 21, '2021-01-20', 'Januari 2021', 350000, 0, 'LUNAS', NULL),
(74, 21, '2021-02-19', 'Februari 2021', 350000, 150000, 'BELUM LUNAS', NULL),
(75, 21, '2021-03-21', 'Maret 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(76, 21, '2021-04-20', 'April 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(77, 21, '2021-05-20', 'Mei 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(78, 21, '2021-06-19', 'Juni 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(79, 21, '2021-07-19', 'Juli 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(80, 21, '2021-08-18', 'Agustus 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(81, 21, '2021-09-17', 'September 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(82, 21, '2021-10-17', 'Oktober 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(83, 21, '2021-11-16', 'November 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(84, 21, '2021-12-16', 'Desember 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(85, 22, '2021-01-20', 'Januari 2021', 350000, 250000, 'BELUM LUNAS', NULL),
(86, 22, '2021-02-19', 'Februari 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(87, 22, '2021-03-21', 'Maret 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(88, 22, '2021-04-20', 'April 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(89, 22, '2021-05-20', 'Mei 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(90, 22, '2021-06-19', 'Juni 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(91, 22, '2021-07-19', 'Juli 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(92, 22, '2021-08-18', 'Agustus 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(93, 22, '2021-09-17', 'September 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(94, 22, '2021-10-17', 'Oktober 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(95, 22, '2021-11-16', 'November 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(96, 22, '2021-12-16', 'Desember 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(97, 23, '2021-01-20', 'Januari 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(98, 23, '2021-02-20', 'Februari 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(99, 23, '2021-03-20', 'Maret 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(100, 23, '2021-04-20', 'April 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(101, 23, '2021-05-20', 'Mei 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(102, 23, '2021-06-20', 'Juni 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(103, 23, '2021-07-20', 'Juli 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(104, 23, '2021-08-20', 'Agustus 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(105, 23, '2021-09-20', 'September 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(106, 23, '2021-10-20', 'Oktober 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(107, 23, '2021-11-20', 'November 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(108, 23, '2021-12-20', 'Desember 2021', 350000, 350000, 'BELUM LUNAS', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabungan`
--

CREATE TABLE `tabungan` (
  `idtabungan` int(10) NOT NULL,
  `idsiswa` int(10) NOT NULL,
  `debit` varchar(10) NOT NULL,
  `kredit` varchar(10) NOT NULL,
  `saldo` varchar(10) NOT NULL,
  `tgltabungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tajar`
--

CREATE TABLE `tajar` (
  `idtahunajaran` int(10) NOT NULL,
  `tahunajaran` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tajar`
--

INSERT INTO `tajar` (`idtahunajaran`, `tahunajaran`) VALUES
(1, '2020/2021 Ganjil'),
(2, '2020/2021 Genap');

-- --------------------------------------------------------

--
-- Table structure for table `walikelas`
--

CREATE TABLE `walikelas` (
  `kelas` varchar(10) NOT NULL,
  `idguru` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `walikelas`
--

INSERT INTO `walikelas` (`kelas`, `idguru`) VALUES
('VIIA', 1),
('IXB', 2),
('VIIB', 2),
('VIIIA', 3),
('IXA', 4),
('VIIC', 4),
('VIIIB', 5),
('VIIIC', 6),
('IXC', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`idbayar`),
  ADD KEY `bayar_ibfk_1` (`idspp`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idguru`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`idsiswa`),
  ADD KEY `fk_kelas` (`kelas`),
  ADD KEY `fk_tajar` (`tahunajaran`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`),
  ADD KEY `fk_admin` (`idadmin`),
  ADD KEY `fk_siswa` (`idsiswa`);

--
-- Indexes for table `tabungan`
--
ALTER TABLE `tabungan`
  ADD PRIMARY KEY (`idtabungan`),
  ADD KEY `fk_tabungan` (`idsiswa`);

--
-- Indexes for table `tajar`
--
ALTER TABLE `tajar`
  ADD PRIMARY KEY (`idtahunajaran`);

--
-- Indexes for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD PRIMARY KEY (`kelas`),
  ADD KEY `fk_guru` (`idguru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bayar`
--
ALTER TABLE `bayar`
  MODIFY `idbayar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `idtabungan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tajar`
--
ALTER TABLE `tajar`
  MODIFY `idtahunajaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`idspp`) REFERENCES `spp` (`idspp`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `walikelas` (`kelas`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tajar` FOREIGN KEY (`tahunajaran`) REFERENCES `tajar` (`idtahunajaran`) ON UPDATE CASCADE;

--
-- Constraints for table `spp`
--
ALTER TABLE `spp`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`idadmin`) REFERENCES `admin` (`idadmin`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_siswa` FOREIGN KEY (`idsiswa`) REFERENCES `siswa` (`idsiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `walikelas`
--
ALTER TABLE `walikelas`
  ADD CONSTRAINT `fk_guru` FOREIGN KEY (`idguru`) REFERENCES `guru` (`idguru`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
