<?php
/* Smarty version 3.1.29, created on 2017-06-19 04:43:05
  from "E:\website\cj.51ying.net\wall\qdq_plug\qdq_html.php" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59473a39b47814_80814043',
  'file_dependency' => 
  array (
    '38fd89b3d1839749dcbdfdbd10f787569a12da97' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\wall\\qdq_plug\\qdq_html.php',
      1 => 1497837495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59473a39b47814_80814043 ($_smarty_tpl) {
?>
<link rel="stylesheet" href="qdq_plug/images/qdqcss.css" type="text/css">
<style>

.sign-small{width:645px;height:485px; margin:0 auto;overflow:hidden;
	-webkit-mask-image: url(<?php echo $_smarty_tpl->tpl_vars['config']->value['signlogoimg'];?>
); 
	mask-image: url(<?php echo $_smarty_tpl->tpl_vars['config']->value['signlogoimg'];?>
);
}
	</style>
<div class="sign ui transition hidden" id="sign" >
    <div class="sign-butt ui vertical labeled icon buttons">
        <div class="ui blue button" id="start-action">
            <i class="play icon"></i>
            开始活动
        </div>
    </div>

</div>
<?php echo '<script'; ?>
 type="text/javascript" src="js/qdq_dianplu.js"><?php echo '</script'; ?>
>
<?php }
}
