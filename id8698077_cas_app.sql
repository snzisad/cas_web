-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2019 at 07:43 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8698077_cas_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `keyword` varchar(45) DEFAULT NULL,
  `auction_title` varchar(45) DEFAULT NULL,
  `auction_desc` text DEFAULT NULL,
  `starting_date` date DEFAULT NULL,
  `ending_date` date DEFAULT NULL,
  `starting_price` decimal(10,0) DEFAULT NULL,
  `reserve_price` decimal(10,0) DEFAULT NULL,
  `condition` varchar(45) DEFAULT NULL,
  `product_type` varchar(45) DEFAULT NULL,
  `com_id` int(11) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `city_id`, `location`, `category_id`, `keyword`, `auction_title`, `auction_desc`, `starting_date`, `ending_date`, `starting_price`, `reserve_price`, `condition`, `product_type`, `com_id`, `status`) VALUES
(8, 3, '', 13, 'furniture', 'Antique Jacob Brothers Mahogany &quot;Piano&a', 'Antique Jacob Brothers (American) quarter scale mahogany &quot;Baby Grand Piano&quot;, converted into a bar (no longer functional as a piano). Excellent condition. Measures 29&quot; x 43&quot; x 32&quot;.', '2018-05-14', '2019-08-14', '5000', '5000', 'Good', 'Used', 13, 1),
(9, 3, '', 13, 'Furniture', 'DESIGNER &amp; ANTIQUES, INDIAN JEWELRY', 'DESIGNER &amp; ANTIQUES, INDIAN JEWELRY\r\nNew contemporary furniture from name brand makers, firearms, French &amp; Italian antique furnishings, large group of Native American handcrafted jewelry, Texas art including a large Dahlhart Windberg\r\nPainting, mid-century furniture, Baccarat &amp; Waterford stemware, horse saddles, sterling silver, and other exciting items.', '2018-07-06', '2019-08-30', '20000', '35000', 'Medium', 'Used', 13, 1),
(10, 2, '', 2, 'jewellery', 'Golden drop jewellery', 'Golden drop jewellery brings to you the exquisite, fine crafted ethnic designer jewellery to enhance your natural elegance. This jewellery is made keeping in mind the women connected to our traditional values. Its perfectly fit for any party or special occasion &amp; its graceful design complements with any ethnic or western outfit. This jewellery set is lovingly handmade with utmost care.\r\n\r\nSize: - Choker', '2018-07-06', '2019-05-30', '10000', '18000', 'Medium', 'Used', 10, 1),
(21, 2, NULL, 1, 'ytr try ty tr', 'Computer for sale', 'this is a Computer', '2019-02-13', '2019-04-20', '5000', '10000', 'Medium', 'Used', 13, 1),
(22, 2, 'Oxygen', 7, 'dsfdsfsd', 'Computer for sale', 'hgfh fgh g', '2019-02-07', '2019-03-21', '5000', '265000', 'Medium', 'Used', 13, 1),
(23, 1, 'oxygen', 4, 'jahs', 'Auction from mobile', 'This is description', '2019-02-20', '2019-03-21', '500', '700', 'Good', 'Used', 13, 1),
(24, 1, 'oxygen', 4, 'jahs', 'Auction from mobile', 'This is description', '2019-02-20', '2019-05-28', '500', '700', 'Good', 'Used', 13, 1),
(25, 2, 'Agrabad,Chittagon, Bangladesh  ', 4, 'Cloth', 'Dress', 'A beautiful dress with a gorgeous dupatta', '2019-02-18', '2019-04-30', '4000', '6000', 'Good', 'New', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auction_image`
--

CREATE TABLE `auction_image` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `auction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction_image`
--

INSERT INTO `auction_image` (`id`, `image`, `status`, `auction_id`) VALUES
(8, 'public/uploads/auction/auction-prod.jpg', 1, 8),
(9, 'public/uploads/auction/62765334_1_x.jpg', 1, 9),
(10, 'public/uploads/auction/IMG_9950_1024x1024.jpg', 1, 10),
(11, 'public/uploads/auction/618162045554.jpg', 1, 11),
(12, 'public/uploads/auction/339266045554.jpg', 1, 11),
(13, 'public/uploads/auction/774152045639.jpg', 1, 12),
(14, 'public/uploads/auction/947916045639.jpg', 1, 12),
(15, 'public/uploads/auction/954121050334.jpg', 1, 13),
(16, 'public/uploads/auction/853656050334.jpg', 1, 13),
(17, 'public/uploads/auction/190712051434.jpg', 1, 14),
(18, 'public/uploads/auction/742650051434.jpg', 1, 14),
(19, '/public/uploads/auction/554517051457.jpg', 1, 15),
(20, '/public/uploads/auction/522410051457.jpg', 1, 15),
(21, '/public/uploads/auction/923277051900.jpg', 1, 16),
(22, '/public/uploads/auction/756735051900.jpg', 1, 16),
(23, '/public/uploads/auction/670358051918.jpg', 1, 17),
(24, '/public/uploads/auction/106045051918.jpg', 1, 17),
(25, '/public/uploads/auction/573430051944.jpg', 1, 18),
(26, '/public/uploads/auction/261578051944.jpg', 1, 18),
(27, '/public/uploads/auction/836184052019.jpg', 1, 19),
(28, '/public/uploads/auction/401683052019.jpg', 1, 19),
(29, '/public/uploads/auction/240390052151.jpg', 1, 20),
(30, '/public/uploads/auction/758013052151.jpg', 1, 20),
(31, 'public/uploads/auction/34752552_1687254751382717_1923505832272592896_n.jpg', 1, 21),
(32, 'public/uploads/auction/34690241_1687254734716052_4122733459548405760_n.jpg', 1, 22),
(33, 'public/uploads/auction/848711105216.jpeg', 1, 23),
(34, 'public/uploads/auction/948778105319.jpeg', 1, 24),
(35, 'public/uploads/auction/Screenshot_2019-02-16-17-26-20-057_com.facebook.katana.png', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `auction_time` datetime DEFAULT NULL,
  `bid_price` decimal(10,0) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `auction_id`, `auction_time`, `bid_price`, `status`, `users_id`) VALUES
(1, 8, '2018-05-14 00:00:00', '5600', 1, 11),
(2, 8, '2018-05-14 00:00:00', '5700', 1, 11),
(3, 21, '2019-02-13 00:00:00', '5000', 1, 13),
(4, 21, '2019-02-13 00:00:00', '1000', 1, 13),
(5, 22, '2019-02-07 00:00:00', '200', 1, 13),
(6, 22, '2019-02-17 10:31:47', '300', 1, 20),
(8, 24, '2019-02-17 10:54:30', '500', 1, 13),
(9, 23, '2019-02-17 10:54:50', '300', 1, 13),
(10, 8, '2019-02-17 06:21:32', '5800', 1, 24),
(11, 25, '2019-02-18 00:00:00', '500', 1, 13),
(15, 8, '2019-02-28 07:59:51', '2000', 1, 20),
(16, 10, '2019-02-28 08:00:21', '5000', 1, 20),
(17, 8, '2018-05-14 00:00:00', '5000', 1, 11),
(18, 8, '2018-05-14 00:00:00', '5000', 1, 11),
(19, 8, '2018-05-14 00:00:00', '3500', 1, 11),
(20, 8, '2018-05-14 00:00:00', '9000', 1, 24),
(21, 8, '2018-05-14 00:00:00', '9100', 1, 24),
(22, 8, '2018-05-14 00:00:00', '1200', 1, 11),
(23, 8, '2018-05-14 00:00:00', '4000', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `pid` int(11) DEFAULT 0,
  `sort_order` int(11) DEFAULT 0,
  `category_image` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `pid`, `sort_order`, `category_image`, `status`) VALUES
(1, 'Electronics', 0, 0, 'public/images/electronics_cat.jpg', 1),
(2, 'Property', 0, 0, 'public/images/property_cat.jpg', 1),
(3, 'Vehicles', 0, 0, 'public/images/vehicles_cat.jpg', 1),
(4, 'Clothing', 0, 0, 'public/images/demo_cat.png', 1),
(5, 'Health and Beauty', 0, 0, 'public/images/demo_cat.png', 1),
(6, 'Mobiles', 1, 0, 'public/images/cat1.png', 1),
(7, 'Computers', 1, 0, 'public/images/demo_cat.png', 1),
(8, 'TVs', 1, 0, 'public/images/demo_cat.png', 1),
(13, 'Furniture', 0, 0, NULL, 1),
(14, 'jewellery', 0, 0, NULL, 1),
(16, 'House', 2, 0, NULL, 1),
(17, 'Bags', 5, 0, NULL, 1),
(18, 'Ring', 14, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `chat_room_id` int(11) NOT NULL,
  `chat_msg` varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `chat_room_id`, `chat_msg`, `userid`, `chat_date`) VALUES
(1, 30, 'hi', 14, '2018-05-14 20:17:28'),
(2, 30, 'I\'m annie', 14, '2018-05-14 20:17:36'),
(3, 25, 'hi', 14, '2018-05-14 20:18:46'),
(4, 25, 'want to buy this.', 14, '2018-05-14 20:19:10'),
(5, 25, 'this is annie', 14, '2018-05-14 20:19:19'),
(6, 29, 'hi', 11, '2018-05-16 10:41:15'),
(7, 29, 'hi', 11, '2018-05-16 10:41:19'),
(8, 29, 'I want to buy this shirt', 11, '2018-05-16 10:41:33'),
(9, 30, 'hi,, this is annie', 11, '2018-05-16 10:42:33'),
(10, 30, 'are u there?', 11, '2018-05-16 10:42:48'),
(11, 27, 'hi', 11, '2018-05-16 10:43:27'),
(12, 27, 'I want to buy this', 11, '2018-05-16 10:43:35'),
(13, 28, 'hi satho', 9, '2018-05-16 10:47:51'),
(14, 28, 'I\'m annie', 9, '2018-05-16 10:47:59'),
(15, 28, 'I\'m annie', 9, '2018-05-16 10:48:01'),
(16, 28, 'want to buy this', 9, '2018-05-16 10:48:10'),
(17, 25, 'hey', 9, '2018-05-16 10:48:50'),
(18, 25, 'hey', 9, '2018-05-16 10:48:59'),
(19, 26, 'hi', 9, '2018-05-16 10:50:04'),
(20, 26, 'are you there?', 9, '2018-05-16 10:50:15'),
(21, 0, 'assd', 14, '2018-05-22 14:37:35'),
(22, 0, 'assd', 14, '2018-05-22 14:37:36'),
(23, 0, 'assd', 14, '2018-05-22 14:37:36'),
(24, 0, 'Ø§hello', 0, '2018-05-26 08:52:25'),
(25, 31, 'hi', 11, '2018-07-10 13:33:18'),
(26, 31, 'hello RFL', 11, '2018-07-10 13:33:28'),
(27, 31, 'i want to buy this chair', 11, '2018-07-10 13:33:44'),
(28, 0, 'hello', 9, '2018-07-10 15:08:52'),
(29, 0, 'asd', 9, '2018-07-10 15:14:37'),
(30, 0, 'asdasd', 9, '2018-07-10 15:14:45'),
(31, 0, 'Abc', 11, '2018-07-25 21:15:49'),
(32, 0, 'hjh', 9, '2018-08-11 20:53:48'),
(33, 25, 'asd', 9, '2018-08-31 19:16:55'),
(34, 26, 'wts da prc   s ?', 11, '2018-08-31 19:42:46'),
(35, 32, 'as', 9, '2018-09-04 14:54:05'),
(36, 32, 'as', 9, '2018-09-04 14:58:28'),
(37, 32, 'ASD', 9, '2018-09-04 15:03:54'),
(38, 32, 'ASD asd', 9, '2018-09-04 15:04:01'),
(39, 32, 'ASD asd', 9, '2018-09-04 15:04:01'),
(40, 32, 'asd', 9, '2018-09-04 15:06:27'),
(41, 32, 'asd', 9, '2018-09-04 15:06:42'),
(42, 33, 'Hi!', 10, '2018-09-05 12:39:45'),
(43, 25, 'Hello this is very good product', 20, '2019-02-07 22:52:48'),
(46, 25, 'very good product', 11, '2019-02-08 07:50:37'),
(47, 25, 'thisi sis asdsa dsadsa ', 10, '2019-02-08 07:50:46'),
(48, 25, 'still available. do you want to buy this product?', 11, '2019-02-08 07:52:13'),
(49, 25, 'Hello i want to buy', 10, '2019-02-08 09:08:24'),
(50, 25, 'Hello i want to buy', 10, '2019-02-08 09:08:28'),
(51, 25, 'Hello i want to buy', 10, '2019-02-08 09:09:22'),
(52, 25, 'Hello i want to buy', 10, '2019-02-08 09:09:33'),
(53, 25, 'Hello i want to buy', 10, '2019-02-08 09:10:09'),
(54, 25, 'Hello i want to buy', 10, '2019-02-08 09:10:19'),
(55, 25, 'Hello i want to buy', 10, '2019-02-08 09:10:33'),
(56, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:14'),
(57, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:16'),
(58, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:39'),
(59, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:40'),
(60, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:40'),
(61, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:41'),
(62, 25, 'Hello i want to buy', 10, '2019-02-08 09:12:41'),
(63, 25, 'This is a message', 10, '2019-02-08 09:14:54'),
(64, 25, 'This is a message', 10, '2019-02-08 09:16:26'),
(65, 25, 'This is a message', 10, '2019-02-08 09:16:40'),
(66, 25, 'This is a message', 10, '2019-02-08 09:17:20'),
(67, 25, 'This is a message', 10, '2019-02-08 09:17:41'),
(68, 25, 'is this still available?', 20, '2019-02-08 09:27:29'),
(69, 25, 'yes', 11, '2019-02-08 09:34:36'),
(70, 25, 'This is a message', 10, '2019-02-08 09:41:56'),
(71, 25, 'This is a message', 10, '2019-02-08 09:42:18'),
(72, 25, 'This is a message', 10, '2019-02-08 09:43:12'),
(73, 25, 'tell', 11, '2019-02-08 09:43:29'),
(74, 25, 'thanks', 20, '2019-02-08 09:44:45'),
(75, 25, 'why?', 11, '2019-02-08 09:47:00'),
(76, 25, 'hello', 13, '2019-02-08 09:51:04'),
(77, 25, 'hello', 13, '2019-02-08 09:57:32'),
(78, 25, 'hello', 13, '2019-02-08 09:57:35'),
(79, 25, 'hi', 13, '2019-02-08 10:04:52'),
(80, 25, 'hi', 13, '2019-02-08 10:04:55'),
(81, 25, 'hi', 20, '2019-02-08 10:08:21'),
(82, 25, 'hi', 20, '2019-02-08 10:08:59'),
(83, 25, 'hello', 20, '2019-02-08 10:14:29'),
(84, 26, 'is this available?', 11, '2019-02-08 10:15:07'),
(85, 25, 'are u?', 20, '2019-02-08 10:15:17'),
(86, 25, 'good', 20, '2019-02-08 10:22:44'),
(87, 25, 'good', 20, '2019-02-08 10:22:46'),
(88, 25, 'is it ok?', 20, '2019-02-09 05:03:47'),
(89, 25, 'Hello', 20, '2019-02-09 05:07:53'),
(90, 25, 'how are you?', 11, '2019-02-08 11:09:11'),
(91, 25, 'fine', 20, '2019-02-09 05:09:32'),
(92, 25, 'is it available?', 20, '2019-02-09 05:11:12'),
(93, 25, 'yes', 0, '2019-02-08 11:11:29'),
(94, 25, 'yes', 11, '2019-02-08 11:12:08'),
(95, 25, 'SO? ', 20, '2019-02-09 05:12:44'),
(96, 25, 'what so?', 11, '2019-02-08 11:13:02'),
(97, 25, 'nothin', 20, '2019-02-09 05:14:16'),
(98, 25, 'good', 20, '2019-02-09 05:14:45'),
(99, 25, 'yes', 20, '2019-02-09 05:14:49'),
(100, 25, 'no', 20, '2019-02-09 05:14:52'),
(101, 25, 'how?', 20, '2019-02-09 05:14:56'),
(102, 25, 'jmm', 11, '2019-02-08 11:15:13'),
(103, 73, 'hello', 13, '2019-02-08 11:37:18'),
(104, 73, 'I want to buy this', 13, '2019-02-08 11:37:28'),
(105, 25, 'anyone here?', 13, '2019-02-08 11:37:46'),
(106, 74, 'hello', 11, '2019-02-09 10:15:50'),
(107, 74, 'is it available?', 13, '2019-02-10 04:16:02'),
(108, 74, 'yes', 11, '2019-02-09 10:16:13'),
(109, 76, 'hi', 11, '2019-02-09 11:29:09'),
(110, 76, 'hi', 11, '2019-02-09 11:29:11'),
(111, 76, 'hey', 24, '2019-02-10 09:17:16'),
(112, 76, 'hey', 24, '2019-02-10 09:17:19'),
(113, 25, 'hey', 24, '2019-02-10 09:17:56'),
(114, 25, 'hi', 24, '2019-02-10 09:18:24'),
(115, 25, 'is this still available?', 20, '2019-02-12 03:30:18'),
(116, 25, 'is this still available?', 20, '2019-02-12 03:30:22'),
(117, 72, 'abcd', 25, '2019-02-12 04:25:21'),
(118, 72, 'hi', 25, '2019-02-12 04:25:38'),
(119, 72, 'hlw', 25, '2019-02-12 04:26:27'),
(120, 72, 'hlwwww', 25, '2019-02-12 04:26:47'),
(121, 27, 'hello', 11, '2019-02-12 04:55:31'),
(122, 80, 'hi', 11, '2019-02-18 14:47:21'),
(123, 25, 'hello', 11, '2019-02-18 15:00:20'),
(124, 79, 'hi', 13, '2019-02-19 04:19:24'),
(125, 71, 'hi', 13, '2019-02-19 04:19:58'),
(126, 71, 'hi', 13, '2019-02-19 04:20:06'),
(127, 71, 'hello', 13, '2019-02-19 04:20:29'),
(128, 77, 'hi', 24, '2019-02-19 07:42:07'),
(129, 33, 'interested', 25, '2019-02-19 03:27:04'),
(130, 25, 'hi', 0, '2019-02-23 07:56:05'),
(131, 26, 'User hi?', 20, '2019-02-25 08:01:54'),
(132, 72, 'hello', 11, '2019-02-26 06:14:22'),
(133, 72, 'hello', 11, '2019-02-26 06:14:18'),
(134, 72, 'Jonyed....hello', 11, '2019-02-26 06:15:22'),
(135, 25, 'MD Zisad do you want to buy?', 11, '2019-02-26 06:17:38'),
(136, 25, 'Sathi yes', 20, '2019-02-26 06:17:55'),
(137, 25, 'MD Zisad ok', 11, '2019-02-26 06:18:22'),
(138, 25, 'thanks', 20, '2019-02-26 06:18:35'),
(139, 72, 'hi', 24, '2019-02-27 06:58:14'),
(140, 72, 'Sathi hi', 24, '2019-02-27 06:58:28'),
(141, 78, 'hi', 24, '2019-02-27 06:59:15'),
(142, 79, 'RFL COMPANY hi', 24, '2019-02-27 06:59:35'),
(143, 72, 'Sathi hlw', 24, '2019-02-27 07:00:15'),
(144, 72, 'Sathi hlw', 24, '2019-02-27 07:00:18'),
(145, 26, 'any hi', 11, '2019-02-27 07:05:28'),
(146, 26, 'hi', 11, '2019-02-27 07:05:43'),
(147, 28, 'hi...annie', 11, '2019-02-27 07:06:31'),
(148, 25, 'Sathi have you received notofication?', 20, '2019-02-27 07:47:09'),
(149, 25, 'any have you got?', 20, '2019-02-27 07:47:25'),
(150, 25, 'i got the notification ', 0, '2019-02-27 07:49:54'),
(151, 25, 'MD Zisad are you ready?', 13, '2019-02-27 11:33:34'),
(152, 25, 'RFL COMPANY  yes', 20, '2019-02-27 11:34:16'),
(153, 25, 'MD Zisad ok', 13, '2019-02-27 11:35:05'),
(154, 25, 'hi', 20, '2019-02-27 11:37:26'),
(155, 25, 'MD Zisad yes', 11, '2019-02-27 11:37:59'),
(156, 25, 'MD Zisad ok', 11, '2019-02-27 11:38:42'),
(157, 25, 'Sathi yes', 20, '2019-02-27 11:39:19'),
(158, 25, 'MD Zisad hjff', 11, '2019-02-27 11:39:41'),
(159, 25, 'MD Zisad yes', 11, '2019-02-27 11:40:17'),
(160, 25, 'MD Zisad yes', 11, '2019-02-27 11:40:22'),
(161, 25, 'MD Zisad ok', 11, '2019-02-27 11:42:41'),
(162, 25, 'Sathi hello', 20, '2019-02-27 11:43:37'),
(163, 82, 'hi', 11, '2019-02-27 01:16:26'),
(164, 27, 'any..hi', 11, '2019-02-27 01:18:19'),
(165, 32, 'asd..hi', 11, '2019-02-27 01:18:51'),
(166, 25, 'hu', 20, '2019-02-28 03:48:13'),
(167, 25, 'MD Zisad hello', 13, '2019-02-28 04:52:22'),
(168, 25, 'RFL COMPANY hi', 20, '2019-02-28 04:52:39'),
(169, 25, 'MD Zisad hi', 13, '2019-02-28 04:54:04'),
(170, 25, 'RFL COMPANY  yes', 20, '2019-02-28 04:54:35'),
(171, 25, 'hello', 0, '2019-02-28 04:55:16'),
(172, 25, 'RFL COMPANY how are you?', 0, '2019-02-28 04:55:40'),
(173, 25, 'Sathi r', 13, '2019-02-28 05:33:44'),
(174, 25, 'hi', 11, '2019-02-28 07:50:24'),
(175, 25, 'Sathi ', 11, '2019-02-28 07:50:34'),
(176, 25, 'Sathi ', 11, '2019-02-28 07:50:37'),
(177, 25, 'how', 11, '2019-02-28 07:50:50'),
(178, 25, 'hu', 11, '2019-02-28 07:51:00'),
(179, 29, 'hi', 11, '2019-02-28 07:51:18'),
(180, 29, 'any', 11, '2019-02-28 07:51:29'),
(181, 29, 'Sathi hlw', 24, '2019-03-02 05:20:21'),
(182, 29, 'Sathi hlw', 24, '2019-03-02 05:20:25'),
(183, 26, 'MD Zisad...Hi', 11, '2019-03-02 05:20:27'),
(184, 26, 'Sathi hello', 20, '2019-03-02 05:20:54'),
(185, 29, 'Sathi hi', 24, '2019-03-02 05:20:55'),
(186, 25, 'Sathi hello', 20, '2019-03-02 05:24:13'),
(187, 25, 'hlw', 24, '2019-03-02 05:24:22'),
(188, 25, 'hlw', 24, '2019-03-02 05:24:26'),
(189, 25, 'MD Zisad hi', 24, '2019-03-02 05:24:46'),
(190, 25, 'Sathi hi', 24, '2019-03-02 05:25:06'),
(191, 72, 'hello', 20, '2019-03-02 05:28:53'),
(192, 72, 'MD Zisad hlw', 24, '2019-03-02 05:29:56'),
(193, 72, 'any hi', 20, '2019-03-02 05:30:09'),
(194, 72, 'any hi', 20, '2019-03-02 05:30:13'),
(195, 72, 'any . hi', 11, '2019-03-02 05:30:40'),
(196, 72, 'hi', 24, '2019-03-02 05:45:21'),
(197, 72, 'hello', 20, '2019-03-02 05:45:32'),
(198, 72, 'any...hlw', 11, '2019-03-02 05:45:46'),
(199, 71, 'hi', 24, '2019-03-02 08:15:10'),
(200, 25, 'any...hello', 11, '2019-03-02 08:15:59'),
(201, 72, 'Sathi hi', 24, '2019-03-02 08:16:36'),
(202, 72, 'hlw', 24, '2019-03-02 08:17:32'),
(203, 72, 'Sathi hlw', 24, '2019-03-02 08:17:57'),
(204, 72, 'Sathi will u take it? ', 24, '2019-03-02 08:18:37'),
(205, 25, 'Sathi hi', 24, '2019-03-02 08:19:08'),
(206, 25, 'Sathi are u there?', 24, '2019-03-02 09:05:36'),
(207, 72, 'any...hello', 11, '2019-03-03 07:00:32'),
(208, 72, 'any...hello', 11, '2019-03-03 07:00:36'),
(209, 28, 'hi', 11, '2019-03-03 07:01:12'),
(210, 28, 'Sathi hlw', 24, '2019-03-03 07:01:49'),
(211, 28, 'any...kmn ahcen??', 11, '2019-03-03 07:02:13'),
(212, 72, 'Sathi hlw', 24, '2019-03-03 07:02:44'),
(213, 72, 'any hello', 11, '2019-03-03 07:03:27'),
(214, 72, 'any hi', 11, '2019-03-03 07:03:43'),
(215, 72, 'Sathi hlw', 24, '2019-03-03 07:04:15'),
(216, 72, 'Sathi pagla', 24, '2019-03-03 07:05:01'),
(217, 72, 'Sathi paglu', 24, '2019-03-03 07:05:24'),
(218, 72, 'any yes', 11, '2019-03-03 07:09:18'),
(219, 72, 'Sathi hi', 24, '2019-03-03 07:09:53'),
(220, 28, 'Sathi hi', 20, '2019-03-03 07:14:23'),
(221, 28, 'any hello', 20, '2019-03-03 07:14:34'),
(222, 28, 'any yes', 20, '2019-03-03 07:14:55'),
(223, 28, 'any hello', 11, '2019-03-03 07:16:10'),
(224, 80, 'Sathi hi', 24, '2019-03-03 07:16:13'),
(225, 80, 'any hello', 11, '2019-03-03 07:16:31'),
(226, 80, 'hi', 24, '2019-03-03 07:17:01'),
(227, 25, 'any hello', 11, '2019-03-03 07:19:10'),
(228, 25, 'any hello', 11, '2019-03-03 07:20:25'),
(229, 25, 'hi', 20, '2019-03-03 07:21:17'),
(230, 25, 'MD Zisad yes', 11, '2019-03-03 07:21:32'),
(231, 25, 'any hi', 20, '2019-03-03 07:21:43'),
(232, 25, 'Sathi hi', 20, '2019-03-03 07:22:24'),
(233, 25, 'MD Zisad yes', 11, '2019-03-03 07:22:44'),
(234, 25, 'Sathi yes', 20, '2019-03-03 07:23:34'),
(235, 25, 'MD Zisad yes', 11, '2019-03-03 07:23:48'),
(236, 25, 'any hi', 11, '2019-03-03 07:24:07'),
(237, 25, 'Sathi yes', 11, '2019-03-03 07:24:15'),
(238, 25, 'Sathi hi', 20, '2019-03-03 07:24:26'),
(239, 83, 'any..hello', 11, '2019-03-03 15:21:42'),
(240, 30, 'hi', 11, '2019-03-08 11:17:12'),
(241, 26, 'hello', 24, '2019-03-09 04:36:34'),
(242, 25, 'Sathi hi', 24, '2019-03-09 10:01:01'),
(243, 25, 'MD Zisad hi', 24, '2019-03-09 10:02:39'),
(244, 96, 'Hello', 11, '2019-03-13 19:03:34'),
(245, 25, 'hello', 11, '2019-03-13 19:04:12'),
(246, 95, 'Hello', 20, '2019-03-30 18:21:33'),
(247, 95, 'Is it available?', 20, '2019-03-30 18:21:42'),
(248, 95, 'MD Zisad...hi', 11, '2019-03-30 06:23:08'),
(249, 99, 'hello', 11, '2019-03-31 03:56:42'),
(250, 102, 'h2', 24, '2019-03-31 05:40:11'),
(251, 102, 'h2', 24, '2019-03-31 05:40:29'),
(252, 102, 'hello', 24, '2019-03-31 05:40:32'),
(253, 102, 'hello', 24, '2019-03-31 05:40:35'),
(254, 102, 'hi', 24, '2019-03-31 05:42:41'),
(255, 102, 'any..hello', 11, '2019-03-31 05:45:56'),
(256, 28, 'hello', 11, '2019-04-13 05:18:48'),
(257, 28, 'hi', 11, '2019-04-13 05:19:22'),
(258, 101, 'hello', 11, '2019-04-13 05:19:52'),
(259, 25, 'any hi', 11, '2019-04-13 05:20:32'),
(260, 31, 'hello', 11, '2019-04-20 07:08:39'),
(261, 72, 'any..hello', 11, '2019-04-20 07:09:27'),
(262, 72, 'any..hello', 11, '2019-04-20 07:09:31'),
(263, 31, 'hlw', 24, '2019-04-20 07:10:26'),
(264, 31, 'hlw', 24, '2019-04-20 07:10:29'),
(265, 31, 'Sathi hi', 24, '2019-04-20 07:10:38'),
(266, 31, 'Sathi hi', 24, '2019-04-20 07:10:56'),
(267, 82, 'Sathi hi', 24, '2019-04-20 07:11:55'),
(268, 79, 'hello', 20, '2019-04-20 07:12:39'),
(269, 79, 'hello', 11, '2019-04-20 07:12:46'),
(270, 79, 'hi', 24, '2019-04-20 07:13:04'),
(271, 79, 'Sathi hi', 24, '2019-04-20 07:13:55'),
(272, 26, 'any r u ok', 11, '2019-04-20 07:15:33'),
(273, 26, 'any r u ok', 11, '2019-04-20 07:15:36'),
(274, 26, 'MD Zisad hello', 11, '2019-04-20 07:15:59'),
(275, 26, 'MD Zisad hello', 11, '2019-04-20 07:16:02'),
(276, 72, 'Sathi hello', 20, '2019-04-20 07:18:47'),
(277, 27, 'hi', 11, '2019-04-20 07:23:28'),
(278, 25, 'MD Zisad hwl', 11, '2019-04-20 07:24:11'),
(279, 25, 'MD Zisad hl', 11, '2019-04-20 07:24:37'),
(280, 25, 'MD Zisad hwl', 11, '2019-04-20 07:26:25'),
(281, 25, 'MD Zisad hello', 11, '2019-04-23 11:55:15'),
(282, 83, 'hello', 11, '2019-04-23 11:55:54'),
(283, 83, 'hello', 11, '2019-04-23 11:56:16'),
(284, 82, 'hi', 11, '2019-04-23 11:56:37'),
(285, 82, 'hello', 11, '2019-04-23 11:57:37'),
(286, 84, 'hi', 11, '2019-04-26 11:56:25'),
(287, 26, 'hello', 11, '2019-04-26 11:57:17'),
(288, 26, 'hello', 11, '2019-04-26 11:57:34'),
(289, 26, 'hello', 11, '2019-04-26 11:58:02'),
(290, 86, 'hi', 11, '2019-04-26 03:50:08'),
(291, 103, 'hi', 11, '2019-04-26 03:50:39'),
(292, 100, 'hello', 11, '2019-04-26 03:51:04'),
(293, 82, 'hello', 11, '2019-04-26 05:25:52'),
(294, 25, 'hello', 20, '2019-04-26 06:59:31'),
(295, 25, 'MD Zisad how are you?', 20, '2019-04-26 07:00:24'),
(296, 25, 'MD Zisad how are you?', 20, '2019-04-26 07:00:27'),
(297, 25, 'hello', 11, '2019-04-26 07:01:30'),
(298, 25, 'MD Zisad hello', 11, '2019-04-26 07:01:44'),
(299, 25, 'Sathi hello', 20, '2019-04-26 07:03:20'),
(300, 25, 'Sathi how', 20, '2019-04-26 07:04:29'),
(301, 25, 'Sathi hello', 20, '2019-04-26 07:10:46'),
(302, 25, 'Sathi hi', 20, '2019-04-26 07:12:01'),
(303, 26, 'Sathi hi', 20, '2019-04-26 07:19:03'),
(304, 26, 'MD Zisad yes', 0, '2019-04-26 07:19:31'),
(305, 26, 'MD Zisad are you there?', 20, '2019-04-26 07:20:59'),
(306, 26, 'MD Zisad hello', 13, '2019-04-26 07:22:29'),
(307, 26, 'RFL COMPANY yes', 20, '2019-04-26 07:22:53'),
(308, 86, 'hi', 11, '2019-04-27 12:20:35'),
(309, 85, 'hello', 11, '2019-04-27 12:21:15'),
(310, 25, 'hello', 11, '2019-04-27 12:21:45'),
(311, 26, 'hwll', 11, '2019-04-27 12:35:06'),
(312, 91, 'hello', 11, '2019-04-27 12:36:01'),
(313, 26, 'hi', 11, '2019-04-27 03:37:54'),
(314, 95, 'hello', 11, '2019-04-27 03:50:03'),
(315, 104, 'hello', 11, '2019-04-27 04:01:14'),
(316, 26, 'MD Zisad hi', 13, '2019-04-27 07:01:40'),
(317, 26, 'RFL COMPANY hello', 20, '2019-04-27 07:01:57'),
(318, 28, 'MD Zisad hello', 11, '2019-04-27 01:00:05'),
(319, 28, 'MD Zisad hello', 11, '2019-04-27 01:00:08'),
(320, 100, 'hi', 11, '2019-04-27 07:48:43'),
(321, 72, 'hi', 13, '2019-04-27 08:18:38'),
(322, 27, 'hello', 11, '2019-04-28 03:08:32'),
(323, 31, 'Sathi hi', 24, '2019-04-28 04:11:55'),
(324, 25, 'Sathi i want to buy this', 24, '2019-04-28 04:12:22'),
(325, 25, 'Sathi hlw', 24, '2019-04-28 04:19:33'),
(326, 25, 'any hi ', 11, '2019-04-28 04:19:44'),
(327, 25, 'Sathi hi', 24, '2019-04-28 04:19:49'),
(328, 25, 'Sathi ashche', 24, '2019-04-28 04:20:30'),
(329, 25, 'Sathi ashche', 24, '2019-04-28 04:20:34'),
(330, 25, 'any asce', 11, '2019-04-28 04:20:47'),
(331, 28, 'hello', 11, '2019-04-28 06:50:52'),
(332, 29, 'hi', 11, '2019-04-28 06:51:51'),
(333, 106, 'hello', 11, '2019-04-28 06:52:39'),
(334, 106, 'hello', 11, '2019-04-28 06:52:49'),
(335, 106, 'i want to buy this', 11, '2019-04-28 06:53:22'),
(336, 31, 'hwl', 11, '2019-04-28 06:54:11'),
(337, 102, 'hi', 11, '2019-05-03 16:01:58'),
(338, 106, 'hi', 11, '2019-05-03 16:03:06'),
(339, 85, 'hi', 11, '2019-05-03 04:04:03'),
(340, 72, 'any hi', 11, '2019-05-05 06:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `chat_room_id` int(11) NOT NULL,
  `chat_room_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `division` varchar(45) DEFAULT NULL,
  `city_name` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `division`, `city_name`, `status`) VALUES
