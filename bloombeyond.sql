-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2024 at 07:37 PM
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
-- Database: `bloombeyond`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` varchar(30) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(3) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `name`, `price`, `image`) VALUES
('cart_65cf92d9b7560', 'user_65cf91b7f2ac3', 15, 'Jewelry box', 88, 'https://i.pinimg.com/564x/8d/e0/fd/8de0fdc1bff25e23de4a039127d85fd4.jpg'),
('cart_65cf92dbe2e40', 'user_65cf91b7f2ac3', 16, 'small flower box', 45, 'https://i.pinimg.com/564x/d8/60/86/d860866fc6476b8805fc0bf4727ee619.jpg'),
('cart_65cf9393dc9fd', 'user_65cf90e8f2c91', 1, 'Strawberry Design', 22, 'https://i.pinimg.com/564x/9f/3a/c7/9f3ac785958d5d95ef88e2c613927c3e.jpg'),
('cart_65cf993b0e51b', 'user_65cf98f691175', 14, 'Graduation bouquet', 67, 'https://i.pinimg.com/564x/47/99/18/47991851be3dec2802b456625c4c26e7.jpg'),
('cart_65cf9f1c2acf2', 'user_65cf9eff5768e', 4, 'Pink Design', 45, 'https://i.pinimg.com/564x/b6/68/f8/b668f8746a35c6dbf9b53d6a4f669f20.jpg'),
('cart_65cf9f1f40e7a', 'user_65cf9eff5768e', 2, 'Bouquet Design', 29, 'https://i.pinimg.com/564x/35/2d/53/352d5319aeb667b44b3ace21ebc23b0b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gifts`
--

