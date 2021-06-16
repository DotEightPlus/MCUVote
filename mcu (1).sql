-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 02:05 PM
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

--
-- Dumping data for table `secure`
--

INSERT INTO `secure` (`id`, `ip`, `category`, `matric`) VALUES
(274, '::1', 'dress_female', '180301008');

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
(2, 'Otemoye Olamilekan', 'fresh_male', 0),
(3, 'George Ibukun', 'fresh_female', 0),
(4, 'Folaji Phoebe', 'fresh_female', 0),
(5, 'Adeleye Korede', 'mr', 0),
(6, 'Femi Adenola', 'mr', 0),
(7, 'Opara David', 'mr', 0),
(8, 'Uchea Daniel', 'mr', 0),
(11, 'Omomia Favour', 'miss', 0),
(12, 'Elijah Christiana', 'miss', 0),
(13, 'Aremu Ololade', 'miss', 0),
(14, 'Olagunju Oluwatoke', 'miss', 0),
(15, 'Oginni Precious', 'miss', 0),
(16, 'Ayodele Abigael', 'miss', 0),
(17, 'Oluyombo Erioluwa', 'maleperson', 0),
(18, 'Oladapo Tioluwani', 'maleperson', 0),
(19, 'Abiona Eniola', 'femaleperson', 0),
(20, 'Soyemi Melody', 'femaleperson', 0),
(21, 'Ikobi Stephen', 'enter_male', 0),
(22, 'Balogun Temitope', 'enter_male', 0),
(23, 'Oluyombo Erioluwa', 'enter_male', 0),
(24, 'Folaji Daniel', 'enter_male', 0),
(25, 'Adooga Stephen', 'enter_male', 0),
(26, 'Ibukun', 'enter_male', 0),
(27, 'Oni Oluwakemi', 'enter_female', 0),
(28, 'Ojo Eunice', 'enter_female', 0),
(29, 'Ayaeibo Pere-ere', 'enter_female', 0),
(30, 'Omopariola Anjola', 'enter_female', 0),
(31, 'Okechukwu Doreen', 'enter_female', 0),
(32, 'Otemoye Olamilekan', 'sport_man', 0),
(33, 'Adejimi Fiyinfoluwa', 'sport_man', 0),
(34, 'Nwoekocha Chima', 'sport_man', 0),
(35, 'Adeniran Timileyin', 'sport_man', 0),
(36, 'Oladipo Timileyin', 'sport_man', 0),
(37, 'Gbadamosi Oluwatobi', 'sport_man', 0),
(38, 'Omomia Favour', 'sport_woman', 0),
(39, 'Abraham Victoria', 'sport_woman', 0),
(40, 'Nwana Grace', 'sport_woman', 0),
(41, 'Adetayo Boluwatife', 'sport_woman', 0),
(45, 'Akinmola Ayomide', 'dress_male', 0),
(46, 'Balogun Temitope', 'dress_male', 0),
(47, 'Oluyitan Victor', 'dress_male', 0),
(48, 'Abiona Oluwatobiloba', 'dress_male', 0),
(49, 'Adesanya Dayo', 'dress_male', 0),
(50, 'Oyebanji Tobi', 'dress_male', 0),
(51, 'Wisdom Promise', 'dress_female', 0),
(52, 'Adeyemi Praise', 'dress_female', 0),
(53, 'Jimoh Busola', 'dress_female', 0),
(54, 'Ayodele Abigael', 'dress_female', 0),
(55, 'Adesida Bukola', 'dress_female', 0),
(56, 'George Ibukun', 'dress_female', 0),
(336, 'Ewarawon Fola', 'fresh_male', 0),
(337, 'Gbadamosi Oluwatobi', 'fresh_male', 0),
(338, 'Flourish Aderohunmmu', 'fresh_female', 0),
(339, 'Ibifubara Kambi', 'fresh_female', 0),
(340, 'Solomon Daye-Abasi', 'maleperson', 0),
(341, 'Atanda Precious', 'femaleperson', 0),
(342, 'Ologun Oyinkansola', 'femaleperson', 0),
(343, 'Alao Remi Dayo', 'sport_man', 0),
(344, 'Adesanya Dayo', 'sport_man', 0),
(345, 'Rasheed Loveth', 'sport_woman', 0),
(346, 'Ogundare Omotola', 'sport_woman', 0),
(347, 'Akowoleyin Beloveth', 'sport_woman', 0),
(349, 'Ewarawon Fola', 'dress_male', 0),
(350, 'Oyakhilome Caleb', 'dress_male', 0),
(351, 'Kolawole Cole', 'dress_male', 0),
(352, 'Ewelike Kelvin', 'dress_male', 0),
(353, 'Ologun Oyinkansola', 'dress_female', 0),
(354, 'Oginni Precious', 'dress_female', 0),
(355, 'Flourish Aderohunmmu', 'dress_female', 0),
(356, 'Manliki Iyiola', 'dress_female', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
