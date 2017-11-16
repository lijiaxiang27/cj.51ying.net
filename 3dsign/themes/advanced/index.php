<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>欢迎来到3D签到！</title>
    <link rel="stylesheet" href="themes/advanced/css/3d.css">
    <link rel="stylesheet" href="themes/advanced/css/3dstyle.css" media="screen" type="text/css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
</head>
<style>
    body {
        padding: 0;
        margin: 0;
        font: 12px/18px microsoft yahei, arial;
        background-image: url('<?php echo $background==''?'themes/advanced/img/bg.jpg':$background; ?>');
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
<div class="ui" style="display:none">
	<input class="ui-input" type="text" />
	<span class="ui-return"></span> 
</div> 
<!-- <div class="loading">
    <div class="loading_card">
        <span class="loading_gif"><img src="themes/advanced/img/loading.png"/></span>
    </div>
</div> -->
<div class="signin_ecode">
    <a href="javascript:;"><img
            src="<?php echo $qrcode; ?>"
            class="ecode_img"></a>

    <p class="join_word">扫码关注、回复任意文字进行签到即可参与</p>
</div>
<input type="hidden" name="logo_base64" id="logo_base64" value=""/>

<div id="container"></div>
<canvas class="canvas" style="width:100%;height:100%;display:none"></canvas>
<!-- <span class="signBox">
    	<img src="" class="imgShow">
        <p class="nameLine">
            <strong class="name"></strong>
            <br/><br/>
            <span class="textLine"><i></i><span class="text_scrool"><u class="text"></u></span></span>
        </p>
</span> -->
<input type="hidden" id="maxid" name="maxid" value="<?php echo $maxid;?>">
<!-- <input type="hidden" id="mid" name="mid" value="1093"> -->
<script src="themes/advanced/js/2d.js?t=<?php echo rand(0,99999); ?>"></script>
<script type="text/javascript">
var maxperson=30;
 S.Drawing.init('.canvas');
    /* 默认图片列表 */
    var placeholder_image_arr = ["themes\/default\/img\/noavatar.jpg"];
        
    var placeholder_image_cnt = placeholder_image_arr.length;
    var placeholder_image_index = 0;
    var default_placeholder_image = "themes/default/img/noavatar.jpg";
/* 已经签到的用户列表 */
var personArray =<?php echo json_encode($signpeople);?>;
// var personArray =[{"nick_name":"fy","avatar":"http:\/\/wx.qlogo.cn\/mmopen\/gSoBWUTKfHzwxE8g6JM1UDNia33iausrbykahVU4Phmm527F0QiaIERosLzGsxPWgZMkK6tkuyH0UUYj9fStb8wCDYiaDc4RSnzic\/132"},{"nick_name":"fy","avatar":"http:\/\/wx.qlogo.cn\/mmopen\/HyKRlb7LHDq2Esibib8DnejIBXk8QFAv7oZHSG72KJviaBpeIEQctmAK6LQb9dMCylTZABI2YJO608HyiaodnwbsibbibfeVF4IP0h\/132"}];

var edit_personArray = new Array;
var placeholder_image = default_placeholder_image;
var table = new Array;
for (var i=0;i<maxperson;i++){
	table[i]=new Object();
	if(i<personArray.length){
		table[i] = personArray[i];
		table[i].src=personArray[i].avatar;
	}else{
		if (placeholder_image_cnt > 0){
			if (placeholder_image_index >= placeholder_image_cnt){
					placeholder_image_index = 0;
			}
			placeholder_image = placeholder_image_arr[placeholder_image_index];
			placeholder_image_index++;
		}
		table[i].src= placeholder_image;
	}
	table[i].p_x = i%30+1;
	table[i].p_y = Math.floor(i/30)+1;
}
//打乱数组顺序
table = table.sort(function(){return Math.random()});	
/* 动画墙显示 屏 列表 */
//var signwall_show_str = "米波网络|#sphere|#torus|#helix";
var signwall_show_str = "#icon <?php echo $signlogoimg;?>|#sphere|#torus|#helix";
/* 动画墙 切换时间？做什么用？ */
var show_interval = "0"; // 间隔时间
var return_array = new Array();
function getArrayItems(arr, num) {
    //新建一个数组,将传入的数组复制过来,用于运算,而不要直接操作传入的数组;
    var temp_array = new Array();
    for (var index in arr) {
        temp_array.push(arr[index]);
    }
    //取出的数值项,保存在此数组
    for (var i = 0; i<num; i++) {
        //判断如果数组还有可以取出的元素,以防下标越界
        if (temp_array.length>0) {
            //在数组中产生一个随机索引
            var arrIndex = Math.floor(Math.random()*temp_array.length);
            //将此随机索引的对应的数组元素值复制出来
            return_array[i] = temp_array[arrIndex];
            //然后删掉此索引的数组元素,这时候temp_array变为新的数组
            temp_array.splice(arrIndex, 1);
        } else {
            //数组中数据项取完后,退出循环,比如数组本来只有10项,但要求取出20项.
            return false;
        }
    }
    return return_array;
}
getArrayItems(personArray,50);
window.onload = function(){ 
	S.init();
	S.UI.simulate(signwall_show_str);
}
var signBox = $('.signBox'),
imgShow = $('.imgShow'),
newPic = new Array(),
signNo = 0,
className = " rightBottom ",
name,job,company,text,bowtie;
// setInterval(get_new_sign_list, 2000);
//   function get_new_sign_list(){
//   	var data = {};
//   	data.mid =  $('#max_id').val();
//   	$.ajax({
//   		url : "./index.php?i=2&c=entry&rid=9&do=new_qd&m=meepo_xianchang",
//   		dataType:"JSON",
//   		type:"GET",
//   		data:data,
//   		success:function(result){  
//   				if (result.mid){
//   					$('#max_id').val(result.mid);
//   				}  	
// 				if (result.omid < result.mid) { 
// 						personArray.push(result);
// 						$('.element').eq(personArray.length-1).find('img').attr('src',result.avatar);
//   				}
  			
//   		}//success
//   	});
	
// };
setInterval(function() {
	getArrayItems(personArray,50);
}, 10 * 1000);
</script>

<script type="text/javascript">
    // var sign_persons = parseInt(200);
    // if (sign_persons == 0) {
    //     sign_persons = 300;
    // }
    // var is_show_info = parseInt(1);
    // var personArray=<?php echo json_encode($signpeople);?>;


    // var edit_personArray = new Array;
    // var table = new Array;
    // var avatar = new Array;

    // for (var i = 0; i < sign_persons; i++) {
    //     table[i] = new Object();
    //     if (i < personArray.length) {
    //         if (typeof(personArray[i].avatar) == "undefined") {
    //             avatar[i] = "themes/advanced/img/noavatar.jpg";
    //         } else {
    //             avatar[i] = personArray[i].avatar;
    //         }
    //     } else {
    //         if (personArray.length == 0) {
    //             avatar[i] = "themes/advanced/img/noavatar.jpg";
    //         } else {
    //             avatar[i] = personArray[Math.floor(Math.random() * personArray.length)].avatar;
    //         }
    //     }
    //     table[i].src = avatar[i];
    //     table[i].p_x = i % 20 + 1;
    //     table[i].p_y = Math.floor(i / 20) + 1;
    // }
    // var table_time = parseInt(10);
    // var sphere_time = parseInt(20);
    // var helix_time = parseInt(20);
    // var grid_time = parseInt(20);
    // var text = "";
    // var line = 0;
    // var logo_url = "<?php echo $signlogoimg;?>";
    // var gap = parseInt(9);
    // if (gap == 0) {
    //     gap = 10;
    // }
</script>


<script src="themes/advanced/js/three.min.js"></script>
<script src="themes/advanced/js/tween.min.js"></script>
<script src="themes/advanced/js/CSS3DRenderer.js"></script>

<script src="themes/advanced/js/3d.js?t=<?php echo rand(0,99999); ?>"></script>

<script type="text/javascript">

		init();
		animate();
		transform( targets.table, 2000, 'table', 10);
		var signAlert = $("#signAlert");
	    /* 新增功能，头像弹窗的展示与关闭 */
		function addEventHandler(ele, event, hanlder) {
				if (ele.addEventListener) {
						ele.addEventListener(event, hanlder, false);
				} else if (ele.attachEvent) {
						ele.attachEvent("on"+event, hanlder);
				} else  {
						ele["on" + event] = hanlder;
				}
		 }
		function isNull(value) {
			if (typeof value === "undefined" || typeof value === "" || typeof value === "null" || value == "null" || value == null || value == "" || value == "undefined") {
				return true;
			} else {
				return false;
			}
		}

    // var signBox = $('.signBox');
    // var imgShow = $('.imgShow');
    // var newPic = new Array();
    // var signNo = 0;
    // var name;
    // var text;
    // setInterval(function () {
    //     if (newPic.length > 0) {
    //         var firstInfo = newPic.shift();
    //         var showImg = firstInfo.avatar;
    //         name = firstInfo.nickname;
    //         text = firstInfo.content;
    //         personArray.push(firstInfo);
    //         $('.element').eq(personArray.length - 1).find('img').attr('src', showImg);
    //     } else {
    //         if (personArray.length > 0) {
    //             showImg = personArray[signNo].avatar;
    //             name = personArray[signNo].nickname;
    //             text = personArray[signNo].content;
    //             signNo = signNo == personArray.length - 1 ? 0 : signNo + 1;
    //         }
    //     }
    //     if (is_show_info == 1) {
    //         if (personArray.length > 0) {
    //             // signBox.addClass('imgAnimate').show();
    //             // setTimeout(function () {
    //             //     signBox.hide()
    //             // }, 6000);
    //             imgShow.attr('src', showImg);
    //             $('.name').html(name);
    //             text=(text==null|| text=='')?'签到':text;
    //             $('.text').html(text);
    //             if (text.length > 12) {
    //                 $('.text').addClass('scrollAnitame');
    //             } else {
    //                 $('.text').removeClass('scrollAnitame');
    //             }
    //         }
    //     }
    // }, 10000);
</script>

<script type="text/javascript">
// var logo_url = "<?php echo $signlogoimg;?>";
    var new_signer = new Audio();
    new_signer.src = "themes/advanced/img/new_signer.mp3";
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
                if(personArray.length>maxperson){
                    personArray.slice(personArray.length-30);
                }
                //播放新用户签到声
                new_signer.play();
                // newPic=newPic.concat(json.people);
                
                for(var i=0,l=json.people.length;i<l;i++){
                    for(var i=0,l=$('.element').length;i<l-1;i++){
                        var src=$('.element').eq(i+1).find('img').attr('src');
                        $('.element').eq(i).find('img').attr('src',src);
                    }
                    $('.element').eq(maxperson-1).find('img').attr('src',json.people[i].avatar);
                }
                
            }
        });
    }
    $(document).ready(function () {
    //     S.init();
    //     S.ShapeBuilder.imageFile(logo_url, function (obj) {
    //         if (obj.error == '-1') {
    //             var obj = S.ShapeBuilder.letter(text);
    //             var type = 'text';
    //         } else {
    //             var type = 'logo';
    //         }
    //         init(type, obj);
    //         animate();
    //         $('.loading').hide();
    //         transform(targets.table, 2000, 0, table_time);
    //     });

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