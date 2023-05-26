-- phpMyAdmin SQL 
-- version 1.0.0
-- https://www.phpmyadmin.net

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_shop`
--

CREATE TABLE IF NOT EXISTS `tbl_shop` (
  `id` int(0) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

--
-- Dumping data for table `tbl_shop`
--

INSERT INTO `tbl_shop` (`id`, `title`, `price`) VALUES
(1, 'Чебурек с мясом - маленький', '60 руб.'),
(2, 'Чебурек с мясом - средний', '85 руб.');