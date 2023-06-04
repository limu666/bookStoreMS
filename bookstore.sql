-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2023 年 05 月 18 日 03:15
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `bookstore`
--
CREATE DATABASE IF NOT EXISTS `bookstore` DEFAULT CHARACTER SET armscii8 COLLATE armscii8_general_ci;
USE `bookstore`;

-- --------------------------------------------------------

--
-- 表的结构 `tb_book`
--

CREATE TABLE IF NOT EXISTS `tb_book` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) DEFAULT NULL,
  `price` decimal(5,1) DEFAULT NULL,
  `author` varchar(20) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  PRIMARY KEY (`bid`) USING BTREE,
  KEY `cid` (`cid`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `tb_book`
--

INSERT INTO `tb_book` (`bid`, `bname`, `price`, `author`, `image`, `cid`, `count`) VALUES
(1, 'Java编程思想（第4版）', '75.6', 'qdmmy6', 'book_img/101.jpg', 1, 99),
(2, 'Java核心技术卷1', '68.5', 'qdmmy6', 'book_img/102.jpg', 1, 97),
(3, 'Java就业培训教程', '39.9', '张孝祥', 'book_img/103.jpg', 1, 197),
(4, 'Head First java', '47.5', '（美）塞若', 'book_img/104.jpg', 1, 188),
(5, 'JavaWeb开发详解', '83.3', '孙鑫', 'book_img/105.jpg', 2, 297),
(6, 'Struts2深入详解', '63.2', '孙鑫', 'book_img/105.jpg', 2, 398),
(7, '精通Hibernate', '30.0', '孙卫琴', 'book_img/106.jpg', 2, 100),
(11, '精通Spring2.x', '63.2', '陈华雄', 'book_img/107.jpg', 2, 2025),
(12, 'Javascript权威指南', '93.6', '（美）弗兰纳根', 'book_img/108.jpg', 3, 500);

-- --------------------------------------------------------

--
-- 表的结构 `tb_category`
--

CREATE TABLE IF NOT EXISTS `tb_category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `cname` varchar(100) NOT NULL,
  PRIMARY KEY (`cid`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `tb_category`
--

INSERT INTO `tb_category` (`cid`, `cname`) VALUES
(1, 'JavaSE'),
(2, 'JavaEE'),
(3, 'Javascript');

-- --------------------------------------------------------

--
-- 表的结构 `tb_orderitem`
--

CREATE TABLE IF NOT EXISTS `tb_orderitem` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL,
  `oid` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  PRIMARY KEY (`iid`) USING BTREE,
  KEY `oid` (`oid`) USING BTREE,
  KEY `bid` (`bid`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `tb_orderitem`
--

INSERT INTO `tb_orderitem` (`iid`, `count`, `subtotal`, `oid`, `bid`) VALUES
(2, 1, '76', 2, 1),
(3, 1, '83', 3, 5),
(7, 1, '69', 7, 2),
(10, 1, '76', 10, 1),
(12, 1, '69', NULL, 2),
(18, 1, '40', 18, 3),
(19, 1, '40', NULL, 3),
(20, 10, '475', NULL, 4),
(21, 1, '63', NULL, 6),
(22, 1029, '77792', 19, 1),
(23, 1, '76', 20, 1),
(24, 1, '83', 21, 5);

-- --------------------------------------------------------

--
-- 表的结构 `tb_orders`
--

CREATE TABLE IF NOT EXISTS `tb_orders` (
  `oid` int(11) NOT NULL AUTO_INCREMENT,
  `ordertime` datetime DEFAULT NULL,
  `total` decimal(10,0) DEFAULT NULL,
  `state` smallint(1) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`oid`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `tb_orders`
--

INSERT INTO `tb_orders` (`oid`, `ordertime`, `total`, `state`, `uid`, `address`) VALUES
(2, '2021-10-30 19:27:50', '76', 1, 1, '北京市海淀区金燕龙大厦2楼216室无敌收;'),
(3, '2021-10-30 19:28:16', '83', 1, 1, '北京市海淀区金燕龙大厦2楼216室无敌收;'),
(7, '2021-10-30 19:45:28', '69', 3, 1, '北京市海淀区金燕龙大厦2楼216室无敌收;;'),
(10, '2021-10-30 19:57:14', '76', 0, 1, '开封大学'),
(18, '2021-10-30 20:45:39', '40', 2, 1, '开封大学;'),
(19, '2021-11-08 14:28:45', '77792', 0, 1, '开封大学'),
(20, '2021-11-09 09:20:30', '76', 1, 1, '北京市海淀区金燕龙大厦2楼216室无敌收'),
(21, '2021-11-17 10:44:56', '83', 0, 7, '开封大学');

-- --------------------------------------------------------

--
-- 表的结构 `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `tb_user`
--

INSERT INTO `tb_user` (`uid`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, '1', '1', '2'),
(3, 'nihao', 'ad', 'asd'),
(6, 'qin', 'qin', 'qin'),
(7, '', '', ''),
(8, 'ss', 'sss', 's');

--
-- 限制导出的表
--

--
-- 限制表 `tb_book`
--
ALTER TABLE `tb_book`
  ADD CONSTRAINT `cid` FOREIGN KEY (`cid`) REFERENCES `tb_category` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 限制表 `tb_orderitem`
--
ALTER TABLE `tb_orderitem`
  ADD CONSTRAINT `FK10k16vdcm00bhn3q4jdfvxqrf` FOREIGN KEY (`oid`) REFERENCES `tb_orders` (`oid`),
  ADD CONSTRAINT `FKfg00wh12qt15o7qkciw2nwec9` FOREIGN KEY (`bid`) REFERENCES `tb_book` (`bid`),
  ADD CONSTRAINT `tb_orderitem_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `tb_orders` (`oid`),
  ADD CONSTRAINT `tb_orderitem_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `tb_book` (`bid`);

--
-- 限制表 `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `tb_user` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
