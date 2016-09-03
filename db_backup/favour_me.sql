-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost:8080
-- Generation Time: Sep 04, 2016 at 03:06 AM
-- Server version: 5.7.13-0ubuntu0.16.04.2
-- PHP Version: 5.6.25-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `favour.me`
--

-- --------------------------------------------------------

--
-- Table structure for table `academics`
--

CREATE TABLE `academics` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academics`
--

INSERT INTO `academics` (`favor_id`, `user_id`, `favor`, `time`, `date`) VALUES
(1, 1, 'I want arthur Beiser Physics', '06:09', '2016-07-31'),
(2, 1, 'I want a book', '10:57', '2016-08-01'),
(3, 5, 'hi how are you', '11:19', '2016-08-03'),
(4, 6, 'sad', '04:31', '2016-08-07'),
(5, 6, 'dsfjn', '02:50', '2016-08-11');

-- --------------------------------------------------------

--
-- Table structure for table `academics_comments`
--

CREATE TABLE `academics_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academics_comments`
--

INSERT INTO `academics_comments` (`comment_id`, `user_id`, `favor_id`, `comment`, `date`, `time`) VALUES
(1, 1, 1, 'I have it', '2016-07-31', '06:09'),
(2, 5, 3, 'hi', '2016-08-03', '11:19');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`favor_id`, `user_id`, `favor`, `likes`, `time`, `date`) VALUES
(1, 1, 'How are you', 0, '06:59', '2016-07-31'),
(2, 1, 'What are you doing when do you want to do that how do you want to do that thing please explain me', 0, '07:06', '2016-07-31'),
(3, 5, 'i want a book', 0, '10:59', '2016-08-03'),
(4, 6, 'abc', 0, '02:14', '2016-09-01'),
(5, 6, 'gasvgsha', 0, '02:17', '2016-09-01'),
(6, 8, 'sdcsdsdgv', 0, '12:39', '2016-09-02'),
(7, 6, 'sgvdsh', 0, '12:41', '2016-09-02'),
(8, 6, 'xyzlike', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `books_comments`
--

CREATE TABLE `books_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_comments`
--

INSERT INTO `books_comments` (`comment_id`, `user_id`, `favor_id`, `comment`, `date`, `time`) VALUES
(1, 5, 3, 'i have it', '2016-08-03', '10:59'),
(2, 8, 5, 'dsjsdgds', '2016-09-02', '12:37'),
(3, 8, 3, 'sdffds', '2016-09-02', '12:39'),
(4, 8, 5, 'sdfsdy', '2016-09-02', '12:40'),
(5, 6, 5, 'sadftsdygh', '2016-09-02', '12:40');

-- --------------------------------------------------------

--
-- Table structure for table `cosmetics`
--

CREATE TABLE `cosmetics` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cosmetics`
--

INSERT INTO `cosmetics` (`favor_id`, `user_id`, `favor`, `time`, `date`) VALUES
(1, 5, 'i want lipstick', '02:14', '2016-08-03');

-- --------------------------------------------------------

--
-- Table structure for table `cosmetics_comments`
--

CREATE TABLE `cosmetics_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cosmetics_comments`
--

INSERT INTO `cosmetics_comments` (`comment_id`, `user_id`, `favor_id`, `comment`, `date`, `time`) VALUES
(1, 5, 1, 'dsdsav', '2016-08-03', '02:14'),
(2, 6, 1, 'ewggew', '2016-08-03', '02:15');

-- --------------------------------------------------------

--
-- Table structure for table `electronics`
--

CREATE TABLE `electronics` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics`
--

INSERT INTO `electronics` (`favor_id`, `user_id`, `favor`, `time`, `date`) VALUES
(1, 1, 'i want a movie', '01:46', '2016-07-30'),
(2, 1, 'how are you', '10:17', '2016-07-30'),
(3, 1, 'what do you want', '10:17', '2016-07-30'),
(4, 1, 'How are you', '06:06', '2016-07-31'),
(5, 1, 'i want a movie', '06:10', '2016-07-31'),
(6, 1, 'i want', '06:18', '2016-07-31'),
(7, 1, 'i want chips', '06:20', '2016-07-31'),
(8, 1, 'How are you', '04:47', '2016-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `electronics_comments`
--

CREATE TABLE `electronics_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electronics_comments`
--

INSERT INTO `electronics_comments` (`comment_id`, `user_id`, `favor_id`, `comment`, `date`, `time`) VALUES
(1, 1, 3, 'i want a book', '2016-07-31', '04:45');

-- --------------------------------------------------------

--
-- Table structure for table `favor_likes`
--

CREATE TABLE `favor_likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `status` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foods_comments`
--

CREATE TABLE `foods_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `footwear`
--

CREATE TABLE `footwear` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `footwear_comments`
--

