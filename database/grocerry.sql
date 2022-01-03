-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 02:41 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dfg`
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
(4, 'Partnership'),
(5, 'Nonprofit corporation'),
(6, 'S corporation');

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
(8, 1, 0, 0, 0, 0, 0, 30, 30, 3),
(9, 5, 54.6, 0, 0, 0, 0, 54.6, 0, 3),
(10, 4, 588.5, 0, 0, 0, 0, 588.5, 0, 3),
(11, 5, 300, 0, 0, 0, 0, 300, 0, 10),
(12, 6, 367.5, 0, 0, 0, 0, 367.5, 0, 11),
(13, 7, 150, 0, 0, 0, 0, 150, 0, 10);

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

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`id`, `cart_id`, `p_id`, `qty`) VALUES
(16, 9, 3, 3),
(17, 9, 2, 2),
(18, 9, 1, 1),
(19, 10, 10, 1),
(20, 10, 15, 1),
(21, 11, 14, 2),
(22, 12, 25, 1),
(23, 13, 14, 1);

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
(8, 'Handmade Bags', 1),
(9, 'Handmade Jwellery', 1),
(10, 'Decorative Items', 1),
(11, 'FlowerPots', 1);

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
(3, 1, 1, 'kolkata'),
(5, 2, 1, 'Gandhinagar'),
(6, 3, 1, 'Hyderabad'),
(7, 5, 1, 'Banglore'),
(10, 8, 1, 'Wardha'),
(11, 8, 1, 'Nagpur');

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
(12, 12, 1),
(13, 13, 2),
(14, 14, 1),
(15, 15, 3);

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
  `prmo` int(11) NOT NULL,
  `wlmt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `o_id`, `u_id`, `ad_id`, `dv_date`, `dv_time`, `payment_type`, `payment_status`, `order_status`, `mihpayid`, `txnid`, `payu_status`, `total_amt`, `ship_fee_order`, `final_val`, `isnew`, `delivered_by`, `u_cnfrm`, `ptu`, `udvc`, `is_p_app`, `is_w_ap`, `prmo`, `wlmt`) VALUES
