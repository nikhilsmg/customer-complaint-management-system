-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2015 at 11:24 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `form_save`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_details`
--

CREATE TABLE IF NOT EXISTS `form_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `depart` varchar(255) NOT NULL,
  `descrip` text NOT NULL,
  `complaint_pass` varchar(100) NOT NULL,
  `update` text NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'unresolved',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `form_details`
--

INSERT INTO `form_details` (`id`, `name`, `email`, `phone`, `depart`, `descrip`, `complaint_pass`, `update`, `status`) VALUES
(12, 'somename', 'jyothiprasadu@gmail.com', '9177882005', 'fishkeeping', 'iqubfijbweg', 'coQvDygka3CgM', 'hello', 'resolved'),
(13, 'No Name', 'this_isemail@ok.com', '1000000000', 'Domain', 'This is desciption', 'coVXwPRFpebt2', 'Updated', 'unresolved'),
(14, 'Name', 'name@mail.com', '1000000007', 'Hosting', 'Description', 'cogt9nx.jpgTo', '', 'unresolved');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
