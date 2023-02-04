-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 04 feb 2023 om 14:58
-- Serverversie: 5.7.36
-- PHP-versie: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maakzelfjepizza`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pizza`
--

DROP TABLE IF EXISTS `pizza`;
CREATE TABLE IF NOT EXISTS `pizza` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Bodemformaat` varchar(15) NOT NULL,
  `Saus` varchar(25) NOT NULL,
  `Pizzatoppings` varchar(25) NOT NULL,
  `Peterselie` varchar(15) DEFAULT NULL,
  `Oregano` varchar(15) DEFAULT NULL,
  `Chiliflakes` varchar(15) DEFAULT NULL,
  `ZwartePeper` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pizza`
--

INSERT INTO `pizza` (`Id`, `Bodemformaat`, `Saus`, `Pizzatoppings`, `Peterselie`, `Oregano`, `Chiliflakes`, `ZwartePeper`) VALUES
(41, '20 centimeter', 'extraTomatensaus', 'vlees', 'nee', 'ja', 'ja', 'nee'),
(40, '20 centimeter', 'bbqsaus', 'vlees', 'ja', 'nee', 'ja', 'nee'),
(39, '40 centimeter', 'spicyTomatensaus', 'vlees', NULL, NULL, NULL, NULL),
(38, '40 centimeter', 'spicyTomatensaus', 'vlees', NULL, NULL, NULL, NULL),
(37, '40 centimeter', 'spicyTomatensaus', 'vlees', NULL, NULL, NULL, NULL),
(36, '25 centimeter', 'bbqsaus', 'vlees', 'ja', NULL, NULL, 'ja'),
(35, '40 centimeter', 'extraTomatensaus', 'vlees', 'ja', NULL, NULL, 'ja'),
(34, '30 centimeter', 'crémeFraiche', 'vlees', 'ja', 'ja', NULL, NULL),
(31, '25 centimeter', 'spicyTomatensaus', 'vlees', 'ja', NULL, NULL, NULL),
(43, '35 centimeter', 'spicyTomatensaus', 'vegatarisch', 'ja', 'nee', 'ja', 'ja'),
(24, '40 centimeter', 'tomatensaus', 'vegan', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
