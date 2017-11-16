<?php
require_once(dirname(__FILE__) . '/../common/CacheFactory.php');
$wecha_id = $_GET['wecha_id'];
// return;
//实例化一个memcache对象
$datapath = str_replace("/shake", '/', dirname(__FILE__));
$configpath = $datapath . '/data/memcache.php';

if (file_exists($configpath)) {
    require($configpath);
    if ($use_memcache == 1) {
        $mem = new CacheFactory('memcached');  //声明一个新的memcached链接
        hasmemcache($mem);
    }else{
        hasmysql();
    }
}else{
    hasmysql();
}

//judge=1 获取分数信息
//judge=2 获取人数
//judge=3 开始
//judge=4 结束
function hasmemcache($mem)
{
    global $wecha_id;
    $wall_state_key='wall_state';
    // echo $mem->get($wall_state_key);
    $wall_state=$mem->get($wall_state_key);
    if(!$wall_state){
        echo json_encode(array(
            'status' => 5,
            'point' => 0
        ));
        $mem->quit();
        return;
    }
    if($wall_state['isopen']==2){
        $prefix = 'xianchang_';
        $data = $mem->get($prefix . $wecha_id);
        if(!$data){//没有签到
            echo json_encode(array(
                'status' => 4,
                'point' => 0
            ));
        }else if($data && $data['point']+1>$wall_state['endshake']){
            //活动结束
            $wall_state['isopen']=1;
            $data['point']=$wall_state['endshake'];
            $mem->set($wall_state_key,$wall_state);
            $mem->set($prefix.$wecha_id,$data,3600);
            echo json_encode($data);
        }else{
            //增加一分
            $data['point']+=1;
            $mem->set($prefix.$wecha_id,$data,3600);
            echo json_encode($data);
        }
    }else{
        echo json_encode(array(
            'status' => 3,
            'point' => 0
        ));
    }
    $mem->quit();
}

function hasmysql()
{
    global $wecha_id;
    $fzz=new CacheFactory();
    $cachename='shake_status';
    $status=$fzz->get($cachename);
    if(!$status){
        echo json_encode(array(
        'status' => 3,
        'point' => 0
        ));
        return;
    }
    // require('db.php');
    $isopen = $status['isopen'];
    $endshake=$status['endshake'];
    $pointnum = 0;
    include(dirname(__FILE__) . '/../common/db.class.php');
    $shake_toshake_m = new M('shake_toshake');
    $data = $shake_toshake_m->find('`wecha_id`="' . $wecha_id . '"', 'point');
    if ($data && $data['point'] >= 0 && $isopen == 2) {
        if($data['point']+1>$endshake){
            $isopen=1;
            $pointnum=$endshake;
            $status['isopen']=1;
            $fzz->set($cachename,$status,3600);
        }else{
            $sql_shake = 'UPDATE  `weixin_shake_toshake` SET  `point` = `point`+1  WHERE `wecha_id` = "'.$wecha_id.'";';
            $shake_toshake_m->query($sql_shake);
            $pointnum = $data['point']; 
        }
    } else {
        $isopen = 3;
    }
    $shake_toshake_m->close();
    echo json_encode(array(
        'status' => $isopen,
        'point' => $pointnum
    ));
    return;
}

?>

