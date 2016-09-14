-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2016 at 04:00 AM
-- Server version: 5.5.34
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `job_descriptions` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `EIN` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `IAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ACL_ID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `state_id` int(10) unsigned NOT NULL,
  `customer_type_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customers_user_id_foreign` (`user_id`),
  KEY `customers_state_id_foreign` (`state_id`),
  KEY `customers_customer_type_id_foreign` (`customer_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE IF NOT EXISTS `customer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Trucking'),
(3, 'Rail'),
(4, 'Agents'),
(5, 'Air Line'),
(6, 'Auto Carrier'),
(7, 'Ocean'),
(8, 'WareHouse'),
(9, 'Brokers/Misc');

-- --------------------------------------------------------

--
-- Table structure for table `custype_per`
--

CREATE TABLE IF NOT EXISTS `custype_per` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `per_id` int(10) unsigned NOT NULL,
  `custype_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `custype_per_per_id_foreign` (`per_id`),
  KEY `custype_per_custype_id_foreign` (`custype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_03_10_043255_create_customer_type_table', 2),
('2016_03_10_045106_create_state_table', 3),
('2016_03_10_045733_create_customers_table', 4),
('2016_03_10_051723_create_state_table', 5),
('2016_03_10_052729_create_customer_type_table', 6),
('2016_03_10_073621_create_state_table', 7),
('2016_03_10_073657_create_customer_type_table', 7),
('2016_03_10_073854_create_customers_table', 8),
('2016_03_10_074143_create_permission_table', 9),
('2016_03_10_075023_create_users_table', 9),
('2016_03_10_075828_create_activity_logs_table', 10),
('2016_03_11_085011_create_customer_type_table', 11),
('2016_03_11_085334_create_customer_type_table', 12),
('2016_03_11_085628_create_state_table', 13),
('2016_03_11_085841_create_users_table', 14),
('2016_03_11_090021_create_customers_table', 14),
('2016_03_11_091110_create_permission_table', 15),
('2016_03_11_091219_create_customer_type_table', 16),
('2016_03_11_091422_create_custype_per_table', 17),
('2016_03_11_092047_create_customers_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`) VALUES
(1, 'View'),
(2, 'Add'),
(3, 'Edit'),
(4, 'Delete'),
(5, 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=52 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'AL'),
(2, 'AK'),
(3, 'AZ'),
(4, 'AR'),
(5, 'CA'),
(6, 'CO'),
(7, 'CT'),
(8, 'DE'),
(9, 'DC'),
(10, 'FL'),
(11, 'GA'),
(12, 'HI'),
(13, 'ID'),
(14, 'IL'),
(15, 'IN'),
(16, 'IA'),
(17, 'KS'),
(18, 'KY'),
(19, 'LA'),
(20, 'ME'),
(21, 'MD'),
(22, 'MA'),
(23, 'MI'),
(24, 'MN'),
(25, 'MS'),
(26, 'MO'),
(27, 'MT'),
(28, 'NE'),
(29, 'NV'),
(30, 'NH'),
(31, 'NJ'),
(32, 'NM'),
(33, 'NY'),
(34, 'NC'),
(35, 'ND'),
(36, 'OH'),
(37, 'OK'),
(38, 'OR'),
(39, 'PA'),
(40, 'RI'),
(41, 'SC'),
(42, 'SD'),
(43, 'TN'),
(44, 'TX'),
(45, 'UT'),
(46, 'VT'),
(47, 'VA'),
(48, 'WA'),
(49, 'WV'),
(50, 'WI'),
(51, 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tuan.bnm@serenco.net', '$2y$10$10rE3m4cZJlRccf.1wKXAO/hhE7RdkaMoGUK8ifz2UIiL4BSJp72a', 'FyxYbSUyjP6hqp9AK4nocyDWckewx3pc06mguqmimB8WnIXrlwTKOy1cxOiE', NULL, NULL),
(2, '', '', NULL, '2016-03-11 03:17:10', '2016-03-11 03:17:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_old`
--

CREATE TABLE IF NOT EXISTS `users_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_old`
--

INSERT INTO `users_old` (`id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'tuan.bnm@serenco.net', '$2y$10$10rE3m4cZJlRccf.1wKXAO/hhE7RdkaMoGUK8ifz2UIiL4BSJp72a', 'FyxYbSUyjP6hqp9AK4nocyDWckewx3pc06mguqmimB8WnIXrlwTKOy1cxOiE', '2016-03-09 01:27:35', '2016-03-09 23:56:36'),
(2, 'vendor@gmail.com', '$2y$10$2gYIxvyVB5C8JhNsEN2xVOlfVaP69Ud071.RGOWB0U4glRxKj/m4u', NULL, '2016-03-09 03:19:24', '2016-03-09 03:19:24'),
(3, 'phuc.dcd@serenco.net', '$2y$10$MTFCOPu4JJ0ylAu2V1H0r.d82SJNqVJU4q1Qhme7SQGxUlepDHsjS', 'HXQ2ylzsnH3OX2mwfwnSmjGXuaD1k969HYjTpZYLcQ9naIlVa8JBVwJQlB58', '2016-03-09 19:56:20', '2016-03-09 20:24:47');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_customer_type_id_foreign` FOREIGN KEY (`customer_type_id`) REFERENCES `customer_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `custype_per`
--
ALTER TABLE `custype_per`
  ADD CONSTRAINT `custype_per_custype_id_foreign` FOREIGN KEY (`custype_id`) REFERENCES `customer_type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `custype_per_per_id_foreign` FOREIGN KEY (`per_id`) REFERENCES `permission` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
