-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 04:28 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocerry`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$rmBnmFdpbtw4DatgAogaf.uAJp.EYQs8koJ.I7ThwspQw7SVYo3ce');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_orders`
--

CREATE TABLE `assigned_orders` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `business_type`
--

CREATE TABLE `business_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_type`
--

INSERT INTO `business_type` (`id`, `type`) VALUES
(2, 'one');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `total` float NOT NULL,
  `is_applied` tinyint(1) NOT NULL,
  `promo` float NOT NULL,
  `is_add_w` tinyint(1) NOT NULL,
  `wl_amt` float NOT NULL,
  `final_amt` float NOT NULL,
  `ship_fee` tinyint(1) NOT NULL,
  `belonging_city` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `u_id`, `total`, `is_applied`, `promo`, `is_add_w`, `wl_amt`, `final_amt`, `ship_fee`, `belonging_city`) VALUES
(8, 1, 0, 0, 0, 0, 0, 30, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`) VALUES
(2, 'cat1', 1),
(3, 'cat2', 1),
(4, 'cat3', 1),
(5, 'cat4', 1),
(6, 'cat5', 1),
(7, 'cat6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `s_id`, `c_id`, `city_name`) VALUES
(2, 1, 1, 'Midnapur'),
(3, 1, 1, 'kolkata'),
(4, 2, 1, 'ca'),
(5, 2, 1, 'cb'),
(6, 3, 1, 'cc'),
(7, 3, 1, 'cd'),
(8, 4, 1, 'ce'),
(9, 4, 1, 'cf');

-- --------------------------------------------------------

--
-- Table structure for table `cnfrm_delivery`
--

CREATE TABLE `cnfrm_delivery` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cnfrm_undelivery`
--

CREATE TABLE `cnfrm_undelivery` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `com` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commission`
--

INSERT INTO `commission` (`id`, `scat_id`, `com`) VALUES
(5, 5, 15),
(6, 6, 16),
(11, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `cntry_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `cntry_name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `dc`
--

CREATE TABLE `dc` (
  `id` int(11) NOT NULL,
  `dc` float NOT NULL,
  `pc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dc`
--

INSERT INTO `dc` (`id`, `dc`, `pc`) VALUES
(1, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `dv_name` varchar(255) NOT NULL,
  `dv_username` varchar(255) NOT NULL,
  `dv_password` text NOT NULL,
  `dv_email` varchar(255) NOT NULL,
  `dv_mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `dv_name`, `dv_username`, `dv_password`, `dv_email`, `dv_mobile`) VALUES
(1, 'soumya ghosh', 'soumya_g', '$2y$10$01rbQRUeYkZmWqYzPgrce.P9BvsJo4XHCxkTOeeXxiblNzfEoeLjS', 'fg@gmail.com', '4567891230'),
(2, 'aj', 'ert', '$2y$10$d8Ps3eVcW3s64xBDrzjAWuhIFSBlgzQ7cF4vFa/jzByUHu7voefvC', 's@gmail.com', '2345678901');

-- --------------------------------------------------------

--
-- Table structure for table `dv_time`
--

