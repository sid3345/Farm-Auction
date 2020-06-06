-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2002 at 04:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_details_id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_type` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_details_id`, `user_id`, `last_activity`, `is_type`) VALUES
(1, 'sinha@gmail.com', '2020-05-27 20:07:01', 'no'),
(2, 'sinha@gmail.com', '2020-05-27 20:06:52', 'no'),
(3, 'santosh@gmail.com', '2020-05-27 20:36:31', 'no'),
(4, 'santosh@gmail.com', '2020-05-27 20:36:53', 'no'),
(5, 'santosh@gmail.com', '2020-05-27 20:52:48', 'no'),
(6, 'sinha@gmail.com', '2020-05-27 21:13:02', 'no'),
(7, 'akash98@gmail.com', '2020-06-03 09:32:34', 'no'),
(8, 'santosh@gmail.com', '2020-06-03 08:54:49', 'no'),
(9, 'akash98@gmail.com', '2020-06-03 08:55:05', 'no'),
(10, 'akash98@gmail.com', '2020-06-03 09:33:33', 'no'),
(11, 'akash98@gmail.com', '2020-06-03 09:43:32', 'no'),
(12, 'akash98@gmail.com', '2020-06-03 09:53:28', 'no'),
(13, 'akash@gmail.com', '2020-06-03 10:37:19', 'no'),
(14, 'akash98@gmail.com', '2020-06-03 11:02:14', 'no'),
(15, 'akash98@gmail.com', '2020-06-03 11:37:07', 'no'),
(16, 'santosh@gmail.com', '2020-06-03 11:44:47', 'no'),
(17, 'santosh@gmail.com', '2020-06-03 11:58:03', 'no'),
(18, 'akash98@gmail.com', '2020-06-03 14:15:38', 'no'),
(19, 'akash98@gmail.com', '2020-06-03 14:56:26', 'no'),
(20, 'sinha@gmail.com', '2020-06-03 14:46:51', 'no'),
(21, 'sinha@gmail.com', '2020-06-03 14:59:14', 'no'),
(22, 'akash98@gmail.com', '2020-06-03 14:59:33', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
