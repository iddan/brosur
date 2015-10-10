-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 09, 2015 at 02:52 AM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_brosur`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_level` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_level`, `id_parent`, `category_name`, `description`) VALUES
(1, 0, 0, 'TV/Audio/Video', 'TV/Audio/Video'),
(2, 1, 1, 'TV', 'TV'),
(3, 1, 1, 'Video Player', 'Video Player'),
(4, 1, 1, 'Home Audio', 'Home Audio'),
(5, 1, 1, 'Home Theater System', 'Home Theater System'),
(6, 2, 2, 'ULTRA HD TV', 'ULTRA HD TV'),
(7, 2, 2, 'TV 3D', 'TV 3D'),
(8, 2, 2, 'Smart TV', 'Smart TV'),
(9, 2, 2, 'TV LED', 'TV LED'),
(10, 2, 2, 'TV LCD', 'TV LCD'),
(11, 2, 2, 'TV Plasma', 'TV Plasma'),
(13, 2, 2, 'OLED TV', 'OLED TV'),
(14, 2, 3, 'DVD/HDD', 'DVD/HDD'),
(15, 2, 3, 'Blu-ray Player', 'Blu-ray Player'),
(17, 2, 3, 'DVD Player', 'DVD Player'),
(18, 2, 4, 'Mikro Hi Fi', 'Mikro Hi Fi'),
(19, 2, 4, 'Mini Hi Fi', 'Mini Hi Fi'),
(20, 2, 5, '3D Blu-ray Home Theater', '3D Blu-ray Home Theater'),
(21, 2, 5, 'DVD Home Theater', 'DVD Home Theater'),
(22, 2, 5, 'Soundbars', 'Soundbars'),
(23, 0, 0, 'Mobile Devices', 'Mobile Devices'),
(24, 1, 23, 'Mobile Phone', 'Mobile Phone'),
(25, 2, 24, 'Ponsel Android', 'Ponsel Android'),
(26, 2, 24, 'Feature Phone', 'Feature Phone'),
(27, 0, 0, 'Home Appliance', 'Home Appliance'),
(28, 0, 0, 'Produk IT', 'Produk IT'),
(29, 0, 0, 'testing', 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0fc8136bb468c951998febfe74c4dd12', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.130 Chrome/43.0.2357.130 ', 1444179900, ''),
('2c612ed9414e5a3448d1edb6fc75c547', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.130 Chrome/43.0.2357.130 ', 1444061719, ''),
('5af98fc1450f2e43eedde604347f1c86', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:40.0) Gecko/20100101 Firefox/40.0', 1444234059, ''),
('87d22fb1588a592dc0918439f5185303', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:40.0) Gecko/20100101 Firefox/40.0', 1444329244, ''),
('a36ac10be95bf796de94d3e55cd19d31', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.130 Chrome/43.0.2357.130 ', 1444333885, ''),
('cacafe2121ff0f2b95e5d01b6399d60a', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:40.0) Gecko/20100101 Firefox/40.0', 1444098443, '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`) VALUES
(1, 'Admin', 'hak akses penuh terhadap pengelolaan web / aplikasi.'),
(2, 'VIP', 'hak aksesnya seperti Member tetapi tidak di batasi dengan expire_date atau active selamanya .'),
(3, 'Member', 'hak akses hanya dapat menerima data dari web / aplikasi dengan status active dibatasi expire_date (tidak dapat menambah, merubah dan menghapus data apapun kecuali data diri member tersebut) .');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image_filename` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `price`, `description`, `image_filename`) VALUES
(1, 6, 'test1', 1000000, '<p><strong>Spesifikasi lengkap :</strong></p>\n<ol>\n<li><em>asd</em> <strong>asd</strong></li>\n<li>a<strong>sd asd asd</strong></li>\n<li><strong><em>asd asd asd asd</em></strong></li>\n<li><em>asd asd asd asd asd</em></li>\n<li>asd <strong>asd</strong> asd <strong>asd</strong> asd <strong>asd</strong></li>\n</ol>', 'image.jpg|image1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `real_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `login` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `group_id`, `user_name`, `email`, `password`, `real_name`, `status`, `expire_date`, `login`) VALUES
(1, 1, 'admin', 'admin@yahoo.co.id', '36588f77021d6a12176a802df504fd0e', 'Administrator', 1, '0000-00-00', 0),
(15, 3, 'member1', 'member1@gmail.com', '0a446d8dea267ed2194aa5ad54e378b0', 'Member 1', 1, '2015-10-09', 0),
(16, 3, 'member2', 'member2@yahoo.com', '0a446d8dea267ed2194aa5ad54e378b0', 'Member 2', 0, '2015-10-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
