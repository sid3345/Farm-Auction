-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 08:04 PM
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
-- Database: `auction1`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) NOT NULL,
  `admin` int(5) DEFAULT 0,
  `active` int(5) NOT NULL DEFAULT 0,
  `image` varchar(300) NOT NULL,
  `user_activation_code` varchar(50) NOT NULL,
  `user_email_status` enum('not verified','verified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `email`, `password`, `phone`, `address`, `admin`, `active`, `image`, `user_activation_code`, `user_email_status`) VALUES
(1, 'Akash', 'akash@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', '32132132121', 'makad', 1, 0, '', '', 'verified'),
(2, 'Akash Vishwakarma', 'akash98@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', '9930631284', 'dahisar ', 0, 0, '', '', 'verified'),
(3, 'Virat Kohli', 'virat89@gmail.com', '5a39fe36ce9aa092ffe8faa0eaedd5da', '9963562632', 'Delhi', 0, 0, '', '', 'verified'),
(7, 'Ronaldo', 'ronaldo@gmail.com', 'c5aa3124b1adad080927ce4d144c6b33', '2563245263', 'Spain', 0, 0, '', '', 'verified'),
(20, 'Kevin Oberoy', 'kevinoberoy@gmail.com', '9d5e3ecdeb4cdb7acfd63075ae046672', '996325602', 'serbia', 0, 0, '', '', 'verified'),
(21, 'Jovana', 'ziljcibrus91@gmail.com', '067a9d48f2884037e1320ac03b18e86f', '38952641', 'Serbia', 0, 0, '', '', 'verified'),
(22, 'Kevin', 'kevinoberoy98@gmail.com', '9d5e3ecdeb4cdb7acfd63075ae046672', '4565236314', 'Churchgate', 0, 0, '', 'cd24b6ca5e830af20c5ffb95838931e1', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
