# Host: localhost  (Version: 5.5.53)
# Date: 2018-06-13 18:34:03
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "sj_activity"
#

CREATE TABLE `sj_activity` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '活动标题',
  `start_time` varchar(30) DEFAULT NULL COMMENT '活动起始时间',
  `end_time` varchar(30) DEFAULT NULL COMMENT '结束时间',
  `participants` int(11) DEFAULT '0' COMMENT '虚拟人数',
  `if_participants` varchar(255) DEFAULT NULL COMMENT '是否显示虚拟人数',
  `compulsory` int(11) DEFAULT '0' COMMENT '是否强制关注 0否 1是',
  `explain` text COMMENT '活动说明',
  `limit` int(11) DEFAULT '0' COMMENT '砍价限制的次数',
  `if_limit` varchar(255) DEFAULT NULL COMMENT '是否限制每个人的砍价次数',
  `contact` int(11) DEFAULT '0' COMMENT '0关闭，1参与前填写，2中奖后填写',
  `enterprise_logo` varchar(255) DEFAULT '0' COMMENT '企业logo 0不显示',
  `function_button` varchar(255) DEFAULT '0' COMMENT '功能按钮 1关闭 2页面跳转 3一键关注',
  `wx_share_icon` varchar(255) DEFAULT '0' COMMENT '分享微信图标，0默认',
  `wx_share_text` varchar(255) DEFAULT '0' COMMENT '微信分享内容 0默认',
  `button_name` varchar(30) DEFAULT NULL COMMENT '按钮名称',
  `button_content` varchar(255) DEFAULT NULL COMMENT '按钮链接',
  `button_logo_img` varchar(255) DEFAULT NULL COMMENT '二维码',
  `create_id` int(11) DEFAULT NULL COMMENT '创建人id',
  `ac_create_time` int(11) DEFAULT NULL COMMENT '活动创建时间',
  `partic` int(11) DEFAULT NULL COMMENT '限制参与的人数',
  `if_partic` varchar(255) DEFAULT NULL COMMENT '是否限制参与人数',
  `ac_thumb` varchar(255) DEFAULT NULL COMMENT '活动缩略图',
  `wx_share_title` varchar(255) DEFAULT NULL COMMENT '微信分享的标题',
  `if_send` int(11) DEFAULT '0' COMMENT '活动状态 0未发布  1进行中  2结束',
  `indx` int(11) DEFAULT NULL COMMENT '循环次数',
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='活动表';

#
# Data for table "sj_activity"
#


#
# Structure for table "sj_actor"
#

CREATE TABLE `sj_actor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cus_id` int(11) DEFAULT NULL COMMENT '砍价用户id',
  `ac_id` int(11) DEFAULT NULL COMMENT '砍价活动ID',
  `create_time` int(11) DEFAULT NULL COMMENT '砍价时间',
  `cut_money` decimal(10,2) DEFAULT NULL COMMENT '砍价金额',
  `or_id` int(11) DEFAULT NULL COMMENT 'order表id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='砍价表';

#
# Data for table "sj_actor"
#


#
# Structure for table "sj_admin"
#

