-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2021 at 06:28 PM
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
  `detail_prospek_quantity` varchar(100) NOT NULL,
  `detail_prospek_keterangan` varchar(1000) NOT NULL,
  `detail_prospek_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_prospek_produk`
--

INSERT INTO `tbl_prospek_produk` (`id_pk_prospek_produk`, `id_fk_prospek`, `id_fk_produk`, `detail_prospek_quantity`, `detail_prospek_keterangan`, `detail_prospek_status`) VALUES
(1, 2, 2, '12', 'TEST1', 'aktif'),
(2, 2, 5, '1211', 'TEST2', 'aktif');

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
  MODIFY `id_pk_prospek_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
