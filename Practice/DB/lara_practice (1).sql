-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 07:19 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Man Wan', 1, '2020-11-28 04:23:55', '2020-11-28 06:07:51', '2020-11-28 06:07:51'),
(2, 'Electronics', 1, '2020-11-28 04:24:03', '2020-12-01 01:00:54', NULL),
(3, 'KIds', 1, '2020-11-28 04:24:07', '2020-11-28 05:43:28', NULL),
(4, 'Books', 1, '2020-11-28 04:24:10', '2020-11-28 15:49:50', '2020-11-28 15:49:50'),
(5, 'Electronics', 1, '2020-11-28 04:24:13', '2020-11-28 04:24:55', '2020-11-28 04:24:55');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2020_11_26_201651_create_categories_table', 2);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md. Monir Vaijan', 'admin@monirjhossain.com', NULL, '$2y$10$UkcKIpNCDq/Hrusu.EjZ/Ox.NEdo4SZ9n8319qdlUieuMLnw431z2', NULL, '2020-11-16 23:37:09', '2020-12-01 04:01:38'),
(2, 'Ahmadullah', 'ahmad@gmail.com', NULL, '$2y$10$QlkvoEPv0XdLIyy0VZK4qeHkuyGiHdGgIJ2lhtE6pTe43kiDGbsS2', NULL, '2020-11-17 10:56:26', '2020-11-17 10:56:26'),
(3, 'Shohrab Hossain', 'shorab@gmail.com', NULL, '$2y$10$xCm9fVrOsJT6zNFkW23W1umY/VyvbJ8t/FVKVy5cMc2LDbw/eyuk6', NULL, '2020-11-17 12:19:02', '2020-11-17 12:19:02'),
(4, 'Minar Khan', 'minar@gmail.com', NULL, '$2y$10$UjEr3kctAZmNh9xB2dzncuMsijmh6wjpVrSa35FbTZaglOlCsL81O', NULL, '2020-11-17 18:30:31', '2020-11-17 18:30:31'),
(5, 'Al Maksumee', 'maksumee@gmail.com', NULL, '$2y$10$yiRLGoeN.cmj2BwbIue0vez3qtx5OFLZltXB./EaEQ7IgG1LXJPMe', NULL, '2020-11-18 03:37:02', '2020-11-18 03:37:02'),
(6, 'Alam khan', 'alam@gmail.com', NULL, '$2y$10$papcqPgpxSAHYDUazRIJg.uV/5JchrIX8Aa927PJAswy9hQSAjWTC', NULL, '2020-11-18 04:08:44', '2020-11-18 04:08:44'),
(7, 'Masum Billah', 'masum@gmail.com', NULL, '$2y$10$QXmJBTyjZrCwNkTFcec6oeD4Xo7lJ3Dpbfr3FdujaefeTOULr17MC', NULL, '2020-11-18 04:09:09', '2020-11-18 04:09:09'),
(8, 'Nazmul Mazumdar', 'nazmul@gmail.com', NULL, '$2y$10$FE1UYwyg.GHeJDvD5jhVjeC00RNWKFfA7s1o28AZ3w0vsPY2WItMW', NULL, '2020-11-18 04:09:47', '2020-11-18 04:09:47'),
(9, 'Hasibur Rahman', 'hasib@gmail.com', NULL, '$2y$10$8wtJPLI2R7/gs05WiBHe/.60lAvWo8H2/otkNhDDcQQ27h/91lcMm', NULL, '2020-11-18 04:10:30', '2020-11-18 04:10:30'),
(10, 'Shohrab Hossain', 'shohrab@gmail.com', NULL, '$2y$10$TZlzMtgkZSSHSJwm262OSuS7NtJUVCa4l3gt/WAa0KbH5U6EhSN4W', NULL, '2020-11-26 15:53:39', '2020-11-26 15:53:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
