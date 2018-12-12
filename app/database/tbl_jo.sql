-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2018 at 09:02 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpslim_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jo`
--

DROP TABLE IF EXISTS `tbl_jo`;
CREATE TABLE IF NOT EXISTS `tbl_jo` (
  `id` int(11) NOT NULL,
  `requestor` varchar(30) NOT NULL,
  `comment` varchar(300) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jo`
--

INSERT INTO `tbl_jo` (`id`, `requestor`, `comment`, `date`) VALUES
(1, 'fname', 'asdasdasdasd', '2018-12-13 00:00:00'),
(2, 'fname', 'asdsadasdasdad', '2018-12-12 00:00:00'),
(3, 'lname', 'asdasdasdasdsad', '2018-12-09 00:00:00'),
(4, 'asdasd', 'asdasda', '2018-12-09 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
