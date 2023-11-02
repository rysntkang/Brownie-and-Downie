-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2023 at 07:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brownie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bidId` int(11) NOT NULL,
  `workslotId_bids` int(11) NOT NULL,
  `date` date NOT NULL,
  `userProfileId_bids` int(11) NOT NULL,
  `userId_bids` int(11) NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`bidId`, `workslotId_bids`, `date`, `userProfileId_bids`, `userId_bids`, `approval`) VALUES
(8, 1, '2023-11-04', 4, 4, 1),
(9, 2, '2023-11-04', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offerId` int(11) NOT NULL,
  `workslotId_offer` int(11) NOT NULL,
  `date` date NOT NULL,
  `userProfileId_offer` int(11) NOT NULL,
  `userId_offer` int(11) NOT NULL,
  `accepted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offerId`, `workslotId_offer`, `date`, `userProfileId_offer`, `userId_offer`, `accepted`) VALUES
(7, 2, '2023-11-04', 4, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobileNumber` int(11) NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `userProfileId` int(11) NOT NULL,
  `maxShift` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `firstName`, `lastName`, `address`, `mobileNumber`, `activated`, `userProfileId`, `maxShift`) VALUES
(1, 'admin', 'admin', 'Admin', 'Admin', 'NIL', 11111111, 1, 1, NULL),
(2, 'owner', 'owner', 'Owner', 'Owner', 'NIL', 22222222, 1, 2, NULL),
(3, 'manager', 'manager', 'Manager', 'Manager', 'NIL', 33333333, 1, 3, NULL),
(4, 'peter1', 'peter1', 'Peter', 'Goh', 'Yishun Ave 1, BLK 433, #08-977, 760433', 90874367, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `userProfileId` int(11) NOT NULL,
  `profileName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `activated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`userProfileId`, `profileName`, `description`, `role`, `activated`) VALUES
(1, 'System Admin', 'Support and manage different types of users and user profiles', 'System Admin', 1),
(2, 'Cafe Owner', 'View and manage work slots', 'Cafe Owner', 1),
(3, 'Cafe Manager', 'Manage staff allocation and approval of biddings', 'Cafe Manager', 1),
(4, 'Cafe Staff', 'Bid for work slots', 'Chef', 1),
(5, 'Cafe Staff', 'Bid for work slots', 'Cashier', 1),
(6, 'Cafe Staff', 'Bid for work slots', 'Waiter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workslot`
--

CREATE TABLE `workslot` (
  `workslotId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `userprofileId_workslot` int(11) NOT NULL,
  `userId_workslot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workslot`
--

INSERT INTO `workslot` (`workslotId`, `Date`, `userprofileId_workslot`, `userId_workslot`) VALUES
(1, '2023-11-04', 4, 4),
(2, '2023-11-04', 4, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bidId`),
  ADD KEY `workslotId_bids` (`workslotId_bids`),
  ADD KEY `userProfileId_bids` (`userProfileId_bids`),
  ADD KEY `userId_bids` (`userId_bids`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offerId`),
  ADD KEY `workslotId_offer` (`workslotId_offer`),
  ADD KEY `userProfileId_offer` (`userProfileId_offer`),
  ADD KEY `userId_offer` (`userId_offer`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobileNumber` (`mobileNumber`),
  ADD KEY `userProfileId` (`userProfileId`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`userProfileId`);

--
-- Indexes for table `workslot`
--
ALTER TABLE `workslot`
  ADD PRIMARY KEY (`workslotId`),
  ADD KEY `userprofileId_workslot` (`userprofileId_workslot`),
  ADD KEY `userId_workslot` (`userId_workslot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userProfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `workslot`
--
ALTER TABLE `workslot`
  MODIFY `workslotId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`workslotId_bids`) REFERENCES `workslot` (`workslotId`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`userProfileId_bids`) REFERENCES `userprofile` (`userProfileId`),
  ADD CONSTRAINT `bids_ibfk_3` FOREIGN KEY (`userId_bids`) REFERENCES `user` (`userId`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`workslotId_offer`) REFERENCES `workslot` (`workslotId`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`userProfileId_offer`) REFERENCES `userprofile` (`userProfileId`),
  ADD CONSTRAINT `offer_ibfk_3` FOREIGN KEY (`userId_offer`) REFERENCES `user` (`userId`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userProfileId`) REFERENCES `userprofile` (`userProfileId`);

--
-- Constraints for table `workslot`
--
ALTER TABLE `workslot`
  ADD CONSTRAINT `workslot_ibfk_1` FOREIGN KEY (`userprofileId_workslot`) REFERENCES `userprofile` (`userProfileId`),
  ADD CONSTRAINT `workslot_ibfk_2` FOREIGN KEY (`userId_workslot`) REFERENCES `user` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
