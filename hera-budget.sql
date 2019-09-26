-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 08:14 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hera-budget`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idusers` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phonenumber` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `firstname`, `lastname`, `username`, `phonenumber`, `email`, `password`, `gender`) VALUES
(5, 'jordan', 'Isong', 'joowo', '+2348082736', 'isongjosiah@gmail.com', '$2y$10$XufxE6e9qOIX.KdOYPiU2OvZ.FalhVsIKL2GLr9c9ln0Se3MH4LlS', 'male'),
(6, 'josiah', 'Isong', 'isongjosiah88', '+2348082736', 'isongjosdiah@gmail.com', '$2y$10$HkHmhqDbCQ8AF6hqC2kfVOSW70BEc/4jYUcDIAMnq0YAGQ0UsrCsC', 'option1'),
(7, 'josikk', 'Isong', 'isongjosiah89', '+2348082736', 'isongjosdiah@gmail.com', '$2y$10$cSPmts8vDIjRovOlDs2cG.FLGhSwmoulhrgWa2V17KKleRX/rJR8C', 'option1'),
(8, 'josikk', 'Isong', 'isongjosiah890', '+2348082736', 'isongjosdiah@gmail.com', '$2y$10$v4TTtcOSmqMzmPrUIRg8tu3PCBCGe3PdtyXb0WVvVaMvYfIVTNYBO', 'option1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
