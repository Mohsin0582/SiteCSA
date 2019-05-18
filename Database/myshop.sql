-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 03:57 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'robert@gmail.com', 'okayokay'),
(2, 'evelet@gmail.com', 'okayokay');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'NOKIA'),
(4, 'ASUS'),
(5, 'ACER'),
(6, 'APPLE'),
(7, 'BLACKBERRY'),
(8, 'NIKKON'),
(9, 'CANON'),
(10, 'SAMSUNG'),
(11, 'ONE PLUS');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_add`, `qty`) VALUES
(7, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'Tablets'),
(3, 'TV\'s'),
(4, 'Mobiles'),
(5, 'Cameras');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(50) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `customer_add` text NOT NULL,
  `customer_img` text NOT NULL,
  `customer_ip` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_add`, `customer_img`, `customer_ip`) VALUES
(1, 'Shahzam', 'shah@gmail.com', 'okayokay', 'England', 'London', 770090007, '9518 London Road\r\nWORCESTER\r\nWR65 4SF', 'vector.jpg', 0),
(2, 'Ahmed', 'ahmed@gmail.com', 'okayokay', 'Pakistan', 'Lahore', 770090007, '8a33ba01a8cc26b0bc43fde1c983c037.jpg', 'vector.jpg', 0),
(3, 'Mohsin', 'mohsin@gmail.com', 'okayokay', 'Pakistan', 'Lahore', 32014444, '9518 London Road\r\nWORCESTER\r\nWR65 4SF', 'zxv.png', 0),
(4, 'ali', 'ali@gmail.com', 'okayokay', 'Pakistan', 'Lahore', 34199999, 'lahore chaburgi', 'zxb.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 0, 1308561887, 0, '2019-04-14 21:54:15', 'Complete'),
(2, 1, 0, 607531947, 0, '2019-04-05 19:27:50', 'Pending'),
(3, 1, 0, 1613249888, 0, '2019-04-05 19:36:04', 'Pending'),
(4, 1, 0, 573915971, 0, '2019-04-05 20:00:47', 'Pending'),
(5, 1, 0, 943807413, 0, '2019-04-11 22:01:47', 'Pending'),
(6, 1, 0, 1011361310, 0, '2019-04-11 22:02:47', 'Pending'),
(7, 1, 0, 1841676257, 0, '2019-04-14 22:07:56', 'Pending'),
(8, 1, 0, 378039229, 0, '2019-04-14 22:13:31', 'Pending'),
(9, 4, 0, 134519957, 0, '2019-04-15 00:16:59', 'Complete'),
(10, 4, 0, 822014855, 0, '2019-04-15 00:37:12', 'Complete'),
(11, 4, 0, 1548921842, 1, '2019-04-15 01:07:21', 'Pending'),
(12, 4, 0, 2084299914, 1, '2019-04-15 01:21:45', 'Pending'),
(13, 4, 0, 874410575, 1, '2019-04-15 01:26:07', 'Pending'),
(14, 4, 0, 1274783961, 1, '2019-04-15 01:27:23', 'Complete'),
(15, 4, 0, 1205640704, 1, '2019-04-15 01:55:14', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(2, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:30:13'),
(3, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:31:24'),
(4, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:34:28'),
(5, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:35:03'),
(6, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:37:24'),
(7, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:47:38'),
(8, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:53:24'),
(9, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:54:18'),
(10, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:54:55'),
(11, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:54:59'),
(12, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:55:40'),
(13, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:56:22'),
(14, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:58:09'),
(15, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-14 23:59:43'),
(16, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:05:13'),
(17, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:05:45'),
(18, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:07:52'),
(19, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:11:22'),
(20, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:11:50'),
(21, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:12:10'),
(22, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:15:33'),
(23, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:15:36'),
(24, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:16:11'),
(25, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:16:26'),
(26, 134519957, 2000, 'Western Union', 3434345, 343434, '2019-04-15 00:16:59'),
(27, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:37:12'),
(28, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:37:46'),
(29, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:38:28'),
(30, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:43:57'),
(31, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:45:57'),
(32, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:46:00'),
(33, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:46:27'),
(34, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:50:17'),
(35, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:50:25'),
(36, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:51:26'),
(37, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:52:02'),
(38, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:53:22'),
(39, 134519957, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 00:56:30'),
(40, 1274783961, 2000, 'Western Union', 3434345, 343434, '2019-04-15 01:27:23'),
(41, 1274783961, 2000, 'Western Union', 3434345, 343434, '2019-04-15 01:28:54'),
(42, 1205640704, 2000, 'Bank Transfer', 3434345, 343434, '2019-04-15 01:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(1, 1, 1308561887, 0, 5, 'Pending'),
(2, 1, 607531947, 0, 5, 'Pending'),
(3, 1, 1613249888, 0, 5, 'Pending'),
(4, 1, 573915971, 0, 5, 'Pending'),
(5, 1, 943807413, 0, 5, 'Pending'),
(6, 1, 1011361310, 0, 5, 'Pending'),
(7, 1, 1841676257, 0, 5, 'Pending'),
(8, 1, 378039229, 0, 5, 'Pending'),
(10, 4, 822014855, 0, 1, 'Pending'),
(11, 4, 1548921842, 0, 1, 'Pending'),
(12, 4, 2084299914, 7, 1, 'Pending'),
(13, 4, 874410575, 7, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `status` text NOT NULL,
  `stock` int(10) NOT NULL,
  `keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img`, `product_price`, `product_desc`, `status`, `stock`, `keywords`) VALUES
(1, 1, 1, '2019-04-08 06:51:58', 'HP 15-DA0000TU', 'HP15-DA00.jpg', 59, '<p>Intel&reg; Core&trade; i3-8130U (2.2 GHz base frequency, up to 3.4 GHz with Intel&reg; Turbo Boost Technology, 4 MB cache, 2 cores)Display15.6\" diagonal HD SVA BrightView WLED-backlit (1366 x 768)Storage1 TB HDD SATA 5400 rpmRam4 GB DDR4-2400 SDRAMOperating SystemFreeDOS 2.0</p>', 'on', 5, 'laptop, hp'),
(3, 1, 1, '2019-04-08 06:52:13', 'HP Pavilion 15-CC110TX', 'Pavilion15-CC.jpg', 77, '<p>ProcessorIntel&reg; Core i5-8250U (1.6 GHz Turbo Boost 3.4, 6 MB Cache, QuadCore Processor - 8 Threads)Display15.6\" diagonal FHD SVA anti-glare WLED-backlit (1920 x 1080)Storage1 TB HDD SATA 5400 rpmRam4 GB DDR4Operating SystemFreeDOS 2.0</p>', 'on', 5, 'laptop, hp'),
(4, 1, 1, '2019-04-08 06:52:17', 'HP Gaming Pavilion 15-cx0120tx', 'Gaming_Pavilion15.jpg', 172, '<p>Intel&reg; Core&trade; i7-8750H (2.2 GHz base frequency, up to 4.1 GHz with Intel&reg; Turbo Boost Technology, 9 MB cache, 6 cores)Display15.6\" diagonal FHD IPS anti-glare micro-edge WLED-backlit (1920 x 1080)Storage1 TB 5400 rpm SATA + 128 GB M.2 SSDRam8 GB DDR4-2666 SDRAM (1 x 8 GB)Operating SystemWindows 10 Home Single Language 64</p>', 'on', 5, 'laptop, hp'),
(5, 1, 1, '2019-04-14 21:52:24', 'HP Probook 440 G5', 'Probook440-G5.jpg', 70, '<p>Intel&reg; Core i3-7100U (2.4 GHz, 3 MB cache, 2 cores)Display14\" diagonal HD SVA anti-glare LED-backlit, 220 cd/m2, 45% sRGB (1366 x 768)Storage1 TB HDD SATA 5400 rpmRam4 GB DDR4-2400 SDRAMOperating SystemDOS</p>', 'on', 6, 'laptop, hp'),
(6, 1, 1, '2019-04-14 21:51:06', 'HP EliteBook 850 G5', 'EliteBook-850-G5.jpg', 117, '<p>Processor8th Generation Intel&reg; Core&trade; i7-8550U with Intel&reg; UHD graphics 620 (1.8 GHz base frequency, up to 4 GHz with Intel&reg; Turbo Boost Technology, 8 MB cache, 4 cores)Display15.6\" diagonal FHD IPS anti-glare LED-backlit, 220 cd/m&sup2;, (1920 x 1080)Storage256 GB PCIe&reg; NVMe&trade; M.2 SSDRam8 GB DDR4-2400 SDRAMOperating SystemFreeDOS 2.0</p>', 'on', 6, 'laptop, hp'),
(7, 1, 2, '2019-04-15 01:55:14', 'Dell Latitude 5290 Multi-Touch', 'Dell Latitude 5290 Multi-Touch 2-in-1.png', 106, '<p><span style=\"color: #666666; font-family: open sans, Arial, Helvetica, sans-serif;\"><span style=\"font-size: 13px; background-color: #ffffff;\">intel core i5</span></span></p>', 'on', -1, 'laptop, dell');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `product_title` text NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`product_title`, `qty`) VALUES
('Dell Latitude 5290 Multi-Touch', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pending_orders`
--
ALTER TABLE `pending_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pending_orders`
--
ALTER TABLE `pending_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
