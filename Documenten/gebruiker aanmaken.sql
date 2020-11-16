-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2020 at 12:45 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialguys`
--

-- --------------------------------------------------------

--
-- Table structure for table `kanaal`
--

CREATE TABLE `kanaal` (
  `Kanaal_ID` int(11) NOT NULL,
  `ProfielPhoto` varchar(256) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Naam` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `CategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kanaal`
--

INSERT INTO `kanaal` (`Kanaal_ID`, `ProfielPhoto`, `Email`, `Naam`, `Password`, `CategorieID`) VALUES
(1, 'logo.png', 'PjotrW75@Gmail.com', 'Social Guys', 'f7ff9e8b7bb2e09b70935a5d785e0cc5d9d0abf0', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kanaal`
--
ALTER TABLE `kanaal`
  ADD PRIMARY KEY (`Kanaal_ID`),
  ADD KEY `CategorieID` (`CategorieID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kanaal`
--
ALTER TABLE `kanaal`
  MODIFY `Kanaal_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kanaal`
--
ALTER TABLE `kanaal`
  ADD CONSTRAINT `kanaal_ibfk_1` FOREIGN KEY (`CategorieID`) REFERENCES `categorie` (`Categorie_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
