<?php
/* Smarty version 3.1.29, created on 2017-11-09 04:36:52
  from "E:\website\cj.51ying.net\mobile\template\bd.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a03cd54cc9e38_53040168',
  'file_dependency' => 
  array (
    '678ece099a0e3975d803c98112ad6e3a532d4882' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\bd.html',
      1 => 1497837486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a03cd54cc9e38_53040168 ($_smarty_tpl) {
if ($_smarty_tpl->tpl_vars['need_bd']->value == 1) {?>
<div id="code_pop" class="pop">
  		<div class="box">
    		<h1>录入个人资料</h1>
			<div class="weui_cells weui_cells_form" style="border-bottom-right-radius:20px;
border-bottom-left-radius:20px;margin-top:0px">
				
				<div class="but_con">
					<button class="button_yes">确定</button>
				</div>
			</div>
	   </div>
</div>
<style>

input{
    -webkit-appearance: none;
}
.pop { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); z-index: 1000; height: 100%; width: 100%;  animation: poupFadIn 0.5s ease 0s 1; outline:none}
.pop .box { border-radius: 20px; background-color: #fff; position: fixed; z-index: 1001; left: 20px; right: 20px; top: 40px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.32), 0 -3px 0px 0px rgba(0, 0, 0, 0.15) inset; -webkit-animation:f1 0.5s 0s ease 1; }
@-webkit-keyframes f1{
    0%{-webkit-transform: translateY(50px);opacity:0;}
    100%{-webkit-transform: translateY(0);opacity:1; }
}
#zjl .box { top: 50px; }
.pop .box .closeb { cursor: pointer; position: absolute; display: block; border-radius: 50%; width: 30px; height: 30px; text-indent: -9999px; top: 5px; right: 5px; }
.pop .box .closeb:after { position: absolute; content: '.'; display: block; width: 20px; height: 1px; background: #B9B9B9; -webkit-transform: rotate(45deg); top: 14px; left: 5px; }
.pop .box .closeb:before { position: absolute; content: '.'; display: block; width: 20px; height: 1px; background: #B9B9B9; -webkit-transform: rotate(-45deg); top: 14px; left: 5px; }
.pop .box h1 { color: #333; text-align: center; padding: 10px 0; font-size: 16px; }
.pop .box h2 { color: #ee635f; font-size: 12px; text-align: center; padding: 0 5px 5px 5px; word-wrap: break-word; }
.pop .box .inputqy { margin: 5px 15px; overflow: hidden; }
.pop .box .inputqy input { box-sizing: border-box; padding: 10px; background-color: #FCFCFC; color: #666; border-radius: 40px; width: 100%; margin: 5px auto; font-size: 14px; border: 1px #E9E9E9 solid; }
.pop .box .inputqy select { box-sizing: border-box; padding: 10px; background-color: #FCFCFC; color: #666; border-radius: 40px; width: 100%; margin: 5px auto; font-size: 14px; border: 1px #E9E9E9 solid; }
.pop .box .but_con { margin: 10px 15px 20px 15px; overflow: hidden; }
.pop .box .w49 { width: 49%; }
.pop .button_yes { width: 100%; text-align: center; display: inline-block; box-sizing: border-box; font-size: 16px; font-weight: bold; color: #fff; border-radius: 40px; padding: 10px 0; border: 1px solid #04BE02; background-color: #04BE02; cursor: pointer; }
.pop .button_yes:active { border: 1px solid #04BE02; background-color: #04BE02; }
.pop .button_no { width: 100%; text-align: center; display: inline-block; box-sizing: border-box; font-size: 16px; color: #999; border-radius: 40px; padding: 10px 0; border: 1px solid #ccc; background-color: transparent; cursor: pointer; }
.pop .button_no:active { background-image: linear-gradient(to top, #dedede, #f2f2f2); }
.pop .jpimg { text-align: center }
.pop .jpimg img { max-height: 240px; max-width: 100%; border-radius: 10px; margin-bottom: 5px; }
.pop .jptext { text-align: center; font-size: 14px }
.pop .jptext .ncz { margin: 20px 0; display: block; color: #ee635f; }



.poupFadIn {
    animation: poupFadIn .2s ease 0s 1;
    -webkit-animation: poupFadIn .2s ease 0s 1;
    -moz-animation: poupFadIn .2s ease 0s 1;
    -o-animation: poupFadIn .2s ease 0s 1;
}
.poupFadOut {
    animation: poupFadOut .2s ease 0s 1;
    -webkit-animation: poupFadOut .2s ease 0s 1;
    -moz-animation: poupFadOut .2s ease 0s 1;
    -o-animation: poupFadOut .2s ease 0s 1;
}
@-webkit-keyframes poupFadIn{from{opacity:0}to{opacity:1}}
@-webkit-keyframes poupFadOut{from{opacity:1}to{opacity:0}}

</style>
<?php echo '<script'; ?>
 type="text/javascript">

	$(function() {
		$(".button_yes").click(function(){	
			var insert_data = {};
			{loop $bd_manage['xm'] $row}
				var {$row['zd_name']} = $("#{$row['zd_name']}").val();
				if({$row['zd_name']}=='' || undefined=={$row['zd_name']}){
					$("#code_pop .weui_cell").removeClass('weui_cell_warn')
					$("#{$row['zd_name']}").parent().parent('.weui_cell').addClass('weui_cell_warn');
					_loading_toast._show("请认真填写您的{$row['bd_name']}");
					return;
				}else{
					{if $row['zd_name']=='mobile'}
					var phone = /^1([38]\d|4[57]|5[0-35-9]|7[06-8]|8[89])\d{8}$/;
					if(!phone.test($("#mobile").val())){
						$("#code_pop .weui_cell").removeClass('weui_cell_warn')
						$("#mobile").parent().parent('.weui_cell').addClass('weui_cell_warn');
					   
						_loading_toast._show("请填写正确的手机号码");
						return;
					}
					{/if}
					insert_data.{$row['zd_name']} = $("#{$row['zd_name']}").val();
				}
			{/loop}
			insert_data.rid = "{$rid}";
			_meepoajax._ajax({
				do_it:'bd_insert',
				type: "POST",                        
				dataType: 'json',      
				cache: false,                 
				formPata:insert_data,
				success:function(data) {
						if(data.errno==0){
							_loading_toast._show('操作成功');
							$("#code_pop").hide();
						}else{
							_loading_toast._show(data.message);
						}
				}
		});
		});
	});

<?php echo '</script'; ?>
>
<?php }
}
}
