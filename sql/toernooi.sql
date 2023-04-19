-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 21 jun 2022 om 01:25
-- Serverversie: 10.4.6-MariaDB
-- PHP-versie: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toernooi`
--

-- --------------------------------------------------------
-- creëer database
--
CREATE DATABASE IF NOT EXISTS `toernooi`;

--
-- Selecteer database
--
USE toernooi;

--
-- Tabelstructuur voor tabel `aanmelding`
--
CREATE TABLE `aanmelding` (
  `aanmeldingsID` int(11) NOT NULL,
  `spelerID` int(11) DEFAULT NULL,
  `toernooiID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `aanmelding`
--

INSERT INTO `aanmelding` (`aanmeldingsID`, `spelerID`, `toernooiID`) VALUES
(11, 2, 3),
(12, 12, 3),
(14, 12, 1),
(15, 12, 1),
(16, 1, 4),
(17, 1, 1),
(18, 1, 4),
(19, 1, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `scholen`
--

CREATE TABLE `scholen` (
  `schoolID` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `scholen`
--

INSERT INTO `scholen` (`schoolID`, `naam`) VALUES
(1, 'Albeda College'),
(2, 'Da Vinci College'),
(3, 'Drenthe College'),
(13, 'Graafschap College'),
(14, 'Katholiek Onderwijs Amsterdam'),
(15, 'Rijn Ijssel College'),
(16, 'ROC de Leijgraaf'),
(17, 'ROC Horizon College'),
(18, 'ROC ID College'),
(19, 'ROC Midden Nederland'),
(20, 'ROC TOP');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `spelers`
--

CREATE TABLE `spelers` (
  `spelerID` int(11) NOT NULL,
  `voornaam` varchar(255) NOT NULL,
  `tussenvoegsel` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) NOT NULL,
  `schoolID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `spelers`
--

INSERT INTO `spelers` (`spelerID`, `voornaam`, `tussenvoegsel`, `achternaam`, `schoolID`) VALUES
(1, 'Jasper', '', 'Aalbers', 1),
(2, 'Erik', '', 'Aalten', 1),
(12, 'Anne', '', 'Aalten', 1),
(13, 'Remco', 'de', 'Abdi', 3),
(14, 'Christiaan', 'te', 'Abdullah', 15),
(15, 'Dineke', '', 'Aben', 1),
(16, 'Martijn', '', 'Abrahamse', 1),
(17, 'Sven', '', 'Abrahamse', 1),
(18, 'Bas', '', 'Achterberg', 1),
(19, 'Jeroen', 'de', 'Adams', 15),
(20, 'Bert Jan', 'van', 'Adams', 15),
(21, 'Jaap', '', 'Adel', 1),
(22, 'Gijs', '', 'Adriaanse', 1),
(23, 'Ferrie', '', 'Aerts', 1),
(24, 'Ahmad', '', 'Afantrous', 1),
(26, 'Huib', '', 'Aggelen', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `toernooien`
--

CREATE TABLE `toernooien` (
  `toernooiID` int(11) NOT NULL,
  `omschrijving` varchar(255) DEFAULT NULL,
  `datum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `toernooien`
--

INSERT INTO `toernooien` (`toernooiID`, `omschrijving`, `datum`) VALUES
(1, 'Wintertoernooi', '2023-10-29'),
(3, 'Voorjaarstoernooi', '2022-10-09'),
(4, 'Zomerbal', '2023-02-28');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `wedstrijd`
--

CREATE TABLE `wedstrijd` (
  `wedstrijdsID` int(11) NOT NULL,
  `toernooiID` int(11) DEFAULT NULL,
  `ronde` int(11) NOT NULL,
  `speler1ID` int(11) DEFAULT NULL,
  `speler2ID` int(11) DEFAULT NULL,
  `score1` int(11) DEFAULT NULL,
  `score2` int(11) DEFAULT NULL,
  `winnaarsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `wedstrijd`
--

INSERT INTO `wedstrijd` (`wedstrijdsID`, `toernooiID`, `ronde`, `speler1ID`, `speler2ID`, `score1`, `score2`, `winnaarsID`) VALUES
(5, 3, 2, 12, 14, 4, 5, 12),
(6, 4, 4, 13, 12, 3, 1, 13),
(7, 1, 2, 1, 2, 4, 5, 2),
(8, 3, 1, 13, 14, 6, 1, 13),
(9, 1, 1, 19, 23, 2, 1, 19),
(10, 1, 1, 26, 24, 3, 4, 24),
(11, 4, 4, 13, 13, 4, 5, 13),
(12, 4, 4, 13, 13, 4, 5, 13),
(13, 4, 4, 13, 13, 4, 5, 13),
(14, 1, 6, 1, 1, 3, 3, 1),
(15, 1, 9, 26, 24, 9, 8, 26);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  ADD PRIMARY KEY (`aanmeldingsID`),
  ADD KEY `spelerID` (`spelerID`),
  ADD KEY `toernooiID` (`toernooiID`);

--
-- Indexen voor tabel `scholen`
--
ALTER TABLE `scholen`
  ADD PRIMARY KEY (`schoolID`);

--
-- Indexen voor tabel `spelers`
--
ALTER TABLE `spelers`
  ADD PRIMARY KEY (`spelerID`),
  ADD KEY `schoolID` (`schoolID`);

--
-- Indexen voor tabel `toernooien`
--
ALTER TABLE `toernooien`
  ADD PRIMARY KEY (`toernooiID`);

--
-- Indexen voor tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  ADD PRIMARY KEY (`wedstrijdsID`),
  ADD KEY `toernooiID` (`toernooiID`),
  ADD KEY `speler1ID` (`speler1ID`),
  ADD KEY `speler2ID` (`speler2ID`),
  ADD KEY `winnaarsID` (`winnaarsID`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  MODIFY `aanmeldingsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT voor een tabel `scholen`
--
ALTER TABLE `scholen`
  MODIFY `schoolID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `spelers`
--
ALTER TABLE `spelers`
  MODIFY `spelerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT voor een tabel `toernooien`
--
ALTER TABLE `toernooien`
  MODIFY `toernooiID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  MODIFY `wedstrijdsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `aanmelding`
--
ALTER TABLE `aanmelding`
  ADD CONSTRAINT `aanmelding_ibfk_1` FOREIGN KEY (`spelerID`) REFERENCES `spelers` (`spelerID`),
  ADD CONSTRAINT `aanmelding_ibfk_2` FOREIGN KEY (`toernooiID`) REFERENCES `toernooien` (`toernooiID`);

--
-- Beperkingen voor tabel `spelers`
--
ALTER TABLE `spelers`
  ADD CONSTRAINT `spelers_ibfk_1` FOREIGN KEY (`schoolID`) REFERENCES `scholen` (`schoolID`);

--
-- Beperkingen voor tabel `wedstrijd`
--
ALTER TABLE `wedstrijd`
  ADD CONSTRAINT `wedstrijd_ibfk_1` FOREIGN KEY (`toernooiID`) REFERENCES `toernooien` (`toernooiID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wedstrijd_ibfk_2` FOREIGN KEY (`speler1ID`) REFERENCES `spelers` (`spelerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wedstrijd_ibfk_3` FOREIGN KEY (`speler2ID`) REFERENCES `spelers` (`spelerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `wedstrijd_ibfk_4` FOREIGN KEY (`winnaarsID`) REFERENCES `spelers` (`spelerID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
