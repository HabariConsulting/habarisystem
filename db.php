-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2014 at 11:00 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `time`
--
CREATE DATABASE IF NOT EXISTS `time` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `time`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(512) NOT NULL,
  `email` varchar(256) NOT NULL,
  `p_number` varchar(128) NOT NULL,
  `location` varchar(512) NOT NULL,
  `address` varchar(512) NOT NULL,
  `is_signed` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `contact_person` varchar(512) NOT NULL,
  `person_number` varchar(128) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `name`, `email`, `p_number`, `location`, `address`, `is_signed`, `is_deleted`, `contact_person`, `person_number`, `dated`) VALUES
(3, 'Test', 'ligonoeugene@gmail.com', '+254716482084', 'Nairobi', '1789 Kakamega', 1, 0, 'Ligono Eugene', '+254716482084', '2014-06-08 08:48:34'),
(4, 'Test Add Edit', 'ligonoeugene@gmail.com', '07164820849', 'Shinyalu Edit', '1789 Nairobi', 1, 0, 'Ligs Edit', '07164820847', '2014-06-08 08:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `dep_id` int(11) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(256) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `dep_name`, `rate`, `description`, `is_active`, `is_deleted`) VALUES
(1, 'Web edit', 15500, '<p>Dealing with web stuff</p>\r\n', 1, 0),
(2, 'Design', 10000, 'Design stuff and feel', 1, 0),
(5, 'Test Editing', 17000, '<p>Testing Timesheet system for Habari and editing</p>\r\n', 1, 0),
(6, 'Test 2', 400, '<p>Test of description</p>\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Teachers', 'Teachers'),
(4, 'Students', 'students'),
(5, 'Scientist', 'scientists');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL AUTO_INCREMENT,
  `job_number` varchar(256) NOT NULL,
  `client_id` int(11) NOT NULL,
  `description` varchar(512) NOT NULL,
  `timeline` varchar(256) NOT NULL,
  `retainer` varchar(256) NOT NULL,
  `category` varchar(512) DEFAULT NULL,
  `quote` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`job_id`),
  UNIQUE KEY `job_number` (`job_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_number`, `client_id`, `description`, `timeline`, `retainer`, `category`, `quote`, `is_deleted`, `dated`) VALUES
(1, 'TE-WEB-001', 3, '<p>test</p>\r\n', 'By June 31st 2014', 'No', 'Website', 400000, 0, '2014-06-08 08:35:29'),
(2, 'TE-WEB-002', 3, '<p>test again</p>\r\n', 'By December 31st 2014', 'Yes', '', 1000000, 0, '2014-06-08 08:35:29'),
(3, 'TE-WEB-003', 4, '<p>test</p>\r\n', 'By December 31st 2014', 'Yes', '', 10000, 0, '2014-06-08 08:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `content` text,
  `published` text,
  `post_image` varchar(256) NOT NULL,
  `post_category` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `published`, `post_image`, `post_category`) VALUES
