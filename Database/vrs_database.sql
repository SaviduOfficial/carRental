-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 05:43 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `adfirst_name` varchar(50) NOT NULL,
  `adlast_name` varchar(50) NOT NULL,
  `adaddress` varchar(255) DEFAULT NULL,
  `adusername` varchar(50) NOT NULL,
  `admobile` varchar(15) DEFAULT NULL,
  `ademail` varchar(255) NOT NULL,
  `adpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `adfirst_name`, `adlast_name`, `adaddress`, `adusername`, `admobile`, `ademail`, `adpassword`) VALUES
(3, 'adminfname', 'adminlname', 'colombo', 'testcase1', '0714545897', 'admin1@gmail.com', '$2y$10$KoIrgpm0TGPI.R8QWFqw2uQ/67EM0U7xqvYSy5eF3ByjIzx8tTkY.'),
(6, 'adminfname', 'adminlname', 'colombo', 'testcase2', '0714545898', 'admin2@gmail.com', '$2y$10$pauv.4PfDV5t5aI9jDnOb.GN2V9PFPmxQLiUM006n3x1v48yb0LJ.'),
(7, 'Test', 'Case3', '8675757dadaaadwdw', 'testcase3', '2727272778', 'hdadada@fisf.comdwd', '$2y$10$MHAnrGOTsLyqfY2.Bb6RlOy3zOcO6xhl9o9fG4.kbF8o8vbgndi8S');

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
  `finalMileage` varchar(8) NOT NULL,
  `locationb` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`BID`, `Booking_Date`, `Return_Date`, `Pickup_address`, `VehicleID`, `Vehicle_type`, `Vehicle_make`, `Vehicle_model`, `Regi_no_p1`, `Regi_no_p2`, `Fuel_type`, `colour`, `CustomerID`, `First_Name`, `Last_Name`, `contact_Number`, `email`, `paid_unpaid`, `Rental_chage`, `image_1`, `initialMileage`, `finalMileage`, `locationb`) VALUES
(27, '2009-11-30', '2010-12-07', 'jgjhjh', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(28, '2024-11-16', '2024-11-17', 'dsds', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(29, '2024-11-18', '2024-11-19', 'dsds', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(30, '2024-11-16', '2024-11-27', 'dwsd', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/ct1001.jpg', '5000', '', NULL),
(31, '2024-11-16', '2024-11-29', 'gddg', 'CAA1515', 'Car', 'Toyota', 'Prius', 'CAA', '1515', 'Petrol 92 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/priyusa.jpg', '49999', '', NULL),
(32, '1998-11-17', '1998-11-25', 'gf', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(33, '2006-11-17', '2006-11-21', 'gegeg', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(34, '2007-11-17', '2007-11-30', 'dvdvv', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(35, '2001-11-17', '2001-11-27', 'dadadada', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(36, '2002-11-17', '2002-11-28', 'hghghg', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(37, '2008-11-17', '2008-11-10', 'fdfd', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(38, '2024-11-17', '2024-11-28', 'csc', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(39, '2024-11-17', '2024-11-28', 'csc', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(40, '2024-11-17', '2024-11-28', 'csc', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(41, '2024-11-17', '2024-11-28', 'csc', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(42, '2024-11-17', '2024-11-28', 'csc', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(43, '2024-11-17', '2024-11-28', 'csc', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(44, '2012-11-17', '2012-11-26', 'vdvd', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(45, '2004-11-17', '2004-11-18', 'sds', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(46, '2022-11-17', '2022-11-26', 'ggrg', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(47, '2021-11-17', '2021-11-29', ' sccscscs', 'TK1155', 'Bike', 'Bajaj', 'CT 100', 'TK', '1155', 'Petrol 92 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/ct1001.jpg', '5000', '', NULL),
(48, '2020-11-17', '2020-11-27', 'dggd', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'unpaid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(49, '2011-11-17', '2011-11-28', 'cxcx', 'GHH8855', 'Van', 'Toyota', 'Van', 'GHH', '8855', 'Petrol 95 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/toyotavan1.jpg', '85000', '', NULL),
(50, '2019-11-17', '2024-11-21', 'sfsscs', 'CBA3132', 'Van', 'Nissan', 'Van', 'CBA', '3132', 'Petrol 92 Octane', NULL, '6464644dsdsd', 'Test', 'Case3', NULL, 'hdadada@fisf.com', 'paid', NULL, 'uploads/urv1.jpg', '20000', '', NULL);

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

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`CID`, `First_Name`, `Last_Name`, `Address`, `email`, `Customer_password`, `Contact_number`, `Driving_license_No`, `username`) VALUES
('6464644dsdsd', 'Test', 'Case3', '8675757dadaaa', 'hdadada@fisf.com', '$2y$10$5NlvzBsMMwKX/swoLtyqIuexmJaqw5lZyQA4ZpPKVO1t2SBAwCK5C', '2727272722', '6464644dsdsd', 'testcase3'),
('6464644dsdsd646', 'Test', 'Case4', '8675757dadaaa', 'hdadaAada@fisf.com', '$2y$10$mIDVXlFMZnTHvOdaioWfmOwiViH4pBqg8IRmbkTapPam9a0JRSdge', '2727272722', '6464644dsdsd646', 'testcase4'),
('B1005894', 'Test', 'case1', 'myAddress', 'testcase@gmail.com', '$2y$10$WW84cPtyUh3r3katZGPxB.xygXoqbtKiODJFSOPMoOUmSE6UWfK7K', '0772428568', 'B1005894', 'testcase1');

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
  `image_6` varchar(255) DEFAULT NULL,
  `location` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_vehicles`
