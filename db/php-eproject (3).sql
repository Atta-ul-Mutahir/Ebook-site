-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 02:10 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-eproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `post_id`, `price`, `status`, `payment_id`) VALUES
(26, 3, 10, '45', 'sold', 17);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_image`, `category`, `code`) VALUES
(1, 'icons8-romance-48.png', 'Romance', 3),
(2, 'icons8-spaghetti-48.png', 'Food & Drink', 1),
(3, 'icons8-professional-photographer-48.png', 'Arts & Photography', 2),
(4, 'icons8-stethoscope-48.png', 'Health', 4),
(5, 'icons8-contest-48.png', 'Sports', 5);

-- --------------------------------------------------------

--
-- Table structure for table `categorize_sections`
--

CREATE TABLE `categorize_sections` (
  `id` int(11) NOT NULL,
  `sections` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorize_sections`
--

INSERT INTO `categorize_sections` (`id`, `sections`, `type`, `code`) VALUES
(1, 'best selling books', 1, 1),
(2, 'popular author\'s books', 1, 2),
(3, 'featured books', 1, 3),
(4, 'cd1', 2, 4),
(5, 'cd2', 2, 5),
(6, 'cd3', 2, 6),
(7, 'hd1', 3, 7),
(8, 'hd2', 3, 8),
(9, 'hd3', 3, 9),
(10, 'New Release', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `competition_id` int(11) NOT NULL,
  `competition_title` varchar(255) NOT NULL,
  `competition_topic` varchar(255) NOT NULL,
  `competition_desc` varchar(255) NOT NULL,
  `competition_start_date` varchar(255) NOT NULL,
  `competition_end_date` varchar(255) NOT NULL,
  `prize` varchar(255) NOT NULL,
  `organizer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `competitions`
--

INSERT INTO `competitions` (`competition_id`, `competition_title`, `competition_topic`, `competition_desc`, `competition_start_date`, `competition_end_date`, `prize`, `organizer`) VALUES
(1, 'write an essay for me', 'EssayWriting', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', '2021-06-09', '2021-06-10', '5000', 1),
(3, 'I want some interesting story', 'StoryWriting', 'monly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is avail', '2021-06-05', '2021-06-30', '7888', 2);

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `delivery_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `payment_id`, `delivery_status`) VALUES
(17, 17, 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `message_description` varchar(255) NOT NULL,
  `message_sender` varchar(255) NOT NULL,
  `message_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `message_description`, `message_sender`, `message_date`) VALUES
(1, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'Usman badar', '2021-06-04 11:27:14'),
(11, 'Hi there, where you can', 'Ali', '2021-06-09 07:13:44'),
(12, 'Hi ali', 'Admin', '2021-06-04 11:27:14'),
(13, 'hi there, i am waiting for you message', 'Jahangir', '2021-06-09 09:46:35'),
(14, 'Oh!! Hello Mr.Jahangir! nice to meet you', 'Admin', '2021-06-09 09:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `competition` int(11) NOT NULL,
  `txt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`id`, `user`, `status`, `competition`, `txt`) VALUES
(2, 3, 'Participate', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_amount` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `total_amount`, `payment_date`, `user_address`, `user_email`, `user_phone`, `payment_method`) VALUES
(17, 3, '45', '2021-06-10 08:05:06', 'LS-5, ST-8, SECTOR-10, NORTH KARACHI', 'usman.umer0335@gmail.com', '03303744620', 'CreditCard');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_desc` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_auther` varchar(11) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_type` varchar(11) NOT NULL,
  `post_section` varchar(11) NOT NULL,
  `category` varchar(11) NOT NULL,
  `post_price` varchar(255) NOT NULL,
  `post_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_desc`, `post_image`, `post_auther`, `post_date`, `post_type`, `post_section`, `category`, `post_price`, `post_file`) VALUES
(6, 'New post', 'including in contexts where a call would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities).', 'img1.jpg', '2', '2021-06-04 11:24:26', '1', '1', '2', '56', NULL),
(7, 'My new Car', 'including in contexts where a call would be impolite or inappropriate (e.g., calling very late at night or when one knows the other person is busy with family or work activities).', 'img4.jpg', '1', '2021-06-04 11:27:14', '1', '3', '1', '45', NULL),
(9, 'usman Badar', '54 dfds asdhg asdjkasd asdjkasd asdjkasd asdjkasd asdjks asdjkasd asdasd asdjksda asdjk', 'dasd.PNG', '2', '2021-06-07 08:55:05', '1', '1', '1', '45', NULL),
(10, 'My new Car', 'the came toh en ww eke sdkd sdjksd ss shs jhf dfg fgd gfgf ', 'avatar6.png', '2', '2021-06-07 12:41:30', '1', '1', '', '45', NULL),
(11, 'Lion king', 'This is some description of this from my own dictionary', 'ds.PNG', '2', '2021-06-08 08:41:05', '1', '1', '2', '67', NULL),
(12, 'dasdasd', 'gfdg dfgdfgfdggffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffd', 'icons8-contest-48.png', '2', '2021-06-09 07:04:06', '1', '1', '3', '56', 'Mansoor-CV.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `product_typ`
--

CREATE TABLE `product_typ` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_typ`
--

INSERT INTO `product_typ` (`id`, `type`, `code`) VALUES
(1, 'book', 1),
(2, 'cd', 2),
(3, 'hard copy', 3);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `request_title` varchar(255) NOT NULL,
  `request_desc` varchar(255) NOT NULL,
  `request_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user`, `payment_id`, `request_title`, `request_desc`, `request_status`) VALUES
(3, 3, 17, 'UmerBadar123 want to buy some items with ID 17', 'UmerBadar123 has sent $45 by CreditCard.', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `textuals`
--

CREATE TABLE `textuals` (
  `id` int(11) NOT NULL,
  `txt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `textuals`
--

INSERT INTO `textuals` (`id`, `txt`) VALUES
(13, 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_first_name`, `user_last_name`, `user_name`, `user_password`, `user_role`) VALUES
(1, 'Usman', 'Badar', 'UsmanBadar123', 'eb81a6cedc0c39492ebc881968f05b6c', 'Auther'),
(2, 'Mr.', 'Admin', 'Admin', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', 'Admin'),
(3, 'Umer', 'Badar', 'UmerBadar123', '875dc094b7c4ed88bb6ec3889bd84ae5', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorize_sections`
--
ALTER TABLE `categorize_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`competition_id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `product_typ`
--
ALTER TABLE `product_typ`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `textuals`
--
ALTER TABLE `textuals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categorize_sections`
--
ALTER TABLE `categorize_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `competition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_typ`
--
ALTER TABLE `product_typ`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `textuals`
--
ALTER TABLE `textuals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
