-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 05:29 PM
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
  `confirmbid` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bidder`
--

INSERT INTO `bidder` (`ID`, `userID`, `vehicleID`, `biddingTime`, `price`, `confirmbid`) VALUES
(1, 9, 6, '2020-01-01 14:28:39', 344, 0),
(2, 10, 6, '2020-01-01 14:45:15', 345, 0),
(3, 10, 1, '2020-01-01 14:50:50', 4200, 0),
(4, 9, 4, '2020-01-01 15:30:28', 101, 0),
(5, 12, 4, '2020-01-02 19:52:53', 150, 0);

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
(9, 'Apples and pears', 'Fruit'),
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
(1, 4, 'NexusPay', '2551057696', 8753, 0),
(2, 4, 'DBBL online banking', '255553211', 9332, 1),
(3, 8, 'DBBL', '987654', 0, 1),
(4, 8, 'DBBL', '987654321', 6327, 1),
(5, 8, 'DBBL', '123456', 84332, 1),
(6, 6, 'NexusPay', '9631547', 3215698, 0),
(7, 4, 'DBBL', '698741365', 3541, 1),
(8, 9, 'DBBL online banking', '789456123', 21539, 1),
(9, 10, 'NexusPay', '9871213', 87961, 1),
(10, 12, 'DBBL', '52228', 5000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `farmer`
--

CREATE TABLE `farmer` (
  `ID` int(10) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` int(15) NOT NULL,
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
(1, 'akash', 'ak@gmail.com', '94754d0abb89e4cf0a7f1c494dbb9d2c', 156548965, 'dafisar', 'maharanstha', 4000068, 0, 0, ''),
(2, 'kartik', 'kar@gmail.com', 'c8d39cdb56a46ad807969ee04c4e660b', 2147483647, 'dafisar', 'UP', 454565, 0, 0, ''),
(3, 'akash', 'akash@hotty', '27369b3bf4483e8dcfd85ba9a39a947f', 789654123, 'mumbai', 'ma', 4523, 0, 0, '');

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
(1, 6, 9, 1),
(2, 6, 10, 0),
(3, 1, 10, 0),
(4, 4, 9, 0),
(5, 4, 9, 0),
(6, 4, 12, 1);

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
(1, 8, 1, 'good seller!!');

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
(8, 'Siddharth Sinha', 'sid3345@gmail.com', '4187910319ceba6c2b0526e7985e62ce', '987456321', 'Mira Road, Thane', 1, 0, '20191212102245_IMG_20191208_163030.jpg'),
(11, 'test2', 'test2@testing.com', '098f6bcd4621d373cade4e832627b4f6', '789654', 'new', 0, 0, ''),
(12, 'jackason', 'yo@yo.in', '48dc8d29308eb256edc76f25def07251', '325326', 'yo', 0, 0, '');

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
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`ID`, `name`, `type`, `catagory`, `startDate`, `EndDate`, `image`, `price`, `status`) VALUES
(1, 'Cauliflower', 'Vegetable', 4, '2019-12-28', '2020-01-05', '20191228092550_20190706221603_aqua11.jpg', 123, 1),
(2, 'Banana', 'Fruit', 7, '2020-01-03', '2019-12-28', '20191228075726_20190910213732_banana(1).jpg', 41, 1),
(3, 'Apple', 'Fruit', 9, '2020-01-05', '2019-12-28', '20191228084258_20190706221603_aqua11.jpg', 82, 1),
(4, 'Pomegranate', 'Fruit', 14, '2020-01-02', '2020-01-05', '20191228085452_20191227230920_20190706221152_gixxer.jpg', 63, 1),
(6, 'Ladyfinger', 'Vegetable', 4, '2020-01-01', '2020-01-01', '20200101092538_20190706221819_gixxer2.jpg', 216, 1),
(7, 'a1', 'Vegetable', 2, '2020-01-02', '2021-02-12', '20200102144027_20190706221152_gixxer.jpg', 500, 0),
(8, 'Chickoo', 'Fruit', 7, '2020-01-02', '2020-02-10', '20200102150930_20190915215344_prsis12 (2).jpg', 212, 1);

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
  `region` text NOT NULL,
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

INSERT INTO `vehicledetails` (`ID`, `vehicleID`, `description`, `name`, `type`, `region`, `harvest_date`, `Season`, `State`, `soil_type`, `temperature`, `updateStatus`, `weight`) VALUES
(1, 1, 'test', ' Cabbage', 'big green', 'North', '2019-12-14', 'Kharif', 'Goa', 'Clay', '15- 20 degree C', 1, 0),
(2, 2, 'test1', ' Banana', ' Elaichi', 'North', '2019-12-20', 'Kharif', 'Daman and Diu', 'Clay', '15- 20 degree C', 1, 0),
(3, 3, 'testing names', ' Orange', ' Small', 'South', '2019-12-26', 'Rabi', 'Himachal Pradesh', 'Clay', '20- 25 degree C', 1, 0),
(4, 4, 'testing', ' Pomegranate', 'red small', 'East', '2019-12-13', 'Other', 'Gujarat', 'Silty', '20- 25 degree C', 1, 0),
(5, 6, 'test', ' Ladyfinger', 'small green', 'West', '2019-12-30', 'Zaid', 'Dadra and Nagar Haveli', 'Peaty', '20- 25 degree C', 1, 0),
(6, 8, 'Very sweet', '   Chickoo', '   Brown', 'South', '2020-01-01', 'Rabi', 'Arunachal Pradesh', 'Chalky', '35- 40 degree C', 1, 20);

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
(1, 1, '20191227230920_20190706221152_gixxer.jpg', '20191227230920_20190706221326_prsis1.jpg', '20191227230920_20191227225427_20190719120030_gixxer.jpg'),
(2, 2, '20191228080018_20191212173146_20190706221603_aqua1.jpg', '20191228080018_20190910213732_banana(1).jpg', '20191228080018_20190706221240_pajaro.jpg'),
(3, 3, '20191228085149_20190915215344_prsis.jpg', '20191228085149_20190706221152_gixxer.jpg', '20191228085149_20190706221152_gixxer.jpg'),
(4, 4, '20191228103521_20191228092506_20190706221603_aqua11.jpg', '20191228103521_20190915215344_prsis12.jpg', '20191228103521_20190706221240_pajaro.jpg'),
(5, 6, '20200101092659_20190706221326_prsis1.jpg', '20200101092659_20190719112057_gixxer1.jpg', '20200101092659_20190910213706_gixxer2(1).jpg'),
(6, 8, '20200102172300_20190706221152_gixxer.jpg', '20200102172300_20190706221603_aqua11.jpg', '20200102172300_20190706221603_aqua11.jpg');

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
-- Dumping data for table `watchlist`
--

INSERT INTO `watchlist` (`ID`, `vehicleID`, `userID`) VALUES
(1, 6, 9),
(3, 4, 12),
(4, 8, 12);

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farmer`
--
ALTER TABLE `farmer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidder`
--
ALTER TABLE `bidder`
  ADD CONSTRAINT `bidder_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `bidder_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `confirmbid`
--
ALTER TABLE `confirmbid`
  ADD CONSTRAINT `confirmbid_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `confirmbid_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`catagory`) REFERENCES `catagory` (`ID`);

--
-- Constraints for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD CONSTRAINT `vehicledetails_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `vehicleimage`
--
ALTER TABLE `vehicleimage`
  ADD CONSTRAINT `vehicleimage_ibfk_1` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);

--
-- Constraints for table `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`vehicleID`) REFERENCES `vehicle` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
