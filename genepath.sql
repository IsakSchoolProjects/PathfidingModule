-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 03 dec 2021 kl 11:38
-- Serverversion: 10.4.20-MariaDB
-- PHP-version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `emila_genepath`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(128) NOT NULL,
  `world_id` int(11) NOT NULL,
  `exits` varchar(2048) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `world_id`, `exits`, `date_created`, `cost`) VALUES
(1, 'isakskingyolo', 0, '1,2,3', '2021-12-03 10:25:44', 0),
(2, 'emilyoloswag', 1, '0,1,2,3,4', '2021-12-03 10:34:45', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `worlds`
--

CREATE TABLE `worlds` (
  `id` int(11) NOT NULL,
  `world_name` varchar(16) NOT NULL,
  `world_type` varchar(12) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `worlds`
--

INSERT INTO `worlds` (`id`, `world_name`, `world_type`, `date_created`) VALUES
(1, 'ghada', 'string', '2021-12-03 10:33:18');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `worlds`
--
ALTER TABLE `worlds`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `worlds`
--
ALTER TABLE `worlds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
