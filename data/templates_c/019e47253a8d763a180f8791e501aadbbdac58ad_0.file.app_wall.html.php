<?php
/* Smarty version 3.1.29, created on 2017-06-19 04:28:32
  from "E:\website\cj.51ying.net\mobile\template\app_wall.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_594736d058caa1_72260015',
  'file_dependency' => 
  array (
    '019e47253a8d763a180f8791e501aadbbdac58ad' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\app_wall.html',
      1 => 1497837486,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_594736d058caa1_72260015 ($_smarty_tpl) {
?>

<style>

html {
	font-family: sans-serif;
	-ms-text-size-adjust: 100%;
	-webkit-text-size-adjust: 100%
}

body {
	margin: 0
}

h1 {
	margin: 0;
	padding: 0
}

body, html {
	width: 100%;
	height: 100%;
	font-family: Helvetica Neue, Helvetica, Arial, Microsoft YaHei,
		\\5FAE\8F6F\96C5\9ED1, STXihei, \\534E\6587\7EC6\9ED1, serif
}

article, aside, details, figcaption, figure, footer, header, hgroup,
	main, menu, nav, section, summary {
	display: block
}

audio, canvas, progress, video {
	display: inline-block;
	vertical-align: baseline
}

audio:not ([controls] ){
	display: none;
	height: 0
}

[hidden], template {
	display: none
}

a {
	background-color: transparent;
	text-decoration: none;
	-webkit-tap-highlight-color: transparent
}

a:active, a:hover, a:visited {
	text-decoration: none;
	outline: 0
}

abbr[title] {
	border-bottom: 1px dotted
}

b, strong {
	font-weight: 700
}

dfn {
	font-style: italic
}

h1 {
	font-size: 2em;
	margin: .67em 0
}

mark {
	background: #ff0;
	color: #000
}

small {
	font-size: 80%
}

sub, sup {
	font-size: 75%;
	line-height: 0;
	position: relative;
	vertical-align: baseline
}

sup {
	top: -.5em
}

sub {
	bottom: -.25em
}

img {
	border: 0
}

svg:not (:root ){
	overflow: hidden
}

figure {
	margin: 1em 40px
}

hr {
	box-sizing: content-box;
	height: 0
}

pre {
	overflow: auto
}

code, kbd, pre, samp {
	font-family: monospace;
	font-size: 1em
}

button, input, optgroup, select, textarea {
	color: inherit;
	font: inherit;
	margin: 0
}

button {
	overflow: visible
}

button, select {
	text-transform: none
}

button, html input[type=button], input[type=reset], input[type=submit] {
	-webkit-appearance: button;
	cursor: pointer
}

button[disabled], html input[disabled] {
	cursor: default
}

button::-moz-focus-inner {
	border: 0;
	padding: 0
}

textarea {
	line-height: normal
}

textarea::-moz-focus-inner {
	border: 0;
	padding: 0
}

input[type=checkbox], input[type=radio] {
	box-sizing: border-box;
	padding: 0
}

input[type=number]::-webkit-inner-spin-button, input[type=number]::-webkit-outer-spin-button
	{
	height: auto
}

input[type=search] {
	-webkit-appearance: textfield;
	box-sizing: content-box
}

input[type=search]::-webkit-search-cancel-button, input[type=search]::-webkit-search-decoration
	{
	-webkit-appearance: none
}

fieldset {
	border: 1px solid silver;
	margin: 0 2px;
	padding: .35em .625em .75em
}

legend {
	border: 0;
	padding: 0
}

textarea {
	overflow: auto
}

optgroup {
	font-weight: 700
}

td, th {
	padding: 0
}

.native-scroll {
	overflow: auto;
	-webkit-overflow-scrolling: touch
}

[hidefocus], body, button, input, keygen, legend, select, summary,
	textarea {
	outline: 0
}

* {
	border: 0;
	margin: 0;
	padding: 0
}

*, :after, :before {
	box-sizing: border-box
}

body, html {
	width: 100%;
	height: 100%
}

img {
	max-width: 100%;
	width: auto\9;
	height: auto;
	-ms-interpolation-mode: bicubic
}

@media ( max-width :640px) {
	.goods-show {
		width: 100%;
		margin: 10px 0
	}
}

@media ( min-width :641px) {
	.goods-show {
		width: 45%;
		margin: 2.5%
	}
}

dd, div, dl, dt, form, h1, h2, h3, h4, h5, img, li, p, ul {
	border: 0 none;
	list-style: outside none none;
	margin: 0;
	padding: 0
}

body {
	background: #f7f7f7;
	color: #555;
	font-size: 18px;
	margin: 0 auto;
	max-width: 640px
}

body, dd, div, dl, dt, fieldset, form, h1, h2, h3, h4, h5, h6, img, li,
	ol, p, table, td, ul {
	margin: 0;
	padding: 0;
	border: 0
}

* {
	margin: 0;
	outline: 0 none;
	padding: 0;
	vertical-align: baseline
}

body, div.navbar, header {
	margin: auto;
	max-width: 640px
}

body {
	color: #666;
	font-family: Helvetica, STHeiti STXihei, Microsoft JhengHei,
		Microsoft YaHei, Arial;
	font-size: 14px;
	line-height: 1.5
}

#loading {
	width: 100%;
	height: 36px;
	border-radius: 2px;
	padding-top: 10px;
	margin-top: 10px;
	text-align: center
}

#loading .blank {
	height: 12px;
	width: 12px;
	border-radius: 50%;
	border-top: 1px solid rgba(0, 0, 0, .5);
	border-left: 1px solid rgba(0, 0, 0, .3)
}

#loading #load_text, #loading .blank {
	display: inline-block
}

#loading #bounce {
	animation: beChange 1s infinite ease-in-out;
	-moz-animation: beChange 1s infinite ease-in-out;
	-webkit-animation: beChange 1s infinite ease-in-out;
	-o-animation: beChange 1s infinite ease-in-out
}

.chatContainer {
	position: relative;
	height: 100%
}

.imageMask {
	border-radius: 10px;
	width: 95%
}

.imageMask, .imageMask2 {
	position: absolute;
	height: 100%;
	background-color: #000;
	opacity: .4;
	z-index: 1000000000000000000
}

.imageMask2 {
	width: 100%
}

.messageLoadingBox {
	position: absolute;
	height: 50px;
	width: 50%;
	top: 50%
}

.messageLoading {
	z-index: 100000000000000000000;
	right: -10px !important;
	top: -10px !important;
	height: 25px;
	width: 25px
}

.messageFailedBox {
	position: absolute;
	height: 50px;
	width: 50%;
	top: 50%;
	right: 100%
}

.messageFailed {
	z-index: 100000000000000000000;
	right: 5px !important;
	top: -10px !important;
	height: auto;
	width: 25px
}

.checkMoreMessage {
	margin-top: 20px;
	width: 100%;
	height: 20px;
	font-size: 15px;
	text-align: center;
	position: relative
}

.chatBanner {
	background-color: #EEE;
	position: fixed;
	top: 0;
	z-index: 100;
	width: 100%;
	max-width: 640px;
	height: 52px;
	font-size: 15px
}

.chatBackIcon {
	width: 8%;
	height: 20px;
	margin-left: 2%;
	margin-top: 9px
}

.chatPinduoduoLogo {
	display: inline-block;
	width: 15%;
	height: auto;
	margin-left: 0
}

.chatMallName {
	display: inline-block;
	width: 100%;
	text-align: center;
	line-height: 52px;
	font-size: 15px;
	color: gray
}

.chatToMall {
	position: absolute;
	top: 8px;
	right: 10px;
	height: 18px;
	width: auto
}

.chatRedDot {
	width: 12px;
	height: 12px;
	border-radius: 12px;
	-webkit-border-radius: 12px;
	background-color: #c00;
	position: absolute;
	right: -5px
}

.chatTimeShow {
	display: table;
	margin-left: auto;
	margin-right: auto;
	position: relative;
	width: auto;
	padding: 2px 4px;
	height: 20px;
	line-height: 20px;
	font-size: 12px;
	color: #fff;
	text-align: center;
	background-color: #d3d3d3;
	margin-bottom: 15px;
	border-radius: 5px
}

.messageToSend {
	position: fixed;
	width: 100%;
	max-width: 640px;
	background-color: #f4f4f6;
	bottom: 0;
	border-top: 1px solid #d7d8d8
}

.messageContent {
	width: 70%;
	height: 34px;
	margin-top: 6px;
	margin-left: 10px;
	border: 1px solid #e6e6e6;
	font-size: 15px !important;
	background-color: #fff
}

.chatMessageSend {
	display: inline-block;
	float: right;
	margin-right: 5px;
	width: 68px;
	height: 30px;
	margin-top: 8px;
	border: 1px solid #999;
	border-radius: 5px;
	background-color: #fff;
	font-size: 13px;
	line-height: 30px;
	color: #999;
	font-family: Arial, Microsoft YaHei, \\9ED1\4F53, \\5B8B\4F53,
		sans-serif
}

.sendExpression {
	width: 30px;
	height: 30px;
	margin-top: 5px;
	border-radius: 30px;
	-webkit-border-radius: 30px;
	margin-left: 5px
}

.messageContainer {
	padding-top: 40px;
	padding-bottom: 60px;
	position: relative;
	width: 100%;
	max-width: 640px;
	height: 100%;
	overflow-y: scroll
}

.messageShow {
	display: block;
	margin-top: 10px;
	overflow: auto
}

.chatMallMessage, .messageShow {
	width: 100%;
	height: auto;
	position: relative
}

.chatMallAvatar {
	display: inline-block;
	height: 40px;
	width: 40px;
	margin-left: 15px;
	border: 1px solid #e6e6e6
}

.chatLeftContent {
	display: inline-block;
	position: relative
}

.chatLeftContent img {
	position: absolute;
	left: -2px;
	top: 10px
}

.chatLeftContent p {
	float: left;
	border-radius: 5px;
	padding: 10px 15px;
	margin-left: 10px;
	white-space: normal;
	background-color: #fff;
	word-break: break-all;
	max-width: 200px;
	font-size: 14px
}

.messagePic {
	margin-right: 10px;
	background-color: #a0e75a
}

.messagePic, .messagePicLeft {
	border-radius: 10px;
	padding: 0 5px;
	width: auto;
	height: auto
}

.messagePicLeft {
	margin-left: 10px;
	background-color: #fff
}

.chatPic {
	right: 0 !important
}

.chatPic, .chatPicLeft {
	position: relative !important;
	top: 5px !important;
	margin-bottom: 10px;
	width: 150px;
	height: auto
}

.chatPicLeft {
	left: 0 !important
}

.customerMessage {
	width: 100%;
	position: relative;
	overflow: auto;
	padding: 5px 0
}

.chatUserAvatar {
	position: absolute;
	right: 15px;
	height: 40px;
	width: 40px;
	border: 1px solid #e6e6e6
}

.chatRightContent {
	display: inline-block;
	position: relative;
	float: right;
	margin-right: 60px
}

.chatRightContent .arrow {
	position: absolute;
	right: -2px;
	top: 10px
}

.chatRightContent p {
	float: right;
	border-radius: 5px;
	padding: 10px 15px;
	margin-right: 10px;
	white-space: normal;
	background-color: #a0e75a;
	word-break: break-all;
	max-width: 200px;
	font-size: 14px
}

.sendPicOrVideo {
	width: 100%;
	height: 100%;
	opacity: 0
}

img {
	border: 0 none;
	vertical-align: top
}

</style>
<?php echo '<script'; ?>
 type="text/javascript"
	src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
var user_avatar = "<?php echo $_smarty_tpl->tpl_vars['user']->value['avatar'];?>
";
var openid="<?php echo $_smarty_tpl->tpl_vars['user']->value['openid'];?>
";
<?php echo '</script'; ?>
>
</head>
<link rel="stylesheet" href="template/app/css/weui.min.css">
<link rel="stylesheet" href="template/app/css/jquery-weui.min.css">
<body>

	<div class="chatContainer">
		<div class="messageContainer">
			<div class="messageInnerContainer">
				<div class="checkMoreMessage">...点击查看历史消息...</div>
			</div>
		</div>
		<div class="messageToSend">
			<div id="dt_review_box_main">
				<div id="dt_review_box_input">
					<textarea type="text" placeholder="请输入您想说的话"
						id="dt_review_form_content" class="input" onpaste="return false"
						oncontextmenu="return false" oncopy="return false"
						oncut="return false" maxlength="200"></textarea>
				</div>
				<div id="dt_review_box_emo_button" ontouchstart="">
					<img src="template/app/images/express.png">
				</div>
				<div id="dt_review_box_button" style="display: none">
					<button id="dt_review_form_post" class="button_1_disabled"
						ontouchstart="">发送</button>
				</div>
				<button type="button" id="imgBtn" class="send-btn img-btn sendPicBg"></button>

				<input type="file"  id="picFile" style="display:none;" onchange="readFile(this)" /> 
				<style>
.img-btn {
	right: 20px;
	background-image: url(template/app/images/w-icon-img.png);
	position: absolute;
	display: block;
	top: 5px;
	border: none;
	width: 30px;
	height: 30px;
	background-color: transparent;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: 30px;
}
</style>
				<div style="display: none;" id="dt_review_box_emo"></div>
				<div class="clear"></div>
			</div>

		</div>
	</div>
	<style>

/*评论弹窗*/
.button_1 {
	font-size: 18px;
	color: #ffffff;
	line-height: 20px;
	text-align: center;
	border: 1px solid #666666;
	background-color: #ff6600;
	padding: 10px 0;
}

