-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 06:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `nev` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `cim` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `iskola1` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `vegzettseg1` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `iskola2` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `vegzettseg2` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `iskola3` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `vegzettseg3` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `munka1` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `munka2` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `munka3` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `munka4` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `nyelvek` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `hobbik` varchar(255) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `username`, `password`, `nev`, `cim`, `telefon`, `iskola1`, `vegzettseg1`, `iskola2`, `vegzettseg2`, `iskola3`, `vegzettseg3`, `munka1`, `munka2`, `munka3`, `munka4`, `nyelvek`, `hobbik`) VALUES
('admin@admin.hu', 'admin', 'admin', 'Georgieviczh Dora', 'Szeged, Jakab Lajos utca', '06302906229', 'SZTE JGYPK Programtervező Informatikus Fejlesztő FOSZ', 'folyamatban', 'University of Glasgow HATII', 'Digital Media and Information Studies MA', 'Kecskeméti Református Gimnázium', 'Érettségi bizonyítvány', 'LG Magyarország', 'Anit Evest St Enoch Centre', 'Pets Cetera', 'Subway Ltd', 'angol, japán, német', 'Rajzolás, filmek'),
('fruzsi@admin.hu', 'fruzsi', 'fruzsi', 'Török Éva Fruzsina', 'Szeged', '', 'SZTE JGYPK Programtervező Informatikus Fejlesztő FOSZ', 'folyamatban', '', '', '', '', '', '', '', '', 'angol felsőfok', 'Szépségápolás, olvasás, filmek'),
('kukac@kukac.hu', 'kukac', 'kukac', 'Dora G.', 'Kecskemét, Szabó Lőrinc utca', '', 'SZTE JGYPK', 'folyamatban', '', '', '', '', 'LG Magyarország', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
