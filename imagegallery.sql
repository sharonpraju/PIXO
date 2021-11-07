-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2021 at 11:01 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imagegallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `likes` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `description` text NOT NULL,
  `filepath` text NOT NULL,
  `uploaded_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `title`, `likes`, `rating`, `description`, `filepath`, `uploaded_date`) VALUES
(10, '', 0, 0, '', 'images/16360906481078246.jpg', '2021-11-07 01:52:19'),
(11, '', 0, 0, '', 'images/16360906411078163.jpg', '2021-11-07 01:52:33'),
(12, '', 0, 0, '', 'images/16360906371078161.jpg', '2021-11-07 01:52:40'),
(13, '', 0, 0, '', 'images/16360906341078160.jpg', '2021-11-07 01:52:47'),
(14, '', 0, 0, '', 'images/16360906301078159.jpg', '2021-11-07 01:52:53'),
(15, '', 0, 0, '', 'images/1636090603640204.jpg', '2021-11-07 01:53:07'),
(17, '', 0, 0, '', 'images/Screenshot (9).png', '2021-11-07 09:40:49'),
(18, '', 0, 0, '', 'images/Screenshot (18).png', '2021-11-07 09:42:54'),
(19, 'test', 0, 0, 'test', 'images/20034.jpg', '2021-11-07 12:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploadedOn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `path`, `uploadedOn`) VALUES
(68, '1636090603640204.jpg', '2021-11-05 11:06:43'),
(69, '16360906251078157.jpg', '2021-11-05 11:07:05'),
(70, '16360906301078159.jpg', '2021-11-05 11:07:10'),
(71, '16360906341078160.jpg', '2021-11-05 11:07:14'),
(72, '16360906371078161.jpg', '2021-11-05 11:07:17'),
(73, '16360906411078163.jpg', '2021-11-05 11:07:21'),
(74, '16360906451078185.jpg', '2021-11-05 11:07:25'),
(75, '16360906481078246.jpg', '2021-11-05 11:07:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liked` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '["null"]',
  `rated` longtext COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '["null"]',
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `cpassword`, `liked`, `rated`, `created_at`) VALUES
(2, 'tester', 'tester123', '[value-4]', '[\"null\",\"19\",\"12\"]', '[\"null\"]', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
