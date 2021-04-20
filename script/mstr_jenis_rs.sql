-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 20, 2021 at 10:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mak_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `mstr_jenis_rs`
--

CREATE TABLE `mstr_jenis_rs` (
  `id_pk_jenis_rs` int(11) NOT NULL,
  `jenis_rs_nama` varchar(100) NOT NULL,
  `jenis_rs_kode` varchar(100) NOT NULL,
  `jenis_rs_status` varchar(100) NOT NULL,
  `jenis_rs_tgl_create` date NOT NULL,
  `jenis_rs_tgl_update` date NOT NULL,
  `jenis_rs_tgl_delete` date NOT NULL,
  `jenis_rs_id_create` int(11) NOT NULL,
  `jenis_rs_id_update` int(11) NOT NULL,
  `jenis_rs_id_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mstr_jenis_rs`
--

INSERT INTO `mstr_jenis_rs` (`id_pk_jenis_rs`, `jenis_rs_nama`, `jenis_rs_kode`, `jenis_rs_status`, `jenis_rs_tgl_create`, `jenis_rs_tgl_update`, `jenis_rs_tgl_delete`, `jenis_rs_id_create`, `jenis_rs_id_update`, `jenis_rs_id_delete`) VALUES
(1, 'Rumah Sakit Umum', 'RSU', 'aktif', '2021-04-20', '2021-04-20', '2021-04-20', 0, 0, 0),
(2, 'Rumah Sakit Ibu & Anak', 'RSIA', 'aktif', '2021-04-20', '2021-04-20', '2021-04-20', 0, 0, 0),
(3, 'Rumah Sakit Umum Daerah', 'RSUD', 'aktif', '2021-04-20', '2021-04-20', '2021-04-20', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mstr_jenis_rs`
--
ALTER TABLE `mstr_jenis_rs`
  ADD PRIMARY KEY (`id_pk_jenis_rs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mstr_jenis_rs`
--
ALTER TABLE `mstr_jenis_rs`
  MODIFY `id_pk_jenis_rs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
