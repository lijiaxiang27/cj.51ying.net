<?php
$datas = array();
//公众号相关
$datas[] = "
DROP TABLE IF EXISTS  `weixin_admin`;\n
CREATE TABLE `weixin_admin` (
`user` text NOT NULL,
`pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

DROP TABLE IF EXISTS  `weixin_cj_shady`;\n
CREATE TABLE `weixin_cj_shady` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL,
  `grade` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

DROP TABLE IF EXISTS  `weixin_cookie`;\n
CREATE TABLE `weixin_cookie` (
  `cookie` text NOT NULL,
  `cookies` text NOT NULL,
  `token` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;\n


DROP TABLE IF EXISTS  `weixin_flag`;\n
CREATE TABLE `weixin_flag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openid` varchar(255) NOT NULL,
  `flag` int(11) DEFAULT NULL,
  `vote` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `avatar` text,
  `content` text,
  `fakeid` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `othid` int(11) NOT NULL DEFAULT '0',
  `cjstatu` tinyint(4) NOT NULL DEFAULT '0',
  `datetime` int(10) DEFAULT NULL,
  `verify` varchar(4) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `shady` tinyint(2) NOT NULL DEFAULT '0',
  `cjgrade` tinyint(1) DEFAULT NULL,
  `fromtype` varchar(25) DEFAULT NULL,
  `rentopenid` varchar(28) DEFAULT NULL,
  `signname` varchar(32) NOT NULL DEFAULT '' COMMENT '签到记录的姓名',
  `cjtime` int(11) DEFAULT NULL COMMENT '中奖时间',
  `signorder` int(11) DEFAULT NULL COMMENT '签到顺序',
  PRIMARY KEY (`id`),
  UNIQUE KEY `openid` (`openid`),
  KEY `openid_2` (`openid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

DROP TABLE IF EXISTS  `weixin_log`;\n
CREATE TABLE `weixin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `echostr` mediumtext,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n

DROP TABLE IF EXISTS  `weixin_plugs`;\n
CREATE TABLE `weixin_plugs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `hasfiles` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `switch` tinyint(4) NOT NULL DEFAULT '0',
  `needword` tinyint(1) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

insert into `weixin_plugs`(`id`,`name`,`title`,`description`,`keyword`,`files`,`hasfiles`,`status`,`switch`,`needword`,`url`,`img`) values
('1','cj','抽奖','','查询','','0','0','1','0',null,null),
('2','qdq','签到墙','【签到】您已经成功签到！','签到墙','','0','0','1','0',null,null),
('3','ddp','对对碰','','对对碰','','0','0','1','0',null,null),
('4','vote','投票','【投票】参与投票请回复【~~[keyword]~~】','投票','vote.ext','1','0','1','1','vote/index.php','vote/images/vote.jpg'),
('5','shake','摇一摇','【摇一摇】参与摇一摇请回复【~~[keyword]~~】','摇一摇','shake.ext','1','0','1','1','shake/mobile/index.php','shake/images/shake.jpg');\n


DROP TABLE IF EXISTS  `weixin_shake_toshake`;\n
CREATE TABLE `weixin_shake_toshake` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) NOT NULL,
  `wecha_id` varchar(255) NOT NULL,
  `point` int(11) NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `wecha_id` (`wecha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

DROP TABLE IF EXISTS  `weixin_vote`;\n
CREATE TABLE `weixin_vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `res` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `res` (`res`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

insert into `weixin_vote`(`id`,`name`,`res`) values
('1','微信上墙','0'),
('2','图片上墙','0'),
('3','签到墙','0'),
('4','抽奖','0'),
('5','摇一摇','0'),
('6','对对碰','0'),
('7','拍拍乐','0');\n

DROP TABLE IF EXISTS  `weixin_wall`;\n
CREATE TABLE `weixin_wall` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `messageid` varchar(255) DEFAULT NULL,
  `fakeid` varchar(255) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `content` text,
  `nickname` text,
  `avatar` text,
  `ret` int(11) DEFAULT NULL,
  `fromtype` varchar(255) DEFAULT NULL,
  `image` text,
  `datetime` int(10) DEFAULT NULL,
  `openid` varchar(32) DEFAULT NULL COMMENT '发送人的openid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

DROP TABLE IF EXISTS  `weixin_wall_config`;\n
CREATE TABLE `weixin_wall_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `success` text NOT NULL COMMENT '消息发送成功但是没有审核时的提醒信息，自由手动审核才用这句',
  `acttitle` text NOT NULL COMMENT '摇一摇标题',
  `isopen` int(1) NOT NULL COMMENT '摇一摇状态',
  `endshake` int(11) NOT NULL COMMENT '要多少下结束摇一摇',
  `show_num` int(11) NOT NULL COMMENT '显示前几名摇一摇的人',
  `shenghe` int(11) NOT NULL COMMENT '0自动审核1手动审核',
  `cjreplay` tinyint(4) NOT NULL DEFAULT '0' COMMENT '中奖是否需要回复',
  `timeinterval` int(3) NOT NULL,
  `shakeopen` tinyint(4) NOT NULL DEFAULT '1' COMMENT '摇一摇开关',
  `voteopen` tinyint(4) NOT NULL DEFAULT '1' COMMENT '投票开关',
  `votetitle` text NOT NULL COMMENT '投票标题',
  `votefresht` tinyint(4) NOT NULL COMMENT '投票结果刷新时间',
  `circulation` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否循环播放',
  `refreshtime` tinyint(2) NOT NULL,
  `voteshowway` tinyint(1) DEFAULT '1' COMMENT '投票结果显示方式',
  `votecannum` varchar(255) DEFAULT '1' COMMENT '每个人可以投几票',
  `black_word` text COMMENT '屏蔽关键字',
  `cj_switch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '抽奖开关',
  `cj_condition` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1表示需要上墙2表示签到即可',
  `ddp_switch` tinyint(1) NOT NULL DEFAULT '0' COMMENT '对对碰开关',
  `web_root` varchar(255) NOT NULL COMMENT '网站根目录域名',
  `screenpaw` varchar(255) NOT NULL COMMENT '开场密码',
  `shady_switch` tinyint(1) NOT NULL DEFAULT '0',
  `qiandao_switch` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1手机号签到2签到页面签到',
  `rentweixin` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0不借用其他微信号获取用户信息1借用其他微信服务号获取用户信息',
  `name_switch` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1记录姓名2不记录',
  `phone_switch` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1记录手机号2不记录',
  `signnamestatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示显示昵称2显示姓名3显示手机号，后面2个值只能在开启记录手机号和姓名时才会有效',
  `cjshownamestatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1显示微信昵称2显示真实姓名3显示手机号',
  `bgimg` varchar(255) DEFAULT NULL COMMENT '背景图',
  `logoimg` varchar(255) DEFAULT NULL COMMENT '左上角logo图',
  `signlogoimg` varchar(255) DEFAULT NULL COMMENT '签到logo',
  `shakebgimg` varchar(255) DEFAULT NULL COMMENT '摇一摇背景图',
  `copyright` varchar(32) DEFAULT NULL COMMENT '版权',
  `copyrightlink` varchar(500) DEFAULT NULL COMMENT '版权连接',
  `custom3dbg` varchar(255) DEFAULT NULL COMMENT '3d签到背景图',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

insert into `weixin_wall_config`(`id`,`success`,`acttitle`,`isopen`,`endshake`,`show_num`,`shenghe`,`cjreplay`,`timeinterval`,`shakeopen`,`voteopen`,`votetitle`,`votefresht`,`circulation`,`refreshtime`,`voteshowway`,`votecannum`,`black_word`,`cj_switch`,`cj_condition`,`ddp_switch`,`web_root`,`screenpaw`,`shady_switch`,`qiandao_switch`,`rentweixin`,`name_switch`,`phone_switch`,`signnamestatus`,`cjshownamestatus`,`bgimg`,`logoimg`,`signlogoimg`,`shakebgimg`,`copyright`,`copyrightlink`,`custom3dbg`) values
('1','你已经成功发送，等待审核通过即可上墙了','摇一摇','1','150','10','0','0','3','1','1','你最喜欢微信墙的哪个功能？','5','0','3','2','1','操,sb,傻逼,艹,日你妈,干你妹,老子,bitch,婊子','1','2','1','http://xc.wxmiao.com','admin','0','1','2','1','1','1','1','/files/images/bg.jpg','/files/images/logo.png','/files/images/signlogo.png','/files/images/shakebg.jpg','微赢科技','http://www.veiying.com','');\n

DROP TABLE IF EXISTS  `weixin_wall_num`;\n
CREATE TABLE `weixin_wall_num` (
  `num` int(11) NOT NULL,
  `lastmessageid` varchar(255) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

insert into `weixin_wall_num`(`num`,`lastmessageid`) values
('1','0');\n

DROP TABLE IF EXISTS  `weixin_weixin_config`;\n
CREATE TABLE `weixin_weixin_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL COMMENT '微信名称',
  `erweima` varchar(255) NOT NULL COMMENT '二维码',
  `appid` varchar(64) DEFAULT NULL COMMENT '微信appid',
  `appsecret` varchar(128) DEFAULT NULL COMMENT '微信appsecret',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;\n

insert into `weixin_weixin_config`(`id`,`nickname`,`erweima`,`appid`,`appsecret`) values
('1','FY','http://xc.wxmiao.com/data/pic/pic_1496846123.png','wx6e4c7c28f4ad4123','e91bd7c0255d5696499934db1f236123');\n


DROP TABLE IF EXISTS  `weixin_zjlist`;\n
CREATE TABLE `weixin_zjlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `fromplug` varchar(32) DEFAULT NULL COMMENT '来自哪个插件的中奖信息',
  `status` tinyint(1) DEFAULT NULL COMMENT '中奖状态',
  `fjdatetime` int(11) DEFAULT NULL COMMENT '发奖时间',
  `wecha_id` varchar(64) DEFAULT NULL COMMENT '微信openid',
  `info` varchar(1000) DEFAULT NULL COMMENT '序列化的中奖者信息',
  `zjdatetime` int(11) DEFAULT NULL COMMENT '中奖时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='中奖者信息表';\n

DROP TABLE IF EXISTS  `weixin_sessions`;\n
CREATE TABLE `weixin_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '0',
  `user_agent` varchar(200) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;\n

SET FOREIGN_KEY_CHECKS = 1;\n
";
$dat = array();
$dat['datas'] = $datas;
return $dat;