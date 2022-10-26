-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2022 at 05:50 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `employmentID` int(8) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `address` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`employmentID`, `firstName`, `lastName`, `address`, `email`, `phoneNumber`, `dateOfBirth`) VALUES
(23021222, 'Laura', 'Dupont', '12 Happy St, Montreal, QC', 'lauradup@hotmail.com', 2147483647, '1990-02-25'),
(25120000, 'Julie', 'Doe', '134 Maple St, Montreal, QC', 'julie343@hotmail.com', 2147483647, '1992-10-12'),
(39954555, 'Philippe', 'Dupont', '1323 Rue Deguire, Montreal, QC', 'philippe23@gmail.com', 2147483647, '1990-02-10');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` char(7) NOT NULL,
  `title` varchar(60) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `days` char(5) NOT NULL,
  `time` char(17) NOT NULL,
  `instructor` varchar(25) NOT NULL,
  `room` char(4) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `title`, `semester`, `days`, `time`, `instructor`, `room`, `startDate`, `endDate`) VALUES
('COMP232', 'Mathematics for Computer Science', 'Fall 2022', 'WeTh', '9:45am - 11:00am', 'Mary Jane', 'H202', '2022-09-07', '2022-12-17'),
('COMP352', 'Algorithm ', 'Fall 2022', 'MoFr', '2:00pm - 3:00pm', 'Steven Brown', 'H315', '2022-09-07', '2022-12-17'),
('COMP353', 'Databases', 'Fall 2022', 'MoTu', '12:00pm - 1:45pm', 'Tom Smith', 'H768', '2022-09-07', '2022-12-17'),
('ENGR213', 'Applied Ordinary Differentials', 'Fall 2022', 'TuFr', '2:00pm - 3:00pm', 'Sara Abdelahad', 'H520', '2022-09-07', '2022-12-17'),
('PHYS233', 'Physics 2', 'Fall 2022', 'TuTh', '10:15am - 12:00pm', 'Carl Sagan', 'H531', '2022-09-07', '2022-12-17'),
('SOEN287', 'Web Programming', 'Fall 2022', 'MoWe', '3:45pm - 5:00pm', 'Nancy Acemian', 'H514', '2022-09-07', '2022-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `enrolledin`
--

CREATE TABLE `enrolledin` (
  `studentID` int(8) NOT NULL,
  `courseCode1` char(7) DEFAULT NULL,
  `courseCode2` char(7) DEFAULT NULL,
  `courseCode3` char(7) DEFAULT NULL,
  `courseCode4` char(7) DEFAULT NULL,
  `courseCode5` char(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrolledin`
--

INSERT INTO `enrolledin` (`studentID`, `courseCode1`, `courseCode2`, `courseCode3`, `courseCode4`, `courseCode5`) VALUES
(40002333, 'COMP232', 'COMP353', 'PHYS233', 'ENGR213', 'COMP352'),
(40013698, 'COMP232', 'COMP353', 'PHYS233', 'ENGR213', 'COMP352');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` int(8) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `address` varchar(80) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` int(10) NOT NULL,
  `dateOfBirth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `firstName`, `lastName`, `address`, `email`, `phoneNumber`, `dateOfBirth`) VALUES
(0, '', '', '', '', 0, '0000-00-00'),
(25042587, 'Laura', 'Smith', '12 Maple St, Montreal, QC', 'laurasmith@live.com', 2147483647, '1994-10-10'),
(40001378, 'Sam', 'Daniels', '16 Decarie St, Montreal, QC', 'samdaniels@live.com', 2147483647, '1992-09-12'),
(40002333, 'Paul', 'Roberts', '1876 Boul St-Laurent, Montreal, QC', 'paulroberts2@gmail.com', 2147483647, '1990-10-25'),
(40013698, 'Lana', 'Bedoun', '124 St-Catherine O, Montreal, QC', 'lanarey13@gmail.com', 2147483647, '1994-12-25'),
(43811211, 'Bana', 'Reel', '13 Maple St, Montreal, QC', 'banareel@gmail.com', 2147483647, '1991-10-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`employmentID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`),
  ADD UNIQUE KEY `title` (`title`,`semester`,`startDate`,`endDate`);

--
-- Indexes for table `enrolledin`
--
ALTER TABLE `enrolledin`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolledin`
--
ALTER TABLE `enrolledin`
  ADD CONSTRAINT `enrolledin_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolledin_ibfk_2` FOREIGN KEY (`courseCode1`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolledin_ibfk_3` FOREIGN KEY (`courseCode2`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolledin_ibfk_4` FOREIGN KEY (`courseCode3`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolledin_ibfk_5` FOREIGN KEY (`courseCode4`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrolledin_ibfk_6` FOREIGN KEY (`courseCode5`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
