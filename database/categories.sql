-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2018 at 08:52 AM
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_id_parent` int(11) DEFAULT NULL,
  `category_id_parent_str` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `category_id_child_str` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_slug` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_overview` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `category_description` text CHARACTER SET utf8,
  `category_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_status` tinyint(2) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `context_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_id_parent`, `category_id_parent_str`, `category_id_child_str`, `category_name`, `category_slug`, `category_overview`, `category_description`, `category_image`, `category_status`, `user_id`, `user_full_name`, `context_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '{"2":1,"5":1,"3":1,"4":1}', 'root', NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:03:27', '2018-04-06 22:04:51'),
(2, 1, '{"1":1}', '{"5":1}', 'child 1', NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:03:50', '2018-04-06 22:04:51'),
(3, 1, '{"1":1}', '{"4":1}', 'child 2', NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:04:05', '2018-04-06 22:04:25'),
(4, 3, '{"3":1,"1":1}', NULL, 'child 21111111', NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:04:25', '2018-04-06 22:04:25'),
(5, 2, '{"2":1,"1":1}', NULL, 'child 111111111', NULL, '$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs', '<p>$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs$_id_childs</p>', NULL, NULL, 9999, 'Lê Super Admin', 4, '2018-04-06 22:04:51', '2018-04-06 22:04:51'),
(6, NULL, NULL, NULL, 'Trang chủ', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(7, NULL, NULL, NULL, 'Tài liệu', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(8, 7, '{"7":1}', NULL, 'HTML/CSS', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(9, NULL, NULL, NULL, 'Chúng tôi', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, 99, 9999, 'Lê Super Admin', 6, NULL, NULL),
(10, NULL, NULL, NULL, 'Phòng kinh doanh', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, NULL, 9999, 'Lê Super Admin', 2, NULL, NULL),
(11, NULL, NULL, NULL, 'Phòng nhân sự', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>', NULL, NULL, 9999, 'Lê Super Admin', 2, NULL, NULL),
(12, NULL, NULL, NULL, 'adsfasd fasdf asdf', NULL, 'asdf asdf asdf', '<p>asdf asdf asdf asdf asdfasdf asdfasdf</p>', NULL, NULL, 9999, 'Lê Super Admin', 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
