-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2022 at 09:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `grocerry`
--
CREATE DATABASE grocerry;

USE grocerry;

-- --------------------------------------------------------
--
-- Table structure for table `admin`
--
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `admin`
--
INSERT INTO
  `admin` (`id`, `username`, `password`)
VALUES
  (
    1,
    'admin@gmail.com',
    '$2y$10$rmBnmFdpbtw4DatgAogaf.uAJp.EYQs8koJ.I7ThwspQw7SVYo3ce'
  );

-- --------------------------------------------------------
--
-- Table structure for table `assigned_orders`
--
CREATE TABLE `assigned_orders` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `business_type`
--
CREATE TABLE `business_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `cart`
--
CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `total` float DEFAULT 0,
  `is_applied` tinyint(1) DEFAULT 0,
  `promo` float DEFAULT 0,
  `is_add_w` tinyint(1) DEFAULT 0,
  `wl_amt` float DEFAULT 0,
  `final_amt` float DEFAULT 0,
  `ship_fee` tinyint(1) DEFAULT 0,
  `belonging_city` int(11) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `cart_detail`
--
CREATE TABLE `cart_detail` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `categories`
--
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `city`
--
CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- ---------------------------------------------------------
--
-- Table structure for table `cnfrm_delivery`
--
CREATE TABLE `cnfrm_delivery` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `cnfrm_undelivery`
--
CREATE TABLE `cnfrm_undelivery` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `commission`
--
CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `com` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `country`
--
CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `cntry_name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `dc`
--
CREATE TABLE `dc` (
  `id` int(11) NOT NULL,
  `dc` float NOT NULL,
  `pc` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Dumping data for table `dc`
--
INSERT INTO
  `dc` (`id`,`dc`, `pc`)
VALUES
  (1,0, 0);

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `dv_time`
--
CREATE TABLE `dv_time` (
  `id` int(11) NOT NULL,
  `from` varchar(100) NOT NULL,
  `tto` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `filter`
--
CREATE TABLE `filter` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) NOT NULL,
  `filter` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `isue`
--
CREATE TABLE `isue` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `ofd`
--
CREATE TABLE `ofd` (
  `id` int(11) NOT NULL,
  `od_id` int(11) NOT NULL,
  `dv_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `orders`
--
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `o_id` text NOT NULL,
  `u_id` int(11) NOT NULL,
  `ad_id` int(11) DEFAULT 0,
  `dv_date` varchar(255) DEFAULT '',
  `dv_time` varchar(255) DEFAULT '',
  `payment_type` int(11) DEFAULT 0,
  `payment_status` int(11) DEFAULT 0,
  `order_status` int(11) DEFAULT 0,
  `mihpayid` varchar(255) DEFAULT '',
  `txnid` varchar(255) DEFAULT '',
  `payu_status` varchar(255) DEFAULT '',
  `total_amt` float DEFAULT 0,
  `ship_fee_order` float DEFAULT 0,
  `final_val` float DEFAULT 0,
  `isnew` int(11) DEFAULT 0,
  `delivered_by` int(11) DEFAULT 0,
  `u_cnfrm` int(11) DEFAULT 0,
  `ptu` int(11) DEFAULT 0,
  `udvc` int(11) DEFAULT 0,
  `is_p_app` int(11) DEFAULT 0,
  `is_w_ap` int(11) DEFAULT 0,
  `prmo` float DEFAULT 0,
  `wlmt` float DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `order_detail`
--
CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `hover` int(11) DEFAULT 0,
  `rcvd` int(11) DEFAULT 0,
  `delivered_qty` int(100) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `order_status`
--
CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `o_status` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `order_status`
--
INSERT INTO
  `order_status` (`id`, `o_status`)
VALUES
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
  `val` float DEFAULT 0,
  `sc` float DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `order_time`
--
CREATE TABLE `order_time` (
  `id` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `o_status` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `product_ad_on`
--
CREATE TABLE `product_ad_on` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `p_filter`
--
CREATE TABLE `p_filter` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `fid` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `p_reject`
--
CREATE TABLE `p_reject` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cause` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `p_sfilter`
--
CREATE TABLE `p_sfilter` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `sfid` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `rejection`
--
CREATE TABLE `rejection` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `sellers`
--
CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `password` text NOT NULL,
  `mobile` varchar(50) DEFAULT '',
  `f_name` varchar(255) DEFAULT '',
  `address` varchar(255) DEFAULT '',
  `tob` int(11) DEFAULT 0,
  `country` int(11) DEFAULT 0,
  `state` int(11) DEFAULT 0,
  `city` int(11) DEFAULT 0,
  `pin` int(11) DEFAULT 0,
  `b_name` varchar(255) DEFAULT '',
  `b_crft` varchar(255) DEFAULT '',
  `is_gst` tinyint(1) DEFAULT 0,
  `gst_id` varchar(255) DEFAULT '',
  `gst_crft` varchar(255) DEFAULT '',
  `acc_num` varchar(255) DEFAULT '',
  `acc_holder` varchar(255) DEFAULT '',
  `ifsc` varchar(255) DEFAULT '',
  `bank` varchar(255) DEFAULT '',
  `branch` varchar(255) DEFAULT '',
  `isapp` int(11) DEFAULT 0,
  `is_new` tinyint(1) NOT NULL,
  `is_cp` tinyint(1) DEFAULT 0,
  `adhar` varchar(255) DEFAULT '',
  `pan` varchar(255) DEFAULT '',
  `status` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `seller_wallet`
--
CREATE TABLE `seller_wallet` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `ballance` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_new` tinyint(1) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `state`
--
CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `subcategories`
--
CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `sub_filter`
--
CREATE TABLE `sub_filter` (
  `id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `subfilter` varchar(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT '',
  `password` text DEFAULT '',
  `mobile` varchar(255) DEFAULT '',
  `name` varchar(255) DEFAULT '',
  `m_vfd` tinyint(1) DEFAULT 0,
  `e_vfd` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `user_wallet`
--
CREATE TABLE `user_wallet` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ballance` float NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `wishlist`
--
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `witdraw_req`
--
CREATE TABLE `witdraw_req` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `amount_w` float NOT NULL,
  `amount_r` float NOT NULL,
  `isnew` int(11) NOT NULL DEFAULT 0
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Indexes for dumped tables
--
--
-- Indexes for table `admin`
--
ALTER TABLE
  `admin`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `assigned_orders`
--
ALTER TABLE
  `assigned_orders`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `business_type`
--
ALTER TABLE
  `business_type`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE
  `cart`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE
  `cart_detail`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE
  `categories`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE
  `city`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `cnfrm_delivery`
--
ALTER TABLE
  `cnfrm_delivery`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `cnfrm_undelivery`
--
ALTER TABLE
  `cnfrm_undelivery`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `commission`
--
ALTER TABLE
  `commission`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE
  `country`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `dc`
--
ALTER TABLE
  `dc`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE
  `delivery_boy`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `dv_time`
--
ALTER TABLE
  `dv_time`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `filter`
--
ALTER TABLE
  `filter`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `isue`
--
ALTER TABLE
  `isue`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `ofd`
--
ALTER TABLE
  `ofd`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE
  `orders`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE
  `order_detail`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE
  `order_status`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `order_stlmnt`
--
ALTER TABLE
  `order_stlmnt`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `order_time`
--
ALTER TABLE
  `order_time`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `pin`
--
ALTER TABLE
  `pin`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE
  `product`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `product_ad_on`
--
ALTER TABLE
  `product_ad_on`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE
  `promo`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `p_filter`
--
ALTER TABLE
  `p_filter`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `p_reject`
--
ALTER TABLE
  `p_reject`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `p_sfilter`
--
ALTER TABLE
  `p_sfilter`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `rejection`
--
ALTER TABLE
  `rejection`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE
  `sellers`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `seller_wallet`
--
ALTER TABLE
  `seller_wallet`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `seller_w_msg`
--
ALTER TABLE
  `seller_w_msg`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE
  `state`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE
  `subcategories`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `sub_filter`
--
ALTER TABLE
  `sub_filter`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE
  `user_address`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `user_wallet`
--
ALTER TABLE
  `user_wallet`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `user_w_msg`
--
ALTER TABLE
  `user_w_msg`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE
  `wishlist`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `witdraw_req`
--
ALTER TABLE
  `witdraw_req`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE
  `admin`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `assigned_orders`
--
ALTER TABLE
  `assigned_orders`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `business_type`
--
ALTER TABLE
  `business_type`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE
  `cart`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE
  `cart_detail`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE
  `categories`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE
  `city`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cnfrm_delivery`
--
ALTER TABLE
  `cnfrm_delivery`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cnfrm_undelivery`
--
ALTER TABLE
  `cnfrm_undelivery`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission`
--
ALTER TABLE
  `commission`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE
  `country`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dc`
--
ALTER TABLE
  `dc`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE
  `delivery_boy`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dv_time`
--
ALTER TABLE
  `dv_time`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `filter`
--
ALTER TABLE
  `filter`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isue`
--
ALTER TABLE
  `isue`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ofd`
--
ALTER TABLE
  `ofd`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE
  `orders`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE
  `order_detail`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE
  `order_status`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `order_stlmnt`
--
ALTER TABLE
  `order_stlmnt`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_time`
--
ALTER TABLE
  `order_time`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pin`
--
ALTER TABLE
  `pin`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE
  `product`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_ad_on`
--
ALTER TABLE
  `product_ad_on`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE
  `promo`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_filter`
--
ALTER TABLE
  `p_filter`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_reject`
--
ALTER TABLE
  `p_reject`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `p_sfilter`
--
ALTER TABLE
  `p_sfilter`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rejection`
--
ALTER TABLE
  `rejection`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE
  `sellers`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_wallet`
--
ALTER TABLE
  `seller_wallet`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_w_msg`
--
ALTER TABLE
  `seller_w_msg`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE
  `state`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE
  `subcategories`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_filter`
--
ALTER TABLE
  `sub_filter`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE
  `user_address`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_wallet`
--
ALTER TABLE
  `user_wallet`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_w_msg`
--
ALTER TABLE
  `user_w_msg`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE
  `wishlist`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `witdraw_req`
--
ALTER TABLE
  `witdraw_req`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;