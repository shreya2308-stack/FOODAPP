-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 07:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cart_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `product_price` varchar(50) CHARACTER SET latin1 NOT NULL,
  `product_image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `qty` int(10) NOT NULL,
  `total_price` int(100) NOT NULL,
  `product_code` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pmode` varchar(50) CHARACTER SET latin1 NOT NULL,
  `products` varchar(255) CHARACTER SET latin1 NOT NULL,
  `amount_paid` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`) VALUES
(7, 'sam', 'sam@gmail.com', '1234567890', 'asda', 'netbanking', 'Sprouts(1), Spring Roll(1)', '100'),
(9, 'sam', 'sam@gmail.com', '1234567890', '', 'netbanking', 'Sprouts(1)', '30'),
(10, 'sam', 'sam@gmail.com', '1234567890', '', 'cards', 'Pasta(1), Fruits(1), Pizza(1)', '260'),
(11, 'New', 'new@gmail.com', '1234567890', '', 'netbanking', 'Corns(1)', '30'),
(12, 'group', 'group@gmail.com', '1234567890', '', 'cod', 'Corns(4)', '120');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `product_price` varchar(50) CHARACTER SET latin1 NOT NULL,
  `product_image` varchar(255) CHARACTER SET latin1 NOT NULL,
  `product_code` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`, `product_code`) VALUES
(1, 'Maggi', '20', 'Images/maggi.jpg', 'p1000'),
(2, 'Sprouts', '30', 'Images/Sprout.jpg', 'p1001'),
(3, 'Corns', '30', 'Images/corn.jpg', 'p1002'),
(4, 'Spring Roll', '70', 'Images/spring.jpg', 'p1003'),
(9, 'Toast (2pc)', '10', 'Images/bread.jpg', 'p1004'),
(10, 'Pizza', '120', 'Images/pizza.jpg', 'p1005'),
(11, 'Pasta', '90', 'Images/pasta.jpg', 'p1006'),
(15, 'Fruits', '50', 'Images/fruit.jpg', 'p1007');

-- --------------------------------------------------------

--
-- Table structure for table `registration1`
--

CREATE TABLE `registration1` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration1`
--

INSERT INTO `registration1` (`id`, `username`, `email`, `phone`, `password`, `cpassword`) VALUES
(7, 'sam', 'sam@gmail.com', '1234567890', '$2y$10$YnvyATMz.9ETbbbpVNW4KOZeNlJb/oddsw8vOjj0EZ04C1FGx.Zf6', '$2y$10$9uaexPi8eQrIAf6UoA.shezgQlwWUSgHA9mwA7nd4tuEQox7uOefO'),
(8, 'New', 'new@gmail.com', '1234567890', '$2y$10$6qnhYcrKuSjbJkNR0Fw.Q.0wR.J2V13J6Z/Rt4NPJzfUs9PHgyV.e', '$2y$10$LzK/oib2y27lXztOG6j/LO62x1mgQntjI7u5sDv9/Ywu8rz6rCF0a'),
(9, 'group', 'group@gmail.com', '1234567890', '$2y$10$QoOdvJh5ioKx/q/tuDh5S.FjvC4S9q4siEaVddzhqXMtbBY3ekdB2', '$2y$10$qJhkeY0L7wDM5NJlk/jgFOLEWvkaXD10s4CA3DRli9FU/Ed4ml79G'),
(10, 'wd12da', 'sda@gs.com', '1234567890', '$2y$10$Jx2.sK.EeZfLPygrpDsikeL0LnHSaiaCEdpxauuTTuB.vpv/A7lnO', '$2y$10$PAp8Q8rDLnPjtQAN7vTPiOMTbJeAZS1gBHRoKsF07JMfVoVxA1XG6'),
(11, 'heyyy', 'heyyy@gmail.com', '1234567890', '$2y$10$wjtzwnQfXmkKXnNTmIYLhODbaN4WmxnbfVohDQCNbBMDxWnU4o8aS', '$2y$10$ORxl7YQuIkyn06o021NFYOvsGRiGuHXbznpIFLtuZsRsIKk8IG2iS'),
(12, 'admin', 'admin@foodnest.com', '1234567890', '$2y$10$j9xxjLLtxtvj17cyRkYjQuE83WewKPks7C9X37Mhpyqz/46eqZafu', '$2y$10$Mf6tvP.7ceTQms83g8j9lu39MXYqqQxSJIUwbB31aqFnvX9Yk90lS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration1`
--
ALTER TABLE `registration1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `registration1`
--
ALTER TABLE `registration1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`name`) REFERENCES `registration1` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