CREATE TABLE `gifts` (
  `product_id` int(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(3) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gifts`
--

INSERT INTO `gifts` (`product_id`, `type`, `name`, `description`, `price`, `image`) VALUES
(13, 'Graduation', 'Bear and flowers', 'A teddy bear with a graduation cap', 34, 'https://i.pinimg.com/564x/48/57/ae/4857ae0b5f0a1be2f19b90fdf7e3d0b8.jpg'),
(14, 'Graduation', 'Graduation bouquet', 'class of 2023 bouquet of 40 flowers', 67, 'https://i.pinimg.com/564x/47/99/18/47991851be3dec2802b456625c4c26e7.jpg'),
(15, 'Graduation', 'Jewelry box', 'A bracelet and a box of 60 flowers', 88, 'https://i.pinimg.com/564x/8d/e0/fd/8de0fdc1bff25e23de4a039127d85fd4.jpg'),
(16, 'Graduation', 'small flower box', 'graduation box of 30 flowers', 45, 'https://i.pinimg.com/564x/d8/60/86/d860866fc6476b8805fc0bf4727ee619.jpg'),
(17, 'Birthday', 'Necklace box', 'A necklace with six roses', 33, 'https://i.pinimg.com/736x/39/34/26/3934267222159fe034b19332548804ab.jpg'),
(18, 'Birthday', 'Chocolate box', 'Heart box with 20 red roses', 63, 'https://i.pinimg.com/564x/ee/71/25/ee7125a2560f024c25ae50016b144a2d.jpg'),
(19, 'Birthday', 'Girls gift', 'Makeup bouquet with pink design', 123, 'https://i.pinimg.com/564x/3c/48/bc/3c48bc6f89c4a0774d3fa7e01609bfd3.jpg'),
(20, 'Birthday', 'bag box', 'pink and white gift design', 134, 'https://i.pinimg.com/564x/97/c3/97/97c397e4dbe9818dfbc5712e0b98e845.jpg'),
(21, 'Wedding', 'Watch box', 'flowers decoration for a watch gift', 149, 'https://i.pinimg.com/564x/5e/d4/0c/5ed40ced522964e509aa0f4eec82dd36.jpg'),
(22, 'Wedding', 'Perfume gift', 'Heart box decoration', 213, 'https://i.pinimg.com/564x/18/8d/f7/188df73cb44e364ed4640e44e78be227.jpg'),
(23, 'Wedding', 'Cherry blossom', 'glowing pink flowers ', 77, 'https://i.pinimg.com/564x/54/cf/b0/54cfb0366db6b0331f09e50d856bd17c.jpg'),
(24, 'Wedding', 'Flowers candle', 'Red handmade flower candles', 55, 'https://i.pinimg.com/564x/0b/e1/25/0be125d21f03ef86c390445952b9ea2b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `flowers`
--

CREATE TABLE `flowers` (
  `product_id` int(5) NOT NULL,
  `type` varchar(15) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(30) NOT NULL,
  `price` int(3) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flowers`
--

INSERT INTO `flowers` (`product_id`, `type`, `name`, `description`, `price`, `image`) VALUES
(1, 'chocolate', 'Strawberry Design', 'blue and white design', 22, 'https://i.pinimg.com/564x/9f/3a/c7/9f3ac785958d5d95ef88e2c613927c3e.jpg'),
(2, 'chocolate', 'Bouquet Design', 'chocolate bouquet', 29, 'https://i.pinimg.com/564x/35/2d/53/352d5319aeb667b44b3ace21ebc23b0b.jpg'),
(3, 'chocolate', 'Birthday Design', 'round box design', 44, 'https://i.pinimg.com/564x/d0/01/7e/d0017efd8d792785cc0a320d8af8d623.jpg'),
(4, 'chocolate', 'Pink Design', 'special events design', 45, 'https://i.pinimg.com/564x/b6/68/f8/b668f8746a35c6dbf9b53d6a4f669f20.jpg'),
(5, 'balloons', 'Ribbons Design', 'round box balloon', 36, 'https://i.pinimg.com/564x/4c/39/cb/4c39cb4ca61354425ff70ee33097ff29.jpg'),
(6, 'balloons', 'Graduation Design', 'round box flowers', 28, 'https://i.pinimg.com/564x/d8/74/85/d87485060dce996bf4d16592aef1217a.jpg'),
(7, 'balloons', 'Bouquet Design', 'balloon bouquet', 76, 'https://i.pinimg.com/564x/53/bf/ac/53bfac27c3a0c773976a3946a09e2132.jpg'),
(8, 'balloons', 'Purple Design', 'small flower box', 33, 'https://i.pinimg.com/564x/a8/9b/fa/a89bfa9e1d7259e4c6612c93f9378445.jpg'),
(9, 'Bouquets', 'blue and white', 'small dazy bouquet', 99, 'https://i.pinimg.com/564x/e3/87/de/e387de390bc4b5cbe841df1ada4f5ae1.jpg'),
(10, 'Bouquets', 'Tulip bouquet', '10 Pink tulips', 122, 'https://i.pinimg.com/564x/71/f7/fa/71f7fa78023e4271bccb1ba2a887804e.jpg'),
(11, 'Bouquets', 'Purple bouquet', 'white and purple flowers ', 159, 'https://i.pinimg.com/564x/93/e6/19/93e619146ed436b8a3cba2339846a6ab.jpg'),
(12, 'Bouquets', 'Yellow bouquet', '20 sunflowers flowers bouquet', 149, 'https://i.pinimg.com/736x/56/88/ad/5688adc05ce02d64738b5ba82a7fc6e3.jpg');

-- --------------------------------------------------------
--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `card_number` int(16) NOT NULL,
  `expiry_month` int(2) NOT NULL,
  `expiry_year` int(2) NOT NULL,
  `cv_code` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `card_number`, `expiry_month`, `expiry_year`, `cv_code`) VALUES
(17, 'user_65cfa95673c1b', 2147483647, 9, 25, 776),
(18, 'user_65cfa95673c1b', 1147483842, 4, 27, 884);

-- --------------------------------------------------------

--
-- Table structure for table `reported_problems`
--

CREATE TABLE `reported_problems` (
  `id` int(11) NOT NULL,
  `user_id` varchar(30) NOT NULL,
  `reported_problem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reported_problems`
--

INSERT INTO `reported_problems` (`id`, `user_id`, `reported_problem`) VALUES
(1, 'user_65cf9eff5768e', 'I can\\\'t view my profile'),
(2, 'user_65cf9eff5768e', 'I can\\\'t view my profile');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(30) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
('user_65cf9eff5768e', 'Jenan', 'jenanaljurishi2@gmail.com', '$2y$10$olWcgEwhJwL0t3yC9w2pv.7bsWbUn3gBKx8eV1ppQigBRxCccqHbK'),
('user_65cfa95673c1b', 'Dana', 'dana@gmail.com', '$2y$10$KBXMqnaSmY9dldgTqwSTyeLhqmjkYrcYZpdWZPQr.PT4vOvi4ZOOG'),
('user_65cfaaa1413c2', 'Layan', 'layan@gmail.com', '$2y$10$zTQi7X.Trm.p2K0Ya8wIDOIDa3JDFtXWeN8DtiEVE7W8maBmd0cpK'),
('user_65cfaab831417', 'Manar', 'manar@gmail.com', '$2y$10$FUGy.I8eoikiZE9LoinyPuT6DC7wNohTYCZxx1wB8sD1mBhp2X1gq'),
('user_65cfaacb2d7de', 'Rital', 'rital@gmail.com', '$2y$10$24CRNrlR4uYprh5U.YA18.lHi8taAtAmsci.uHHNHGHjGCwQvVEMa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reported_problems`
--
ALTER TABLE `reported_problems`
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
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reported_problems`
--
ALTER TABLE `reported_problems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
