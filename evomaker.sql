-- phpMyAdmin SQL Dump
-- version 2.11.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2008 at 02:05 PM
-- Server version: 4.1.9
-- PHP Version: 4.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `evomaker`
--

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(5) NOT NULL auto_increment,
  `module_name` varchar(40) collate utf8_turkish_ci NOT NULL default '',
  `module_title` varchar(40) collate utf8_turkish_ci NOT NULL default '',
  `module_type` varchar(40) collate utf8_turkish_ci NOT NULL default '',
  `active` int(1) NOT NULL default '1',
  PRIMARY KEY  (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`, `module_title`, `module_type`, `active`) VALUES
(1, 'newdataset', 'New Dataset', 'admin,user', 1),
(2, 'useradd', 'Add User', 'admin', 1),
(3, 'editdataset', 'Edit  Dataset', 'admin,user', 1),
(4, 'rundataset', 'Run Dataset', 'admin,user', 1),
(5, 'viewlog', 'View Logs', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session` varchar(32) collate utf8_turkish_ci NOT NULL default '',
  `user_id` int(11) NOT NULL default '0',
  `user_name` varchar(15) collate utf8_turkish_ci NOT NULL default '',
  PRIMARY KEY  (`session`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session`, `user_id`, `user_name`) VALUES
('28d648f3fb524a5e3d8db3ad8593b110', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(15) collate utf8_turkish_ci NOT NULL default '',
  `user_pass` varchar(15) collate utf8_turkish_ci NOT NULL default '',
  `name` varchar(30) collate utf8_turkish_ci NOT NULL default '',
  `surname` varchar(30) collate utf8_turkish_ci NOT NULL default '',
  `email` varchar(100) collate utf8_turkish_ci NOT NULL default '',
  `type` varchar(10) collate utf8_turkish_ci NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `name`, `surname`, `email`, `type`) VALUES
(1, 'admin', 'test', 'Bahadyr', 'Altynta?', 'altintas_b@ibu.edu.tr', 'admin'),
(2, 'test', 'test', 'test', 'test', 'test', 'user');
