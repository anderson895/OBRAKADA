-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 06:06 PM
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
-- Database: `obrakada`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 1 COMMENT '0=restricted,1=active',
  `user_profile_pict` varchar(255) DEFAULT NULL,
  `user_professional_title` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`user_professional_title`)),
  `user_contact_info_link` text DEFAULT NULL,
  `user_phone` varchar(60) DEFAULT NULL,
  `user_bio` text DEFAULT NULL,
  `skills` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `user_banner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_email`, `user_password`, `user_status`, `user_profile_pict`, `user_professional_title`, `user_contact_info_link`, `user_phone`, `user_bio`, `skills`, `user_banner`) VALUES
(4, 'joshua padilla', 'joshua@gmail.com', '$2y$10$Jia2Ip3xMNsSaXf0.vLv0.S4X2gUSt4bAYI.Z/gCf.vyky7nSqa3G', 1, 'profile_68332bcc8c6790.38338186.jpg', '[]', '', '', '', '[]', NULL),
(5, 'juan dela cruz', 'juan@gmail.com', '$2y$10$fsgfmMSl.IRxM2E7.QtXLuvtgcC8eiGfXJIl0HdQ9YlbsZ/jOT5mG', 1, 'profile_68332b61aa24a4.83477233.png', '[\"web developer\"]', 'https://www.facebook.com/juan.dela.cruz.352811', '09454454744', 'loremloremloremloremloremloremloremloremloremloremloremlorem', '[\"PHP\",\"Java\",\"C#\"]', 'banner_68331e4ba7a248.19478596.jpg'),
(6, 'angela denise', 'angenise24@gmail.com', '$2y$10$YgUiqt7yrlJCZ6BEgFrN8eBy.frq5.Typfo0zJWA53CAzQusUKQ7S', 1, 'profile_68333fd5c54a54.47396943.jpg', '[]', '', '', '', '[]', 'banner_68333fd5c56fe7.23090911.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `view_logs`
--

CREATE TABLE `view_logs` (
  `view_id` int(11) NOT NULL,
  `viewed_id` int(11) NOT NULL,
  `view_by_id` int(11) NOT NULL,
  `view_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `view_seen` int(11) NOT NULL COMMENT '0=unseen,1=seen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `view_logs`
--

INSERT INTO `view_logs` (`view_id`, `viewed_id`, `view_by_id`, `view_date`, `view_seen`) VALUES
(8, 5, 4, '2025-05-25 15:23:04', 1),
(9, 5, 4, '2025-05-25 15:23:04', 1),
(10, 4, 5, '2025-05-25 15:25:43', 0),
(11, 4, 5, '2025-05-25 15:55:39', 0),
(12, 5, 6, '2025-05-25 16:05:50', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `view_logs`
--
ALTER TABLE `view_logs`
  ADD PRIMARY KEY (`view_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `view_logs`
--
ALTER TABLE `view_logs`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
