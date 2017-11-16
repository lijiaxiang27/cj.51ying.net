<?php
//记录信息到摇一摇的数据表
if (!function_exists('lurushake')) {
    function lurushake($wecha_id)
    {
        require_once('db.class.php');
        $flag_m=new M('flag');
        $data=$flag_m->find('`openid` = "'.$wecha_id.'"');
        $nicheng =$data['nickname'];
        $avatar = $data['avatar'];
        $sql_shake = 'replace  `weixin_shake_toshake` (`wecha_id`,`phone`,`point`,`avatar`) VALUES ("'.$wecha_id.'","'.$nicheng.'","0","'.$avatar.'");';
        $shake_toshake_m=new M('shake_toshake');
        $shake_toshake_m->query($sql_shake);
        $q=$flag_m->find('`openid` =  "'.$wecha_id.'"');
        if ($q['nickname'] == '') {
            return 1;
        }else{
            return -1;
        }
    }
}
//记录用户信息
if(!function_exists('isluru')){
    function isluru($openid){
        $weixinconf = getWeixinConf();
        $wallconfig=getWallConf();
        $appid=$weixinconf['appid'];
        $appsecret=$weixinconf['appsecret'];
        $baseaccesstoken=getbaseaccess_token($appid,$appsecret);
        // $baseaccesstokeninfo=json_decode($baseaccesstoken);
        //获取用户信息失败
        if(!$baseaccesstoken){
            return -1;
        }else{
            $token=$baseaccesstoken['access_token'];
            // $url = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=' . $token . '&openid=' . $openid . '&lang=zh_CN';
            // $fzz = new file_cache;
            // $fzz->set('token',$token,3600);
            // echo $url;
            // $user = https_get($url);
            // $user = json_decode($user);

            // $fzz->set('user2',$token.'!'.$openid,3600); 
            // $fzz->set('user', $user,3600);

            $user=getuserinfo($token,$openid);
            
            if(isset($user->errcode)){
                return -2;
            }else{
                $iswrite=writeinto($user);
                if($iswrite=='ok'){
                    return 1;
                }else{
                    return -3;
                }
            }
        }
    }
}
if(!function_exists('writeinto')){
    function writeinto($info)
    {
        //解决转义符
        //json字符串转化成数组
        $infoarr = json_encode($info);
        $infoarr = json_decode($infoarr, true);
        $flag = new M('flag');
        $count = $flag->find("openid='" . $infoarr['openid'] . "'", '*', 'count');

        $sqlarr = array(
            "nickname" => bin2hex($infoarr['nickname']),
            "avatar" => $infoarr['headimgurl'],
            "fakeid" => randStr(),
            "sex" => $infoarr['sex'],
            "fromtype" => 'weixin',
            "datetime" => time(),
            "flag" => "2"
        );
        if (isset($infoarr['shadyphone'])) {
            $shady = new M('cj_shady');
            $shadyarr = $shady->find("phone=" . $infoarr['shadyphone']);
            if (empty($shadyarr)) {
                $addarr = array(
                    'phone' => $infoarr['shadyphone'],
                    'shady' => $shadyarr['grade']
                );
                $sqlarr = array_merge($sqlarr, $addarr);
            }
        }
        if ($count) {
            $savve = $flag->update("openid='" . $infoarr['openid'] . "'", $sqlarr);
        }
        if ($savve) {
            return "ok";
        }

    }
}
//生成随机数字字符串
if (!function_exists('randStr')) {
    function randStr($len = 10)
    {
        $rand = '';
        for ($i = 0; $i < $len; $i++) {
            $rand .= mt_rand(0, 9);
        }
        return $rand;
    }
}
//记录数据到数据库，用于调试
if (!function_exists('logechostr')) {
    function logechostr($echostr)
    {
        require_once('db.class.php');
        $log_m = new M('log');
        $log=array(
            'echostr'=>$echostr,
            'created_at'=>time()
        );
        $log_m->add($log);
    }
}
//记录数据到文件，用于调试
if(!function_exists('logechostrfile')){
    function logechostrfile($echostr){
        // $path=getcwd();
        file_put_contents($path . '/log'.date('Y-m-d',time()).'.php', $echostr,FILE_APPEND);
    }
}
//获取配置信息
if (!function_exists('getWeixinConf')) {
    function getWeixinConf()
    {
        require_once('db.class.php');
        $weixin_configc = new M('weixin_config');
        $weixin_config = $weixin_configc->find();
        return $weixin_config;
    }
}
if (!function_exists('getWallConf')) {
    function getWallConf()
    {
        require_once('db.class.php');
        $wall_configc = new M('wall_config');
        $wall_config = $wall_configc->find();
        return $wall_config;
    }
}
//
if (!function_exists('doshenhe')) {
    function doshenhe($cid)
    {
        require_once('db.class.php');
        // $wall_num_m=new M('wall_num');
        // $data=$wall_num_m->find('1');
        $num =$data['num'];
        $num=empty($num)?0:$num;
        $wall_m=new M('wall');
        $wall_message= $wall_m->find('id='.intval($cid));
        $fakeid =$wall_message['fakeid'];
        $content =$wall_message['content'];
        $datetime =$wall_message['datetime'];
        $flag_m=new M('flag');
        $flag_m->update('`fakeid` = "'.$fakeid.'" and `status` !=  "1"',array('status'=>'2','content'=>$content,'datetime'=>$datetime));
        $query=$wall_m->update(' `id` = "'.$cid.'"',array('ret'=>'1','num'=>$num));
        // if ($query) {
        //     $wall_num_m->update('1',"`num` = `num`+1");
        // }
        return 1;
    }
}
//检查手机号格式
if (!function_exists('checkMobile')) {
    function checkMobile($mobilephone){
        if(preg_match("/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$/",$mobilephone)){ 
            return 1;
        }else{
            return -1;
        } 
    }
}
?>