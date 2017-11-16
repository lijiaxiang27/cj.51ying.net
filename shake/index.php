<?php
@header("Content-type: text/html; charset=utf-8");
require_once('../common/session_helper.php');
if (isset($_SESSION['views']) && $_SESSION['views'] == true) {
} else {
    $_SESSION['views'] = false;
    echo "<script>window.location='../wall/login.php?url=" . $_SERVER['PHP_SELF'] . "';</script>";
}
include('db.php');
$flag = new M('weixin_config');
$weixinconf = $flag->find();
?>
<!DOCTYPE HTML>
<html>
<head>
    <?php require('db.php');
    $plugsc = new M('plugs');
    $voteplug = $plugsc->find('name="shake"'); ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $xuanzezu['acttitle']; ?></title>
    <script src="./mobile/shake/jquery.js"></script>
    <script type="text/javascript" src="../files/js/semantic.min.js"></script>
    <script src="mobile/shake/jquery-ui.min.js"></script>
    <script src="mobile/shake/jquery.flip.min.js"></script>
    <link rel="stylesheet" href="css/shake.css" type="text/css">
    <link rel="stylesheet" href="../files/css/semantic.min.css" type="text/css">
    <link rel="stylesheet" href="../files/plugs/font-awesome-4.6.3/css/font-awesome.min.css" type="text/css">
    <style type="text/css">
    body,td,th {
	   font-family: "微软雅黑", Arial, Helvetica;
    }
    </style>
    <script>
        var scrwidth;
        $(function () {
            var hoko;
            var ss = 3;
            var isstop = 0;
            var tt;
            var stime = 3 * 1000;
            function getPoint() {
                var anitime = scrwidth /<?php echo $xuanzezu['endshake'];?>;
                var i = 0;
                $.ajax({
                    type: "post",
                    url: "date.php",
                    dataType: 'json',
                    data: 'judge=1',
                    success: function (json) {
                        for(var i=0,l=json.length<<?php echo $xuanzezu['show_num'];?>?json.length:<?php echo $xuanzezu['show_num'];?>;i<l;i++){
                            doit(i);
                        }
                        function doit(i) {
                            $("#ranking div:eq(" + i + ")").children('span').flip({
                                speed: 500,
                                color: '#f93',
                                content: '<p><img class="ui avatar image" src="' + json[i]['avatar'] + '"><xb>' + json[i]['phone'] + '</xb></p>',
                                onBefore: function () {
                                    if (json[i]['point'] * anitime >= scrwidth) {
                                        $("#ranking div:eq(" + i + ")").children('span').css({
                                            "width": scrwidth,
                                            "visibility": "visible"
                                        });
                                        for (i = 0; i <<?php echo $xuanzezu['show_num'];?>; i++) {
                                            $("#ranking div:eq(" + i + ")").children('span').html('<p><img class="ui avatar image" src="' + json[i]['avatar'] + '"><xb>' + json[i]['phone'] + '</xb></p>');
                                        }
                                        isstop = 1;
                                    }
                                    else {
                                        $("#ranking div:eq(" + i + ")").children('span').css("width", json[i]['point'] * anitime);
                                    }
                                },

                            })
                            
                        }
                    }
                });
                if ($("#ranking div:eq(0)").children('span').width() >= scrwidth) {
                    echo(anitime);
                    $("#final").show("fast");
                    clearTimeout(hoko);
                    return false;
                }
                hoko = setTimeout(getPoint, stime);
            }
            function start() {
                $.ajax({
                    type: "post",
                    url: "date.php",
                    dataType: 'text',
                    data: 'judge=3',
                    success: function (data) {
                    }
                });
            }
            function end() {
                $.ajax({
                    type: "post",
                    url: "date.php",
                    dataType: 'text',
                    data: 'judge=4',
                    success: function (data) {
                    }
                });
            }
            function getman() {
                $.ajax({
                    type: "post",
                    url: "date.php",
                    dataType: 'text',
                    data: 'judge=2',
                    success: function (data) {
                        $("#man").html(data);
                    }
                });
            }
            function count() {
                $("#bignum").html(ss);
                ss = ss - 1
                tt = setTimeout(count, 1000)
                if (ss == -1) {
                    $("#bignum").hide(0);
                    $("#ranking").show().ready(function () {
                        scrwidth = $('div .progress-bar').width() - 61;
                    });
                    clearTimeout(tt);
                    start();
                    getPoint();
                }
            }

            function echo(anitime) {
                var str = "";
                $("#ranking").hide(0);
                for (i = 0; i <<?php echo $xuanzezu['show_num'];?>; i++) {
                    score = parseInt($("#ranking div:eq(" + i + ")").children('span').width()) / anitime;
                    str += "<tr>";
                    str += "<td>第" + (i + 1) + "名</td>";
                    str += "<td>" + $("#ranking div:eq(" + i + ")").children('span').html();
                    +"</td>";
                    str += "<td>" + parseInt(score) + "</td>";
                    str += "</tr>"
                }
                $("#finaltable").append(str);
                end();
            }
            $("#c").click(function () {
                clearInterval(yuni);
                count();
            });
            $("#qrcode").click(function () {
                $(this).hide();
            });
            var yuni = setInterval(getman, 1000);
        })
    </script>
</head>
<body>
<div class="page"> 
    <!-- 头部 -->
    <div class="head">
        <div class="head_left">
            <div class="head_info">
                <h1><?php echo $xuanzezu['acttitle']; ?></h1>
            </div>
            <div class="head_flag"></div>
        </div>
        <div class="head_right">
            <img alt="bababa" src="css/images/bullhorn.png"/>
            <h3>在上墙界面点击顶部菜单，再点击摇一摇即可参与摇一摇</h3>
            <a href="javascript:resetgame();" class="ui orange button" style="float: right;margin-top: 20px;margin-right: 10px;">重新开始</a>
        </div>
        <div class="clear"></div>
    </div>
    <div id="ranking" class="ui page grid">
        <?php
        $ka = $xuanzezu['show_num'];
        $class = array('blue stripes', 'orange shine', 'green glow');
        for ($i = 0; $i < $ka; $i++) {
            ?>
            <div class='progress-bar  <?php echo $class[$i]; ?>'>
                <su><?php echo $i + 1; ?></su>
                <su2></su2>
                <span></span></div>
            <?php
        }
        ?>
    </div>
    <!--<div id="dd"><input id="ddd" type="button" value="初始化游戏"></div>-->
    <div id="bignum" class="ui page grid">
        <div class="biginner row">
				<img src="<?php echo $weixinconf['erweima'];?>" style="float:left;" />
            <div class="six wide column" style="float:right;">
                 <a id="c" href="javascript:void(0)">
                	<img style="width:100px;" src="./css/images/shake.gif">
                    <p>开始游戏</p>
                 </a>
                <div class="manbox">已连接人数<span id="man"> 0 </span></div>
            </div>
        </div>
    </div>
    <div id="final" class="ui page grid">
        <table id="finaltable" class="ui celled table segment">
            <thead>
            <tr>
                <th>名次</th>
                <th>微信昵称</th>
                <th>摇晃次数</th>
            </tr>
            </thead>
        </table>
    </div>
</div>
<audio autoplay src="" loop></audio>
<img class="bg" src="<?php echo $xuanzezu['shakebgimg']; ?>"/>
<script type="text/javascript">
function resetgame(){
    $.ajax({
        'url':'/shake/settings.php?do=shareready',
        'type':'get',
        "success":function(text){
            if(text==1){
                alert('重置成功');
                window.location.reload();
            }else{
                alert('重置失败');
            }
        }
    })
}
</script>
</body>
</html>