<?php
@header("Content-type: text/html; charset=utf-8");
include(dirname(__FILE__) . '/../common/db.class.php');
include("../wall/biaoqing.php");
$wall_config_m = new M('wall_config');
$weixin_config_m=new M('weixin_config');
$weixin_config=$weixin_config_m->find('1');
$wall_config = $wall_config_m->find('1');
define("Web_ROOT", $wall_config['web_root']);
$flag_m=new M('flag');
//签到名单
$signpeople=$flag_m->select('flag = 2 order by id desc  limit 30');
$peoplelist=array();
foreach($signpeople as $k=>$v){
	$v['nickname']=pack('H*', $v['nickname']);
	$v['content']=pack('H*', $v['content']);
	$signpeople[$k]= emoji_unified_to_html(emoji_softbank_to_unified($v));
}
$maxid=0;
if(count($signpeople)>0){
	$maxid=$signpeople[0]['id'];
}
$signtext=$wall_config['signtext'];
$signlogoimg=$wall_config['signlogoimg'];
$qrcode=$weixin_config['erweima'];
$background=$wall_config['custom3dbg'];
$weixinname=$weixin_config['nickname'];
require('themes/advanced/index.php');