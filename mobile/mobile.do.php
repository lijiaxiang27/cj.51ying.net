<?php
error_reporting ( E_ALL );
require_once ('../common/db.class.php');
$action = $_GET ['action'];
switch ($action) {
	case 'user_register' :
		user_register ();
		break;
	case 'msg_getmore' :
		msg_getmore ();
		break;
	case 'msg_send' :
		send_msg ();
		break;
	case 'msg_uploadimg' :
		msg_uploadimg ();
		break;
	case 'shake_count':
		shake_count();
		break;
	case 'vote_insert':
		vote_insert();
		break;
	//招商经理登陆
    case 'manger_login':
        manger_login();
        break;
}
function msg_getmore() {
	include ('../wall/biaoqing.php');
	$wall_m = new M ( 'wall' );
	$openid = $_POST ['openid'];
	$messagelist = $wall_m->select ( 'openid="' . $openid . '" order by datetime desc' );
	foreach ( $messagelist as $k => $message ) {
		$message ['nickname'] = pack ( 'H*', $message ['nickname'] );
		$message ['content'] = pack ( 'H*', $message ['content'] );
		$message = emoji_unified_to_html ( emoji_softbank_to_unified ( $message ) );
		$message ['content'] = biaoqing ( $message ['content'] );
		
		$message ['type'] = 1;
		if (! empty ( $message ['image'] )) {
			$message ['type'] = 2;
			$message ['content'] = $message ['image'];
		}
		$message ['createtime'] = $message ['datetime'];
		$messagelist [$k] = $message;
	}
	// echo var_export($messagelist);
	$msg = array (
			'message' => $messagelist,
			'errno' => 0 
	);
	echo trim ( json_encode ( $msg ) );
	// echo var_export($messages);
}

