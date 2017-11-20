-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 09:43 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt2017`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `nick` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`, `nick`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin1');

-- --------------------------------------------------------

--
-- Table structure for table `announcments`
--

CREATE TABLE `announcments` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `untilDate` date NOT NULL,
  `title` tinytext NOT NULL,
  `slug` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `announcments`
--

INSERT INTO `announcments` (`id`, `userId`, `categoryId`, `description`, `price`, `untilDate`, `title`, `slug`) VALUES
(6, 3, 33, 'dsgfd', 3215360, '2017-11-29', 'Drugie', 'drugie'),
(7, 3, 38, 'fdsfds', 432, '2017-11-30', 'dsadsa', 'dsadsa'),
(8, 3, 33, 'A tutaj widzimy rzadki opis, bo jest normalny', 55675, '2017-12-01', 'Nowe ogłoszenie xD', 'nowe-ogloszenie-xd'),
(9, 8, 33, 'ALlalalala', 19897, '2017-12-16', 'Ogłoszenie', 'ogloszenie'),
(10, 8, 33, 'dsafdsafds', 31254, '2017-12-16', 'Ble', 'ble'),
(11, 8, 37, 'dfs', 231, '2017-12-16', 'dsdasgfd', 'dsdasgfd'),
(12, 8, 35, 'fdsgd', 321, '2017-12-16', 'dsasdffs', 'dsasdffs');

-- --------------------------------------------------------

--
-- Table structure for table `blokidetails`
--

