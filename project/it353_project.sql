-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2024 at 05:45 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it353_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `commentreports`
--

CREATE TABLE `commentreports` (
  `reportID` int(8) NOT NULL,
  `commentID` int(8) NOT NULL,
  `userID` int(8) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `timeSubmitted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(8) NOT NULL,
  `userID` int(8) NOT NULL,
  `postID` int(8) NOT NULL,
  `description` varchar(256) NOT NULL,
  `lastUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `score` int(8) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `userID`, `postID`, `description`, `lastUpdated`, `score`) VALUES
(1, 3, 3, 'yo', '2024-12-03 00:00:00', 0),
(4, 3, 3, 'this post sucks!!!', '2024-12-03 00:00:00', 0),
(5, 4, 8, 'hello derek', '2024-12-03 10:25:27', 0),
(9, 3, 8, 'hello alison', '2024-12-03 10:34:43', 0),
(11, 3, 45, 'What up', '2024-12-03 16:25:17', 0),
(12, 3, 45, 'What up', '2024-12-03 16:27:46', 0),
(13, 3, 45, 'What up', '2024-12-03 16:28:23', 0),
(14, 3, 46, 'Hiya', '2024-12-03 16:43:02', 0),
(15, 3, 59, 'Cool flash bro', '2024-12-03 17:27:04', 0),
(16, 5, 55, 'I will use this in my games!', '2024-12-03 17:27:40', 0),
(17, 5, 61, 'I would have liked an image with this...', '2024-12-03 17:38:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grenades`
--

CREATE TABLE `grenades` (
  `grenadeID` int(8) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grenades`
--

INSERT INTO `grenades` (`grenadeID`, `name`) VALUES
(1, 'smoke'),
(2, 'molotov'),
(3, 'flashbang'),
(4, 'he');

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `mapID` int(8) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`mapID`, `name`) VALUES
(1, 'mirage'),
(2, 'vertigo'),
(3, 'anubis'),
(4, 'inferno'),
(5, 'dust2'),
(6, 'overpass'),
(7, 'train'),
(8, 'ancient'),
(9, 'nuke');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `pictureID` int(8) NOT NULL,
  `file` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`pictureID`, `file`) VALUES
(26, '/pictures/dKRPgTru0s.jpg'),
(27, '/pictures/6AQXRyKadI.jpg'),
(28, '/pictures/CcJsOd9gnP.jpg'),
(29, '/pictures/ub0JG6k3vz.jpg'),
(30, '/pictures/ukC0NVM7s1.jpg'),
(31, '/pictures/dDLukiZjo8.jpg'),
(32, '/pictures/ZRazxBGq1L.jpg'),
(33, '/pictures/EqPAQu7O4c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `postreports`
--

CREATE TABLE `postreports` (
  `reportID` int(8) NOT NULL,
  `postID` int(8) NOT NULL,
  `userID` int(8) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `timeSubmitted` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(8) NOT NULL,
  `userID` int(8) NOT NULL,
  `mapID` int(8) NOT NULL,
  `grenadeID` int(8) NOT NULL,
  `pictureID` int(8) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(512) DEFAULT NULL,
  `lastUpdated` datetime NOT NULL DEFAULT current_timestamp(),
  `score` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `userID`, `mapID`, `grenadeID`, `pictureID`, `title`, `description`, `lastUpdated`, `score`) VALUES
(55, 3, 1, 3, 26, 'A Long', '', '2024-12-03 17:22:02', 0),
(56, 3, 2, 4, 27, 'A Ramp from Crane', '', '2024-12-03 17:22:25', 0),
(57, 3, 5, 3, 28, 'A Long from T Car', '', '2024-12-03 17:22:48', 0),
(58, 3, 8, 1, 29, 'Temple from A Main', '', '2024-12-03 17:23:16', 0),
(59, 3, 3, 3, 30, 'B God Flash from outside B Main', '', '2024-12-03 17:23:45', 0),
(60, 4, 7, 3, 31, 'A Entry Flash', '', '2024-12-03 17:24:26', 0),
(61, 4, 4, 1, 0, 'Moto smoke from Alt Mid', 'Aim slightly up and to the left of the top center window above apartments, so that your cursor touches the edge of the shingling.', '2024-12-03 17:25:45', 0),
(62, 4, 9, 1, 0, 'Outside Smoke Wall', '', '2024-12-03 17:26:16', 0),
(63, 3, 6, 1, 32, 'B Heaven Smoke from Monster', '', '2024-12-03 17:26:50', 0),
(67, 5, 1, 1, 33, 'Window from T Spawn', '', '2024-12-03 17:36:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usercommentinteractions`
--

CREATE TABLE `usercommentinteractions` (
  `userID` int(8) NOT NULL,
  `commentID` int(8) NOT NULL,
  `upvoted` bit(1) NOT NULL DEFAULT b'0',
  `downvoted` bit(1) NOT NULL DEFAULT b'0',
  `lastUpdated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userpostinteractions`
--

CREATE TABLE `userpostinteractions` (
  `userID` int(8) NOT NULL,
  `postID` int(8) NOT NULL,
  `upvoted` bit(1) NOT NULL DEFAULT b'0',
  `downvoted` bit(1) DEFAULT b'0',
  `lastUpdated` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(8) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `password`) VALUES
(3, 'derek', 'Reynolds'),
(4, 'alison', 'Weiser'),
(5, 'tyler', 'Reynolds');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `commentreports`
--
ALTER TABLE `commentreports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `grenades`
--
ALTER TABLE `grenades`
  ADD PRIMARY KEY (`grenadeID`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`mapID`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`pictureID`);

--
-- Indexes for table `postreports`
--
ALTER TABLE `postreports`
  ADD PRIMARY KEY (`reportID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentreports`
--
ALTER TABLE `commentreports`
  MODIFY `reportID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grenades`
--
ALTER TABLE `grenades`
  MODIFY `grenadeID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `mapID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `pictureID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `postreports`
--
ALTER TABLE `postreports`
  MODIFY `reportID` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
