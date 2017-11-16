<?php
/* Smarty version 3.1.29, created on 2017-11-10 14:19:07
  from "E:\website\cj.51ying.net\mobile\template\teacher.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0544db6ccd31_33535202',
  'file_dependency' => 
  array (
    'b670dad84fe0d3b9f3a50c411b8b93ae318a86e4' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\teacher.html',
      1 => 1510104478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0544db6ccd31_33535202 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>选择想要预约的老师</title>
    <link rel="stylesheet" href="template/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/static/css/style.css">
    <?php echo '<script'; ?>
 src="template/static/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var deviceWidth = document.documentElement.clientWidth;if(deviceWidth > 750)
            deviceWidth = 750;document.documentElement.style.fontSize = deviceWidth / 7.5 + 'px';
        $(window).resize(function() {
            var deviceWidth = document.documentElement.clientWidth;
            if(deviceWidth > 750)
                deviceWidth = 750;document.documentElement.style.fontSize = deviceWidth / 7.5 + 'px';
        });
    <?php echo '</script'; ?>
>
    <style>

    </style>
</head>
<body>
<div class="content-box">
    <div class="container teacher-box">
        <h4 style="    padding: 0.25rem 0;">选择讲师</h4>
        <?php
$_from = $_smarty_tpl->tpl_vars['teachers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_v_0_saved_item = isset($_smarty_tpl->tpl_vars['v']) ? $_smarty_tpl->tpl_vars['v'] : false;
$__foreach_v_0_saved_key = isset($_smarty_tpl->tpl_vars['k']) ? $_smarty_tpl->tpl_vars['k'] : false;
$_smarty_tpl->tpl_vars['v'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['k'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['v']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['k']->value => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
$__foreach_v_0_saved_local_item = $_smarty_tpl->tpl_vars['v'];
?>
        <div class="row">
            <div class="col-xs-4">
                <div>
                    <img class="img-thumbnail " src="<?php echo $_smarty_tpl->tpl_vars['v']->value['t_img'];?>
" alt="">
                </div>
            </div>
            <div class="col-xs-8">
                <div>
                    <p class="clearfix"><?php echo $_smarty_tpl->tpl_vars['v']->value['t_name'];?>
 <a class="order-btn" href="conversation.php?t_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
">预约</a></p>
                    <p><?php echo $_smarty_tpl->tpl_vars['v']->value['t_introduce'];?>
</p>
                </div>
            </div>
        </div>
        <?php
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_local_item;
}
if ($__foreach_v_0_saved_item) {
$_smarty_tpl->tpl_vars['v'] = $__foreach_v_0_saved_item;
}
if ($__foreach_v_0_saved_key) {
$_smarty_tpl->tpl_vars['k'] = $__foreach_v_0_saved_key;
}
?>
    </div>
</div>
</body>
</html><?php }
}
