-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2016 at 11:26 AM
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
-- Table structure for table `tbl_bill_lading`
--

CREATE TABLE IF NOT EXISTS `tbl_bill_lading` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `consignee` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `container_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kind_package_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gross_weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `measurement` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_original` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_receipt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `place_issue` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_laden` date DEFAULT NULL,
  `book_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_bill_lading_book_id_foreign` (`book_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_bill_lading`
--

INSERT INTO `tbl_bill_lading` (`id`, `consignee`, `delivery`, `container_no`, `package_no`, `kind_package_no`, `gross_weight`, `measurement`, `number_original`, `place_receipt`, `place_issue`, `date_laden`, `book_id`) VALUES
(1, 'Contact Name: Phil \r\nContact Type:Rail \r\nCompany:aaa \r\nCity:  \r\nPhone: 5645634534 \r\nFax:532523523 \r\nEmail:trucking@gmail.com', 'afasdfas', 'fsaf', '234', 'fa', '4234', 'FASFa', '3423', '', 'afas', '2016-03-24', 12),
(2, 'Contact Name: Tuan \r\nContact Type:Admin \r\nCompany:serenco \r\nCity:  \r\nPhone: 07283791 \r\nFax:478932423 \r\nEmail:admin@gmail.com', 'afasdfas', '23423', '4234', 'awrerq', '234', 'asafs', '4234', 'af', 'r', '2016-03-24', 12),
(3, ' ', '354', '', '', '53252345235235', '', '', '', '', '', '2016-03-24', 12);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_bill_lading`
--
ALTER TABLE `tbl_bill_lading`
  ADD CONSTRAINT `tbl_bill_lading_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `tbl_booking_order` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
