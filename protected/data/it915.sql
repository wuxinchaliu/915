-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 06 月 12 日 08:56
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
  `id` mediumint(5) NOT NULL AUTO_INCREMENT COMMENT ''自增分类userid'',
  `username` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''用户名'',
  `password` varchar(32) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''密码'',
  `realname` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''真实姓名'',
  `email` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''验证邮箱'',
  `salt` char(6) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''加密密钥'',
  `last_time` int(10) NOT NULL DEFAULT ''0'' COMMENT ''上次登录ip'',
  `fail_login_time` int(10) NOT NULL DEFAULT ''0'' COMMENT ''失败登录时间'',
  `fail_login_count` tinyint(6) NOT NULL DEFAULT ''0'' COMMENT ''失败登录次数'',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT=''后台管理员用户表'' AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `it_admin_user`
--

INSERT INTO `it_admin_user` (`id`, `username`, `password`, `realname`, `email`, `salt`, `last_time`, `fail_login_time`, `fail_login_count`) VALUES
(1, ''qilin'', ''d054cd4dc05980e67644230bd2e04ab7'', ''齐霖'', ''qi138138lin@163.com'', ''q8dn'', 0, 1402562240, 0),
(2, ''smallgirl'', ''554bef19b426e99135a156e0748830f6'', ''admin管理员'', ''hnebbs@sina.com'', ''9izq'', 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `it_category`
--

CREATE TABLE IF NOT EXISTS `it_category` (
  `cid` int(6) NOT NULL AUTO_INCREMENT COMMENT ''自增分类'',
  `parent_id` mediumint(6) NOT NULL DEFAULT ''0'' COMMENT ''分类父id'',
  `cate_name` varchar(80) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''分类名称'',
  `cate_desc` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''分类描述'',
  `url` varchar(255) COLLATE utf8_bin NOT NULL COMMENT ''分类url'',
  `sort` mediumint(5) NOT NULL DEFAULT ''0'' COMMENT ''分类排序'',
  `is_enable` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''是否可用 1可用 0 不可用默认为1'',
  PRIMARY KEY (`cid`),
  KEY `parent_id` (`parent_id`,`sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT=''分类表'' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `it_item`
--

CREATE TABLE IF NOT EXISTS `it_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT ''自增id'',
  `cid` int(6) NOT NULL COMMENT ''所属的分类id'',
  `item_name` varchar(150) COLLATE utf8_bin NOT NULL COMMENT ''选项名称'',
  `item_desc` varchar(255) COLLATE utf8_bin NOT NULL COMMENT ''选项描述'',
  `item_url` varchar(255) COLLATE utf8_bin NOT NULL COMMENT ''选项外部链接'',
  `sort` int(5) NOT NULL COMMENT ''选项排序'',
  `is_enable` tinyint(1) NOT NULL COMMENT ''是否可用'',
  PRIMARY KEY (`id`),
  KEY `cid` (`cid`,`item_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT=''分类项'' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `it_login_log`
--

CREATE TABLE IF NOT EXISTS `it_login_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT ''自增分类logoid'',
  `username` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT '''' COMMENT ''用户名'',
  `user_id` mediumint(5) NOT NULL DEFAULT ''0'' COMMENT ''用户id'',
  `login_result` tinyint(1) NOT NULL DEFAULT ''1'' COMMENT ''登录结果'',
  `login_time` int(10) NOT NULL DEFAULT ''0'' COMMENT ''登录时间'',
  `login_ip` int(10) NOT NULL DEFAULT ''0'' COMMENT ''登录ip'',
  `user_agent` tinyint(6) NOT NULL DEFAULT ''0'' COMMENT ''用户user_agent信息'',
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT=''后台用户登录日志表'' AUTO_INCREMENT=1 ;

