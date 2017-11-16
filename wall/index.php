<?php
require_once('../smarty/Smarty.class.php') ;
require_once('../common/http_helper.php');
require_once('../common/session_helper.php');

if (isset($_SESSION['views']) && $_SESSION['views'] == true) {
} else {
    $_SESSION['views'] = false;
    echo "<script>window.location='../wall/login.php?url=" . $_SERVER['PHP_SELF'] . "';</script>";
    die;
}

$style=getparams('style');
if (isset($style) && !empty($style)) {
    $style = $style;
} else {
    $style = "custom";
}
include('db.php');
// exit('系统更新测试中。。。');

$conf = $wall_config->find();
// exit('系统更新测试中。。。');
/**
 *
 * 以下为获取页面插件
 *
 * qdq_switch    tinyint(1) [0]
 * cj_switch    tinyint(1) [0]
 * ddp_switch    tinyint(1) [0]
 * */
$plugsc = new M('plugs');
$plugsa = $plugsc->select('switch =1');

foreach ($plugsa as $plugin) {
    if ($plugin['name'] == 'cj') {
        if (@file_exists("cjg_plug/cjg_html.php")) {
            $plugs['cjg'] = 1;
            $plugs['cj'] = 0;
        }
    }
    if (@file_exists($plugin['name'] . "_plug/" . $plugin['name'] . "_html.php")) {
        $plugs[$plugin['name']] = 1;
    }
}
$weixin = 1;
$flag = new M('weixin_config');
$weixinconf = $flag->find();
$weixin_name = $weixinconf['nickname'];
$dianplu_wxh = $weixinconf['nickname'];
$smarty = new Smarty;
// $smarty->debugging = true;
$smarty->caching = false;

$apppath=str_replace(DIRECTORY_SEPARATOR.'wall', '', dirname(__FILE__));
$smarty->compile_dir = $apppath.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'templates_c'.DIRECTORY_SEPARATOR;

$smarty->assign('config',$xuanzezu);

$smarty->assign('plugs',$plugs);
include 'style.php';
$smarty->assign('styles',$styles);

if(isset($plugs['vote']) && $plugs['vote']==1){
    $voteplug = $plugsc->find('name="vote"');
    $smarty->assign('voteplug',$voteplug);
}
 


$smarty->assign('weixin',$weixin);

$smarty->assign('dianplu_wxh',$dianplu_wxh);

$smarty->assign('weixinconf',$weixinconf);
$smarty->assign('style',$style);

$smarty->assign('lastid',getlastid());

$smarty->display('themes/'.$style.'/index.html');
//获取最后一条信息的id
function getlastid(){
    $wall_m=new M('wall');
    $row=$wall_m->find(' ret=1 order by id desc limit 1','id');
    if(isset($row['id'])){
        return intval($row['id']);
    }else{
        return 0;
    }
}
?>
