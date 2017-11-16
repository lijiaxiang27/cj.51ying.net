<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
@header("Content-type: text/html; charset=utf-8");
/*链接数据库*/
$dbname = 'wxwall_cj';//数据库的名称
/*设置数据库信息*/
$host = '127.0.0.1';//数据库的服务器地址，一般无需更改
$port = '3306';//数据库的端口号
$user = 'root';//数据库的用户名
$pwd = 'mala_xx3';//数据库的密码