// todo:自动审核关键字处理
// todo:手动审核的默认审核状态
function send_msg() {
	$openid = $_POST ['openid'];
	$content = $_POST ['content'];
	require_once ('../common/emo_helper.php');
	$content = Emo::ProcessEmoMsg ( $content );
	
	$wall_config_m = new M ( 'wall_config' );
	$wall_config = $wall_config_m->find ( '1' );
	
	$ret = 1;
	if ($wall_config ['shenghe'] == 1) {
		$ret = 0;
	} else {
		if (blackword ( $content, $wall_config ) == 1) {
			$ret = 0;
		}
	}
	
	$flag_m = new M ( 'flag' );
	$myinfo = $flag_m->find ( 'openid="' . $openid . '"' );
	
	$wall_m = new M ( 'wall' );
	$message = array (
			'messageid' => 0,
			'fakeid' => $myinfo ['fakeid'],
			'num' => 0,
			'content' => $content,
			'nickname' => $myinfo ['nickname'],
			'avatar' => $myinfo ['avatar'],
			'ret' => $ret,
			'fromtype' => 'weixin',
			'image' => '',
			'datetime' => time (),
			'openid' => $openid 
	);
	$messageadd = $message;
	$messageadd ['content'] = bin2hex ( $messageadd ['content'] );
	$wall_m->add ( $messageadd );
	
	$message ['tip'] =$ret==1?'发送成功':'发送成功，请等待管理员审核';
	$data = array (
			'message' => $message,
			'errno' => 0 
	);
	echo trim ( json_encode ( $data ) );
}
function msg_uploadimg() {
	$openid = $_POST ['msg_send'];
	//$mediaid = $_POST ['media_id'];
	$base64=$_POST['imgbase64'];
	$extension=$_POST['filetype'];
// 	echo $base64;exit();
	$weixin_config_m = new M ( 'weixin_config' );
	$weixin_config = $weixin_config_m->find ( '1' );
	$wall_config_m = new M ( 'wall_config' );
	$wall_config = $wall_config_m->find ( '1' );

	require_once ('../common/http_helper.php');
	require_once ('../common/weixin_helper.php');
	//$accesstoken = getbaseaccess_token ( $weixin_config ['appid'], $weixin_config ['appsecret'] );
	//$filepath = 'http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=' . $accesstoken ['access_token'] . '&media_id=' . $mediaid;

	//$file = http_get ( $filepath );
	require_once ('../common/FileUploadFactory.php');
	$fuf = new FileUploadFactory ( 'file' );
// 	echo $base64;exit();
	//$base64 = //"/9j/4AAQSkZJRgABAQEAkACQAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAACQAAAAAQAAAJAAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAHKgAwAEAAAAAQAAAHIAAAAA/9sAQwAfFRcbFxMfGxkbIyEfJS9OMi8rKy9fREg4TnBjdnRuY21rfIyyl3yEqYZrbZvTnam4vsjKyHiV2+rZwumyxMjA/9sAQwEhIyMvKS9bMjJbwIBtgMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDA/8AAEQgAcgByAwEiAAIRAQMRAf/EAB8AAAEFAQEBAQEBAAAAAAAAAAABAgMEBQYHCAkKC//EALUQAAIBAwMCBAMFBQQEAAABfQECAwAEEQUSITFBBhNRYQcicRQygZGhCCNCscEVUtHwJDNicoIJChYXGBkaJSYnKCkqNDU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6g4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2drh4uPk5ebn6Onq8fLz9PX29/j5+v/EAB8BAAMBAQEBAQEBAQEAAAAAAAABAgMEBQYHCAkKC//EALURAAIBAgQEAwQHBQQEAAECdwABAgMRBAUhMQYSQVEHYXETIjKBCBRCkaGxwQkjM1LwFWJy0QoWJDThJfEXGBkaJicoKSo1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoKDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uLj5OXm5+jp6vLz9PX29/j5+v/aAAwDAQACEQMRAD8A6GiiigAooqF5scL+dAEpIHU4phmQepquSWOSc0UwJvPH939aPP8A9n9ahooAsCZT1yKeCG6HNVKASDkHFAFyioEm7N+dTAgjIpALRRRQAUUUUAFFFQzv/CPxoAbLJuOB0/nUdFFMAoopyIXPH50ANoqTES9SWPtR+6b1WgCOinPGU56j1ptABTo5Ch9vSm0UAWwQRkdKWq8L4O09DVikAUUUUAIx2qT6VUJycmp5zhQPWoKYBRRRQAdalkOxQi/jUaffX606b/WGgBlFFFAEkTZ+RuhpjDaxHpQn31+tOm/1hoAZRRRQAVajbcgPeqtS255I/GgCeiiikBBcfeA9qiqS4++PpUdMAooooAKlceYoZeo6ioqkjRh82do96AI6KmZoieRk+1N3xr91Mn3oAI12je3QdKjJyST3pXcueaSgAooooAKfD/rBTKfD/rBQBZooopAQ3A6GoasyruQiq1MAoopVG5gPWgB6KFXe34CmO5c5NOmPzbR0FMoAKKKKACpNoePKjkdRUdOiba49+KAG0U6RdrkU2gAqSAfOT6Co6sQLhM+tAElFFFIAqtKm1vY1ZprqHXBoAq06MhXBPSkZSpwaSmArHLE+ppKKKACiiigAooooAfKwZsj0plFABJwOtADkXe2KtdKZGmxffvT6QBRRRQAUUUUANdA4waruhQ89PWrVFAFOip2hU9OKYYXHTBpgR0U7Y/8AdNJsb+6fyoASiniFz2xUiwAfeOaAIVUscAVYjjCD1PrTgABgDFLSAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAP/2Q==";
	$base64= str_replace('data:image/jpg;base64,', '', $base64);
	$base64= str_replace('data:image/jpeg;base64,', '', $base64);
	$base64= str_replace('data:image/png;base64,', '', $base64);
	$file = base64_decode($base64);
	
	$url = $fuf->SaveFile ( $file, $extension, $wall_config['web_root'] );
	$ret = $wall_config ['shenghe'] == 1 ? '0' : '1';
	$returndata = array (
			'errno' => 0,
			'message' => array (
					"picurl" => $url,
					"tip" =>($ret==1?'发送成功':'发送成功，请等待管理员审核') 
			) 
	);
	// 记录信息到数据库
	$flag_m = new M ( 'flag' );
	$flag = $flag_m->find ( 'rentopenid="' . $openid . '"' );
	// $sql = "INSERT INTO `weixin_wall` (`id`,`messageid`,`fakeid`,`num`,`content`,`nickname`,`avatar`,`ret`,`fromtype`,`image`,`datetime`,`openid`) VALUES (NULL,'0','{$q['fakeid']} ','-1','此消息为图片！','{$q['nickname']}','{$q['avatar']}','0','weixin','{$content}','{$time}','{$from}')";
	$wall_m = new M ( 'wall' );
	
	$data = array(
			'messageid' => 0,
			'fakeid' => $flag['fakeid'],
			'num' => 0,
			'content' =>'此消息为图片！',
			'nickname' =>$flag['nickname'],
			'avatar' =>$flag['avatar'],
			'ret' => $ret,
			'fromtype' => 'weixin',
			'image' => $url,
			'datetime' => time(),
			'openid' => $openid 
	);
	
	$return = $wall_m->add ( $data );
	if ($return == false) {
		$returndata = array (
				'errno' => - 1,
				'message' => array (
						"picurl" => $url,
						"tip" => "信息保存失败！" 
				) 
		);
	}
	echo json_encode ( $returndata );
}

