-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 09:16 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Id` int(11) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `Timings` varchar(50) NOT NULL,
  `PatientId` int(11) NOT NULL,
  `DoctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Id`, `Day`, `Date`, `Timings`, `PatientId`, `DoctorId`) VALUES
(4, 'Wednesday', '0000-00-00', '03:00 PM', 21, 14),
(5, 'Tuesday', '2020-09-01', '03:00 PM', 20, 19),
(11, 'Tuesday', '0000-00-00', '15:00:00 - 18:00:00', 20, 14);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`Id`, `Name`) VALUES
(1, 'Islamabad'),
(2, 'Karachi'),
(3, 'Lahore'),
(11, 'Isl');

-- --------------------------------------------------------

--
-- Table structure for table `doctoravailability`
--

CREATE TABLE `doctoravailability` (
  `Id` int(11) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `FromTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `DoctorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctoravailability`
--

INSERT INTO `doctoravailability` (`Id`, `Day`, `FromTime`, `EndTime`, `DoctorId`) VALUES
(9, 'Sunday', '09:00:00', '11:00:00', 14),
(10, 'Wednesday', '12:00:00', '15:00:00', 14),
(12, 'Monday', '07:00:00', '09:30:00', 15),
(14, 'Tuesday', '15:00:00', '18:00:00', 19),
(15, 'Thursday', '18:00:00', '20:00:00', 19),
(17, 'Friday', '15:00:00', '17:30:00', 14),
(18, 'Saturday', '15:00:00', '17:00:00', 19),
(19, 'Monday', '18:00:00', '19:30:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Contact` bigint(20) DEFAULT NULL,
  `SpecialityId` int(11) DEFAULT NULL,
  `Details` text DEFAULT NULL,
  `Photo` text DEFAULT NULL,
  `CityId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Id`, `Name`, `Contact`, `SpecialityId`, `Details`, `Photo`, `CityId`) VALUES
(14, 'Shahid Ashraf', 311131245, 3, 'PHD doctor', 'd4.png', 1),
(19, 'Aslamuddin Shah', 3302324221, 4, 'Good Doctor..!', '../uploading/d3.png', 2),
(22, 'Rashid Siddique', 3452035987, 5, 'PHD Doctor', '../uploading/../uploading/d4.png', 3);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`Id`, `Name`, `Contact`) VALUES
(20, 'Qadir Salman', 3102010954),
(21, 'Hamza', 3132296543),
(23, 'Ali ', 3132296543);

-- --------------------------------------------------------

--
-- Table structure for table `specialities`
--

CREATE TABLE `specialities` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialities`
--

INSERT INTO `specialities` (`Id`, `Name`) VALUES
(1, 'Neurologist'),
(2, 'Cardiologist'),
(3, ' Dermatologist'),
(4, 'Homeopathic'),
(5, 'Orthopedist'),
(6, 'Psychiatrist');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `UserTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Email`, `Password`, `UserTypeId`) VALUES
(1, 'patient@gmail.com', '123', 3),
(2, 'admin@gmail.com', '123', 1),
(14, 'shahid@gmail.com', '123', 2),
(19, 'aslam@gmail.com', '123', 2),
(20, 'qadir@gmail.com', '123', 3),
(21, 'hamza@gmail.com', '123', 3),
(22, 'rashid@gmail.com', '123', 2),
(23, 'ali@gmail.com', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usertypeid`
--

CREATE TABLE `usertypeid` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertypeid`
--

INSERT INTO `usertypeid` (`Id`, `Name`) VALUES
(1, 'Admin'),
(2, 'Doctor'),
(3, 'Patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey4` (`DoctorId`),
  ADD KEY `ForeingnKey5` (`PatientId`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey3` (`DoctorId`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey2` (`SpecialityId`),
  ADD KEY `dx1` (`CityId`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `specialities`
--
ALTER TABLE `specialities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ForeingnKey1` (`UserTypeId`);

--
-- Indexes for table `usertypeid`
--
ALTER TABLE `usertypeid`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `specialities`
--
ALTER TABLE `specialities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `usertypeid`
--
ALTER TABLE `usertypeid`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `ForeingnKey4` FOREIGN KEY (`DoctorId`) REFERENCES `doctors` (`Id`),
  ADD CONSTRAINT `ForeingnKey5` FOREIGN KEY (`PatientId`) REFERENCES `patients` (`Id`);

--
-- Constraints for table `doctoravailability`
--
ALTER TABLE `doctoravailability`
  ADD CONSTRAINT `ForeingnKey3` FOREIGN KEY (`DoctorId`) REFERENCES `doctors` (`Id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `ForeingnKey2` FOREIGN KEY (`SpecialityId`) REFERENCES `specialities` (`Id`),
  ADD CONSTRAINT `dx1` FOREIGN KEY (`CityId`) REFERENCES `cities` (`Id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `ForeingnKey1` FOREIGN KEY (`UserTypeId`) REFERENCES `usertypeid` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
