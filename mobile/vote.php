<?php
require_once('../common/db.class.php');
$apppath=str_replace(DIRECTORY_SEPARATOR.'mobile', '', dirname(__FILE__));
require_once('common.php');
$openid=$_GET['rentopenid'];
//投票相关系统配置
$wall_config_m=new M('wall_config');
$wall_config=$wall_config_m->find(1);

$flag_m=new M('flag');
$myinfo=$flag_m->find('rentopenid="'.$openid.'"');
$myinfo['nickname']=pack('H*', $myinfo['nickname']);
$myinfo['datetime']=date('Y-m-d H:i:s',$myinfo['datetime']);
//投票项信息
$vote_m=new M('vote');
$sum= $vote_m->find('1','res','sum');
$sum=$sum==0?1:$sum;

$votedata=$vote_m->select('1 order by res desc');

//与个人相关的投票信息


//模版页面相关内容
require_once('../smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->compile_dir = $apppath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'templates_c'.DIRECTORY_SEPARATOR;
$controls=array('qd','wall','vote','lottory','shake','redpack');
$smarty->assign('openid',$openid);
$smarty->assign('user',$myinfo);
$smarty->assign('votetitle',$wall_config['votetitle']);
$smarty->assign('votenums',$wall_config['votecannum']);
$smarty->assign('votedata',$votedata);
$smarty->assign('total',$sum);
$weixin_config_m=new M("weixin_config");
$weixin_config=$weixin_config_m->find('1');
$smarty->assign('erweima',$weixin_config['erweima']);

$smarty->assign('xianchang',array('controls'=>$controls));
$smarty->display('template/app_header.html');
$smarty->display('template/app_vote.html');
$smarty->display('template/app_footer.html');