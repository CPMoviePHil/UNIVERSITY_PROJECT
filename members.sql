-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 08:03 AM
-- Server version: 5.7.19-log
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `fdlogs`
--

CREATE TABLE `fdlogs` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `cdate` datetime NOT NULL,
  `heart` text NOT NULL,
  `liver` text NOT NULL,
  `spleen` text NOT NULL,
  `lung` text NOT NULL,
  `kidney` text NOT NULL,
  `stomach` text NOT NULL,
  `gall_brani` text NOT NULL,
  `blader` text NOT NULL,
  `the_large_intestine` text NOT NULL,
  `the_small_intestine` text NOT NULL,
  `triple_burner` text NOT NULL,
  `pericardium` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `measure_time`
--

CREATE TABLE `measure_time` (
  `id` varchar(50) NOT NULL,
  `measure_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `measure_time`
--

INSERT INTO `measure_time` (`id`, `measure_time`) VALUES
('1', '2015-10-12 15:50:00'),
('2', '2015-10-12 18:04:00'),
('3', '2015-11-06 16:07:00'),
('4', '2017-11-23 10:30:00'),
('5', '2017-11-23 10:01:00'),
('6', '2015-11-06 18:29:00'),
('7', '2015-11-06 18:23:00'),
('8', '2015-11-06 16:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `members_account`
--

CREATE TABLE `members_account` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(100) NOT NULL,
  `active_status` tinyint(1) NOT NULL,
  `code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members_account`
--

INSERT INTO `members_account` (`id`, `userid`, `username`, `password`, `mail_address`, `active_status`, `code`) VALUES
(87, 'u0424002', '黃智輝', '$2y$10$.tkxP.YVqdwx5jSJfogOCuq6WWqICQ0VgRax/METlZ2pUctsWMuJC', 'u0424002@nkfust.edu.tw', 0, '74095a3c3c9a43648cfbac118ff9d23fdTA0MjQwMDI='),
(88, 'u0424002_host', '黃智輝', '$2y$10$N5n/d5PZtnmZsJhM9IiARehDCz6PUTAmMen4FkqQW5Z9380X5pLMa', 'cpmoviephil@gmail.com', 0, 'dff681b329ebf9927819f7b4cc160e12dTA0MjQwMDJfaG9zdA==');

-- --------------------------------------------------------

--
-- Table structure for table `peaks`
--

CREATE TABLE `peaks` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `measure_time` datetime NOT NULL,
  `firstPeaks` varchar(50) DEFAULT NULL,
  `secondPeaks` varchar(50) DEFAULT NULL,
  `thirdPeaks` varchar(50) DEFAULT NULL,
  `fourthPeaks` varchar(50) DEFAULT NULL,
  `fifthPeaks` varchar(50) DEFAULT NULL,
  `sixthPeaks` varchar(50) DEFAULT NULL,
  `seventhPeaks` varchar(50) DEFAULT NULL,
  `eighthPeaks` varchar(50) DEFAULT NULL,
  `ninthPeaks` varchar(50) DEFAULT NULL,
  `tenthPeaks` varchar(50) DEFAULT NULL,
  `eleventhPeaks` varchar(50) DEFAULT NULL,
  `twelvethPeaks` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `peaks`
--

INSERT INTO `peaks` (`id`, `userid`, `measure_time`, `firstPeaks`, `secondPeaks`, `thirdPeaks`, `fourthPeaks`, `fifthPeaks`, `sixthPeaks`, `seventhPeaks`, `eighthPeaks`, `ninthPeaks`, `tenthPeaks`, `eleventhPeaks`, `twelvethPeaks`) VALUES
(8, 'zxc9215712', '2017-11-23 10:30:00', '61-0.0281472518739', '92-0.0544968438213', '123-0.0435202852798', '153-0.0582987803551', '184-0.106264600832', '215-0.0804740504954', '276-0.0318437614002', '337-0.0280493816579', '400-0.00641582843', '428-0.00724661723396', '450-0.00596231549346', '498-0.0025717551803');

-- --------------------------------------------------------

--
-- Table structure for table `physiological`
--

CREATE TABLE `physiological` (
  `辨識碼` varchar(20) NOT NULL,
  `typex` int(10) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratio`
--

CREATE TABLE `ratio` (
  `辨識碼` varchar(20) NOT NULL,
  `typex` int(10) NOT NULL,
  `sequence` int(10) NOT NULL,
  `description` text NOT NULL,
  `basescore_low` varchar(25) NOT NULL,
  `basescore_upper` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `辨識碼` varchar(20) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nick_ame` varchar(15) NOT NULL,
  `birthday` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `height` varchar(10) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `c_day` varchar(10) NOT NULL,
  `history` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users_information`
--

CREATE TABLE `users_information` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail_address` varchar(100) NOT NULL,
  `user_sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone` varchar(10) DEFAULT NULL,
  `user_height` varchar(6) DEFAULT NULL,
  `user_weight` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_information`
--

INSERT INTO `users_information` (`id`, `userid`, `username`, `mail_address`, `user_sex`, `user_phone`, `user_height`, `user_weight`) VALUES
(36, 'u0424002', '黃智輝', 'u0424002@nkfust.edu.tw', '男性', '0999321576', '198', '82'),
(37, 'u0424002_host', '黃智輝', 'cpmoviephil@gmail.com', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_measure`
--

CREATE TABLE `user_measure` (
  `id` int(50) NOT NULL,
  `userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `measure_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_measure`
--

INSERT INTO `user_measure` (`id`, `userid`, `measure_time`) VALUES
(13, 'u0424002', '2018-05-14 20:32:08'),
(14, 'u0424002', '2018-05-14 20:44:10'),
(15, 'u0424002', '2018-05-14 23:50:43'),
(16, 'u0424002', '2018-05-14 23:53:19'),
(17, 'u0424002', '2018-05-15 12:42:41'),
(18, 'u0424002', '2018-05-15 12:43:28'),
(19, 'u0424002', '2018-05-15 12:44:48'),
(20, 'u0424002', '2018-05-15 12:45:28'),
(21, 'u0424002', '2018-05-15 15:11:49'),
(22, 'u0424002_host', '2018-05-16 13:06:17'),
(23, 'u0424002_host', '2018-05-16 13:06:50'),
(24, 'u0424002', '2018-05-30 12:19:00'),
(25, 'u0424002', '2018-05-30 13:32:10'),
(26, 'u0424002', '2018-05-31 14:49:31'),
(27, 'u0424002', '2018-05-31 19:36:09'),
(28, 'u0424002', '2018-05-31 20:40:06'),
(29, 'u0424002', '2018-05-31 20:49:46'),
(30, 'u0424002', '2018-05-31 20:51:48'),
(31, 'u0424002', '2018-05-31 20:54:45'),
(32, 'u0424002', '2018-05-31 20:57:12'),
(33, 'u0424002', '2018-05-31 20:59:15'),
(34, 'u0424002', '2018-05-31 21:04:30'),
(35, 'u0424002', '2018-05-31 21:05:43'),
(36, 'u0424002', '2018-05-31 21:07:17'),
(37, 'u0424002', '2018-05-31 21:08:05'),
(38, 'u0424002', '2018-05-31 21:10:39'),
(39, 'u0424002', '2018-05-31 21:12:43'),
(40, 'u0424002', '2018-05-31 21:14:25'),
(41, 'u0424002', '2018-05-31 21:16:17'),
(42, 'u0424002', '2018-05-31 21:17:53'),
(43, 'u0424002', '2018-05-31 21:18:59'),
(44, 'u0424002', '2018-05-31 21:21:13'),
(45, 'u0424002', '2018-05-31 22:38:01'),
(46, 'u0424002', '2018-05-31 22:41:46'),
(47, 'u0424002', '2018-06-09 17:09:23'),
(48, 'u0424002', '2018-06-09 18:49:04'),
(49, 'u0424002', '2018-06-09 18:50:10'),
(50, 'u0424002', '2018-06-09 18:51:54'),
(51, 'u0424002', '2018-06-09 18:55:23'),
(52, 'u0424002', '2018-06-09 18:57:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fdlogs`
--
ALTER TABLE `fdlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `measure_time`
--
ALTER TABLE `measure_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_account`
--
ALTER TABLE `members_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `peaks`
--
ALTER TABLE `peaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_information`
--
ALTER TABLE `users_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userid` (`userid`);

--
-- Indexes for table `user_measure`
--
ALTER TABLE `user_measure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fdlogs`
--
ALTER TABLE `fdlogs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members_account`
--
ALTER TABLE `members_account`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `peaks`
--
ALTER TABLE `peaks`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users_information`
--
ALTER TABLE `users_information`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `user_measure`
--
ALTER TABLE `user_measure`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