(1, 'BARISHAL', 'BARISHAL', 1),
(2, 'CHITTAGONG', 'CHITTAGONG', 1),
(3, 'DHAKA', 'DHAKA', 1),
(4, 'KHULNA', 'KHULNA', 1),
(5, 'MYMENSINGH', 'MYMENSINGH', 1),
(6, 'RAJSHAHI', 'RAJSHAHI', 1),
(7, 'RANGPUR', 'RANGPUR', 1),
(8, 'SYLHET', 'SYLHET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `fcm_notification_token`
--

CREATE TABLE `fcm_notification_token` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `token` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fcm_notification_token`
--

INSERT INTO `fcm_notification_token` (`id`, `name`, `token`) VALUES
(1, 'Sathi', 'eero9qEDStA:APA91bE5J28peaTHYq54jePBpOQJByA0qdCVd_inAA3BuK1gVEHO0EcwvZrwDpV4PqUj4L5mp8sQ7anQTbEbOt49qUiDrlmBUsFZp4bJcH574pZbn6dGxd2pPBKRel9MrbdWYahm6qXp');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `location`, `city_id`) VALUES
(1, 'Agrabad', 2),
(2, 'Lalkhan Bazar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE `online_users` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time_period` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`id`, `userid`, `time_period`) VALUES
(156, 24, NULL),
(159, 24, NULL),
(171, 20, NULL),
(172, 13, NULL),
(177, 13, NULL),
(178, 20, NULL),
(181, 13, NULL),
(183, 24, NULL),
(190, 11, NULL),
(191, 11, NULL),
(192, 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_time` time DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `location` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `post_title` varchar(45) DEFAULT NULL,
  `post_desc` text DEFAULT NULL,
  `condition1` varchar(45) DEFAULT NULL,
  `product_type` varchar(45) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_time`, `city_id`, `location`, `category_id`, `post_title`, `post_desc`, `condition1`, `product_type`, `price`, `name`, `mobile`, `email`, `userid`, `status`) VALUES
