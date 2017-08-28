-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 11:43 PM
-- Server version: 5.5.53-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `datastore`
--

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 64, 1),
(2, 65, 2),
(3, 66, 2),
(4, 66, 3),
(5, 67, 3),
(6, 68, 1),
(7, 69, 2),
(8, 70, 2),
(9, 71, 3),
(10, 72, 4),
(11, 73, 5),
(12, 74, 2),
(13, 74, 5),
(14, 75, 3),
(15, 70, 4),
(16, 76, 4),
(17, 76, 3),
(18, 77, 4),
(19, 77, 5),
(20, 78, 5),
(21, 79, 5),
(22, 80, 5),
(23, 81, 4),
(24, 82, 1),
(25, 83, 1),
(26, 83, 1),
(27, 84, 1),
(28, 85, 2),
(29, 86, 3),
(30, 87, 4),
(31, 88, 5),
(32, 89, 1),
(33, 90, 2),
(34, 91, 3),
(35, 92, 4),
(36, 93, 5),
(37, 94, 1),
(38, 95, 2),
(39, 96, 3),
(40, 97, 1),
(41, 98, 2),
(42, 99, 3),
(43, 100, 4),
(44, 101, 5),
(45, 102, 1),
(46, 103, 2),
(47, 104, 3),
(48, 105, 4),
(49, 106, 5),
(50, 106, 5),
(51, 107, 6),
(52, 108, 7),
(53, 109, 8),
(54, 110, 9),
(55, 111, 5),
(56, 112, 6),
(57, 113, 7),
(58, 114, 8),
(59, 115, 9),
(60, 116, 8),
(61, 117, 9),
(62, 118, 5),
(63, 119, 6),
(64, 120, 7),
(65, 121, 5),
(66, 122, 6),
(67, 123, 8),
(68, 124, 9),
(69, 125, 5),
(70, 126, 6),
(71, 127, 7),
(72, 128, 8),
(73, 129, 9),
(74, 130, 5),
(75, 131, 6),
(76, 132, 8),
(77, 133, 9),
(78, 134, 5),
(79, 135, 6),
(80, 136, 5),
(81, 137, 6),
(82, 138, 7),
(83, 139, 8),
(84, 140, 9),
(85, 141, 4),
(86, 142, 5),
(87, 143, 6),
(88, 144, 7),
(89, 145, 8),
(90, 146, 5),
(91, 145, 6),
(92, 144, 5),
(93, 143, 6),
(94, 142, 7),
(95, 120, 5),
(96, 121, 6),
(97, 122, 7),
(98, 123, 8),
(99, 124, 9),
(100, 125, 5),
(101, 126, 6),
(102, 127, 7),
(103, 128, 8),
(104, 129, 9);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD CONSTRAINT `products_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
