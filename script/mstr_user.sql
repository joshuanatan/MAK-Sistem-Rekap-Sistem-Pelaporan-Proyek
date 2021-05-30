-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 07:13 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

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
  `user_role` varchar(100) NOT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_telepon` varchar(20) NOT NULL,
  `user_supervisor` int(11) NOT NULL,
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

INSERT INTO `mstr_user` (`id_pk_user`, `user_role`, `user_username`, `user_password`, `user_email`, `user_telepon`, `user_supervisor`, `user_status`, `user_tgl_create`, `user_tgl_update`, `user_tgl_delete`, `user_id_create`, `user_id_update`, `user_id_delete`) VALUES
(1, 'Administrator', 'user12', '25d55ad283aa400af464c76d713c07ad', 'admin@email.com', '1234', 0, 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(2, 'Sales Engineer', 'user2', '25d55ad283aa400af464c76d713c07ad', 'se@email.com', '1234', 0, 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(3, 'Supervisor', 'user2', '25d55ad283aa400af464c76d713c07ad', 'supervisor@email.com', '1234', 0, 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(4, 'Area Sales Manager', 'user2', '25d55ad283aa400af464c76d713c07ad', 'asm@email.com', '1234', 0, 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(5, 'Sales Manager', 'user2', '25d55ad283aa400af464c76d713c07ad', 'sm@email.com', '1234', 0, 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(6, 'Administrator', 'testdelete', '25d55ad283aa400af464c76d713c07ad', 'admin2@email.com', 'testdelete', 0, 'nonaktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(7, 'Sales Engineer', 'test1', '25d55ad283aa400af464c76d713c07ad', 'se2@email.com', '1234', 0, 'aktif', '0000-00-00', NULL, NULL, 0, NULL, NULL),
(8, 'Sales Engineer', 'Test Supervisor Sale', 'fcea920f7412b5da7be0cf42b8c93759', 'testa12312@email.com', '1235', 9, 'aktif', '2021-05-26', '2021-05-26', NULL, 1, 1, NULL),
(9, 'Supervisor', 'Test Supervisor Supe', 'fcea920f7412b5da7be0cf42b8c93759', 'testa123124444@email.com', '1235', 0, 'aktif', '2021-05-26', '2021-05-26', NULL, 1, 1, NULL),
(10, 'Area Sales Manager', 'Test Supervisor Area', 'fcea920f7412b5da7be0cf42b8c93759', 'salesmanagertest@email.com', '1235', 5, 'aktif', '2021-05-26', '2021-05-26', NULL, 1, 1, NULL),
(11, 'Sales Engineer', 'Check', '0e375cc30408f5348954652dd1f0488d', 'checke@email.com', '123455', 0, 'aktif', '2021-05-26', '2021-05-26', NULL, 1, 1, NULL),
(12, 'Area Sales Manager', 'Check', '0e375cc30408f5348954652dd1f0488d', 'checkeeeee@email.com', '123455', 0, 'aktif', '2021-05-26', '2021-05-26', NULL, 1, 1, NULL);

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
  MODIFY `id_pk_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
