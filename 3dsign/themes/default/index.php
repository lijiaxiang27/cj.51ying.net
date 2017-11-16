<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>欢迎来到3D签到！</title>
    <link rel="stylesheet" href="themes/default/css/3d.css">
    <link rel="stylesheet" href="themes/default/css/style.css" media="screen" type="text/css">
    <link rel="stylesheet" href="../wall/css/emoji.css" type="text/css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
</head>
<style>
    body {
        padding: 0;
        margin: 0;
        font: 12px/18px microsoft yahei, arial;
        background-image: url('themes/default/img/bg.jpg');
        background-size: 100% 100%;
        overflow: hidden;
    }

    .join_word {
        background-color: #000;
        color: #fff;
        text-align: Center;
        font-size: 24px;
        min-height: 40px;
        line-height: 40px;
        display: none;
        padding: 10px 0;
        word-break: break-all;
    }

    .loading {
        display: table;
        position: absolute;
        background-color: #333;
        opacity: 0.8;
        width: 100%;
        height: 100%;
        z-index: 999;
        text-align: center;
        vertical-align: middle;
    }

    .loading_card {
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        height: 100%;
    }
</style>
<body>
<div class="loading">
    <div class="loading_card">
        <span class="loading_gif"><img src="themes/default/img/loading.png"/></span>
    </div>
</div>
<div class="signin_ecode">
    <a href="javascript:;"><img
            src="<?php echo $qrcode; ?>"
            class="ecode_img"></a>

    <p class="join_word">扫码关注、回复任意文字进行签到即可参与</p>
</div>
<input type="hidden" name="logo_base64" id="logo_base64" value=""/>

<div id="container"></div>
<canvas class="canvas" style="width:100%;height:100%;display:none"></canvas>
<span class="signBox">
    	<img src="" class="imgShow">
        <p class="nameLine">
            <strong class="name"></strong>
            <br/><br/>
            <span class="textLine"><i></i><span class="text_scrool"><u class="text"></u></span></span>
        </p>
</span>
<input type="hidden" id="maxid" name="maxid" value="<?php echo $maxid;?>">
<!-- <input type="hidden" id="mid" name="mid" value="1093"> -->
<script type="text/javascript">
    var sign_persons = parseInt(200);
    if (sign_persons == 0) {
        sign_persons = 300;
    }
    var is_show_info = parseInt(1);
    var personArray=<?php echo json_encode($signpeople);?>;


    var edit_personArray = new Array;
    var table = new Array;
    var avatar = new Array;

    for (var i = 0; i < sign_persons; i++) {
        table[i] = new Object();
        if (i < personArray.length) {
            if (typeof(personArray[i].avatar) == "undefined") {
                avatar[i] = "themes/default/img/noavatar.jpg";
            } else {
                avatar[i] = personArray[i].avatar;
            }
        } else {
            if (personArray.length == 0) {
                avatar[i] = "themes/default/img/noavatar.jpg";
            } else {
                avatar[i] = personArray[Math.floor(Math.random() * personArray.length)].avatar;
            }
        }
        table[i].src = avatar[i];
        table[i].p_x = i % 30 + 1;
        table[i].p_y = Math.floor(i / 30) + 1;
    }
    var table_time = parseInt(10);
    var sphere_time = parseInt(20);
    var helix_time = parseInt(20);
    var grid_time = parseInt(20);
    var text = "";
    var line = 0;
    var logo_url = "<?php echo $signlogoimg;?>";
    var gap = parseInt(9);
    if (gap == 0) {
        gap = 10;
    }
</script>
<script src="themes/default/js/three.min.js"></script>
<script src="themes/default/js/tween.min.js"></script>
<script src="themes/default/js/CSS3DRenderer.js"></script>
<script src="themes/default/js/3d2.js?t=1468028036"></script>
<script src="themes/default/js/2d.js?t=1468028036"></script>
<script type="text/javascript">
    var signBox = $('.signBox');
    var imgShow = $('.imgShow');
    var newPic = new Array();
    var signNo = 0;
    var name;
    var text;
    setInterval(function () {
        if (newPic.length > 0) {
            var firstInfo = newPic.shift();
            var showImg = firstInfo.avatar;
            name = firstInfo.nickname;
            text = firstInfo.content;
            personArray.push(firstInfo);
            $('.element').eq(personArray.length - 1).find('img').attr('src', showImg);
        } else {
            if (personArray.length > 0) {
                showImg = personArray[signNo].avatar;
                name = personArray[signNo].nickname;
                text = personArray[signNo].content;
                signNo = signNo == personArray.length - 1 ? 0 : signNo + 1;
            }
        }
        if (is_show_info == 1) {
            if (personArray.length > 0) {
                signBox.addClass('imgAnimate').show();
                setTimeout(function () {
                    signBox.hide()
                }, 6000);
                imgShow.attr('src', showImg);
                $('.name').html(name);
                text=(text==null|| text=='')?'签到':text;
                $('.text').html(text);
                if (text.length > 12) {
                    $('.text').addClass('scrollAnitame');
                } else {
                    $('.text').removeClass('scrollAnitame');
                }
            }
        }
    }, 10000);
</script>

<script type="text/javascript">
    var new_signer = new Audio();
    new_signer.src = "themes/default/img/new_signer.mp3";
    setInterval('get_new_sign_list()', 5000);
    function get_new_sign_list() {
        var maxid=$('#maxid').val();
        $.ajax({
            url: "./ajax_act_get_new_sign.php?maxid="+maxid+"&t=" + Math.random(),
            dataType: "JSON",
            type: "get",
            success: function (json) {
                if(json.error<0){
                    return false;
                }
                $('#maxid').val(json.maxid);
                personArray=personArray.concat(json.people);
                //播放新用户签到声
                new_signer.play();
                newPic=newPic.concat(json.people);
            }
        });
    }
    $(document).ready(function () {
        S.init();
        S.ShapeBuilder.imageFile(logo_url, function (obj) {
            if (obj.error == '-1') {
                var obj = S.ShapeBuilder.letter(text);
                var type = 'text';
            } else {
                var type = 'logo';
            }
            init(type, obj);
            animate();
            $('.loading').hide();
            transform(targets.table, 2000, 0, table_time);
        });

        $('.signin_ecode .ecode_img').click(function () {
            if ($(this).css("opacity") == '0.5') {
                $(this).animate({height: "400px", width: "400px", opacity: '1'});
                $('.join_word').css({'width': "400px"});
                $('.join_word').css({'font-size': "16px"});
                $('.join_word').show();
            } else {
                $(this).animate({height: '50px', width: '50px', opacity: '0.5'});
                $('.join_word').hide();
            }
        });
    });

</script>
</body>
</html>