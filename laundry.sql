-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 08:04 AM
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `dry_cleaning`
--

CREATE TABLE `dry_cleaning` (
  `id` int(5) NOT NULL,
  `cleaning_id` int(10) NOT NULL,
  `clothes_name` int(30) NOT NULL,
  `dry_clean_rate` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE `job_order` (
  `user_id` int(15) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `submission_date` datetime NOT NULL,
  `expected_date` date NOT NULL,
  `total_quantity` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `delivery_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_price`
--

CREATE TABLE `laundry_price` (
  `Laundry_id` int(5) NOT NULL,
  `Laundry_type` varchar(100) NOT NULL,
  `laundry_rate` int(5) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `job_order_id` int(11) NOT NULL,
  `client_name` varchar(30) NOT NULL,
  `cloth_name` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `register_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `phone_number`, `address`, `register_time`) VALUES
(7, 'Bibhushan', 'bibhushan1', 'apple123', 'bibhushan@gmail.com', 2147483647, 'Kathmandu', '2023-06-04 16:06:11'),
(8, 'Ram', 'adminX', 'admin123', 'admin@gmail.com', 9876456, 'Karhmandu', '2023-06-04 16:09:17'),
(9, 'hari', 'HAriBahadu', '0769e56eb5', 'hari@gmail.com', 234567, 'Africa', '2023-06-04 16:26:20'),
(11, 'Angil', 'angil', '3e74b82d58', 'angil@gmail.com', 2147483647, 'Maipi', '2023-06-05 16:10:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
