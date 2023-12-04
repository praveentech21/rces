-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 12:20 AM
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
-- Database: `rces`
--

-- --------------------------------------------------------

--
-- Table structure for table `participated`
--

CREATE TABLE `participated` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `participated`
--

INSERT INTO `participated` (`id`, `name`, `mobile`) VALUES
(1, 'ravi kumar', '9052727402'),
(2, 'rama', '9855892651');

-- --------------------------------------------------------

--
-- Table structure for table `presented`
--

CREATE TABLE `presented` (
  `id` int(4) NOT NULL,
  `name` varchar(150) NOT NULL,
  `title` varchar(200) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `title1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presented`
--

INSERT INTO `presented` (`id`, `name`, `title`, `mobile`, `title1`) VALUES
(1, 'Riyaz Mohammad, Assistant Professor S.R.K R.Engineering College', 'Challenging Tradition and Embracing Modernity: A Comparative Analysis of the ', '9490457077', 'Select Plays of Mahesh Dattani and Vijay Tendulkar.'),
(2, 'ravi', 'tdf', '454654854', 'fhgj');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `participated`
--
ALTER TABLE `participated`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presented`
--
ALTER TABLE `presented`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `participated`
--
ALTER TABLE `participated`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presented`
--
ALTER TABLE `presented`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
