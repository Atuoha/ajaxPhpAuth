-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 02:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_auth`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `email`, `phone`, `pass`, `token`, `date`) VALUES
(1, 'tony@gmail.com', '08143200267', '$2y$12$Ww0d2HBDcJ1Tr.M3cswqCejGboYYb71wNog/C3xLDWF7jqhf6iH.C', '', '2021-01-01 09:32:27'),
(5, 'tonio@gmail.com', '08143200267', '$2y$12$EMqeDH6EHncwGHrlSfgfOOLG01y3Gw.PTFMoS4cpbc3DfM8qx1u9u', '', '2021-01-01 09:44:01'),
(6, 'ton@gmail.com', '08143200267', '$2y$12$3CVtUib9nS0WMvbtrTLZs.v3DX1L0RhRuCZje/1XTAozTCa6.3BYq', '', '2021-01-01 09:45:07'),
(7, 'onwuka@gmail.com', '08143200267', '$2y$12$z8I0TPzGAOhL5fPsZ.wNJeH2YXzORxXlZmsK8zUEznoC2SXgaLCXO', '', '2021-01-01 13:35:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
