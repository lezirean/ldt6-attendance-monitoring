-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Feb 01, 2023 at 02:32 PM
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
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_ID` int(11) NOT NULL,
  `schedule_ID` int(11) NOT NULL,
  `employee_ID` int(11) NOT NULL,
  `time_in` time NOT NULL DEFAULT current_timestamp(),
  `time_out` time DEFAULT NULL,
  `date_today` date DEFAULT NULL,
  `has_schedule` time DEFAULT NULL,
  `is_approved_overtime` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `designation_team`
--

CREATE TABLE `designation_team` (
  `team_ID` int(4) NOT NULL,
  `team_name` varchar(45) NOT NULL,
  `team_description` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `designation_team`
--

INSERT INTO `designation_team` (`team_ID`, `team_name`, `team_description`) VALUES
(1234, 'Installation', NULL),
(2345, 'PMS/Repair', NULL),
(3456, 'Aircon', NULL),
(4567, 'Admin', 'Administration Team');

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

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_ID` int(4) NOT NULL,
  `mon_time_in` time DEFAULT NULL,
  `mon_time_out` time DEFAULT NULL,
  `tues_time_in` time DEFAULT NULL,
  `tues_time_out` time DEFAULT NULL,
  `wed_time_in` time DEFAULT NULL,
  `wed_time_out` time DEFAULT NULL,
  `thurs_time_in` time DEFAULT NULL,
  `thurs_time_out` time DEFAULT NULL,
  `fri_time_in` time DEFAULT NULL,
  `fri_time_out` time DEFAULT NULL,
  `sat_time_in` time DEFAULT NULL,
  `sat_time_out` time DEFAULT NULL,
  `sun_time_in` time DEFAULT NULL,
  `sun_time_out` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_ID`, `mon_time_in`, `mon_time_out`, `tues_time_in`, `tues_time_out`, `wed_time_in`, `wed_time_out`, `thurs_time_in`, `thurs_time_out`, `fri_time_in`, `fri_time_out`, `sat_time_in`, `sat_time_out`, `sun_time_in`, `sun_time_out`) VALUES
(1234, '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00'),
(2345, NULL, NULL, '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00', NULL, NULL),
(3456, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL),
(4567, '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL),
(5678, NULL, NULL, NULL, NULL, '08:00:00', '17:00:00', NULL, NULL, '08:00:00', '17:00:00', '08:00:00', '17:00:00', '08:00:00', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_ID`,`schedule_ID`,`employee_ID`),
  ADD KEY `fk_attendance_schedule_idx` (`schedule_ID`),
  ADD KEY `fk_attendance_employee1_idx` (`employee_ID`);

--
-- Indexes for table `designation_team`
--
ALTER TABLE `designation_team`
  ADD PRIMARY KEY (`team_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_ID`,`team_ID`,`schedule_ID`),
  ADD KEY `fk_employee_designation_team1_idx` (`team_ID`),
  ADD KEY `fk_employee_schedule1_idx` (`schedule_ID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attendance_employee1` FOREIGN KEY (`employee_ID`) REFERENCES `employee` (`employee_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_attendance_schedule` FOREIGN KEY (`schedule_ID`) REFERENCES `schedule` (`schedule_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
