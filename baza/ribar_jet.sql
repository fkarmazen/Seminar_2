-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 12:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ribar_jet`
--

-- --------------------------------------------------------

--
-- Table structure for table `bazne_luke`
--

CREATE TABLE `bazne_luke` (
  `id` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE cp1250_croatian_ci NOT NULL,
  `luka_info` text COLLATE cp1250_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `bazne_luke`
--

INSERT INTO `bazne_luke` (`id`, `naziv`, `luka_info`) VALUES
(1, 'Trogir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis venenatis lobortis. Mauris at egestas turpis. Praesent pharetra dolor et mauris ullamcorper condimentum. Donec in purus id odio condimentum faucibus.'),
(2, 'Split', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis venenatis lobortis. Mauris at egestas turpis. Praesent pharetra dolor et mauris ullamcorper condimentum. Donec in purus id odio condimentum faucibus.'),
(3, 'Dubrovnik', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque venenatis venenatis lobortis. Mauris at egestas turpis. Praesent pharetra dolor et mauris ullamcorper condimentum. Donec in purus id odio condimentum faucibus.');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  `prezime` varchar(20) COLLATE cp1250_croatian_ci NOT NULL,
  `email` varchar(30) COLLATE cp1250_croatian_ci NOT NULL,
  `username` varchar(15) COLLATE cp1250_croatian_ci NOT NULL,
  `password` varchar(30) COLLATE cp1250_croatian_ci NOT NULL,
  `tip_korisnika_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `email`, `username`, `password`, `tip_korisnika_id`) VALUES
(7, 'frank', 'castle', 'fcastle@tvz.hr', 'frank', 'frank', 2),
(8, 'peter', 'parker', 'pparker@tvz.hr', 'pete', 'pete', 2),
(9, '1541', '666', '15@fsd.fsdf', '123', '123', 2),
(10, 'fran', 'mihelcic', 'fm@tvz.hr', 'fran', 'fran', 1),
(11, 'filip', 'karmazen', 'fktvz.hr', 'fika', 'fika', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plovila`
--

CREATE TABLE `plovila` (
  `id` int(11) NOT NULL,
  `model` varchar(100) COLLATE cp1250_croatian_ci DEFAULT NULL,
  `duzina` double DEFAULT NULL,
  `sirina` double DEFAULT NULL,
  `broj_osoba` int(11) NOT NULL,
  `geo_duljina` varchar(50) COLLATE cp1250_croatian_ci NOT NULL,
  `geo_sirina` varchar(50) COLLATE cp1250_croatian_ci NOT NULL,
  `trenutna_luka_id` int(11) NOT NULL,
  `tip_plovila` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `plovila`
--

INSERT INTO `plovila` (`id`, `model`, `duzina`, `sirina`, `broj_osoba`, `geo_duljina`, `geo_sirina`, `trenutna_luka_id`, `tip_plovila`) VALUES
(1, 'Yamaha zr1', 2.05, 1.34, 2, '', '', 1, 2),
(2, 'Kawasaki sea 250', 2.2, 1.45, 2, '', '', 3, 2),
(3, 'Bavaria 50', 30.1, 7.54, 5, '', '', 2, 1),
(4, 'Olyer 1200', 47.6, 10.12, 8, '', '', 1, 1),
(5, 'Yamaha zr1', 2.05, 1.45, 2, '', '', 2, 2),
(6, 'Kawasaki sea 250', 2.2, 1.45, 2, '', '', 1, 2),
(7, 'Bavaria 50', 30.1, 7.54, 5, '', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

CREATE TABLE `rezervacije` (
  `id` int(11) NOT NULL,
  `id_plovila` int(11) NOT NULL,
  `polazak_dat` varchar(100) COLLATE cp1250_croatian_ci NOT NULL,
  `dolazak_dat` varchar(100) COLLATE cp1250_croatian_ci NOT NULL,
  `id_odredista` int(11) NOT NULL,
  `id_korisnik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id`, `id_plovila`, `polazak_dat`, `dolazak_dat`, `id_odredista`, `id_korisnik`) VALUES
(7, 1, '06/06/2016 07:43', '06/06/2016 07:43', 1, 7),
(8, 6, '05/06/2016 10:44', '05/06/2016 10:44', 1, 8),
(9, 1, '09/06/2016 10:57', '09/06/2016 10:57', 1, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tip_korisnika`
--

CREATE TABLE `tip_korisnika` (
  `id` int(11) NOT NULL,
  `tip` varchar(30) COLLATE cp1250_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `tip_korisnika`
--

INSERT INTO `tip_korisnika` (`id`, `tip`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tip_plovila`
--

CREATE TABLE `tip_plovila` (
  `id` int(11) NOT NULL,
  `tip` varchar(100) COLLATE cp1250_croatian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `tip_plovila`
--

INSERT INTO `tip_plovila` (`id`, `tip`) VALUES
(1, 'jedrilica'),
(2, 'jetski');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bazne_luke`
--
ALTER TABLE `bazne_luke`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tip_korisnika_id` (`tip_korisnika_id`);

--
-- Indexes for table `plovila`
--
ALTER TABLE `plovila`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tip_plovila` (`tip_plovila`),
  ADD KEY `trenutna_luka_id` (`trenutna_luka_id`);

--
-- Indexes for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plovila` (`id_plovila`),
  ADD KEY `id_odredista` (`id_odredista`),
  ADD KEY `id_korisnik` (`id_korisnik`);

--
-- Indexes for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip_plovila`
--
ALTER TABLE `tip_plovila`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bazne_luke`
--
ALTER TABLE `bazne_luke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `plovila`
--
ALTER TABLE `plovila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rezervacije`
--
ALTER TABLE `rezervacije`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tip_korisnika`
--
ALTER TABLE `tip_korisnika`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tip_plovila`
--
ALTER TABLE `tip_plovila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`tip_korisnika_id`) REFERENCES `tip_korisnika` (`id`);

--
-- Constraints for table `plovila`
--
ALTER TABLE `plovila`
  ADD CONSTRAINT `plovila_ibfk_1` FOREIGN KEY (`tip_plovila`) REFERENCES `tip_plovila` (`id`),
  ADD CONSTRAINT `plovila_ibfk_2` FOREIGN KEY (`trenutna_luka_id`) REFERENCES `bazne_luke` (`id`);

--
-- Constraints for table `rezervacije`
--
ALTER TABLE `rezervacije`
  ADD CONSTRAINT `rezervacije_ibfk_1` FOREIGN KEY (`id_plovila`) REFERENCES `plovila` (`id`),
  ADD CONSTRAINT `rezervacije_ibfk_2` FOREIGN KEY (`id_odredista`) REFERENCES `bazne_luke` (`id`),
  ADD CONSTRAINT `rezervacije_ibfk_3` FOREIGN KEY (`id_korisnik`) REFERENCES `korisnik` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
