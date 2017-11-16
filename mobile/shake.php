<?php
require_once('../common/db.class.php');
$apppath=str_replace(DIRECTORY_SEPARATOR.'mobile', '', dirname(__FILE__));
require_once('common.php');
$openid=$_GET['rentopenid'];
$flag_m=new M('flag');
$myinfo=$flag_m->find('rentopenid="'.$openid.'"');
$myinfo['nickname']=pack('H*', $myinfo['nickname']);
$myinfo['datetime']=date('Y-m-d H:i:s',$myinfo['datetime']);
$shake_toshake_m=new M('shake_toshake');
$shake_toshake=$shake_toshake_m->find('wecha_id="'.$myinfo['openid'].'"');
if(!$shake_toshake){
	$data=array(
		'phone'=>bin2hex($myinfo['nickname']),
		'wecha_id'=>$myinfo['openid'],
		'point'=>0,
		'avatar'=>$myinfo['avatar']
	);
	$shake_toshake_m->add($data);
}
//模版页面相关内容
require_once('../smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->compile_dir = $apppath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'templates_c'.DIRECTORY_SEPARATOR;
$controls=array('qd','wall','vote','lottory','shake','redpack');
$smarty->assign('openid',$openid);
$smarty->assign('user',$myinfo);
$weixin_config_m=new M("weixin_config");
$weixin_config=$weixin_config_m->find('1');
$smarty->assign('erweima',$weixin_config['erweima']);

$smarty->assign('xianchang',array('controls'=>$controls));
$smarty->display('template/app_header.html');
$smarty->display('template/app_shake.html');
$smarty->display('template/app_footer.html');