-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2023 at 04:33 AM
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
-- Database: `bnd_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bidId` int(11) NOT NULL,
  `workslotId` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username_bids` varchar(255) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offerId` int(11) NOT NULL,
  `workslotId` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username_offer` varchar(255) NOT NULL,
  `approval` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `userProfileId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `firstName`, `lastName`, `address`, `mobileNumber`, `activated`, `userProfileId`) VALUES
(1, 'McNugget51', 'Password123', 'Connor', 'McGregor', 'Yishun', 12345678, 1, 1),
(2, 'admin', 'admin123', 'admin', 'admin', 'Wollongong', 23456789, 1, 1);

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
(1, 'Admin', 'Manage user accounts and user profiles', 'Admin', 1),
(2, 'Cafe Owner', 'Manage workslots', 'Cafe Owner', 1);

-- --------------------------------------------------------

--
-- Table structure for table `workslot`
--

CREATE TABLE `workslot` (
  `workslotId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Role` varchar(255) NOT NULL,
  `username_workslot` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bidId`),
  ADD KEY `workslotId` (`workslotId`),
  ADD KEY `username_bids` (`username_bids`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offerId`),
  ADD KEY `workslotId` (`workslotId`),
  ADD KEY `username_offer` (`username_offer`);

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
  ADD PRIMARY KEY (`userProfileId`),
  ADD UNIQUE KEY `profileName` (`profileName`);

--
-- Indexes for table `workslot`
--
ALTER TABLE `workslot`
  ADD PRIMARY KEY (`workslotId`),
  ADD KEY `username_workslot` (`username_workslot`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userProfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workslot`
--
ALTER TABLE `workslot`
  MODIFY `workslotId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`workslotId`) REFERENCES `workslot` (`workslotId`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`username_bids`) REFERENCES `user` (`username`);

--
-- Constraints for table `offer`
--
ALTER TABLE `offer`
  ADD CONSTRAINT `offer_ibfk_1` FOREIGN KEY (`workslotId`) REFERENCES `workslot` (`workslotId`),
  ADD CONSTRAINT `offer_ibfk_2` FOREIGN KEY (`username_offer`) REFERENCES `user` (`username`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userProfileId`) REFERENCES `userprofile` (`userProfileId`);

--
-- Constraints for table `workslot`
--
ALTER TABLE `workslot`
  ADD CONSTRAINT `workslot_ibfk_1` FOREIGN KEY (`username_workslot`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
