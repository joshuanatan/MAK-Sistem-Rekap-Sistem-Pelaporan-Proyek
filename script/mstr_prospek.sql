-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2021 at 06:00 AM
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
  `prospek_status` varchar(100) NOT NULL,
  `prospek_tgl_create` datetime NOT NULL,
  `prospek_tgl_update` datetime NOT NULL,
  `prospek_tgl_delete` datetime NOT NULL,
  `prospek_id_create` int(11) NOT NULL,
  `prospek_id_update` int(11) NOT NULL,
  `prospek_id_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mstr_prospek`
--

INSERT INTO `mstr_prospek` (`id_pk_prospek`, `id_fk_provinsi`, `id_fk_kabupaten`, `id_fk_rs`, `prospek_principle`, `total_price_prospek`, `notes_kompetitor`, `notes_prospek`, `estimasi_pembelian`, `funnel`, `funnel_percentage`, `no_sirup`, `no_ekatalog`, `note_loss`, `prospek_status`, `prospek_tgl_create`, `prospek_tgl_update`, `prospek_tgl_delete`, `prospek_id_create`, `prospek_id_update`, `prospek_id_delete`) VALUES
(1, 0, 0, 6, 'MAK', '0', 'test', 'test', '0001-11-11', '', '', '', '', '', 'deleted', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(2, 0, 0, 5, 'TEST', '0', 'TEST', 'TEST', '0111-11-11', '', '', '', '', '', 'deleted', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(3, 0, 0, 10, 'bisa', '0', 'bisa', 'bisa', '2991-02-01', 'Lead', '', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(4, 0, 0, 10, 'bisa2', '0', 'bisa2', 'bisa2', '3004-03-02', 'Prospek', '50%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(5, 0, 0, 10, 'bisa3', '0', 'bisa3', 'bisa3', '5530-04-03', 'Loss', '', '', '', 'note loss bisa', 'deleted', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0),
(6, 0, 3174, 16, 'testasm', '0', 'testasm', 'testasm', '0111-11-11', 'Lead', '', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0),
(7, 0, 3174, 16, 'testasm1', '25000', 'testasm1', 'testasm1', '2222-02-22', 'Prospek', '75%', '', '', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:40:00', '0000-00-00 00:00:00', 9, 9, 0),
(8, 0, 3174, 16, 'testasm2', '0', 'testasm2', 'testasm2', '0011-11-11', 'Loss', '', '', '', 'test', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(9, 0, 3174, 16, 'testasm3', '0', 'testasm3', 'testasm3', '0022-02-22', 'Prospek', '', '090909', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(11, 31, 3174, 16, 'testsm', '0', 'testsm', 'testsm', '0023-02-04', 'Prospek', '75%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(12, 31, 3174, 16, 'testsm1', '0', 'testsm1', 'testsm1', '9856-08-07', 'Win', '', '', '0992193', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(13, 31, 3174, 16, 'testsm1', '0', 'testsm1', 'testsm1', '9856-08-07', 'Win', '', '', '0992193', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 0, 0),
(14, 31, 3174, 12, 'a', '0', 'as', 'as', '0000-00-00', 'Loss', '', '', '', 'test', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 8, 0, 0),
(15, 31, 3174, 8, 'bisa', '0', 'wqwq', 'wqwq', '0001-12-31', 'Belum Ditentukan', '', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(16, 0, 0, 10, 'MAK', '27161141284', 'Note 100', 'Note 100', '2000-11-03', 'Loss', '', '', '', 'Note loss', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 9, 0),
(17, 0, 0, 10, 'MAK', '1038000', 'Note 100', 'Note 100', '2000-11-03', 'Loss', '', '', '', 'Note loss', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(18, 0, 0, 10, 'TEST', '140', 'TEST', 'TEST', '1231-03-04', 'Prospek', '25%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(19, 0, 0, 10, 'MAK', '0', 'testing', 'testing', '2020-12-01', 'Prospek', '75%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(20, 0, 0, 10, 'MAK', '0', 'kompetitor testing', 'prospek testing', '2021-05-01', 'Prospek', '50%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(21, 0, 0, 10, 'MAK', '0', 'kompetitor testing', 'prospek testing', '2021-05-01', 'Prospek', '50%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(22, 0, 0, 10, 'MAK', '0', 'kompetitor testing', 'prospek testing', '2021-05-01', 'Prospek', '50%', '', '', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 7, 0, 0),
(23, 31, 3174, 16, 'abc', '0', 'tes', 'tes', '2021-03-11', 'Win', '', '', '0992193', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0),
(24, 31, 3174, 16, 'abc', '0', 'tes', 'tes', '2021-03-11', 'Win', '', '', '0992193', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0),
(25, 31, 3174, 16, 'abc', '0', 'tes', 'tes', '2021-03-11', 'Win', '', '', '0992193', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0),
(26, 31, 3174, 16, 'abc', '10000', 'tes', 'tes', '2021-03-11', 'Win', '', '', '0992193', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:48:28', '0000-00-00 00:00:00', 9, 9, 0),
(27, 31, 3175, 15, 'MAK', '8000', 'tes', 'tes', '2020-02-01', 'Lead', '', '', '', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:51:11', '0000-00-00 00:00:00', 9, 9, 0),
(28, 0, 3174, 16, 'testsirup', '2000', 'testsirup', 'testsirup', '2021-01-01', 'Prospek', '', '27986172', '', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 11:00:17', '0000-00-00 00:00:00', 8, 8, 0),
(29, 31, 3174, 16, 'tesekatalog', '80000', 'tesekatalog', 'tesekatalog', '2021-02-02', 'Win', '', '', 'AK1-P2105-3809446', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:59:28', '0000-00-00 00:00:00', 9, 9, 0),
(30, 31, 3175, 15, 'MAK', '200', 'testglinsert', 'testglinsert', '2023-04-03', 'Loss', '', '', '', 'testglinsert', 'deleted', '2021-05-18 10:40:58', '0000-00-00 00:00:00', '2021-05-18 10:41:59', 9, 0, 9),
(31, 31, 3174, 8, 'testinsert', '0', 'testinsert', 'testinsert', '2021-03-03', 'Prospek', '75%', '', '', '', 'aktif', '2021-05-18 10:52:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0),
(32, 31, 3174, 8, 'testinsert', '2000', 'testinsert', 'testinsert', '2021-03-03', 'Prospek', '75%', '', '', '', 'aktif', '2021-05-18 10:52:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0);

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
  MODIFY `id_pk_prospek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
