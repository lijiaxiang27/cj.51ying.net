<?php
/**
 * 自定义基类控制器
 * Created by PhpStorm.
 * User: lijiaxiang
 * Date: 2017/11/1/001
 * Time: 14:20
 */
//引入smarty
require_once('../smarty/Smarty.class.php');
//引用自定义函数库
require_once('../common/functions.php');
//引用DB类
require_once('../common/db.class.php');

class My extends Smarty
{
    /**
     * 判断是否是get请求
     * @return bool
     */
    public function is_get()
    {
        if($_SERVER["REQUEST_METHOD"] == "GET")
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * 判断是否是post请求
     * @return bool
     */
    public function is_post()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            return true;
        }else{
            return false;
        }
    }

    /**
     * 判断指定时段是否可报名
     * @param $c_id = conversation.id
     * @return  bool
     */
    public function get_conv_status($c_id)
    {
        $view = new M('conves_view');
        $con = $view -> find('id='.$c_id);
		
        if ($con['status']!=0)
        {
            return false;
        }else{
            return true;
        }
    }
	
	/**
	 * @param $arr 初步获取的数组
	 * @return $arrs 处理后的数组
	 */
	public function change_array($arr)
	{
		
		$arrs['teacher']['t_name']=$arr[0]['t_name'];
		$arrs['teacher']['t_introduce']=$arr[0]['t_introduce'];
		$arrs['teacher']['t_img']=$arr[0]['t_img'];

		foreach ($arr as $k => $v){		
			//更改数据格式
			$arrs[date('m月d日',$v['time'])][$k]['id']=$v['id'];			
			$arrs[date('m月d日',$v['time'])][$k]['time']=$v['time'];
			$arrs[date('m月d日',$v['time'])][$k]['status']=$v['status'];
			//date('H:i',$v['time']).'——'.date('H:i',$v['time']+3600)
		}
		
		return $arrs;
	}
	
	################################################ 发送短信接口 begin by lijiaxiang #############################################################
    public function send_msg($param)
    {//初始化信息
        header("Content-Type:application/json;charset=utf-8");
        $apikey = "4094d66bedf5ef7cb3134b4da6c12a0e"; //apikey
        $ch = curl_init();
		/* 设置返回结果为流 */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		//获取参数
        /**
         * 'tpl_value' => ('#username#').
        '='.urlencode($param['u_name']).
        '&'.urlencode('#time#').
        '='.urlencode($param['time']).
        '&'.urlencode('#teacher#').
        '='.urlencode($param['teacher']),
         * 位于 apikey 前方
         */
        $data = array('tpl_id' => $param['tpl_id'],'apikey' => $apikey, 'mobile' => $param['u_phone']);
        //print_r ($data);die;
        return $this -> tpl_send($ch,$data);
		
        //$array = json_decode($json_data,true);    
		//return $array;
    }

    public function tpl_send($ch,$data){
	
       curl_setopt ($ch, CURLOPT_URL,
        'https://sms.yunpian.com/v2/sms/tpl_single_send.json');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $result = curl_exec($ch);
    //$error = curl_error($ch);
    
    return $result;
       
    }
	
	##################################################### 发送短信接口 end ###################################################
}