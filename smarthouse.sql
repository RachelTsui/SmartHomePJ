-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2022-07-08 02:26:54
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
-- 表的结构 `curtain`
--

CREATE TABLE `curtain` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `PatternID` int(3) DEFAULT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Thin` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Thick` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `equipment`
--

CREATE TABLE `equipment` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date DEFAULT NULL,
  `Battery` int(1) NOT NULL,
  `Charging` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Charging',
  `Electric` int(3) DEFAULT '100',
  `Cycle` int(3) NOT NULL,
  `Kind` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Status` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'HEALTHY',
  `Pattern` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `equipment`
--

INSERT INTO `equipment` (`FamilyID`, `ID`, `Name`, `Date`, `Battery`, `Charging`, `Electric`, `Cycle`, `Kind`, `Status`, `Pattern`) VALUES
(123, 1, '1', '2022-07-07', 0, '1', 100, 1, 'router', NULL, 'CLOSE');

-- --------------------------------------------------------

--
-- 表的结构 `fan`
--

CREATE TABLE `fan` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `PatternID` int(3) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Powerful` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Normal` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Weak` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `lamp`
--

CREATE TABLE `lamp` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `PatternID` int(3) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'CLOSE',
  `Normal` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Bright` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Dark` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `pattern`
--

CREATE TABLE `pattern` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `PatternID` int(3) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `pattern`
--

INSERT INTO `pattern` (`FamilyID`, `ID`, `PatternID`, `Name`) VALUES
(123, 1, 2, 'wifi'),
(123, 1, 5, 'light');

-- --------------------------------------------------------

--
-- 表的结构 `router`
--

CREATE TABLE `router` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `PatternID` int(3) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `WIFI` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Accelerator` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE',
  `Light` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `router`
--

INSERT INTO `router` (`FamilyID`, `ID`, `PatternID`, `Name`, `WIFI`, `Accelerator`, `Light`) VALUES
(123, 1, 1, 'CLOSE', 'CLOSE', 'CLOSE', 'CLOSE'),
(123, 1, 5, 'light', 'CLOSE', 'CLOSE', 'OPEN'),
(123, 1, 3, 'acc', 'CLOSE', 'OPEN', 'CLOSE'),
(123, 1, 2, 'wifi', 'OPEN', 'CLOSE', 'CLOSE');

-- --------------------------------------------------------

--
-- 表的结构 `tv`
--

CREATE TABLE `tv` (
  `FamilyID` int(6) NOT NULL,
  `ID` int(6) NOT NULL,
  `PatternID` int(3) NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'CLOSE',
  `Power` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'CLOSE'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`FamilyID`,`ID`);

--
-- 表的索引 `pattern`
--
ALTER TABLE `pattern`
  ADD PRIMARY KEY (`FamilyID`,`ID`,`PatternID`);

--
-- 表的索引 `router`
--
ALTER TABLE `router`
  ADD PRIMARY KEY (`FamilyID`,`ID`,`Accelerator`,`WIFI`,`Light`);

--
-- 表的索引 `tv`
--
ALTER TABLE `tv`
  ADD PRIMARY KEY (`FamilyID`,`ID`,`Power`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
