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
-- Table structure for table `tbl_prospek_produk`
--

CREATE TABLE `tbl_prospek_produk` (
  `id_pk_prospek_produk` int(11) NOT NULL,
  `id_fk_prospek` int(11) NOT NULL,
  `id_fk_produk` int(11) NOT NULL,
  `prospek_produk_price` varchar(1000) NOT NULL,
  `detail_prospek_quantity` varchar(100) NOT NULL,
  `detail_prospek_keterangan` varchar(1000) NOT NULL,
  `detail_prospek_status` varchar(100) NOT NULL,
  `prospek_produk_tgl_create` datetime NOT NULL,
  `prospek_produk_tgl_update` datetime NOT NULL,
  `prospek_produk_tgl_delete` datetime NOT NULL,
  `prospek_produk_id_create` int(11) NOT NULL,
  `prospek_produk_id_update` int(11) NOT NULL,
  `prospek_produk_id_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prospek_produk`
--

INSERT INTO `tbl_prospek_produk` (`id_pk_prospek_produk`, `id_fk_prospek`, `id_fk_produk`, `prospek_produk_price`, `detail_prospek_quantity`, `detail_prospek_keterangan`, `detail_prospek_status`, `prospek_produk_tgl_create`, `prospek_produk_tgl_update`, `prospek_produk_tgl_delete`, `prospek_produk_id_create`, `prospek_produk_id_update`, `prospek_produk_id_delete`) VALUES
(1, 2, 2, '10', '12', 'TEST1', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(2, 2, 5, '12', '1211', 'TEST2', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(3, 16, 6, '1000', '54', '44444444', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(4, 16, 9, '2000', '54', '44444444', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(5, 16, 27, '3000', '54', '44444444', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(8, 17, 9, '100000', '10', 'ket ket', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(9, 17, 6, '19000', '2', 'ket 2', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(10, 18, 6, '10', '1', '11', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(11, 18, 9, '20', '2', '22', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(12, 18, 28, '30', '3', '33', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(13, 16, 11, '4000', '100', 'testt', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(14, 16, 10, '1000000', '200', '', 'deleted', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(15, 16, 6, '122222', '222222', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(16, 22, 9, '10000', '1000', 'ket 1', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(17, 22, 38, '20000', '2000', 'ket 2', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(18, 22, 6, '30000', '3000', 'ket 3', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(19, 23, 10, '1000', '10', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(20, 23, 6, '2000', '20', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(25, 26, 10, '1000', '10', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:48:28', '0000-00-00 00:00:00', 0, 0, 0),
(26, 26, 6, '2000', '20', '', 'deleted', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-05-18 10:48:09', 0, 0, 0),
(27, 27, 6, '1000', '2', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:51:11', '0000-00-00 00:00:00', 0, 9, 0),
(28, 27, 6, '3000', '2', '', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:51:11', '0000-00-00 00:00:00', 0, 9, 0),
(29, 27, 28, '3000', '3', '', 'deleted', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-05-18 10:50:51', 0, 0, 9),
(30, 7, 11, '1000', '25', '', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(31, 28, 10, '100', '20', 'testsirup', 'aktif', '0000-00-00 00:00:00', '2021-05-18 11:00:17', '0000-00-00 00:00:00', 0, 8, 0),
(32, 29, 38, '4000', '20', 'tesekatalog', 'aktif', '0000-00-00 00:00:00', '2021-05-18 10:59:28', '0000-00-00 00:00:00', 0, 9, 0),
(33, 30, 38, '100', '2', 'testglinsert', 'aktif', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0),
(34, 32, 6, '1000', '2', 'testinsert', 'aktif', '2021-05-18 10:52:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 9, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_prospek_produk`
--
ALTER TABLE `tbl_prospek_produk`
  ADD PRIMARY KEY (`id_pk_prospek_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_prospek_produk`
--
ALTER TABLE `tbl_prospek_produk`
  MODIFY `id_pk_prospek_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
