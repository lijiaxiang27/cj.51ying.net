<!--weixin_config-->
<div class="modal fade" id="weixin-rentweixinconfig" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title">
                    微信墙参数配置
                </h4>
            </div>
            <form method="post" action="shenhe.do.php?do=set_rentweixin_conf" >
            <div class="modal-body">
                <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png"/></a></center>
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">授权公众号:</label>
                        <div class="col-md-8 icheck" >
                            <input type="radio" id="other" name="rentweixin" value="1" <?php echo  $xuanzezu['rentweixin']==1?'checked':'';?>>
                            <label for="other">我的公众号</label>
                            <input type="radio" name="rentweixin" id="wewin" value="2" <?php echo  $xuanzezu['rentweixin']==2?'checked':'';?>>
                            <label for="wewin">微赢公众号</label>
                        </div>
                    </div>
                    <!--微信公众号配置 start-->
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">AppId:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="appid" value="<?php echo  $weixin_config['appid']; ?>"
                                   placeholder="AppId" type="text"  <?php echo  $xuanzezu['rentweixin']!=1?'readonly="true"':'';?>>
                        </div>
                    </div>
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">AppSecret:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="appsecret" value="<?php echo  $weixin_config['appsecret']; ?>"
                                   placeholder="AppSecret" type="text" <?php echo $xuanzezu['rentweixin']!=1?'readonly="true"':'';?>>
                        </div>
                    </div>
            </div>

            <div class="modal-footer">
                <input class="btn btn-primary" type="submit" value="保存更改">
                <button class="btn btn-default-outline" data-dismiss="modal" type="button">Close</button>
                
            </div>
            </form>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('.icheck').find('input').iCheck({
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  });
  $('.icheck').find('input').bind('ifChecked',function(){
    // console.log($(this).val());
    if($(this).val()!=1){
        $('input[name=appid]').attr('readonly','true');
        $('input[name=appsecret]').attr('readonly','true');
    }else{
        $('input[name=appid]').removeAttr('readonly');
        $('input[name=appsecret]').removeAttr('readonly');
    }
    });
});
</script>
<!--end weixin_config-->
