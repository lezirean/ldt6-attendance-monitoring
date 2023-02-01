-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jan 31, 2023 at 11:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ldt6_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_ID` int(11) NOT NULL,
  `team_ID` int(11) NOT NULL,
  `schedule_ID` int(11) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `sex` varchar(7) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `mobile_no` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_ID`, `team_ID`, `schedule_ID`, `fname`, `mname`, `lname`, `sex`, `date_of_birth`, `address`, `mobile_no`, `email`, `password`, `is_active`) VALUES
(1234, 4567, 3456, 'joanna', 'santos', 'marasigan', 'female', NULL, NULL, NULL, NULL, 'adminpass', 1),
(2345, 1234, 2345, 'robert', 'sixto', 'borja', 'male', NULL, NULL, NULL, NULL, 'emppass1', 1),
(3456, 3456, 5678, 'gilbert', 'tevelio', 'reyes', 'male', NULL, NULL, NULL, NULL, 'emppass2', 1),
(4567, 2345, 5678, 'rodel', 'debian', 'mangiliman', 'male', NULL, NULL, NULL, NULL, 'emppass3', 1),
(5678, 3456, 2345, 'sonny', 'lacson', 'caraig', 'male', NULL, NULL, NULL, NULL, 'emppass4', 1),
(6789, 3456, 2345, 'Dalia', 'Rodriguez', 'Marco', 'female', '1990-09-30', 'Taguig City', NULL, NULL, 'emppass5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`,`team_ID`,`schedule_ID`),
  ADD KEY `fk_employee_designation_team1_idx` (`team_ID`),
  ADD KEY `fk_employee_schedule1_idx` (`schedule_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_designation_team1` FOREIGN KEY (`team_ID`) REFERENCES `designation_team` (`team_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_schedule1` FOREIGN KEY (`schedule_ID`) REFERENCES `schedule` (`schedule_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
