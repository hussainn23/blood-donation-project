-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 04:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blooddonate`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disable`
--

CREATE TABLE `disable` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `disable`
--

INSERT INTO `disable` (`id`) VALUES
(22),
(23),
(24),
(24),
(25),
(25),
(25),
(26),
(27),
(27),
(25),
(26),
(27),
(27),
(28),
(30),
(30),
(31),
(32),
(33),
(34),
(35),
(35),
(35),
(26),
(35),
(35),
(35),
(35),
(35),
(26),
(37),
(38),
(39),
(36),
(41),
(41),
(40);

-- --------------------------------------------------------

--
-- Table structure for table `donar`
--

CREATE TABLE `donar` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `bloodgroup` varchar(5) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donar`
--

INSERT INTO `donar` (`id`, `fullname`, `email`, `phone`, `city`, `bloodgroup`, `filename`, `status`) VALUES
(36, 'Hussain', 'hussainnhussain023@gmail.com', '03087207572', 'sargodha', 'O+', '648ab0d5e92141.36981159.jpeg', 'inactive'),
(38, 'Abbas', 'Abbas@gmail.com', '03067188971', 'sargodha', 'O+', '648ab136837406.77416075.jpeg', 'inactive'),
(39, 'Ahsan', 'Ahsan@gmail.com', '03143636633', 'sahiwal', 'AB+', '648ab19c387535.62392407.jpeg', 'inactive'),
(40, 'Abdul Rehman', 'mota@gmail.com', '03064563653', 'Lahore', 'B+', '648ab2ddf308b6.18723849.jpeg', 'inactive'),
(41, 'jjjjj', 'hussainnhussain023@gmail.com', '03015292315', 'sargodha', 'A-', '648ae303bfe679.49014879.jpeg', 'inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donar`
--
ALTER TABLE `donar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donar`
--
ALTER TABLE `donar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
