-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 19 日 17:16
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bookinfo`
--
CREATE DATABASE IF NOT EXISTS `bookinfo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bookinfo`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(225) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- 表的结构 `lend`
--

CREATE TABLE IF NOT EXISTS `lend` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `book_id` int(6) NOT NULL,
  `book_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `lend_time` date NOT NULL,
  `user_id` int(3) NOT NULL,
  PRIMARY KEY (`id`,`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `lend`
--

INSERT INTO `lend` (`id`, `book_id`, `book_name`, `lend_time`, `user_id`) VALUES
(20, 68, '大数据的冲击', '2014-06-19', 35),
(21, 71, '程序员', '2014-06-19', 35),
(22, 69, '黄金时代', '2014-06-19', 36),
(23, 68, '大数据的冲击', '2014-06-19', 36);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(225) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `department` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `grade` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=38 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `tel`, `department`, `grade`) VALUES
(35, '洪廷壮', 'e10adc3949ba59abbe56e057f20f883e', '838854663@qq.com', '18753363473', '程序', '2013'),
(36, '周杰伦', 'e10adc3949ba59abbe56e057f20f883e', '123456', '123456', '美工', '2012'),
(37, '林俊杰', 'e10adc3949ba59abbe56e057f20f883e', '123456', '123456', '品牌', '2012');

-- --------------------------------------------------------

--
-- 表的结构 `yx_books`
--

CREATE TABLE IF NOT EXISTS `yx_books` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `uploadtime` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `total` int(11) DEFAULT NULL,
  `leave_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- 转存表中的数据 `yx_books`
--

INSERT INTO `yx_books` (`id`, `name`, `price`, `uploadtime`, `type`, `total`, `leave_number`) VALUES
(76, '悲惨世界', '33.00', '2014-05-31', '文学作品', 2, 2),
(72, '设计', '22.00', '2014-05-28', '其他', 1, 1),
(71, '程序员', '15.00', '2014-05-28', '杂志期刊', 1, 0),
(70, '少年维特之烦恼', '23.00', '2014-05-28', '文学作品', 2, 2),
(69, '黄金时代', '44.00', '2014-05-28', '文学作品', 1, 0),
(68, '大数据的冲击', '33.00', '2014-05-27', '网络营销', 4, 2),
(67, 'ps教程', '56.00', '2014-05-27', '网页美工', 1, 1),
(66, 'ASP教程', '45.00', '2014-05-27', '网页编程', 3, 3),
(65, 'PHP100', '99.99', '2014-05-27', '网页编程', 2, 2),
(78, 'php200', '23.00', '2014-05-31', '网页编程', 2, 2),
(77, '进化论', '3.00', '2014-05-31', '网页美工', 2, 2),
(79, '黄金时代', '1.00', '2014-06-01', '网页美工', 1, 1),
(80, '黄金时代', '15.00', '2014-06-01', '网页美工', 1, 1),
(81, '黄金时代', '15.00', '2014-06-01', '网页美工', 2, 2),
(82, '悲惨世界', '33.00', '2014-06-01', '网页美工', 1, 1),
(83, 'PHP100', '33.00', '2014-06-01', '网页美工', 2, 2),
(84, 'php200', '15.00', '2014-06-01', '网页美工', 2, 2),
(85, 'ASP教程', '33.00', '2014-06-01', '网页编程', 2, 2),
(86, '黄金时代', '44.00', '2014-06-01', '网页美工', 1, 1),
(87, '悲惨世界', '15.00', '2014-06-01', '网页美工', 1, 1),
(88, 'Jquery', '1.00', '2014-06-01', '网页美工', 3, 3),
(89, 'JAVA', '15.00', '2014-06-01', '网页美工', 2, 2),
(90, 'W', '33.00', '2014-06-01', '网页美工', 1, 1),
(91, 'D', '2.00', '2014-06-01', '网页美工', 2, 2),
(92, 'C', '3.00', '2014-06-01', '网页美工', 3, 3),
(94, '啊啊啊啊', '20.00', '2014-06-11', '网页美工', 1, 1),
(95, '到底d', '12.00', '2014-06-12', '网络营销', 2, 2),
(97, '广告歌', '54.00', '2014-06-11', '文学作品', 5, 5),
(98, '哈哈哈', '11.00', '2014-06-11', '网页美工', 1, 1),
(99, '地地道道的', '22.00', '2014-06-11', '文学作品', 2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
