-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 11:34 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `egzamin_probny`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cennik`
--

CREATE TABLE `cennik` (
  `id` int(11) NOT NULL,
  `miejscowosc_id` int(11) NOT NULL,
  `rodzaj_id` int(11) NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cennik`
--

INSERT INTO `cennik` (`id`, `miejscowosc_id`, `rodzaj_id`, `cena`) VALUES
(1, 3, 2, 200),
(2, 5, 4, 150),
(3, 2, 1, 225),
(4, 8, 5, 89),
(5, 4, 3, 140),
(6, 1, 1, 250),
(7, 2, 1, 170),
(8, 2, 6, 120),
(9, 7, 2, 300),
(10, 6, 4, 140),
(11, 1, 3, 190),
(12, 2, 2, 500),
(13, 3, 6, 70),
(14, 8, 3, 70),
(15, 5, 2, 170);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejscowosc`
--

CREATE TABLE `miejscowosc` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miejscowosc`
--

INSERT INTO `miejscowosc` (`id`, `nazwa`) VALUES
(1, 'Rewal'),
(2, 'Sopot'),
(3, 'Ustka'),
(4, 'Jastarnia'),
(5, 'Malbork'),
(6, 'Zakopane'),
(7, 'Karpacz'),
(8, 'Cisna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj`
--

CREATE TABLE `rodzaj` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rodzaj`
--

INSERT INTO `rodzaj` (`id`, `nazwa`) VALUES
(1, 'apartament'),
(2, 'hotel'),
(3, 'pensjonat'),
(4, 'kwatera prywatna'),
(5, 'agroturystyka'),
(6, 'domek kempingowy');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cennik`
--
ALTER TABLE `cennik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `miejscowosc_id` (`miejscowosc_id`),
  ADD KEY `rodzaj_id` (`rodzaj_id`);

--
-- Indeksy dla tabeli `miejscowosc`
--
ALTER TABLE `miejscowosc`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rodzaj`
--
ALTER TABLE `rodzaj`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cennik`
--
ALTER TABLE `cennik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `miejscowosc`
--
ALTER TABLE `miejscowosc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rodzaj`
--
ALTER TABLE `rodzaj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cennik`
--
ALTER TABLE `cennik`
  ADD CONSTRAINT `cennik_ibfk_1` FOREIGN KEY (`miejscowosc_id`) REFERENCES `miejscowosc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cennik_ibfk_2` FOREIGN KEY (`rodzaj_id`) REFERENCES `rodzaj` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
