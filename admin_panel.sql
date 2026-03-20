-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2026 at 11:04 PM
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
-- Database: `admin_panel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-06-15-113925', 'App\\Database\\Migrations\\Session', 'default', 'App', 1772843764, 1),
(2, '2025-06-15-114014', 'App\\Database\\Migrations\\UserManagement', 'default', 'App', 1772843764, 1),
(3, '2026-03-13-161500', 'App\\Database\\Migrations\\AddNameColumnToUsers', 'default', 'App', 1773425154, 2),
(4, '2026-05-18-000001', 'App\\Database\\Migrations\\DropMenuCategoryIdFromUserAccess', 'default', 'App', 1773955228, 3),
(5, '2026-05-18-000002', 'App\\Database\\Migrations\\AddStudentProfileColumnsToUsers', 'default', 'App', 1773955228, 3),
(6, '2026-05-18-000003', 'App\\Database\\Migrations\\CreateRbacRoles', 'default', 'App', 1773955228, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `label` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Full access to all features', '2026-03-19 21:20:28', '2026-03-19 21:20:28'),
(2, 'teacher', 'Teacher', 'Access to dashboard, students, and items', '2026-03-19 21:20:28', '2026-03-19 21:20:28'),
(3, 'student', 'Student', 'Access to own profile and student dashboard', '2026-03-19 21:20:28', '2026-03-19 21:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `student_id` varchar(20) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `year_level` tinyint(4) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `name`, `username`, `password`, `role`, `role_id`, `created_at`, `updated_at`, `student_id`, `course`, `year_level`, `section`, `phone`, `address`, `profile_image`) VALUES
(1, 'sekend', NULL, 'sekend08@gmail.com', '$2y$12$qMupXcDgU8wZlitDGeF.5.YWB03GUrw0jhvYE7KaSKssr2Ttil.NC', 1, 1, '2026-03-07 12:36:52', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'rodel', NULL, 'rodel@gmail.com', '$2y$12$TomNBwLkKkeHKwESIHwJkuht5UtKoVmZV1LEb8oUlEOPjpZMLt.vm', 3, 3, '2026-03-19 21:32:03', '2026-03-19 21:46:37', '123123', 'bsit', 3, '', '123', 'fasdfas', NULL),
(12, 'teacher', NULL, 'teacher@gmail.com', '$2y$12$4lE41jmllnU4LMnpz/542.GHyXkK5L4R/vN779kuk3omf0klO3mKK', 2, 2, '2026-03-19 21:35:21', '2026-03-19 21:36:21', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `menu_category_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `submenu_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_category_id`, `menu_id`, `submenu_id`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 0, 1, 0),
(3, 1, 2, 0, 0),
(4, 1, 0, 2, 0),
(5, 1, 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `parent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu_category`, `title`, `url`, `icon`, `parent`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'home', 0),
(2, 2, 'Users', 'users', 'user', 0),
(3, 2, 'Menu Management', 'menu-management', 'command', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu_category`
--

CREATE TABLE `user_menu_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu_category`
--

INSERT INTO `user_menu_category` (`id`, `menu_category`) VALUES
(1, 'Common Page'),
(2, 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
(1, 'Administrator'),
(4, 'Student'),
(5, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`timestamp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu_category`
--
ALTER TABLE `user_menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu_category`
--
ALTER TABLE `user_menu_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
