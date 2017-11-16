<?php
/* Smarty version 3.1.29, created on 2017-11-16 15:47:39
  from "E:\website\cj.51ying.net\mobile\template\qiandao.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d429b253a36_98926671',
  'file_dependency' => 
  array (
    '3ba220acab67718d9890dc08aaaee72e130f81d6' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\qiandao.html',
      1 => 1510818456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d429b253a36_98926671 ($_smarty_tpl) {
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
        body{
              background: rgb(255,222,3);
          }
          .form{
              border: 1px solid rgb(80,80,80);
              border-radius:5px;
              width:76%;margin: 0.3rem auto 0;
          }
          .form input{
              width:100%;
              height:0.9rem;
              font-size: 0.3rem;
              -webkit-appearance: none;
              background:rgb(255,222,3);
              text-indent: 0.3rem;
          }
          .form input:nth-child(1){
              border-top-left-radius: 5px;
              border-top-right-radius: 5px;
			  border-bottom-left-radius:0;
              border-bottom-right-radius:0;
          }
          .form input:nth-child(2){
              border-bottom-left-radius: 5px;
              border-bottom-right-radius: 5px;
          }
          .btn{
              width:76%;
              border-radius:5px;
              background:rgb(45,36,31);
              text-align: center;
              height:0.9rem;
              line-height: 0.6rem;
              color:white;
              display: block;
              margin: 0.25rem auto;
              font-size: 0.34rem;
              letter-spacing: 1px;
          }
		  .btn:hover{
		    color:white;
		  }
		  .btn:focus{
		    color:white;
		  }
		  .btn:visited{
		    color:white;
		  }
		  .btn:active{
		    color:white;
		  }
    </style>
</head>
<body>
<div class="qiandao-box">
    <img class="img-responsive" src="template/static/images/login.jpg" alt="">
    <div class="form">
	   <?php if ($_smarty_tpl->tpl_vars['wall_config']->value['name_switch'] == 1) {?>
        <input type="text" placeholder="姓名" style="border-bottom: 1px solid rgb(80,80,80)" id='realname'>
		 <?php }?>
		 <?php if ($_smarty_tpl->tpl_vars['wall_config']->value['phone_switch'] == 1) {?>
        <input placeholder="联系电话" id="mobile" type="tel" >
		<?php }?>
		
		
		<input type="hidden" id="openid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['openid'];?>
"/>
    </div>

    <button class="btn btn_register">提交</button>
</div>

<!--  line  -->
<!-- <div class="qiandao-box">
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
</div> -->

    <?php echo '<script'; ?>
 src="template/static/js/layer.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>

$(document).ready(function(){
$(".btn_register").on("click",function(){
	var realname=$('#realname').val();
	var mobile=$('#mobile').val();
	var openid=$('#openid').val();
	
	if(realname === ""){
	  layer.open({
		content:'请输入姓名',
		skin: 'msg',
		time: 2
	  });
	  return false;
	}
	if(mobile === ""){
	  layer.open({
		content:'请输入联系电话',
		skin: 'msg',
		time: 2
	  });
	  return false;
	}
	 if(!(/^1[34578]\d{9}$/.test(mobile))){//对用户输入的手机号进行正则验证
             layer.open({
				content:'手机号码有误，请重新填写',
				skin: 'msg',
				time: 2
			  });
            return false;
        }

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
						    layer.open({
								content:r,message,
								skin: 'msg',
								time: 2
							  });
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
