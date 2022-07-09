-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-07-09 04:00:44
-- 服务器版本： 5.7.26
-- PHP 版本： 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `smarthouse`
--

-- --------------------------------------------------------

--
-- 表的结构 `theme`
--

CREATE TABLE `theme` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `device_select` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `onTime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `offTime` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `theme_description` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `place_select` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theme_state` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `pattern` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `theme`
--

INSERT INTO `theme` (`theme_id`, `theme_name`, `device_select`, `onTime`, `offTime`, `theme_description`, `place_select`, `theme_state`, `pattern`) VALUES
(1, 'back home', 'XiaomiTV', '18:00', '18:15', 'back to home', 'Livingroom', 'on', ''),
(2, 'back home', 'DishWasher', '18:15', '18:30', 'back to home and open the dish washer', 'Kitchen', 'off', ''),
(3, 'go to work', 'Toothbrush', '07:30', '08:00', 'get up and wash tooth', 'Bathroom', 'on', ''),
(4, 'get up', 'Light', '07:30', '07:45', 'get up ', 'Livingroom', 'off', ''),
(5, 'sleep', 'Light', '22:30', '22:45', 'sleep', 'Livingroom', 'off', ''),
(12, 'work', 'XiaomiTV', '02:03', '04:04', 'why not', 'Livingroom', 'on', ''),
(12321, 'wakeup', 'Lamp', '11:22', '22:22', 'Hello', NULL, 'on', 'Normal'),
(22, 'sleeping', 'Light', '07:00', '12:00', 'i am sleepy', 'Livingroom', 'off', ''),
(20, 'wakeup', 'XiaomiTV', '07:00', '23:00', 'wake up', 'Livingroom', 'off', ''),
(12320, '', 'Router', '11:22', '22:33', 'it\'s so fabulous', NULL, 'on', 'wifi'),
(12319, 'fafa', 'Curtain', '11:22', '12:03', '', NULL, 'on', 'CLOSE');

--
-- 转储表的索引
--

--
-- 表的索引 `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`theme_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `theme`
--
ALTER TABLE `theme`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12322;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
