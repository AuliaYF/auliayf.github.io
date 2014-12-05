-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2014 at 11:18 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scratch`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `short` varchar(255) NOT NULL,
  `header_background` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `desc`, `short`, `header_background`) VALUES
(1, 'DotA', 'discuss about Defense of the Ancients', 'dota', '#2196f3');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `title`) VALUES
(1, 'Administrator'),
(2, 'Moderator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `starter` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `starter` (`starter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `category_id`, `title`, `short`, `date_created`, `date_modified`, `starter`) VALUES
(1, 1, 'techies', 'techies', '2014-11-30 09:00:00', '2014-11-30 09:00:00', 1),
(4, 1, 'asdf', 'asdf', '2014-11-30 19:31:58', '2014-11-30 19:31:58', 1),
(5, 1, 'yolo', 'yolo', '2014-11-30 19:32:44', '2014-11-30 19:32:44', 1),
(6, 1, 'helo', 'helo', '2014-11-30 19:35:12', '2014-11-30 19:35:12', 1),
(7, 1, 'test bbcode', 'test-bbcode', '2014-11-30 20:18:57', '2014-11-30 20:18:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic_replies`
--

CREATE TABLE IF NOT EXISTS `topic_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `starter` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `starter` (`starter`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `topic_replies`
--

INSERT INTO `topic_replies` (`id`, `topic_id`, `content`, `date_created`, `date_modified`, `starter`) VALUES
(1, 1, 'techies is the best', '2014-11-30 09:00:00', '2014-11-30 09:00:00', 1),
(2, 1, '<blockquote><p>techies is the best</p><footer>by. <a href="#">AuliaYF</a></footer></blockquote> yeah i know.', '2014-11-30 10:00:00', '2014-11-30 10:00:00', 1),
(3, 4, 'asdf', '2014-11-30 19:31:58', '2014-11-30 19:31:58', 1),
(4, 5, 'yolo', '2014-11-30 19:32:44', '2014-11-30 19:32:44', 1),
(5, 6, 'helo', '2014-11-30 19:35:12', '2014-11-30 19:35:12', 1),
(6, 7, '[center]test[/center]\r\n[q=AUTHOR]halo[/q]', '2014-11-30 20:18:57', '2014-11-30 20:18:57', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `level` (`level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'AuliaYF', 'DdtJnarvgY3g//4PiDW+2NxRTouyEUcoTxFGT22/zrkthGu9fDRywqBCiUFCJOZzCGtCxe30wV7YRJvDIZqTug==', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE IF NOT EXISTS `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name_first` varchar(25) NOT NULL,
  `name_last` varchar(25) NOT NULL,
  `header_background` varchar(7) NOT NULL,
  `welcome_title` varchar(255) NOT NULL,
  `welcome_content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `email`, `name_first`, `name_last`, `header_background`, `welcome_title`, `welcome_content`) VALUES
(1, 1, 'auliayf@gmail.com', 'Aulia Yusuf', 'Fachrezy', '#3452cb', 'Welcome noobs!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`starter`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `topic_replies`
--
ALTER TABLE `topic_replies`
  ADD CONSTRAINT `topic_replies_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topic_replies_ibfk_2` FOREIGN KEY (`starter`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
