-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 07:23 PM
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
(5, 'juan dela cruz', 'juan@gmail.com', '$2y$10$fsgfmMSl.IRxM2E7.QtXLuvtgcC8eiGfXJIl0HdQ9YlbsZ/jOT5mG', 1, 'profile_68332b61aa24a4.83477233.png', '[\"web developer\",\"web designer\",\"backend developer\"]', 'https://www.facebook.com/juan.dela.cruz.352811', '09454454744', 'loremloremloremloremloremloremloremloremloremloremloremlorem', '[\"PHP\",\"Java\",\"C#\"]', 'banner_68331e4ba7a248.19478596.jpg'),
(6, 'angela denise', 'angenise24@gmail.com', '$2y$10$YgUiqt7yrlJCZ6BEgFrN8eBy.frq5.Typfo0zJWA53CAzQusUKQ7S', 1, 'profile_68333fd5c54a54.47396943.jpg', '[]', '', '', '', '[]', 'banner_68333fd5c56fe7.23090911.jpg'),
(7, 'karl delacruz', 'karl@gmail.com', '$2y$10$2h42vkSG4hW25T6jfXosH.5XHDw3JOPCCBJ61AtOq3aq4wJODYwLO', 1, 'profile_683344a7c90f92.26248170.jpg', '[\"web developer\"]', 'https://www.facebook.com/joshuapadilla895', '09454454744', 'esfesfse', '[\"HTML\"]', 'banner_683344a7c97c32.83383161.jpg'),
(8, 'azumaki naruto', 'naruto@gmail.com', '$2y$10$.0XDZYIaVEOYQJ.d.hBFA.kqx2JM1LaKG/G77FwFUbgCt7/TcqY6e', 1, 'profile_683350109947b1.60521625.jpg', '[\"core\",\"fighter\"]', 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/cefd646f-2f00-43d2-830b-981e49a86ca1/d9vjdsx-6255f51c-493f-4ac3-99ba-6afdce301d7f.png/v1/fill/w_822,h_972,q_70,strp/_colo__naruto_coloring_normal___2016_by_naruttebayo67_d9vjdsx-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2NlZmQ2NDZmLTJmMDAtNDNkMi04MzBiLTk4MWU0OWE4NmNhMVwvZDl2amRzeC02MjU1ZjUxYy00OTNmLTRhYzMtOTliYS02YWZkY2UzMDFkN2YucG5nIiwiaGVpZ2h0IjoiPD0xODkzIiwid2lkdGgiOiI8PTE2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uud2F0ZXJtYXJrIl0sIndtayI6eyJwYXRoIjoiXC93bVwvY2VmZDY0NmYtMmYwMC00M2QyLTgzMGItOTgxZTQ5YTg2Y2ExXC9uYXJ1dHRlYmF5bzY3LTQucG5nIiwib3BhY2l0eSI6OTUsInByb3BvcnRpb25zIjowLjQ1LCJncmF2aXR5IjoiY2VudGVyIn19.AJnJPoLkfam1qdgG5JA431DDQJqaXDrk4h5MMAAvLx4', '09454454744', 'If you don’t share someone’s pain, you can never understand them.” – Nagato', '[\"MYSQL\",\"SUPABASE\"]', 'banner_68335010996bd5.53716273.jpg');

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
(8, 5, 4, '2025-05-25 16:52:31', 0),
(9, 5, 4, '2025-05-25 16:52:31', 0),
(10, 4, 5, '2025-05-25 17:11:44', 1),
(11, 4, 5, '2025-05-25 17:11:44', 1),
(12, 5, 6, '2025-05-25 16:52:31', 0),
(13, 4, 6, '2025-05-25 17:11:44', 1),
(14, 5, 6, '2025-05-25 16:52:31', 0),
(15, 5, 6, '2025-05-25 16:52:31', 0),
(16, 5, 6, '2025-05-25 16:52:31', 0),
(17, 4, 7, '2025-05-25 17:11:44', 1),
(18, 4, 7, '2025-05-25 17:11:44', 1),
(19, 7, 4, '2025-05-25 16:52:31', 0),
(20, 5, 7, '2025-05-25 16:52:31', 0),
(21, 6, 7, '2025-05-25 16:52:31', 0),
(22, 5, 4, '2025-05-25 16:52:31', 0),
(23, 4, 6, '2025-05-25 17:11:44', 1),
(24, 4, 7, '2025-05-25 17:11:44', 1),
(25, 4, 5, '2025-05-25 17:11:44', 1),
(26, 4, 8, '2025-05-25 17:15:19', 1),
(27, 8, 4, '2025-05-25 17:23:12', 1),
(28, 8, 4, '2025-05-25 17:23:12', 1),
(29, 8, 4, '2025-05-25 17:23:12', 1),
(30, 8, 4, '2025-05-25 17:23:12', 1),
(31, 8, 4, '2025-05-25 17:23:12', 1),
(32, 8, 4, '2025-05-25 17:23:12', 1),
(33, 8, 4, '2025-05-25 17:23:12', 1),
(34, 7, 4, '2025-05-25 17:21:43', 0),
(35, 8, 4, '2025-05-25 17:23:12', 1),
(36, 8, 4, '2025-05-25 17:23:12', 1);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `view_logs`
--
ALTER TABLE `view_logs`
  MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
