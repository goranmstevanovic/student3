-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2019 at 09:34 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `school_boards`
--

CREATE TABLE `school_boards` (
  `id` tinyint(4) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school_boards`
--

INSERT INTO `school_boards` (`id`, `name`, `description`) VALUES
(1, 'CSM', 'pass if the average is bigger or equal to 7 and fail otherwise'),
(2, 'CSMB', 'discards the lowest grade, if you have more than 2 grades, and considers pass if\r\nhis biggest grade is bigger than 8');

-- --------------------------------------------------------

--
-- Table structure for table `school_grades`
--

CREATE TABLE `school_grades` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `grade1` tinyint(4) DEFAULT NULL,
  `grade2` tinyint(4) DEFAULT NULL,
  `grade3` tinyint(4) DEFAULT NULL,
  `grade4` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school_grades`
--

INSERT INTO `school_grades` (`id`, `id_student`, `grade1`, `grade2`, `grade3`, `grade4`) VALUES
(16, 19, 9, 9, 9, 9),
(20, 16, 9, 9, 9, 10),
(21, 15, 9, 8, 7, 10),
(23, 21, 9, 8, 7, 10),
(25, 6, 8, 8, 9, 9),
(26, 4, 7, 6, 6, 6),
(27, 2, 7, 10, 7, 10),
(28, 1, 10, 9, 7, 5),
(29, 20, 9, 9, 9, 9),
(30, 31, 7, 7, 7, 7),
(31, 9, 9, 9, 9, 10),
(32, 3, 7, 8, 9, 6),
(33, 5, 8, 8, 8, 8),
(34, 32, 9, 5, 5, 9),
(35, 33, 5, 6, 5, 8),
(36, 34, 8, 9, 9, 9),
(37, 35, 6, 8, 7, 5),
(38, 36, 5, 5, 5, 5),
(39, 39, 8, 8, 9, 10);

-- --------------------------------------------------------

--
-- Table structure for table `school_grades1`
--

CREATE TABLE `school_grades1` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `grade1` tinyint(4) DEFAULT NULL,
  `grade2` tinyint(4) DEFAULT NULL,
  `grade3` tinyint(4) DEFAULT NULL,
  `grade4` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `school_grades1`
--

INSERT INTO `school_grades1` (`id`, `id_student`, `grade1`, `grade2`, `grade3`, `grade4`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3),
(4, 4, 4, 4, 4, 4),
(5, 5, 5, 5, 5, 5),
(6, 6, 6, 6, 6, 6),
(7, 7, 7, 7, 7, 7),
(8, 8, 8, 8, 8, 8),
(9, 9, 9, 9, 9, 9),
(10, 10, 10, 10, 10, 10),
(11, 0, 0, 0, 0, 0),
(12, 0, 0, 0, 0, 0),
(13, 1, 1, 1, 1, 1),
(14, 2, 2, 2, 2, 2),
(15, 3, 3, 3, 3, 3),
(16, 4, 4, 4, 4, 4),
(17, 5, 5, 5, 5, 5),
(18, 6, 6, 6, 6, 6),
(19, 7, 7, 7, 7, 7),
(20, 8, 8, 8, 8, 8),
(21, 9, 9, 9, 9, 9),
(22, 10, 10, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `jmbg` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_school_board` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `surname`, `jmbg`, `address`, `id_school_board`) VALUES
(1, 'Milan', 'Milovanovic', '03119677228262', 'Moja uLica BB ', 2),
(2, 'Miladin', 'Miladinovic', '01009128383774747', 'Neka ulica', 1),
(3, 'Jelica', 'Sretenovic', '03112255665654', 'ulicaaa', 2),
(4, 'Goran', 'Stevanovic', '0311967722826', 'Neka', 1),
(5, 'Luka ', 'Stevanovic', '3009003722826', 'Debarska 4', 2),
(6, 'Miroslav', 'Ilic', '2502194788552', 'matevacka 8', 1),
(9, 'Goran', 'Goranovic', '0311967722826', 'Debarska 4', 2),
(15, 'Sreten', 'Sretenovic', '01009128383774747', 'aaaaaaaaaaaaa', 1),
(19, 'Zaklina', 'Zaklinovic', '0302971252427', 'Moravska 88', 2),
(20, 'Goran', 'Goranovic', '0311967722826', 'Debarska 4', 2),
(32, 'Dejan', 'Goranovic', '0311967722826', 'aaaaaaaaaaa', 2),
(34, 'Zoran', 'Zoranovic', '332255447788', 'Zoranova adresa BB', 1),
(35, 'Dukat', 'Dukatovic', '00112233445566', 'Dukatova BB', 2),
(36, 'Muslin', 'Muslinovic', '11223344556677', 'Muslinova BB', 2),
(37, 'Dobrivoje', 'Dobrivojevic', '88776655443322', 'Dobrivojeva', 2),
(38, 'Zivorad', 'Zivoradovic', '5566447711', 'Zivoradova', 1),
(39, 'Miki', 'Mikic', '99663322558', 'Mikijeva', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `school_boards`
--
ALTER TABLE `school_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_grades`
--
ALTER TABLE `school_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_grades1`
--
ALTER TABLE `school_grades1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `school_boards`
--
ALTER TABLE `school_boards`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_grades`
--
ALTER TABLE `school_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `school_grades1`
--
ALTER TABLE `school_grades1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
