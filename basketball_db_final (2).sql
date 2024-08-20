-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 04:37 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
create database if not exists basketball_db;
use basketball_db;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basketball_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CITY_NAME` varchar(20) NOT NULL,
  `CITY_COUNTY` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CITY_NAME`, `CITY_COUNTY`) VALUES
('Ann Arbor', 'Washtenaw County'),
('Detroit', 'Wayne County'),
('East Lansing', 'Ingham County'),
('Rochester', 'Oakland County');

-- --------------------------------------------------------

--
-- Table structure for table `coach`
--

CREATE TABLE `coach` (
  `COACH_ID` int(10) NOT NULL CHECK (`COACH_ID` between 10000 and 99999),
  `COACH_FNAME` varchar(20) NOT NULL,
  `COACH_LNAME` varchar(20) NOT NULL,
  `COACH_TYPE` varchar(20) NOT NULL,
  `TEAM_NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coach`
--

INSERT INTO `coach` (`COACH_ID`, `COACH_FNAME`, `COACH_LNAME`, `COACH_TYPE`, `TEAM_NAME`) VALUES
(10001, 'Greg', 'Kampe', 'Offensive Coach', 'Oakland University'),
(10002, 'Jeff', 'Smith', 'Defensive Coach', 'Oakland University'),
(10003, 'Mychal', 'Covington', 'Physical Training Co', 'Oakland University'),
(10004, 'Mark', 'Montgomery', 'Offensive Coach', 'University of Detroit Mercy'),
(10005, 'Lamar', 'Chapman', 'Defensive Coach', 'University of Detroit Mercy'),
(10006, 'Mike', 'Peck', 'Physical Training Co', 'University of Detroit Mercy'),
(10007, 'Dusty', 'May', 'Offensive Coach', 'University of Michigan'),
(10008, 'Matt', 'Aldred', 'Defensive Coach', 'University of Michigan'),
(10009, 'Phil', 'Martelli', 'Physical Training Co', 'University of Michigan'),
(10010, 'Tom', 'Izzo', 'Offensive Coach', 'Michigan State University'),
(10011, 'Doug', 'Wojcik', 'Defensive Coach', 'Michigan State University'),
(10012, 'Thomas', 'Kelley', 'Physical Training Co', 'Michigan State University');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `PLAYER_ID` int(10) NOT NULL CHECK (`PLAYER_ID` between 10000 and 99999),
  `PLAYER_FNAME` varchar(20) NOT NULL,
  `PLAYER_LNAME` varchar(20) NOT NULL,
  `PLAYER_POINTS` int(5) NOT NULL,
  `PLAYER_REBOUNDS` int(5) NOT NULL,
  `PLAYER_ASSISTS` int(5) NOT NULL,
  `PLAYER_FREETHROWS` int(5) NOT NULL,
  `PLAYER_STEALS` int(5) NOT NULL,
  `PLAYER_BLOCKS` int(5) NOT NULL,
  `PLAYER_POSITION` varchar(20) NOT NULL,
  `TEAM_NAME` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`PLAYER_ID`, `PLAYER_FNAME`, `PLAYER_LNAME`, `PLAYER_POINTS`, `PLAYER_REBOUNDS`, `PLAYER_ASSISTS`, `PLAYER_FREETHROWS`, `PLAYER_STEALS`, `PLAYER_BLOCKS`, `PLAYER_POSITION`, `TEAM_NAME`) VALUES
