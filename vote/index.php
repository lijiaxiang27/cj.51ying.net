<?php
$openid = isset($_GET['wecha_id'])?$_GET['wecha_id']:'';
require_once('../common/session_helper.php');
if (isset($_SESSION['openid']) && $_SESSION['openid'] == true) {
    $openid = $_SESSION['openid'];
} else {
    if ($openid != '') {
        $_SESSION['openid'] = $openid;
    }
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include("isweixin.php");
include("db.php");
?>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>投票系统</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="../files/css/semantic.min.css" type="text/css">
    <script type="text/javascript" src="../files/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../files/js/semantic.min.js"></script>
    <script>
        var votecannum =<?php echo $xuanzezu['votecannum'];?>;
        var hasvoted = 0;
    </script>
    <script type="text/javascript" src="js/vote.js"></script>
</head>
<body id='vote'>

<div class="main container">
    <div class="ui page grid">
        <div class="column">

            <h2 class="ui top attached green segment votehead">
                <?php echo  $xuanzezu['votetitle']; ?>
                <small>(请选择
                    <red><?php echo  $xuanzezu['votecannum']; ?></red>
                    个选项)
                </small>
            </h2>
            <div class="ui attached segment content">
                <form method='post' action="function.php?do=vote">

                    <?php
                    echo '<input name="openid" value="' . $openid . '" hidden />';
                    $flag_m=new M('flag');
                    $vote_check=$flag_m->find("`openid` = '{$openid}'");

                    if ($vote_check <= 0) {
                        echo "<script>window.location='luru.php';</script>";
                    }
                    $class = array('', 'red', 'blue', 'green');
                    $vote_m=new M('vote');
                    $sum= $vote_m->find('1','res','sum');

                    $sum=$sum==0?1:$sum;

                    $votedata=$vote_m->select('1 order by res desc');
                    if ($vote_check[3] == 0) {
                        foreach($votedata as $q){
                            $i++;
                            $persent = sprintf("%.2f", ($q['res'] / $sum) * 100);
                            ?>
                            <div class="select">
                                <div class="ui ribbon <?php echo  $class[$i]; ?> label">
                                    <?php echo  $q['name']; ?>
                                </div>

                                <div class="ui grid">
                                    <div class="selecs"
                                         style="width:100%;height:3rem;z-index:9;position:absolute"></div>
                                    <div class="two wide column"><a class="ui <?php echo  $class[$i]; ?> label"><?php echo  $i; ?></a>
                                    </div>
                                    <div class="ui <?php echo  $class[$i]; ?> progress thirteen wide column">

                                        <div class="bar" style="width: <?php echo  $persent ?>%;">
                                            <div class="voteright"><?php echo  $persent ?>%(<?php echo  $q['res']; ?>票)</div>
                                        </div>
                                    </div>
                                    <div class="one wide column"><input type="checkbox" value="<?php echo  $q['id']; ?>"
                                                                        class="ui radio checkbox votecheck"
                                                                        name="voteid[]"/></div>
                                </div>
                            </div>
                        <?php //}
                        }
                    } else {
                        foreach($votedata as $q){
                            $i++;
                            $persent = sprintf("%.2f", ($q['res'] / $sum) * 100);
                            ?>
                            <div class="select">
                                <div class="ui ribbon <?php echo  $class[$i]; ?> label">
                                    <?php
                                    $votedarr = explode(",", $vote_check[3]);
                                    if (in_array($q['id'], $votedarr)) {
                                        echo $q['name'] . "【已投】";
                                    } else {
                                        echo $q['name'];
                                    }
                                    ?>
                                </div>

                                <div class="ui grid">
                                    <div class="two wide column"><a class="ui <?php echo  $class[$i]; ?> label"><?php echo  $i; ?></a>
                                    </div>
                                    <div class="ui <?php echo  $class[$i]; ?> progress fourteen wide column">

                                        <div class="bar" style="width: <?php echo  $persent; ?>%;">
                                            <div class="voteright" style="right: 5%;"><?php echo  $persent ?>%(<?php echo  $q['res']; ?>票)
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>


            </div>
            <?php
            if ($vote_check[3] == 0) {
                echo '<button class="fluid ui  bottom attached green button" type="submit">投票</button></form>';
            } else {
                echo '</form><button id="closewindow" class="fluid ui  bottom attached red button">关闭本页面</button>';
            }

            ?>

        </div>
    </div>

    <small class="footer">
        <center>
            <center>
          
            <a href="<?php echo $xuanzezu['copyrightlink'];?>"><?php echo $xuanzezu['copyright'];?></a></center>
        </center>
    </small>
</div>
</body>
</html>
