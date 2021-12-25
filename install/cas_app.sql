-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 02, 2019 at 06:43 AM
-- Server version: 5.7.25-0ubuntu0.18.04.2
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cas_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `keyword` varchar(45) DEFAULT NULL,
  `auction_title` varchar(45) DEFAULT NULL,
  `auction_desc` text,
  `starting_date` datetime DEFAULT NULL,
  `ending_date` datetime DEFAULT NULL,
  `starting_price` decimal(10,0) DEFAULT NULL,
  `reserve_price` decimal(10,0) DEFAULT NULL,
  `condition` varchar(45) DEFAULT NULL,
  `product_type` varchar(45) DEFAULT NULL,
  `com_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`id`, `city_id`, `location`, `category_id`, `keyword`, `auction_title`, `auction_desc`, `starting_date`, `ending_date`, `starting_price`, `reserve_price`, `condition`, `product_type`, `com_id`, `status`) VALUES
(8, 0, '', 13, 'furniture', 'Antique Jacob Brothers Mahogany &quot;Piano&a', 'Antique Jacob Brothers (American) quarter scale mahogany &quot;Baby Grand Piano&quot;, converted into a bar (no longer functional as a piano). Excellent condition. Measures 29&quot; x 43&quot; x 32&quot;.', '2018-05-14 00:00:00', '2018-08-14 00:00:00', '5000', '5000', 'Good', 'Used', 13, 1),
(9, 0, '', 13, 'Furniture', 'DESIGNER &amp; ANTIQUES, INDIAN JEWELRY', 'DESIGNER &amp; ANTIQUES, INDIAN JEWELRY\r\nNew contemporary furniture from name brand makers, firearms, French &amp; Italian antique furnishings, large group of Native American handcrafted jewelry, Texas art including a large Dahlhart Windberg\r\nPainting, mid-century furniture, Baccarat &amp; Waterford stemware, horse saddles, sterling silver, and other exciting items.', '2018-07-06 00:00:00', '2018-08-30 00:00:00', '20000', '35000', 'Medium', 'Used', 13, 1),
(10, 0, '', 2, 'jewellery', 'Golden drop jewellery', 'Golden drop jewellery brings to you the exquisite, fine crafted ethnic designer jewellery to enhance your natural elegance. This jewellery is made keeping in mind the women connected to our traditional values. Its perfectly fit for any party or special occasion &amp; its graceful design complements with any ethnic or western outfit. This jewellery set is lovingly handmade with utmost care.\r\n\r\nSize: - Choker', '2018-07-06 12:45:00', '2018-08-30 12:00:00', '10000', '18000', 'Medium', 'Used', 10, 1),
(11, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(12, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(13, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(14, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(15, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(16, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(17, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(18, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(19, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1),
(20, 2, 'oxygen', 1, 'vxvcxv,fgdfg', 'this is post title', 'this is post description', '2018-05-14 00:00:00', '2018-06-14 00:00:00', '324324', '343434', 'good', 'fixed', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `auction_image`
--

CREATE TABLE `auction_image` (
  `id` int(11) NOT NULL,
  `image` text,
  `status` int(11) DEFAULT '1',
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
(30, '/public/uploads/auction/758013052151.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `auction_time` datetime DEFAULT NULL,
  `bid_price` decimal(10,0) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`id`, `auction_id`, `auction_time`, `bid_price`, `status`, `users_id`) VALUES
(1, 8, '2018-05-14 00:00:00', '5600', 1, 11),
(2, 8, '2018-05-14 00:00:00', '5700', 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(45) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `sort_order` int(11) DEFAULT '0',
  `category_image` text,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`, `pid`, `sort_order`, `category_image`, `status`) VALUES
(1, 'Electronics', 0, 0, 'public/images/electronics_cat.jpg', 1),
(2, 'Property', 0, 0, 'public/images/property_cat.jpg', 1),
(3, 'Vehicles', 0, 0, 'public/images/vehicles_cat.jpg', 1),
(4, 'Clothing', 0, 0, 'public/images/demo_cat.png', 1),
(5, 'Health & Beauty', 0, 0, 'public/images/demo_cat.png', 1),
(6, 'Mobiles', 1, 0, 'public/images/cat1.png', 1),
(7, 'Computers', 1, 0, 'public/images/demo_cat.png', 1),
(8, 'TVs', 1, 0, 'public/images/demo_cat.png', 1),
(13, 'Furniture', 0, 0, NULL, 1),
(14, 'jewellery', 0, 0, NULL, 1);

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
(42, 33, 'Hi!', 10, '2018-09-05 12:39:45');

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
  `status` int(11) DEFAULT '1'
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
  `time_period` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_users`
--

INSERT INTO `online_users` (`id`, `userid`, `time_period`) VALUES
(1, 9, '0000-00-00 00:00:00');

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
  `post_desc` text,
  `condition1` varchar(45) DEFAULT NULL,
  `product_type` varchar(45) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_time`, `city_id`, `location`, `category_id`, `post_title`, `post_desc`, `condition1`, `product_type`, `price`, `name`, `mobile`, `email`, `userid`, `status`) VALUES
