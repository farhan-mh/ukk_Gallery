-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2024 at 12:32 PM
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
-- Database: `ukk_galery2`
--

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
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `upload_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `upload_id`, `created_at`, `updated_at`) VALUES
(2, 2, 3, NULL, NULL),
(4, 3, 3, NULL, NULL),
(5, 3, 7, NULL, NULL),
(6, 2, 4, NULL, NULL),
(7, 2, 1, NULL, NULL),
(8, 3, 1, NULL, NULL),
(9, 3, 13, NULL, NULL),
(10, 3, 11, NULL, NULL),
(11, 2, 11, NULL, NULL),
(12, 5, 17, NULL, NULL),
(13, 5, 14, NULL, NULL);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_28_013431_create_profils_table', 1),
(6, '2024_01_28_014434_create_uploads_table', 1),
(7, '2024_01_28_145747_create_up_profils_table', 1),
(8, '2024_01_29_144515_add_foreign_key_to_table_name', 2),
(9, '2024_02_03_212044_add_likes_to_uploads_table', 3),
(10, '2024_02_04_002533_create_likes_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarUpload` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsiUpload` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `idUser`, `gambarUpload`, `judul`, `deskripsiUpload`, `created_at`, `updated_at`, `likes`) VALUES
(1, '2', 'FmcWM6Cj2DQUUdeVRYSBdOpKQFEfE7mkW1EmtETf.jpg', 'Kawasaki Shozo', '<p>Pendiri perusahaan <strong>Kawasaki</strong></p>', '2024-02-17 23:09:37', '2024-02-18 11:08:44', 2),
(2, '2', '9XFfRSvZHOkSybwzyIPczqaH2xnB1Cp9JPhqC0Ph.jpg', 'we bare bears', '<p>walpaper</p>', '2024-02-17 23:18:00', '2024-02-17 23:18:00', 0),
(3, '2', 'II6xdlDphYKuPnr5J4Yv6pIqjj4htU91c4hkhnm6.jpg', 'Pikachu', '<p><strong>p</strong><em><strong>o</strong>kemon</em></p>', '2024-02-17 23:21:37', '2024-02-18 01:30:10', 2),
(4, '2', 'FS1QmWvMglYmESGu9vdyNS4TSAGvh0pN1d0yvkS9.jpg', 'spongebob', '<p>character&nbsp;spongebob</p>', '2024-02-17 23:45:44', '2024-02-18 01:50:15', 1),
(5, '2', 'Pnn8YsBBWm7DOFht9lCdDz6mwgM3XgrMzmAPmYEL.jpg', 'explore the galaxy', '<p>Gambar AI</p>', '2024-02-17 23:49:19', '2024-02-19 15:18:38', 0),
(6, '2', 'kmoRyVuulKCpepbBYm6m3K2PvJoNyCYgq6WmVzpB.jpg', 'spongebob detective Jazz', '<p>Stolen Clarinet</p>', '2024-02-17 23:58:00', '2024-02-17 23:58:00', 0),
(7, '2', '7PJzQhqT3HI5I41GdJhvHhpyXHEcETHdsybhxMqK.jpg', 'DoodleBob', '<p>Doodle&nbsp;<strong>spongebob&nbsp;</strong></p>', '2024-02-18 00:01:14', '2024-02-18 01:31:33', 1),
(8, '2', 'TygkHe5SVoWThiDACyVLHz03SmJ2hWAkD9lcRMBN.jpg', 'Astronaut', '<p><strong>Astronaut </strong>on the moon<s> with planet</s> saturn cartoon illustration</p>', '2024-02-18 00:05:02', '2024-02-18 00:05:02', 0),
(10, '3', 'T77DgLc8iBEQP326nTfH7lvz8wIIdeJDBJ6g7gaK.jpg', 'Gunung', '<p>Mountain ART</p>', '2024-02-19 15:03:53', '2024-02-19 15:03:53', 0),
(11, '3', 'ZssxfaIK3gFPrOKVcpLyJbzLaouGKWyjXJIdMCfR.jpg', 'Wooden House', '<p>Enchanting Swiss Lake&nbsp;</p>', '2024-02-19 15:05:16', '2024-02-19 15:16:42', 2),
(12, '3', 'Wet9iU0ilZWbU7m0rjit3daCnjBY9s5fP4KJTlFk.jpg', 'Minecraft', '<p>Runah Kayu Minecraft</p>', '2024-02-19 15:06:20', '2024-02-19 15:06:20', 0),
(13, '3', 'l7d0Z5FrqsFYNI65W7WxMjWXX5gm04fQxcUm6LZx.jpg', 'space', '<p>Space Wallpaper - Sunset on a distant planet</p>', '2024-02-19 15:07:02', '2024-02-19 15:08:56', 1),
(14, '3', 'h7y1ENydKLIEUafGF9Gcn9fYY3huqfcR091Z0aqb.png', 'Flutter', '<p>Main.Dart</p>', '2024-02-19 15:08:42', '2024-02-20 03:47:49', 1),
(15, '3', '83euquI2l68RNBot2SYaVqCfbRhhPkFmR69EPXBT.jpg', 'neon', '<p>neon smile</p>', '2024-02-19 15:09:49', '2024-02-19 15:09:49', 0),
(17, '5', 'Z732MQi442dju7WCk3ZV9lfuuXbRvbtAgM5aMSe5.jpg', 'makanan Telur', '<p>makanan</p>', '2024-02-20 03:45:27', '2024-02-20 03:46:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `up_profils`
--

CREATE TABLE `up_profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailUser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `up_profils`
--

