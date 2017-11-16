<?php
header("Content-type: text/html; charset=utf-8");
require_once('../common/session_helper.php');
// unset($_SESSION[realpath("..") . 'admin']);
session_destroy();
// echo $_SESSION[realpath("..") . 'admin'];
$str = "你已经退出登陆";
$str .= '<a href="index.php">点击这里返回</a>';
$str .= <<<eot
<script language="javascript" type="text/javascript">  
location.href='index.php';  
</script> 
eot;
die($str);
?>