-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 01, 2022 at 10:33 PM
-- Server version: 10.5.16-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u632986454_DB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Products`
--

CREATE TABLE `Products` (
  `id` int(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `description` varchar(300) NOT NULL,
  `quantity` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Products`
--

INSERT INTO `Products` (`id`, `name`, `photo`, `price`, `description`, `quantity`) VALUES
(11, 'Light colour ceramic coffee mug', '../img/IMG_2726.JPG', '35', 'Ceramic coffee mug with a unique design and a glossy layer - 350 ml.', '3'),
(12, 'Retro Style Ceramic Mug', '../img/IMG55.jpg', '60', 'Large size mug - 500 ml.', '3'),
(13, 'Espresso measuring cup', '../img/IMG8.jpg', '39', 'Standard cup inserted to calibrate the amount of coffee for drinks - 6 x 6 cm.', '8'),
(14, 'Ceramic coffee drip pot', '../img/IMG99.jpg', '115', 'Handmade ceramic drip pot with beautiful details to enjoy your drip coffee, it consists of two pieces - 270 ml.', '10'),
(15, 'Everything Butter Coaster', '../img/IMG101.jpg', '20', '1 Coaster of acacia wood.', '4'),
(16, 'Decaf House Blend Coffee', '../img/img67.jpg', '150', 'Light-bodied decaf coffee with a subtle fruity aroma and buttery finish - 453 g.', '7'),
(17, 'Decaf Espresso Roast coffee', '../img/IMG68.jpg', '120', 'Velvety body with caramel like aroma, earthy flavor and a bittersweet finish without the caffeine - 453 g.', '15'),
(18, 'Coffee Manual Grinder', '../img/IMG710.jpg', '50', 'The grinding mechanism “cuts” coffee beans in a very unique way. The grind result is extremely exact and very uniform with the least amount of coffee dust - 75 g.', '8'),
(19, 'Black Gold NO3', '../img/IMG720.jpg', '220', 'Its rich chocolate and biscuit base which makes  it very drinkable - 227 g.', '5'),
(20, 'Candle Light NO1', '../img/IMG730.jpg', '220', 'A blend of brazil, El Salvador & Uganda Arabica coffee, Candle Light explores deep flavours of dark chocolate with a subtle hint of tobacco - 227 g.', '13'),
(21, 'Anthractise NO2', '../img/IMG750.jpg', '220', 'he criteria for Anthracite was a juicy fruity NATURAL Espresso full of flavour - 227 g.', '4'),
(22, 'V60', '../img/IMG820.jpg', '350', 'The V60 dripper has a single large hole, which allows you to determine the flavour of the ground coffee by adjusting the water flow - 750 ml.', '7');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `password`) VALUES
('Fajer', 'fajer@gmail.com', '1'),
('Shaden', 'shaden@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `viewOrders`
--

CREATE TABLE `viewOrders` (
  `orderNo` int(150) NOT NULL,
  `customerEmail` varchar(50) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `viewOrders`
--

INSERT INTO `viewOrders` (`orderNo`, `customerEmail`, `total`) VALUES
(13, 'shaden@gmail.com', '300'),
(17, 'fajer@gmail.com', '198'),
(18, 'fajer@gmail.com', '100'),
(19, 'fajer@gmail.com', '150');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Products`
--
ALTER TABLE `Products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `viewOrders`
--
ALTER TABLE `viewOrders`
  ADD PRIMARY KEY (`orderNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Products`
--
ALTER TABLE `Products`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `viewOrders`
--
ALTER TABLE `viewOrders`
  MODIFY `orderNo` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