(1, 'ODP741632491075', 1, 4, '4', 'Today', 2, 1, 5, '9084294943', 'acc5eb0d820b5557946b', 'success', 37.14, 0, 37.14, 0, 1, 1, 1, 0, 0, 0, 0, 0),
(4, 'ODK801632494410', 1, 4, '3', 'Today', 2, 1, 7, '9084294961', '5f53e348a279f8484d10', 'success', 19.68, 0, 19.68, 0, 1, 0, 0, 0, 0, 0, 0, 0),
(5, 'ODT981632503623', 1, 4, '2', 'Tomorrow', 2, 1, 6, '9084294996', '1bb43363ed643025abbd', 'success', 6.66, 30, 36.66, 0, 1, 0, 0, 1, 0, 0, 0, 0),
(8, 'ODR301632568756', 1, 4, '3', 'Today', 1, 0, 5, '', 'fc2c2079c9787188d829', '', 17.76, 0, 17.76, 0, 1, 1, 1, 0, 0, 0, 0, 0),
(9, 'ODN321632738577', 1, 4, '4', 'Today', 2, 1, 5, '9084295789', 'b2e54a9658c3d44f0fea', 'success', 6.66, 30, 35.99, 0, 1, 1, 1, 0, 0, 0, 0, 0);

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
(5, 'Delivered');

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
(8, 8, 4, 1, '75678678'),
(9, 10, 8, 1, '442001'),
(10, 11, 8, 1, '440001');

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
(14, 9, 13, 'Estele', '6404705071641059737.jpg', '6593052181641059737.jpg', '7479404021641059738.jpg', '6577147951641059738.jpg', 150, 150, 150, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 9, 10, 0, 'Q12BU33K'),
(15, 11, 15, 'Flower', '4892933501641059856.jpg', '1574421381641059856.jpg', '1656264271641059856.jpg', '1430171281641059856.jpg', 400, 350, 388.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 9, 10, 10, 'Q38FS65C'),
(16, 11, 15, 'FlowerPots', '4916963741641059952.jpg', '1785742551641059952.jpg', '9008233371641059952.jpg', '3401424781641059952.jpg', 300, 280, 280, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 9, 10, 0, 'N88KO31E'),
(17, 11, 15, 'Kraft Seeds Plastic Hanging Planter', '7190920041641060216.jpeg', '5647072581641060216.jpeg', '4893556641641060216.jpeg', '1532389551641060216.jpeg', 500, 470, 470, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 9, 10, 10, 'T30FL82I'),
(18, 11, 15, 'GARDENS NEED', '3996609271641060296.jpg', '9474428161641060296.jpg', '2223990491641060296.jpg', '9576220081641060296.jpg', 399, 380, 399, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 9, 10, 5, 'N34HK35P'),
(19, 9, 13, 'Generic', '4865346231641061013.jpg', '6098416521641061014.jpg', '7586908821641061014.jpg', '1294440261641061014.jpg', 300, 270, 283.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 10, 10, 5, 'A17WM27D'),
(20, 10, 14, 'Decoration', '8355347361641061093.jpg', '9666502691641061093.jpg', '5221892081641061093.jpg', '9750278411641061093.jpg', 500, 450, 472.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 10, 10, 5, 'W44UY34C'),
(21, 9, 13, 'ZENEME', '1758991241641061199.jpg', '5389483201641061199.jpg', '7757878611641061199.jpg', '3424783681641061199.jpg', 200, 150, 157.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 10, 10, 5, 'Y26SS75G'),
(22, 10, 14, 'Decorative items', '3672123061641061370.jpg', '6412355921641061370.jpg', '8420361051641061370.jpg', '6853976941641061370.jpg', 400, 350, 388.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 10, 10, 10, 'G78SH88J'),
(23, 10, 14, 'Zephyrr', '6173111701641061483.jpg', '5956085591641061483.jpg', '1376713181641061483.jpg', '3689873621641061483.jpg', 500, 450, 450, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 10, 10, 0, 'L11TD65X'),
(24, 8, 12, 'Fostelo', '5061723371641064321.jpg', '2913096661641064321.jpg', '5306451821641064321.jpg', '8776506771641064321.jpg', 300, 280, 282.8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 11, 11, 1, 'C97IX85O'),
(25, 8, 12, 'Fristo', '7553257551641064388.jpg', '1310671241641064388.jpg', '4706658881641064388.jpg', '9105280101641064388.jpg', 400, 350, 367.5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 11, 11, 5, 'T84KD52M'),
(26, 8, 12, 'Envias', '4969358511641064449.jpg', '9179874421641064449.jpg', '3399996971641064449.jpg', '5314414051641064449.jpg', 400, 388, 391.88, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 20, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 1, 0, 0, 1, 11, 11, 1, 'V32UR43M');

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
(8, 8, '2021-09-15 13:11:56'),
(9, 9, '2022-01-01 16:21:47'),
(10, 10, '2022-01-01 16:41:22'),
(11, 11, '2022-01-01 16:46:07'),
(12, 12, '2022-01-01 16:50:52'),
(13, 13, '2022-01-01 16:53:29'),
(14, 14, '2022-01-01 17:55:37'),
(15, 15, '2022-01-01 17:57:35'),
(16, 16, '2022-01-01 17:59:12'),
(17, 17, '2022-01-01 18:03:36'),
(18, 18, '2022-01-01 18:04:55'),
(19, 19, '2022-01-01 18:16:53'),
(20, 20, '2022-01-01 18:18:12'),
(21, 21, '2022-01-01 18:19:59'),
(22, 22, '2022-01-01 18:22:50'),
(23, 23, '2022-01-01 18:24:43'),
(24, 24, '2022-01-01 19:12:01'),
(25, 25, '2022-01-01 19:13:08'),
(26, 26, '2022-01-01 19:14:09');

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
(14, 8, 5),
(15, 9, 3),
(16, 9, 4);

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
(9, 'SHG1', '$2y$10$82.4lsHSl5RSar4P3I8sb.JD7YT.HmUHWM4WJcDqc0I9svA1FzyCe', '9632587410', 'SHG1', 'Wardha', 5, 1, 8, 10, 9, 'SHG1', '7951967301641059230.jpg', 2, 'No GST', '0', '9807865490', 'SHG1', '234567890', 'Axis Bank', 'Axis Bank', 1, 0, 1, '3476878601641059230.jpg', '7191216161641059230.png', 1),
(10, 'SHG2@gmail.com', '$2y$10$V3OyGn9GygYoj9HwEPHS/OzJwmDczTcdlye1UPzqD0LVMaIKU6MMS', '8965741235', 'SHG2', 'Nagpur', 5, 1, 8, 10, 9, 'SHG2', '5638819531641060832.jpg', 2, 'No GST', '0', '8965327412', 'SHG2', '741852', 'State Bank of India', 'State Bank of India', 1, 0, 1, '1634653491641060832.jpg', '9608478991641060832.png', 1),
(11, 'SHG3@gmail.com', '$2y$10$d2S5EkdaYEaRW0Xq6oAqm.2Q3yk2euqr39bbNhpxu9lHGjmbJTZOW', '7854632105', 'SHG3', 'Nagpur', 4, 1, 8, 11, 10, 'SHG3', '3087442841641064182.jpg', 2, 'No GST', '0', '9865321423', 'SHG3', '786523', 'SBI', 'SBI', 1, 0, 1, '9483467891641064182.jpg', '7430720061641064182.png', 1);

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
(4, 3, 0),
(5, 8, 0),
(6, 9, 0),
(7, 10, 0),
(8, 11, 0);

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
(2, 1, 'Gujarat'),
(3, 1, 'Andhra Pradesh'),
(5, 1, 'Karnataka'),
(8, 1, 'Maharashtra');

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
(12, 8, 'Bags', 1),
(13, 9, 'Jwellery', 1),
(14, 10, 'Decoration', 1),
(15, 11, 'FlowerPots', 1);

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
(1, 'ayondip2001@gmail.com', '$2y$10$GfITKldity2Pm1K8oTe5Z.vQYinJbahP9dUKEjOcN2AT9DWEAT.py', '7407287858', 'Ayondip Jana', 1, 1, 1),
(4, 'vs@gmail.com', '$2y$10$VEMh8NhyfaF4GAC8to6gveY0zN0JV262h59.Xfh8cyORPZl6XHDc6', '1234567890', 'VS', 0, 1, 1),
(5, 'vaishnavisatone1107@gmail.com', '$2y$10$sgRQc3g0QA/0tihXOZLq0et/ei45JEeNRJPTuHcRa/cl3Hh1U/iBe', '1234567890', 'Vaishnavi', 1, 1, 1),
(6, 'anushree@gmail.com', '$2y$10$jlwaIZjx0AKXzA3GBT4U6.ec7tCnoIIZc2p61k/cKN2x.Etnc/z6K', '8965321475', 'Anushree', 1, 1, 1),
(7, 'cse19101@gmail.com', '$2y$10$PKWqIq/LXfaocmcqvWYbFOt6Vd6C2GlL/D7sMwdYog03ST/whpoVK', '1234567889', 'Ayondip Jana', 1, 1, 1);

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
(4, 1, 'Home', 'Ayondip Jana', '4178589658', 3, 'wert frt fy5 tyty 6fgty', '721122', 'India'),
(8, 4, 'Home', 'VS', '2134567890', 10, 'Wardha', '442001', 'Wardha'),
(9, 4, 'on', 'Vaishnavi', '9865321475', 11, 'Nagpur', '896532', 'lk'),
(10, 5, 'Home', 'Vaishnavi', '9632587410', 11, 'Manish Nagar Nagpur', '440001', 'Nagpur'),
(11, 6, 'Home', 'Anushree', '8965321475', 10, 'Sudampuri Wardha', '442001', 'Wardha'),
(12, 6, 'Home', 'Anshree', '896532147', 3, 'Kolkata', '896523', 'kolkata'),
(13, 7, 'Home', 'Ayondip Jana', '9635044989', 10, 'bn', '721122', 'India'),
(14, 7, 'Home', 'Ayondip Jana', '8635045491', 10, 'ss', '560043', 'India');

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
(2, 3, 0),
(3, 4, 0),
(4, 5, 0),
(5, 6, 0),
(6, 7, 0);

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
(15, 3, 1, 'Wallet created', 0, '2021-09-26 19:19:04', 1),
(16, 4, 1, 'Wallet created', 0, '2021-12-31 19:00:31', 1),
(17, 5, 1, 'Wallet created', 0, '2022-01-01 14:28:22', 1),
(18, 6, 1, 'Wallet created', 0, '2022-01-02 06:49:34', 1),
(19, 7, 1, 'Wallet created', 0, '2022-01-03 13:07:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `u_id`, `p_id`) VALUES
(9, 5, 1),
(10, 5, 3),
(11, 4, 14);

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
-- Indexes for table `dv_time`
--
ALTER TABLE `dv_time`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `dv_time`
--
ALTER TABLE `dv_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ofd`
--
ALTER TABLE `ofd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_ad_on`
--
ALTER TABLE `product_ad_on`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_reject`
--
ALTER TABLE `p_reject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_sfilter`
--
ALTER TABLE `p_sfilter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `rejection`
--
ALTER TABLE `rejection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_wallet`
--
ALTER TABLE `seller_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `seller_w_msg`
--
ALTER TABLE `seller_w_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE `user_wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_w_msg`
--
ALTER TABLE `user_w_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
