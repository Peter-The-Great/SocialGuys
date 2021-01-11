-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2021 at 09:39 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MijnDatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `Categorie_ID` int(11) NOT NULL,
  `Naam` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`Categorie_ID`, `Naam`) VALUES
(1, 'Lets Play'),
(2, 'Speedrun'),
(3, 'Trailer'),
(4, 'Tournament'),
(5, 'Commentary'),
(6, 'Art'),
(7, 'Just Chatting');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_ID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  `KanaalID` int(11) NOT NULL,
  `VideoID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_ID`, `Comment`, `KanaalID`, `VideoID`) VALUES
(6, '&lt;div border=&quot;1&quot;&gt;test&lt;/div&gt;', 29, 11),
(7, 'dekoadkawd', 29, 10),
(8, 'yeet', 30, 10),
(9, 'Hallo', 30, 13),
(10, 'sdknclkad`klsd', 29, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kanaal`
--

CREATE TABLE `kanaal` (
  `Kanaal_ID` int(11) NOT NULL,
  `ProfielPhoto` varchar(256) NOT NULL,
  `Naam` varchar(128) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `CategorieID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kanaal`
--

INSERT INTO `kanaal` (`Kanaal_ID`, `ProfielPhoto`, `Naam`, `Email`, `Password`, `CategorieID`) VALUES
(29, 'banner.jpg', 'Thommie', 'thommie@email.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 3),
(30, 'snoovatar.png', 'Nikootje', 'niko@mail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 4);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `Subscription_ID` int(11) NOT NULL,
  `KanaalID` int(11) NOT NULL,
  `Subscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`Subscription_ID`, `KanaalID`, `Subscription`) VALUES
(17, 29, 29),
(23, 29, 30),
(25, 30, 29);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `Video_ID` int(11) NOT NULL,
  `Naam` varchar(128) NOT NULL,
  `File` varchar(256) NOT NULL,
  `Thumbnail` varchar(256) NOT NULL,
  `CategorieID` int(11) NOT NULL,
  `KanaalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`Video_ID`, `Naam`, `File`, `Thumbnail`, `CategorieID`, `KanaalID`) VALUES
(10, 'Titeltje', 'videoplayback.mp4', 'balcony.jpg', 5, 29),
(11, 'test', 'Golden Boy ep.4 english subtitles-iYX8e-azGm8.mp4', 'IMG-1891-unscreen.gif', 4, 29),
(13, 'HOI', 'Golden Boy ep.5 english subtitles-5mlTQRHyunk.mp4', 'alena-aenami-eternity.jpg', 3, 29);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `VideoID` int(11) NOT NULL,
  `KanaalID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`VideoID`, `KanaalID`) VALUES
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(10, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(11, 29),
(10, 29),
(10, 29),
(11, 29),
(13, 29),
(13, 29),
(13, 29),
(13, 29),
(13, 29),
(10, 29),
(11, 30),
(10, 30),
(10, 30),
(13, 30),
(13, 30),
(11, 29),
(11, 29),
(11, 30),
(13, 30),
(13, 29),
(13, 29),
(13, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`Categorie_ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `KanaalID` (`KanaalID`),
  ADD KEY `VideoID` (`VideoID`);

--
-- Indexes for table `kanaal`
--
ALTER TABLE `kanaal`
  ADD PRIMARY KEY (`Kanaal_ID`),
  ADD KEY `CategorieID` (`CategorieID`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`Subscription_ID`),
  ADD KEY `KanaalID` (`KanaalID`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`Video_ID`),
  ADD KEY `KanaalID` (`KanaalID`),
  ADD KEY `CategorieID` (`CategorieID`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD KEY `KanaalID` (`KanaalID`),
  ADD KEY `VideoID` (`VideoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `Categorie_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kanaal`
--
ALTER TABLE `kanaal`
  MODIFY `Kanaal_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `Subscription_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `Video_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`KanaalID`) REFERENCES `kanaal` (`Kanaal_ID`);

--
-- Constraints for table `kanaal`
--
ALTER TABLE `kanaal`
  ADD CONSTRAINT `kanaal_ibfk_1` FOREIGN KEY (`CategorieID`) REFERENCES `categorie` (`Categorie_ID`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`KanaalID`) REFERENCES `kanaal` (`Kanaal_ID`),
  ADD CONSTRAINT `video_ibfk_2` FOREIGN KEY (`CategorieID`) REFERENCES `categorie` (`Categorie_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
