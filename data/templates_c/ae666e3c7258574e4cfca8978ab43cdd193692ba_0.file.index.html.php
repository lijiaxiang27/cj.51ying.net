<?php
/* Smarty version 3.1.29, created on 2017-11-16 15:52:34
  from "E:\website\cj.51ying.net\mobile\template\index.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0d43c2ee7062_14553627',
  'file_dependency' => 
  array (
    'ae666e3c7258574e4cfca8978ab43cdd193692ba' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\index.html',
      1 => 1510818753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0d43c2ee7062_14553627 ($_smarty_tpl) {
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
<div class="screenshot" id="screenshot">
    <div class="screen-content">
        <img class="img-bg" src="template/static/images/screen-bg.jpg" alt="">
        <div class="screen-user-box">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5">
                            <?php $_smarty_tpl->tpl_vars['seat'] = new Smarty_Variable(json_decode($_smarty_tpl->tpl_vars['seats']->value,true), null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'seat', 0);?>
                        <div class="screen-user-tx">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['seat']->value[0]['avatar'];?>
" alt="">
                        </div>
                    </div>
                    <div class="col-xs-7">
                        <div class="screen-user-info">

                            <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['seat']->value[0]['signname'];?>
</p>
                            <p>您是第<?php echo $_smarty_tpl->tpl_vars['seat']->value[0]['id'];?>
号签到</p>
                            <?php ob_start();
echo $_smarty_tpl->tpl_vars['seat']->value[0]['seates_area'];
$_tmp1=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['seat']->value[0]['seates_area'];
$_tmp2=ob_get_clean();
ob_start();
echo $_smarty_tpl->tpl_vars['seat']->value[0]['seates_area'];
$_tmp3=ob_get_clean();
if ($_tmp1 == 'A' || $_tmp2 == 'B' || $_tmp3 == 'C') {?>
                            <p>座位号：<?php echo $_smarty_tpl->tpl_vars['seat']->value[0]['seates_area'];?>
区<?php echo substr($_smarty_tpl->tpl_vars['seat']->value[0]['seates_code'],0,1)-1;?>
-<?php echo substr($_smarty_tpl->tpl_vars['seat']->value[0]['seates_code'],2,1);?>
</p>
                            <?php } else { ?>
                            <p>座位号：<?php echo $_smarty_tpl->tpl_vars['seat']->value[0]['seates_area'];?>
区<?php echo $_smarty_tpl->tpl_vars['seat']->value[0]['seates_code'];?>
</p>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <img class="circle" src="template/static/images/circle.png" alt="">
        </div>
        <div class="container">
            <div class="seat seat-second">
                <p class="wt">舞台</p>
                <div class="row" id="seat_repeat" style="margin-left:0;margin-right:0;">

                </div>
            </div>
            <div class="exit">
                    <div>
                        <span>出口</span><br>
                        <img src="template/static/images/green-down.png" alt="">
                    </div>
                    <div>
                        <span>入口</span><br>
                        <img src="template/static/images/green-top.png" alt="">
                    </div>
            </div>
            <p>建议截图保留您的座位号</p>
            <a href="#1" id="screenshot-btn"><img src="template/static/images/btn.png" alt=""></a>
        </div>
    </div>
</div>
<!--悬浮按钮-->
<!-- <a id="fix-btn" href="javascript:void(0)">
        <img src="template/static/images/nav.svg" alt="">
</a> -->
<div id="mask"></div>
<div id="nav" class="nav">
    <div id="nav-content">
        <h4 class="clearfix">功能列表 <a id="close" href="javascript:void(0)"><img src="template/static/images/close.svg" alt=""></a></h4>
        <ul>
            <li>
                <a href="qiandao.php"><img src="template/static/images/icon1.png" alt="">签到</a>
            </li>
			<!--
            <li>
                <a href="conversation.php"><img src="template/static/images/icon2.png" alt="">预约</a>
            </li>
            <li>
                <a href="login.php"><img src="template/static/images/icon1.png" alt="">招商经理登陆</a>
            </li>
           
            <li>
                <a href="#1"><img src="template/static/images/icon3.png" alt="">上墙</a>
            </li>
            <li>
                <a href="#1"><img src="template/static/images/icon4.png" alt="">投票</a>
            </li>
            <li>
                <a href="#1"><img src="template/static/images/icon5.png" alt="">摇一摇</a>
            </li>-->
        </ul>
        <div class="ewm-box">
            <img class="img-thumbnail" src="template/static/images/ewm.png" alt="">
        </div>
        <p>方便您退出后二次进入强烈建议您长按二维码进行保存</p>
    </div>
</div>



<!--模态窗-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">长按保存截图</h4>
            </div>
            <div class="modal-body" id="motal_body">

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php echo '<script'; ?>
 src="template/static/js/html2canvas.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="template/static/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="template/static/js/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var code = <?php echo $_smarty_tpl->tpl_vars['seats']->value;?>
;
    console.log(code);
    var bg_box = [
        'A','B','C','D','E','F','G','H','I','J','K'
    ];
	function id(){
        var parent = $('#seat_repeat');
        for(var i = 0;i <9;i++){
            var col = $('<div class="col-xs-4 second-xs-4"></div>');
            var p = $('<p class="text-center user-area">'+bg_box[i]+'区<p/>');
            var table = $('<table></table>');
            parent.append(col);
            col.append(p);
            col.append(table);
            
            for(var j = 0;j<4;j++){
                var tr = $('<tr></tr>');
                table.append(tr);
                for(var k = 0;k<6;k++){
                    var td = $('<td class="seat-every"></td>');
                    var img = $('<img class="img-responsive seat-img"/>');
                    img.attr('src','template/static/images/'+bg_box[i]+'.jpg');
                    td.append(img);
                    tr.append(td);
                }
            }
        }
    }

    id();
   function px(users,prop1,prop2,prop3){

        var objects = users;

        var pro1 = prop1;//属性1，对应第一个参数，座位区域

        var pro2 = prop2;//属性2，对应第二个参数，行


        var length = objects.length;//数据长度

        var current_col = $('#seat_repeat').children();//获取九个大区

        var  index;
        //遍历获取大区index
        for(var q = 0; q < bg_box.length; q++){
            if(objects[0][pro1] === bg_box[q]){
                index = q;
            }
        }
        //遍历，其他大区座位变灰色
        $.each(current_col,function (i,e) {
            if(i !== index){
                current_col.eq(i).find('img').attr('src','template/static/images/L.png');
            }
			 if(i < 3){
		    current_col.eq(i).find('tr').eq(0).find('td').find('img').attr('src','template/static/images/K.png');
		   }
        });

        var seat = [];//三个参数，区域，行，列，区域不变
        for(var i = 0;i<length;i++){
            var row = objects[i][pro2].slice(0,1);
            var col = objects[i][pro2].slice(2,3);
            var td = current_col.eq(index).children().find('tr').eq(row-1).find('td').eq(col-1);
            td.find('img').eq(0).attr('src','template/static/images/j.jpg');
          
           
             		   
           if(i === 0){
                 td.css('position','relative');
               var current_title = $('<img style="position: absolute;z-index:999;width:1.4rem;height:auto;top:-0.6rem;left:-0.65rem;" src="template/static/images/your_seat.png"/>');
               if(row % 3 ===0 && col < 3){
                   current_title = $('<img style="position: absolute;z-index:999;width:1.4rem;height:auto;top:-0.6rem;left:-0.2rem;" src="template/static/images/your_seat_2.png"/>');
               }
               if(row % 3 ===2 && col > 7){
                   current_title = $('<img style="position: absolute;z-index:999;width:1.4rem;height:auto;top:-0.7rem;left:-0.95rem;" src="template/static/images/your_seat_3.png"/>');
               }
               td.append(current_title);
           }

        }
      
    }

    px(code,'seates_area','seates_code');

<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    var fix_btn = $('#fix-btn');
    var screen_btn = $("#screenshot-btn");
    var modal_body = $('.modal-body');

	screen_btn.on("click", function () {
        modal_body.empty();
        var u = navigator.userAgent;
        var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
        console.log('是否是ios：'+isiOS);
        console.log('是否是安卓：'+isAndroid);
        if(isiOS){
           alert('截图功能暂不支持ios,请手动截屏保存');
           return false;
        }
        if(isAndroid){
            setTimeout(screen(),0);
            layer.open({
                type: 2
                ,content: '生成截图中'
            });
        }
    });

    function screen(){
        var body   = $("body"),
            w      = body.width(),
            h      = body.height(),
            canvas = document.createElement("canvas");
        canvas.width = w;
        canvas.height = h;
        canvas.style.width = w + "px";
        canvas.style.height = h + "px";
        var context = canvas.getContext("2d");
        html2canvas(body, {
            height : body.outerHeight() + 20,
            onrendered: function (canvas) {
                var url = canvas.toDataURL();
                var newImg = new Image;
                newImg.src = url;
                $(newImg).addClass('img-thumbnail');
                var timestamp = Date.parse(new Date());
                $('#myModal').modal();
                $('#motal_body').append(newImg);
                setTimeout(function(){
                    layer.closeAll();
                    layer.open({
                        content: '截图成功，请长按图片保存截图'
                        ,btn: '我知道了'
                    });
                },1000)
            }
        });

    }

    /*悬浮按钮*/
    var mask    = $('#mask');
    var nav     = $('#nav');
    var nav_content = $('#nav-content');
    var close   = $('#close');
    fix_btn.click(function () {
        mask.fadeIn(0);
        nav.addClass('transition');
        setTimeout(function(){
            nav.addClass('open');
            nav_content.fadeIn(150);
        },200);
    });

    /*动画函数*/
    function changes(){
        mask.fadeOut(0);
        nav_content.fadeOut(150);
        nav.removeClass('open');
        setTimeout(function(){
            nav.removeClass('transition');

        },200);
    }



    mask.click(function(){
        changes();
    });
    close.click(function(){
        changes();
    });

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
