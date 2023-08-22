-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2023 at 11:10 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruits-valley`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fruit_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `fruit_id`, `quantity`, `created_at`, `updated_at`) VALUES
(9, 1, 14, 1, '2023-08-05 22:41:43', '2023-08-05 22:41:43'),
(10, 1, 23, 1, '2023-08-05 23:56:00', '2023-08-05 23:56:00'),
(11, 1, 21, 1, '2023-08-05 23:56:02', '2023-08-05 23:56:02'),
(12, 4, 12, 3, '2023-08-06 00:45:01', '2023-08-06 03:08:47'),
(13, 4, 14, 2, '2023-08-06 00:45:04', '2023-08-06 03:08:47'),
(14, NULL, 14, 1, '2023-08-06 02:55:59', '2023-08-06 02:55:59'),
(15, NULL, 18, 1, '2023-08-06 02:56:11', '2023-08-06 02:56:11'),
(19, 5, 12, 1, '2023-08-06 03:06:21', '2023-08-06 03:06:21'),
(20, 5, 14, 1, '2023-08-06 03:06:23', '2023-08-06 03:06:23'),
(21, 4, 23, 1, '2023-08-06 03:39:19', '2023-08-06 03:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fruits`
--

CREATE TABLE `fruits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fr_name` varchar(20) NOT NULL,
  `fr_img` varchar(50) NOT NULL,
  `fr_qty` int(11) NOT NULL,
  `fr_old_price` double(8,2) NOT NULL,
  `fr_cur_price` double(8,2) NOT NULL,
  `fr_soft_delete` tinyint(1) NOT NULL DEFAULT 0,
  `fr_availability` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fruits`
--

INSERT INTO `fruits` (`id`, `fr_name`, `fr_img`, `fr_qty`, `fr_old_price`, `fr_cur_price`, `fr_soft_delete`, `fr_availability`, `created_at`, `updated_at`) VALUES
(9, 'Ripe Banana', 'RipeBanana64c897246b399.png', 75, 5.00, 5.00, 0, 1, '2023-07-31 05:49:54', '2023-08-02 06:41:10'),
(11, 'Blackberry Jam', 'Blackberry64c7a012d5394.png', 79, 120.00, 150.00, 0, 1, '2023-07-31 05:50:42', '2023-08-02 06:04:20'),
(12, 'Chalta', 'Chalta64c7a0331f22c.jpg', 49, 120.00, 110.00, 0, 1, '2023-07-31 05:51:15', '2023-08-02 06:04:11'),
(13, 'Dragon', 'Dragon64c7a047e42f2.png', 10, 1000.00, 850.00, 1, 1, '2023-07-31 05:51:35', '2023-07-31 05:57:49'),
(14, 'Grape', 'Grape64c7a05e0fa9e.png', 93, 1200.00, 1000.00, 0, 1, '2023-07-31 05:51:58', '2023-08-01 06:12:22'),
(15, 'Ripe Guava', 'Guava64c7a07792a44.png', 12, 250.00, 240.00, 0, 1, '2023-07-31 05:52:23', '2023-08-01 06:31:45'),
(17, 'Lichi', 'Lichi64c7a0e517316.png', 50, 150.00, 100.00, 0, 1, '2023-07-31 05:54:13', '2023-07-31 05:54:13'),
(18, 'Mango', 'Mango64c7a0f9b2c29.png', 2, 250.00, 200.00, 0, 1, '2023-07-31 05:54:33', '2023-08-02 05:41:27'),
(19, 'Monkey Jackfruit', 'MonkeyJackfruit64c7a11100367.jpg', 5, 120.00, 100.00, 0, 0, '2023-07-31 05:54:57', '2023-07-31 06:08:17'),
(20, 'Monkey Jackfruit', 'MonkeyJackfruit64c7a11130e3a.jpg', 5, 120.00, 100.00, 1, 1, '2023-07-31 05:54:57', '2023-07-31 06:02:00'),
(21, 'Orange', 'Orange64c7a12f7e4a8.jpg', 10, 160.00, 120.00, 0, 1, '2023-07-31 05:55:27', '2023-08-02 05:37:16'),
(22, 'Orange', 'Orange64c7a12fb1423.jpg', 12, 160.00, 120.00, 1, 1, '2023-07-31 05:55:27', '2023-07-31 06:02:27'),
(23, 'Apple', 'Apple64c7a1dd92c80.png', 10, 240.00, 220.00, 0, 1, '2023-07-31 05:58:21', '2023-08-02 04:52:54'),
(24, 'Dragon', 'Dragon64c7a1f516f3c.png', 0, 250.00, 200.00, 0, 1, '2023-07-31 05:58:45', '2023-08-02 04:52:34'),
(25, 'Jackfruit', 'Jackfruit64c7a2a065ae0.png', 1, 180.00, 160.00, 0, 0, '2023-07-31 06:01:36', '2023-07-31 06:07:26'),
(26, 'Jackfruit', 'Jackfruit64c7a2a0932f4.png', 1, 180.00, 160.00, 1, 1, '2023-07-31 06:01:36', '2023-07-31 06:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2023_07_30_041932_create_friuts_table', 1),
(7, '2023_08_01_103147_create_orders_table', 2),
(8, '2023_08_03_044631_create_order_items_table', 2),
(9, '2023_08_03_063300_create_carts_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `order_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `fruit_id` bigint(20) UNSIGNED NOT NULL,
  `order_qty` int(11) NOT NULL,
  `price_per_item` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `sur_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `sur_name`, `email`, `phone`, `role`, `email_verified_at`, `phone_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rezaul Islam', 'Rezaul Islam', 'example@msh.com', '+8801600000000', 0, NULL, NULL, '$2y$10$9UPOTV6fYBeHZp5DlH19FO6Kg8Z1Si5zu9BPAu1xl8RU4DNSoBCvO', NULL, '2023-07-30 23:34:24', '2023-07-30 23:34:24'),
