<?php
require_once("../common/My.class.php");
$my = new My();



if($my->is_post())
{
//获取数据库数据 TODO
#
#
#   
//填充测试数据 
$param = ['t_id'=>'2011462','u_name'=>'wangwu','time'=>'10','teacher'=>'lijiaxiang','u_phone'=>'15201065801'];
//调用短信方法
return $my->send_msg($param);
//数据类型为{"code":0,"msg":"发送成功","count":2,"fee":2.0,"unit":"COUNT","mobile":"15201065801","sid":18650861118}bool(true);
}