INSERT INTO `up_profils` (`id`, `idUser`, `emailUser`, `avatar`, `background`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, '2', 'farhanmusyaffa0932@gmail.com', 'FM49JQCxpXJpa8T0HZIzz6J4nHGqzdabwptWbBJo.png', 'oxhS0eRReSIrr6M60k5yVJi8KtpHtwmT31zafsdS.jpg', '<p>Hallooo!!</p>', '2024-02-17 22:58:13', '2024-02-17 23:40:58'),
(2, '3', 'user1@gmail.com', '7NHnawj0y3nL0o1ogU0VSjAI6vkPrEDr0yHvsd3t.jpg', NULL, '<p><s>Welcome</s></p>', '2024-02-18 01:29:02', '2024-02-19 14:55:09'),
(3, '4', 'user2@gmail.com', NULL, NULL, NULL, '2024-02-18 01:58:03', '2024-02-18 01:58:03'),
(4, '5', 'Agus@gmail.com', 'J3Ewm5ackTb8HR5ljz6IWjSloF8BEa6kYFTKxsOp.jpg', 'VELQyxSCm2MtFBjHQ8lNHxH4nTDNgCDbav7j3Vcq.jpg', 'hello', '2024-02-20 03:43:24', '2024-02-20 03:44:43');

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
(2, 'FarhanMH.', 'farhanmusyaffa0932@gmail.com', NULL, '$2y$12$IVWo08J8qddzwxH9Twp4UOwA9QAlTgf2vMf19MK23eOyBEpPxADHm', NULL, '2024-02-17 22:58:13', '2024-02-17 22:58:13'),
(3, 'Farhan Musyaffa\' Habibbullah', 'user1@gmail.com', NULL, '$2y$12$GzHIc1gBOe3KcTurjog86eQdYHjgxEGhGJAO5q9D.etXcwoLS1i1S', NULL, '2024-02-18 01:29:02', '2024-02-19 14:55:09'),
(4, 'user2', 'user2@gmail.com', NULL, '$2y$12$W3wFALg2FbGcUL/gxI9yheKXtTo3jOu6v0kVzLd48oVfT0fZuDg6O', NULL, '2024-02-18 01:58:03', '2024-02-18 01:58:03'),
(5, 'Agus', 'Agus@gmail.com', NULL, '$2y$12$oXjLgdga5XSAhT3DAQ.rIuOU84fw.6G0RDC7FSSEg.sBRHWcUQKhC', NULL, '2024-02-20 03:43:24', '2024-02-20 03:43:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_upload_id_index` (`user_id`,`upload_id`),
  ADD KEY `likes_upload_id_foreign` (`upload_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `up_profils`
--
ALTER TABLE `up_profils`
  ADD PRIMARY KEY (`id`),
  ADD KEY `up_profils_emailuser_foreign` (`emailUser`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `up_profils`
--
ALTER TABLE `up_profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_upload_id_foreign` FOREIGN KEY (`upload_id`) REFERENCES `uploads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `up_profils`
--
ALTER TABLE `up_profils`
  ADD CONSTRAINT `up_profils_emailuser_foreign` FOREIGN KEY (`emailUser`) REFERENCES `users` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
