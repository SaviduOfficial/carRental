-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 06:01 AM
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
  `BID` int(11) NOT NULL,
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
  `contact_Number` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `paid_unpaid` varchar(10) DEFAULT 'unpaid',
  `Rental_chage` varchar(25) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `initialMileage` varchar(8) NOT NULL,
  `finalMileage` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`BID`, `Booking_Date`, `Return_Date`, `Pickup_address`, `VehicleID`, `Vehicle_type`, `Vehicle_make`, `Vehicle_model`, `Regi_no_p1`, `Regi_no_p2`, `Fuel_type`, `colour`, `CustomerID`, `First_Name`, `Last_Name`, `contact_Number`, `email`, `paid_unpaid`, `Rental_chage`, `image_1`, `initialMileage`, `finalMileage`) VALUES
(1, '2024-11-11', '2024-11-13', 'myAddress', '3014568', 'Car', 'Mercedes-Benz', 'E320', '301', '4568', 'Petrol 95 Octane', 'Black', 'TestCust1', 'Test', 'Cust1', '0112742559', 'cust1@gmail.com', 'unpaid', '14000', 'uploads/benzblack1.jpg', '67100', '67200'),
(2, '2024-11-13', '2024-11-14', 'cscscscsc', 'JJ2255', 'Bike', 'Bajaj', 'Pulsar', 'JJ', '2255', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/bajahpulsa6.jpg', '5000', ''),
(3, '2024-11-13', '2024-11-14', 'cscscscsc', 'JJ2255', 'Bike', 'Bajaj', 'Pulsar', 'JJ', '2255', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/bajahpulsa6.jpg', '5000', ''),
(4, '2024-11-13', '2024-11-14', 'cscscscsc', 'JJ2255', 'Bike', 'Bajaj', 'Pulsar', 'JJ', '2255', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/bajahpulsa6.jpg', '5000', ''),
(5, '2024-11-13', '2024-11-29', 'dwdwdwd', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', ''),
(6, '2024-11-13', '2024-11-30', 'dadadada', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', ''),
(7, '2024-11-13', '2024-11-30', 'dadadada', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', ''),
(8, '2024-11-13', '2024-11-30', 'dadadada', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', ''),
(9, '2024-11-13', '2024-11-30', 'dadadada', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', ''),
(10, '2024-11-13', '2024-11-30', 'dadadada', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', ''),
(11, '2024-11-13', '2024-11-23', 'cscscscsc', 'JJ2255', 'Bike', 'Bajaj', 'Pulsar', 'JJ', '2255', 'Petrol 92 Octane', NULL, 'dwdwdwd', 'Jhon', 'Cena', NULL, 'jhon@cena.com', 'unpaid', NULL, 'uploads/bajahpulsa6.jpg', '5000', '');

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
  `cusername` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CID`, `First_Name`, `Last_Name`, `Address`, `email`, `Customer_password`, `Contact_number`, `Driving_license_No`, `cusername`) VALUES
('dwdwdwd', 'Jhon', 'Cena', '8675757dada', 'jhon@cena.com', '$2y$10$M6izx2fOBexcnVJIPHC9leXHAe4gOLtMDiBFOblU1jlEcsnKd75bK', '0124552364', 'dwdwdwd', 'jhon'),
('dwdwdwddasasa2424', 'user', 'user', '8675757dadaaa', 'jhon@cena1.com', '$2y$10$toduCYk51KFlLToJWQGutetETXr2vBnlQoYzOihjvIayn..jnvGQi', '0124552364', 'dwdwdwddasasa2424', 'user'),
('TestCust1', 'Test', 'Cust1', 'myAddress', 'cust1@gmail.com', 'helloworld123', '0112742559', NULL, 'TestCust1');

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
  `transmission` varchar(9) DEFAULT NULL,
  `colour` varchar(25) DEFAULT NULL,
  `availability` varchar(6) DEFAULT NULL,
  `Renatal_charge` varchar(35) DEFAULT NULL,
  `image_1` varchar(255) DEFAULT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `image_4` varchar(255) DEFAULT NULL,
  `image_5` varchar(255) DEFAULT NULL,
  `image_6` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_vehicles`
--

INSERT INTO `registered_vehicles` (`VehicleID`, `Vehicle_type`, `First_Name`, `Last_Name`, `Owners_email`, `Owners_contact_number`, `Vehicle_make`, `Vehicle_model`, `Model_year`, `Engine_capacity`, `Milage`, `Regi_No_p1`, `Regi_No_p2`, `Fuel_type`, `transmission`, `colour`, `availability`, `Renatal_charge`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`) VALUES
('3014568', 'Car', 'Josh', 'Randnor', 'josh@email.com', '0579865981', 'Mercedes-Benz', 'E320', '1999', '2501cc - 3000cc', '67200', '301', '4568', 'Petrol 95 Octane', 'Automatic', 'Black', 'yes', 'Rs.100.00 perKm + Rs.4000.00', 'uploads/benzblack1.jpg', 'uploads/benzblack3.jpg', 'uploads/benzblack3.jpg', 'uploads/benzblak4.jpg', 'uploads/benzblak6.jpg', 'uploads/benzvlak5.jpg'),
('3018855', 'Car', 'takumi', 'nakimoto', 'corolla@gmail.com', '0779634865', 'Toyota', 'Corolla', '1997', '1301cc - 1500cc', '125001', '301', '8855', 'Petrol 92 Octane', 'Automatic', 'Gold', 'yes', 'Rs.50.00 perKm + Rs. 2000.00', 'uploads/goldcorolla1.jpg', 'uploads/goldcorolla2.jpg', 'uploads/goldcorolla3.jpg', 'uploads/goldcorolla4.jpg', 'uploads/goldcorolla5.jpg', 'uploads/goldcorolla6.jpg'),
('GHH8855', 'Van', 'kamal', 'hettiyamuni', 'Kdh@gmail.com', '0778634860', 'Toyota', 'Van', '2015', '1301cc - 1500cc', '85000', 'GHH', '8855', 'Petrol 95 Octane', 'Automatic', 'White', 'yes', 'Rs.50.00 perKm + Rs. 2000.00', 'uploads/toyotavan1.jpg', 'uploads/toyotavan2.jpg', 'uploads/toyotavan3.jpg', 'uploads/toyotavan4.jpg', 'uploads/toyotavan5.jpg', 'uploads/toyotavan6.jpg'),
('GKG8575', 'Car', 'Vindula', 'Deshapriya', 'vidula@gmail.com', '0718244860', 'Audi', 'A5', '2015', '2501cc - 3000cc', '56000', 'GKG', '8575', 'Petrol 95 Octane', 'Automatic', 'White', 'yes', 'Rs.100.00 perKm + Rs.4000.00', 'uploads/whiteaudi.jpg', 'uploads/whiteaudi1.jpg', 'uploads/whiteaudi3.jpg', 'uploads/whiteaudi4.jpg', 'uploads/whiteaudi5.jpg', 'uploads/whiteaudi6.jpg'),
('JJ2255', 'Bike', 'kamila', 'jayarathtna', 'kamilai@gmail.com', '0716589410', 'Bajaj', 'Pulsar', '2010', '100cc - 150 cc', '5000', 'JJ', '2255', 'Petrol 92 Octane', 'Manual', 'Black', 'yes', 'Rs.30.00 perKm + Rs.500.00', 'uploads/bajahpulsa6.jpg', 'uploads/bajajpulsar1.jpg', 'uploads/bajajpulsar3.jpg', 'uploads/bajajpulsar4.jpg', 'uploads/bajapulasa5.jpg', 'uploads/bujajpul;sar2.jpg'),
('SSB7055', 'Car', 'Savidu', 'Illankoon', 'savidu@gmail.com', '0779634865', 'Nissan', '240SX', '2000', '2501cc - 3000cc', '51000', 'SSB', '7055', 'Petrol 95 Octane', 'Manual', 'Black', 'yes', 'Rs.100.00 perKm + Rs.4000.00', 'uploads/blacknissan1.jpg', 'uploads/blacknissan2.jpg', 'uploads/blacknissan3.jpg', 'uploads/blacknissan4.jpg', 'uploads/blacknissan5.jpg', 'uploads/blacknissan6.jpg'),
('TK1155', 'Bike', 'amila', 'rajaraththna', 'amilai@gmail.com', '0771114565', 'Bajaj', 'CT 100', '2015', '100cc - 150 cc', '5000', 'TK', '1155', 'Petrol 92 Octane', 'Manual', 'Black', 'yes', 'Rs.30.00 perKm + Rs.500.00', 'uploads/ct1001.jpg', 'uploads/ct1002.jpg', 'uploads/ct1003.jpg', 'uploads/ct1004.jpg', 'uploads/ct1005.jpg', 'uploads/ct1006.jpg'),
('YP8555', 'Tuk-Tuk', 'bluetuk', 'BeGamini', 'bluegamini@gmail.com', '0771112860', 'Bajaj', 'Three-wheelers', '2015', '251cc - 610cc', '35025', 'YP', '8555', 'Petrol 92 Octane', 'Manual', 'Blue', 'yes', 'Rs.40.00 perKm + Rs.1000.00', 'uploads/bluetuk1.jpg', 'uploads/bluetuk2.jpg', 'uploads/bluetuk3.jpg', 'uploads/bluetuk4.jpg', 'uploads/bluetuk5.jpg', 'uploads/bluetuk6.jpg'),
('YP8575', 'Tuk-Tuk', 'redtuk', 'Gamini', 'gamini@gmail.com', '0778222860', 'Bajaj', 'Three-wheelers', '2015', '251cc - 610cc', '35000', 'YP', '8575', 'Petrol 92 Octane', 'Manual', 'Red', 'yes', 'Rs.40.00 perKm + Rs.1000.00', 'uploads/redtuk1.jpg', 'uploads/redtuk2.jpg', 'uploads/redtuk3.jpg', 'uploads/redtuk4.jpg', 'uploads/redtuk5.jpg', 'uploads/redtuk6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rentalcharge`
--

CREATE TABLE `rentalcharge` (
  `ID` int(11) NOT NULL,
  `EngineCapacity` varchar(30) NOT NULL,
  `ratePerKm` decimal(10,2) DEFAULT NULL,
  `additional_charge` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rentalcharge`
--

INSERT INTO `rentalcharge` (`ID`, `EngineCapacity`, `ratePerKm`, `additional_charge`) VALUES
(1, 'less than 100cc', 20.00, 500.00),
(2, '100cc - 150cc', 30.00, 500.00),
(3, '151cc - 250cc', 30.00, 1000.00),
(4, '251cc - 610cc', 40.00, 1000.00),
(5, '611cc - 800cc', 40.00, 1000.00),
(6, '801cc - 1000cc', 40.00, 1500.00),
(7, '1001cc - 1300cc', 50.00, 1500.00),
(8, '1301cc - 1500cc', 50.00, 2000.00),
(9, '1501cc - 2000cc', 80.00, 2500.00),
(10, '2001cc - 2500cc', 100.00, 3000.00),
(11, '2501cc - 3000cc', 100.00, 4000.00),
(12, 'more than 3000cc', 150.00, 5000.00),
(13, 'Electric', 80.00, 2500.00);

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
  ADD UNIQUE KEY `username_unique` (`cusername`),
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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `rentalcharge`
--
ALTER TABLE `rentalcharge`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
