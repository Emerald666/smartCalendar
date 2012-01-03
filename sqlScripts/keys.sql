-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 02, 2012 at 08:24 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.11

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(35) NOT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`,`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `key`, `name`) VALUES
(1, '7139', 'amine');
