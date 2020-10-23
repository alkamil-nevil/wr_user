-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2020 at 04:51 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wr_user`
--

-- --------------------------------------------------------

--
-- Table structure for table `eddies`
--

CREATE TABLE `eddies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `eddies`
--

INSERT INTO `eddies` (`id`, `name`, `age`, `sex`, `created_at`, `updated_at`) VALUES
(1, 'Eddy', 29, 'M', '2020-10-23 08:19:43', '2020-10-23 08:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `eddy`
--

CREATE TABLE `eddy` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2020_09_25_140716_create_user_roles_table', 1),
(3, '2020_09_25_141752_create_users_table', 1),
(4, '2020_09_25_158754_create_password_resets_table', 1),
(5, '2020_09_25_164324_create_user_modules_table', 1),
(6, '2020_09_25_164602_create_user_module_access_table', 1),
(7, '2020_09_25_170209_create_user_module_accesses_table', 2),
(8, '2020_10_23_110122_create_eddy_table', 2),
(9, '2020_10_23_110810_create_eddies_table', 3),
(10, '2020_10_23_111306_create_eddies_table', 4);

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `email_verified_at`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Nevil Thomas', 'nevilthomascs@gmail.com', '$2y$10$PUNFJg5LoIcmDMTy8lWjsettWdl4uR4btln3HBZnGpr9a0KSVcHom', NULL, 6, NULL, '2020-09-25 12:57:22', '2020-09-25 12:57:22'),
(5, 'Nevil Test', 'neviltest@gmail.com', '$2y$10$0kgshRQY4UYejp1oH14m6eFOqMS.52O2J4ly5xqAL2i9Ym88u/uc2', NULL, 6, NULL, '2020-09-25 16:53:34', '2020-09-25 16:53:34'),
(6, 'Nevil Thomas', 'neviltho@gmail.com', '$2y$10$4hITl6fks4IQNZenSFtnz.Roky0lvAQ5HiJVHuKqEstw1kYBUG8B2', NULL, 1, NULL, '2020-09-25 19:07:59', '2020-09-25 19:07:59'),
(7, 'Managers', 'nevilthocs@gmail.com', '$2y$10$4agqPLbuxSIHiA31BB1BwuE32HZmobMmWDk4Tnt54iUbEz6d5Lhoe', NULL, 1, NULL, '2020-09-25 19:08:50', '2020-09-25 19:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_modules`
--

CREATE TABLE `user_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show` int(2) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_modules`
--

INSERT INTO `user_modules` (`id`, `name`, `route`, `show`, `created_at`, `updated_at`) VALUES
(1, 'Users List', 'users', 1, '2020-09-24 20:00:00', NULL),
(2, 'Profile', 'profile', 1, '2020-09-24 20:00:00', NULL),
(3, 'Reports', 'reports', 1, '2020-09-24 20:00:00', NULL),
(4, 'Add User', 'adduser', 1, '2020-09-24 20:00:00', NULL),
(5, 'Add Role', 'createrole', 1, '2020-09-25 20:00:00', NULL),
(6, 'Update Role', 'updaterole', 0, NULL, NULL),
(7, 'Update User', 'useredit', 0, NULL, NULL),
(8, 'Admin Home', 'admin', 1, '2020-09-25 20:00:00', NULL),
(9, 'UpdateRoleAction', 'updateroleaction', 0, NULL, NULL),
(10, 'Delete User', 'userdelete', 0, NULL, NULL),
(11, 'Update User Action', 'userupdateaction', 0, NULL, NULL),
(12, 'Create User Action', 'createuser', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_module_access`
--

CREATE TABLE `user_module_access` (
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `user_module_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_module_access`
--

INSERT INTO `user_module_access` (`user_role_id`, `user_module_id`, `created_at`, `updated_at`) VALUES
(2, 1, NULL, NULL),
(2, 2, NULL, NULL),
(2, 3, NULL, NULL),
(2, 4, NULL, NULL),
(2, 5, NULL, NULL),
(2, 6, NULL, NULL),
(2, 7, NULL, NULL),
(2, 8, NULL, NULL),
(2, 9, NULL, NULL),
(6, 1, NULL, NULL),
(6, 2, NULL, NULL),
(6, 3, NULL, NULL),
(6, 4, NULL, NULL),
(6, 5, NULL, NULL),
(6, 6, NULL, NULL),
(6, 7, NULL, NULL),
(6, 8, NULL, NULL),
(6, 9, NULL, NULL),
(6, 10, NULL, NULL),
(6, 11, NULL, NULL),
(6, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_module_accesses`
--

CREATE TABLE `user_module_accesses` (
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `user_module_id` int(10) UNSIGNED NOT NULL,
  `show` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'User', '2020-09-24 20:00:00', NULL),
(2, 'Manager', '2020-09-24 20:00:00', NULL),
(6, 'Admin', '2020-09-25 16:53:16', '2020-09-25 16:53:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eddies`
--
ALTER TABLE `eddies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eddy`
--
ALTER TABLE `eddy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_modules`
--
ALTER TABLE `user_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_module_access`
--
ALTER TABLE `user_module_access`
  ADD PRIMARY KEY (`user_role_id`,`user_module_id`),
  ADD KEY `user_module_access_user_module_id_foreign` (`user_module_id`);

--
-- Indexes for table `user_module_accesses`
--
ALTER TABLE `user_module_accesses`
  ADD PRIMARY KEY (`user_role_id`,`user_module_id`),
  ADD KEY `user_module_accesses_user_module_id_foreign` (`user_module_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eddies`
--
ALTER TABLE `eddies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eddy`
--
ALTER TABLE `eddy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_modules`
--
ALTER TABLE `user_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);

--
-- Constraints for table `user_module_access`
--
ALTER TABLE `user_module_access`
  ADD CONSTRAINT `user_module_access_user_module_id_foreign` FOREIGN KEY (`user_module_id`) REFERENCES `user_modules` (`id`),
  ADD CONSTRAINT `user_module_access_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`);

--
-- Constraints for table `user_module_accesses`
--
ALTER TABLE `user_module_accesses`
  ADD CONSTRAINT `user_module_accesses_user_module_id_foreign` FOREIGN KEY (`user_module_id`) REFERENCES `user_modules` (`id`),
  ADD CONSTRAINT `user_module_accesses_user_role_id_foreign` FOREIGN KEY (`user_role_id`) REFERENCES `user_roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
