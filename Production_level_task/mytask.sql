-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 03:49 PM
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
-- Database: `mytask`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `userID` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userEmail` varchar(20) NOT NULL,
  `userAge` int(150) NOT NULL,
  `userGender` varchar(10) NOT NULL,
  `userPasword` varchar(100) NOT NULL,
  `userProfile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`userID`, `userName`, `userEmail`, `userAge`, `userGender`, `userPasword`, `userProfile`) VALUES
(8, 'zain', 'zain@gmail.com', 23, 'Male', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'abcd'),
(9, 'amar', 'amar@gmail.com', 21, 'Male', 'f709bfa88aa8cb69ffb8ebacb2e2313abd8390b8', 'abcd'),
(10, 'ahmad', 'ahmad@gmail.com', 18, 'Male', 'a53a33601b8dd9d06ae9e50f1f30fbe957aba866', 'abcd'),
(11, 'ahmad', 'ahmad@gmail.com', 18, 'Male', 'a53a33601b8dd9d06ae9e50f1f30fbe957aba866', 'abcd'),
(12, 'Ali Ahmad', 'ali@gmail.com', 18, 'Male', 'e697ef18d3fa82e0fcd427a989a86c694b547c64', 'abcd'),
(13, 'Burhan ali', 'Burhan@gmail.com', 20, 'Male', '242c3ed37c029200aa6e18f1034b7b2dbb47139c', 'abcd'),
(14, 'Saif', 'saif@gmail.com', 20, 'Male', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'abcd'),
(15, 'Touqeer', 'touqeer@gmail.com', 20, 'Male', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'abcd'),
(16, 'waleed', 'waleed@gmail.com', 20, 'Male', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'abcd'),
(17, 'ibad', 'ibad@gmail.com', 20, 'Male', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1670509442-Capture-removebg-pr'),
(18, 'Ammaz', 'Ammaz@gmail.com', 18, 'Male', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1670506368-10042015588.bmp');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
