<?php
    include('navigation.php');
    $id = $_GET['id'];
    $teacher_m = new M('cvn_teacher');
    $where = " id = ". $id;
    $teacher = $teacher_m->find($where);

?>
<!-- End Navigation -->

<div class="container main-content">
    <!-- DataTables Example -->
    <div class="col-lg-12">
        <div class="row">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-comments-alt"></i>编辑讲师      <i class="icon-comments-alt"></i><a href="newteacherlist.php">返回列表</a>
                </div>
                <div class="widget-content padded form-horizontal">
                   <form action="shenhe.do.php?do=edit_teacher_avatar_conf" method="post" id="feikong-form1"  enctype="multipart/form-data" data-step="1" data-intro="关注用二维码">
                        <div class="form-group" >

                            <label class="control-label col-md-4">讲师头像：</label>
                            <div class="col-md-8">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new img-thumbnail" style="width: 455px; height: 135px;">
                                        <img src="<?php echo $teacher['t_img'] ?>">

                                    </div>
                                    <div>推荐图片尺寸150*150;要求jpg或png格式;</div>
                                    <div class="fileupload-preview fileupload-exists img-thumbnail"
                                         style="width: 455px; height: 135px;"></div>
                                    <div>
                                      <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                              class="fileupload-exists">更换</span>
                                          <input name="t_img" value="<?php echo $teacher['t_img'] ?>" type="file">
                                          <input name="t_img_edit" value="<?php echo $teacher['t_img'] ?>" type="hidden">
                                      </span>
                                    </div>
                                </div>
                            </div>

                            <label class="control-label col-md-4">讲师姓名：</label>
                            <div class="col-md-7" style="margin-bottom: 20px;margin-top: 20px;">
                                <input class="form-control" type="text" name="t_name" value="<?php echo $teacher['t_name'] ?>">
                                <input type="hidden" name="id" value="<?php echo $teacher['id'] ?>">
                            </div>

                            <label class="control-label col-md-4">讲师简介：</label>
                            <div class="col-md-7">
                                <textarea class="form-control" name="t_introduce" id="" cols="30" rows="10"><?php echo $teacher['t_introduce'] ?></textarea>
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