<?php
@$action = $_GET["action"];
@$bakurl = $_GET["url"];
if (!$bakurl) {
    $bakurl = 'index.php';
}
require 'db.php';
if ($action == 'verify') {
    $screenpaw = $xuanzezu['screenpaw'];
    if ($screenpaw == $_POST['paw']) {
        require_once('../common/session_helper.php');
        $_SESSION['views'] = true;
        header('location:'.$bakurl);
    } else {
    	header('location:./login.php');
    }
} else {

    ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>微信上墙|微信墙|微信大屏幕</title>
<link rel="stylesheet" type="text/css" href="css/wxsq.css" />
<script src="../files/js/jquery-1.10.2.min.js" type="text/javascript" charset="utf-8"></script>
<style>
html { width: 100%; height: 100%; }
body { margin: 0; padding: 0; height: 100%; width: 100%; background-repeat: no-repeat; background-size: cover; overflow: hidden; font-family: Microsoft YaHei, Helvitica, Verdana, Tohoma, Arial, san-serif; }
</style>
</head>

<!-- <body style="background:url(images/bgimg.jpg) no-repeat;"> -->
<body data-vide-bg="http://www.804cs.com/attachment/videos/9/2017/02/IV1bMZQ827CB1k0MVB1471ggX0QeQk.mp4">
	<div class="loginform">
        <div class="forminfo">
        	<form action="login.php?action=verify" method="post">
            <div class="logintit">请输入本次活动的开场密码</div>
            <input id="login-pass" name="paw" type="password" placeholder="Password(默认：admin)" class="inputstyle" />
            <button id="login-submit" type="submit"  class="button-login">开始活动</button>
        	</form>
        </div>
        <div class="whitebg"></div>    
    </div>
    <script src="../files/js/jquery.video.js"></script>
</body>

</html>
<?php } ?>