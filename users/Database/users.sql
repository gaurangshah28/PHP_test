-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2024 at 09:38 AM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL,
  `data_file` varchar(50) NOT NULL,
  `city` varchar(60) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `name`, `email`, `password`, `skills`, `data_file`, `city`) VALUES
(1, 'tej', 'tej02@yopmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'php', 'uploads/mysql.docx', 'vadodara'),
(4, 'Harsh', 'harsh02@yopmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'php', 'uploads/laravel1.docx', 'surat'),
(3, 'Rohan', 'rohan02@yopmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'php,on', 'uploads/oops.docx', 'surat'),
(5, 'Niraj', 'niraj02@yopmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'php', 'uploads/php_interview.docx', 'vadodara');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
