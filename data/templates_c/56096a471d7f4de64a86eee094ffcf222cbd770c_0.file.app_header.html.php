<?php
/* Smarty version 3.1.29, created on 2017-06-19 04:28:32
  from "E:\website\cj.51ying.net\mobile\template\app_header.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594736d0538fe0_66704373',
  'file_dependency' => 
  array (
    '56096a471d7f4de64a86eee094ffcf222cbd770c' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\app_header.html',
      1 => 1497837486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594736d0538fe0_66704373 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<title><?php if ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_qd') {?>签到<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_wall') {?>消息上墙<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_lottory') {?>抽奖<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_vote') {?>投票<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_shake') {?>摇一摇<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_redpack') {?>抢红包<?php }?></title>
<link rel="stylesheet" href="template/app/css/weui.min.css">
<link rel="stylesheet" href="template/app/css/jquery-weui.min.css">
<?php echo '<script'; ?>
 src="template/app/js/jquery-2.1.4.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="template/app/js/app_tool.js"><?php echo '</script'; ?>
><?php }
}
