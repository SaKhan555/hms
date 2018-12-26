-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2018 at 03:04 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `allotments`
--

CREATE TABLE `allotments` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `renter_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allotments`
--

INSERT INTO `allotments` (`id`, `room_id`, `renter_id`, `date`, `created_by`, `created_at`, `updated_by`, `updated_at`, `deleted_at`) VALUES
(11, 1, 1, '2018-01-12', 1, '2018-12-26 12:37:25', 1, '2018-12-26 12:37:25', NULL),
(12, 1, 2, '2018-01-12', 1, '2018-12-26 12:37:25', 1, '2018-12-26 12:37:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `user_id`, `country`, `created_at`, `updated_at`, `status`) VALUES
(1, 1, 'Russia', '2018-11-07 01:01:03', '2018-11-13 04:31:11', 1),
(2, 1, 'canada', '2018-11-07 01:09:48', '2018-11-13 04:03:26', 1),
(3, 1, 'japan', '2018-11-07 01:17:19', '2018-11-13 01:42:00', 1),
(4, 1, 'china', '2018-11-07 01:21:08', '2018-11-13 01:41:53', 1),
(5, 1, 'pakistan', '2018-11-07 01:21:49', '2018-11-13 04:32:28', 1),
(6, 1, 'uae', '2018-11-07 01:25:27', '2018-11-13 04:38:14', 1),
(7, 1, 'south africa', '2018-11-07 02:53:52', '2018-11-13 01:10:08', 1),
(8, 1, 'saudi arab', '2018-11-07 04:04:48', '2018-11-13 00:46:47', 1),
(9, 1, 'united kingdom', '2018-11-07 04:05:31', '2018-11-13 04:37:58', 1),
(11, 2, 'austrilia', '2018-11-07 04:10:44', '2018-11-13 03:01:22', 1),
(12, 1, 'brazil', '2018-11-07 04:17:40', '2018-11-13 01:41:47', 1),
(13, 1, 'uganda', '2018-11-07 04:21:08', '2018-11-13 04:38:19', 1),
(14, 1, 'switzerland', '2018-11-07 04:33:48', '2018-11-13 04:32:35', 1),
(15, 1, 'test', '2018-11-07 04:36:09', '2018-11-13 04:40:58', 0),
(16, 1, 'india', '2018-11-07 05:04:31', '2018-11-13 04:36:58', 1),
(17, 1, 'sri lanka', '2018-11-07 05:22:10', '2018-11-13 04:38:09', 1),
(18, 1, 'test2', '2018-11-07 05:25:19', '2018-11-13 07:29:53', 0),
(19, 1, 'test3', '2018-11-07 05:47:13', '2018-11-13 04:04:52', 1),
(20, 1, 'test4', '2018-11-07 06:01:32', '2018-11-13 04:40:52', 0),
(21, 1, 'france', '2018-11-07 06:17:26', '2018-11-13 01:41:55', 1),
(22, 1, 'afghanistan', '2018-11-12 06:12:27', '2018-11-13 04:03:11', 1),
(23, 1, 'test 20', '2018-11-13 01:54:00', '2018-11-13 04:53:54', 0),
(24, 2, 'austria', '2018-11-13 02:11:43', '2018-11-13 04:31:39', 1),
(25, 2, 'bangladesh', '2018-11-13 02:21:48', '2018-11-13 04:38:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_13_074128_create_rooms_table', 1),
(5, '2018_10_15_112404_create_renters_table', 2),
(7, '2018_10_18_110517_create_renter__rooms_table', 3),
(10, '2018_10_19_075102_create_payments_table', 4),
(13, '2018_11_06_111657_create_countries_table', 5),
(18, '2018_12_26_132628_create_roles_table', 6),
(19, '2018_12_26_133857_create_roles_users_create', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `renter_id` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `date` date NOT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT '0',
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `renter_id`, `payment`, `date`, `payment_status`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 2, 5000, '2018-10-22', 1, 1, '2018-10-22 00:00:00', 1, '2018-10-22 00:00:00', 1),
(2, 2, 7000, '2018-11-30', 1, 1, '2018-10-31 15:39:17', 1, '2018-10-31 15:39:17', 1),
(3, 1, 5000, '2018-10-01', 1, 1, '2018-10-31 15:44:23', 1, '2018-10-31 15:44:23', 1),
(4, 3, 7000, '2018-10-25', 1, 1, '2018-10-31 15:52:11', 1, '2018-10-31 15:52:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `renters`
--

CREATE TABLE `renters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nic_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `marital_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `profession` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nic_copy` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_details` text COLLATE utf8mb4_unicode_ci,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renters`
--

INSERT INTO `renters` (`id`, `name`, `father_name`, `nic_number`, `contact`, `email`, `address`, `gender`, `marital_status`, `dob`, `profession`, `photo_url`, `nic_copy`, `other_details`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'Ali', 'Ali khan', '12101-1010111-1', '0312-3111232', 'user@test.com', 'karachi', 2, 'married', '2000-01-05', 'businessman', '222546357_ai.jpg', '1986426431_A-smooth-sea-newer-created-sailors-620x348.jpg', 'ok', 1, '2018-10-16 11:45:08', NULL, NULL, 1),
(2, 'Shahid', 'Khan', '51012-3420998-5', '+12-332-112312', 'shahid@test.com', 'karachi', 1, 'single', '1999-03-10', 'businessman', '1629296792_ai3.jpg', '1038496674_A-smooth-sea-newer-created-sailors-620x348.jpg', 'this is shahid. gender change and nic change to a smooth sea never title', 1, '2018-10-17 11:38:22', 1, '2018-10-18 12:39:03', 1),
(3, 'Ahmad', 'Khyder', '12121-1112224-5', '+92-903-2332323', 'ahmad@test.com', 'Swat', 1, 'divorced', '1995-10-24', 'student', '1074708615_ai2.jpg', '398413646_ai.jpg', 'hi this is ahmad i am here to get admission in the house....', 1, '2018-10-17 16:05:21', NULL, NULL, 1),
(4, 'kamran', 'lala', '12312-3123123-1', '+92-123-2312311', 'kami@test.com', 'Swat', 1, 'single', '2018-10-25', 'businessman', '1690219899_ai3.jpg', '762902518_ai2.jpg', 'hi this is kamran i mean kami i m your new chief of product mangement ok all is well......', 1, '2018-10-17 16:29:21', 1, '2018-10-18 14:43:57', 1),
(5, 'qasim', 'hamid', '11222-3333444-5', '+92-234-3423422', 'qasim@test.com', 'karachi', 1, 'divorced', '2018-10-24', 'farmer', '609578589_ai3.jpg', '1480246640_A-smooth-sea-newer-created-sailors-620x348.jpg', 'this is qasim details...', 2, '2018-10-19 10:22:12', NULL, NULL, 1),
(6, 'yasir', 'imran', '34234-2342342-3', '+92-234-3423422', 'yasir@test.com', 'lahore', 1, 'married', '2018-10-10', 'sportsman', '1529798721_ai.jpg', '1470952355_ai2.jpg', 'ok this is yasir and he is here to get in sports', 2, '2018-10-19 10:23:44', 1, '2018-12-14 16:37:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '2018-12-26 13:52:46', '2018-12-26 14:03:38', '2018-12-26 14:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beds` int(11) NOT NULL,
  `rent` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_number`, `room_type`, `beds`, `rent`, `added_by`, `added_on`, `updated_by`, `updated_on`, `status`) VALUES
(1, 'f01', 'ordinary', 4, 12000, 1, '2018-10-15 11:54:51', 1, '2018-10-15 16:08:05', 1),
(2, 'f02', 'large', 4, 10000, 2, '2018-10-15 15:42:05', 1, '2018-10-15 16:08:43', 1),
(3, 's01', 'ordinary', 4, 10000, 2, '2018-10-19 10:25:58', 1, '2018-10-19 00:00:00', 1),
(4, 'S02', 'extra-large', 12, 25000, 2, '2018-10-19 11:22:37', 1, '2018-10-19 11:23:11', 1),
(5, 'S03', 'small', 1, 5000, 1, '2018-10-19 11:24:18', 1, '2018-10-19 11:24:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@test.com', NULL, '$2y$10$hxCll3UYlu6b1.HWQA4mEeHO2qgAa4Obemh16966HMkX0hrWWJ2ny', 'Xy3voYSSHvROJ2dfoKKu1k8V7iy4JWmVMzDnqDSDUrVTdk8KSrOcIRw0oYUN', '2018-10-15 00:21:19', '2018-10-15 00:21:19'),
(2, 'user', 'user@test.com', NULL, '$2y$10$5vq/B268YgnAWalH9j610upq5m35cgLlwwtVuBxd47icCRNLijwy2', 'GULgFifIKRrGvSnKDUQNeveiih46NPufGpKbvjEnFPCk1oKwn4L7QhR4OVOV', '2018-10-15 05:41:30', '2018-10-15 05:41:30'),
(3, 'test', 'test@test.com', NULL, '$2y$10$wilThByXLxuAAlqUDlP2weoSu1QNXqTB.nJY3eSeJaH8/vOZzdQCS', NULL, '2018-11-22 01:57:11', '2018-11-22 01:57:11'),
(4, 'test2', 'test2@test.com', NULL, '$2y$10$lhybhMkBZvetKkyj0A13bOrwQn0xFRPGtUWupyVwzZLlTgyRI96h6', NULL, '2018-11-22 02:02:49', '2018-11-22 02:02:49'),
(5, 'test3', 'test3@test.com', NULL, '$2y$10$OHFYyQUHXVbuuMg8rgT8Guv2AypkRK9N/loVgMU2WlSF33v03Av/O', NULL, '2018-11-22 02:08:07', '2018-11-22 14:08:07'),
(6, 'gucci gang', 'gucci@gang.com', NULL, '$2y$10$dLeqNl08vRpAQtzSaxZq1u2OdVTftKvZ7yt8.LHPm0ptQoukJfitq', NULL, '2018-11-22 04:35:20', '2018-11-22 04:35:20'),
(7, 'lala', 'lala@mail.com', NULL, '$2y$10$1pM7xUnVJZD7xxc6fKp8neq3VDMpKCfuR9Onl5Yf8rLbTSVrMS44u', NULL, '2018-11-22 04:40:41', '2018-11-22 04:40:41'),
(8, 'kiki', 'kiki@kiki.com', NULL, '$2y$10$/K5YieLAXrP6VjBnw7eoWe1wdzcSYWjQZec4pp.77NQZGcu9BFjrm', NULL, '2018-11-22 09:42:28', '2018-11-22 09:42:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allotments`
--
ALTER TABLE `allotments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renters`
--
ALTER TABLE `renters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
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
-- AUTO_INCREMENT for table `allotments`
--
ALTER TABLE `allotments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `renters`
--
ALTER TABLE `renters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
