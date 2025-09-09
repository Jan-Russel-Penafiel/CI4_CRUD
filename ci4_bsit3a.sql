-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2025 at 06:38 AM
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
-- Database: `ci4_bsit3a`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('active','deleted') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(10, 'asdassssss', 'asda', 500.00, 'active', '2025-09-04 09:25:13', '2025-09-09 04:32:49'),
(12, 'asdas', 'da', 5400.00, 'active', '2025-09-04 09:25:33', '2025-09-09 04:32:49'),
(13, 'asda', 'adada', 125.00, 'active', '2025-09-04 09:25:43', '2025-09-09 04:32:49'),
(15, 'sada', 'asda', 500.00, 'active', '2025-09-04 09:35:21', '2025-09-09 04:32:49'),
(16, 'asda', 'dada', 500.00, 'active', '2025-09-04 10:03:31', '2025-09-09 04:32:49'),
(17, 'wasda', 'asda', 50000.00, 'active', '2025-09-04 11:11:53', '2025-09-09 02:58:21'),
(18, 'asd', 'adaa', 500.00, 'active', '2025-09-04 11:19:24', '2025-09-09 02:58:21'),
(19, 'asd', 'adada', 500.00, 'active', '2025-09-04 11:21:10', '2025-09-09 02:58:21'),
(20, 'asdad', 'adsada', 500.00, 'active', '2025-09-09 00:37:07', '2025-09-09 02:58:21'),
(22, 'asda', 'dada', 500.00, 'active', '2025-09-09 02:01:07', '2025-09-09 02:58:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
