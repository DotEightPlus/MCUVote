-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 02:45 PM
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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `sn`, `matric`, `name`, `dept`, `gend`, `email`, `date`, `active`, `ip`) VALUES
(41, '1', '23456765432', 'Aholu Samuel Viavor', 'Accounting', 'Male', 'samuelaholu15@gmail.com', '2001-06-21 01:24:51', '0', '::1');

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
(2, 'Olamilekan', 'fresh_male', 0),
(3, 'George Ibukun', 'fresh_female', 0),
(4, 'Folaji Phoebe', 'fresh_female', 0),
(5, 'Adeleye Korede', 'mr', 0),
(6, 'Akinmola Ayomide', 'mr', 0),
(7, 'Opara David', 'mr', 0),
(8, 'Kambi Tomisin', 'mr', 0),
(9, 'Kumuyi Wisdom', 'mr', 0),
(10, 'Ewelike Kelvin', 'mr', 0),
(11, 'Omomia Favour', 'miss', 0),
(12, 'Rasheed Loveth', 'miss', 0),
(13, 'Aremu Ololade', 'miss', 0),
(14, 'Olagunju Oluwatoke', 'miss', 0),
(15, 'Atanda Precious', 'miss', 0),
(16, 'Ologun Oyinkansola', 'miss', 0),
(17, 'Oluyombo Erioluwa', 'maleperson', 0),
(18, 'Oladapo Tioluwani', 'maleperson', 0),
(19, 'Abiona Eniola', 'femaleperson', 0),
(20, 'Akinsulere Oluwakemi', 'femaleperson', 0),
(21, 'Ikobi Stephen', 'enter_male', 0),
(22, 'Balogun Temitope', 'enter_male', 0),
(23, 'Oluyombo Erioluwa', 'enter_male', 0),
(24, 'Folaji Daniel', 'enter_male', 0),
(25, 'Adooga Stephen', 'enter_male', 0),
(26, 'Ibukun', 'enter_male', 0),
(27, 'Oni Oluwakemi', 'enter_female', 0),
(28, 'Ojo Eunice', 'enter_female', 0),
(29, 'Ayaeibo Pere-ere', 'enter_female', 0),
(30, 'Oladimeji Olayinka', 'enter_female', 0),
(31, 'Okechukwu Doreen', 'enter_female', 0),
(32, 'Ajibade Adeife', 'sport_man', 0),
(33, 'Adejimi Fiyinfoluwa', 'sport_man', 0),
(34, 'Nwoekocha Chima', 'sport_man', 0),
(35, 'Adeniran Timileyin', 'sport_man', 0),
(36, 'Oladipo Timileyin', 'sport_man', 0),
(37, 'Kazeem Rufai', 'sport_man', 0),
(38, 'Omomia Favour', 'sport_woman', 0),
(39, 'Ayaeyibo Pereere', 'sport_woman', 0),
(40, 'Nwana Grace', 'sport_woman', 0),
(41, 'Adediran Aderonke', 'sport_woman', 0),
(45, 'Akinmola Ayomide', 'dress_male', 0),
(46, 'Balogun Temitope', 'dress_male', 0),
(47, 'Oluyitan Victor', 'dress_male', 0),
(48, 'Abiona Oluwatobiloba', 'dress_male', 0),
(49, 'Adesanya Dayo', 'dress_male', 0),
(50, 'Kumuyi Wisdom', 'dress_male', 0),
(51, 'Wisdom Promise', 'dress_female', 0),
(52, 'Adeyemi Praise', 'dress_female', 0),
(53, 'Jimoh Busola', 'dress_female', 0),
(54, 'Ayodele Abigael', 'dress_female', 0),
(55, 'Adesida Bukola', 'dress_female', 0),
(56, 'Balogun Solape', 'dress_female', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=334;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
