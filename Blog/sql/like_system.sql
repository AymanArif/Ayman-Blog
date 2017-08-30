-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2014 at 06:13 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `like_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item`) VALUES
(1, 'Genteel women suppose that those things do not really exist about which it is impossible to talk in polite company. '),
(2, 'Behind all their personal vanity women themselves always have an impersonal contempt for woman.'),
(3, 'Ah women. They make the highs higher and the lows more frequent.'),
(4, 'Women are considered deep - why? Because one can never discover any bottom to them. Women are not even shallow.'),
(5, 'There is more wisdom in your body than in your deepest philosophy.'),
(6, 'Does wisdom perhaps appear on the earth as a raven which is inspired by the smell of carrion?'),
(7, 'There are various eyes. Even the Sphinx has eyes: and as a result there are various truths and as a result there is no truth.'),
(8, 'Mystical explanations are thought to be deep the truth is that they are not even shallow.'),
(9, 'In the consciousness of the truth he has perceived man now sees everywhere only the awfulness or the absurdity of existence and loathing seizes him.'),
(10, 'Words are but symbols for the relations of things to one another and to us nowhere do they touch upon absolute truth.');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `user_id` int(12) NOT NULL AUTO_INCREMENT,
  `ip` varchar(40) CHARACTER SET latin1 NOT NULL,
  `item_id` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
