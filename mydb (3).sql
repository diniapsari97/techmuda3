-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 07:34 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cabang_bank`
--

CREATE TABLE `cabang_bank` (
  `id` int(11) NOT NULL,
  `kode_cab` int(11) NOT NULL,
  `nama_cab` varchar(30) NOT NULL,
  `alamat_cab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang_bank`
--

INSERT INTO `cabang_bank` (`id`, `kode_cab`, `nama_cab`, `alamat_cab`) VALUES
(1, 1, 'Cabang Depok', 'Bogor'),
(2, 2, 'Cabang Sumatra', 'Sumatra Utara');

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `id` int(11) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cs`
--

INSERT INTO `cs` (`id`, `nip`, `nama`, `jenis_kelamin`, `foto`) VALUES
(1, '12345', 'Ateng', 'L', 'img.jpg'),
(2, '12346', 'Marlina', 'P', 'img.jpg'),
(3, '12347', 'Yusuf', 'L', 'img.jpg'),
(4, '12348', 'Annisa', 'P', 'img.jpg'),
(5, '12349', 'Harry ', 'L', 'images.png'),
(6, '12356', 'Ayu', 'P', 'images.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'BII Britama'),
(2, 'BII Junio');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `pekerjaan` enum('PNS','Karyawan Swasta','Buruh','Wiraswasta','Lainnya') NOT NULL,
  `npwp` char(15) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id`, `nik`, `nama`, `jk`, `pekerjaan`, `npwp`, `hp`, `alamat`, `foto`) VALUES
(2, '12345678912', 'Annika', 'P', 'PNS', '123456789123476', '08987679', 'Keranji', 'img.jpg'),
(3, '12345688912', 'Maryam', 'L', 'PNS', '123456689123466', '08987589', 'Depok', 'images.png'),
(4, '12354398732', 'Marlina', 'L', 'PNS', '321567', '02188721', 'jakarta timur', 'images.png'),
(5, '12354365098', 'Annisa', 'P', 'Karyawan Swasta', '321567854632', '10468792', 'Jakarta Barat', 'img.jpg'),
(17, '12354365878', 'Aulia', 'L', 'Buruh', '32156787', '10564790', 'Jakarta ', 'img.jpg'),
(18, '12354365875', 'Alika', 'P', 'Karyawan Swasta', '321567856', '94568769', 'Jakarta Barat', 'img.jpg'),
(19, '12321311342', 'Bobi', 'L', 'PNS', '3215679054', '02187292', 'Jakarta Barat', 'img.jpg'),
(20, '12347889876', 'Ayuk', 'P', 'PNS', '398492981', '02138478', 'Jakarta', 'img.jpg'),
(21, '12354365876', 'Muchlas', 'L', 'PNS', '32156776', '98627899', 'Jakarta Barat', 'img.jpg'),
(23, '12345675387', 'Bando', 'P', 'Karyawan Swasta', '321567907', '10468979', 'Jakarta Barat', 'img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembukaan`
--

CREATE TABLE `pembukaan` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `norek` char(10) NOT NULL,
  `saldo` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `cabang_bank_id` int(11) NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `teller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembukaan`
--

INSERT INTO `pembukaan` (`id`, `tgl`, `norek`, `saldo`, `kategori_id`, `cabang_bank_id`, `nasabah_id`, `teller_id`) VALUES
(8, '2019-12-17', '1326789675', 100000, 1, 1, 21, 1),
(11, '2019-12-17', '1326789897', 1000002, 1, 1, 20, 2),
(12, '2019-12-17', '1326789486', 1000002, 2, 1, 19, 1),
(15, '2019-12-18', '1326789485', 10000000, 1, 1, 18, 6),
(17, '2019-12-20', '1326789498', 100000, 1, 1, 5, 1),
(18, '2019-12-19', '1326789098', 100000, 1, 1, 4, 1),
(19, '2019-12-19', '1326789787', 100000200, 1, 1, 3, 1),
(20, '2019-12-19', '1326789456', 100000200, 1, 1, 2, 2),
(22, '2019-12-19', '1326789459', 60000000, 2, 1, 17, 1),
(24, '2019-12-20', '1326789488', 20000000, 1, 1, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `role` enum('administrator','teller','nasabah') NOT NULL,
  `foto` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `email`, `role`, `foto`) VALUES
(1, 'Dini Apsari', 'dini', 'cf28d4a60940dfd42ec682f0d803b2a1a2799a7e', 'dini@gmail.com', 'administrator', 'img.jpg'),
(2, 'Ayu Sukma', 'ayu', 'b947eeb0fcd641c87b7d90e28d159cb1a0cf84de', 'ayu@gmail.com', 'teller', 'img.jpg'),
(3, 'Muchlas', 'muchlas', '50858e8178bcd95067b43e4eaf4f6c10c2bf3ed9', 'muchlas@gmail.com', 'nasabah', 'images.png'),
(7, 'Harry Darmawan', 'harry', '23a0b5e4fb6c6e8280940920212ecd563859cb3c', 'harry@gmail.com', 'teller', 'img.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cabang_bank`
--
ALTER TABLE `cabang_bank`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_cab_UNIQUE` (`kode_cab`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik_UNIQUE` (`nik`),
  ADD UNIQUE KEY `npwp_UNIQUE` (`npwp`),
  ADD UNIQUE KEY `hp_UNIQUE` (`hp`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`) USING BTREE;

--
-- Indexes for table `pembukaan`
--
ALTER TABLE `pembukaan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `norek_UNIQUE` (`norek`),
  ADD UNIQUE KEY `nasabah_id_UNIQUE` (`nasabah_id`) USING BTREE,
  ADD KEY `fk_rekening_kategori` (`kategori_id`),
  ADD KEY `fk_rekening_cabang_bank1` (`cabang_bank_id`),
  ADD KEY `fk_tabungan_nasabah1` (`nasabah_id`),
  ADD KEY `fk_pembukaan_teller1` (`teller_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cabang_bank`
--
ALTER TABLE `cabang_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pembukaan`
--
ALTER TABLE `pembukaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembukaan`
--
ALTER TABLE `pembukaan`
  ADD CONSTRAINT `fk_pembukaan_teller1` FOREIGN KEY (`teller_id`) REFERENCES `cs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rekening_cabang_bank1` FOREIGN KEY (`cabang_bank_id`) REFERENCES `cabang_bank` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rekening_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tabungan_nasabah1` FOREIGN KEY (`nasabah_id`) REFERENCES `nasabah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
