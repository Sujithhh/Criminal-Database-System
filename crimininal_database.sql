-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2022 at 10:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimininal database`
--

-- --------------------------------------------------------

--
-- Table structure for table `crime info`
--

CREATE TABLE `crime info` (
  `crimeid` int(6) NOT NULL,
  `crimename` varchar(30) NOT NULL,
  `ipcsection` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime info`
--

INSERT INTO `crime info` (`crimeid`, `crimename`, `ipcsection`) VALUES
(1, 'robbery', '311'),
(3, 'murder', '302'),
(4, 'ROBBERY', '560');

-- --------------------------------------------------------

--
-- Table structure for table `criminal details`
--

CREATE TABLE `criminal details` (
  `User_id` int(11) NOT NULL,
  `Criminal_id` int(11) NOT NULL,
  `Criminal_name` varchar(10) NOT NULL,
  `Crime_id` int(11) NOT NULL,
  `reporting_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal details`
--

INSERT INTO `criminal details` (`User_id`, `Criminal_id`, `Criminal_name`, `Crime_id`, `reporting_date`) VALUES
(11, 721, 'Vishwa', 3, '2022-08-23'),
(11, 722, 'Manu', 4, '2022-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `op`
--

CREATE TABLE `op` (
  `slno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `punishment`
--

CREATE TABLE `punishment` (
  `Criminal_ID` int(8) NOT NULL,
  `Penalty` varchar(10) NOT NULL,
  `Imprisonment` varchar(28) NOT NULL,
  `Judgement_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `punishment`
--

INSERT INTO `punishment` (`Criminal_ID`, `Penalty`, `Imprisonment`, `Judgement_Date`) VALUES
(542, '1000', '10', '2022-08-28'),
(729, '100.0000', 'life time Imprisionment', '2022-08-26'),
(734, '30000.00', 'life time Imprisionment', '2022-08-09'),
(759, '1000', '10', '2022-08-26'),
(899, '10.0000', 'life time Imprisionment', '2022-08-10'),
(900, '10.000', 'life time Imprisionment', '2022-08-03');

--
-- Triggers `punishment`
--
DELIMITER $$
CREATE TRIGGER `simple` AFTER UPDATE ON `punishment` FOR EACH ROW INSERT INTO `trigger_table` (`sl_no`, `Criminal_id`, `modified_date`) VALUES (NULL, new.Criminal_ID, NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `trigger_table`
--

CREATE TABLE `trigger_table` (
  `sl_no` int(5) NOT NULL,
  `Criminal_id` int(8) NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trigger_table`
--

INSERT INTO `trigger_table` (`sl_no`, `Criminal_id`, `modified_date`) VALUES
(13, 900, '2022-08-19'),
(14, 12123, '2022-08-19'),
(15, 901, '2022-08-19'),
(16, 759, '2022-08-19'),
(17, 542, '2022-08-20'),
(18, 901, '2022-08-20'),
(19, 902, '2022-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `user details`
--

CREATE TABLE `user details` (
  `user_id` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user details`
--

INSERT INTO `user details` (`user_id`, `email`, `user_name`, `password`) VALUES
(10, 'madansshettya80@gmail.com', 'madann', '21may2002'),
(11, 'sudeep@gmail.com', 'sudeeep', '1234'),
(123, 'Bharathraj@501', 'Bharath', 'bharath');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crime info`
--
ALTER TABLE `crime info`
  ADD PRIMARY KEY (`crimeid`);

--
-- Indexes for table `criminal details`
--
ALTER TABLE `criminal details`
  ADD PRIMARY KEY (`Criminal_id`),
  ADD KEY `crime info` (`Crime_id`),
  ADD KEY `user details` (`User_id`);

--
-- Indexes for table `punishment`
--
ALTER TABLE `punishment`
  ADD PRIMARY KEY (`Criminal_ID`);

--
-- Indexes for table `trigger_table`
--
ALTER TABLE `trigger_table`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `user details`
--
ALTER TABLE `user details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `trigger_table`
--
ALTER TABLE `trigger_table`
  MODIFY `sl_no` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `criminal details`
--
ALTER TABLE `criminal details`
  ADD CONSTRAINT `crime info` FOREIGN KEY (`Crime_id`) REFERENCES `crime info` (`crimeid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user details` FOREIGN KEY (`User_id`) REFERENCES `user details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
