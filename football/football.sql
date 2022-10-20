-- phpMyAdmin SQL Dump
-- version 4.6.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2022 at 05:59 PM
-- Server version: 5.7.13-log
-- PHP Version: 5.6.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `id` int(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `IdTeamOne` int(10) NOT NULL,
  `IdTeamTWO` int(10) NOT NULL,
  `ATeamOne` int(2) NOT NULL,
  `ATeamTWO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`id`, `type`, `IdTeamOne`, `IdTeamTWO`, `ATeamOne`, `ATeamTWO`) VALUES
(1, 'LEGA', 1, 2, -1, -1),
(2, 'UROP', 2, 1, -1, -1),
(3, 'مباراة ودية', 1, 2, -1, -1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Uid` int(10) NOT NULL,
  `Mid` int(100) NOT NULL,
  `UTeamOne` int(2) NOT NULL,
  `UTeamTwo` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Uid`, `Mid`, `UTeamOne`, `UTeamTwo`) VALUES
(1, 3, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`) VALUES
(1, 'FC Barcalon'),
(2, 'Real Madrid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Aid` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Aid`, `id`, `name`, `email`, `password`) VALUES
(0, 1, 'suahib', 'suhaibzaghal@gmail.com', '12345678'),
(1, 2, 'omer', 'omer@gmail.com', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
