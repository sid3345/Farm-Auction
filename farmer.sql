-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2020 at 08:05 PM
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
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(150) CHARACTER SET utf8 NOT NULL,
  `state` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pincode` int(10) NOT NULL,
  `admin` int(5) NOT NULL DEFAULT 0,
  `active` int(5) NOT NULL DEFAULT 0,
  `image` varchar(300) CHARACTER SET utf8 NOT NULL,
  `farmer_activation_code` varchar(50) NOT NULL,
  `farmer_email_status` enum('not verified','verified') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`ID`, `name`, `email`, `password`, `phone`, `address`, `state`, `pincode`, `admin`, `active`, `image`, `farmer_activation_code`, `farmer_email_status`) VALUES
(5, 'Santosh Savaliya', 'santosh@gmail.com', '587c57365b54e8283fd6b1ac24acf29d', '8285225252', 'Dadar', 'Maharashtra', 400006, 0, 0, '', '', 'verified'),
(6, 'Siddharth Sinha', 'sinha@gmail.com', '8e202be2f0771d8ffcead4bfbf50776b', '6563265235', 'Bhayandar', 'Thane', 400068, 0, 0, '', '', 'verified'),
(7, 'Kash Karma', 'kashkarma@gmail.com', '8b3f692524a7eb4447c31e025db8cfa1', '828522525262', 'Bhayandar', 'UP', 454565, 0, 0, '', '', 'verified'),
(9, 'Kash', 'kashkarma98@gmail.com', '8b3f692524a7eb4447c31e025db8cfa1', '8285225252', 'Pali', 'Bihar', 454565, 0, 0, '', '058bc379f06e30cc8c96da03b8b66e29', 'verified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
