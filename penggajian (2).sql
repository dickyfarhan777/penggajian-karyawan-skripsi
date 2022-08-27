-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql103.epizy.com
-- Generation Time: Jun 08, 2022 at 12:18 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_31506225_penggajian`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `tunjangan_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `gaji_pokok`, `tunjangan_jabatan`) VALUES
(4, 'President Commissioner', 450000, 3400000),
(7, 'Commisioner', 400000, 1000000),
(9, 'Project Manager Solar dan Pasir', 140000, 100000),
(10, 'Project Manager Semen', 150000, 100000),
(11, 'Staff', 120000, 100000),
(13, 'Company Secretary', 180000, 135000),
(14, 'Staff Pabrik', 125000, 100000),
(15, 'Field Supervisor', 150000, 100000),
(16, 'Finance Offocer', 130000, 100000),
(17, 'Secretary Administration', 125000, 100000),
(18, 'Director', 250000, 200000),
(19, 'Presiden Director', 300000, 300000),
(20, 'Finance Accounting Manager', 160000, 150000),
(21, 'Accounting Supervisor', 140000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id_komplain` int(11) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `telpon_pegawai` varchar(15) DEFAULT NULL,
  `deskrpsi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id_komplain`, `nama_pegawai`, `telpon_pegawai`, `deskrpsi`) VALUES
(3, 'Heni ', '08515151445', 'Gajinya salah');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_gaji`
--

CREATE TABLE `laporan_gaji` (
  `id_laporan` int(11) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `total_masuk` int(11) NOT NULL,
  `tanggal_laporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_gaji`
--

INSERT INTO `laporan_gaji` (`id_laporan`, `jabatan_id`, `pegawai_id`, `total_masuk`, `tanggal_laporan`) VALUES
(13, 11, 11, 20, '2022-04-13'),
(14, 21, 10, 26, '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_akses` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `username`, `password`, `role_akses`) VALUES
(2, 'admin', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `alamat_pegawai` text NOT NULL,
  `telepon_pegawai` varchar(128) NOT NULL,
  `status_pegawai` varchar(128) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `alamat_pegawai`, `telepon_pegawai`, `status_pegawai`, `username`, `password`) VALUES
(10, 'Heni Rusmani', 'Jl. Nuh 1', '081934940160', 'Sudah Menikah', 'heni', 'heni'),
(11, 'Nelly Melinda Rosa', 'Mess Kantor', '085777398021', 'Belum Menikah', 'nelly', 'nelly'),
(12, 'Budihardjo Hardisurjo', 'Jl, Tajur Halang', '087154149654', 'Sudah Menikah', 'budi', 'budi'),
(13, 'Budijanti', 'Villa Melati Mas', '081318060604', 'Sudah Menikah', 'budijanti', '123'),
(14, 'Harsono Hardisurjo', 'Villa Melati Mas', '087883452888', 'Sudah Menikah', 'harsono', 'harsono'),
(15, 'Andy Hariman', 'Villa Melati Mas', '08111689289', 'Belum Menikah', 'andy', 'andy'),
(16, 'Kenji Hariman', 'Villa Melati Mas', '08119932188', 'Belum Menikah', 'kenji', 'kenji'),
(17, 'F.Y. Nanik Harianti', 'Villa Melati Mas', '08151811078', 'Sudah Menikah', 'nanik', 'nanik'),
(18, 'Ritam Riyadi', 'Mess Kantor', '087834623578', 'Sudah Menikah', 'ritam', 'ritam'),
(19, 'Sisca', 'Parung', '081293979790', 'Belum Menikah', 'sisca', 'sisca'),
(20, 'Kendy NG', 'Jl. Limo', '081553454564', 'Sudah Menikah', 'kendy', 'kendy'),
(21, 'Gayus Mangapul S. SE', 'Pura Bojonggede ', '081380922059', 'Sudah Menikah', 'gayus', 'gayus'),
(22, 'Kristin Esterina Alfares', 'Mess Kantor', '081293218520', 'Belum Menikah', 'kristin', 'kristin'),
(23, 'Pipih Niviyanti', 'Mess Kantor', '089622053428', 'Belum Menikah', 'pipih', 'pipih'),
(24, 'Yuli Setiyowati', 'Mess Kantor', '081297403082', 'Belum Menikah', 'yuli', 'yuli'),
(25, 'Hartono', 'Mess Kantor', '081311454114', 'Belum Menikah', 'hartono', 'hartono'),
(26, 'Abdul Manaf', 'Mess Kantor', '081532339094', 'Sudah Menikah', 'abdul', 'abdul'),
(27, 'Tri Eko Karsono', 'Mess Kantor', '08131545546', 'Belum Menikah', 'tri', 'tri'),
(28, 'Novita', 'Mess Kantor', '081212208805', 'Belum Menikah', 'novita', 'novita'),
(29, 'Tika Mei Tantrin', 'Mess Kantor', '081348323227', 'Belum Menikah', 'tika', 'tika'),
(30, 'Asti Intan Prawesti', 'Mess Kantor', '087887711327', 'Belum Menikah', 'asti', 'asti'),
(31, 'Adding Sunardi', 'Mess Pabrik', '08131455618', 'Belum Menikah', 'adding', 'adding'),
(32, 'Ahmad Yusril', 'Mess Pabrik', '081599718456', 'Belum Menikah', 'ahmad', 'ahmad'),
(33, 'Gumrowi', 'Mess Pabrik', '081515594745', 'Belum Menikah', 'gumrowi', 'gumrowi'),
(34, 'Rasad', 'Mess Pabrik', '08155188994', 'Belum Menikah', 'rasad', 'rasad'),
(35, 'Zaenal Abidin', 'Mess Pabrik', '085514561312', 'Belum Menikah', 'zaenal', 'zaenal'),
(36, 'Robidin', 'Mess Pabrik', '08131455547', 'Belum Menikah', 'robidin', 'robidin'),
(37, 'Wahyudin', 'Mess Pabrik', '081595957414', 'Belum Menikah', 'wahyudin', 'wahyudin'),
(38, 'Untung Kuanto', 'Mess Pabrik', '085154464127', 'Belum Menikah', 'untung', 'untung'),
(39, 'M. Muslim', 'Mess Pabrik', '085562317844', 'Belum Menikah', 'muslim', 'muslim');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indexes for table `laporan_gaji`
--
ALTER TABLE `laporan_gaji`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `komplain`
--
ALTER TABLE `komplain`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laporan_gaji`
--
ALTER TABLE `laporan_gaji`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
