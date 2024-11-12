-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2024 at 07:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vrs_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `AID` int(11) NOT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `Username` varchar(25) DEFAULT NULL,
  `User_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adid` int(11) NOT NULL,
  `adfirst_name` varchar(255) NOT NULL,
  `adlast_name` varchar(255) NOT NULL,
  `adaddress` varchar(255) DEFAULT NULL,
  `adusername` varchar(255) NOT NULL,
  `admobile` varchar(20) DEFAULT NULL,
  `ademail` varchar(255) NOT NULL,
  `adpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adid`, `adfirst_name`, `adlast_name`, `adaddress`, `adusername`, `admobile`, `ademail`, `adpassword`) VALUES
(1, 'Jhon', 'Cena', NULL, 'jhon', '0124552364', 'jhon@cena.com', '$2y$10$GrX3v6i0yqhWHiOcrvMv9OBQgStkNinevWul3ZXNI45W3UQS.unDO');

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE `availability` (
  `ava_id` int(11) NOT NULL,
  `VehicleID` varchar(10) DEFAULT NULL,
  `bookingId` int(255) DEFAULT NULL,
  `CustomerID` varchar(25) DEFAULT NULL,
  `start_Date` varchar(25) DEFAULT NULL,
  `end_Date` varchar(25) DEFAULT NULL,
  `availability` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `BID` int(255) NOT NULL,
  `Booking_Date` varchar(25) DEFAULT NULL,
  `Return_Date` varchar(25) DEFAULT NULL,
  `Pickup_address` varchar(255) DEFAULT NULL,
  `VehicleID` varchar(10) DEFAULT NULL,
  `Vehicle_type` varchar(8) DEFAULT NULL,
  `Vehicle_make` varchar(25) DEFAULT NULL,
  `Vehicle_model` varchar(25) DEFAULT NULL,
  `Regi_no_p1` varchar(5) DEFAULT NULL,
  `Regi_no_p2` varchar(5) DEFAULT NULL,
  `Fuel_type` varchar(25) DEFAULT NULL,
  `colour` varchar(25) DEFAULT NULL,
  `CustomerID` varchar(25) DEFAULT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `Rental_chage` varchar(25) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `initialMileage` varchar(8) NOT NULL,
  `finalMileage` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `CID` varchar(25) NOT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Customer_password` varchar(255) DEFAULT NULL,
  `Contact_number` varchar(11) DEFAULT NULL,
  `Driving_license_No` varchar(25) DEFAULT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registered_vehicles`
--

CREATE TABLE `registered_vehicles` (
  `VehicleID` varchar(10) NOT NULL,
  `Vehicle_type` varchar(8) DEFAULT NULL,
  `First_Name` varchar(25) DEFAULT NULL,
  `Last_Name` varchar(25) DEFAULT NULL,
  `Owners_email` varchar(255) DEFAULT NULL,
  `Owners_contact_number` varchar(11) DEFAULT NULL,
  `Vehicle_make` varchar(25) DEFAULT NULL,
  `Vehicle_model` varchar(25) DEFAULT NULL,
  `Model_year` varchar(5) DEFAULT NULL,
  `Engine_capacity` varchar(25) DEFAULT NULL,
  `Milage` varchar(8) DEFAULT NULL,
  `Regi_No_p1` varchar(5) DEFAULT NULL,
  `Regi_No_p2` varchar(5) DEFAULT NULL,
  `Fuel_type` varchar(25) DEFAULT NULL,
  `colour` varchar(25) DEFAULT NULL,
  `availability` varchar(6) DEFAULT NULL,
  `Renatal_charge` varchar(25) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `image_5` varchar(255) DEFAULT NULL,
  `image_6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rentalcharge`
--

CREATE TABLE `rentalcharge` (
  `ID` int(8) NOT NULL,
  `EngineCapacity` varchar(10) NOT NULL,
  `Cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `username`, `mobile`, `email`, `password`) VALUES
(1, 'Harendra', 'Kumarasiri', 'dwdwdwd', 'admin', '0712345678', 'hdadada@fsf.com', '$2y$10$b0sT/pFMrIm6EXKvy9IdhO8uOeZcf6Jh/vUiQZAmJ1iIswghoYz/W'),
(3, 'Harendra', 'Kumarasiri', 'dwdwdwd', 'admin1', '0712345678', 'hdadada@fsf.com', '$2y$10$cRQdpscSlv4AlT1zitikw.IrkilVEZSjyn2zVfL11p5cKWuyuwTmu'),
(4, 'adoado', 'adooo', 'dadadada', 'adoado', '0124552364', 'hdadada@fgs.com', '$2y$10$VwCr8QJT.KX9R0G/vfCiZ.lEWKe8q9xL6lR4GxgGkoa07K..o7e4K'),
(5, 'Jhon', 'Cena', 'jhon@cena.com', 'jhon', '0124552364', 'hdadada@fgs.com', '$2y$10$mGRwK3thuDqQ6zTEcRg2VOSfC7Iw0cla7d4Jz7KWyBOW3etOxJzSC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`AID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adid`),
  ADD UNIQUE KEY `adusername` (`adusername`),
  ADD UNIQUE KEY `ademail` (`ademail`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`ava_id`),
  ADD KEY `VehicleID` (`VehicleID`),
  ADD KEY `bookingId` (`bookingId`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`BID`),
  ADD KEY `users_fk` (`CustomerID`),
  ADD KEY `vehicle_fk` (`VehicleID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CID`),
  ADD UNIQUE KEY `username_unique` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `Driving_license_No` (`Driving_license_No`);

--
-- Indexes for table `registered_vehicles`
--
ALTER TABLE `registered_vehicles`
  ADD PRIMARY KEY (`VehicleID`);

--
-- Indexes for table `rentalcharge`
--
ALTER TABLE `rentalcharge`
  ADD PRIMARY KEY (`ID`,`EngineCapacity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `availability`
--
ALTER TABLE `availability`
  ADD CONSTRAINT `availability_ibfk_1` FOREIGN KEY (`VehicleID`) REFERENCES `registered_vehicles` (`VehicleID`),
  ADD CONSTRAINT `availability_ibfk_2` FOREIGN KEY (`bookingId`) REFERENCES `bookings` (`BID`),
  ADD CONSTRAINT `availability_ibfk_3` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CID`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CID`),
  ADD CONSTRAINT `users_fk` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CID`),
  ADD CONSTRAINT `vehicle_fk` FOREIGN KEY (`VehicleID`) REFERENCES `registered_vehicles` (`VehicleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
