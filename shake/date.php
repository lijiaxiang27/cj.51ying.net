<?php
error_reporting(E_ALL);
require_once('../common/CacheFactory.php');
$judge = $_POST['judge'];

//实例化一个memcache对象
$datapath = str_replace("/shake", '/', dirname(__FILE__));
$configpath = $datapath . '/data/memcache.php';
if (file_exists($configpath)) {
    require($configpath);
    if ($use_memcache == 1) {
        $mem = new CacheFactory('memcached');  //声明一个新的memcached链接
        usememcache($mem);
    }else{
        usemysql();
    }
}else{
    usemysql();
}

//judge=1 获取分数信息
//judge=2 获取人数
//judge=3 开始
//judge=4 结束
function usememcache($mem)
{
    

    global $judge;
    $judge = $_POST['judge'];
    // if (!empty($alldata)) {
    //     usort($alldata, "compare");
    // }

    $wall_state_key='wall_state';
    if ($judge == 1) {
        //游戏中
        $prefix='xianchang_';
        $keys=$mem->get($prefix.'keys');
        // echo var_export($keys);
        $data=array();
        if(empty($keys)){
            return '';
        }
        foreach($keys as $k){
            $data[]=$mem->get($prefix.$k);
        }
        // echo var_export($data);
        if (!empty($data)) {
            usort($data, "compare");
        }
        $json_string = json_encode($data);
        echo $json_string;
        return;
    } else if ($judge == 2) {
        //统计摇一摇签到人数
        qiandao($mem);
        return;
        // die();
    } else if ($judge == 3) {
        require('db.php');
        //开始游戏
        $data=array('isopen'=>2,'endshake'=>$xuanzezu['endshake']);
        $mem->set($wall_state_key,$data,3600);
        return;
        // $startvalue = 2;

        // $mem->set($wall_state_key, $startvalue, 3600);
    } else if ($judge == 4) {
        require('db.php');
        //结束游戏
        $data=$mem->get($wall_state_key);
        if($data){
            $data['isopen']=1;
            $mem->set($wall_state_key,$data,3600);
        }else{
            $data=array('isopen'=>1,'endshake'=>$xuanzezu['endshake']);
            $mem->set($wall_state_key,$data,3600);
        }
        return;
        // $startvalue = 1;
        // $mem->set($wall_state_key, $startvalue,  3600);
    }
    // $mem->quit(); //关闭memcache连接

}

//摇一摇签到
function qiandao($mem){
    require('db.php');
    include_once('../wall/biaoqing.php');
    $prefix='xianchang_';
    $shake_toshake_m = new M('shake_toshake');
    $shakedata = $shake_toshake_m->select();
    $shake_toshake_m->close();
    
    if (empty($shakedata)) {
            $num = 0;
    }
    foreach ($shakedata as $z) {
        $key[] = $z['wecha_id'];
    }
    // die();
    $mem->set($prefix.'keys',$key, 3600);
    foreach($shakedata as $item){
        $data=$mem->get($prefix .$item['wecha_id']);
        if(!$data){//没有缓存则记录到缓存中
             $item['phone'] = pack('H*', $item['phone']);
             $item['phone'] = emoji_unified_to_html(emoji_softbank_to_unified($item['phone']));
             $data=$item;
             $mem->set($prefix .$item['wecha_id'],$data, 3600);
        }
    }
    echo count($shakedata);
    return;
}

function compare($x, $y)
{
    if ($x['point'] == $y['point'])
        return 0;
    elseif ($x['point'] > $y['point'])
        return -1;
    else
        return 1;
}

function usemysql()
{
	
    global $judge;
    require('db.php');
    include('../wall/biaoqing.php');
    // echo 'test';
//     echo 1;
    $judge = $_POST['judge'];
    $shake_toshake_m = new M('shake_toshake');
    $wall_config_m = new M('wall_config');
    if ($judge == 1) {
//     	echo 2;
        //游戏进行中
        if($xuanzezu['show_num']>0){
            $data = $shake_toshake_m->select('1 order by point desc limit '.$xuanzezu['show_num']);
        }else{
            $data = $shake_toshake_m->select('1 order by point desc ');
        }
        
        foreach ($data as $q) {
        	//这里有问题，为什么去掉才正常
            $q['phone'] = pack('H*', $q['phone']);
            $q = emoji_unified_to_html(emoji_softbank_to_unified($q));
            $arr_one[] = $q;
        }
        $json_string = json_encode($arr_one);
        echo $json_string;
    } else if ($judge == 2) {
//     	echo 3;
        //尚未开始游戏
        $data=$shake_toshake_m->find('1=1','count(*) as num');
        // echo 123;
        echo $data['num'];
    } else if ($judge == 3) {
        $fzz = new CacheFactory();
        $key='shake_status';
        $data=array('isopen'=>2,'endshake'=>$xuanzezu['endshake']);
        $fzz->set($key,$data,3600);
        //开始游戏
        // $wall_config_m->update('1', array('isopen' => 2));
    } else if ($judge == 4) {
        $fzz = new CacheFactory();
        $key='shake_status';
        $data=$fzz->get($key);
        if($data){
            $data['isopen']=1;
            $fzz->set($key,$data,3600);
        }else{
            $data=array('isopen'=>1,'endshake'=>$xuanzezu['endshake']);
            $fzz->set($key,$data,3600);
        }
        
        //结束游戏
        // $wall_config_m->update('1', array('isopen' => 1));
    }
}

?>