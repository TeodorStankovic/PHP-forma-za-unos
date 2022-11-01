-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 01:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `jmbg` varchar(13) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `saglasnost` enum('Jeste','Nije') NOT NULL,
  `iskustvo` enum('Junior','Senior') NOT NULL,
  `ip` varchar(50) NOT NULL,
  `mac` varchar(50) NOT NULL,
  `vreme` timestamp NOT NULL DEFAULT current_timestamp(),
  `vreme_izmene` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `jmbg`, `ime`, `prezime`, `email`, `saglasnost`, `iskustvo`, `ip`, `mac`, `vreme`, `vreme_izmene`) VALUES
(203, '0321654789456', 'Teodor', 'Stankovic', 'teo@gmail.com', 'Nije', '', '::1', '68-94-23-03-5B-E0', '2022-05-31 20:35:32', NULL),
(204, '0987654321123', 'Sasa', 'Stankovic', 'sale@gmail.com', 'Nije', 'Senior', '::1', '68-94-23-03-5B-E0', '2022-05-31 20:35:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permisija`
--

CREATE TABLE `permisija` (
  `permisial_id` int(11) NOT NULL,
  `sifra` int(3) NOT NULL,
  `polozaj` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permisija`
--

INSERT INTO `permisija` (`permisial_id`, `sifra`, `polozaj`) VALUES
(1, 123, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `permisija`
--
ALTER TABLE `permisija`
  ADD PRIMARY KEY (`permisial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `permisija`
--
ALTER TABLE `permisija`
  MODIFY `permisial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
