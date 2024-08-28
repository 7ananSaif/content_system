-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 01:02 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `content`, `category`, `date`, `user_id`) VALUES
(3, '3 media', '', 2, '2024-08-28 13:17:50', 1),
(4, 'media', '', 1, '2024-08-28 13:19:01', 1),
(5, 'media', '', 1, '2024-08-28 13:19:13', 1),
(6, 'media', '', 1, '2024-08-28 13:20:01', 1),
(7, 'media', '77', 2, '2024-08-28 13:22:13', 1),
(8, NULL, NULL, NULL, '2024-08-28 13:44:42', 3),
(9, NULL, NULL, NULL, '2024-08-28 13:45:48', 3),
(10, NULL, NULL, NULL, '2024-08-28 13:45:50', 3),
(11, '222', '222', 1, '2024-08-28 13:53:43', 3),
(12, '222', '222', 1, '2024-08-28 13:54:12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `content_media`
--

CREATE TABLE `content_media` (
  `id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `media_type` varchar(50) NOT NULL,
  `media_path` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content_media`
--

INSERT INTO `content_media` (`id`, `content_id`, `media_type`, `media_path`, `date`) VALUES
(1, 7, 'application/octet-stream', 'uploads/1724840533_content_media.sql', '2024-08-28 13:22:13'),
(2, 7, 'application/octet-stream', 'uploads/1724840533_content.sql', '2024-08-28 13:22:13'),
(3, 11, 'application/octet-stream', 'uploads/1724842423_content_media.sql', '2024-08-28 13:53:43'),
(4, 11, 'application/octet-stream', 'uploads/1724842423_content.sql', '2024-08-28 13:53:43'),
(5, 12, 'application/octet-stream', 'uploads/1724842452_content_media.sql', '2024-08-28 13:54:12'),
(6, 12, 'application/octet-stream', 'uploads/1724842452_content.sql', '2024-08-28 13:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `email`) VALUES
(2, 'ss', '11', '7nanisaif@gmail.com'),
(3, 'ss', '11', '7nanisa22if@gmail.com'),
(4, 'test_hanan', '12345678', 'dd@ff.cs'),
(5, 'ww', '111', 'dd@ff.csww');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_media`
--
ALTER TABLE `content_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `content_media`
--
ALTER TABLE `content_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_media`
--
ALTER TABLE `content_media`
  ADD CONSTRAINT `content_media_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
