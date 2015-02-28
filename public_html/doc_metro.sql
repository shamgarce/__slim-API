-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2015-02-28 20:51:01
-- 服务器版本： 5.1.62-community
-- PHP Version: 5.4.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ns`
--

-- --------------------------------------------------------

--
-- 表的结构 `doc_metro`
--

CREATE TABLE IF NOT EXISTS `doc_metro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) DEFAULT '0',
  `docid` int(11) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `wg` varchar(128) DEFAULT NULL COMMENT '[swh]',
  `color` varchar(128) DEFAULT NULL,
  `icon` varchar(128) DEFAULT NULL,
  `img` varchar(128) DEFAULT NULL,
  `brand` text,
  `content` text,
  `url` varchar(128) DEFAULT NULL,
  `cpcode` text,
  `sort` int(11) DEFAULT '0',
  `enable` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `doc_metro`
--

INSERT INTO `doc_metro` (`id`, `groupid`, `docid`, `title`, `wg`, `color`, `icon`, `img`, `brand`, `content`, `url`, `cpcode`, `sort`, `enable`) VALUES
(1, 1, 1, '测试的信息', 'double', 'bg-emerald', 'icon-remove', '/A/upload/CR-lOg6S1OSsI.gif', '<div class="tile-status">\n<span class="name">Store</span>\n</div>', '<div class="tile-content icon">\n<img src="{img}">\n</div>', '#', '<a href="#" class="tile double bg-emerald" data-click="transform">\r\n            <div class="tile-content icon">\n<img src="/A/upload/CR-lOg6S1OSsI.gif">\n</div>\r\n            <div class="tile-status">\n<span class="name">Store</span>\n</div>\r\n        </a>', 5, 1),
(2, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<a href="#" class="tile bg-darkOrange selected" data-click="transform">\r\n                <div class="tile-content icon">\r\n                    <span class="icon-help"></span>\r\n                </div>\r\n                <div class="brand">\r\n                    <div class="label">Help+Tips</div>\r\n                </div>\r\n            </a>', 12, 1),
(3, 1, 1, '2', '3', '4', '5', '6', '7', '8', '9', '<a class="tile double double-vertical bg-steel" data-click="transform">\r\n                <div class="tile-content" style="background: url(/A/Metro/images/clouds2.png)">\r\n                    <div class="padding10">\r\n                        <h1 class="fg-white ntm">57&deg;</h1>\r\n                        <h2 class="fg-white no-margin">San Francisco</h2>\r\n                        <h5 class="fg-white no-margin">Party Cloudy</h5>\r\n                        <p class="tertiary-text fg-white no-margin">Today</p>\r\n                        <p class="tertiary-text fg-white">63&deg;/55&deg; Mostly Clear</p>\r\n                        <p class="tertiary-text fg-white no-margin">Tomorrow</p>\r\n                        <p class="tertiary-text fg-white">64&deg;/54&deg; Mostly Clear</p>\r\n                    </div>\r\n\r\n                </div>\r\n                <div class="tile-status">\r\n                    <div class="label">Weather</div>\r\n                </div>\r\n            </a> <!-- end tile -->', 50, 1),
(4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<a href="#" class="tile half bg-darkRed " data-click="transform">\r\n    <div class="tile-content icon">\r\n        <span class="icon-camera"></span>\r\n    </div>\r\n</a>', 10, 1),
(5, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<a href="#" class="tile half bg-darkRed " data-click="transform">\r\n <div class="tile-content icon">\r\n <span class="icon-camera"></span>\r\n </div>\r\n</a>', 10, 1),
(6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '<a href="#" class="tile half bg-darkRed " data-click="transform">\r\n <div class="tile-content icon">\r\n <span class="icon-camera"></span>\r\n </div>\r\n</a>', 10, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
