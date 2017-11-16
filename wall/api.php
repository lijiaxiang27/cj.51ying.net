<?php
@header("Content-type: text/html; charset=utf-8");
if (ob_get_contents()) ob_end_clean();
include('biaoqing.php');
include("db.php");
$lastid = $_REQUEST['lastid'];
$num = $lastid + 1;
//不循环播放
if(!$xuanzezu['circulation']){
    // echo 1;
    $messagelist=GetWallMessage($num,100);
    //有数据
    if($messagelist){
        // echo 2;
        foreach($messagelist as $k=>$message){
            $message['nickname']=pack('H*', $message['nickname']);
            $message['content']=pack('H*', $message['content']);
            $message = emoji_unified_to_html(emoji_softbank_to_unified($message));
            $message['content']=biaoqing($message['content']);
            $messagelist[$k]=$message;
        }
        $msg=array("data" => $messagelist, "ret" => 1,"count"=>count($messagelist),'loop'=>-1);
        echo trim(json_encode($msg));
        return;
    }else{//没有数据
        // echo 3;
        $msg = array("data" => array(), "ret" => -1,"count"=>0,'loop'=>-1);
        echo trim(json_encode($msg));
        return;
    }
}else{//循环播放模式
    $messagelist=GetWallMessage($num,100);
    if(!$messagelist){//没有数据
        // $start=$num-50<0?1:($num-50);
        $end=$num-1<0?1:($num-1);
        $rand_num=rand(1,$end);
        $messagelist=GetWallMessage($rand_num,1);
        foreach($messagelist as $k=>$message){
            $message['nickname']=pack('H*', $message['nickname']);
            $message['content']=pack('H*', $message['content']);
            $message = emoji_unified_to_html(emoji_softbank_to_unified($message));
            $message['content']=biaoqing($message['content']);
            $messagelist[$k]=$message;
        }
        $msg = array("data" => $messagelist, "ret" => 1,"count"=>count($messagelist),'loop'=>1);
        echo trim(json_encode($msg));
        return; 
    }
    foreach($messagelist as $k=>$message){
        $message['nickname']=pack('H*', $message['nickname']);
        $message['content']=pack('H*', $message['content']);
        $message = emoji_unified_to_html(emoji_softbank_to_unified($message));
        $message['content']=biaoqing($message['content']);
        $messagelist[$k]=$message;
    }
    $msg = array("data" => $messagelist, "ret" => 1,"count"=>count($messagelist),'loop'=>1);
    echo trim(json_encode($msg));
    return;
}



function GetWallMessage($lastid,$limit=100){
    $wall_m=new M('wall');
    $data=$wall_m->select('id >= '.$lastid.' and ret=1 order by id asc limit '.$limit);
    return $data;
}
?>