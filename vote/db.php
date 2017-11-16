<?php
@header("Content-type: text/html; charset=utf-8");
include(dirname(__FILE__) . '/../common/db.class.php');
$wall_config = new M('wall_config');
$xuanzezu = $wall_config->find('1', '*', '');
$link = M::$wlink;

define("Web_ROOT", $xuanzezu['web_root']);
?>