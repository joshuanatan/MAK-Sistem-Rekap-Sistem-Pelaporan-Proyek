-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2021 at 06:13 AM
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
-- Table structure for table `mstr_user`
--

CREATE TABLE `mstr_user` (
  `id_pk_user` int(11) NOT NULL,
  `id_fk_atasan` int(11) DEFAULT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_telepon` varchar(20) NOT NULL,
  `user_status` varchar(30) NOT NULL,
  `user_tgl_create` date NOT NULL,
  `user_tgl_update` date DEFAULT NULL,
  `user_tgl_delete` date DEFAULT NULL,
  `user_id_create` int(11) NOT NULL,
  `user_id_update` int(11) DEFAULT NULL,
  `user_id_delete` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mstr_user`
--

INSERT INTO `mstr_user` (`id_pk_user`, `id_fk_atasan`, `user_username`, `user_password`, `user_email`, `user_telepon`, `user_status`, `user_tgl_create`, `user_tgl_update`, `user_tgl_delete`, `user_id_create`, `user_id_update`, `user_id_delete`) VALUES
(1, 0, 'erock', 'kjekf', 'erickgen@gmail.com', '123456789', 'nonaktif', '2021-04-11', '2021-04-11', '2021-04-11', 1, 1, 1),
(2, 0, 'aaa', 'aaaaa', 'E@gmail.com', '103495', 'nonaktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(3, 0, 'erock', 'kjekf', 'erickgen@gmail.com', '123456789', 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(4, 0, 'aaaa', 'aaaa', 'aaaa@gmail.com', '23940596', 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mstr_user`
--
ALTER TABLE `mstr_user`
  ADD PRIMARY KEY (`id_pk_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mstr_user`
--
ALTER TABLE `mstr_user`
  MODIFY `id_pk_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
