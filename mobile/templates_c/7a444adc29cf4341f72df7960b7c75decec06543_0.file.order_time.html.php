<?php
/* Smarty version 3.1.29, created on 2017-11-10 14:23:28
  from "E:\website\cj.51ying.net\mobile\template\order_time.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0545e06492c4_49596529',
  'file_dependency' => 
  array (
    '7a444adc29cf4341f72df7960b7c75decec06543' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\order_time.html',
      1 => 1510295006,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0545e06492c4_49596529 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>选择预约时间</title>
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
        <div class="row order-row">
            <div class="col-xs-4">
                <div>
                    <img class="img-thumbnail " src="<?php echo $_smarty_tpl->tpl_vars['data']->value['teacher']['t_img'];?>
" alt="">
                </div>
            </div>
            <div class="col-xs-8">
                <div>
                    <p class="clearfix"><?php echo $_smarty_tpl->tpl_vars['data']->value['teacher']['t_name'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['teacher']['t_introduce'];?>
</p>
                </div>
            </div>
        </div>
        <table id="tab">
		

			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
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
			<?php if ($_smarty_tpl->tpl_vars['k']->value == 'teacher') {?>
			<?php continue 1;?>
			<?php }?>
            <tr>
                <td rowspan="<?php echo count($_smarty_tpl->tpl_vars['v']->value)+1;?>
" class="left"><?php echo $_smarty_tpl->tpl_vars['k']->value;?>
</td>
            </tr>
			<?php
$_from = $_smarty_tpl->tpl_vars['v']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_1_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$__foreach_val_1_saved_key = isset($_smarty_tpl->tpl_vars['key']) ? $_smarty_tpl->tpl_vars['key'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_1_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
			<tr>
				<td class="right">
					<span><?php echo date('H:i',$_smarty_tpl->tpl_vars['val']->value['time']);?>
--<?php echo date('H:i',$_smarty_tpl->tpl_vars['val']->value['time']+3600);?>
</span>
					<!--如果当前时间小于交谈时间，并且状态为0 则表示可以预约-->
					<?php if ($_smarty_tpl->tpl_vars['val']->value['time'] > time() && $_smarty_tpl->tpl_vars['val']->value['status'] == 0) {?>
					<a class="btn-1" href="conversation.php?c_id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">可预约</a>
					<!--如果当前时间小于交谈时间，并且状态为1，表示已经有人预约了-->
					<?php } elseif ($_smarty_tpl->tpl_vars['val']->value['time'] > time() && $_smarty_tpl->tpl_vars['val']->value['status'] == 1) {?>
					<a class="btn-2" href="#1">已预约</a>				
					<!--如果当前时间大于交谈时间，并且状态为0，表示已结束-->
					<?php } elseif ($_smarty_tpl->tpl_vars['val']->value['time'] < time() && $_smarty_tpl->tpl_vars['val']->value['status'] == 0) {?>
					<a class="btn-0" href="#1">已结束</a>
					<!--状态为3洽谈中-->				
					<?php } elseif ($_smarty_tpl->tpl_vars['val']->value['status'] == 3) {?>
					<a class="btn-3" href="#1">洽谈中</a>
					<!--如果状态为2 表示已经交谈完成了-->
					<?php } else { ?>
					<a class="btn-4" href="#1">已完成</a>
					<?php }?>
				</td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_local_item;
}
if ($__foreach_val_1_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_1_saved_item;
}
if ($__foreach_val_1_saved_key) {
$_smarty_tpl->tpl_vars['key'] = $__foreach_val_1_saved_key;
}
?>
         
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
         <!--
            <tr>
                <td rowspan="5" class="left">11月19日</td>
                <td class="right"><span>9:00-10:00</span><a class="btn-0" href="#1">已结束</a></td>
            </tr>
            <tr>
                <td  class="right"><span>10:00-11:00</span> <a class="btn-1" href="#1">可预约</a></td>
            </tr>
            <tr>
                <td  class="right"><span>11:00-12:00</span> <a class="btn-2" href="#1">已预约</a></td>
            </tr>
            <tr>
                <td  class="right"><span>14:00-15:00</span> <a class="btn-3" href="#1">洽谈中</a></td>
            </tr>
            <tr>
                <td  class="right"><span>15:00-16:00</span> <a class="btn-4" href="#1">已完成</a></td>
            </tr>
			-->
        </table>
    </div>
</div>


<?php echo '<script'; ?>
>
    var tab  = $('#tab');
    var links =tab.find('a');
    $.each(links,function (i,e) {
        if(links.eq(i).hasClass('btn-0') || links.eq(i).hasClass('btn-4')){
            links.eq(i).attr('disabled','true').css('pointer-events','none');
        }
    })
<?php echo '</script'; ?>
>
</body>
</html><?php }
}
