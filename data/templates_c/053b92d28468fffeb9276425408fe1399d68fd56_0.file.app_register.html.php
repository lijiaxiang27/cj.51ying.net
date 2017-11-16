<?php
/* Smarty version 3.1.29, created on 2017-11-15 16:05:57
  from "E:\website\cj.51ying.net\mobile\template\app_register.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0bf5658cc641_25847164',
  'file_dependency' => 
  array (
    '053b92d28468fffeb9276425408fe1399d68fd56' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\app_register.html',
      1 => 1510733144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0bf5658cc641_25847164 ($_smarty_tpl) {
?>

<link href="template/app/css/vote3.css" rel="stylesheet" type="text/css">
<link href="template/app/css/vote.css" rel="stylesheet" type="text/css">

<style>

.pay_list_c1 {
	width: 100%;
	height: 24px;
	cursor: pointer;
	padding-left: 10px;
	padding-top: 10px;
	padding-bottom: 10px;
	-webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}

.radioclass {
	opacity: 0;
	cursor: pointer;
}

.refresh_vote {
	background-color: rgba(0, 0, 0, 0.4);
	bottom: 200px;
	position: fixed;
	right: 14px;
	text-align: center;
	z-index: 11;
	height: 50px;
	width: 50px;
	border-radius: 100%;
}

.refresh_vote img {
	padding: 5px;
	display: block;
	height: 40px;
	width: 40px;
}

.vote_disabled {
	display: none
}

</style>
</head>
<body style="background: white">
	<div class="weui_cells weui_cells_form" style="border-top: none">
		<?php if ($_smarty_tpl->tpl_vars['wall_config']->value['name_switch'] == 1) {?>
		<div class="weui_cell" style="border-top: none">
			<div class="weui_cell_hd" style="border-top: none">
				<label class="weui_label">姓名</label>
			</div>
			<div class="weui_cell_bd weui_cell_primary" style="border-top: none">
				<input class="weui_input" id="realname" type="text" placeholder="请输入您的姓名" />
			</div>
		</div>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['wall_config']->value['phone_switch'] == 1) {?>
		<div class="weui_cell">
			<div class="weui_cell_hd" style="border-top: none">
				<label class="weui_label" style="border-top: none">手机</label>
			</div>
			<div class="weui_cell_bd weui_cell_primary">
				<input class="weui_input" id="mobile" type="text" placeholder="请输入您的手机号" />
			</div>
		</div>
		<?php }?>
		<input type="hidden" id="openid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['openid'];?>
"/>
	</div>
	<div class="weui_btn_area">
		<a class="weui_btn weui_btn_primary btn_register" href="javascript:">确定签到</a>
	</div>
	<?php echo '<script'; ?>
>

$(document).ready(function(){
$(".btn_register").on("click",function(){
	var realname=$('#realname').val();
	var mobile=$('#mobile').val();
	var openid=$('#openid').val();
	_meepoajax._ajax({
				do_it:'user_register',
				type: "POST",                        
				dataType: 'json',      
				cache: false,                 
				formPata:{'openid':openid,'realname':realname,'mobile':mobile},
				success:function(r) {
						if(r.errno==0){
							_loading_toast._show(r.message);
							setTimeout(function(){  
							window.location.reload();
							},2000);
						}else{
							_loading_toast._show(r.message);
						}
				}
		})
})
});

<?php echo '</script'; ?>
><?php }
}
