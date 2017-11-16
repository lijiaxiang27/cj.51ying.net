<?php include('navigation.php'); ?>
<link href="../files/css/semantic.min.css" media="all" rel="stylesheet" type="text/css"/>
<link href="/files/plugs/icheck-1.x/skins/minimal/blue.css" rel="stylesheet">
<script src="/files/plugs/icheck-1.x/icheck.min.js"></script>
<link rel="stylesheet" href="datepicker/bootstrap-datetimepicker.min.css">
<script src="datepicker/bootstrap-datetimepicker.min.js"></script>
<!-- End Navigation -->

<div class="container main-content">
    <!-- DataTables Example -->
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-table"></i>讲师时间编辑  <i class="icon-table"></i><a href="newteacherlist.php">返回讲师列表</a>

                    <i class="icon-table"></i><button data-toggle="modal" data-target="#myModal-seat" onclick="edit('time')">添加时间段</button>
                  
                </div>
               <!--  <div class="alert alert-warning">
                    <button class="close" data-dismiss="alert" type="button">×</button>
                    声明：抽奖管理采用主动推送消息，只是为了方便活动方与用户的沟通交流，请勿频繁发送或骚扰微信用户，一切后果与作者无关。
                </div> -->
                <div class="widget-content padded clearfix form-horizontal">

                    <!-- <div class="dataTables_filter"><label>Search: <input type="text" ></label><i class="btn btn-sm btn-primary-outline input-group-btn"></i></div> -->
                    <div class="form-group col-md-5 pull-right">
                        <label class="control-label col-md-2">搜索: </label>
                        <div class="col-md-8">
                            <form action="newteacherlist.php" method="get" novalidate="novalidate">
                                <div class="input-group">
                                    <input class="form-control valid" name="searchtext"  type="text" value="<?php echo $_GET['searchtext'];?>"><span class="input-group-btn"><button class="btn btn-success" type="submit">搜
                                        </button></span>
                                </div>
                            </form>
                        </div>
                    
                    </div>
                    
                    <table class="table table-striped" >
                        <thead>
                        <tr>
                            <th class="hidden-xs">
                                序号
                            </th>
                            <th>
                                时间段
                            </th>
                            <th>
                                操作
                            </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include('biaoqing.php');
                        require_once('../common/db.class.php');
                        $id = $_GET['id'];
                        $type = $_GET['type'];
                        //修改座位信息
                        if ($_SERVER['REQUEST_METHOD']=="POST"){
                            $info = $_POST;
                            $time_model = new M('cvn_time');
                            $time = strtotime($info['time']);
                            $cvn_m = new M('cvn');
                            //select $field from $this->table $join where $where
                            $tmpwhere = " weixin_cvn_time.time= ".$time;
                            $tmpjoin = " left join weixin_cvn_time as b on weixin_cvn.time_id = b.id ";
                            $tmpdata = $cvn_m->find($tmpwhere, $field = "*", $fun = '', $type = 'assoc',$tmpjoin);
                            if (!empty($tmpdata)){
                                echo "<script>window.location.href='newteachertimeedit.php?id=$id'</script>";
                            } else {
                                if ($info['id'] == 'empty'){
                                    $data = array('time'=>$time);
                                    $curid = $time_model->add_new($data);
                                    $cvndata = array('teacher_id'=>$id,'time_id'=>$curid);
                                    $cvn_m = $cvn_m->add_new($cvndata);
                                } else {
                                    $data = array("time"=>$time);
                                    $where = " id=".$info['id'];
                                    //$upsql = "update wexin_cvn_time set $data where $where";
                                    $time_model->update($where, $data);
                                }
                            }
                        } elseif($type == 'delete'){
                            $timeid = $_GET['timeid'];
                            $time_m = new M('cvn_time');
                            $delwhere = " id = ".$timeid;
                            $time_m->delete($delwhere);
                            $teacher_m = new M('cvn');
                            $teachwhere = " teacher_id = $id and time_id = $timeid ";
                            $teacher_m->delete($teachwhere);
                        }
                        $time_m = new M('cvn');
                        $sql = "select * from weixin_cvn as a left JOIN weixin_cvn_time as b ON a.time_id = b.id WHERE a.teacher_id = $id";
                        $where = " a.teacher_id = $id order by time asc ";
                        $join = " as a right JOIN weixin_cvn_time as b ON a.time_id = b.id ";
                        $querytp = $time_m->select($where, $field = "*", $fun = '', $type = 'assoc',$join);

                        foreach($querytp as $q){
//                            $q['nickname'] = pack('H*', $q['nickname']);
//                            $q = emoji_unified_to_html(emoji_softbank_to_unified($q));
                            ?>
                            <tr>
                                <td class="hidden-xs">
                                    <?php echo  $q['id']; ?>
                                </td>
                                <td>
                                    <?php echo  date("Y-m-d H:i:s", $q['time']) .'-'.date("H:i:s", $q['time']+3600); ?>
                                </td>
                                <td class="hidden-xs">
                                    <button data-toggle="modal" data-target="#myModal-seat" onclick="edit(this)" id="edit">编辑</button>|
                                    <a href="newteachertimeedit.php?type=delete&id=<?php echo $id; ?>&timeid=<?php echo  $q['id']; ?>" onclick="return confirm('确定删除吗？')">删除</a>

                                </td>

                            </tr>
                        <?php
//                        }
                        }
                        ?>

                        </tbody>
                    </table>
                    <?php 
                    require_once('../common/pager_helper.php');
                    echo pager($page,$pagesize,$querycount,'newteacherlist.php',$_GET);
                    ?>
                </div>
            </div>
            <!-- end DataTables Example -->
        </div>
    </div>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal-seat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">编辑座位</h4>
            </div>
            <form action="newteachertimeedit.php?id=<?php echo $id ?>" method="post">
            <div class="modal-body">
                <table>
                    <tr>
                        <th>
                            时间段（只需选择开始时间，自动一节课1小时）
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <div class="input-append date form_datetime" style="width: 100%">
                                <input size="16" name="time" type="text" value="" readonly style="width: 200px;">
                                <span class="add-on"><i class="icon-th" style="display: inline-block"></i></span>
                            </div>
                            <input type="hidden" id="currentid" name="id">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="submit" id="editpost" class="btn btn-primary">提交更改</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>


<script type="text/javascript">
    function edit(a)
    {
        if (a !== 'time'){
            var id = $(a).parent().parent().children().eq(0).html().trim();console.log(id);
            $('#currentid').val(id);
        } else {
            $('#currentid').val('empty');
        }

    }
    function showhelp(){
        console.log('show help index');
        introJs().setOptions({
                //对应的按钮
                prevLabel:"上一步", 
                nextLabel:"下一步",
                skipLabel:"跳过",
                doneLabel:"结束"
            }).start();
    }


$(document).ready(function(){


        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd hh:ii"
        });


$('.icheck').iCheck({
    checkboxClass: 'icheckbox_minimal',
    radioClass: 'iradio_minimal',
    increaseArea: '20%' // optional
  });
  // $('.icheck').iCheck('check', function(){
  // alert($(this).val());
  // });
  $('.icheck').on('ifChecked', function(event){
    var signnamestatus=$(this).val();
    $.ajax({
        'url':'shenhe.do.php?do=signnamestatus',
        'data':{'signnamestatus':signnamestatus},
        'type':'get',
        'dataType':'json',
        'success':function(json){
            if(json.error<0){
                alert('修改失败');
            }
        }
    });
  });
});

</script>
</body>
</html>