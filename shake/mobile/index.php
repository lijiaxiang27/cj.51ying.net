<?php
require_once('../db.php');
if (isset($_GET["wecha_id"])) {
    $wecha_id = $_GET["wecha_id"];
    $shake_toshake_m=new M('shake_toshake');
    $result=$shake_toshake_m->find('`wecha_id`="'.$wecha_id.'"');
    if (!empty($result['id'])) {
    } else {
        die("没有查询到您的信息，请返回微信，重新回复！");
    }
} else {
    die("invild action");
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>快摇快摇</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
        <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 
        <script src="./shake/shake.js"></script>
        <style type="text/css">
            *{ margin:0; padding:0; }   
            .mbyyybg1{ position:relative;  }
            .mbyyybg1 .yyybg{ width:100%; height:100%;}
            .mbyyybg1 .yyynum0{ position:absolute; left:46%; top:37%; font-family:'微软雅黑'; font-size:2.4em; color:#ce2729; width:18%; text-align:center; }    
            .mbyyybg1 .yyynum1{ position:absolute; left:42%; top:37%; font-family:'微软雅黑'; font-size:2.4em; color:#ce2729; width:18%; text-align:center; }
            .gamenum{}
            .changebg0{ height:100%; background-color:#ffd973; }
            .changebg1{ height:100%; background-color:#c5eb93; }
            .changebg2{ height:100%; background-color:#93eaeb; }
            .changebg3{ height:100%; background-color:#f8beea; }
            .changebg4{ height:100%; background-color:#fb83ad; }
            .mbyyybg1 .tipstxt{ font-size:1.8em; letter-spacing:5px; color:#313e4f; text-align:center;  font-family:'微软雅黑'; position:absolute; top:6%; width:100%; }
        </style>
</head>

<body class="changebg4">
<div class="mbyyybg1">
    <p class="tipstxt">活动尚未开始!</p>
    <span class="yyynum0 num" >0</span>
    <!--<img src="images/yyybg1.png" class="yyybg">-->
    <img src="images/yyybg0.png" class="yyybg">     
</div>
<script type="text/javascript">
    function onBridgeReady() {
        WeixinJSBridge.call('hideOptionMenu');
    }
    if (typeof WeixinJSBridge == "undefined") {
        if (document.addEventListener) {
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        } else if (document.attachEvent) {
            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
        }
    } else {
        onBridgeReady();
    }

    $(function(){
        document.addEventListener('WeixinJSBridgeReady', function onBridgeReady() {
            WeixinJSBridge.call('hideToolbar');
        });
        addshakeevent();
        login();
    });
    function login() {
        $.ajax({
            type: "get",
            url: "<?php echo Web_ROOT;?>/shake/commit.php",
            dataType: 'json',
            data: 'wecha_id=<?php echo $wecha_id; ?>',
            success: function (json) {
                // console.log(json);
                if(json.status==1){
                    $('.num').html(0);
                    $('.tipstxt').html("等待开始");
                }else if(json.status==3){
                    $('.num').html(0);
                    $('.tipstxt').html("活动尚未开始");
                    // $('#result').html("活动尚未开始，如果已经开始游戏请返回重新加入游戏");
                }else if(json.status==4){
                    $('.num').html(0);
                    $('.tipstxt').html("活动已经开始，无法加入游戏");
                }else{
                    // var color = new Array('#0ff', '#ff0', '#f00', '#000', '#00f', '#fff');
                    // $('body').css({"background":color[json.point % 6]});
                    var index=(json.point % 2);
                    $('.yyybg').attr('src','images/yyybg'+index+'.png');
                    $('.num').attr('class','num yyynum'+index);
                    $('body').attr('class','changebg'+(json.point % 5));
                    $('.num').html(json.point);
                    $('.tipstxt').html("摇吧！！");
                    // $('#result').html('摇吧！！');
                }
            }
        });
    }
    function addshakeevent(){
        var myShakeEvent = new Shake({
            threshold: 15,
            timeout:100
        });
        myShakeEvent.start();
        window.addEventListener('shake', login, false);
    }
</script>
</body>
</html>