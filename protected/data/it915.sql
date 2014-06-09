-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 09 日 14:16
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `it915`
--

-- --------------------------------------------------------

--
-- 表的结构 `it_admin_user`
--

CREATE TABLE IF NOT EXISTS `it_admin_user` (
  `id` mediumint(5) NOT NULL AUTO_INCREMENT COMMENT '自增分类userid',
  `username` int(11) NOT NULL COMMENT '用户名',
  `password` int(11) NOT NULL COMMENT '密码',
  `realname` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '真实姓名',
  `email` varchar(30) COLLATE utf8_bin NOT NULL COMMENT '验证邮箱',
  `salt` char(6) COLLATE utf8_bin NOT NULL COMMENT '加密密钥',
  `last_time` int(11) NOT NULL COMMENT '登录时间',
  `last_ip` varchar(15) COLLATE utf8_bin NOT NULL COMMENT '上次登录ip',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='后台管理员用户表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `it_category`
--

CREATE TABLE IF NOT EXISTS `it_category` (
  `cid` int(6) NOT NULL AUTO_INCREMENT COMMENT '自增分类',
  `parent_id` mediumint(6) NOT NULL DEFAULT '0' COMMENT '分类父id',
  `cate_name` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '''''' COMMENT '分类名称',
  `cate_desc` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '''''' COMMENT '分类描述',
  `url` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '分类url',
  `sort` mediumint(5) NOT NULL DEFAULT '0' COMMENT '分类排序',
  `is_enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否可用 1可用 0 不可用默认为1',
  PRIMARY KEY (`cid`),
  KEY `parent_id` (`parent_id`,`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='分类表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `it_item`
--

CREATE TABLE IF NOT EXISTS `it_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `cid` int(6) NOT NULL COMMENT '所属的分类id',
  `item_name` varchar(150) COLLATE utf8_bin NOT NULL COMMENT '选项名称',
  `item_desc` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '选项描述',
  `item_url` varchar(255) COLLATE utf8_bin NOT NULL COMMENT '选项外部链接',
  `sort` int(5) NOT NULL COMMENT '选项排序',
  `is_enable` tinyint(1) NOT NULL COMMENT '是否可用',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`,`item_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='分类项' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