function user_register() {
	$openid = $_POST ['openid'];
	$wall_config_m=new M('wall_config');
	$wall_config=$wall_config_m->find('1');
	$signname='';
	$phone = '';
	if($wall_config['name_switch']==1){
		$signname = isset ( $_POST ['realname'] ) ? $_POST ['realname'] : '';
		if($signname==''){
			echo '{"errno":-2,"message":"姓名必须填写"}';
			return ;
		}
	}
	if($wall_config['phone_switch']==1){
		$phone = isset ( $_POST ['mobile'] ) ? $_POST ['mobile'] : '';
		
		if($phone==''){
			echo '{"errno":-3,"message":"手机号必须填写"}';
			return ;
		}
		if (! preg_match ( "/^1[0-9]{1}\d{9}$/", $phone )) {
			$phone = '';
		}
		if($phone==''){
			echo '{"errno":-4,"message":"手机号格式不正确"}';
			return ;
		}
	}
	
	//signorder签到顺序也记录一下
	// 内定抽奖判断
	$shady_model = new M ( 'cj_shady' );
	$shady = $shady_model->find ( 'phone="' . $phone . '"' );
	$flag_m=new M('flag');
	$signorder=$flag_m->find('flag=2 order by signorder desc limit 1','signorder');
	$signorder=isset($signorder['signorder'])?$signorder['signorder']:0;
	if (! empty ( $shady )) {
		$sql_check = "UPDATE  `weixin_flag` SET `flag` = '2',`phone` = '{$phone}',`signname` = '{$signname}',`shady`='{$shady ['grade']}',`signorder`='".($signorder+1)."'  WHERE  `openid` =  '{$openid}';";
	} else {
		$sql_check = "UPDATE  `weixin_flag` SET `flag` = '2',`phone` = '{$phone}',`signname` = '{$signname}',`signorder`='".($signorder+1)."' WHERE  `openid` =  '{$openid}';";
	}
	$note_sql = $flag_m->query ( $sql_check );
	if ($note_sql) {
		echo '{"errno":0,"message":"签到成功"}';
	} else {
		echo '{"errno":-1,"message":"签到信息记录失败"}';
	}
}

########################################### begin by lijiaxiang ###############################################
/**
 * 招商经理登陆
 */
function manger_login()
{
    //获取数据
    $post = $_POST;
    $db   = new M('manger');
    $user = $db -> find('uname="'.$post['uname'].'"and pwd="'.$post['pwd'].'"');
    //校验用户信息
    if (isset($user)&&!empty($user))
    {
        setcookie('manger',$post['uname']);
        echo '{"errno":0,"message":"登陆成功"}';
    }else{
        echo '{"errno":-1,"message":"用户名或密码错误,请重试"}';
    }
}
########################################### end by lijiaxiang ###############################################

function shake_count(){
	require_once(dirname(__FILE__) . '/../common/CacheFactory.php');
	$wecha_id = $_POST['openid'];
	// return;
	//实例化一个memcache对象
	$datapath = str_replace("/mobile", '/', dirname(__FILE__));
	$configpath = $datapath . '/data/memcache.php';
	
	if (file_exists($configpath)) {
		require($configpath);
		if ($use_memcache == 1) {
			$mem = new CacheFactory('memcached');  //声明一个新的memcached链接
			hasmemcache($mem,$wecha_id);
		}else{
			hasmysql($wecha_id);
		}
	}else{
		hasmysql($wecha_id);
	}
	
	
	
}

function vote_insert(){
	$openid = $_POST ['openid'];
	$voteitems_arr= isset ( $_POST ['data'] ) ? $_POST ['data'] : '';
	$voteitems=implode(',',$voteitems_arr);
	$wall_config_m=new M('wall_config');
	$wall_config=$wall_config_m->find(1);
	if(count($voteitems_arr)>$wall_config['votecannum']){
		echo '{"errno":-1,"message":"你没有选择项目或者选择的项目太多了！"}';
		return ;
	}else{
		$flag_m=new M('flag');
		$flag=$flag_m->find("`openid` = '{$openid}'");
		if(!empty($flag['vote'])){
			echo '{"errno":-2,"message":"您已经投过票了！"}';
			return;
		}
		$flag_m->update("`openid` = '{$openid}'",array('vote'=>$voteitems));
		$vote_m=new M('vote');
		foreach ($voteitems_arr as $value) {
			$succed=$vote_m->update("`id` = '{$value}'","`res` =  `res`+1");
		}
		echo '{"errno":0,"message":"投票成功！"}';
		return ;
	}
}
function blackword($content, $xuanzezu) {
	if (! empty ( $xuanzezu ['black_word'] )) {
		$blackarr = explode ( ",", $xuanzezu ['black_word'] );
		
		foreach ( $blackarr as $v ) {
			if (strstr ( $content, $v )) {
				return 1;
			}
		}
		return 0;
	}
}
//judge=1 获取分数信息
//judge=2 获取人数
//judge=3 开始
//judge=4 结束
function hasmemcache($mem,$wecha_id)
{
	// 		global $wecha_id;
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

function hasmysql($wecha_id)
{
	// return;
	// require_once(dirname(__FILE__) . '/../common/CacheFactory.php');
	// 		global $wecha_id;
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