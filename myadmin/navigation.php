<?php
@header("Content-type: text/html; charset=utf-8");
require_once('../common/session_helper.php');
if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {

} else {
    $_SESSION['admin'] = false;
    echo "<script>window.location='login.php';</script>";
    die;
}
$url = $_SERVER['PHP_SELF'];
$filename = explode('/', $url);
$filename = end($filename);
include('../version.php');
include('db.php');
$cj = 0;
$shake = 0;
$vote = 0;
$qdq = 0;
$ddp = 0;
if (file_exists("cj.php")) {
    $cj = 1;
}

if (file_exists("shake.php")) {
    $shake = 1;
}
if (file_exists("vote.php")) {
    $vote = 1;
}

if (file_exists("../wall/qdq_plug/qdq_html.php")) {
    $qdq = 1;
}
if (file_exists("../wall/ddp_plug/ddp_html.php")) {
    $ddp = 1;
}
$weixin_configc = new M('weixin_config');
$weixin_config = $weixin_configc->find();
$weixin_switch = 1;
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>
        微信墙后台管理系统
    </title>
    <script>
        var web_root = "<?php echo Web_ROOT;?>";
        var root = "<?php echo "http://".$_SERVER ['HTTP_HOST'].substr($_SERVER['PHP_SELF'],0,strrpos($_SERVER['PHP_SELF'],'/'));?>";
    </script>
    <link href="stylesheets/bootstrap.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../wall/css/emoji.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/font-awesome.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/se7en-font.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/isotope.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/jquery.fancybox.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/fullcalendar.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/wizard.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/select2.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/morris.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/datatables.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/datepicker.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/timepicker.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/colorpicker.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/daterange-picker.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/typeahead.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/summernote.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/pygments.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/style.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/color/green.css" media="all" rel="alternate stylesheet" title="green-theme"
          type="text/css"/>
    <link href="stylesheets/color/orange.css" media="all" rel="alternate stylesheet" title="orange-theme"
          type="text/css"/>
    <link href="stylesheets/color/magenta.css" media="all" rel="alternate stylesheet" title="magenta-theme"
          type="text/css"/>
    <link href="../files/plugs/icheck-1.x/skins/all.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="stylesheets/color/gray.css" media="all" rel="alternate stylesheet" title="gray-theme" type="text/css"/>
    <link href="../files/plugs/introjs/introjs.min.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="../files/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="../files/js/jquery-ui.js" type="text/javascript"></script>
    <script src="../files/plugs/icheck-1.x/icheck.min.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap.min.js" type="text/javascript"></script>
    <script src="javascripts/raphael.min.js" type="text/javascript"></script>
    <script src="javascripts/selectivizr-min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.mousewheel.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.sampledata.js" type="text/javascript"></script>
    <script src="javascripts/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="javascripts/jquery.bootstrap.wizard.js" type="text/javascript"></script>
    <script src="javascripts/fullcalendar.min.js" type="text/javascript"></script>
    <script src="javascripts/gcal.js" type="text/javascript"></script>
    <script src="javascripts/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="javascripts/datatable-editable.js" type="text/javascript"></script>
    <script src="javascripts/jquery.easy-pie-chart.js" type="text/javascript"></script>
    <script src="javascripts/excanvas.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.isotope.min.js" type="text/javascript"></script>
    <script src="javascripts/isotope_extras.js" type="text/javascript"></script>
    <script src="javascripts/modernizr.custom.js" type="text/javascript"></script>
    <script src="javascripts/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="javascripts/select2.js" type="text/javascript"></script>
    <script src="javascripts/styleswitcher.js" type="text/javascript"></script>
    <script src="javascripts/wysiwyg.js" type="text/javascript"></script>
    <script src="javascripts/summernote.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.inputmask.min.js" type="text/javascript"></script>
    <script src="javascripts/jquery.validate.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-fileupload.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-timepicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-colorpicker.js" type="text/javascript"></script>
    <script src="javascripts/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="javascripts/typeahead.js" type="text/javascript"></script>
    <script src="javascripts/daterange-picker.js" type="text/javascript"></script>
    <script src="javascripts/date.js" type="text/javascript"></script>
    <script src="javascripts/morris.min.js" type="text/javascript"></script>
    <script src="javascripts/skycons.js" type="text/javascript"></script>
    <script src="javascripts/fitvids.js" type="text/javascript"></script>
    <script src="javascripts/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="javascripts/main.js" type="text/javascript"></script>
    <script src="javascripts/respond.js" type="text/javascript"></script>
    <script src="javascripts/shenhe.js" type="text/javascript"></script>
    <script src="../files/plugs/introjs/intro.min.js" type="text/javascript"></script>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <script>
    function openhelp(){
        console.log('open help');
        if(typeof(showhelp)=='undefined'){
            alert('当前功能没有帮助信息');
            return false;
        }else{
            introJs().setOptions({
                //对应的按钮
                prevLabel:"上一步", 
                nextLabel:"下一步",
                skipLabel:"跳过",
                doneLabel:"结束"
            });
            showhelp();
        }
        // if($.isFunction(showhelp)){
        //     showhelp();
        // }
    }
    
    </script>
    <style>
