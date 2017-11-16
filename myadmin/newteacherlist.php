<?php include('navigation.php'); ?>
<link href="../files/css/semantic.min.css" media="all" rel="stylesheet" type="text/css"/>
<link href="/files/plugs/icheck-1.x/skins/minimal/blue.css" rel="stylesheet">
<script src="/files/plugs/icheck-1.x/icheck.min.js"></script>
<!-- End Navigation -->

<div class="container main-content">
    <!-- DataTables Example -->
    <div class="row">
        <div class="col-lg-12">
            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-table"></i>老师列表  <i class="icon-table"></i><a href="newteacheradd.php">添加老师</a>
                  
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
                                姓名
                            </th>
                            <th>
                                介绍
                            </th>
                            <th>
                                头像
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
                        $flag_m=new M('cvn_teacher');
                        //修改座位信息
                        if ($_SERVER['REQUEST_METHOD']=="POST"){
                            $info = $_POST;
                            $where = " id = ".$info['id'];
                            $data = " user_phone = ".$info['user_phone'];
                            $flag_m->update($where, $data);
                        }
                        $page=intval($_GET['page']);
                        $page=$page>1?$page:1;
                        $pagesize=20;
                        $limit_str=' limit '.($page-1)*$pagesize.','.$pagesize;
                        //只显示签到的人
                        $searchtext=$_GET['searchtext'];
                        if($searchtext!=''){
                            $search_sql='  t_name like \'%'.$searchtext.'%\'  ';
                        }
                        else {
                            $search_sql = ' 1 = 1 ';
                        }
                        $querytp=$flag_m->select($search_sql.' order by id desc '.$limit_str);
                        $querycount=$flag_m->select($search_sql,'0','count');
                        // echo  $querycount;
                        $pagecount=ceil($querycount/$pagesize);
                        $pageno=$page;
                        // echo $pagecount;
                        foreach($querytp as $q){
//                            $q['nickname'] = pack('H*', $q['nickname']);
//                            $q = emoji_unified_to_html(emoji_softbank_to_unified($q));
                            ?>
                            <tr>
                                <td class="hidden-xs">
                                    <?php echo  $q['id']; ?>
                                </td>
                                <td>
                                    <?php echo  $q['t_name']; ?>
                                </td>

                                <td class="hidden-xs">
                                    <?php echo  $q['t_introduce'] ?>
                                </td>

                                <td class="hidden-xs">
                                    <img height="50px;" src="<?php echo  $q['t_img'] ?>" alt="">
                                </td>
                                <td class="hidden-xs">
                                    <a href="newteacheredit.php?id=<?php echo $q['id'] ?>">编辑</a>|
                                    <a href="newteachertimeedit.php?id=<?php echo $q['id'] ?>">时间管理</a>
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
            <form action="newseat.php" method="post">
            <div class="modal-body">
                <table>
                    <tr>
                        <th>
                            手机号
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="user_phone">
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
        var id = $(a).parent().parent().children().eq(0).html().trim();
        $('#currentid').val(id);
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