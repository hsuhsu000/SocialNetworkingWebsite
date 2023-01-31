-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2023 at 08:17 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_networking_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_user` varchar(255) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_user`, `comment_date`) VALUES
(110, 66, 49, 'pretty', 'test user', '2023-01-25 07:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `f_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend_user_id` int(11) NOT NULL,
  `friend_name` text NOT NULL,
  `friend_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`f_id`, `user_id`, `friend_user_id`, `friend_name`, `friend_image`) VALUES
(88, 39, 37, 'me ra', 'p3.png'),
(89, 39, 40, 'joseph thawng ceu', 'p1.png');

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `request_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friend_request`
--

INSERT INTO `friend_request` (`request_id`, `receiver_id`, `sender_id`, `sender_name`, `sender_image`) VALUES
(60, 42, 49, 'test user', 'profile.png'),
(61, 39, 37, 'me ra', 'p3.png'),
(62, 39, 40, 'joseph thawng ceu', 'p1.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `chat_id` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`chat_id`, `receiver`, `sender`, `message`, `send_date`) VALUES
(50, 49, 42, 'hello test', '2023-01-25 07:06:13'),
(51, 42, 49, 'hello floral', '2023-01-25 07:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_content`, `upload_image`, `post_date`) VALUES
(61, 37, 'I like the view', 'beach1.jpg', '2023-01-25 05:57:54'),
(62, 39, 'tODAY HAVE A GOOD WEATHER.', '', '2023-01-25 06:02:25'),
(63, 40, '', 'Deb-S-Indian-River-Lagoon-single-shot.jpg.crdownload', '2023-01-25 06:05:30'),
(64, 41, 'I like the things having pink color', '0_embedded4256593.jpg', '2023-01-25 06:08:05'),
(65, 42, 'Taste good', 'images.jpg', '2023-01-25 06:10:01'),
(66, 43, 'HOw beautiful they are', 'flowers-2.jpg', '2023-01-25 06:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `reaction`
--

CREATE TABLE `reaction` (
  `react_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reaction`
--

INSERT INTO `reaction` (`react_id`, `post_id`, `count`) VALUES
(87, 61, 1),
(88, 66, 6),
(89, 65, 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `report_sen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `post_id`, `user_id`, `report_sen`) VALUES
(42, 62, 39, 'Misinformation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `user_name` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `user_birthday` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_cover` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `posts` text NOT NULL,
  `recovery_account` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `user_name`, `user_pass`, `confirm_password`, `user_email`, `user_country`, `user_gender`, `user_birthday`, `user_image`, `user_cover`, `status`, `posts`, `recovery_account`) VALUES
(37, 'Me', 'ra', 'me ra', '$2y$10$m29rfeWEer7lhuUsKQc6PuJJtc2VTHmiiTtIyzTBIXT7fAKGHeFr.', '$2y$10$m29rfeWEer7lhuUsKQc6PuJJtc2VTHmiiTtIyzTBIXT7fAKGHeFr.', 'mera@gmail.com', 'UK', 'female', '2023-01-04', 'p3.png', 'default-cover.jpg', 'verified', 'yes', 'red'),
(39, 'Kyi Phyu', 'Khin', 'kyi phyu khin', '$2y$10$E8bRxtuWHiwk2J20EFQjyuX7C6PLBa.u6aBib5O/EcmjeZfaVlraa', '$2y$10$E8bRxtuWHiwk2J20EFQjyuX7C6PLBa.u6aBib5O/EcmjeZfaVlraa', 'kyiphyu2002@gmail.com', 'United States of America', 'female', '1999-02-03', 'p2.png', 'default-cover.jpg', 'verified', 'yes', 'red'),
(40, 'Joseph', 'Thawng Ceu', 'joseph thawng ceu', '$2y$10$nWoy0fbmS62s2zovVkKOBOsVfi2fs2D4qPcJxXiXwsKS9KJEuZeny', '$2y$10$nWoy0fbmS62s2zovVkKOBOsVfi2fs2D4qPcJxXiXwsKS9KJEuZeny', 'joseph2002@gmail.com', 'UK', 'male', '2001-03-01', 'p1.png', 'default-cover.jpg', 'verified', 'yes', 'red'),
(41, 'Pinky', 'Teddy', 'pinky teddy', '$2y$10$gxb9D8W/aETXDIU/HkDOpuG.k6sF3rCwjP3cS62WBxEqP13G6abtO', '$2y$10$gxb9D8W/aETXDIU/HkDOpuG.k6sF3rCwjP3cS62WBxEqP13G6abtO', 'pinky2002@gmail.com', 'France', 'female', '2000-07-06', 'p1.png', 'default-cover.jpg', 'verified', 'yes', 'red'),
(42, 'Floral', 'Sky', 'floral sky', '$2y$10$HDYmnwwUj1bWUht2fAFATOtOp1HVZ700OL9ncNmrmt9wEY0nqUGnK', '$2y$10$HDYmnwwUj1bWUht2fAFATOtOp1HVZ700OL9ncNmrmt9wEY0nqUGnK', 'floral@gmail.com', 'France', 'female', '1996-07-11', 'p3.png', 'default-cover.jpg', 'verified', 'yes', 'red'),
(43, 'ro', 'se', 'ro se', '$2y$10$mCunqGJyyWGsjbwcn9fEgu9jEE7Q.h4rYzIrjc9oA6mYi4Mhi0K9C', '$2y$10$mCunqGJyyWGsjbwcn9fEgu9jEE7Q.h4rYzIrjc9oA6mYi4Mhi0K9C', 'rose@gmail.com', 'Germany', 'female', '1994-07-07', 'p1.png', 'default-cover.jpg', 'verified', 'yes', 'red'),
(44, 'Hsu Shwe', 'Sin Oo', 'hsu shwe sin oo', '$2y$10$mSkeS7gcXXjUyR2ys5PzI.B7L5cTLAqPfD/wvXwk2Lx816.l9ZK6a', '$2y$10$kKGKUIa4fPZuSB3TD3Byee4IAgVzVnSjGndwQKZhy8dd9E5Difn2S', 'hsso2002@gmail.com', 'Japan', 'female', '2002-09-24', 'profile.jpg', 'beach.jpg', 'verified', 'yes', 'pink'),
(45, 'John', 'Son', 'john son', '$2y$10$biulg/Oly5SkJkkWpt8vfetU626NrFX0P3aCKDPLFxTrL/P5QiLzu', '$2y$10$eg5CuY4Xh7iDx3WsrlxfGe1fVHyHvr3gaM991rLXS2ZhYmDZD2H7i', 'johnson@gmail.com', 'United States of America', 'male', '2001-02-06', 'p1.png', 'default-cover.jpg', 'verified', 'no', 'black'),
(49, 'test', 'user', 'test user', '$2y$10$linQtBWhu1aqWlVjWhlggex7LNgrBy5jaIgCh3IcZIOtkJryvDWxi', '$2y$10$RQVU7li3PKFThR9Xms16Te.GmRlGnE1uo1qT199QgT6TdVxvz0LEW', 'testuser@gmail.com', 'Japan', 'male', '2002-09-24', 'profile.png', 'cover.png', 'verified', 'yes', 'cake');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `post_id` (`post_id`,`user_id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `reaction`
--
ALTER TABLE `reaction`
  ADD PRIMARY KEY (`react_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `reaction`
--
ALTER TABLE `reaction`
  MODIFY `react_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
