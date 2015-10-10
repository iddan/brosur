-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 29, 2015 at 05:01 PM
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
('bc27928e1cec1ac2bb2623bd3b4758a3', '127.0.0.1', 'Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.36 (KHTML, like Gecko) Ubuntu Chromium/43.0.2357.130 Chrome/43.0.2357.130 ', 1443513600, ''),
('c930da3731666f6b3bbbcf6c9c62cf32', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:40.0) Gecko/20100101 Firefox/40.0', 1443516631, 'a:7:{s:9:"user_data";s:0:"";s:5:"login";b:1;s:7:"user_id";s:1:"1";s:8:"group_id";s:1:"1";s:9:"user_name";s:5:"admin";s:5:"email";s:17:"admin@yahoo.co.id";s:9:"real_name";s:13:"Administrator";}'),
('ce2614d264f4784e8ac4b1da04973342', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:40.0) Gecko/20100101 Firefox/40.0', 1443516631, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `price`, `description`, `image_filename`) VALUES
(1, 6, 'LG ULTRA HD TV 30', 1000000, 'Spesifikasi lengkap ...', 'image.jpg|image1.jpg|image.png'),
(2, 6, 'LG 3D TV', 2000000, 'Spesifikasi lengkapnya ...', 'image5.jpg'),
(3, 9, 'test1', 5000000, 'Spesifikasi lengkap ...', 'image2.jpg'),
(4, 8, 'test2', 3000000, 'spek lengkap ........', 'image3.jpg|image1.png|image2.png|image3.png|image4.jpg'),
(5, 6, 'test3', 5000000, 'Spesifikasi lengkap :\nresolution : 1000px 1000px\nlayar full HD', ''),
(6, 6, 'test5', 1000000, '<p ><span >spesifikasi lengkap :</span></p>\n<ol>\n<li>resolution<strong> 1000px x 1000px</strong></li>\n<li>layar<em> full HD</em></li>\n<li><em>asd</em></li>\n<li><em>asd</em></li>\n<li><em>asd</em></li>\n</ol>', '');

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
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `group_id`, `user_name`, `email`, `password`, `real_name`, `status`, `expire_date`) VALUES
(1, 1, 'admin', 'admin@yahoo.co.id', '9b226abb781074243cbbffded9353f8b', 'Administrator', 1, '0000-00-00'),
(10, 2, 'vip01', 'vip01@yahoo.co.id', 'e18ab128543c697031f1135493c75e6f', 'VIP 1', 1, '0000-00-00'),
(11, 3, 'member1', 'member1@yahoo.com', 'a0220ebac3d40bbc23200c065518b283', 'Member 1', 1, '2015-09-30'),
(12, 3, 'member2', 'member2@yahoo.com', 'a2032649d2ffb203f93b6c066f51b752', 'Member 2', 1, '2015-09-30'),
(13, 3, 'member3', 'member3@yahoo.com', '16e33050a3ff58b8711464ce463371d4', 'Member 3', 1, '2015-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