CREATE TABLE `sj_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "sj_admin"
#

INSERT INTO `sj_admin` VALUES (1,'admin','d033e22ae348aeb5660fc2140aec35850c4da997',1501743808);

#
# Structure for table "sj_commodity"
#

CREATE TABLE `sj_commodity` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `com_num` int(11) DEFAULT NULL COMMENT '商品数量',
  `original_price` decimal(10,2) DEFAULT NULL COMMENT '商品原价',
  `cut_price` decimal(10,2) DEFAULT NULL COMMENT '砍价目标',
  `cut_num` int(11) DEFAULT NULL COMMENT '需砍次数',
  `thumb` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `change_way` int(11) DEFAULT '0' COMMENT '兑奖方法：0线下兑奖，1公众号，2网页',
  `do_notice` varchar(255) DEFAULT NULL COMMENT '操作提示',
  `do_address` varchar(255) DEFAULT NULL COMMENT '兑奖地址',
  `do_link` varchar(255) DEFAULT NULL COMMENT '兑奖链接',
  `do_time` int(11) DEFAULT '0' COMMENT '兑奖时间：0固定日期 1固定时长',
  `do_start_time` varchar(30) DEFAULT NULL COMMENT '兑奖开始时间',
  `do_end_time` varchar(30) DEFAULT NULL COMMENT '兑奖结束时间',
  `voucher_way` int(11) DEFAULT NULL COMMENT '券号生成：0系统生成，1手工导入',
  `voucher_num` varchar(60) DEFAULT NULL COMMENT '券号',
  `available_time` varchar(255) DEFAULT '0' COMMENT '可用时段 0所有',
  `subtitle` varchar(255) DEFAULT NULL COMMENT '副标题',
  `service_phone` varchar(30) DEFAULT NULL COMMENT '客户电话',
  `shoud_know` varchar(255) DEFAULT NULL COMMENT '兑奖须知',
  `self_button` int(11) DEFAULT '0' COMMENT '自定义按钮0关闭 1页面跳转 2一键关注',
  `button_name` varchar(255) DEFAULT NULL COMMENT '按钮名称',
  `button_text` varchar(255) DEFAULT NULL COMMENT '跳转路径/微信图片',
  `button_link` varchar(255) DEFAULT NULL COMMENT '按钮链接',
  `button_img` varchar(255) DEFAULT NULL COMMENT 'logo',
  `ac_id` int(11) DEFAULT NULL COMMENT '活动Id',
  `stab` varchar(255) DEFAULT NULL COMMENT '商品栏',
  `do_start_gd` int(11) DEFAULT NULL COMMENT '固定开始日期',
  `do_end_gd` int(11) DEFAULT NULL COMMENT '固定结束时间',
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='商品列表';

#
# Data for table "sj_commodity"
#


#
# Structure for table "sj_customer"
#

CREATE TABLE `sj_customer` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户编号',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `phone` varchar(30) DEFAULT NULL COMMENT '客户手机号',
  `openid` varchar(255) DEFAULT NULL COMMENT '微信端的唯一标识',
  `city` varchar(255) DEFAULT NULL COMMENT '城市',
  `sex` int(11) DEFAULT NULL COMMENT '性别 1男0女',
  `user_img` varchar(255) DEFAULT NULL COMMENT '用户头像',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `password` varchar(255) DEFAULT NULL COMMENT '用户密码',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "sj_customer"
#


#
# Structure for table "sj_order"
#

CREATE TABLE `sj_order` (
  `or_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '关联用户表',
  `com_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `times` int(11) DEFAULT NULL COMMENT '创建时间',
  `if_end` int(11) DEFAULT '0' COMMENT '是否砍价完成 0未完成 1完成 2已过期',
  `if_prize` int(11) DEFAULT '0' COMMENT '是否已兑奖0未 1兑',
  `com_name` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `original_price` decimal(10,2) DEFAULT NULL COMMENT '商品原价',
  `cut_price` decimal(10,2) DEFAULT NULL COMMENT '砍价目标',
  `thumb` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `subtitle` varchar(255) DEFAULT NULL COMMENT '副标题',
  `cut_arr` text COMMENT '砍价多少，提前生成',
  `ac_id` int(11) DEFAULT NULL COMMENT '活动id',
  `get_code` varchar(255) DEFAULT NULL COMMENT '获取的兑奖码',
  `write_off_time` int(11) DEFAULT NULL COMMENT '兑奖时间',
  `success_time` varchar(255) DEFAULT NULL COMMENT '完成砍价的时间',
  PRIMARY KEY (`or_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='我要砍价表';

#
# Data for table "sj_order"
#


#
# Structure for table "sj_voucher"
#

CREATE TABLE `sj_voucher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL COMMENT '商品关联id',
  `code` varchar(255) DEFAULT NULL COMMENT '券码',
  `cus_id` int(11) DEFAULT NULL COMMENT '活动创始人ID',
  `ac_id` int(11) DEFAULT NULL COMMENT '活动ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='券码表';

#
# Data for table "sj_voucher"
#

