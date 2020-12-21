-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 07:50 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `quantity`, `ip_address`, `created_at`, `updated_at`) VALUES
(8, 1, 1, '127.0.0.1', '2020-12-21 05:41:40', NULL),
(9, 5, 1, '127.0.0.1', '2020-12-21 05:42:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `user_id`, `category_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Computer', 3, '1.jpg', '2020-12-15 05:10:47', '2020-12-15 05:10:47', NULL),
(2, 'Headphone', 3, '2.jpg', '2020-12-15 06:30:06', '2020-12-15 06:30:06', NULL),
(3, 'Mobile', 1, '3.jpg', '2020-12-16 07:48:52', '2020-12-17 17:16:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_amount` int(11) NOT NULL,
  `validity_date` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `discount_amount`, `validity_date`, `created_at`, `updated_at`) VALUES
(1, 'IDB44', 20, '2020-12-23', '2020-12-20 08:09:32', NULL),
(2, 'WDPF44', 60, '2020-12-18', '2020-12-20 08:10:35', NULL),
(3, 'JAVA35', 56, '2020-12-29', '2020-12-20 08:18:50', NULL),
(4, 'GAV22', 56, '2020-12-31', '2020-12-20 14:37:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2020_11_26_201651_create_categories_table', 1),
(18, '2020_12_09_165655_create_contacts_table', 1),
(19, '2020_12_10_172159_create_products_table', 1),
(21, '2020_12_15_111611_create_sliders_table', 2),
(22, '2020_12_19_110402_create_product_multiple_photos_table', 3),
(23, '2020_12_19_124130_create_carts_table', 4),
(24, '2020_12_20_000306_create_coupons_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_thumbnail_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `category_id`, `product_price`, `product_quantity`, `product_thumbnail_photo`, `product_short_description`, `product_long_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Samsung Mobile', 3, 2500, 258, '1.jpg', 'dfsssssghshsgdh', 'afsdggagqwgweq', '2020-12-16 07:51:51', '2020-12-16 07:51:51', NULL),
(2, 'Vivo 92', 3, 5600, 693, '2.jpg', 'dsfgsdgsdhy', 'sdffghsthyr', '2020-12-16 07:52:28', '2020-12-16 07:52:28', NULL),
(4, 'HP laptop', 1, 256325, 25, '4.jpg', 'dfgsdfhshgthtr', 'sdfsghhrthwert', '2020-12-16 12:30:38', '2020-12-16 12:30:38', NULL),
(5, 'Dell Laptop', 1, 5000, 258, '5.jpg', 'ataqwerqtwr', 'wefqawergfqewrg', '2020-12-16 12:32:11', '2020-12-16 12:32:11', NULL),
(6, 'Yusii Headphone', 2, 1452, 45, '6.jpg', 'rfgqrewqre', 'aqwerfgqrewgqwr', '2020-12-16 12:32:55', '2020-12-16 12:32:55', NULL),
(7, 'Sony Headphone', 2, 5600, 369, '7.jpg', 'dsfgwerwgerwr', 'werwgqewertg', '2020-12-16 12:33:45', '2020-12-16 12:33:45', NULL),
(8, 'Nokia V1', 1, 5000, 500, '8.jpg', 'In October 1998, Nokia became the best-selling mobile phone brand in the world;\r\nNokia’s operating profit went from $1 billion in 1995 to almost $4 billion by 1999;\r\nThe best-selling mobile phone of all time, the Nokia 1100, was created in 2003;\r\nIn 2007, Apple introduced the iPhone;\r\nBy the end of 2007, half of all smartphones sold in the world were Nokias, while Apple’s iPhone had a mere 5 per cent share of the global market;\r\nIn 2010 Nokia launched the “iPhone killer” but failed to match the competition;\r\nThe quality of Nokia’s high-end phones continues to decline;\r\nIn just six years, the market value of Nokia declined by about 90%;\r\nNokia’s decline accelerates by 2011 and is acquired by Microsoft in 2013', 'In October 1998, Nokia became the best-selling mobile phone brand in the world;\r\nNokia’s operating profit went from $1 billion in 1995 to almost $4 billion by 1999;\r\nThe best-selling mobile phone of all time, the Nokia 1100, was created in 2003;\r\nIn 2007, Apple introduced the iPhone;\r\nBy the end of 2007, half of all smartphones sold in the world were Nokias, while Apple’s iPhone had a mere 5 per cent share of the global market;\r\nIn 2010 Nokia launched the “iPhone killer” but failed to match the competition;\r\nThe quality of Nokia’s high-end phones continues to decline;\r\nIn just six years, the market value of Nokia declined by about 90%;\r\nNokia’s decline accelerates by 2011 and is acquired by Microsoft in 2013', '2020-12-19 03:24:25', '2020-12-19 03:24:25', NULL),
(9, 'MObile Younn', 3, 2500, 25, '9.jpg', 'sfdhgsthstrh', 'sdfgstrhwthw', '2020-12-19 05:34:00', '2020-12-19 05:34:00', NULL),
(10, 'HP 100B3', 1, 56932, 25, '10.jpg', 'fdghsdfhdsh', 'shgwsrthywr6yh', '2020-12-19 06:25:52', '2020-12-19 06:25:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_multiple_photos`
--

CREATE TABLE `product_multiple_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_multiple_photos`
--

INSERT INTO `product_multiple_photos` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(1, 9, '6-1.jpg', '2020-12-19 05:34:00', NULL),
(2, 9, '6-2.png', '2020-12-19 05:34:00', NULL),
(3, 9, '6-3.jpg', '2020-12-19 05:34:00', NULL),
(4, 9, '6-4.jpg', '2020-12-19 05:34:01', NULL),
(5, 9, '6-5.jpg', '2020-12-19 05:34:01', NULL),
(6, 10, '6-1.jpg', '2020-12-19 06:25:52', NULL),
(7, 10, '6-2.jpg', '2020-12-19 06:25:53', NULL),
(8, 10, '6-3.jpg', '2020-12-19 06:25:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `slider_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `user_id`, `slider_subtitle`, `slider_image`, `slider_description`, `button_text`, `button_link`, `created_at`, `updated_at`) VALUES
(1, 'Md. Sakib Iqbal Tajim', 4, 'dsafasdfa', '1.jpg', 'asdfasdf', 'asdfaf', 'asdfasdfa', '2020-12-15 15:45:14', '2020-12-15 15:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Monir Hossain', 'admin@monirjhossain.com', NULL, '$2y$10$3GfyuGDJ1zH/0L9LMuIQgOej4aq5uWYVRQv2X0p92ouR/REEHJmT.', 1, NULL, '2020-12-11 16:42:58', '2020-12-11 16:42:58'),
(2, 'Md. Monir Hossain', 'monir@gmail.com', NULL, '$2y$10$2qwqc2mKAxqc8RBOZaNWKOEgDd2uLVgxyqlDpEXDurQXW2o9BZ2KG', 1, NULL, '2020-12-13 04:13:13', '2020-12-13 04:13:13'),
(3, 'Tasnim Shifa Farin', 'farin@gmail.com', NULL, '$2y$10$gwjmvbb7I2RqGhgl1k2psOdlRbYHPI3b53jz7lcU/Cf/qnq/64ySG', 1, NULL, '2020-12-15 04:47:39', '2020-12-15 04:47:39'),
(4, 'saima', 'saima@gmail.com', NULL, '$2y$10$VDBUVuAhGasKbJZ2dIXJg.HOQfxmGCcS8Z7tEuhOsagplzGK/CHxW', 1, NULL, '2020-12-15 15:23:39', '2020-12-15 15:23:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_multiple_photos`
--
ALTER TABLE `product_multiple_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
