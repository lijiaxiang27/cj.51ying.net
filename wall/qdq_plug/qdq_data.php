<?php
include_once('../db.php'); //连接数据库 
include('../biaoqing.php');
$lastperid = $_REQUEST['lastperid'];
$action = $_GET['action'];
$flag_m=new M('flag');
$wall_config_m = new M('wall_config');
$wall_config=$wall_config_m->find('1');

if ($action == "") { //读取数据，返回json
    $maxid=$flag_m->find("flag = 2 and fakeid>0 order by id asc",'id','max');
    if ($maxid > $lastperid) {
        $person=$flag_m->select(' flag = 2 and fakeid>0 order by id asc');
        foreach ($person as $row1) {
            $row1['nickname'] = pack('H*', $row1['nickname']);
            $row1 = emoji_unified_to_html(emoji_softbank_to_unified($row1));
            if($wall_config['name_switch']==1 && $wall_config['signnamestatus']==2){
                $row1['nickname']=$row1['signname']==''?'匿名':$row1['signname'];
            }
            if($wall_config['phone_switch']==1 && $wall_config['signnamestatus']==3){
                $row1['nickname']=$row1['phone'];
                if(strlen($row1['phone'])>7){
                    $row1['nickname']=substr_replace($row1['phone'],'****',3,4);
                }
            }   


            // $row1['nickname'] = pack('H*', $row1['nickname']);
            // $row1 = emoji_unified_to_html(emoji_softbank_to_unified($row1));
            $arr[] = array(
                'maxid' => $maxid,
                'id' => $row1['id'],
                'avatar' => $row1['avatar'],
                'nickname' => $row1['nickname'],
            );
        }
    } else {
        $arr[0]['id'] = 0;
    }
    echo json_encode($arr);
} else if ($action == "reset") {
    $queryy2=$flag_m->update('1',array('othid'=>0));
    $queryy=$flag_m->update('status=3',array('status'=>2));
    if ($queryy)
        echo '2';
} else if ($action == "ready") {
    $male=$flag_m->find('status=2  and fakeid>0 and sex=1','*','count');
    $female=$flag_m->find('status=2 and fakeid>0 and sex=2','*','count');
    $arr[0] =$male;// $row1[0];
    $arr[1] =$female;// $row2[0];
    $arr[2] = $male + $female;
    echo json_encode($arr);
} else { //标识中奖号码
    $id = $_POST['id'];
    $toid = $_POST['toid'];
    $query=$flag_m->update("id=$id",array('status'=>3,'othid'=>$toid));
    if ($query) {
        $query=$flag_m->update("id=$toid",array("status"=>3,"othid"=>$id));
        if ($query)
            echo '1';
    }
}

?>