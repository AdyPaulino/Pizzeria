-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2015 at 08:35 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pizzeria`
--
CREATE DATABASE IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pizzeria`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `created`, `modified`) VALUES
(1, 'The title', 'This is the article body.', '2015-10-26 19:12:01', NULL),
(2, 'A title once again', 'And the article body follows.', '2015-10-26 19:12:01', NULL),
(3, 'Title strikes back', 'This is really exciting! Not.', '2015-10-26 19:12:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `personName` varchar(255) NOT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `province` varchar(2) NOT NULL,
  `city` varchar(50) NOT NULL,
  `postalCode` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`personName`, `id`, `phone`, `email`, `street`, `province`, `city`, `postalCode`) VALUES
('Ady', 1, '(519)729-0371', 'ariadiny.miranda@gmail.com', '77 Doon Rd', 'ON', 'Kitchener', 'N2G 3E1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pizzaSize` varchar(50) NOT NULL,
  `crustType` varchar(50) NOT NULL,
  `toppings` varchar(1000) NOT NULL,
  `customer` int(11) NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pizzaSize`, `crustType`, `toppings`, `customer`, `completed`) VALUES
(1, 'Small', 'Hand-tossed', '', 0, 1),
(12, 'Small', 'Hand-tossed', 'Tomato,Olives', 0, 0),
(13, 'Small', 'Hand-tossed', 'Bacon,Salami,Peperoni,Ham,ExtraCheese', 0, 0),
(14, 'XL', 'Stuffed', 'GarlicSauce,TomatoSauce', 0, 0),
(15, 'Med', 'Stuffed', 'Peperoni', 0, 0),
(16, 'Med', 'Pan', 'Bacon', 0, 0),
(17, 'Large', 'Thin', 'Salami', 0, 0),
(18, 'Small', 'Hand-tossed', 'Peperoni', 0, 0),
(19, 'Small', 'Pan', 'Peperoni', 0, 0),
(20, 'Small', 'Hand-tossed', 'Ham', 1, 1),
(21, 'Large', 'Thin', 'Salami,Peperoni,Ham,ExtraCheese,Broccoli,GarlicSauce', 3, 0),
(22, 'Med', 'Stuffed', 'Bacon,Salami,Peperoni', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'ady', '$2y$10$lsxk3fiXtglj7XCIOlB0x.3I6XeZKRFw8S6/4il/F3dlUUO/4VzKi', 'admin', NULL, NULL),
(2, 'ady', '$2y$10$ccHa5OsqhqU5udYJfgOzB.h1UdDf.i4paCgg79up7eprhSqzkpSiy', 'admin', NULL, NULL),
(3, 'jr', '$2y$10$pJPjc4vqRRZPxMbTkPTWH.jGHGLRbESlSlmvkxhf6bv6pU4.4Rra6', 'customer', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
