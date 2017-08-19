-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 19, 2017 at 10:19 AM
-- Server version: 5.6.35
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goggybot`
--

-- --------------------------------------------------------

--
-- Table structure for table `botprogram`
--

CREATE TABLE IF NOT EXISTS `botprogram` (
  `id` int(200) NOT NULL,
  `botask` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `botans` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gogchat`
--

CREATE TABLE IF NOT EXISTS `gogchat` (
  `bname` text COLLATE utf8_unicode_ci NOT NULL,
  `mechat` text COLLATE utf8_unicode_ci NOT NULL,
  `botchat` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_bot`
--

CREATE TABLE IF NOT EXISTS `user_bot` (
  `botuserid` int(255) NOT NULL,
  `botid` int(255) NOT NULL,
  `botname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `botview` int(255) DEFAULT '0',
  `edit` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_id`
--

CREATE TABLE IF NOT EXISTS `user_id` (
  `id` int(255) NOT NULL,
  `username` varchar(767) CHARACTER SET latin1 NOT NULL,
  `password` varchar(1000) CHARACTER SET latin1 NOT NULL,
  `point` int(255) NOT NULL DEFAULT '0',
  `name` text CHARACTER SET latin1 NOT NULL,
  `viewer` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `botprogram`
--
ALTER TABLE `botprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_bot`
--
ALTER TABLE `user_bot`
  ADD PRIMARY KEY (`botid`);

--
-- Indexes for table `user_id`
--
ALTER TABLE `user_id`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `botprogram`
--
ALTER TABLE `botprogram`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_bot`
--
ALTER TABLE `user_bot`
  MODIFY `botid` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_id`
--
ALTER TABLE `user_id`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
