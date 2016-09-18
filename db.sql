/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : snake

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-08-05 16:34:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_name` varchar(155) NOT NULL DEFAULT '' COMMENT '节点名称',
  `module_name` varchar(155) NOT NULL DEFAULT '' COMMENT '模块名',
  `control_name` varchar(155) NOT NULL DEFAULT '' COMMENT '控制器名',
  `action_name` varchar(155) NOT NULL COMMENT '方法名',
  `is_menu` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否是菜单项 1不是 2是',
  `typeid` int(11) NOT NULL COMMENT '父级节点id',
  `style` varchar(155) DEFAULT '' COMMENT '菜单样式',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('1', '用户管理', '#', '#', '#', '2', '0', 'fa fa-users');
INSERT INTO `node` VALUES ('2', '用户列表', 'admin', 'user', 'index', '2', '1', '');
INSERT INTO `node` VALUES ('3', '添加用户', 'admin', 'user', 'useradd', '1', '2', '');
INSERT INTO `node` VALUES ('4', '编辑用户', 'admin', 'user', 'useredit', '1', '2', '');
INSERT INTO `node` VALUES ('5', '删除用户', 'admin', 'user', 'userdel', '1', '2', '');
INSERT INTO `node` VALUES ('6', '角色列表', 'admin', 'role', 'index', '2', '1', '');
INSERT INTO `node` VALUES ('7', '添加角色', 'admin', 'role', 'roleadd', '1', '6', '');
INSERT INTO `node` VALUES ('8', '编辑角色', 'admin', 'role', 'roleedit', '1', '6', '');
INSERT INTO `node` VALUES ('9', '删除角色', 'admin', 'role', 'roledel', '1', '6', '');
INSERT INTO `node` VALUES ('10', '分配权限', 'admin', 'role', 'giveaccess', '1', '6', '');
INSERT INTO `node` VALUES ('11', '系统管理', '#', '#', '#', '2', '0', 'fa fa-desktop');
INSERT INTO `node` VALUES ('12', '数据备份/还原', 'admin', 'data', 'index', '2', '11', '');
INSERT INTO `node` VALUES ('13', '备份数据', 'admin', 'data', 'importdata', '1', '12', '');
INSERT INTO `node` VALUES ('14', '还原数据', 'admin', 'data', 'backdata', '1', '12', '');
INSERT INTO `node` VALUES (null, '权限列表', 'admin', 'node', 'index', '2', '1', '');
INSERT INTO `node` VALUES (null, '增加权限', 'admin', 'node', 'nodeadd', '1', '15', '');
INSERT INTO `node` VALUES (null, '修改权限', 'admin', 'node', 'nodeedit', '1', '15', '');
INSERT INTO `node` VALUES (null, '删除权限', 'admin', 'node', 'nodedel', '1', '15', '');
INSERT INTO `node` VALUES (null, '分配权限', 'admin', 'node', 'nodeass', '1', '15', '');
-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `rolename` varchar(155) NOT NULL COMMENT '角色名称',
  `rule` varchar(255) DEFAULT '' COMMENT '权限节点数据',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '');
INSERT INTO `role` VALUES ('2', '系统维护员', '1,2,3,4,5,6,7,8,9,10');
INSERT INTO `role` VALUES ('3', '新闻发布员', '1,2,3,4,5');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '用户名',
  `password` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
  `real_name` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '真实姓名',
  `status` int(1) DEFAULT '0' COMMENT '状态',
  `typeid` int(11) DEFAULT '1' COMMENT '用户角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '30', '127.0.0.1', '1470381947', 'admin', '1', '1');
INSERT INTO `user` VALUES ('2', 'xiaobai', '4297f44b13955235245b2497399d7a93', '6', '127.0.0.1', '1470368260', '小白', '1', '2');


DROP TABLE IF EXISTS 'Accounts'
CREATE TABLE Accounts (
  id int(11) PRIMARY KEY AUTO_INCREMENT ,
  acc_name varchar(30) NOT NULL DEFAULT '' COMMENT '公众号名称',
  acc_id varchar(50) NOT NULL DEFAULT '' COMMENT '公众号原始ID',
  wx_name varchar(50) NOT NULL DEFAULT '' COMMENT '微信号',
  app_id varchar(50) NOT NULL DEFAULT '' COMMENT 'app_id',
  app_secret varchar(50) NOT NULL DEFAULT '' COMMENT 'app_secret',
  
)ENGINE = MyISAM DEFAULT CHARSET=utf8 COMMENT '公众号表'


DROP TABLE IF EXISTS 'Basic'
CREATE TABLE Basic (
  id int(11) PRIMARY KEY AUTO_INCREMENT ,
  username varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  welcome varchar(255) NOT NULL DEFAULT '' COMMENT '关注回复'
  createtime int NOT NULL DEFAULT '' COMMENT '创建时间',
  updatetime int NOT NULL DEFAULT '' COMMENT '修改时间'
  
)ENGINE = MyISAM DEFAULT CHARSET=utf8 COMMENT '基础设置'