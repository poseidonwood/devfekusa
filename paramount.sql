-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 04:26 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paramount`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id_bagian` int(3) NOT NULL,
  `namaBagian` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id_bagian`, `namaBagian`, `created_date`) VALUES
(1, 'Bagian Pemasaran', '2021-10-05 03:22:59'),
(3, 'GA DIV', '2021-11-23 08:46:59'),
(4, 'IT', '2021-11-30 18:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id_bobotkriteria` int(3) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_bobotkriteria`, `id_bagian`, `id_kriteria`, `bobot`) VALUES
(7, 1, 1, 0.2),
(8, 1, 2, 0.1),
(9, 1, 3, 0.1),
(10, 1, 4, 0.1),
(11, 1, 5, 0.1),
(12, 1, 6, 0.1),
(13, 1, 9, 0.3),
(35, 4, 1, 0.4),
(36, 4, 2, 0.1),
(37, 4, 3, 0.2),
(38, 4, 4, 0.2),
(39, 4, 5, 0.1),
(40, 4, 6, 0.2),
(41, 4, 9, 0.1);

-- --------------------------------------------------------

--
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(3) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `hasil` float NOT NULL,
  `tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_bagian`, `id_pegawai`, `hasil`, `tahun`) VALUES
(8, 1, 6, 0.5428, 2021),
(9, 1, 7, 0.5855, 2021),
(10, 1, 8, 0.5569, 2021),
(11, 1, 51, 0.5284, 2021),
(12, 1, 52, 0.5568, 2021),
(13, 3, 55, 0.7233, 2020),
(14, 3, 56, 0.735, 2020),
(15, 3, 60, 0.835, 2021),
(16, 3, 61, 0.895, 2021),
(17, 3, 62, 0.86, 2021),
(18, 3, 63, 0.82, 2021),
(19, 3, 64, 0.855, 2021),
(20, 4, 66, 0.88, 2021),
(21, 4, 67, 0.92, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(3) NOT NULL,
  `namaKriteria` varchar(30) NOT NULL,
  `sifat` enum('Benefit','Cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `namaKriteria`, `sifat`) VALUES
(1, 'Kecerdasan', 'Benefit'),
(2, 'Semangat Bekerja', 'Benefit'),
(3, 'Kerjasama', 'Benefit'),
(4, 'Disiplin Kerja', 'Benefit'),
(5, 'Keterampilan', 'Benefit'),
(6, 'Kepemimpinan', 'Benefit'),
(9, 'Absensi', 'Benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilaikriteria` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `nilai` float NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilaikriteria`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(49, 1, 1, 'Tidak Bagus'),
(50, 1, 2, 'Kurang'),
(51, 1, 3, 'Biasa'),
(52, 1, 4, 'Bagus'),
(53, 1, 5, 'Bagus Sekali'),
(54, 2, 1, 'Tidak Bagus'),
(55, 2, 2, 'Kurang'),
(56, 2, 3, 'Biasa'),
(57, 2, 4, 'Bagus'),
(58, 2, 5, 'Bagus Sekali'),
(59, 3, 1, 'Tidak Bagus'),
(60, 3, 2, 'Kurang'),
(61, 3, 3, 'Biasa'),
(62, 3, 4, 'Bagus'),
(63, 3, 5, 'Bagus Sekali'),
(64, 4, 1, 'Tidak Bagus'),
(65, 4, 2, 'Kurang'),
(66, 4, 3, 'Biasa'),
(67, 4, 4, 'Bagus'),
(68, 4, 5, 'Bagus Sekali'),
(69, 5, 1, 'Tidak Bagus'),
(70, 5, 2, 'Kurang'),
(71, 5, 3, 'Biasa'),
(72, 5, 4, 'Bagus'),
(73, 5, 5, 'Bagus Sekali'),
(74, 6, 1, 'Tidak Bagus'),
(75, 6, 2, 'Kurang'),
(76, 6, 3, 'Biasa'),
(77, 6, 4, 'Bagus'),
(78, 6, 5, 'Bagus Sekali'),
(79, 9, 1, 'Tidak Bagus'),
(80, 9, 2, 'Kurang'),
(81, 9, 3, 'Biasa'),
(82, 9, 4, 'Bagus'),
(83, 9, 5, 'Bagus Sekali');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_pegawai`
--

