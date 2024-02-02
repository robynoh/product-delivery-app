-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2023 at 10:49 AM
-- Server version: 10.5.20-MariaDB-cll-lve-log
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trootond_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `3pl`
--

CREATE TABLE `3pl` (
  `id` int(11) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `accountname` varchar(200) NOT NULL,
  `accountNumber` varchar(200) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `confirm_status` varchar(200) NOT NULL,
  `photourl` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `3pl`
--

INSERT INTO `3pl` (`id`, `phone`, `company`, `bankname`, `accountname`, `accountNumber`, `userID`, `code`, `confirm_status`, `photourl`, `created_at`, `updated_at`) VALUES
(5, '+2348032454342', '', '', '', '', '12', '3PL-EO-5643VB', '0', '', '2023-05-24 10:21:56', '2023-05-24 10:21:56'),
(6, '08032454342', 'RAGURA LTD', 'GTbank', 'Agaga Robinson', '0042412972', '13', '3PL-BH-4024QT', '1', 'http://127.0.0.1:8000/photos/1685095523413whatsapp image 2023-05-16 at 6.36.38 am.jpeg', '2023-05-24 10:41:44', '2023-05-24 10:41:44'),
(14, '08032454342', '', '', '', '', '15', '3PL-OJ-4444FE', '1', '', '2023-06-15 14:15:53', '2023-06-15 14:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `3pl_riders_right`
--

CREATE TABLE `3pl_riders_right` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `3pl_riders_right`
--

INSERT INTO `3pl_riders_right` (`id`, `rider_id`, `status`, `code`, `created_at`, `updated_at`) VALUES
(33, '73', 'authorize', '3PL-BH-4024QT', '2023-05-26 16:35:58', '2023-05-26 16:35:58'),
(32, '71', 'authorize', '3PL-BH-4024QT', '2023-05-26 16:02:33', '2023-05-26 16:02:33'),
(31, '74', 'authorize', '3PL-BH-4024QT', '2023-05-26 16:02:33', '2023-05-26 16:02:33'),
(30, '99', 'authorize', '3PL-BH-4024QT', '2023-05-26 16:02:33', '2023-05-26 16:02:33'),
(29, '113', 'authorize', '3PL-BH-4024QT', '2023-05-26 16:02:33', '2023-05-26 16:02:33'),
(28, '115', 'authorize', '3PL-BH-4024QT', '2023-05-26 16:02:33', '2023-05-26 16:02:33');

-- --------------------------------------------------------

--
-- Table structure for table `adminroles`
--

CREATE TABLE `adminroles` (
  `id` int(11) NOT NULL,
  `adminID` varchar(200) NOT NULL,
  `adRole` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `adminroles`
--

INSERT INTO `adminroles` (`id`, `adminID`, `adRole`, `created_at`, `updated_at`) VALUES
(1, '8', '1', '2022-11-25 10:31:48', '2022-11-25 10:31:48');

-- --------------------------------------------------------

--
-- Table structure for table `all_process_track`
--

CREATE TABLE `all_process_track` (
  `id` int(11) NOT NULL,
  `approach` int(11) NOT NULL,
  `arrive_pickup` int(11) NOT NULL,
  `start_delivery` int(11) NOT NULL,
  `approach_delivery` int(11) NOT NULL,
  `arrive_delivery` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `all_process_track`
--

INSERT INTO `all_process_track` (`id`, `approach`, `arrive_pickup`, `start_delivery`, `approach_delivery`, `arrive_delivery`, `order_id`, `created_at`, `updated_at`) VALUES
(30, 0, 1, 1, 0, 1, '314', '2023-07-14 19:47:40', '2023-07-14 19:47:40'),
(31, 0, 1, 1, 0, 1, '466', '2023-07-27 18:16:53', '2023-07-27 18:16:53'),
(3, 1, 1, 1, 1, 1, '418', '2023-05-06 16:25:08', '2023-05-06 16:25:08'),
(6, 0, 0, 0, 0, 0, '420', '2023-05-09 10:25:09', '2023-05-09 10:25:09'),
(7, 1, 1, 1, 1, 1, '425', '2023-05-09 13:41:33', '2023-05-09 13:41:33'),
(28, 1, 1, 1, 1, 1, '444', '2023-05-11 22:24:22', '2023-05-11 22:24:22'),
(9, 0, 0, 0, 0, 0, '426', '2023-05-10 08:26:41', '2023-05-10 08:26:41'),
(10, 0, 0, 0, 0, 0, '427', '2023-05-10 08:37:05', '2023-05-10 08:37:05'),
(11, 0, 0, 0, 0, 0, '428', '2023-05-10 08:43:27', '2023-05-10 08:43:27'),
(12, 0, 0, 0, 0, 0, '429', '2023-05-10 08:53:20', '2023-05-10 08:53:20'),
(13, 0, 0, 0, 0, 0, '430', '2023-05-10 08:56:47', '2023-05-10 08:56:47'),
(14, 0, 0, 0, 0, 0, '431', '2023-05-10 09:03:25', '2023-05-10 09:03:25'),
(15, 0, 0, 0, 0, 0, '432', '2023-05-10 09:10:40', '2023-05-10 09:10:40'),
(16, 0, 0, 0, 0, 0, '433', '2023-05-10 12:03:25', '2023-05-10 12:03:25'),
(17, 1, 0, 0, 0, 0, '435', '2023-05-10 12:13:17', '2023-05-10 12:13:17'),
(18, 1, 0, 0, 0, 0, '436', '2023-05-10 12:26:30', '2023-05-10 12:26:30'),
(19, 1, 0, 0, 0, 0, '437', '2023-05-10 12:42:38', '2023-05-10 12:42:38'),
(20, 0, 0, 0, 0, 0, '438', '2023-05-10 13:31:01', '2023-05-10 13:31:01'),
(21, 0, 0, 0, 0, 0, '439', '2023-05-10 13:33:39', '2023-05-10 13:33:39'),
(22, 1, 0, 0, 0, 0, '441', '2023-05-10 13:48:08', '2023-05-10 13:48:08'),
(23, 1, 0, 0, 0, 0, '442', '2023-05-10 13:50:03', '2023-05-10 13:50:03'),
(27, 1, 1, 1, 1, 1, '411', '2023-05-11 16:12:52', '2023-05-11 16:12:52'),
(29, 0, 0, 0, 0, 0, '446', '2023-05-12 01:49:00', '2023-05-12 01:49:00'),
(32, 0, 1, 1, 0, 1, '467', '2023-07-28 12:36:21', '2023-07-28 12:36:21'),
(33, 0, 1, 1, 0, 1, '470', '2023-07-29 11:21:43', '2023-07-29 11:21:43'),
(34, 0, 1, 1, 0, 1, '474', '2023-08-02 11:22:04', '2023-08-02 11:22:04'),
(35, 0, 1, 1, 0, 1, '475', '2023-08-05 12:17:05', '2023-08-05 12:17:05'),
(36, 0, 1, 1, 0, 1, '476', '2023-08-05 14:20:37', '2023-08-05 14:20:37'),
(37, 0, 0, 0, 0, 0, '480', '2023-08-11 10:39:06', '2023-08-11 10:39:06'),
(38, 0, 0, 0, 0, 0, '481', '2023-08-11 10:45:39', '2023-08-11 10:45:39'),
(39, 0, 0, 0, 0, 0, '482', '2023-08-11 12:43:57', '2023-08-11 12:43:57'),
(40, 0, 0, 0, 0, 0, '483', '2023-08-11 12:45:52', '2023-08-11 12:45:52'),
(41, 0, 0, 0, 0, 0, '477', '2023-08-11 14:05:23', '2023-08-11 14:05:23'),
(42, 0, 1, 1, 0, 1, '485', '2023-08-11 15:02:45', '2023-08-11 15:02:45'),
(43, 0, 0, 0, 0, 0, '479', '2023-08-11 17:02:35', '2023-08-11 17:02:35'),
(44, 0, 0, 0, 0, 0, '489', '2023-08-14 23:32:29', '2023-08-14 23:32:29'),
(45, 0, 0, 0, 0, 0, '490', '2023-08-15 07:55:39', '2023-08-15 07:55:39'),
(46, 0, 0, 0, 0, 0, '492', '2023-08-15 13:22:27', '2023-08-15 13:22:27'),
(47, 0, 0, 0, 0, 0, '493', '2023-08-15 13:27:03', '2023-08-15 13:27:03'),
(48, 0, 1, 1, 0, 1, '494', '2023-08-15 23:46:15', '2023-08-15 23:46:15'),
(49, 0, 0, 0, 0, 0, '495', '2023-08-20 22:32:07', '2023-08-20 22:32:07'),
(50, 0, 0, 0, 0, 0, '497', '2023-08-21 09:31:37', '2023-08-21 09:31:37'),
(51, 0, 1, 1, 0, 0, '502', '2023-08-21 12:12:14', '2023-08-21 12:12:14'),
(52, 0, 0, 0, 0, 0, '504', '2023-08-22 12:47:08', '2023-08-22 12:47:08'),
(53, 0, 0, 0, 0, 0, '505', '2023-08-22 23:47:52', '2023-08-22 23:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `cancelledorders`
--

CREATE TABLE `cancelledorders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(200) NOT NULL,
  `riderid` varchar(200) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cash_remittance`
--

CREATE TABLE `cash_remittance` (
  `id` int(11) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cash_remittance`
--

INSERT INTO `cash_remittance` (`id`, `order_id`, `rider_id`, `created_at`, `updated_at`) VALUES
(1, '146', '73', '2023-03-07 15:22:46', '2023-03-07 15:22:46'),
(2, '147', '73', '2023-03-07 15:22:46', '2023-03-07 15:22:46');

-- --------------------------------------------------------

--
-- Table structure for table `clientMessaging`
--

CREATE TABLE `clientMessaging` (
  `id` int(11) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `fcmid` varchar(2000) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clientMessaging`
--

INSERT INTO `clientMessaging` (`id`, `client_id`, `fcmid`, `created_at`, `updated_at`) VALUES
(3, '29', 'caiaIbcHSAGFhLfUCP_gWG:APA91bETGdIBahkEJ5FME6FjCtsmfXqwPvI4ViDt02RD7T8jX80zqYaVq4rVVEB4Wlsaitq3Rml-qRcbDrE5KoVGIxaex32Fcr63N0JxiUOVNb8TrzmPILE6FIfMVsxG7k3OdDpdKp7G', '2023-04-08 11:05:57', '2023-04-08 11:05:57'),
(4, '20', 'cjZJ5H2kSuS6x89MUwvywk:APA91bGu-y36qQsR4V6hr9o5rPHatMCwUrnxeasK8qABfHUdHbRFgig6U_0GXbrJPPLyoSxfKXhP6Eu7nEvkxHd6IBZvAehCQhqgM1N3I6gRifPCxfsYGlu5TtSbJsVImIlM80bMCXko', '2023-04-08 11:52:26', '2023-04-08 11:52:26'),
(5, '33', 'eW9vLSMOSX2QRn8Ps8qxni:APA91bEc3kcTgZpurOYm02DKGLbQT-XGIa2v4n2C1a9se6NsD4QnzyHJUbW3RzJMWgFQ1JJg_UjfaKfYg8aOQ3pPjRtY8ZSmY1QEVwCVa2ET14OfNy1pACntMgZtiOn4n4fD1hahbvP_', '2023-04-15 14:10:07', '2023-04-15 14:10:07'),
(6, '34', 'dIURomARRMCRgDrT2NKQIm:APA91bGr6dWcI9CFBi9fupeqmAEquD_7BktuhXkkHF6nVGb9I7C_3raam2MJujKdetyG6Pv5_WNJ7ckCUUogGwKOTcslL96xVd_hrFHRfa5IvOhR5MtsyXNY--WOHxy7Pk8jIi2GV6dd', '2023-04-20 05:38:36', '2023-04-20 05:38:36'),
(7, '28', 'caiaIbcHSAGFhLfUCP_gWG:APA91bETGdIBahkEJ5FME6FjCtsmfXqwPvI4ViDt02RD7T8jX80zqYaVq4rVVEB4Wlsaitq3Rml-qRcbDrE5KoVGIxaex32Fcr63N0JxiUOVNb8TrzmPILE6FIfMVsxG7k3OdDpdKp7G', '2023-04-22 11:21:43', '2023-04-22 11:21:43'),
(8, '30', 'dNvWSf64SEyHCStxDjw2EV:APA91bEdUoqSawk7DovE9P6FQYO76HZBgQT6xRlnnMYnVm6itdXouWAbM8C6zdTTiq3qa0i1yKicpJtNblbmlaBpL2KQAc50nqNpkcnLsE-Hw5fktkDSqSBu7-FrxB2CKHlx5bbPtcEZ', '2023-05-10 18:17:30', '2023-05-10 18:17:30'),
(9, '19', 'fGIAUh6sSAe_VMLsfab51z:APA91bEuVjbA3MnpCpCowh2Hs3gXmvTRV1GlVAh0iE8xVYU6MibC73158znFfvYVYdhEnAvnK82WI6hVZFyBmNtayG4VQdcBhsI9CQZSqJSZoFbV_kBmgSIhPJoBvzjyncKbO7Uvt5_2', '2023-05-11 22:17:53', '2023-05-11 22:17:53'),
(10, '35', 'f4giQKzjQ2exW4gnYgAyk2:APA91bHSLLFzLP8NOSWGjzWFVqI7AVOCQYQqgkDL7HrMfgXaZqxDi0EOr2hzld2daFM3YuuicwRfWV7RPfeX3FQsmx4KJ5HALeiZIllqgXqHRIROX-oraBiJIkXIw5eeBc6wFKer_qHB', '2023-06-04 20:03:16', '2023-06-04 20:03:16'),
(11, '36', 'ffyqScXnRB6dCfElEqcw60:APA91bHP62iYmFTffvhl0fvnrW4zhWBbSNk5-EDa_QXhqdTu4M-vGSN7_BO5YLxt96KDWcLSsgGzJz-BE1KD7oz_qOXwN-zMw7efaYpPyx7MSnclFE027Cs9KUQ-ut6IbUehqlejBG7e', '2023-06-28 19:36:40', '2023-06-28 19:36:40'),
(12, '37', 'dH-mHxWBSi20zKTjGFlmq_:APA91bFb5G9N_qBPESvrihTKUK4tzGlnaJdPjqQFO31RfNtOYXCSq2338eAWUBzUIKHuG6_xnBEZxumxr48KT66WWY48JQ6QyYX-1u6sW_VikoaiT5LhbHFNhKRQfu3VwOe34gaWx6F8', '2023-07-25 22:34:40', '2023-07-25 22:34:40'),
(13, '38', 'cGlKR7UVSYKEne0KFLCID2:APA91bFMSidZOqlaAxygNg2qtEUfA6uBQFqnLNWUrf5L0PPT13fSPi6mUVtNQ8x1yNp_DPvykWjBaVSAAhw8jEtmRwG2GDxLwOBb1OGlKq4G0DxGXyQM9LR6ZCBXerkK5TkhagRB_E8O', '2023-07-28 14:30:45', '2023-07-28 14:30:45'),
(14, '24', 'fZ9Yl-HxRqa_GCagKmPnb8:APA91bH4zgG1tDFP5nC0JQmTDblRRIlCphs7_ECj-s9ukXpSpAX3-aFObMPvId5O25kg0gf1XoiHlwxs5MCCX_G_32miHDPP0ull8khWtCIhv_hBXECEe7UFDJR6VjYKkGGJxjd5nR7v', '2023-07-28 14:49:57', '2023-07-28 14:49:57'),
(15, '39', 'ei7r00-2SAGq27_9gWMo_E:APA91bHOZgKCVhldZkHjqN-dKixdI6hAALzUHB1hNuHLxWpPM2f4cu8UlQWMcsRt1ncsZWRsA4iTpzkwlGv4tlKKPzuWZtCbJrqHNvQplSe0PKUX_4oyQFONnGZxHkejYgQrQLZN0Hn-', '2023-08-01 12:53:56', '2023-08-01 12:53:56'),
(16, '40', 'c3ucRv_ySZ6P6iTu74k-xP:APA91bFOgWWiiAX_h5qP8e_gzOyN82ic7Z0S60jqmdQGLtpkvPF4a1K6Xf3_mFHYcK4gnJtLs23PhsfNk-d6Dy7uasKOFW9cGb28GrTBSn_xtxWf51mbd2khsrxkKms-Ho2Hj2UYtSk1', '2023-08-10 19:13:24', '2023-08-10 19:13:24'),
(17, '41', 'f_bg9EX-QIGNthcDOYKM4u:APA91bEXxk0_M3PxBcSrNtJeUY14l2iJrwfETrX5aqeHIsaBn-CKZrh14WIlnxps49yIKBSG3Perk4lJ7XMn2ZYYKbHDlECN3GvvZiKR0n4-s-5oUTOvnxsLL9vtgLIUYlefVJ2H3hoy', '2023-08-11 12:40:55', '2023-08-11 12:40:55'),
(18, '42', 'c3ucRv_ySZ6P6iTu74k-xP:APA91bFOgWWiiAX_h5qP8e_gzOyN82ic7Z0S60jqmdQGLtpkvPF4a1K6Xf3_mFHYcK4gnJtLs23PhsfNk-d6Dy7uasKOFW9cGb28GrTBSn_xtxWf51mbd2khsrxkKms-Ho2Hj2UYtSk1', '2023-08-14 20:13:22', '2023-08-14 20:13:22'),
(19, '43', 'eJ6dmjDaRDGV-0yNkoxXDC:APA91bGN1Ap2wBm8b8qGxYMiC9JHr3d13t6jkypGh3cWSTW6mvquHmheR91QoUkhvFo9UlvAdBaHhawu4lnSxcz-T-rvEgNJdCd_6NeWPTjqqmqsZ5Ka2d3H9EL3IdgY1xzNfN2X1bKF', '2023-09-12 17:33:03', '2023-09-12 17:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `client_alert_msg`
--

CREATE TABLE `client_alert_msg` (
  `id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `packageid` varchar(200) NOT NULL,
  `read_status` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_alert_msg`
--

INSERT INTO `client_alert_msg` (`id`, `msg`, `client_id`, `packageid`, `read_status`, `created_at`, `updated_at`) VALUES
(1, 'Troopa rider has accepted your delivery request', '34', '', '1', '2023-04-20 05:46:16', '2023-04-20 05:46:16'),
(2, 'Hi Paradise Kolosi ,Troopa rider has picked your package (Grocery) to be sent to Riliwan Oloko Dano. your pickup code is  2675', '34', '', '1', '2023-04-20 05:47:49', '2023-04-20 05:47:49'),
(3, 'Hi Paradise Kolosi ,Troopa rider has picked your package (Grocery) to be sent to Riliwan Oloko Dano. your pickup code is  2675', '34', '', '1', '2023-04-20 05:47:49', '2023-04-20 05:47:49'),
(4, 'Troopa rider has delivered package toRiliwan Oloko Danosuccessfully', '34', '', '1', '2023-04-20 05:50:13', '2023-04-20 05:50:13'),
(5, 'Troopa rider has accepted your delivery request', '28', '', '1', '2023-04-22 11:26:38', '2023-04-22 11:26:38'),
(6, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  9213', '28', '', '1', '2023-04-22 11:36:22', '2023-04-22 11:36:22'),
(7, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  9213', '28', '', '1', '2023-04-22 11:36:22', '2023-04-22 11:36:22'),
(8, 'Troopa rider has delivered package toGoodlucksuccessfully', '28', '', '1', '2023-04-22 11:46:00', '2023-04-22 11:46:00'),
(9, 'Troopa rider has accepted your delivery request', '28', '', '1', '2023-04-22 11:56:55', '2023-04-22 11:56:55'),
(10, 'Hi Cyril Duke,Troopa rider has picked your package (Drinks) to be sent to Goodlouc. your pickup code is  9067', '28', '', '1', '2023-04-22 12:01:40', '2023-04-22 12:01:40'),
(11, 'Hi Cyril Duke,Troopa rider has picked your package (Drinks) to be sent to Goodlouc. your pickup code is  9067', '28', '', '1', '2023-04-22 12:01:40', '2023-04-22 12:01:40'),
(12, 'Troopa rider has delivered package toGoodloucsuccessfully', '28', '', '1', '2023-04-22 12:07:48', '2023-04-22 12:07:48'),
(13, 'Troopa rider has accepted your delivery request', '28', '', '1', '2023-04-22 12:13:19', '2023-04-22 12:13:19'),
(14, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodlouc. your pickup code is  2376', '28', '', '1', '2023-04-22 12:15:18', '2023-04-22 12:15:18'),
(15, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodlouc. your pickup code is  2376', '28', '', '1', '2023-04-22 12:15:18', '2023-04-22 12:15:18'),
(16, 'Troopa rider has delivered package toGoodloucsuccessfully', '28', '', '1', '2023-04-22 12:16:51', '2023-04-22 12:16:51'),
(17, 'Troopa rider has accepted your delivery request', '28', '', '1', '2023-04-24 11:38:30', '2023-04-24 11:38:30'),
(18, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  1287', '28', '', '1', '2023-04-24 11:42:09', '2023-04-24 11:42:09'),
(19, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  1287', '28', '', '1', '2023-04-24 11:42:09', '2023-04-24 11:42:09'),
(20, 'Troopa rider has delivered package toGoodlucksuccessfully', '28', '', '1', '2023-04-24 11:49:22', '2023-04-24 11:49:22'),
(21, 'Troopa rider has accepted your delivery request', '28', '', '1', '2023-04-24 12:42:19', '2023-04-24 12:42:19'),
(22, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  8670', '28', '', '1', '2023-04-24 12:46:48', '2023-04-24 12:46:48'),
(23, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  8670', '28', '', '1', '2023-04-24 12:46:48', '2023-04-24 12:46:48'),
(24, 'Troopa rider has delivered package toGoodlucksuccessfully', '28', '', '1', '2023-04-24 12:52:10', '2023-04-24 12:52:10'),
(25, 'Troopa rider has accepted your delivery request', '28', '', '1', '2023-04-24 12:54:18', '2023-04-24 12:54:18'),
(26, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  2014', '28', '', '1', '2023-04-24 12:54:56', '2023-04-24 12:54:56'),
(27, 'Hi Cyril Duke,Troopa rider has picked your package (Food) to be sent to Goodluck. your pickup code is  2014', '28', '', '1', '2023-04-24 12:54:56', '2023-04-24 12:54:56'),
(28, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:18:36', '2023-05-03 15:18:36'),
(29, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:18:36', '2023-05-03 15:18:36'),
(30, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:20:04', '2023-05-03 15:20:04'),
(31, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:20:04', '2023-05-03 15:20:04'),
(32, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:21:37', '2023-05-03 15:21:37'),
(33, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:21:37', '2023-05-03 15:21:37'),
(34, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:23:20', '2023-05-03 15:23:20'),
(35, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:23:20', '2023-05-03 15:23:20'),
(36, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:24:48', '2023-05-03 15:24:48'),
(37, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:24:48', '2023-05-03 15:24:48'),
(38, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:36:32', '2023-05-03 15:36:32'),
(39, 'Troopa rider is close to your package pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-03 15:36:32', '2023-05-03 15:36:32'),
(40, 'Troopa rider has arrived pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-04 09:27:26', '2023-05-04 09:27:26'),
(41, 'Troopa rider has arrived pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-04 09:27:26', '2023-05-04 09:27:26'),
(42, 'Troopa rider has arrived pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-04 09:31:47', '2023-05-04 09:31:47'),
(43, 'Troopa rider has arrived pickup location', '29', 'FCT FC-0724LI', '1', '2023-05-04 09:31:47', '2023-05-04 09:31:47'),
(63, 'send', '28', 'FCT DE-7293QO', '1', '2023-05-06 09:40:29', '2023-05-06 09:40:29'),
(61, 'weldone', '20', 'FCT NN-8385YG', '1', '2023-05-05 16:29:16', '2023-05-05 16:29:16'),
(62, 'testing testing testing', '20', 'FCT NN-8385YG', '1', '2023-05-05 20:58:40', '2023-05-05 20:58:40'),
(60, 'weldone', '20', 'FCT NN-8385YG', '1', '2023-05-05 16:27:54', '2023-05-05 16:27:54'),
(58, 'weldone', '20', 'FCT NN-8385YG', '1', '2023-05-05 16:14:07', '2023-05-05 16:14:07'),
(59, 'weldone', '20', 'FCT NN-8385YG', '1', '2023-05-05 16:27:48', '2023-05-05 16:27:48'),
(57, 'Troopa rider has got to package delivery location', '29', 'FCT FC-0724LI', '1', '2023-05-04 15:59:29', '2023-05-04 15:59:29'),
(56, 'Troopa rider is close to package delivery location', '29', 'FCT FC-0724LI', '1', '2023-05-04 15:28:06', '2023-05-04 15:28:06'),
(54, 'Troopa rider has started delivery of this package. The verification code is 0963', '29', 'FCT FC-0724LI', '1', '2023-05-04 11:22:41', '2023-05-04 11:22:41'),
(55, 'Troopa rider is close to package delivery location', '29', 'FCT FC-0724LI', '1', '2023-05-04 15:25:13', '2023-05-04 15:25:13'),
(64, 'send', '28', 'FCT DE-7293QO', '1', '2023-05-06 09:52:25', '2023-05-06 09:52:25'),
(65, 'Troopa rider has accepted your delivery request', '29', 'FCT FC-0724LI', '1', '2023-05-06 15:23:56', '2023-05-06 15:23:56'),
(66, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 16:25:08', '2023-05-06 16:25:08'),
(67, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 20:06:15', '2023-05-06 20:06:15'),
(68, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 20:24:13', '2023-05-06 20:24:13'),
(69, 'Troopa rider has started delivery of this package. The verification code is 7132', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 20:31:31', '2023-05-06 20:31:31'),
(70, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 20:49:35', '2023-05-06 20:49:35'),
(71, 'Troopa rider has started delivery of this package. The verification code is 2639', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 20:50:49', '2023-05-06 20:50:49'),
(72, 'send', '28', 'Bayelsa GK-8881BT', '1', '2023-05-06 21:07:59', '2023-05-06 21:07:59'),
(73, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 14:59:29', '2023-05-07 14:59:29'),
(74, 'Troopa rider has started delivery of this package. The verification code is 5246', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 15:00:58', '2023-05-07 15:00:58'),
(75, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 15:28:59', '2023-05-07 15:28:59'),
(76, 'Troopa rider has started delivery of this package. The verification code is 3825', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 15:51:29', '2023-05-07 15:51:29'),
(77, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 21:02:12', '2023-05-07 21:02:12'),
(78, 'Troopa rider has started delivery of this package. The verification code is 8025', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 21:02:32', '2023-05-07 21:02:32'),
(79, 'Troopa rider has got to package delivery location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-07 21:06:25', '2023-05-07 21:06:25'),
(80, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 10:23:48', '2023-05-08 10:23:48'),
(81, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 12:11:06', '2023-05-08 12:11:06'),
(82, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 13:31:06', '2023-05-08 13:31:06'),
(83, 'Troopa rider has started delivery of this package. The verification code is 9685', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 14:20:45', '2023-05-08 14:20:45'),
(84, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 14:42:44', '2023-05-08 14:42:44'),
(85, 'Troopa rider has started delivery of this package. The verification code is 4618', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 14:43:07', '2023-05-08 14:43:07'),
(86, 'Troopa rider has got to package delivery location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 14:57:06', '2023-05-08 14:57:06'),
(87, 'Troopa rider has delivered package to Fh successfully', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 15:44:28', '2023-05-08 15:44:28'),
(88, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 16:13:21', '2023-05-08 16:13:21'),
(89, 'Troopa rider has arrived pickup location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 16:17:25', '2023-05-08 16:17:25'),
(90, 'Troopa rider has started delivery of this package. The verification code is 2948', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 16:17:49', '2023-05-08 16:17:49'),
(91, 'Troopa rider has got to package delivery location', '28', 'Bayelsa GK-8881BT', '1', '2023-05-08 16:25:28', '2023-05-08 16:25:28'),
(92, 'Troopa rider has accepted your delivery request', '29', 'FCT QI-4736ZT', '1', '2023-05-09 10:25:09', '2023-05-09 10:25:09'),
(93, 'Troopa rider has accepted your delivery request', '28', 'FCT QH-0130RM', '1', '2023-05-09 13:41:33', '2023-05-09 13:41:33'),
(94, 'Troopa rider is close to package pickup location', '28', 'FCT QH-0130RM', '1', '2023-05-09 13:48:20', '2023-05-09 13:48:20'),
(95, 'Troopa rider has arrived pickup location', '28', 'FCT QH-0130RM', '1', '2023-05-09 13:53:21', '2023-05-09 13:53:21'),
(96, 'Troopa rider has started delivery of this package. The verification code is 6735', '28', 'FCT QH-0130RM', '1', '2023-05-09 13:53:25', '2023-05-09 13:53:25'),
(97, 'Troopa rider is close to package delivery location', '28', 'FCT QH-0130RM', '1', '2023-05-09 13:58:52', '2023-05-09 13:58:52'),
(98, 'Troopa rider has got to package delivery location', '28', 'FCT QH-0130RM', '1', '2023-05-09 13:59:15', '2023-05-09 13:59:15'),
(99, 'Troopa rider has delivered package to Jide successfully', '28', 'FCT QH-0130RM', '1', '2023-05-09 14:05:13', '2023-05-09 14:05:13'),
(100, 'Troopa rider has delivered package to Jide successfully', '28', 'FCT QH-0130RM', '1', '2023-05-09 14:05:46', '2023-05-09 14:05:46'),
(101, 'Troopa rider has accepted your delivery request', '34', 'Bayelsa MR-0271PH', '1', '2023-05-09 16:48:18', '2023-05-09 16:48:18'),
(102, 'Troopa rider has arrived pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-09 18:12:42', '2023-05-09 18:12:42'),
(103, 'Troopa rider has started delivery of this package. The verification code is 2650', '34', 'Bayelsa MR-0271PH', '1', '2023-05-09 18:12:52', '2023-05-09 18:12:52'),
(104, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa RD-8101UF', '1', '2023-05-10 08:26:41', '2023-05-10 08:26:41'),
(105, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa ZD-7192AZ', '1', '2023-05-10 08:37:05', '2023-05-10 08:37:05'),
(106, 'Troopa rider has accepted your delivery request', '28', 'Bayelsa CV-3839PK', '1', '2023-05-10 08:43:27', '2023-05-10 08:43:27'),
(107, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa IL-2391AQ', '1', '2023-05-10 08:53:20', '2023-05-10 08:53:20'),
(108, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa IW-5177UV', '1', '2023-05-10 08:56:47', '2023-05-10 08:56:47'),
(109, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa RO-2447FG', '1', '2023-05-10 09:03:25', '2023-05-10 09:03:25'),
(110, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa PI-1881SU', '1', '2023-05-10 09:10:40', '2023-05-10 09:10:40'),
(111, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa JK-3984CX', '1', '2023-05-10 12:03:25', '2023-05-10 12:03:25'),
(112, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa WG-6674RY', '1', '2023-05-10 12:13:17', '2023-05-10 12:13:17'),
(113, 'Troopa rider is close to package pickup location', '20', 'Bayelsa WG-6674RY', '1', '2023-05-10 12:13:37', '2023-05-10 12:13:37'),
(114, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa QZ-2464VR', '1', '2023-05-10 12:26:29', '2023-05-10 12:26:29'),
(115, 'Troopa rider is close to package pickup location', '20', 'Bayelsa QZ-2464VR', '1', '2023-05-10 12:26:31', '2023-05-10 12:26:31'),
(116, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa AK-9427FT', '1', '2023-05-10 12:42:38', '2023-05-10 12:42:38'),
(117, 'Troopa rider is close to package pickup location', '20', 'Bayelsa AK-9427FT', '1', '2023-05-10 12:43:03', '2023-05-10 12:43:03'),
(118, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa RB-9459TB', '1', '2023-05-10 13:31:01', '2023-05-10 13:31:01'),
(119, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa EF-6960DP', '1', '2023-05-10 13:33:39', '2023-05-10 13:33:39'),
(120, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa YZ-5804UO', '1', '2023-05-10 13:48:08', '2023-05-10 13:48:08'),
(121, 'Troopa rider is close to package pickup location', '20', 'Bayelsa YZ-5804UO', '1', '2023-05-10 13:48:10', '2023-05-10 13:48:10'),
(122, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa NY-2396DL', '1', '2023-05-10 13:50:03', '2023-05-10 13:50:03'),
(123, 'Troopa rider is close to package pickup location', '20', 'Bayelsa NY-2396DL', '1', '2023-05-10 13:50:35', '2023-05-10 13:50:35'),
(124, 'Troopa rider is close to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-10 22:05:52', '2023-05-10 22:05:52'),
(125, 'Troopa rider has got to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-10 23:29:10', '2023-05-10 23:29:10'),
(126, 'Troopa rider has delivered package to Riliwan Oloko Dano successfully', '34', 'Bayelsa MR-0271PH', '1', '2023-05-10 23:36:53', '2023-05-10 23:36:53'),
(127, 'Troopa rider has delivered package to Riliwan Oloko Dano successfully', '34', 'Bayelsa MR-0271PH', '1', '2023-05-10 23:40:15', '2023-05-10 23:40:15'),
(128, 'Troopa rider is close to package pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 00:53:02', '2023-05-11 00:53:02'),
(129, 'Troopa rider has arrived pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 04:26:08', '2023-05-11 04:26:08'),
(130, 'Troopa rider has started delivery of this package. The verification code is 0863', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 04:26:26', '2023-05-11 04:26:26'),
(131, 'Troopa rider is close to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 12:38:10', '2023-05-11 12:38:10'),
(132, 'Troopa rider has got to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 12:54:28', '2023-05-11 12:54:28'),
(133, 'Troopa rider has delivered package to Riliwan Oloko Dano successfully', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:21:30', '2023-05-11 14:21:30'),
(134, 'Troopa rider has accepted your delivery request', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:29:03', '2023-05-11 14:29:03'),
(135, 'Troopa rider is close to package pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:37:43', '2023-05-11 14:37:43'),
(136, 'Troopa rider has arrived pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:37:57', '2023-05-11 14:37:57'),
(137, 'Troopa rider has started delivery of this package. The verification code is 8706', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:38:08', '2023-05-11 14:38:08'),
(138, 'Troopa rider is close to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:52:50', '2023-05-11 14:52:50'),
(139, 'Troopa rider has got to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:53:51', '2023-05-11 14:53:51'),
(140, 'Troopa rider has delivered package to Riliwan Oloko Dano successfully', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 14:56:36', '2023-05-11 14:56:36'),
(141, 'Troopa rider has accepted your delivery request', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:02:26', '2023-05-11 15:02:26'),
(142, 'Troopa rider is close to package pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:02:49', '2023-05-11 15:02:49'),
(143, 'Troopa rider has arrived pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:03:02', '2023-05-11 15:03:02'),
(144, 'Troopa rider has started delivery of this package. The verification code is 8479', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:03:13', '2023-05-11 15:03:13'),
(145, 'Troopa rider is close to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:04:00', '2023-05-11 15:04:00'),
(146, 'Troopa rider has got to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:04:23', '2023-05-11 15:04:23'),
(147, 'Troopa rider has accepted your delivery request', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:34:02', '2023-05-11 15:34:02'),
(148, 'Troopa rider is close to package pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:34:15', '2023-05-11 15:34:15'),
(149, 'Troopa rider has arrived pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:34:36', '2023-05-11 15:34:36'),
(150, 'Troopa rider has started delivery of this package. The verification code is 0561', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:35:03', '2023-05-11 15:35:03'),
(151, 'Troopa rider is close to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:42:49', '2023-05-11 15:42:49'),
(152, 'Troopa rider has got to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:43:07', '2023-05-11 15:43:07'),
(153, 'Troopa rider has delivered package to Riliwan Oloko Dano successfully', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:50:42', '2023-05-11 15:50:42'),
(154, 'Troopa rider has accepted your delivery request', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 15:59:40', '2023-05-11 15:59:40'),
(155, 'Troopa rider has accepted your delivery request', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 16:12:52', '2023-05-11 16:12:52'),
(156, 'Troopa rider is close to package pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 16:13:07', '2023-05-11 16:13:07'),
(157, 'Troopa rider has arrived pickup location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 16:13:45', '2023-05-11 16:13:45'),
(158, 'Troopa rider has started delivery of this package. The verification code is 9314', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 16:13:57', '2023-05-11 16:13:57'),
(159, 'Troopa rider is close to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 16:14:49', '2023-05-11 16:14:49'),
(160, 'Troopa rider has got to package delivery location', '34', 'Bayelsa MR-0271PH', '1', '2023-05-11 16:15:34', '2023-05-11 16:15:34'),
(161, 'Troopa rider has accepted your delivery request', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:24:22', '2023-05-11 22:24:22'),
(162, 'Troopa rider is close to package pickup location', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:24:29', '2023-05-11 22:24:29'),
(163, 'Troopa rider has arrived pickup location', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:26:29', '2023-05-11 22:26:29'),
(164, 'Troopa rider has started delivery of this package. The verification code is 8357', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:26:39', '2023-05-11 22:26:39'),
(165, 'Troopa rider is close to package delivery location', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:30:24', '2023-05-11 22:30:24'),
(166, 'Troopa rider has got to package delivery location', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:31:05', '2023-05-11 22:31:05'),
(167, 'Troopa rider has delivered package to Rita David successfully', '19', 'Bayelsa CS-4411HH', '1', '2023-05-11 22:37:33', '2023-05-11 22:37:33'),
(168, 'Troopa rider has accepted your delivery request', '19', 'Bayelsa LR-3274KS', '1', '2023-05-12 01:49:00', '2023-05-12 01:49:00'),
(169, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-05 12:19:27', '2023-07-05 12:19:27'),
(170, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-05 12:22:05', '2023-07-05 12:22:05'),
(171, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-05 14:30:14', '2023-07-05 14:30:14'),
(172, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-12 16:30:16', '2023-07-12 16:30:16'),
(173, 'Troopa rider is close to package pickup location', '35', 'FCT FC-0724LI', '1', '2023-07-14 12:44:40', '2023-07-14 12:44:40'),
(174, 'Troopa rider is close to package pickup location', '35', 'FCT FC-0724LI', '1', '2023-07-14 12:44:59', '2023-07-14 12:44:59'),
(175, 'Troopa rider has arrived pickup location', '35', 'FCT FC-0724LI', '1', '2023-07-14 12:45:56', '2023-07-14 12:45:56'),
(176, 'Troopa rider has started delivery of this package. The verification code is 2058', '35', 'FCT FC-0724LI', '1', '2023-07-14 12:47:33', '2023-07-14 12:47:33'),
(177, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 12:51:13', '2023-07-14 12:51:13'),
(178, 'Troopa rider has arrived pickup location', '35', 'FCT FC-0724LI', '1', '2023-07-14 18:33:22', '2023-07-14 18:33:22'),
(179, 'Troopa rider has started delivery of this package. The verification code is 2367', '35', 'FCT FC-0724LI', '1', '2023-07-14 18:34:17', '2023-07-14 18:34:17'),
(180, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 18:36:21', '2023-07-14 18:36:21'),
(181, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 18:39:49', '2023-07-14 18:39:49'),
(182, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 18:56:55', '2023-07-14 18:56:55'),
(183, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 19:23:10', '2023-07-14 19:23:10'),
(184, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-14 19:47:40', '2023-07-14 19:47:40'),
(185, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-14 19:55:39', '2023-07-14 19:55:39'),
(186, 'Troopa rider has arrived pickup location', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:13:07', '2023-07-14 20:13:07'),
(187, 'Troopa rider has started delivery of this package. The verification code is 2468', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:13:11', '2023-07-14 20:13:11'),
(188, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:13:32', '2023-07-14 20:13:32'),
(189, 'Troopa rider has delivered package to Festus successfully', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:18:29', '2023-07-14 20:18:29'),
(190, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:20:57', '2023-07-14 20:20:57'),
(191, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:23:56', '2023-07-14 20:23:56'),
(192, 'Troopa rider has delivered package to Festus successfully', '35', 'FCT FC-0724LI', '1', '2023-07-14 20:24:07', '2023-07-14 20:24:07'),
(193, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-15 08:28:55', '2023-07-15 08:28:55'),
(194, 'Troopa rider has got to package delivery location', '35', 'FCT FC-0724LI', '1', '2023-07-15 09:18:12', '2023-07-15 09:18:12'),
(195, 'Troopa rider has delivered package to Festus successfully', '35', 'FCT FC-0724LI', '1', '2023-07-15 09:18:19', '2023-07-15 09:18:19'),
(196, 'Troopa rider has accepted your delivery request', '35', 'FCT FC-0724LI', '1', '2023-07-15 09:19:34', '2023-07-15 09:19:34'),
(197, 'Troopa rider has accepted your delivery request', '30', 'FCT LZ-9466CC', '1', '2023-07-27 18:16:53', '2023-07-27 18:16:53'),
(198, 'Troopa rider has arrived pickup location', '30', 'FCT LZ-9466CC', '1', '2023-07-27 18:18:03', '2023-07-27 18:18:03'),
(199, 'Troopa rider has started delivery of this package. The verification code is 8736', '30', 'FCT LZ-9466CC', '1', '2023-07-27 18:18:05', '2023-07-27 18:18:05'),
(200, 'Troopa rider has got to package delivery location', '30', 'FCT LZ-9466CC', '1', '2023-07-27 18:18:16', '2023-07-27 18:18:16'),
(201, 'Troopa rider has accepted your delivery request', '30', 'FCT WI-4587MF', '1', '2023-07-28 12:36:21', '2023-07-28 12:36:21'),
(202, 'Troopa rider has arrived pickup location', '30', 'FCT WI-4587MF', '1', '2023-07-28 12:36:47', '2023-07-28 12:36:47'),
(203, 'Troopa rider has started delivery of this package. The verification code is 2613', '30', 'FCT WI-4587MF', '1', '2023-07-28 12:36:59', '2023-07-28 12:36:59'),
(204, 'Troopa rider has got to package delivery location', '30', 'FCT WI-4587MF', '1', '2023-07-28 12:37:15', '2023-07-28 12:37:15'),
(205, 'Troopa rider has delivered package to Ken successfully', '30', 'FCT WI-4587MF', '1', '2023-07-28 12:38:48', '2023-07-28 12:38:48'),
(206, 'Troopa rider has accepted your delivery request', '30', 'FCT CZ-1033GT', '1', '2023-07-29 11:21:43', '2023-07-29 11:21:43'),
(207, 'Troopa rider has arrived pickup location', '30', 'FCT CZ-1033GT', '1', '2023-07-29 11:23:28', '2023-07-29 11:23:28'),
(208, 'Troopa rider has started delivery of this package. The verification code is 1504', '30', 'FCT CZ-1033GT', '1', '2023-07-29 11:23:30', '2023-07-29 11:23:30'),
(209, 'Troopa rider has got to package delivery location', '30', 'FCT CZ-1033GT', '1', '2023-07-29 11:23:42', '2023-07-29 11:23:42'),
(210, 'Troopa rider has got to package delivery location', '30', 'FCT CZ-1033GT', '1', '2023-07-29 11:30:39', '2023-07-29 11:30:39'),
(211, 'Troopa rider has got to package delivery location', '30', 'FCT CZ-1033GT', '1', '2023-07-29 12:24:38', '2023-07-29 12:24:38'),
(212, 'Troopa rider has got to package delivery location', '30', 'FCT CZ-1033GT', '1', '2023-07-29 12:26:23', '2023-07-29 12:26:23'),
(213, 'Troopa rider has got to package delivery location', '30', 'FCT CZ-1033GT', '1', '2023-08-01 11:50:28', '2023-08-01 11:50:28'),
(214, 'Troopa rider has accepted your delivery request', '39', 'Greater Accra Region FW-7725BY', '1', '2023-08-02 11:22:03', '2023-08-02 11:22:03'),
(215, 'Troopa rider has arrived pickup location', '39', 'Greater Accra Region FW-7725BY', '1', '2023-08-02 11:23:32', '2023-08-02 11:23:32'),
(216, 'Troopa rider has started delivery of this package. The verification code is 4971', '39', 'Greater Accra Region FW-7725BY', '1', '2023-08-02 11:23:37', '2023-08-02 11:23:37'),
(217, 'Troopa rider has got to package delivery location', '39', 'Greater Accra Region FW-7725BY', '1', '2023-08-02 11:23:56', '2023-08-02 11:23:56'),
(218, 'Troopa rider has delivered package to Tub successfully', '39', 'Greater Accra Region FW-7725BY', '1', '2023-08-02 11:25:52', '2023-08-02 11:25:52'),
(219, 'Troopa rider has accepted your delivery request', '39', 'FCT TB-2652JH', '1', '2023-08-05 12:17:05', '2023-08-05 12:17:05'),
(220, 'Troopa rider has arrived pickup location', '39', 'FCT TB-2652JH', '1', '2023-08-05 12:17:44', '2023-08-05 12:17:44'),
(221, 'Troopa rider has started delivery of this package. The verification code is 1594', '39', 'FCT TB-2652JH', '1', '2023-08-05 12:17:53', '2023-08-05 12:17:53'),
(222, 'Troopa rider has got to package delivery location', '39', 'FCT TB-2652JH', '1', '2023-08-05 12:18:07', '2023-08-05 12:18:07'),
(223, 'Troopa rider has delivered package to Con successfully', '39', 'FCT TB-2652JH', '1', '2023-08-05 12:18:24', '2023-08-05 12:18:24'),
(224, 'Troopa rider has accepted your delivery request', '39', 'FCT AS-4981GK', '1', '2023-08-05 14:20:37', '2023-08-05 14:20:37'),
(225, 'Troopa rider has arrived pickup location', '39', 'FCT AS-4981GK', '1', '2023-08-05 14:20:57', '2023-08-05 14:20:57'),
(226, 'Troopa rider has started delivery of this package. The verification code is 3876', '39', 'FCT AS-4981GK', '1', '2023-08-05 14:21:00', '2023-08-05 14:21:00'),
(227, 'Troopa rider has got to package delivery location', '39', 'FCT AS-4981GK', '1', '2023-08-05 14:54:52', '2023-08-05 14:54:52'),
(228, 'Troopa rider has got to package delivery location', '39', 'FCT AS-4981GK', '1', '2023-08-07 19:27:27', '2023-08-07 19:27:27'),
(229, 'Troopa rider has got to package delivery location', '39', 'FCT AS-4981GK', '1', '2023-08-07 19:36:31', '2023-08-07 19:36:31'),
(230, 'Troopa rider has delivered package to Bin successfully', '39', 'FCT AS-4981GK', '1', '2023-08-07 19:55:59', '2023-08-07 19:55:59'),
(231, 'Troopa rider has accepted your delivery request', '24', 'Oyo QH-0834AD', '1', '2023-08-11 10:39:06', '2023-08-11 10:39:06'),
(232, 'Troopa rider has accepted your delivery request', '24', 'Oyo MX-8255BD', '1', '2023-08-11 10:45:39', '2023-08-11 10:45:39'),
(233, 'Troopa rider has accepted your delivery request', '41', 'Oyo VU-6226JA', '1', '2023-08-11 12:43:57', '2023-08-11 12:43:57'),
(234, 'Troopa rider has accepted your delivery request', '41', 'Oyo JD-1583WE', '1', '2023-08-11 12:45:52', '2023-08-11 12:45:52'),
(235, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa ZN-7388IW', '1', '2023-08-11 14:05:23', '2023-08-11 14:05:23'),
(236, 'Troopa rider has accepted your delivery request', '39', 'Bayelsa BE-7811LI', '1', '2023-08-11 15:02:45', '2023-08-11 15:02:45'),
(237, 'Troopa rider has arrived pickup location', '39', 'Bayelsa BE-7811LI', '1', '2023-08-11 15:06:21', '2023-08-11 15:06:21'),
(238, 'Troopa rider has started delivery of this package. The verification code is 2375', '39', 'Bayelsa BE-7811LI', '1', '2023-08-11 15:07:17', '2023-08-11 15:07:17'),
(239, 'Troopa rider has got to package delivery location', '39', 'Bayelsa BE-7811LI', '1', '2023-08-11 15:14:26', '2023-08-11 15:14:26'),
(240, 'Troopa rider has delivered package to Bin successfully', '39', 'Bayelsa BE-7811LI', '1', '2023-08-11 15:14:58', '2023-08-11 15:14:58'),
(241, 'Troopa rider has accepted your delivery request', '20', 'Bayelsa GX-9497FK', '1', '2023-08-11 17:02:35', '2023-08-11 17:02:35'),
(242, 'Troopa rider has accepted your delivery request', '42', 'Ogun State ZV-2470HL', '1', '2023-08-14 23:32:29', '2023-08-14 23:32:29'),
(243, 'Troopa rider has accepted your delivery request', '42', 'Ogun State GI-8711ZM', '1', '2023-08-15 07:55:39', '2023-08-15 07:55:39'),
(244, 'Troopa rider has accepted your delivery request', '42', 'Ogun State PJ-4989VF', '1', '2023-08-15 13:22:27', '2023-08-15 13:22:27'),
(245, 'Troopa rider has accepted your delivery request', '42', 'Ogun State SE-9900PC', '1', '2023-08-15 13:27:03', '2023-08-15 13:27:03'),
(246, 'Troopa rider has accepted your delivery request', '42', 'Ogun State ME-6794NU', '1', '2023-08-15 23:46:15', '2023-08-15 23:46:15'),
(247, 'Troopa rider has arrived pickup location', '42', 'Ogun State ME-6794NU', '1', '2023-08-16 00:31:03', '2023-08-16 00:31:03'),
(248, 'Troopa rider has started delivery of this package. The verification code is 3124', '42', 'Ogun State ME-6794NU', '1', '2023-08-16 20:01:41', '2023-08-16 20:01:41'),
(249, 'Troopa rider has got to package delivery location', '42', 'Ogun State ME-6794NU', '1', '2023-08-16 20:22:05', '2023-08-16 20:22:05'),
(250, 'Troopa rider has got to package delivery location', '42', 'Ogun State ME-6794NU', '1', '2023-08-16 20:44:33', '2023-08-16 20:44:33'),
(251, 'Troopa rider has delivered package to Jane Doe successfully', '42', 'Ogun State ME-6794NU', '1', '2023-08-16 20:45:22', '2023-08-16 20:45:22'),
(252, 'Troopa rider has accepted your delivery request', '42', 'Ogun State ON-4518BF', '1', '2023-08-20 22:32:07', '2023-08-20 22:32:07'),
(253, 'Troopa rider has accepted your delivery request', '41', 'Oyo HZ-1549IK', '1', '2023-08-21 09:31:37', '2023-08-21 09:31:37'),
(254, 'Troopa rider has accepted your delivery request', '24', 'Oyo WI-5830IU', '1', '2023-08-21 12:12:14', '2023-08-21 12:12:14'),
(255, 'Troopa rider has arrived pickup location', '24', 'Oyo WI-5830IU', '1', '2023-08-21 15:44:41', '2023-08-21 15:44:41'),
(256, 'Troopa rider has started delivery of this package. The verification code is 8924', '24', 'Oyo WI-5830IU', '1', '2023-08-21 15:44:44', '2023-08-21 15:44:44'),
(257, 'Troopa rider has accepted your delivery request', '41', 'FCT JA-5769GC', '1', '2023-08-22 12:47:08', '2023-08-22 12:47:08'),
(258, 'Troopa rider has accepted your delivery request', '42', 'Ogun State CF-3328RA', '1', '2023-08-22 23:47:52', '2023-08-22 23:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `client_bonus`
--

CREATE TABLE `client_bonus` (
  `id` int(11) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `bonus` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_orders`
--

CREATE TABLE `client_orders` (
  `id` int(11) NOT NULL,
  `rider_contact` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `client_id` int(11) NOT NULL,
  `pickup_location` varchar(200) NOT NULL,
  `pickuplon` varchar(200) NOT NULL,
  `pickuplat` varchar(200) NOT NULL,
  `pickup_contact` varchar(200) NOT NULL,
  `pickup_contact_name` varchar(200) NOT NULL,
  `dropoff_contact_name` varchar(200) NOT NULL,
  `dropoff_location` varchar(200) NOT NULL,
  `dropoff_contact` varchar(200) NOT NULL,
  `payment_type` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `package_type` varchar(200) NOT NULL,
  `duration` varchar(200) NOT NULL,
  `distance` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `delivery_status` varchar(200) NOT NULL,
  `order_code` varchar(200) NOT NULL,
  `treat_status` varchar(200) NOT NULL,
  `customer_rider_id` int(11) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `order_serial` varchar(200) NOT NULL,
  `pickup_location_format` varchar(200) NOT NULL,
  `dropoff_location_format` varchar(200) NOT NULL,
  `dropoff_coordinates` varchar(1000) NOT NULL,
  `request_date` varchar(200) NOT NULL,
  `request_time` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `client_orders`
--

INSERT INTO `client_orders` (`id`, `rider_contact`, `rider_id`, `client_id`, `pickup_location`, `pickuplon`, `pickuplat`, `pickup_contact`, `pickup_contact_name`, `dropoff_contact_name`, `dropoff_location`, `dropoff_contact`, `payment_type`, `amount`, `package_type`, `duration`, `distance`, `created_at`, `updated_at`, `delivery_status`, `order_code`, `treat_status`, `customer_rider_id`, `payment_mode`, `order_serial`, `pickup_location_format`, `dropoff_location_format`, `dropoff_coordinates`, `request_date`, `request_time`) VALUES
(474, '+2349023137444', 'YL-8326DG', 39, 'JRVX+RX2, Accra, Ghana', '', '', '9085599265', 'Fun', 'Tub', '6 Watermelon St, Accra, Ghana', '9085599265', 'pickup location', '1500', 'Drinks', '17 mins', '8.0 km', '2023-08-02 11:21:52', '2023-08-02 11:21:52', 'delivered', '4971', 'old', 0, 'cash', 'Greater Accra Region FW-7725BY', 'Greater Accra Region, Accra Metropolis', 'Greater Accra Region, Ayawaso West Municipal', '', '02 Aug 2023', '11:21 AM'),
(475, '+2349023137444', 'YL-8326DG', 39, 'Federal Capital Territory, Nigeria', '', '', '9085599265', 'G GH', 'Con', 'Garki 900103, Abuja, Federal Capital Territory, Nigeria', '9085599265', 'pickup location', '7800', 'Drinks', '55 mins', '46.5 km', '2023-08-05 12:16:53', '2023-08-05 12:16:53', 'delivered', '1594', 'old', 0, 'cash', 'FCT TB-2652JH', 'FCT, ', 'FCT, Abuja Municipal Area Council', '', '05 Aug 2023', '12:16 PM'),
(476, '+2349023137444', 'YL-8326DG', 39, 'Federal Capital Territory, Nigeria', '', '', '9085599265', 'Vhh Hi', 'Bin', 'Garki 900103, Abuja, Federal Capital Territory, Nigeria', '9085599265', 'dropoff location', '7800', 'Electronics', '55 mins', '46.5 km', '2023-08-05 14:20:27', '2023-08-05 14:20:27', 'delivered', '3876', 'old', 0, 'cash', 'FCT AS-4981GK', 'FCT, ', 'FCT, Abuja Municipal Area Council', '', '05 Aug 2023', '2:20 PM'),
(477, '+2349023137444', 'YL-8326DG', 20, '16 Palm Ave, 569101, Yenagoa, Bayelsa, Nigeria', '', '', '08038474317', 'Yuk', 'Tr', 'Along Isaac Adaka Boro Expressway, W872+GWF, Okaka Rd, 569101, Yenagoa, Bayelsa, Nigeria', '08038474317', 'pickup location', '1300', 'Grocery', '12 mins', '9.2 km', '2023-08-08 15:16:04', '2023-08-08 15:16:04', 'decline', '', 'old', 0, 'cash', 'Bayelsa ZN-7388IW', 'Bayelsa, Yenegoa', 'Bayelsa, Yenegoa', '[{\"latitude\":4.9138041,\"longitude\":6.3022854,\"location\":\"Along Isaac Adaka Boro Expressway, W872+GWF, Okaka Rd, 569101, Yenagoa, Bayelsa, Nigeria\"}]', '08 Aug 2023', '3:16 PM'),
(478, 'nil', 'nil', 20, '16 Palm Ave, 569101, Yenagoa, Bayelsa, Nigeria', '', '', '08038474317', 'Tr', 'Fd', 'W74R+XJM, 569101, Yenagoa, Bayelsa, Nigeria', '08038474317', 'pickup location', '1500', 'Drinks', '13 mins', '8.4 km', '2023-08-08 15:17:49', '2023-08-08 15:17:49', 'new', '', 'new', 0, 'cash', 'Bayelsa XT-0488YV', 'Bayelsa, Yenegoa', 'Bayelsa, Yenegoa', '{\"latitude\":4.9074309,\"longitude\":6.291523499999999,\"location\":\"W74R+XJM, 569101, Yenagoa, Bayelsa, Nigeria\"}', '08 Aug 2023', '3:17 PM'),
(479, 'nil', 'BO-5545DY', 20, '16 Palm Ave, 569101, Yenagoa, Bayelsa, Nigeria', '', '', '08038474317', 'Tr', 'Dh', '59 Okaka Rd, Azikoro 569101, Yenagoa, Bayelsa, Nigeria', '08038474317', 'pickup location', '500', 'Drinks', '2 mins', '0.9 km', '2023-08-08 15:17:49', '2023-08-08 15:17:49', 'decline', '', 'old', 0, 'cash', 'Bayelsa GX-9497FK', 'Bayelsa, Yenegoa', 'Bayelsa, Yenegoa', '{\"latitude\":4.9154484,\"longitude\":6.3040285,\"location\":\"59 Okaka Rd, Azikoro 569101, Yenagoa, Bayelsa, Nigeria\"}', '08 Aug 2023', '3:17 PM'),
(480, '+2348133712892', 'BO-5545DY', 24, 'Queen Elizabeth I I Road, Agodi 200285, Ibadan, Oyo, Nigeria', '', '', '08039193048', 'Tamar', 'Tope', 'CWP5+QCF, 200132, Ibadan, Oyo, Nigeria', '07039193048', 'dropoff location', '1800', 'Food', '29 mins', '11.0 km', '2023-08-11 10:38:49', '2023-08-11 10:38:49', 'decline', '', 'old', 0, 'cash', 'Oyo QH-0834AD', 'Oyo, ', 'Oyo, ', '[{\"latitude\":7.436945900000001,\"longitude\":3.908538100000001,\"location\":\"CWP5+QCF, 200132, Ibadan, Oyo, Nigeria\"}]', '11 Aug 2023', '10:38 AM'),
(481, '+2348133712892', 'BO-5545DY', 24, 'Queen Elizabeth I I Road, Agodi 200285, Ibadan, Oyo, Nigeria', '', '', '08039193048', 'Tara', 'Tope', 'CWP5+QCF, 200132, Ibadan, Oyo, Nigeria', '07039193048', 'dropoff location', '1800', 'Food', '29 mins', '11.0 km', '2023-08-11 10:45:27', '2023-08-11 10:45:27', 'decline', '', 'old', 0, 'cash', 'Oyo MX-8255BD', 'Oyo, ', 'Oyo, ', '[{\"latitude\":7.436945900000001,\"longitude\":3.908538100000001,\"location\":\"CWP5+QCF, 200132, Ibadan, Oyo, Nigeria\"}]', '11 Aug 2023', '10:45 AM'),
(482, '+2348133712892', 'BO-5545DY', 41, 'No 68 Elena street, Akinyele Rd, 200132, Ibadan, Oyo, Nigeria', '', '', '09047982448', 'Grace', 'Joke', 'CWR4+MM2, 200132, Ibadan, Oyo, Nigeria', '09071882438', 'dropoff location', '2000', 'Grocery', '36 mins', '12.0 km', '2023-08-11 12:43:50', '2023-08-11 12:43:50', 'decline', '', 'old', 0, 'cash', 'Oyo VU-6226JA', 'Oyo, Akinyele', 'Oyo, ', '[{\"latitude\":7.441635799999999,\"longitude\":3.9066465,\"location\":\"CWR4+MM2, 200132, Ibadan, Oyo, Nigeria\"}]', '11 Aug 2023', '12:43 PM'),
(483, '+2348133712892', 'BO-5545DY', 41, 'No 68 Elena street, Akinyele Rd, 200132, Ibadan, Oyo, Nigeria', '', '', '9047982448', 'Gemi', 'Joke', 'CWR4+MMR, 200132, Ibadan, Oyo, Nigeria', '9047982448', 'dropoff location', '2000', 'Drinks', '36 mins', '12.0 km', '2023-08-11 12:45:43', '2023-08-11 12:45:43', 'decline', '', 'old', 0, 'cash', 'Oyo JD-1583WE', 'Oyo, Akinyele', 'Oyo, ', '[{\"latitude\":7.4417492,\"longitude\":3.9066555,\"location\":\"CWR4+MMR, 200132, Ibadan, Oyo, Nigeria\"}]', '11 Aug 2023', '12:45 PM'),
(484, 'nil', 'nil', 39, 'X87W+9W Yenagoa, Nigeria', '', '', '9085599265', 'Paul', 'James Be', 'Opposite tonimas Yenagoa Edepie, 569101, Yenagoa, Bayelsa, Nigeria', '9085599265', 'pickup location', '500', 'Electronics', '6 mins', '2.6 km', '2023-08-11 14:39:18', '2023-08-11 14:39:18', 'new', '', 'new', 0, 'cash', 'Bayelsa DT-1060SX', 'Bayelsa, Yenegoa', 'Bayelsa, Yenegoa', 'null', '11 Aug 2023', '2:39 PM'),
(485, '+2349023137444', 'YL-8326DG', 39, 'W8MQ+HX, 569101, Yenagoa, Bayelsa, Nigeria', '', '', '9085599265', 'Hello', 'Bin', 'No. 126, opposite Old Catholic Church, 569101, Agudama, Bayelsa, Nigeria', '9085599265', 'pickup location', '2400', 'Pastries', '21 mins', '14.2 km', '2023-08-11 15:02:36', '2023-08-11 15:02:36', 'delivered', '2375', 'old', 0, 'cash', 'Bayelsa BE-7811LI', 'Bayelsa, Yenegoa', 'Bayelsa, Yenegoa', 'null', '11 Aug 2023', '3:02 PM'),
(486, 'nil', 'nil', 42, '19b Ada-George Road, Rumuafrikom 500272, Port Harcourt, Rivers, Nigeria', '', '', '8168356170', 'John Doe', 'Jane Doe', 'Majesty Estate, by Jesus Evangelical Power Mission, Ozuoba, Mgbuoba 500102, Port Harcourt, Rivers, Nigeria', '00000000', 'pickup location', '700', 'Electronics', '12 mins', '5.5 km', '2023-08-14 20:18:47', '2023-08-14 20:18:47', 'new', '', 'new', 0, 'cash', 'Rivers SS-2258PT', 'Rivers, Obio/Akpor', 'Rivers, Obio/Akpor', '[{\"latitude\":4.8681961,\"longitude\":6.9566333,\"location\":\"Majesty Estate, by Jesus Evangelical Power Mission, Ozuoba, Mgbuoba 500102, Port Harcourt, Rivers, Nigeria\"}]', '14 Aug 2023', '8:18 PM'),
(487, 'nil', 'nil', 42, 'X944+WH Yenagoa, Nigeria', '', '', '8168356170', 'John Doe', 'Jane Doe', 'W8JQ+J8, 569101, Yenagoa, Bayelsa, Nigeria', '0000000000', 'pickup location', '500', 'Grocery', '1 min', '1 m', '2023-08-14 20:28:37', '2023-08-14 20:28:37', 'new', '', 'new', 0, 'cash', 'Bayelsa YV-0269BV', 'Bayelsa, Yenegoa', 'Bayelsa, Yenegoa', '[{\"latitude\":4.9315507,\"longitude\":6.338261399999999,\"location\":\"W8JQ+J8, 569101, Yenagoa, Bayelsa, Nigeria\"}]', '14 Aug 2023', '8:28 PM'),
(488, '+2348120029028', 'JZ-9881JK', 42, '7 Elms Court Avenue, Off Olabisi Onabanjo Way, opposite FMC, 110118, Abeokuta, Ogun State, Nigeria', '', '', '8168356170', 'John Doe', 'Jane Doe', '10,Sowo Street, 110118, Sowo, Ogun State, Nigeria', '000000', 'pickup location', '2600', 'Electronics', '21 mins', '16.2 km', '2023-08-14 23:01:35', '2023-08-14 23:01:35', 'decline', '', 'old', 0, 'cash', 'Ogun State OK-8506MK', 'Ogun State, Abeokuta South', 'Ogun State, Obafemi Owode', '[{\"latitude\":7.060425299999999,\"longitude\":3.4166057,\"location\":\"10,Sowo Street, 110118, Sowo, Ogun State, Nigeria\"}]', '14 Aug 2023', '11:01 PM'),
(489, '+2348120029028', 'JZ-9881JK', 42, 'Block 7, Plot 22, Abeokuta-Ibadan Express Way Asero Opposite Asero Garage By GTBank, 111101, Abeokuta, Ogun State, Nigeria', '', '', '8168356170', 'John Doe', 'Jane Doe', 'Km 5 Abeokuta shagamu express rd Ogun, 110118, Ototo Lukoye, Ogun State, Nigeria', '000000000', 'pickup location', '2600', 'Electronics', '18 mins', '16.2 km', '2023-08-14 23:29:23', '2023-08-14 23:29:23', 'cancelled', '', 'old', 0, 'cash', 'Ogun State ZV-2470HL', 'Ogun State, ', 'Ogun State, Obafemi Owode', '[{\"latitude\":7.102867000000001,\"longitude\":3.393828000000001,\"location\":\"Km 5 Abeokuta shagamu express rd Ogun, 110118, Ototo Lukoye, Ogun State, Nigeria\"}]', '14 Aug 2023', '11:29 PM'),
(490, '+2348120029028', 'JZ-9881JK', 42, 'Odo-Eja,Ilupeju, 110101, Abeokuta, Ogun State, Nigeria', '', '', '8168356170', 'John Doe', 'Jane Doe', 'No 56 No 15 alajo street kobape along shagamu expressway abeokuta ogun state Ogun Owode Egba, 110118, Ogun State, Nigeria', '0000000', 'pickup location', '7400', 'Electronics', '55 mins', '44.6 km', '2023-08-15 07:54:48', '2023-08-15 07:54:48', 'cancelled', '', 'old', 0, 'cash', 'Ogun State GI-8711ZM', 'Ogun State, Abeokuta North', 'Ogun State, Obafemi Owode', '[{\"latitude\":7.08596,\"longitude\":3.402586,\"location\":\"No 56 No 15 alajo street kobape along shagamu expressway abeokuta ogun state Ogun Owode Egba, 110118, Ogun State, Nigeria\"}]', '15 Aug 2023', '7:54 AM'),
(491, '+2348133712892', 'BO-5545DY', 42, '49FR+Q3 Abeokuta, Nigeria', '3.390162', '7.124406', '8168356170', 'John Doe', 'Jane Doe', '9,Alhaji Ibrahim Street, Gbaguru 111101, Abeokuta, Ogun State, Nigeria', '00000000', 'pickup location', '1100', 'Electronics', '11 mins', '7.1 km', '2023-08-15 13:19:08', '2023-08-15 13:19:08', 'decline', '', 'old', 0, 'cash', 'Ogun State YD-3608JP', 'Ogun State, ', 'Ogun State, Abeokuta South', '[{\"latitude\":7.175072000000001,\"longitude\":3.35027,\"location\":\"9,Alhaji Ibrahim Street, Gbaguru 111101, Abeokuta, Ogun State, Nigeria\"}]', '15 Aug 2023', '1:19 PM'),
(492, '+2348120029028', 'JZ-9881JK', 42, '49FR+Q3 Abeokuta, Nigeria', '3.3902066', '7.1244356', '8168356170', 'John Doe', 'Jane Doe', '32 Ilugun Road, 110101, Abeokuta, Ogun State, Nigeria', '000000000', 'pickup location', '1100', 'Electronics', '13 mins', '7.7 km', '2023-08-15 13:21:22', '2023-08-15 13:21:22', 'cancelled', '', 'old', 0, 'cash', 'Ogun State PJ-4989VF', 'Ogun State, ', 'Ogun State, Abeokuta South', '[{\"latitude\":7.1901254,\"longitude\":3.3542263,\"location\":\"32 Ilugun Road, 110101, Abeokuta, Ogun State, Nigeria\"}]', '15 Aug 2023', '1:21 PM'),
(493, '+2348120029028', 'JZ-9881JK', 42, '49FR+Q3 Abeokuta, Nigeria', '3.3901318', '7.1243897', '8168356170', 'John Doe', 'Jane Doe', '49GR+2C Abeokuta, Nigeria', '00000000', 'pickup location', '500', 'Electronics', '1 min', '1 m', '2023-08-15 13:26:48', '2023-08-15 13:26:48', 'cancelled', '', 'old', 0, 'cash', 'Ogun State SE-9900PC', 'Ogun State, ', 'Ogun State, ', '[{\"latitude\":7.1250624,\"longitude\":3.391086,\"location\":\"49GR+2C Abeokuta, Nigeria\"}]', '15 Aug 2023', '1:26 PM'),
(494, '+2348120029028', 'JZ-9881JK', 42, '49GR+2C Abeokuta, Nigeria', '3.3910173', '7.1250304', '8168356170', 'John Doe', 'Jane Doe', '49FR+Q3 Abeokuta, Nigeria', '00000000', 'pickup location', '500', 'Clothes', '1 min', '1 m', '2023-08-21 23:45:25', '2023-08-15 23:45:25', 'delivered', '3124', 'old', 0, 'cash', 'Ogun State ME-6794NU', 'Ogun State, ', 'Ogun State, ', '[{\"latitude\":7.1243843,\"longitude\":3.3901942,\"location\":\"49FR+Q3 Abeokuta, Nigeria\"}]', '15 Aug 2023', '11:45 PM'),
(495, '+2348120029028', 'JZ-9881JK', 42, '6FV5593G+XHR, 111101, Abeokuta, Ogun State, Nigeria', '3.3763208', '7.1550244', '8168356170', 'John Doe', 'Jane Doe', '4C43+PC, 110118, Abeokuta, Ogun State, Nigeria', '0000000', 'pickup location', '3600', 'Grocery', '58 mins', '21.8 km', '2023-08-17 18:52:01', '2023-08-17 18:52:01', 'cancelled', '', 'old', 0, 'cash', 'Ogun State ON-4518BF', 'Ogun State, ', 'Ogun State, ', '[{\"latitude\":7.1067481,\"longitude\":3.4035715,\"location\":\"4C43+PC, 110118, Abeokuta, Ogun State, Nigeria\"}]', '17 Aug 2023', '6:52 PM'),
(496, 'nil', 'nil', 41, 'Agricola, 200132, Ibadan, Oyo, Nigeria', '3.9056716', '7.4526315', '08100987793', 'Tomi', 'Grace', 'CWJ4+389, 200132, Ibadan, Oyo, Nigeria', '09047982448', 'dropoff location', '500', 'Food', '1 min', '1 m', '2023-08-21 09:19:44', '2023-08-21 09:19:44', 'new', '', 'new', 0, 'cash', 'Oyo PN-8385EN', 'Oyo, ', 'Oyo, ', '[{\"latitude\":7.430169599999999,\"longitude\":3.9058738,\"location\":\"CWJ4+389, 200132, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '9:19 AM'),
(497, '+2348133712892', 'BO-5545DY', 41, 'Agricola, 200132, Ibadan, Oyo, Nigeria', '3.9056716', '7.4526315', '08069516526', 'Tomi', 'Grace', 'CWJ4+389, 200132, Ibadan, Oyo, Nigeria', '9047982448', 'dropoff location', '500', 'Food', '1 min', '1 m', '2023-08-21 09:28:10', '2023-08-21 09:28:10', 'decline', '', 'old', 0, 'cash', 'Oyo HZ-1549IK', 'Oyo, ', 'Oyo, ', '[{\"latitude\":7.430169599999999,\"longitude\":3.9058738,\"location\":\"CWJ4+389, 200132, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '9:28 AM'),
(498, '+2348133712892', 'BO-5545DY', 41, 'FV4V+RX8, 200132, Ibadan, Oyo, Nigeria', '3.8949502', '7.4570323', '08100687793', 'Joke', 'Grace', '200132, Ibadan, Oyo, Nigeria', '08133712892', 'dropoff location', '500', 'Pastries', '1 min', '1 m', '2023-08-21 09:31:24', '2023-08-21 09:31:24', 'decline', '', 'old', 0, 'cash', 'Oyo DS-9612KK', 'Oyo, ', 'Oyo, ', '[{\"latitude\":7.444538799999997,\"longitude\":3.900064,\"location\":\"200132, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '9:31 AM'),
(499, 'nil', 'nil', 41, 'CWQ5+M8M, 200132, Ibadan, Oyo, Nigeria', '3.9082986', '7.4392031', '09024250138', 'Tomi', 'Grace', '1 Akinsehinwa Street, 200285, Ibadan, Oyo, Nigeria', '09047982448', 'dropoff location', '1800', 'Food', '28 mins', '11.2 km', '2023-08-21 09:40:18', '2023-08-21 09:40:18', 'new', '', 'new', 0, 'cash', 'Oyo VN-8126UH', 'Oyo, Akinyele', 'Oyo, Ibadan North', '[{\"latitude\":7.418864999999999,\"longitude\":3.913949999999999,\"location\":\"1 Akinsehinwa Street, 200285, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '9:40 AM'),
(500, 'nil', 'nil', 41, 'CWQ5+M8M, 200132, Ibadan, Oyo, Nigeria', '3.9082986', '7.4392031', '09024250138', 'Faith', 'Grace', 'No 37 Awolowo Ave, Old Bodija 200285, Ibadan, Oyo, Nigeria', '09047982448', 'dropoff location', '1800', 'Clothes', '29 mins', '11.5 km', '2023-08-21 09:43:39', '2023-08-21 09:43:39', 'new', '', 'new', 0, 'cash', 'Oyo TH-5449PN', 'Oyo, Akinyele', 'Oyo, Ibadan North', '[{\"latitude\":7.4171826,\"longitude\":3.9023885,\"location\":\"No 37 Awolowo Ave, Old Bodija 200285, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '9:43 AM'),
(501, 'nil', 'nil', 41, '3 Fadeyi St, Agbowo 200213, Ibadan, Oyo, Nigeria', '3.9085573', '7.4392219', '09024250138', 'Faith', 'Grace', '10 Elerumoke Street Oyo New Bodija, 200285, Ibadan, Oyo, Nigeria', '09047982448', 'pickup location', '1300', 'Food', '22 mins', '9.8 km', '2023-08-21 09:48:05', '2023-08-21 09:48:05', 'new', '', 'new', 0, 'cash', 'Oyo XL-0664DE', 'Oyo, Akinyele', 'Oyo, Ibadan North West', '[{\"latitude\":7.4189517,\"longitude\":3.914069099999999,\"location\":\"10 Elerumoke Street Oyo New Bodija, 200285, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '9:48 AM'),
(502, '+2348133712892', 'BO-5545DY', 24, 'Oduduwa Road, 200132, Ibadan, Oyo, Nigeria', '3.900317', '7.44331', '9010197681', 'Goodluck', 'Ken', 'CWP5+QCF, 200132, Ibadan, Oyo, Nigeria', '07039193048', 'dropoff location', '1500', 'Food', '33 mins', '10.8 km', '2023-08-21 12:11:57', '2023-08-21 12:11:57', 'cancelled', '8924', 'old', 0, 'cash', 'Oyo WI-5830IU', 'Oyo, Akinyele', 'Oyo, ', '[{\"latitude\":7.436945900000001,\"longitude\":3.908538100000001,\"location\":\"CWP5+QCF, 200132, Ibadan, Oyo, Nigeria\"}]', '21 Aug 2023', '12:11 PM'),
(503, '+2348032454342', 'YL-8326DG', 41, '1, Entrance Street, Sunnyvale gate, 900107, Abuja, Federal Capital Territory, Nigeria', '7.4458158', '8.9844968', '09016492635', 'Goodluck', 'Grace', 'Okonni Cl, 900107, Abuja, Federal Capital Territory, Nigeria', '07014997381', 'dropoff location', '2400', 'Electronics', '26 mins', '15.5 km', '2023-08-22 12:43:12', '2023-08-22 12:43:12', 'new', '', 'new', 0, 'cash', 'FCT PG-3610KS', 'FCT, Abuja Municipal Area Council', 'FCT, Abuja Municipal Area Council', '[{\"latitude\":8.9822978,\"longitude\":7.4392105,\"location\":\"Okonni Cl, 900107, Abuja, Federal Capital Territory, Nigeria\"}]', '22 Aug 2023', '12:43 PM'),
(504, '+2347045195615', 'WC-3805UK', 41, '1, Entrance Street, Sunnyvale gate, 900107, Abuja, Federal Capital Territory, Nigeria', '7.4458158', '8.9844968', '07014997381', 'Goodluck', 'Grace', 'Okonni Cl, 900107, Abuja, Federal Capital Territory, Nigeria', '08133712892', 'dropoff location', '2400', 'Drinks', '26 mins', '15.5 km', '2023-08-22 12:46:58', '2023-08-22 12:46:58', 'cancelled', '', 'old', 0, 'cash', 'FCT JA-5769GC', 'FCT, Abuja Municipal Area Council', 'FCT, Abuja Municipal Area Council', '[{\"latitude\":8.9822978,\"longitude\":7.4392105,\"location\":\"Okonni Cl, 900107, Abuja, Federal Capital Territory, Nigeria\"}]', '22 Aug 2023', '12:46 PM'),
(505, '+2348120029028', 'JZ-9881JK', 42, 'Sokenu Road Ogun, Erunbe 110101, Abeokuta, Ogun State, Nigeria', '3.352974', '7.1515', '8168356170', 'John Doe', 'Jane Doe', '5C48+8F Akingbala, Nigeria', '0000000', 'pickup location', '1500', 'Electronics', '24 mins', '10.0 km', '2023-08-22 23:44:53', '2023-08-22 23:44:53', 'accepted', '', 'new', 0, 'cash', 'Ogun State CF-3328RA', 'Ogun State, Abeokuta South', 'Ogun State, ', '[{\"latitude\":7.1558492,\"longitude\":3.4161871,\"location\":\"5C48+8F Akingbala, Nigeria\"}]', '22 Aug 2023', '11:44 PM'),
(506, '+2347045195615', 'WC-3805UK', 43, 'CPWX+46 Iwaro-Oka, Nigeria', '5.7480597', '7.4453427', '8119924499', 'Tosin', 'Tops', 'CPWW+6W Iwaro-Oka, Nigeria', '08133712892', 'dropoff location', '500', 'Drinks', '1 min', '1 m', '2023-09-12 17:35:48', '2023-09-12 17:35:48', 'new', '', 'new', 0, 'cash', 'Ondo HM-8132UN', 'Ondo, Akoko South West', 'Ondo, Akoko South West', '[{\"latitude\":7.4455564,\"longitude\":5.747348,\"location\":\"CPWW+6W Iwaro-Oka, Nigeria\"}]', '12 Sep 2023', '5:35 PM'),
(507, '+2348133712892', 'BO-5545DY', 43, '105, Agbadotun, 342106, Iwaro-Oka, Ondo, Nigeria', '5.7494711', '7.4450905', '8119924499', 'Tosin', 'Tope', '12, Agbadotun, 342106, Iwaro-Oka, Ondo, Nigeria', '08133712892', 'dropoff location', '500', 'Grocery', '1 min', '1 m', '2023-09-12 17:38:45', '2023-09-12 17:38:45', 'new', '', 'new', 0, 'cash', 'Ondo QL-4851QZ', 'Ondo, Akoko South West', 'Ondo, Akoko South West', '[{\"latitude\":7.443939400000001,\"longitude\":5.7546798,\"location\":\"12, Agbadotun, 342106, Iwaro-Oka, Ondo, Nigeria\"}]', '12 Sep 2023', '5:38 PM'),
(508, 'nil', 'nil', 43, 'General hospital Road, CQV3+JFH, Ayepe, 342106, Iwaro-Oka, Ondo, Nigeria', '5.753739', '7.4440587', '8119924499', 'tosin', 'Tope', 'CQW5+22G, St clara street, 342106, Iwaro-Oka, Ondo, Nigeria', '08133712892', 'dropoff location', '500', 'Food', '5 mins', '1.2 km', '2023-09-12 17:49:04', '2023-09-12 17:49:04', 'new', '', 'new', 0, 'cash', 'Ondo JM-8938LF', 'Ondo, Akoko South West', 'Ondo, Akoko South West', '[{\"latitude\":7.4450641,\"longitude\":5.757585300000001,\"location\":\"CQW5+22G, St clara street, 342106, Iwaro-Oka, Ondo, Nigeria\"}]', '12 Sep 2023', '5:49 PM');

-- --------------------------------------------------------

--
-- Table structure for table `current_balance`
--

CREATE TABLE `current_balance` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `current_balance`
--

INSERT INTO `current_balance` (`id`, `rider_id`, `balance`, `created_at`, `updated_at`) VALUES
(1, '408652', '83040', '2023-03-10 13:51:52', '2023-03-10 13:51:52'),
(2, 'XT-6297DG', '1360', '2023-04-04 16:16:38', '2023-04-04 16:16:38'),
(3, 'VM-9288NJ', '4165', '2023-04-05 10:29:09', '2023-04-05 10:29:09'),
(4, 'JD-0449IW', '4250', '2023-04-22 11:46:00', '2023-04-22 11:46:00'),
(5, 'LB-2998QG', '1275', '2023-07-14 20:18:29', '2023-07-14 20:18:29'),
(6, 'OX-3402ZX', '425', '2023-07-28 12:38:48', '2023-07-28 12:38:48'),
(7, 'YL-8326DG', '16575', '2023-08-02 11:25:52', '2023-08-02 11:25:52'),
(8, 'JZ-9881JK', '425', '2023-08-16 20:45:22', '2023-08-16 20:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `vendor` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `verification_status` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fname`, `lname`, `picture`, `phone`, `email`, `vendor`, `password`, `verification_code`, `verification_status`, `created_at`, `updated_at`) VALUES
(35, 'Joy Omowa ', '', '', '08174360124', 'jyakinola@yahoo.com', 'no', 'KzpGJVk5JjVOO1ZVTz1WJGAKYAo=', '', '0', '2023-06-04 20:02:56', '2023-06-04 20:02:56'),
(30, 'Seiyefa Olive', '', '', '7045195615', 'goodluckseiyefa1@gmail.com', 'no', 'LDMmRVY6NllHPFcxTztGNFEKYAo=', '', '0', '2023-03-22 12:43:59', '2023-03-22 12:43:59'),
(29, 'Onyebuolise Elvis', '', '', '8117715620', 'onyebuoliseelvis@gmail.com', 'yes', 'KDE2UVY6NyxRLENEYApgCg==', '', '0', '2023-02-24 12:57:12', '2023-02-24 12:57:12'),
(28, 'Cyril Duke', '', '', '8169102957', 'dukecyril@yahoo.com', 'no', 'MjBXRU49JkFJODQhRjlGRU87RjxTLiM0UwpgCg==', '', '0', '2023-02-23 20:57:20', '2023-02-23 20:57:20'),
(27, 'Andy Kay', '', '', '507442944', 'andy67km@gmail.com', 'no', 'KTM2NUw7VjFZMCM4VwpgCg==', '', '0', '2023-02-14 01:19:55', '2023-02-14 01:19:55'),
(26, 'Elvis', '', '', '8148537452', 'onyebuoliseelvis@gmail.com', 'yes', 'KCwzKFMtIzRWMFRAYApgCg==', '', '0', '2023-02-03 14:09:46', '2023-02-03 14:09:46'),
(25, 'Andy Kay', '', '', '07045195615', 'andy67km@gmail.com', 'yes', 'KTM2NUw7VjFZMCM8VwpgCg==', '', '0', '2023-02-01 11:55:48', '2023-02-01 11:55:48'),
(24, 'Seiyefa Goodluck ', '', '', '9010197681', 'goodluckseiyefa1@gmail.com', 'no', 'LDMmRVY6NllHPFcxTztGNFEKYAo=', '', '0', '2023-01-24 09:52:27', '2023-01-24 09:52:27'),
(23, 'andyk', '', '', '0507442944', 'andy67km@gamil.com', 'no', 'KTM2NUw7VjFZMCM8VwpgCg==', '', '0', '2023-01-21 19:11:31', '2023-01-21 19:11:31'),
(22, 'Andyk', '', '', '0558118520', 'andy67km@gmail.com', 'no', 'KTM2NUw7VjFZMCM8VwpgCg==', '', '0', '2023-01-21 15:58:45', '2023-01-21 15:58:45'),
(21, 'Okpongu Tam', '', '', '08038474318', 'xtreemsilentl+1@gmail.com', 'no', 'KCwzKFMtIzRWLVNAYApgCg==', '', '0', '2023-01-17 19:55:32', '2023-01-17 19:55:32'),
(20, 'Okpongu Tamarautukpamobowei', '', '', '08038474317', 'xtreemsilentl@gmail.com', 'vendor', 'KCwzKFMtIzRWLVNAYApgCg==', '', '0', '2023-01-17 19:34:59', '2023-01-17 19:34:59'),
(19, 'agaga robinson', '', '', '08032454342', 'robinsonagaga@gmail.com', 'yes', 'IywzKFMKYAo=', '', '0', '2023-01-16 16:50:03', '2023-01-16 16:50:03'),
(31, 'Robinson Agaga ', '', '', '8032454342', 'robinsonagaga@yahoo.com', 'no', 'KCwzKFMtIzRWLVNAYApgCg==', '', '0', '2023-03-24 18:49:35', '2023-03-24 18:49:35'),
(32, 'LeBron Kofi Mensah ', '', '', '8139083328', 'jude.iwuoha@yahoo.com', 'no', 'KCxDYFMsIyhQLFNgYApgCg==', '', '0', '2023-03-31 11:03:01', '2023-03-31 11:03:01'),
(33, 'Andy Kay', '', '', '8141983015', 'andy67km@gmail.com', 'no', 'KDNWTUE+MllDO1ZUYApgCg==', '', '0', '2023-04-15 14:09:53', '2023-04-15 14:09:53'),
(34, 'Paradise Kolosi ', '', '', '7069581571', 'robinsonagaga@gmail.com', 'no', 'KCwzKFMtIzRWLVNAYApgCg==', '', '0', '2023-04-20 05:38:17', '2023-04-20 05:38:17'),
(36, 'Vpaul Vi', '', '', '9023137444', 'pauleke65+troopavendor@gmail.com', 'yes', 'KjQmJVM8Vz1PPEYxYCwwYGAKYAo=', '', '0', '2023-06-28 19:36:31', '2023-06-28 19:36:31'),
(37, 'Annapeace', '', '', '08132213691', 'peaceoshoremor@gmail.com', 'yes', 'KzI3LVM4NilFOyZRQSwzKGAKYAo=', '', '0', '2023-07-25 22:33:55', '2023-07-25 22:33:55'),
(38, 'Andyk', '', '', '558118520', 'andy67km@gmail.com', 'no', 'KTs2NUw7VjFZLDMoUwpgCg==', '', '0', '2023-07-28 14:30:35', '2023-07-28 14:30:35'),
(39, 'Magic Vendor', '', '', '9085599265', 'paulimoke@yahoo.com', 'yes', 'KDwmJVM8Vz1PPEYwYApgCg==', '', '0', '2023-08-01 12:53:44', '2023-08-01 12:53:44'),
(40, 'Victor Olusoji', '', '', '8120029028', 'holusojivhictor@gmail.com', 'no', 'LDUmNVM9JSFBPFctVztXKUQKYAo=', '', '0', '2023-08-10 19:13:15', '2023-08-10 19:13:15'),
(41, 'Temitope yusuf', '', '', '9047982448', 'temmietee16@gmail.com', 'yes', 'KDkmJU06NlFPOyYkYApgCg==', '', '0', '2023-08-11 12:40:45', '2023-08-11 12:40:45'),
(42, 'Victor Olusoji', '', '', '8168356170', 'holusojivhictor@gmail.com', 'no', 'LDUmNVM9JSFBPFctVztXKUQKYAo=', '', '0', '2023-08-14 20:13:11', '2023-08-14 20:13:11'),
(43, 'Tosin Boolu', '', '', '8119924499', 'Oluwatosin@1', 'no', 'LDNWUVU9ViVUO1ctSTtEYFEKYAo=', '', '0', '2023-09-12 17:32:48', '2023-09-12 17:32:48');

-- --------------------------------------------------------

--
-- Table structure for table `customer_rider`
--

CREATE TABLE `customer_rider` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `riderid` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_rider`
--

INSERT INTO `customer_rider` (`id`, `customer_id`, `riderid`, `status`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 1, '732846', 'new', '', '2023-1-7 16:39:08', '2023-1-7 16:39:08'),
(2, 20, '408652', 'new', '134', '2023-02-09 18:06:23', '2023-02-09 18:06:23'),
(3, 20, '408652', 'new', '135', '2023-02-09 18:06:24', '2023-02-09 18:06:24'),
(4, 20, '408652', 'new', '140', '2023-02-10 16:54:19', '2023-02-10 16:54:19'),
(5, 20, '408652', 'new', '141', '2023-02-10 16:54:20', '2023-02-10 16:54:20'),
(6, 20, '408652', 'new', '146', '2023-02-10 17:05:16', '2023-02-10 17:05:16'),
(14, 31, '408652', 'new', '269', '2023-03-26 21:17:57', '2023-03-26 21:17:57'),
(13, 1, '276543', 'new', '217', '2023-03-22 17:25:00', '2023-03-22 17:25:00'),
(12, 1, '408652', 'new', '216', '2023-03-22 17:22:54', '2023-03-22 17:22:54'),
(11, 1, '408652', 'old', '176', '2023-02-17 17:50:24', '2023-02-17 17:50:24'),
(15, 31, 'VM-9288NJ', 'new', '273', '2023-03-27 11:49:19', '2023-03-27 11:49:19'),
(16, 31, 'VM-9288NJ', 'new', '274', '2023-03-27 12:28:19', '2023-03-27 12:28:19'),
(17, 31, 'VM-9288NJ', 'new', '275', '2023-03-27 14:53:11', '2023-03-27 14:53:11'),
(18, 29, 'SB-4579QD', 'new', '276', '2023-03-27 15:47:17', '2023-03-27 15:47:17'),
(19, 31, 'VM-9288NJ', 'new', '279', '2023-03-31 11:34:12', '2023-03-31 11:34:12'),
(20, 9059040, 'AK-0770SE', 'new', '281', '2023-03-31 13:44:56', '2023-03-31 13:44:56'),
(21, 31, 'AK-0770SE', 'new', '282', '2023-03-31 13:47:21', '2023-03-31 13:47:21'),
(22, 29, 'AK-0770SE', 'new', '283', '2023-03-31 15:32:40', '2023-03-31 15:32:40'),
(23, 29, 'DZ-6190UU', 'new', '301', '2023-04-03 15:20:09', '2023-04-03 15:20:09'),
(24, 20, 'PF-2984JN', 'new', '307', '2023-04-03 21:15:21', '2023-04-03 21:15:21'),
(25, 29, 'XT-6297DG', 'old', '313', '2023-04-04 16:08:44', '2023-04-04 16:08:44'),
(26, 29, 'XT-6297DG', 'old', '314', '2023-04-05 08:48:58', '2023-04-05 08:48:58'),
(27, 19, 'VM-9288NJ', 'old', '317', '2023-04-05 10:23:18', '2023-04-05 10:23:18'),
(28, 19, 'VM-9288NJ', 'old', '318', '2023-04-05 10:43:28', '2023-04-05 10:43:28'),
(29, 19, 'VM-9288NJ', 'new', '319', '2023-04-05 18:55:34', '2023-04-05 18:55:34'),
(30, 19, 'VM-9288NJ', 'new', '320', '2023-04-05 18:55:38', '2023-04-05 18:55:38'),
(31, 29, 'VM-9288NJ', 'new', '324', '2023-04-08 11:50:07', '2023-04-08 11:50:07'),
(32, 29, 'VM-9288NJ', 'new', '325', '2023-04-08 11:50:10', '2023-04-08 11:50:10'),
(33, 29, 'VM-9288NJ', 'new', '328', '2023-04-08 13:01:20', '2023-04-08 13:01:20'),
(34, 29, 'VM-9288NJ', 'new', '333', '2023-04-08 13:13:20', '2023-04-08 13:13:20'),
(35, 29, 'VM-9288NJ', 'new', '334', '2023-04-08 14:09:39', '2023-04-08 14:09:39'),
(36, 29, 'VM-9288NJ', 'new', '335', '2023-04-08 14:32:29', '2023-04-08 14:32:29'),
(37, 19, 'VM-9288NJ', 'new', '336', '2023-04-08 20:15:27', '2023-04-08 20:15:27'),
(38, 19, 'VM-9288NJ', 'new', '337', '2023-04-08 20:15:28', '2023-04-08 20:15:28'),
(39, 29, 'VM-9288NJ', 'new', '346', '2023-04-08 21:59:36', '2023-04-08 21:59:36'),
(40, 29, 'VM-9288NJ', 'new', '354', '2023-04-08 22:08:55', '2023-04-08 22:08:55'),
(41, 29, 'VM-9288NJ', 'new', '361', '2023-04-08 22:47:00', '2023-04-08 22:47:00'),
(42, 29, 'VM-9288NJ', 'new', '399', '2023-04-09 00:15:19', '2023-04-09 00:15:19'),
(43, 29, 'VM-9288NJ', 'new', '400', '2023-04-09 00:49:14', '2023-04-09 00:49:14'),
(44, 19, 'VM-9288NJ', 'new', '407', '2023-04-09 20:36:16', '2023-04-09 20:36:16'),
(45, 19, 'VM-9288NJ', 'new', '408', '2023-04-09 20:45:25', '2023-04-09 20:45:25'),
(46, 19, 'VM-9288NJ', 'new', '409', '2023-04-09 20:48:02', '2023-04-09 20:48:02'),
(47, 33, 'VM-9288NJ', 'new', '410', '2023-04-15 14:29:32', '2023-04-15 14:29:32'),
(48, 34, 'VM-9288NJ', 'old', '411', '2023-04-20 05:43:52', '2023-04-20 05:43:52'),
(49, 28, 'JD-0449IW', 'old', '412', '2023-04-22 11:26:24', '2023-04-22 11:26:24'),
(50, 28, 'JD-0449IW', 'old', '413', '2023-04-22 11:56:42', '2023-04-22 11:56:42'),
(51, 28, 'JD-0449IW', 'old', '414', '2023-04-22 12:13:06', '2023-04-22 12:13:06'),
(52, 28, 'JD-0449IW', 'old', '415', '2023-04-24 11:36:51', '2023-04-24 11:36:51'),
(53, 28, 'JD-0449IW', 'old', '416', '2023-04-24 12:41:26', '2023-04-24 12:41:26'),
(54, 28, 'JD-0449IW', 'new', '417', '2023-04-24 12:53:50', '2023-04-24 12:53:50'),
(55, 28, 'VM-9288NJ', 'old', '418', '2023-05-06 12:12:57', '2023-05-06 12:12:57'),
(56, 28, 'JD-0449IW', 'new', '419', '2023-05-07 18:27:06', '2023-05-07 18:27:06'),
(57, 29, 'AK-0770SE', 'new', '420', '2023-05-09 10:25:01', '2023-05-09 10:25:01'),
(58, 29, 'VM-9288NJ', 'new', '421', '2023-05-09 13:08:30', '2023-05-09 13:08:30'),
(59, 29, 'VM-9288NJ', 'new', '422', '2023-05-09 13:13:34', '2023-05-09 13:13:34'),
(60, 29, 'VM-9288NJ', 'new', '423', '2023-05-09 13:29:12', '2023-05-09 13:29:12'),
(61, 28, 'VM-9288NJ', 'new', '424', '2023-05-09 13:32:49', '2023-05-09 13:32:49'),
(62, 28, 'JD-0449IW', 'old', '425', '2023-05-09 13:41:25', '2023-05-09 13:41:25'),
(63, 28, 'JD-0449IW', 'new', '426', '2023-05-10 08:26:35', '2023-05-10 08:26:35'),
(64, 28, 'JD-0449IW', 'new', '427', '2023-05-10 08:36:56', '2023-05-10 08:36:56'),
(65, 28, 'JD-0449IW', 'new', '428', '2023-05-10 08:42:48', '2023-05-10 08:42:48'),
(66, 20, 'JD-0449IW', 'new', '429', '2023-05-10 08:52:32', '2023-05-10 08:52:32'),
(67, 20, 'JD-0449IW', 'new', '430', '2023-05-10 08:56:35', '2023-05-10 08:56:35'),
(68, 20, 'JD-0449IW', 'new', '431', '2023-05-10 09:03:02', '2023-05-10 09:03:02'),
(69, 20, 'JD-0449IW', 'new', '432', '2023-05-10 09:10:30', '2023-05-10 09:10:30'),
(70, 20, 'JD-0449IW', 'new', '433', '2023-05-10 12:03:17', '2023-05-10 12:03:17'),
(71, 20, 'JD-0449IW', 'new', '434', '2023-05-10 12:11:10', '2023-05-10 12:11:10'),
(72, 20, 'JD-0449IW', 'new', '435', '2023-05-10 12:12:51', '2023-05-10 12:12:51'),
(73, 20, 'JD-0449IW', 'new', '436', '2023-05-10 12:26:20', '2023-05-10 12:26:20'),
(74, 20, 'JD-0449IW', 'new', '437', '2023-05-10 12:41:48', '2023-05-10 12:41:48'),
(75, 20, 'JD-0449IW', 'new', '438', '2023-05-10 13:30:48', '2023-05-10 13:30:48'),
(76, 20, 'JD-0449IW', 'new', '439', '2023-05-10 13:32:55', '2023-05-10 13:32:55'),
(77, 20, 'JD-0449IW', 'new', '441', '2023-05-10 13:47:40', '2023-05-10 13:47:40'),
(78, 20, 'JD-0449IW', 'new', '442', '2023-05-10 13:49:25', '2023-05-10 13:49:25'),
(79, 30, 'AK-0770SE', 'new', '443', '2023-05-10 18:21:18', '2023-05-10 18:21:18'),
(80, 19, '408652', 'old', '444', '2023-05-11 22:22:42', '2023-05-11 22:22:42'),
(81, 19, 'VM-9288NJ', 'new', '445', '2023-05-12 01:28:09', '2023-05-12 01:28:09'),
(82, 35, 'AK-0770SE', 'new', '448', '2023-06-04 20:06:28', '2023-06-04 20:06:28'),
(83, 30, 'AK-0770SE', 'new', '449', '2023-07-26 09:00:49', '2023-07-26 09:00:49'),
(84, 30, 'AK-0770SE', 'new', '450', '2023-07-26 11:28:16', '2023-07-26 11:28:16'),
(85, 20, 'AK-0770SE', 'new', '451', '2023-07-26 11:59:04', '2023-07-26 11:59:04'),
(86, 20, 'AK-0770SE', 'new', '452', '2023-07-26 12:01:51', '2023-07-26 12:01:51'),
(87, 20, 'AK-0770SE', 'new', '453', '2023-07-26 12:02:52', '2023-07-26 12:02:52'),
(88, 20, 'AK-0770SE', 'new', '454', '2023-07-26 12:04:16', '2023-07-26 12:04:16'),
(89, 30, 'AK-0770SE', 'new', '455', '2023-07-27 12:31:30', '2023-07-27 12:31:30'),
(90, 30, 'AK-0770SE', 'new', '456', '2023-07-27 12:40:57', '2023-07-27 12:40:57'),
(91, 30, 'AK-0770SE', 'new', '457', '2023-07-27 12:48:43', '2023-07-27 12:48:43'),
(92, 20, 'AK-0770SE', 'new', '458', '2023-07-27 13:05:47', '2023-07-27 13:05:47'),
(93, 30, 'AK-0770SE', 'new', '459', '2023-07-27 13:24:59', '2023-07-27 13:24:59'),
(94, 30, 'AK-0770SE', 'new', '460', '2023-07-27 13:51:36', '2023-07-27 13:51:36'),
(95, 30, 'AK-0770SE', 'new', '461', '2023-07-27 14:04:57', '2023-07-27 14:04:57'),
(96, 29, 'AK-0770SE', 'new', '462', '2023-07-27 14:43:47', '2023-07-27 14:43:47'),
(97, 29, 'JD-0449IW', 'new', '463', '2023-07-27 14:51:16', '2023-07-27 14:51:16'),
(98, 29, 'JD-0449IW', 'new', '465', '2023-07-27 14:55:52', '2023-07-27 14:55:52'),
(99, 30, 'JD-0449IW', 'new', '466', '2023-07-27 18:16:30', '2023-07-27 18:16:30'),
(100, 30, 'OX-3402ZX', 'old', '467', '2023-07-28 12:36:02', '2023-07-28 12:36:02'),
(101, 30, 'JH-3936KY', 'new', '470', '2023-07-29 11:21:36', '2023-07-29 11:21:36'),
(102, 39, 'YL-8326DG', 'old', '474', '2023-08-02 11:21:53', '2023-08-02 11:21:53'),
(103, 39, 'YL-8326DG', 'old', '475', '2023-08-05 12:16:55', '2023-08-05 12:16:55'),
(104, 39, 'YL-8326DG', 'old', '476', '2023-08-05 14:20:28', '2023-08-05 14:20:28'),
(105, 20, 'YL-8326DG', 'new', '477', '2023-08-08 15:16:05', '2023-08-08 15:16:05'),
(106, 24, 'BO-5545DY', 'new', '480', '2023-08-11 10:38:50', '2023-08-11 10:38:50'),
(107, 24, 'BO-5545DY', 'new', '481', '2023-08-11 10:45:28', '2023-08-11 10:45:28'),
(108, 41, 'BO-5545DY', 'new', '482', '2023-08-11 12:43:51', '2023-08-11 12:43:51'),
(109, 41, 'BO-5545DY', 'new', '483', '2023-08-11 12:45:44', '2023-08-11 12:45:44'),
(110, 39, 'YL-8326DG', 'old', '485', '2023-08-11 15:02:37', '2023-08-11 15:02:37'),
(111, 42, 'JZ-9881JK', 'new', '488', '2023-08-14 23:01:36', '2023-08-14 23:01:36'),
(112, 42, 'JZ-9881JK', 'new', '489', '2023-08-14 23:29:24', '2023-08-14 23:29:24'),
(113, 42, 'JZ-9881JK', 'new', '490', '2023-08-15 07:54:49', '2023-08-15 07:54:49'),
(114, 42, 'BO-5545DY', 'new', '491', '2023-08-15 13:19:09', '2023-08-15 13:19:09'),
(115, 42, 'JZ-9881JK', 'new', '492', '2023-08-15 13:21:23', '2023-08-15 13:21:23'),
(116, 42, 'JZ-9881JK', 'new', '493', '2023-08-15 13:26:49', '2023-08-15 13:26:49'),
(117, 42, 'JZ-9881JK', 'old', '494', '2023-08-15 23:45:26', '2023-08-15 23:45:26'),
(118, 42, 'JZ-9881JK', 'new', '495', '2023-08-17 18:52:02', '2023-08-17 18:52:02'),
(119, 41, 'BO-5545DY', 'new', '497', '2023-08-21 09:28:11', '2023-08-21 09:28:11'),
(120, 41, 'BO-5545DY', 'new', '498', '2023-08-21 09:31:25', '2023-08-21 09:31:25'),
(121, 24, 'BO-5545DY', 'new', '502', '2023-08-21 12:11:58', '2023-08-21 12:11:58'),
(122, 41, 'YL-8326DG', 'new', '503', '2023-08-22 12:43:13', '2023-08-22 12:43:13'),
(123, 41, 'WC-3805UK', 'new', '504', '2023-08-22 12:46:59', '2023-08-22 12:46:59'),
(124, 42, 'JZ-9881JK', 'new', '505', '2023-08-22 23:44:53', '2023-08-22 23:44:53'),
(125, 43, 'WC-3805UK', 'new', '506', '2023-09-12 17:35:49', '2023-09-12 17:35:49'),
(126, 43, 'BO-5545DY', 'new', '507', '2023-09-12 17:38:46', '2023-09-12 17:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feature_request`
--

CREATE TABLE `feature_request` (
  `id` int(11) NOT NULL,
  `request_type` varchar(200) NOT NULL,
  `request_summary` varchar(600) NOT NULL,
  `request_description` text NOT NULL,
  `userID` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feature_request`
--

INSERT INTO `feature_request` (`id`, `request_type`, `request_summary`, `request_description`, `userID`, `created_at`, `updated_at`) VALUES
(1, 'error', 'yggu', 'yftfytf', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `forgotpassword`
--

CREATE TABLE `forgotpassword` (
  `id` int(11) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `verify_code` varchar(200) NOT NULL,
  `verify_status` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `forgotpassword`
--

INSERT INTO `forgotpassword` (`id`, `phone`, `verify_code`, `verify_status`, `created_at`, `updated_at`) VALUES
(6, '08032454342', '0869', 1, '2023-01-20 21:15:45', '2023-01-20 21:15:45'),
(5, '08032454342', '3678', 1, '2023-01-19 09:53:19', '2023-01-19 09:53:19'),
(7, '08038474317', '4093', 0, '2023-01-21 05:32:01', '2023-01-21 05:32:01'),
(8, '08038474317', '7690', 0, '2023-01-21 05:35:57', '2023-01-21 05:35:57'),
(9, '08038474317', '4273', 0, '2023-01-21 05:36:29', '2023-01-21 05:36:29'),
(10, '08038474317', '7238', 0, '2023-01-21 05:36:38', '2023-01-21 05:36:38'),
(11, '08038474317', '0246', 0, '2023-01-21 05:36:54', '2023-01-21 05:36:54'),
(12, '08038474317', '9123', 0, '2023-01-21 05:36:56', '2023-01-21 05:36:56'),
(13, '08038474317', '2158', 0, '2023-01-21 05:37:02', '2023-01-21 05:37:02'),
(14, '08038474317', '7865', 0, '2023-01-21 05:37:05', '2023-01-21 05:37:05'),
(15, '08038474317', '0287', 0, '2023-01-21 05:37:09', '2023-01-21 05:37:09'),
(16, '08038474317', '5396', 0, '2023-01-21 05:37:28', '2023-01-21 05:37:28'),
(17, '08038474317', '1792', 0, '2023-01-21 05:38:16', '2023-01-21 05:38:16'),
(18, '08038474317', '9581', 0, '2023-01-21 05:38:37', '2023-01-21 05:38:37'),
(19, '08038474317', '2576', 0, '2023-01-21 05:42:17', '2023-01-21 05:42:17'),
(20, '08038474317', '9305', 0, '2023-01-21 05:42:49', '2023-01-21 05:42:49'),
(21, '08038474317', '2036', 0, '2023-01-21 05:42:53', '2023-01-21 05:42:53'),
(22, '08038474317', '3574', 0, '2023-01-21 05:44:13', '2023-01-21 05:44:13'),
(23, '08038474317', '3825', 0, '2023-01-21 05:44:24', '2023-01-21 05:44:24'),
(24, '08038474317', '1750', 0, '2023-01-21 05:44:39', '2023-01-21 05:44:39'),
(25, '08038474317', '7186', 0, '2023-01-21 05:44:59', '2023-01-21 05:44:59'),
(26, '08038474317', '7309', 0, '2023-01-21 05:45:11', '2023-01-21 05:45:11'),
(27, '08038474317', '0956', 0, '2023-01-21 05:45:27', '2023-01-21 05:45:27'),
(28, '08038474317', '3501', 1, '2023-01-21 05:47:55', '2023-01-21 05:47:55'),
(29, '+2348032454342', '8670', 0, '2023-02-05 20:51:56', '2023-02-05 20:51:56'),
(30, '+2348032454342', '0835', 0, '2023-02-05 20:54:32', '2023-02-05 20:54:32'),
(31, '+2348032454342', '3184', 0, '2023-02-05 21:01:35', '2023-02-05 21:01:35'),
(32, '+2348032454342', '5309', 0, '2023-02-05 21:11:32', '2023-02-05 21:11:32'),
(33, '+2348032454342', '3641', 0, '2023-02-05 21:17:39', '2023-02-05 21:17:39'),
(34, '+2348032454342', '0326', 1, '2023-02-05 21:39:34', '2023-02-05 21:39:34'),
(35, '+2348032454342', '6384', 1, '2023-02-05 21:44:04', '2023-02-05 21:44:04'),
(36, '+2348032454342', '2641', 1, '2023-02-05 21:48:10', '2023-02-05 21:48:10'),
(37, '+2348032454342', '8620', 1, '2023-02-05 21:55:18', '2023-02-05 21:55:18'),
(38, '+2348032454342', '9418', 1, '2023-02-05 21:59:14', '2023-02-05 21:59:14'),
(39, '+2348032454342', '8247', 1, '2023-02-10 15:56:45', '2023-02-10 15:56:45'),
(40, '+2349010197681', '9247', 0, '2023-02-10 17:48:47', '2023-02-10 17:48:47'),
(41, '+2349010197681', '9750', 1, '2023-02-10 17:57:39', '2023-02-10 17:57:39'),
(42, '08038474317', '4839', 0, '2023-02-18 17:44:04', '2023-02-18 17:44:04'),
(43, '08038474317', '5489', 0, '2023-02-18 17:48:21', '2023-02-18 17:48:21'),
(44, '+2348032454342', '0514', 0, '2023-02-18 22:33:45', '2023-02-18 22:33:45'),
(45, '+2348032454342', '8103', 1, '2023-02-18 22:33:46', '2023-02-18 22:33:46'),
(46, '08038474317', '9325', 0, '2023-02-19 06:31:24', '2023-02-19 06:31:24'),
(47, '08038474317', '6593', 0, '2023-02-19 12:46:57', '2023-02-19 12:46:57'),
(48, '08038474317', '9521', 0, '2023-02-19 13:11:33', '2023-02-19 13:11:33'),
(49, '08038474317', '6581', 1, '2023-02-19 13:12:13', '2023-02-19 13:12:13'),
(50, '+2348032454342', '6510', 0, '2023-03-16 18:24:27', '2023-03-16 18:24:27'),
(51, '+2348032454342', '9076', 0, '2023-03-17 18:45:09', '2023-03-17 18:45:09'),
(52, '+2348032454342', '0829', 0, '2023-03-17 18:50:15', '2023-03-17 18:50:15'),
(53, '+2348032454342', '6037', 0, '2023-03-17 19:04:29', '2023-03-17 19:04:29'),
(54, '+2348032454342', '4138', 0, '2023-03-17 20:47:51', '2023-03-17 20:47:51'),
(55, '+2348032454342', '2789', 0, '2023-03-17 20:50:28', '2023-03-17 20:50:28'),
(56, '+2348032454342', '3648', 1, '2023-03-17 20:53:40', '2023-03-17 20:53:40'),
(57, '+2349010197681', '5187', 1, '2023-03-18 17:24:42', '2023-03-18 17:24:42'),
(58, '+2347069581571', '5642', 1, '2023-03-20 21:07:10', '2023-03-20 21:07:10'),
(59, '+2349010197681', '3756', 1, '2023-03-22 14:28:02', '2023-03-22 14:28:02'),
(60, '8148537452', '8035', 0, '2023-03-24 09:34:25', '2023-03-24 09:34:25'),
(61, '8148537452', '5863', 0, '2023-03-24 13:52:32', '2023-03-24 13:52:32'),
(62, '8148537452', '5726', 0, '2023-03-24 14:21:54', '2023-03-24 14:21:54'),
(63, '8148537452', '3298', 0, '2023-03-24 15:54:56', '2023-03-24 15:54:56'),
(64, '08038474317', '8241', 0, '2023-04-03 08:57:11', '2023-04-03 08:57:11'),
(65, '08038474317', '8973', 0, '2023-04-03 08:57:36', '2023-04-03 08:57:36'),
(66, '08038474317', '0435', 0, '2023-04-03 08:57:40', '2023-04-03 08:57:40'),
(67, '08038474317', '2749', 0, '2023-04-03 08:57:50', '2023-04-03 08:57:50'),
(68, '08038474317', '1385', 0, '2023-04-03 08:57:50', '2023-04-03 08:57:50'),
(69, '08038474317', '9420', 0, '2023-04-03 08:57:50', '2023-04-03 08:57:50'),
(70, '08038474317', '5608', 0, '2023-04-03 08:57:51', '2023-04-03 08:57:51'),
(71, '08038474317', '8195', 0, '2023-04-03 08:57:52', '2023-04-03 08:57:52'),
(72, '08038474317', '3816', 0, '2023-04-03 08:57:55', '2023-04-03 08:57:55'),
(73, '08038474317', '0894', 0, '2023-04-03 08:57:55', '2023-04-03 08:57:55'),
(74, '08038474317', '4735', 0, '2023-04-03 08:57:55', '2023-04-03 08:57:55'),
(75, '08038474317', '8129', 0, '2023-04-03 08:58:15', '2023-04-03 08:58:15'),
(76, '08038474317', '3675', 0, '2023-04-03 08:58:17', '2023-04-03 08:58:17'),
(77, '08038474317', '2508', 0, '2023-04-03 08:58:20', '2023-04-03 08:58:20'),
(78, '08038474317', '8504', 0, '2023-04-03 08:58:27', '2023-04-03 08:58:27'),
(79, '08038474317', '0481', 0, '2023-04-03 08:58:29', '2023-04-03 08:58:29'),
(80, '08038474317', '4608', 0, '2023-04-03 08:58:34', '2023-04-03 08:58:34'),
(81, '08038474317', '5072', 0, '2023-04-03 08:58:35', '2023-04-03 08:58:35'),
(82, '08038474317', '1369', 0, '2023-04-03 08:58:44', '2023-04-03 08:58:44'),
(83, '08038474317', '0872', 0, '2023-04-03 08:58:46', '2023-04-03 08:58:46'),
(84, '08038474317', '0689', 0, '2023-04-03 08:58:46', '2023-04-03 08:58:46'),
(85, '08038474317', '7369', 0, '2023-04-03 08:58:46', '2023-04-03 08:58:46'),
(86, '08038474317', '4567', 0, '2023-04-03 08:58:51', '2023-04-03 08:58:51'),
(87, '08038474317', '7251', 0, '2023-04-03 08:58:58', '2023-04-03 08:58:58'),
(88, '08038474317', '7965', 0, '2023-04-03 08:59:06', '2023-04-03 08:59:06'),
(89, '08038474317', '6539', 0, '2023-04-03 08:59:10', '2023-04-03 08:59:10'),
(90, '08038474317', '3489', 0, '2023-04-03 08:59:13', '2023-04-03 08:59:13'),
(91, '08038474317', '2409', 0, '2023-04-03 08:59:16', '2023-04-03 08:59:16'),
(92, '08038474317', '8213', 0, '2023-04-03 08:59:18', '2023-04-03 08:59:18'),
(93, '08038474317', '8056', 0, '2023-04-03 08:59:23', '2023-04-03 08:59:23'),
(94, '08038474317', '5643', 0, '2023-04-03 08:59:23', '2023-04-03 08:59:23'),
(95, '08038474317', '0534', 0, '2023-04-03 08:59:23', '2023-04-03 08:59:23'),
(96, '08038474317', '7234', 0, '2023-04-03 08:59:24', '2023-04-03 08:59:24'),
(97, '08038474317', '5402', 0, '2023-04-03 08:59:34', '2023-04-03 08:59:34'),
(98, '08038474317', '8410', 0, '2023-04-03 08:59:34', '2023-04-03 08:59:34'),
(99, '08038474317', '9835', 0, '2023-04-03 08:59:36', '2023-04-03 08:59:36'),
(100, '08038474317', '8132', 0, '2023-04-03 08:59:39', '2023-04-03 08:59:39'),
(101, '08038474317', '5140', 0, '2023-04-03 08:59:40', '2023-04-03 08:59:40'),
(102, '08038474317', '4318', 0, '2023-04-03 08:59:41', '2023-04-03 08:59:41'),
(103, '08038474317', '6904', 0, '2023-04-03 08:59:43', '2023-04-03 08:59:43'),
(104, '08038474317', '7813', 0, '2023-04-03 08:59:44', '2023-04-03 08:59:44'),
(105, '08038474317', '5028', 0, '2023-04-03 08:59:57', '2023-04-03 08:59:57'),
(106, '08038474317', '4617', 0, '2023-04-03 09:00:00', '2023-04-03 09:00:00'),
(107, '08038474317', '5790', 0, '2023-04-03 09:00:03', '2023-04-03 09:00:03'),
(108, '08038474317', '5864', 0, '2023-04-03 09:00:05', '2023-04-03 09:00:05'),
(109, '08038474317', '8972', 0, '2023-04-03 09:00:06', '2023-04-03 09:00:06'),
(110, '08038474317', '1762', 0, '2023-04-03 09:00:11', '2023-04-03 09:00:11'),
(111, '08038474317', '2450', 0, '2023-04-03 09:00:19', '2023-04-03 09:00:19'),
(112, '08038474317', '6327', 0, '2023-04-03 09:00:19', '2023-04-03 09:00:19'),
(113, '08038474317', '9278', 0, '2023-04-03 09:00:22', '2023-04-03 09:00:22'),
(114, '08038474317', '0538', 0, '2023-04-03 09:00:27', '2023-04-03 09:00:27'),
(115, '08038474317', '4162', 0, '2023-04-03 09:00:27', '2023-04-03 09:00:27'),
(116, '08038474317', '7214', 0, '2023-04-03 09:00:27', '2023-04-03 09:00:27'),
(117, '08038474317', '6497', 0, '2023-04-03 09:00:28', '2023-04-03 09:00:28'),
(118, '08038474317', '7059', 0, '2023-04-03 09:00:29', '2023-04-03 09:00:29'),
(119, '08038474317', '8413', 0, '2023-04-03 09:00:30', '2023-04-03 09:00:30'),
(120, '08038474317', '6078', 0, '2023-04-03 09:00:30', '2023-04-03 09:00:30'),
(121, '08038474317', '2341', 0, '2023-04-03 09:00:33', '2023-04-03 09:00:33'),
(122, '08038474317', '9843', 0, '2023-04-03 09:00:34', '2023-04-03 09:00:34'),
(123, '08038474317', '6279', 0, '2023-04-03 09:00:45', '2023-04-03 09:00:45'),
(124, '08038474317', '0374', 0, '2023-04-03 09:00:50', '2023-04-03 09:00:50'),
(125, '08038474317', '9521', 0, '2023-04-03 09:00:53', '2023-04-03 09:00:53'),
(126, '08038474317', '0587', 0, '2023-04-03 09:01:01', '2023-04-03 09:01:01'),
(127, '08038474317', '1593', 0, '2023-04-03 09:01:08', '2023-04-03 09:01:08'),
(128, '08038474317', '3278', 0, '2023-04-03 09:01:10', '2023-04-03 09:01:10'),
(129, '08038474317', '8276', 0, '2023-04-03 09:01:14', '2023-04-03 09:01:14'),
(130, '08038474317', '6741', 0, '2023-04-03 09:01:15', '2023-04-03 09:01:15'),
(131, '08038474317', '0794', 0, '2023-04-03 09:01:19', '2023-04-03 09:01:19'),
(132, '08038474317', '5710', 0, '2023-04-03 09:01:23', '2023-04-03 09:01:23'),
(133, '08038474317', '0273', 0, '2023-04-03 09:01:23', '2023-04-03 09:01:23'),
(134, '08038474317', '5402', 0, '2023-04-03 09:01:28', '2023-04-03 09:01:28'),
(135, '08038474317', '5690', 0, '2023-04-03 09:01:30', '2023-04-03 09:01:30'),
(136, '08038474317', '4892', 0, '2023-04-03 09:01:36', '2023-04-03 09:01:36'),
(137, '08038474317', '3271', 0, '2023-04-03 09:01:41', '2023-04-03 09:01:41'),
(138, '08038474317', '7054', 0, '2023-04-03 09:02:12', '2023-04-03 09:02:12'),
(139, '08038474317', '2476', 0, '2023-04-03 09:02:15', '2023-04-03 09:02:15'),
(140, '08038474317', '2470', 0, '2023-04-03 09:02:17', '2023-04-03 09:02:17'),
(141, '08038474317', '7364', 0, '2023-04-03 09:02:22', '2023-04-03 09:02:22'),
(142, '08038474317', '2503', 0, '2023-04-03 19:06:21', '2023-04-03 19:06:21'),
(143, '08038474317', '7648', 0, '2023-04-03 19:07:11', '2023-04-03 19:07:11'),
(144, '08038474317', '4361', 0, '2023-04-03 19:08:06', '2023-04-03 19:08:06'),
(145, '08038474317', '3401', 0, '2023-04-03 19:08:48', '2023-04-03 19:08:48'),
(146, '08038474317', '1958', 0, '2023-04-03 19:08:53', '2023-04-03 19:08:53'),
(147, '08038474317', '2749', 0, '2023-04-04 07:44:39', '2023-04-04 07:44:39'),
(148, '08038474317', '5912', 0, '2023-04-04 07:45:33', '2023-04-04 07:45:33'),
(149, '08038474317', '8359', 0, '2023-04-04 07:45:49', '2023-04-04 07:45:49'),
(150, '08038474317', '4760', 0, '2023-04-04 07:46:27', '2023-04-04 07:46:27'),
(151, '08038474317', '3864', 0, '2023-04-04 07:46:51', '2023-04-04 07:46:51'),
(152, '08038474317', '2867', 0, '2023-04-04 07:47:07', '2023-04-04 07:47:07'),
(153, '08038474317', '9361', 0, '2023-04-04 07:47:13', '2023-04-04 07:47:13'),
(154, '08038474317', '7064', 0, '2023-04-04 07:47:44', '2023-04-04 07:47:44'),
(155, '08038474317', '9138', 0, '2023-04-04 07:48:28', '2023-04-04 07:48:28'),
(156, '08038474317', '6839', 0, '2023-04-04 07:48:33', '2023-04-04 07:48:33'),
(157, '08038474317', '8950', 0, '2023-04-04 11:18:13', '2023-04-04 11:18:13'),
(158, '08038474317', '5683', 0, '2023-04-04 11:19:06', '2023-04-04 11:19:06'),
(159, '08038474317', '4682', 0, '2023-04-04 11:19:55', '2023-04-04 11:19:55'),
(160, '08038474317', '4135', 0, '2023-04-04 11:20:00', '2023-04-04 11:20:00'),
(161, '08038474317', '5346', 0, '2023-04-04 11:20:43', '2023-04-04 11:20:43'),
(162, '08038474317', '3925', 0, '2023-04-04 11:20:48', '2023-04-04 11:20:48'),
(163, '08038474317', '2981', 0, '2023-04-04 11:41:11', '2023-04-04 11:41:11'),
(164, '08038474317', '6923', 0, '2023-04-04 11:41:14', '2023-04-04 11:41:14'),
(165, '08038474317', '1879', 0, '2023-04-04 11:41:16', '2023-04-04 11:41:16'),
(166, '08038474317', '0518', 0, '2023-04-04 11:41:37', '2023-04-04 11:41:37'),
(167, '08038474317', '1640', 0, '2023-04-04 11:41:44', '2023-04-04 11:41:44'),
(168, '08038474317', '6859', 0, '2023-04-04 11:42:05', '2023-04-04 11:42:05'),
(169, '08038474317', '7450', 0, '2023-04-04 11:42:07', '2023-04-04 11:42:07'),
(170, '08038474317', '1637', 0, '2023-04-04 11:42:07', '2023-04-04 11:42:07'),
(171, '08038474317', '7081', 0, '2023-04-04 11:42:11', '2023-04-04 11:42:11'),
(172, '08038474317', '6814', 0, '2023-04-04 11:42:12', '2023-04-04 11:42:12'),
(173, '08038474317', '8405', 0, '2023-04-04 11:42:32', '2023-04-04 11:42:32'),
(174, '08038474317', '9368', 0, '2023-04-04 11:42:41', '2023-04-04 11:42:41'),
(175, '08038474317', '0374', 0, '2023-04-04 11:42:46', '2023-04-04 11:42:46'),
(176, '08038474317', '7254', 0, '2023-04-04 11:42:48', '2023-04-04 11:42:48'),
(177, '08038474317', '9372', 0, '2023-04-04 11:42:57', '2023-04-04 11:42:57'),
(178, '08038474317', '8475', 0, '2023-04-04 11:43:00', '2023-04-04 11:43:00'),
(179, '08038474317', '0673', 0, '2023-04-04 11:43:01', '2023-04-04 11:43:01'),
(180, '08038474317', '3945', 0, '2023-04-04 11:43:02', '2023-04-04 11:43:02'),
(181, '08038474317', '6290', 0, '2023-04-04 11:43:08', '2023-04-04 11:43:08'),
(182, '08038474317', '7946', 0, '2023-04-04 11:43:11', '2023-04-04 11:43:11'),
(183, '08038474317', '6781', 0, '2023-04-04 11:43:24', '2023-04-04 11:43:24'),
(184, '08038474317', '3208', 0, '2023-04-04 11:43:37', '2023-04-04 11:43:37'),
(185, '08038474317', '5092', 0, '2023-04-04 11:43:44', '2023-04-04 11:43:44'),
(186, '08038474317', '4682', 0, '2023-04-04 11:43:45', '2023-04-04 11:43:45'),
(187, '08038474317', '3146', 0, '2023-04-04 11:43:46', '2023-04-04 11:43:46'),
(188, '08038474317', '5094', 0, '2023-04-04 11:43:49', '2023-04-04 11:43:49'),
(189, '08038474317', '1435', 0, '2023-04-04 11:43:50', '2023-04-04 11:43:50'),
(190, '08038474317', '4125', 0, '2023-04-04 11:43:53', '2023-04-04 11:43:53'),
(191, '08038474317', '8071', 0, '2023-04-04 11:44:05', '2023-04-04 11:44:05'),
(192, '08038474317', '6784', 0, '2023-04-04 11:44:08', '2023-04-04 11:44:08'),
(193, '08038474317', '5298', 0, '2023-04-04 11:44:09', '2023-04-04 11:44:09'),
(194, '08038474317', '5704', 0, '2023-04-04 11:44:13', '2023-04-04 11:44:13'),
(195, '08038474317', '4209', 0, '2023-04-04 11:44:13', '2023-04-04 11:44:13'),
(196, '08038474317', '8354', 0, '2023-04-04 11:44:33', '2023-04-04 11:44:33'),
(197, '08038474317', '5189', 0, '2023-04-04 11:44:36', '2023-04-04 11:44:36'),
(198, '08038474317', '0392', 0, '2023-04-04 11:44:41', '2023-04-04 11:44:41'),
(199, '08038474317', '6810', 0, '2023-04-04 11:44:47', '2023-04-04 11:44:47'),
(200, '08038474317', '3298', 0, '2023-04-04 11:44:51', '2023-04-04 11:44:51'),
(201, '08038474317', '4503', 0, '2023-04-04 11:44:51', '2023-04-04 11:44:51'),
(202, '08038474317', '3120', 0, '2023-04-04 11:44:55', '2023-04-04 11:44:55'),
(203, '08038474317', '8157', 0, '2023-04-04 11:44:56', '2023-04-04 11:44:56'),
(204, '08038474317', '8421', 0, '2023-04-04 11:44:57', '2023-04-04 11:44:57'),
(205, '08038474317', '4351', 0, '2023-04-04 11:45:02', '2023-04-04 11:45:02'),
(206, '08038474317', '5619', 0, '2023-04-04 11:45:07', '2023-04-04 11:45:07'),
(207, '08038474317', '3509', 0, '2023-04-04 11:45:13', '2023-04-04 11:45:13'),
(208, '08038474317', '1026', 0, '2023-04-04 11:45:17', '2023-04-04 11:45:17'),
(209, '08038474317', '1695', 0, '2023-04-04 11:45:24', '2023-04-04 11:45:24'),
(210, '08038474317', '0721', 0, '2023-04-04 11:45:32', '2023-04-04 11:45:32'),
(211, '08038474317', '8651', 0, '2023-04-04 11:45:37', '2023-04-04 11:45:37'),
(212, '08038474317', '1573', 0, '2023-04-04 11:46:09', '2023-04-04 11:46:09'),
(213, '08038474317', '1783', 0, '2023-04-04 11:46:10', '2023-04-04 11:46:10'),
(214, '08038474317', '2430', 0, '2023-04-04 11:46:15', '2023-04-04 11:46:15'),
(215, '08038474317', '1869', 0, '2023-04-04 11:47:06', '2023-04-04 11:47:06'),
(216, '08038474317', '3579', 0, '2023-04-04 11:47:10', '2023-04-04 11:47:10'),
(217, '08038474317', '2439', 0, '2023-04-04 11:47:15', '2023-04-04 11:47:15'),
(218, '08038474317', '9648', 0, '2023-04-04 11:47:52', '2023-04-04 11:47:52'),
(219, '08038474317', '9268', 0, '2023-04-04 11:47:57', '2023-04-04 11:47:57'),
(220, '08038474317', '9401', 0, '2023-04-04 11:48:00', '2023-04-04 11:48:00'),
(221, '08038474317', '7860', 0, '2023-04-04 11:48:06', '2023-04-04 11:48:06'),
(222, '08038474317', '7635', 0, '2023-04-04 11:48:11', '2023-04-04 11:48:11'),
(223, '08038474317', '0371', 0, '2023-04-04 11:48:33', '2023-04-04 11:48:33'),
(224, '08038474317', '3150', 0, '2023-04-04 11:48:44', '2023-04-04 11:48:44'),
(225, '08038474317', '8123', 0, '2023-04-04 11:48:49', '2023-04-04 11:48:49'),
(226, '08038474317', '4926', 0, '2023-04-04 11:49:29', '2023-04-04 11:49:29'),
(227, '08038474317', '3758', 0, '2023-04-04 11:50:24', '2023-04-04 11:50:24'),
(228, '08038474317', '2819', 0, '2023-04-04 11:51:08', '2023-04-04 11:51:08'),
(229, '08038474317', '2841', 0, '2023-04-04 11:51:13', '2023-04-04 11:51:13'),
(230, '08038474317', '1248', 0, '2023-04-04 11:51:46', '2023-04-04 11:51:46'),
(231, '08038474317', '3740', 0, '2023-04-04 11:52:47', '2023-04-04 11:52:47'),
(232, '08038474317', '1594', 0, '2023-04-04 11:53:49', '2023-04-04 11:53:49'),
(233, '08038474317', '3128', 0, '2023-04-04 11:53:54', '2023-04-04 11:53:54'),
(234, '08038474317', '5648', 0, '2023-04-04 11:54:41', '2023-04-04 11:54:41'),
(235, '08038474317', '2756', 0, '2023-04-04 11:54:46', '2023-04-04 11:54:46'),
(236, '08038474317', '2673', 0, '2023-04-04 11:55:18', '2023-04-04 11:55:18'),
(237, '08038474317', '9082', 0, '2023-04-04 11:55:23', '2023-04-04 11:55:23'),
(238, '08038474317', '4852', 0, '2023-04-04 11:56:12', '2023-04-04 11:56:12'),
(239, '08038474317', '2701', 0, '2023-04-04 11:56:40', '2023-04-04 11:56:40'),
(240, '08038474317', '1974', 0, '2023-04-04 11:56:44', '2023-04-04 11:56:44'),
(241, '08038474317', '6374', 0, '2023-04-04 11:57:04', '2023-04-04 11:57:04'),
(242, '08038474317', '2639', 0, '2023-04-04 11:57:08', '2023-04-04 11:57:08'),
(243, '08038474317', '6178', 0, '2023-04-04 11:57:38', '2023-04-04 11:57:38'),
(244, '08038474317', '1035', 0, '2023-04-04 11:57:55', '2023-04-04 11:57:55'),
(245, '08038474317', '1697', 0, '2023-04-04 11:58:00', '2023-04-04 11:58:00'),
(246, '08038474317', '7053', 0, '2023-04-04 11:58:22', '2023-04-04 11:58:22'),
(247, '08038474317', '5194', 0, '2023-04-04 11:58:32', '2023-04-04 11:58:32'),
(248, '08038474317', '7813', 0, '2023-04-04 11:58:37', '2023-04-04 11:58:37'),
(249, '08038474317', '2918', 0, '2023-04-04 11:59:19', '2023-04-04 11:59:19'),
(250, '08038474317', '7861', 0, '2023-04-04 11:59:21', '2023-04-04 11:59:21'),
(251, '08038474317', '5234', 0, '2023-04-04 11:59:26', '2023-04-04 11:59:26'),
(252, '08038474317', '2054', 0, '2023-04-04 12:00:10', '2023-04-04 12:00:10'),
(253, '08038474317', '2870', 0, '2023-04-04 12:00:54', '2023-04-04 12:00:54'),
(254, '08038474317', '7236', 0, '2023-04-04 12:00:59', '2023-04-04 12:00:59'),
(255, '08038474317', '1652', 0, '2023-04-04 12:02:56', '2023-04-04 12:02:56'),
(256, '08038474317', '8537', 0, '2023-04-04 12:03:00', '2023-04-04 12:03:00'),
(257, '08038474317', '7586', 0, '2023-04-04 12:04:36', '2023-04-04 12:04:36'),
(258, '08038474317', '8965', 0, '2023-04-04 12:05:48', '2023-04-04 12:05:48'),
(259, '08038474317', '1325', 0, '2023-04-04 12:06:48', '2023-04-04 12:06:48'),
(260, '08038474317', '3516', 0, '2023-04-04 12:07:38', '2023-04-04 12:07:38'),
(261, '08038474317', '3946', 0, '2023-04-04 12:07:43', '2023-04-04 12:07:43'),
(262, '08038474317', '9651', 0, '2023-04-05 17:56:13', '2023-04-05 17:56:13'),
(263, '08038474317', '2384', 0, '2023-04-05 17:57:15', '2023-04-05 17:57:15'),
(264, '08038474317', '9184', 0, '2023-04-05 17:58:09', '2023-04-05 17:58:09'),
(265, '08038474317', '4520', 0, '2023-04-05 17:58:54', '2023-04-05 17:58:54'),
(266, '08038474317', '2658', 0, '2023-04-05 17:58:59', '2023-04-05 17:58:59'),
(267, '08038474317', '5270', 0, '2023-04-11 01:33:59', '2023-04-11 01:33:59'),
(268, '08038474317', '0619', 0, '2023-04-11 01:34:00', '2023-04-11 01:34:00'),
(269, '08038474317', '8765', 0, '2023-04-11 01:34:00', '2023-04-11 01:34:00'),
(270, '08038474317', '5817', 0, '2023-04-11 01:34:02', '2023-04-11 01:34:02'),
(271, '08038474317', '0268', 0, '2023-05-10 18:54:39', '2023-05-10 18:54:39'),
(272, '08038474317', '9743', 0, '2023-05-10 18:54:39', '2023-05-10 18:54:39'),
(273, '08038474317', '4869', 0, '2023-05-10 18:54:40', '2023-05-10 18:54:40'),
(274, '08038474317', '5916', 0, '2023-05-10 18:54:59', '2023-05-10 18:54:59'),
(275, '08038474317', '3098', 0, '2023-05-10 18:55:06', '2023-05-10 18:55:06'),
(276, '08038474317', '5789', 0, '2023-05-10 18:55:07', '2023-05-10 18:55:07'),
(277, '08038474317', '9685', 0, '2023-05-10 18:55:08', '2023-05-10 18:55:08'),
(278, '08038474317', '5937', 0, '2023-05-10 18:55:09', '2023-05-10 18:55:09'),
(279, '08038474317', '7605', 0, '2023-05-10 18:55:21', '2023-05-10 18:55:21'),
(280, '08038474317', '3591', 0, '2023-05-10 18:55:21', '2023-05-10 18:55:21'),
(281, '08038474317', '4078', 0, '2023-05-10 18:55:41', '2023-05-10 18:55:41'),
(282, '08038474317', '9235', 0, '2023-05-10 18:55:43', '2023-05-10 18:55:43'),
(283, '08038474317', '3627', 0, '2023-05-10 18:55:44', '2023-05-10 18:55:44'),
(284, '08038474317', '7358', 0, '2023-05-10 18:56:01', '2023-05-10 18:56:01'),
(285, '08038474317', '0285', 0, '2023-05-10 18:56:05', '2023-05-10 18:56:05'),
(286, '08038474317', '4852', 0, '2023-05-10 18:56:07', '2023-05-10 18:56:07'),
(287, '08038474317', '3502', 0, '2023-05-10 18:56:09', '2023-05-10 18:56:09'),
(288, '08038474317', '6257', 0, '2023-05-10 18:56:10', '2023-05-10 18:56:10'),
(289, '08038474317', '9328', 0, '2023-05-10 18:56:21', '2023-05-10 18:56:21'),
(290, '08038474317', '6128', 0, '2023-05-10 18:56:27', '2023-05-10 18:56:27'),
(291, '08038474317', '9632', 0, '2023-05-10 18:56:39', '2023-05-10 18:56:39'),
(292, '08038474317', '8471', 0, '2023-05-10 18:56:42', '2023-05-10 18:56:42'),
(293, '08038474317', '8379', 0, '2023-05-10 18:56:44', '2023-05-10 18:56:44'),
(294, '08038474317', '3965', 0, '2023-05-10 18:56:45', '2023-05-10 18:56:45'),
(295, '08038474317', '1026', 0, '2023-05-10 18:57:01', '2023-05-10 18:57:01'),
(296, '08038474317', '0481', 0, '2023-05-10 18:57:05', '2023-05-10 18:57:05'),
(297, '08038474317', '2306', 0, '2023-05-10 18:57:09', '2023-05-10 18:57:09'),
(298, '08038474317', '2468', 0, '2023-05-10 18:57:09', '2023-05-10 18:57:09'),
(299, '08038474317', '4570', 0, '2023-05-10 18:57:10', '2023-05-10 18:57:10'),
(300, '08038474317', '6458', 0, '2023-05-10 18:57:27', '2023-05-10 18:57:27'),
(301, '08038474317', '2190', 0, '2023-05-10 18:57:27', '2023-05-10 18:57:27'),
(302, '08038474317', '8456', 0, '2023-05-10 18:57:29', '2023-05-10 18:57:29'),
(303, '08038474317', '9783', 0, '2023-05-10 18:57:32', '2023-05-10 18:57:32'),
(304, '08038474317', '0495', 0, '2023-05-10 18:57:34', '2023-05-10 18:57:34'),
(305, '08038474317', '4380', 0, '2023-05-10 18:57:37', '2023-05-10 18:57:37'),
(306, '08038474317', '6984', 0, '2023-05-10 18:57:38', '2023-05-10 18:57:38'),
(307, '08038474317', '3924', 0, '2023-05-10 18:57:40', '2023-05-10 18:57:40'),
(308, '08038474317', '0374', 0, '2023-05-10 18:57:42', '2023-05-10 18:57:42'),
(309, '08038474317', '0956', 0, '2023-05-10 18:57:43', '2023-05-10 18:57:43'),
(310, '08038474317', '7094', 0, '2023-05-10 18:57:53', '2023-05-10 18:57:53'),
(311, '08038474317', '3496', 0, '2023-05-10 18:57:58', '2023-05-10 18:57:58'),
(312, '08038474317', '0628', 0, '2023-05-10 18:57:58', '2023-05-10 18:57:58'),
(313, '08038474317', '2059', 0, '2023-05-10 18:57:58', '2023-05-10 18:57:58'),
(314, '08038474317', '8091', 0, '2023-05-10 18:58:01', '2023-05-10 18:58:01'),
(315, '08038474317', '0937', 0, '2023-05-10 18:58:03', '2023-05-10 18:58:03'),
(316, '08038474317', '2875', 0, '2023-05-10 18:58:03', '2023-05-10 18:58:03'),
(317, '08038474317', '0134', 0, '2023-05-10 18:58:04', '2023-05-10 18:58:04'),
(318, '08038474317', '2985', 0, '2023-05-10 18:58:06', '2023-05-10 18:58:06'),
(319, '08038474317', '7294', 0, '2023-05-10 18:58:08', '2023-05-10 18:58:08'),
(320, '08038474317', '6182', 0, '2023-05-10 18:58:17', '2023-05-10 18:58:17'),
(321, '08038474317', '6057', 0, '2023-05-10 18:58:22', '2023-05-10 18:58:22'),
(322, '08038474317', '3459', 0, '2023-05-10 18:58:25', '2023-05-10 18:58:25'),
(323, '08038474317', '1954', 0, '2023-05-10 18:58:30', '2023-05-10 18:58:30'),
(324, '08038474317', '3261', 0, '2023-05-10 18:58:38', '2023-05-10 18:58:38'),
(325, '08038474317', '1936', 0, '2023-05-10 18:58:39', '2023-05-10 18:58:39'),
(326, '08038474317', '6378', 0, '2023-05-10 18:58:44', '2023-05-10 18:58:44'),
(327, '08038474317', '7029', 0, '2023-05-10 18:59:45', '2023-05-10 18:59:45'),
(328, '08038474317', '7230', 0, '2023-05-10 19:00:39', '2023-05-10 19:00:39'),
(329, '08038474317', '2314', 0, '2023-05-10 19:00:44', '2023-05-10 19:00:44'),
(330, '08038474317', '2613', 0, '2023-05-11 07:58:08', '2023-05-11 07:58:08'),
(331, '08038474317', '5238', 0, '2023-05-11 07:59:11', '2023-05-11 07:59:11'),
(332, '08038474317', '5726', 0, '2023-05-11 08:00:14', '2023-05-11 08:00:14'),
(333, '08038474317', '2148', 0, '2023-05-11 08:01:05', '2023-05-11 08:01:05'),
(334, '08038474317', '3895', 0, '2023-05-11 08:01:11', '2023-05-11 08:01:11'),
(335, '08038474317', '0783', 0, '2023-05-11 11:06:20', '2023-05-11 11:06:20'),
(336, '08038474317', '1620', 0, '2023-05-11 11:07:05', '2023-05-11 11:07:05'),
(337, '08038474317', '2149', 0, '2023-05-11 11:07:40', '2023-05-11 11:07:40'),
(338, '08038474317', '3806', 0, '2023-05-11 11:08:05', '2023-05-11 11:08:05'),
(339, '08038474317', '7592', 0, '2023-05-11 11:08:07', '2023-05-11 11:08:07'),
(340, '08038474317', '1943', 0, '2023-05-11 11:08:45', '2023-05-11 11:08:45'),
(341, '08038474317', '2638', 0, '2023-05-11 11:09:04', '2023-05-11 11:09:04'),
(342, '08038474317', '8510', 0, '2023-05-11 11:09:07', '2023-05-11 11:09:07'),
(343, '08038474317', '7684', 0, '2023-05-11 11:09:39', '2023-05-11 11:09:39'),
(344, '08038474317', '8523', 0, '2023-05-11 11:09:45', '2023-05-11 11:09:45'),
(345, '08038474317', '5692', 0, '2023-05-11 11:09:55', '2023-05-11 11:09:55'),
(346, '08038474317', '2149', 0, '2023-05-11 11:10:01', '2023-05-11 11:10:01'),
(347, '08038474317', '8759', 0, '2023-05-11 11:10:06', '2023-05-11 11:10:06'),
(348, '08038474317', '4936', 0, '2023-05-11 11:10:55', '2023-05-11 11:10:55'),
(349, '08038474317', '5016', 0, '2023-05-11 11:11:00', '2023-05-11 11:11:00'),
(350, '08038474317', '2598', 0, '2023-05-11 11:38:25', '2023-05-11 11:38:25'),
(351, '08038474317', '6504', 0, '2023-05-11 11:39:24', '2023-05-11 11:39:24'),
(352, '08038474317', '3678', 0, '2023-05-11 11:40:20', '2023-05-11 11:40:20'),
(353, '08038474317', '5087', 0, '2023-05-11 11:40:25', '2023-05-11 11:40:25'),
(354, '08038474317', '9715', 0, '2023-05-11 11:41:11', '2023-05-11 11:41:11'),
(355, '08038474317', '4915', 0, '2023-05-11 11:41:17', '2023-05-11 11:41:17'),
(356, '08038474317', '4189', 0, '2023-05-11 16:57:54', '2023-05-11 16:57:54'),
(357, '08038474317', '9271', 0, '2023-05-11 16:59:17', '2023-05-11 16:59:17'),
(358, '08038474317', '8639', 0, '2023-05-11 17:00:31', '2023-05-11 17:00:31'),
(359, '08038474317', '1794', 0, '2023-05-11 17:01:25', '2023-05-11 17:01:25'),
(360, '8032454342', '0259', 0, '2023-05-11 22:15:44', '2023-05-11 22:15:44'),
(361, '8120029028', '5794', 0, '2023-08-14 20:07:56', '2023-08-14 20:07:56'),
(362, '8120029028', '9036', 0, '2023-08-14 20:08:48', '2023-08-14 20:08:48'),
(363, '8120029028', '7901', 0, '2023-08-14 20:11:26', '2023-08-14 20:11:26'),
(364, '8120029028', '7836', 0, '2023-08-14 23:22:10', '2023-08-14 23:22:10'),
(365, '8120029028', '6708', 0, '2023-08-15 15:01:52', '2023-08-15 15:01:52'),
(366, '+2348032454342', '9482', 0, '2023-08-15 15:16:21', '2023-08-15 15:16:21'),
(367, '08032454342', '3806', 0, '2023-08-15 15:31:14', '2023-08-15 15:31:14'),
(368, '8120029028', '9428', 1, '2023-08-15 15:32:54', '2023-08-15 15:32:54'),
(369, '9047982448', '1652', 1, '2023-08-21 08:50:47', '2023-08-21 08:50:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(6, '2020_09_29_042901_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `user_table` varchar(200) NOT NULL,
  `fieldname` varchar(200) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `option_item` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`option_id`, `user_table`, `fieldname`, `userid`, `option_item`, `type`) VALUES
(9, 'form_14', 'market type', '14', 'mega', 'checkbox'),
(10, 'form_14', 'market type', '14', 'small', 'checkbox'),
(11, 'form_14', 'market type', '14', 'large', 'checkbox'),
(15, 'form_14', 'entrepreneurial interest', '14', 'engineering', 'checkbox'),
(16, 'form_14', 'entrepreneurial interest', '14', 'agriculturist', 'checkbox'),
(17, 'form_14', 'entrepreneurial interest', '14', 'Software  developer', 'checkbox'),
(18, 'form_14', 'sex', '14', 'good', 'radio'),
(19, 'form_14', 'sex', '14', 'bad', 'radio'),
(20, 'form_7', 'sex', '7', 'Male', 'radio'),
(21, 'form_7', 'sex', '7', 'Female', 'radio'),
(22, 'form_11', 'force', '11', 'torgue', 'radio'),
(23, 'form_11', 'force', '11', 'gravitational', 'radio'),
(24, 'form_11', 'force agaga', '11', 'torgue', 'radio'),
(25, 'form_11', 'force agaga', '11', 'gravitional', 'radio'),
(26, 'form_11', 'force agaga', '11', 'curvilinal', 'radio'),
(47, 'form_2', 'description', '2', 'lagos', 'radio'),
(52, 'form_2', 'Holiday Location', '2', 'lagos', 'checkbox'),
(53, 'form_2', 'Holiday Location', '2', 'ibadan', 'checkbox'),
(54, 'form_2', 'Holiday Location', '2', 'mile 2', 'checkbox'),
(55, 'form_2', 'Holiday Location', '2', 'ketu', 'checkbox'),
(56, 'form_2', 'region', '2', 'north', 'radio'),
(57, 'form_2', 'region', '2', 'south', 'radio'),
(58, 'form_2', 'color', '2', 'white', 'radio'),
(59, 'form_2', 'color', '2', 'colored', 'radio'),
(60, 'form_2', 'village', '2', 'orua', 'checkbox'),
(61, 'form_2', 'village', '2', 'ebedebiri', 'checkbox'),
(62, 'form_2', 'skin color', '2', 'black', 'radio'),
(63, 'form_2', 'skin color', '2', 'white', 'radio'),
(65, 'form_2', 'choose your choice of food', '2', 'rice and beans', 'checkbox'),
(66, 'form_2', 'choose your choice of food', '2', 'eba and soup', 'checkbox'),
(67, 'form_2', 'choose your choice of food', '2', 'yam and stew', 'checkbox'),
(68, 'form_2', 'choose your choice of food', '2', 'bole and fish', 'checkbox'),
(69, 'form_2', 'color', '2', 'black', 'radio'),
(72, 'form_2', 'color', '2', 'red', 'checkbox'),
(73, 'form_2', 'color', '2', 'black', 'checkbox'),
(74, 'form_2', 'color', '2', 'green', 'checkbox'),
(75, 'form_2', 'sex', '2', 'male', 'radio'),
(76, 'form_2', 'sex', '2', 'female', 'radio'),
(83, 'form_2', 'dog color', '2', 'brown', 'radio'),
(84, 'form_2', 'dog color', '2', 'black', 'radio'),
(85, 'form_2', 'dog color', '2', 'white', 'radio'),
(99, 'form_2', 'food', '2', 'eba and rice', 'radio'),
(100, 'form_2', 'food', '2', 'yam and beans', 'radio'),
(107, 'form_2', 'position2', '2', 'semi solid', 'radio'),
(109, 'form_2', 'position_jobs', '2', 'semi solid', 'radio'),
(110, 'form_2', 'position jobs', '2', 'jiuo', 'radio'),
(112, 'form_2', 'position fishes', '2', 'semi solid', 'radio'),
(113, 'form_2', 'position_fishes', '2', 'semi solid', 'radio'),
(114, 'form_2', 'goods_fish', '2', 'semi solid', 'radio'),
(117, 'form_2', 'foods', '2', 'semi solid', 'radio'),
(121, 'form_2', 'food stuffs', '2', 'pepper', 'checkbox'),
(125, 'form_2', 'foodstuff group', '2', 'jollof rice', 'checkbox'),
(126, 'form_2', 'foodstuff group', '2', 'ponded yam', 'checkbox'),
(127, 'form_2', 'foodstuff group', '2', 'rice', 'radio'),
(128, 'form_2', 'foodstuff group', '2', 'beans', 'radio'),
(129, 'form_2', 'foodstuff group', '2', 'beans', 'checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `custid` varchar(200) NOT NULL,
  `fromLoc` varchar(200) NOT NULL,
  `toLoc` varchar(200) NOT NULL,
  `riderid` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `remark` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `custid`, `fromLoc`, `toLoc`, `riderid`, `amount`, `created_at`, `updated_at`, `remark`) VALUES
(1, '1', 'amarata, yenagoa', 'swali yenagoa', '7', '500', '12/2/2020', '12/2/2020', 'please lets be fast');

-- --------------------------------------------------------

--
-- Table structure for table `order_alert_msg`
--

CREATE TABLE `order_alert_msg` (
  `id` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_alert_msg`
--

INSERT INTO `order_alert_msg` (`id`, `msg`, `client_id`, `rider_id`, `created_at`, `updated_at`) VALUES
(4, 'Hi Adelabu, your pickup code for this package (food) you are sending to uerhiuerhi  njebrfer is 2197. Your date of request is ', '1', '732846', '2023-01-24 13:22:02', '2023-01-24 13:22:02'),
(5, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (grocery) you are sending to lion mercy is 3840. Your date of request is 2023-1-7 16:39:08', '20', '732846', '2023-01-24 16:29:20', '2023-01-24 16:29:20'),
(6, 'There is no rider around for now to pick up your package', '1', '', '2023-01-27 17:52:16', '2023-01-27 17:52:16'),
(7, 'There is no rider around for now to pick up your package', '1', '', '2023-01-27 19:08:26', '2023-01-27 19:08:26'),
(8, 'There is no rider around for now to pick up your package', '1', '', '2023-01-27 19:08:28', '2023-01-27 19:08:28'),
(9, 'Hi Okpongu Tam, your pickup code for this package (food) you are sending to friday is 6831. Your date of request is 2023-01-27 14:10:19', '21', '732846', '2023-01-28 06:07:59', '2023-01-28 06:07:59'),
(10, 'There is no rider around for now to pick up your package', '20', '', '2023-01-28 06:53:48', '2023-01-28 06:53:48'),
(11, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:53:54', '2023-01-28 06:53:54'),
(12, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:53:58', '2023-01-28 06:53:58'),
(13, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:03', '2023-01-28 06:54:03'),
(14, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:07', '2023-01-28 06:54:07'),
(15, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:23', '2023-01-28 06:54:23'),
(16, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:28', '2023-01-28 06:54:28'),
(17, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:49', '2023-01-28 06:54:49'),
(18, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:55', '2023-01-28 06:54:55'),
(19, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:54:58', '2023-01-28 06:54:58'),
(20, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:02', '2023-01-28 06:55:02'),
(21, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:06', '2023-01-28 06:55:06'),
(22, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:09', '2023-01-28 06:55:09'),
(23, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:13', '2023-01-28 06:55:13'),
(24, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:16', '2023-01-28 06:55:16'),
(25, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:20', '2023-01-28 06:55:20'),
(26, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:23', '2023-01-28 06:55:23'),
(27, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:26', '2023-01-28 06:55:26'),
(28, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:30', '2023-01-28 06:55:30'),
(29, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:33', '2023-01-28 06:55:33'),
(30, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:36', '2023-01-28 06:55:36'),
(31, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:39', '2023-01-28 06:55:39'),
(32, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:42', '2023-01-28 06:55:42'),
(33, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:45', '2023-01-28 06:55:45'),
(34, 'There is no rider around for now to pick up your package', '1', '', '2023-01-28 06:55:49', '2023-01-28 06:55:49'),
(35, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:51', '2023-01-28 06:55:51'),
(36, 'There is no rider around for now to pick up your package', '21', '', '2023-01-28 06:55:56', '2023-01-28 06:55:56'),
(37, 'Hi Adelabu, your pickup code for this package (grocery) you are sending to girly qokl is 8734. Your date of request is 2023-1-7 16:39:08', '1', '732846', '2023-01-29 19:14:53', '2023-01-29 19:14:53'),
(38, 'Hi Adelabu, your pickup code for this package (grocery) you are sending to paradise kolosi is 4510. Your date of request is ', '1', '732846', '2023-01-29 19:58:32', '2023-01-29 19:58:32'),
(39, 'Hi Adelabu, your pickup code for this package (food) you are sending to uerhiuerhi  njebrfer is 9560. Your date of request is ', '1', '276543', '2023-01-29 22:33:55', '2023-01-29 22:33:55'),
(40, 'Hi Adelabu, your pickup code for this package (grocery) you are sending to gorge friday is 6278. Your date of request is 2023-1-7 16:39:08', '1', '276543', '2023-01-29 23:00:52', '2023-01-29 23:00:52'),
(41, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:13:42', '2023-01-30 14:13:42'),
(42, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:17:58', '2023-01-30 14:17:58'),
(43, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:18:43', '2023-01-30 14:18:43'),
(44, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:21:52', '2023-01-30 14:21:52'),
(45, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:23:23', '2023-01-30 14:23:23'),
(46, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:24:59', '2023-01-30 14:24:59'),
(47, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:25:48', '2023-01-30 14:25:48'),
(48, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:27:20', '2023-01-30 14:27:20'),
(49, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:27:55', '2023-01-30 14:27:55'),
(50, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:31:47', '2023-01-30 14:31:47'),
(51, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:31:55', '2023-01-30 14:31:55'),
(52, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 14:48:06', '2023-01-30 14:48:06'),
(53, 'There is no rider around for now to pick up your package', '9059040', '', '2023-01-30 15:06:11', '2023-01-30 15:06:11'),
(54, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Electronics ) you are sending to David tari is 1968. Your date of request is 2023-01-30 15:15:39', '20', '049821', '2023-01-30 18:59:03', '2023-01-30 18:59:03'),
(55, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-01 08:41:05', '2023-02-01 08:41:05'),
(56, 'There is no rider around for now to pick up your package', '20', '', '2023-02-01 10:16:57', '2023-02-01 10:16:57'),
(57, 'There is no rider around for now to pick up your package', '20', '', '2023-02-01 10:22:06', '2023-02-01 10:22:06'),
(58, 'There is no rider around for now to pick up your package', '20', '', '2023-02-01 10:29:10', '2023-02-01 10:29:10'),
(59, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-01 16:56:56', '2023-02-01 16:56:56'),
(60, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-02 10:42:56', '2023-02-02 10:42:56'),
(61, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-02 10:46:37', '2023-02-02 10:46:37'),
(62, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-02 17:15:20', '2023-02-02 17:15:20'),
(63, 'There is no rider around for now to pick up your package', '20', '', '2023-02-06 11:18:37', '2023-02-06 11:18:37'),
(64, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Grocery) you are sending to p is 4917. Your date of request is 2023-02-09 17:52:58', '20', '408652', '2023-02-10 04:27:41', '2023-02-10 04:27:41'),
(65, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Grocery) you are sending to p is 4067. Your date of request is 2023-02-09 18:06:23', '20', '408652', '2023-02-10 16:09:37', '2023-02-10 16:09:37'),
(66, 'There is no rider around for now to pick up your package', '20', '', '2023-02-10 17:39:40', '2023-02-10 17:39:40'),
(67, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-11 04:16:14', '2023-02-11 04:16:14'),
(68, 'Your ride request has been reassigned to another rider', '20', '', '2023-02-11 21:11:00', '2023-02-11 21:11:00'),
(69, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:13:09', '2023-02-12 19:13:09'),
(70, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:14:15', '2023-02-12 19:14:15'),
(71, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:15:46', '2023-02-12 19:15:46'),
(72, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:17:19', '2023-02-12 19:17:19'),
(73, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:20:49', '2023-02-12 19:20:49'),
(74, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:23:48', '2023-02-12 19:23:48'),
(75, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:24:59', '2023-02-12 19:24:59'),
(76, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:25:38', '2023-02-12 19:25:38'),
(77, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:28:23', '2023-02-12 19:28:23'),
(78, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 19:54:30', '2023-02-12 19:54:30'),
(79, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 20:30:00', '2023-02-12 20:30:00'),
(80, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 20:36:08', '2023-02-12 20:36:08'),
(81, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 20:42:58', '2023-02-12 20:42:58'),
(82, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 21:01:12', '2023-02-12 21:01:12'),
(83, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 21:14:36', '2023-02-12 21:14:36'),
(84, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 21:21:17', '2023-02-12 21:21:17'),
(85, 'There is no rider around for now to pick up your package', '20', '', '2023-02-12 21:49:04', '2023-02-12 21:49:04'),
(86, 'There is no rider around for now to pick up your package', '20', '', '2023-02-13 15:18:50', '2023-02-13 15:18:50'),
(87, 'There is no rider around for now to pick up your package', '27', '', '2023-02-14 01:21:46', '2023-02-14 01:21:46'),
(88, 'There is no rider around for now to pick up your package', '27', '', '2023-02-14 01:21:54', '2023-02-14 01:21:54'),
(89, 'There is no rider around for now to pick up your package', '27', '', '2023-02-14 01:22:01', '2023-02-14 01:22:01'),
(90, 'There is no rider around for now to pick up your package', '0', '', '2023-02-14 13:23:38', '2023-02-14 13:23:38'),
(91, 'There is no rider around for now to pick up your package', '0', '', '2023-02-14 13:24:17', '2023-02-14 13:24:17'),
(92, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Electronics) you are sending to Fd is 7936. Your date of request is 2023-02-10 17:05:16', '20', '408652', '2023-02-14 18:05:53', '2023-02-14 18:05:53'),
(93, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Electronics) you are sending to Ihj is 7934. Your date of request is 2023-02-10 17:05:16', '20', '408652', '2023-02-15 10:54:23', '2023-02-15 10:54:23'),
(94, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Electronics) you are sending to Ad is 1324. Your date of request is 2023-02-13 06:29:34', '20', '408652', '2023-02-15 11:21:57', '2023-02-15 11:21:57'),
(95, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Electronics) you are sending to Fd is 0461. Your date of request is 2023-02-13 15:18:50', '20', '408652', '2023-02-15 11:45:49', '2023-02-15 11:45:49'),
(96, 'Hi Okpongu Tamarautukpamobowei, your pickup code for this package (Food) you are sending to Daniel is 4039. Your date of request is 2023-02-14 13:24:17', '20', '408652', '2023-02-15 12:02:11', '2023-02-15 12:02:11'),
(97, 'There is no rider around for now to pick up your package', '20', '', '2023-02-15 16:16:28', '2023-02-15 16:16:28'),
(98, 'There is no rider around for now to pick up your package', '20', '', '2023-02-15 16:16:29', '2023-02-15 16:16:29'),
(99, 'There is no rider around for now to pick up your package', '20', '', '2023-02-15 16:17:04', '2023-02-15 16:17:04'),
(100, 'There is no rider around for now to pick up your package', '9059040', '', '2023-02-16 11:52:51', '2023-02-16 11:52:51'),
(101, 'There is no rider around for now to pick up your package', '20', '', '2023-02-16 16:09:29', '2023-02-16 16:09:29'),
(102, 'Hi Adelabu, your pickup code for this package (food) you are sending to perte rtouch is 0732. Your date of request is 2023-02-17 17:50:24', '1', '408652', '2023-02-17 19:21:41', '2023-02-17 19:21:41'),
(103, 'There is no rider around for now to pick up your package', '20', '', '2023-02-19 15:59:08', '2023-02-19 15:59:08'),
(104, 'There is no rider around for now to pick up your package', '20', '', '2023-02-19 15:59:16', '2023-02-19 15:59:16'),
(105, 'There is no rider around for now to pick up your package', '28', '', '2023-02-23 21:03:57', '2023-02-23 21:03:57'),
(106, 'There is no rider around for now to pick up your package', '28', '', '2023-02-23 21:04:06', '2023-02-23 21:04:06'),
(107, 'There is no rider around for now to pick up your package', '1', '', '2023-03-08 16:21:15', '2023-03-08 16:21:15'),
(108, 'There is no rider around for now to pick up your package', '20', '', '2023-03-08 16:25:56', '2023-03-08 16:25:56'),
(109, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 13:57:34', '2023-03-09 13:57:34'),
(110, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 13:57:37', '2023-03-09 13:57:37'),
(111, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 14:44:55', '2023-03-09 14:44:55'),
(112, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 14:44:58', '2023-03-09 14:44:58'),
(113, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 15:06:36', '2023-03-09 15:06:36'),
(114, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 16:20:02', '2023-03-09 16:20:02'),
(115, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 16:35:57', '2023-03-09 16:35:57'),
(116, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 16:36:44', '2023-03-09 16:36:44'),
(117, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 16:39:56', '2023-03-09 16:39:56'),
(118, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 16:41:03', '2023-03-09 16:41:03'),
(119, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 17:08:10', '2023-03-09 17:08:10'),
(120, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 17:11:14', '2023-03-09 17:11:14'),
(121, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 17:11:46', '2023-03-09 17:11:46'),
(122, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 17:18:45', '2023-03-09 17:18:45'),
(123, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 17:19:14', '2023-03-09 17:19:14'),
(124, 'There is no rider around for now to pick up your package', '1', '', '2023-03-09 17:22:25', '2023-03-09 17:22:25'),
(125, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 17:22:41', '2023-03-09 17:22:41'),
(126, 'There is no rider around for now to pick up your package', '20', '', '2023-03-09 17:22:53', '2023-03-09 17:22:53'),
(127, 'There is no rider around for now to pick up your package', '20', '', '2023-03-10 02:44:11', '2023-03-10 02:44:11'),
(128, 'There is no rider around for now to pick up your package', '20', '', '2023-03-10 02:44:13', '2023-03-10 02:44:13'),
(129, 'There is no rider around for now to pick up your package', '1', '', '2023-03-10 11:28:33', '2023-03-10 11:28:33'),
(130, 'There is no rider around for now to pick up your package', '1', '', '2023-03-10 11:28:35', '2023-03-10 11:28:35'),
(131, 'There is no rider around for now to pick up your package', '20', '', '2023-03-10 11:29:03', '2023-03-10 11:29:03'),
(132, 'There is no rider around for now to pick up your package', '28', '', '2023-03-13 21:43:42', '2023-03-13 21:43:42'),
(133, 'There is no rider around for now to pick up your package', '24', '', '2023-03-18 07:21:31', '2023-03-18 07:21:31'),
(134, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:46:08', '2023-03-22 12:46:08'),
(135, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:46:24', '2023-03-22 12:46:24'),
(136, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:46:33', '2023-03-22 12:46:33'),
(137, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:46:41', '2023-03-22 12:46:41'),
(138, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:48:16', '2023-03-22 12:48:16'),
(139, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:48:35', '2023-03-22 12:48:35'),
(140, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:48:50', '2023-03-22 12:48:50'),
(141, 'There is no rider around for now to pick up your package', '30', '', '2023-03-22 12:55:11', '2023-03-22 12:55:11'),
(142, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:51:54', '2023-03-24 15:51:54'),
(143, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:52:09', '2023-03-24 15:52:09'),
(144, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:52:27', '2023-03-24 15:52:27'),
(145, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:52:40', '2023-03-24 15:52:40'),
(146, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:52:51', '2023-03-24 15:52:51'),
(147, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:53:02', '2023-03-24 15:53:02'),
(148, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:53:42', '2023-03-24 15:53:42'),
(149, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:53:46', '2023-03-24 15:53:46'),
(150, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:53:52', '2023-03-24 15:53:52'),
(151, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:54:22', '2023-03-24 15:54:22'),
(152, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:54:27', '2023-03-24 15:54:27'),
(153, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:54:31', '2023-03-24 15:54:31'),
(154, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:54:34', '2023-03-24 15:54:34'),
(155, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:54:53', '2023-03-24 15:54:53'),
(156, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:54:56', '2023-03-24 15:54:56'),
(157, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:55:41', '2023-03-24 15:55:41'),
(158, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:56:06', '2023-03-24 15:56:06'),
(159, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:56:25', '2023-03-24 15:56:25'),
(160, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:56:41', '2023-03-24 15:56:41'),
(161, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:56:56', '2023-03-24 15:56:56'),
(162, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:57:18', '2023-03-24 15:57:18'),
(163, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:57:30', '2023-03-24 15:57:30'),
(164, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:57:47', '2023-03-24 15:57:47'),
(165, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:58:02', '2023-03-24 15:58:02'),
(166, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:58:23', '2023-03-24 15:58:23'),
(167, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:58:46', '2023-03-24 15:58:46'),
(168, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:58:52', '2023-03-24 15:58:52'),
(169, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:59:05', '2023-03-24 15:59:05'),
(170, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:59:29', '2023-03-24 15:59:29'),
(171, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 15:59:56', '2023-03-24 15:59:56'),
(172, 'There is no rider around for now to pick up your package', '30', '', '2023-03-24 16:00:04', '2023-03-24 16:00:04'),
(173, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:01:29', '2023-03-24 16:01:29'),
(174, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:01:34', '2023-03-24 16:01:34'),
(175, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:03:21', '2023-03-24 16:03:21'),
(176, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:04:05', '2023-03-24 16:04:05'),
(177, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:05:04', '2023-03-24 16:05:04'),
(178, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:05:21', '2023-03-24 16:05:21'),
(179, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:05:33', '2023-03-24 16:05:33'),
(180, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:05:56', '2023-03-24 16:05:56'),
(181, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:06:50', '2023-03-24 16:06:50'),
(182, 'There is no rider around for now to pick up your package', '29', '', '2023-03-24 16:07:36', '2023-03-24 16:07:36'),
(183, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 09:43:23', '2023-03-26 09:43:23'),
(184, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 09:43:56', '2023-03-26 09:43:56'),
(185, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 09:47:54', '2023-03-26 09:47:54'),
(186, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 09:48:10', '2023-03-26 09:48:10'),
(187, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 09:53:35', '2023-03-26 09:53:35'),
(188, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 11:14:36', '2023-03-26 11:14:36'),
(189, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 21:13:22', '2023-03-26 21:13:22'),
(190, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 21:13:54', '2023-03-26 21:13:54'),
(191, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 21:16:01', '2023-03-26 21:16:01'),
(192, 'There is no rider around for now to pick up your package', '31', '', '2023-03-26 21:16:58', '2023-03-26 21:16:58'),
(193, 'Hi Robinson Agaga , your pickup code for this package (Food) you are sending to Davivid is 7602. Your date of request is 2023-03-26 21:17:57', '31', '408652', '2023-03-27 06:43:07', '2023-03-27 06:43:07'),
(194, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 08:46:37', '2023-03-27 08:46:37'),
(195, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 09:02:59', '2023-03-27 09:02:59'),
(196, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 09:03:31', '2023-03-27 09:03:31'),
(197, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 15:50:43', '2023-03-27 15:50:43'),
(198, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 15:50:46', '2023-03-27 15:50:46'),
(199, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 15:52:22', '2023-03-27 15:52:22'),
(200, 'There is no rider around for now to pick up your package', '29', '', '2023-03-27 15:52:24', '2023-03-27 15:52:24'),
(201, 'There is no rider around for now to pick up your package', '31', '', '2023-03-31 10:36:56', '2023-03-31 10:36:56'),
(202, 'There is no rider around for now to pick up your package', '31', '', '2023-03-31 10:37:00', '2023-03-31 10:37:00'),
(203, 'There is no rider around for now to pick up your package', '9059040', '', '2023-03-31 12:38:03', '2023-03-31 12:38:03'),
(204, 'There is no rider around for now to pick up your package', '29', '', '2023-03-31 15:34:54', '2023-03-31 15:34:54'),
(205, 'There is no rider around for now to pick up your package', '29', '', '2023-03-31 15:35:06', '2023-03-31 15:35:06'),
(206, 'There is no rider around for now to pick up your package', '29', '', '2023-03-31 15:35:38', '2023-03-31 15:35:38'),
(207, 'There is no rider around for now to pick up your package', '29', '', '2023-03-31 15:35:50', '2023-03-31 15:35:50'),
(208, 'Hi Robinson Agaga , your pickup code for this package (Drinks) you are sending to Rita Jane is 8269. Your date of request is 2023-03-31 11:34:12', '31', 'VM-9288NJ', '2023-03-31 18:48:44', '2023-03-31 18:48:44'),
(209, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:25:24', '2023-04-03 13:25:24'),
(210, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:25:34', '2023-04-03 13:25:34'),
(211, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:25:52', '2023-04-03 13:25:52'),
(212, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:26:30', '2023-04-03 13:26:30'),
(213, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:27:07', '2023-04-03 13:27:07'),
(214, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:27:27', '2023-04-03 13:27:27'),
(215, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:28:25', '2023-04-03 13:28:25'),
(216, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:28:59', '2023-04-03 13:28:59'),
(217, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:29:03', '2023-04-03 13:29:03'),
(218, 'Hi Onyebuolise Elvis, your pickup code for this package (Drinks) you are sending to Festus is 6719. Your date of request is 2023-03-31 15:32:40', '29', 'AK-0770SE', '2023-04-03 13:29:34', '2023-04-03 13:29:34'),
(219, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:31:42', '2023-04-03 13:31:42'),
(220, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:54:32', '2023-04-03 13:54:32'),
(221, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:54:39', '2023-04-03 13:54:39'),
(222, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:55:51', '2023-04-03 13:55:51'),
(223, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:56:16', '2023-04-03 13:56:16'),
(224, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 13:57:44', '2023-04-03 13:57:44'),
(225, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 14:02:20', '2023-04-03 14:02:20'),
(226, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 14:56:53', '2023-04-03 14:56:53'),
(227, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:03:10', '2023-04-03 15:03:10'),
(228, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:03:11', '2023-04-03 15:03:11'),
(229, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:03:56', '2023-04-03 15:03:56'),
(230, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:05:00', '2023-04-03 15:05:00'),
(231, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:05:50', '2023-04-03 15:05:50'),
(232, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:22:08', '2023-04-03 15:22:08'),
(233, 'Hi Onyebuolise Elvis, your pickup code for this package (Drinks) you are sending to Michael is 3751. Your date of request is 2023-04-03 15:20:09', '29', 'DZ-6190UU', '2023-04-03 15:22:26', '2023-04-03 15:22:26'),
(234, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:23:24', '2023-04-03 15:23:24'),
(235, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 15:23:27', '2023-04-03 15:23:27'),
(236, 'There is no rider around for now to pick up your package', '20', '', '2023-04-03 19:21:37', '2023-04-03 19:21:37'),
(237, 'There is no rider around for now to pick up your package', '20', '', '2023-04-03 19:21:46', '2023-04-03 19:21:46'),
(238, 'There is no rider around for now to pick up your package', '20', '', '2023-04-03 21:12:24', '2023-04-03 21:12:24'),
(239, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 21:14:57', '2023-04-03 21:14:57'),
(240, 'There is no rider around for now to pick up your package', '29', '', '2023-04-03 21:15:00', '2023-04-03 21:15:00'),
(241, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 14:29:47', '2023-04-04 14:29:47'),
(242, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 14:30:04', '2023-04-04 14:30:04'),
(243, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 14:30:10', '2023-04-04 14:30:10'),
(244, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 14:30:28', '2023-04-04 14:30:28'),
(245, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 14:31:40', '2023-04-04 14:31:40'),
(246, 'Hi Onyebuolise Elvis, your pickup code for this package (Clothes) you are sending to Michael is 7186. Your date of request is 2023-04-04 16:08:44', '29', 'XT-6297DG', '2023-04-04 16:10:56', '2023-04-04 16:10:56'),
(247, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 16:13:50', '2023-04-04 16:13:50'),
(248, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 16:13:51', '2023-04-04 16:13:51'),
(249, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 16:14:05', '2023-04-04 16:14:05'),
(250, 'There is no rider around for now to pick up your package', '29', '', '2023-04-04 16:14:08', '2023-04-04 16:14:08'),
(251, 'Hi Onyebuolise Elvis, your pickup code for this package (Electronics) you are sending to Festus is 3827. Your date of request is 2023-04-05 08:48:58', '29', 'XT-6297DG', '2023-04-05 09:09:11', '2023-04-05 09:09:11'),
(252, 'There is no rider around for now to pick up your package', '31', '', '2023-04-05 10:19:07', '2023-04-05 10:19:07'),
(253, 'There is no rider around for now to pick up your package', '31', '', '2023-04-05 10:19:10', '2023-04-05 10:19:10'),
(254, 'Hi agaga robinson, your pickup code for this package (Grocery) you are sending to Terina B is 0356. Your date of request is 2023-04-05 10:23:18', '19', 'VM-9288NJ', '2023-04-05 10:27:05', '2023-04-05 10:27:05'),
(255, 'Hi agaga robinson, your pickup code for this package (Food) you are sending to Yeti Ade is 1907. Your date of request is 2023-04-05 10:43:28', '19', 'VM-9288NJ', '2023-04-05 10:44:58', '2023-04-05 10:44:58'),
(256, 'There is no rider around for now to pick up your package', '19', '', '2023-04-08 11:33:38', '2023-04-08 11:33:38'),
(257, 'There is no rider around for now to pick up your package', '19', '', '2023-04-08 11:33:38', '2023-04-08 11:33:38'),
(258, 'Your ride request has been reassigned to another rider', '29', '', '2023-04-08 11:52:42', '2023-04-08 11:52:42'),
(259, 'Your ride request has been reassigned to another rider', '29', '', '2023-04-08 11:52:44', '2023-04-08 11:52:44'),
(260, 'Your ride request has been reassigned to another rider', '19', '', '2023-04-08 21:19:07', '2023-04-08 21:19:07'),
(261, 'Your ride request has been reassigned to another rider', '19', '', '2023-04-08 21:19:09', '2023-04-08 21:19:09'),
(262, 'There is no rider around for now to pick up your package', '29', '', '2023-04-09 20:29:18', '2023-04-09 20:29:18'),
(263, 'There is no rider around for now to pick up your package', '29', '', '2023-04-09 20:31:56', '2023-04-09 20:31:56'),
(264, 'There is no rider around for now to pick up your package', '29', '', '2023-04-09 20:33:05', '2023-04-09 20:33:05'),
(265, 'There is no rider around for now to pick up your package', '20', '', '2023-05-10 13:38:56', '2023-05-10 13:38:56'),
(266, 'There is no rider around for now to pick up your package', '29', '', '2023-07-27 14:53:33', '2023-07-27 14:53:33'),
(267, 'There is no rider around for now to pick up your package', '24', '', '2023-07-28 14:54:55', '2023-07-28 14:54:55'),
(268, 'There is no rider around for now to pick up your package', '24', '', '2023-07-28 15:16:24', '2023-07-28 15:16:24'),
(269, 'There is no rider around for now to pick up your package', '39', '', '2023-08-02 10:16:03', '2023-08-02 10:16:03'),
(270, 'There is no rider around for now to pick up your package', '39', '', '2023-08-02 10:18:56', '2023-08-02 10:18:56'),
(271, 'There is no rider around for now to pick up your package', '39', '', '2023-08-11 14:39:18', '2023-08-11 14:39:18'),
(272, 'There is no rider around for now to pick up your package', '42', '', '2023-08-14 20:18:47', '2023-08-14 20:18:47'),
(273, 'There is no rider around for now to pick up your package', '42', '', '2023-08-14 20:28:37', '2023-08-14 20:28:37'),
(274, 'There is no rider around for now to pick up your package', '41', '', '2023-08-21 09:19:44', '2023-08-21 09:19:44'),
(275, 'There is no rider around for now to pick up your package', '41', '', '2023-08-21 09:40:18', '2023-08-21 09:40:18'),
(276, 'There is no rider around for now to pick up your package', '41', '', '2023-08-21 09:43:39', '2023-08-21 09:43:39'),
(277, 'There is no rider around for now to pick up your package', '41', '', '2023-08-21 09:48:05', '2023-08-21 09:48:05'),
(278, 'There is no rider around for now to pick up your package', '43', '', '2023-09-12 17:49:04', '2023-09-12 17:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `riderid` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `paymentid` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `flutterwave_status` varchar(200) NOT NULL,
  `flutterwave_success` varchar(200) NOT NULL,
  `flutterwave_transaction_id` varchar(200) NOT NULL,
  `tx_ref` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `client_id`, `amount`, `riderid`, `order_id`, `paymentid`, `status`, `flutterwave_status`, `flutterwave_success`, `flutterwave_transaction_id`, `tx_ref`, `created_at`, `updated_at`) VALUES
(2, '20', '350', '408652', '146', '0', 'ok', '', '', '', '', '2023-02-11 18:08:22', '2023-01-24 18:08:22'),
(3, '1', '4000', '408652', '147', '2', 'ok', '', '', '', '', '2023-02-14 18:08:22', '2023-01-24 18:08:22'),
(28, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 13:19:06', '2023-03-10 13:19:06'),
(27, 'null', '5000', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-10 02:51:17', '2023-03-10 02:51:17'),
(21, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-02-18 08:59:14', '2023-02-18 08:59:14'),
(26, 'null', '5000', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-10 02:49:27', '2023-03-10 02:49:27'),
(24, 'null', '5000', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-10 02:48:43', '2023-03-10 02:48:43'),
(25, 'null', '5000', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-10 02:48:45', '2023-03-10 02:48:45'),
(23, 'null', '5000', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-08 02:06:39', '2023-03-08 02:06:39'),
(22, 'null', '5000', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-08 02:02:02', '2023-03-08 02:02:02'),
(29, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 13:20:37', '2023-03-10 13:20:37'),
(30, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 13:24:47', '2023-03-10 13:24:47'),
(31, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 13:37:29', '2023-03-10 13:37:29'),
(32, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 13:51:52', '2023-03-10 13:51:52'),
(33, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 13:59:20', '2023-03-10 13:59:20'),
(34, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 14:04:01', '2023-03-10 14:04:01'),
(35, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 14:06:07', '2023-03-10 14:06:07'),
(36, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 14:06:12', '2023-03-10 14:06:12'),
(37, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 14:08:06', '2023-03-10 14:08:06'),
(38, '1', 'null', 'null', '176', '1', 'ok', '', '', '', '', '2023-03-10 14:19:55', '2023-03-10 14:19:55'),
(39, '1', '5000', '408652', '176', '1', 'ok', '', '', '', '', '2023-03-10 14:22:39', '2023-03-10 14:22:39'),
(54, '19', '500', 'VM-9288NJ', '317', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-05 10:29:09', '2023-04-05 10:29:09'),
(53, '29', '500', 'XT-6297DG', '314', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-05 09:19:08', '2023-04-05 09:19:08'),
(52, '29', '1100', 'XT-6297DG', '313', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-04 16:16:38', '2023-04-04 16:16:38'),
(51, '1', '3000', '40865', '178', '1', 'ok', 'success', 'success', '899kjjj', 't6yui88', '2023-03-18 09:08:16', '2023-03-18 09:08:16'),
(50, '1', '2000', '408652', '178', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-03-16 17:43:09', '2023-03-16 17:43:09'),
(55, '19', '500', 'VM-9288NJ', '318', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-05 10:46:54', '2023-04-05 10:46:54'),
(56, '34', '500', 'VM-9288NJ', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-20 05:50:13', '2023-04-20 05:50:13'),
(57, '28', 'null', 'null', '412', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-22 11:43:06', '2023-04-22 11:43:06'),
(58, '28', 'null', 'null', '412', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-22 11:43:24', '2023-04-22 11:43:24'),
(59, '28', '500', 'JD-0449IW', '412', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-22 11:45:59', '2023-04-22 11:45:59'),
(60, '28', '500', 'JD-0449IW', '413', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-22 12:07:47', '2023-04-22 12:07:47'),
(61, '28', '500', 'JD-0449IW', '414', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-22 12:16:51', '2023-04-22 12:16:51'),
(62, '28', 'null', 'null', '415', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-24 11:46:54', '2023-04-24 11:46:54'),
(63, '28', '2000', 'JD-0449IW', '415', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-24 11:49:22', '2023-04-24 11:49:22'),
(64, '28', '500', 'JD-0449IW', '416', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-04-24 12:52:10', '2023-04-24 12:52:10'),
(65, '28', '900', 'VM-9288NJ', '418', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-08 15:44:27', '2023-05-08 15:44:27'),
(66, '28', '500', 'JD-0449IW', '425', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-09 14:05:13', '2023-05-09 14:05:13'),
(67, '28', '500', 'JD-0449IW', '425', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-09 14:05:46', '2023-05-09 14:05:46'),
(68, '34', '500', 'VM-9288NJ', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-10 23:36:53', '2023-05-10 23:36:53'),
(69, '34', '500', 'VM-9288NJ', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-10 23:40:15', '2023-05-10 23:40:15'),
(70, '34', 'null', 'null', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 12:55:05', '2023-05-11 12:55:05'),
(71, '34', 'null', 'null', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 12:58:26', '2023-05-11 12:58:26'),
(72, '34', 'null', 'null', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 12:59:33', '2023-05-11 12:59:33'),
(73, '34', 'null', 'null', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 12:59:35', '2023-05-11 12:59:35'),
(74, '34', 'null', 'null', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 13:00:44', '2023-05-11 13:00:44'),
(75, '34', '500', 'VM-9288NJ', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 14:21:30', '2023-05-11 14:21:30'),
(76, '34', '500', 'VM-9288NJ', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 14:56:36', '2023-05-11 14:56:36'),
(77, '34', '500', 'VM-9288NJ', '411', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 15:50:41', '2023-05-11 15:50:41'),
(78, '19', '2400', '408652', '444', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-05-11 22:37:33', '2023-05-11 22:37:33'),
(79, '35', '500', 'LB-2998QG', '314', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-07-14 20:18:29', '2023-07-14 20:18:29'),
(80, '35', '500', 'LB-2998QG', '314', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-07-14 20:24:06', '2023-07-14 20:24:06'),
(81, '35', '500', 'LB-2998QG', '314', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-07-15 09:18:19', '2023-07-15 09:18:19'),
(82, '30', '500', 'OX-3402ZX', '467', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-07-28 12:38:48', '2023-07-28 12:38:48'),
(83, '39', '1500', 'YL-8326DG', '474', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-08-02 11:25:52', '2023-08-02 11:25:52'),
(84, '39', '7800', 'YL-8326DG', '475', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-08-05 12:18:23', '2023-08-05 12:18:23'),
(85, '39', '7800', 'YL-8326DG', '476', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-08-07 19:55:58', '2023-08-07 19:55:58'),
(86, '39', '2400', 'YL-8326DG', '485', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-08-11 15:14:58', '2023-08-11 15:14:58'),
(87, '42', '500', 'JZ-9881JK', '494', '1', 'ok', 'cash-success', 'cash-success', 'cash-success', 'cash-success', '2023-08-16 20:45:22', '2023-08-16 20:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pilots`
--

CREATE TABLE `pilots` (
  `id` int(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pilotID` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `online_status` varchar(200) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `verification_status` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `third_delivery` varchar(200) NOT NULL,
  `machine_manufacture` varchar(200) NOT NULL,
  `engine_size` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `bike_color` varchar(200) NOT NULL,
  `driver_license` varchar(200) NOT NULL,
  `expiry_date` varchar(200) NOT NULL,
  `valid_permit` varchar(200) NOT NULL,
  `bankName` varchar(200) NOT NULL,
  `accountName` varchar(200) NOT NULL,
  `accountNumber` varchar(200) NOT NULL,
  `company` varchar(200) NOT NULL,
  `companyCode` varchar(200) NOT NULL,
  `driver_license_pic` varchar(200) NOT NULL,
  `permit_pic` varchar(200) NOT NULL,
  `available_status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pilots`
--

INSERT INTO `pilots` (`id`, `firstname`, `lastname`, `picture`, `phone`, `password`, `pilotID`, `email`, `status`, `created_at`, `updated_at`, `online_status`, `verification_code`, `verification_status`, `address`, `third_delivery`, `machine_manufacture`, `engine_size`, `license_plate`, `bike_color`, `driver_license`, `expiry_date`, `valid_permit`, `bankName`, `accountName`, `accountNumber`, `company`, `companyCode`, `driver_license_pic`, `permit_pic`, `available_status`) VALUES
(160, 'Kemelayefa Olive', '', 'https://www.troopa.org/photos/83754.jpg', '+2347045195615', 'JDtHNUw7YGBgCmAK', 'WC-3805UK', 'kemelayefaolive@gmail.com', '1', '2023-08-22 12:30:25', '2023-08-22 12:30:25', '0', '2093', '1', 'Sunnyvale Estate Galadimawa Abuja', 'false', 'Qlink', '200cc', 'kj-1233', 'red', 'a133455', '2024-03-06', 'yes', 'Access Bank', 'Kemelayefa olive', '4737368358', 'none', 'none', 'https://www.troopa.org/photos/20210.jpg', 'https://www.troopa.org/photos/26776.jpg', 'offline'),
(159, 'Barry Aaren', '', 'https://www.troopa.org/photos/39827.jpg', '+2348120029028', 'JDtHNUw7YGBgCmAK', 'JZ-9881JK', 'barryaaren@gmail.com', '1', '2023-08-10 17:09:52', '2023-08-10 17:09:52', '0', '0521', '1', 'Methodist church street, Lagos', 'false', 'QLINK', '200cc', 'Lagos KJ-8200QH', 'Black', 'DISJSKK79', '2024-03-14', 'no', 'Not Valid', 'John Doe', '00000000', 'none', 'none', 'https://www.troopa.org/photos/38877.jpg', '', 'offline'),
(157, 'Paul Imoke', '', 'https://www.troopa.org/photos/20710.jpg', '+2348032454342', 'JDtHNUw7YGBgCmAK', 'YL-8326DG', 'pauleke65@gmail.com', '1', '2023-08-02 11:07:09', '2023-08-02 11:07:09', '0', '3029', '1', 'closeb', 'false', 'Suzuki', 'Kawa', 'Lag-773-Hb', 'Bl', 'hb', '2023-08-02', 'yes', 'hi', 'njnj', '135', 'none', 'none', 'https://www.troopa.org/photos/61041.jpg', 'https://www.troopa.org/photos/44842.jpg', 'offline'),
(156, 'Kofi Osei', '', 'https://www.troopa.org/photos/39235.jpg', '+2349010197681', 'JDtHNUw7YGBgCmAK', 'JH-3936KY', 'seiyefa@taiasprime.com', '1', '2023-07-29 11:13:27', '2023-07-29 11:13:27', '0', '0869', '1', 'QQ1', 'false', 'Qlink', '200cc', 'Lagos KJ-8006', 'black', 'D175393538', '2024-07-01', 'yes', 'Access Bank', 'Kofi Osei', '25376383639', 'none', 'none', 'https://www.troopa.org/photos/12449.jpg', 'https://www.troopa.org/photos/35251.jpg', 'online'),
(158, 'Ajala Tray', '', 'https://www.troopa.org/photos/40941.jpg', '+2348133712892', 'JDtHNUw7YGBgCmAK', 'BO-5545DY', 'temitopeajayi0402@gmail.com', '1', '2023-08-10 14:59:38', '2023-08-10 14:59:38', '0', '6914', '1', 'university of abuja', 'false', 'Bajaj', '200cc', 'ABJ207SE', 'blue', '123456789', '2024-08-01', 'yes', 'Access bank', 'Ajala Tray', '1130680999', 'none', 'none', 'https://www.troopa.org/photos/16544.jpg', 'https://www.troopa.org/photos/67314.jpg', 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `platformearning`
--

CREATE TABLE `platformearning` (
  `id` int(11) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `riderearning` varchar(200) NOT NULL,
  `platform_earning` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `platformearning`
--

INSERT INTO `platformearning` (`id`, `client_id`, `rider_id`, `amount`, `type`, `riderearning`, `platform_earning`, `created_at`, `updated_at`, `order_id`) VALUES
(40, '34', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-05-10 23:36:53', '2023-05-10 23:36:53', '411'),
(39, '28', 'JD-0449IW', '500', 'cash', '425', '75', '2023-05-09 14:05:46', '2023-05-09 14:05:46', '425'),
(38, '28', 'JD-0449IW', '500', 'cash', '425', '75', '2023-05-09 14:05:13', '2023-05-09 14:05:13', '425'),
(37, '28', 'VM-9288NJ', '900', 'cash', '765', '135', '2023-05-08 15:44:27', '2023-05-08 15:44:27', '418'),
(36, '28', 'JD-0449IW', '500', 'cash', '425', '75', '2023-04-24 12:52:10', '2023-04-24 12:52:10', '416'),
(35, '28', 'JD-0449IW', '2000', 'cash', '1700', '300', '2023-04-24 11:49:22', '2023-04-24 11:49:22', '415'),
(34, '28', 'JD-0449IW', '500', 'cash', '425', '75', '2023-04-22 12:16:51', '2023-04-22 12:16:51', '414'),
(33, '28', 'JD-0449IW', '500', 'cash', '425', '75', '2023-04-22 12:07:47', '2023-04-22 12:07:47', '413'),
(32, '28', 'JD-0449IW', '500', 'cash', '425', '75', '2023-04-22 11:45:59', '2023-04-22 11:45:59', '412'),
(31, '34', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-04-20 05:50:13', '2023-04-20 05:50:13', '411'),
(30, '19', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-04-05 10:46:54', '2023-04-05 10:46:54', '318'),
(29, '19', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-04-05 10:29:09', '2023-04-05 10:29:09', '317'),
(28, '29', 'XT-6297DG', '500', 'cash', '425', '75', '2023-04-05 09:19:08', '2023-04-05 09:19:08', '314'),
(27, '29', 'XT-6297DG', '1100', 'cash', '935', '165', '2023-04-04 16:16:38', '2023-04-04 16:16:38', '313'),
(26, '1', '408652', '2000', 'card', '1700', '300', '2023-03-16 17:43:09', '2023-03-16 17:43:09', '178'),
(41, '34', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-05-10 23:40:15', '2023-05-10 23:40:15', '411'),
(42, '34', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-05-11 14:21:30', '2023-05-11 14:21:30', '411'),
(43, '34', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-05-11 14:56:36', '2023-05-11 14:56:36', '411'),
(44, '34', 'VM-9288NJ', '500', 'cash', '425', '75', '2023-05-11 15:50:41', '2023-05-11 15:50:41', '411'),
(45, '19', '408652', '2400', 'cash', '2040', '360', '2023-05-11 22:37:33', '2023-05-11 22:37:33', '444'),
(46, '35', 'LB-2998QG', '500', 'cash', '425', '75', '2023-07-14 20:18:29', '2023-07-14 20:18:29', '314'),
(47, '35', 'LB-2998QG', '500', 'cash', '425', '75', '2023-07-14 20:24:06', '2023-07-14 20:24:06', '314'),
(48, '35', 'LB-2998QG', '500', 'cash', '425', '75', '2023-07-15 09:18:19', '2023-07-15 09:18:19', '314'),
(49, '30', 'OX-3402ZX', '500', 'cash', '425', '75', '2023-07-28 12:38:48', '2023-07-28 12:38:48', '467'),
(50, '39', 'YL-8326DG', '1500', 'cash', '1275', '225', '2023-08-02 11:25:52', '2023-08-02 11:25:52', '474'),
(51, '39', 'YL-8326DG', '7800', 'cash', '6630', '1170', '2023-08-05 12:18:23', '2023-08-05 12:18:23', '475'),
(52, '39', 'YL-8326DG', '7800', 'cash', '6630', '1170', '2023-08-07 19:55:58', '2023-08-07 19:55:58', '476'),
(53, '39', 'YL-8326DG', '2400', 'cash', '2040', '360', '2023-08-11 15:14:58', '2023-08-11 15:14:58', '485'),
(54, '42', 'JZ-9881JK', '500', 'cash', '425', '75', '2023-08-16 20:45:22', '2023-08-16 20:45:22', '494');

-- --------------------------------------------------------

--
-- Table structure for table `riderMessaging`
--

CREATE TABLE `riderMessaging` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `fcmid` varchar(2000) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `riderMessaging`
--

INSERT INTO `riderMessaging` (`id`, `rider_id`, `fcmid`, `created_at`, `updated_at`) VALUES
(6, 'VM-9288NJ', 'fDjedRA7QNuIL3bse7eHTF:APA91bE_HfRzjF2N0Ajod7McZK0ZqOpM4s1WAPwQd3equmOmJVLDVqUYQVc0mO8L8lmj_Oig-Cqj8W0E9fCKV0BGNV7vPHD2Ah5gp3KE_kYcWgJHCGpS2po47OYf4NJ_BbbI5X9WMY86', '2023-04-06 17:13:33', '2023-04-06 17:13:33'),
(5, '408652', 'f4kie6LhQbiTzzqZVTtiv_:APA91bGuZeO0d7YvrKC3vn50SNuWR9bl9Zww3_nLtMov87WvGWtO03CQS2sYKlUCtxdXv5UGQYdfIhH7Q91bON4tVvmeTjazLmMvDoBGCxJBCMx-MCuMv7nGymjfROICeOthXEYOXump', '2023-04-06 15:42:36', '2023-04-06 15:42:36'),
(7, 'GC-9251SP', 'e1rooPCERmi3d7fvVbZT__:APA91bFIsUeAe9CuNyToKE6G8-xcOA6ExqMtnsLPtqUEUtWD-OGEsqUYvHRkOIL8x4hP-1vpWA8QbehtR7D9nV7qNj0d5Pps4XYMCpE903zr3OZGl9c1zv34CnXD302AzXsQN0H3VlPU', '2023-04-07 00:45:18', '2023-04-07 00:45:18'),
(9, 'null', 'e1rooPCERmi3d7fvVbZT__:APA91bFIsUeAe9CuNyToKE6G8-xcOA6ExqMtnsLPtqUEUtWD-OGEsqUYvHRkOIL8x4hP-1vpWA8QbehtR7D9nV7qNj0d5Pps4XYMCpE903zr3OZGl9c1zv34CnXD302AzXsQN0H3VlPU', '2023-04-08 12:29:10', '2023-04-08 12:29:10'),
(10, 'JD-0449IW', 'em2TfrDnQVWmatU3-pNrXh:APA91bF5B96PpqDps8zoVm2AYwR56JU9NmWSn5FNvyhvIz-9YZWNlE4oyRhNZYdUnrN5yNr6X-Qsz7q7DR1jIke5CxJ4nut-cRJ86wiGZ90GYP-sd6KP2n2cWQTPg3kYAyMbb5rxl1SY', '2023-04-22 11:12:56', '2023-04-22 11:12:56'),
(11, 'AK-0770SE', 'dlwQUpD2S6CHF3NuEZQq6F:APA91bGUxP2YSEuOLDbQzpQTHfAHpYzD6mbZlF3kDzsk9jGeR2X2RnOgpKbTN2IEv6fKkhdlEb1gorGfzHykZAsaSAdWrUUuVajyjlG8dRJ9tJlDU_PKQ05E6g-BndY4PCZ4ygTWHGb9', '2023-05-09 10:18:44', '2023-05-09 10:18:44'),
(12, 'BO-5545DY', 'fYN3kmk0SKSjrxAVyTT3ym:APA91bF4M-U0CDaPEQyJq2u3x4AFDGTCNqYzzjbNXjr5ZeTO3PRn-oAXEejNCNdW6yQ39ybqMRRWOzaxiK5bImkzef0UlY-Sxm3dyVJjDdUsBBXF6vTNzFovNk4VF-9hMWSBrjKjdPfI', '2023-08-10 15:00:36', '2023-08-10 15:00:36'),
(13, 'JZ-9881JK', 'dHSkyRA1QLy3DGQXhYpnrD:APA91bHddo_EfPIqaNOj95QuUl3bSQWjD-8wnIlHeILjeqPas4BcUBvaf-_OuyIqqOLCCUPoJb2_o868eytLSQWPEZAdTWDXySbvsKmPhkG6QSX4kDDYaVzKYFFfFhX0mKsowYzh-Vo2', '2023-08-13 14:44:14', '2023-08-13 14:44:14'),
(14, 'WC-3805UK', 'ep7RrF56RuePo55Wgw8uc3:APA91bGqR4hcXljmzerb8VrS6ssyWP_JKzZrcK9_ZfI0TafiC33XawcLyB4f3_MKR6Q-Wt-Xm6Fa4SBeA3_5hh1FvHClj-mLuks2FzXRFnA56H32H3TO9R4pw5QN_8_BuVcsT7NJ-_Z8', '2023-08-22 12:31:23', '2023-08-22 12:31:23');

-- --------------------------------------------------------

--
-- Table structure for table `rider_alert_msg`
--

CREATE TABLE `rider_alert_msg` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `msg` varchar(200) NOT NULL,
  `read_status` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rider_alert_msg`
--

INSERT INTO `rider_alert_msg` (`id`, `rider_id`, `msg`, `read_status`, `created_at`, `updated_at`) VALUES
(1, 'VM-9288NJ', 'i love you suir', 1, '2023-04-07 12:57:15', '2023-04-07 12:57:15'),
(2, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 11:50:07', '2023-04-08 11:50:07'),
(3, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 11:50:10', '2023-04-08 11:50:10'),
(4, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 11:52:42', '2023-04-08 11:52:42'),
(5, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 11:52:44', '2023-04-08 11:52:44'),
(6, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 13:01:20', '2023-04-08 13:01:20'),
(7, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 13:06:37', '2023-04-08 13:06:37'),
(8, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 13:06:39', '2023-04-08 13:06:39'),
(9, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 13:08:50', '2023-04-08 13:08:50'),
(10, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 13:08:53', '2023-04-08 13:08:53'),
(11, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 13:13:20', '2023-04-08 13:13:20'),
(12, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 14:09:39', '2023-04-08 14:09:39'),
(13, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 14:32:29', '2023-04-08 14:32:29'),
(14, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 20:15:28', '2023-04-08 20:15:28'),
(15, 'VM-9288NJ', 'Onyebuolise Elvis has cancelled his ride request', 1, '2023-04-08 20:48:40', '2023-04-08 20:48:40'),
(16, 'VM-9288NJ', 'Onyebuolise Elvis has cancelled his ride request', 1, '2023-04-08 20:54:52', '2023-04-08 20:54:52'),
(17, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 21:18:05', '2023-04-08 21:18:05'),
(18, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 21:18:07', '2023-04-08 21:18:07'),
(19, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 21:18:38', '2023-04-08 21:18:38'),
(20, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 21:18:40', '2023-04-08 21:18:40'),
(21, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 21:19:07', '2023-04-08 21:19:07'),
(22, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 21:19:09', '2023-04-08 21:19:09'),
(23, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 21:59:36', '2023-04-08 21:59:36'),
(24, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:01:35', '2023-04-08 22:01:35'),
(25, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:01:39', '2023-04-08 22:01:39'),
(26, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:03:38', '2023-04-08 22:03:38'),
(27, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:03:42', '2023-04-08 22:03:42'),
(28, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:04:12', '2023-04-08 22:04:12'),
(29, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:04:15', '2023-04-08 22:04:15'),
(30, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:08:55', '2023-04-08 22:08:55'),
(31, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:11:39', '2023-04-08 22:11:39'),
(32, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:11:40', '2023-04-08 22:11:40'),
(33, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:20:51', '2023-04-08 22:20:51'),
(34, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:20:53', '2023-04-08 22:20:53'),
(35, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:21:44', '2023-04-08 22:21:44'),
(36, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:21:46', '2023-04-08 22:21:46'),
(37, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:47:00', '2023-04-08 22:47:00'),
(38, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:49:27', '2023-04-08 22:49:27'),
(39, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:49:30', '2023-04-08 22:49:30'),
(40, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:50:38', '2023-04-08 22:50:38'),
(41, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 22:50:40', '2023-04-08 22:50:40'),
(42, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 23:02:37', '2023-04-08 23:02:37'),
(43, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-08 23:04:44', '2023-04-08 23:04:44'),
(44, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:12:48', '2023-04-08 23:12:48'),
(45, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:16:30', '2023-04-08 23:16:30'),
(46, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:19:21', '2023-04-08 23:19:21'),
(47, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:29:19', '2023-04-08 23:29:19'),
(48, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:29:21', '2023-04-08 23:29:21'),
(49, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:29:40', '2023-04-08 23:29:40'),
(50, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:30:55', '2023-04-08 23:30:55'),
(51, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:30:57', '2023-04-08 23:30:57'),
(52, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:32:21', '2023-04-08 23:32:21'),
(53, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:39:05', '2023-04-08 23:39:05'),
(54, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:40:12', '2023-04-08 23:40:12'),
(55, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:40:14', '2023-04-08 23:40:14'),
(56, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:42:04', '2023-04-08 23:42:04'),
(57, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:42:06', '2023-04-08 23:42:06'),
(58, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:48:29', '2023-04-08 23:48:29'),
(59, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:50:18', '2023-04-08 23:50:18'),
(60, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:51:24', '2023-04-08 23:51:24'),
(61, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-08 23:54:59', '2023-04-08 23:54:59'),
(62, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-09 00:15:19', '2023-04-09 00:15:19'),
(63, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-04-09 00:49:14', '2023-04-09 00:49:14'),
(64, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-09 20:36:16', '2023-04-09 20:36:16'),
(65, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-09 20:45:25', '2023-04-09 20:45:25'),
(66, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-04-09 20:48:02', '2023-04-09 20:48:02'),
(67, 'VM-9288NJ', 'You have a delivery request from Andy Kay', 1, '2023-04-15 14:29:32', '2023-04-15 14:29:32'),
(68, 'VM-9288NJ', 'You have a delivery request from Paradise Kolosi ', 1, '2023-04-20 05:43:52', '2023-04-20 05:43:52'),
(69, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-04-22 11:26:24', '2023-04-22 11:26:24'),
(70, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-04-22 11:56:42', '2023-04-22 11:56:42'),
(71, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-04-22 12:09:12', '2023-04-22 12:09:12'),
(72, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-04-22 12:13:06', '2023-04-22 12:13:06'),
(73, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-04-24 11:36:51', '2023-04-24 11:36:51'),
(74, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-04-24 12:41:26', '2023-04-24 12:41:26'),
(75, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-04-24 12:53:50', '2023-04-24 12:53:50'),
(76, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-04-24 12:54:41', '2023-04-24 12:54:41'),
(77, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-04-24 12:56:29', '2023-04-24 12:56:29'),
(78, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-04-24 12:56:34', '2023-04-24 12:56:34'),
(79, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-04-24 12:56:38', '2023-04-24 12:56:38'),
(80, 'VM-9288NJ', 'You have a delivery request from Cyril Duke', 1, '2023-05-06 12:12:57', '2023-05-06 12:12:57'),
(81, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-05-07 18:27:06', '2023-05-07 18:27:06'),
(82, 'AK-0770SE', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-05-09 10:25:01', '2023-05-09 10:25:01'),
(83, 'AK-0770SE', 'Onyebuolise Elvis has cancelled the ride request', 1, '2023-05-09 13:03:51', '2023-05-09 13:03:51'),
(84, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-05-09 13:08:30', '2023-05-09 13:08:30'),
(85, 'VM-9288NJ', 'Onyebuolise Elvis has cancelled the ride request', 1, '2023-05-09 13:09:49', '2023-05-09 13:09:49'),
(86, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-05-09 13:13:34', '2023-05-09 13:13:34'),
(87, 'VM-9288NJ', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-05-09 13:29:12', '2023-05-09 13:29:12'),
(88, 'VM-9288NJ', 'You have a delivery request from Cyril Duke', 1, '2023-05-09 13:32:49', '2023-05-09 13:32:49'),
(89, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-05-09 13:41:25', '2023-05-09 13:41:25'),
(90, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-05-10 08:26:35', '2023-05-10 08:26:35'),
(91, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-05-10 08:28:44', '2023-05-10 08:28:44'),
(92, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-05-10 08:36:56', '2023-05-10 08:36:56'),
(93, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-05-10 08:41:51', '2023-05-10 08:41:51'),
(94, 'JD-0449IW', 'You have a delivery request from Cyril Duke', 1, '2023-05-10 08:42:48', '2023-05-10 08:42:48'),
(95, 'JD-0449IW', 'Cyril Duke has cancelled the ride request', 1, '2023-05-10 08:44:21', '2023-05-10 08:44:21'),
(96, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 08:52:32', '2023-05-10 08:52:32'),
(97, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 08:55:30', '2023-05-10 08:55:30'),
(98, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 08:56:35', '2023-05-10 08:56:35'),
(99, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 09:01:28', '2023-05-10 09:01:28'),
(100, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 09:03:02', '2023-05-10 09:03:02'),
(101, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 09:06:57', '2023-05-10 09:06:57'),
(102, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 09:10:30', '2023-05-10 09:10:30'),
(103, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 09:11:42', '2023-05-10 09:11:42'),
(104, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 12:03:17', '2023-05-10 12:03:17'),
(105, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 12:07:56', '2023-05-10 12:07:56'),
(106, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 12:11:10', '2023-05-10 12:11:10'),
(107, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 12:12:51', '2023-05-10 12:12:51'),
(108, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 12:24:08', '2023-05-10 12:24:08'),
(109, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 12:26:20', '2023-05-10 12:26:20'),
(110, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 12:41:05', '2023-05-10 12:41:05'),
(111, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 12:41:48', '2023-05-10 12:41:48'),
(112, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 13:29:00', '2023-05-10 13:29:00'),
(113, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 13:30:48', '2023-05-10 13:30:48'),
(114, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 13:32:36', '2023-05-10 13:32:36'),
(115, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 13:32:55', '2023-05-10 13:32:55'),
(116, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 13:41:26', '2023-05-10 13:41:26'),
(117, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 13:47:40', '2023-05-10 13:47:40'),
(118, 'JD-0449IW', 'Okpongu Tamarautukpamobowei has cancelled the ride request', 1, '2023-05-10 13:49:04', '2023-05-10 13:49:04'),
(119, 'JD-0449IW', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-05-10 13:49:25', '2023-05-10 13:49:25'),
(120, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-05-10 18:21:18', '2023-05-10 18:21:18'),
(121, 'AK-0770SE', 'Seiyefa Olive has cancelled the ride request', 1, '2023-05-10 18:21:44', '2023-05-10 18:21:44'),
(122, '408652', 'You have a delivery request from agaga robinson', 1, '2023-05-11 22:22:42', '2023-05-11 22:22:42'),
(123, 'VM-9288NJ', 'You have a delivery request from agaga robinson', 1, '2023-05-12 01:28:09', '2023-05-12 01:28:09'),
(124, '408652', 'You have a delivery request from agaga robinson', 1, '2023-05-12 01:33:10', '2023-05-12 01:33:10'),
(125, 'AK-0770SE', 'You have a delivery request from Joy Omowa ', 1, '2023-06-04 20:06:28', '2023-06-04 20:06:28'),
(126, 'AK-0770SE', 'Joy Omowa  has cancelled the ride request', 1, '2023-06-04 20:07:24', '2023-06-04 20:07:24'),
(127, 'AK-0770SE', 'Joy Omowa  has cancelled the ride request', 1, '2023-06-04 20:07:34', '2023-06-04 20:07:34'),
(128, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-26 09:00:49', '2023-07-26 09:00:49'),
(129, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-26 11:28:16', '2023-07-26 11:28:16'),
(130, 'AK-0770SE', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-07-26 11:59:04', '2023-07-26 11:59:04'),
(131, 'AK-0770SE', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-07-26 12:01:51', '2023-07-26 12:01:51'),
(132, 'AK-0770SE', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-07-26 12:02:52', '2023-07-26 12:02:52'),
(133, 'AK-0770SE', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-07-26 12:04:16', '2023-07-26 12:04:16'),
(134, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 12:31:30', '2023-07-27 12:31:30'),
(135, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 12:40:57', '2023-07-27 12:40:57'),
(136, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 12:48:43', '2023-07-27 12:48:43'),
(137, 'AK-0770SE', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-07-27 13:05:47', '2023-07-27 13:05:47'),
(138, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 13:24:59', '2023-07-27 13:24:59'),
(139, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 13:51:36', '2023-07-27 13:51:36'),
(140, 'AK-0770SE', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 14:04:57', '2023-07-27 14:04:57'),
(141, 'AK-0770SE', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-07-27 14:43:47', '2023-07-27 14:43:47'),
(142, 'JD-0449IW', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-07-27 14:51:16', '2023-07-27 14:51:16'),
(143, 'JD-0449IW', 'You have a delivery request from Onyebuolise Elvis', 1, '2023-07-27 14:55:52', '2023-07-27 14:55:52'),
(144, 'JD-0449IW', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-27 18:16:30', '2023-07-27 18:16:30'),
(145, 'OX-3402ZX', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-28 12:36:02', '2023-07-28 12:36:02'),
(146, 'JH-3936KY', 'You have a delivery request from Seiyefa Olive', 1, '2023-07-29 11:21:36', '2023-07-29 11:21:36'),
(147, 'YL-8326DG', 'You have a delivery request from Magic Vendor', 1, '2023-08-02 11:21:53', '2023-08-02 11:21:53'),
(148, 'YL-8326DG', 'You have a delivery request from Magic Vendor', 1, '2023-08-05 12:16:55', '2023-08-05 12:16:55'),
(149, 'YL-8326DG', 'You have a delivery request from Magic Vendor', 1, '2023-08-05 14:20:28', '2023-08-05 14:20:28'),
(150, 'YL-8326DG', 'You have a delivery request from Okpongu Tamarautukpamobowei', 1, '2023-08-08 15:16:05', '2023-08-08 15:16:05'),
(151, 'BO-5545DY', 'You have a delivery request from Seiyefa Goodluck ', 1, '2023-08-11 10:38:50', '2023-08-11 10:38:50'),
(152, 'BO-5545DY', 'You have a delivery request from Seiyefa Goodluck ', 1, '2023-08-11 10:45:28', '2023-08-11 10:45:28'),
(153, 'BO-5545DY', 'You have a delivery request from Temitope yusuf', 1, '2023-08-11 12:43:51', '2023-08-11 12:43:51'),
(154, 'BO-5545DY', 'You have a delivery request from Temitope yusuf', 1, '2023-08-11 12:45:44', '2023-08-11 12:45:44'),
(155, 'YL-8326DG', 'You have a delivery request from Magic Vendor', 1, '2023-08-11 15:02:37', '2023-08-11 15:02:37'),
(156, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-14 23:01:36', '2023-08-14 23:01:36'),
(157, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-14 23:29:24', '2023-08-14 23:29:24'),
(158, 'JZ-9881JK', 'Victor Olusoji has cancelled the ride request', 1, '2023-08-15 07:48:23', '2023-08-15 07:48:23'),
(159, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-15 07:54:49', '2023-08-15 07:54:49'),
(160, 'JZ-9881JK', 'Victor Olusoji has cancelled the ride request', 1, '2023-08-15 13:13:34', '2023-08-15 13:13:34'),
(161, 'BO-5545DY', 'You have a delivery request from Victor Olusoji', 1, '2023-08-15 13:19:09', '2023-08-15 13:19:09'),
(162, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-15 13:21:23', '2023-08-15 13:21:23'),
(163, 'JZ-9881JK', 'Victor Olusoji has cancelled the ride request', 1, '2023-08-15 13:25:09', '2023-08-15 13:25:09'),
(164, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-15 13:26:49', '2023-08-15 13:26:49'),
(165, 'JZ-9881JK', 'Victor Olusoji has cancelled the ride request', 1, '2023-08-15 23:43:33', '2023-08-15 23:43:33'),
(166, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-15 23:45:26', '2023-08-15 23:45:26'),
(167, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-17 18:52:02', '2023-08-17 18:52:02'),
(168, 'BO-5545DY', 'You have a delivery request from Temitope yusuf', 1, '2023-08-21 09:28:11', '2023-08-21 09:28:11'),
(169, 'BO-5545DY', 'You have a delivery request from Temitope yusuf', 1, '2023-08-21 09:31:25', '2023-08-21 09:31:25'),
(170, 'BO-5545DY', 'You have a delivery request from Seiyefa Goodluck ', 1, '2023-08-21 12:11:58', '2023-08-21 12:11:58'),
(171, 'BO-5545DY', 'Seiyefa Goodluck  has cancelled the ride request', 1, '2023-08-21 16:57:13', '2023-08-21 16:57:13'),
(172, 'YL-8326DG', 'You have a delivery request from Temitope yusuf', 1, '2023-08-22 12:43:13', '2023-08-22 12:43:13'),
(173, 'WC-3805UK', 'You have a delivery request from Temitope yusuf', 1, '2023-08-22 12:46:59', '2023-08-22 12:46:59'),
(174, 'WC-3805UK', 'Temitope yusuf has cancelled the ride request', 1, '2023-08-22 12:49:52', '2023-08-22 12:49:52'),
(175, 'JZ-9881JK', 'Victor Olusoji has cancelled the ride request', 1, '2023-08-22 23:25:34', '2023-08-22 23:25:34'),
(176, 'JZ-9881JK', 'You have a delivery request from Victor Olusoji', 1, '2023-08-22 23:44:53', '2023-08-22 23:44:53'),
(177, 'WC-3805UK', 'You have a delivery request from Tosin Boolu', 1, '2023-09-12 17:35:49', '2023-09-12 17:35:49'),
(178, 'BO-5545DY', 'You have a delivery request from Tosin Boolu', 1, '2023-09-12 17:38:46', '2023-09-12 17:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `rider_bonus`
--

CREATE TABLE `rider_bonus` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `riderbonus` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rider_pin_store`
--

CREATE TABLE `rider_pin_store` (
  `id` int(11) NOT NULL,
  `riderID` varchar(200) NOT NULL,
  `pin` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rider_pin_store`
--

INSERT INTO `rider_pin_store` (`id`, `riderID`, `pin`, `created_at`, `updated_at`) VALUES
(2, 'LB-2998QyyG', '768', '2023-06-26 09:55:01', '2023-06-26 09:55:01'),
(3, 'LB-2998QG', '1234', '2023-06-27 00:42:07', '2023-06-27 00:42:07'),
(4, 'LB-2998QG', '1234', '2023-06-27 00:42:27', '2023-06-27 00:42:27'),
(5, 'LB-2998QG', '1234', '2023-06-27 01:40:29', '2023-06-27 01:40:29'),
(6, 'LB-2998QG', '1234', '2023-06-27 01:47:17', '2023-06-27 01:47:17'),
(7, 'LB-2998QG', '1234', '2023-07-14 19:59:03', '2023-07-14 19:59:03'),
(8, 'LB-2998QG', '1234', '2023-07-15 08:29:30', '2023-07-15 08:29:30'),
(9, '408652', '1234', '2023-07-24 17:28:26', '2023-07-24 17:28:26'),
(10, 'TG-2379BO', '3853', '2023-07-25 19:48:32', '2023-07-25 19:48:32'),
(11, 'JD-0449IW', '4199', '2023-07-27 13:47:57', '2023-07-27 13:47:57'),
(12, 'OX-3402ZX', '1234', '2023-07-28 12:23:12', '2023-07-28 12:23:12'),
(13, 'LB-2998QG', '1234', '2023-07-28 14:07:59', '2023-07-28 14:07:59'),
(14, 'JD-0449IW', '9144', '2023-07-28 15:10:51', '2023-07-28 15:10:51'),
(15, 'JD-0449IW', '9144', '2023-07-28 15:13:35', '2023-07-28 15:13:35'),
(16, 'JH-3936KY', '4199', '2023-07-29 11:15:19', '2023-07-29 11:15:19'),
(17, 'JH-3936KY', '1234', '2023-07-29 15:04:04', '2023-07-29 15:04:04'),
(18, 'JH-3936KY', '1234', '2023-08-01 11:45:15', '2023-08-01 11:45:15'),
(19, 'YL-8326DG', '1234', '2023-08-02 11:19:41', '2023-08-02 11:19:41'),
(20, 'BO-5545DY', '0000', '2023-08-10 15:30:09', '2023-08-10 15:30:09'),
(21, 'JZ-9881JK', '1111', '2023-08-10 19:33:56', '2023-08-10 19:33:56'),
(22, 'JZ-9881JK', '1111', '2023-08-11 13:07:44', '2023-08-11 13:07:44'),
(23, 'JZ-9881JK', '1111', '2023-08-13 14:45:11', '2023-08-13 14:45:11'),
(24, 'JZ-9881JK', '1111', '2023-08-13 16:36:23', '2023-08-13 16:36:23'),
(25, 'JZ-9881JK', '1111', '2023-08-13 16:44:35', '2023-08-13 16:44:35'),
(26, 'JZ-9881JK', '1111', '2023-08-13 16:52:56', '2023-08-13 16:52:56'),
(27, 'JZ-9881JK', '1111', '2023-08-13 16:59:59', '2023-08-13 16:59:59'),
(28, 'JZ-9881JK', '1111', '2023-08-13 17:09:55', '2023-08-13 17:09:55'),
(29, 'JZ-9881JK', '1111', '2023-08-13 17:22:01', '2023-08-13 17:22:01'),
(30, 'JZ-9881JK', '1111', '2023-08-14 20:01:34', '2023-08-14 20:01:34'),
(31, 'JZ-9881JK', '1111', '2023-08-16 00:18:18', '2023-08-16 00:18:18'),
(32, 'JZ-9881JK', '1111', '2023-08-16 15:09:02', '2023-08-16 15:09:02'),
(33, 'JZ-9881JK', '1111', '2023-08-16 15:35:11', '2023-08-16 15:35:11'),
(34, 'JZ-9881JK', '1111', '2023-08-16 19:56:13', '2023-08-16 19:56:13'),
(35, 'BO-5545DY', '0000', '2023-08-21 09:02:27', '2023-08-21 09:02:27'),
(36, 'BO-5545DY', '0000', '2023-08-21 09:47:05', '2023-08-21 09:47:05'),
(37, 'WC-3805UK', '4199', '2023-08-22 12:34:59', '2023-08-22 12:34:59'),
(38, 'JZ-9881JK', '1111', '2023-08-22 23:11:49', '2023-08-22 23:11:49'),
(39, 'JZ-9881JK', '1111', '2023-08-31 20:00:48', '2023-08-31 20:00:48'),
(40, 'JZ-9881JK', '1111', '2023-08-31 20:44:26', '2023-08-31 20:44:26'),
(41, 'BO-5545DY', '0000', '2023-09-12 17:42:11', '2023-09-12 17:42:11'),
(42, 'BO-5545DY', '0000', '2023-09-13 10:18:39', '2023-09-13 10:18:39');

-- --------------------------------------------------------

--
-- Table structure for table `rider_progress_track`
--

CREATE TABLE `rider_progress_track` (
  `id` int(11) NOT NULL,
  `pickup_location_status` int(11) NOT NULL,
  `dropoff_location_status` int(11) NOT NULL,
  `order_pay_status` varchar(200) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rider_progress_track`
--

INSERT INTO `rider_progress_track` (`id`, `pickup_location_status`, `dropoff_location_status`, `order_pay_status`, `order_id`, `created_at`, `updated_at`) VALUES
(24, 1, 1, '0', 134, '2023-02-10 16:09:37', '2023-02-10 16:09:37'),
(23, 1, 1, '0', 131, '2023-02-10 04:27:41', '2023-02-10 04:27:41'),
(22, 1, 1, '0', 101, '2023-01-30 18:59:03', '2023-01-30 18:59:03'),
(21, 1, 1, '0', 3, '2023-01-29 23:00:52', '2023-01-29 23:00:52'),
(20, 1, 1, '0', 4, '2023-01-29 22:33:55', '2023-01-29 22:33:55'),
(25, 1, 1, '0', 146, '2023-02-14 18:05:53', '2023-02-14 18:05:53'),
(26, 1, 1, '0', 147, '2023-02-15 10:54:23', '2023-02-15 10:54:23'),
(27, 1, 1, '0', 166, '2023-02-15 11:21:57', '2023-02-15 11:21:57'),
(28, 1, 1, '0', 167, '2023-02-15 11:45:49', '2023-02-15 11:45:49'),
(29, 1, 1, '0', 172, '2023-02-15 12:02:11', '2023-02-15 12:02:11'),
(30, 1, 1, '0', 176, '2023-02-17 19:21:41', '2023-02-17 19:21:41'),
(31, 1, 0, '0', 269, '2023-03-27 06:43:07', '2023-03-27 06:43:07'),
(32, 1, 0, '0', 279, '2023-03-31 18:48:44', '2023-03-31 18:48:44'),
(33, 1, 1, '0', 283, '2023-04-03 13:29:34', '2023-04-03 13:29:34'),
(34, 1, 1, '0', 301, '2023-04-03 15:22:26', '2023-04-03 15:22:26'),
(35, 1, 1, '0', 313, '2023-04-04 16:10:56', '2023-04-04 16:10:56'),
(36, 1, 1, '0', 314, '2023-04-05 09:09:11', '2023-04-05 09:09:11'),
(37, 1, 1, '0', 317, '2023-04-05 10:27:05', '2023-04-05 10:27:05'),
(38, 1, 1, '0', 318, '2023-04-05 10:44:58', '2023-04-05 10:44:58'),
(39, 1, 1, '0', 411, '2023-04-20 05:47:49', '2023-04-20 05:47:49'),
(40, 1, 1, '0', 412, '2023-04-22 11:36:22', '2023-04-22 11:36:22'),
(41, 1, 1, '0', 413, '2023-04-22 12:01:40', '2023-04-22 12:01:40'),
(42, 1, 1, '0', 414, '2023-04-22 12:15:17', '2023-04-22 12:15:17'),
(43, 1, 1, '0', 415, '2023-04-24 11:42:09', '2023-04-24 11:42:09'),
(44, 1, 1, '0', 416, '2023-04-24 12:46:48', '2023-04-24 12:46:48'),
(45, 1, 1, '0', 417, '2023-04-24 12:54:56', '2023-04-24 12:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `rider_time_online`
--

CREATE TABLE `rider_time_online` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `online_time` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rider_time_online`
--

INSERT INTO `rider_time_online` (`id`, `rider_id`, `online_time`, `created_at`, `updated_at`) VALUES
(12, '408652', '06:43:55', '2023-02-09 17:01:44', '2023-02-09 17:01:44'),
(14, '276543', '00:00:35', '2023-03-20 21:09:24', '2023-03-20 21:09:24'),
(13, '426538', '00:36:35', '2023-02-10 18:00:54', '2023-02-10 18:00:54'),
(15, 'GC-9251SP', '00:06:30', '2023-03-22 18:38:04', '2023-03-22 18:38:04'),
(16, 'PF-2984JN', '00:06:05', '2023-03-24 14:44:22', '2023-03-24 14:44:22'),
(17, 'ZL-5468UK', '00:17:25', '2023-03-24 15:29:05', '2023-03-24 15:29:05'),
(18, 'VM-9288NJ', '12:20:25', '2023-03-27 09:12:54', '2023-03-27 09:12:54'),
(19, 'SB-4579QD', '00:01:55', '2023-03-27 15:45:00', '2023-03-27 15:45:00'),
(20, 'AK-0770SE', '00:55:10', '2023-03-30 12:29:51', '2023-03-30 12:29:51'),
(21, 'KA-7759WM', '00:01:10', '2023-03-30 12:45:09', '2023-03-30 12:45:09'),
(22, 'JB-3394MH', '00:08:25', '2023-04-03 13:57:30', '2023-04-03 13:57:30'),
(23, 'DZ-6190UU', '00:14:30', '2023-04-03 15:19:54', '2023-04-03 15:19:54'),
(24, 'XT-6297DG', '00:25:05', '2023-04-04 16:05:29', '2023-04-04 16:05:29'),
(25, 'JD-0449IW', '07:21:05', '2023-04-22 11:22:42', '2023-04-22 11:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('NxOub8zTVP6sp0D1Yv68Nc1lxm50GaFkyW6czIU1', NULL, '66.249.79.104', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjVyemNVRDhpMGdzY3lVWEVwSHpja093M3FiVFdGYk9tTW5vcUZFVCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3LnRyb29wYS5vcmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1697184016),
('kVL7vX25nmxvQECf9NucgQNxngUer4xqBuMiv4oB', NULL, '222.79.104.23', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiME9VNWJnNFhLWEZ3MEs5TWlNTlI4T3pzWDVMdFB5elVXRHhZVThSayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697187158),
('AoYtyqm4dS5xZ6K9X3YGk2wGJlW7mMvrNV2GaFen', NULL, '42.236.17.29', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36; 360Spider', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNllGbGlqVDVIWVE0SmZ4TEx1dkxrWVptdHdFRWtBNHltYlJiQzhWZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vd3d3LnRyb29wYS5vcmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1697166101),
('bhfqcuI9eBAh1pw560hPywV53xi6ck3xozQz4N3j', NULL, '194.36.98.219', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid2kzSnBubE13eXJZYnYxcnJtcVF6M01yNlZxUmlEZWRxM04xYWk3UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697172367),
('SzPTNkAzpjCeGtMhU7rUwmWxiGTfn8KYw5C7Q5Z2', NULL, '191.96.181.137', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 12_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibzk0TVFReW5IdEJIZ1EzclI0cUtJeUUwaFRURXB6eTVEOUZNR1lhRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697173092),
('LCWWs28yJGnEHd6cloQUAAciOPrqHGdTCfe6IDuW', NULL, '185.180.143.13', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/66.0.3359.117 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibTVWNkR0dXBDM3U1VVM1UXpycm80RDZHQjlkeUxuZ3M0MnJHZkFnTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697187995),
('JLWCJt2up1aV6btZJbPoX9h6M0d9ZJ4OaGZrf11t', NULL, '159.89.226.210', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia0k5Wjl4Q1Z1VkRkZ0hqc1I0RzVBRzI0S0c0Tzg0SlVNcHR4d3k3UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697197548),
('AIOsv9yqheLQapSPx0xgJHsQ8Q8nNV5gSN5k4K7H', NULL, '197.210.135.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVVMd1VmUDRCd1gyU2cwYUVLV1dpTnhISFNzQWo0S0lJMGxqamFLMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697199575),
('ENbF9Prz5S1IynXaxn7S6WfH0F6J8UcHH4bamOdK', NULL, '197.210.135.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidmp5Y0JOUFNoQU5kYXk0aEtSajNTQTBQNFEwS0pGaGhiUWQzQW9OZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697199577),
('RjKNLS5HCto10ucfxfFafYou0Sa20ujrhXbPthJ6', NULL, '197.210.135.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMG1vaGJiWmVlWnJ3a0RiTmRQU2VLcUhvbXMyU3NCSHNkN0tLZ0hGTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697199581),
('VSzL1bsfVCoZxw9WFeTptKY56hiqHIHKZlgjfjSq', NULL, '197.210.135.124', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/117.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWRLM05CcXp4VEZhbk9FeEIxR1BuYWI5RUM1ZEtrdVV5aHhWcFMzcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjI6Imh0dHBzOi8vdHJvb3BhLm9yZy8zcGwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1697202108),
('BplyI2ZJVKDLZqw00w7ykS7IrlVA7dit4q0xc1DF', NULL, '95.214.27.19', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidU5VZ0lmNmp1UkpDN0M1OGNUeER3MU5kZ205VTZSMENuaVI2VWFPOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTg6Imh0dHBzOi8vdHJvb3BhLm9yZyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1697205057);

-- --------------------------------------------------------

--
-- Table structure for table `supportissue`
--

CREATE TABLE `supportissue` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `title` varchar(200) NOT NULL,
  `issue` text NOT NULL,
  `issue_type` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supportissue`
--

INSERT INTO `supportissue` (`id`, `rider_id`, `title`, `issue`, `issue_type`, `created_at`, `updated_at`, `status`) VALUES
(12, '408652', 'Life is good Depending ', 'I am having a bit of challenge here now. ', 'technical', '2023-03-09 06:03:06', '2023-03-09 06:03:06', 'new'),
(11, '408652', 'rtghj', 'rfhj', 'pickup', '2023-03-08 15:53:08', '2023-03-08 15:53:08', 'new'),
(10, '408652', 'wet did ghhj', 'TTYL fggh', 'technical', '2023-03-08 15:52:06', '2023-03-08 15:52:06', 'new'),
(9, '408652', 'retry ghhj', 'rtfgvb', 'delivery', '2023-03-08 15:51:22', '2023-03-08 15:51:22', 'new'),
(8, '408652', 'rough fghh', 'rtgg ghjjj vvfgg', 'rescue', '2023-03-08 15:50:30', '2023-03-08 15:50:30', 'new'),
(13, '408652', 'life is good  depending on the liver ', 'sure you have said the truth... ', 'technical', '2023-03-10 11:49:00', '2023-03-10 11:49:00', 'new'),
(14, '276543', 'Optional phone text ', 'This is optional please.', 'rescue', '2023-03-20 21:11:23', '2023-03-20 21:11:23', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `tempdistance`
--

CREATE TABLE `tempdistance` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `distance` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` int(11) NOT NULL,
  `custid` varchar(200) NOT NULL,
  `fromLoc` varchar(200) NOT NULL,
  `toLoc` varchar(200) NOT NULL,
  `riderid` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `delivery_time` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trips_order_decline`
--

CREATE TABLE `trips_order_decline` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `decline_reason` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `trips_order_decline`
--

INSERT INTO `trips_order_decline` (`id`, `order_id`, `decline_reason`, `created_at`, `updated_at`) VALUES
(127, 146, 'I am going for break', '2023-02-11 20:59:50', '2023-02-11 20:59:50'),
(126, 146, 'I am far from the pickup location', '2023-02-11 20:58:12', '2023-02-11 20:58:12'),
(125, 146, 'I am far from the pickup location', '2023-02-11 20:57:18', '2023-02-11 20:57:18'),
(124, 146, 'I am far from the pickup location', '2023-02-11 20:55:14', '2023-02-11 20:55:14'),
(123, 146, 'I am far from the pickup location', '2023-02-11 20:53:37', '2023-02-11 20:53:37'),
(122, 146, 'I am far from the pickup location', '2023-02-11 20:53:14', '2023-02-11 20:53:14'),
(121, 146, 'I am going for break', '2023-02-11 20:52:31', '2023-02-11 20:52:31'),
(120, 141, 'I am going for break', '2023-02-10 17:04:44', '2023-02-10 17:04:44'),
(119, 134, 'I am far from the pickup location', '2023-02-10 17:04:29', '2023-02-10 17:04:29'),
(118, 140, 'I am going for break', '2023-02-10 17:04:14', '2023-02-10 17:04:14'),
(117, 135, 'I am going for break', '2023-02-10 17:03:57', '2023-02-10 17:03:57'),
(116, 133, 'I am going for break', '2023-02-10 11:54:16', '2023-02-10 11:54:16'),
(115, 132, 'I am going for break', '2023-02-10 11:53:39', '2023-02-10 11:53:39'),
(114, 132, 'My motor cycle break down', '2023-02-10 11:53:09', '2023-02-10 11:53:09'),
(113, 132, 'I am going for break', '2023-02-10 11:52:31', '2023-02-10 11:52:31'),
(112, 131, 'I am going for break', '2023-02-10 11:46:18', '2023-02-10 11:46:18'),
(111, 129, 'I am going for break', '2023-02-10 04:26:11', '2023-02-10 04:26:11'),
(110, 128, 'My motor cycle break down', '2023-02-10 04:26:03', '2023-02-10 04:26:03'),
(109, 4, 'I am going for break', '2023-02-09 20:33:12', '2023-02-09 20:33:12'),
(108, 4, 'I am going for break', '2023-02-09 20:32:56', '2023-02-09 20:32:56'),
(26, 3, 'I am going for break', '2023-01-14 15:55:26', '2023-01-14 15:55:26'),
(27, 5, 'I am going for break', '2023-01-14 15:55:30', '2023-01-14 15:55:30'),
(28, 6, 'I am going for break', '2023-01-14 15:55:48', '2023-01-14 15:55:48'),
(29, 4, 'I am going for break', '2023-01-14 16:02:40', '2023-01-14 16:02:40'),
(30, 4, 'I am going for break', '2023-01-14 16:02:50', '2023-01-14 16:02:50'),
(31, 4, 'My motor cycle break down', '2023-01-14 16:13:38', '2023-01-14 16:13:38'),
(32, 4, 'My motor cycle break down', '2023-01-14 16:13:48', '2023-01-14 16:13:48'),
(33, 3, 'I am going for break', '2023-01-14 16:13:55', '2023-01-14 16:13:55'),
(34, 4, 'I am far from the pickup location', '2023-01-14 16:16:41', '2023-01-14 16:16:41'),
(35, 4, 'I am going for break', '2023-01-14 16:34:19', '2023-01-14 16:34:19'),
(36, 6, 'I am going for break', '2023-01-14 17:10:48', '2023-01-14 17:10:48'),
(37, 6, 'I am far from the pickup location', '2023-01-14 17:11:08', '2023-01-14 17:11:08'),
(38, 4, 'I am going for break', '2023-01-14 17:23:00', '2023-01-14 17:23:00'),
(39, 5, 'My motor cycle break down', '2023-01-14 17:23:06', '2023-01-14 17:23:06'),
(40, 4, 'I am out of fuel', '2023-01-14 17:33:33', '2023-01-14 17:33:33'),
(41, 5, 'My motor cycle break down', '2023-01-14 17:34:47', '2023-01-14 17:34:47'),
(42, 3, 'I am going for break', '2023-01-14 18:18:12', '2023-01-14 18:18:12'),
(43, 4, 'I am far from the pickup location', '2023-01-15 11:21:19', '2023-01-15 11:21:19'),
(44, 4, 'I am going for break', '2023-01-17 03:53:25', '2023-01-17 03:53:25'),
(45, 4, 'My motor cycle break down', '2023-01-17 09:22:14', '2023-01-17 09:22:14'),
(46, 6, 'I am far from the pickup location', '2023-01-21 22:57:45', '2023-01-21 22:57:45'),
(47, 4, 'hungry', '2023-01-27 15:34:45', '2023-01-27 15:34:45'),
(48, 4, 'hungry', '2023-01-27 15:39:27', '2023-01-27 15:39:27'),
(49, 4, 'hungry', '2023-01-27 16:01:04', '2023-01-27 16:01:04'),
(50, 4, 'hungry', '2023-01-27 16:02:01', '2023-01-27 16:02:01'),
(51, 4, 'hungry', '2023-01-27 16:04:59', '2023-01-27 16:04:59'),
(52, 4, 'hungry', '2023-01-27 16:12:02', '2023-01-27 16:12:02'),
(53, 4, 'hungry', '2023-01-27 16:39:01', '2023-01-27 16:39:01'),
(54, 4, 'hungry', '2023-01-27 16:40:40', '2023-01-27 16:40:40'),
(55, 4, 'hungry', '2023-01-27 16:45:59', '2023-01-27 16:45:59'),
(56, 4, 'hungry', '2023-01-27 16:52:02', '2023-01-27 16:52:02'),
(57, 4, 'hungry', '2023-01-27 16:57:40', '2023-01-27 16:57:40'),
(58, 4, 'hungry', '2023-01-27 16:59:05', '2023-01-27 16:59:05'),
(59, 4, 'hungry', '2023-01-27 17:00:26', '2023-01-27 17:00:26'),
(60, 4, 'hungry', '2023-01-27 17:00:31', '2023-01-27 17:00:31'),
(61, 4, 'hungry', '2023-01-27 17:01:23', '2023-01-27 17:01:23'),
(62, 4, 'hungry', '2023-01-27 17:03:20', '2023-01-27 17:03:20'),
(63, 4, 'hungry', '2023-01-27 17:04:43', '2023-01-27 17:04:43'),
(64, 4, 'hungry', '2023-01-27 17:05:55', '2023-01-27 17:05:55'),
(65, 4, 'hungry', '2023-01-27 17:06:58', '2023-01-27 17:06:58'),
(66, 4, 'hungry', '2023-01-27 17:08:36', '2023-01-27 17:08:36'),
(67, 4, 'hungry', '2023-01-27 17:09:07', '2023-01-27 17:09:07'),
(68, 4, 'hungry', '2023-01-27 17:11:10', '2023-01-27 17:11:10'),
(69, 4, 'hungry', '2023-01-27 17:12:04', '2023-01-27 17:12:04'),
(70, 4, 'hungry', '2023-01-27 17:16:18', '2023-01-27 17:16:18'),
(71, 4, 'hungry', '2023-01-27 17:16:22', '2023-01-27 17:16:22'),
(72, 4, 'hungry', '2023-01-27 17:17:18', '2023-01-27 17:17:18'),
(73, 4, 'hungry', '2023-01-27 17:18:07', '2023-01-27 17:18:07'),
(74, 4, 'hungry', '2023-01-27 17:33:30', '2023-01-27 17:33:30'),
(75, 4, 'hungry', '2023-01-27 17:49:35', '2023-01-27 17:49:35'),
(76, 4, 'hungry', '2023-01-27 17:51:06', '2023-01-27 17:51:06'),
(77, 4, 'hungry', '2023-01-27 17:52:13', '2023-01-27 17:52:13'),
(78, 30, 'My motor cycle break down', '2023-01-27 19:08:24', '2023-01-27 19:08:24'),
(79, 30, 'My motor cycle break down', '2023-01-27 19:08:26', '2023-01-27 19:08:26'),
(80, 5, 'I am far from the pickup location', '2023-01-28 06:53:47', '2023-01-28 06:53:47'),
(81, 10, 'My motor cycle break down', '2023-01-28 06:53:54', '2023-01-28 06:53:54'),
(82, 11, 'I am going for break', '2023-01-28 06:53:57', '2023-01-28 06:53:57'),
(83, 9, 'My motor cycle break down', '2023-01-28 06:54:02', '2023-01-28 06:54:02'),
(84, 12, 'I am going for break', '2023-01-28 06:54:06', '2023-01-28 06:54:06'),
(85, 15, 'I am going for break', '2023-01-28 06:54:22', '2023-01-28 06:54:22'),
(86, 16, 'I am going for break', '2023-01-28 06:54:27', '2023-01-28 06:54:27'),
(87, 13, 'I am out of fuel', '2023-01-28 06:54:49', '2023-01-28 06:54:49'),
(88, 14, 'I am out of fuel', '2023-01-28 06:54:54', '2023-01-28 06:54:54'),
(89, 17, 'My motor cycle break down', '2023-01-28 06:54:58', '2023-01-28 06:54:58'),
(90, 14, 'I am out of fuel', '2023-01-28 06:55:02', '2023-01-28 06:55:02'),
(91, 18, 'I am far from the pickup location', '2023-01-28 06:55:05', '2023-01-28 06:55:05'),
(92, 19, 'I am far from the pickup location', '2023-01-28 06:55:09', '2023-01-28 06:55:09'),
(93, 20, 'I am far from the pickup location', '2023-01-28 06:55:12', '2023-01-28 06:55:12'),
(94, 21, 'I am far from the pickup location', '2023-01-28 06:55:16', '2023-01-28 06:55:16'),
(95, 22, 'I am far from the pickup location', '2023-01-28 06:55:20', '2023-01-28 06:55:20'),
(96, 23, 'I am out of fuel', '2023-01-28 06:55:23', '2023-01-28 06:55:23'),
(97, 24, 'I am out of fuel', '2023-01-28 06:55:26', '2023-01-28 06:55:26'),
(98, 25, 'I am going for break', '2023-01-28 06:55:29', '2023-01-28 06:55:29'),
(99, 26, 'I am far from the pickup location', '2023-01-28 06:55:32', '2023-01-28 06:55:32'),
(100, 27, 'I am far from the pickup location', '2023-01-28 06:55:35', '2023-01-28 06:55:35'),
(101, 28, 'I am out of fuel', '2023-01-28 06:55:39', '2023-01-28 06:55:39'),
(102, 29, 'I am going for break', '2023-01-28 06:55:42', '2023-01-28 06:55:42'),
(103, 31, 'I am far from the pickup location', '2023-01-28 06:55:45', '2023-01-28 06:55:45'),
(104, 32, 'I am out of fuel', '2023-01-28 06:55:48', '2023-01-28 06:55:48'),
(105, 36, 'I am far from the pickup location', '2023-01-28 06:55:51', '2023-01-28 06:55:51'),
(106, 37, 'I am far from the pickup location', '2023-01-28 06:55:55', '2023-01-28 06:55:55'),
(107, 4, 'I am going for break', '2023-01-29 12:00:58', '2023-01-29 12:00:58'),
(128, 146, 'I am far from the pickup location', '2023-02-11 21:00:48', '2023-02-11 21:00:48'),
(129, 146, 'I am far from the pickup location', '2023-02-11 21:09:06', '2023-02-11 21:09:06'),
(130, 146, 'I am far from the pickup location', '2023-02-11 21:11:00', '2023-02-11 21:11:00'),
(131, 146, 'I am far from the pickup location', '2023-02-11 21:12:14', '2023-02-11 21:12:14'),
(132, 146, 'I am far from the pickup location', '2023-02-11 21:12:24', '2023-02-11 21:12:24'),
(133, 146, 'I am far from the pickup location', '2023-02-11 21:12:40', '2023-02-11 21:12:40'),
(134, 146, 'I am far from the pickup location', '2023-02-12 18:53:05', '2023-02-12 18:53:05'),
(135, 146, 'I am far from the pickup location', '2023-02-12 18:55:00', '2023-02-12 18:55:00'),
(136, 146, 'I am far from the pickup location', '2023-02-12 18:55:33', '2023-02-12 18:55:33'),
(137, 146, 'I am far from the pickup location', '2023-02-12 18:56:03', '2023-02-12 18:56:03'),
(138, 146, 'I am far from the pickup location', '2023-02-12 18:58:38', '2023-02-12 18:58:38'),
(139, 146, 'I am far from the pickup location', '2023-02-12 18:58:43', '2023-02-12 18:58:43'),
(140, 146, 'I am far from the pickup location', '2023-02-12 18:58:46', '2023-02-12 18:58:46'),
(141, 146, 'I am far from the pickup location', '2023-02-12 19:00:28', '2023-02-12 19:00:28'),
(142, 146, 'I am far from the pickup location', '2023-02-12 19:02:47', '2023-02-12 19:02:47'),
(143, 146, 'I am far from the pickup location', '2023-02-12 19:04:46', '2023-02-12 19:04:46'),
(144, 146, 'I am far from the pickup location', '2023-02-12 19:06:52', '2023-02-12 19:06:52'),
(145, 146, 'I am far from the pickup location', '2023-02-12 19:06:57', '2023-02-12 19:06:57'),
(146, 146, 'I am far from the pickup location', '2023-02-12 19:07:39', '2023-02-12 19:07:39'),
(147, 146, 'I am far from the pickup location', '2023-02-12 19:13:09', '2023-02-12 19:13:09'),
(148, 146, 'I am far from the pickup location', '2023-02-12 19:14:15', '2023-02-12 19:14:15'),
(149, 146, 'I am far from the pickup location', '2023-02-12 19:15:46', '2023-02-12 19:15:46'),
(150, 146, 'I am far from the pickup location', '2023-02-12 19:17:18', '2023-02-12 19:17:18'),
(151, 146, 'I am far from the pickup location', '2023-02-12 19:20:48', '2023-02-12 19:20:48'),
(152, 146, 'I am far from the pickup location', '2023-02-12 19:23:48', '2023-02-12 19:23:48'),
(153, 146, 'I am far from the pickup location', '2023-02-12 19:24:59', '2023-02-12 19:24:59'),
(154, 146, 'I am far from the pickup location', '2023-02-12 19:25:38', '2023-02-12 19:25:38'),
(155, 146, 'I am far from the pickup location', '2023-02-12 19:28:22', '2023-02-12 19:28:22'),
(156, 146, 'I am far from the pickup location', '2023-02-12 19:29:54', '2023-02-12 19:29:54'),
(157, 146, 'I am far from the pickup location', '2023-02-12 19:30:31', '2023-02-12 19:30:31'),
(158, 146, 'I am far from the pickup location', '2023-02-12 19:38:23', '2023-02-12 19:38:23'),
(159, 146, 'I am far from the pickup location', '2023-02-12 19:54:30', '2023-02-12 19:54:30'),
(160, 146, 'I am far from the pickup location', '2023-02-12 20:24:30', '2023-02-12 20:24:30'),
(161, 146, 'I am far from the pickup location', '2023-02-12 20:30:00', '2023-02-12 20:30:00'),
(162, 146, 'I am far from the pickup location', '2023-02-12 20:36:07', '2023-02-12 20:36:07'),
(163, 146, 'I am far from the pickup location', '2023-02-12 20:42:57', '2023-02-12 20:42:57'),
(164, 146, 'I am out of fuel', '2023-02-12 20:50:32', '2023-02-12 20:50:32'),
(165, 146, 'I am out of fuel', '2023-02-12 20:51:25', '2023-02-12 20:51:25'),
(166, 146, 'I am far from the pickup location', '2023-02-12 20:53:17', '2023-02-12 20:53:17'),
(167, 146, 'I am going for break', '2023-02-12 21:01:12', '2023-02-12 21:01:12'),
(168, 146, 'My motor cycle break down', '2023-02-12 21:14:36', '2023-02-12 21:14:36'),
(169, 146, 'My motor cycle break down', '2023-02-12 21:21:16', '2023-02-12 21:21:16'),
(170, 146, 'I am going for break', '2023-02-12 21:49:03', '2023-02-12 21:49:03'),
(171, 146, 'I am out of fuel', '2023-02-13 15:18:49', '2023-02-13 15:18:49'),
(172, 146, 'I am far from the pickup location', '2023-02-15 16:16:27', '2023-02-15 16:16:27'),
(173, 146, 'I am far from the pickup location', '2023-02-15 16:16:29', '2023-02-15 16:16:29'),
(174, 146, 'I am out of fuel', '2023-02-15 16:17:04', '2023-02-15 16:17:04'),
(175, 146, 'I am out of fuel', '2023-02-16 16:09:28', '2023-02-16 16:09:28'),
(176, 176, 'I am out of fuel', '2023-03-08 16:14:10', '2023-03-08 16:14:10'),
(177, 176, 'I am out of fuel', '2023-03-08 16:15:25', '2023-03-08 16:15:25'),
(178, 176, 'I am out of fuel', '2023-03-08 16:21:14', '2023-03-08 16:21:14'),
(179, 177, 'I am far from the pickup location', '2023-03-08 16:25:54', '2023-03-08 16:25:54'),
(180, 178, 'I am going for break', '2023-03-09 13:57:32', '2023-03-09 13:57:32'),
(181, 178, 'I am going for break', '2023-03-09 13:57:35', '2023-03-09 13:57:35'),
(182, 176, 'My motor cycle break down', '2023-03-09 14:44:53', '2023-03-09 14:44:53'),
(183, 176, 'My motor cycle break down', '2023-03-09 14:44:57', '2023-03-09 14:44:57'),
(184, 176, 'I am going for break', '2023-03-09 15:06:36', '2023-03-09 15:06:36'),
(185, 177, 'I am going for break', '2023-03-09 16:20:01', '2023-03-09 16:20:01'),
(186, 176, 'I am going for break', '2023-03-09 16:35:56', '2023-03-09 16:35:56'),
(187, 176, 'I am going for break', '2023-03-09 16:36:43', '2023-03-09 16:36:43'),
(188, 177, 'I am far from the pickup location', '2023-03-09 16:39:55', '2023-03-09 16:39:55'),
(189, 178, 'I am far from the pickup location', '2023-03-09 16:41:02', '2023-03-09 16:41:02'),
(190, 176, 'My motor cycle break down', '2023-03-09 17:08:09', '2023-03-09 17:08:09'),
(191, 178, 'My motor cycle break down', '2023-03-09 17:11:12', '2023-03-09 17:11:12'),
(192, 177, 'I am going for break', '2023-03-09 17:11:44', '2023-03-09 17:11:44'),
(193, 176, 'I am going for break', '2023-03-09 17:18:44', '2023-03-09 17:18:44'),
(194, 178, 'I am going for break', '2023-03-09 17:19:13', '2023-03-09 17:19:13'),
(195, 176, 'I am going for break', '2023-03-09 17:22:24', '2023-03-09 17:22:24'),
(196, 177, 'My motor cycle break down', '2023-03-09 17:22:40', '2023-03-09 17:22:40'),
(197, 178, 'I am going for break', '2023-03-09 17:22:52', '2023-03-09 17:22:52'),
(198, 178, 'My motor cycle break down', '2023-03-10 02:44:08', '2023-03-10 02:44:08'),
(199, 178, 'My motor cycle break down', '2023-03-10 02:44:12', '2023-03-10 02:44:12'),
(200, 176, 'I am going for break', '2023-03-10 11:28:31', '2023-03-10 11:28:31'),
(201, 176, 'I am going for break', '2023-03-10 11:28:34', '2023-03-10 11:28:34'),
(202, 177, 'My motor cycle break down', '2023-03-10 11:29:01', '2023-03-10 11:29:01'),
(203, 273, 'I am far from the pickup location', '2023-03-27 11:50:44', '2023-03-27 11:50:44'),
(204, 274, 'I am far from the pickup location', '2023-03-27 12:34:53', '2023-03-27 12:34:53'),
(205, 174, 'good talk', '2023-03-27 12:39:16', '2023-03-27 12:39:16'),
(206, 274, 'good talk', '2023-03-27 12:41:57', '2023-03-27 12:41:57'),
(207, 274, 'good talk', '2023-03-27 14:30:40', '2023-03-27 14:30:40'),
(208, 275, 'I am going for break', '2023-03-27 14:58:56', '2023-03-27 14:58:56'),
(209, 276, 'My motor cycle break down', '2023-03-27 15:50:38', '2023-03-27 15:50:38'),
(210, 276, 'My motor cycle break down', '2023-03-27 15:50:41', '2023-03-27 15:50:41'),
(211, 276, 'My motor cycle break down', '2023-03-27 15:52:17', '2023-03-27 15:52:17'),
(212, 276, 'My motor cycle break down', '2023-03-27 15:52:20', '2023-03-27 15:52:20'),
(213, 269, 'I am out of fuel', '2023-03-31 10:36:53', '2023-03-31 10:36:53'),
(214, 269, 'I am out of fuel', '2023-03-31 10:36:58', '2023-03-31 10:36:58'),
(215, 283, 'My motor cycle break down', '2023-03-31 15:34:52', '2023-03-31 15:34:52'),
(216, 283, 'My motor cycle break down', '2023-03-31 15:35:04', '2023-03-31 15:35:04'),
(217, 283, 'I am out of fuel', '2023-03-31 15:35:37', '2023-03-31 15:35:37'),
(218, 283, 'I am out of fuel', '2023-03-31 15:35:48', '2023-03-31 15:35:48'),
(219, 283, 'I am far from the pickup location', '2023-04-03 13:28:23', '2023-04-03 13:28:23'),
(220, 283, 'I am going for break', '2023-04-03 13:31:40', '2023-04-03 13:31:40'),
(221, 283, 'My motor cycle break down', '2023-04-03 15:03:07', '2023-04-03 15:03:07'),
(222, 283, 'My motor cycle break down', '2023-04-03 15:03:10', '2023-04-03 15:03:10'),
(223, 283, 'My motor cycle break down', '2023-04-03 15:03:54', '2023-04-03 15:03:54'),
(224, 301, 'My motor cycle break down', '2023-04-03 15:22:06', '2023-04-03 15:22:06'),
(225, 301, 'I am going for break', '2023-04-03 15:23:22', '2023-04-03 15:23:22'),
(226, 301, 'I am going for break', '2023-04-03 15:23:25', '2023-04-03 15:23:25'),
(227, 250, 'I am out of fuel', '2023-04-03 21:14:55', '2023-04-03 21:14:55'),
(228, 250, 'I am out of fuel', '2023-04-03 21:14:58', '2023-04-03 21:14:58'),
(229, 313, 'My motor cycle break down', '2023-04-04 16:13:47', '2023-04-04 16:13:47'),
(230, 313, 'My motor cycle break down', '2023-04-04 16:13:49', '2023-04-04 16:13:49'),
(231, 313, 'My motor cycle break down', '2023-04-04 16:14:03', '2023-04-04 16:14:03'),
(232, 313, 'My motor cycle break down', '2023-04-04 16:14:06', '2023-04-04 16:14:06'),
(233, 279, 'I am going for break', '2023-04-05 10:19:03', '2023-04-05 10:19:03'),
(234, 279, 'I am going for break', '2023-04-05 10:19:07', '2023-04-05 10:19:07'),
(235, 320, 'I am far from the pickup location', '2023-04-08 11:33:34', '2023-04-08 11:33:34'),
(236, 320, 'I am far from the pickup location', '2023-04-08 11:33:36', '2023-04-08 11:33:36'),
(237, 324, 'I am going for break', '2023-04-08 11:52:39', '2023-04-08 11:52:39'),
(238, 324, 'I am going for break', '2023-04-08 11:52:42', '2023-04-08 11:52:42'),
(239, 328, 'I am out of fuel', '2023-04-08 13:06:35', '2023-04-08 13:06:35'),
(240, 328, 'I am out of fuel', '2023-04-08 13:06:37', '2023-04-08 13:06:37'),
(241, 329, 'I am far from the pickup location', '2023-04-08 13:08:47', '2023-04-08 13:08:47'),
(242, 329, 'I am far from the pickup location', '2023-04-08 13:08:51', '2023-04-08 13:08:51'),
(243, 333, 'I am far from the pickup location', '2023-04-08 13:16:58', '2023-04-08 13:16:58'),
(244, 333, 'I am far from the pickup location', '2023-04-08 13:17:02', '2023-04-08 13:17:02'),
(245, 334, 'I am going for break', '2023-04-08 14:11:59', '2023-04-08 14:11:59'),
(246, 334, 'I am going for break', '2023-04-08 14:12:01', '2023-04-08 14:12:01'),
(247, 335, 'My motor cycle break down', '2023-04-08 14:33:27', '2023-04-08 14:33:27'),
(248, 335, 'My motor cycle break down', '2023-04-08 14:33:28', '2023-04-08 14:33:28'),
(249, 337, 'I am going for break', '2023-04-08 21:18:02', '2023-04-08 21:18:02'),
(250, 337, 'I am going for break', '2023-04-08 21:18:05', '2023-04-08 21:18:05'),
(251, 336, 'My motor cycle break down', '2023-04-08 21:18:35', '2023-04-08 21:18:35'),
(252, 336, 'My motor cycle break down', '2023-04-08 21:18:38', '2023-04-08 21:18:38'),
(253, 340, 'I am going for break', '2023-04-08 21:19:05', '2023-04-08 21:19:05'),
(254, 340, 'I am going for break', '2023-04-08 21:19:07', '2023-04-08 21:19:07'),
(255, 346, 'I am out of fuel', '2023-04-08 22:01:33', '2023-04-08 22:01:33'),
(256, 346, 'I am out of fuel', '2023-04-08 22:01:36', '2023-04-08 22:01:36'),
(257, 347, 'I am going for break', '2023-04-08 22:03:36', '2023-04-08 22:03:36'),
(258, 347, 'I am going for break', '2023-04-08 22:03:40', '2023-04-08 22:03:40'),
(259, 348, 'I am out of fuel', '2023-04-08 22:04:10', '2023-04-08 22:04:10'),
(260, 348, 'I am out of fuel', '2023-04-08 22:04:13', '2023-04-08 22:04:13'),
(261, 354, 'I am going for break', '2023-04-08 22:11:36', '2023-04-08 22:11:36'),
(262, 354, 'I am going for break', '2023-04-08 22:11:39', '2023-04-08 22:11:39'),
(263, 355, 'My motor cycle break down', '2023-04-08 22:20:48', '2023-04-08 22:20:48'),
(264, 355, 'My motor cycle break down', '2023-04-08 22:20:51', '2023-04-08 22:20:51'),
(265, 357, 'I am going for break', '2023-04-08 22:21:41', '2023-04-08 22:21:41'),
(266, 357, 'I am going for break', '2023-04-08 22:21:44', '2023-04-08 22:21:44'),
(267, 361, 'I am going for break', '2023-04-08 22:49:25', '2023-04-08 22:49:25'),
(268, 361, 'I am going for break', '2023-04-08 22:49:29', '2023-04-08 22:49:29'),
(269, 362, 'I am going for break', '2023-04-08 22:50:34', '2023-04-08 22:50:34'),
(270, 362, 'I am going for break', '2023-04-08 22:50:38', '2023-04-08 22:50:38'),
(271, 146, 'I am far from the pickup location', '2023-04-08 22:58:01', '2023-04-08 22:58:01'),
(272, 317, 'I am far from the pickup location', '2023-04-08 23:02:34', '2023-04-08 23:02:34'),
(273, 317, 'I am far from the pickup location', '2023-04-08 23:04:41', '2023-04-08 23:04:41'),
(274, 368, 'I am far from the pickup location', '2023-04-08 23:29:16', '2023-04-08 23:29:16'),
(275, 368, 'I am far from the pickup location', '2023-04-08 23:29:19', '2023-04-08 23:29:19'),
(276, 368, 'I am going for break', '2023-04-08 23:29:38', '2023-04-08 23:29:38'),
(277, 368, 'My motor cycle break down', '2023-04-08 23:30:53', '2023-04-08 23:30:53'),
(278, 368, 'My motor cycle break down', '2023-04-08 23:30:55', '2023-04-08 23:30:55'),
(279, 368, 'My motor cycle break down', '2023-04-08 23:32:19', '2023-04-08 23:32:19'),
(280, 368, 'My motor cycle break down', '2023-04-08 23:39:03', '2023-04-08 23:39:03'),
(281, 377, 'My motor cycle break down', '2023-04-08 23:40:09', '2023-04-08 23:40:09'),
(282, 377, 'My motor cycle break down', '2023-04-08 23:40:12', '2023-04-08 23:40:12'),
(283, 376, 'I am going for break', '2023-04-08 23:42:02', '2023-04-08 23:42:02'),
(284, 376, 'I am going for break', '2023-04-08 23:42:04', '2023-04-08 23:42:04'),
(285, 368, 'My motor cycle break down', '2023-04-08 23:47:41', '2023-04-08 23:47:41'),
(286, 314, 'My motor cycle break down', '2023-04-08 23:48:27', '2023-04-08 23:48:27'),
(287, 314, 'My motor cycle break down', '2023-04-08 23:50:15', '2023-04-08 23:50:15'),
(288, 314, 'My motor cycle break down', '2023-04-08 23:51:22', '2023-04-08 23:51:22'),
(289, 314, 'My motor cycle break down', '2023-04-08 23:54:57', '2023-04-08 23:54:57'),
(290, 392, 'I am going for break', '2023-04-09 00:10:24', '2023-04-09 00:10:24'),
(291, 392, 'I am going for break', '2023-04-09 00:10:27', '2023-04-09 00:10:27'),
(292, 391, 'I am going for break', '2023-04-09 00:10:42', '2023-04-09 00:10:42'),
(293, 390, 'I am going for break', '2023-04-09 00:11:02', '2023-04-09 00:11:02'),
(294, 390, 'I am going for break', '2023-04-09 00:11:05', '2023-04-09 00:11:05'),
(295, 389, 'I am out of fuel', '2023-04-09 00:11:18', '2023-04-09 00:11:18'),
(296, 399, 'My motor cycle break down', '2023-04-09 00:45:26', '2023-04-09 00:45:26'),
(297, 399, 'My motor cycle break down', '2023-04-09 00:45:29', '2023-04-09 00:45:29'),
(298, 400, 'I am far from the pickup location', '2023-04-09 20:01:43', '2023-04-09 20:01:43'),
(299, 400, 'I am far from the pickup location', '2023-04-09 20:01:45', '2023-04-09 20:01:45'),
(300, 407, 'I am out of fuel', '2023-04-09 20:41:36', '2023-04-09 20:41:36'),
(301, 407, 'I am out of fuel', '2023-04-09 20:41:40', '2023-04-09 20:41:40'),
(302, 408, 'I am going for break', '2023-04-09 20:46:28', '2023-04-09 20:46:28'),
(303, 408, 'I am going for break', '2023-04-09 20:46:31', '2023-04-09 20:46:31'),
(304, 409, 'I am going for break', '2023-04-09 20:51:36', '2023-04-09 20:51:36'),
(305, 409, 'I am going for break', '2023-04-09 20:51:45', '2023-04-09 20:51:45'),
(306, 410, 'I am far from the pickup location', '2023-04-20 05:40:38', '2023-04-20 05:40:38'),
(307, 410, 'I am far from the pickup location', '2023-04-20 05:40:42', '2023-04-20 05:40:42'),
(308, 392, 'I am far from the pickup location', '2023-05-06 10:43:12', '2023-05-06 10:43:12'),
(309, 392, 'I am far from the pickup location', '2023-05-06 10:43:14', '2023-05-06 10:43:14'),
(310, 419, 'I am out of fuel', '2023-05-09 13:03:39', '2023-05-09 13:03:39'),
(311, 419, 'I am out of fuel', '2023-05-09 13:03:42', '2023-05-09 13:03:42'),
(312, 419, 'I am out of fuel', '2023-05-09 13:03:48', '2023-05-09 13:03:48'),
(313, 419, 'I am out of fuel', '2023-05-09 13:03:50', '2023-05-09 13:03:50'),
(314, 434, 'I am out of fuel', '2023-05-10 12:11:33', '2023-05-10 12:11:33'),
(315, 434, 'I am out of fuel', '2023-05-10 12:11:36', '2023-05-10 12:11:36'),
(316, 445, 'My motor cycle break down', '2023-05-12 01:33:07', '2023-05-12 01:33:07'),
(317, 445, 'My motor cycle break down', '2023-05-12 01:33:09', '2023-05-12 01:33:09'),
(318, 314, 'reason', '2023-07-05 12:21:48', '2023-07-05 12:21:48'),
(319, 314, 'reason', '2023-07-05 12:21:50', '2023-07-05 12:21:50'),
(320, 314, 'reason', '2023-07-05 12:21:51', '2023-07-05 12:21:51'),
(321, 314, 'reason', '2023-07-05 12:21:51', '2023-07-05 12:21:51'),
(322, 314, 'reason', '2023-07-05 12:21:59', '2023-07-05 12:21:59'),
(323, 314, 'i am good', '2023-07-05 12:38:23', '2023-07-05 12:38:23'),
(324, 314, 'i am good', '2023-07-06 11:16:04', '2023-07-06 11:16:04'),
(325, 470, 'reason', '2023-08-01 12:02:14', '2023-08-01 12:02:14'),
(326, 470, 'reason', '2023-08-01 12:02:15', '2023-08-01 12:02:15'),
(327, 470, 'reason', '2023-08-01 12:02:16', '2023-08-01 12:02:16'),
(328, 470, 'reason', '2023-08-01 12:02:20', '2023-08-01 12:02:20'),
(329, 470, 'reason', '2023-08-01 12:02:22', '2023-08-01 12:02:22'),
(330, 480, 'reason', '2023-08-11 10:40:37', '2023-08-11 10:40:37'),
(331, 480, 'reason', '2023-08-11 10:40:38', '2023-08-11 10:40:38'),
(332, 481, 'reason', '2023-08-11 10:47:44', '2023-08-11 10:47:44'),
(333, 482, 'reason', '2023-08-11 12:45:32', '2023-08-11 12:45:32'),
(334, 483, 'reason', '2023-08-11 12:46:11', '2023-08-11 12:46:11'),
(335, 477, 'reason', '2023-08-11 14:39:31', '2023-08-11 14:39:31'),
(336, 488, 'reason', '2023-08-14 23:17:09', '2023-08-14 23:17:09'),
(337, 479, 'reason', '2023-08-21 09:27:00', '2023-08-21 09:27:00'),
(338, 491, 'reason', '2023-08-21 09:28:32', '2023-08-21 09:28:32'),
(339, 497, 'reason', '2023-08-21 11:56:26', '2023-08-21 11:56:26'),
(340, 498, 'reason', '2023-08-21 11:57:04', '2023-08-21 11:57:04'),
(341, 498, 'reason', '2023-08-21 11:57:04', '2023-08-21 11:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `role` varchar(200) NOT NULL,
  `adminroles` varchar(200) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `adminroles`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'troopa', 'admin@troopa.org', '2022-11-25 05:00:00', '$2y$10$RZn2lpUvCE6ASmJv0SvyD.ijBSVMj/U2CQWvoAeyZeRc580JNSm6O', 'admin', '1', '', '', 'WqLAnXRYF2stDQA80QKG9PzRbGaxd8QDTTkvFJYzZB3MlImSbka07sWj9pMW', '2022-11-25 18:55:22', '2022-11-25 18:55:22'),
(10, 'troopa support', 'support@troopa.org', '2022-11-25 05:00:00', '$2y$10$Yv.MV.E7NoDrGEwkTebjOuqMmp4.3.wL4FVR/FqtXH6am2YxNLMDW', 'admin', '1', '', '', 'eLqB5UlGuiACbxc4SITEd72Q7JN6MguQDz7BkWXe6cEABExXo1cPFNV7Iby3', '2022-11-25 18:58:41', '2022-11-25 18:58:41'),
(15, 'Robinson Agaga', 'gettroopa@gmail.com', NULL, '$2y$10$jJhgm12vdlDDOb8v4kU3QevXg1nnp/12tyc4dQbMmwjciwa6xYsiW', '3pl', '4', NULL, NULL, NULL, '2023-06-15 18:15:53', '2023-06-15 18:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `userID` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `usage_type` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `userID`, `name`, `email`, `phone`, `country`, `state`, `usage_type`, `created_at`, `updated_at`) VALUES
(6, '2', 'Amaka Godwin', 'Kokori@gmail.com', '08032454342', 'Nigeria', 'GOMBE', 'personal', '2021-06-11 21:40:17', '2021-06-11 21:40:17');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal_history`
--

CREATE TABLE `withdrawal_history` (
  `id` int(11) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `withdrawal` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL,
  `rider_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawticket`
--

CREATE TABLE `withdrawticket` (
  `id` int(11) NOT NULL,
  `rider_id` varchar(200) NOT NULL,
  `balance` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `withdrawticket`
--

INSERT INTO `withdrawticket` (`id`, `rider_id`, `balance`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, '408652', '28200', '400', 'ok', '2023-03-10 15:37:35', '2023-03-10 15:37:35'),
(2, '408652', '28200', '2000', 'new', '2023-03-10 15:39:47', '2023-03-10 15:39:47'),
(3, '408652', '28200', '6000', 'ok', '2023-03-10 16:28:02', '2023-03-10 16:28:02'),
(4, '408652', '28200', '600', 'ok', '2023-03-10 17:53:29', '2023-03-10 17:53:29'),
(5, '408652', '28200', '5600', 'ok', '2023-03-13 19:55:11', '2023-03-13 19:55:11'),
(6, '408652', '28200', '3000', 'Approved', '2023-03-13 20:39:45', '2023-03-13 20:39:45'),
(7, '408652', '81000', '5000', 'new', '2023-03-17 22:45:04', '2023-03-17 22:45:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `3pl`
--
ALTER TABLE `3pl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `3pl_riders_right`
--
ALTER TABLE `3pl_riders_right`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminroles`
--
ALTER TABLE `adminroles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_process_track`
--
ALTER TABLE `all_process_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancelledorders`
--
ALTER TABLE `cancelledorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_remittance`
--
ALTER TABLE `cash_remittance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientMessaging`
--
ALTER TABLE `clientMessaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_alert_msg`
--
ALTER TABLE `client_alert_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_bonus`
--
ALTER TABLE `client_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_orders`
--
ALTER TABLE `client_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_balance`
--
ALTER TABLE `current_balance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_rider`
--
ALTER TABLE `customer_rider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feature_request`
--
ALTER TABLE `feature_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_alert_msg`
--
ALTER TABLE `order_alert_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pilots`
--
ALTER TABLE `pilots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `platformearning`
--
ALTER TABLE `platformearning`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riderMessaging`
--
ALTER TABLE `riderMessaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_alert_msg`
--
ALTER TABLE `rider_alert_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_bonus`
--
ALTER TABLE `rider_bonus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_pin_store`
--
ALTER TABLE `rider_pin_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_progress_track`
--
ALTER TABLE `rider_progress_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rider_time_online`
--
ALTER TABLE `rider_time_online`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `supportissue`
--
ALTER TABLE `supportissue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempdistance`
--
ALTER TABLE `tempdistance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trips_order_decline`
--
ALTER TABLE `trips_order_decline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawal_history`
--
ALTER TABLE `withdrawal_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawticket`
--
ALTER TABLE `withdrawticket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `3pl`
--
ALTER TABLE `3pl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `3pl_riders_right`
--
ALTER TABLE `3pl_riders_right`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `adminroles`
--
ALTER TABLE `adminroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_process_track`
--
ALTER TABLE `all_process_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `cancelledorders`
--
ALTER TABLE `cancelledorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cash_remittance`
--
ALTER TABLE `cash_remittance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientMessaging`
--
ALTER TABLE `clientMessaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `client_alert_msg`
--
ALTER TABLE `client_alert_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `client_bonus`
--
ALTER TABLE `client_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_orders`
--
ALTER TABLE `client_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `current_balance`
--
ALTER TABLE `current_balance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `customer_rider`
--
ALTER TABLE `customer_rider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature_request`
--
ALTER TABLE `feature_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forgotpassword`
--
ALTER TABLE `forgotpassword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=370;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_alert_msg`
--
ALTER TABLE `order_alert_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pilots`
--
ALTER TABLE `pilots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `platformearning`
--
ALTER TABLE `platformearning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `riderMessaging`
--
ALTER TABLE `riderMessaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rider_alert_msg`
--
ALTER TABLE `rider_alert_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `rider_bonus`
--
ALTER TABLE `rider_bonus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rider_pin_store`
--
ALTER TABLE `rider_pin_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `rider_progress_track`
--
ALTER TABLE `rider_progress_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `rider_time_online`
--
ALTER TABLE `rider_time_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `supportissue`
--
ALTER TABLE `supportissue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tempdistance`
--
ALTER TABLE `tempdistance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trips_order_decline`
--
ALTER TABLE `trips_order_decline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=342;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `withdrawal_history`
--
ALTER TABLE `withdrawal_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `withdrawticket`
--
ALTER TABLE `withdrawticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
