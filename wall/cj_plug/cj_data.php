<?php
require_once('../../common/function.php');
require_once('../../common/http_helper.php');
include_once('../db.php'); //连接数据库 
include('../biaoqing.php');
$action = $_GET['action'];
$shady = $_GET['shady']; 
$flag_m=new M('flag');
$wall_config_m = new M('wall_config');
$wall_config=$wall_config_m->find('1');

if ($action == "reset") {
    $queryy=$flag_m->update('status=1',array('status'=>2,'cjgrade'=>0,'cjtime'=>0));
    if ($queryy)
        echo '2';
} else if ($action == "ready") {
    $pagesize=150;
    // echo var_export($pagesize);
    if($wall_config['cj_condition']==2){
        $flag_count=$flag_m->find('flag>1 and status!=1 and fakeid>0 and (shady=0 or shady='.$shady.')','count(0) cnt');

        //作弊数据
        $flagshadydata=$flag_m->select('flag>1 and status!=1 and fakeid>0 and shady='.$shady);

        $flagshadydata_count=count($flagshadydata);
        $count=$flag_count['cnt']-$flagshadydata_count;
        // echo $flagshadydata_count;
        $pagesize=$pagesize-$flagshadydata_count;
        $start=startindex($count,$pagesize);
        //不作弊数据
        // echo $start.'@'.$pagesize.'@1';
        $flagdata=$flag_m->select('flag>1 and status!=1 and fakeid>0 and shady=0  limit '.$start.','.$pagesize);
        $flagdata=array_merge($flagdata,$flagshadydata);
    }else{
        $flag_count=$flag_m->find('(status=2 or status=3) and fakeid>0 and (shady=0 or shady='.$shady.')','count(0)  cnt');
        //作弊数据
        $flagshadydata=$flag_m->select('(status=2 or status=3) and fakeid>0 and shady='.$shady);
        $flagshadydata_count=count($flagshadydata);
        // echo $flagshadydata_count;
        $pagesize=$pagesize-$flagshadydata_count;
        $count=$flag_count['cnt']-$flagshadydata_count;
        $start=startindex($count,$pagesize);
        //不作弊数据
         // echo $start.'@'.$pagesize.'@1';
        $flagdata=$flag_m->select('(status=2 or status=3) and fakeid>0 and shady=0 limit '.$start.','.$pagesize);
        $flagdata=array_merge($flagdata,$flagshadydata);
    }
    
    // $flagdata=$flag_m->select('flag>1 and status!=1 and fakeid>0 and (shady=0 or shady='.$shady.')');
    $cj_shady_m=new M('cj_shady');
    // if()
    
    foreach($flagdata as $row1){
        $row1['nickname'] = pack('H*', $row1['nickname']);
        $row1 = emoji_unified_to_html(emoji_softbank_to_unified($row1));
        if($wall_config['name_switch']==1 && $wall_config['cjshownamestatus']==2){
            $row1['nickname']=$row1['signname'];
        }
        if($wall_config['phone_switch']==1 && $wall_config['cjshownamestatus']==3){
            $row1['nickname']=$row1['phone'];
            if(strlen($row1['phone'])>7){
                $row1['nickname']=substr_replace($row1['phone'],'****',3,4);
            }
        }   

        $arr[] = array(
            'id' => $row1['id'],
            'avatar' => $row1['avatar'],
            'nickname' => $row1['nickname'],
            'from' => $row1['fromtype'],
            'shady'=>$row1['shady']
        );
    }
    // echo var_export($arr);
    // exit();
    $result_arr=array('count'=>$flag_count['cnt'],'data'=>$arr);
    echo json_encode($result_arr);
} else if ($action == "ok") { //标识中奖号码
    $id = $_POST['id'];
    $grade=isset($_POST['grade'])?intval($_POST['grade']):0;
    $flag_m->update("id=$id",array('status'=>1,'cjstatu'=>0,'cjgrade'=>$grade,'cjtime'=>time()));
    if (intval($xuanzezu['cjreplay'])>0) {
        $row2=$flag_m->find("id = $id");
        $contant = '恭喜恭喜！请按照主持人的提示，到指定地点领取！您的兑换码是：【' . $row2['fakeid'] . '】';
        if ($row2['fromtype'] == 'weibo') {
            $weibo_configs = new M('weibo_config');
            $weibo_config = $weibo_configs->find();
        }
        if ($row2['fromtype'] == 'weixin') {
            require_once('../../common/weixin_helper.php');
            $weixinconf = getWeixinConf();
            $baseaccesstoken=getbaseaccess_token($weixinconf['appid'],$weixinconf['appsecret']);
            // $baseaccesstokeninfo=json_decode($baseaccesstoken);
            $contant = '恭喜恭喜！请按照主持人的提示，到指定地点领取！您的兑换码是：【' . $row2['fakeid'] . '】';
            sendmessage($row2['openid'],$contant,$baseaccesstoken['access_token']);
        }
    }
    echo '1';
}

function startindex($count,$pagesize){
    $mod=$count%$pagesize;
    if($mod==$count){
        return 0;
    }
    $floor=floor($count/$pagesize);
    $start=rand(0,$floor);
    if($start==$floor){
        $start=$count-$pagesize;
    }else{
        $start=$pagesize*$start;
    }
    return $start;
}
?>