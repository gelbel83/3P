-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 09 Sty 2026, 09:36
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `wyprawy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `id_klienta` int(10) UNSIGNED NOT NULL,
  `imie` varchar(20) DEFAULT NULL,
  `nazwisko` varchar(40) DEFAULT NULL,
  `data_ur` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsca`
--

CREATE TABLE `miejsca` (
  `id_miejsca` int(10) UNSIGNED NOT NULL,
  `nazwa` varchar(40) NOT NULL,
  `link_obraz` varchar(40) DEFAULT NULL,
  `cena` decimal(20,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `miejsca`
--

INSERT INTO `miejsca` (`id_miejsca`, `nazwa`, `link_obraz`, `cena`) VALUES
(1, 'Malbork', '01.jpg', '2000.00'),
(2, 'Gdańsk', '02.jpg', '2100.00'),
(3, 'Gdynia', '03.jpg', '3250.00'),
(4, 'Rzym', '04.jpg', '5200.00'),
(5, 'Wenecja', '05.jpg', '4800.00'),
(6, 'Oslo', '06.jpg', '6300.00'),
(7, 'Paryż', '07.jpg', '1750.00'),
(8, 'Londyn', '08.jpg', '1550.00'),
(9, 'Olsztyn', '09.jpg', '660.00'),
(10, 'Wiedeń', '10.jpg', '2530.00'),
(11, 'Moskwa', '11.jpg', '12000.00'),
(12, 'Mielno', '12.jpg', '4530.00'),
(13, 'Trogir', '13.jpg', '6200.00'),
(14, 'Brno', '14.jpg', '4530.00'),
(15, 'Hamburg', '15.jpg', '5600.00'),
(16, 'Kijów', '16.jpg', '7830.00'),
(17, 'Warszawa', '17.jpg', '1280.00'),
(18, 'Bruksela', '18.jpg', '2930.00'),
(19, 'Nowa Wieś', '19.jpg', '1600.00'),
(20, 'Tokio', '20.jpg', '22530.00'),
(21, 'Poznań', '21.jpg', '1200.00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wycieczki`
--

CREATE TABLE `wycieczki` (
  `id_wcieczki` int(10) UNSIGNED NOT NULL,
  `id_miejsca` int(10) UNSIGNED NOT NULL,
  `liczba_doroslych` int(10) UNSIGNED NOT NULL,
  `liczba_dzieci` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `wycieczki`
--

INSERT INTO `wycieczki` (`id_wcieczki`, `id_miejsca`, `liczba_doroslych`, `liczba_dzieci`) VALUES
(1, 2, 2, 2),
(2, 1, 6, 12),
(3, 7, 12, 3),
(4, 17, 2, 0),
(5, 7, 2, 3),
(6, 11, 2, 2),
(7, 12, 5, 3),
(8, 9, 2, 5),
(9, 7, 10, 10),
(10, 8, 2, 2),
(11, 5, 5, 3),
(12, 15, 2, 1),
(13, 4, 7, 3),
(14, 4, 22, 10),
(15, 13, 6, 3),
(16, 20, 2, 1),
(17, 7, 2, 3),
(18, 11, 2, 2),
(19, 12, 5, 3),
(20, 9, 2, 5),
(21, 7, 10, 10),
(22, 15, 2, 1),
(23, 4, 7, 3),
(24, 4, 22, 10),
(25, 3, 2, 2),
(26, 15, 5, 3),
(27, 13, 6, 3),
(28, 20, 2, 1),
(29, 15, 2, 3),
(30, 11, 2, 2),
(31, 12, 5, 3),
(32, 9, 2, 5),
(33, 7, 12, 13),
(34, 1, 2, 1),
(35, 14, 5, 3),
(36, 4, 22, 10),
(37, 3, 2, 2),
(38, 13, 4, 3),
(39, 13, 6, 3),
(40, 21, 2, 3),
(41, 7, 2, 3),
(42, 11, 2, 2),
(43, 11, 5, 3),
(44, 9, 2, 5),
(45, 7, 10, 10),
(46, 15, 5, 1),
(47, 4, 7, 3),
(48, 3, 21, 10),
(49, 3, 2, 2),
(50, 11, 5, 3),
(51, 11, 6, 3),
(52, 21, 2, 7);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`id_klienta`);

--
-- Indeksy dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  ADD PRIMARY KEY (`id_miejsca`);

--
-- Indeksy dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  ADD PRIMARY KEY (`id_wcieczki`),
  ADD KEY `id_miejsca` (`id_miejsca`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klienci`
--
ALTER TABLE `klienci`
  MODIFY `id_klienta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  MODIFY `id_miejsca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  MODIFY `id_wcieczki` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `wycieczki`
--
ALTER TABLE `wycieczki`
  ADD CONSTRAINT `wycieczki_ibfk_1` FOREIGN KEY (`id_miejsca`) REFERENCES `miejsca` (`id_miejsca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
