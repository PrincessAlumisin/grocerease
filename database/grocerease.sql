-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 08:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerease`
--

-- --------------------------------------------------------

--
-- Table structure for table `drop_items`
--

CREATE TABLE `drop_items` (
  `prodID` int(11) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodCate` varchar(255) NOT NULL,
  `prodPromo` varchar(255) NOT NULL,
  `prodPrice` float(11,2) NOT NULL,
  `prodQuan` varchar(255) NOT NULL,
  `manufact` varchar(255) NOT NULL,
  `manuDate` date NOT NULL DEFAULT current_timestamp(),
  `expiDate` date NOT NULL DEFAULT current_timestamp(),
  `prodAmountSold` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drop_items`
--

INSERT INTO `drop_items` (`prodID`, `prodName`, `prodCate`, `prodPromo`, `prodPrice`, `prodQuan`, `manufact`, `manuDate`, `expiDate`, `prodAmountSold`) VALUES
(59, 'Organic Green Tea', 'Beverages', '', 3.49, '190', 'TeaHarmony Co.', '2023-03-23', '2024-03-23', 10.00),
(68, 'Organic Kale Chips', 'Snacks and Chips', '', 30.00, '60', 'CrunchDelight Snacks', '2023-02-16', '2024-02-06', 10.00),
(69, 'Fresh Broccoli', 'Vegetables', '', 94.68, '7', 'GreenHarbor Farms', '2024-02-01', '2024-02-15', 0.00),
(89, 'Pancit Canton ChiliMansi', 'Instant Food', '', 12.00, '50pcs', 'Sapporo Products Inc.', '2023-12-01', '2024-02-10', 0.00),
(90, 'Pancit Canton Calamansi', 'Instant Food', '', 12.00, '55pcs', 'Sapporo Products Inc.', '2024-01-01', '2024-02-10', 0.00),
(92, 'Dingdong Snack Mix 100g', 'Snacks and Chips', '', 23.00, '20pcs', 'Rebisco', '2023-12-07', '2024-02-09', 0.00),
(93, 'Bingo Corned Beef 100g', 'Canned Goods', '', 22.00, '20pcs', 'Marina Sales Inc.', '2023-12-07', '2024-02-09', 0.00),
(102, 'Vcut', 'Snacks and Chips', '', 15.00, '123kg', 'Jack and Jill', '2023-01-01', '2024-01-01', 0.00),
(110, 'Oranges ', 'Fruits', '', 10.00, '20pcs', 'Orangepop Enterprise', '2024-01-28', '2024-01-30', 0.00),
(112, 'Orangee', 'Fruits', '', 23.75, '10', 'Orange Inc.', '2024-01-30', '2024-02-03', 0.00),
(113, 'Orangee', 'Fruits', '', 12.50, '10', 'Orange Inc.', '2024-01-30', '2024-02-03', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `manage_product`
--

CREATE TABLE `manage_product` (
  `prodID` int(11) NOT NULL,
  `prodName` varchar(255) NOT NULL,
  `prodCate` varchar(255) NOT NULL,
  `prodPromo` varchar(255) NOT NULL,
  `prodPrice` float(11,2) NOT NULL,
  `prodQuan` varchar(255) NOT NULL,
  `manufact` varchar(255) NOT NULL,
  `manuDate` date NOT NULL DEFAULT current_timestamp(),
  `expiDate` date NOT NULL DEFAULT current_timestamp(),
  `prodAmountSold` decimal(10,2) DEFAULT 0.00,
  `originalPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_product`
--

INSERT INTO `manage_product` (`prodID`, `prodName`, `prodCate`, `prodPromo`, `prodPrice`, `prodQuan`, `manufact`, `manuDate`, `expiDate`, `prodAmountSold`, `originalPrice`) VALUES
(21, 'Tomato Ketchup', 'Herbs and Spices', '', 100.00, '61', 'Heinz', '2021-02-02', '2024-10-15', 101.00, 100.00),
(57, 'Vcut', 'Snacks and Chips', '', 13.00, '30', 'Jack and Jill', '2024-01-29', '2024-03-29', 40.00, 13.00),
(59, 'Organic Green Tea', 'Beverages', '', 3.49, '190', 'TeaHarmony Co.', '2023-03-23', '2024-03-23', 10.00, 3.49),
(60, 'Classic Tomato Soup', 'Canned Goods', '', 89.68, '270', 'CanMasters Inc.', '2023-12-05', '2025-03-02', 30.00, 89.68),
(61, 'Organic Whole Milk', 'Dairy', '', 193.27, '140', 'PureDairy Farms', '2024-01-01', '2024-01-31', 10.00, 193.27),
(62, 'Gourmet Frozen Pizza', 'Frozen Foods', '', 399.91, '90', 'FrostyBite Foods', '2023-12-07', '2024-12-07', 10.00, 399.91),
(64, 'Quinoa and Brown Rice Blend', 'Grains', '', 107.90, '227', 'NutriGrains Co.', '2023-10-17', '2024-10-14', 23.00, 107.90),
(65, 'Organic Basil Leaves', 'Herbs and Spices', '', 52.33, '166', 'SpiceCrafters Ltd.', '2023-03-12', '2024-03-12', 14.00, 52.33),
(71, 'Hotdog', 'Frozen Foods', '', 100.00, '10', 'PureFoods', '2023-10-15', '2024-02-01', 10.00, 100.00),
(72, 'Piattos', 'Snacks and Chips', '', 35.00, '20', 'Jack and Jill', '2024-02-01', '2024-12-02', 0.00, 35.00),
(73, 'Chicharon', 'Snacks and Chips', '', 10.00, '10', 'Mang Juan', '2024-02-02', '2024-03-03', 0.00, 10.00),
(75, 'Ice candy', 'Frozen Foods', '', 5.00, '30', 'IceIce Baby', '2024-02-02', '2024-03-03', 0.00, 5.00),
(76, 'Mineral Water', 'Beverages', '', 15.00, '20', 'WateryHills', '2024-01-01', '2024-03-03', 0.00, 15.00),
(78, 'Spaghetti', 'Instant Food', '', 23.00, '23', 'Jack and Jill', '2023-03-03', '2024-03-03', 0.00, 23.00),
(84, 'Toasted Bread', 'Bakery', '5', 5.70, '2', 'bekery', '2023-03-01', '2024-02-02', 10.00, 6.00),
(85, '555 Tuna', 'Canned Goods', '', 30.00, '20', '555', '2023-03-03', '2024-03-03', 0.00, 30.00),
(105, 'Jin Ramen', 'Instant Food', '50', 34.50, '113', 'Jin', '2023-02-01', '2024-02-02', 10.00, 69.00),
(111, 'Orange', 'Fruits', '20', 20.00, '100', 'orange inc.', '2024-01-31', '2024-02-03', 0.00, 25.00),
(114, 'Vcut Potato Chips', 'Snacks and Chips', '20', 24.00, '40', 'Jack n Jill', '2024-01-28', '2024-02-04', 0.00, 30.00),
(115, 'CDO Meat Loaf 100g', 'Canned Goods', '5', 19.95, '30', 'Foodsphere Inc.', '2024-01-03', '2024-02-15', 0.00, 0.00),
(116, 'Purefoods Corned Beef 210g', 'Canned Goods', '', 125.00, '40', 'San Miguel Food and Beverage, Inc.', '2023-08-08', '2024-05-31', 0.00, 0.00),
(117, 'Pancit Canton ChiliMansi', 'Instant Food', '20', 10.40, '50', 'Sapporo Products Inc.', '2023-02-01', '2024-02-12', 0.00, 0.00),
(118, 'CDO Cornbeef 150g', 'Canned Goods', '20', 29.60, '25', 'CDO Foodsphere, Inc.', '2023-10-17', '2024-02-12', 0.00, 0.00),
(119, 'Dingdong Snack Mix 100g', 'Snacks and Chips', '5', 21.85, '60', 'Rebisco Inc.', '2023-07-13', '2024-02-13', 0.00, 0.00),
(120, 'Bingo Corned Beef 100g', 'Canned Goods', '20', 17.60, '30', 'Marina Sales Inc.', '2023-06-14', '2024-02-13', 0.00, 0.00),
(121, 'Pancit Canton ChiliMansi', 'Instant Food', '', 0.00, '45', 'Sapporo Products Inc.', '2023-11-09', '2024-02-14', 0.00, 0.00),
(122, 'Pancit Canton Calamansi', 'Instant Food', '', 13.00, '45', 'Sapporo Products Inc.', '2023-10-26', '2024-02-14', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `message`, `date`) VALUES
(51, 'Soon to Expire', 'Product (Organic Whole Milk) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(52, 'Soon to Expire', 'Product (Organic Mixed Berry Blend) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(53, 'Soon to Expire', 'Product (Organic Kale Chips) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(54, 'Soon to Expire', 'Product (Hotdog) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(55, 'Soon to Expire', 'Product (Toasted Bread) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(56, 'Soon to Expire', 'Product (Vcut) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(57, 'Soon to Expire', 'Product (Jin Ramen) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(58, 'Soon to Expire', 'Product (Jin Ramen2) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(59, 'Soon to Expire', 'Product (Jin Ramen3) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(60, 'Soon to Expire', 'Product (Jin Ramen4) is soon to expire in 2 weeks.', '2024-01-30 11:30:24'),
(61, 'Expired Product', 'Product (Artisan Sourdough Bread) has expired.', '2024-01-30 11:36:15'),
(62, 'Expired Product', 'Product (Instant Oatmeal Packets) has expired.', '2024-01-30 11:36:15'),
(63, 'New Product Added', 'A new product (Sauerkraut) has been added to the system.', '2024-01-30 11:38:33'),
(64, 'Expired Product', 'Product (Sauerkraut) has expired.', '2024-01-30 11:38:36'),
(65, 'New Product Added', 'A new product (Sauerkraut) has been added to the system.', '2024-01-30 11:39:41'),
(66, 'New Product Added', 'A new product (Sauerkraut) has been added to the system.', '2024-01-30 11:41:07'),
(67, 'Expired Product', 'Product (Sauerkraut) has expired.', '2024-01-30 11:45:07'),
(68, 'New Product Added', 'A new product (Sauerkraut) has been added to the system.', '2024-01-30 11:47:03'),
(69, 'Expired Product', 'Product (Sauerkraut) has expired.', '2024-01-30 11:47:03'),
(70, 'New Product Added', 'A new product (Vcut) has been added to the system.', '2024-01-30 11:48:01'),
(71, 'Expired Product', 'Product (Vcut) has expired.', '2024-01-30 11:48:01'),
(72, 'New Product Added', 'A new product (Piattos) has been added to the system.', '2024-01-30 11:50:01'),
(73, 'Expired Product', 'Product (Piattos) has expired.', '2024-01-30 11:50:01'),
(74, 'New Product Added', 'A new product (Vcut) has been added to the system.', '2024-01-30 11:51:07'),
(75, 'New Product Added', 'A new product (Vcut) has been added to the system.', '2024-01-30 11:52:01'),
(76, 'Expired Product', 'Product (Vcut) has expired.', '2024-01-30 11:52:01'),
(77, 'New Product Added', 'A new product (Jin Ramens) has been added to the system.', '2024-01-30 11:53:22'),
(78, 'Soon to Expire', 'Product (Jin Ramens) is soon to expire in 2 weeks.', '2024-01-30 11:53:28'),
(79, 'Expired Product', 'Product (Chicharon) has expired.', '2024-01-30 11:54:35'),
(80, 'New Product Added', 'A new product (Jin Ramen) has been added to the system.', '2024-01-30 12:19:53'),
(81, 'Soon to Expire', 'Product (Premium Angus Beef Steak) is soon to expire in 2 weeks.', '2024-01-31 02:33:07'),
(82, 'Soon to Expire', 'Product (CDO Meat Loaf 100g) is soon to expire in 2 weeks.', '2024-01-31 02:37:55'),
(83, 'Soon to Expire', 'Product (Purefoods Corned Beef 210g) is soon to expire in 2 weeks.', '2024-01-31 02:37:55'),
(84, 'Soon to Expire', 'Product (Pancit Canton ChiliMansi) is soon to expire in 2 weeks.', '2024-01-31 02:37:55'),
(85, 'Soon to Expire', 'Product (Pancit Canton Calamansi) is soon to expire in 2 weeks.', '2024-01-31 02:37:55'),
(86, 'Soon to Expire', 'Product (CDO Cornbeef 150g) is soon to expire in 2 weeks.', '2024-01-31 02:37:56'),
(87, 'Soon to Expire', 'Product (Dingdong Snack Mix 100g) is soon to expire in 2 weeks.', '2024-01-31 02:37:56'),
(88, 'Soon to Expire', 'Product (Bingo Corned Beef 100g) is soon to expire in 2 weeks.', '2024-01-31 02:37:56'),
(89, 'Soon to Expire', 'Product (Vcut Potato Chips) is soon to expire in 2 weeks.', '2024-01-31 02:37:56'),
(90, 'New Product Added', 'A new product (Oranges ) has been added to the system.', '2024-01-31 07:36:26'),
(91, 'Expired Product', 'Product (Oranges ) has expired.', '2024-01-31 07:36:26'),
(92, 'New Product Added', 'A new product (Oranges ) has been added to the system.', '2024-01-31 07:39:26'),
(93, 'Expired Product', 'Product (Oranges ) has expired.', '2024-01-31 07:39:26'),
(94, 'New Product Added', 'A new product (Oranges ) has been added to the system.', '2024-01-31 07:49:09'),
(95, 'Expired Product', 'Product (Oranges ) has expired.', '2024-01-31 07:49:09'),
(96, 'New Product Added', 'A new product (Oranges ) has been added to the system.', '2024-01-31 07:55:59'),
(97, 'Expired Product', 'Product (Oranges ) has expired.', '2024-01-31 07:55:59'),
(98, 'New Product Added', 'A new product (Oranges ) has been added to the system.', '2024-01-31 10:24:21'),
(99, 'Expired Product', 'Product (Oranges ) has expired.', '2024-01-31 10:24:21'),
(100, 'Soon to Expire', 'Product (Fresh Broccoli) is soon to expire in 2 weeks.', '2024-02-02 04:42:13'),
(101, 'Expired Product', 'Product (Organic Whole Milk) has expired.', '2024-02-02 04:56:33'),
(102, 'Expired Product', 'Product (Hotdog) has expired.', '2024-02-02 04:56:33'),
(103, 'New Product Added', 'A new product (Orange) has been added to the system.', '2024-02-02 05:15:33'),
(104, 'Soon to Expire', 'Product (Orange) is soon to expire in 2 weeks.', '2024-02-02 05:15:36'),
(105, 'New Product Added', 'A new product (Orangee) has been added to the system.', '2024-02-02 05:16:18'),
(106, 'New Product Added', 'A new product (Orangee) has been added to the system.', '2024-02-02 05:17:16'),
(107, 'New Product Added', 'A new product (Vcut Potato Chips) has been added to the system.', '2024-02-02 05:17:57'),
(108, 'Soon to Expire', 'Product (Orangee) is soon to expire in 2 weeks.', '2024-02-02 05:18:04'),
(109, 'New Product Added', 'A new product (CDO Meat Loaf 100g) has been added to the system.', '2024-02-02 06:17:02'),
(110, 'New Product Added', 'A new product (Purefoods Corned Beef 210g) has been added to the system.', '2024-02-02 06:30:08'),
(111, 'New Product Added', 'A new product (Pancit Canton ChiliMansi) has been added to the system.', '2024-02-02 06:32:42'),
(112, 'New Product Added', 'A new product (CDO Cornbeef 150g) has been added to the system.', '2024-02-02 06:34:57'),
(113, 'New Product Added', 'A new product (Dingdong Snack Mix 100g) has been added to the system.', '2024-02-02 06:35:56'),
(114, 'New Product Added', 'A new product (Bingo Corned Beef 100g) has been added to the system.', '2024-02-02 06:36:36'),
(115, 'New Product Added', 'A new product (Pancit Canton ChiliMansi) has been added to the system.', '2024-02-02 06:39:20'),
(116, 'New Product Added', 'A new product (Pancit Canton Calamansi) has been added to the system.', '2024-02-02 06:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `sold_items`
--

CREATE TABLE `sold_items` (
  `id` int(11) NOT NULL,
  `prodID` int(11) DEFAULT NULL,
  `prodName` varchar(255) DEFAULT NULL,
  `prodAmountSold` decimal(10,2) DEFAULT NULL,
  `prodCate` varchar(255) NOT NULL,
  `soldPrice` decimal(10,2) NOT NULL,
  `soldDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sold_items`
--

INSERT INTO `sold_items` (`id`, `prodID`, `prodName`, `prodAmountSold`, `prodCate`, `soldPrice`, `soldDate`) VALUES
(6, 21, 'Tomato Ketchup', 39.00, 'Herbs and Spices', 3900.00, '2024-01-29'),
(7, 57, 'Vcut', 33.00, 'Snacks and Chips', 429.00, '2024-01-29'),
(8, 59, 'Organic Green Tea', 10.00, 'Beverages', 34.90, '2024-01-30'),
(9, 60, 'Classic Tomato Soup', 30.00, 'Canned Goods', 2690.40, '2024-01-30'),
(10, 64, 'Quinoa and Brown Rice Blend', 23.00, 'Grains', 2481.70, '2024-01-30'),
(11, 62, 'Gourmet Frozen Pizza', 10.00, 'Frozen Foods', 3999.10, '2024-01-30'),
(12, NULL, 'Premium Angus Beef Steak', 10.00, 'Meat Poultry', 3898.80, '2024-01-30'),
(13, 65, 'Organic Basil Leaves', 14.00, 'Herbs and Spices', 732.62, '2024-01-30'),
(14, NULL, 'Fresh Broccoli', 13.00, 'Vegetables', 1230.84, '2024-01-30'),
(15, NULL, 'Organic Kale Chips', 20.00, 'Snacks and Chips', 600.00, '2024-01-30'),
(16, 61, 'Organic Whole Milk', 10.00, 'Dairy', 1932.70, '2024-01-30'),
(17, NULL, 'Organic Mixed Berry Blend', 10.00, 'Fruits', 2498.30, '2024-01-30'),
(18, 71, 'Hotdog', 10.00, 'Frozen Foods', 1000.00, '2024-01-30'),
(19, 84, 'Toasted Bread', 10.00, 'Bakery', 120.00, '2024-01-30'),
(20, 105, 'Jin Ramen', 10.00, 'Instant Food', 690.00, '2024-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `code`) VALUES
(39, 'Raven', 'williamminerva2112@gmail.com', 'bcbe3365e6ac95ea2c0343a2395834dd', ''),
(40, 'Nero', 'augustusnero2020@gmail.com', 'd6450a4ce0e17fef93b3c15297cab2c0', ''),
(41, 'Joshua', 'markjoshuamutya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', ''),
(42, 'Thesis', 'thesis40013@gmail.com', 'e90608b448fdcdac4b6ccbf819c39da8', ''),
(44, 'grasya', 'grace.caballeroalumisin@gmail.com', '77a37ec34fd454cfc7823cd241c436b2', '4dc0963fb3c6e43a73254310169179de');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drop_items`
--
ALTER TABLE `drop_items`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `manage_product`
--
ALTER TABLE `manage_product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drop_items`
--
ALTER TABLE `drop_items`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `manage_product`
--
ALTER TABLE `manage_product`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `sold_items`
--
ALTER TABLE `sold_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sold_items`
--
ALTER TABLE `sold_items`
  ADD CONSTRAINT `sold_items_ibfk_1` FOREIGN KEY (`prodID`) REFERENCES `manage_product` (`prodID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
