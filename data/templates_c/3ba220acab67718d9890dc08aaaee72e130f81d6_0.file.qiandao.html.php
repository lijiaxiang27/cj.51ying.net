<?php
/* Smarty version 3.1.29, created on 2017-11-15 17:17:27
  from "E:\website\cj.51ying.net\mobile\template\qiandao.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0c06271e5ed1_40823271',
  'file_dependency' => 
  array (
    '3ba220acab67718d9890dc08aaaee72e130f81d6' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\qiandao.html',
      1 => 1510737309,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0c06271e5ed1_40823271 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预约</title>
    <link rel="stylesheet" href="template/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/static/css/style.css">
    <link rel="stylesheet" href="template/static/js/need/layer.css">
    <?php echo '<script'; ?>
 src="template/static/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="template/app/js/app_tool.js"><?php echo '</script'; ?>
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
        .qiandao-box{
            padding-top:0;
        }
        .qiandao-box .row{
            margin-left:0;
            border-bottom: 1px solid #ddd;
        }
       .qiandao-box .row label{
           height:36px;
           line-height:42px;
           font-size: 0.32rem;
       }
        .qiandao-box .row input{
            height:42px;
            line-height: 36px;
            font-size: 0.3rem;
            border: none;
            -webkit-box-shadow:none;
            box-shadow:none;
            -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
            -webkit-appearance: none;
        }
        .btn{
            width:90%;
            display: block;
            background:rgb(56,200,0);
            color:white;
            text-align: center;
            border-radius: 3px;
            margin:20px auto 0;
            outline: none;
            border: none;
            height:0.8rem;
            line-height:0.6rem;
            font-size: 0.36rem;
        }
    </style>
</head>
<body>
<div class="qiandao-box">
    <img class="img-responsive" src="template/static/images/banner.jpg" alt="banner" title="banner">
    <div class="container">
	<?php if ($_smarty_tpl->tpl_vars['wall_config']->value['name_switch'] == 1) {?>
       <div class="row">
           <label for="" class="col-xs-4">姓名</label>
           <input class="form-control col-xs-8" id='realname' type="text" style="width:66.66666%;" placeholder="请输入您的姓名">
       </div>
	   <?php }?>
		<?php if ($_smarty_tpl->tpl_vars['wall_config']->value['phone_switch'] == 1) {?>
        <div class="row">
            <label for="" class="col-xs-4">手机</label>
            <input class="form-control col-xs-8" id="mobile" type="tel" style="width:66.66666%;" placeholder="请输入您的手机号">
        </div>
		<?php }?>
		<input type="hidden" id="openid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['openid'];?>
"/>
    </div>

    <button class="btn btn_register">确认签到</button>
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
>
</body>
</html>
<?php }
}
