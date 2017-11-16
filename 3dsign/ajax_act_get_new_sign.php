<?php
include(dirname(__FILE__) . '/../common/db.class.php');
include("../wall/biaoqing.php");
$maxid=$_GET['maxid'];
$flag_m=new M('flag');
//签到名单
$signpeople=$flag_m->select('flag = 2 and id > '.$maxid.' order by id desc  limit 30');
foreach($signpeople as $k=>$v){
	$v['nickname']=pack('H*', $v['nickname']);
	$v['content']=pack('H*', $v['content']);
	$signpeople[$k]= emoji_unified_to_html(emoji_softbank_to_unified($v));
}
if(count($signpeople)>0){
	echo '{"error":1,"people":'.json_encode($signpeople).',"maxid":'.$signpeople[0]['id'].'}';
}else{
	echo '{"error":-1}';
}