.button_1:active {
	background-color: #d55500;
}

.button_1_disabled {
	font-size: 18px;
	color: #eeeeee;
	line-height: 20px;
	text-align: center;
	border: 1px solid #666666;
	background-color: #ff6600;
	padding: 10px 0;
}

#dt_review_box {
	display: none;
	position: fixed;
	left: 0;
	bottom: -500px;
	z-index: 2000;
	width: 100%;
	background-color: #dddddd;
	padding-bottom: 500px;
}

#dt_review_box_main {
	position: relative;
	margin: 3px 8px 8px;
}

#dt_review_box_emo_button, #dt_review_box_emo_button_active {
	position: absolute;
	left: 0;
	top: 0;
	width: 34px;
	overflow: hidden;
}

#dt_review_box_emo_button img, #dt_review_box_emo_button_active img {
	width: 30px;
	height: 30px;
	margin-top: 6px;
}

#dt_review_box_emo_button:active {
	filter: alpha(opacity = 0);
	-moz-opacity: 0;
	opacity: 0;
}

#dt_review_box_input {
	margin: 0 70px 0 38px;
	border: 1px solid #ccc;
	background-color: #FFF;
	padding: 8px 3px 8px;
	border-radius: 5px;
}

#dt_review_box_input textarea {
	width: 100%;
	overflow: hidden;
	border: 1px solid #FFF;
	height: 22px;
}

