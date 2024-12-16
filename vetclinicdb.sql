-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 03:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vetclinicdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_facility_information`
--

CREATE TABLE `animal_facility_information` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `petitioner_id` int(11) NOT NULL,
  `selected_role` int(11) NOT NULL,
  `facility_address_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `submitted_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `animal_facility_information`
--

INSERT INTO `animal_facility_information` (`facility_id`, `facility_name`, `mobile_number`, `email_address`, `petitioner_id`, `selected_role`, `facility_address_id`, `status`, `submitted_date`) VALUES
(1, 'Paws Doctor', '09303860250', 'pawsdoctor@gmail.com', 2, 5, 1, 'approved', '2024-12-09 21:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `breed_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `breed_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`breed_id`, `species_id`, `breed_name`) VALUES
(1, 1, 'Aspin'),
(2, 1, 'Golden Retriever'),
(3, 1, 'dasds');

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `condition_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `symptom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`condition_id`, `pet_id`, `symptom`, `description`, `created_at`) VALUES
(1, 49, 'Cough', 'Cough concurrent with ocular discharge, nasal discharge, sneeze or heightened airway\r\nnoise', '2024-12-13 11:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `facility_address`
--

CREATE TABLE `facility_address` (
  `facility_address_id` int(11) NOT NULL,
  `region` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `building_number` varchar(50) DEFAULT NULL,
  `block` varchar(50) DEFAULT NULL,
  `lot_number` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `sitio` varchar(100) DEFAULT NULL,
  `subdivision` varchar(100) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facility_address`
--

