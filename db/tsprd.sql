-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2013 at 11:50 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tsprd`
--

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from` varchar(10) NOT NULL,
  `keyword` varchar(8) NOT NULL,
  `msg` varchar(160) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `from`, `keyword`, `msg`, `timestamp`) VALUES
(1, '9843124452', 'FUND', '', '2013-12-28 07:34:03'),
(2, '9843124452', 'FUND', '', '2013-12-28 07:34:58'),
(3, '9843160507', 'hlth', 'fever', '2013-12-28 10:33:53'),
(4, '9843160507', 'hlth', '1', '2013-12-28 10:35:01'),
(5, '9843160507', 'hlth', 'fever', '2013-12-28 10:38:58'),
(6, '2423', 'dsf', 'saf', '2013-12-28 10:45:41'),
(7, '2423', 'dsf', 'saf', '2013-12-28 10:46:26');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
