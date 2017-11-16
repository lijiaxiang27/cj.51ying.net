<?php include('navigation.php');
?>
<!-- End Navigation -->

<div class="container main-content">
    <!-- DataTables Example -->
    <div class="col-lg-12">
        <div class="row">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-comments-alt"></i>站点设置
                </div>
                <div class="widget-content padded form-horizontal">
                   <form action="shenhe.do.php?do=set_logo_conf" method="post" id="feikong-form1"  enctype="multipart/form-data" data-step="1" data-intro="关注用二维码">
                        <div class="form-group" >
                            <label class="control-label col-md-4">二维码:</label>
                            <div class="col-md-7">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 455px; height: 135px;">
                                        <img src="<?php echo $weixin_config['erweima'].'?rand='.rand(1,99999); ?>">
                                        
                                    </div>
                                    <div>推荐图片尺寸150*150;要求jpg或png格式;</div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail"
                                         style="width: 455px; height: 135px;"></div>
                                    <div>
                                      <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                                class="fileupload-exists">更换</span><input name="erweima" type="file"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7"><input class="btn btn-primary" type="submit" value="保存更改"></div>
                        </div>
                    </form>
                    <form action="shenhe.do.php?do=set_custombg_conf" method="post" id="feikong-form2"  enctype="multipart/form-data" data-step="2" data-intro="微信上墙自定义主题背景图">
                        <div class="form-group" >
                            <label class="control-label col-md-4">自定义主题背景:</label>
                            <div class="col-md-7">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 455px; height: 135px;">
                                        <img src="<?php echo $xuanzezu['bgimg'].'?rand='.rand(1,99999); ?>">
                                    </div>
                                    <div>推荐图片尺寸1891*1008,要求jpg格式;</div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail"
                                         style="width: 455px; height: 135px;"></div>
                                    <div>
                                    <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                            class="fileupload-exists">更换</span><input name="custombg" type="file"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7"><input class="btn btn-primary" type="submit" value="保存更改"></div>
                        </div>
                    </form>

                    <form action="shenhe.do.php?do=set_pinjie_logo_conf" method="post" id="feikong-form3"  enctype="multipart/form-data" data-step="3" data-intro="用于签到墙头像组成的logo，3D签墙到和2D签到墙都使用此logo，请确保logo的透明背景的png图片。">
                        <div class="form-group" >
                            <label class="control-label col-md-4">拼接logo替换：</label>
                            <div class="col-md-7">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 455px; height: 135px;">
                                        <img src="<?php echo $xuanzezu['signlogoimg'].'?rand='.rand(1,99999); ?>">
                                        
                                    </div>
                                    <div>推荐图片尺寸645*485;要求png格式;</div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail"
                                         style="width: 455px; height: 135px;"></div>
                                    <div>
                                      <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                                class="fileupload-exists">更换</span><input name="logo_pj" type="file"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7"><input class="btn btn-primary" type="submit" value="保存更改"></div>
                        </div>
                    </form>

                    <form action="shenhe.do.php?do=set_custom3dbg_conf" method="post" id="feikong-form3"  enctype="multipart/form-data" data-step="3" data-intro="用于签到墙头像组成的logo，3D签墙到和2D签到墙都使用此logo，请确保logo的透明背景的png图片。">
                        <div class="form-group" >
                            <label class="control-label col-md-4">3D签到背景：</label>
                            <div class="col-md-7">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 455px; height: 135px;">
                                        <img src="<?php echo ($background==''?'/3dsign/themes/advanced/img/bg.jpg':$background).'?rand='.rand(1,99999); ?>">
                                        
                                    </div>
                                    <div>推荐图片尺寸645*485;要求png格式;</div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail"
                                         style="width: 455px; height: 135px;"></div>
                                    <div>
                                      <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                                class="fileupload-exists">更换</span><input name="custom3dbg" type="file"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7"><input class="btn btn-primary" type="submit" value="保存更改"></div>
                        </div>
                    </form>

                    <form action="shenhe.do.php?do=set_shakebg_conf" method="post" id="feikong-form4"  enctype="multipart/form-data" data-step="4" data-intro="用于摇一摇界面的背景图。">
                        <div class="form-group" >
                            <label class="control-label col-md-4">摇一摇背景：</label>
                            <div class="col-md-7">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 455px; height: 135px;">
                                        <img src="<?php echo $xuanzezu['shakebgimg'].'?rand='.rand(1,99999); ?>">
                                        
                                    </div>
                                    <div>推荐图片尺寸1600*800;要求jpg格式;</div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail"
                                         style="width: 455px; height: 135px;"></div>
                                    <div>
                                      <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                                class="fileupload-exists">更换</span><input name="logo_shakebg" type="file"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4"></label>
                            <div class="col-md-7"><input class="btn btn-primary" type="submit" value="保存更改"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--end weixin model-->
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