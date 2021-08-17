-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 07:17 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ad_id` int(11) NOT NULL,
  `ad_name` text NOT NULL,
  `ad_username` varchar(255) NOT NULL,
  `ad_password` varchar(255) NOT NULL,
  `ad_dob` date NOT NULL,
  `ad_gender` text NOT NULL,
  `ad_phone` int(30) NOT NULL,
  `ad_email` varchar(255) NOT NULL,
  `ad_photo` text NOT NULL,
  `ad_securityQ` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ad_id`, `ad_name`, `ad_username`, `ad_password`, `ad_dob`, `ad_gender`, `ad_phone`, `ad_email`, `ad_photo`, `ad_securityQ`) VALUES
(1, 'Rahul Hassan', 'admin', '1234', '2000-12-31', 'Male', 1910204328, 'specialistrahul@gmail.com', '../files/admin.jpg', 'kitty');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `a_id` int(11) NOT NULL,
  `a_firstname` text NOT NULL,
  `a_lastname` text NOT NULL,
  `a_username` text NOT NULL,
  `a_dob` date NOT NULL,
  `a_gender` text NOT NULL,
  `a_phone` int(50) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`a_id`, `a_firstname`, `a_lastname`, `a_username`, `a_dob`, `a_gender`, `a_phone`, `a_email`, `a_password`, `a_photo`) VALUES
(11, 'Rukaiya', 'Dhara', 'rukaiya23', '2000-12-14', 'Female', 2147483647, 'rukauya3@gmail.com', 'dgfryjRTTYG4576', '../files/dhara_1.jpg'),
(12, 'Mohammad Mosiur', 'Rahman', 'moshiur34', '1998-06-29', 'Male', 1724365434, 'moshiur98@gmail.com', 'erjhhdGHYT45', '../files/default_pp.jpg'),
(13, 'Fahad', 'Hossain', 'fahad98', '1999-10-13', 'Male', 1823648593, 'fahadh76@gmail.com', '8765GHfrT', '../files/default_pp.jpg'),
(14, 'Abdullah ', 'Fahim', 'abdul673', '1998-07-08', 'Male', 1953503576, 'fahim001@outlook.com', 'hdriuUIY334', '../files/default_pp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `b_id` int(11) NOT NULL,
  `b_firstname` text NOT NULL,
  `b_lastname` text NOT NULL,
  `b_username` varchar(255) NOT NULL,
  `b_dob` date NOT NULL,
  `b_gender` text NOT NULL,
  `b_phone` int(20) NOT NULL,
  `b_email` varchar(255) NOT NULL,
  `b_password` varchar(255) NOT NULL,
  `b_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`b_id`, `b_firstname`, `b_lastname`, `b_username`, `b_dob`, `b_gender`, `b_phone`, `b_email`, `b_password`, `b_photo`) VALUES
(1, 'Tushar', 'Rizwan', 'tusharr64', '1999-04-20', 'Male', 1734567823, 'tusharr76@gmail.com', 'hdgtGGTR6435', '../files/buyer_user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `s_id` int(11) NOT NULL,
  `s_firstname` text NOT NULL,
  `s_lastname` text NOT NULL,
  `s_username` varchar(255) NOT NULL,
  `s_dob` date NOT NULL,
  `s_gender` text NOT NULL,
  `s_phone` int(20) NOT NULL,
  `s_email` varchar(255) NOT NULL,
  `s_password` varchar(255) NOT NULL,
  `s_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`s_id`, `s_firstname`, `s_lastname`, `s_username`, `s_dob`, `s_gender`, `s_phone`, `s_email`, `s_password`, `s_photo`) VALUES
(1, 'Ashrafur Rahman', 'Jishan', 'jishan04', '1999-07-20', 'Male', 1364587943, 'jishan55@gmail.com', 'hytesd8435HG', '../files/seller_01.jpg'),
(2, 'Tahsin', 'Ahmed', 'tahsin44', '2000-12-04', 'Male', 1387645455, 'tashin4@outlook.com', 'sdrihRTU645', '../files/default_pp.jpg'),
(3, 'Sumaiya', 'Jeny', 'jeny565', '2000-12-21', 'Female', 1367457497, 'jenys54@gmail.com', 'lkiuYUT456', '../files/default_female_pp1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `buyer`
--
ALTER TABLE `buyer`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller`
--
ALTER TABLE `seller`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
