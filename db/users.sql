-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 02. Jun 2014 um 07:01
-- Server Version: 5.5.37-0ubuntu0.14.04.1-log
-- PHP-Version: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `insecurity`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `insecurity_users`
--

CREATE TABLE IF NOT EXISTS `insecurity_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `insecurity_users`
--

INSERT INTO `insecurity_users` (`id`, `name`, `email`, `password`, `admin`) VALUES
(1, 'John Doe', 'admin@example.com', '12345678', 1),
(2, 'Jerry Doe', 'user@example.com', 'asdfqwer', 0),
(3, 'Jane Doe', 'jane@example.com', 'yxcvbnm', 1),
(4, 'Cathy Doe', 'cathy@example.com', 'uiopmnbv', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
