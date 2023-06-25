-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 08:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Luka', 'Skoko', 'skokoluka', '$2y$10$q/GIzS5doy4.x8KdYw3xn.Rx186k5Sh/sbustInHX.F8o5afODLhW', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `kratki_sadrzaj` text NOT NULL,
  `sadrzaj` text NOT NULL,
  `slika` blob NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `kratki_sadrzaj`, `sadrzaj`, `slika`, `kategorija`, `arhiva`) VALUES
(5, '1111-11-11', 'Izložba suvremene umjetnosti', 'U lokalnoj galeriji otvorena je izložba suvremene ', 'Galerija XYZ predstavlja izvanrednu izložbu suvremene umjetnosti koja istražuje nove teme, tehnike i izraze umjetničkog stvaralaštva. Izložba je privukla veliki broj posjetitelja koji su oduševljeni inovativnim pristupom umjetnika. Različiti mediji, instalacije i interaktivni eksponati stvaraju jedinstveno iskustvo za sve ljubitelje umjetnosti.', 0x322e706e67, 'KULTURA', 1),
(6, '0022-02-22', 'Nogomet', ' Nogometna reprezentacija osvojila je važnu pobjed', 'Nogometna reprezentacija ostvarila je ključnu pobjedu u teškoj utakmici kvalifikacija za Svjetsko prvenstvo. Ekipa je prikazala iznimnu igru i timski duh, nadmašujući protivničku momčad rezultatom 3-1. Ova pobjeda približava nas plasmanu na najprestižnije nogometno natjecanje.', 0x53637265656e73686f74202e706e67, 'SPORT', 0),
(7, '1111-11-11', 'Izložba suvremene umjetnosti', 'U lokalnoj galeriji otvorena je izložba suvremene ', 'Galerija XYZ predstavlja izvanrednu izložbu suvremene umjetnosti koja istražuje nove teme, tehnike i izraze umjetničkog stvaralaštva. Izložba je privukla veliki broj posjetitelja koji su oduševljeni inovativnim pristupom umjetnika. Različiti mediji, instalacije i interaktivni eksponati stvaraju jedinstveno iskustvo za sve ljubitelje umjetnosti.', 0x362e706e67, 'KULTURA', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
