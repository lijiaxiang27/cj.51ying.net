<?php
include_once('../db.php'); //连接数据库 
include('../biaoqing.php');
$action = $_GET['action'];
$flag_m=new M('flag');
if ($action == "") { //读取数据，返回json
//     $male=$flag_m->select("(status=2 or status=1) and fakeid>0 and sex=1");
//     $female=$flag_m->select("(status=2 or status=1) and fakeid>0 and sex=2");
//     $unmale=$flag_m->select("(status=2 or status=1) and fakeid>0 and sex=0");
    
    $male=$flag_m->select("fakeid>0 and sex=1");
    $female=$flag_m->select("fakeid>0 and sex=2");
    $unmale=$flag_m->select("fakeid>0 and sex=0");
    foreach ( $male as $row1) {
        
//    while ($row1 = mysql_fetch_array($male)) {
        $row1['nickname'] = pack('H*', $row1['nickname']);
        $row1 = emoji_unified_to_html(emoji_softbank_to_unified($row1));
        $arr_male[] = array(
            'id' => $row1['id'],
            'avatar' => $row1['avatar'],
            'nickname' => $row1['nickname'],
        );
    }
    foreach ( $female as $row2) {
//    while ($row2 = mysql_fetch_array($female)) {
        $row2['nickname'] = pack('H*', $row2['nickname']);
        $row2 = emoji_unified_to_html(emoji_softbank_to_unified($row2));
        $arr_female[] = array(
            'id' => $row2['id'],
            'avatar' => $row2['avatar'],
            'nickname' => $row2['nickname'],
        );
    }
    $arr[0] = $arr_male;
    $arr[1] = $arr_female;
    echo json_encode($arr);
} else if ($action == "reset") {
    $flag_m->update('1',array('othid'=>0));
//    $sqll2 = "update weixin_flag set othid=0";
//    $queryy2 = mysql_query($sqll2);
    $queryy=$flag_m->update('status=3',array('status'=>2));
//    $sqll = "update weixin_flag set status=2 where status=3";
//    $queryy = mysql_query($sqll);
    if ($queryy)
        echo '2';
} else if ($action == "ready") {
    $male=$flag_m->find('(status=2 or status=1) and fakeid>0 and sex=1','*','count');
//    $male = mysql_query("select count(*) from weixin_flag where (status=2 or status=1) and fakeid>0 and sex=1");
//    $row1 = mysql_fetch_row($male);
    $female=$flag_m->find('(status=2 or status=1) and fakeid>0 and sex=2','*','count');
//    $female = mysql_query("select count(*) from weixin_flag where (status=2 or status=1) and fakeid>0 and sex=2");
//    $row2 = mysql_fetch_row($female);
    $arr[0] =$male;// $row1[0];
    $arr[1] =$female;// $row2[0];
    $arr[2] = $male + $female;
    echo json_encode($arr);
} else { //标识中奖号码
    $id = $_POST['id'];
    $toid = $_POST['toid'];
    $query=$flag_m->update("id=$id",array('status'=>3,'othid'=>$toid));
//    $sql = "update weixin_flag set status=3,othid=$toid where id=$id";
//    $query = mysql_query($sql);
    if ($query) {
        $query=$flag_m->update("id=$toid",array('status'=>3,'othid'=>$id));
//        $sql = "update weixin_flag set status=3,othid=$id where id=$toid";
//        $query = mysql_query($sql);
        if ($query)
            echo '1';
    }
}

?>