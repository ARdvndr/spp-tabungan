-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 09:23 AM
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
(6, 3, 2012140002, '2020-12-14', 100000),
(7, 3, 2012140003, '2020-12-14', 100000),
(8, 4, 2012140004, '2020-12-14', 125000),
(10, 13, 2012140006, '2020-12-14', 100000),
(12, 2, 2012150002, '2020-12-15', 25000),
(14, 3, 2012150003, '2020-12-15', 50000),
(15, 2, 2012150004, '2020-12-15', 75000),
(18, 13, 2012150005, '2020-12-15', 100000),
(19, 13, 2012150006, '2020-12-15', 150000);

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
  `tahunajaran` varchar(16) DEFAULT NULL,
  `biaya` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`idsiswa`, `nis`, `namasiswa`, `kelas`, `tahunajaran`, `biaya`) VALUES
(8, '2017100001', 'Eka Suryani S', 'VIIA', '2017/2018', 250000),
(9, '2017100002', 'BAMBANG GENTOLET', 'VIIA', '2017/2018', 250000),
(10, '2017100003', 'HANGGARA', 'VIIA', '2017/2018', 250000),
(12, '16080001', 'Nuura Safira', 'IXA', '2017/2018', 250000),
(15, '16080003', 'Kepin', 'IXA', '2017/2018', 250000),
(16, '16080002', 'Ameng', 'IXB', '2020/2021 Ganjil', 350000),
(20, '16080004', 'ABC', 'IXC', '2020/2021 Ganjil', 350000);

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
(1, 15, '2017-07-10', 'Juli 2017', 250000, 250000, 'LUNAS', 1),
(2, 15, '2017-08-10', 'Agustus 2017', 250000, 150000, 'BELUM LUNAS', 1),
(3, 15, '2017-09-10', 'September 2017', 250000, 0, 'LUNAS', NULL),
(4, 15, '2017-10-10', 'Oktober 2017', 600000, 125000, 'BELUM LUNAS', NULL),
(5, 15, '2017-11-10', 'November 2017', 250000, 250000, 'BELUM LUNAS', NULL),
(6, 15, '2017-12-10', 'Desember 2017', 250000, 250000, 'BELUM LUNAS', NULL),
(7, 15, '2018-01-10', 'Januari 2018', 250000, 250000, 'BELUM LUNAS', NULL),
(8, 15, '2018-02-10', 'Februari 2018', 250000, 250000, 'BELUM LUNAS', NULL),
(9, 15, '2018-03-10', 'Maret 2018', 250000, 250000, 'BELUM LUNAS', NULL),
(10, 15, '2018-04-10', 'April 2018', 250000, 250000, 'BELUM LUNAS', NULL),
(11, 15, '2018-05-10', 'Mei 2018', 250000, 250000, 'BELUM LUNAS', NULL),
(12, 15, '2018-06-10', 'Juni 2018', 250000, 250000, 'BELUM LUNAS', NULL),
(13, 16, '2020-07-30', 'Juli 2020', 350000, 0, 'LUNAS', NULL),
(14, 16, '2020-08-30', 'Agustus 2020', 350000, 350000, 'BELUM LUNAS', NULL),
(15, 16, '2020-09-30', 'September 2020', 350000, 350000, 'BELUM LUNAS', NULL),
(16, 16, '2020-10-30', 'Oktober 2020', 350000, 350000, 'BELUM LUNAS', NULL),
(17, 16, '2020-11-30', 'November 2020', 350000, 350000, 'BELUM LUNAS', NULL),
(18, 16, '2020-12-30', 'Desember 2020', 350000, 350000, 'BELUM LUNAS', NULL),
(19, 16, '2021-01-30', 'Januari 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(20, 16, '2021-03-02', 'Maret 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(21, 16, '2021-03-30', 'Maret 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(22, 16, '2021-04-30', 'April 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(23, 16, '2021-05-30', 'Mei 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(24, 16, '2021-06-30', 'Juni 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(61, 20, '2020-12-20', 'Desember 2020', 350000, 350000, 'BELUM LUNAS', NULL),
(62, 20, '2021-01-19', 'Januari 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(63, 20, '2021-02-18', 'Februari 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(64, 20, '2021-03-20', 'Maret 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(65, 20, '2021-04-19', 'April 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(66, 20, '2021-05-19', 'Mei 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(67, 20, '2021-06-18', 'Juni 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(68, 20, '2021-07-18', 'Juli 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(69, 20, '2021-08-17', 'Agustus 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(70, 20, '2021-09-16', 'September 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(71, 20, '2021-10-16', 'Oktober 2021', 350000, 350000, 'BELUM LUNAS', NULL),
(72, 20, '2021-11-15', 'November 2021', 350000, 350000, 'BELUM LUNAS', NULL);

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
(5, '2020/2021 Genap');

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
  ADD KEY `idspp` (`idspp`);

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
  ADD KEY `fk_kelas` (`kelas`);

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
  MODIFY `idbayar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idguru` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `idsiswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tabungan`
--
ALTER TABLE `tabungan`
  MODIFY `idtabungan` int(10) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `bayar_ibfk_1` FOREIGN KEY (`idspp`) REFERENCES `spp` (`idspp`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `walikelas` (`kelas`) ON UPDATE CASCADE;

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
