-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 07:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(5) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feed_subject` varchar(200) CHARACTER SET utf8 NOT NULL,
  `feed_msg` varchar(2000) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feed_id`, `user_id`, `feed_subject`, `feed_msg`) VALUES
(10, 27, 'Positive Feedback', 'Perfect online grocery store for after work grocery shopping. Our family loves shopping with Grocery Shoppy. I can guarantee that you will surely get a much better grocery shopping experience here than anywhere else. Thanks again I have a great experience shopping with you guys each time. '),
(11, 26, 'Positive Feedback', 'I\'ve recently shopped groceries online and I really like Grocery Shoppy. It is very difficult for me to go shopping with severe health issues. I recommend online grocery shopping through Grocery Shoppy to anyone who has trouble getting out or have physical issues '),
(12, 25, 'Positive Feedback', 'Shopping was a nice change with Grocery Shoppy I will never go to another grocery store in the city. Love the service of their staff, love the grocery items. Best of all it was really very very easy to shop groceries here... very easy!'),
(13, 41, 'Positive Feedback', 'Grocery Shoppy products are VERY VERY GOOD in quality. I could not get these quality product for this price even in Town Hall'),
(14, 25, 'Query or Complaint', 'Bugs needed to be solve as soon as possible.\r\nThankss!!');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(5) NOT NULL,
  `prod_mst_id` int(11) NOT NULL,
  `prod_name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `prod_price` int(100) NOT NULL,
  `prod_discount` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `prod_mst_id`, `prod_name`, `prod_price`, `prod_discount`) VALUES
(1, 1, 'Basmati rice', 150, 10),
(2, 2, 'Detergent', 500, 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_mst`
--

CREATE TABLE `product_mst` (
  `prod_mst_id` int(11) NOT NULL,
  `prod_mst_cat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_mst`
--

INSERT INTO `product_mst` (`prod_mst_id`, `prod_mst_cat`) VALUES
(1, 'Kitchen Product'),
(2, 'Household Product'),
(3, 'Beauty Product');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'Customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Om Prakash Pachori', 'OmPrakash@gmail.com', 'Owner@123', 'Owner'),
(25, 'Nishant Jain', 'nj27nishant@gmail.com', 'Abcde@123', 'Customer'),
(26, 'Jay Kapoor', 'jay.kapoor@gmail.com', 'Abcde@123', 'Customer'),
(27, 'Nayshree ', 'nayshreepachori@gmail.com', 'Abcde@123', 'Customer'),
(41, 'Priyal', 'Priyal@gmail.com', 'Priyal@123', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `User_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `pro_id` (`prod_id`),
  ADD UNIQUE KEY `prod_id` (`prod_id`),
  ADD KEY `prod_mst_id` (`prod_mst_id`);

--
-- Indexes for table `product_mst`
--
ALTER TABLE `product_mst`
  ADD PRIMARY KEY (`prod_mst_id`),
  ADD UNIQUE KEY `pro_mst_id` (`prod_mst_id`),
  ADD UNIQUE KEY `prod_mst_id` (`prod_mst_id`),
  ADD UNIQUE KEY `prod_mst_id_2` (`prod_mst_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feed_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`prod_mst_id`) REFERENCES `product_mst` (`prod_mst_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
