<?php include('navigation.php');
?>
<!-- End Navigation -->
 <?php
$datapath = str_replace("/myadmin", '/', dirname(__FILE__));
$configpath = $datapath . '/data/memcache.php';
if (file_exists($configpath)) {
    require($configpath);
}else{
    $use_memcache=2;
    $memcache_host='';
    $memcache_port='';
}
?>
<div class="container main-content">
    <!-- DataTables Example -->
    <div class="col-lg-6">
        <div class="row">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-comments-alt"></i>互动墙设置
                </div>
                <div class="widget-content padded form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-4">自动审核:</label>

                        <div class="col-md-7">
                            <div class="toggle-switch" id="autoShenhe" data-off="warning" data-on="success"
                                 style="margin-bottom:8px">
                                <input <?php if ($xuanzezu['shenghe'] == 0) {
                                    echo "checked";
                                } ?> type="checkbox">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">循环播放:</label>

                        <div class="col-md-7">
                            <div class="toggle-switch conf-switch" data-off="warning" data-on="success"
                                 style="margin-bottom:8px">
                                <input <?php if ($xuanzezu['circulation']) {
                                    echo "checked";
                                } ?> name="circulation" type="checkbox">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">前台开场密码:</label>

                        <div class="col-md-7">
                            <form action="shenhe.do.php?do=changeconfig&cof=screenpaw" method="post">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['screenpaw']; ?>" name="name"
                                           type="password"/><span class="input-group-btn"><button
                                            class="btn btn-primary" type="submit">修改
                                        </button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">前台刷新间隔（秒）:</label>

                        <div class="col-md-7">
                            <form action="shenhe.do.php?do=refreshtime" id="feikong-form1" method="post">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['refreshtime']; ?>" name="name"
                                           type="text"/><span class="input-group-btn"><button class="btn btn-primary"
                                                                                              type="submit">修改
                                        </button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">发送消息间隔（秒）:</label>

                        <div class="col-md-7">
                            <form action="shenhe.do.php?do=interval" id="feikong-form1" method="post">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['timeinterval']; ?>" name="name"
                                           type="text"/><span class="input-group-btn"><button class="btn btn-primary"
                                                                                              type="submit">修改
                                        </button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                

                    <div class="form-group">
                        <label class="control-label col-md-4">上墙屏蔽词(<code>,</code>隔开):</label>

                        <div class="col-md-7">
                            <form action="shenhe.do.php?do=changeconfig&cof=black_word" method="post">
                                <textarea class="form-control" rows="4" name="name"><?php echo  $xuanzezu['black_word']; ?></textarea>
                                <button class="btn btn-primary btn-block" style="margin-top:5px" type="submit">修改
                                </button>
                            </form>
                        </div>
                    </div>
           

                </div>
            </div>
        </div>
        <div class="row">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-user"></i>系统设置
                </div>
                <div class="widget-content padded form-horizontal">
                    <div class="row">
                        <div class="alert alert-warning">
                                <button class="close" data-dismiss="alert" type="button">×</button>
                                请确保服务器支持memcache，否则开启可能导致微信墙无法使用。
                            </div>
                        <div class="form-group" data-step="6" data-intro="一般情况不要开启，开启前必须确认是有安装过memcache组件的，否则微信上墙将无法使用">
                            
                            <label class="control-label col-md-3">使用memcache:</label>
                            <div class="col-md-8">
                                <div class="toggle-switch memcache-switch" data-off="danger" data-on="success"
                                     style="margin-bottom:8px">
                                    <input <?php if($use_memcache==1){echo "checked";}?> name="use_memcache" type="checkbox">
                                </div>
                                <button class="btn btn-sm btn-success setmemcacheconfig"
                                    data-toggle="modal" <?php if ($use_memcache==2) {
                                echo "disabled";
                                } ?> href="#weixin-memcacheconfig">配置参数
                            </button>
                            </div>

                        </div>

                     
                        <div class="form-group" >
                            <label class="control-label col-md-3">版权文字:</label>

                            <div class="col-md-8">
                                <form action="shenhe.do.php?do=changeconfig&cof=copyright" method="post"
                                      id="feikong-form4">
                                    <div class="input-group">
                                        <input class="form-control" value="<?php echo  $xuanzezu['copyright']; ?>" name="name"
                                               type="text"/><span class="input-group-btn"><button
                                                class="btn btn-success" type="submit">修改
                                            </button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="form-group" >
                            <label class="control-label col-md-3">版权文字连接:</label>

                            <div class="col-md-8">
                                <form action="shenhe.do.php?do=changeconfig&cof=copyrightlink" method="post"
                                      id="feikong-form4">
                                    <div class="input-group">
                                        <input class="form-control" value="<?php echo  $xuanzezu['copyrightlink']; ?>" name="name"
                                               type="text"/><span class="input-group-btn"><button
                                                class="btn btn-success" type="submit">修改
                                            </button></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget-content padded" data-step="8" data-intro="此处按钮可以清空上墙信息和签到用户信息">
                            <button class="btn btn-lg btn-block btn-primary"
                                    onclick="javascript:if(confirm('确定清空所有互动墙数据吗？将无法恢复！')){location.href='shenhe.do.php?do=del_all'}">
                                清空互动墙内容
                            </button>
                            <button class="btn btn-lg btn-block btn-danger"
                                    onclick="javascript:if(confirm('确定清空所有数据吗？将无法恢复！')){location.href='shenhe.do.php?do=del_vote'}">
                                清空所有用户信息
                            </button>
                        </div>

                    </div>
                </div>
            </div>


        </div>
       
        <!--end weixin model-->
    </div>

    <!-- end DataTables Example -->

    <div class="col-lg-6">
        <div class="row">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="se7en-flag"></i>　功能管理
                </div>
                <div class="widget-content padded form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-md-4">互动墙地址（重要）:</label>

                        <div class="col-md-7">
                            <form action="shenhe.do.php?do=changeconfig&cof=web_root" method="post" id="feikong-form3">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['web_root']; ?>" name="name"
                                           type="text"/><span class="input-group-btn"><button class="btn btn-primary"
                                                                                              type="submit">修改
                                        </button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-group" data-step="1" data-intro="点击配置参数按钮，进行公众号对接。">
                        <label class="control-label col-md-3">公众号名称:</label>

                        <div class="col-md-8">
                            <form action="shenhe.do.php?do=set_weixin_conf" method="post"
                                      id="feikong-form4">
                                    <div class="input-group">
                                        <input class="form-control" value="<?php echo  $weixin_config['nickname']; ?>" name="nickname"
                                               type="text"/><span class="input-group-btn"><button
                                                class="btn btn-success" type="submit">修改
                                            </button></span>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="form-group" data-step="2" data-intro="如果使用未认证的公众号，需要开启此处设置，填写借用的认证服务号的appid和appsecret，公众号后台设置网页授权域名为本系统的访问域名。">
                        <label class="control-label col-md-3">授权公众号:</label>

                        <div class="col-md-8">
                            <button class="btn btn-sm btn-success setconfig"
                                    data-toggle="modal"  href="#weixin-rentweixinconfig">配置参数...
                            </button>
                        </div>
                    </div>
                    <div class="form-group" data-step="3" data-intro="如果签到时要求记录姓名，请打开此选项。">
                        <label class="control-label col-md-3">签到记录姓名:</label>

                        <div class="col-md-8">
                            <div class="toggle-switch name-switch" data-off="danger" data-on="success"
                                 style="margin-bottom:8px">
                                <input <?php if($conf['name_switch']==1){echo "checked";}?> name="name_switch" type="checkbox">
                            </div>
                        </div>
                    </div>
                    <div class="form-group"  data-step="4" data-intro="如果签到时要求记录手机，请打开此选项。P.S.如果要抽奖内定功能，请务必打开此选项，否则无法启用抽奖内定">
                        <label class="control-label col-md-3">签到记录手机号:</label>

                        <div class="col-md-8">
                            <div class="toggle-switch phone-switch" data-off="danger" data-on="success"
                                 style="margin-bottom:8px">
                                <input <?php if($conf['phone_switch']==1){echo "checked";}?> name="phone_switch" type="checkbox">
                            </div>
                        </div>
                    </div>
                    <?php
                    $plugsc = new M('plugs');
                    $plugs = $plugsc->select('id>0 order by id');
                    foreach ($plugs as $plugin) {
                        $open = $$plugin['name'];
                        echo '
                    <div class="form-group">
                        <label class="control-label col-md-3">' . $plugin['title'] . '开关:</label>
                        <div class="col-md-8">
                           <div class="toggle-switch plug-switch" data-off="danger" data-on="success" style="margin-bottom:8px">
                            <input ';
                        if ($open != '1') {
                            echo 'disabled';
                        }
                        if ($plugin['switch']) {
                            echo ' checked';
                        }
                        echo ' name="' . $plugin['name'] . '"  type="checkbox">
                          </div>
                       </div>
                     </div>
                    ';
                    }
                    ?>
                   
                </div>
            </div>
        </div>
        <?php
        if ($use_memcache==1) {
            include('memcache_modal.php');
        }
        include('rentweixin_modal.php');
        ?>
    </div>
    <!-- end DataTables Example -->
</div>
</div>
<script type="text/javascript">
    $(function () {
        activatelogin();
    });
    function showhelp(){
        console.log('show help sysset');
        introJs().setOptions({
                //对应的按钮
                prevLabel:"上一步", 
                nextLabel:"下一步",
                skipLabel:"跳过",
                doneLabel:"结束"
            }).start();
    }
</script>
</body>

</html>