CREATE TABLE `footwear_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games_comments`
--

CREATE TABLE `games_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_post`
--

CREATE TABLE `image_post` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`favor_id`, `user_id`, `favor`, `time`, `date`) VALUES
(1, 1, 'I want Sultan', '06:11', '2016-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `movies_comments`
--

CREATE TABLE `movies_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies_comments`
--

INSERT INTO `movies_comments` (`comment_id`, `user_id`, `favor_id`, `comment`, `date`, `time`) VALUES
(1, 1, 1, 'I have it', '2016-07-31', '06:11');

-- --------------------------------------------------------

--
-- Table structure for table `otheraccessories`
--

CREATE TABLE `otheraccessories` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `otheraccessories`
--

INSERT INTO `otheraccessories` (`favor_id`, `user_id`, `favor`, `time`, `date`) VALUES
(1, 1, 'how are you', '06:06', '2016-07-31'),
(2, 1, 'how are you', '04:47', '2016-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `favor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor` varchar(128) NOT NULL,
  `time` varchar(11) NOT NULL,
  `date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sports_comments`
--

CREATE TABLE `sports_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favor_id` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `date` varchar(11) NOT NULL,
  `time` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `username` varchar(64) DEFAULT NULL,
  `bio` varchar(32) DEFAULT NULL,
  `birthday` varchar(15) DEFAULT NULL,
  `location` text,
  `url` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `email`, `password`, `username`, `bio`, `birthday`, `location`, `url`) VALUES
(2, 'tushar pahuja@!', 'tusharpahuja@gmail.com@!', '923fae7da14d60f3413e003da16e84ab', 'tushar pahuja@!', '', '', '', ''),
(3, 'tushar pahuja@!', 'tusharpahuja07@gmail.com@!', '923fae7da14d60f3413e003da16e84ab', 'tushar@!', '', '', '', ''),
(4, 'Shibani Mahapatra@!', 'shibani.mahapatra47@gmail.com@!', '83f2741f8b2a0f494680e686d23b02af', 'Shibani@!', '', '', '', ''),
(5, 'tushar pahuja@!', 'tusharpahuja07@gmail.com@!', '5e1e328dbe940a997b031be68f4c0871', 'TusharP@!', '', '', '', '5.jpg'),
(6, 'Aman Saha@!', 'aman97ram@gmail.com@!', '3d5e6152cd2564ca42a0909fb90023d6', 'aman@!', '', '', '', '6.jpg'),
(7, 'xyz@!', 'aman97ram@gmail.com@!', '3a090b1c69f0f310961cf051f9895455', 'am@!', NULL, NULL, NULL, NULL),
(8, 'Dinesh Reddy@!', 'dini@gmail.com@!', '3a090b1c69f0f310961cf051f9895455', 'dini60@!', NULL, NULL, NULL, '8.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academics`
--
ALTER TABLE `academics`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `academics_comments`
--
ALTER TABLE `academics_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `books_comments`
--
ALTER TABLE `books_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `cosmetics`
--
ALTER TABLE `cosmetics`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `cosmetics_comments`
--
ALTER TABLE `cosmetics_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `electronics`
--
ALTER TABLE `electronics`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `electronics_comments`
--
ALTER TABLE `electronics_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `favor_likes`
--
ALTER TABLE `favor_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `foods_comments`
--
ALTER TABLE `foods_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `footwear`
--
ALTER TABLE `footwear`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `footwear_comments`
--
ALTER TABLE `footwear_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `games_comments`
--
ALTER TABLE `games_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `image_post`
--
ALTER TABLE `image_post`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `movies_comments`
--
ALTER TABLE `movies_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `otheraccessories`
--
ALTER TABLE `otheraccessories`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`favor_id`);

--
-- Indexes for table `sports_comments`
--
ALTER TABLE `sports_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academics`
--
ALTER TABLE `academics`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `academics_comments`
--
ALTER TABLE `academics_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `books_comments`
--
ALTER TABLE `books_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cosmetics`
--
ALTER TABLE `cosmetics`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cosmetics_comments`
--
ALTER TABLE `cosmetics_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `electronics`
--
ALTER TABLE `electronics`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `electronics_comments`
--
ALTER TABLE `electronics_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `favor_likes`
--
ALTER TABLE `favor_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foods_comments`
--
ALTER TABLE `foods_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `footwear`
--
ALTER TABLE `footwear`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `footwear_comments`
--
ALTER TABLE `footwear_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `games_comments`
--
ALTER TABLE `games_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_post`
--
ALTER TABLE `image_post`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `movies_comments`
--
ALTER TABLE `movies_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `otheraccessories`
--
ALTER TABLE `otheraccessories`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `favor_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sports_comments`
--
ALTER TABLE `sports_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
