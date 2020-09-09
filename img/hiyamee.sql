-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 09, 2020 at 07:37 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiyamee`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `customer` text DEFAULT NULL,
  `recuiter` text DEFAULT NULL,
  `job_title` text DEFAULT NULL,
  `primary_skill` text DEFAULT NULL,
  `candidate_name` text DEFAULT NULL,
  `candidate_email` text DEFAULT NULL,
  `candidate_phone` text DEFAULT NULL,
  `interviewer_name` text DEFAULT NULL,
  `interviewer_phone` text DEFAULT NULL,
  `profile_received` text DEFAULT NULL,
  `scheduled_on` text DEFAULT NULL,
  `interview_status` text DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `reschedule_count` text DEFAULT NULL,
  `interview_outcome` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `customer`, `recuiter`, `job_title`, `primary_skill`, `candidate_name`, `candidate_email`, `candidate_phone`, `interviewer_name`, `interviewer_phone`, `profile_received`, `scheduled_on`, `interview_status`, `notes`, `reschedule_count`, `interview_outcome`, `created_at`) VALUES
(1, 'Nyxwolves', 'Jothicharan', 'Web Developer', 'PHP', 'praveenram', 'praveen@nyxwolves.com', '9876543210', 'Jothicharan', '9876542103', '2020-09-08T08:00', '2020-09-09T09:00', 'Interviewed', 'Good At PHP', '0', 'Selected', '2020-09-09 05:31:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `created_at`) VALUES
(1, 'Admin', 'admin@hiyamee.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', '2020-09-09 04:43:38'),
(2, 'Recruiter', 'recruiter@hiyamee.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'recruiter', '2020-09-09 04:44:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
