<?php
/* Smarty version 3.1.29, created on 2017-11-01 12:30:56
  from "E:\website\cj.51ying.net\mobile\template\app_qd.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59f9b070259dd2_48525154',
  'file_dependency' => 
  array (
    '70ec0942a9b7b581e27614f13ea849af4e9c6497' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\app_qd.html',
      1 => 1509535774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59f9b070259dd2_48525154 ($_smarty_tpl) {
?>

<style type="text/css">

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary, time, mark, audio, video {
   margin:0;
   padding:0;
   border: 0;
   vertical-align: baseline;
   outline: none;
}
body { font-family: Microsoft YaHei,Helvitica,Verdana,Tohoma,Arial,san-serif; -webkit-text-size-adjust: none;}
 
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section { display: block; }
ol, ul { list-style: none; }
 
blockquote, q { quotes: none; }
blockquote:before, blockquote:after, q:before, q:after { content: ''; content: none; }
strong { font-weight: bold; } 
 
a,button,input{-webkit-tap-highlight-color:rgba(255,0,0,0);}
input, textarea, select { -webkit-border-radius:0;-webkit-appearance:none;outline: none; }
input[type="button"], input[type="submit"], input[type="reset"] {-webkit-appearance: none;}
 
table { border-collapse: collapse; border-spacing: 0; }
img { border: 0;}
 
a { text-decoration: none; }
a:hover { text-decoration: none; }

.clearfix:before, .container:after { content: ""; display: table; }
.clearfix:after { clear: both; }

/**/
body{ background-color:#f0f0f0}
.vgy_user {
display: block;
margin:0;
padding: 0;
text-align: center;
overflow: hidden;
}
.vgy_user_bg{ width:100%; opacity:0.15;}

.vgy_user .info2 {
display: block; 
margin:65px auto 0 auto;width:180px;
}
.vgy_user .info2 .touxiang {
width: 150px;
height: 150px;
border-radius: 100%;
background-color: #FFF;
box-shadow: 0 0 0 5px rgba(255, 255, 255, 1), 0 0 10px 2px rgba(0, 0, 0, 0.3);
}
.infotext {
text-align:center;
overflow: hidden;
display: block;
font-size: 16px;
margin:15px auto;
padding:10px;border-radius: 6px;
background-color:#FFF;
line-height:30px;
}
.name {
font-size: 16px; 
margin: 20px 0 15px 0;
}
.info2 a {
color: #fff;
}
.red{ color:#F30}
.tx{display:block; font-size:18px; color:#FFF; border-radius:6px;  padding:6px 0; margin: 0 auto; width:180px;/*background-color:#36c77a;*/background-color:#ff7575;}
.bgs{background:-webkit-gradient(linear, 0% 100%, 0% 45%, from(#f0f0f0), to(rgba(255,255,255,0)))}
.bgt{ width:100%; opacity:0}
.time{ font-size:14px; color:#666}


.pwpage {
background-color: rgba(66, 66, 78, 0.75);
position: fixed;
top: 0;
left: 0;
right: 0;
bottom: 0;
z-index: 9999998;
}
.denglu {
position: fixed;
z-index: 9999999;
top: 50%;
left: 50%;
margin-top: -95px;
margin-left: -141px;
}
.denglu .pwinfo {
margin: 10px auto 15px auto;
color: #888;
font-size: 12px;
width: 90%
}
.pwd {
display: block;
width: 260px;
padding: 10px;
margin: 0 auto;
background-color: #fff;
border-radius: 10px;
font-size: 14px;
border: 1px solid rgba(0, 0, 0, 0.1);
}
.pwd form {
padding: 0;
margin: 0;
}
.pwd p {
display: block;
padding: 5px; margin:0;
}
.pwd .err {
color: #F00;
padding: 5px;
}
.pwd .pwdinput {
border: 1px solid rgba(153, 153, 153, 0.44);
border-radius: 5px;
padding: 10px;
}
.pwd .pwdinput {
width: 100%;
box-sizing: border-box;
}
.pwd .px {
display: block;
height: 35px;
line-height: 35px;
color: #fff;
font-size: 14px;
border-radius: 5px;
background-color: #C70000;
text-decoration: none;
border: 0;
background: -webkit-linear-gradient(top, #F00303, #C70000);
border-radius: 5px;
color: #ffffff;
text-align: center;
text-shadow: 0 1px rgba(0, 0, 0, 0.2);
}
.pwd .px:active {
background: -webkit-linear-gradient(top, #C70000, #F00303);
}
.pwd .px[type="submit"] {
width: 100%;
box-sizing: border-box;
-webkit-box-sizing: border-box;
-moz-box-sizing: border-box;
}

</style>
</head>
<body>

<!--pop end-->
<img src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
" width="0" height="0"   >
<div class="vgy_user">
        <div class="info2">
        	<img class="touxiang" src="<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
">
            	<p class="name"><?php echo $_smarty_tpl->tpl_vars['user']->value['nickname'];?>
</p>
				<p class="tx">恭喜你签到成功</p>
				<div class="infotext">
					<p>你是第<span class="red"><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</span>位签到</p>
					<p>您的座位是<?php echo $_smarty_tpl->tpl_vars['seats']->value['seates_area'];?>
区 <?php echo $_smarty_tpl->tpl_vars['seats']->value['seates_code'];?>
</p>
					<p class="time"><?php echo $_smarty_tpl->tpl_vars['user']->value['datetime'];?>
</p>
					<!-- <p><?php if ($_smarty_tpl->tpl_vars['level']->value == 1) {?>已审核<?php } else { ?>待审核<?php }?></p> -->
				</div>
    	</div>
</div>
<div style="position:fixed; z-index:-1;top:0; height:100%; width:100%; opacity:0.3; background:url(<?php echo $_smarty_tpl->tpl_vars['qd']->value['avatar'];?>
) no-repeat center top; background-size:100% auto;">
<div class="bgs" ><img class="bgt" src="<?php echo $_smarty_tpl->tpl_vars['qd']->value['avatar'];?>
"></div>
</div>

<?php }
}
