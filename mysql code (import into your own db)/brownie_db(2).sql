-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 03:20 PM
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
(1, 43, '2023-11-22', 4, 36, 1),
(2, 44, '2023-11-22', 4, 36, 2),
(3, 49, '2023-11-23', 4, 36, 1),
(4, 50, '2023-11-23', 4, 36, 2),
(5, 55, '2023-11-24', 4, 36, 1),
(6, 56, '2023-11-24', 4, 36, 2),
(7, 61, '2023-11-25', 4, 36, 1),
(8, 62, '2023-11-25', 4, 36, 2),
(9, 68, '2023-11-26', 4, 36, 2),
(10, 67, '2023-11-26', 4, 36, 1),
(11, 73, '2023-11-27', 4, 36, 1),
(12, 74, '2023-11-27', 4, 36, 2),
(13, 45, '2023-11-22', 5, 37, 1),
(14, 46, '2023-11-22', 5, 37, 2),
(15, 51, '2023-11-23', 5, 37, 1),
(16, 52, '2023-11-23', 5, 37, 2),
(17, 57, '2023-11-24', 5, 37, 2),
(18, 58, '2023-11-24', 5, 37, 1),
(19, 63, '2023-11-25', 5, 37, 1),
(20, 64, '2023-11-25', 5, 37, 2),
(21, 70, '2023-11-26', 5, 37, 1),
(22, 69, '2023-11-26', 5, 37, 2),
(23, 75, '2023-11-27', 5, 37, 1),
(24, 76, '2023-11-27', 5, 37, 2),
(25, 47, '2023-11-22', 6, 38, 1),
(26, 48, '2023-11-22', 6, 38, 2),
(27, 53, '2023-11-23', 6, 38, 1),
(28, 54, '2023-11-23', 6, 38, 2),
(29, 59, '2023-11-24', 6, 38, 1),
(30, 60, '2023-11-24', 6, 38, 2),
(31, 65, '2023-11-25', 6, 38, 1),
(32, 66, '2023-11-25', 6, 38, 2),
(33, 72, '2023-11-26', 6, 38, 2),
(34, 71, '2023-11-26', 6, 38, 1),
(35, 77, '2023-11-27', 6, 38, 1),
(36, 78, '2023-11-27', 6, 38, 2),
(37, 43, '2023-11-22', 4, 39, 2),
(38, 44, '2023-11-22', 4, 39, 1),
(39, 49, '2023-11-23', 4, 39, 2),
(40, 50, '2023-11-23', 4, 39, 1),
(41, 55, '2023-11-24', 4, 39, 2),
(42, 56, '2023-11-24', 4, 39, 1),
(43, 61, '2023-11-25', 4, 39, 2),
(44, 62, '2023-11-25', 4, 39, 1),
(45, 68, '2023-11-26', 4, 39, 1),
(46, 67, '2023-11-26', 4, 39, 2),
(47, 73, '2023-11-27', 4, 39, 2),
(48, 74, '2023-11-27', 4, 39, 1),
(49, 45, '2023-11-22', 5, 40, 2),
(50, 46, '2023-11-22', 5, 40, 1),
(51, 51, '2023-11-23', 5, 40, 2),
(52, 52, '2023-11-23', 5, 40, 1),
(53, 57, '2023-11-24', 5, 40, 1),
(54, 58, '2023-11-24', 5, 40, 2),
(55, 63, '2023-11-25', 5, 40, 2),
(56, 64, '2023-11-25', 5, 40, 1),
(57, 70, '2023-11-26', 5, 40, 2),
(58, 69, '2023-11-26', 5, 40, 1),
(59, 75, '2023-11-27', 5, 40, 2),
(60, 76, '2023-11-27', 5, 40, 1),
(61, 47, '2023-11-22', 6, 41, 2),
(62, 48, '2023-11-22', 6, 41, 1),
(63, 53, '2023-11-23', 6, 41, 2),
(64, 54, '2023-11-23', 6, 41, 1),
(65, 59, '2023-11-24', 6, 41, 2),
(66, 60, '2023-11-24', 6, 41, 1),
(67, 65, '2023-11-25', 6, 41, 2),
(68, 66, '2023-11-25', 6, 41, 1),
(69, 72, '2023-11-26', 6, 41, 1),
(70, 71, '2023-11-26', 6, 41, 2),
(71, 77, '2023-11-27', 6, 41, 2),
(72, 78, '2023-11-27', 6, 41, 1);

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
(1, 1, '2023-11-15', 4, 12, 1),
(2, 2, '2023-11-15', 4, 15, 1),
(3, 3, '2023-11-15', 5, 13, 1),
(4, 4, '2023-11-15', 5, 16, 1),
(5, 5, '2023-11-15', 6, 14, 1),
(6, 6, '2023-11-15', 6, 17, 1),
(7, 1, '2023-11-15', 4, 18, 2),
(8, 2, '2023-11-15', 4, 21, 2),
(9, 3, '2023-11-15', 5, 19, 2),
(10, 4, '2023-11-15', 5, 22, 2),
(11, 5, '2023-11-15', 6, 20, 2),
(12, 6, '2023-11-15', 6, 23, 2),
(13, 7, '2023-11-16', 4, 12, 1),
(14, 8, '2023-11-16', 4, 15, 2),
(15, 9, '2023-11-16', 5, 13, 1),
(16, 10, '2023-11-16', 5, 16, 1),
(17, 11, '2023-11-16', 6, 14, 2),
(18, 12, '2023-11-16', 6, 17, 2),
(19, 7, '2023-11-16', 4, 18, 2),
(20, 8, '2023-11-16', 4, 21, 1),
(21, 9, '2023-11-16', 5, 19, 2),
(22, 10, '2023-11-16', 5, 22, 2),
(23, 11, '2023-11-16', 6, 20, 2),
(24, 12, '2023-11-16', 6, 23, 2),
(25, 7, '2023-11-16', 4, 24, 2),
(26, 8, '2023-11-16', 4, 27, 2),
(27, 9, '2023-11-16', 5, 25, 2),
(28, 10, '2023-11-16', 5, 28, 2),
(29, 11, '2023-11-16', 6, 26, 1),
(30, 12, '2023-11-16', 6, 29, 1),
(31, 13, '2023-11-17', 4, 24, 1),
(32, 14, '2023-11-17', 4, 27, 1),
(33, 15, '2023-11-17', 5, 25, 1),
(34, 16, '2023-11-17', 5, 28, 1),
(35, 17, '2023-11-17', 6, 26, 1),
(36, 18, '2023-11-17', 6, 29, 1),
(37, 13, '2023-11-17', 4, 30, 2),
(38, 14, '2023-11-17', 4, 33, 2),
(39, 15, '2023-11-17', 5, 31, 2),
(40, 16, '2023-11-17', 5, 34, 2),
(41, 17, '2023-11-17', 6, 32, 2),
(42, 18, '2023-11-17', 6, 35, 2),
(43, 19, '2023-11-18', 4, 24, 1),
(44, 20, '2023-11-18', 4, 27, 1),
(45, 21, '2023-11-18', 5, 25, 1),
(46, 22, '2023-11-18', 5, 28, 1),
(47, 23, '2023-11-18', 6, 26, 1),
(48, 24, '2023-11-18', 6, 29, 1),
(49, 25, '2023-11-19', 4, 24, 1),
(50, 26, '2023-11-19', 4, 27, 1),
(51, 27, '2023-11-19', 5, 25, 1),
(52, 28, '2023-11-19', 5, 28, 1),
(53, 29, '2023-11-19', 6, 26, 1),
(54, 30, '2023-11-19', 6, 29, 1),
(55, 31, '2023-11-20', 4, 24, 1),
(56, 32, '2023-11-20', 4, 27, 2),
(57, 33, '2023-11-20', 5, 25, 1),
(58, 34, '2023-11-20', 5, 28, 2),
(59, 35, '2023-11-20', 6, 26, 1),
(60, 36, '2023-11-20', 6, 29, 2),
(61, 31, '2023-11-20', 4, 12, 2),
(62, 32, '2023-11-20', 4, 15, 1),
(63, 33, '2023-11-20', 5, 13, 2),
(64, 34, '2023-11-20', 5, 16, 1),
(65, 35, '2023-11-20', 6, 14, 2),
(66, 36, '2023-11-20', 6, 17, 1),
(67, 37, '2023-11-20', 4, 12, 2),
(68, 38, '2023-11-20', 4, 15, 1),
(69, 39, '2023-11-20', 5, 13, 2),
(70, 40, '2023-11-20', 5, 16, 1),
(71, 41, '2023-11-20', 6, 14, 2),
(72, 42, '2023-11-20', 6, 17, 1),
(73, 37, '2023-11-20', 4, 18, 1),
(74, 38, '2023-11-20', 4, 21, 2),
(75, 39, '2023-11-20', 5, 19, 1),
(76, 40, '2023-11-20', 5, 22, 2),
(77, 41, '2023-11-20', 6, 20, 1),
(78, 42, '2023-11-20', 6, 23, 2),
(79, 37, '2023-11-20', 4, 24, 2),
(80, 38, '2023-11-20', 4, 27, 2),
(81, 39, '2023-11-20', 5, 25, 2),
(82, 40, '2023-11-20', 5, 28, 2),
(83, 41, '2023-11-20', 6, 26, 2),
(84, 42, '2023-11-20', 6, 29, 2),
(85, 84, '2023-11-28', 6, 17, 1),
(86, 83, '2023-11-28', 6, 44, 1),
(87, 89, '2023-11-29', 6, 44, 1),
(88, 87, '2023-11-29', 5, 88, 1),
(89, 88, '2023-11-29', 5, 58, 1),
(90, 85, '2023-11-29', 4, 12, 1),
(91, 86, '2023-11-29', 4, 45, 1),
(92, 90, '2023-11-29', 6, 32, 1),
(93, 81, '2023-11-28', 5, 13, 1),
(94, 82, '2023-11-28', 5, 16, 1),
(95, 79, '2023-11-28', 4, 18, 1),
(96, 80, '2023-11-28', 4, 36, 1);

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
(1, 'admin', 'admin', 'Admin', 'Admin', '461 Clementi Rd', 11111111, 1, 1),
(2, 'owner', 'owner', 'Owner', 'Owner', '461 Clementi Rd', 22222222, 1, 2),
(3, 'manager', 'manager', 'Manager', 'Manager', '461 Clementi Rd', 33333333, 1, 3),
(4, 'admin2', 'admin2', 'Admin2', 'Admin2', '461 Clementi Rd', 87743201, 0, 1),
(5, 'PearlynLee', 'PearlynLee', 'Pearlyn', 'Lee', 'Yishun Ave 1, BLK 433, #08-977, 760433', 87743203, 1, 2),
(6, 'AnnabelleLee', 'AnnabelleLee', 'Annabelle', 'Lee', 'Yishun Ave 1, BLK 433, #08-977, 760433', 87743204, 0, 2),
(7, 'ChrisYin', 'ChrisYin', 'Chris', 'Yin', 'Yishun St 32, BLK 369, #08-897, 654321', 87743206, 0, 3),
(8, 'AndreTay', 'AndreTay', 'Andre', 'Tay', 'Yishun Ave 1, BLK 250, #04-557, 760250', 87743207, 1, 3),
(9, 'KellyTay', 'KellyTay', 'Kelly', 'Tay', 'Yishun Ave 1, BLK 250, #04-557, 760250', 87743209, 1, 3),
(10, 'KokLiang', 'KokLiang', 'Kok', 'Liang', 'Yishun Ave 1, BLK 250, #04-557, 760250', 87743210, 1, 3),
(11, 'RichardGoh', 'RichardGoh', 'Richard', 'Goh', 'Bukit Panjang St 51, BLK 789, #05-447, 678901', 87743205, 1, 3),
(12, 'HidayatSalaman', 'HidayatSalaman', 'Hidayat', 'Salaman', 'Bukit Merah St 91, BLK 185, #1-440, 179014', 98126712, 1, 4),
(13, 'BryanLim', 'BryanLim', 'Bryan', 'Lim', 'Sembawang Ave 75, BLK 505, #11-791, 807963', 88912323, 1, 5),
(14, 'XinhuiTan', 'XinhuiTan', 'Xin Hui', 'Tan', 'Bukit Merah Ave 72, BLK 741, #8-322, 917144', 90195442, 1, 6),
(15, 'RyantKang', 'RyantKang', 'Ryant', 'Kang', 'Bukit Gombak St 52, BLK 505, #14-270, 510654', 82672098, 1, 4),
(16, 'KeirenChow', 'KeirenChow', 'Keiren', 'Chow', 'Canberra St 52, BLK 339, #8-279, 936449', 98159761, 1, 5),
(17, 'KurtTay', 'KurtTay', 'Kurt', 'Tay', 'Bukit Gombak St 21, BLK 247, #9-221, 977031', 81709185, 1, 6),
(18, 'YuiHatano', 'YuiHatano', 'Yui', 'Hatano', 'Aljunied St 14, BLK 460, #6-204, 203478', 80481302, 1, 4),
(19, 'JohnnySins', 'JohnnySins', 'Johnny', 'Sins', 'Canberra St 41, BLK 102, #2-931, 202799', 92508837, 1, 5),
(20, 'ConnorMcGregor', 'ConnorMcGregor', 'Connor', 'McGregor', 'Choa Chu Kang Ave 99, BLK 115, #15-768, 455302', 89664136, 1, 6),
(21, 'KhabibNurmagomedov', 'KhabibNurmagomedov', 'Khabib', 'Nurmagomedov', 'Aljunied St 55, BLK 161, #13-892, 456255', 89269751, 1, 4),
(22, 'PeterGoh', 'PeterGoh', 'Peter', 'Goh', 'Yishun St 96, BLK 558, #9-344, 798696', 99309259, 1, 5),
(23, 'KellyClarkson', 'KellyClarkson', 'Kelly', 'Clarkson', 'Aljunied Ave 60, BLK 463, #5-365, 965883', 86702252, 1, 6),
(24, 'DanaWhite', 'DanaWhite', 'Dana', 'White', 'Yishun Ave 91, BLK 103, #11-464, 529633', 80008921, 1, 4),
(25, 'JoeRogan', 'JoeRogan', 'Joe', 'Rogan', 'Choa Chu Kang St 95, BLK 689, #8-442, 912461', 89265197, 1, 5),
(26, 'KhamzatChimaev', 'KhamzatChimaev', 'Khamzat', 'Chimaev', 'Choa Chu Kang St 53, BLK 890, #5-253, 852278', 92444540, 1, 6),
(27, 'SunghoonChoo', 'SunghoonChoo', 'Sunghoon', 'Choo', 'Bukit Merah Ave 50, BLK 182, #12-866, 673848', 80262601, 1, 4),
(28, 'KellyFisher', 'KellyFisher', 'Kelly', 'Fisher', 'Canberra Ave 59, BLK 129, #12-363, 982760', 90918389, 1, 5),
(29, 'AloysiusYapp', 'AloysiusYapp', 'Aloysius', 'Yapp', 'Choa Chu Kang St 21, BLK 683, #3-480, 200028', 99842661, 1, 6),
(30, 'AlbinOuschan', 'AlbinOuschan', 'Albin', 'Ouschan', 'Ang Mo Kio St 60, BLK 391, #2-284, 784931', 90731323, 1, 4),
(31, 'ShaneVanBoening', 'ShaneVanBoening', 'Shane', 'Van Boening', 'Bukit Gombak St 9, BLK 146, #13-128, 844838', 83716386, 1, 5),
(32, 'CarloBiado', 'CarloBiado', 'Carlo', 'Biado', 'Choa Chu Kang Ave 47, BLK 128, #10-641, 243687', 90209459, 1, 6),
(33, 'EfrenReyes', 'EfrenReyes', 'Efren', 'Reyes', 'Choa Chu Kang Ave 99, BLK 924, #3-223, 564077', 93785212, 1, 4),
(34, 'WarrenKiamco', 'WarrenKiamco', 'Warren', 'Kiamco', 'Bukit Gombak St 59, BLK 836, #3-145, 280365', 84189246, 1, 5),
(35, 'JoshuaFiller', 'JoshuaFiller', 'Joshua', 'Filler', 'Yishun Ave 12, BLK 413, #7-167, 859680', 94327791, 1, 6),
(36, 'PiaFiller', 'PiaFiller', 'Pia', 'Filler', 'Jurong East St 64, BLK 509, #11-267, 319693', 89280525, 1, 4),
(37, 'DavidAlcaide', 'DavidAlcaide', 'David', 'Alcaide', 'Aljunied St 5, BLK 929, #7-320, 547904', 85506451, 1, 5),
(38, 'HarryStyles', 'HarryStyles', 'Harry', 'Styles', 'Bukit Gombak Ave 49, BLK 493, #5-357, 120536', 93529067, 1, 6),
(39, 'PostMalone', 'PostMalone', 'Post', 'Malone', 'Jurong East Ave 69, BLK 116, #4-762, 201279', 80392108, 1, 4),
(40, 'ChesterBennington', 'ChesterBennington', 'Chester', 'Bennington', 'Bukit Merah Ave 8, BLK 783, #11-558, 791239', 93391779, 1, 5),
(41, 'JuliaBlack', 'JuliaBlack', 'Julia', 'Black', 'Jurong East St 43, BLK 321, #9-152, 523376', 96410773, 1, 6),
(42, 'HibikiOtsuki', 'HibikiOtsuki', 'Hibiki', 'Otsuki', 'Jurong East Ave 89, BLK 451, #8-985, 764044', 96805785, 1, 4),
(43, 'SaikaKawakita', 'SaikaKawakita', 'Saika', 'Kawakita', 'Ang Mo Kio St 43, BLK 108, #8-141, 578632', 86610082, 1, 5),
(44, 'ShokoTakahashi', 'ShokoTakahashi', 'Shoko', 'Takahashi', 'Yishun Ave 24, BLK 755, #3-781, 965016', 99560556, 1, 6),
(45, 'YuaMikami', 'YuaMikami', 'Yua', 'Mikami', 'Yishun St 87, BLK 275, #9-892, 820212', 90963203, 1, 4),
(46, 'MeiMiyajima', 'MeiMiyajima', 'Mei', 'Miyajima', 'Ang Mo Kio St 21, BLK 139, #6-744, 511751', 93406338, 1, 5),
(47, 'AikaYumeno', 'AikaYumeno', 'Aika', 'Yumeno', 'Woodlands St 68, BLK 884, #13-347, 142901', 90440281, 1, 6),
(48, 'RobbieCapitio', 'RobbieCapitio', 'Robbie', 'Capito', 'Canberra Ave 48, BLK 971, #5-666, 250359', 96015419, 1, 4),
(49, 'MaxEberle', 'MaxEberle', 'Max', 'Eberle', 'Canberra Ave 39, BLK 211, #10-749, 636872', 90651719, 1, 5),
(50, 'TohLianHan', 'TohLianHan', 'Lian Han', 'Toh', 'Bukit Gombak Ave 36, BLK 592, #8-833, 557419', 91945706, 1, 6),
(51, 'GaryWilson', 'GaryWilson', 'Gary', 'Wilson', 'Sembawang St 30, BLK 261, #5-893, 812125', 92169921, 1, 4),
(52, 'JeffreyDeLuna', 'JeffreyDeLuna', 'Jeffrey', 'De Luna', 'Bukit Merah Ave 47, BLK 545, #2-209, 777113', 98014728, 1, 5),
(53, 'KyleAmaroto', 'KyleAmaroto', 'Kyle', 'Amaroto', 'Bukit Merah St 44, BLK 942, #7-952, 136490', 99294070, 1, 6),
(54, 'PetriMakkonen', 'PetriMakkonen', 'Petri', 'Makkonen', 'Choa Chu Kang Ave 58, BLK 646, #12-731, 537867', 97440459, 1, 4),
(55, 'DarrenAppleton', 'DarrenAppleton', 'Darren', 'Appleton', 'Woodlands St 17, BLK 677, #4-861, 786406', 92550901, 1, 5),
(56, 'ShaneWolf', 'ShaneWolf', 'Shane', 'Wolf', 'Woodlands Ave 9, BLK 211, #5-406, 983397', 81111174, 1, 6),
(57, 'ChrisMelling', 'ChrisMelling', 'Chris', 'Melling', 'Ang Mo Kio St 94, BLK 585, #5-846, 744351', 94908119, 1, 4),
(58, 'WuKunLin', 'WuKunLin', 'Kun Lin', 'Wu', 'Choa Chu Kang Ave 10, BLK 145, #9-968, 737214', 99961966, 1, 5),
(59, 'AlexPagulayan', 'AlexPagulayan', 'Alex', 'Pagulayan', 'Jurong East Ave 3, BLK 222, #6-524, 477474', 90325960, 1, 6),
(60, 'ImranMajid', 'ImranMajid', 'Imran', 'Majid', 'Jurong East St 88, BLK 877, #7-241, 519947', 97984573, 1, 4),
(61, 'RolanGarcia', 'RolanGarcia', 'Rolan', 'Garcia', 'Yishun Ave 25, BLK 124, #5-997, 977193', 95571007, 1, 5),
(62, 'MikaImmnonen', 'MikaImmonen', 'Mika', 'Immonen', 'Aljunied St 57, BLK 740, #14-470, 597860', 85879891, 1, 6),
(63, 'TylerStyer', 'TylerStyer', 'Tyler', 'Styer', 'Canberra Ave 99, BLK 767, #9-571, 463676', 97310724, 1, 4),
(64, 'FranciscoSanchezRuiz', 'FranciscoSanchezRuiz', 'Francisco', 'Sanchez-Ruiz', 'Bukit Merah Ave 99, BLK 678, #11-901, 208556', 82907443, 1, 5),
(65, 'ThorstenHohmann', 'ThorstenHohmann', 'Thorsten', 'Hohmann', 'Choa Chu Kang St 19, BLK 984, #5-138, 733583', 83838043, 1, 6),
(66, 'RalfSouquet', 'RalfSouquet', 'Ralf', 'Souquet', 'Bukit Merah Ave 99, BLK 410, #12-513, 302796', 96389300, 1, 4),
(67, 'DensiGrabe', 'DenisGrabe', 'Denis', 'Grabe', 'Aljunied Ave 47, BLK 642, #9-823, 932790', 84794452, 1, 5),
(68, 'ChangJungLin', 'ChangJungLin', 'Jung-Lin', 'Chang', 'Aljunied St 88, BLK 997, #7-942, 398257', 94411049, 1, 6),
(69, 'MichaelFeliciano', 'MichaelFeliciano', 'Michael', 'Feliciano', 'Sembawang St 93, BLK 654, #6-246, 456947', 93421223, 1, 4),
(70, 'JohnMorra', 'JohnMorra', 'John', 'Morra', 'Aljunied St 91, BLK 651, #5-284, 828412', 88787275, 1, 5),
(71, 'MohammadSoufi', 'MohammadSoufi', 'Mohammad', 'Soufi', 'Sembawang Ave 80, BLK 434, #6-375, 290434', 91260930, 1, 6),
(72, 'MarcBijsterbosch', 'MarcBijsterbosch', 'Marc', 'Bijsterbosch', 'Bukit Gombak St 47, BLK 184, #13-348, 201223', 94285687, 1, 4),
(73, 'KonradJuszczyszyn', 'KonradJuszczyszyn', 'Konrad', 'Juszczyszyn', 'Jurong East St 97, BLK 778, #10-414, 403684', 85746532, 1, 5),
(74, 'OliverSzolnoki', 'OliverSzolnoki', 'Oliver', 'Szolnoki', 'Aljunied Ave 61, BLK 179, #12-935, 846301', 95357721, 1, 6),
(75, 'MieszkoFortunski', 'MieszkoFortunski', 'Mieszko', 'Fortunski', 'Yishun St 83, BLK 300, #13-859, 855172', 99932148, 1, 4),
(76, 'WojciechSzewczyk', 'WojciechSzewczyk', 'Wojciech', 'Szewczyk', 'Bukit Gombak St 6, BLK 102, #5-619, 322916', 97963444, 1, 5),
(77, 'NaoyukiOi', 'NaoyukiOi', 'Naoyuki', 'Oi', 'Jurong East St 57, BLK 842, #7-161, 832029', 89716979, 1, 6),
(78, 'MoritzNeuhasen', 'MoritzNeuhasen', 'Moritz', 'Neuhasen', 'Choa Chu Kang Ave 22, BLK 931, #3-898, 161483', 91604364, 1, 4),
(79, 'NeilsFeijen', 'NeilsFeijen', 'Neils', 'Feijen', 'Canberra Ave 86, BLK 992, #14-881, 192496', 98191302, 1, 5),
(80, 'WiktorZielinski', 'WiktorZielinski', 'Wiktor', 'Zielinski', 'Choa Chu Kang St 99, BLK 563, #8-850, 721303', 91638904, 1, 6),
(81, 'SkylerWoodward', 'SkylerWoodward', 'Skyler', 'Woodward', 'Aljunied Ave 79, BLK 367, #13-899, 235829', 91691288, 1, 4),
(82, 'AlexanderKazakis', 'AlexanderKazakis', 'Alexander', 'Kazakis', 'Yishun St 97, BLK 618, #7-124, 434356', 85466060, 1, 5),
(83, 'MaxLechner', 'MaxLechner', 'Max', 'Lechner', 'Choa Chu Kang St 25, BLK 409, #10-241, 609874', 99082041, 1, 6),
(84, 'EklentKaci', 'EklentKaci', 'Eklent', 'Kaci', 'Ang Mo Kio St 47, BLK 603, #3-443, 346327', 97853799, 1, 4),
(85, 'MarioHe', 'MarioHe', 'Mario', 'He', 'Ang Mo Kio St 93, BLK 544, #12-944, 431040', 90868854, 1, 5),
(86, 'KoPinYi', 'KoPinYi', 'Pin Yi', 'Ko', 'Yishun Ave 19, BLK 705, #1-763, 145502', 85586438, 1, 6),
(87, 'KoPingChung', 'KoPingChung', 'Ping Chung', 'Ko', 'Ang Mo Kio Ave 5, BLK 768, #4-304, 874222', 90478335, 1, 4),
(88, 'KoPingHan', 'KoPingHan', 'Ping Han', 'Ko', 'Choa Chu Kang St 39, BLK 248, #5-884, 139166', 85338449, 1, 5),
(89, 'FedorGorst', 'FedorGorst', 'Fedor', 'Gorst', 'Jurong East St 18, BLK 358, #10-502, 216891', 87791350, 1, 6),
(90, 'AlexEubanks', 'AlexEubanks', 'Alex', 'Eubanks', 'Choa Chu Kang St 85, BLK 292, #12-614, 511900', 84736940, 1, 4),
(91, 'AndrewEubanks', 'AndrewEubanks', 'Andrew', 'Eubanks', 'Bukit Gombak St 52, BLK 806, #7-857, 881330', 88394351, 1, 5),
(92, 'SamSulek', 'SamSulek', 'Sam', 'Sulek', 'Woodlands St 36, BLK 465, #8-170, 809964', 83810665, 1, 6),
(93, 'JeffNippard', 'JeffNippard', 'Jeff', 'Nippard', 'Yishun St 38, BLK 905, #15-343, 140153', 91603419, 1, 4),
(94, 'ChrisBumstead', 'ChrisBumstead', 'Chris', 'Bumstead', 'Canberra Ave 65, BLK 929, #14-558, 301025', 98196946, 1, 5),
(95, 'RonnieColeman', 'RonnieColeman', 'Ronnie', 'Coleman', 'Yishun St 80, BLK 457, #1-215, 510300', 84615781, 1, 6),
(96, 'MarkSelby', 'MarkSelby', 'Mark', 'Selby', 'Yishun St 75, BLK 105, #3-317, 329890', 80915769, 1, 4),
(97, 'RonnieOSullivan', 'RonnieOSullivan', 'Ronnie', 'OSullivan', 'Ang Mo Kio Ave 47, BLK 658, #9-383, 861380', 94017693, 1, 5),
(98, 'KarlBoyes', 'KarlBoyes', 'Karl', 'Boyes', 'Aljunied St 49, BLK 376, #1-635, 716039', 95255389, 1, 6),
(99, 'JaysonShaw', 'JaysonShaw', 'Jayson', 'Shaw', 'Sembawang St 39, BLK 286, #14-249, 789471', 99622609, 0, 4),
(100, 'EarlStrickland', 'EarlStrickland', 'Earl', 'Strickland', 'Woodlands Ave 33, BLK 498, #2-504, 177046', 92766913, 1, 5),
(101, 'FranciscoBustamante', 'FranciscoBustamante', 'Francisco', 'Bustamante', 'Sembawang Ave 23, BLK 204, #12-171, 593667', 80081523, 1, 6);

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
(6, 'Cafe Staff', 'Bid for work slots', 'Waiter', 1),
(7, 'Cafe Staff', 'Bid for work slots - Responsible for maintaining cleanliness', 'Cleaner', 0);

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
(1, '2023-11-15', 4, 12),
(2, '2023-11-15', 4, 15),
(3, '2023-11-15', 5, 13),
(4, '2023-11-15', 5, 16),
(5, '2023-11-15', 6, 14),
(6, '2023-11-15', 6, 17),
(7, '2023-11-16', 4, 12),
(8, '2023-11-16', 4, 21),
(9, '2023-11-16', 5, 13),
(10, '2023-11-16', 5, 16),
(11, '2023-11-16', 6, 26),
(12, '2023-11-16', 6, 29),
(13, '2023-11-17', 4, 24),
(14, '2023-11-17', 4, 27),
(15, '2023-11-17', 5, 25),
(16, '2023-11-17', 5, 28),
(17, '2023-11-17', 6, 26),
(18, '2023-11-17', 6, 29),
(19, '2023-11-18', 4, 24),
(20, '2023-11-18', 4, 27),
(21, '2023-11-18', 5, 25),
(22, '2023-11-18', 5, 28),
(23, '2023-11-18', 6, 26),
(24, '2023-11-18', 6, 29),
(25, '2023-11-19', 4, 24),
(26, '2023-11-19', 4, 27),
(27, '2023-11-19', 5, 25),
(28, '2023-11-19', 5, 28),
(29, '2023-11-19', 6, 26),
(30, '2023-11-19', 6, 29),
(31, '2023-11-20', 4, 24),
(32, '2023-11-20', 4, 15),
(33, '2023-11-20', 5, 25),
(34, '2023-11-20', 5, 16),
(35, '2023-11-20', 6, 26),
(36, '2023-11-20', 6, 17),
(37, '2023-11-21', 4, 18),
(38, '2023-11-21', 4, 15),
(39, '2023-11-21', 5, 19),
(40, '2023-11-21', 5, 16),
(41, '2023-11-21', 6, 20),
(42, '2023-11-21', 6, 17),
(43, '2023-11-22', 4, 36),
(44, '2023-11-22', 4, 39),
(45, '2023-11-22', 5, 37),
(46, '2023-11-22', 5, 40),
(47, '2023-11-22', 6, 38),
(48, '2023-11-22', 6, 41),
(49, '2023-11-23', 4, 36),
(50, '2023-11-23', 4, 39),
(51, '2023-11-23', 5, 37),
(52, '2023-11-23', 5, 40),
(53, '2023-11-23', 6, 38),
(54, '2023-11-23', 6, 41),
(55, '2023-11-24', 4, 36),
(56, '2023-11-24', 4, 39),
(57, '2023-11-24', 5, 40),
(58, '2023-11-24', 5, 37),
(59, '2023-11-24', 6, 38),
(60, '2023-11-24', 6, 1),
(61, '2023-11-25', 4, 36),
(62, '2023-11-25', 4, 39),
(63, '2023-11-25', 5, 37),
(64, '2023-11-25', 5, 40),
(65, '2023-11-25', 6, 38),
(66, '2023-11-25', 6, 41),
(67, '2023-11-26', 4, 36),
(68, '2023-11-26', 4, 39),
(69, '2023-11-26', 5, 40),
(70, '2023-11-26', 5, 37),
(71, '2023-11-26', 6, 38),
(72, '2023-11-26', 6, 41),
(73, '2023-11-27', 4, 36),
(74, '2023-11-27', 4, 39),
(75, '2023-11-27', 5, 37),
(76, '2023-11-27', 5, 40),
(77, '2023-11-27', 6, 38),
(78, '2023-11-27', 6, 41),
(79, '2023-11-28', 4, 18),
(80, '2023-11-28', 4, 36),
(81, '2023-11-28', 5, 13),
(82, '2023-11-28', 5, 16),
(83, '2023-11-28', 6, 44),
(84, '2023-11-28', 6, 17),
(85, '2023-11-29', 4, 12),
(86, '2023-11-29', 4, 45),
(87, '2023-11-29', 5, 88),
(88, '2023-11-29', 5, 58),
(89, '2023-11-29', 6, 44),
(90, '2023-11-29', 6, 32);

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
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userProfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workslot`
--
ALTER TABLE `workslot`
  MODIFY `workslotId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

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
