-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 01:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Nature'),
(2, 'Space');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` int(255) DEFAULT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`) VALUES
(598, 0, 'Lorem Ipsum\'s', 'admin', 43, '2022-03-01', 'road-g420062fba_1920.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis est metus, dignissim eu mollis eget, egestas vitae urna. Duis ex odio, hendrerit et eros ac, viverra efficitur dui. Etiam ultricies et enim non dapibus. Etiam elementum pharetra velit sed iaculis. Praesent fermentum condimentum turpis nec pulvinar. In hac habitasse platea dictumst. Nunc aliquet magna nec ligula ornare consequat.</p>\r\n\r\n<p>Nam vel lacus ut lacus finibus blandit. Duis eleifend metus sit amet commodo feugiat. Fusce vehicula viverra dui nec condimentum. Cras lobortis lectus ut dui ultricies semper. Fusce non lorem malesuada, malesuada elit sed, feugiat nulla. Proin erat felis, tempus id pharetra non, rhoncus vitae arcu. Nulla facilisi. Pellentesque eget diam turpis. Donec mattis urna diam.</p>\r\n\r\n<p>Sed finibus scelerisque leo. Maecenas aliquam, dolor eget auctor vulputate, urna sapien tempor massa, quis eleifend eros felis eu orci. Curabitur vestibulum mi porta mi mollis efficitur. Nam nunc purus, finibus nec malesuada eu, sodales non orci. Nullam vitae ex nec justo condimentum cursus non id nisi. Praesent dapibus nec odio id tristique. Integer augue mauris, blandit nec eleifend sed, mattis ut justo.</p>\r\n\r\n<p>Donec nibh turpis, accumsan sit amet diam non, ornare luctus eros. Cras ut nisl in mi molestie porta. Praesent tempor, dolor in placerat ornare, ex justo volutpat ligula, at finibus quam sem eu ante. Donec vel nisl at felis molestie eleifend vel eu magna. Nullam laoreet ligula et tortor molestie, nec venenatis eros condimentum. Donec a magna dolor. Donec a tempus magna, ut convallis tortor. Integer pretium libero eget metus vehicula venenatis.</p>', ''),
(599, 0, 'Lorem ipsum new', 'admin', 43, '2022-03-02', '', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis est metus, dignissim eu mollis eget, egestas vitae urna. Duis ex odio, hendrerit et eros ac, viverra efficitur dui. Etiam ultricies et enim non dapibus. Etiam elementum pharetra velit sed iaculis. Praesent fermentum condimentum turpis nec pulvinar. In hac habitasse platea dictumst. Nunc aliquet magna nec ligula ornare consequat.</p>\r\n\r\n<p>Nam vel lacus ut lacus finibus blandit. Duis eleifend metus sit amet commodo feugiat. Fusce vehicula viverra dui nec condimentum. Cras lobortis lectus ut dui ultricies semper. Fusce non lorem malesuada, malesuada elit sed, feugiat nulla. Proin erat felis, tempus id pharetra non, rhoncus vitae arcu. Nulla facilisi. Pellentesque eget diam turpis. Donec mattis urna diam.</p>\r\n\r\n<p>Sed finibus scelerisque leo. Maecenas aliquam, dolor eget auctor vulputate, urna sapien tempor massa, quis eleifend eros felis eu orci. Curabitur vestibulum mi porta mi mollis efficitur. Nam nunc purus, finibus nec malesuada eu, sodales non orci. Nullam vitae ex nec justo condimentum cursus non id nisi. Praesent dapibus nec odio id tristique. Integer augue mauris, blandit nec eleifend sed, mattis ut justo.</p>\r\n\r\n<p>Donec nibh turpis, accumsan sit amet diam non, ornare luctus eros. Cras ut nisl in mi molestie porta. Praesent tempor, dolor in placerat ornare, ex justo volutpat ligula, at finibus quam sem eu ante. Donec vel nisl at felis molestie eleifend vel eu magna. Nullam laoreet ligula et tortor molestie, nec venenatis eros condimentum. Donec a magna dolor. Donec a tempus magna, ut convallis tortor. Integer pretium libero eget metus vehicula venenatis.</p>', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'subscriber',
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$1234512345123451234512'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `role`, `randSalt`) VALUES
(43, 'admin', '$2y$10$123451234512345123451ujdbNOQF.98MW.NKZDYMje30tdDsZxYW', 'admin', '$2y$10$1234512345123451234512'),
(52, 'user', '$2y$10$123451234512345123451uPnd6pUGcVw9WlJQAYsowmHZLaJwl0TO', 'subscriber', '$2y$10$1234512345123451234512'),
(53, 'elvis2', '$2y$10$123451234512345123451uX.XsKhhSlrFCOH.R1T/hvkLHrCulWyy', 'subscriber', '$2y$10$1234512345123451234512');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
