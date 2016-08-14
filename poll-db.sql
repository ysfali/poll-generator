-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2016 at 07:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `poll-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `poll-details`
--

CREATE TABLE IF NOT EXISTS `poll-details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `start-time` timestamp NOT NULL,
  `end-time` timestamp NOT NULL,
  `vote-count` int(11) NOT NULL DEFAULT '0',
  `multi-select` tinyint(1) NOT NULL,
  `show-result` tinyint(1) NOT NULL,
  `allow-comment` tinyint(1) NOT NULL,
  `user-id` int(11) NOT NULL,
  `title` text NOT NULL,
  `background-color` text NOT NULL,
  `poll-color` text NOT NULL,
  `title-color` text NOT NULL,
  `num-of-options` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `poll-details`
--

INSERT INTO `poll-details` (`id`, `question`, `start-time`, `end-time`, `vote-count`, `multi-select`, `show-result`, `allow-comment`, `user-id`, `title`, `background-color`, `poll-color`, `title-color`, `num-of-options`) VALUES
(50, 'Who am I?', '2016-08-13 04:38:23', '2016-08-08 04:38:23', 8, 0, 0, 0, 1, 'Quizz', '#009688', '#4caf50', '#00bcd4', 3),
(51, 'is that so', '2016-08-13 05:38:30', '2016-08-14 05:38:30', 77, 1, 1, 0, 1, 'yusuf is handsome', '#757575', '#4caf50', '#009688', 5),
(52, 'What is my name?', '2016-08-13 03:38:56', '2016-08-14 15:38:56', 32, 1, 1, 0, 1, 'My name', 'white', '#9e9e9e', '#a5d6a7', 4),
(53, 'What do you think of this poll?', '2016-08-13 05:38:33', '2016-08-14 17:38:33', 11, 1, 1, 0, 1, 'Best poll ever!', '#ffcdd2', '#000000', '#fff9c4', 4),
(54, 'What do you think of this poll?', '2016-08-13 05:38:24', '2016-08-14 17:38:24', 21, 1, 1, 0, 1, 'Best poll ever!', '#c8e6c9', '#795548', '#bbdefb', 4),
(55, 'What do you think of this poll?', '2016-08-13 20:38:06', '2016-08-15 08:38:06', 26, 1, 1, 0, 3, 'Best poll ever!', '#e0e0e0', '#f44336', '#bbdefb', 4),
(56, 'what should i do to be better', '2016-08-13 20:38:08', '2016-08-15 08:38:08', 12, 0, 1, 0, 3, 'My new poll', '#c8e6c9', '#795548', '#bbdefb', 4);

-- --------------------------------------------------------

--
-- Table structure for table `poll-option-details`
--

CREATE TABLE IF NOT EXISTS `poll-option-details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `option` text NOT NULL,
  `vote-count` int(11) NOT NULL,
  `poll-id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `poll-option-details`
--

INSERT INTO `poll-option-details` (`id`, `option`, `vote-count`, `poll-id`) VALUES
(113, 'Movie', 4, 50),
(114, 'Art', 2, 50),
(115, 'Song', 2, 50),
(116, 'yes', 30, 51),
(117, 'u kidding', 11, 51),
(118, 'no', 15, 51),
(119, 'he is an arse', 8, 51),
(120, 'he is a kid', 13, 51),
(121, 'Yusuf', 7, 52),
(122, 'Ali', 10, 52),
(123, 'I dont have a name', 4, 52),
(124, 'Who cares', 13, 52),
(125, 'Best', 1, 53),
(126, 'Good', 3, 53),
(127, 'Fair', 2, 53),
(128, 'Bad', 5, 53),
(129, 'Best', 13, 54),
(130, 'Good', 5, 54),
(131, 'Fair', 2, 54),
(132, 'Bad', 1, 54),
(133, 'Best', 5, 55),
(134, 'Good', 4, 55),
(135, 'Fair', 4, 55),
(136, 'Bad', 13, 55),
(137, 'game', 1, 56),
(138, 'study', 6, 56),
(139, 'sleep', 3, 56),
(140, 'eat', 2, 56);

-- --------------------------------------------------------

--
-- Table structure for table `user-details`
--

CREATE TABLE IF NOT EXISTS `user-details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user-details`
--

INSERT INTO `user-details` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Yusuf Ali', 'ysfali', 'yusuf@abc.com', 'e73f4885a9d2a7522149d8ac96ae68a9'),
(2, 'User', 'user', 'user@abc.com', '8de73baea6bb0024136ed9f8e3d521d7'),
(3, 'Mohammad Yusuf Ali', 'yusufali', 'myusufali2015@gmail.com', '8f3b75b4bad3af08225926770535ccae'),
(4, 'Mohammad Yusuf Ali', 'yusuf', 'myusufali2015@gmail.com', 'bd89e3bae47080aaf1d8a75e27a97a30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
