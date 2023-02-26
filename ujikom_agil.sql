-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 08:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikom_agil`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_dosen`
--

CREATE TABLE `m_dosen` (
  `no_urut_dosen` int(11) NOT NULL,
  `nm_dosen` varchar(132) NOT NULL,
  `nidn_dosen` varchar(20) NOT NULL,
  `jns_klmn_dosen` varchar(2) NOT NULL,
  `kd_jabatan_dosen` varchar(2) NOT NULL,
  `status_dosen` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_dosen`
--

INSERT INTO `m_dosen` (`no_urut_dosen`, `nm_dosen`, `nidn_dosen`, `jns_klmn_dosen`, `kd_jabatan_dosen`, `status_dosen`) VALUES
(6, 'agil', '1234', 'L', 'P', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `m_mahasiswa`
--

CREATE TABLE `m_mahasiswa` (
  `nim_mhs` varchar(10) NOT NULL,
  `kd_prodi` varchar(7) NOT NULL,
  `nm_mhs` varchar(50) NOT NULL,
  `tempat_lahir_mhs` varchar(30) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `tgl_lahir_mhs` date NOT NULL,
  `jenis_klmn_mhs` varchar(12) NOT NULL,
  `tgl_msk_mhs` date NOT NULL,
  `kd_status_mhs` varchar(2) NOT NULL,
  `alamat_mhs` varchar(600) NOT NULL,
  `tlp_mhs` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_mata_kuliah`
--

CREATE TABLE `m_mata_kuliah` (
  `kd_matakuliah` varchar(10) NOT NULL,
  `kd_prodi` varchar(20) NOT NULL,
  `nm_matakuliah` varchar(132) NOT NULL,
  `jml_sks_matakuliah` varchar(2) NOT NULL,
  `semester_matakuliah` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `m_mhs`
--

CREATE TABLE `m_mhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_mhs`
--

INSERT INTO `m_mhs` (`id`, `nama`, `alamat`) VALUES
(2, 'adii', 'pamulang'),
(3, 'Budi', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `m_prodi`
--

CREATE TABLE `m_prodi` (
  `kd_prodi` varchar(20) NOT NULL,
  `kd_jenis_prodi` varchar(6) NOT NULL,
  `nm_prodi` varchar(100) NOT NULL,
  `status_prodi` varchar(2) NOT NULL,
  `email_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `m_prodi`
--

INSERT INTO `m_prodi` (`kd_prodi`, `kd_jenis_prodi`, `nm_prodi`, `status_prodi`, `email_prodi`) VALUES
('', 'a13', 'agil', 'ti', 'coba$gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `m_semester`
--

CREATE TABLE `m_semester` (
  `kd_semester` varchar(7) NOT NULL,
  `ket_semester` varchar(20) NOT NULL,
  `thn_semester` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `root`
--

CREATE TABLE `root` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `role` enum('Admin','Owner') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `root`
--

INSERT INTO `root` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `copyrighta` varchar(132) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_krs_dosen`
--

CREATE TABLE `t_krs_dosen` (
  `id_krs_dosen` varchar(20) NOT NULL,
  `kd_mtk_dosen` varchar(20) NOT NULL,
  `kd_dosen` varchar(20) NOT NULL,
  `th_semester` varchar(10) NOT NULL,
  `hari_mengajar` varchar(30) NOT NULL,
  `waktu` time NOT NULL,
  `kelas_mengajar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_krs_mhs`
--

CREATE TABLE `t_krs_mhs` (
  `id_krs_mhs` varchar(10) NOT NULL,
  `kd_matakuliah` varchar(10) NOT NULL,
  `thn_semester` varchar(10) NOT NULL,
  `nim_mhs` varchar(20) NOT NULL,
  `kd_prodi` varchar(20) NOT NULL,
  `kd_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_nilai_khs`
--

CREATE TABLE `t_nilai_khs` (
  `thn_semester` varchar(10) NOT NULL,
  `kd_dosen` varchar(20) NOT NULL,
  `nim_mhs` varchar(20) NOT NULL,
  `kd_matakuliah` varchar(20) NOT NULL,
  `absen` int(11) NOT NULL,
  `tugas` int(11) NOT NULL,
  `uts` int(11) NOT NULL,
  `uas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_dosen`
--
ALTER TABLE `m_dosen`
  ADD PRIMARY KEY (`no_urut_dosen`);

--
-- Indexes for table `m_mahasiswa`
--
ALTER TABLE `m_mahasiswa`
  ADD PRIMARY KEY (`nim_mhs`);

--
-- Indexes for table `m_mhs`
--
ALTER TABLE `m_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_prodi`
--
ALTER TABLE `m_prodi`
  ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `m_semester`
--
ALTER TABLE `m_semester`
  ADD PRIMARY KEY (`kd_semester`);

--
-- Indexes for table `root`
--
ALTER TABLE `root`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_krs_dosen`
--
ALTER TABLE `t_krs_dosen`
  ADD PRIMARY KEY (`id_krs_dosen`);

--
-- Indexes for table `t_krs_mhs`
--
ALTER TABLE `t_krs_mhs`
  ADD PRIMARY KEY (`id_krs_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_dosen`
--
ALTER TABLE `m_dosen`
  MODIFY `no_urut_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_mhs`
--
ALTER TABLE `m_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `root`
--
ALTER TABLE `root`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