CREATE TABLE `dv_time` (
  `id` int(11) NOT NULL,
  `from` varchar(100) NOT NULL,
  `tto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dv_time`
--

INSERT INTO `dv_time` (`id`, `from`, `tto`) VALUES
(2, '10:32', '11:33'),
(3, '12:34', '13:35'),
(4, '14:35', '15:36');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

CREATE TABLE `filter` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `filter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `subcat_id`, `filter`) VALUES
(3, 5, 'filter1'),
(4, 5, 'filter2'),
(5, 6, 'filter3'),
(6, 8, 'dfg');

-- --------------------------------------------------------

--
-- Table structure for table `isue`
--

CREATE TABLE `isue` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `isue`
--

INSERT INTO `isue` (`id`, `oid`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ofd`
--

CREATE TABLE `ofd` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `o_id` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `ad_id` int(11) NOT NULL,
  `dv_date` varchar(255) NOT NULL,
  `dv_time` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `mihpayid` varchar(255) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `payu_status` varchar(255) NOT NULL,
  `total_amt` float NOT NULL,
  `ship_fee_order` float NOT NULL,
  `final_val` float NOT NULL,
  `isnew` int(11) NOT NULL,
  `delivered_by` int(11) NOT NULL,
  `u_cnfrm` int(11) NOT NULL,
  `ptu` int(11) NOT NULL,
  `udvc` int(11) NOT NULL,
  `is_p_app` int(11) NOT NULL,
  `is_w_ap` int(11) NOT NULL,
  `prmo` float NOT NULL,
  `wlmt` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `o_id`, `u_id`, `ad_id`, `dv_date`, `dv_time`, `payment_type`, `payment_status`, `order_status`, `mihpayid`, `txnid`, `payu_status`, `total_amt`, `ship_fee_order`, `final_val`, `isnew`, `delivered_by`, `u_cnfrm`, `ptu`, `udvc`) VALUES
(1, 'ODP741632491075', 1, 4, '4', 'Today', 2, 1, 5, '9084294943', 'acc5eb0d820b5557946b', 'success', 37.14, 0, 37.14, 0, 1, 1, 1, 0),
(4, 'ODK801632494410', 1, 4, '3', 'Today', 2, 1, 7, '9084294961', '5f53e348a279f8484d10', 'success', 19.68, 0, 19.68, 0, 1, 0, 0, 0),
(5, 'ODT981632503623', 1, 4, '2', 'Tomorrow', 2, 1, 6, '9084294996', '1bb43363ed643025abbd', 'success', 6.66, 30, 36.66, 0, 1, 0, 0, 1),
(8, 'ODR301632568756', 1, 4, '3', 'Today', 1, 0, 5, '', 'fc2c2079c9787188d829', '', 17.76, 0, 17.76, 0, 1, 1, 1, 0),
(9, 'ODN321632738577', 1, 4, '4', 'Today', 2, 1, 5, '9084295789', 'b2e54a9658c3d44f0fea', 'success', 6.66, 30, 35.99, 0, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `hover` int(11) NOT NULL,
  `rcvd` int(11) NOT NULL,
  `delivered_qty` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `oid`, `p_id`, `qty`, `hover`, `rcvd`, `delivered_qty`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 3, 2, 1, 1, 2),
