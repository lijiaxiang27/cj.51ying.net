<?php
@header("Content-type: text/html; charset=utf-8");
require_once('../common/session_helper.php');
if (isset($_SESSION[ 'admin']) && $_SESSION['admin'] == true) {
} else {
    $_SESSION['admin'] = false;
    echo "<script>window.location='login.php';</script>";
    die;
}
include("db.php");
if (isset($_GET['do'])) {
    $do = $_GET['do'];
    @$cid = $_GET['cid'];
    @$config = $_GET['cof'];
} else {
    die("invild action");
}
switch ($do) {
    case "huati":
        huati();
        echo "<script>alert('话题已经修改！');location.href='sysset.php';</script>";
        break;
    case "signkeyword":
        signkeyword();
        echo "<script>alert('签到关键字修改！');location.href='sysset.php';</script>";
        break;
    case "huanying1":
        huanying1();
        echo "<script>alert('恭喜你，欢迎语1已经修改，请前往前台测试。');location.href='sysset.php';</script>";
        break;
    case "interval":
        interval();
        break;
    case "refreshtime":
        refreshtime();
        break;
    case "huanying2":
        huanying2();
        echo "<script>alert('恭喜你，欢迎语2已经修改，请前往前台测试。');location.href='sysset.php';</script>";
        break;
    case "success":
        success();
        echo "<script>alert('恭喜你，微信回复已经修改，请在微信进行测试。');location.href='sysset.php';</script>";
        break;
    case "field":
        field();
        echo "<script>alert('恭喜你，微信回复已经修改，请在微信进行测试。');location.href='sysset.php';</script>";
        break;
    //签到记录姓名和电话
    case 'nameswitch':
        nameswitch();
        break;
    case 'phoneswitch':
        phoneswitch();
        break;
    case "confswitch":
        confswitch();
        break;
    case "plugswitch":
        plugswitch();
        break;
    case "plugsconf":
        plugsconf();
        break;
    case "isshenghe":
        isshenghe();
        break;
    case "isfusion":
        isfusion();
        break;
    case "autopush":
        autopush();
        break;
    case "cjcondition":
        cjcondition();
        break;
    case "del":
        DoDelete();
        echo "<script>location.href='shenhe.php';</script>";
        break;
    case "shenhe":
        DoShenhe($cid);
        echo "<script>location.href='shenhe.php';</script>";
        break;
    case "cancelshenhe":
        cancelshenhe($cid);
        echo "<script>location.href='shenhe.php';</script>";
        break;
    case "toupiao":
        toupiao();
        break;
    case "changeconfig":
        changeconfig($config);
        break;
    //抽奖
    case "cj_verify":
        cj_verify();
        break;
    case "cj_award":
        cj_award();
        break;
    case "chongzhi":
        chongzhi();
        echo "<script>alert('操作成功，你的投票已经全部归位【0】！');location.href='vote.php';</script>";
        break;
    case "zengjian":

        zengjian();
        break;

    case "fasionconfig":
        fasionconfig();
        break;

    case "voteconfig":
        voteconfig();
        break;

    case "del_all":

        DoDel_all();

        echo "<script>alert('操作成功，你的微信墙已经焕然一新哦！');location.href='shenhe.php';</script>";

        break;


    case "del_vote":

        DoDel_vote();

        echo "<script>alert('操作成功，用户信息已全部清空，可重新录入！');location.href='shenhe.php';</script>";

        break;


    case "gaimi":

        gaimi();

        echo "<script>alert('操作成功，请您重新登陆！');location.href='shenhe.php';</script>";

        break;


    case "addmassage":

        addmassage();

        break;


//以下为摇一摇函数调用

    case "shake_title":

        shake_title();

        echo "<script>alert('摇一摇标题已经成功修改！');location.href='shake.php';</script>";

        break;


    case "endshake":

        endshake();

        echo "<script>alert('摇晃停止数量已经成功修改！');location.href='shake.php';</script>";

        break;


    case "show_num":

        show_num();

        echo "<script>alert('大屏幕显示数量已经成功修改！');location.href='shake.php';</script>";

        break;

    case "shake_ready":
        shake_ready();
        echo "<script>alert('恭喜！游戏初始化成功！');location.href='shake.php';</script>";
        break;

    case "shake_reset":
        shake_reset();
        echo "<script>alert('恭喜！摇一摇用户数据已全部清空！');location.href='shake.php';</script>";
        break;

    /*---
    以下为模拟登陆所需函数
    ---
    ---
    */
    case "monidetection":
        // monidetection();
        break;

    case "monilogin":
        monilogin();
        break;

    case "getimgcode":
        getimgcode();
        break;

    case "set_weixin_conf":
        set_weixin_conf();
        break;
    case "set_rentweixin_conf":
        set_rentweixin_conf();
        break;
    case "set_logo_conf":
        set_logo_conf();
        break;
    case "set_teacher_avatar_conf":
        set_teacher_avatar_conf();
        break;
    case "edit_teacher_avatar_conf":
        edit_teacher_avatar_conf();
        break;
    case "set_custombg_conf":
        set_custombg_conf();
        break;
    case "set_weibo_conf":
        set_weibo_conf();
        break;

    case "set_pinjie_logo_conf":
        set_pinjie_logo_conf();
        break;
    case "set_custom3dbg_conf":
        set_custom3dbg_conf();
        break;
    case "set_shakebg_conf":
        set_shakebg_conf();
        break;
//     case "set_autoreply":
//         set_autoreply();
//         break;
//     case "del_autoreply":
//         del_autoreply();
//         break;

    case "memcacheswitch":
        set_use_memcache();
        break;
    case "set_memcache_conf":
        set_memcache_conf();
        break;
    case "cjshownamestatus":
        cjshownamestatus();
        break;
    case "signnamestatus":
        signnamestatus();
        break;
}

