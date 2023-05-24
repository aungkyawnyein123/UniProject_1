-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2022 at 09:13 PM
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
-- Database: `librarydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `BookID` int(11) NOT NULL,
  `ISBN` varchar(17) NOT NULL,
  `BookImage` varchar(255) NOT NULL,
  `BookTitle` varchar(200) NOT NULL,
  `Author` varchar(50) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `ISBN`, `BookImage`, `BookTitle`, `Author`, `CategoryID`, `Description`, `Quantity`) VALUES
(1, '9789386316578', 'W149zCKase.jpg', 'Solar System and Its Dwarf Planets', 'Kevin Mitnik', 3, 'No Description', 4),
(2, '9780241239018', 'h162842074347a5deb712a664fa1b552b0.jpg', 'Art Book: Big Ideas Simply Explained', 'Embark', 3, 'Discover what makes a piece a significant work of art and tour history\'s greatest masterpieces. See the master works of Pablo Picasso, Vincent van Gogh, Claude Monet, and more.From prehistoric cave paintings to postmodern art, The Art Book explores more than 100 different movements, periods, and works throughout history, including ancient Assyrian sculpture and contemporary Japanese multimedia works. Art\'s theories and themes are more approachable and easier to understand through innovative graphics and creative typography.Part of DK\'s award-winning Big Ideas Simply Explained series, The Art Book profiling more than 100 artists and 200 pieces of work, and covers paintings, drawing, sculptures, ready-mades, land art, installations, and more. Follow how art changed in the Medieval world to the 18th century to the modern age. Study famous pieces of art including Venus of Willendorf, The Book of Kells, and Rembrandt\'s Self-Portrait. Learn the differences between Paul Cézanne, Henri Matisse, and Roy Lichtenstein.With stunning images and graphics, clear writing, an artist directory, and a vocabulary glossary, The Art Book is the perfect introduction to the complex and exciting world of art.', 4),
(3, '9780785157267', 'euaf79cd73b8dcee7df63b20a472dad794.jpg', 'X-Men: God Loves, Man Kills', 'Chris Claremont', 2, 'A graphic novel created by binding up US \"X-Men\" comics. As the X-Men and the Purifiers meet in a series of frenzied skirmishes, the Reverend William Stryker holds Professor Xavier hostage, subjecting him via drugs and electrodes to devastating mind-wash procedures. Then the unthinkable happens.', 5),
(4, '9789386316745', 'ft32a411e09fd8221f49dbca3e69dbbe3d.jpg', 'Prominent Civilisations', 'OM', 5, 'No description', 3),
(5, '9788126577637', '5293e3859244cff673dc61ab2cebbb6877c18917.jpg', 'Linux All-In-One For Dummies, 6Th Edition', 'Wiley', 4, 'No description', 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryType` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryType`) VALUES
(3, 'Arts & Recreation'),
(2, 'Comic'),
(4, 'Computer Science'),
(5, 'History & Geography'),
(1, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `IssueID` int(11) NOT NULL,
  `BookID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`IssueID`, `BookID`, `UserID`, `status`) VALUES
(1, 1, 4, 3),
(4, 2, 2, 3),
(5, 3, 2, 3),
(7, 5, 2, 3),
(8, 1, 2, 3),
(9, 4, 2, 2),
(15, 1, 2, 3),
(17, 3, 2, 3),
(18, 5, 2, 1),
(19, 5, 4, 1),
(20, 4, 4, 0),
(21, 3, 4, 0),
(23, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issuelog`
--

CREATE TABLE `issuelog` (
  `LogID` int(11) NOT NULL,
  `IssueID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `DueDate` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issuelog`
--

INSERT INTO `issuelog` (`LogID`, `IssueID`, `StartDate`, `DueDate`, `status`) VALUES
(1, 8, '2022-03-16', '2022-03-23', 1),
(2, 4, '2022-03-31', '2022-04-07', 0),
(3, 5, '2022-03-31', '2022-04-07', 1),
(4, 1, '2022-04-01', '2022-04-08', 1),
(5, 7, '2022-04-06', '2022-04-13', 1),
(6, 15, '2022-03-01', '2022-03-18', 1),
(7, 19, '2022-04-11', '2022-04-18', 0),
(8, 9, '2022-04-12', '2022-04-19', 0),
(9, 17, '2022-04-12', '2022-04-19', 1),
(10, 18, '2022-04-30', '2022-05-07', 0),
(11, 23, '2022-04-30', '2022-05-07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleID` int(11) NOT NULL,
  `UserRole` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleID`, `UserRole`) VALUES
(1, 'Librarian'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(25) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone` varchar(25) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FullName`, `Username`, `Password`, `RoleID`, `Email`, `Phone`, `DateOfBirth`, `RegDate`) VALUES
(1, 'Harry', 'harry', '123', 1, 'harry@gmail.com', '0916313411', '2022-03-01', '2022-04-30 19:09:37'),
(2, 'Kelvin', 'kelvin', '123', 2, 'kelvin@gmail.com', '0916313416', '2022-03-14', '2022-04-30 07:00:00'),
(3, 'Tesh Ting', 'librarian1', '123', 1, 'teshting@gmail.com', '9086775643', '2022-03-01', '2022-04-09 18:06:43'),
(4, 'Andrew', 'member1', '123', 2, 'andrew@gmail.com', '0987345637', '2022-03-02', '2022-04-30 07:00:00'),
(8, 'test', 'Test', '123', 2, 'Test@gmail.com', '0789789789', '2022-04-22', '2022-04-30 19:10:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`BookID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD UNIQUE KEY `CategoryType` (`CategoryType`);

--
-- Indexes for table `issue`
--
ALTER TABLE `issue`
  ADD PRIMARY KEY (`IssueID`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `issuelog`
--
ALTER TABLE `issuelog`
  ADD PRIMARY KEY (`LogID`),
  ADD KEY `IssueID` (`IssueID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleID`),
  ADD UNIQUE KEY `UserRole` (`UserRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD KEY `RoleID` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `BookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `issue`
--
ALTER TABLE `issue`
  MODIFY `IssueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `issuelog`
--
ALTER TABLE `issuelog`
  MODIFY `LogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `issue`
--
ALTER TABLE `issue`
  ADD CONSTRAINT `issue_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`),
  ADD CONSTRAINT `issue_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `issuelog`
--
ALTER TABLE `issuelog`
  ADD CONSTRAINT `issuelog_ibfk_1` FOREIGN KEY (`IssueID`) REFERENCES `issue` (`IssueID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `role` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
