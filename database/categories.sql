-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 12, 2019 at 06:35 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foostart`
--

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
(11, NULL, NULL, NULL, 'Phòng nhân sự', 0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, NULL, 9999, 'Lê Super Admin', 2, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
