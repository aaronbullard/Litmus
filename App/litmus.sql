-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2013 at 08:29 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `litmus`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `red` int(11) NOT NULL,
  `green` int(11) NOT NULL,
  `blue` int(11) NOT NULL,
  `alpha` int(11) NOT NULL DEFAULT '0',
  `hex` varchar(7) DEFAULT NULL,
  `palette_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `colors_palette_id_foreign` (`palette_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `red`, `green`, `blue`, `alpha`, `hex`, `palette_id`, `created_at`, `updated_at`) VALUES
(1, 'rgb(1, 1, 1)', 1, 1, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(2, 'rgb(1, 1, 10)', 1, 1, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(3, 'rgb(1, 1, 100)', 1, 1, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(4, 'rgb(1, 10, 1)', 1, 10, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(5, 'rgb(1, 10, 10)', 1, 10, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(6, 'rgb(1, 10, 100)', 1, 10, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(7, 'rgb(1, 100, 1)', 1, 100, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(8, 'rgb(1, 100, 10)', 1, 100, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(9, 'rgb(1, 100, 100)', 1, 100, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(10, 'rgb(10, 1, 1)', 10, 1, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(11, 'rgb(10, 1, 10)', 10, 1, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(12, 'rgb(10, 1, 100)', 10, 1, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(13, 'rgb(10, 10, 1)', 10, 10, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(14, 'rgb(10, 10, 10)', 10, 10, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(15, 'rgb(10, 10, 100)', 10, 10, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(16, 'rgb(10, 100, 1)', 10, 100, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(17, 'rgb(10, 100, 10)', 10, 100, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(18, 'rgb(10, 100, 100)', 10, 100, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(19, 'rgb(100, 1, 1)', 100, 1, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(20, 'rgb(100, 1, 10)', 100, 1, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(21, 'rgb(100, 1, 100)', 100, 1, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(22, 'rgb(100, 10, 1)', 100, 10, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(23, 'rgb(100, 10, 10)', 100, 10, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(24, 'rgb(100, 10, 100)', 100, 10, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(25, 'rgb(100, 100, 1)', 100, 100, 1, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(26, 'rgb(100, 100, 10)', 100, 100, 10, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(27, 'rgb(100, 100, 100)', 100, 100, 100, 0, NULL, 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(28, 'rgb(1, 1, 1)', 1, 1, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(29, 'rgb(1, 1, 10)', 1, 1, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(30, 'rgb(1, 1, 100)', 1, 1, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(31, 'rgb(1, 10, 1)', 1, 10, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(32, 'rgb(1, 10, 10)', 1, 10, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(33, 'rgb(1, 10, 100)', 1, 10, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(34, 'rgb(1, 100, 1)', 1, 100, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(35, 'rgb(1, 100, 10)', 1, 100, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(36, 'rgb(1, 100, 100)', 1, 100, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(37, 'rgb(10, 1, 1)', 10, 1, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(38, 'rgb(10, 1, 10)', 10, 1, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(39, 'rgb(10, 1, 100)', 10, 1, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(40, 'rgb(10, 10, 1)', 10, 10, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(41, 'rgb(10, 10, 10)', 10, 10, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(42, 'rgb(10, 10, 100)', 10, 10, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(43, 'rgb(10, 100, 1)', 10, 100, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(44, 'rgb(10, 100, 10)', 10, 100, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(45, 'rgb(10, 100, 100)', 10, 100, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(46, 'rgb(100, 1, 1)', 100, 1, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(47, 'rgb(100, 1, 10)', 100, 1, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(48, 'rgb(100, 1, 100)', 100, 1, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(49, 'rgb(100, 10, 1)', 100, 10, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(50, 'rgb(100, 10, 10)', 100, 10, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(51, 'rgb(100, 10, 100)', 100, 10, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(52, 'rgb(100, 100, 1)', 100, 100, 1, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(53, 'rgb(100, 100, 10)', 100, 100, 10, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(54, 'rgb(100, 100, 100)', 100, 100, 100, 0, NULL, 2, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(55, 'rgb(1, 1, 1)', 1, 1, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(56, 'rgb(1, 1, 10)', 1, 1, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(57, 'rgb(1, 1, 100)', 1, 1, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(58, 'rgb(1, 10, 1)', 1, 10, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(59, 'rgb(1, 10, 10)', 1, 10, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(60, 'rgb(1, 10, 100)', 1, 10, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(61, 'rgb(1, 100, 1)', 1, 100, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(62, 'rgb(1, 100, 10)', 1, 100, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(63, 'rgb(1, 100, 100)', 1, 100, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(64, 'rgb(10, 1, 1)', 10, 1, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(65, 'rgb(10, 1, 10)', 10, 1, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(66, 'rgb(10, 1, 100)', 10, 1, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(67, 'rgb(10, 10, 1)', 10, 10, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(68, 'rgb(10, 10, 10)', 10, 10, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(69, 'rgb(10, 10, 100)', 10, 10, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(70, 'rgb(10, 100, 1)', 10, 100, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(71, 'rgb(10, 100, 10)', 10, 100, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(72, 'rgb(10, 100, 100)', 10, 100, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(73, 'rgb(100, 1, 1)', 100, 1, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(74, 'rgb(100, 1, 10)', 100, 1, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(75, 'rgb(100, 1, 100)', 100, 1, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(76, 'rgb(100, 10, 1)', 100, 10, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(77, 'rgb(100, 10, 10)', 100, 10, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(78, 'rgb(100, 10, 100)', 100, 10, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(79, 'rgb(100, 100, 1)', 100, 100, 1, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(80, 'rgb(100, 100, 10)', 100, 100, 10, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(81, 'rgb(100, 100, 100)', 100, 100, 100, 0, NULL, 3, '2013-08-15 00:53:24', '2013-08-15 00:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `laravel_migrations`
--

CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laravel_migrations`
--

INSERT INTO `laravel_migrations` (`bundle`, `name`, `batch`) VALUES
('application', '2013_06_20_032917_create_session_table', 1),
('litmus', '2013_08_05_230118_create_users_table', 1),
('litmus', '2013_08_07_032104_create_palettes_table', 1),
('litmus', '2013_08_07_032531_create_colors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `palettes`
--

CREATE TABLE `palettes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` text,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `palettes_title_user_id_unique` (`title`,`user_id`),
  KEY `palettes_user_id_foreign` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `palettes`
--

INSERT INTO `palettes` (`id`, `title`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Revlon''s Palette', 'Collection of colors used in foundation.', 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(2, 'Colgates''s Palette', 'Collection of teeth colors used for teeth whitening programs.', 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(3, 'Clairol''s Palette', 'Collection of colors used for hair dyeing.', 1, '2013-08-15 00:53:24', '2013-08-15 00:53:24');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(2) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `account` varchar(32) DEFAULT NULL,
  `token` varchar(32) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_unique` (`account`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `lastname`, `street`, `city`, `state`, `zipcode`, `phone`, `account`, `token`, `created_at`, `updated_at`) VALUES
(1, 'jabullard@aol.com', 'James', 'Bullard', '7027 Williamsburg Blvd', 'Arlington', 'VA', 22213, '9107996952', 'a8ccd1d9c62d4ceddf1939f6407cb3b7', '973324ef8bb9ee932e33185e9e136a84', '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(2, 'abullard@viimed.com', 'James', 'Bullard', '3911 Appleton Way', 'Wilmington', 'NC', 28412, '9107996952', '6c16ce431b89130cd360b8da941342a5', '973324ef8bb9ee932e33185e9e136a84', '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(3, 'aaron.bullard77@gmail.com', 'James', 'Bullard', '1441 Rhode Island Ave., NW Apt 209', 'Washington', 'DC', 20005, '9107996952', '1280f8a20be0d832617847f38ed9291d', '973324ef8bb9ee932e33185e9e136a84', '2013-08-15 00:53:24', '2013-08-15 00:53:24'),
(4, 'abullard@viinetwork.net', 'Jim', 'Ballard', '2392 Road St.', 'Washington', 'DC', 20007, '2026077909', '0627f0d30e97e9c1d87879f5dd3276e5', '828ebb330ead404864ace9c56ad795fe', '2013-08-16 01:12:16', '2013-08-16 01:12:16');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_palette_id_foreign` FOREIGN KEY (`palette_id`) REFERENCES `palettes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `palettes`
--
ALTER TABLE `palettes`
  ADD CONSTRAINT `palettes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
