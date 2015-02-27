-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2015 �?02 �?28 �?01:58
-- 服务器版本: 5.1.62-community
-- PHP 版本: 5.6.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ns`
--

-- --------------------------------------------------------

--
-- 表的结构 `doc_metro`
--

CREATE TABLE IF NOT EXISTS `doc_metro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `docid` int(11) DEFAULT NULL,
  `title` int(11) DEFAULT NULL,
  `sort` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `doc_metro_group`
--

CREATE TABLE IF NOT EXISTS `doc_metro_group` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `group_title` varchar(16) DEFAULT NULL,
  `group_num` varchar(16) DEFAULT NULL,
  `group_dis` varchar(256) DEFAULT NULL,
  `enable` int(1) DEFAULT '1',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `doc_metro_group`
--

INSERT INTO `doc_metro_group` (`groupid`, `group_title`, `group_num`, `group_dis`, `enable`) VALUES
(1, 't1', NULL, NULL, 1),
(2, 't2', NULL, NULL, 1),
(3, 't3', NULL, NULL, 1),
(4, NULL, NULL, NULL, 0),
(5, NULL, NULL, NULL, 0),
(6, NULL, NULL, NULL, 0),
(7, NULL, NULL, NULL, 0),
(8, NULL, NULL, NULL, 0),
(9, NULL, NULL, NULL, 0),
(10, NULL, NULL, NULL, 0),
(11, NULL, NULL, NULL, 0),
(12, NULL, NULL, NULL, 0),
(13, NULL, NULL, NULL, 0),
(14, NULL, NULL, NULL, 0),
(15, NULL, NULL, NULL, 0),
(16, NULL, NULL, NULL, 0),
(17, NULL, NULL, NULL, 0),
(18, NULL, NULL, NULL, 0),
(19, 'main', '6', '78', 1),
(20, 'other', NULL, NULL, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