(4, 'The Art of Small Talk', 'I spend 80% on small talk each day. No nutrition whatsoever.	Yap 	yap for every. City Child	We are who we are. It is what it is it is what it is	 oooo hehe																							', '1', '', ''),
(9, 'Content new', 'life Green Ville, carbon footprint way. The way of life									', '1', '', ''),
(10, 'cats', 'are catapult ', '1', '', ''),
(11, 'Whe thigs were simple', 'ada sf sf sf df 						', '1', '', ''),
(12, 'Reggae Wedsday', 'Dj Moh backspace', '1', '', ''),
(13, 'Fashio Killa Scietist', 'Ewe are so stupid		', '1', '', ''),
(14, 'Whos talkig ow', 'Doest look like me at all', '1', '', ''),
(15, 'Where the BB you bought', 'Kombat plus cheza cheza', '0', '', ''),
(16, 'Am gettig dough', 'Thts the soud of ', '1', '', ''),
(17, 'This is a freak show', 'i dot udertad You got a problem', '0', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `sheets`
--

CREATE TABLE IF NOT EXISTS `sheets` (
  `sheet_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `posted_by` varchar(256) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `dated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sheet_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `sheets`
--

INSERT INTO `sheets` (`sheet_id`, `task_id`, `hours`, `posted_by`, `is_deleted`, `dated`) VALUES
(2, 1, 5, 'admin@admin.com', 0, '2014-02-19 16:42:53'),
(8, 1, 3, 'build@habariconsulting.com', 0, '2014-02-19 17:45:24'),
(11, 1, 6, 'build@habariconsulting.com', 0, '2014-02-19 17:46:29'),
(12, 4, 2, 'admin@admin.com', 0, '2014-06-08 10:36:01'),
(13, 4, 1, 'admin@admin.com', 0, '2014-06-08 16:28:48'),
(14, 1, 2, 'admin@admin.com', 0, '2014-06-08 16:29:20'),
(15, 5, 3, 'admin@admin.com', 0, '2014-06-08 16:34:59'),
(16, 8, 7, 'admin@admin.com', 0, '2014-06-09 08:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `brief` varchar(1026) NOT NULL,
  `client` int(11) NOT NULL,
  `assigned` int(11) NOT NULL,
  `posted_by` varchar(256) NOT NULL,
  `deadline` varchar(512) NOT NULL,
  `date_submitted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `brief`, `client`, `assigned`, `posted_by`, `deadline`, `date_submitted`, `is_deleted`, `is_active`) VALUES
(1, 'Test Task', '<p>We need to do bla bla bla here is the list bla bla bla</p>\r\n', 3, 1, 'admin@admin.com', '2014-02-28', '2014-02-19 13:32:49', 0, 1),
(4, 'good', '<p>tets</p>\r\n', 3, 1, 'admin@admin.com', '2014-12-31', '2014-06-08 13:10:16', 0, 0),
(5, 'test', '<p>jhdj</p>\r\n', 2, 1, 'admin@admin.com', '2014-12-31', '2014-06-08 19:30:02', 0, 0),
(6, 'true dat', '<p>jhd</p>\r\n', 3, 5, 'admin@admin.com', '2014-04-17', '2014-06-08 19:31:28', 0, 0),
(7, 'mambo', '<p>hdujd</p>\r\n', 1, 2, 'admin@admin.com', '2014-03-15', '2014-06-08 19:34:41', 0, 0),
(8, 'tryy', '<p>jhdkjld</p>\r\n', 1, 1, 'admin@admin.com', '2014-03-15', '2014-06-09 11:41:51', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(256) NOT NULL DEFAULT 'profile-img.png',
  `user_dep` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `image`, `user_dep`) VALUES
(1, '\0\0', 'administrator', '59beecdf7fc966e2f17fd8f65a4a9aeb09d4a3d4', '9462e8eee0', 'admin@admin.com', '', 'ca3a85710e5886d96aae01f0bfc55a41b81031ed', 1392887219, '9d029802e28cd9c768e8e62277c0df49ec65c48c', 1268889823, 1402390431, 1, 'Admin', 'Habari', 'ADMIN', '+254716482084', 'jacksparrow.jpg', 1),
(2, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'build web', '606098f92baaeaef7da120f6bb34bee9e2a72add', NULL, 'build@habariconsulting.com', NULL, '26810928746b663b7279208d39756f07fc2e9ec0', 1392887256, NULL, 1389687881, 1392831798, 1, 'Build', 'Web', 'Habari High School', '0716482084', 'profile-img.png', 5),
(3, '\0\0\0\0\0\0\0\0\0\0\0\0\0\0\0', 'eugene ligono', '825ec0ed7ff77e79f7db4a16eb36abd0efb8be43', NULL, 'ligonoeugene@gmail.com', NULL, NULL, NULL, NULL, 1392888111, 1402219295, 1, 'Eugene', 'Ligono', 'Habari Consulting', '0716482084', 'profile-img.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(9, 1, 2),
(10, 1, 3),
(11, 1, 4),
(12, 1, 5),
(14, 2, 1),
(15, 2, 2),
(16, 3, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
