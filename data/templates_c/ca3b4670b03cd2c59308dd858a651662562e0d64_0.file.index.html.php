<?php
/* Smarty version 3.1.29, created on 2017-06-21 13:54:08
  from "E:\website\cj.51ying.net\wall\themes\custom\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594a5e60e37b62_92296485',
  'file_dependency' => 
  array (
    'ca3b4670b03cd2c59308dd858a651662562e0d64' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\wall\\themes\\custom\\index.html',
      1 => 1498046035,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594a5e60e37b62_92296485 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>凹凸教育六周年互动大屏幕</title>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/switchto.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="../files/js/semantic.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.soChange-min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" href="css/wxwall.css" type="text/css">
    <link rel="stylesheet" href="css/emoji.css" type="text/css">
    <link rel="stylesheet" href="../files/css/semantic.min.css" type="text/css">
    <link rel="stylesheet" href="themes/<?php echo $_smarty_tpl->tpl_vars['style']->value;?>
/css/style.css" type="text/css">
</head>
<body>
<div class="main">
    <div class="top" onClick="viewExplan();" data-position="right center" data-content="放大二维码，快捷键M">
       <!--  <div class="top-logo">
        <div>
            <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['logoimg'];?>
" width='455px' height='135px' class="active side"/>
        </div> -->
 
    <div style="float: right;"><img src="<?php echo $_smarty_tpl->tpl_vars['weixinconf']->value['erweima'];?>
" style="height: 110px; border: 0;padding-top: 10px;"/></div>
    <!-- </div> -->
<!-- 
 <div class="kword ui shape ">
        <div class="sides">
            <div class="k active side">微信添加微信号：<strong><?php echo $_smarty_tpl->tpl_vars['dianplu_wxh']->value;?>
</strong>
                <br>发送<?php echo $_smarty_tpl->tpl_vars['config']->value['huati'];?>
+您想说的话即可上墙！
            </div>

            <div class="k side"><?php echo $_smarty_tpl->tpl_vars['config']->value['huanying1'];?>
</div>

            <div class="k side"><?php echo $_smarty_tpl->tpl_vars['config']->value['huanying2'];?>
</div>
        </div>
    </div> -->
</div>
<div class="wall">
    <div class="left">

    </div>
    <div class="center">
        <div class="list">
            <ul id="list"></ul>
        </div>
        <div class="footer"></div>
        <div class="btns">
            <a href="/3dsign/index.php" class="tooltip btn3d  btn-icon btn-3d" title="点击按钮跳转至3D签到墙"  id="btnCheckin">3D签到墙</a>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['qdq']) {?>
            <a href="javascript:void(0);" class="tooltip btnCheckin  btn-icon btn-checkin" title="签到墙，【空格】开始" id="btnCheckin">签到墙</a>
            <?php }?>
            <a onClick="viewstyle();" class="tooltip btnSkinSel  btn-icon btn-style" title="更换风格，快捷键F">风格选择</a>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['ddp']) {?>
            <a href="javascript:void(0);" class="tooltip btnDdp     btn-icon btn-pair " title="对对碰，【空格】开始">对对碰</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['shake']) {?>
            <a href="../shake/index.php" class="tooltip btnCheckin  btn-icon btn-shake" target="_blank" title="摇一摇">摇一摇</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['tug']) {?>
            <a href="../tug/index.php" class="tooltip btnCheckin  btn-icon btn-tug" target="_blank" title="拔河">拔河</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['ppl']) {?>
            <a href="../paipaile/index.php" class="tooltip btn-icon btn-ppl" target="_blank" title="拍拍乐">拍拍乐</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['cj'] || $_smarty_tpl->tpl_vars['plugs']->value['cjg']) {?>
            <a  href="javascript:void(0);" class="tooltip btnLottery btn-icon btn-lottery "  title="抽奖，【空格】开始">抽奖</a>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['plugs']->value['vote']) {?>
            <a href="###" class="tooltip btnVote    btn-icon btn-vote "  title="投票，快捷键T">投票</a>
            <?php }?>
        </div>
    </div>
    <div class="right"></div>
</div>

<div class="ui transition hidden" onclick="viewstyle();" id="style">
    <div class="ui teal segment style-box">
        <div class="ui ribbon teal label"><b style="font-size:3.4em;">微信墙风格选择</b></div>
        <div class="style-con">

                <?php
$_from = $_smarty_tpl->tpl_vars['styles']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
                <div class="style-img">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['row']->value['link'];?>
"><img src="###" srclink="<?php echo $_smarty_tpl->tpl_vars['row']->value['image'];?>
"></a>
                    <div class="style-tx"><b><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</b></div>
                </div>
                <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
?>
        </div>
    </div>
</div>
<!--插件层-->
<?php
$_from = $_smarty_tpl->tpl_vars['plugs']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_1_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$__foreach_row_1_saved_key = isset($_smarty_tpl->tpl_vars['name']) ? $_smarty_tpl->tpl_vars['name'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['name'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_1_saved_local_item = $_smarty_tpl->tpl_vars['row'];
if ($_smarty_tpl->tpl_vars['row']->value == 1) {?>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, ((($_smarty_tpl->tpl_vars['name']->value).('_plug/')).($_smarty_tpl->tpl_vars['name']->value)).('_html.php'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

<?php }
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_local_item;
}
if ($__foreach_row_1_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_1_saved_item;
}
if ($__foreach_row_1_saved_key) {
$_smarty_tpl->tpl_vars['name'] = $__foreach_row_1_saved_key;
}
?>
<div class="mone" id="mone" onClick="viewOneHide();">
    <div class="leftside">
        <div class="part">
            <div class="pic"><img class="msgconimg" src="" width="100" height="100"></div>
            <div class="username" style="color:#fff"><span style="color:#fff"></span></div>
        </div>
    </div>
    <div class="rightside">
        <div class="rightmain">
            <div class="rconner"></div>
            <span class="msgcon"></span></div>
    </div>
</div>

<div id="explan" onClick="viewExplan();" class="ui primary segment">
    <div class="ui ribbon green label"><b style="font-size:50px;">上墙关注：</b></div>
    <div class="erweima">
        <center>
            <div class="mabox">
                <?php if ($_smarty_tpl->tpl_vars['weibo']->value) {?>
                <div class="pic"><center><a class="ui green label"><b style="font-size:2em;line-height: 1.7em;">微博:<?php echo $_smarty_tpl->tpl_vars['weiboconf']->value['nickname'];?>
</b></a></center><img src="<?php echo $_smarty_tpl->tpl_vars['weiboconf']->value['erweima'];?>
" width='362px' height='362px'/></div>
                <?php }?>
                <?php if ($_smarty_tpl->tpl_vars['weixin']->value) {?>
                <div class="pic">
                    <center style="float:left; width:488px;">
                        <div style="font-size:30px; font-family:'微软雅黑'; padding-bottom:40px; padding-left:44px; padding-top:22px; text-align:left;">添加微信公众号：</div>
                        <a class="ui blue label"><b style="font-size:2em;line-height: 1.7em;"><?php echo $_smarty_tpl->tpl_vars['dianplu_wxh']->value;?>
</b></a><b style="font-size:43px; line-height:58px; margin-top:15px; font-family:'微软雅黑'; text-align:left; display:block; padding-left:44px;">按照提示回复,编辑您<br/>想说的话,回复到公众号微信,即可参与上墙！</b></center><img src="<?php echo $_smarty_tpl->tpl_vars['weixinconf']->value['erweima'];?>
" width='362px' height='362px'/></div>
                <?php }?>
            </div>
        </center>
    </div>
    <div class="ui bottom right attached label vote-right"><a class="ui black circular label">×</a></div>
</div>
</div>
<img class="bg"  src="<?php echo $_smarty_tpl->tpl_vars['config']->value['bgimg'];?>
" alt="背景"/>

<?php echo '<script'; ?>
 type="text/javascript">

    $(function () {
        $('.top').popup();
        $('.tooltip').popup();
        $(document).keydown(function (event) {
            if (event.keyCode == 77) {
                $('.top').click();
            }
            if (event.keyCode == 70) {
                $('.btnSkinSel').click();
            }
        });
        $('.main .list').css({'height':$(window).height()*0.8+'px'});
        var thumbs=$('.style-img img');
        for(var i=0,l=thumbs.length;i<l;i++){
            $(thumbs[i]).attr('src',$(thumbs[i]).attr('srclink'));
        }
        viewExplan();
    });
    var refreshtime =<?php echo $_smarty_tpl->tpl_vars['config']->value['refreshtime'];?>
;
    var len = 4;
    var cur = 0;//当前位置
    var mtime;
    var data = new Array();
    data[0] = new Array('0', '../img/0.jpg', '系统消息', '欢迎来到微信上墙，发送图片也可以上墙哦！', '', 'weibo');
    var lastid =<?php echo $_smarty_tpl->tpl_vars['lastid']->value;?>
;
    function viewOneHide() {
        oopen = switchto(oopen, 'mone');
    }

    function viewOne(cid, t) {
        console.log('viewone');
        var str = $('#li' + cid);
        var onenickname = str.find("span").html();
        var oneword = str.find("word").text();
        var onesrc = str.find("img").attr('src');
        var oneimgsrc = str.find(".image").find("img").attr('src');
        if (typeof(oneimgsrc) == 'string') {
            $("#mone").find(".msgcon").html('<img src="' + oneimgsrc + '"/>');
        } else {
            $("#mone").find(".msgcon").text(oneword);
        }
        $("#mone").find("span").first().html(onenickname);
        $("#mone").find("img").first().attr('src', onesrc);
        // console.log(oopen);
        oopen = switchto(oopen, 'mone');
    }

    function viewExplan() {
        $("#explan").transition('fade up');
    }

    function viewstyle() {
        $("#style").transition('scale');
    }
    function messageAdd() {
        // console.log('messageAdd');
        if (cur == len) {
            console.log('len');
            messageData();
            return false;
        }

        if(data[cur]==undefined){
            // console.log('undefined');
            messageData();
            return false;
        }
        // while(data[cur]!=undefined){
        // data[cur][4] 是图片字段
        if (data[cur][4] == '') {
            var str = '<li id=li' + cur + ' onclick="viewOne(' + cur + ',this);"><div class=m1><div class="' + data[cur][5] + ' m2"><div class="pic"><img class="circular ui image " src="' + data[cur][1] + '" width="100" height="100" /><div class="bakico"><img  src="images/ico-' + data[cur][5] + '.png"/></div></div><div class="c f2"><span>' + data[cur][2] + '</span><span>：</span><word>' + data[cur][3] + '</word></div></div></div></li>';
        }
        else {//如果是图片信息
            var str = '<li id=li' + cur + ' onclick="viewOne(' + cur + ',this);"><div class=m1><div class="' + data[cur][5] + ' m2"><div class="pic"><img class="circular ui image" src="' + data[cur][1] + '" width="100" height="100" /><div class="bakico"><img  src="images/ico-' + data[cur][5] + '.png"/></div></div><div class="c f2" style="width:57%"><span>' + data[cur][2] + '</span><span>：</span><word>' + data[cur][3] + '</word></div><div class="image"><img src="' + data[cur][4] + '"/></div></div></div></li>';
        }

        if (cur > 50) {
            $("li").remove("#li" + (cur - 50));
        }
        $("#list").prepend(str);
        $("#li" + cur).slideDown(600);
        if (data[cur][4] != '') {
            // console.log(data);
            viewOne(cur, cur);
            viewonehide=window.setTimeout('viewOneHide();', refreshtime * 1000);
            // console.log(typeof(viewonehide));
        }else{
            mtime=setTimeout('messageAdd();', refreshtime * 1000);
        }
        cur++;
    }

    function messageData() {
        var url = 'api.php';
        $.ajax({
            'url':url,
            'data':{lastid: lastid},
            'type':'get',
            "dataType":"json",
            "complete":process
        })
    }

    function process(d){
        if(d.status==200){
            var json=eval('('+d.responseText+')');
            if (json['ret'] == 1) {
            $.each(json['data'], function (i, v) {
                    data.push(new Array(v['id'], v['avatar'], v['nickname'], v['content'], v['image'], v['fromtype']));
                    lastid =lastid<v['id']?v['id']:lastid;
                    len++;
                });
                mtime=window.setTimeout('messageAdd();', refreshtime * 1000);
            } else {

                mtime=window.setTimeout('messageAdd();', refreshtime * 1000);
            }
        }
    }
    $(function(){
        messageAdd();
    })
    
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    setInterval("$('.shape').shape('flip up');", 5000);
    //头部文字切换
<?php echo '</script'; ?>
>





<style type="text/css">
    #explan .pic center{ width:100%; }
    .mabox{ width:100%; }
    #explan .pic{ width:100%; max-width:100%; margin-right:30px; }
</style>
</body>
</html><?php }
}
