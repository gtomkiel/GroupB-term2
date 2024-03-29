-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jan 14, 2023 at 10:28 PM
-- Server version: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP Version: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `ID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `ID` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Grades`
--

CREATE TABLE `Grades` (
  `ID` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `subjectID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  `teacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `ID` int(11) NOT NULL,
  `subjectName` varchar(50) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`ID`, `subjectName`, `userID`) VALUES
(1, 'subject name', 4);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `secondName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(319) NOT NULL,
  `password` varchar(128) NOT NULL,
  `accountType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `firstName`, `secondName`, `address`, `phone`, `email`, `password`, `accountType`) VALUES
(1, 'Example', 'Admin', 'address', 'phone', 'admin', '$2y$10$Fq59zKOeZ2RqR.eXnOkaZe5aIql9ZBjLHkkZq0SKp9.NwuwhLJVmO', 'Admin'),
(2, 'Example', 'Parent', 'addr', 'phone', 'parent', '$2y$10$Fq59zKOeZ2RqR.eXnOkaZe5aIql9ZBjLHkkZq0SKp9.NwuwhLJVmO', 'Parent'),
(4, 'Example', 'Teacher', 'addr', 'tel', 'teacher', '$2y$10$Fq59zKOeZ2RqR.eXnOkaZe5aIql9ZBjLHkkZq0SKp9.NwuwhLJVmO', 'Teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Grades`
--
ALTER TABLE `Grades`
  ADD PRIMARY KEY (`ID`) USING BTREE,
  ADD KEY `subjectID` (`subjectID`),
  ADD KEY `userID` (`studentID`),
  ADD KEY `teacherID` (`teacherID`);

--
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Attendance`
--
ALTER TABLE `Attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Grades`
--
ALTER TABLE `Grades`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Subjects`
--
ALTER TABLE `Subjects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `studentID` FOREIGN KEY (`studentID`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `subjectID` FOREIGN KEY (`subjectID`) REFERENCES `Subjects` (`ID`);

--
-- Constraints for table `Grades`
--
ALTER TABLE `Grades`
  ADD CONSTRAINT `Grades_ibfk_1` FOREIGN KEY (`subjectID`) REFERENCES `Subjects` (`ID`),
  ADD CONSTRAINT `Grades_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `Users` (`ID`),
  ADD CONSTRAINT `Grades_ibfk_3` FOREIGN KEY (`teacherID`) REFERENCES `Users` (`ID`);

--
-- Constraints for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD CONSTRAINT `Subjects_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
