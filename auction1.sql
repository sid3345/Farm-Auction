-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 04:44 PM
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
-- Table structure for table `bidder`
--

CREATE TABLE `bidder` (
  `ID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `biddingTime` datetime NOT NULL,
  `price` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirmbid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`ID`, `userID`, `vehicleID`, `biddingTime`, `price`, `email`, `confirmbid`) VALUES
(17, 2, 84, '2020-04-11 00:16:40', 80, 'sinha@gmail.com', 0),
(18, 2, 83, '2020-04-11 00:17:55', 100, 'sinha@gmail.com', 0),
(19, 3, 82, '2020-06-01 21:15:18', 106, 'santosh@gmail.com', 0),
(20, 3, 81, '2020-06-01 22:04:24', 231, 'santosh@gmail.com', 0),
(21, 2, 82, '2020-04-11 00:25:09', 108, 'santosh@gmail.com', 0),
(22, 3, 83, '2020-06-01 22:01:09', 110, 'sinha@gmail.com', 0),
(23, 3, 84, '2020-06-01 22:04:58', 89, 'sinha@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `catagory`
--

CREATE TABLE `catagory` (
  `ID` int(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `catagory`
--

INSERT INTO `catagory` (`ID`, `name`, `type`) VALUES
(2, 'Leafy Green- lettuce, spinach, silverbeet etc', 'Vegetable'),
(3, 'Berries- strawberries, raspberries, blueberries, kiwifruit and passionfruit etc', 'Fruit'),
(4, 'Cruciferous- cabbage, cauliflower, Brussels sprouts, broccoli etc', 'Vegetable'),
(5, 'Marrow- pumpkin, cucumber, zucchini etc', 'Vegetable'),
(6, 'Stone fruit- nectarines, apricots, peaches and plums', 'Fruit'),
(7, 'Tropical and exotic- bananas and mangoes', 'Fruit'),
(10, 'Root- potato, sweet potato, yam etc', 'Vegetable'),
(11, 'Edible plant stem- celery, asparagus etc', 'Vegetable'),
(12, 'Citrus- oranges, grapefruits, mandarins and limes etc', 'Fruit'),
(13, 'Allium- onion, garlic, shallot etc', 'Vegetable'),
(14, 'Melons- watermelons, rockmelons and honeydew melons', 'Fruit'),
(15, 'Tomatoes and avocados etc', 'Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `confirmbid`
--

CREATE TABLE `confirmbid` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `date` date NOT NULL,
  `userID` int(5) NOT NULL,
  `type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE `deposit` (
  `ID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `paymentFrom` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL,
  `amount` int(15) NOT NULL,
  `role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`ID`, `userID`, `paymentFrom`, `account`, `amount`, `role`) VALUES
(13, 2, 'DBBL', '36597888563', 1000000, 1),
(14, 3, 'DBBL', '356236523652', 1000000, 1);

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
  `admin` int(5) NOT NULL DEFAULT '0',
  `active` int(5) NOT NULL DEFAULT '0',
  `image` varchar(300) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `farmer`
--

INSERT INTO `farmer` (`ID`, `name`, `email`, `password`, `phone`, `address`, `state`, `pincode`, `admin`, `active`, `image`) VALUES
(5, 'Santosh Savaliya', 'santosh@gmail.com', '587c57365b54e8283fd6b1ac24acf29d', '8285225252', 'Dadar', 'Maharashtra', 400006, 0, 0, ''),
(6, 'Siddharth Sinha', 'sinha@gmail.com', '8e202be2f0771d8ffcead4bfbf50776b', '6563265235', 'Bhayandar', 'Thane', 400068, 0, 0, ''),
(7, 'Prakash Tripathi', 'prakash@hotmail.com', '73803249c6667c5af2d51c0dedfae487', '986321568', 'New york', 'USA', 653214, 0, 0, '');

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
(22, 'akash98@gmail.com', '2020-06-03 14:59:33', 'no'),
(23, 'santosh@gmail.com', '2020-06-03 17:01:47', 'no'),
(24, 'virat89@gmail.com', '2020-06-03 17:01:38', 'no'),
(25, 'santosh@gmail.com', '2020-06-03 19:11:32', 'no'),
(26, 'virat89@gmail.com', '2020-06-03 19:09:33', 'no'),
(27, 'virat89@gmail.com', '2020-06-03 19:10:49', 'no'),
(28, 'virat89@gmail.com', '2020-06-03 19:11:10', 'no'),
(29, 'santosh@gmail.com', '2020-06-03 19:13:45', 'no'),
(30, 'santosh@gmail.com', '2020-06-03 19:16:54', 'no'),
(31, 'virat89@gmail.com', '2020-06-03 19:17:53', 'no'),
(32, 'santosh@gmail.com', '2020-06-03 19:21:46', 'no'),
(33, 'virat89@gmail.com', '2020-06-03 19:22:00', 'no'),
(34, 'santosh@gmail.com', '2020-06-03 19:30:08', 'no'),
(35, 'virat89@gmail.com', '2020-06-03 19:30:15', 'no'),
(36, 'virat89@gmail.com', '2020-06-03 19:30:37', 'no'),
(37, 'virat89@gmail.com', '2020-06-03 19:32:06', 'no'),
(38, 'santosh@gmail.com', '2020-06-03 19:32:24', 'no'),
(39, 'santosh@gmail.com', '2020-06-03 19:37:03', 'no'),
(40, 'virat89@gmail.com', '2020-06-03 19:37:15', 'no'),
(41, 'santosh@gmail.com', '2020-06-03 19:44:11', 'no'),
(42, 'virat89@gmail.com', '2020-06-03 19:44:20', 'no'),
(43, 'santosh@gmail.com', '2020-06-03 19:56:47', 'no'),
(44, 'virat89@gmail.com', '2020-06-03 19:56:58', 'no'),
(45, 'virat89@gmail.com', '2020-06-04 14:34:31', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`ID`, `vehicleID`, `userID`, `role`) VALUES
(52, 84, 2, 1),
(53, 83, 2, 1),
(54, 82, 3, 0),
(55, 81, 3, 0),
(56, 82, 2, 0),
(57, 83, 3, 1),
(58, 82, 3, 0),
(59, 83, 3, 1),
(60, 81, 3, 0),
(61, 84, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(10) NOT NULL,
  `userID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `userID`, `vehicleID`, `comment`) VALUES
(1, 8, 1, 'good seller!!'),
(2, 3, 82, 'mast banana hay... maja aagaya...');

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
  `admin` int(5) DEFAULT '0',
  `active` int(5) NOT NULL DEFAULT '0',
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `name`, `email`, `password`, `phone`, `address`, `admin`, `active`, `image`) VALUES
(1, 'Akash', 'akash@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', '32132132121', 'makad', 1, 0, ''),
(2, 'Akash Vishwakarma', 'akash98@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', '9930631284', 'dahisar ', 0, 0, ''),
(3, 'Virat Kohli', 'virat89@gmail.com', '5a39fe36ce9aa092ffe8faa0eaedd5da', '9963562632', 'Delhi', 0, 0, ''),
(19, 'Ronaldo', 'ronaldo@gmail.com', 'c5aa3124b1adad080927ce4d144c6b33', '2563245263', 'Spain', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `catagory` int(50) NOT NULL,
  `startDate` varchar(15) NOT NULL,
  `EndDate` date NOT NULL,
  `image` varchar(300) NOT NULL,
  `price` int(10) NOT NULL,
  `status` int(5) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`ID`, `name`, `type`, `catagory`, `startDate`, `EndDate`, `image`, `price`, `status`, `email`) VALUES
(81, 'Potato', 'Vegetable', 10, '2020-04-10', '2020-12-12', '20200410194443_20200102175523_20190706221819_gixxer2.jpg', 50, 1, 'santosh@gmail.com'),
(82, 'Banana', 'Fruit', 15, '2020-04-10', '2020-06-03', '20200410195254_20190706221240_pajaro.jpg', 60, 1, 'santosh@gmail.com'),
(83, 'Onion', 'Vegetable', 13, '2020-04-10', '2020-06-01', '20200410200404_onion.jpg', 100, 1, 'sinha@gmail.com'),
(84, 'Tomato', 'Fruit', 15, '2020-04-10', '2020-07-04', '20200410200825_tomato.jpg', 8, 1, 'sinha@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

CREATE TABLE `vehicledetails` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `description` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `Region` text NOT NULL,
  `harvest_date` date NOT NULL,
  `Season` text NOT NULL,
  `State` text NOT NULL,
  `soil_type` varchar(50) NOT NULL,
  `temperature` varchar(20) NOT NULL,
  `updateStatus` int(10) NOT NULL,
  `weight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`ID`, `vehicleID`, `description`, `name`, `type`, `Region`, `harvest_date`, `Season`, `State`, `soil_type`, `temperature`, `updateStatus`, `weight`) VALUES
(21, 81, 'Our potato is very Good in condition.', ' Potato', ' Vegetable', 'North', '2020-04-10', 'Kharif', 'Uttar Pradesh', 'Clay', '15- 20 degree C', 1, 500),
(22, 82, 'Banana is in good condition for next 3 months.', ' Banana', ' Fruit', 'South', '2020-04-05', 'Kharif', 'Madhya Pradesh', 'Peaty', '15- 20 degree C', 1, 300),
(23, 83, 'Onion is in very good in condition and can be preserve for next 1 year.', ' Onion', ' Vegetable', 'North', '2020-03-31', 'Rabi', 'Himachal Pradesh', 'Silty', '15- 20 degree C', 1, 500),
(24, 84, 'This fruit is very good in condition.', ' Tomato', ' Fruit', 'North', '2020-03-05', 'Zaid', 'Nagaland', 'Loamy', '20- 25 degree C', 1, 400);

-- --------------------------------------------------------

--
-- Table structure for table `vehicleimage`
--

CREATE TABLE `vehicleimage` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `name` varchar(300) NOT NULL,
  `name2` varchar(300) NOT NULL,
  `name3` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicleimage`
--

INSERT INTO `vehicleimage` (`ID`, `vehicleID`, `name`, `name2`, `name3`) VALUES
(28, 81, '20200410194806_potato.jpg', '20200410195103_potato3.jpg', '20200410195025_potato2.jpg'),
(29, 82, '20200410195534_20191228075131_20190706221240_pajaro.jpg', '20200410195534_20191228080018_20190910213732_banana(1).jpg', ''),
(30, 83, '20200410200630_onion2.jpg', '20200410200737_onion.jpg', '20200410200630_onion3.jpg'),
(31, 84, '20200410201026_tomato2.jpg', '20200410201026_tomato.jpg', '20200410201026_tomato3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `watchlist`
--

CREATE TABLE `watchlist` (
  `ID` int(10) NOT NULL,
  `vehicleID` int(10) NOT NULL,
  `userID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidder`
--
ALTER TABLE `bidder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `catagory`
--
ALTER TABLE `catagory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `confirmbid`
--
ALTER TABLE `confirmbid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `deposit`
--
ALTER TABLE `deposit`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `farmer`
--
ALTER TABLE `farmer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_details_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicleID` (`vehicleID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `catagory` (`catagory`);

--
-- Indexes for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- Indexes for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `vehicleID` (`vehicleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidder`
--
ALTER TABLE `bidder`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `catagory`
--
ALTER TABLE `catagory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `confirmbid`
--
ALTER TABLE `confirmbid`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposit`
--
ALTER TABLE `deposit`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `confirmbid`
--
ALTER TABLE `confirmbid`
  ADD CONSTRAINT `confirmbid_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `confirmbid_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
