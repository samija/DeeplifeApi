-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2015 at 05:16 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deeplife`
--

-- --------------------------------------------------------

--
-- Table structure for table `generation`
--

CREATE TABLE IF NOT EXISTS `generation` (
`gid` int(45) NOT NULL,
  `gName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ucatagory`
--

CREATE TABLE IF NOT EXISTS `ucatagory` (
`ucid` int(11) NOT NULL,
  `cName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `urole`
--

CREATE TABLE IF NOT EXISTS `urole` (
`rid` int(11) NOT NULL,
  `rName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`User_Id` int(11) NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Last_Name` varchar(45) NOT NULL,
  `User_Name` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Phone_No` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_Id`, `First_Name`, `Last_Name`, `User_Name`, `Email`, `Phone_No`, `Password`) VALUES
(1, 'Sami', 'ada', 'asda', 'sami@gmail.com', '798734857938', 'kjsflsifdgs');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE IF NOT EXISTS `user_info` (
`info_id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `ucid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ment_id` int(11) NOT NULL,
  `Description` varchar(45) NOT NULL,
  `Longtiude` decimal(10,0) NOT NULL,
  `Latitude` decimal(10,0) NOT NULL,
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `generation`
--
ALTER TABLE `generation`
 ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `ucatagory`
--
ALTER TABLE `ucatagory`
 ADD PRIMARY KEY (`ucid`);

--
-- Indexes for table `urole`
--
ALTER TABLE `urole`
 ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`User_Id`), ADD UNIQUE KEY `Phone_No` (`Phone_No`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
 ADD PRIMARY KEY (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `generation`
--
ALTER TABLE `generation`
MODIFY `gid` int(45) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ucatagory`
--
ALTER TABLE `ucatagory`
MODIFY `ucid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `urole`
--
ALTER TABLE `urole`
MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `User_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