(20001, 'Rocket', 'Watts', 35, 12, 10, 9, 4, 2, 'Guard', 'Oakland University'),
(20002, 'Michael', 'Rogers', 25, 9, 8, 8, 3, 1, 'Guard', 'Oakland University'),
(20003, 'Chris', 'Conway', 30, 14, 6, 7, 2, 3, 'Forward', 'Oakland University'),
(20004, 'Jack', 'Gohlke', 28, 10, 9, 9, 5, 1, 'Guard', 'Oakland University'),
(20005, 'Trey', 'Townsend', 33, 18, 8, 8, 4, 4, 'Forward', 'Oakland University'),
(20006, 'Blake', 'Lampman', 23, 7, 7, 7, 3, 1, 'Guard', 'Oakland University'),
(20007, 'Aundre', 'Polk', 18, 15, 5, 6, 2, 3, 'Forward', 'Oakland University'),
(20008, 'Isaiah', 'Jones', 30, 16, 9, 8, 4, 2, 'Guard/Forward', 'Oakland University'),
(20009, 'DQ', 'Cole', 20, 6, 8, 7, 3, 1, 'Guard', 'Oakland University'),
(20010, 'Tuburu', 'Naivalurua', 22, 13, 5, 6, 3, 2, 'Forward', 'Oakland University'),
(20011, 'Mak', 'Manciel', 18, 6, 7, 6, 2, 1, 'Guard', 'University of Detroit Mercy'),
(20012, 'Alex', 'Tchikou', 20, 14, 5, 5, 2, 3, 'Forward', 'University of Detroit Mercy'),
(20013, 'Marcus', 'Tankersley', 16, 5, 7, 6, 3, 1, 'Guard', 'University of Detroit Mercy'),
(20014, 'Kyle', 'LeGreair', 15, 4, 6, 5, 2, 1, 'Guard', 'University of Detroit Mercy'),
(20015, 'Emmanuel', 'Kuac', 17, 12, 6, 5, 3, 2, 'Guard/Forward', 'University of Detroit Mercy'),
(20016, 'Abdullah', 'Olajuwon', 18, 7, 8, 6, 3, 1, 'Guard', 'University of Detroit Mercy'),
(20017, 'Donovann', 'Toatley', 20, 8, 9, 7, 4, 2, 'Guard', 'University of Detroit Mercy'),
(20018, 'Jamail', 'Pink', 16, 5, 7, 5, 2, 1, 'Guard', 'University of Detroit Mercy'),
(20019, 'Ryan', 'Hurst', 22, 7, 10, 7, 4, 2, 'Guard', 'University of Detroit Mercy'),
(20020, 'Tyree', 'Davis', 18, 12, 7, 6, 3, 2, 'Forward/Guard', 'University of Detroit Mercy'),
(20021, 'Rubin', 'Jones', 40, 14, 12, 10, 6, 2, 'Guard', 'University of Michigan'),
(20022, 'Danny', 'Wolf', 38, 19, 10, 10, 6, 5, 'Forward', 'University of Michigan'),
(20023, 'Tre', 'Donaldson', 45, 16, 14, 12, 7, 3, 'Guard', 'University of Michigan'),
(20024, 'Roddy', 'Gayle Jr.', 35, 13, 12, 9, 5, 2, 'Guard', 'University of Michigan'),
(20025, 'Sam', 'Walters', 42, 19, 11, 10, 6, 4, 'Forward', 'University of Michigan'),
(20026, 'Vladislav', 'Goldin', 38, 21, 8, 9, 6, 6, 'Center', 'University of Michigan'),
(20027, 'Justin', 'Pippen', 36, 15, 13, 10, 6, 3, 'Combo Guard', 'University of Michigan'),
(20028, 'Lorenzo', 'Cason', 38, 14, 14, 11, 6, 3, 'Combo Guard', 'University of Michigan'),
(20029, 'Christian', 'Anderson Jr.', 40, 12, 12, 10, 5, 2, 'Point Guard', 'University of Michigan'),
(20030, 'Durral', 'Brooks', 42, 14, 14, 12, 6, 3, 'Point Guard', 'University of Michigan'),
(20031, 'Jaden', 'Akins', 30, 10, 12, 8, 5, 2, 'Guard', 'Michigan State University'),
(20032, 'Xavier', 'Booker', 32, 18, 9, 9, 6, 4, 'Forward', 'Michigan State University'),
(20033, 'Coen', 'Carr', 28, 17, 10, 9, 5, 5, 'Forward', 'Michigan State University'),
(20034, 'Carson', 'Cooper', 33, 20, 8, 8, 6, 7, 'Center', 'Michigan State University'),
(20035, 'Jeremy', 'Fears Jr.', 35, 12, 14, 10, 5, 3, 'Guard', 'Michigan State University'),
(20036, 'Frankie', 'Fidler', 26, 15, 10, 8, 5, 3, 'Forward', 'Michigan State University'),
(20037, 'Trejuan', 'Holloman', 32, 10, 12, 9, 5, 2, 'Guard', 'Michigan State University'),
(20038, 'Jaxon', 'Kohler', 29, 15, 9, 8, 5, 4, 'Forward', 'Michigan State University'),
(20039, 'Jase', 'Richardson', 28, 12, 10, 8, 4, 2, 'Guard', 'Michigan State University'),
(20040, 'Szymon', 'Zapala', 24, 19, 6, 7, 5, 5, 'Center', 'Michigan State University');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TEAM_NAME` varchar(40) NOT NULL,
  `TEAM_WINS` int(5) NOT NULL,
  `TEAM_LOSSES` int(5) NOT NULL,
  `TEAM_TIES` int(5) NOT NULL,
  `CITY_NAME` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TEAM_NAME`, `TEAM_WINS`, `TEAM_LOSSES`, `TEAM_TIES`, `CITY_NAME`) VALUES
('Michigan State University', 1, 1, 0, 'East Lansing'),
('Oakland University', 1, 1, 0, 'Rochester'),
('University of Detroit Mercy', 0, 2, 0, 'Detroit'),
('University of Michigan', 2, 0, 0, 'Ann Arbor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `is_admin`) VALUES
(1, 'atillerson@oakland.edu', '$2y$10$VzsD9Vv2ckXzTY68d6Dav.0wr/9aPkkn3sxPdMD967panqOgda616', '2024-08-19 03:32:34', 1),
(2, 'spikespiegel@gmail.com', '$2y$10$5oFpqboyhWBFLygJbYkCQuC05Osv7z97n3xi6lZ5D2.q6an7DL/zS', '2024-08-19 04:16:30', 1),
(4, 'newuser@gmail.com', '$2y$10$1/o4HDz7S2odiQME20H4PuFkXerq2utQEHNXDMXVLGNMqH/0Fa0pK', '2024-08-19 23:36:14', 0),
(5, 'coolname@gmail.com', '$2y$10$rIodu9ExbjBikLBrnp9Tv.8g7tXnRyjIA3PhdvWnzJORUMiuUjCUu', '2024-08-19 23:43:42', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CITY_NAME`);

--
-- Indexes for table `coach`
--
ALTER TABLE `coach`
  ADD PRIMARY KEY (`COACH_ID`),
  ADD KEY `TEAM_NAME` (`TEAM_NAME`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`PLAYER_ID`),
  ADD KEY `TEAM_NAME` (`TEAM_NAME`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TEAM_NAME`),
  ADD KEY `CITY_NAME` (`CITY_NAME`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `coach_ibfk_1` FOREIGN KEY (`TEAM_NAME`) REFERENCES `team` (`TEAM_NAME`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`TEAM_NAME`) REFERENCES `team` (`TEAM_NAME`);

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`CITY_NAME`) REFERENCES `city` (`CITY_NAME`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
