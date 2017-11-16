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
                    <i class="icon-table"></i>签到列表 <?php if (version_compare(PHP_VERSION, '5.3.0') >0) { ?> <a href="exportqd.php" target="_blank" style="float:right;" data-step="1" data-intro="点击此处导出签到列表EXCEL"><i class="icon-download"></i>导出excel</a><?php } ?>
                  
                </div>
               <!--  <div class="alert alert-warning">
                    <button class="close" data-dismiss="alert" type="button">×</button>
                    声明：抽奖管理采用主动推送消息，只是为了方便活动方与用户的沟通交流，请勿频繁发送或骚扰微信用户，一切后果与作者无关。
                </div> -->
                <div class="widget-content padded clearfix form-horizontal">
                    <?php if($xuanzezu['name_switch']==1 || $xuanzezu['phone_switch']==1){ ?>
                    <div class="" style=" color:#333">
                        签到显示：
                        <input type="radio" name="signnamestatus" id="signnamestatus_weixinnickname" class="icheck" value="1" <?php if($xuanzezu['signnamestatus']==1) echo 'checked'; ?>/><label for="signnamestatus_weixinnickname">微信昵称</label>
                        <?php if($xuanzezu['name_switch']==1){?>
                        <input type="radio" name="signnamestatus" class="icheck" id="signnamestatus_realname" value="2" <?php if($xuanzezu['signnamestatus']==2) echo 'checked'; ?>/><label for="signnamestatus_realname">真实命名</label>
                        <?php } ?>
                        <?php if($xuanzezu['phone_switch']==1){?>
                        <input type="radio" name="signnamestatus" class="icheck" id="signnamestatus_moblie" value="3" <?php if($xuanzezu['signnamestatus']==3) echo 'checked'; ?>/><label for="signnamestatus_moblie">手机号码</label>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <!-- <div class="dataTables_filter"><label>Search: <input type="text" ></label><i class="btn btn-sm btn-primary-outline input-group-btn"></i></div> -->
                    <div class="form-group col-md-5 pull-right">
                        <label class="control-label col-md-2">搜索: </label>
                        <div class="col-md-8">
                            <form action="qd.php" method="get" novalidate="novalidate">
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
                                昵称
                            </th>
                            <th>
                                姓名（签到填写）
                            </th>
                            <th>
                                手机号（签到填写）
                            </th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include('biaoqing.php');
                        require_once('../common/db.class.php');
                        $flag_m=new M('flag');
                        $page=intval($_GET['page']);
                        $page=$page>1?$page:1;
                        $pagesize=20;
                        $limit_str=' limit '.($page-1)*$pagesize.','.$pagesize;
                        //只显示签到的人
                        $searchtext=$_GET['searchtext'];
                        if($searchtext!=''){
                            $search_sql=' and (nickname like \'%'.bin2hex($searchtext).'%\' or signname like \'%'.$searchtext.'%\' or phone like \'%'.$searchtext.'%\') ';
                        }
                        
                        $querytp=$flag_m->select(' flag>1'.$search_sql.' order by id desc '.$limit_str);
                        $querycount=$flag_m->select(' flag>1'.$search_sql,'0','count');
                        // echo  $querycount;
                        $pagecount=ceil($querycount/$pagesize);
                        $pageno=$page;
                        // echo $pagecount;
                        foreach($querytp as $q){
                            $q['nickname'] = pack('H*', $q['nickname']);
                            $q = emoji_unified_to_html(emoji_softbank_to_unified($q));
                            ?>
                            <tr>
                                <td class="hidden-xs">
                                    <?php echo  $q['id']; ?>
                                </td>
                                <td>
                                    <img class="ui avatar image" src="<?php echo  $q['avatar'] ?>"><?php echo  $q['nickname']; ?>
                                </td>
                                <td class="hidden-xs">
                                    <?php echo  $q['signname']; ?>
                                </td>
                                <td class="hidden-xs">
                                    <?php echo  $q['phone']; ?>
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
                    echo pager($page,$pagesize,$querycount,'qd.php',$_GET);
                    ?>
                </div>
            </div>
            <!-- end DataTables Example -->
        </div>
    </div>
</div>
<script type="text/javascript">
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