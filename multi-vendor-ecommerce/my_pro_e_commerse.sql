-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2020 at 06:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_pro_e_commerse`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `product_id`, `user_id`, `qty`, `status`, `created_at`) VALUES
(3, 4, 13, 1, 0, '2020-03-29 15:16:53'),
(4, 7, 13, 3, 0, '2020-03-29 15:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_info` text DEFAULT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `product_info` text DEFAULT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `user_info`, `user_id`, `product_info`, `payment_mode`, `status`, `created_at`) VALUES
(5, '{\"name\":\"code shipping\",\"email\":\"ds123@gmail.com\",\"mobile_no\":\"999301330\",\"address\":\"test\",\"country\":\"1\",\"state\":\"India State\",\"city\":\"India City\"}', '13', '[{\"id\":\"9\",\"product_id\":\"7\",\"user_id\":\"1\",\"qty\":\"15\",\"status\":\"1\",\"created_at\":\"2020-03-22 21:27:44\",\"pname\":\"ptest\",\"Price\":\"150\"}]', 'Pending COD', 0, '2020-03-23 04:30:04'),
(6, '{\"name\":\"code shipping\",\"email\":\"ds123@gmail.com\",\"mobile_no\":\"999301330\",\"address\":\"test\",\"country\":\"1\",\"state\":\"India State\",\"city\":\"India City\"}', '13', '[{\"id\":\"3\",\"product_id\":\"4\",\"user_id\":\"13\",\"qty\":\"1\",\"status\":\"1\",\"created_at\":\"2020-03-29 20:46:53\",\"pname\":\"product 1\",\"Price\":\"300\"},{\"id\":\"4\",\"product_id\":\"7\",\"user_id\":\"13\",\"qty\":\"3\",\"status\":\"1\",\"created_at\":\"2020-03-29 20:47:00\",\"pname\":\"ptest\",\"Price\":\"150\"}]', 'Pending COD', 0, '2020-04-04 04:48:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `qty` varchar(250) DEFAULT NULL,
  `Price` varchar(250) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `subcategory` varchar(250) DEFAULT NULL,
  `brand` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `qty`, `Price`, `image`, `category`, `subcategory`, `brand`, `created_by`, `status`, `created_at`) VALUES
(4, 'product 1', 'testing', '10', '300', NULL, 'example', 'yy', 2, 1, 1, '2020-01-23 12:18:04'),
(7, 'ptest', 'test desc for ptest', '100', '150', '', 'example', 'yy', 2, 1, 1, '2020-01-26 23:23:04'),
(8, 'Mens', '55', '5', '500', NULL, 'example', 'yy', 3, 1, 1, '2020-04-13 19:25:45'),
(9, 'code shipping', '55', '5', '600', 'm3.jpg', 'example', 'yy', 2, 14, 0, '2020-04-14 12:33:45'),
(10, 'test product', 'testing', '5', '500', 'm2.jpg', 'example', 'yy', 2, 14, 1, '2020-04-14 12:35:16'),
(12, 'testing product', 'testing', '50', '4500', 'm21.jpg', 'example', 'test1', 3, 14, 1, '2020-04-16 16:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `brand_name`, `status`, `created_at`) VALUES
(2, 'L.G ', 1, '2020-01-05 15:10:01'),
(3, 'Nokia', 1, '2020-01-05 15:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `status`, `created_at`) VALUES
(4, 'example', 1, '2019-12-27 03:09:34'),
(6, 'Cat1', 1, '2020-02-15 12:16:18'),
(7, 'Cat2', 1, '2020-02-15 12:16:33'),
(8, 'Cat3', 1, '2020-02-15 12:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `product_review`
--

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) DEFAULT NULL,
  `product_id` varchar(250) DEFAULT NULL,
  `star` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_review`
--

INSERT INTO `product_review` (`id`, `user_id`, `product_id`, `star`) VALUES
(1, '13', '7', '3'),
(2, '13', '7', '5');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_category`
--

CREATE TABLE `product_sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `category` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sub_category`
--

INSERT INTO `product_sub_category` (`id`, `name`, `category`, `status`, `created_at`) VALUES
(4, 'yy', 'example', 1, '2019-12-31 02:49:25'),
(7, 'test1', 'example', 1, '2020-01-02 03:16:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `mobile_no` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `otp` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `access` int(11) NOT NULL DEFAULT 2 COMMENT '1- Admin,  2 normal user , 3 vender',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `img`, `email`, `mobile_no`, `password`, `city`, `state`, `country`, `otp`, `status`, `access`, `created_at`) VALUES
(1, 'Admin', 'test.png', 'admin@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, 1, 1, '2019-12-08 21:35:44'),
(13, 'Deependra', NULL, 'ds@gmail.com', '06265521071', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '', 1, 2, '2020-02-13 12:07:08'),
(14, 'Deependra', NULL, 'ds1@gmail.com', '06265521071', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '', 1, 3, '2020-02-13 12:07:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
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
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_sub_category`
--
ALTER TABLE `product_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
