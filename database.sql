-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 04:45 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mcu`
--

-- --------------------------------------------------------

--
-- Table structure for table `secure`
--

CREATE TABLE `secure` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `category` text NOT NULL,
  `matric` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `sn` text NOT NULL,
  `matric` text NOT NULL,
  `name` text NOT NULL,
  `dept` text NOT NULL,
  `gend` text NOT NULL,
  `email` text NOT NULL,
  `date` datetime NOT NULL,
  `active` text NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `votes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `name`, `category`, `votes`) VALUES
(1, 'Ajibade Adeife', 'fresh_male', 0),
(2, 'Olamilekan', 'fresh_male', 4),
(3, 'George Ibukun', 'fresh_female', 4),
(4, 'Folaji Phoebe', 'fresh_female', 4),
(5, 'Adeleye Korede', 'mr', 3),
(6, 'Akinmola Ayomide', 'mr', 0),
(7, 'Opara David', 'mr', 2),
(8, 'Kambi Tomisin', 'mr', 2),
(9, 'Kumuyi Wisdom', 'mr', 0),
(10, 'Ewelike Kelvin', 'mr', 0),
(11, 'Omomia Favour', 'miss', 2),
(12, 'Rasheed Loveth', 'miss', 0),
(13, 'Aremu Ololade', 'miss', 2),
(14, 'Olagunju Oluwatoke', 'miss', 0),
(15, 'Atanda Precious', 'miss', 0),
(16, 'Ologun Oyinkansola', 'miss', 0),
(17, 'oluyombo', 'male_person', 0),
(18, 'oladapo', 'male_person', 0),
(19, 'abiona', 'female_person', 0),
(20, 'akinsulere', 'female_person', 0),
(21, 'ikobi', 'enter_male', 0),
(22, 'balogun', 'enter_male', 0),
(23, 'oluyombo', 'enter_male', 1),
(24, 'folaji', 'enter_male', 1),
(25, 'adooga', 'enter_male', 1),
(26, 'ibukun', 'enter_male', 1),
(27, 'oni', 'enter_female', 1),
(28, 'ojo', 'enter_female', 1),
(29, 'ayaeyibo', 'enter_female', 1),
(30, 'oladimiji', 'enter_female', 1),
(31, 'okechukwu', 'enter_female', 1),
(32, 'ajibade', 'sport_man', 1),
(33, 'adejimi', 'sport_man', 1),
(34, 'nwoekocha', 'sport_man', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `secure`
--
ALTER TABLE `secure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `secure`
--
ALTER TABLE `secure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
