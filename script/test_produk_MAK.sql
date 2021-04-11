-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 11, 2021 at 07:05 AM
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
-- Table structure for table `test_produk_MAK`
--

CREATE TABLE `test_produk_MAK` (
  `id_pk_produk` int(11) NOT NULL,
  `produk_no_katalog` varchar(100) NOT NULL,
  `produk_principal` varchar(100) NOT NULL,
  `produk_no_sap` varchar(100) NOT NULL,
  `produk_nama` varchar(100) NOT NULL,
  `produk_kategori` varchar(100) NOT NULL,
  `produk_price_list` varchar(100) NOT NULL,
  `produk_harga_ekat` varchar(100) NOT NULL,
  `produk_deskripsi` varchar(100) NOT NULL,
  `produk_foto` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test_produk_MAK`
--

INSERT INTO `test_produk_MAK` (`id_pk_produk`, `produk_no_katalog`, `produk_principal`, `produk_no_sap`, `produk_nama`, `produk_kategori`, `produk_price_list`, `produk_harga_ekat`, `produk_deskripsi`, `produk_foto`) VALUES
(1, 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 0),
(2, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 0),
(3, 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 0),
(4, 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 'test1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_produk_MAK`
--
ALTER TABLE `test_produk_MAK`
  ADD PRIMARY KEY (`id_pk_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_produk_MAK`
--
ALTER TABLE `test_produk_MAK`
  MODIFY `id_pk_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
