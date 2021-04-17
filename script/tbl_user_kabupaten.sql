-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2021 at 06:14 AM
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
-- Table structure for table `tbl_user_kabupaten`
--

CREATE TABLE `tbl_user_kabupaten` (
  `id_pk_user_kabupaten` int(11) NOT NULL,
  `id_fk_user` int(11) NOT NULL,
  `id_fk_kabupaten` int(11) NOT NULL,
  `status_user_kabupaten` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user_kabupaten`
--
ALTER TABLE `tbl_user_kabupaten`
  ADD PRIMARY KEY (`id_pk_user_kabupaten`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user_kabupaten`
--
ALTER TABLE `tbl_user_kabupaten`
  MODIFY `id_pk_user_kabupaten` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
