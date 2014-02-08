-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2014 at 07:46 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
-- --------------------------------------------------------

--
-- Table structure for table `vtracker`
--

CREATE TABLE IF NOT EXISTS `vtracker` (
  `ip` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `is_bot` int(50) DEFAULT NULL,
  `lat` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `long` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `latlong` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `time` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `hashost` int(50) DEFAULT NULL,
  `host` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `org` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `ua` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `month` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `hour` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `year` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `from` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `querystr` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
