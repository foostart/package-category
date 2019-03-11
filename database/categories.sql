-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 11, 2019 at 10:00 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikicase`
--
CREATE DATABASE IF NOT EXISTS `wikicase` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `wikicase`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id_parent` int(11) DEFAULT NULL,
  `category_id_parent_str` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `category_id_child_str` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_order` int(11) NOT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_overview` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `category_description` text CHARACTER SET utf8,
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` tinyint(2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_id_parent`, `category_id_parent_str`, `category_id_child_str`, `category_name`, `category_order`, `category_slug`, `category_overview`, `category_description`, `category_image`, `category_status`, `user_id`, `user_full_name`, `context_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '{\"2\":1,\"5\":1,\"3\":1,\"4\":1}', 'root', 0, NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:03:27', '2018-04-06 22:04:51'),
(2, 1, '{\"1\":1}', '{\"5\":1}', 'child 1', 0, NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:03:50', '2018-04-06 22:04:51'),
(3, 1, '{\"1\":1}', '{\"4\":1}', 'child 2', 0, NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:04:05', '2018-04-06 22:04:25'),
(4, 3, '{\"3\":1,\"1\":1}', NULL, 'child 21111111', 0, NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:04:25', '2018-04-06 22:04:25'),
(5, 2, '{\"2\":1,\"1\":1}', NULL, 'child 111111111', 0, NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:04:51', '2018-04-06 22:04:51'),
(6, NULL, NULL, NULL, 'Trang chủ', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(7, NULL, NULL, NULL, 'Tài liệu', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(8, 7, '{\"7\":1}', NULL, 'HTML/CSS', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(9, NULL, NULL, NULL, 'Chúng tôi', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(10, NULL, NULL, NULL, 'Phòng kinh doanh', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, NULL, 9999, 'Lê Super Admin', 2, NULL, NULL),
(11, NULL, NULL, NULL, 'Phòng nhân sự', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, NULL, 9999, 'Lê Super Admin', 2, NULL, NULL),
(12, NULL, NULL, NULL, 'adsfasd fasdf asdf', 0, NULL, 'asdf asdf asdf', '<p>asdf asdf asdf asdf asdfasdf asdfasdf</p>', NULL, NULL, 9999, 'Lê Super Admin', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contexts`
--

DROP TABLE IF EXISTS `contexts`;
CREATE TABLE IF NOT EXISTS `contexts` (
  `context_id` int(11) NOT NULL AUTO_INCREMENT,
  `context_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context_ref` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `context_status` tinyint(2) DEFAULT '0',
  `context_notes` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`context_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
