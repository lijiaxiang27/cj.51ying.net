<?php
/* Smarty version 3.1.29, created on 2017-11-15 18:00:36
  from "E:\website\cj.51ying.net\mobile\template\show_cvn.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0c1044df8889_00575283',
  'file_dependency' => 
  array (
    '5bee7fc9549a73214c8780c5a1ca9114d2b73583' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\show_cvn.html',
      1 => 1510740010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0c1044df8889_00575283 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理</title>
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
        <h4 style="    padding: 0.25rem 0;">当前正在进行的洽谈</h4>
			<p style='color:red;font-size:25px' >请勿重复点击结束商谈按钮！</p>
		<?php if (empty($_smarty_tpl->tpl_vars['data']->value)) {?>
        <p style='color:red;font-size:25px' >没有更多会话了</p>
		<?php }?>
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

        <div class="row">
            <div class="col-xs-4">
                <div>
                    <img class="img-thumbnail " src="<?php echo $_smarty_tpl->tpl_vars['v']->value['t_img'];?>
" alt="">
                </div>
            </div>
            <div class="col-xs-8">
                <div>
                    <?php if ($_smarty_tpl->tpl_vars['v']->value['status'] == 4) {?>
                    <!--manager_do.php?c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&time=<?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
&t_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['teacher_id'];?>
&stu=4-->
                        <p class="clearfix"><?php echo $_smarty_tpl->tpl_vars['v']->value['t_name'];?>
 <a class="order-btn" href="#1" he="manager_do.php?c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&time=<?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
&t_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['teacher_id'];?>
&stu=4">开始今天的商谈</a></p>
                        <p>洽谈时间：<?php echo date('H:i',$_smarty_tpl->tpl_vars['v']->value['time']);?>
--<?php echo date('H:i',$_smarty_tpl->tpl_vars['v']->value['time']+3600);?>
<br/>开始洽谈后会立即短信通知第一位洽谈者</p>
                    <?php } else { ?>
                    <!-- manager_do.php?c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&time=<?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
&t_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['teacher_id'];?>
-->
                        <p class="clearfix"><?php echo $_smarty_tpl->tpl_vars['v']->value['t_name'];?>
 <a class="order-btn" href="#1" he="manager_do.php?c_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['id'];?>
&time=<?php echo $_smarty_tpl->tpl_vars['v']->value['time'];?>
&t_id=<?php echo $_smarty_tpl->tpl_vars['v']->value['teacher_id'];?>
">结束商谈</a></p>
                        <p>洽谈时间：<?php echo date('H:i',$_smarty_tpl->tpl_vars['v']->value['time']);?>
--<?php echo date('H:i',$_smarty_tpl->tpl_vars['v']->value['time']+3600);?>
<br/>结束当前洽谈后会立即短信通知下一位洽谈者前来</p>
                    <?php }?>
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
</html>
<?php echo '<script'; ?>
>
    $(function () {
        $('.order-btn').click(function () {
            //获取url
            var link=$(this).attr('he');
            $.ajax({
                type:'get',
                url:link,
                dataType:'json',
                success:function (msg) {
                    alert(msg);
                    location.href='http://cj.51ying.net/mobile/login.php';
                }
            })
        });
    })
<?php echo '</script'; ?>
><?php }
}
