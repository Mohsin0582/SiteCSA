# ************************************************************
# Sequel Pro SQL dump
# Version 5438
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.0.15)
# Database: myshop
# Generation Time: 2019-04-06 16:24:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`)
VALUES
	(1,'robert@gmail.com','okayokay'),
	(2,'evelet@gmail.com','okayokay');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table brands
# ------------------------------------------------------------

DROP TABLE IF EXISTS `brands`;

CREATE TABLE `brands` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;

INSERT INTO `brands` (`brand_id`, `brand_title`)
VALUES
	(1,'Carolina Herrera'),
	(2,'Diesel'),
	(3,'Donna Karan'),
	(4,'Gucci'),
	(5,'Hugo Boss'),
	(6,'Jean Paul Gaultier'),
	(7,'Juicy Couture'),
	(8,'Paco Rabanne'),
	(9,'Paul Smith'),
	(10,'Prada'),
	(11,'Yves Saint Laurent');

/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `product_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;

INSERT INTO `cart` (`product_id`, `ip_add`, `qty`)
VALUES
	(1,0,5),
	(6,0,5);

/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`cat_id`, `cat_title`)
VALUES
	(1,'For Him'),
	(2,'For Her'),
	(3,'Gifts and Offers'),
	(4,'Perfume Videos');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customer_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customer_orders`;

CREATE TABLE `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `customer_orders` WRITE;
/*!40000 ALTER TABLE `customer_orders` DISABLE KEYS */;

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`)
VALUES
	(1,1,0,1308561887,0,'2019-04-06 00:00:52','Pending'),
	(2,1,0,607531947,0,'2019-04-06 00:27:50','Pending'),
	(3,1,0,1613249888,0,'2019-04-06 00:36:04','Pending'),
	(4,1,0,573915971,0,'2019-04-06 01:00:47','Pending');

/*!40000 ALTER TABLE `customer_orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table customers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(50) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `customer_add` text NOT NULL,
  `customer_img` text NOT NULL,
  `customer_ip` int(50) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_add`, `customer_img`, `customer_ip`)
VALUES
	(1,'Shahzam','shah@gmail.com','okayokay','England','London',770090007,'9518 London Road\r\nWORCESTER\r\nWR65 4SF','vector.jpg',0),
	(2,'Ahmed','ahmed@gmail.com','okayokay','Pakistan','Lahore',770090007,'8a33ba01a8cc26b0bc43fde1c983c037.jpg','vector.jpg',0);

/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table payments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `payments`;

CREATE TABLE `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pending_orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pending_orders`;

CREATE TABLE `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `pending_orders` WRITE;
/*!40000 ALTER TABLE `pending_orders` DISABLE KEYS */;

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`)
VALUES
	(1,1,1308561887,0,5,'Pending'),
	(2,1,607531947,0,5,'Pending'),
	(3,1,1613249888,0,5,'Pending'),
	(4,1,573915971,0,5,'Pending');

/*!40000 ALTER TABLE `pending_orders` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `status` text NOT NULL,
  `keywords` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img`, `product_price`, `product_desc`, `status`, `keywords`)
VALUES
	(1,1,1,'2019-04-06 20:23:45','212 Men','Carolina_Herrera-212_Men.jpg',39,'<p class=\"p1\">10 Qty each 50ml = &pound;39.00</p>\r\n<p class=\"p1\">30 Qty each 50ml = &pound;36.00</p>\r\n<p class=\"p1\">50 Qty each 50ml = &pound;32.00</p>','on','Him Carolina Perfume 212 Men'),
	(2,1,2,'2019-04-06 20:25:29','Diesel Only The Brave Wild','Diesel-Only_The_Brave_Wild.jpg',75,'<p class=\"p1\">10 Qty each 30ml = &pound;75.00</p>\r\n<p class=\"p1\">30 Qty each 30ml = &pound;72.00</p>\r\n<p class=\"p1\">50 Qty each 30ml = &pound;68.00</p>','on','Diesel Only The Brave Wild Him'),
	(3,1,6,'2019-04-06 20:26:54','Jean Paul Gaultier Le Male','Jean_Paul_Gaultier-Le_Male.jpg',37,'<div class=\"prod_price\" style=\"width: 176.797px; margin-left: 22.0938px; float: left; display: inline; background-color: #ffffff;\">\r\n<p class=\"p1\">10 Qty each 30ml = &pound;37.00</p>\r\n<p class=\"p1\">30 Qty each 30ml = &pound;33.00</p>\r\n<p class=\"p1\">50 Qty each 30ml = &pound;28.00</p>\r\n</div>','on','Jean Paul Le Male'),
	(4,2,2,'2019-04-06 20:28:45','Diesel Loverdose','Diesel_Loverdose.jpg',39,'<p class=\"p1\">10 Qty each 50ml = &pound;39.00</p>\r\n<p class=\"p1\">30 Qty each 50ml = &pound;37.70</p>\r\n<p class=\"p1\">50 Qty each 50ml = &pound;34.00</p>','on','Diesel loverdose her'),
	(5,2,1,'2019-04-06 20:36:37','Carolina Herrera 212 VIP','Carolina_Herrera_212_VIP.jpg',37,'<p class=\"p1\">10 Qty each 30ml = &pound;37.00</p>\r\n<p class=\"p1\">30 Qty each 30ml = &pound;35.00</p>\r\n<p class=\"p1\">50 Qty each 30ml = &pound;33.00</p>','on','Her Carolina Perfume 212 Women'),
	(6,2,6,'2019-04-06 20:39:31','Jean Paul Gaultier Classique Intense','Jean_Paul_Gaultier-Classique_Intense.jpg',59,'<p class=\"p1\">10 Qty each 30ml = &pound;59.00</p>\r\n<p class=\"p1\">30 Qty each 30ml = &pound;56.00</p>\r\n<p class=\"p1\">50 Qty each 30ml = &pound;52.00</p>','on','Jean Paul Gaultier Classique Intense her');

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
