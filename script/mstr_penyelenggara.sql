-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 15, 2021 at 05:02 PM
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
-- Table structure for table `mstr_penyelenggara`
--

CREATE TABLE `mstr_penyelenggara` (
  `id_pk_penyelenggara` int(11) NOT NULL,
  `penyelenggara_nama` varchar(100) NOT NULL,
  `penyelenggara_status` varchar(100) NOT NULL,
  `penyelenggara_tgl_create` date NOT NULL,
  `penyelenggara_tgl_update` date NOT NULL,
  `penyelenggara_tgl_delete` date NOT NULL,
  `penyelenggara_id_create` int(11) NOT NULL,
  `penyelenggara_id_update` int(11) NOT NULL,
  `penyelenggara_id_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mstr_penyelenggara`
--
ALTER TABLE `mstr_penyelenggara`
  ADD PRIMARY KEY (`id_pk_penyelenggara`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mstr_penyelenggara`
--
ALTER TABLE `mstr_penyelenggara`
  MODIFY `id_pk_penyelenggara` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
