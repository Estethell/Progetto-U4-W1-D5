-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 04:35 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestione_libreria`
--

-- --------------------------------------------------------

--
-- Table structure for table `libri`
--

CREATE TABLE `libri` (
  `id` int(11) NOT NULL,
  `titolo` varchar(200) NOT NULL,
  `autore` varchar(200) NOT NULL,
  `anno_pubblicazione` int(4) NOT NULL,
  `genere` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libri`
--

INSERT INTO `libri` (`id`, `titolo`, `autore`, `anno_pubblicazione`, `genere`) VALUES
(1, 'The witcher', 'Andrzej Sapkowski', 2015, 'Fantasy'),
(3, 'Poirot va in pensione', 'Agatha Christi', 1964, 'Giallo'),
(4, 'Ross Poldark', 'Winston Graham', 1945, 'storico, drammatico'),
(5, 'Quella creatura delle tenebre ', 'Harry Thompson ', 2021, 'Storico, drammatico'),
(6, 'Acciaio', 'Silvia Avallone ', 2015, 'drammatico'),
(14, '1984', 'George Orwell', 1984, 'Distropico, drammatico'),
(15, 'Cent\'anni di solitudine', 'Gabriel García Márquez', 1995, 'Drammatico'),
(16, 'Il Decamerone', 'Giovanni Boccaccio', 1463, 'Comico'),
(17, 'Delitto e castigo', 'Fedor Dostoevskij', 1842, 'drammatico'),
(18, 'Odissea', 'Omero', 80, 'Epico'),
(19, 'Guerra e pace', 'Lev Tolstoj', 1725, 'Avventura'),
(20, 'Il ritratto di Dorian Gray', 'Oscar Wilde', 1854, 'drammatico, romantico'),
(23, 'Madame Bovary', 'Gustave Flaubert', 1645, 'drammatico'),
(24, 'Pippi Calzelunghe', 'Astrid Lindgren', 1915, 'Avventura, ragazzi, comico'),
(25, 'I racconti di Canterbury', 'Geoffrey Chaucer', 1536, 'Storico'),
(26, 'Il grande Gatsby', 'Scott Fitzgerald', 1921, 'drammatico'),
(28, 'Il potere del Cane', 'Non ricordo', 1986, 'Drammatico'),
(29, 'Il signore degli anelli', 'Tolkien', 1924, 'Fantasy'),
(30, 'Lo Hobbit', 'Tolkien', 1950, 'Fantasy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libri`
--
ALTER TABLE `libri`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libri`
--
ALTER TABLE `libri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