function huati()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('huati' => $huati));
//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `huati` =  '$huati'";
//    mysql_query($sql_ht);
}

function signkeyword()
{
    $signkeyword = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('signkeyword' => $signkeyword));
//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `huati` =  '$huati'";
//    mysql_query($sql_ht);
}
function changeconfig($config)
{
    $value = rtrim($_POST['name'], '/');
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array($config => $value));

//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `$config` =  '$value'";
//    mysql_query($sql_ht);
    echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";
}

;


function interval()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('timeinterval' => $huati));
//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `timeinterval` =  '$huati'";
//    mysql_query($sql_ht);
    echo "<script>alert('恭喜！时间间隔已经修改成功！');history.go(-1);</script>";
}

function refreshtime()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('refreshtime' => $huati));

//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `refreshtime` =  '$huati'";
//    mysql_query($sql_ht);
    echo "<script>alert('恭喜！时间间隔已经修改成功！');history.go(-1);</script>";
}

function huanying1()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('huanying1' => $huati));

//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `huanying1` =  '$huati'";
//    mysql_query($sql_ht);
}


function huanying2()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('huanying2' => $huati));
//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `huanying2` =  '$huati'";
//    mysql_query($sql_ht);
}


function success()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('success' => $huati));

//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `success` =  '$huati'";
//    mysql_query($sql_ht);
}


function field()
{
    $huati = $_POST['name'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('field' => $huati));
//    $sql_ht = "UPDATE  `weixin_wall_config` SET  `field` =  '$huati'";
//    mysql_query($sql_ht);
}

function plugswitch()
{
    $cid = $_GET['cid'];
    $switchname = $_GET['switchname'];
    $plugs_m = new M('plugs');
    $plugs_m->update('`name`="'.$switchname.'"', array('switch' => $cid));

//    $sql_sh = "UPDATE  `weixin_plugs` SET  `switch` =  '$cid' where `name`='$switchname'";
//    mysql_query($sql_sh);

}

function plugsconf()
{
    global $config;
    $value = $_POST['name'];
    $plugs_m = new M('plugs');
    $plugs_m->update('`name`="'.$config.'"', array('keyword' => $value));

//    $sql_sh = "UPDATE  `weixin_plugs` SET  `keyword` =  '$value' where `name`='$config'";
//    mysql_query($sql_sh);
    echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";

}

