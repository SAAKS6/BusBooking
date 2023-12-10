-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 08:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `SecurityKey` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Name`, `Pass`, `SecurityKey`) VALUES
(1, 'Asfandyar', '9858', 1980),
(2, 'ALI', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `schedual`
--

CREATE TABLE `schedual` (
  `Id` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `FromCity` varchar(255) DEFAULT NULL,
  `ToCity` varchar(255) DEFAULT NULL,
  `Departure` time DEFAULT NULL,
  `TripTime` time NOT NULL,
  `Arrival` time DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedual`
--

INSERT INTO `schedual` (`Id`, `Date`, `FromCity`, `ToCity`, `Departure`, `TripTime`, `Arrival`, `Price`, `Seats`) VALUES
(1, '2023-11-25', 'Rawalpindi', 'Islamabad', '08:00:00', '02:30:00', '10:30:00', 50.00, 29),
(2, '2023-11-25', 'Rawalpindi', 'Lahore', '12:00:00', '03:45:00', '15:45:00', 75.50, 30),
(3, '2023-11-25', 'Islamabad', 'Rawalpindi', '15:30:00', '02:15:00', '17:45:00', 60.25, 28),
(4, '2023-11-26', 'Rawalpindi', 'Islamabad', '08:00:00', '02:30:00', '10:30:00', 50.00, 29),
(5, '2023-11-26', 'Rawalpindi', 'Lahore', '12:00:00', '03:45:00', '15:45:00', 75.50, 30),
(6, '2023-12-06', 'abc', 'ab', '12:41:00', '05:00:00', '17:41:00', 70.00, 30),
(24, '2023-12-01', 'ASA', 'ASA', '00:13:46', '00:00:00', '00:13:47', 101.00, 30);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Fname` varchar(50) NOT NULL,
  `Mname` varchar(50) NOT NULL,
  `Lname` varchar(50) NOT NULL,
  `Cnic` int(11) NOT NULL,
  `Gender` int(11) NOT NULL,
  `Tel` varchar(20) NOT NULL,
  `Dob` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `TimeStamp` timestamp NULL DEFAULT NULL,
  `Dschedual` int(11) DEFAULT NULL,
  `Rschedual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Fname`, `Mname`, `Lname`, `Cnic`, `Gender`, `Tel`, `Dob`, `Email`, `TimeStamp`, `Dschedual`, `Rschedual`) VALUES
(100, 'Asfandyar', '', 'Naeem', 37504, 1, '9858', '2003-03-01', 'Asfandyarnaeem81@gmai.com', '0000-00-00 00:00:00', 1, 3),
(111, 'ali', ' ', 'haider', 123, 2, '321', '2023-12-07', 'ALI@GMAIL.COM', '2023-12-03 14:41:33', 2, 0),
(119, 'Asfandyar', '', 'Naeem', 123, 1, '123', '2023-12-07', 'abc@gmail.com', '2023-12-07 10:36:29', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `schedual`
--
ALTER TABLE `schedual`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Dschedual_FK` (`Dschedual`),
  ADD KEY `Rschedual_FK` (`Rschedual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `schedual`
--
ALTER TABLE `schedual`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Dschedual_FK` FOREIGN KEY (`Dschedual`) REFERENCES `schedual` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
