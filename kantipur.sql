-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 09:28 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kantipur`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'araj', 'cda1a15198aff8c28fe4a821da9d72aa'),
(2, 'sajan', '0510b878892d1e65687daf1e2c97a517');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_address`, `customer_phone`, `customer_email`) VALUES
(18, 'Araj Chalise ', 'Kathmandu ', '9841101935', 'araj_chalise@yahoo.com'),
(19, 'Sajan Malla ', 'Kathmandu ', '9841000000', 'sajan@gmail.com'),
(20, 'Araj Chalise ', 'Kathmandu ', '9841101935', 'araj@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `halal_shop`
--

CREATE TABLE `halal_shop` (
  `id` int(11) NOT NULL,
  `food_name` varchar(500) NOT NULL,
  `food_detail` text NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `halal_shop`
--

INSERT INTO `halal_shop` (`id`, `food_name`, `food_detail`, `price`) VALUES
(2, 'Basmati Rice ', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 270),
(4, 'Basmati Rice(Long)', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 150),
(5, 'Basmati Rice(Long)', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 150);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `detail` text NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` varchar(20) NOT NULL,
  `s_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `type_id`, `name`, `detail`, `image`, `price`, `s_id`) VALUES
(5, 3, 'Kabab', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'kabab.jpg', '580.90', 1),
(7, 1, 'Daal Bhaat ', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'menu_1.jpg', '560.56', 1),
(8, 1, 'Mo:Mo', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'momos.jpg', '290.32', 0),
(9, 4, 'Beer ', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'beer.jpg', '370.25', 0),
(10, 3, 'Beef Steak', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'beef.jpg', '940.32', 0),
(11, 4, 'Whiskey', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'IMG_20160701_215640.jpg', '1024.32 /60ml', 0),
(12, 2, 'Samosa', 'Comes with Lentils, Plain Rice, Curry, Aachar, Salad and etc.', 'samosa.jpg', '100.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(500) NOT NULL,
  `table_no` int(11) NOT NULL,
  `no_of_customer` int(11) NOT NULL,
  `b_date` date NOT NULL,
  `a_date` date NOT NULL,
  `a_time` time NOT NULL,
  `d_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_name`, `table_no`, `no_of_customer`, `b_date`, `a_date`, `a_time`, `d_time`) VALUES
(41, 'Araj Chalise ', 1, 5, '2018-08-16', '2018-08-16', '15:53:00', '17:23:00'),
(42, 'Araj Chalise', 1, 10, '2018-08-17', '2018-08-23', '20:17:00', '21:47:00'),
(43, 'Sajan Malla ', 1, 10, '2018-08-19', '2018-08-19', '13:00:00', '14:30:00'),
(44, 'Araj Chalise ', 1, 2, '2018-08-19', '2018-08-20', '10:00:00', '11:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halal_shop`
--
ALTER TABLE `halal_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `halal_shop`
--
ALTER TABLE `halal_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
