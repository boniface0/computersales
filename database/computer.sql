-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 12:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `email`, `password`) VALUES
(1, 'antoh', 'admin@gmail.com', '1234'),
(2, 'bony', 'boniface@gmail.com', '12345'),
(3, 'bony', 'bonifacemaingi45@gmail.com', '21234');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `pname` varchar(222) NOT NULL,
  `brand` varchar(212) NOT NULL,
  `type` varchar(123) NOT NULL,
  `specs` text NOT NULL,
  `prince` float NOT NULL,
  `qty` int(33) NOT NULL,
  `available` int(112) NOT NULL,
  `img` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `pname`, `brand`, `type`, `specs`, `prince`, `qty`, `available`, `img`) VALUES
(1, 'hp elitebook', 'new', 'hp', 'core i5,4gb ram ,, 500gb hdd ', 30000, 60, 36, 'images (2).jpg'),
(2, 'hp notebook', 'republished', 'hp', 'core i5', 20000, 34, 22, 'images (1).jpg'),
(3, 'macbook', 'new', 'pro', '8gb ram,500gb hdd,2.5ghz ', 2000000, 12, 11, 'images.jpg'),
(5, 'hp elitebook', 'new', 'hp', '5gb', 345, 34, 34, 'images (4).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `slaes`
--

CREATE TABLE `slaes` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` int(212) NOT NULL,
  `qty` int(123) NOT NULL,
  `totalamount` int(111) NOT NULL,
  `paymentmethod` varchar(111) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slaes`
--

INSERT INTO `slaes` (`id`, `productname`, `price`, `qty`, `totalamount`, `paymentmethod`, `date`) VALUES
(1, 'hp elitebook', 30000, 4, 120000, 'Cash', '2021-02-15'),
(2, 'hp elitebook', 30000, 3, 90000, 'Mpesa', '2021-02-15'),
(3, 'hp elitebook', 30000, 3, 90000, 'Mpesa', '2021-02-15'),
(4, 'hp elitebook', 30000, 3, 90000, 'Mpesa', '2021-02-15'),
(5, 'hp elitebook', 30000, 3, 90000, 'Cash', '2021-02-15'),
(6, 'hp elitebook', 30000, 2, 60000, 'Cash', '2021-02-15'),
(7, 'hp elitebook', 30000, 4, 120000, 'Cash', '2021-02-15'),
(8, 'hp elitebook', 30000, 2, 60000, 'Cash', '2021-02-15'),
(9, 'hp notebook', 20000, 2, 40000, 'Cash', '2021-02-15'),
(10, 'hp notebook', 20000, 2, 40000, 'Mpesa', '2021-02-15'),
(11, 'hp notebook', 20000, 5, 100000, 'Cash', '2021-02-16'),
(12, 'macbook', 2000000, 1, 2000000, 'Cash', '2021-02-17'),
(13, 'hp notebook', 20000, 3, 60000, 'Cash', '2021-02-17'),
(14, 'hp elitebook', 30000, 0, 0, 'Mpesa', '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id` int(11) NOT NULL,
  `sname` varchar(222) NOT NULL,
  `phone` int(212) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `supply` text NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`id`, `sname`, `phone`, `nationality`, `supply`, `email`) VALUES
(9, 'boniface', 789999, 'kenya', 'hp laptops', 'bonifacemaingi45@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `slaes`
--
ALTER TABLE `slaes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slaes`
--
ALTER TABLE `slaes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
