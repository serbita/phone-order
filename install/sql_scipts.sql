-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2011 at 01:20 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phone-order`
--
CREATE DATABASE `phone-order` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phone-order`;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` bigint(20) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `date_created`, `country_id`) VALUES
(1, 'Henry & Ford', 'Illia', '2011-11-27 19:08:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `company_id`, `title`, `description`, `date_created`, `price`) VALUES
(1, 1, 'Fernet Branca Vaso', 'Con hielo', '2011-11-27 19:04:35', 15),
(2, 1, 'Fernet Branca Jarra 1lt', 'Con hielo', '2011-11-27 19:04:35', 40);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) DEFAULT NULL,
  `item_id` bigint(20) DEFAULT NULL,
  `company_id` bigint(20) DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `quantity` double DEFAULT NULL,
  `table` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `item_id`, `company_id`, `date_created`, `status`, `quantity`, `table`) VALUES
(1, 1, 1, '2011-11-27 19:14:09', 'Pending', 2, '4'),
(2, 2, 1, '2011-11-27 19:14:09', 'Delivered', 1, '8-afuera');