CREATE TABLE `nilai_pegawai` (
  `id_nilaipegawai` int(3) NOT NULL,
  `id_pegawai` int(3) NOT NULL,
  `id_bagian` int(3) NOT NULL,
  `id_kriteria` int(3) NOT NULL,
  `id_nilaikriteria` int(3) NOT NULL,
  `tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_pegawai`
--

INSERT INTO `nilai_pegawai` (`id_nilaipegawai`, `id_pegawai`, `id_bagian`, `id_kriteria`, `id_nilaikriteria`, `tahun`) VALUES
(119, 60, 3, 1, 53, 2021),
(120, 60, 3, 2, 57, 2021),
(121, 60, 3, 3, 61, 2021),
(122, 60, 3, 4, 67, 2021),
(123, 60, 3, 5, 72, 2021),
(124, 60, 3, 6, 77, 2021),
(125, 60, 3, 9, 81, 2021),
(126, 61, 3, 1, 52, 2021),
(127, 61, 3, 2, 56, 2021),
(128, 61, 3, 3, 62, 2021),
(129, 61, 3, 4, 67, 2021),
(130, 61, 3, 5, 72, 2021),
(131, 61, 3, 6, 76, 2021),
(132, 61, 3, 9, 83, 2021),
(133, 62, 3, 1, 51, 2021),
(134, 62, 3, 2, 58, 2021),
(135, 62, 3, 3, 62, 2021),
(136, 62, 3, 4, 67, 2021),
(137, 62, 3, 5, 72, 2021),
(138, 62, 3, 6, 77, 2021),
(139, 62, 3, 9, 82, 2021),
(140, 63, 3, 1, 52, 2021),
(141, 63, 3, 2, 57, 2021),
(142, 63, 3, 3, 62, 2021),
(143, 63, 3, 4, 67, 2021),
(144, 63, 3, 5, 72, 2021),
(145, 63, 3, 6, 77, 2021),
(146, 63, 3, 9, 81, 2021),
(147, 64, 3, 1, 52, 2021),
(148, 64, 3, 2, 57, 2021),
(149, 64, 3, 3, 62, 2021),
(150, 64, 3, 4, 67, 2021),
(151, 64, 3, 5, 71, 2021),
(152, 64, 3, 6, 77, 2021),
(153, 64, 3, 9, 82, 2021),
(154, 66, 4, 1, 53, 2021),
(155, 66, 4, 2, 56, 2021),
(156, 66, 4, 3, 61, 2021),
(157, 66, 4, 4, 66, 2021),
(158, 66, 4, 5, 71, 2021),
(159, 66, 4, 6, 76, 2021),
(160, 66, 4, 9, 81, 2021),
(161, 67, 4, 1, 51, 2021),
(162, 67, 4, 2, 56, 2021),
(163, 67, 4, 3, 61, 2021),
(164, 67, 4, 4, 66, 2021),
(165, 67, 4, 5, 71, 2021),
(166, 67, 4, 6, 76, 2021),
(167, 67, 4, 9, 83, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(3) NOT NULL,
  `id_bagian` int(10) NOT NULL,
  `namaPegawai` varchar(30) NOT NULL,
  `nikPegawai` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `gambar` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `tempat_lahir` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_bagian`, `namaPegawai`, `nikPegawai`, `alamat`, `tanggal_lahir`, `gambar`, `created_date`, `tempat_lahir`) VALUES
(60, 3, 'Ghozy Aprilianto', '1823456345672154', 'Parung', '24 april 1997', 'u6.jpg', '2021-11-27 10:50:18', 'Jakarta'),
(61, 3, 'Restu Rahardian', '1823456345672222', 'Tangerang', '24 april 2000', 'u3.jpg', '2021-11-27 10:51:25', 'Palembang'),
(62, 3, 'Gaizkha', '1823456345672555', 'Depok', '24 November 1999', 'u5.jpg', '2021-11-27 10:52:03', 'Yogyakarta'),
(63, 3, 'Tari Sulis', '1823456345672333', 'Bogor', '4 Januari 2001', 'u2.jpg', '2021-11-27 10:52:41', 'Surabaya'),
(64, 3, 'Vany Agustian', '1928303726934999', 'Ciputat', '24 September 1980', 'u3.jpg', '2021-11-27 10:53:25', 'Pekalongan'),
(65, 1, 'mantap', '122333', 'bogor', '21-04-1999', 'u6.jpg', '2021-11-30 16:32:00', 'parung'),
(66, 4, 'Coba1', '1823456345672154', 'bogor', '21-04-1999', 'u4.jpg', '2021-11-30 18:46:07', 'parung'),
(67, 4, 'Coba2', '1928303726934999', 'bogor', '21-04-1999', 'u6.jpg', '2021-11-30 18:46:20', 'parung');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `nama`) VALUES
(1, 'Manager'),
(2, 'Ka Departement');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `nama_lengkap` text NOT NULL,
  `nik` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `id_bagian` int(10) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_admin`, `username`, `nama_lengkap`, `nik`, `password`, `role`, `id_bagian`, `created_date`) VALUES
(1, 'admin', 'admin baru', '0000000', 'password', 0, 0, '2021-10-05 03:22:35'),
(2, 'joko', 'joko kan', '56', 'password', 1, 1, '2021-10-08 14:38:02'),
(3, 'joko1', 'joko budi', '0000000', 'password', 2, 1, '2021-10-08 17:40:39'),
(8, 'BillyLorenzia', 'Billy Afri Lorenzia', '12991002833', '1', 2, 3, '2021-11-23 08:49:25'),
(9, 'BillyAfr', 'Billy Afri', '16278883993', '1', 1, 3, '2021-11-23 09:01:26'),
(100, 'GAA', 'Bambang Sudarsono', '1710292988424567', '1', 1, 1, '2021-11-27 11:20:57'),
(101, 'KA', 'nadhif aditama', '1710292988424111', '1', 2, 3, '2021-11-27 11:21:36'),
(102, 'PM', 'yayan salman', '17819283651122', '1', 1, 1, '2021-11-27 11:42:17'),
(103, 'DA', 'ADA', '11222', '1', 1, 1, '2021-11-27 11:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_bobotkriteria`);

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilaikriteria`);

--
-- Indexes for table `nilai_pegawai`
--
ALTER TABLE `nilai_pegawai`
  ADD PRIMARY KEY (`id_nilaipegawai`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id_bagian` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `id_bobotkriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilaikriteria` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `nilai_pegawai`
--
ALTER TABLE `nilai_pegawai`
  MODIFY `id_nilaipegawai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
