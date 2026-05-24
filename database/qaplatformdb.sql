-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2026 at 04:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qaplatformdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `thread_id`, `user_id`, `created_at`) VALUES
(4, 16, 31, '2026-05-24 14:35:06'),
(5, 15, 31, '2026-05-24 14:35:07'),
(6, 14, 31, '2026-05-24 14:35:08'),
(7, 13, 31, '2026-05-24 14:35:09'),
(8, 13, 3, '2026-05-24 14:36:31'),
(9, 16, 29, '2026-05-24 14:36:44'),
(10, 15, 29, '2026-05-24 14:36:47'),
(11, 14, 29, '2026-05-24 14:36:49'),
(12, 13, 29, '2026-05-24 14:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `thread_id`, `user_id`, `body`, `created_at`) VALUES
(5, 13, 3, 'its a web dev language bro', '2026-05-24 14:36:13'),
(6, 15, 29, 'no idea bro try googling', '2026-05-24 14:37:04'),
(7, 16, 29, 'ik dr.kavindya she is good at these problems try visiting her', '2026-05-24 14:38:05');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `reported_by` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `status` enum('pending','resolved') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `user_id`, `title`, `body`, `image`, `created_at`) VALUES
(13, 29, 'What is PHP?', 'Hi guys i wanna know about php', 'charindu29_Untitled.jpg', '2026-05-24 14:24:37'),
(14, 30, 'Anyone know about github?', 'Guys please i want to learn about github,if anyone know please reply', 'Malisha30_question-mark.jpg', '2026-05-24 14:27:54'),
(15, 3, 'Who is this girl?', 'i saw this pic on fb and really wanna know who she is..', 'naveen3_73f706e9dd1e193786220712df1c1fd2-removebg-preview.png', '2026-05-24 14:29:03'),
(16, 31, 'having trouble to sleep', 'these days im having a problem with my sleep cycle..anyone know a good doctor?', 'Janudi31_Screenshot 2026-05-24 200437.png', '2026-05-24 14:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `is_banned` tinyint(4) DEFAULT 0,
  `profile_pic` varchar(255) DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `role`, `is_banned`, `profile_pic`, `created_at`) VALUES
(3, 'naveen', 'rashmika', 'naveen', 'naveen@gmail.com', '$2y$10$GOWOrc9QDIdk5SB4zZyifuNMgRmflGXorHkzMVPG7B5qhlwD3yYY.', 'user', 0, 'naveen3_ab83348a046af7a5f1894354d8fd2bb8.jpg', '2026-05-08 15:52:41'),
(19, 'naveen2', 'aaa', 'naveen2', 'naveen2@gmail.com', '$2y$10$MUIq4dDfEoz3cWQYfhmuluZQoy7pgVHn3SKaFCy3GLAVfNqkz3lGm', 'user', 0, 'default.png', '2026-05-09 13:19:44'),
(21, 'admin1', 'admin', 'admin', 'admin22@gmail.com', '$2y$10$Nxk2FZI1TnSiHk72lMc81uDzP5Gn6AEMN4nI0NAQf5L9kd/8FV/ie', 'admin', 0, 'admin21_d619f66e1e641adf49a5f50520aafced.jpg', '2026-05-09 13:23:16'),
(26, 'rashmika', 'rashmikarr', 'rashmika', 'rashmika@gmail.com', '$2y$10$g2pn79R5jBVdru6zZ/wdFuCS.pUjvEEY2m4RLDdZGPP5Kb02KzRQu', 'user', 0, 'default.png', '2026-05-11 15:09:24'),
(27, 'as', ',', ',', 'test@gmail.com', '$2y$10$b3ght4qFbEoQfOLWuFeS0.46rcHRnwBV2oY0HsrCGaPxJr223GyFG', 'user', 1, 'default.png', '2026-05-11 15:24:01'),
(29, 'Charindu', 'Gayashan', 'charindu', 'charindu@gmail.com', '$2y$10$jELjW30PfpSJimqS8TAreeMgZNhFhGfyuSb8O9uAN0anWxU3KuS4S', 'user', 0, 'default.png', '2026-05-24 14:23:00'),
(30, 'Malisha', 'Madusith', 'Malisha', 'malisha@gmail.com', '$2y$10$FgD2vBo/G4qrS2bDo87Cf.TP7oWqnSOLza/aagDxWmCLll3KKuDNO', 'user', 0, 'default.png', '2026-05-24 14:26:19'),
(31, 'Janudi', 'Parindya', 'Janudi', 'janudi@gmail.com', '$2y$10$kyc9v6IToJQl0hHd8P49.OaHMtZ/nsZlttoRKHsOOzbp/OzT55Yz2', 'user', 0, 'default.png', '2026-05-24 14:31:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thread_id` (`thread_id`),
  ADD KEY `reported_by` (`reported_by`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`),
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`thread_id`) REFERENCES `threads` (`id`),
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`reported_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `threads`
--
ALTER TABLE `threads`
  ADD CONSTRAINT `threads_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
