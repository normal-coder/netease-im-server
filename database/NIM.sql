-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2016-05-03 16:16:58
-- 服务器版本： 5.5.42
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `NIM`
--

-- --------------------------------------------------------

--
-- 表的结构 `tp_users`
--

CREATE TABLE `tp_users` (
  `id` int(11) NOT NULL COMMENT '无关业务',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `accid` varchar(32) NOT NULL COMMENT '用户帐号(云信唯一)',
  `name` varchar(255) NOT NULL COMMENT '昵称',
  `icon` varchar(255) DEFAULT NULL COMMENT '头像',
  `sign` varchar(255) DEFAULT NULL COMMENT '签名',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `birthday` date DEFAULT NULL COMMENT '生日',
  `mobile` varchar(32) DEFAULT NULL COMMENT '手机号码',
  `gender` varchar(1) DEFAULT NULL COMMENT '用户性别(0表示未知，1表示男，2表示女)',
  `qq` varchar(10) NOT NULL COMMENT 'QQ号码',
  `weibo` varchar(255) NOT NULL COMMENT '新浪微博',
  `intro` text NOT NULL COMMENT '个人简介',
  `token` varchar(255) DEFAULT NULL COMMENT '云信密码',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '用户状态(0禁用1启用)',
  `imstatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '云信状态(0禁用1启用)',
  `createtime` timestamp NULL DEFAULT NULL COMMENT '创建时间',
  `updatetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '资料更新时间'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tp_users`
--

INSERT INTO `tp_users` (`id`, `username`, `password`, `accid`, `name`, `icon`, `sign`, `email`, `birthday`, `mobile`, `gender`, `qq`, `weibo`, `intro`, `token`, `status`, `imstatus`, `createtime`, `updatetime`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '系统管理员', NULL, '我的签名。要吗', 'normal@normalcoder.com', NULL, '13512345677', '0', '', '', '', '93279e3308bdbbeed946fc965017f67a', 1, 0, '0000-00-00 00:00:00', '2016-04-20 08:14:15'),
(2, 'test100', 'e10adc3949ba59abbe56e057f20f883e', 'test100', 'test100', NULL, '', '', '0000-00-00', '', '1', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, '0000-00-00 00:00:00', '2016-05-03 07:08:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tp_users`
--
ALTER TABLE `tp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tp_users`
--
ALTER TABLE `tp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '无关业务',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
