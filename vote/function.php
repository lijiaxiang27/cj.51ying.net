<?php
@header("Content-type: text/html; charset=utf-8");
require_once('../common/session_helper.php');
if (isset($_SESSION['openid']) && $_SESSION['openid'] == true) {
    $openid = $_SESSION['openid'];
} else {
    echo "<script>window.location='error.php';</script>";
}
include('isweixin.php');
include("db.php");
if (isset($_GET['do'])) {
    $do = $_GET['do'];
} else {
    die("invild action");
}
switch ($do) {
    case "vote":
        vote();
        break;
}
//投票功能
function vote()
{
    global $xuanzezu;
    $id = $_POST['voteid'];
    $openid = $_SESSION['openid'];
    if ($xuanzezu['votecannum'] != count($id)) {
        echo "<script>alert('对不起，请投" . $xuanzezu['votecannum'] . "票！');location.href='index.php';</script>";
        die;
    }
    $flag_m=new M('flag');
    $vote_check=$flag_m->find("`openid` = '{$openid}'");
    if ($vote_check['vote'] != 0 || $vote_check <= 0) {
        echo "<script>alert('您已经投过票了！');location.href='index.php';</script>";
        die;
    }
    $idvalues = implode(",", $id);
    $succed=$flag_m->update("`openid` = '{$openid}'",array('vote'=>$idvalues));
    $vote_m=new M('vote');
    foreach ($id as $value) {
        $succed=$vote_m->update("`id` = '{$value}'","`res` =  `res`+1");
    }
    echo "<script>alert('恭喜，投票成功！');location.href='index.php';</script>";
}
?>