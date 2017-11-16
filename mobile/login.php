<?php
/**
 * 招商经理登陆页面
 * Created by PhpStorm.
 * User: lijiaxiang
 * Date: 2017/11/2/002
 * Time: 9:46
 */


//引用基类&&实例化
require_once('../common/My.class.php');
$my = new My();

	//判断是否登陆
	if (isset($_COOKIE['manger'])&&!empty($_COOKIE['manger']))
	{
		$view = new M('cvn_view');

	    //获取当前正在进行的洽谈
		$data = $view -> select('`status`in(3,4)','id,teacher_id,t_name,time,t_img,status');
		//echo date('Y-m-d H:i:s',$time+3600).'<br/>'.date('Y-m-d H:i:s',$time);
		//dump($data);die;
        //如果没有获取到正在进行或者等待开始的洽谈则查询今天时候有洽谈
        if (empty($data)){
//            echo 1;
            $tody = strtotime(date('Y-m-d',time()));
            $tomorrow = strtotime("+1 day");
            //dump($tomorrow);
            $data = $view -> select('`status` =1 order by time asc ','id,teacher_id,t_name,time,t_img,status');
            //如果今天有洽谈  获取所有洽谈
            //dump($data);die;
            if (!empty($data)){
                $arr = array();
                foreach ($data as $k => $v) {
                    if (!key_exists($v['teacher_id'],$arr)){
                        $arr[$v['teacher_id']]= $v['id'];
                    }
                }
                $ids  = implode(',',$arr);
                $view -> update('id in('.$ids.')',['status'=>4]);
                $data = $view -> select('`status`in(3,4)','id,teacher_id,t_name,time,t_img,status');
            }

        }

		$my -> assign('data',$data);
		$my -> display('template/show_cvn.html');
	}else{
		
		$my->display('template/app_header.html');
		$my->display('template/managers/login.html');
	   
	}