CREATE TABLE `blokidetails` (
  `id` int(11) NOT NULL,
  `announcmentId` int(11) NOT NULL,
  `ble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blokidetails`
--

INSERT INTO `blokidetails` (`id`, `announcmentId`, `ble`) VALUES
(1, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ownerId`, `name`) VALUES
(1, 0, 'Glowna'),
(32, 1, 'Motoryzacja'),
(33, 32, 'Samochody_Osobowe'),
(34, 1, 'Domy'),
(35, 34, 'Bloki'),
(37, 34, 'Domy_jednorodzinne'),
(38, 32, 'Motocykle');

-- --------------------------------------------------------

--
-- Table structure for table `domy_jednorodzinnedetails`
--

CREATE TABLE `domy_jednorodzinnedetails` (
  `id` int(11) NOT NULL,
  `announcmentId` int(11) NOT NULL,
  `blee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `domy_jednorodzinnedetails`
--

INSERT INTO `domy_jednorodzinnedetails` (`id`, `announcmentId`, `blee`) VALUES
(1, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `highlighted`
--

CREATE TABLE `highlighted` (
  `id` int(11) NOT NULL,
  `announcmentId` int(11) NOT NULL,
  `untilDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `highlighted`
--

INSERT INTO `highlighted` (`id`, `announcmentId`, `untilDate`) VALUES
(4, 7, '2017-11-07'),
(5, 9, '2017-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `toId` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `ownerId`, `toId`, `date`, `content`) VALUES
(1, 3, 4, '0000-00-00 00:00:00', 'bleble'),
(2, 4, 4, '0000-00-00 00:00:00', 'ble'),
(3, 6, 3, '2017-10-31 14:06:54', 'Dej, mam horom curke'),
(4, 3, 6, '2017-10-31 15:12:36', 'Ble'),
(5, 3, 6, '2017-10-31 15:12:36', 'Spierdalaj z mojej ziemi'),
(6, 3, 6, '2017-11-01 00:16:12', 'fdfds'),
(7, 3, 6, '2017-11-01 00:16:19', 'Ale pedał jesteś'),
(8, 3, 4, '2017-11-01 00:17:42', 'Noelo'),
(9, 3, 4, '2017-11-01 00:18:28', 'Elo Marek'),
(10, 3, 5, '2017-11-01 00:19:31', 'Witam serdecznie'),
(11, 6, 3, '2017-11-01 00:20:47', 'A Ty nieee');

-- --------------------------------------------------------

--
-- Table structure for table `motocykledetails`
--

CREATE TABLE `motocykledetails` (
  `id` int(11) NOT NULL,
  `announcmentId` int(11) NOT NULL,
  `dasg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `motocykledetails`
--

INSERT INTO `motocykledetails` (`id`, `announcmentId`, `dasg`) VALUES
(1, 7, 3121);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `announcmentId` int(11) NOT NULL,
  `path` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `announcmentId`, `path`) VALUES
(9, 6, 'img/2017102921561230.jpg'),
(10, 8, 'img/2017103114005030.jpg'),
(11, 8, 'img/2017103114005031.jpg'),
(12, 8, 'img/2017103114005032.jpg'),
(13, 9, 'img/2017111623392380.jpg'),
(14, 9, 'img/2017111623392381.jpg'),
(15, 10, 'img/2017111623430080.jpg'),
(16, 10, 'img/2017111623430081.jpg'),
(17, 11, 'img/2017111623443080.jpg'),
(18, 11, 'img/2017111623443081.jpg'),
(19, 12, 'img/2017111623453580.png'),
(20, 12, 'img/2017111623453581.png');

-- --------------------------------------------------------

--
-- Table structure for table `samochody_osobowedetails`
--

CREATE TABLE `samochody_osobowedetails` (
  `id` int(11) NOT NULL,
  `announcmentId` int(11) NOT NULL,
  `Pojemność` int(11) NOT NULL,
  `Rocznik` int(11) NOT NULL,
  `Marka` tinytext NOT NULL,
  `Model` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `samochody_osobowedetails`
--

INSERT INTO `samochody_osobowedetails` (`id`, `announcmentId`, `Pojemność`, `Rocznik`, `Marka`, `Model`) VALUES
(6, 6, 3131, 43242, 'dsag', 'gfdfds'),
(7, 8, 12312, 432, 'hgfhgf', 'gfdd'),
(8, 9, 1900, 1999, 'Ble', 'Ble'),
(9, 10, 329131, 3219, 'DSAk', 'ddaml');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `password` tinytext NOT NULL,
  `name` tinytext NOT NULL,
  `surname` tinytext NOT NULL,
  `phoneNr` varchar(9) NOT NULL,
  `city` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `phoneNr`, `city`) VALUES
(3, 'daniel.jozefiusk@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Daniel', 'Jozefiuk', '666140675', 'Siedlce'),
(4, 'marek@gmail.com', 'e061c9aea5026301e7b3ff09e9aca2cf', 'Marek', 'Mostowiak', '123456789', 'Wałbrzych'),
(5, 'konto@konto.pl', '21232f297a57a5a743894a0e4a801fc3', 'Konto', 'Pierwsze', '123456789', 'Zadupie'),
(6, 'borek@worek.pl', '21232f297a57a5a743894a0e4a801fc3', 'Borek', 'Worek', '123456789', 'Bleeee'),
(7, 'daniel.jozefiuuk@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Daniel', 'Józefiuk', '666140675', 'Siedlce'),
(8, 'daniel.jozefiuk@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Daniel', 'Józefiuk', '666140675', 'Siedlce');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcments`
--
ALTER TABLE `announcments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `blokidetails`
--
ALTER TABLE `blokidetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcmentId` (`announcmentId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domy_jednorodzinnedetails`
--
ALTER TABLE `domy_jednorodzinnedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcmentId` (`announcmentId`);

--
-- Indexes for table `highlighted`
--
ALTER TABLE `highlighted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcmentId` (`announcmentId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`ownerId`,`toId`),
  ADD KEY `toId` (`toId`);

--
-- Indexes for table `motocykledetails`
--
ALTER TABLE `motocykledetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcmentId` (`announcmentId`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcmentId` (`announcmentId`);

--
-- Indexes for table `samochody_osobowedetails`
--
ALTER TABLE `samochody_osobowedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `announcmentId` (`announcmentId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `announcments`
--
ALTER TABLE `announcments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `blokidetails`
--
ALTER TABLE `blokidetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `domy_jednorodzinnedetails`
--
ALTER TABLE `domy_jednorodzinnedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `highlighted`
--
ALTER TABLE `highlighted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `motocykledetails`
--
ALTER TABLE `motocykledetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `samochody_osobowedetails`
--
ALTER TABLE `samochody_osobowedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcments`
--
ALTER TABLE `announcments`
  ADD CONSTRAINT `announcments_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `announcments_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blokidetails`
--
ALTER TABLE `blokidetails`
  ADD CONSTRAINT `blokidetails_ibfk_1` FOREIGN KEY (`announcmentId`) REFERENCES `announcments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `domy_jednorodzinnedetails`
--
ALTER TABLE `domy_jednorodzinnedetails`
  ADD CONSTRAINT `domy_jednorodzinnedetails_ibfk_1` FOREIGN KEY (`announcmentId`) REFERENCES `announcments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `highlighted`
--
ALTER TABLE `highlighted`
  ADD CONSTRAINT `highlighted_ibfk_1` FOREIGN KEY (`announcmentId`) REFERENCES `announcments` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`toId`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `motocykledetails`
--
ALTER TABLE `motocykledetails`
  ADD CONSTRAINT `motocykledetails_ibfk_1` FOREIGN KEY (`announcmentId`) REFERENCES `announcments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `pictures_ibfk_1` FOREIGN KEY (`announcmentId`) REFERENCES `announcments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `samochody_osobowedetails`
--
ALTER TABLE `samochody_osobowedetails`
  ADD CONSTRAINT `samochody_osobowedetails_ibfk_1` FOREIGN KEY (`announcmentId`) REFERENCES `announcments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `cleanHighlighted` ON SCHEDULE EVERY 1 DAY STARTS '2017-11-20 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO delete from highlighted where untilDate<curdate()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