--

INSERT INTO `registered_vehicles` (`VehicleID`, `Vehicle_type`, `First_Name`, `Last_Name`, `Owners_email`, `Owners_contact_number`, `Vehicle_make`, `Vehicle_model`, `Model_year`, `Engine_capacity`, `Milage`, `Regi_No_p1`, `Regi_No_p2`, `Fuel_type`, `transmission`, `colour`, `availability`, `Renatal_charge`, `image_1`, `image_2`, `image_3`, `image_4`, `image_5`, `image_6`, `location`) VALUES
('3014568', 'Car', 'Josh', 'Randnor', 'josh@email.com', '0579865981', 'Mercedes-Benz', 'E320', '1999', '2501cc - 3000cc', '67200', '301', '4568', 'Petrol 95 Octane', 'Automatic', 'Black', 'Yes', 'Rs.100.00 perKm + Rs.4000.00', 'uploads/benzblack1.jpg', 'uploads/benzblack3.jpg', 'uploads/benzblack3.jpg', 'uploads/benzblak4.jpg', 'uploads/benzblak6.jpg', 'uploads/benzvlak5.jpg', 'Galle'),
('3018855', 'Car', 'takumi', 'nakimoto', 'corolla@gmail.com', '0779634865', 'Toyota', 'Corolla', '1997', '1301cc - 1500cc', '125001', '301', '8855', 'Petrol 92 Octane', 'Automatic', 'Gold', 'yes', 'Rs.50.00 perKm + Rs. 2000.00', 'uploads/goldcorolla1.jpg', 'uploads/goldcorolla2.jpg', 'uploads/goldcorolla3.jpg', 'uploads/goldcorolla4.jpg', 'uploads/goldcorolla5.jpg', 'uploads/goldcorolla6.jpg', 'Matara'),
('BAA9999', 'Bike', 'Dharam', 'Rathana', 'dharme@gmail.com', '0719856496', 'Bajaj', 'Pulsar', '2022', '151cc - 250cc', '10000', 'BAA', '9999', 'Petrol 92 Octane', 'Automatic', 'Red', 'yes', 'Rs.30.00 perKm + Rs.1000.00', 'uploads/pul1.jpg', 'uploads/pul2.jpg', 'uploads/pul3.jpg', 'uploads/pul4.jpg', 'uploads/pul5.jpg', 'uploads/pul6.jpg', 'Galle'),
('CAA1515', 'Car', 'Gamage', 'Saman', 'gamagesaman@gmail.com', '0715667859', 'Toyota', 'Prius', '2016', '801cc - 1000cc', '49999', 'CAA', '1515', 'Petrol 92 Octane', 'Automatic', 'Black', 'yes', 'Rs.40.00 perKm + Rs.1500.00', 'uploads/priyusa.jpg', 'uploads/priyusb.jpg', 'uploads/priyusc.jpg', 'uploads/priyusd.jpg', 'uploads/priyuse.jpg', 'uploads/priyusf.jpg', 'Kandy'),
('CBA3132', 'Van', 'Upali', 'Wijaya', 'upali@wijaya.com', '0714568953', 'Nissan', 'Van', '2015', '2001cc - 2500cc', '20000', 'CBA', '3132', 'Petrol 92 Octane', 'Automatic', 'Black', 'yes', 'Rs.100.00 perKm + Rs.3000.00', 'uploads/urv1.jpg', 'uploads/urv2.jpg', 'uploads/urv3.jpg', 'uploads/urv4.jpg', 'uploads/urv5.jpg', 'uploads/urv6.jpg', 'Batticaloa'),
('CKC4589', 'Car', 'cyber', 'truck', 'resla@gmail.com', '0745898448', 'Tesla', 'Other', '2019', 'Electric', '35000', 'CKC', '4589', 'Electric', 'Automatic', 'Black', 'yes', 'Rs.80.00 perKm + Rs.2500.00', 'uploads/cyber1.jpg', 'uploads/cyber6.jpg', 'uploads/cyber7.jpg', 'uploads/cyber4.jpg', 'uploads/cyber3.jpg', 'uploads/cyber5.jpg', 'Colombo'),
('GHH8855', 'Van', 'kamal', 'hettiyamuni', 'Kdh@gmail.com', '0778634860', 'Toyota', 'Van', '2015', '1301cc - 1500cc', '85000', 'GHH', '8855', 'Petrol 95 Octane', 'Automatic', 'White', 'yes', 'Rs.50.00 perKm + Rs. 2000.00', 'uploads/toyotavan1.jpg', 'uploads/toyotavan2.jpg', 'uploads/toyotavan3.jpg', 'uploads/toyotavan4.jpg', 'uploads/toyotavan5.jpg', 'uploads/toyotavan6.jpg', 'Jaffna'),
('GKG8575', 'Car', 'Vindula', 'Deshapriya', 'vidula@gmail.com', '0718244860', 'Audi', 'A5', '2015', '2501cc - 3000cc', '56000', 'GKG', '8575', 'Petrol 95 Octane', 'Automatic', 'White', 'yes', 'Rs.100.00 perKm + Rs.4000.00', 'uploads/whiteaudi.jpg', 'uploads/whiteaudi1.jpg', 'uploads/whiteaudi3.jpg', 'uploads/whiteaudi4.jpg', 'uploads/whiteaudi5.jpg', 'uploads/whiteaudi6.jpg', 'Polonnaruwa'),
('JJ2255', 'Bike', 'kamila', 'jayarathtna', 'kamilai@gmail.com', '0716589410', 'Bajaj', 'Pulsar', '2010', '100cc - 150 cc', '5000', 'JJ', '2255', 'Petrol 92 Octane', 'Manual', 'Black', 'yes', 'Rs.30.00 perKm + Rs.500.00', 'uploads/bajahpulsa6.jpg', 'uploads/bajajpulsar1.jpg', 'uploads/bajajpulsar3.jpg', 'uploads/bajajpulsar4.jpg', 'uploads/bajapulasa5.jpg', 'uploads/bujajpul;sar2.jpg', 'Matara'),
('SSB7055', 'Car', 'Savidu', 'Illankoon', 'savidu@gmail.com', '0779634865', 'Nissan', '240SX', '2000', '2501cc - 3000cc', '51000', 'SSB', '7055', 'Petrol 95 Octane', 'Manual', 'Black', 'yes', 'Rs.100.00 perKm + Rs.4000.00', 'uploads/blacknissan1.jpg', 'uploads/blacknissan2.jpg', 'uploads/blacknissan3.jpg', 'uploads/blacknissan4.jpg', 'uploads/blacknissan5.jpg', 'uploads/blacknissan6.jpg', 'Galle'),
('TK1155', 'Bike', 'amila', 'rajaraththna', 'amilai@gmail.com', '0771114565', 'Bajaj', 'CT 100', '2015', '100cc - 150 cc', '5000', 'TK', '1155', 'Petrol 92 Octane', 'Manual', 'Black', 'yes', 'Rs.30.00 perKm + Rs.500.00', 'uploads/ct1001.jpg', 'uploads/ct1002.jpg', 'uploads/ct1003.jpg', 'uploads/ct1004.jpg', 'uploads/ct1005.jpg', 'uploads/ct1006.jpg', 'Anuradhapura'),
('YP8555', 'Tuk-Tuk', 'bluetuk', 'BeGamini', 'bluegamini@gmail.com', '0771112860', 'Bajaj', 'Three-wheelers', '2015', '251cc - 610cc', '35025', 'YP', '8555', 'Petrol 92 Octane', 'Manual', 'Blue', 'yes', 'Rs.40.00 perKm + Rs.1000.00', 'uploads/bluetuk1.jpg', 'uploads/bluetuk2.jpg', 'uploads/bluetuk3.jpg', 'uploads/bluetuk4.jpg', 'uploads/bluetuk5.jpg', 'uploads/bluetuk6.jpg', 'Moneragala'),
('YP8575', 'Tuk-Tuk', 'redtuk', 'Gamini', 'gamini@gmail.com', '0778222860', 'Bajaj', 'Three-wheelers', '2015', '251cc - 610cc', '35000', 'YP', '8575', 'Petrol 92 Octane', 'Manual', 'Red', 'yes', 'Rs.40.00 perKm + Rs.1000.00', 'uploads/redtuk1.jpg', 'uploads/redtuk2.jpg', 'uploads/redtuk3.jpg', 'uploads/redtuk4.jpg', 'uploads/redtuk5.jpg', 'uploads/redtuk6.jpg', 'Matale');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `ava_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `BID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `rentalcharge`
--
ALTER TABLE `rentalcharge`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