(25, '09:17:41', 2, 'Lalkhan Bazar', 6, 'Apple iPhone 5S 32gb (Used)', 'iPhone 5S\r\n\r\nStorage 32gb\r\nGolden , Space Grey and Silver Colour Available\r\nSome are fresh and some have few scratches\r\nWith charger cable\r\nThere is not a single problem on the device and 100% Genuine and Non Refurbished Phone\r\nWith 1 Year service warranty and 7 days replacement warranty\r\nNo exchange only sell\r\nThank You', 'Good', 'Negotiable', '12499', 'Farzana', '01900000000', 'farzana@gmail.com', 11, 1),
(26, '09:21:21', 2, 'Lalkhan Bazar', 7, 'Asus K550JX Core i5 4200H 8GB', 'Asus K550JX Core i5 4200H 8GB with Graphics Specifications\r\nProcessor Intel Core i5 4200H\r\nRAM 8 GB\r\nHDD 1 TB\r\nProcessor-Clock-Rate 2.8 GHz\r\nDisplay-Size 15.6 Inch\r\nDisplay-Type Full HD (1920x1080) LED Backlight Anti-Glare Display\r\nGraphics-Chipset Nvidia GTX 950M 2gb Dedicated Graphics\r\nWebcam HD\r\nCard-Reader Yes\r\nAppx-Battery-Time Up to 4.5 Hours\r\nOperating-System Free DOS\r\nWeight 2.45 Kg', 'Good', 'Negotiable', '13500', 'Md. Habib', '01900000000', 'habib@gmail.com', 11, 1),
(27, '09:28:30', 2, 'Lalkhan Bazar', 7, 'Logitech Z506(5.1) Home Theater System', 'Immersive 5.1 surround sound brings your audio to life. This 150 Watts Peak power 5.1 speaker system delivers deep, rich surround sound. ... Enjoy true surround sound via six-channel direct inputs using your computer sound card or create 3D stereo surround sound from two channel', 'Good', 'Negotiable', '8400', 'Farzana', '01900000000', 'farzana@gmail.com', 11, 1),
(28, '09:30:50', 2, 'Lalkhan Bazar', 3, 'Toyota X Corolla 2002', 'Toyota X Corolla 2002\r\nModel year: 2002\r\nRegistration year: 2005\r\nTransmission: Automatic\r\nEngine capacity: 1300 cc\r\nKilometers run: 65000', 'Good', 'Fixed_Price', '880000', 'Rasel', '01900000000', 'rasel@gmail.com', 11, 1),
(29, '09:34:11', 2, 'Lalkhan Bazar', 4, 'Polo T-Shart', '15 color\r\nOrder minimum 20 pcs', 'Good', 'Fixed_Price', '125', 'Md. Habib', '01900000000', 'habib@gmail.com', 11, 1),
(31, '01:28:53', 2, 'Agrabad', 13, 'RFL Furniture', 'Tk 1260\r\nSKU: DPD00028\r\nSeller: DPL Distribution\r\nDelivery Time: 1-4 working days\r\nBrand: RFL Furniture\r\nDelivery Area: Dhaka City,Outside Dhaka City\r\nDelivery Charge: Free', 'Good', 'Fixed_Price', '1260', 'RFL', '012345678', 'rfl@gmail.com', 13, 1),
(72, '06:42:15', 2, 'Agrabad, Chittagong, Bangladesh ', 4, 'Dress', 'A new dress with 3piece. it is maria B collection. ', 'Good', 'Fixed Price', '4000', 'any', '01888888888', 'a@gmail.com', 24, 1),
(76, '05:26:59', 2, 'kjgkg uygk', 7, 'Computer for sale', 'this is a computer', 'Good', 'Negotiable', '6500', 'Zisad', '01869', 'seller@gmail.com', 13, 1),
(79, '06:25:50', 2, 'Agrabad, Chittagong, Bangladesh ', 4, 'Dress ', 'A gorgeous ambroidary dress', 'Good', 'Fixed Price', '2000', 'any', '0188888888', 'a@gmail.com', 24, 1),
(82, '01:16:12', 2, 'Chawkbazar', 4, 'Sari', 'its quality is good', 'Good', 'Fixed Price', '700', 'Sathi', '018181234567', 'Tf@gmail.com', 11, 1),
(83, '08:41:17', 2, 'lalkanbazar', 6, 'LG V20-64GB-Titan(Verizon)Smartphone', '&quot;used-Verizon  LG V20 64gb Smartphone-Titan Gray.No Verizon SIM Card Included.Sold AS-IS.Original Box includes:battery,generic A/C adapter and USB Cable as shown. Apple iPads.Samsung phones.&quot;', 'Good', 'Negotiable', '20000', 'sathi', '01819671100', 'KA@gmail.com', 11, 1),
(84, '09:39:29', 2, 'chawkbazar', 14, 'necklace', 'Anklet Indian Payal JewelryGreen white Gold Bells Tone Ankle Adjustable 2 units', 'Medium', 'Negotiable', '550', 'Sathi', '01224567890', 'Tf@gmail.com', 11, 1),
(85, '09:44:59', 2, 'pobortok,cricle', 14, 'Ring', 'Filigree Celtic Chevron Thumb Ring 925 Sterling Silver Band Sizes 3-12 New', 'Good', 'Fixed_Price', '350', 'Sathi', '01824222556', 'H@gmail.com', 11, 1),
(86, '11:38:30', 2, 'Asadgonj,ktowali', 13, 'sofa', 'Folding Leather Convertible couch futon sofa bed sleeper living from furniture', 'Medium', 'Negotiable', '4500', 'Sathi', '01111111112', 'Ar@gmail.com', 11, 1),
(87, '11:47:35', 2, 'anderkilla,kotowali', 17, 'ladies bag', 'Women Synthetic Leather Handbag Shoulder Ladies Purse Messenger Satchel Tote Bag', 'Good', 'Fixed_Price', '880', 'Sathi', '01824180059', 'HASAN@gmail.com', 11, 1),
(91, '09:16:52', 2, 'GEC', 4, 'Baby Clothes', 'Children clothes girls boutique clothing with 2 pcs ruffle outfit kids.   Material:Cotton Size: Customized Size.Season:Summer.Age:0-12 years old baby                       ', 'Medium', 'Fixed Price', '450', 'Sathi', '01812368529', 'b@gmail.com', 11, 1),
(95, '11:38:55', 2, 'GEC Circle, Chittagong, Bangladesh', 4, 'children cloth', 'Meterial:Cotton\r\nColor:Picture', 'Medium', 'Fixed_Price', '400', 'Sathi', '01823990012', 'Sa@gmail.com', 11, 1),
(97, '08:29:35', 2, 'GEC Circle, Chittagong, Bangladesh', 8, 'LED', 'Smart television/32 inch LED potable TV with', 'Medium', 'Negotiable', '30000', 'Sathi', '0181111122', 'sathi@gmail.com', 11, 1),
(99, '09:33:38', 2, 'chawkbazar,Chittagong', 14, 'Charm Bracelet', 'Gold Plated Charm Bracelet                                                                                                                                            Material:Brass                                                                                                                                                                 Closure:Lobster', 'Good', 'Fixed_Price', '776', 'Sathi', '01824003355', 'Sat@gmail.com', 11, 1),
(100, '04:05:01', 2, 'GEC', 18, 'Ear ring', 'Material :Aloy                                      Zircon Stone', 'Medium', 'Fixed Price', '360', 'Sathi', '01814000010', 'Sathi@ gmail.com', 11, 1),
(101, '10:59:22', 3, 'Mirpur', 5, 'Makeup', 'Beauty is being comfortable and confident  in your own skin. Be sure what you want and be sure about yourself.', 'Good', 'Negotiable', '1100', 'Sathi', '0181111122', 'sathi@gmail.com', 11, 1),
(102, '11:38:43', 3, 'MOHAMMADPUR', 6, 'Android Mobile Phone', '6-1-Inch Full Screen waterproof 4+64G  octa core Android Mobile Phone\r\nRAM: 4g\r\nCPU:Octa Core\r\nDesign: Bar\r\nScreen: 6.1\r\nCamera: &gt; 7MP\r\nOperation System: \r\nWindows Mobile\r\nDisplay Color: \r\nColor', 'Good', 'Fixed_Price', '5600', 'any', '01888888888', 'a@gmail.com', 24, 1),
(103, '05:38:24', 2, 'Chawkbazar', 4, 'Single.Khurti', 'Material buttersilk.                                 Long:45,Size jekono hobe', 'Good', 'Fixed Price', '450', 'Sathi', '01815000000', 'S@gmail.com', 11, 1),
(104, '05:30:03', 2, 'GEC', 4, 'ladies dress', 'all dress are very nice.color:available. size:42-48', 'Medium', 'Negotiable', '1500', 'sathi', '0181511155', 'sathi@gmail.com', 11, 1),
(105, '05:30:08', 2, 'GEC', 4, 'ladies dress', 'all dress are very nice.color:available. size:42-48', 'Medium', 'Negotiable', '1500', 'sathi', '0181511155', 'sathi@gmail.com', 11, 1),
(106, '04:31:53', 2, 'Chawkbazar', 17, 'ladies bags', 'There are many collection. color:customized choice, size:small,medium, big', 'Good', 'Negotiable', '1200', 'Sathi', '0181511155', 'Sathi@gmail.com', 11, 1),
(107, '07:35:38', 2, 'Agranad', 4, 'kamiz', 'aaaaaaaaaa', 'Good', 'Fixed Price', '5000', 'sathi', '018888888888', 's@gmail.com', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_image`
--

CREATE TABLE `post_image` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_image`
--

INSERT INTO `post_image` (`id`, `post_id`, `image`, `status`) VALUES
(22, 25, 'public/uploads/posts/iphone5s.jpg', 1),
(23, 26, 'public/uploads/posts/asus.jpg', 1),
(24, 27, 'public/uploads/posts/theator.jpg', 1),
(25, 28, 'public/uploads/posts/car1.jpg', 1),
(26, 29, 'public/uploads/posts/clt1.jpg', 1),
(28, 31, 'public/uploads/posts/0061906_classic-sofa-chair-87078-black.jpeg', 1),
(29, 32, 'public/uploads/posts/1.jpg', 1),
(30, 32, 'public/uploads/posts/2.jpg', 1),
(31, 32, 'public/uploads/posts/3.jpg', 1),
(34, 0, 'public/uploads/posts/402615045343.jpg', 1),
(35, 0, 'public/uploads/posts/821817045343.jpg', 1),
(36, 0, 'public/uploads/posts/604173045456.jpg', 1),
(37, 0, 'public/uploads/posts/936211045456.jpg', 1),
(38, 0, 'public/uploads/posts/584377052415.jpeg', 1),
(39, 0, 'public/uploads/posts/851372052446.jpeg', 1),
(40, 0, 'public/uploads/posts/992745052446.jpeg', 1),
(41, 0, 'public/uploads/posts/523015052612.jpeg', 1),
(42, 0, 'public/uploads/posts/402763052702.jpeg', 1),
(43, 34, 'public/uploads/posts/723143052808.jpeg', 1),
(44, 35, 'public/uploads/posts/507314060710.jpeg', 1),
(45, 36, 'public/uploads/posts/901151060852.jpeg', 1),
(46, 37, 'public/uploads/posts/861936060947.jpeg', 1),
(47, 37, 'public/uploads/posts/704998060947.jpeg', 1),
(48, 38, 'public/uploads/posts/651142061537.jpeg', 1),
(49, 39, 'public/uploads/posts/109205073255.jpeg', 1),
(50, 57, 'public/uploads/posts/977619080247.jpeg', 1),
(51, 66, 'public/uploads/posts/34772839_1687254774716048_2519554371339943936_n.jpg', 1),
(52, 66, 'public/uploads/posts/44073005_10155932069799150_4622630505630662656_o.jpg', 1),
(53, 68, 'public/uploads/posts/34690241_1687254734716052_4122733459548405760_n.jpg', 1),
(54, 69, 'public/uploads/posts/34752552_1687254751382717_1923505832272592896_n.jpg', 1),
(55, 70, 'public/uploads/posts/34752552_1687254751382717_1923505832272592896_n.jpg', 1),
(57, 72, 'public/uploads/posts/392563064215.jpeg', 1),
(58, 72, 'public/uploads/posts/242961064215.jpeg', 1),
(62, 76, 'public/uploads/posts/34752552_1687254751382717_1923505832272592896_n.jpg', 1),
(65, 79, 'public/uploads/posts/302409062550.jpeg', 1),
(68, 82, 'public/uploads/posts/943652011612.jpeg', 1),
(69, 83, 'public/uploads/posts/mobiles3.jpg', 1),
(70, 84, 'public/uploads/posts/ji.jpg', 1),
(71, 85, 'public/uploads/posts/-WYP900_1_lar.jpg', 1),
(72, 86, 'public/uploads/posts/sofa.jpg', 1),
(73, 87, 'public/uploads/posts/labag.jpg', 1),
(74, 88, 'public/uploads/posts/470826124742.jpeg', 1),
(78, 91, 'public/uploads/posts/443620091652.jpeg', 1),
(80, 93, 'public/uploads/posts/401238013105.jpeg', 1),
(81, 93, 'public/uploads/posts/158157013105.jpeg', 1),
(84, 0, 'public/uploads/posts/497273040637.jpeg', 1),
(85, 0, 'public/uploads/posts/829562040658.jpeg', 1),
(86, 0, 'public/uploads/posts/859042040712.jpeg', 1),
(87, 0, 'public/uploads/posts/357383040724.jpeg', 1),
(88, 0, 'public/uploads/posts/396188040750.jpeg', 1),
(89, 0, 'public/uploads/posts/519003040806.jpeg', 1),
(90, 0, 'public/uploads/posts/636254041706.jpeg', 1),
(91, 0, 'public/uploads/posts/591715041711.jpeg', 1),
(92, 0, 'public/uploads/posts/818629041723.jpeg', 1),
(93, 0, 'public/uploads/posts/349957041731.jpeg', 1),
(94, 0, 'public/uploads/posts/761425041738.jpeg', 1),
(95, 0, 'public/uploads/posts/279628041805.jpeg', 1),
(96, 0, 'public/uploads/posts/631796041854.jpeg', 1),
(97, 0, 'public/uploads/posts/376769042717.jpeg', 1),
(98, 0, 'public/uploads/posts/742259042830.jpeg', 1),
(99, 0, 'public/uploads/posts/842402042836.jpeg', 1),
(100, 0, 'public/uploads/posts/733894043416.jpeg', 1),
(101, 0, 'public/uploads/posts/646778043422.jpeg', 1),
(102, 0, 'public/uploads/posts/339740043501.jpeg', 1),
(103, 0, 'public/uploads/posts/406284043517.jpeg', 1),
(104, 0, 'public/uploads/posts/995024043531.jpeg', 1),
(105, 0, 'public/uploads/posts/260208044432.jpeg', 1),
(106, 95, 'public/uploads/posts/p3.jpg', 1),
(109, 0, 'public/uploads/posts/486179021117.jpeg', 1),
(110, 97, 'public/uploads/posts/tv.jpg', 1),
(111, 0, 'public/uploads/posts/418879063515.jpeg', 1),
(112, 0, 'public/uploads/posts/394540063545.jpeg', 1),
(113, 0, 'public/uploads/posts/574765063559.jpeg', 1),
(114, 0, 'public/uploads/posts/528812063612.jpeg', 1),
(115, 0, 'public/uploads/posts/696870063619.jpeg', 1),
(116, 0, 'public/uploads/posts/675471063627.jpeg', 1),
(117, 0, 'public/uploads/posts/980924063704.jpeg', 1),
(118, 0, 'public/uploads/posts/391333063720.jpeg', 1),
(119, 0, 'public/uploads/posts/385591063733.jpeg', 1),
(120, 0, 'public/uploads/posts/967998063740.jpeg', 1),
(121, 0, 'public/uploads/posts/401385063948.jpeg', 1),
(122, 0, 'public/uploads/posts/791738064724.jpeg', 1),
(124, 0, 'public/uploads/posts/567886071602.jpeg', 1),
(125, 0, 'public/uploads/posts/361145071616.jpeg', 1),
(126, 0, 'public/uploads/posts/873416032007.jpeg', 1),
(127, 0, 'public/uploads/posts/387728032043.jpeg', 1),
(128, 0, 'public/uploads/posts/334737032052.jpeg', 1),
(129, 99, 'public/uploads/posts/bracelet.jpg', 1),
(130, 100, 'public/uploads/posts/483097040501.jpeg', 1),
(131, 101, 'public/uploads/posts/mak.jpg', 1),
(132, 102, 'public/uploads/posts/an mobile.jpg', 1),
(133, 103, 'public/uploads/posts/944134053824.jpeg', 1),
(134, 104, 'public/uploads/posts/663694053003.jpeg', 1),
(135, 105, 'public/uploads/posts/602225053008.jpeg', 1),
(136, 106, 'public/uploads/posts/831359043153.jpeg', 1),
(137, 107, 'public/uploads/posts/490068073538.jpeg', 1),
(138, 107, 'public/uploads/posts/634121073538.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_tracking`
--

CREATE TABLE `post_tracking` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_tracking`
--

INSERT INTO `post_tracking` (`id`, `post_id`, `userid`, `time`) VALUES
(22, 27, 20, '2019-02-26 05:31:17'),
(23, 27, 20, '2019-02-26 05:32:34'),
(24, 28, 20, '2019-02-26 05:51:23'),
(25, 28, 20, '2019-02-26 06:06:03'),
(26, 28, 20, '2019-02-26 06:06:12'),
(27, 28, 20, '2019-02-26 06:06:15'),
(28, 28, 20, '2019-02-26 06:06:17'),
(29, 72, 11, '2019-02-26 06:14:01'),
(30, 28, 11, '2019-02-26 06:15:41'),
(31, 28, 11, '2019-02-26 06:15:45'),
(32, 28, 11, '2019-02-26 06:16:29'),
(33, 28, 11, '2019-02-26 06:16:25'),
(34, 25, 11, '2019-02-26 06:17:06'),
(35, 28, 11, '2019-02-26 06:22:00'),
(36, 28, 20, '2019-02-26 06:22:01'),
(37, 28, 20, '2019-02-26 06:25:03'),
(38, 79, 24, '2019-02-27 06:59:02'),
(40, 79, 24, '2019-02-27 06:59:23'),
(43, 72, 24, '2019-02-27 07:00:02'),
(44, 26, 11, '2019-02-27 07:05:12'),
(45, 28, 11, '2019-02-27 07:06:08'),
(46, 25, 20, '2019-02-27 07:46:41'),
(47, 25, 20, '2019-02-27 11:38:28'),
(48, 25, 20, '2019-02-27 11:38:59'),
(49, 25, 11, '2019-02-27 11:41:40'),
(50, 25, 20, '2019-02-27 11:42:11'),
(51, 82, 11, '2019-02-27 01:16:14'),
(52, 32, 11, '2019-02-27 01:18:32'),
(53, 25, 20, '2019-02-28 04:50:11'),
(54, 25, 20, '2019-02-28 04:54:54'),
(55, 29, 13, '2019-02-28 05:06:15'),
(56, 29, 13, '2019-02-28 05:06:34'),
(57, 25, 13, '2019-02-28 05:07:00'),
(58, 25, 13, '2019-02-28 05:08:07'),
(59, 25, 11, '2019-02-28 05:13:54'),
(60, 25, 11, '2019-02-28 05:13:57'),
(61, 25, 11, '2019-02-28 07:50:18'),
(62, 27, 11, '2019-02-28 07:51:06'),
(63, 29, 11, '2019-02-28 07:51:13'),
(64, 25, 20, '2019-02-28 08:00:34'),
(65, 28, 20, '2019-03-02 05:21:27'),
(66, 72, 11, '2019-03-02 05:29:19'),
(67, 72, 24, '2019-03-02 05:42:22'),
(68, 72, 24, '2019-03-02 05:42:36'),
(69, 25, 11, '2019-03-02 05:43:32'),
(70, 25, 24, '2019-03-02 05:43:33'),
(71, 25, 24, '2019-03-02 05:44:36'),
(72, 72, 24, '2019-03-02 05:45:07'),
(73, 72, 11, '2019-03-02 05:45:32'),
(74, 25, 24, '2019-03-02 05:46:53'),
(75, 25, 24, '2019-03-02 05:47:20'),
(76, 25, 24, '2019-03-02 05:47:22'),
(77, 25, 24, '2019-03-02 05:47:24'),
(78, 25, 24, '2019-03-02 05:47:27'),
(79, 25, 24, '2019-03-02 05:47:29'),
(80, 25, 24, '2019-03-02 05:47:32'),
(81, 25, 24, '2019-03-02 05:47:34'),
(82, 25, 24, '2019-03-02 05:47:51'),
(83, 28, 24, '2019-03-02 05:48:04'),
(85, 25, 11, '2019-03-02 08:15:46'),
(86, 72, 24, '2019-03-02 08:16:26'),
(87, 72, 24, '2019-03-02 08:17:12'),
(88, 25, 11, '2019-03-02 08:18:45'),
(89, 25, 24, '2019-03-02 08:18:58'),
(90, 25, 24, '2019-03-02 08:19:48'),
(91, 25, 24, '2019-03-02 08:19:52'),
(92, 25, 24, '2019-03-02 08:19:54'),
(93, 25, 24, '2019-03-02 09:04:55'),
(94, 72, 24, '2019-03-02 09:30:22'),
(95, 26, 11, '2019-03-03 06:59:38'),
(96, 72, 11, '2019-03-03 07:00:10'),
(97, 28, 11, '2019-03-03 07:00:51'),
(98, 26, 24, '2019-03-03 07:01:25'),
(99, 28, 24, '2019-03-03 07:01:38'),
(100, 72, 24, '2019-03-03 07:02:05'),
(101, 72, 11, '2019-03-03 07:03:10'),
(102, 72, 11, '2019-03-03 07:03:12'),
(103, 72, 24, '2019-03-03 07:03:36'),
(104, 72, 24, '2019-03-03 07:04:04'),
(105, 28, 11, '2019-03-03 07:14:05'),
(106, 31, 20, '2019-03-03 07:15:30'),
(107, 28, 20, '2019-03-03 07:15:42'),
(110, 25, 11, '2019-03-03 07:19:01'),
(111, 25, 20, '2019-03-03 07:23:02'),
(112, 26, 11, '2019-03-03 08:57:42'),
(113, 87, 11, '2019-03-04 05:47:46'),
(114, 26, 11, '2019-03-06 12:52:55'),
(117, 87, 11, '2019-03-06 06:27:53'),
(118, 87, 11, '2019-03-06 06:27:56'),
(119, 86, 11, '2019-03-06 06:28:27'),
(120, 85, 11, '2019-03-06 06:28:52'),
(121, 28, 11, '2019-03-06 06:29:21'),
(122, 31, 11, '2019-03-06 06:37:14'),
(123, 72, 11, '2019-03-06 06:38:26'),
(125, 31, 11, '2019-03-07 03:33:57'),
(126, 31, 11, '2019-03-07 03:51:22'),
(127, 25, 11, '2019-03-07 03:55:44'),
(128, 91, 11, '2019-03-08 09:16:55'),
(129, 29, 24, '2019-03-08 03:40:28'),
(130, 25, 24, '2019-03-09 04:36:05'),
(131, 26, 24, '2019-03-09 04:36:17'),
(132, 25, 24, '2019-03-09 10:00:46'),
(133, 25, 24, '2019-03-09 10:00:49'),
(134, 28, 11, '2019-03-24 07:03:16'),
(135, 26, 11, '2019-03-30 06:23:30'),
(136, 95, 11, '2019-03-30 06:27:54'),
(139, 99, 24, '2019-03-31 03:39:16'),
(140, 100, 11, '2019-03-31 04:05:11'),
(141, 102, 24, '2019-03-31 05:42:30'),
(142, 102, 11, '2019-03-31 05:45:41'),
(143, 28, 11, '2019-04-13 05:18:37'),
(144, 101, 11, '2019-04-13 05:19:40'),
(145, 25, 11, '2019-04-13 05:20:14'),
(146, 103, 11, '2019-04-13 05:38:26'),
(147, 25, 11, '2019-04-16 07:04:36'),
(148, 25, 11, '2019-04-16 07:26:34'),
(149, 31, 11, '2019-04-20 07:06:50'),
(150, 72, 11, '2019-04-20 07:09:05'),
(151, 72, 11, '2019-04-20 07:09:08'),
(152, 31, 11, '2019-04-20 07:10:03'),
(153, 31, 11, '2019-04-20 07:10:06'),
(154, 72, 24, '2019-04-20 07:10:12'),
(155, 31, 24, '2019-04-20 07:10:16'),
(156, 72, 11, '2019-04-20 07:10:49'),
(157, 72, 11, '2019-04-20 07:10:52'),
(158, 31, 11, '2019-04-20 07:11:01'),
(159, 29, 24, '2019-04-20 07:11:27'),
(160, 76, 24, '2019-04-20 07:11:39'),
(161, 82, 24, '2019-04-20 07:11:43'),
(162, 79, 11, '2019-04-20 07:12:21'),
(163, 79, 20, '2019-04-20 07:12:21'),
(164, 79, 11, '2019-04-20 07:12:23'),
(165, 79, 20, '2019-04-20 07:12:25'),
(166, 82, 11, '2019-04-20 07:14:09'),
(167, 82, 11, '2019-04-20 07:14:11'),
(168, 85, 11, '2019-04-20 07:14:21'),
(169, 86, 11, '2019-04-20 07:14:38'),
(170, 84, 11, '2019-04-20 07:14:44'),
(171, 26, 11, '2019-04-20 07:15:01'),
(172, 26, 11, '2019-04-20 07:15:03'),
(173, 83, 11, '2019-04-20 07:23:37'),
(174, 83, 11, '2019-04-20 07:23:39'),
(175, 25, 11, '2019-04-20 07:23:53'),
(176, 25, 11, '2019-04-23 11:54:45'),
(177, 27, 11, '2019-04-23 11:55:38'),
(178, 83, 11, '2019-04-23 11:55:47'),
(179, 82, 11, '2019-04-23 11:56:31'),
(180, 82, 11, '2019-04-26 11:55:33'),
(181, 85, 11, '2019-04-26 11:55:48'),
(182, 83, 11, '2019-04-26 11:56:07'),
(183, 84, 11, '2019-04-26 11:56:16'),
(184, 86, 11, '2019-04-26 11:56:45'),
(185, 91, 11, '2019-04-26 11:56:53'),
(186, 26, 11, '2019-04-26 11:57:05'),
(187, 26, 11, '2019-04-26 11:57:26'),
(188, 26, 11, '2019-04-26 11:57:55'),
(189, 86, 11, '2019-04-26 03:50:00'),
(190, 99, 11, '2019-04-26 03:50:24'),
(191, 103, 11, '2019-04-26 03:50:30'),
(192, 100, 11, '2019-04-26 03:50:53'),
(193, 72, 11, '2019-04-26 05:25:24'),
(194, 82, 11, '2019-04-26 05:25:41'),
(195, 25, 20, '2019-04-26 06:59:35'),
(196, 25, 20, '2019-04-26 07:01:04'),
(197, 25, 20, '2019-04-26 07:03:48'),
(198, 25, 20, '2019-04-26 07:10:04'),
(199, 25, 20, '2019-04-26 07:11:46'),
(200, 25, 20, '2019-04-26 07:13:52'),
(201, 25, 20, '2019-04-26 07:16:17'),
(202, 25, 20, '2019-04-26 07:18:23'),
(203, 26, 20, '2019-04-26 07:18:27'),
(204, 26, 20, '2019-04-26 07:20:39'),
(205, 26, 13, '2019-04-26 07:22:11'),
(206, 86, 11, '2019-04-27 12:20:29'),
(207, 85, 11, '2019-04-27 12:21:06'),
(208, 25, 11, '2019-04-27 12:21:28'),
(209, 25, 11, '2019-04-27 12:22:12'),
(210, 26, 11, '2019-04-27 12:34:52'),
(211, 91, 11, '2019-04-27 12:35:52'),
(212, 104, 11, '2019-04-27 02:09:57'),
(213, 26, 11, '2019-04-27 02:10:15'),
(214, 25, 11, '2019-04-27 03:37:38'),
(215, 26, 11, '2019-04-27 03:37:47'),
(216, 84, 11, '2019-04-27 03:49:15'),
(217, 85, 11, '2019-04-27 03:49:42'),
(218, 95, 11, '2019-04-27 03:49:51'),
(219, 101, 11, '2019-04-27 03:50:14'),
(220, 105, 11, '2019-04-27 03:50:32'),
(221, 104, 11, '2019-04-27 03:51:50'),
(222, 103, 11, '2019-04-27 03:52:05'),
(223, 102, 11, '2019-04-27 03:52:15'),
(224, 100, 11, '2019-04-27 03:52:29'),
(225, 97, 11, '2019-04-27 03:52:38'),
(226, 104, 11, '2019-04-27 03:59:40'),
(227, 27, 11, '2019-04-27 08:25:08'),
(228, 25, 11, '2019-04-27 08:25:49'),
(229, 25, 11, '2019-04-27 08:53:29'),
(230, 26, 11, '2019-04-27 01:00:34'),
(231, 100, 11, '2019-04-27 07:48:35'),
(232, 72, 13, '2019-04-27 08:18:21'),
(233, 31, 24, '2019-04-28 04:11:42'),
(234, 25, 24, '2019-04-28 04:12:02'),
(235, 25, 11, '2019-04-28 04:19:26'),
(236, 72, 24, '2019-04-28 04:19:37'),
(237, 82, 24, '2019-04-28 04:19:40'),
(238, 84, 24, '2019-04-28 04:20:40'),
(239, 86, 24, '2019-04-28 04:20:48'),
(240, 84, 24, '2019-04-28 04:20:57'),
(241, 106, 11, '2019-04-28 04:31:54'),
(242, 82, 24, '2019-04-28 07:38:14'),
(243, 103, 24, '2019-04-28 07:38:37'),
(244, 106, 11, '2019-04-28 07:54:48'),
(245, 103, 11, '2019-04-28 07:55:07'),
(246, 28, 11, '2019-04-28 07:55:34'),
(247, 31, 11, '2019-04-28 07:55:44'),
(248, 83, 11, '2019-04-28 11:45:15'),
(249, 106, 11, '2019-04-28 11:45:43'),
(250, 85, 11, '2019-05-03 04:03:58'),
(251, 25, 11, '2019-05-05 06:39:06'),
(252, 72, 11, '2019-05-05 06:39:21'),
(253, 26, 11, '2019-05-26 07:31:51'),
(254, 25, 11, '2019-05-26 07:32:38'),
(255, 79, 11, '2019-05-26 07:33:21'),
(256, 84, 11, '2019-05-26 07:33:28'),
(257, 25, 11, '2019-05-26 07:33:33'),
(258, 107, 11, '2019-05-26 07:35:40'),
(259, 26, 11, '2019-05-26 09:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nid` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1,
  `firebase_id` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `contact`, `address`, `email`, `username`, `password`, `nid`, `status`, `firebase_id`) VALUES
(8, 1, 'Admin', '01900 000000', 'Classified Auction System', 'admin@gmail.com', 'admin', '1234', '', 1, NULL),
(9, 2, 'User', '01900 000000', 'Classified Auction, Chittagong, Bangladseh', 'user@gmail.com', 'user', '1234', '', 1, NULL),
(10, 3, 'ABC Company', '01900000000', 'ABC Company Limited, Chittagong, Bangladesh.', 'company@gmail.com', 'company', '1234', '', 1, NULL),
(11, 2, 'Sathi', '0181111122', 'Chandgaon,Chittgong', 'sathi@gmail.com', 'sathi', '1234', '1234567892', 1, 'fyBtsxFCZ1Q:APA91bHHEPv-j6YETTc81QQSCFZd2tjdqcLUcVK3zghCgJnB5caU6CZC8RHGM2GkrtyTKkb64CCsHvCf31LFuTbkSiG1NERVrFVEzsXroAj58t5r0zaekspj6BXS8JzGx8XOzfbUMg2z'),
(12, 2, 'Ani', '0168452525', 'Agrabad', 'ani@gmail.com', 'ani', '1234', '2050408060', 1, NULL),
(13, 3, 'RFL COMPANY ', '01234567999', 'Agrabad,ctg', 'rfl@gmail.com', 'RFL', '1234', '12356678899990', 1, ''),
(17, 1, 'SN Zisad', '123456', 'ctg', 'zisad@gmail.com', 'snzisad', '1234', '32432432', 1, NULL),
(20, 2, 'MD Zisad', '515', 'CTG', 'zisad@gmail.com', 'Zisad', 'Zisad', '54545', 1, 'dsSRQI-OEbs:APA91bEh4xzFTht5L5xc9-gXQOdZvOtZhwnaV11eoJMlN88pbauBzOunSBYYGfdpNje8vpOG4Hjjs6EB09jWLeljvanKhfrT8ItD-BAgnotnXT8EieyIzvVNMwkDqTztVSHoR-P1Q4BJ'),
(22, 3, 'ajad aias', '643484', 'ajava sds', 'sjsish@jskag.cishs', 'zisa', '1234', '54374', 1, NULL),
(23, 3, 'Laptop Zone', '113344', 'ctg', 'lpzon@12', 'laptopzone', '1234', '1349', 1, NULL),
(24, 2, 'any', '01888888888', 'Agrabad, Chittagong,  Bangladesh ', 'a@gmail.com', 'any', '1234', '1234567890455', 1, 'fm0SyJdOhi0:APA91bFGGF6p9rQuAs7AC1onMh-5FjCQkLlFvfJ5pBRJxR1p6XTXR415zPZJfAVUYDTSCCDQmi6HuwzuENiK9l5DtnL_kO7ECK-y_EHNH6FMz-o0VJB_QpgXyVDNpP9_ojM7sfeNTOlT'),
(25, 2, 'Jonyed', '01888888888', 'Chawkbazar', 'j@gmail.com', 'jonayed', '1234', '01333333333333', 1, 'de7Tjj7jh4I:APA91bHuInzls3pH-Y2jEUMZExMgub9_VYpPxEGsM7WSSKCQ8bWiMOTm2_2e8kCSjUQ8VK6ZGxMfAdPg1rfxRJzbMu-qOMdam9ckP6A9Gx3TiBMy-9pI0t20TZxY3miZrzpceahVSGEa'),
(26, 2, 'Nasrin', '01888888888', 'Agrabad, Chittagong', 'n@gmail.com', 'Nasrin', '1234', '12345678900000', 1, 'fyBtsxFCZ1Q:APA91bHHEPv-j6YETTc81QQSCFZd2tjdqcLUcVK3zghCgJnB5caU6CZC8RHGM2GkrtyTKkb64CCsHvCf31LFuTbkSiG1NERVrFVEzsXroAj58t5r0zaekspj6BXS8JzGx8XOzfbUMg2z');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `user_type`, `status`) VALUES
(1, 'admin', 1),
(2, 'user', 1),
(3, 'company', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auction_category1_idx` (`category_id`);

--
-- Indexes for table `auction_image`
--
ALTER TABLE `auction_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auction_image_auction1_idx` (`auction_id`);

--
-- Indexes for table `bid`
--
ALTER TABLE `bid`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bid_auction1_idx` (`auction_id`),
  ADD KEY `fk_bid_users1_idx` (`users_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`chat_room_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcm_notification_token`
--
ALTER TABLE `fcm_notification_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_city1_idx` (`city_id`),
  ADD KEY `fk_post_category1_idx` (`category_id`);

--
-- Indexes for table `post_image`
--
ALTER TABLE `post_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_image_post1_idx` (`post_id`);

--
-- Indexes for table `post_tracking`
--
ALTER TABLE `post_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`username`),
  ADD KEY `fk_users_user_type_idx` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `auction_image`
--
ALTER TABLE `auction_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=341;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `chat_room_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fcm_notification_token`
--
ALTER TABLE `fcm_notification_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `post_image`
--
ALTER TABLE `post_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `post_tracking`
--
ALTER TABLE `post_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auction`
--
ALTER TABLE `auction`
  ADD CONSTRAINT `fk_auction_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `fk_bid_auction1` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bid_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post_tracking`
--
ALTER TABLE `post_tracking`
  ADD CONSTRAINT `post_tracking_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `post_tracking_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
