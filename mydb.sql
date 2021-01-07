-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 07, 2021 at 03:53 AM
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
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `content`) VALUES
(1, 15, 4, 'cdvd'),
(2, 15, 2, 'axac'),
(3, 15, 4, 'popo');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`user_id`, `post_id`) VALUES
(2, 2),
(2, 4),
(15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `creat_time` datetime NOT NULL DEFAULT current_timestamp(),
  `likes_nbr` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `creat_time`, `likes_nbr`) VALUES
(2, 2, 'uhiuk', 'uihoilj', '2021-01-02 17:10:25', 11),
(4, 2, 'kvmbdgklbf', 'fsbsfbfsbsf', '2021-01-02 21:22:59', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creat_time` datetime NOT NULL DEFAULT current_timestamp(),
  `notif` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `creat_time`, `notif`) VALUES
(2, 'chadi', 'chadi.mustang17@gmail.com', '$2y$10$GMCD8KLCr4ZRHWrTnV7Nnez37LjSjazjFDYkxBpqFsFoUWJqgu1yO', '2020-12-22 04:49:34', 1),
(3, 'ddfdf', 'naourchadi@gmail.com', '$2y$10$TTeOySN/fVpSiS072hsm1eKZJw982HfSV9q5j92YH8LEWuoJ6Ub4y', '2020-12-22 05:00:34', 1),
(4, 'ddfdf', 'naourchacxccxcdi@gmail.com', '$2y$10$li9MHEuQRLPVGNcLxgAo.OLjQq2GQDgzYOzquWFkK3c6Yk7IQX2bi', '2020-12-22 05:01:51', 1),
(5, 'ddfdf', 'naourcvvcvchacxccxcdi@gmail.com', '$2y$10$AmMzXZUMD87eH7NFn1hrTeCOov.hwFt9xQdAFOJQzq5da0Bc5eEVq', '2020-12-22 05:03:41', 1),
(6, 'ddfdf', 'naocdi@gmail.com', '$2y$10$jF6SqPtRxBik1e6Cll6AN.3HFjmgLoFgrsAkLkLHJV5sb9JMvhdLq', '2020-12-22 05:04:26', 1),
(7, 'ddfdf', 'naoccccdi@gmail.com', '$2y$10$K/CE2aRMr79njsTDt7rYnedDioaao9W381CRZhZD0wjbfI.OIs9v6', '2020-12-22 05:05:23', 1),
(8, 'ddfdf', 'naosdsdccccdi@gmail.com', '$2y$10$vXKdGLTk5cXho4QelDrcIuovRg.hfmnvkp.dJVB5LM91aNRHs4ghO', '2020-12-22 05:06:31', 1),
(9, 'ddfdf', 'ncccdi@gmail.com', '$2y$10$GJtIgeXnJTWNlT/qhKBoceayejuVlhGCm16sN1BafcCYRP.R6p.3.', '2020-12-22 05:08:44', 1),
(10, 'ddfdf', 'cccdi@gmail.com', '$2y$10$kdKCHbMjCm4cPxIcrXZINugZsXjYoxE.uEfsHsQW28Tis.YyU./Hu', '2020-12-22 05:09:20', 1),
(11, 'ddfdf', 'cdfdfccdi@gmail.com', '$2y$10$EDbYFkd6iDT1aqSHqj7OFutjr3bwnTtuJNkG.fC6I1Qr/./LH4F1C', '2020-12-22 05:11:02', 1),
(12, 'khriwa', 'khriwa@briwa.com', '$2y$10$ocf0okl.hen7ABQewExDa.JMZOaXkzJwEFYHIbQrV83GhIROn4nDK', '2020-12-22 05:15:53', 1),
(13, 'briwakho khriwa', 'briwa@khriwa.com', '$2y$10$NbkwjgJj7KtAXuICFknB1.hcvww1lIVznU0mH6fUVzw59XVXt4G6e', '2020-12-22 05:16:26', 1),
(14, 'bobi', 'bobi@gmail.com', '$2y$10$KsISSezdM7yPO5QEuvHETO.QsZQaL4Sx.GejmSV5zrLcfBdqb3SjC', '2021-01-04 18:48:30', 1),
(15, 'popo', 'spopo@popo.com', '$2y$10$rzvGnCHveCFY/AfZgTWSkOIFQuCr56I4T7pOjzddSBeTYpa6QblLW', '2021-01-05 19:00:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
