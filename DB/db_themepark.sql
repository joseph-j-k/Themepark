-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Oct 26, 2024 at 01:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_themepark`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'dsadsa', 'dsadsa', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL,
  `booking_to_date` varchar(100) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_head` varchar(100) NOT NULL,
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_amount` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_to_date`, `booking_status`, `booking_head`, `package_id`, `user_id`, `booking_amount`) VALUES
(25, '', '2024-10-30', 0, '10', 0, 23, ''),
(26, '2024-10-25', '2024-10-28', 0, '15', 3, 23, '1500'),
(27, '2024-10-25', '2024-10-26', 0, '11', 0, 23, '1500'),
(28, '2024-10-25', '2024-10-02', 0, '500', 0, 23, '1500'),
(29, '2024-10-25', '2024-10-02', 0, '500', 0, 23, '1500'),
(30, '2024-10-25', '2024-10-01', 0, '15', 0, 23, '1500'),
(31, '2024-10-25', '2024-10-26', 0, '12', 3, 23, '1500'),
(32, '2024-10-25', '2024-10-30', 0, '121', 3, 23, '1500'),
(33, '2024-10-25', '2024-10-31', 1, '23', 3, 23, '1500'),
(34, '2024-10-26', '2024-10-31', 1, '500', 3, 23, '1500'),
(35, '2024-10-26', '2024-10-29', 0, '15', 3, 23, '1500'),
(36, '2024-10-26', '2024-10-29', 1, '15', 3, 23, '1500'),
(37, '2024-10-26', '', 0, '', 3, 23, '1500'),
(38, '2024-10-26', '2024-10-01', 1, '15', 3, 23, '1500');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(100) NOT NULL,
  `branch_email` varchar(100) NOT NULL,
  `branch_password` varchar(100) NOT NULL,
  `branch_address` varchar(200) NOT NULL,
  `branch_contact` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `branch_photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_email`, `branch_password`, `branch_address`, `branch_contact`, `place_id`, `branch_photo`) VALUES
(1, 'Wonder - Aqua', 'wonderlaaqua@gmail.com', 'WonderlaAqua@123', 'Wonderla Aqua 28th Km, Mysore Road,\r\nBidadi, Bangalore,\r\nKarnataka 562109, India\r\nPhone: +91 80 2201 0333', '9556720966', 16, 'wonderla-amusement-park.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(8, 'Family'),
(9, 'Students'),
(10, 'Couples');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `complaint_type` varchar(100) NOT NULL,
  `complaint_content` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_date` varchar(100) NOT NULL,
  `complaint_reply` varchar(100) NOT NULL,
  `complaint_status` varchar(100) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(5, 'kollam'),
(6, 'alapuzha'),
(7, 'palakad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback_content` varchar(100) NOT NULL,
  `feedback_date` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_package`
--

CREATE TABLE `tbl_package` (
  `package_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `package_detail` varchar(200) NOT NULL,
  `package_photo` varchar(500) NOT NULL,
  `package_price` varchar(100) NOT NULL,
  `park_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_package`
--

INSERT INTO `tbl_package` (`package_id`, `package_name`, `package_detail`, `package_photo`, `package_price`, `park_id`, `category_id`, `branch_id`) VALUES
(3, 'Entry Package', '1.Access to all standard rides and attractions.\r\n2.Complimentary refreshments or meal vouchers.', 'family.webp', '1500', 14, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_park`
--

CREATE TABLE `tbl_park` (
  `park_id` int(11) NOT NULL,
  `park_name` varchar(100) NOT NULL,
  `park_email` varchar(100) NOT NULL,
  `park_password` varchar(100) NOT NULL,
  `park_address` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `park_status` varchar(100) NOT NULL DEFAULT '0',
  `park_photo` varchar(500) NOT NULL,
  `park_license` varchar(100) NOT NULL,
  `park_proof` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_park`
--

INSERT INTO `tbl_park` (`park_id`, `park_name`, `park_email`, `park_password`, `park_address`, `place_id`, `park_status`, `park_photo`, `park_license`, `park_proof`) VALUES
(14, 'Wonderla', 'wonderla@gmail.com', 'Wonderla@123', 'Wonderla Bangalore 28th Km, Mysore Road,\r\nBidadi, Bangalore,\r\nKarnataka 562109, India\r\nPhone: +91 80', 16, '2', 'Wonderla.jpg', 'CIN – U12345MH2024PTC567890', 'Proof.jpg'),
(15, 'Dark Storm', 'Darkstorm@gmail.com', 'darkstorm@123', 'gdrgdgdgdgfdhfh', 18, '1', 'sq71e3bbvo2oe5g308azbpev9ac6_shutterstock-555463402-1-1525694870.avif', 'CIN – U12345MH2024PTC567890', 'Proof.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(100) NOT NULL,
  `place_pincode` varchar(100) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(16, 'Kottiyam', '857426', 5),
(17, 'Valyar', '688527', 7),
(18, 'Arror', '12345', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subCategory_id` int(11) NOT NULL,
  `subCategory_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subCategory_id`, `subCategory_name`, `category_id`) VALUES
(1, 'Cello', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_photo` varchar(500) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_address` varchar(200) NOT NULL,
  `user_proof` varchar(500) NOT NULL,
  `user_contact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_photo`, `place_id`, `user_address`, `user_proof`, `user_contact`) VALUES
(23, 'Judin', 'judin@gmail.com', 'Judin@123', 'Adityan.jpg', 18, '1234 Maple Street,\r\nApt #5B,\r\nSpringfield, IL 62704,\r\nUSA', 'Proof.jpg', '9447620966');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_package`
--
ALTER TABLE `tbl_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `tbl_park`
--
ALTER TABLE `tbl_park`
  ADD PRIMARY KEY (`park_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subCategory_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_package`
--
ALTER TABLE `tbl_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_park`
--
ALTER TABLE `tbl_park`
  MODIFY `park_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subCategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
