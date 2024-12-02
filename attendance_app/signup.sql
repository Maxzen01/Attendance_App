-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 08:05 AM
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
-- Database: `attendanceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `action` varchar(10) NOT NULL,
  `time` datetime NOT NULL,
  `photo_url` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `username`, `action`, `time`, `photo_url`, `timestamp`) VALUES
(7, 'vinnu', 'login', '2024-12-01 18:19:16', 'uploads/674c9a94b4846.png', '2024-12-01 19:24:02'),
(8, 'kasi', 'login', '2024-12-01 18:32:02', 'uploads/674c9d925cebd.png', '2024-12-01 19:24:02'),
(9, 'kasi', 'logout', '2024-12-01 18:32:11', 'uploads/674c9d9b93c40.png', '2024-12-01 19:24:02'),
(10, 'vinnu', 'login', '2024-12-01 19:02:04', 'uploads/674ca49c6ee87.png', '2024-12-01 19:24:02'),
(11, 'vinnu', 'logout', '2024-12-01 19:02:40', 'uploads/674ca4c054f5f.png', '2024-12-01 19:24:02'),
(12, 'vinnu', 'login', '2024-12-01 19:02:58', 'uploads/674ca4d2d5666.png', '2024-12-01 19:24:02'),
(13, 'vinnu', 'login', '2024-12-01 19:48:32', 'uploads/674caf80e2f6c.png', '2024-12-01 19:24:02'),
(14, 'pratap', 'login', '2024-12-01 20:15:45', 'uploads/674cb5e140df4.png', '2024-12-01 19:24:02'),
(15, 'pratap', 'login', '2024-12-02 00:50:26', 'uploads/674cb6fa78272.png', '2024-12-01 19:24:02'),
(16, 'vinnu', 'login', '2024-12-02 10:29:40', 'uploads/674d3ebc0fe69.png', '2024-12-02 04:59:40'),
(17, 'pratap', 'login', '2024-12-02 10:51:47', 'uploads/674d43eb68f41.png', '2024-12-02 05:21:47'),
(18, 'prudvi', 'login', '2024-12-02 10:53:34', 'uploads/674d44566b494.png', '2024-12-02 05:23:34'),
(19, 'pratap', 'logout', '2024-12-02 10:58:38', 'uploads/674d4586839a3.png', '2024-12-02 05:28:38'),
(20, 'benni', 'login', '2024-12-02 11:16:41', 'uploads/674d49c1a1b6f.png', '2024-12-02 05:46:41'),
(21, 'vinnu', 'login', '2024-12-02 11:32:27', 'uploads/674d4d73d67e4.png', '2024-12-02 06:02:27'),
(22, 'vinnu', 'login', '2024-12-02 11:49:43', 'uploads/674d517fe06ce.png', '2024-12-02 06:19:43'),
(23, 'vinnu', 'login', '2024-12-02 11:53:10', 'uploads/674d524ef313c.png', '2024-12-02 06:23:10'),
(24, 'vinnu', 'logout', '2024-12-02 11:53:27', 'uploads/674d525f9433a.png', '2024-12-02 06:23:27'),
(25, 'vinnu', 'login', '2024-12-02 11:55:25', 'uploads/674d52d52487a.png', '2024-12-02 06:25:25'),
(26, 'vinnu', 'logout', '2024-12-02 11:55:40', 'uploads/674d52e46bed4.png', '2024-12-02 06:25:40'),
(27, 'vinnu', 'login', '2024-12-02 11:56:18', 'uploads/674d530aa2e36.png', '2024-12-02 06:26:18'),
(28, 'vinnu', 'logout', '2024-12-02 11:56:53', 'uploads/674d532d358bb.png', '2024-12-02 06:26:53'),
(29, 'vinnu', 'logout', '2024-12-02 11:59:38', 'uploads/674d53d2cdf11.png', '2024-12-02 06:29:38'),
(30, 'vinnu', 'logout', '2024-12-02 11:59:44', 'uploads/674d53d827758.png', '2024-12-02 06:29:44'),
(31, 'vinnu', 'login', '2024-12-02 12:00:03', 'uploads/674d53eb95211.png', '2024-12-02 06:30:03'),
(32, 'vinnu', 'login', '2024-12-02 12:05:34', 'uploads/674d5536ca3a6.png', '2024-12-02 06:35:34'),
(33, 'vinnu', 'login', '2024-12-02 12:05:40', 'uploads/674d553ca02f4.png', '2024-12-02 06:35:40'),
(34, 'vinnu', 'logout', '2024-12-02 12:05:55', 'uploads/674d554b6450a.png', '2024-12-02 06:35:55'),
(35, 'vinnu', 'login', '2024-12-02 12:06:02', 'uploads/674d555281c01.png', '2024-12-02 06:36:02'),
(36, 'vinnu', 'login', '2024-12-02 12:07:53', 'uploads/674d55c197424.png', '2024-12-02 06:37:53'),
(37, 'vinnu', 'login', '2024-12-02 12:07:58', 'uploads/674d55c68ce21.png', '2024-12-02 06:37:58'),
(38, 'vinnu', 'login', '2024-12-02 12:08:04', 'uploads/674d55cc11774.png', '2024-12-02 06:38:04'),
(39, 'vinnu', 'login', '2024-12-02 12:08:17', 'uploads/674d55d9e8404.png', '2024-12-02 06:38:17'),
(40, 'vinnu', 'login', '2024-12-02 12:08:24', 'uploads/674d55e0bda14.png', '2024-12-02 06:38:24'),
(41, 'vinnu', 'login', '2024-12-02 12:12:20', 'uploads/674d56cc2b67d.png', '2024-12-02 06:42:20'),
(42, 'vinnu', 'login', '2024-12-02 12:12:51', 'uploads/674d56eb43366.png', '2024-12-02 06:42:51'),
(43, 'pratap', 'login', '2024-12-02 12:16:07', 'uploads/674d57af09ac6.png', '2024-12-02 06:46:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 08:06 AM
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
-- Database: `attendanceapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Employee','Manager','Admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(3, 'vinuthna', '$2y$10$wPmygEv6V12RayEPdekjB.XZ9qojASvXg0SAyIJy5wLWckZsrjsNa', 'vinuthnamaxzen08@gmail.com', 'Admin', '2024-12-01 18:44:00'),
(4, 'vinnu', '$2y$10$vjmjvorf8OoHOojaHPQGueIDR40zBrN5TS3ajGL717oApdwW1b.5C', 'vinnu@gmail.com', 'Employee', '2024-12-01 18:48:11'),
(5, 'pratap', '$2y$10$xe9eeUb9AYAq10f0wKPceuheF4QKBcw9ohAQr6m.Gl.gFZ59TNq/i', 'pratap@gmail.com', 'Employee', '2024-12-01 19:14:07'),
(6, 'prudvi', '$2y$10$92QclRTxN12h.LRWpQN8fu3Pdy1ZPBZJAqCL/97c03.dEoBh5ttbC', 'prudvi@gmail.com', 'Employee', '2024-12-02 05:03:32'),
(7, 'raju', '$2y$10$LDwUHKq0WlNVC6El/a/PieQHwYCWmO0N14SNU5AWgy81u6m2bkfhy', 'raju@gmal.com', 'Admin', '2024-12-02 05:27:16'),
(8, 'benni', '$2y$10$fnC2/uThOO1UEiVH2p/P5.UFRfSf4thPHCAjZW1eDN6YjmRvIRUne', 'xyz@gmail.com', 'Employee', '2024-12-02 05:44:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





