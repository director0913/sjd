# Host: localhost  (Version: 5.5.53)
# Date: 2018-06-21 09:20:09
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
  `bgm_id` int(11) DEFAULT NULL COMMENT '背景乐',
  PRIMARY KEY (`ac_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='活动表';

#
# Data for table "sj_activity"
#

INSERT INTO `sj_activity` VALUES (1,'全民砍价','2018-06-20','2018-06-21',0,'false',0,'经济角度讲',3,'true',0,'0','0','0','0',NULL,NULL,NULL,1,1529459264,2,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b222e42e1.jpeg',NULL,1,NULL,1),(2,'全民砍价','2018-06-20','2018-06-20',0,'false',0,'BShsh',3,'true',0,'0','0','0','0',NULL,NULL,NULL,4,1529459987,2,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b5094f9c7.jpeg',NULL,2,NULL,2),(3,'全民砍价','2018-06-20','2018-06-21',0,'false',0,'Hshsh',3,'true',0,'0','0','0','0',NULL,NULL,NULL,4,1529460134,2,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b5a5441df.jpeg',NULL,1,NULL,2),(4,'全民砍价','2018-06-20','2018-06-30',0,'false',0,'距离么路途我呢他叫我哦具体恐龙图推荐酷兔兔咯屋头咯欧特警力量五台山属于我的涂总不图考虑考虑太苦了快乐旅途',3,'true',0,'0','0','0','0',NULL,NULL,NULL,3,1529461162,10,'true','http://zxy.mynatapp.cc/Uploads/',NULL,1,NULL,1),(5,'全民砍价','2018-06-20','2018-06-21',0,'false',0,'灵敏room',3,'true',0,'0','0','0','0',NULL,NULL,NULL,9,1529461525,10,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29bb0db08f9.png',NULL,1,NULL,3),(6,'11','2018-06-20','2018-06-30',0,'false',0,'灬',3,'true',0,'0','0','0','0',NULL,NULL,NULL,11,1529463361,10,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29c1f874d0a.jpg',NULL,0,NULL,2),(7,'Djjdh','2018-06-20','2018-06-20',0,'false',0,'Bbhhh',3,'true',0,'0','0','0','0',NULL,NULL,NULL,8,1529476904,122,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29f72293331.png',NULL,2,NULL,1),(8,'全民砍价来了','2018-06-20','2018-06-21',0,'false',0,'哈哈哈哈哈护手霜v',3,'true',0,'0','0','0','0',NULL,NULL,NULL,1,1529478057,3,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29fb71130a3.jpeg',NULL,1,NULL,5),(9,'哈哈哈','2018-06-20','2018-06-21',0,'false',0,'打底裤',3,'true',0,'0','0','0','0',NULL,NULL,NULL,1,1529487407,2,'true','http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b2a1ffbaf0f1.jpeg',NULL,1,NULL,1);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='砍价表';

#
# Data for table "sj_actor"
#

INSERT INTO `sj_actor` VALUES (1,1,1,1529459282,28.19,1),(2,2,1,1529459343,61.81,1),(3,4,1,1529459559,88.47,2),(4,5,1,1529459669,64.60,3),(5,4,3,1529460153,87.38,4),(6,1,3,1529460276,4.62,4),(7,3,4,1529461194,2.45,6),(8,1,4,1529461235,8.42,6),(9,9,5,1529461568,2.43,7),(10,10,5,1529461620,9.57,7),(11,1,8,1529478102,10.28,9),(12,1,9,1529487420,4.66,10);

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
# Structure for table "sj_bgm"
#

CREATE TABLE `sj_bgm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bgm` varchar(255) DEFAULT NULL,
  `bgm_name` varchar(255) DEFAULT NULL COMMENT '文件名',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='背景乐';

#
# Data for table "sj_bgm"
#

INSERT INTO `sj_bgm` VALUES (1,'http://zxy.mynatapp.cc/Uploads/news/2018-06-18/5b2723e972121.mp3','香蕉之歌'),(2,'http://zxy.mynatapp.cc/Uploads/news/2018-06-18/5b2723e972121.mp3','香蕉巴拉之歌'),(3,'http://zxy.mynatapp.cc/Uploads/news/2018-06-19/5b28a94b56d7f.mp3',' Nom Nom Nom'),(4,'http://zxy.mynatapp.cc/Uploads/news/2018-06-20/5b29c4af79a33.mp3','离人愁'),(5,'http://zxy.mynatapp.cc/Uploads/news/2018-06-20/5b29c4d11b9fe.mp3','不仅仅是喜欢'),(6,'http://zxy.mynatapp.cc/Uploads/news/2018-06-20/5b29c4e32d35f.mp3','最美的期待');

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
  `do_time` int(11) DEFAULT '0' COMMENT '兑奖时间：1固定日期 2固定时长',
  `do_start_time` varchar(30) DEFAULT NULL COMMENT '兑奖开始时间',
  `do_end_time` varchar(30) DEFAULT NULL COMMENT '兑奖结束时间',
  `voucher_way` int(11) DEFAULT NULL COMMENT '券号生成：0系统生成，1手工导入',
  `voucher_num` varchar(60) DEFAULT NULL COMMENT '券号',
  `available_time` varchar(255) DEFAULT '0' COMMENT '可用时段 0所有',
  `subtitle` varchar(255) DEFAULT NULL COMMENT '副标题',
  `service_phone` varchar(30) DEFAULT NULL COMMENT '客服电话',
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='商品列表';

#
# Data for table "sj_commodity"
#

INSERT INTO `sj_commodity` VALUES (1,'喝假酒假',1,100.00,10.00,2,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b22a99561.png',0,NULL,'裤子',NULL,0,'2018-06-20','2018-06-21',NULL,NULL,'0',NULL,'18211110000','健健康康',0,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL),(2,'Bshsh',2,1234.00,234.00,3,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b4e8df721.jpeg',0,NULL,'Hsnshsj',NULL,0,'2018-06-20','2018-06-20',NULL,NULL,'0',NULL,'1826363839','Hshsh',0,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL),(3,'Hdhsh',1,123.00,31.00,2,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b58bae349.jpeg',0,NULL,'Nsnsns',NULL,0,'2018-06-20','2018-06-21',NULL,NULL,'0',NULL,'12737377282','Jaha',0,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL),(4,'省钱神器',10,50.00,20.00,5,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b93bceeba.jpg',0,NULL,'重庆',NULL,0,'2018-06-20','2018-06-30',NULL,NULL,'0',NULL,'123456789521','火车票打折优惠，先到先得！\n\n省钱神器：滴滴套餐',0,NULL,NULL,NULL,NULL,4,NULL,NULL,NULL),(5,'KKK咯我摸哦哟KKK',9,100.00,88.00,2,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29bad88229e.jpg',0,NULL,'进攻哦',NULL,0,'2018-06-20','2018-06-21',NULL,NULL,'0',NULL,'12345678901','过敏哦红米',0,NULL,NULL,NULL,NULL,5,NULL,NULL,NULL),(6,'此信息了',10,10.00,2.00,5,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29c23f3e23a.jpg',0,NULL,'灬',NULL,0,'2018-06-20','2018-06-30',NULL,NULL,'0',NULL,'18211078082','此信息了我我我我',0,NULL,NULL,NULL,NULL,6,NULL,NULL,NULL),(7,'Ghhhh',122,1223.00,333.00,12,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29f700cf466.jpeg',0,NULL,'Tyg',NULL,0,'2018-06-20','2018-06-20',NULL,NULL,'0',NULL,'4455','Bbcbxhh',0,NULL,NULL,NULL,NULL,7,NULL,NULL,NULL),(8,'还是说',3,123.00,23.00,10,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29fb3e4cecb.jpeg',0,NULL,'哥哥我好',NULL,0,'2018-06-20','2018-06-21',NULL,NULL,'0',NULL,'10086','哈哈哈我好',0,NULL,NULL,NULL,NULL,8,NULL,NULL,NULL),(9,'哈哈哈',2,100.00,50.00,2,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b2a2017b399c.jpeg',0,NULL,'的坎坎坷坷',NULL,0,'2018-06-20','2018-06-21',NULL,NULL,'0',NULL,'18200002222','哈哈哈',0,NULL,NULL,NULL,NULL,9,NULL,NULL,NULL);

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
  `if_author` int(11) DEFAULT '0' COMMENT '是否授权，默认没有授权',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='用户表';

#
# Data for table "sj_customer"
#

INSERT INTO `sj_customer` VALUES (1,'JR','18223356394','orP9_wFOD2fsA0Leu_hihwYicoig','渝北',NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLElNvY31Iic1sZPxGRzJKOSnTcibC7x5uzOgeQkTdG4jZ06764NWO6CygzIl9iazMiaqGQmQOmwFntgQ/132',1529459160,'7c4a8d09ca3762af61e59520943dc26494f8941b',0),(2,'雨 下','13594158994','orP9_wObbTo493LyjX3zIQ8j0_zE',NULL,NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/ibnnPyCxlfbJ70Def04d0aksrnI6QMJUEF4vNyoHxibBfmSCneY5K4S1RWzTmRweLlSw7ficQUsjMk4gibialAwqSgQ/132',1529460162,'7c4a8d09ca3762af61e59520943dc26494f8941b',0),(3,'童婵娟','17723162709','orP9_wO7dDZkXaOlC3FIJiZO3LTY',NULL,NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTI0gH7rpRlqgSLkEqeibBVpwkAkF0xQ2DJhlvIIBofghxKia0QibVhCFqkdBBuS59GvSWQicUPNW1u1Ww/132',1529460630,'7c4a8d09ca3762af61e59520943dc26494f8941b',0),(4,'-','13370777007','orP9_wAabDspzkYJph4kDkUhpuzk',NULL,NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83epNxrMp4dwZHjS9fTew4tQ9ACbgQJ8Gibt5Bllu4Ig8TRJwcJw6QXxF4ibXFCsvic6LGSnZRVic0PY3JA/132',1529459871,'7c4a8d09ca3762af61e59520943dc26494f8941b',0),(5,'重庆军翔白优信息科技',NULL,'orP9_wH8ZP6n5xVxmgqNz5_tDn7I',NULL,NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/nHTeBrP98wymicHKENxEbKb151eBiaItbf5kFQygUAfcIVGHn5ccaaXV032APdRTo313AuDjnZfVfFibKS56sRFnw/132',NULL,NULL,0),(6,'有泪流',NULL,'orP9_wOUznuJfRQlb6BWmUfFN6nE',NULL,NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/zGzfjsVQr1S1X5ZEuH5VNicfFzduzlBfhgvsJp3x5iawyOpVok00TBZI8O8c2Lk6klB5UuDBVYAVLgarJCHyatKw/132',NULL,NULL,0),(7,'刘军-军翔白优',NULL,'orP9_wEE2RmpyHWtjao2SmNZspxA',NULL,NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/uRSd4P8a94MKq7JN4hCFFT1oCVObs1LD6ibGtqia7YHLmA3kkvs1ep9rdZGg6dV0rfKQI93BP7f8WKBaKXibAboSQ/132',NULL,NULL,0),(8,'勇','18310739917','orP9_wC3EgHFTlV8yvGnG3ZL-XKU','',NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/DYAIOgq83epuVN6juq1VcHfB3aeMGicoRRsvnpuk1SJBY6duGYmN9Cr0GC92K5ptUWyEzPiaLSwSNsCCUekPy11Q/132',1529461046,'87850dd54cc998933cbe722b44c90012455e50c3',0),(9,'HgCheng','15321249991','orP9_wPohPfopEb4cOZNCuxrGofM','昌平',NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIpnEMnKSLvRDWG8APBeMrHEia1icLyJUr8xr7Q9rOJmcInXCrNRL0q3LJNy13rQmzZBbn6WNEmykuA/132',1529461379,'3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d',0),(10,'15010612520',NULL,'orP9_wIz_jfL9aPaL61sCW5xOXuI',NULL,NULL,'',NULL,NULL,0),(11,'张强','18518969555','orP9_wKY868RV8LJxiL3E9XZrDSg','大兴',NULL,'http://thirdwx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJcaoMfmV4h7Ryesd68RVctg1xAA1PiaQLhibWaziadfRPpdibjqHfnsibotGHMUVicCBbPXamra0niaaB0g/132',1529463241,'3efc107efc96c890ea5e42d27a24c18059f09135',0);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='我要砍价表';

#
# Data for table "sj_order"
#

INSERT INTO `sj_order` VALUES (1,1,1,1529459280,1,0,'喝假酒假',100.00,10.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b22a99561.png',NULL,'[28.19,61.81]',1,'MHsZsdkw',NULL,'2018-06-20 09:49:03'),(2,4,1,1529459555,0,0,'喝假酒假',100.00,10.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b22a99561.png',NULL,'[88.47,1.53]',1,NULL,NULL,NULL),(3,5,1,1529459665,0,0,'喝假酒假',100.00,10.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b22a99561.png',NULL,'[64.6,25.4]',1,NULL,NULL,NULL),(4,4,3,1529460150,1,0,'Hdhsh',123.00,31.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b58bae349.jpeg',NULL,'[87.38,4.62]',3,'Gj4c6tNg',NULL,'2018-06-20 10:04:36'),(5,1,3,1529460375,0,0,'Hdhsh',123.00,31.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b58bae349.jpeg',NULL,'[69.27,22.73]',3,NULL,NULL,NULL),(6,3,4,1529461185,0,0,'省钱神器',50.00,20.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b93bceeba.jpg',NULL,'[2.45,8.42,8.39,2.59,8.15]',4,NULL,NULL,NULL),(7,9,5,1529461566,1,0,'KKK咯我摸哦哟KKK',100.00,88.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29bad88229e.jpg',NULL,'[2.43,9.57]',5,'N1BuSVr1',NULL,'2018-06-20 10:27:00'),(8,1,4,1529462149,0,0,'省钱神器',50.00,20.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29b93bceeba.jpg',NULL,'[3.27,2.49,7.31,2.3,14.63]',4,NULL,NULL,NULL),(9,1,8,1529478095,0,0,'还是说',123.00,23.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b29fb3e4cecb.jpeg',NULL,'[10.28,8.9,7.62,0.86,3.24,16.39,2.93,3.96,39.68,6.14]',8,NULL,NULL,NULL),(10,1,9,1529487418,0,0,'哈哈哈',100.00,50.00,'http://zxy.mynatapp.cc/Uploads/Product/2018-06-20/5b2a2017b399c.jpeg',NULL,'[4.66,45.34]',9,NULL,NULL,NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=164 DEFAULT CHARSET=utf8 COMMENT='券码表';

#
# Data for table "sj_voucher"
#

INSERT INTO `sj_voucher` VALUES (2,1,'hUvJU3kR',NULL,NULL),(3,2,'b6X89XrP',NULL,NULL),(4,2,'dUwpuPC',NULL,NULL),(6,3,'QwuyfPR7',NULL,NULL),(7,4,'2ZZFQF4D',NULL,NULL),(8,4,'7UQhBfDs',NULL,NULL),(9,4,'RQh82D5C',NULL,NULL),(10,4,'NYmeqczs',NULL,NULL),(11,4,'Nx6Jrkt9',NULL,NULL),(12,4,'hFG5aRbj',NULL,NULL),(13,4,'YBEXQWDd',NULL,NULL),(14,4,'hSh5frGP',NULL,NULL),(15,4,'MMRqGwu',NULL,NULL),(16,4,'pZaq86yX',NULL,NULL),(18,5,'ab1zdxU0',NULL,NULL),(19,5,'crFtGD0',NULL,NULL),(20,5,'QFbS7Sys',NULL,NULL),(21,5,'TM1tdwMG',NULL,NULL),(22,5,'hSRzUwuU',NULL,NULL),(23,5,'eZMKTP36',NULL,NULL),(24,5,'pLRbrLC',NULL,NULL),(25,5,'bht0nZQD',NULL,NULL),(26,5,'cgaKDPy3',NULL,NULL),(27,6,'zrjfGQ4U',NULL,NULL),(28,6,'EqU0K1q2',NULL,NULL),(29,6,'keYnSZx',NULL,NULL),(30,6,'med3q17W',NULL,NULL),(31,6,'cwMkBCx2',NULL,NULL),(32,6,'L8QM8cn',NULL,NULL),(33,6,'sFyJ7F2',NULL,NULL),(34,6,'k8cHqJH',NULL,NULL),(35,6,'aqYCySkz',NULL,NULL),(36,6,'YGLbYx2z',NULL,NULL),(37,7,'epGuGYM0',NULL,NULL),(38,7,'Z56JwYGv',NULL,NULL),(39,7,'zb790KjH',NULL,NULL),(40,7,'ypDMKSL',NULL,NULL),(41,7,'bXLe4GP7',NULL,NULL),(42,7,'rEVjjsZG',NULL,NULL),(43,7,'w1cELqeK',NULL,NULL),(44,7,'jTw40hbF',NULL,NULL),(45,7,'jZ20TK4',NULL,NULL),(46,7,'535kDfF9',NULL,NULL),(47,7,'0rZk3bLF',NULL,NULL),(48,7,'KxrBRzwS',NULL,NULL),(49,7,'M4uJ3mde',NULL,NULL),(50,7,'ruTZffXq',NULL,NULL),(51,7,'dKPsB9HN',NULL,NULL),(52,7,'NRfmnqn0',NULL,NULL),(53,7,'XQTWH1dW',NULL,NULL),(54,7,'awdDJGUd',NULL,NULL),(55,7,'6npuBTW1',NULL,NULL),(56,7,'FQ3ZX0g9',NULL,NULL),(57,7,'sK4UTdUm',NULL,NULL),(58,7,'jTwgPB3T',NULL,NULL),(59,7,'Sk9Hae40',NULL,NULL),(60,7,'z82cVfG',NULL,NULL),(61,7,'68NU4Mck',NULL,NULL),(62,7,'2Sa79arH',NULL,NULL),(63,7,'hMKLvXku',NULL,NULL),(64,7,'2Jjfr5uH',NULL,NULL),(65,7,'Z9qx6GqG',NULL,NULL),(66,7,'46sqLcEw',NULL,NULL),(67,7,'DCmMp9Yg',NULL,NULL),(68,7,'EPhsb4qH',NULL,NULL),(69,7,'9fXSx9w5',NULL,NULL),(70,7,'whLVwe8b',NULL,NULL),(71,7,'kUUvkUKn',NULL,NULL),(72,7,'jnZ0umFN',NULL,NULL),(73,7,'J81Yf6ed',NULL,NULL),(74,7,'pGej0Pth',NULL,NULL),(75,7,'frP1Nbe2',NULL,NULL),(76,7,'53XPCfcS',NULL,NULL),(77,7,'t8MGWwSv',NULL,NULL),(78,7,'H2MPR1uB',NULL,NULL),(79,7,'wXwPFeR',NULL,NULL),(80,7,'4cMJXXYD',NULL,NULL),(81,7,'ULQugCDK',NULL,NULL),(82,7,'DDQgaTug',NULL,NULL),(83,7,'JFnvsnV4',NULL,NULL),(84,7,'MfCvr9cb',NULL,NULL),(85,7,'7jP3VPFq',NULL,NULL),(86,7,'hEDeV8NU',NULL,NULL),(87,7,'tPEUrS3h',NULL,NULL),(88,7,'9NWxe5r8',NULL,NULL),(89,7,'ExHcD7VG',NULL,NULL),(90,7,'HWheRHKu',NULL,NULL),(91,7,'FYDt8j9B',NULL,NULL),(92,7,'R4yxpUE9',NULL,NULL),(93,7,'8TXC9qWq',NULL,NULL),(94,7,'5NQrRTMS',NULL,NULL),(95,7,'qvs4XtgG',NULL,NULL),(96,7,'BzbW3zyk',NULL,NULL),(97,7,'sEr06Gv',NULL,NULL),(98,7,'sGjWJbyf',NULL,NULL),(99,7,'Y6NV6KFZ',NULL,NULL),(100,7,'k4ucWXH2',NULL,NULL),(101,7,'RZPnkDsM',NULL,NULL),(102,7,'wVeLs5B',NULL,NULL),(103,7,'828VbeF',NULL,NULL),(104,7,'MTBNUcGR',NULL,NULL),(105,7,'2XM1gmFB',NULL,NULL),(106,7,'CZqnfLEk',NULL,NULL),(107,7,'UFRZ78Y2',NULL,NULL),(108,7,'XwLXYhSa',NULL,NULL),(109,7,'Zzjd8egH',NULL,NULL),(110,7,'8umxKCPU',NULL,NULL),(111,7,'bW3KUXqq',NULL,NULL),(112,7,'twPKg8',NULL,NULL),(113,7,'0DR9wn9P',NULL,NULL),(114,7,'SMxBJ9Be',NULL,NULL),(115,7,'Sz2hkRyp',NULL,NULL),(116,7,'sCvFG7Kg',NULL,NULL),(117,7,'NhVvfUCu',NULL,NULL),(118,7,'CTHu3VEM',NULL,NULL),(119,7,'LJ0ZxDqu',NULL,NULL),(120,7,'8c5zCnQW',NULL,NULL),(121,7,'ygpZkWQD',NULL,NULL),(122,7,'C3hxDrdD',NULL,NULL),(123,7,'fpENMqNy',NULL,NULL),(124,7,'CvL74h0J',NULL,NULL),(125,7,'eDndqRs',NULL,NULL),(126,7,'xUH9FQcd',NULL,NULL),(127,7,'RPqD060h',NULL,NULL),(128,7,'RRU522e8',NULL,NULL),(129,7,'1C9GDTak',NULL,NULL),(130,7,'DYMfVeN',NULL,NULL),(131,7,'WmQgDp2P',NULL,NULL),(132,7,'52j88wer',NULL,NULL),(133,7,'pua60Mce',NULL,NULL),(134,7,'RBzpMyK4',NULL,NULL),(135,7,'9YHvtsUV',NULL,NULL),(136,7,'t9LC887',NULL,NULL),(137,7,'ZXe5LUj2',NULL,NULL),(138,7,'E5gahdxg',NULL,NULL),(139,7,'GcfxjrSs',NULL,NULL),(140,7,'DXjKFKpZ',NULL,NULL),(141,7,'541m1q0F',NULL,NULL),(142,7,'8cPyjxkY',NULL,NULL),(143,7,'VELWTNwZ',NULL,NULL),(144,7,'YYSUdZE',NULL,NULL),(145,7,'QcJxWeEh',NULL,NULL),(146,7,'mQzZK4K1',NULL,NULL),(147,7,'PaPqk495',NULL,NULL),(148,7,'NUGad66p',NULL,NULL),(149,7,'YsgSZ2cp',NULL,NULL),(150,7,'5EY04h2t',NULL,NULL),(151,7,'Qqs1J7t',NULL,NULL),(152,7,'90vT7nVM',NULL,NULL),(153,7,'1ZPgJqkw',NULL,NULL),(154,7,'GtqbK4ag',NULL,NULL),(155,7,'Q3PwYFd',NULL,NULL),(156,7,'GhP83yty',NULL,NULL),(157,7,'tJ4KW3bF',NULL,NULL),(158,7,'D4aWLqKM',NULL,NULL),(159,8,'46YScDcE',NULL,NULL),(160,8,'qKk2DN6v',NULL,NULL),(161,8,'NNuCnx',NULL,NULL),(162,9,'HhyunhTR',NULL,NULL),(163,9,'0B2sLddQ',NULL,NULL);