(2, 'Rezaul Islam', 'Rezaul Islam', 'example1@msh.com', '+8801600000001', 1, NULL, NULL, '$2y$10$NooaY4e4hWXYy4tQJIyape/BT2XDKce55XtgevRcCk9PBqMzQPSRi', NULL, '2023-07-30 23:35:08', '2023-07-30 23:35:08'),
(3, 'Rimon', 'Khan', 'rimon@khan.com', '01700000000', 0, NULL, NULL, '$2y$10$/nuDOMxv8ZJ28w45QIRJHu4lFLFi6ZZZGGE6X63L97MgQhR4Hypi6', NULL, '2023-08-01 23:54:23', '2023-08-01 23:54:23'),
(4, 'Khan Bahadur', 'Aziz', 'example2@msh.com', '+8801600000002', 0, NULL, NULL, '$2y$10$DSbEcXL129Teni1/gTXc5.Bd0yjOnSSNBgGXi93F76MCuZprIStUS', NULL, '2023-08-06 00:43:04', '2023-08-06 00:43:04'),
(5, 'Badshah Alamgir', 'Aaorangjeb', 'example3@msh.com', '+8801600000003', 0, NULL, NULL, '$2y$10$g.TOIBG4JIRgr99OEYVjNuO3xUKoif498ybY/aYw2JGFCk4oKCsRO', NULL, '2023-08-06 01:06:25', '2023-08-06 01:06:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_fruit_id_foreign` (`fruit_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fruits`
--
ALTER TABLE `fruits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_fruit_id_foreign` (`fruit_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fruits`
--
ALTER TABLE `fruits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_fruit_id_foreign` FOREIGN KEY (`fruit_id`) REFERENCES `fruits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_fruit_id_foreign` FOREIGN KEY (`fruit_id`) REFERENCES `fruits` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
