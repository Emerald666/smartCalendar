-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 12, 2012 at 08:25 PM
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
-- Table structure for table `userProfiles`
--

CREATE TABLE IF NOT EXISTS `userProfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `emails` varchar(50) NOT NULL,
  `hosts` varchar(200) NOT NULL,
  `webPages` varchar(50) NOT NULL,
  `phoneNumbers` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userProfiles`
--

INSERT INTO `userProfiles` (`id`, `userId`, `name`, `description`, `emails`, `hosts`, `webPages`, `phoneNumbers`) VALUES
(1, 2, 'les lions de l''atals', 'I am gonna make you dance 1234 ssa', 'smartcalendar2012@gmail.com, aminesahibi@gmail.com', 'CISA, Mike Sh-payda, Maude Courcy, Tokyo Thursdays, Tess Pereira, Felicia Pearlman, LOOKOUT, Laura Fraser, McGill SnowJam', 'www.delicious.com', 'what''s up');
