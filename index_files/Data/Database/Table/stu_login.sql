-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 05:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id19080715_acroboarddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `stu_login`
--

CREATE TABLE `stu_login` (
  `stu_id` int(11) NOT NULL,
  `stu_name` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stu_login`
--

INSERT INTO `stu_login` (`stu_id`, `stu_name`, `stu_email`, `stu_password`) VALUES
(1, 'student1', 'std1@gmail.com', '123'),
(2, 'student2', 'std2@gmail.com', '123'),
(3, 'student3', 'std3@gmail.com', '123'),
(4, 'student4', 'std4@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stu_login`
--
ALTER TABLE `stu_login`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `stu_email_Id` (`stu_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stu_login`
--
ALTER TABLE `stu_login`
  MODIFY `stu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
