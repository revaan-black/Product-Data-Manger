-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2024 at 08:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'root', '123');

-- --------------------------------------------------------

--
-- Table structure for table `credit`
--

CREATE TABLE `credit` (
  `id` int(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `bd` int(50) NOT NULL,
  `br` int(50) NOT NULL,
  `payment` int(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `credit` varchar(50) NOT NULL,
  `debit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `customer_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `customer`, `payment`, `date`, `customer_id`) VALUES
(7, 'customer 3', '20', '03/14/2023', 3),
(40, 'ali', '20', '07/20/2024', 26),
(41, 'ali', '10', '07/20/2024', 26),
(42, 'ali', '45641', '07/20/2024', 26),
(43, 'ali', '3546', '07/20/2024', 26),
(44, 'ali', '20', '07/20/2024', 26),
(45, 'ali', '5654', '07/20/2024', 26),
(46, 'customer 3', '4654678', '07/20/2024', 3),
(47, 'customer 3', '50', '07/20/2024', 3),
(48, 'saad2', '200', '07/20/2024', 28),
(49, 'saad2', '500', '07/20/2024', 28),
(50, 'customer 3', '150', '07/20/2024', 3),
(51, 'customer 3', '100', '07/20/2024', 3),
(52, 'fuck', '50', '07/20/2024', 30),
(53, 'fuck', '1500', '07/20/2024', 30),
(54, 'fuck', '2500', '07/20/2024', 30),
(55, 'fuck4', '20', '07/20/2024', 33),
(56, 'fuck4', '80', '07/20/2024', 33),
(57, 'fuck4', '100', '07/20/2024', 33),
(58, 'fuck4', '100', '07/20/2024', 33),
(59, 'fuck5', '70', '07/20/2024', 34),
(60, 'fuck5', '10', '07/20/2024', 34),
(61, 'fuck6', '70', '07/20/2024', 35),
(62, 'fuck6', '10', '07/20/2024', 35),
(63, 'fuck7', '20', '07/20/2024', 36),
(64, 'fuck7', '10', '07/20/2024', 36),
(65, 'fuck7', '10', '07/20/2024', 36),
(66, 'fuck7', '60', '07/20/2024', 36),
(67, 'fuck7', '150', '07/20/2024', 36),
(68, 'fuck8', '10', '07/20/2024', 37),
(69, 'fuck8', '10', '07/20/2024', 37),
(70, 'fuck8', '20', '07/20/2024', 37),
(71, 'fuck8', '60', '07/20/2024', 37),
(72, 'fuck8', '50', '07/20/2024', 37),
(73, 'fuck8', '50', '07/20/2024', 37),
(74, 'fuck8', '500', '07/20/2024', 37),
(75, 'fuck9', '50', '07/20/2024', 38),
(76, 'fuck9', '10', '07/20/2024', 38),
(77, 'fuck9', '90', '07/20/2024', 38),
(78, 'fuck9', '1000', '07/20/2024', 38),
(79, 'fuck10', '60', '07/20/2024', 39),
(80, 'fuck10', '90', '07/20/2024', 39),
(81, 'fuck10', '150', '07/20/2024', 39),
(82, 'fuck10', '80', '07/20/2024', 39),
(83, 'fuck11', '20', '07/20/2024', 40),
(84, 'fuck11', '80', '07/20/2024', 40),
(85, 'fuck12', '20', '07/20/2024', 41),
(86, 'fuck12', '80', '07/20/2024', 41),
(87, 'fuck13', '20', '07/20/2024', 42),
(88, 'fuck13', '80', '07/20/2024', 42),
(89, 'fuck14', '20', '07/20/2024', 43),
(90, 'fuck14', '80', '07/20/2024', 43),
(91, 'fuck15', '80', '07/20/2024', 44),
(92, 'fuck15', '50', '07/20/2024', 44),
(93, 'fuck15', '100', '07/20/2024', 44),
(94, 'fuck18', '20', '07/20/2024', 46),
(95, 'fuck18', '80', '07/20/2024', 46);

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` int(50) NOT NULL,
  `date` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `payment` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `date`, `customer`, `payment`) VALUES
(1, '07/21/2024', 'fuck', 100),
(2, '07/20/2024', 'fuck', 100),
(3, '07/18/2024', 'Revan', 500),
(5, '07/21/2024', 'Revan1', 213);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product`, `category`, `price`, `description`) VALUES
(20, 'phone', 'deivce', 50, '---');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `addres` varchar(1000) NOT NULL,
  `credit` int(255) NOT NULL,
  `debit` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `customer`, `email`, `phone`, `addres`, `credit`, `debit`) VALUES
(3, 'customer 3', 'customer3@gmail.com', '0312-3456787', 'abc', 530, 600),
(51, 'Revan', 'mamaemail03070145758@gmail.com', '0311-2355689', 'dfshh', 230, 400),
(54, 'Revan1', 'mamaemail03070145758@gmail.com', '0311-2355689', 'eryht', 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `selling_product`
--

CREATE TABLE `selling_product` (
  `id` int(50) NOT NULL,
  `product` varchar(50) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `customer` varchar(50) NOT NULL,
  `bd` int(50) NOT NULL,
  `br` int(50) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `credits` int(50) NOT NULL,
  `debits` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selling_product`
--

INSERT INTO `selling_product` (`id`, `product`, `date`, `customer`, `bd`, `br`, `customer_id`, `credits`, `debits`) VALUES
(259, 'phone', '07/22/2024', 'customer 3', 2, 2, 3, 100, 100),
(270, 'phone', '07/22/2024', 'customer 3', 2, 2, 3, 100, 100),
(274, 'phone', '07/22/2024', 'customer 3', 2, 2, 3, 100, 100),
(275, 'phone', '07/22/2024', 'Revan1', 1, 1, 54, 50, 50),
(278, 'phone', '07/22/2024', 'customer 3', 4, 4, 3, 200, 200),
(284, 'phone', '07/22/2024', 'customer 3', 2, 2, 3, 100, 100),
(285, 'phone', '07/22/2024', 'Revan', 2, 2, 51, 100, 100),
(286, 'phone', '07/22/2024', 'Revan', 2, 2, 51, 100, 100),
(298, 'phone', '07/22/2024', 'Revan', 2, 2, 51, 30, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selling_product`
--
ALTER TABLE `selling_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `selling_product`
--
ALTER TABLE `selling_product`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
