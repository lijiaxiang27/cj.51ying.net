<?php include('navigation.php');
?>
<!-- End Navigation -->

<div class="container main-content">
    <!-- DataTables Example -->
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="se7en-flag"></i>　摇一摇管理
                </div>
                <div class="widget-content padded form-horizontal">
                    <div class="form-group" >
                        <label class="control-label col-md-2">摇一摇标题:</label>

                        <div class="col-md-3">
                            <form action="shenhe.do.php?do=shake_title" method="post" id="validate-form">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['acttitle']; ?>" name="firstname"
                                           type="text"/><span class="input-group-btn"><button class="btn btn-success"
                                                                                              type="submit">修改
                                        </button></span>
                                </div>
                            </form>
                        </div>
                        <label class="control-label col-md-2">大屏幕显示用户数量:</label>

                        <div class="col-md-3">
                            <form action="shenhe.do.php?do=show_num" method="post" id="shownum">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['show_num']; ?>" name="shownum" id="shownum"
                                           type="text"/><span class="input-group-btn"><button class="btn btn-success"
                                                                                              type="submit">修改
                                        </button></span>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2">游戏摇晃截止次数:</label>

                        <div class="col-md-3">
                            <form action="shenhe.do.php?do=endshake" method="post" id="endnum">
                                <div class="input-group">
                                    <input class="form-control" value="<?php echo  $xuanzezu['endshake']; ?>" name="endnum" id="endnum"
                                           type="text"/><span class="input-group-btn"><button class="btn btn-success"
                                                                                              type="submit">修改
                                        </button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <label class="control-label col-md-2">摇一摇初始化：</label>
                        <div class="col-md-3" data-step="2" data-intro="重置之后，才可以重新开始游戏，重置之前，请先点‘清空摇一摇用户数据’按钮">
                            <button class="btn btn btn-block btn-primary-outline"
                                    onclick="location='shenhe.do.php?do=shake_ready'"
                                    data-original-title="让用户摇晃次数清零，停止游戏，最好在开始游戏前点击一下" data-toggle="tooltip"
                                    id="tooltip-top">结束游戏（初始化）
                            </button>
                        </div>
                        <div class="col-md-3" data-step="1" data-intro="清空所有摇一摇次数和参与用户的信息">
                            <button class="btn btn btn-block btn-danger"
                                    onclick="javascript:if(confirm('确定清空所有摇一摇用户数据吗？将无法恢复！')){location='shenhe.do.php?do=shake_reset'}"
                                    data-original-title="彻底清空摇一摇用户数据，谨慎操作，一般在活动结束后再清除" data-toggle="tooltip"
                                    id="tooltip-left">清空摇一摇用户数据
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end DataTables Example -->
</div>
</div>
</div>
<script type="text/javascript">
function showhelp(){
    console.log('show help sysset');
    introJs().setOptions({
                //对应的按钮
                prevLabel:"上一步", 
                nextLabel:"下一步",
                skipLabel:"跳过",
                doneLabel:"结束"
            }).start();
    // introJs().start();
}
</script>
</body>

</html>