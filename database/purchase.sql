-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 03:15 PM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `purchase.co`
--
CREATE DATABASE IF NOT EXISTS `purchase` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `purchase`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(100) NOT NULL,
  `quantity` int(50) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_desc`, `product_img_name`, `quantity`, `price`) VALUES
(1, '01', 'Moto E3', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 'moto.jpg', 61, '7000.00'),
(2, '02', 'Micromax A1', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 'mi.jpg', 69, '4000.00'),
(3, '03', 'Nokia K2', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 'nokia.jpg', 71, '5000.00'),
(4, '04', 'HTC Lite', 'Good looking smart phone with a dual camera for camera lovers. ', 'htc.jpg', 40, '9000.00'),
(5, '05', 'Dell Inspiron', 'A handy laptop for daily use. Dell inspiron is a budget friendly laptop for the normal users. It packs Quad-core I5 Intel processor with 8GB RAM and 1TB Hard Disk. ', 'dell.jpg', 100, '450000.00'),
(6, '06', 'Sony XP', 'Sony XP is a good laptop, that has Quad-Core AMD processor with 4GB of RAM.  It has a Hard  Disk of 1TB.', 'sony.jpeg', 66, '34000.00'),
(7, '07', 'MAC BOOK', 'Mac Book is apples future laptop, that has Quad-Core I5 processor with 16GB of RAM.  It has a Hard  Disk of 4 TB.', 'mac.jpg', 60, '80000.00'),
(8, '08', 'HP Slate', 'Hp Slate is a good and powerfull laptop, that has Quad-Core I5 processor with 8GB of RAM.  It has a Hard  Disk of 2TB.', 'hp.jpg', 68, '60000.00'),
(9, '09', 'I-Touch Keyboard', 'i-touch keyboard is stylish and powerful keyboard. It has a soft   finger feature making it easier to use. ', 'keyboard.jpg', 60, '450.00'),
(10, '10', 'K2 Hard Disk', 'It is an 4TB Hard disk and comes with good performance.', 'hard.jpeg', 40, '599.00'),
(11, '11', 'Z Power Banks', 'In a regular life everyone faces mobile battery drain issue, Our power banks are the solution for this issue.', 'power.jpeg', 67, '230.00'),
(12, '12', 'JBL Head Phones', 'JBL head phones are the powerful headphones out there in the market. JBL is well known for the good quality earphones and speakers.', 'head.jpeg', 56, '199.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `user_role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `phone`, `user_role`) VALUES
(1, 'Saltriver Embedded Solutions Pvt Ltd', 'admin@purchase.co', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Saltriver Embedded Solutions Pvt Ltd,B  11, Premium House, Nr. Gandhigram St.,  Ahmedabad 380009', '9512370018', 1),
(2, 'Adil', 'adil@gmail.com', 'b60f5ea13b5c61ac7a11579b565527cbe7b66c5c', 'Rm No-82 Ttc,midc Indl Area, Konkan Bhavan, Mumbai, Maharashtra 400701', '227691864', 0),
(3, 'Nikhil', 'nikhil@mail.com', 'd36e671a37e64603e408883ed9be43ba9b8ccf79', 'Ranjit Studio, D Block Dadasaheb Phalke Road, Dadar(e), Mumbai, Maharashtra 400014', '022241142', 0),
(4, 'Meem', 'meem@mail.com', '37ecf970a482530dda5053528805b3acb8e93031', '396 , Sheikh Memon Street, Opp Mangaldas Market, Crawford Market, Mumbai, Maharashtra 400001', '022663404', 0),
(5, 'Punit', 'punit@mail.com', 'b6a5f655242c868a3bf30aac27866cc42f2b94c6', '112 /,th Avenue, Ashok Nagar, Chennai, Tamil Nadu 600083', '424713229', 0),
(6, 'Aditi', 'aditi@mail.com', '5f8712628b017992f253c07abf09a5b608fe0782', '182 ,  Narayan Dhuru Street, Mandvi, Mumbai, Maharashtra 400003', '223421439', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