@-webkit-keyframes flash {
     0%{         opacity: 0;
    }
    50%{
        opacity: 1;
        color: #ff0000;
         font-size: 18px;
    }
     100%{
         opacity: 0;
     }
 }
 @keyframes flash {
     0%{
         opacity: 0;
    }
    50%{
         opacity: 1;
         color: #ff0000;
         font-size: 18px;
     }
     100%{
        opacity: 0;
    }
 }
 .flash{
     color: #ff0000;
     -webkit-animation:flash 1.5s infinite  cubic-bezier(1,0,0.5,0) ;
     animation:flash 1.5s infinite  cubic-bezier(1,0,0.5,0) ;
 }
</style>
</head>
<body>
<div class="modal-shiftfix">
    <!-- Navigation -->
    <div class="navbar navbar-fixed-top scroll-hide">
        <div class="container-fluid top-bar">
            <div class="pull-right">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown messages hidden-xs flash">
                        <a href="javascript:openhelp();" target="_blank" style="color:#ff0000;">
                                    <i class=" icon-question-sign"></i>帮助</a>
                    </li>
                    <li class="dropdown messages hidden-xs">
                        <a href="../wall/" target="_blank">
                                    <i class="icon-comments-alt"></i>进入大屏幕微信墙</a>
                    </li>
                    <li><a  href="../shake/" target="_blank">
                                    <i class="icon-mobile-phone"></i>进入大屏幕摇一摇</a>
                                </li>
                    <li class="dropdown messages hidden-xs">
                        <a href="/更新日志.txt" target="_blank">
                                    <i class="icon-book"></i>更新日志</a>
                    </li>
                    <li class="dropdown settings hidden-xs">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <span aria-hidden="true" class="se7en-gear"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="settings-link blue" href="javascript:chooseStyle('none', 30)"><span></span>Blue</a>
                            </li>
                            <li>
                                <a class="settings-link green"
                                   href="javascript:chooseStyle('green-theme', 30)"><span></span>Green</a>
                            </li>
                            <li>
                                <a class="settings-link orange"
                                   href="javascript:chooseStyle('orange-theme', 30)"><span></span>Orange</a>
                            </li>
                            <li>
                                <a class="settings-link magenta"
                                   href="javascript:chooseStyle('magenta-theme', 30)"><span></span>Magenta</a>
                            </li>
                            <li>
                                <a class="settings-link gray"
                                   href="javascript:chooseStyle('gray-theme', 30)"><span></span>Gray</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user hidden-xs"><a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img width="34" height="34" src="../img/0.jpg"/>管理哥<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a data-toggle="modal" href="#myModal" id="changpass">
                                    <i class="icon-user"></i>修改密码</a>
                            </li>
                            <li><a href="logout.php">
                                    <i class="icon-signout"></i>退出登陆</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <button class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span
                    class="icon-bar"></span></button>
            <a class="logo" href="index.php">微信墙</a>
        </div>
        <div class="container-fluid main-nav clearfix">
            <div class="nav-collapse">
                <ul class="nav">
                    <li>
                        <a href="index.php"><span aria-hidden="true" class="se7en-home"></span>主页</a>
                    </li>
                    <li><a href="shenhe.php">
                            <span aria-hidden="true" class="se7en-feed"></span>审核微信</a>
                    </li>
                    <li><a href="qd.php">
                            <span aria-hidden="true" class="se7en-feed"></span>签到列表</a>
                    </li>
                    <?php
                    if ($cj) {

                        echo '  <li><a href="cj.php">
                <span aria-hidden="true" class="se7en-star"></span>抽奖管理</a>
              </li>';
                    }
                    ?>
                    <?php
                    if ($vote) {

                        echo '<li><a href="vote.php">
                <span aria-hidden="true" class="se7en-charts"></span>投票管理</a>
              </li>';
                    }
                    ?>
                 

                    <?php
                    if ($shake) {

                        echo '<li><a href="shake.php">
                <span aria-hidden="true" class="se7en-flag"></span>摇一摇管理</a>
              </li>';
                    }
                    ?>
                   

                    <li><a href="sysset.php">
                            <span aria-hidden="true" class="se7en-gear"></span>系统设置</a>
                    </li>
                    <li><a href="others.php">
                            <span aria-hidden="true" class="se7en-gear"></span>其他设置</a>
                    </li>
                    <li class="dropdown"><a data-toggle="dropdown" href="#">
                            <span aria-hidden="true" class="se7en-tables"></span>招商会相关<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="newseat.php">
                                        <p>嘉宾座位管理</p></a>

                                </li>
                                <li><a href="newteacherlist.php">
                                        <p>讲师管理</p></a>

                                </li>
                            </ul>
                    </li>





                </ul>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            var filename = "<?php echo $filename;?>";
            $('.nav-collapse ul li a').attr('class', function () {
                if ($(this).attr('href') === filename) {
                    return "current";
                }
            });
        });
    </script>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                    <h4 class="modal-title">
                        修改管理员账号密码
                    </h4>
                </div>
                <form method="post" action="shenhe.do.php?do=gaimi" enctype="multipart/form-data">
                <div class="modal-body">
                    <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png"/></a></center>
                    <p></p>
                        <div class="form-group">
                            <input class="form-control" name="user" placeholder="用户名" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="pwd" placeholder="密码" type="text">
                        </div>
                </div>

                <div class="modal-footer">
                    <input class="btn btn-primary" type="submit" value="Save Changes">
                    <button class="btn btn-default-outline" data-dismiss="modal" type="button">Close</button>
                    
                </div>
                </form>
            </div>
        </div>
</div>