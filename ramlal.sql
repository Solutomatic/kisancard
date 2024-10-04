-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2024 at 08:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramlal`
--

-- --------------------------------------------------------

--
-- Table structure for table `assembly`
--

CREATE TABLE `assembly` (
  `Id` int(11) NOT NULL,
  `AsseblyName` varchar(250) DEFAULT NULL,
  `District` varchar(150) DEFAULT NULL,
  `State` varchar(120) DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT 1,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assembly`
--

INSERT INTO `assembly` (`Id`, `AsseblyName`, `District`, `State`, `Active`, `CreateDate`) VALUES
(1, 'Sujanpur\n', 'Pathankot', 'Punjab', 1, '2023-02-09 10:37:21'),
(2, 'Bhoa (SC)', 'Pathankot', 'Punjab', 1, '2023-02-09 10:37:21'),
(3, 'Pathankot', 'Pathankot', 'Punjab', 1, '2023-02-09 10:37:21'),
(4, 'Gurdaspur', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(5, 'Dina Nagar (SC)', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(6, 'Qadian', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(7, 'Batala', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(8, 'Sri Hargobindpur (SC)', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(9, 'Fatehgarh Churian', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(10, 'Dera Baba Nanak', 'Gurdaspur', 'Punjab', 1, '2023-02-09 10:37:21'),
(11, 'Ajnala', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(12, 'Rajasansi', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(13, 'Majitha', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(14, 'Jandiala (SC)', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(15, 'Amritsar North', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(16, 'Amritsar West (SC)', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(17, 'Amritsar Central', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(18, 'Amritsar East', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(19, 'Amritsar South', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(20, 'Attari (SC)', 'Amritsar', 'Punjab', 1, '2023-02-09 10:37:21'),
(21, 'Sri Tarn Taran Sahib', 'Tarn Taran', 'Punjab', 1, '2023-02-09 10:37:21'),
(22, 'Khemkaran', 'Tarn Taran', 'Punjab', 1, '2023-02-09 10:37:21'),
(23, 'Patti', 'Tarn Taran', 'Punjab', 1, '2023-02-09 10:37:21'),
(24, 'Sri Khadoor Sahib', 'Tarn Taran', 'Punjab', 1, '2023-02-09 10:37:21'),
(25, 'Baba Bakala (SC)', 'Amritsar ', 'Punjab', 1, '2023-02-09 10:37:21'),
(26, 'Bholath', 'Kapurthala', 'Punjab', 1, '2023-02-09 10:37:21'),
(27, 'Kapurthala', 'Kapurthala', 'Punjab', 1, '2023-02-09 10:37:21'),
(28, 'Sultanpur Lodhi', 'Kapurthala', 'Punjab', 1, '2023-02-09 10:37:21'),
(29, 'Phagwara (SC)', 'Kapurthala', 'Punjab', 1, '2023-02-09 10:37:21'),
(30, 'Phillaur (SC)', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(31, 'Nakodar', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(32, 'Shahkot', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(33, 'Kartarpur (SC)', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(34, 'Jalandhar West (SC)', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(35, 'Jalandhar Central', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(36, 'Jalandhar North', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(37, 'Jalandhar Cantonment', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(38, 'Adampur (SC)', 'Jalandhar', 'Punjab', 1, '2023-02-09 10:37:21'),
(39, 'Mukerian', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(40, 'Dasuya', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(41, 'Urmar', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(42, 'Sham Chaurasi (SC)', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(43, 'Hoshiarpur', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(44, 'Chabbewal (SC)', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(45, 'Garhshankar', 'Hoshiarpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(46, 'Banga (SC)', 'Shaheed Bhagat Singh Nagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(47, 'Nawan Shahr', 'Shaheed Bhagat Singh Nagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(48, 'Balachaur', 'Shaheed Bhagat Singh Nagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(49, 'Anandpur Sahib', 'Rupnagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(50, 'Rupnagar', 'Rupnagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(51, 'Chamkaur Sahib (SC)', 'Rupnagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(52, 'Kharar', 'Sahibzada Ajit Singh Nagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(53, 'S.A.S. Nagar', 'Sahibzada Ajit Singh Nagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(54, 'Bassi Pathana (SC)', 'Fatehgarh Sahib', 'Punjab', 1, '2023-02-09 10:37:21'),
(55, 'Fatehgarh Sahib', 'Fatehgarh Sahib', 'Punjab', 1, '2023-02-09 10:37:21'),
(56, 'Amloh', 'Fatehgarh Sahib', 'Punjab', 1, '2023-02-09 10:37:21'),
(57, 'Khanna', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(58, 'Samrala', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(59, 'Sahnewal', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(60, 'Ludhiana East', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(61, 'Ludhiana South', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(62, 'Atam Nagar', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(63, 'Ludhiana Central', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(64, 'Ludhiana West', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(65, 'Ludhiana North', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(66, 'Gill (SC)', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(67, 'Payal (SC)', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(68, 'Dakha', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(69, 'Raikot (SC)', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(70, 'Jagraon (SC)', 'Ludhiana', 'Punjab', 1, '2023-02-09 10:37:21'),
(71, 'Nihal Singh Wala (SC)', 'Moga', 'Punjab', 1, '2023-02-09 10:37:21'),
(72, 'Bhagha Purana', 'Moga', 'Punjab', 1, '2023-02-09 10:37:21'),
(73, 'Moga', 'Moga', 'Punjab', 1, '2023-02-09 10:37:21'),
(74, 'Dharamkot', 'Moga', 'Punjab', 1, '2023-02-09 10:37:21'),
(75, 'Zira', 'Ferozpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(76, 'Firozpur City', 'Ferozpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(77, 'Firozpur Rural (SC)', 'Ferozpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(78, 'Guru Har Sahai', 'Ferozpur', 'Punjab', 1, '2023-02-09 10:37:21'),
(79, 'Jalalabad', 'Fazilka', 'Punjab', 1, '2023-02-09 10:37:21'),
(80, 'Fazilka', 'Fazilka', 'Punjab', 1, '2023-02-09 10:37:21'),
(81, 'Abohar', 'Fazilka', 'Punjab', 1, '2023-02-09 10:37:21'),
(82, 'Balluana (SC)', 'Fazilka', 'Punjab', 1, '2023-02-09 10:37:21'),
(83, 'Lambi', 'Sri Muktsar Sahib ', 'Punjab', 1, '2023-02-09 10:37:21'),
(84, 'Gidderbaha', 'Sri Muktsar Sahib ', 'Punjab', 1, '2023-02-09 10:37:21'),
(85, 'Malout (SC)', 'Sri Muktsar Sahib ', 'Punjab', 1, '2023-02-09 10:37:21'),
(86, 'Muktsar', 'Sri Muktsar Sahib ', 'Punjab', 1, '2023-02-09 10:37:21'),
(87, 'Faridkot', 'Faridkot', 'Punjab', 1, '2023-02-09 10:37:21'),
(88, 'Kotkapura', 'Faridkot', 'Punjab', 1, '2023-02-09 10:37:21'),
(89, 'Jaitu (SC)', 'Faridkot', 'Punjab', 1, '2023-02-09 10:37:21'),
(90, 'Rampura Phul', 'Bathinda', 'Punjab', 1, '2023-02-09 10:37:21'),
(91, 'Bhucho Mandi (SC)', 'Bathinda', 'Punjab', 1, '2023-02-09 10:37:21'),
(92, 'Bathinda Urban', 'Bathinda', 'Punjab', 1, '2023-02-09 10:37:21'),
(93, 'Bathinda Rural (SC)', 'Bathinda', 'Punjab', 1, '2023-02-09 10:37:21'),
(94, 'Talwandi Sabo', 'Bathinda', 'Punjab', 1, '2023-02-09 10:37:21'),
(95, 'Maur', 'Bathinda', 'Punjab', 1, '2023-02-09 10:37:21'),
(96, 'Mansa', 'Mansa', 'Punjab', 1, '2023-02-09 10:37:21'),
(97, 'Sardulgarh', 'Mansa', 'Punjab', 1, '2023-02-09 10:37:21'),
(98, 'Budhlada (SC)', 'Mansa', 'Punjab', 1, '2023-02-09 10:37:21'),
(99, 'Lehragaga', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(100, 'Dirba (SC)', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(101, 'Sunam', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(102, 'Malerkotla (SC)', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(103, 'Amargarh', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(104, 'Dhuri', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(105, 'Sangrur', 'Sangrur', 'Punjab', 1, '2023-02-09 10:37:21'),
(106, 'Bhadaur', 'Barnala', 'Punjab', 1, '2023-02-09 10:37:21'),
(107, 'Barnala', 'Barnala', 'Punjab', 1, '2023-02-09 10:37:21'),
(108, 'Mehal Kalan (SC)', 'Barnala', 'Punjab', 1, '2023-02-09 10:37:21'),
(109, 'Nabha (SC)', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(110, 'Patiala Rural', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(111, 'Rajpura', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(112, 'Dera Bassi', 'Sahibzada Ajit Singh Nagar', 'Punjab', 1, '2023-02-09 10:37:21'),
(113, 'Ghanaur', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(114, 'Sanour', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(115, 'Patiala', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(116, 'Samana', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(117, 'Shutrana (SC)', 'Patiala', 'Punjab', 1, '2023-02-09 10:37:21'),
(118, '', '', '', 1, '2023-02-09 10:37:21'),
(119, '', '', '', 1, '2023-02-09 10:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `Id` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT 'Member',
  `Assembly` varchar(100) DEFAULT NULL,
  `MemberType` varchar(20) DEFAULT NULL,
  `Father` varchar(80) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Block` varchar(100) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Image` varchar(100) NOT NULL,
  `Name` varchar(150) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Mobile` varchar(14) DEFAULT NULL,
  `WhatsApp` varchar(30) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `IDCard` varchar(100) DEFAULT NULL,
  `IDCardNumber` varchar(50) DEFAULT NULL,
  `VidhanSabha` varchar(255) DEFAULT NULL,
  `ReferralID` varchar(100) DEFAULT NULL,
  `FacebookPage` varchar(255) DEFAULT NULL,
  `InstagramPage` varchar(255) DEFAULT NULL,
  `TwitterPage` varchar(255) DEFAULT NULL,
  `CompletDate` date DEFAULT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `PrintRequest` int(11) NOT NULL DEFAULT 0,
  `Panchayat` varchar(100) NOT NULL,
  `Details` text DEFAULT NULL,
  `Active` int(11) NOT NULL DEFAULT 1,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membertype`
--

CREATE TABLE `membertype` (
  `Id` int(11) NOT NULL,
  `Type` varchar(30) DEFAULT NULL,
  `Heading` varchar(255) DEFAULT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membertype`
--

INSERT INTO `membertype` (`Id`, `Type`, `Heading`, `CreateDate`, `Active`) VALUES
(1, 'Member', 'Volunteer', '2023-02-07 12:41:10', 1),
(2, 'Member', 'Supporter', '2023-02-07 12:41:10', 1),
(3, 'Member', 'Voter', '2023-02-07 12:41:10', 1),
(4, 'Member', 'Activist/karyakarta', '2023-02-07 12:41:10', 1),
(5, 'Member', 'Member', '2023-02-07 12:41:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `Id` int(11) NOT NULL,
  `SiteName` varchar(200) DEFAULT NULL,
  `Logo` varchar(100) DEFAULT NULL,
  `Title` varchar(200) DEFAULT NULL,
  `PoweredBy` varchar(100) DEFAULT NULL,
  `Footer` varchar(200) DEFAULT NULL,
  `Domainname` varchar(120) DEFAULT NULL,
  `BitesReg` int(11) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`Id`, `SiteName`, `Logo`, `Title`, `PoweredBy`, `Footer`, `Domainname`, `BitesReg`, `admin_email`, `active`) VALUES
(1, 'Elite Techno Group', 'img/logo.png', 'Elite Techno Group', 'CesPL', 'Elite Techno Group', 'http://localhost/manishji/certificate-genration/ramlal/', 31251, 'pankaj@compusysesolutions.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userotp`
--

CREATE TABLE `userotp` (
  `Id` int(11) NOT NULL,
  `Mobile` varchar(12) DEFAULT NULL,
  `OTP` varchar(10) DEFAULT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `ExpireTime` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userotp`
--

INSERT INTO `userotp` (`Id`, `Mobile`, `OTP`, `CreateDate`, `ExpireTime`) VALUES
(1, '3453453453', '9962', '2023-02-09 10:10:55', '2023-02-09 10:12:55'),
(2, '3453453453', '4919', '2023-02-09 10:21:36', '2023-02-09 10:26:36'),
(3, '7737166312', '8908', '2023-02-10 04:06:49', '2023-02-10 04:11:49'),
(4, '9024719947', '0294', '2023-02-10 06:27:19', '2023-02-10 06:32:19'),
(5, '5555555555', '6088', '2023-02-17 12:22:34', '2023-02-17 12:27:34'),
(6, '9269444999', '6878', '2023-02-22 10:23:32', '2023-02-22 10:28:32'),
(7, '3453453456', '0083', '2023-03-23 07:04:16', '2023-03-23 07:09:16'),
(8, '3453453456', '1996', '2023-03-23 07:04:55', '2023-03-23 07:09:55'),
(9, '1111111119', '4398', '2023-03-23 07:07:58', '2023-03-23 07:09:58'),
(10, '5465464564', '1804', '2023-03-23 07:13:24', '2023-03-23 07:18:24'),
(11, '9269411111', '1234', '2024-09-12 06:51:42', '2024-09-12 06:56:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assembly`
--
ALTER TABLE `assembly`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `membertype`
--
ALTER TABLE `membertype`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `userotp`
--
ALTER TABLE `userotp`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assembly`
--
ALTER TABLE `assembly`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membertype`
--
ALTER TABLE `membertype`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userotp`
--
ALTER TABLE `userotp`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
