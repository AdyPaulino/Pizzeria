-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2015 at 12:00 AM
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
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`personName`, `id`, `phone`, `email`, `street`, `province`, `city`, `postalCode`, `user`) VALUES
('Ady', 10, '(519)729-0371', 'ariadiny.miranda@gmail.com', '77 Doon Rd', 'ON', 'Kitchener', 'N2M 4X7', 22),
('Junior', 11, '(226)972-1003', 'ivampjr@gmail.com', '200, Fischer Hallman', 'SK', 'Saska', 'N2M 4X7', 23),
('John', 12, '(519)729-0373', 'ariadiny@gmail.com', '77 Doon Rd', 'MB', 'Kitchener', 'N2G 3E1', 24);

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
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pizzaSize`, `crustType`, `toppings`, `customer`, `completed`, `total`) VALUES
(22, 'Med', 'Stuffed', 'Bacon, Salami, Peperoni', 11, 1, '14.85'),
(23, 'Large', 'Thin', 'Broccoli', 11, 1, '16.50'),
(24, 'XL', 'Stuffed', 'Bacon, Salami, Peperoni, Ham, ExtraCheese, Tomato, Olives, Broccoli, GarlicSauce, TomatoSauce', 12, 0, '29.16');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(22, 'ady', '$2y$10$CZgYWHLMDMdN5ZQobIcIze01X6..E.tXe6w2kQvINQ8MnX8JK7jeq', 'admin'),
(23, 'Jr', '$2y$10$i0FQbggALvpwyiEZXCcHpOCLNYSE6.JewTlfPhkmZ7JicVY2nERIy', 'customer'),
(24, 'john', '$2y$10$i0FQbggALvpwyiEZXCcHpOCLNYSE6.JewTlfPhkmZ7JicVY2nERIy', 'customer');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
