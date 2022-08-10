-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2019 at 12:47 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_food`
--
CREATE DATABASE IF NOT EXISTS `project_food` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `project_food`;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_firstname` varchar(50) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_lastname` varchar(100) NOT NULL,
  `m_img` varchar(100) DEFAULT NULL,
  `m_address` varchar(255) NOT NULL,
  `m_phone` varchar(20) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_level` varchar(10) NOT NULL,
  `m_datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`m_id`, `m_username`, `m_password`, `m_firstname`, `m_name`, `m_lastname`, `m_img`, `m_address`, `m_phone`, `m_email`, `m_level`, `m_datesave`) VALUES
(2, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 'นาย', 'staff', 'sales', '60233846320190205_103833.png', 'bkk', '0988884884', 'a@de.com', 'Staff', '2019-02-02 06:11:43'),
(7, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'นาย', 'admin', 'addmin', '34732332520190214_173230.png', 'bkk', '0988884884', 'user1555@user.com', 'Admin', '2019-02-08 06:46:08'),
(8, 'staff2', 'd2fa969f361a79b9ddee0bdc70580618b4cfe8d0', 'นาย', 'staff2', 'mmm', '184652498220191019_110705.jpg', 'bkk ', '0111111111', 'boss1@a.com', 'Staff', '2019-10-19 04:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `ref_m_id` int(11) NOT NULL COMMENT 'staffid',
  `ref_s_id` int(11) NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `ref_m_id`, `ref_s_id`, `order_total`, `order_date`) VALUES
(0002, 2, 3, 110.00, '2019-10-19 11:15:07'),
(0003, 2, 3, 140.00, '2019-10-19 11:18:11'),
(0004, 8, 3, 50.00, '2019-10-19 11:35:41'),
(0005, 2, 3, 150.00, '2019-10-19 14:05:03'),
(0006, 2, 3, 70.00, '2019-12-12 13:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders_log`
--

CREATE TABLE `tbl_orders_log` (
  `l_id` int(11) NOT NULL,
  `ref_order_id` int(11) NOT NULL,
  `ref_m_id` int(11) NOT NULL,
  `l_date_save` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ประวัติ พนง. ที่รับ order';

--
-- Dumping data for table `tbl_orders_log`
--

INSERT INTO `tbl_orders_log` (`l_id`, `ref_order_id`, `ref_m_id`, `l_date_save`) VALUES
(1, 2, 2, '2019-10-19 04:15:07'),
(2, 3, 2, '2019-10-19 04:18:11'),
(3, 4, 8, '2019-10-19 04:35:41'),
(4, 5, 2, '2019-10-19 07:05:03'),
(5, 6, 2, '2019-12-12 06:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(11) NOT NULL,
  `ref_order_id` int(11) NOT NULL,
  `ref_op_id` int(11) NOT NULL,
  `d_qty` int(11) NOT NULL,
  `d_price_total` float(10,2) NOT NULL,
  `d_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `ref_order_id`, `ref_op_id`, `d_qty`, `d_price_total`, `d_date`) VALUES
(3, 2, 24, 1, 60.00, '2019-10-19'),
(4, 2, 23, 1, 50.00, '2019-10-19'),
(5, 3, 15, 1, 40.00, '2019-10-19'),
(6, 3, 16, 1, 50.00, '2019-10-19'),
(7, 3, 23, 1, 50.00, '2019-10-19'),
(8, 4, 23, 1, 50.00, '2019-10-19'),
(9, 5, 15, 1, 40.00, '2019-10-19'),
(10, 5, 16, 1, 50.00, '2019-10-19'),
(11, 5, 24, 1, 60.00, '2019-10-19'),
(12, 6, 23, 1, 50.00, '2019-12-12'),
(13, 6, 19, 1, 20.00, '2019-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL,
  `ref_m_id` int(11) NOT NULL COMMENT 'tbl_member',
  `p_name` varchar(200) NOT NULL,
  `p_flavour` varchar(300) NOT NULL COMMENT 'รสชาติ',
  `p_detail` text NOT NULL,
  `p_price` float(10,2) NOT NULL,
  `p_unit` varchar(20) NOT NULL,
  `p_img` varchar(200) NOT NULL,
  `p_datesave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`p_id`, `ref_m_id`, `p_name`, `p_flavour`, `p_detail`, `p_price`, `p_unit`, `p_img`, `p_datesave`) VALUES
(15, 7, 'ข้าวไข่เจียว', 'อร่อย', 'ข้าวไข่เจียว', 40.00, 'จาน', '104599236620190428_221506.png', '2019-02-24 20:48:35'),
(16, 7, 'กระเพราไก่', 'อร่อย', 'กระเพราไก่', 50.00, 'จาน', '167208652420190428_221354.jpeg', '2019-02-24 20:49:16'),
(19, 7, 'ข้าวต้ม', 'หวาน, หออร่อยม', 'ข้าวต้ม', 20.00, 'จาน', '67598137920190428_221229.jpg', '2019-02-25 00:01:01'),
(23, 7, 'ผัดไทย', 'อร่อยมากๆ', '<p>ผัดไทย&nbsp;อร่อยมากๆ</p>\r\n', 50.00, 'จาน', 'f149746405720190527_205253.jpg', '2019-05-27 06:52:53'),
(24, 7, 'กระเพราไก่ ไข่ดาว', 'แซ่บ ', '<p>กระเพราไก่ ไข่ดาว</p>\r\n', 60.00, 'จาน', 'f111046416720191019_110840.jpeg', '2019-10-19 04:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `s_id` int(11) NOT NULL,
  `s_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`s_id`, `s_name`) VALUES
(1, 'รอดำเนินการ'),
(2, 'รอชำระเงิน'),
(3, 'เสร็จสิ้น');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_orders_log`
--
ALTER TABLE `tbl_orders_log`
  ADD PRIMARY KEY (`l_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_orders_log`
--
ALTER TABLE `tbl_orders_log`
  MODIFY `l_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
