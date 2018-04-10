-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 08:50 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tailieuweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `contexts`
--

CREATE TABLE `contexts` (
  `context_id` int(11) NOT NULL,
  `context_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context_ref` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `context_status` tinyint(2) DEFAULT '0',
  `context_notes` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contexts`
--

INSERT INTO `contexts` (`context_id`, `context_name`, `context_key`, `context_ref`, `context_status`, `context_notes`, `user_id`, `user_full_name`, `created_at`, `updated_at`) VALUES
(1, 'Sample', '31011ca423703da4e7a48f00eec12', 'admin/samples', 1, NULL, 9999, 'Lê Super Admin', '2018-03-25 19:21:29', '2018-03-25 20:39:31'),
(2, 'User department', 'af36197583414ee1e26fccdc6a98', 'user/department', 1, NULL, 9999, 'Lê Super Admin', '2018-03-25 22:00:27', '2018-03-25 22:00:27'),
(3, 'Permissions', '59c873e29b03ad5ec649bfeadd', 'admin/permissions', 1, NULL, 9999, 'Lê Super Admin', '2018-03-26 00:01:21', '2018-03-26 00:01:21'),
(4, 'Posts', 'c09ae13b96c65a5a04b76ea7ac', 'admin/posts', 1, NULL, 9999, 'Lê Super Admin', '2018-03-26 00:53:36', '2018-03-26 00:53:36'),
(5, 'Slideshow', 'c631a3702ccf1b1256e6c85b54c67', 'admin/slideshows', 1, NULL, 9999, 'Lê Super Admin', '2018-03-26 23:38:23', '2018-03-26 23:38:23'),
(6, 'main_menu', 'b0604e17bfb90d494a55bdd97e0bb', 'main_menu', 1, NULL, 9999, 'Lê Super Admin', '2018-04-01 19:50:29', '2018-04-01 19:50:29'),
(7, 'admin/api', '0bcaf86a21a138d94a8428b6ed', 'admin/api', NULL, NULL, 9999, 'Lê Super Admin', '2018-04-09 01:32:56', '2018-04-09 01:32:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contexts`
--
ALTER TABLE `contexts`
  ADD PRIMARY KEY (`context_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contexts`
--
ALTER TABLE `contexts`
  MODIFY `context_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
