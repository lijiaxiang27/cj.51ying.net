<?php
/* Smarty version 3.1.29, created on 2017-11-09 04:36:52
  from "E:\website\cj.51ying.net\mobile\template\managers\login.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a03cd54c56bb8_58704808',
  'file_dependency' => 
  array (
    '5d7ff42a54c5ae180593caaa82dbbc64bebfc086' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\managers\\login.html',
      1 => 1509593823,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a03cd54c56bb8_58704808 ($_smarty_tpl) {
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
<body>
<div class="weui_cells_title" style="    padding-top: 40px;">客户经理登陆</div>
<div class="weui_cells weui_cells_form">

    <div class="weui_cell">
        <div class="weui_cell_hd">
            <label class="weui_label">用户名</label>
        </div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="realname" type="text" placeholder="请输入用户名" />
        </div>
    </div>

    <div class="weui_cell">
        <div class="weui_cell_hd">
            <label class="weui_label">密码</label>
        </div>
        <div class="weui_cell_bd weui_cell_primary">
            <input class="weui_input" id="mobile" type="password" placeholder="请输入密码" />
        </div>
    </div>

    <!--<input type="hidden" id="openid" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['openid'];?>
"/>-->
</div>
<div class="weui_btn_area">
    <a class="weui_btn weui_btn_primary btn_register" href="javascript:">登陆</a>
</div>
<?php echo '<script'; ?>
>
    
    $(document).ready(function(){
        $(".btn_register").on("click",function(){
            var realname=$('#realname').val();
            var mobile=$('#mobile').val();
            //var openid=$('#openid').val();
		
			
            _meepoajax._ajax({
                do_it:'manger_login',
                type: "POST",
                dataType: 'json',
                cache: false,
                formPata:{'uname':realname,'pwd':mobile},
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
