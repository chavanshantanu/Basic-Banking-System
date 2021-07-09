-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2021 at 11:40 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Name`, `Email`, `Balance`) VALUES
(1, 'Bruno Fernandes', 'bruno@gmail.com', 9000),
(2, 'Paul Pogba', 'paul@gmail.com', 12000),
(3, 'Luke Shaw', 'luke@gmail.com', 17000),
(4, 'Marcus Rashford', 'marcus@gmail.com', 12000),
(5, 'Edison Cavani', 'edi@gmail.com', 10000),
(6, 'David De Gea', 'david@gmail.com', 11000),
(7, 'Harry Maguire', 'harry@gmail.com', 10000),
(8, 'Arron Van Bissaka', 'arron@gmail.com', 10000),
(9, 'Mason Greenwood', 'mason@gmail.com', 11000),
(10, 'Jadon Sancho', 'jadon@gmail.com', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `Sender` varchar(55) NOT NULL,
  `Receiver` varchar(55) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Date and Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `Sender`, `Receiver`, `Amount`, `Date and Time`) VALUES
(1, 'Luke Shaw', 'Marcus Rashford', 1000, '2021-07-05 19:47:59'),
(2, 'Marcus Rashford', 'David De Gea', 2000, '2021-07-05 20:08:05'),
(3, 'Mason Greenwood', 'Luke Shaw', 2000, '2021-07-05 20:49:06'),
(4, 'Bruno Fernandes', 'Mason Greenwood', 1000, '2021-07-05 21:00:53'),
(5, 'Arron Van Bissaka', 'Mason Greenwood', 8000, '2021-07-05 21:28:51'),
(6, 'Mason Greenwood', 'Arron Van Bissaka', 7000, '2021-07-05 22:46:54'),
(7, 'Bruno Fernandes', 'Arron Van Bissaka', 1000, '2021-07-06 00:26:06'),
(8, 'Harry Maguire', 'Marcus Rashford', 2000, '2021-07-06 00:30:53'),
(9, 'Bruno Fernandes', 'Luke Shaw', 1000, '2021-07-06 00:32:49'),
(10, 'Bruno Fernandes', 'Luke Shaw', 4000, '2021-07-06 11:53:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
