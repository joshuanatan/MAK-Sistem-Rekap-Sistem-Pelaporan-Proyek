-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2021 at 05:00 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `mstr_produk`
--

CREATE TABLE `mstr_produk` (
  `id_pk_produk` int(11) NOT NULL,
  `produk_no_katalog` varchar(100) NOT NULL,
  `produk_principal` varchar(100) NOT NULL,
  `produk_no_sap` varchar(100) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `produk_kategori` varchar(100) NOT NULL,
  `produk_price_list` varchar(100) NOT NULL,
  `produk_harga_ekat` varchar(100) NOT NULL,
  `produk_deskripsi` varchar(100) NOT NULL,
  `produk_foto` varchar(100) NOT NULL,
  `produk_status` varchar(100) NOT NULL,
  `produk_tgl_create` date NOT NULL,
  `produk_tgl_update` date NOT NULL,
  `produk_tgl_delete` date NOT NULL,
  `produk_id_create` int(11) NOT NULL,
  `produk_id_update` int(11) NOT NULL,
  `produk_id_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mstr_produk`
--

INSERT INTO `mstr_produk` (`id_pk_produk`, `produk_no_katalog`, `produk_principal`, `produk_no_sap`, `produk_nama`, `produk_kategori`, `produk_price_list`, `produk_harga_ekat`, `produk_deskripsi`, `produk_foto`, `produk_status`, `produk_tgl_create`, `produk_tgl_update`, `produk_tgl_delete`, `produk_id_create`, `produk_id_update`, `produk_id_delete`) VALUES
(1, 'test', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '', 'nonaktif', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0),
(2, 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '', 'aktif', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mstr_produk`
--
ALTER TABLE `mstr_produk`
  ADD PRIMARY KEY (`id_pk_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mstr_produk`
--
ALTER TABLE `mstr_produk`
  MODIFY `id_pk_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