(25, '09:17:41', 2, 'Lalkhan Bazar', 6, 'Apple iPhone 5S 32gb (Used)', 'ðŸ”¥iPhone 5sðŸ”¥\r\n\r\nStorage 32gb\r\nGolden , Space Grey and Silver Colour Available\r\nSome are fresh and some have few scratches\r\nWith charger cable\r\nThere is not a single problem on the device and 100% Genuine and Non Refurbished Phone\r\nWith 1 Year service warranty and 7 days replacement warranty\r\nNo exchange only sell\r\nThank You', 'Good', 'Negotiable', '12499', 'Farzana', '01900000000', 'farzana@gmail.com', 11, 1),
(26, '09:21:21', 2, 'Lalkhan Bazar', 7, 'Asus K550JX Core i5 4200H 8GB', 'Asus K550JX Core i5 4200H 8GB with Graphics Specifications\r\nProcessor Intel Core i5 4200H\r\nRAM 8 GB\r\nHDD 1 TB\r\nProcessor-Clock-Rate 2.8 GHz\r\nDisplay-Size 15.6 Inch\r\nDisplay-Type Full HD (1920x1080) LED Backlight Anti-Glare Display\r\nGraphics-Chipset Nvidia GTX 950M 2gb Dedicated Graphics\r\nWebcam HD\r\nCard-Reader Yes\r\nAppx-Battery-Time Up to 4.5 Hours\r\nOperating-System Free DOS\r\nWeight 2.45 Kg', 'Good', 'Negotiable', '13500', 'Md. Habib', '01900000000', 'habib@gmail.com', 11, 1),
(27, '09:28:30', 2, 'Lalkhan Bazar', 7, 'Logitech Z506(5.1) Home Theater System', 'Immersive 5.1 surround sound brings your audio to life. This 150 Watts Peak power 5.1 speaker system delivers deep, rich surround sound. ... Enjoy true surround sound via six-channel direct inputs using your computer sound card or create 3D stereo surround sound from two channel', 'Good', 'Negotiable', '8400', 'Farzana', '01900000000', 'farzana@gmail.com', 11, 1),
(28, '09:30:50', 2, 'Lalkhan Bazar', 3, 'Toyota X Corolla 2002', 'Toyota X Corolla 2002\r\nModel year: 2002\r\nRegistration year: 2005\r\nTransmission: Automatic\r\nEngine capacity: 1300 cc\r\nKilometers run: 65000', 'Good', 'Fixed_Price', '880000', 'Rasel', '01900000000', 'rasel@gmail.com', 11, 1),
(29, '09:34:11', 2, 'Lalkhan Bazar', 4, 'Polo T-Shart', '15 color\r\nOrder minimum 20 pcs', 'Good', 'Fixed_Price', '125', 'Md. Habib', '01900000000', 'habib@gmail.com', 11, 1),
(30, '09:36:31', 2, 'Lalkhan Bazar', 4, 'Dress for sell', 'à¦•à¦Ÿà¦¨ à¦¥à§à¦°à¦¿-à¦ªà¦¿à¦¸, à¦¸à§à¦•à¦¿à¦¨ à¦ªà§à¦°à¦¿à¦¨à§à¦Ÿ à¦à¦¬à¦‚ à¦®à§‡à¦¶à¦¿à¦¨ à¦à¦®à§à¦¬à§à¦°à§Ÿà¦¡à¦¾à¦°à§€à¥¤ à¦•à§‹à¦¡:à§§à§©à§ª-9.\r\n\r\nà¦†à¦®à¦¾à¦¦à§‡à¦° à¦¨à¦¿à¦œà¦¸à§à¦¬ à¦«à§à¦¯à¦¾à¦•à§à¦Ÿà¦°à§€à¦¤à§‡ à¦ªà¦¾à¦‡à¦•à¦¾à¦°à§€ à¦®à§‚à¦²à§à¦¯à§‡ à¦°à§‡à¦¡à¦¿à¦®à§‡à¦‡à¦¡ à¦¥à§à¦°à¦¿-à¦ªà¦¿à¦¸ à¦¬à¦¿à¦•à§à¦°à§Ÿ à¦•à¦°à§‡ à¦¥à¦¾à¦•à¦¿à¥¤ à¦¸à¦°à§à¦¬à§‹à¦šà§à¦š à¦•à§‹à§Ÿà¦¾à¦²à¦¿à¦Ÿà¦¿à¦° à¦¬à§à¦Ÿà¦¿à¦•à¦¸à¦à¦° à¦°à§‡à¦¡à¦¿à¦®à§‡à¦‡à¦¡ à¦¥à§à¦°à¦¿-à¦ªà¦¿à¦¸ à¦à¦° à¦œà¦¨à§à¦¯ à¦¬à¦¿à¦¶à§à¦¬à¦¸à§à¦¤ à¦ªà§à¦°à¦¤à¦¿à¦·à§à¦ à¦¾à¦¨à¥¤ à¦•à§à¦°à¦¿à§Ÿà¦¾à¦°à§‡à¦° à¦®à¦¾à¦§à§à¦¯à¦®à§‡ à¦¸à¦¾à¦°à¦¾à¦¦à§‡à¦¶à§‡ à¦¡à§‡à¦²à¦¿à¦­à¦¾à¦°à¦¿à¦° à¦¬à§à¦¯à¦¬à¦¸à§à¦¥à¦¾ à¦†à¦›à§‡à¥¤', 'Good', 'Fixed_Price', '1100', 'Farzana', '01900000000', 'farzana@gmail.com', 11, 1),
(31, '01:28:53', 2, 'Agrabad', 13, 'RFL Furniture', 'Tk 1260\r\nSKU: DPD00028\r\nSeller: DPL Distribution\r\nDelivery Time: 1-4 working days\r\nBrand: RFL Furniture\r\nDelivery Area: Dhaka City,Outside Dhaka City\r\nDelivery Charge: Free', 'Good', 'Fixed_Price', '1260', 'RFL', '012345678', 'rfl@gmail.com', 13, 1),
(32, '20:35:33', 2, 'GEC Circle, Chittagong, Banhladesh', 6, 'Apple iPhone 4S 32GB intact (New)', 'âœ” Brand :APPLE IPHONE\r\nâœ” Model : Iphone 4S\r\nâœ”Condition: Intact Original\r\nâœ”Colour: any\r\nâœ”Display: 3.5 inches LED-backlit IPS LCD, capacitive touchscreen\r\nâœ” Ram : 512 Ram\r\nâœ” Storage : 16GB Rom\r\nâœ”Secondary; 1.2mp face detection, HDR, FaceTime over Wi-Fi or Cellular\r\nâœ”Sensors: Accelerometer, proximity, compass\r\nâœ” Battery : Non-removable Li-Po 1450 mAh battery\r\n\r\nðŸ”· I Also Provided Cash Memo\r\nðŸ”· All original Accessorise\r\nðŸ” Factory Unlocked\r\nðŸ”µ 3 Days Replacement\r\nðŸ”´ 1 Year Service Warranty\r\n\r\nà¦¬à¦¾à¦‚à¦²à¦¾à¦¦à§‡à¦¶à§‡à¦° à¦¯à§‡à¦•à§‹à¦¨à§‹ à¦œà§‡à¦²à¦¾à¦¯à¦¼ à¦•à§à¦°à¦¿à¦¯à¦¼à¦¾à¦°à§‡ à¦ªà¦¨à§à¦¯ à¦•à¦¨à¦¡à¦¿à¦¶à¦¨à§‡à§ à¦ªà¦¾à¦ à¦¾à¦¨à§‹ à¦¹à¦¯à¦¼à¥¤\r\n\r\n&lt;&lt;&lt; à¦†à¦®à¦¾à¦¦à§‡à¦° à¦ªà§à¦°à§‹à¦¡à¦¾à¦•à§à¦Ÿ à§§oo% à¦…à¦°à¦œà¦¿à¦¨à¦¾à¦², à¦¯à¦¦à¦¿ à¦•à¦ªà¦¿ à¦ªà§à¦°à¦®à¦¾à¦£ à¦¹à¦¯à¦¼ à¦®à§‚à¦²à§à¦¯ à¦«à§‡à¦°à¦¤à¥¤\r\n&lt;&lt;&lt; à¦°à¦¿à¦¯à¦¼à§‡à¦² à¦¬à§à¦°à¦¾à¦¨à§à¦¡à§‡à¦° à¦ªà§à¦°à§‹à¦¡à¦¾à¦• à¦†à¦ªà¦¨à¦¿ à¦†à¦®à¦¾à¦¦à§‡à¦° à¦•à¦¾à¦›à§‡à¦‡ à¦ªà¦¾à¦“à¦¯à¦¼à¦¾à¦° à¦¨à¦¿à¦¶à§à¦šà¦¯à¦¼à¦¤à¦¾ à¦¦à¦¿à¦šà§à¦›à¦¿à¥¤\r\n&lt;&lt;&lt; à¦à¦• à¦¦à¦¾à¦®, à¦¦à¦¾à¦®à¦¾à¦¦à¦¾à¦®à¦¿ à¦•à¦°à¦¬à§‡à¦¨ à¦¨à¦¾ à¦•à§‡à¦‰ à¦¦à¦¯à¦¼à¦¾ à¦•à¦°à§‡\r\n\r\nIf you like my Product &amp; price then call me now\r\n\r\nS h o p N u m b e r : 563. 5th floor\r\nMOTALEB PLAZA, elephantroa,hatirpul.', 'Good', 'Fixed_Price', '5000', 'Sumi', '01977777777', 'sumi@gmail.com', 9, 1),
(33, '13:00:17', 2, 'Lalkhan Bazar, Chittagong, Bangladesh', 8, 'TV test', 'Tv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test\r\nTv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv TeTv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test Tv Test  Tv Test Tv Test Tv Test Tv Test Tv Test', 'Good', 'Fixed_Price', '20000', 'User', '01977777777', 'rafiq@gmail.com', 9, 1),
(71, '06:30:54', 1, 'Chawkbazar', 4, 'girls cloth', 'This is very nice', 'Good', 'Negotiable', '5000', 'Sathi', '018241111111', 'sh@gmail com', 0, 1),
(72, '06:42:15', 2, 'Agrabad, Chittagong, Bangladesh ', 4, 'Dress', 'A new dress with 3piece. it is maria B collection. ', 'Good', 'Fixed Price', '4000', 'any', '01888888888', 'a@gmail.com', 24, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_image`
--

CREATE TABLE `post_image` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `image` text,
  `status` int(11) DEFAULT '1'
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
(27, 30, 'public/uploads/posts/clt2.jpg', 1),
(28, 31, 'public/uploads/posts/0061906_classic-sofa-chair-87078-black.jpeg', 1),
(29, 32, 'public/uploads/posts/1.jpg', 1),
(30, 32, 'public/uploads/posts/2.jpg', 1),
(31, 32, 'public/uploads/posts/3.jpg', 1),
(32, 33, 'public/uploads/posts/f1.jpg', 1),
(33, 33, 'public/uploads/posts/f3.jpg', 1),
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
(56, 71, 'public/uploads/posts/561678063054.jpeg', 1),
(57, 72, 'public/uploads/posts/392563064215.jpeg', 1),
(58, 72, 'public/uploads/posts/242961064215.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `address` text,
  `email` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `nid` varchar(255) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `name`, `contact`, `address`, `email`, `username`, `password`, `nid`, `status`) VALUES
(8, 1, 'Admin', '01900 000000', 'Classified Auction System', 'admin@gmail.com', 'admin', '1234', '', 1),
(9, 2, 'User', '01900 000000', 'Classified Auction, Chittagong, Bangladseh', 'user@gmail.com', 'user', '1234', '', 1),
(10, 3, 'ABC Company', '01900000000', 'ABC Company Limited, Chittagong, Bangladesh.', 'company@gmail.com', 'company', '1234', '', 1),
(11, 2, 'Sathi', '0181111122', 'Chandgaon,Chittgong', 'sathi@gmail.com', 'sathi', '1234', '1234567892', 1),
(12, 2, 'Ani', '0168452525', 'Agrabad', 'ani@gmail.com', 'ani', '1234', '2050408060', 1),
(13, 3, 'RFL COMPANY ', '01234567999', 'Agrabad,ctg', 'rfl@gmail.com', 'RFL', '1234', '12356678899990', 1),
(17, 1, 'SN Zisad', '123456', 'ctg', 'zisad@gmail.com', 'snzisad', '1234', '32432432', 1),
(20, 2, 'MD Zisad', '515', 'CTG', 'zisad@gmail.com', 'Zisad', 'Zisad', '54545', 1),
(22, 3, 'ajad aias', '643484', 'ajava sds', 'sjsish@jskag.cishs', 'zisa', '1234', '54374', 1),
(23, 3, 'Laptop Zone', '113344', 'ctg', 'lpzon@12', 'laptopzone', '1234', '1349', 1),
(24, 2, 'any', '01888888888', 'Agrabad, Chittagong,  Bangladesh ', 'a@gmail.com', 'any', '1234', '1234567890455', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `user_type` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT '1'
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `auction_image`
--
ALTER TABLE `auction_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `bid`
--
ALTER TABLE `bid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `post_image`
--
ALTER TABLE `post_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
-- Constraints for table `auction_image`
--
ALTER TABLE `auction_image`
  ADD CONSTRAINT `fk_auction_image_auction1` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bid`
--
ALTER TABLE `bid`
  ADD CONSTRAINT `fk_bid_auction1` FOREIGN KEY (`auction_id`) REFERENCES `auction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bid_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_post_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_post_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
