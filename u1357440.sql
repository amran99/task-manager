-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2016 at 12:48 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1-log
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u1357440`
--

-- --------------------------------------------------------

--
-- Table structure for table `invites`
--

CREATE TABLE IF NOT EXISTS `invites` (
  `invite_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`invite_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`project_id`, `project_name`, `user_id`) VALUES
(2, 'Test Project 1', '1,2,3'),
(3, 'DatabaseProject3', '2,1'),
(4, 'DatabaseProject4', '2'),
(7, 'test project', '1'),
(8, 'ict', '1'),
(12, 'the', '3'),
(13, 'bob', '1'),
(14, 'bob', '4'),
(16, 'mb', '5'),
(17, 'jgfj', '5');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `task_start` date NOT NULL,
  `task_finish` date NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `project_id` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=117 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `task_description`, `task_start`, `task_finish`, `task_status`, `project_id`) VALUES
(3, 'Update test', 'checking if it works properly', '2016-03-07', '2016-04-11', 'to review', 2),
(4, 'Insert data into database table2', 'click on insert to add data', '2016-03-07', '2016-03-21', 'started', 2),
(5, 'Create database table3', 'step one and do this and that', '2016-03-07', '2016-03-21', 'started', 3),
(6, 'Insert data into database table3', 'click on insert to add data', '2016-03-07', '2016-03-21', 'not started', 3),
(8, 'Add columns', 'Add columns on tasks page to see in order of status', '2016-03-21', '2016-03-31', 'started', 2),
(9, 'Add columns', 'Add columns on tasks page to see in order of status', '2016-03-21', '2016-03-31', 'started', 3),
(93, 'first task', 'this is the first task in database project 4', '2016-03-31', '2016-04-05', 'started', 4),
(114, 'hello', 'time check', '2016-04-06', '2016-04-21', 'finished', 2),
(116, 'Test functionaility', 'Check if it all works', '2016-04-07', '2016-04-22', 'not started', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` int(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `type`, `first_name`, `last_name`) VALUES
(1, 'amran@aaa.com', '12345678', 1, 'Amran', 'Ali'),
(2, 'safraz@aaa.com', '87654321', 0, 'Muhammad', 'Safraz'),
(3, 'tom@hotmail.co.uk', 'qqqqq', 0, 'tommy', 'tom'),
(4, 'lol@hotmail.co.uk', 'saffy', 0, 'lol', 'lol'),
(5, 'saff@hotmail.com', '123456', 0, 'mohammad', 'sarfraz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
