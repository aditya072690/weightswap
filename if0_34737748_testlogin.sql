-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql108.infinityfree.com
-- Generation Time: Aug 23, 2023 at 11:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_34737748_testlogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(20) NOT NULL,
  `card_name` varchar(255) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `exp_month` varchar(20) NOT NULL,
  `exp_year` int(11) NOT NULL,
  `cvv` varchar(10) NOT NULL,
  `amount` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `full_name`, `email`, `address`, `city`, `state`, `zip_code`, `card_name`, `card_number`, `exp_month`, `exp_year`, `cvv`, `amount`) VALUES
(0, 'aditya chauhan', 'aditya@gmail.com', '123,ka ij as', 'vadodara', 'india', '390098', 'aditya chauhan', '111111111111', 'jan', 2025, '1234', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `fromcountry` varchar(255) NOT NULL,
  `fromState` varchar(255) NOT NULL,
  `fromairport` varchar(255) NOT NULL,
  `departuredate` date NOT NULL,
  `tocountry` varchar(255) NOT NULL,
  `tostate` varchar(255) NOT NULL,
  `toairport` varchar(255) NOT NULL,
  `returndate` date NOT NULL,
  `luggagecapacity` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`id`, `name`, `email`, `number`, `type`, `fromcountry`, `fromState`, `fromairport`, `departuredate`, `tocountry`, `tostate`, `toairport`, `returndate`, `luggagecapacity`) VALUES
(1, 'aditya chauhan', 'aditya@gmail.com', '9898409726', 'domestic', 'India', 'gujarat', 'vadodara', '2023-08-22', 'India', 'delhi', 'delhi', '2023-08-24', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'aditya', 'aditya@gmail.com', '$2y$10$DmCG4KR/3NdG4kiBux7bTO/xYgk4Bi9t0RBUf/gwfGLnwmfFmWdba');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