(3, 1, 2, 1, 1, 1, 1),
(4, 2, 1, 1, 0, 0, 0),
(5, 2, 3, 1, 0, 0, 0),
(6, 3, 1, 1, 0, 0, 0),
(7, 3, 3, 1, 0, 0, 0),
(8, 4, 1, 1, 1, 1, 1),
(9, 4, 3, 1, 1, 1, 0),
(10, 5, 2, 1, 1, 1, 0),
(11, 6, 1, 2, 0, 0, 0),
(12, 7, 1, 2, 0, 0, 0),
(13, 8, 1, 2, 1, 1, 2),
(14, 9, 2, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `o_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `o_status`) VALUES
(1, 'Placing'),
(2, 'Placed'),
(3, 'Assigned'),
(4, 'Out for delivery'),
(5, 'Delivered'),
(6, 'Undelivered'),
(7, 'Issue');

-- --------------------------------------------------------

--
-- Table structure for table `order_stlmnt`
--

CREATE TABLE `order_stlmnt` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `val` float NOT NULL,
  `sc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_stlmnt`
--

INSERT INTO `order_stlmnt` (`id`, `oid`, `sid`, `val`, `sc`) VALUES
(1, 1, 2, 18.36, 0),
(2, 1, 1, 13, 0),
(3, 8, 1, 14.9184, 0),
(4, 9, 1, 5.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_time`
--

CREATE TABLE `order_time` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `o_status` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_time`
--

INSERT INTO `order_time` (`id`, `oid`, `o_status`, `added_on`) VALUES
(1, 1, 2, '2021-09-24 13:46:08'),
(2, 1, 3, '2021-09-24 13:49:21'),
(3, 1, 4, '2021-09-24 13:50:00'),
(5, 1, 5, '2021-09-24 13:51:08'),
(6, 2, 2, '2021-09-24 14:37:41'),
(7, 4, 2, '2021-09-24 14:40:44'),
(8, 4, 3, '2021-09-24 14:42:33'),
(9, 4, 4, '2021-09-24 14:43:05'),
(10, 4, 5, '2021-09-24 14:43:40'),
(11, 4, 7, '2021-09-24 14:43:40'),
(12, 5, 2, '2021-09-24 17:14:36'),
(20, 5, 3, '2021-09-24 18:00:10'),
(21, 5, 4, '2021-09-24 18:00:15'),
(22, 5, 6, '2021-09-24 18:00:29'),
(23, 6, 2, '2021-09-25 11:15:22'),
(24, 7, 2, '2021-09-25 11:15:22'),
(25, 8, 2, '2021-09-25 11:19:18'),
(26, 8, 3, '2021-09-25 11:21:50'),
(27, 8, 4, '2021-09-25 11:22:28'),
(29, 8, 5, '2021-09-25 11:23:35'),
(30, 9, 2, '2021-09-27 10:30:31'),
(31, 9, 3, '2021-09-27 10:32:32'),
(32, 9, 4, '2021-09-27 10:33:39'),
(33, 9, 5, '2021-09-27 10:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `pin`
--

CREATE TABLE `pin` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cn_id` int(11) NOT NULL,
  `pincode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pin`
--

INSERT INTO `pin` (`id`, `c_id`, `s_id`, `cn_id`, `pincode`) VALUES
(1, 2, 1, 1, '145879'),
(2, 3, 1, 1, '147858'),
(3, 4, 2, 1, '5787568'),
(4, 5, 2, 1, '567863'),
(5, 6, 3, 1, '452577'),
(6, 7, 3, 1, '564678'),
(7, 9, 4, 1, '478587'),
(8, 8, 4, 1, '75678678');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sell_price` float NOT NULL,
  `fa` float NOT NULL,
  `shrt_desc` text NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `disclaimer` text NOT NULL,
  `isappp` int(11) NOT NULL,
  `isnew` tinyint(1) NOT NULL,
  `bs` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `added_by` int(11) NOT NULL,
  `belonging_city` int(11) NOT NULL,
  `tax` float NOT NULL,
  `sku` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `scat_id`, `product_name`, `img1`, `img2`, `img3`, `img4`, `price`, `sell_price`, `fa`, `shrt_desc`, `description`, `qty`, `disclaimer`, `isappp`, `isnew`, `bs`, `status`, `added_by`, `belonging_city`, `tax`, `sku`) VALUES
(1, 2, 6, 'product1', '2708601551631710744.jpg', '6275642921631707775.jpg', '7258851701631707775.jpg', '7095439061631707775.jpg', 15, 8, 8.88, 'vvv', 'vvv', 3, 'vvv', 1, 0, 0, 1, 1, 3, 10, 'E98FG31L'),
(2, 2, 6, 'product2', '3442381381631707925.jpg', '1116090371631707925.jpg', '8974928531631707925.jpg', '6262277841631707925.jpg', 10, 6, 6.66, 'gtr', 'dfe', 3, 'fgh', 1, 0, 0, 1, 1, 3, 10, 'O43LT53C'),
(3, 2, 5, 'product3', '8727043961631710656.jpg', '8014433021631710656.jpg', '4209091701631710656.jpg', '3590137711631710656.jpg', 15, 10, 10.8, 'rer', 'wer', 4, 're', 1, 0, 0, 1, 2, 3, 8, 'H92XA16C'),
(4, 2, 6, 'product4', '7307345221631710721.jpg', '1294205181631710721.jpg', '2935377831631710721.jpg', '9686269221631710721.jpg', 14, 5, 7.75, 'er', 'dftrt', 3, 'rtg', 1, 0, 0, 1, 2, 3, 50, 'V64JQ93A'),
(5, 3, 8, 'produtct5', '3640456001631711141.jpg', '5655238701631711141.jpg', '2713584571631711141.jpg', '7238793641631711141.jpg', 15, 10, 10.8, 'dfger', 'hrt', 4, 'ftg', 1, 0, 0, 1, 3, 5, 8, 'O47TE97E'),
(6, 2, 6, 'product6', '5463402831631711251.jpg', '8921120011631711251.jpg', '9808095001631711251.jpg', '7987271131631711251.jpg', 12, 5, 5.55, 'cfdg gfrtr', 'd tgrt  zertge', 6, 'fgrets', 1, 0, 0, 1, 3, 5, 10, 'D79TL12L'),
(7, 2, 6, 'product7', '8817477811631711454.jpg', '6837035241631711454.jpg', '9068199401631711454.jpg', '8523630731631711454.jpg', 15, 10, 11.9, 'bal rty th', 'grty', 8, 'ty hy by', 1, 0, 0, 1, 4, 6, 18, 'M78XI83S'),
(8, 2, 6, 'product8', '5417813561631711516.jpg', '1690504191631711516.jpg', '3545360491631711516.jpg', '8940894321631711516.jpg', 40, 20, 31, 'gher rgerg  ghsy', 'get ty5y gert', 6, 'fghr shr', 1, 0, 0, 1, 4, 6, 50, 'P52LP92C');

-- --------------------------------------------------------

--
-- Table structure for table `product_ad_on`
--

CREATE TABLE `product_ad_on` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_ad_on`
--

INSERT INTO `product_ad_on` (`id`, `pid`, `added_on`) VALUES
(1, 1, '2021-09-15 12:09:35'),
(2, 2, '2021-09-15 12:12:04'),
(3, 3, '2021-09-15 12:57:36'),
(4, 4, '2021-09-15 12:58:41'),
(5, 5, '2021-09-15 13:05:41'),
(6, 6, '2021-09-15 13:07:31'),
(7, 7, '2021-09-15 13:10:54'),
(8, 8, '2021-09-15 13:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(11) NOT NULL,
  `code` varchar(60) NOT NULL,
  `dis` float NOT NULL,
  `minbal` float NOT NULL,
  `scat` int(11) NOT NULL,
  `adb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_filter`
--

CREATE TABLE `p_filter` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_filter`
--

INSERT INTO `p_filter` (`id`, `pid`, `fid`) VALUES
(2, 2, 5),
(3, 3, 3),
(4, 3, 4),
(5, 4, 5),
(7, 1, 5),
(8, 5, 6),
(9, 6, 5),
(10, 7, 5),
(11, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `p_reject`
--

CREATE TABLE `p_reject` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cause` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `p_sfilter`
--

CREATE TABLE `p_sfilter` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sfid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_sfilter`
--

INSERT INTO `p_sfilter` (`id`, `pid`, `sfid`) VALUES
(2, 2, 5),
(3, 2, 8),
(4, 3, 3),
(5, 3, 7),
(6, 4, 5),
(8, 1, 5),
(9, 5, 9),
(10, 6, 5),
(11, 6, 8),
(12, 7, 5),
(13, 7, 8),
(14, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `rejection`
--

CREATE TABLE `rejection` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rejection`
--

INSERT INTO `rejection` (`id`, `s_id`, `reason`) VALUES
(4, 5, 'e');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tob` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `city` int(11) NOT NULL,
  `pin` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_crft` varchar(255) NOT NULL,
  `is_gst` tinyint(1) NOT NULL,
  `gst_id` varchar(255) NOT NULL,
  `gst_crft` varchar(255) NOT NULL,
  `acc_num` varchar(255) NOT NULL,
  `acc_holder` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `isapp` int(11) NOT NULL,
  `is_new` tinyint(1) NOT NULL,
  `is_cp` tinyint(1) NOT NULL,
  `adhar` varchar(255) NOT NULL,
  `pan` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `email`, `password`, `mobile`, `f_name`, `address`, `tob`, `country`, `state`, `city`, `pin`, `b_name`, `b_crft`, `is_gst`, `gst_id`, `gst_crft`, `acc_num`, `acc_holder`, `ifsc`, `bank`, `branch`, `isapp`, `is_new`, `is_cp`, `adhar`, `pan`, `status`) VALUES
(1, 'a@gmail.com', '$2y$10$TXwDDRTUBIlbHYdxATYhN.Vty1lfv3dteU2raVxELDfmQQZSqhhDK', '1234', 'seller one', 'second colony vita rd', 2, 1, 1, 3, 2, 'sts pvt ltd', '5025762701631705532.jpg', 1, '345678', '5657500971631707171.jpg', '1234567892014', 'Seller one', 'IFGR7845G78', 'imgn bank', 'ihyu', 1, 0, 1, '4275501381631705532.jpg', '5841286131631705532.jpg', 1),
(2, 'b@gmail.com', '$2y$10$6qbiXN5vi1ULvWV8BMWdo.l7PwSFE8jXRPWY76TFjFVrE/0J2bYZ2', '2134', 'seller two', 'def col dert', 2, 1, 1, 3, 2, 'df pvt ltd', '9836301121631706021.jpg', 1, '4785896', '2764390581631706021.jpg', '47857889658', 'dfert', 'dfgdrt', 'dfder', 'fderet', 1, 0, 1, '3583069461631706021.jpg', '1474921151631706021.jpg', 1),
(3, 'c@gmail.com', '$2y$10$lGsqzbxSa4SuUl4KaB65mO2NjsgzGxy8IxV6IK.hEpWmFqHYDZtqS', '21345', 'seller three', 'dfer, kilop', 2, 1, 2, 5, 4, 'dfert fgty', '9138758831631706176.jpg', 1, '78458iuy478', '1145974301631707245.jpg', '784578145', 'yrtfgfh', 'dftert68fg', 'derteg gh', 'dgery', 1, 0, 1, '8740467731631706176.jpg', '9617084481631706176.jpg', 1),
(4, 'd@gmail.com', '$2y$10$73T5Q57J4XQe.q9EA6NvaubL37e1tnrmgnb.FDHGaEDRSBneI5vG2', '3432', 'seller four', 'dferd fdre dfg', 2, 1, 3, 6, 5, 'frtrt g', '9978165481631706683.jpg', 1, '2345wer34', '6694375871631706683.jpg', '345678674532', 'ertf bght', 'rtrtrt', 'hy ghty', 'gfter', 1, 0, 1, '3334047291631706683.jpg', '3045160501631706683.jpg', 1),
(5, 'v@gmail.com', '$2y$10$U0R195BQBa6qlQllAmXNJ.xJqj21cPqXDoXzDGNv/pCXptkMqCHHu', '2', 'd', '2', 2, 1, 1, 2, 1, 'e', '4565757941632666590.jpg', 2, 'No GST', '0', '23', 'ewe', 'fef', 'dk', 'defeffrf', 2, 0, 2, '1895423121632666590.jpg', '7202280821632666590.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `seller_wallet`
--

CREATE TABLE `seller_wallet` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `ballance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_wallet`
--

INSERT INTO `seller_wallet` (`id`, `seller_id`, `ballance`) VALUES
(1, 2, 36.72),
(2, 4, 0),
(3, 1, 32.4184),
(4, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_w_msg`
--

CREATE TABLE `seller_w_msg` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `cod` tinyint(1) NOT NULL,
  `msg` text NOT NULL,
  `balance` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_w_msg`
--

INSERT INTO `seller_w_msg` (`id`, `s_id`, `cod`, `msg`, `balance`, `added_on`) VALUES
(1, 2, 1, 'Wallet created', 0, '2021-09-15 11:52:01'),
(2, 4, 1, 'Wallet created', 0, '2021-09-15 11:52:16'),
(3, 1, 1, 'Wallet created', 0, '2021-09-15 11:59:54'),
(4, 3, 1, 'Wallet created', 0, '2021-09-15 12:00:58'),
(9, 4, 1, 'bonus', 1, '2021-09-20 13:53:15'),
(11, 4, 0, 'Charge', 0, '2021-09-20 13:56:03'),
(13, 2, 1, ' For ODU131632157314', 18.36, '2021-09-24 12:00:31'),
(14, 1, 1, ' For ODU131632157314', 20.51, '2021-09-24 12:03:05'),
(15, 2, 1, ' For ODP741632491075', 18.36, '2021-09-24 14:14:59'),
(16, 1, 1, ' For ODP741632491075', 13, '2021-09-24 14:15:08'),
(17, 1, 0, 'Charge', 32.51, '2021-09-24 16:55:52'),
(18, 1, 0, 'Charge', 1, '2021-09-24 16:57:20'),
(19, 1, 0, 'Witdraw Requested', 0, '2021-09-25 06:42:19'),
(20, 1, 0, 'Witdraw approved <br>Txn 23erds3462dser', 20, '2021-09-25 06:39:48'),
(21, 1, 0, 'Witdraw Requested', 0, '2021-09-25 06:47:27'),
(22, 1, 0, 'Witdraw Rejected', 0, '2021-09-25 06:47:41'),
(23, 1, 1, 'Bonus', 0.49, '2021-09-25 06:50:20'),
(24, 1, 1, ' For ODN321632738577', 5.5, '2021-09-27 10:40:45');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `c_id`, `state_name`) VALUES
(1, 1, 'west bengal'),
(2, 1, 'gujrat'),
(3, 1, 'hydrabad'),
(4, 1, 'punjab'),
(5, 1, 'karnatak'),
(6, 1, 'bihar'),
(7, 1, 'up');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cat_id`, `subcat`, `status`) VALUES
(5, 2, 'scat1', 1),
(6, 2, 'scat2', 0),
(11, 3, 'scat3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_filter`
--

CREATE TABLE `sub_filter` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `subfilter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sub_filter`
--

INSERT INTO `sub_filter` (`id`, `filter_id`, `subfilter`) VALUES
(3, 3, 'sf1'),
(4, 4, 'sf2'),
(5, 5, 'sf3'),
(6, 3, 'sf4'),
(7, 4, 'sf5'),
(8, 5, 'sf6'),
(9, 6, 'sdfg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `m_vfd` tinyint(1) NOT NULL,
  `e_vfd` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `mobile`, `name`, `m_vfd`, `e_vfd`, `status`) VALUES
(1, 'ayondip2001@gmail.com', '$2y$10$GfITKldity2Pm1K8oTe5Z.vQYinJbahP9dUKEjOcN2AT9DWEAT.py', '7407287858', 'Ayondip Jana', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `type_ad` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_city` int(11) NOT NULL,
  `user_add` varchar(255) NOT NULL,
  `user_pin` varchar(255) NOT NULL,
  `user_local` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`id`, `uid`, `type_ad`, `user_name`, `user_mobile`, `user_city`, `user_add`, `user_pin`, `user_local`) VALUES
(4, 1, 'Home', 'Ayondip Jana', '4178589658', 3, 'wert frt fy5 tyty 6fgty', '721122', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallet`
--

CREATE TABLE `user_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ballance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_wallet`
--

INSERT INTO `user_wallet` (`id`, `user_id`, `ballance`) VALUES
(1, 1, 39.66),
(2, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_w_msg`
--

CREATE TABLE `user_w_msg` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `cod` tinyint(1) NOT NULL,
  `msg` text NOT NULL,
  `balance` float NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_new` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_w_msg`
--

INSERT INTO `user_w_msg` (`id`, `u_id`, `cod`, `msg`, `balance`, `added_on`, `is_new`) VALUES
(1, 1, 1, 'Wallet created', 0, '2021-09-16 11:52:04', 1),
(3, 1, 1, 'Refund for ODT981632503623', 36.66, '2021-09-25 05:33:12', 1),
(7, 1, 0, 'Used in purchase', 36.66, '2021-09-26 18:20:39', 1),
(8, 1, 1, 'get form purchase', 36.66, '2021-09-26 18:24:01', 1),
(9, 1, 0, 'Used in purchase', 36.66, '2021-09-26 18:24:25', 1),
(10, 1, 1, 'get form purchase', 36.66, '2021-09-26 18:24:31', 1),
(11, 1, 0, 'Used in purchase', 37.88, '2021-09-26 18:24:57', 1),
(12, 1, 1, 'get form purchase', 37.88, '2021-09-26 18:25:37', 1),
(13, 1, 0, 'Used in purchase', 37.88, '2021-09-26 18:33:01', 1),
(14, 1, 1, 'get form purchase', 37.88, '2021-09-26 18:33:12', 1),
(15, 3, 1, 'Wallet created', 0, '2021-09-26 19:19:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `witdraw_req`
--

CREATE TABLE `witdraw_req` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `amount_w` float NOT NULL,
  `amount_r` float NOT NULL,
  `isnew` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_orders`
--
ALTER TABLE `assigned_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_type`
--
ALTER TABLE `business_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnfrm_delivery`
--
ALTER TABLE `cnfrm_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cnfrm_undelivery`
--
ALTER TABLE `cnfrm_undelivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dc`
--
ALTER TABLE `dc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dv_time`
--
ALTER TABLE `dv_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE `filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isue`
--
ALTER TABLE `isue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ofd`
--
ALTER TABLE `ofd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_stlmnt`
--
ALTER TABLE `order_stlmnt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_time`
--
ALTER TABLE `order_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE `pin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_ad_on`
--
ALTER TABLE `product_ad_on`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_filter`
--
ALTER TABLE `p_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_reject`
--
ALTER TABLE `p_reject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_sfilter`
--
ALTER TABLE `p_sfilter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rejection`
--
ALTER TABLE `rejection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_wallet`
--
ALTER TABLE `seller_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_w_msg`
--
ALTER TABLE `seller_w_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_filter`
--
ALTER TABLE `sub_filter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE `user_wallet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_w_msg`
--
ALTER TABLE `user_w_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `witdraw_req`
--
ALTER TABLE `witdraw_req`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigned_orders`
--
ALTER TABLE `assigned_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE `business_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cnfrm_delivery`
--
ALTER TABLE `cnfrm_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cnfrm_undelivery`
--
ALTER TABLE `cnfrm_undelivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dc`
--
ALTER TABLE `dc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dv_time`
--
ALTER TABLE `dv_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE `filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `isue`
--
ALTER TABLE `isue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ofd`
--
ALTER TABLE `ofd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_stlmnt`
--
ALTER TABLE `order_stlmnt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_time`
--
ALTER TABLE `order_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE `pin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_ad_on`
--
ALTER TABLE `product_ad_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_filter`
--
ALTER TABLE `p_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `p_reject`
--
ALTER TABLE `p_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_sfilter`
--
ALTER TABLE `p_sfilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rejection`
--
ALTER TABLE `rejection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `seller_wallet`
--
ALTER TABLE `seller_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_w_msg`
--
ALTER TABLE `seller_w_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sub_filter`
--
ALTER TABLE `sub_filter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_w_msg`
--
ALTER TABLE `user_w_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `witdraw_req`
--
ALTER TABLE `witdraw_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
