<?php
require_once('../common/db.class.php');
$apppath=str_replace(DIRECTORY_SEPARATOR.'mobile', '', dirname(__FILE__));
require_once('common.php');
$openid=$_GET['rentopenid'];
$flag_m=new M('flag');
$myinfo=$flag_m->find('rentopenid="'.$openid.'"');
//模版页面相关内容
require_once('../smarty/Smarty.class.php');
$smarty = new Smarty;
//TODO 关闭debug
$smarty->debugging = false;
$smarty->caching = false;
$smarty->compile_dir = $apppath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'templates_c'.DIRECTORY_SEPARATOR;
$controls=array('qd','wall','vote','lottory','shake','redpack');
$smarty->assign('openid',$openid);
$smarty->assign('user',$myinfo);
$smarty->assign('xianchang',array('controls'=>$controls));
$weixin_config_m=new M("weixin_config");
$weixin_config=$weixin_config_m->find('1');
$smarty->assign('erweima',$weixin_config['erweima']);
$smarty->display('template/app_header.html');
$smarty->display('template/app_wall.html');
$smarty->display('template/app_footer.html');