<?php
/**
 * Be used for: send messages where timeout and the first for everyday
 * Created by PhpStorm.
 * User: lijiaxiang
 * Notice: 通过使用Linux计划任务定时访问本页面实现的此功能
 */

require_once('../common/My.class.php');
$my = new My();

//获取今天零点零零的时间戳
$today     = strtotime(date('Y-m-d',time()));
//获取明天零点时间戳
$tomorrow  = strtotime(date('Y-m-d H:i:s',strtotime('+1 day')));
//获取今天第一位用户，并判断状态，如果还没有开始交谈，则发送短信通知其前往交谈
$where = "time > $today and time<$tomorrow and status in(1,2) order by time";
$first =  $view -> find($where);
if ($first['status']==1)
{
    //发送短信
    //TODO待适配模板['tpl_id'=>'2011462','u_name'=>'wangwu','time'=>'10','teacher'=>'lijiaxiang','u_phone'=>'15201065801'];
    $param['u_name']=$res1['u_name'];//客户姓名
    $param['time']= date('H:i',$res1['time']);//客户预约的时间节点
    $param['teacher']=$res1['t_name'];//讲师姓名
    $param['u_phone']=$res1['u_phone'];//客户手机号
    $param['tpl_id'] = '2011462';//短信模版号
    $my->send_msg($param);
}
