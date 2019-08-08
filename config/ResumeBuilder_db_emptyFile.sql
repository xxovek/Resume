-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2019 at 08:28 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ResumeBuilder_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `emailid` varchar(500) NOT NULL,
  `pass` varchar(10) NOT NULL DEFAULT '12345',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_about`
--

CREATE TABLE `users_about` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `gender` enum('Male','Female','Others') DEFAULT NULL,
  `bdate` date DEFAULT NULL,
  `mailid` varchar(350) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `c_address` text NOT NULL,
  `p_address` text NOT NULL,
  `text_info` text NOT NULL,
  `desription` text NOT NULL,
  `objective` varchar(500) NOT NULL,
  `git_link` varchar(300) NOT NULL,
  `linkedin_link` varchar(300) NOT NULL,
  `twitter_link` varchar(300) NOT NULL,
  `facebook_link` varchar(300) NOT NULL,
  `profile_iname` varchar(10) NOT NULL DEFAULT 'avatar.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_awards`
--

CREATE TABLE `users_awards` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `certificate_name` varchar(200) NOT NULL,
  `aword_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_education`
--

CREATE TABLE `users_education` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `uni` varchar(50) NOT NULL,
  `colgname` varchar(200) NOT NULL,
  `degree_name` varchar(50) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `track` varchar(50) NOT NULL,
  `gpa` float NOT NULL,
  `marks_perc` double NOT NULL,
  `joined_date` date NOT NULL,
  `ended_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_experience`
--

CREATE TABLE `users_experience` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `exp_description` text NOT NULL,
  `join_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_interests`
--

CREATE TABLE `users_interests` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `hobby_name` varchar(100) NOT NULL,
  `hobby_desc` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_skills`
--

CREATE TABLE `users_skills` (
  `id` int(11) NOT NULL,
  `UID` int(11) NOT NULL,
  `skill_name` varchar(200) NOT NULL,
  `skill_desc` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailid` (`emailid`);

--
-- Indexes for table `users_about`
--
ALTER TABLE `users_about`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID_fk1` (`UID`) USING BTREE;

--
-- Indexes for table `users_awards`
--
ALTER TABLE `users_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID_fk2` (`UID`) USING BTREE;

--
-- Indexes for table `users_education`
--
ALTER TABLE `users_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID_fk3` (`UID`) USING BTREE;

--
-- Indexes for table `users_experience`
--
ALTER TABLE `users_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID_fk4` (`UID`) USING BTREE;

--
-- Indexes for table `users_interests`
--
ALTER TABLE `users_interests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID_fk5` (`UID`) USING BTREE;

--
-- Indexes for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `UID_fk6` (`UID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_about`
--
ALTER TABLE `users_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_awards`
--
ALTER TABLE `users_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_education`
--
ALTER TABLE `users_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_experience`
--
ALTER TABLE `users_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_interests`
--
ALTER TABLE `users_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users_skills`
--
ALTER TABLE `users_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_about`
--
ALTER TABLE `users_about`
  ADD CONSTRAINT `UID_fk` FOREIGN KEY (`UID`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_awards`
--
ALTER TABLE `users_awards`
  ADD CONSTRAINT `UID_fk1` FOREIGN KEY (`UID`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_education`
--
ALTER TABLE `users_education`
  ADD CONSTRAINT `UID_fk2` FOREIGN KEY (`UID`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_experience`
--
ALTER TABLE `users_experience`
  ADD CONSTRAINT `UID_fk3` FOREIGN KEY (`UID`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_interests`
--
ALTER TABLE `users_interests`
  ADD CONSTRAINT `UID_fk4` FOREIGN KEY (`UID`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_skills`
--
ALTER TABLE `users_skills`
  ADD CONSTRAINT `UID_fk5` FOREIGN KEY (`UID`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