#dt_review_box_button {
	position: absolute;
	right: 0;
	top: 0;
	width: 68px;
	text-align: right;
}

#dt_review_box_button button {
	margin-top: 1px;
	width: 60px;
	height: 38px;
	overflow: hidden;
	font-size: 14px;
	background-color: rgb(239, 50, 55);
	border-radius: 5px;
	color: #FFF;
	cursor: pointer;
	border: none;
	float: right;
}

#dt_review_box_button button:active {
	background-color: #0082c6;
}

#dt_review_box_emo {
	display: none;
	padding-top: 8px;
}

ul {
	list-style: none outside none;
}

li {
	display: list-item;
	text-align: -webkit-match-parent;
}

ul, li {
	margin: 0;
	padding: 0
}

.emo {
	float: left;
	padding: 12px;
}

.emo:active {
	border: 1px solid #999999;
	padding: 11px;
	background-color: #FFF;
}

.emo img {
	width: 24px;
	height: 24px;
}

.dt_emo {
	width: 24px;
	height: 24px;
}

textarea {
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}

</style>

	<?php echo '<script'; ?>
>

;(function($) {
    if (typeof $ === 'undefined') {
        return;
    }

    var Chat = function(selector, opts){
        this.$el = $(selector);
        this.uniqueId = 0;
        this._extend(opts);
        this._initialize();
    };
    Chat.prototype = {
        $: function(selector){
            return this.$el.find(selector);
        },
        _extend: function(opts){
            for(var p in opts){
                this[p] = opts[p];
            }
        },
        _initialize: function() {
            if(this.initialize){
                this.initialize.call(this);
            }
        },
        bindEvent: function() {
            var that = this;
            var $el = that.$el;

            $el.off();
            $el.on('focus blur keyup keydown', '#dt_review_form_content', function(e){
                if ($(this).val() !== '') {
                    that.showSendBtn();
                } else {
                    that.hideSendBtn();
                }
            });
            
        },
        

        showSendBtn: function(){
            this.$('#imgBtn').hide();
            //this.$('.moxie-shim').hide();
            this.$('#dt_review_box_button').show();
        },
        hideSendBtn: function () {
            //if (!Global.ContentType || (Global.ContentType && Global.ContentType==10)) {
                this.$('#dt_review_box_button').hide();
            //}
            this.$('#imgBtn').show();
            //this.$('.moxie-shim').show();
        },
        
        
        
    
    };
    window.Chat = Chat;
})(window.jQuery);
$(function() {
    new Chat('#dt_review_box_main', {
        message: null,
        prichat: null,
        initialize: function(){
            var that = this;
            that.bindEvent();
           
        }
    });
});
$(document).ready(function(){
$('#dt_review_form_post').on('click',function(){
   var content =_common._trim($("#dt_review_form_content").val());
   if (content == "") {
	  _loading_toast._show('请先输入内容！');
	  $("#dt_review_form_content").focus()
      return;
   }
   _meepoajax._ajax({
				do_it:'msg_send',
				type: "POST",                        
				dataType: 'JSON',      
				cache: false,                 
				formPata:{'openid':openid,'content':content},
				success:function(data) {
						if(data.errno==0){
						  _loading_toast._show(data.message.tip);
						  $('#imgBtn').show();
						  $('#dt_review_box_button').hide();
							var html = '<div class="messageShow">'+
							'<div class="customerMessage">'+
								'<div class="chatTimeShow">'+n()+
									
								'</div>'+
								'<img class="chatUserAvatar" src="'+user_avatar+'">'+
								'<div class="chatRightContent">'+
									'<img class="arrow" src="template/app/images/chat_right.png">'+
									
									'<p >'+data.message.content+'</p>'+
									
								'</div>'+
							'</div>'+
						'</div>';
							if($('.messageShow').length>0){
								$(".messageInnerContainer").append(html);
							}else{
								 $(".checkMoreMessage").after(html);
							}
						}else{
							_loading_toast._show(data.message);
						}
						setTimeout("scrollTop()",100);
						_emo._hide("dt_review_box_emo");
						$('#dt_review_form_content').val('');
				}
		});
   
	
	
   
})
$('#dt_review_box_emo_button').click(function() {
	_emo._show("dt_review_box_emo", function(index) {
      $("#dt_review_form_content").val($("#dt_review_form_content").val() + _emo._text[index]);
    });
})
$('.checkMoreMessage').click(function() {
		//_loading_toast._show('loading....');
		var page = $('.messageShow').length;
		_meepoajax._ajax({
				do_it:'msg_getmore',
				type: "POST",                        
				dataType: 'json',      
				cache: false,                 
				formPata:{'openid':openid,'page':page},
				success:function(data) {
						if(data.errno==0){
							if(data.message.length>0){
								 var html = '';
								 data.message = data.message.reverse();
								 for (var i = 0; i < data.message.length; i++) {
									 var obj = data.message[i];
									 if(obj.type==2){
										var news = '<div class="messagePic" onclick="preview(this)" data-num="'+obj.image+'">'+
											'<img src="'+obj.content+'" class="chatPic" >'+
										'</div>';
									 }else{
										var news = '<p >'+obj.content+'</p>';
									 }
									 html += '<div class="messageShow">'+
										'<div class="customerMessage">'+
											'<div class="chatTimeShow">'+n(obj.createtime)+
												
											'</div>'+
											'<img class="chatUserAvatar" src="'+user_avatar+'">'+
											'<div class="chatRightContent">'+
												'<img class="arrow" src="template/app/images/chat_right.png">'+ news +
											'</div>'+
										'</div>'+
									'</div>';
									
								 }
								 $(".checkMoreMessage").after(html);
								 setTimeout("scrollTop()",100);
							}else{
								_loading_toast._show('加载完了!');
								$('.checkMoreMessage').remove();
							}
						}else{
							_loading_toast._show(data.message);
							
						}
				}
		});
});

})
function preview(b){
	 var img = b.getAttribute('data-num');
	if("undefined" != typeof img && ''!=img){
		wx.previewImage({
		  current:img,
		  urls: [img]
		
		});
	}

}
function scrollTop(){
$(".messageContainer").scrollTop($(".messageContainer")[0].scrollHeight - $(".messageContainer")[0].clientHeight)
}
var _emo= {
    _text: ["[笑脸]", "[感冒]", "[流泪]", "[发怒]", "[爱慕]", "[吐舌]", "[发呆]", "[可爱]", "[调皮]", "[寒冷]", "[呲牙]", "[闭嘴]", "[害羞]", "[苦闷]", "[难过]", "[流汗]", "[犯困]", "[惊恐]", "[咖啡]", "[炸弹]", "[西瓜]", "[爱心]", "[心碎]"],
    _indexOf: function(text) {
        if (_emo._text.indexOf) {
			
            return _emo._text.indexOf(text);
        }
        for (var i = 0, _len = _emo._text.length; i < _len; i++) {
            if (_emo._text[i] == text) {
                return i;
            }
        }
        return -1;
    },
    _insertFun: null,
    _show: function(id, fun) {
        _emo._insertFun = fun;
        if ($("#" + id).children().length == 0) {
            var _html = "<ul>";
            for (var i = 0; i < 23; i++) {
                 _html += "<li class='emo' ontouchstart='' onclick='_emo._insert(" + i + ")'><img src='" + 'template/app/' + "/emo/" + (i + 1) + ".png'></li>";
            }
            _html += "</ul>";
            $("#" + id).html(_html);
        }
		
			$("#" + id).slideToggle();
		
    },
    _hide: function(id) {
        $("#" + id).hide();
    },
    _insert: function(index) {
		if($('#imgBtn').css('display')=='block'){
			$('#imgBtn').hide();
			$('#dt_review_box_button').show();
		}
        (_emo._insertFun)(index);
    },
    _toCode: function(content) {
        return content.replace(/\[[\u4e00-\u9fa5]{1,2}\]/g, function(a) {
            var _code = _emo._indexOf(a) + 1;
            return _code == 0 ? a : "[/" + _code + "]";
        });
    }
};
 var images = {
    localId: [],
    serverId: []
  };
 function getfileextension(filename){
	var filetypes=['jpg','jpeg','png'];
	var extension=filename.split('.');
	extension=extension[extension.length-1];
	for(var i=0,l=filetypes.length;i<l;i++){
		if(extension==filetypes[i]){
			return filetypes[i];
		}
	}
	return false;
 }
 function readFile(obj){ 
	var file = obj.files[0]; 	
	//判断类型是不是图片
	if(!/image\/\w+/.test(file.type)){   
        alert("请确保文件为图像类型"); 
        return false; 
	} 
	var extension=getfileextension(file['name']);
	var reader = new FileReader(); 
	reader.readAsDataURL(file);
	reader.onload = function(e){
		var self=this;
		var maxfilesize=256*1024;
		var maxWidth=800;
		var maxheight=600;
		if(file.size>maxfilesize){//文件大于256k
			var _ir=ImageResizer({
                resizeMode:"auto",
                dataSource:self.result,
                dataSourceType:"base64",
                maxWidth:800, //允许的最大宽度
                maxHeight:600, //允许的最大高度。
                onTmpImgGenerate:function(img){
                },
                success:function(resizeImgBase64,canvas){
                	
                	uploadimg(resizeImgBase64,extension);
			    
                }
            });
		}else{
			uploadimg(this.result,extension);
		} 
	} 
} 
 $('.sendPicBg').click(function(){
	 $('#picFile').click();
	 
 });
 
 function uploadimg(imgbase64,extension){
	 var html = '<div class="messageShow">'+
		'<div class="customerMessage">'+
			'<div class="chatTimeShow">'+n()+
			'</div>'+
			'<img class="chatUserAvatar" src="'+user_avatar+'">'+
			'<div class="chatRightContent">'+
				'<img class="arrow" src="template/app/images/chat_right.png">'+
				'<div class="messagePic">'+
            '<img src="template/app/images/loading.gif" class="chatPic">'+
        '</div>'+
			'</div>'+
		'</div>'+
	'</div>';
	$(".messageInnerContainer").append(html);
	_meepoajax._ajax({
	do_it:'msg_uploadimg',
	type: "POST",                        
	dataType: 'json',      
	cache: false,                 
	formPata:{'msg_send':openid,'imgbase64':imgbase64,'filetype':extension},
	success:function(data) {
			if(data.errno==0){
				_loading_toast._show(data.message.tip);
				if($('.messageShow').length>0){
					var messages=$('.messageShow');
					$(messages[messages.length-1]).find('.chatPic').attr('src',data.message.picurl);
				}else{
					 $(".checkMoreMessage").after(html);
				}
				setTimeout("scrollTop()",100);
				_emo._hide("dt_review_box_emo");
			}else{
				_loading_toast._show(data.message);
				
			}
	}
	});
 }
 var ImageResizer=function(opts){
	    var settings={
	        resizeMode:"auto"//压缩模式，总共有三种  auto,width,height auto表示自动根据最大的宽度及高度等比压缩，width表示只根据宽度来判断是否需要等比例压缩，height类似。  
	        ,dataSource:"" //数据源。数据源是指需要压缩的数据源，有三种类型，image图片元素，base64字符串，canvas对象，还有选择文件时候的file对象。。。  
	        ,dataSourceType:"image" //image  base64 canvas
	        ,maxWidth:500 //允许的最大宽度
	        ,maxHeight:500 //允许的最大高度。
	        ,onTmpImgGenerate:function(img){} //当中间图片生成时候的执行方法。。这个时候请不要乱修改这图片，否则会打乱压缩后的结果。  
	        ,success:function(resizeImgBase64,canvas){

	        }//压缩成功后图片的base64字符串数据。
	    };
	    var appData={};
	    $.extend(settings,opts);

	    var innerTools={
	        getBase4FromImgFile:function(file,callBack){

	            var reader = new FileReader();
	            reader.onload = function(e) {
	                var base64Img= e.target.result;
	                if(callBack){
	                    callBack(base64Img);
	                }
	            };
	            reader.readAsDataURL(file);
	        },

	        //--处理数据源。。。。将所有数据源都处理成为图片对象，方便处理。
	        getImgFromDataSource:function(datasource,dataSourceType,callback){
	            var _me=this;
	            var img1=new Image();
	            if(dataSourceType=="img"||dataSourceType=="image"){
	                img1.src=$(datasource).attr("src");
	                if(callback){
	                    callback(img1);
	                }
	            }
	            else if(dataSourceType=="base64"){
	                img1.src=datasource;
	                if(callback){
	                	img1.onload=function(){
	                		callback(img1);
	                	}
	                }
	            }
	            else if(dataSourceType=="canvas"){
	                img1.src = datasource.toDataURL("image/jpeg");
	                if(callback){
	                    callback(img1);
	                }
	            }
	            else if(dataSourceType=="file"){
	                _me.getBase4FromImgFile(function(base64str){
	                    img1.src=base64str;
	                    if(callback){
	                        callback(img1);
	                    }
	                });
	            }
	        },

	        //计算图片的需要压缩的尺寸。当然，压缩模式，压缩限制直接从setting里面取出来。
	        getResizeSizeFromImg:function(img){
	        	
	            var _img_info={
	                w:$(img)[0].naturalWidth,
	                h:$(img)[0].naturalHeight
	            };

	            var _resize_info={
	               w:0,
	               h:0
	            };

	            if(_img_info.w <= settings.maxWidth && _img_info.h <= settings.maxHeight){
	                return _img_info;
	            }
	            if(settings.resizeMode=="auto"){
	                var _percent_scale=parseFloat(_img_info.w/_img_info.h);
	                var _size1={
	                    w:0,
	                    h:0
	                };
	                var _size_by_mw={
	                    w:settings.maxWidth,
	                    h:parseInt(settings.maxWidth/_percent_scale)
	                };
	                var _size_by_mh={
	                    w:parseInt(settings.maxHeight*_percent_scale),
	                    h:settings.maxHeight
	                };
	                if(_size_by_mw.h <= settings.maxHeight){
	                    return _size_by_mw;
	                }
	                if(_size_by_mh.w <= settings.maxWidth){
	                    return _size_by_mh;
	                }

	                return {
	                    w:settings.maxWidth,
	                    h:settings.maxHeight
	                };
	            }
	            if(settings.resizeMode=="width"){
	                if(_img_info.w<=settings.maxWidth){
	                    return _img_info;
	                 }
	                var _size_by_mw={
	                    w:settings.maxWidth
	                    ,h:parseInt(settings.maxWidth/_percent_scale)
	                };
	                return _size_by_mw;
	            }
	            if(settings.resizeMode=="height"){
	                if(_img_info.h<=settings.maxHeight){
	                    return _img_info;
	                }
	                var _size_by_mh={
	                    w:parseInt(settings.maxHeight*_percent_scale)
	                    ,h:settings.maxHeight
	                };
	                return _size_by_mh;
	            }
	        },

	        //--将相关图片对象画到canvas里面去。
	        drawToCanvas:function(img,theW,theH,realW,realH,callback){

	        var canvas = document.createElement("canvas");
	            canvas.width=theW;
	            canvas.height=theH;
	            var ctx = canvas.getContext('2d');
	            ctx.drawImage(img,
	                0,//sourceX,
	                0,//sourceY,
	                realW,//sourceWidth,
	                realH,//sourceHeight,
	                0,//destX,
	                0,//destY,
	                theW,//destWidth,
	                theH//destHeight
	            );

	            //--获取base64字符串及canvas对象传给success函数。
	            var base64str=canvas.toDataURL("image/png");
	            if(callback){
	                callback(base64str,canvas);
	            }
	        }
	    };

	    //--开始处理。
	    (function(){
	        innerTools.getImgFromDataSource(settings.dataSource,settings.dataSourceType,function(_tmp_img){
	            var __tmpImg=_tmp_img;
	            settings.onTmpImgGenerate(_tmp_img);

	            //--计算尺寸。
	            var _limitSizeInfo=innerTools.getResizeSizeFromImg(__tmpImg);
	            var _img_info={
	                w:$(__tmpImg)[0].naturalWidth,
	                h:$(__tmpImg)[0].naturalHeight
	            };
	            innerTools.drawToCanvas(__tmpImg,_limitSizeInfo.w,_limitSizeInfo.h,_img_info.w,_img_info.h,function(base64str,canvas){  
	              settings.success(base64str,canvas);
	            });
	        });
	    })();

	    var returnObject={


	    };

	    return returnObject;
	};

	function dataURLtoBlob(dataurl) {
	    var arr = dataurl.split(','), mime = arr[0].match(/:(.*?);/)[1],
	        bstr = atob(arr[1]), n = bstr.length, u8arr = new Uint8Array(n);
	    while(n--){
	        u8arr[n] = bstr.charCodeAt(n);
	    }
	    return new Blob([u8arr], {type:mime});
	}

<?php echo '</script'; ?>
><?php }
}
