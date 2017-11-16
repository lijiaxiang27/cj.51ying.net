<?php
/* Smarty version 3.1.29, created on 2017-08-25 03:45:21
  from "E:\website\cj.51ying.net\mobile\template\app_shake.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_599f8131c3ce87_23112491',
  'file_dependency' => 
  array (
    '4040093f3e04eda4791991f37ce1146ba92766bb' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\app_shake.html',
      1 => 1497837486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_599f8131c3ce87_23112491 ($_smarty_tpl) {
?>

    <link rel="stylesheet" type="text/css" href="template/app/css/phone_shake.css">
    <?php echo '<script'; ?>
 src="template/app/js/jquery.mobile.events.min.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        var PATH_ACTIVITY = '';
		var rotate_id = '';
        var SHAKE_INFO = '';
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="template/app/js/base.js" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="template/app/js/phone_paoma.js?t=1" type="text/javascript" charset="utf-8"><?php echo '</script'; ?>
>

</head>
<style>
.shake-icon {
background-image:url(template/app/images/shake/shake0.png) !important;
background-repeat:no-repeat;
background-size: cover;
width:300px;
height:300px;
top:50%;
left:50%;
margin-top:-180px;
margin-left:-150px;
outline:none;
}
</style>
<body class="shakeing1">
<img src="" width="0" height="0"   >
            <audio id="ShakeAudio" src="template/app/images/shake/v4.mp3" preload="preload"></audio>
        <div class="memo">听从现场指挥摇动手机</div>
    <div class="shake-icon"></div>
    <input type="hidden" id="openid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['openid'];?>
"/>

<?php }
}
