<?php
/**
 * 预约交谈，前台逻辑页 completed
 * Created by PhpStorm.
 * User: lijiaxiang
 * Date: 2017/11/9
 * Time: 11:32
 */
//引用基类
require_once('../common/My.class.php');

//实例化基类
$my = new My();

//get 输出teacher.html
if ($my->is_get()){

	//如果已经选择了老师
	if(isset($_GET['t_id']))
	{
		//根据ID获取老师所拥有的时段
		$tid   = $_GET['t_id'];
		$view  = new M('cvn_view');
		$where = 'teacher_id = '.$tid.' order by time asc';
		$field = 't_name,t_introduce,t_img,id,time,status';
		$data  = $view -> select($where,$field);
		//处理数组
		$data  = $my -> change_array($data);
		//dump($data);die;
		//渲染&&输出模板
		$my -> assign('data',$data);
		$my -> display('template/order_time.html');

	}elseif(isset($_GET['c_id'])){
		//如果是报名预约
		//获取弹窗内容
		$alter = new M('cvn_view');
		$msg = $alter -> find('id='.$_GET['c_id'],'t_name,time');
		$msg['time'] = date('H:i',$msg['time']).'--'.date('H:i',$msg['time']+3600);

		//渲染&&输出模板
		$my -> assign('msg',$msg);
		$my -> assign('c_id',$_GET['c_id']);
		$my -> display('template/order.html');

	}else{
    //获取全部讲师
    $teacher = new M('cvn_teacher');
    $teachers = $teacher -> select();
    //渲染&&输出模板
    $my -> assign('teachers',$teachers);
    $my -> display('template/teacher.html');
	}

}

if ($my->is_post()){
    //TODO post数据处理
    $post = $_POST;
	//dump($post);die;
    $c_id = $post['c_id'];
    unset($post['c_id']);
	//正则验证手机号
	if(!preg_match("/^1[34578]{1}\d{9}$/",$post['u_phone'])){
     echo json_encode(['msg'=>'手机号错误','code'=>300]);die;
	}

	//判断时段是否被占用
	$view = new M('cvn_view');
	$status = $view -> find('id ='.$c_id,'status,time');//time字段下面验证排期会用到
	if($status['status']!=0)
	{
		echo  json_encode(['msg'=>'您晚了一步，已经有人报名了','code'=>301]);die;
	}

	//判断排期是否冲突
	//获取当前手机号下的所有预约
	$times = $view -> select('u_phone ='.$post['u_phone'],'time');
	//dump($times);dump($status['time']);die;
	//与当前预约的时间进行比对  TODO 待验证
	foreach ($times as $k => $v){
		if($status['time']==$v['time'])
		{
			echo json_encode(['msg'=>'您在此时段已经有预约了','code'=>101]);
			die;
		}
	}


	//入库，更改状态
	$user = new M('cvn_user');
	if ($user -> add($post)){
        $uid = $user -> insert_id();
        $cvn = new M('cvn');
		//dump($cvn -> update('id='.$c_id,['status'=>1,'user_id'=>$uid]));die;
        //更改状态
        if ($cvn -> update('id='.$c_id,['status'=>1,'user_id'=>$uid])){
            echo  json_encode(['msg'=>'预约成功','code'=>200]);
        }else{
            echo  json_encode(['msg'=>'预约失败，请重新尝试，或联系管理员','code'=>500]);
        }
    }

}
