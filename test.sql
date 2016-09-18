-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-09-18 08:27:04
-- 服务器版本： 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `a`
--

CREATE TABLE `a` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL DEFAULT '',
  `price` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `a`
--

INSERT INTO `a` (`id`, `name`, `price`) VALUES
(1, '0', 0),
(2, '1', 1),
(3, '2', 2),
(4, '3', 3),
(5, '4', 4),
(6, '5', 5),
(7, '6', 6),
(8, '7', 7),
(9, '8', 8),
(10, '9', 9),
(11, '10', 10),
(12, '11', 11),
(13, '12', 12),
(14, '13', 13),
(15, '14', 14),
(16, '15', 15),
(17, '16', 16),
(18, '17', 17),
(19, '18', 18),
(20, '19', 19),
(21, '20', 20),
(22, '21', 21),
(23, '22', 22),
(24, '23', 23),
(25, '24', 24),
(26, '25', 25),
(27, '26', 26),
(28, '27', 27),
(29, '28', 28),
(30, '29', 29),
(31, '30', 30),
(32, '31', 31),
(33, '32', 32),
(34, '33', 33),
(35, '34', 34),
(36, '35', 35),
(37, '36', 36),
(38, '37', 37),
(39, '38', 38),
(40, '39', 39),
(41, '40', 40),
(42, '41', 41),
(43, '42', 42),
(44, '43', 43),
(45, '44', 44),
(46, '45', 45),
(47, '46', 46),
(48, '47', 47),
(49, '48', 48),
(50, '49', 49);

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `acc_name` varchar(30) NOT NULL DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`id`, `acc_name`, `acc_id`, `wx_name`, `app_id`, `app_secret`, `token`, `welcome`, `create_time`, `update_time`) VALUES
(7, '3', '1', '1', '1', '1', 'admin', '2', 1474171291, 1474184947);

-- --------------------------------------------------------

--
-- 表的结构 `basic`
--

CREATE TABLE `basic` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT ''COMMENT
) ;

-- --------------------------------------------------------

--
-- 表的结构 `node`
--

CREATE TABLE `node` (
  `id` int(11) NOT NULL,
  `n_name` varchar(155) NOT NULL DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `node`
--

INSERT INTO `node` (`id`, `n_name`, `module_name`, `control_name`, `action_name`, `is_menu`, `typeid`, `style`) VALUES
(1, '用户管理', '#', '#', '#', 2, 0, 'fa fa-users'),
(2, '用户列表', 'admin', 'user', 'index', 2, 1, ''),
(3, '添加用户', 'admin', 'user', 'useradd', 1, 2, ''),
(4, '编辑用户', 'admin', 'user', 'useredit', 1, 2, ''),
(5, '删除用户', 'admin', 'user', 'userdel', 1, 2, ''),
(6, '角色列表', 'admin', 'role', 'index', 2, 1, ''),
(7, '添加角色', 'admin', 'role', 'roleadd', 1, 6, ''),
(8, '编辑角色', 'admin', 'role', 'roleedit', 1, 6, ''),
(9, '删除角色', 'admin', 'role', 'roledel', 1, 6, ''),
(10, '分配权限', 'admin', 'role', 'giveaccess', 1, 6, ''),
(11, '系统管理', '#', '#', '#', 2, 0, 'fa fa-desktop'),
(12, '数据备份/还原', 'admin', 'data', 'index', 2, 11, ''),
(13, '备份数据', 'admin', 'data', 'importdata', 1, 12, ''),
(14, '还原数据', 'admin', 'data', 'backdata', 1, 12, ''),
(15, '权限列表', 'admin', 'node', 'index', 2, 1, ''),
(16, '增加权限', 'admin', 'node', 'nodeadd', 1, 15, ''),
(17, '修改权限', 'admin', 'node', 'nodeedit', 1, 15, ''),
(18, '删除权限', 'admin', 'node', 'nodedel', 1, 15, ''),
(19, '公众号管理', '#', '#', '#', 2, 0, 'fa fa-desktop'),
(20, 'test', 'admin', 'user', 'test', 2, 1, ''),
(21, '我的公众号', 'admin', 'account', 'index', 2, 19, ''),
(22, '添加公众号', 'admin', 'account', 'addaccount', 2, 19, ''),
(23, '删除公众号', 'admin', 'account', 'delaccount', 1, 19, ''),
(24, '编辑公众号', 'admin', 'account', 'editaccount', 1, 19, ''),
(25, '公众号功能', 'admin', 'account', 'functions', 1, 21, ''),
(26, '公众号设置', '#', '#', '#', 2, 0, 'fa fa-desktop'),
(27, '基础设置', 'admin', 'basic', 'index', 2, 26, ''),
(28, '关注回复', 'admin', 'basic', 'huifu', 1, 27, ''),
(29, '关键字回复', 'admin', 'basic', 'keyword', 1, 27, ''),
(33, 'haha', 'admin', 'wechat_request', 'text', 2, 1, ''),
(34, '微信入口', 'admin', 'wechat', 'index', 1, 21, '');

-- --------------------------------------------------------

--
-- 表的结构 `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL COMMENT 'id',
  `rolename` varchar(155) NOT NULL COMMENT '角色名称',
  `rule` varchar(255) DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `role`
--

INSERT INTO `role` (`id`, `rolename`, `rule`) VALUES
(1, '超级管理员', ''),
(2, '系统维护员', '1,2,3,4,5,6,7,8,9,10'),
(3, '新闻发布员', '1,2,3,4,5');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_bin DEFAULT ''COMMENT
) ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `loginnum`, `last_login_ip`, `last_login_time`, `real_name`, `status`, `typeid`, `token`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 118, '127.0.0.1', 1474185314, 'admin', 1, 1, ''),
(2, 'xiaobai', 'c4ca4238a0b923820dcc509a6f75849b', 10, '127.0.0.1', 1473662144, '小白', 1, 2, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a`
--
ALTER TABLE `a`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `a`
--
ALTER TABLE `a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- 使用表AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `basic`
--
ALTER TABLE `basic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `node`
--
ALTER TABLE `node`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id';
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