INSERT INTO `facility_address` (`facility_address_id`, `region`, `province`, `city`, `barangay`, `municipality`, `building_number`, `block`, `lot_number`, `street`, `sitio`, `subdivision`, `village`) VALUES
(1, 'Mindanao', 'Davao del Sur', 'Davao City', 'Toril', 'Davao', '2F8X+FGQ', '', '', 'De Guzman St', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `petitioner_address`
--

CREATE TABLE `petitioner_address` (
  `address_id` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `municipality` varchar(100) DEFAULT NULL,
  `building_number` varchar(50) DEFAULT NULL,
  `block` varchar(50) DEFAULT NULL,
  `lot_number` varchar(50) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `sitio` varchar(100) DEFAULT NULL,
  `subdivision` varchar(100) DEFAULT NULL,
  `village` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petitioner_address`
--

INSERT INTO `petitioner_address` (`address_id`, `region`, `province`, `city`, `barangay`, `municipality`, `building_number`, `block`, `lot_number`, `street`, `sitio`, `subdivision`, `village`) VALUES
(1, 'Unknown', 'Unknown', 'Unknown', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Mindanao', 'Davao del Sur', 'Davao City', 'Toril', 'Davao', '', 'block 6', 'lot 2', '', 'sitio 1', '', 'tukbisa village'),
(3, 'Mindanao', 'Davao del Sur', 'Davao City', 'Dacudao', 'Davao', '', '', '', 'Dacudao Street', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `petitioner_information`
--

CREATE TABLE `petitioner_information` (
  `petitioner_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `name_extension` varchar(10) DEFAULT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petitioner_information`
--

INSERT INTO `petitioner_information` (`petitioner_id`, `email`, `password`, `surname`, `firstname`, `middlename`, `name_extension`, `mobile_number`, `role_id`, `address_id`, `created_at`) VALUES
(1, 'admin@gmail.com', '$2y$10$8SV7Z2mPkF3PWhHvSGyp5.iWjEbKC3E2AbBjoq8o42WFitmCiQSZ.', 'Unknown', 'Unknown', 'Unknown', '', '09271572108', 6, 1, '2024-12-09 12:24:47'),
(2, 'evangs111@gmail.com', '$2y$10$dp5lZY/GU5vaQo7vgwFkeu5G5CBaSpm91eUFx9AyiP16XNcJMrW4e', 'Ruelo', 'John Joseph', 'E', '', '09271572108', 5, 2, '2024-12-09 13:46:55'),
(3, 'katmie.lolo@gmail.com', '$2y$10$evaDb0AM0qXW4VEd24uuVuGIeaAey78pdkHS/0DGfFpCRTaDf7fxm', 'Lolo', 'Katrina', 'R', '', '09271572109', 1, 3, '2024-12-10 06:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `pet_images`
--

CREATE TABLE `pet_images` (
  `image_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_images`
--

INSERT INTO `pet_images` (`image_id`, `pet_id`, `image_path`) VALUES
(48, 49, 'PetImages/GD-Homepage-Manton-Mobile.jpg'),
(49, 50, 'PetImages/pets1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pet_information`
--

CREATE TABLE `pet_information` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `birthdate` date NOT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `distinguishing_marks` text DEFAULT NULL,
  `species_id` int(11) NOT NULL,
  `breed_id` int(11) NOT NULL,
  `petitioner_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pet_information`
--

INSERT INTO `pet_information` (`pet_id`, `pet_name`, `gender`, `birthdate`, `weight`, `color`, `distinguishing_marks`, `species_id`, `breed_id`, `petitioner_id`) VALUES
(49, 'Pipay', 'Male', '2023-01-01', 23.00, 'brown', 'white spots in the eyes', 1, 1, 3),
(50, 'barny', 'Male', '2022-05-11', 25.00, 'brown', 'white spots', 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(6, 'admin'),
(3, 'manager'),
(5, 'office_in_charge'),
(2, 'owner'),
(1, 'user'),
(4, 'veterinarian');

-- --------------------------------------------------------

--
-- Table structure for table `service_logs`
--

CREATE TABLE `service_logs` (
  `service_id` int(11) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_logs`
--

INSERT INTO `service_logs` (`service_id`, `service_type`, `description`, `created_by`, `created_at`) VALUES
(2, 'Vaccines', 'Vaccinate your pets to protect them from unwanted yet preventive diseases susch as parvo-virus and distemper', 2, '2024-12-10 07:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `species_id` int(11) NOT NULL,
  `species_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`species_id`, `species_name`) VALUES
(1, 'Dog');

-- --------------------------------------------------------

--
-- Table structure for table `vaccinations`
--

CREATE TABLE `vaccinations` (
  `vaccination_id` int(11) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `vaccine_name` varchar(255) NOT NULL,
  `vaccination_date` date NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vaccinations`
--

INSERT INTO `vaccinations` (`vaccination_id`, `pet_id`, `vaccine_name`, `vaccination_date`, `expiry_date`) VALUES
(48, 49, 'anti-rabies', '2024-12-11', '2025-12-25'),
(49, 50, 'anti-rabies', '2024-05-11', '2024-12-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_facility_information`
--
ALTER TABLE `animal_facility_information`
  ADD PRIMARY KEY (`facility_id`),
  ADD KEY `petitioner_id` (`petitioner_id`),
  ADD KEY `selected_role` (`selected_role`),
  ADD KEY `facility_address_id` (`facility_address_id`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`breed_id`),
  ADD KEY `species_id` (`species_id`);

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
  ADD PRIMARY KEY (`condition_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `facility_address`
--
ALTER TABLE `facility_address`
  ADD PRIMARY KEY (`facility_address_id`);

--
-- Indexes for table `petitioner_address`
--
ALTER TABLE `petitioner_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `petitioner_information`
--
ALTER TABLE `petitioner_information`
  ADD PRIMARY KEY (`petitioner_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `pet_images`
--
ALTER TABLE `pet_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- Indexes for table `pet_information`
--
ALTER TABLE `pet_information`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `species_id` (`species_id`),
  ADD KEY `breed_id` (`breed_id`),
  ADD KEY `petitioner_id` (`petitioner_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `service_logs`
--
ALTER TABLE `service_logs`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`species_id`);

--
-- Indexes for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD PRIMARY KEY (`vaccination_id`),
  ADD KEY `pet_id` (`pet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_facility_information`
--
ALTER TABLE `animal_facility_information`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `breed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `condition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `facility_address`
--
ALTER TABLE `facility_address`
  MODIFY `facility_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petitioner_address`
--
ALTER TABLE `petitioner_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petitioner_information`
--
ALTER TABLE `petitioner_information`
  MODIFY `petitioner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pet_images`
--
ALTER TABLE `pet_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pet_information`
--
ALTER TABLE `pet_information`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_logs`
--
ALTER TABLE `service_logs`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `species_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vaccinations`
--
ALTER TABLE `vaccinations`
  MODIFY `vaccination_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_facility_information`
--
ALTER TABLE `animal_facility_information`
  ADD CONSTRAINT `animal_facility_information_ibfk_1` FOREIGN KEY (`petitioner_id`) REFERENCES `petitioner_information` (`petitioner_id`),
  ADD CONSTRAINT `animal_facility_information_ibfk_2` FOREIGN KEY (`selected_role`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `animal_facility_information_ibfk_3` FOREIGN KEY (`facility_address_id`) REFERENCES `facility_address` (`facility_address_id`) ON DELETE CASCADE;

--
-- Constraints for table `breeds`
--
ALTER TABLE `breeds`
  ADD CONSTRAINT `breeds_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`) ON DELETE CASCADE;

--
-- Constraints for table `conditions`
--
ALTER TABLE `conditions`
  ADD CONSTRAINT `conditions_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet_information` (`pet_id`) ON DELETE CASCADE;

--
-- Constraints for table `petitioner_information`
--
ALTER TABLE `petitioner_information`
  ADD CONSTRAINT `petitioner_information_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `petitioner_information_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `petitioner_address` (`address_id`);

--
-- Constraints for table `pet_images`
--
ALTER TABLE `pet_images`
  ADD CONSTRAINT `pet_images_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet_information` (`pet_id`) ON DELETE CASCADE;

--
-- Constraints for table `pet_information`
--
ALTER TABLE `pet_information`
  ADD CONSTRAINT `pet_information_ibfk_1` FOREIGN KEY (`species_id`) REFERENCES `species` (`species_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pet_information_ibfk_2` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`breed_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pet_information_ibfk_3` FOREIGN KEY (`petitioner_id`) REFERENCES `petitioner_information` (`petitioner_id`) ON DELETE CASCADE;

--
-- Constraints for table `service_logs`
--
ALTER TABLE `service_logs`
  ADD CONSTRAINT `service_logs_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `petitioner_information` (`petitioner_id`) ON DELETE CASCADE;

--
-- Constraints for table `vaccinations`
--
ALTER TABLE `vaccinations`
  ADD CONSTRAINT `vaccinations_ibfk_1` FOREIGN KEY (`pet_id`) REFERENCES `pet_information` (`pet_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
