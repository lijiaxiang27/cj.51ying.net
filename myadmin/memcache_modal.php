<!--weixin_config-->
<div class="modal fade" id="weixin-memcacheconfig">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" class="close" data-dismiss="modal" type="button">&times;</button>
                <h4 class="modal-title">
                    memcache参数配置
                </h4>
            </div>
            <div class="modal-body">
                <center><a href="index.php"><img width="200" height="70" src="images/logo-login%402x.png"/></a></center>
                <p></p>
                <div class="alert alert-warning">
                    <button class="close" data-dismiss="alert" type="button">×</button>
                    说明：<br>
                    1、memcache地址:服务器ip或者域名<br>
                    2、端口号:memcache服务端口号<br>
                </div>
                <p></p>
                <form method="post" action="shenhe.do.php?do=set_memcache_conf" >
                    <!--微信公众号配置 start-->
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">memcache地址:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="memcache_host" value="<?php echo  $memcache_host; ?>"
                                   placeholder="服务器ip或网址" type="text">
                        </div>
                    </div>
                    <div class="form-group" style="height:2.4em">
                        <label class="control-label col-md-3" style="text-align:right;">端口号:</label>

                        <div class="col-md-8">
                            <input class="form-control" name="memcache_port" value="<?php echo  $memcache_port; ?>"
                                   placeholder="端口号" type="text">
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
<!--end weixin_config-->
