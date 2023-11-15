-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 08:18 AM
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
(1, 11, '2023-11-16', 6, 14, 0),
(2, 11, '2023-11-16', 6, 20, 0),
(3, 11, '2023-11-16', 6, 17, 0);

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
(1, 'admin001', 'admin001', 'Admin1', 'Admin1', '461 Clementi Rd', 87743200, 1, 1),
(2, 'admin002', 'admin002', 'Admin2', 'Admin2', '461 Clementi Rd', 87743201, 1, 1),
(3, 'owner001', 'owner001', 'Pearlyn', 'Lee', 'Yishun Ave 1, BLK 433, #08-977, 760433', 87743202, 1, 2),
(4, 'owner002', 'owner002', 'Annabelle', 'Lee', 'Yishun Ave 1, BLK 433, #08-977, 760433', 87743203, 1, 2),
(5, 'owner003', 'owner003', 'Gary', 'Lee', 'Yishun Ave 1, BLK 433, #08-977, 760433', 87743208, 1, 2),
(6, 'manager001', 'manager001', 'Chris', 'Yin', 'Ang Mo Kio Ave 9, BLK 122, #04-447, 789007', 87743204, 1, 3),
(7, 'manager002', 'manager002', 'Richard', 'Goh', 'Bukit Panjang St 51, BLK 789, #05-447, 678901', 87743205, 1, 3),
(8, 'manager003', 'manager003', 'Kok', 'Liang', 'Yishun St 32, BLK 369, #08-897, 654321', 87743206, 1, 3),
(9, 'manager004', 'manager004', 'Andre', 'Tay', 'Yishun Ave 1, BLK 250, #04-557, 760250', 87743207, 1, 3),
(10, 'manager005', 'manager005', 'Kelly', 'Tay', 'Yishun Ave 1, BLK 250, #04-557, 760250', 87743209, 1, 3),
(11, 'manager006', 'manager006', 'Andre', 'Tay', 'Yishun Ave 1, BLK 250, #04-557, 760250', 87743210, 1, 3),
(12, 'staff001', 'staff001', 'Hidayat', 'Salaman', 'Bukit Merah St 91, BLK 185, #1-440, 179014', 98126712, 1, 4),
(13, 'staff002', 'staff002', 'Bryan', 'Lim', 'Sembawang Ave 75, BLK 505, #11-791, 807963', 88912323, 1, 5),
(14, 'staff003', 'staff003', 'Xin Hui', 'Tan', 'Bukit Merah Ave 72, BLK 741, #8-322, 917144', 90195442, 1, 6),
(15, 'staff004', 'staff004', 'Ryant', 'Kang', 'Bukit Gombak St 52, BLK 505, #14-270, 510654', 82672098, 1, 4),
(16, 'staff005', 'staff005', 'Keiren', 'Chow', 'Canberra St 52, BLK 339, #8-279, 936449', 98159761, 1, 5),
(17, 'staff006', 'staff006', 'Kurt', 'Tay', 'Bukit Gombak St 21, BLK 247, #9-221, 977031', 81709185, 1, 6),
(18, 'staff007', 'staff007', 'Yui', 'Hatano', 'Aljunied St 14, BLK 460, #6-204, 203478', 80481302, 1, 4),
(19, 'staff008', 'staff008', 'Johnny', 'Sins', 'Canberra St 41, BLK 102, #2-931, 202799', 92508837, 1, 5),
(20, 'staff009', 'staff009', 'Connor', 'McGregor', 'Choa Chu Kang Ave 99, BLK 115, #15-768, 455302', 89664136, 1, 6),
(21, 'staff010', 'staff010', 'Khabib', 'Nurmagomedov', 'Aljunied St 55, BLK 161, #13-892, 456255', 89269751, 1, 4),
(22, 'staff011', 'staff011', 'Peter', 'Goh', 'Yishun St 96, BLK 558, #9-344, 798696', 99309259, 1, 5),
(23, 'staff012', 'staff012', 'Kelly', 'Clarkson', 'Aljunied Ave 60, BLK 463, #5-365, 965883', 86702252, 1, 6),
(24, 'staff013', 'staff013', 'Dana', 'White', 'Yishun Ave 91, BLK 103, #11-464, 529633', 80008921, 1, 4),
(25, 'staff014', 'staff014', 'Joe', 'Rogan', 'Choa Chu Kang St 95, BLK 689, #8-442, 912461', 89265197, 1, 5),
(26, 'staff015', 'staff015', 'Khamzat', 'Chimaev', 'Choa Chu Kang St 53, BLK 890, #5-253, 852278', 92444540, 1, 6),
(27, 'staff016', 'staff016', 'Sunghoon', 'Choo', 'Bukit Merah Ave 50, BLK 182, #12-866, 673848', 80262601, 1, 4),
(28, 'staff017', 'staff017', 'Kelly', 'Fisher', 'Canberra Ave 59, BLK 129, #12-363, 982760', 90918389, 1, 5),
(29, 'staff018', 'staff018', 'Aloysius', 'Yapp', 'Choa Chu Kang St 21, BLK 683, #3-480, 200028', 99842661, 1, 6),
(30, 'staff019', 'staff019', 'Albin', 'Ouschan', 'Ang Mo Kio St 60, BLK 391, #2-284, 784931', 90731323, 1, 4),
(31, 'staff020', 'staff020', 'Shane', 'Van Boening', 'Bukit Gombak St 9, BLK 146, #13-128, 844838', 83716386, 1, 5),
(32, 'staff021', 'staff021', 'Carlo', 'Biado', 'Choa Chu Kang Ave 47, BLK 128, #10-641, 243687', 90209459, 1, 6),
(33, 'staff022', 'staff022', 'Efren', 'Reyes', 'Choa Chu Kang Ave 99, BLK 924, #3-223, 564077', 93785212, 1, 4),
(34, 'staff023', 'staff023', 'Warren', 'Kiamco', 'Bukit Gombak St 59, BLK 836, #3-145, 280365', 84189246, 1, 5),
(35, 'staff024', 'staff024', 'Joshua', 'Filler', 'Yishun Ave 12, BLK 413, #7-167, 859680', 94327791, 1, 6),
(36, 'staff025', 'staff025', 'Pia', 'Filler', 'Jurong East St 64, BLK 509, #11-267, 319693', 89280525, 1, 4),
(37, 'staff026', 'staff026', 'David', 'Alcaide', 'Aljunied St 5, BLK 929, #7-320, 547904', 85506451, 1, 5),
(38, 'staff027', 'staff027', 'Harry', 'Styles', 'Bukit Gombak Ave 49, BLK 493, #5-357, 120536', 93529067, 1, 6),
(39, 'staff028', 'staff028', 'Post', 'Malone', 'Jurong East Ave 69, BLK 116, #4-762, 201279', 80392108, 1, 4),
(40, 'staff029', 'staff029', 'Chester', 'Bennington', 'Bukit Merah Ave 8, BLK 783, #11-558, 791239', 93391779, 1, 5),
(41, 'staff030', 'staff030', 'Julia', 'Black', 'Jurong East St 43, BLK 321, #9-152, 523376', 96410773, 1, 6),
(42, 'staff031', 'staff031', 'Hibiki', 'Otsuki', 'Jurong East Ave 89, BLK 451, #8-985, 764044', 96805785, 1, 4),
(43, 'staff032', 'staff032', 'Saika', 'Kawakita', 'Ang Mo Kio St 43, BLK 108, #8-141, 578632', 86610082, 1, 5),
(44, 'staff033', 'staff033', 'Shoko', 'Takahashi', 'Yishun Ave 24, BLK 755, #3-781, 965016', 99560556, 1, 6),
(45, 'staff034', 'staff034', 'Yua', 'Mikami', 'Yishun St 87, BLK 275, #9-892, 820212', 90963203, 1, 4),
(46, 'staff035', 'staff035', 'Mei', 'Miyajima', 'Ang Mo Kio St 21, BLK 139, #6-744, 511751', 93406338, 1, 5),
(47, 'staff036', 'staff036', 'Aika', 'Yumeno', 'Woodlands St 68, BLK 884, #13-347, 142901', 90440281, 1, 6),
(48, 'staff037', 'staff037', 'Robbie', 'Capito', 'Canberra Ave 48, BLK 971, #5-666, 250359', 96015419, 1, 4),
(49, 'staff038', 'staff038', 'Max', 'Eberle', 'Canberra Ave 39, BLK 211, #10-749, 636872', 90651719, 1, 5),
(50, 'staff039', 'staff039', 'Lian Han', 'Toh', 'Bukit Gombak Ave 36, BLK 592, #8-833, 557419', 91945706, 1, 6),
(51, 'staff040', 'staff040', 'Gary', 'Wilson', 'Sembawang St 30, BLK 261, #5-893, 812125', 92169921, 1, 4),
(52, 'staff041', 'staff041', 'Jeffrey', 'De Luna', 'Bukit Merah Ave 47, BLK 545, #2-209, 777113', 98014728, 1, 5),
(53, 'staff042', 'staff042', 'Kyle', 'Amaroto', 'Bukit Merah St 44, BLK 942, #7-952, 136490', 99294070, 1, 6),
(54, 'staff043', 'staff043', 'Petri', 'Makkonen', 'Choa Chu Kang Ave 58, BLK 646, #12-731, 537867', 97440459, 1, 4),
(55, 'staff044', 'staff044', 'Darren', 'Appleton', 'Woodlands St 17, BLK 677, #4-861, 786406', 92550901, 1, 5),
(56, 'staff045', 'staff045', 'Shane', 'Wolf', 'Woodlands Ave 9, BLK 211, #5-406, 983397', 81111174, 1, 6),
(57, 'staff046', 'staff046', 'Chris', 'Melling', 'Ang Mo Kio St 94, BLK 585, #5-846, 744351', 94908119, 1, 4),
(58, 'staff047', 'staff047', 'Kun Lin', 'Wu', 'Choa Chu Kang Ave 10, BLK 145, #9-968, 737214', 99961966, 1, 5),
(59, 'staff048', 'staff048', 'Alex', 'Pagulayan', 'Jurong East Ave 3, BLK 222, #6-524, 477474', 90325960, 1, 6),
(60, 'staff049', 'staff049', 'Imran', 'Majid', 'Jurong East St 88, BLK 877, #7-241, 519947', 97984573, 1, 4),
(61, 'staff050', 'staff050', 'Rolan', 'Garcia', 'Yishun Ave 25, BLK 124, #5-997, 977193', 95571007, 1, 5),
(62, 'staff051', 'staff051', 'Mika', 'Immonen', 'Aljunied St 57, BLK 740, #14-470, 597860', 85879891, 1, 6),
(63, 'staff052', 'staff052', 'Tyler', 'Styer', 'Canberra Ave 99, BLK 767, #9-571, 463676', 97310724, 1, 4),
(64, 'staff053', 'staff053', 'Francisco', 'Sanchez-Ruiz', 'Bukit Merah Ave 99, BLK 678, #11-901, 208556', 82907443, 1, 5),
(65, 'staff054', 'staff054', 'Thorsten', 'Hohmann', 'Choa Chu Kang St 19, BLK 984, #5-138, 733583', 83838043, 1, 6),
(66, 'staff055', 'staff055', 'Ralf', 'Souquet', 'Bukit Merah Ave 99, BLK 410, #12-513, 302796', 96389300, 1, 4),
(67, 'staff056', 'staff056', 'Denis', 'Grabe', 'Aljunied Ave 47, BLK 642, #9-823, 932790', 84794452, 1, 5),
(68, 'staff057', 'staff057', 'Jung-Lin', 'Chang', 'Aljunied St 88, BLK 997, #7-942, 398257', 94411049, 1, 6),
(69, 'staff058', 'staff058', 'Michael', 'Feliciano', 'Sembawang St 93, BLK 654, #6-246, 456947', 93421223, 1, 4),
(70, 'staff059', 'staff059', 'John', 'Morra', 'Aljunied St 91, BLK 651, #5-284, 828412', 88787275, 1, 5),
(71, 'staff060', 'staff060', 'Mohammad', 'Soufi', 'Sembawang Ave 80, BLK 434, #6-375, 290434', 91260930, 1, 6),
(72, 'staff061', 'staff061', 'Marc', 'Bijsterbosch', 'Bukit Gombak St 47, BLK 184, #13-348, 201223', 94285687, 1, 4),
(73, 'staff062', 'staff062', 'Konrad', 'Juszczyszyn', 'Jurong East St 97, BLK 778, #10-414, 403684', 85746532, 1, 5),
(74, 'staff063', 'staff063', 'Oliver', 'Szolnoki', 'Aljunied Ave 61, BLK 179, #12-935, 846301', 95357721, 1, 6),
(75, 'staff064', 'staff064', 'Mieszko', 'Fortunski', 'Yishun St 83, BLK 300, #13-859, 855172', 99932148, 1, 4),
(76, 'staff065', 'staff065', 'Wojciech', 'Szewczyk', 'Bukit Gombak St 6, BLK 102, #5-619, 322916', 97963444, 1, 5),
(77, 'staff066', 'staff066', 'Naoyuki', 'Oi', 'Jurong East St 57, BLK 842, #7-161, 832029', 89716979, 1, 6),
(78, 'staff067', 'staff067', 'Moritz', 'Neuhasen', 'Choa Chu Kang Ave 22, BLK 931, #3-898, 161483', 91604364, 1, 4),
(79, 'staff068', 'staff068', 'Neils', 'Feijen', 'Canberra Ave 86, BLK 992, #14-881, 192496', 98191302, 1, 5),
(80, 'staff069', 'staff069', 'Wiktor', 'Zielinski', 'Choa Chu Kang St 99, BLK 563, #8-850, 721303', 91638904, 1, 6),
(81, 'staff070', 'staff070', 'Skyler', 'Woodward', 'Aljunied Ave 79, BLK 367, #13-899, 235829', 91691288, 1, 4),
(82, 'staff071', 'staff071', 'Alexander', 'Kazakis', 'Yishun St 97, BLK 618, #7-124, 434356', 85466060, 1, 5),
(83, 'staff072', 'staff072', 'Max', 'Lechner', 'Choa Chu Kang St 25, BLK 409, #10-241, 609874', 99082041, 1, 6),
(84, 'staff073', 'staff073', 'Eklent', 'Kaci', 'Ang Mo Kio St 47, BLK 603, #3-443, 346327', 97853799, 1, 4),
(85, 'staff074', 'staff074', 'Mario', 'He', 'Ang Mo Kio St 93, BLK 544, #12-944, 431040', 90868854, 1, 5),
(86, 'staff075', 'staff075', 'Pin Yi', 'Ko', 'Yishun Ave 19, BLK 705, #1-763, 145502', 85586438, 1, 6),
(87, 'staff076', 'staff076', 'Ping Chung', 'Ko', 'Ang Mo Kio Ave 5, BLK 768, #4-304, 874222', 90478335, 1, 4),
(88, 'staff077', 'staff077', 'Ping Han', 'Ko', 'Choa Chu Kang St 39, BLK 248, #5-884, 139166', 85338449, 1, 5),
(89, 'staff078', 'staff078', 'Fedor', 'Gorst', 'Jurong East St 18, BLK 358, #10-502, 216891', 87791350, 1, 6),
(90, 'staff079', 'staff079', 'Alex', 'Eubanks', 'Choa Chu Kang St 85, BLK 292, #12-614, 511900', 84736940, 1, 4),
(91, 'staff080', 'staff080', 'Andrew', 'Eubanks', 'Bukit Gombak St 52, BLK 806, #7-857, 881330', 88394351, 1, 5),
(92, 'staff081', 'staff081', 'Sam', 'Sulek', 'Woodlands St 36, BLK 465, #8-170, 809964', 83810665, 1, 6),
(93, 'staff082', 'staff082', 'Jeff', 'Nippard', 'Yishun St 38, BLK 905, #15-343, 140153', 91603419, 1, 4),
(94, 'staff083', 'staff083', 'Chris', 'Bumstead', 'Canberra Ave 65, BLK 929, #14-558, 301025', 98196946, 1, 5),
(95, 'staff084', 'staff084', 'Ronnie', 'Coleman', 'Yishun St 80, BLK 457, #1-215, 510300', 84615781, 1, 6),
(96, 'staff085', 'staff085', 'Mark', 'Selby', 'Yishun St 75, BLK 105, #3-317, 329890', 80915769, 1, 4),
(97, 'staff086', 'staff086', 'Ronnie', 'OSullivan', 'Ang Mo Kio Ave 47, BLK 658, #9-383, 861380', 94017693, 1, 5),
(98, 'staff087', 'staff087', 'Karl', 'Boyles', 'Aljunied St 49, BLK 376, #1-635, 716039', 95255389, 1, 6),
(99, 'staff088', 'staff088', 'Jayson', 'Shaw', 'Sembawang St 39, BLK 286, #14-249, 789471', 99622609, 1, 4),
(100, 'staff089', 'staff089', 'Earl', 'Strickland', 'Woodlands Ave 33, BLK 498, #2-504, 177046', 92766913, 1, 5),
(101, 'staff090', 'staff090', 'Francisco', 'Bustamante', 'Sembawang Ave 23, BLK 204, #12-171, 593667', 80081523, 1, 6);

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
(1, '2023-11-15', 4, NULL),
(2, '2023-11-15', 4, NULL),
(3, '2023-11-15', 5, NULL),
(4, '2023-11-15', 5, NULL),
(5, '2023-11-15', 6, NULL),
(6, '2023-11-15', 6, NULL),
(7, '2023-11-16', 4, NULL),
(8, '2023-11-16', 4, NULL),
(9, '2023-11-16', 5, NULL),
(10, '2023-11-16', 5, NULL),
(11, '2023-11-16', 6, NULL),
(12, '2023-11-16', 6, NULL),
(13, '2023-11-17', 4, NULL),
(14, '2023-11-17', 4, NULL),
(15, '2023-11-17', 5, NULL),
(16, '2023-11-17', 5, NULL),
(17, '2023-11-17', 6, NULL),
(18, '2023-11-17', 6, NULL),
(19, '2023-11-18', 4, NULL),
(20, '2023-11-18', 4, NULL),
(21, '2023-11-18', 5, NULL),
(22, '2023-11-18', 5, NULL),
(23, '2023-11-18', 6, NULL),
(24, '2023-11-18', 6, NULL),
(25, '2023-11-19', 4, NULL),
(26, '2023-11-19', 4, NULL),
(27, '2023-11-19', 5, NULL),
(28, '2023-11-19', 5, NULL),
(29, '2023-11-19', 6, NULL),
(30, '2023-11-19', 6, NULL),
(31, '2023-11-20', 4, NULL),
(32, '2023-11-20', 4, NULL),
(33, '2023-11-20', 5, NULL),
(34, '2023-11-20', 5, NULL),
(35, '2023-11-20', 6, NULL),
(36, '2023-11-20', 6, NULL),
(37, '2023-11-21', 4, NULL),
(38, '2023-11-21', 4, NULL),
(39, '2023-11-21', 5, NULL),
(40, '2023-11-21', 5, NULL),
(41, '2023-11-21', 6, NULL),
(42, '2023-11-21', 6, NULL),
(43, '2023-11-22', 4, NULL),
(44, '2023-11-22', 4, NULL),
(45, '2023-11-22', 5, NULL),
(46, '2023-11-22', 5, NULL),
(47, '2023-11-22', 6, NULL),
(48, '2023-11-22', 6, NULL),
(49, '2023-11-23', 4, NULL),
(50, '2023-11-23', 4, NULL),
(51, '2023-11-23', 5, NULL),
(52, '2023-11-23', 5, NULL),
(53, '2023-11-23', 6, NULL),
(54, '2023-11-23', 6, NULL),
(55, '2023-11-24', 4, NULL),
(56, '2023-11-24', 4, NULL),
(57, '2023-11-24', 5, NULL),
(58, '2023-11-24', 5, NULL),
(59, '2023-11-24', 6, NULL),
(60, '2023-11-24', 6, NULL),
(61, '2023-11-25', 4, NULL),
(62, '2023-11-25', 4, NULL),
(63, '2023-11-25', 5, NULL),
(64, '2023-11-25', 5, NULL),
(65, '2023-11-25', 6, NULL),
(66, '2023-11-25', 6, NULL),
(67, '2023-11-26', 4, NULL),
(68, '2023-11-26', 4, NULL),
(69, '2023-11-26', 5, NULL),
(70, '2023-11-26', 5, NULL),
(71, '2023-11-26', 6, NULL),
(72, '2023-11-26', 6, NULL),
(73, '2023-11-27', 4, NULL),
(74, '2023-11-27', 4, NULL),
(75, '2023-11-27', 5, NULL),
(76, '2023-11-27', 5, NULL),
(77, '2023-11-27', 6, NULL),
(78, '2023-11-27', 6, NULL),
(79, '2023-11-28', 4, NULL),
(80, '2023-11-28', 4, NULL),
(81, '2023-11-28', 5, NULL),
(82, '2023-11-28', 5, NULL),
(83, '2023-11-28', 6, NULL),
(84, '2023-11-28', 6, NULL),
(85, '2023-11-29', 4, NULL),
(86, '2023-11-29', 4, NULL),
(87, '2023-11-29', 5, NULL),
(88, '2023-11-29', 5, NULL),
(89, '2023-11-29', 6, NULL),
(90, '2023-11-29', 6, NULL);

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
  MODIFY `bidId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `userProfileId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
