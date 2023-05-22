-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 12, 2023 at 12:06 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guestdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `guesttable`
--

CREATE TABLE IF NOT EXISTS `guesttable` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `guestName` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNo` varchar(30) DEFAULT NULL,
  `roomType` varchar(30) DEFAULT NULL,
  `arrivalDate` varchar(30) DEFAULT NULL,
  `departureDate` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `guesttable`
--

INSERT INTO `guesttable` (`id`, `guestName`, `address`, `email`, `phoneNo`, `roomType`, `arrivalDate`, `departureDate`) VALUES
(1, 'Damsara', 'kandy', 'damsara@gmail.com', '0771234567', 'double', '2023-05-12', '2023-05-14'),
(2, 'dilshan', 'colombo', 'dilshan@gmail.com', '0771234568', 'triple', '2023-05-14', '2023-05-24'),
(3, 'isuru', 'jaffna', 'isuru@gmail.com', '0771234569', 'queen', '2023-05-10', '2023-05-31'),
(4, 'yasitha', 'trincomalee', 'yasitha@gmail.com', '0771834569', 'king', '2023-04-04', '2023-04-15'),
(5, 'anuradha', 'puttlam', 'anuradha@gmail.com', '0771831569', 'twin', '2023-03-05', '2023-04-15');
