-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 11:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `availedge`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`admin_id`, `name`, `email`, `password`) VALUES
(2, 'Alif Chowdhury', 'alifchowdhury27@gmail.com', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `user_id`, `user_name`, `email`, `message`) VALUES
(1, 7, 'Lily', 'lili@mail.com', 'Hello Admin');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job` varchar(500) NOT NULL,
  `place` varchar(1000) NOT NULL,
  `payment` varchar(500) NOT NULL,
  `time` varchar(1000) NOT NULL,
  `des` text NOT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`post_id`, `user_id`, `job`, `place`, `payment`, `time`, `des`, `category`) VALUES
(1, 7, 'Writer', 'Dhaka, Gazipur', '5000', '1-4pm', 'Very Good', 'Hourly'),
(2, 9, 'electrician', 'Gazipur, Savar', '6000', '4-6pm', 'Chomolokko', 'Daily'),
(3, 10, 'Data Collector', 'Savar, Cumilla', '10000', '1-9pm', 'very expert', 'Monthly'),
(4, 7, 'Others', 'Dhaka, Gazipur, Savar', '7000', '6-8pm', 'Very Passionate', 'Hourly'),
(5, 10, 'Photographer', 'Dhaka, Gazipur, Cumilla', '7000', '1-5pm', 'Best!!!', 'Hourly'),
(6, 12, 'DJ', 'Dhaka', '10000', '5-10pm', 'Best of best', 'Hourly'),
(7, 7, 'DJ', 'Gazipur, Savar', '1444', '2-4pm', 'Very professional', 'Hourly'),
(8, 10, 'DJ', 'Dhaka, Gazipur', '5000', '2-6pm', 'veryy', 'Hourly'),
(9, 10, 'Others', 'Cumilla', '7000', '1-9', 'good', 'Hourly'),
(10, 10, 'Writer', 'Gazipur, Savar, Cumilla', '10000', '10-12', 'good', 'Hourly'),
(11, 10, 'Plumber', 'Savar', '1000', '3-7pm', 'very smart', 'Daily'),
(12, 10, 'Account Manager', 'Dhaka', '20000', '3-10pm', 'intelligent', 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `request_status`
--

CREATE TABLE `request_status` (
  `request_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_status`
--

INSERT INTO `request_status` (`request_id`, `post_id`, `user_id`, `service_id`, `status`) VALUES
(38, 4, 9, 7, 'accept'),
(39, 5, 12, 10, 'accept'),
(40, 1, 12, 7, 'accept'),
(41, 4, 12, 7, 'accept'),
(47, 6, 7, 12, 'pending'),
(48, 5, 9, 10, 'accept'),
(49, 10, 11, 10, 'accept'),
(50, 9, 11, 10, 'accept'),
(51, 8, 11, 10, 'accept'),
(52, 12, 17, 10, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `age` int(100) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `nid` varchar(100) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `age`, `address`, `gender`, `phone`, `nid`, `pass`, `active`) VALUES
(7, 'Lili', 'lili@mail.com', 32, 'Khulna                                                                    ', 'Female', '453657548', '0134673588', '4444', 1),
(8, 'Emily', 'emily@mail.com', 34, 'Comilla', 'Female', '016265892', '34584365838', '6666', 1),
(9, 'wasi', 'wasi@mail.com', 22, 'DHaka', 'Male', '0143616316', '3416373735', '1111', 1),
(10, 'rajib', 'rajib@mail.com', 22, 'Dhaka', 'Male', '0154367342', '43636333346', 'rrrr', 1),
(11, 'Golam', 'golam@mail.com', 22, 'Mirpur', 'Male', '0156556574', '4574754242', '3333', 1),
(12, 'Rifat', 'rifat@gmail.com', 33, 'Dhanmondi', 'Male', '0163477468', '34673588345', '1111', 1),
(13, 'Subhey', 'sybhey@mail.com', 22, 'Dhaka', 'Male', '01636527547', '4631646332', '3333', 1),
(14, 'Fardin', 'fardin@mail.com', 22, 'Dhaka                        ', 'Male', '0125464634', '52346553656', '1111', 1),
(15, 'Shakin', 'sakin@mail.com', 22, 'Dhaka', 'Male', '017347373', '3477347457', '4444', 0),
(16, 'Hiba', 'hiba@mail.com', 24, 'Mirpur', 'Female', '0176478783', '854277646', '1111', 0),
(17, 'bibid', 'bibid@mail.com', 23, 'Dhaka', 'Male', '01746368235', '9738285282', '1111', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `request_status`
--
ALTER TABLE `request_status`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_status`
--
ALTER TABLE `request_status`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `request_status`
--
ALTER TABLE `request_status`
  ADD CONSTRAINT `request_status_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `request_status_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `job` (`post_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
