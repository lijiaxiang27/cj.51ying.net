<?php
/**
 * 项目经理更改交谈状态
 */

require_once('../common/My.class.php');
$my = new My();


//获取ID&&time&&teacher_id
$id = $_GET['c_id'];
$t_id = $_GET['t_id'];
$time = $_GET['time'];
$db = new M('cvn_view');

//开始一个事务
$db   -> query("BEGIN"); //或者mysql_query("START TRANSACTION");
//dump($id);die;
//更改当前客户户状态
if (isset($_GET['stu'])) {
    //如果stu存在，证明是开始回话  then 更改会话状态为正在交谈
    $res  = $db -> update('id='.$id,['status'=>3]);
    //获取当前交谈的详细信息
    $res1 = $db -> find('id = '.$id);
    $res2 = true;

}else {
    //如果stu不存在 证明是结束会话 then 更改当前状态为已完成
    $res = $db->update('id=' . $id, ['status' => 2]);
    //dump($res);die;
    //查询下个客户=
    $res1 = $db->find("teacher_id=$t_id and time>$time and status=1 order by time asc");
    if (!is_null($res1)){
        //如果下一位是在明天，就给$res1赋值为空
        $time_a = date('d', $res1['time']);
        $time_n = date('d', time());
        if ($time_n < $time_a) {
            //修改明天第一位用户的状态为 4 待开始
            $db->update('id =' . $res1['id'], ['status' => 4]);
            //赋值$res2 = true
            $res2 = true;
        }else{
            //dump($res1['id']);die;
            //更改下个客户的状态
            $res2 = $db->update('id='.$res1['id'], 'status = 3');
        }
    }else{
        $res2 = true;
    }
}
//dump(is_null($res1));#die;
//dump($res2);die;
if($res && $res2){
	$db -> query("COMMIT");
	if(count($res1)==0){
		$stu = 3;
	}else{
		//发送短信
		//TODO待适配模板['tpl_id'=>'2011462','u_name'=>'wangwu','time'=>'10','teacher'=>'lijiaxiang','u_phone'=>'15201065801'];
        /*$param['u_name']=$res1['u_name'];//客户姓名
        $param['time']= date('H:i',$res1['time']);//客户预约的时间节点
        $param['teacher']=$res1['t_name'];//讲师姓名*/
        $param['u_phone']=$res1['u_phone'];//客户手机号
        $param['tpl_id'] = '2054282';//短信模版号
        $msg = $my->send_msg($param);
        $stu = 1;
	}

}else{
	$db -> query("ROLLBACK");
	$stu = 2;
}
$db -> query("END");
switch ($stu){
    case 1 : $str = '成功通知用户';continue;
    case 2 : $str = '异常！请重试';continue;
    case 3 : $str = '没有更多预约了';continue;
    default: ;break;
}
echo json_encode($str);
//echo "<script>alert('$str')</script>";die;

//$my -> assign('msg',$str);
//$my -> display('template/ok.html');
