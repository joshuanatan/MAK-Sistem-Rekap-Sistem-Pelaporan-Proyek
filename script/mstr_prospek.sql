-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2021 at 07:09 AM
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
-- Database: `mak_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `mstr_prospek`
--

CREATE TABLE `mstr_prospek` (
  `id_pk_prospek` int(11) NOT NULL,
  `id_fk_provinsi` int(11) NOT NULL,
  `id_fk_kabupaten` int(11) NOT NULL,
  `id_fk_rs` int(11) NOT NULL,
  `prospek_principle` varchar(100) NOT NULL,
  `total_price_prospek` varchar(100) NOT NULL,
  `notes_kompetitor` varchar(1000) NOT NULL,
  `notes_prospek` varchar(1000) NOT NULL,
  `estimasi_pembelian` date NOT NULL,
  `funnel` varchar(20) NOT NULL,
  `funnel_percentage` varchar(20) NOT NULL,
  `no_sirup` varchar(100) NOT NULL,
  `no_ekatalog` varchar(100) NOT NULL,
  `note_loss` text NOT NULL,
  `prospek_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mstr_prospek`
--

INSERT INTO `mstr_prospek` (`id_pk_prospek`, `id_fk_provinsi`, `id_fk_kabupaten`, `id_fk_rs`, `prospek_principle`, `total_price_prospek`, `notes_kompetitor`, `notes_prospek`, `estimasi_pembelian`, `funnel`, `funnel_percentage`, `no_sirup`, `no_ekatalog`, `note_loss`, `prospek_status`) VALUES
(1, 0, 0, 6, 'MAK', '0', 'test', 'test', '0001-11-11', '', '', '', '', '', 'deleted'),
(2, 0, 0, 5, 'TEST', '0', 'TEST', 'TEST', '0111-11-11', '', '', '', '', '', 'deleted'),
(3, 0, 0, 10, 'bisa', '0', 'bisa', 'bisa', '2991-02-01', 'Lead', '', '', '', '', 'aktif'),
(4, 0, 0, 10, 'bisa2', '0', 'bisa2', 'bisa2', '3004-03-02', 'Prospek', '50%', '', '', '', 'aktif'),
(5, 0, 0, 10, 'bisa3', '0', 'bisa3', 'bisa3', '5530-04-03', 'Loss', '', '', '', 'note loss bisa', 'aktif'),
(6, 0, 3174, 16, 'testasm', '0', 'testasm', 'testasm', '0111-11-11', 'Lead', '', '', '', '', 'aktif'),
(7, 0, 3174, 16, 'testasm1', '0', 'testasm1', 'testasm1', '2222-02-22', 'Prospek', '75%', '', '', '', 'aktif'),
(8, 0, 3174, 16, 'testasm2', '0', 'testasm2', 'testasm2', '0011-11-11', 'Loss', '', '', '', 'test', 'aktif'),
(9, 0, 3174, 16, 'testasm3', '0', 'testasm3', 'testasm3', '0022-02-22', 'Prospek', '', '090909', '', '', 'aktif'),
(11, 31, 3174, 16, 'testsm', '0', 'testsm', 'testsm', '0023-02-04', 'Prospek', '75%', '', '', '', 'aktif'),
(12, 31, 3174, 16, 'testsm1', '0', 'testsm1', 'testsm1', '9856-08-07', 'Win', '', '', '0992193', '', 'aktif'),
(13, 31, 3174, 16, 'testsm1', '0', 'testsm1', 'testsm1', '9856-08-07', 'Win', '', '', '0992193', '', 'aktif'),
(14, 15, 1501, 12, 'astatang', '0', 'asasasasa', 'asasasasasas', '2001-01-10', 'Prospek', '50%', '', '', 'test', 'aktif'),
(15, 31, 3174, 8, 'bisa', '0', 'wqwq', 'wqwq', '0001-12-31', 'Prospek', '50%', '', '', '', 'aktif'),
(16, 31, 3174, 8, 'MAK', '0', 'Vincent punya', 'Vincent', '2021-05-01', 'Prospek', '50%', '', '', 'upssssssss', 'aktif'),
(17, 31, 3174, 8, 'aa', '0', 'aa', 'aa', '2001-12-11', 'Prospek', '25%', '', '', '', 'aktif'),
(18, 31, 3174, 8, 'aa', '0', 'aa', 'aa', '2001-12-11', 'Prospek', '25%', '', '', '', 'aktif'),
(19, 31, 3174, 8, 'MAK', '0', 'aaa', 'aaa', '2021-05-14', 'Prospek', '25%', '', '', '', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mstr_prospek`
--
ALTER TABLE `mstr_prospek`
  ADD PRIMARY KEY (`id_pk_prospek`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mstr_prospek`
--
ALTER TABLE `mstr_prospek`
  MODIFY `id_pk_prospek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
