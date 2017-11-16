<?php
require_once('../common/db.class.php');
$apppath=str_replace(DIRECTORY_SEPARATOR.'mobile', '', dirname(__FILE__));
require_once('common.php');
$openid=$_GET['rentopenid'];
$flag_m=new M('flag');
$myinfo=$flag_m->find('rentopenid="'.$openid.'"');
$controls=array('qd','wall','vote','lottory','shake','redpack');
//模版页面相关内容
require_once('../smarty/Smarty.class.php');
$smarty = new Smarty;
$smarty->debugging = false;
$smarty->caching = false;
$smarty->compile_dir = $apppath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'templates_c'.DIRECTORY_SEPARATOR;
if($myinfo['flag']==1){//没有签到
	$wall_config_m=new M('wall_config');
	$wall_config=$wall_config_m->find('1');
	$smarty->assign('wall_config',$wall_config);
	$smarty->assign('openid',$openid);
	$smarty->assign('user',$myinfo);
	
	$weixin_config_m=new M("weixin_config");
	$weixin_config=$weixin_config_m->find('1');
	$smarty->assign('erweima',$weixin_config['erweima']);
	
	$smarty->assign('xianchang',array('controls'=>$controls));
	//$smarty->display('template/app_header.html');
	$smarty->display('template/qiandao.html');
	//$smarty->display('template/app_footer.html');
}else{//完成签到
	$weixin_config_m=new M("weixin_config");
	$weixin_config=$weixin_config_m->find('1');
	$smarty->assign('erweima',$weixin_config['erweima']);
	
	##########################  用户排座 begin by lijiaxiang ###############################
    //查询用户是否排座
    $seat  = new M('user_seats');
    $where = 'openid="'.$openid.'" and status=1';
    //$data  = $seat ->find($where);
    $seats = $seat -> select($where);
	//$data  = json_encode($data);
	//var_dump(empty($data));die;
	//如果没有排位
    if (empty($seats)){
		//获取一个座位
		$get_seat = new M('seats');
        $seats = $get_seat -> select('status=0 limit 1');
		//var_dump($seats);die;
        //填充座位表
        $get_seat->update('id = '.$seats[0]['id'],['user_phone'=>$myinfo['phone'],'status'=>1]);
        $seats = $seat -> select($where);
    }
	//$smarty->assign('seat',$data);
    $smarty->assign('seats',json_encode($seats));

    ##########################  用户排座 end by lijiaxiang ###############################

	
	$myinfo['nickname']=pack('H*', $myinfo['nickname']);
	$myinfo['datetime']=date('Y-m-d H:i:s',$myinfo['datetime']);
	$smarty->assign('openid',$openid);
	$smarty->assign('user',$myinfo);
	$smarty->assign('xianchang',array('controls'=>$controls));
	$smarty->display('template/index.html');
	/*
	$smarty->display('template/app_header.html');
	$smarty->display('template/app_qd.html');
	$smarty->display('template/app_footer.html');
	*/
}



