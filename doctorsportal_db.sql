-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 09:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctorsportal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`, `created_datetime`, `status`) VALUES
(1, 'John Doe', 'admin', 'admin', '0000-00-00 00:00:00', 0),
(2, 'Adam', 'admin123', 'admin123', '2023-03-20 17:40:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `allot_doctor_to_patient`
--

CREATE TABLE `allot_doctor_to_patient` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `disease_name` varchar(255) NOT NULL,
  `appointment_datetime` datetime NOT NULL,
  `last_appointment_datetime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allot_doctor_to_patient`
--

INSERT INTO `allot_doctor_to_patient` (`id`, `doctor_id`, `patient_id`, `disease_name`, `appointment_datetime`, `last_appointment_datetime`, `status`) VALUES
(1, 1, 1, 'cancer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `primary_contact_number` varchar(20) NOT NULL,
  `secondary_contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `adharcard_number` varchar(20) NOT NULL,
  `pancard_number` varchar(20) NOT NULL,
  `joining_date` date NOT NULL,
  `speciality_id` int(11) NOT NULL,
  `visit_time_from` time NOT NULL,
  `visit_time_to` time NOT NULL,
  `created_date` datetime NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `fullname`, `email_id`, `primary_contact_number`, `secondary_contact_number`, `address`, `adharcard_number`, `pancard_number`, `joining_date`, `speciality_id`, `visit_time_from`, `visit_time_to`, `created_date`, `username`, `password`, `status`) VALUES
(1, 'Sarah Smith', 'sarahsmith@example.com', '1234567890', '9876543210', '123 Main St, Anytown', '123456789012', 'ABCDE1234F', '2023-03-20', 1, '09:00:00', '17:00:00', '2023-03-20 00:00:00', 'SarahSmith', 'Sarah123', 1),
(2, 'Dr. John Smith', 'johnsmith@example.com', '234234567', '1231234536', '456 Park Avenue', '2143 8765 0293', 'WQER4321K', '2022-01-01', 1, '09:00:00', '17:00:00', '2022-01-01 00:00:00', 'johnsmith', 'john123', 1),
(3, 'Dr. Sarah Lee', 'sarahlee@example.com', '9998887776', '5554443332', '789 Elm Street', '1234 5678 9012', 'VFED2345K', '2022-03-03', 3, '10:00:00', '18:00:00', '2023-01-01 00:00:00', 'sarahlee', 'sarahlee123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `primary_contact_number` varchar(20) NOT NULL,
  `secondary_contact_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `adharcard_number` varchar(20) NOT NULL,
  `pancard_number` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `fullname`, `primary_contact_number`, `secondary_contact_number`, `address`, `adharcard_number`, `pancard_number`, `username`, `password`, `status`) VALUES
(1, 'Jane Doe', '9876543210', '0987654321', '456 Oak Street', '1122 3344 5566', 'OMEN7968K', 'jahndoe', 'jane123', 1),
(2, 'Bob Smith', '1234567890', '0987654321', '789 Elm Street', '1212 2121 2332', 'CDAS2234k', 'bobsmith', 'bob123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `speciality`
--

CREATE TABLE `speciality` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `speciality`
--

INSERT INTO `speciality` (`id`, `title`, `status`) VALUES
(1, 'Cardiologist', 1),
(2, 'Dermatologist', 1),
(3, 'Gynecologist', 1),
(4, 'Neurologist', 1),
(5, 'Psychiatrist', 1),
(6, 'Surgeon', 1),
(7, 'Urologist', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allot_doctor_to_patient`
--
ALTER TABLE `allot_doctor_to_patient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `speciality_id` (`speciality_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `speciality`
--
ALTER TABLE `speciality`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `allot_doctor_to_patient`
--
ALTER TABLE `allot_doctor_to_patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `speciality`
--
ALTER TABLE `speciality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allot_doctor_to_patient`
--
ALTER TABLE `allot_doctor_to_patient`
  ADD CONSTRAINT `allot_doctor_to_patient_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`),
  ADD CONSTRAINT `allot_doctor_to_patient_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`speciality_id`) REFERENCES `speciality` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
