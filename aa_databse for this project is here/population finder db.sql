-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2022 at 07:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dusk_mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sydney', NULL, NULL),
(2, 1, 'Melbourne', NULL, NULL),
(3, 1, 'Perth', NULL, NULL),
(4, 1, 'Brisbane', NULL, NULL),
(5, 2, 'Shanghai', NULL, NULL),
(6, 2, 'Hongkong', NULL, NULL),
(7, 2, 'Beijing', NULL, NULL),
(8, 3, 'NewYork', NULL, NULL),
(9, 3, 'Miami', NULL, NULL),
(10, 3, 'LA', NULL, NULL),
(11, 4, 'Delhi', NULL, NULL),
(12, 4, 'Mumbai', NULL, NULL),
(13, 4, 'Pune', NULL, NULL),
(14, 5, 'Brasilia', NULL, NULL),
(15, 5, 'Manaus', NULL, NULL),
(16, 5, 'Natal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Australia', NULL, NULL),
(2, 'China', NULL, NULL),
(3, 'USA', NULL, NULL),
(4, 'India', NULL, NULL),
(5, 'Brazil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'male', NULL, NULL),
(2, 'female', NULL, NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_17_013906_create_countries_table', 1),
(6, '2022_10_17_014115_create_cities_table', 1),
(7, '2022_10_17_014148_create_populations_table', 1),
(8, '2022_10_17_014202_create_genders_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `populations`
--

CREATE TABLE `populations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` tinyint(4) NOT NULL DEFAULT 1,
  `city_id` tinyint(4) NOT NULL DEFAULT 1,
  `gender_id` tinyint(4) NOT NULL DEFAULT 1,
  `old` int(11) NOT NULL,
  `young` int(11) NOT NULL,
  `child` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `populations`
--

INSERT INTO `populations` (`id`, `country_id`, `city_id`, `gender_id`, `old`, `young`, `child`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 37620, 30556, 99927, NULL, NULL),
(2, 1, 2, 1, 54541, 80279, 77060, NULL, NULL),
(3, 1, 3, 1, 49987, 98771, 41357, NULL, NULL),
(4, 1, 4, 1, 20868, 93010, 18276, NULL, NULL),
(5, 2, 5, 1, 81886, 61367, 76103, NULL, NULL),
(6, 2, 6, 1, 64388, 15326, 61956, NULL, NULL),
(7, 2, 7, 1, 14625, 44128, 47923, NULL, NULL),
(8, 3, 8, 1, 20225, 39031, 73869, NULL, NULL),
(9, 3, 9, 1, 24560, 75628, 17350, NULL, NULL),
(10, 3, 10, 1, 81721, 32318, 67458, NULL, NULL),
(11, 4, 11, 1, 31799, 28801, 46665, NULL, NULL),
(12, 4, 12, 1, 73289, 74632, 40373, NULL, NULL),
(13, 4, 13, 1, 79094, 22254, 45672, NULL, NULL),
(14, 5, 14, 1, 86344, 83842, 78621, NULL, NULL),
(15, 5, 15, 1, 27573, 75456, 47861, NULL, NULL),
(16, 5, 16, 1, 31983, 34359, 59670, NULL, NULL),
(17, 1, 1, 2, 80082, 83197, 69379, NULL, NULL),
(18, 1, 2, 2, 50268, 29774, 89644, NULL, NULL),
(19, 1, 3, 2, 70839, 80356, 70586, NULL, NULL),
(20, 1, 4, 2, 93567, 39486, 22218, NULL, NULL),
(21, 2, 5, 2, 84853, 28741, 23012, NULL, NULL),
(22, 2, 6, 2, 59685, 94882, 14104, NULL, NULL),
(23, 2, 7, 2, 46396, 97146, 98258, NULL, NULL),
(24, 3, 8, 2, 17300, 98408, 95718, NULL, NULL),
(25, 3, 9, 2, 24481, 52514, 90580, NULL, NULL),
(26, 3, 10, 2, 43173, 98780, 92537, NULL, NULL),
(27, 4, 11, 2, 67780, 24417, 16314, NULL, NULL),
(28, 4, 12, 2, 92917, 69983, 56886, NULL, NULL),
(29, 4, 13, 2, 51852, 45846, 28796, NULL, NULL),
(30, 5, 14, 2, 55362, 43624, 63147, NULL, NULL),
(31, 5, 15, 2, 20348, 97765, 23552, NULL, NULL),
(32, 5, 16, 2, 24760, 93010, 10446, NULL, NULL);

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
(1, 'User', 'user@gmail.com', NULL, '$2y$10$upNJdHiu7h7QDKiMYLuoUeJVWUYJDiex.05pGupnj4xr.wF82ySpO', NULL, NULL, NULL),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$n1TzCspY4Bs0TVObCjQ6HOEa9jA/qAImL9KoAW48laCmGHFzd0z8G', NULL, '2022-10-16 15:43:29', '2022-10-16 15:43:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `populations`
--
ALTER TABLE `populations`
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `populations`
--
ALTER TABLE `populations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
