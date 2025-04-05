-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2025 at 12:29 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalformdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(205) NOT NULL,
  `email` varchar(205) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(205) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `email`
--

INSERT INTO `email` (`id`, `name`, `email`, `password`, `phone`, `country`) VALUES
(8, 'rahul', 'rahul@gmail.com', 'nGIgpyUJ', '7871487782', 'india'),
(5, 'Ganesh', 'vrmags08@gmail.com', 'kNO8^rQ0', '9477878748', 'india'),
(6, 'Ganesh', 'gv@gmail.com', 'qpoUOAE4', '9968285582', 'india');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sessions` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `attendance` enum('in-person','virtual') NOT NULL,
  `diet` enum('veg','non-veg') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `sessions`, `attendance`, `diet`) VALUES
(1, 'Web 3', 'virtual', 'veg'),
(2, '1', 'virtual', 'veg'),
(3, '1', 'virtual', 'veg'),
(4, '1', 'virtual', 'veg'),
(5, 'AI and ML', 'virtual', 'veg'),
(6, 'Web 3', 'virtual', 'veg'),
(7, NULL, 'virtual', 'veg'),
(8, 'Web 3', 'virtual', 'veg');

-- --------------------------------------------------------

--
-- Table structure for table `org`
--

DROP TABLE IF EXISTS `org`;
CREATE TABLE IF NOT EXISTS `org` (
  `id` int NOT NULL,
  `organization_name` varchar(205) NOT NULL,
  `job` varchar(205) NOT NULL,
  `experience` varchar(205) NOT NULL,
  `industry` varchar(205) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `org`
--

INSERT INTO `org` (`id`, `organization_name`, `job`, `experience`, `industry`) VALUES
(1, 'ekarigar', 'front', '1', 'IT'),
(2, 'ekarigar', 'frontend', '1', 'IT'),
(3, 'ekarigar', 'front end ', '1', 'IT'),
(4, 'ekarigar', 'front end ', '2', 'IT'),
(5, 'ekarigar', 'front end ', '1', 'IT'),
(6, 'ekarigar', 'front end ', '1', 'IT'),
(7, 'ekarigar', 'backend', '1', 'IT'),
(8, 'ekarigar', 'backend', '2', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `id` int NOT NULL,
  `ticket_type` varchar(255) NOT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `ticket_type`, `coupon_code`, `payment_mode`, `payment_date`) VALUES
(5, 'vip', '10', 'credit card', '2025-04-04 11:13:29'),
(6, 'general', '25', 'netBanking', '2025-04-04 11:16:48'),
(8, 'general', '30', 'paypal', '2025-04-04 12:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL,
  `email` varchar(205) NOT NULL,
  `password` varchar(205) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
