<!--weixin_config-->
<div class="modal fade" id="weixin-setconfig">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title">
                    微信墙参数配置
                </h4>
            </div>
            <div class="modal-body">
                <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png"/></a></center>
                <form method="post" action="shenhe.do.php?do=set_weixin_conf" enctype="multipart/form-data">
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">微信名称:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="nickname" value="<?php echo  $weixin_config['nickname']; ?>"
                                   placeholder="用于显示于微信端回复的欢迎头条" type="text">
                        </div>
                    </div>
                    <!--微信公众号配置 start-->
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">AppId:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="appid" value="<?php echo  $weixin_config['appid']; ?>"
                                   placeholder="AppId" type="text">
                        </div>
                    </div>
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">AppSecret:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="appsecret" value="<?php echo  $weixin_config['appsecret']; ?>"
                                   placeholder="AppSecret" type="text">
                        </div>
                    </div>
                    <!--微信公众号配置 end-->
                    <div class="form-group">
                        <label class="control-label col-md-3" style="text-align:right;">二维码上传:</label>

                        <div class="col-md-8">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new img-thumbnail" style="width: 150px; height: 150px;">
                                    <img src="<?php echo $weixin_config['erweima'].'?rand='.rand(1,99999); ?>">
                                </div>
                                <div class="fileupload-preview fileupload-exists img-thumbnail"
                                     style="width: 150px; height: 150px"></div>
                                <div style="float:left; color:red">请上传长宽尺寸小于500px、1:1、格式为jpg的二维码</div>
                                <div>
                                    <span class="btn btn-default btn-file"><span class="fileupload-new">选择图片</span><span
                                            class="fileupload-exists">更换</span><input name="erweima" type="file"></span>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>

            <div class="modal-footer">
                <input class="btn btn-primary" type="submit" value="保存更改">
                <button class="btn btn-default-outline" data-dismiss="modal" type="button">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../files/plugs/zeroclipboard-2.2.0/ZeroClipboard.min.js"></script>
<script type="text/javascript">
ZeroClipboard.config( { swfPath: "../files/plugs/zeroclipboard-2.2.0/ZeroClipboard.swf" } );
var copyurlclient = new ZeroClipboard($('.copyurl')); // 新建一个对象 
copyurlclient.on( "copy", function (event) {
  var clipboard = event.clipboardData;
  clipboard.setData( "text/plain",  $('#apiurl').val());
  alert('复制成功，请粘帖到微信公众号后台。');
});
var copytokenclient = new ZeroClipboard($('.copytoken')); // 新建一个对象 
copytokenclient.on( "copy", function (event) {
  var clipboard = event.clipboardData;
  clipboard.setData( "text/plain",  $('input[name=token]').val());
  alert('复制成功，请粘帖到微信公众号后台。');
});
</script>
<!--end weixin_config-->
