-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Nov 25. 20:46
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `raktarak`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `aru`
--

CREATE TABLE `aru` (
  `cikkszam` int(5) NOT NULL,
  `egysegar` int(6) NOT NULL,
  `anev` varchar(100) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `kkod` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `aru`
--

INSERT INTO `aru` (`cikkszam`, `egysegar`, `anev`, `kkod`) VALUES
(10101, 200, 'Kenyér', 1),
(11111, 320, 'Coca Cola', 1),
(12345, 300, 'Oreo keksz ', 1),
(18932, 11000, 'Mellény', 4),
(20074, 100000, 'Okosóra', 2),
(23609, 96000, 'TV', 2),
(23849, 79000, 'Hangfal', 2),
(24631, 110, 'Fánk', 1),
(25719, 350000, 'Számítógép', 2),
(27173, 7000, 'Fejhallgató', 2),
(28392, 90, 'Joghurt', 1),
(28641, 73500, 'Fényképezőgép', 2),
(29876, 200000, 'Mobiltelefon', 2),
(38294, 78000, 'Futópad', 5),
(39266, 99000, 'Kerékpár', 5),
(50007, 3900, 'Játékbaba', 3),
(54321, 360, 'Haribo gumicukor', 1),
(56789, 6000, 'Lego', 3),
(59210, 2100, 'Játékautó', 3),
(59612, 3500, 'Puzzle', 3),
(59990, 310, 'Lays chips', 1),
(60008, 27000, 'Csocsó asztal', 3),
(61153, 11000, 'Cipő', 4),
(61239, 12000, 'Csúszda', 3),
(65598, 4500, 'Póló', 4),
(66240, 1700, 'Sapka', 4),
(69652, 9000, 'Pulóver', 4),
(72900, 17000, 'Kabát', 4),
(74310, 430, 'Trapista sajt', 1),
(83819, 16500, 'Dzseki', 4),
(84285, 21000, 'Roller', 5),
(84612, 8000, 'Farmer nadrág', 4),
(92514, 400, 'Párizsi ', 1),
(93940, 14000, 'Súlyzó', 5);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `arukategoria`
--

CREATE TABLE `arukategoria` (
  `kkod` int(3) NOT NULL,
  `leiras` varchar(50) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `arukategoria`
--

INSERT INTO `arukategoria` (`kkod`, `leiras`) VALUES
(1, 'Élelmiszer'),
(2, 'Műszaki cikk'),
(3, 'Játék'),
(4, 'Ruházat'),
(5, 'Sport és fitness');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `beszallito`
--

CREATE TABLE `beszallito` (
  `bkod` int(3) NOT NULL,
  `bnev` varchar(50) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `beszallito`
--

INSERT INTO `beszallito` (`bkod`, `bnev`) VALUES
(1, 'Erős Pista'),
(2, 'Vékony András'),
(3, 'Jakab Károly'),
(4, 'Földes Béla'),
(5, 'Német Ferenc'),
(6, 'Kiss Milán'),
(7, 'Lajos Lajos'),
(8, 'Patyi Margit'),
(9, 'Orbán Lőrinc'),
(10, 'Ardai Aliz');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `beszerzes`
--

CREATE TABLE `beszerzes` (
  `cikkszam` int(5) DEFAULT NULL,
  `rkod` int(2) DEFAULT NULL,
  `bkod` int(3) DEFAULT NULL,
  `mennyiseg` int(100) NOT NULL,
  `sorszam` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `beszerzes`
--

INSERT INTO `beszerzes` (`cikkszam`, `rkod`, `bkod`, `mennyiseg`, `sorszam`) VALUES
(84612, 5, 7, 10, 1),
(74310, 1, 5, 200, 2),
(74310, 1, 4, 525, 3),
(92514, 4, 1, 420, 4),
(24631, 3, 10, 400, 5),
(54321, 3, 9, 1000, 6),
(93940, 3, 8, 2, 7),
(11111, 1, 1, 10, 8),
(50007, 5, 2, 13, 9),
(59612, 2, 8, 29, 10);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `eladas`
--

CREATE TABLE `eladas` (
  `cikkszam` int(5) DEFAULT NULL,
  `rkod` int(2) DEFAULT NULL,
  `mennyiseg` int(100) NOT NULL,
  `sorszam` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `eladas`
--

INSERT INTO `eladas` (`cikkszam`, `rkod`, `mennyiseg`, `sorszam`) VALUES
(61239, 2, 2, 1),
(59990, 1, 64, 2),
(93940, 4, 1, 3),
(83819, 2, 2, 4),
(74310, 1, 72, 5),
(60008, 5, 1, 6),
(10101, 2, 3, 7),
(61153, 1, 3, 8),
(10101, 2, 42, 9),
(25719, 4, 2, 10),
(28392, 5, 67, 11),
(84612, 3, 7, 12),
(84612, 3, 1, 13),
(66240, 1, 8, 14),
(10101, 2, 6, 15),
(92514, 4, 98, 16),
(20074, 2, 1, 17),
(72900, 3, 4, 18),
(54321, 1, 22, 19),
(23849, 5, 4, 20);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `keszleten`
--

CREATE TABLE `keszleten` (
  `cikkszam` int(5) DEFAULT NULL,
  `rkod` int(2) DEFAULT NULL,
  `mennyiseg` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `keszleten`
--

INSERT INTO `keszleten` (`cikkszam`, `rkod`, `mennyiseg`) VALUES
(10101, 2, 121),
(10101, 3, 200),
(10101, 1, 10),
(10101, 4, 109),
(23609, 3, 13),
(23609, 2, 21),
(11111, 1, 98),
(84612, 5, 20),
(69652, 4, 7),
(93940, 3, 2),
(74310, 1, 725),
(29876, 2, 19),
(29876, 3, 2),
(38294, 1, 3),
(12345, 3, 1000),
(50007, 5, 23),
(54321, 3, 1300),
(92514, 4, 600),
(59612, 2, 45),
(27173, 2, 11),
(24631, 3, 420);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `raktar`
--

CREATE TABLE `raktar` (
  `rkod` int(2) NOT NULL,
  `iranyitoszam` int(4) NOT NULL,
  `varos` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL,
  `utca` varchar(100) COLLATE utf8mb4_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `raktar`
--

INSERT INTO `raktar` (`rkod`, `iranyitoszam`, `varos`, `utca`) VALUES
(1, 6120, 'Kiskunmajsa', 'Fő utca 1'),
(2, 6700, 'Szeged', 'Hétvezér utca 4.'),
(3, 1007, 'Budapest', 'Petőfi utca 20.'),
(4, 9000, 'Győr', 'Dió utca 37.'),
(5, 8600, 'Siófok', 'Damjanich utca 14.');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `aru`
--
ALTER TABLE `aru`
  ADD PRIMARY KEY (`cikkszam`),
  ADD KEY `kkod` (`kkod`);

--
-- A tábla indexei `arukategoria`
--
ALTER TABLE `arukategoria`
  ADD PRIMARY KEY (`kkod`);

--
-- A tábla indexei `beszallito`
--
ALTER TABLE `beszallito`
  ADD PRIMARY KEY (`bkod`);

--
-- A tábla indexei `beszerzes`
--
ALTER TABLE `beszerzes`
  ADD PRIMARY KEY (`sorszam`),
  ADD KEY `cikkszam` (`cikkszam`,`rkod`,`bkod`),
  ADD KEY `rkod` (`rkod`),
  ADD KEY `bkod` (`bkod`);

--
-- A tábla indexei `eladas`
--
ALTER TABLE `eladas`
  ADD PRIMARY KEY (`sorszam`),
  ADD KEY `cikkszam` (`cikkszam`,`rkod`),
  ADD KEY `rkod` (`rkod`);

--
-- A tábla indexei `keszleten`
--
ALTER TABLE `keszleten`
  ADD KEY `cikkszam` (`cikkszam`,`rkod`),
  ADD KEY `rkod` (`rkod`);

--
-- A tábla indexei `raktar`
--
ALTER TABLE `raktar`
  ADD PRIMARY KEY (`rkod`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `aru`
--
ALTER TABLE `aru`
  ADD CONSTRAINT `aru_ibfk_1` FOREIGN KEY (`kkod`) REFERENCES `arukategoria` (`kkod`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `beszerzes`
--
ALTER TABLE `beszerzes`
  ADD CONSTRAINT `beszerzes_ibfk_1` FOREIGN KEY (`cikkszam`) REFERENCES `aru` (`cikkszam`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `beszerzes_ibfk_2` FOREIGN KEY (`rkod`) REFERENCES `raktar` (`rkod`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `beszerzes_ibfk_3` FOREIGN KEY (`bkod`) REFERENCES `beszallito` (`bkod`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `eladas`
--
ALTER TABLE `eladas`
  ADD CONSTRAINT `eladas_ibfk_1` FOREIGN KEY (`cikkszam`) REFERENCES `aru` (`cikkszam`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `eladas_ibfk_2` FOREIGN KEY (`rkod`) REFERENCES `raktar` (`rkod`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Megkötések a táblához `keszleten`
--
ALTER TABLE `keszleten`
  ADD CONSTRAINT `keszleten_ibfk_1` FOREIGN KEY (`rkod`) REFERENCES `raktar` (`rkod`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `keszleten_ibfk_2` FOREIGN KEY (`cikkszam`) REFERENCES `aru` (`cikkszam`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
