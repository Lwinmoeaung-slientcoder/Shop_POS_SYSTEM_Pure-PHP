-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2020 at 11:41 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventorylist`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_otherproduct`
--

CREATE TABLE `tbl_otherproduct` (
  `product_id` int(100) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `g_kyat` tinyint(4) NOT NULL,
  `g_pel` tinyint(4) NOT NULL,
  `g_yway` tinyint(4) NOT NULL,
  `ayawtwet` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `d_yati` tinyint(4) NOT NULL,
  `d_karyat` tinyint(4) NOT NULL,
  `kyoukpoe` int(11) NOT NULL,
  `buyingprice` int(11) NOT NULL,
  `sellingprice` int(11) NOT NULL,
  `buyingdate` date NOT NULL,
  `sellingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `goldquality` varchar(10) NOT NULL,
  `shopname` varchar(20) NOT NULL,
  `kyat` tinyint(4) NOT NULL,
  `pel` tinyint(4) NOT NULL,
  `yway` float NOT NULL,
  `ayaw` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `k_price` int(11) NOT NULL,
  `k_kyat` tinyint(4) NOT NULL,
  `k_pel` tinyint(4) NOT NULL,
  `k_yway` tinyint(4) NOT NULL,
  `buyingdate` date NOT NULL,
  `sellingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `name`, `goldquality`, `shopname`, `kyat`, `pel`, `yway`, `ayaw`, `k_price`, `k_kyat`, `k_pel`, `k_yway`, `buyingdate`, `sellingdate`) VALUES
(6, 'အမအမအမအမအမနျ', 'B', 'တနမ', 1, 1, 1, '1', 1, 1, 1, 1, '2020-06-01', '2020-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sellinglists`
--

CREATE TABLE `tbl_sellinglists` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `goldquality` varchar(10) NOT NULL,
  `shopname` varchar(10) NOT NULL,
  `o_pel` tinyint(4) NOT NULL,
  `o_yway` tinyint(4) NOT NULL,
  `m_pel` tinyint(4) NOT NULL,
  `m_yway` tinyint(4) NOT NULL,
  `p_pel` tinyint(4) NOT NULL,
  `p_yway` tinyint(4) NOT NULL,
  `sellingdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `fullname`, `password`, `role`, `is_active`) VALUES
(1, 'admin', 'adminstrator', 'admin123#', 'admin', 1),
(4, 'lma', 'Lwin Moe Aung', 'LWIN123', 'admin', 1),
(5, 'guest', 'guest', '123', 'user\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_otherproduct`
--
ALTER TABLE `tbl_otherproduct`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_sellinglists`
--
ALTER TABLE `tbl_sellinglists`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_otherproduct`
--
ALTER TABLE `tbl_otherproduct`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sellinglists`
--
ALTER TABLE `tbl_sellinglists`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