function confswitch()
{
    $cid = $_GET['cid'];
    $switchname = $_GET['switchname'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array($switchname => $cid));

//    $sql_sh = "UPDATE  `weixin_wall_config` SET  `$switchname` =  '$cid'";
//    mysql_query($sql_sh);
}

function nameswitch()
{
    $cid = $_GET['cid'];
    $switchname = $_GET['switchname'];
    $wall_config_m = new M('wall_config');
    $flag = $wall_config_m->update("1", array($switchname => $cid));
}

//by hjy 2016.6.28
function phoneswitch()
{
    $cid = $_GET['cid'];
    $switchname = $_GET['switchname'];
    $wall_config_m = new M('wall_config');
    $flag = $wall_config_m->update('2=2', array($switchname => $cid));
}

function isshenghe()
{
    $cid = $_GET['cid'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('shenghe' => $cid));

//    $sql_sh = "UPDATE  `weixin_wall_config` SET  `shenghe` =  '$cid'";
//    mysql_query($sql_sh);
}


function autopush()
{
    $cid = $_GET['cid'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('cjreplay' => $cid));
}
function cjcondition(){
    $cid = $_GET['cid'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('cj_condition' => $cid));
}
function isfusion()
{
    $cid = $_GET['cid'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1=1', array('fusionopen' => $cid));
}

function DoShenhe($cid)
{
    // $wall_num_m = new M('wall_num');
    // $data = $wall_num_m->find();
    $num = $data['num'];
    $num=empty($num)?0:$num;
    $wall_m = new M('wall');
    $data = $wall_m->find('id=' . $cid);

    $fakeid = $data['fakeid'];
    $content = $data['content'];
    $datetime = $data['datetime'];
    $flag_m = new M('flag');
    $flag_m->update('`fakeid` = "'.$fakeid.'" and `status` !=  "1"', array('status' => '2', 'content' => $content, 'datetime' => $datetime));
    $query1 = $wall_m->update('`id` = "'.$cid.'"', array('ret' => '1', 'num' => $num));
    // if ($query1) {
    //     $wall_num_m->update('1=1', "`num` = `num`+1");
    // }
}
function cancelshenhe($cid){
    // $wall_num_m = new M('wall_num');
    // $data = $wall_num_m->find();
    $num = $data['num'];

    $wall_m = new M('wall');
    $data = $wall_m->find('id=' . $cid);

    $fakeid = $data['fakeid'];
    $content = $data['content'];
    $datetime = $data['datetime'];
    $flag_m = new M('flag');
    $flag_m->update('`fakeid` = "'.$fakeid.'" and `status` !=  "1"', array('status' => '2', 'content' => $content, 'datetime' => $datetime));
    $query1 = $wall_m->update('`id` = "'.$cid.'"', array('ret' => 0, 'num' => -1));
    // if ($query1) {
    //     $wall_num_m->update('1=1', "`num` = `num`-1");
    // }
}
function DoDelete()
{
    $cid = $_GET['cid'];
    $wall_m = new M('wall');
    $wall_m->delete('`id` = "'.$cid.'"');
}

function fasionconfig()
{
    $keyword = $_POST['fusionkeyword'];
    $url = $_POST['fusionurl'];
    $token = $_POST['fusiontoken'];
    if ($keyword != '') {
        $wall_config_m = new M('wall_config');
        $wall_config_m->update('1 =1 ', array('fusionkeyword' => $keyword, 'fusionurl' => $url, 'fusiontoken' => $token));
        echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";
    } else {
        echo "<script>alert('对不起，关键字不能为空，请返回配置！');history.go(-1);</script>";
    }
}

function voteconfig()
{
    $votetiltle = $_POST['votetiltle'];
    $voterefresht = $_POST['voterefresht'];
    $voteshowway = $_POST['voteshowway'];
    $votecannum = $_POST['votecannum'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update('1 =1', array('votecannum' => $votecannum, 'votetitle' => $votetiltle, 'votefresht' => $voterefresht, 'voteshowway' => $voteshowway));
    echo "<script>alert('恭喜!配置修改成功！');history.go(-1);</script>";
}

function toupiao()
{

    $name = $_GET['name'];
    $cid = $_GET['cid'];
    $vote_m = new M('vote');
    $vote_m->update('`id` = "'.$cid.'"', array('name' => $name));
    echo 1;

}


function zengjian()
{
    $cid = $_GET['cid'];
    $numdel = $_GET['numdel'];
    if ($cid == "2") {
        $vote_m = new M('vote');
        $vote_m->delete('`id` = "'.$numdel.'"');
        echo "1";
    } else if ($cid == "1") {
        $vote_m = new M('vote');
        $vote_m->add(array('name' => '微赢科技', 'res' => '0'));
        echo "<script>alert('操作成功，已经增加一项！');location.href='vote.php';</script>";
    }
}


function chongzhi()
{
    $vote_m = new M('vote');
    $vote_m->update('1=1', array('res' => 0));
    $flag_m = new M('flag');
    $flag_m->update('1=1', array('vote' => 0));
//    $sql = "UPDATE `weixin_flag` SET `vote` = '0'";
//    mysql_query($sql);
}


function DoDel_all()
{
    $wall_num_m = new M('wall_num');
    $wall_num_m->query("TRUNCATE TABLE weixin_wall");
    // $wall_num_m->update('1=1', array('num' => 1));
//    mysql_query("TRUNCATE TABLE weixin_wall");
//    mysql_query("UPDATE `weixin_wall_num` SET `num` = 1");
}


function DoDel_vote()
{
    $flag_m = new M('flag');
    $flag_m->query("TRUNCATE TABLE weixin_flag");
    $cookie_m = new M('cookie');
    $cookie_m->update("`id` = '1'", array('cookie' => '', 'token' => ''));
    // $wall_num_m = new M('wall_num');
    // $wall_num_m->update('1=1', array('lastmessageid' => 0));
//    mysql_query("TRUNCATE TABLE weixin_flag");
//    mysql_query("UPDATE `weixin_cookie` SET `cookie` =  '',`cookies` = '',`token` = '' WHERE `id` = '1'");
//    mysql_query("UPDATE `weixin_wall_num` SET `lastmessageid` = 0");
}


function gaimi()
{
    $user = $_POST['user'];
    $pwd = $_POST['pwd'];
    $admin_m = new M('admin');
    $admin_m->update("1 =1 ", array('user' => $user, 'pwd' => $pwd));
//    $sql_gm = "UPDATE `weixin_admin` SET `user` = '$user',`pwd` = '$pwd'";
//    mysql_query($sql_gm);
    session_start();
    unset($_SESSION['admin']);
}


function addmassage()
{

    $data = $_GET['data'];
    $nickname = bin2hex('系统公告');
    $data = bin2hex($data);
    $wall_m = new M('wall');
    $wall_m->add(array(
        'messageid' => 0,
        'fakeid' => 123,
        'num' => -1,
        'content' => $data,
        'nickname' => $nickname,
        'avatar' => '../img/0.jpg',
        'ret' => 0,
        'fromtype' => 'weixin',
        'image' => ''
    ));
//    $sql_add = "INSERT INTO `weixin_wall` (`id`,`messageid`,`fakeid`,`num`,`content`,`nickname`,`avatar`,`ret`,`fromtype`,`image`) VALUES (NULL,'0','123','-1','$data','$nickname','../img/0.jpg','0','weixin','')";
//    mysql_query($sql_add);
    $row = $wall_m->find(1, 'max(id) as id');
    $maxid = $row['id'];
//    $cidD = mysql_query('select id from `weixin_wall` WHERE id =(select max(id) from `weixin_wall`)');
//    $row = mysql_fetch_array($cidD, MYSQL_ASSOC);
//    $maxid = $row['id'];
    DoShenhe($maxid);
}

/**
 * 设置微博，微信参数
 * */
function set_weixin_conf()
{
//     if (!empty($_FILES['erweima']['type'])) {
//         require_once('../common/FileUploadFactory.php');
//         $fuf=new FileUploadFactory(SAVEFILEMODE);
//         $erweifile=$fuf->SaveFormFile($_FILES['erweima']);
//         //上传的文件
//         $_POST['erweima'] = $erweifile;
//     }
    $weixin_configc = new M('weixin_config');
    $save = $weixin_configc->update('id=1', $_POST);
    echo "<script>alert('微信墙已经配置成功！');history.go(-1);</script>";
}

//上传自定皮肤的背景图
function set_custombg_conf()
{
    if (!empty($_FILES['custombg']['type'])) {
        //上传的文件        
        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $file=$fuf->SaveFormFile($_FILES['custombg']);
        
        $wall_config_m = new M('wall_config');
        $data=array('bgimg'=>$file);
        $save = $wall_config_m->update('1', $data);
    }
    echo "<script>alert('微信墙自定义主题背景已经更换成功！');history.go(-1);</script>";
}

//上传logo
function set_logo_conf()
{
    if (!empty($_FILES['erweima']['type'])) {
    	if ("image/jpeg" != $_FILES['erweima']["type"] && "image/png" != $_FILES['erweima']["type"]) {
            echo "不能上传该文件格式";
            exit;
        }
        //上传的文件
        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $file=$fuf->SaveFormFile($_FILES['erweima']);
        $weixin_config_m = new M('weixin_config');
        $data=array('erweima'=>$file);
        $save = $weixin_config_m->update('1', $data);
    }
    echo "<script>alert('微信墙Logo已经配置成功！');history.go(-1);</script>";
}
//上传老师
function set_teacher_avatar_conf()
{
    if (!empty($_FILES['t_img']['type'])) {
        if ("image/jpeg" != $_FILES['t_img']["type"] && "image/png" != $_FILES['t_img']["type"]) {
            echo "不能上传该文件格式";
            exit;
        }
        $t_name = $_POST['t_name'];
        $t_introduce = $_POST['t_introduce'];
        //上传的文件
        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $file=$fuf->SaveFormFile($_FILES['t_img']);
        $teacher_m = new M('cvn_teacher');
        $data=array('t_img'=>$file,'t_name'=>$t_name,'t_introduce'=>$t_introduce);
        $save = $teacher_m->add($data);
    }
    echo "<script>alert('添加老师成功！');history.go(-1);</script>";
}
//修改老师
function edit_teacher_avatar_conf()
{
    if (!empty($_POST['t_img_edit'])){
        $t_img = $_POST['t_img_edit'];
    } else {
        if (!empty($_FILES['t_img']['type'])) {
            if ("image/jpeg" != $_FILES['t_img']["type"] && "image/png" != $_FILES['t_img']["type"]) {
                echo "不能上传该文件格式";
                exit;
            }
            //上传的文件
            require_once('../common/FileUploadFactory.php');
            $fuf=new FileUploadFactory(SAVEFILEMODE);
            $file=$fuf->SaveFormFile($_FILES['t_img']);
        }
    }
    $t_name = $_POST['t_name'];
    $t_introduce = $_POST['t_introduce'];
    $id = $_POST['id'];
    $teacher_m = new M('cvn_teacher');
    $data=array('t_img'=>$file,'t_name'=>$t_name,'t_introduce'=>$t_introduce);
    $where = " id= $id";
    $save = $teacher_m->update($where, $data);

//    if (!empty($_FILES['t_img']['type'])) {
//        if ("image/jpeg" != $_FILES['t_img']["type"] && "image/png" != $_FILES['t_img']["type"]) {
//            echo "不能上传该文件格式";
//            exit;
//        }
//        $t_name = $_POST['t_name'];
//        $t_introduce = $_POST['t_introduce'];
//        $id = $_POST['id'];
//        //上传的文件
//        require_once('../common/FileUploadFactory.php');
//        $fuf=new FileUploadFactory(SAVEFILEMODE);
//        $file=$fuf->SaveFormFile($_FILES['t_img']);
//        $teacher_m = new M('cvn_teacher');
//        $data=array('t_img'=>$file,'t_name'=>$t_name,'t_introduce'=>$t_introduce);
//        $where = " id= $id";
//        $save = $teacher_m->update($where, $data);
//    }
    echo "<script>alert('修改老师成功！');history.go(-1);</script>";
}
function set_custom3dbg_conf(){
    if (!empty($_FILES['custom3dbg']['type'])) {
        //上传文件
        /*** example usage ***/
        $filename = $_FILES['custom3dbg']['name'];
        $info = pathinfo($filename);


//        include('updata.php');
//        $file = updateimg($_FILES['logo_pj'], 'splatter-mask_1');
        
        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $file=$fuf->SaveFormFile($_FILES['custom3dbg']);
        
        $wall_config_m = new M('wall_config');
        $data=array('custom3dbg'=>$file);
        $save = $wall_config_m->update('1', $data);
    }

    echo "<script>alert('3D签到背景图已经配置成功！');history.go(-1);</script>";
}
//上传没有拼接logo by hjy 2016.1.25
function set_pinjie_logo_conf()
{

    if (!empty($_FILES['logo_pj']['type'])) {
        //上传文件
        /*** example usage ***/
        $filename = $_FILES['logo_pj']['name'];
        $info = pathinfo($filename);


//        include('updata.php');
//        $file = updateimg($_FILES['logo_pj'], 'splatter-mask_1');
        
        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $file=$fuf->SaveFormFile($_FILES['logo_pj']);
        
        $wall_config_m = new M('wall_config');
        $data=array('signlogoimg'=>$file);
        $save = $wall_config_m->update('1', $data);
    }

    echo "<script>alert('微信墙拼接Logo已经配置成功！');history.go(-1);</script>";
}
function set_shakebg_conf(){
    if (!empty($_FILES['logo_shakebg']['type'])) {
        //上传文件
        /*** example usage ***/
        $filename = $_FILES['logo_shakebg']['name'];
        $info = pathinfo($filename);

        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $file=$fuf->SaveFormFile($_FILES['logo_shakebg']);
        
//        include('updata.php');
//        $file = updateimg($_FILES['logo_shakebg'], 'shakebg');

        $wall_config_m = new M('wall_config');
        $data=array('shakebgimg'=>$file);
        $save = $wall_config_m->update('1', $data);
    }

    echo "<script>alert('摇一摇背景图已经配置成功！');history.go(-1);</script>";
}
function set_weibo_conf()
{
    if (empty($_POST['folllow'])) {
        $_POST['folllow'] = 0;
    }
    if (empty($_POST['mention'])) {
        $_POST['mention'] = 0;
    }
    if (empty($_POST['letter'])) {
        $_POST['letter'] = 0;
    }
    if (!empty($_FILES['erweima']['type'])) {
        //上传的文件
//        include('updata.php');
//        $erweifile = updateimg($_FILES['erweima'], 'weibo-ma');
        
        require_once('../common/FileUploadFactory.php');
        $fuf=new FileUploadFactory(SAVEFILEMODE);
        $erweifile=$fuf->SaveFormFile($_FILES['erweima']);
        
        $_POST['erweima'] = $erweifile;
        
        
    }
    file_get_contents("http://xbsslcurl.sinaapp.com/weiboapi/chengxml.php?token=" . $_POST['access_token']);
    $weixin_configc = new M('weibo_config');
    $save = $weixin_configc->update('id=1', $_POST);
    echo "<script>alert('微博墙已经配置成功！');history.go(-1);</script>";
}

//抽奖函数	
function cj_verify()
{
    $cid = $_GET['cid'];
    //file_get_contents(Web_ROOT . "/weixin/dianplu.php?action=cj&type=wins&tofakeid={$cid}");
    $flags = new M('flag');
    $flag = $flags->find('fakeid=' . $cid);
    $contant = '恭喜恭喜！此条为验证消息，您的获奖验证码是：【' . $cid . '】';
    if ($flag['fromtype'] == 'weibo') {
        $weibo_configs = new M('weibo_config');
        $weibo_config = $weibo_configs->find();
        include("../weibo/sendmessage.php");
        send($weibo_config['access_token'], $contant, $flag['openid']);
    }
    if ($flag['fromtype'] == 'weixin') {
        include("../weixin/sendmessage.php");
        sendmassage($flag['openid'], $contant);
    }

    echo "<script>alert('验证信息已经发送，请勿频繁发送！');location.href='cj.php';</script>";
}

function cj_award()
{
    $cid = $_GET['cid'];
    $flag_m = new M('flag');
    $flag_m->update('`id` = "'.$cid.'"', array('cjstatu' => 1));
    echo "<script>alert('奖品已发出！');location.href='cj.php';</script>";
}

/*以下为摇一摇函数*/
function shake_title()
{
    $name = $_POST['firstname'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update("1", array('acttitle' => $name));
}

function endshake()
{
    $name = $_POST['endnum'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update("1", array('endshake' => $name));
}


function show_num()
{
    $name = $_POST['shownum'];
    $wall_config_m = new M('wall_config');
    $wall_config_m->update("1", array('show_num' => $name));
}

function shake_ready()
{
    $datapath = str_replace("/myadmin", '/', dirname(__FILE__));
    $configpath = $datapath . '/data/memcache.php';
    require_once(dirname(__FILE__) . '/../common/CacheFactory.php');
    if (file_exists($configpath)) {
        require($configpath);
        if ($use_memcache == 1) {
            $mem = new CacheFactory('memcached'); //声明一个新的memcached链接
            // $mem->setOption(Memcached::OPT_COMPRESSION, false); //关闭压缩功能
            // $mem->setOption(Memcached::OPT_BINARY_PROTOCOL, true); //使用binary二进制协议
            // $mem->setOption(Memcached::OPT_TCP_NODELAY, true); //重要，php memcached有个bug，当get的值不存在，有固定40ms延迟，开启这个参数，可以避免这个bug
            // $mem->addServer($memcache_host,  $memcache_port); 
            $mem->clear_all();
        }
    }

    
    $fzz = new CacheFactory();
    $key='shake_status';
    $data=array('isopen'=>1,'endshake'=>$xuanzezu['endshake']);
    $fzz->set($key,$data,3600);


    // $wall_config_m = new M('wall_config');
    // $wall_config_m->update("1", array('isopen' => 1));

    $shake_toshake_m = new M('shake_toshake');
    $shake_toshake_m->update("1", array('point' => 0));
}


function shake_reset()
{

    $datapath = str_replace("/myadmin", '/', dirname(__FILE__));
    $configpath = $datapath . '/data/memcache.php';

    require_once(dirname(__FILE__) . '/../common/CacheFactory.php');
    
    if (file_exists($configpath)) {
        require($configpath);
        if ($use_memcache == 1) {
            $mem = new CacheFactory('memcached');  //声明一个新的memcached链
            $mem->clear_all();
        }
    }
    $shake_toshake_m = new M('shake_toshake');
    $shake_toshake_m->query("TRUNCATE TABLE weixin_shake_toshake");
    
    $fzz = new CacheFactory();
    $key='shake_status';
    $data=array('isopen'=>1,'endshake'=>$xuanzezu['endshake']);
    $fzz->set($key,$data,3600);
}

function set_rentweixin_conf()
{
    $params = $_POST;

    $data['appid'] = isset($params['appid']) ? strval($params['appid']) : '';
    $data['appsecret'] = isset($params['appsecret']) ? strval($params['appsecret']) : '';

    $wallconfigdata['rentweixin'] = isset($params['rentweixin']) ? intval($params['rentweixin']) : 0;
    $wall_configc=new M('wall_config');
    $wall_configc->update('1',$wallconfigdata);
    $weixin_configc = new M('weixin_config');
    $save = $weixin_configc->update('id=1', $data);
    echo "<script>alert('借用的微信配置已经设置完成！请确认在公众号后台已经做了相应设置');history.go(-1);</script>";
}

function set_use_memcache()
{
    $cid = $_GET['cid'];
    $datapath = str_replace("/myadmin", '/', dirname(__FILE__));
    $configpath = $datapath . '/data/memcache.php';
    if (file_exists($configpath)) {
        require($configpath);
        $fp=fopen($configpath,'w');
        if($fp){
            fwrite($fp,"<?php \r\n \$use_memcache=" . $cid . ';');
            if (isset($memcache_host)) {
                fwrite($fp,"\r\n \$memcache_host='" . $memcache_host . "';");
            }
            if (isset($memcache_port)) {
                fwrite($fp,"\r\n \$memcache_port='" . $memcache_port . "';");
            }
        }
        fclose($fp);
    } else {
        $data = "<?php \r\n \$use_memcache=" . $cid . ';';
        file_put_contents($configpath, $data);
    }
}

function  set_memcache_conf()
{
    $params = $_POST;
    $params['memcache_host'] = isset($params['memcache_host']) ? strval($params['memcache_host']) : '';
    $params['memcache_port'] = isset($params['memcache_port']) ? strval($params['memcache_port']) : '';
    $datapath = str_replace("/myadmin", '/', dirname(__FILE__));
    $configpath = $datapath . '/data/memcache.php';
    if (file_exists($configpath)) {
        require($configpath);
        $fp=fopen($configpath,'w');
        if($fp){

            fwrite($fp,"<?php \r\n \$use_memcache=" . $use_memcache . ';');
            if (!empty($params['memcache_host'])) {
                fwrite($fp,"\r\n \$memcache_host='" . $params['memcache_host'] . "';");
            }
            if (!empty($params['memcache_port'])) {
                fwrite($fp,"\r\n \$memcache_port='" . $params['memcache_port'] . "';");
            }
        }
        fclose($fp);
        echo "<script>alert('memcache配置完成');history.go(-1);</script>";
    } else {
        echo "<script>alert('memcache配置失败');history.go(-1);</script>";
    }

}

// function set_autoreply(){
//     $message=$_POST['message'];
//     $title=$_POST['title'];
//     $description=$_POST['description'];
//     $url=$_POST['url'];
//     $picurl='';
//     if (!empty($_FILES['picurl']['type'])) {
//         //上传的文件
//         require_once('../common/FileUploadFactory.php');
//         $fuf=new FileUploadFactory(SAVEFILEMODE);
//         $file=$fuf->SaveFormFile($_FILES['erweima']);
        
// //        include('updata.php');
// //        $file = updateimg($_FILES['picurl'], date("YmdHis").rand(0,9999));
        
//         $picurl = $file;
//     }
//     $autoreply_m=new M('autoreply');
//     $data['message']=$message;
//     $data['title']=$title;
//     $data['description']=$description;
//     $data['url']=$url;
//     $data['picurl']=$picurl;
//     $data['created_at']=time();
//     $autoreply_m->add($data);
//     echo "<script>alert('自动回复已经配置成功！');history.go(-1);</script>";
// }

// function del_autoreply(){
//     $id=$_POST['id'];
//     $autoreply_m=new M('autoreply');
//     $query=$autoreply_m->delete('id='.$id);
//     if($query){
//         echo 1;
//         return;
//     }else{
//         echo -1;
//         return;
//     }
// }

function cjshownamestatus(){
    $cjshownamestatus=intval($_GET['cjshownamestatus'])>0?intval($_GET['cjshownamestatus']):1;
    $wall_config=new M('wall_config');
    $data=array('cjshownamestatus'=>$cjshownamestatus);
    $query=$wall_config->update('1',$data);
    if($query){
        echo '{"error":1}';
    }else{
        echo '{"error":-1}';
    }
}
function signnamestatus(){
    $signnamestatus=intval($_GET['signnamestatus'])>0?intval($_GET['signnamestatus']):1;
    $wall_config=new M('wall_config');
    $data=array('signnamestatus'=>$signnamestatus);
    $query=$wall_config->update('1',$data);
    if($query){
        echo '{"error":1}';
    }else{
        echo '{"error":-1}';
    }
}