-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 04 apr 2019 om 10:49
-- Serverversie: 10.1.37-MariaDB
-- PHP-versie: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `c3652the_wall`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `fotos`
--

CREATE TABLE `fotos` (
  `Datum` date NOT NULL,
  `user` text NOT NULL,
  `filepath` text NOT NULL,
  `description` text NOT NULL,
  `titel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `fotos`
--

INSERT INTO `fotos` (`Datum`, `user`, `filepath`, `description`, `titel`) VALUES
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '', '', ''),
('0000-00-00', '', '51f6d475f11345c51ee39609401cb3a64b632139_hq (1).jpg', '', ''),
('0000-00-00', '', '330.png', '', ''),
('0000-00-00', '', 'uploads/.330.png', '', ''),
('0000-00-00', '', 'uploads/330.png', '', ''),
('0000-00-00', '', 'uploads/2000px-Playstation_logo_colour.svg.png', '', ''),
('0000-00-00', '', 'uploads/195.jpg', '', ''),
('0000-00-00', '', 'uploads/195.jpg', '', ''),
('0000-00-00', '', 'uploads/195.jpg', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/8131beb7c7c360af683847bcb7d7e508.png', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', ''),
('0000-00-00', '', 'uploads/', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
