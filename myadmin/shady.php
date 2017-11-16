<?php
@header("Content-type: text/html; charset=utf-8");
include("db.php");
if(isset($_GET['do'])){
	$do = $_GET['do'];
	$cid = $_GET['cid'];
}else{
	die("invild action");
}
if($do == 'shadyadd'){
	$phone = $_GET['phone'];
	$grade = $_GET['grade'];
	$cj_shady_m=new M('cj_shady');
    $sql_shady = "replace `weixin_cj_shady` (`id`,`phone`,`grade`) VALUES ('{$cid}','{$phone}','{$grade}')";
    $cj_shady_m->query($sql_shady);
    $flag_m=new M('flag');
	$flag_m->update("`phone` =  '{$phone}'",array('shady'=>$grade));

}else if($do == 'shadydel'){
	$cj_shady_m=new M('cj_shady');
	$data=$cj_shady_m->find('`id` = "'.$cid.'"');
	$cj_shady_m->delete('`id` = "'.$cid.'"');
	$flag_m=new M('flag');
	$flag_m->update("`phone` =  '".$data['phone']."'",array('shady'=>0));
}