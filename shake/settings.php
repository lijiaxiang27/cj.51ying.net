<?php

if (isset($_GET['do'])) {
    $do = $_GET['do'];
} else {
    die("invild action");
}
switch ($do) {
    case "shareready":
        shake_ready();
        break;
}

function shake_ready()
{
    include("db.php");
    $datapath = str_replace("/shake", '/', dirname(__FILE__));
    $configpath = $datapath . '/data/memcache.php';
    require_once(dirname(__FILE__) . '/../common/CacheFactory.php');
    if (file_exists($configpath)) {
        require($configpath);
        if ($use_memcache == 1) {
            $mem = new CacheFactory('memcached'); //声明一个新的memcached链接
            $mem->clear_all();
        }
    }
    $fzz = new CacheFactory();
    $key='shake_status';
    
    $data=array('isopen'=>1,'endshake'=>$xuanzezu['endshake']);
    $fzz->set($key,$data,3600);

    $shake_toshake_m = new M('shake_toshake');
    $shake_toshake_m->update("1", array('point' => 0));
    echo '1';
}