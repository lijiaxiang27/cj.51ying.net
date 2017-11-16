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
                    <i class="icon-table"></i>抽奖管理
                    <div class="pull-right" style=" color:#333">
                        签到即可抽奖：
                        <div class="toggle-switch switch-small" id="cj_condition" data-off="warning" data-on="success"
                             style="margin-bottom:8px">
                            <input <?php if ($xuanzezu['cj_condition'] == 2) {
                                echo "checked";
                            } ?> type="checkbox">
                        </div>
                    </div>
                    <div class="pull-right" style=" color:#333">
                        中奖发送消息提醒：
                        <div class="toggle-switch switch-small" id="autopush" data-off="warning" data-on="success"
                             style="margin-bottom:8px">
                            <input <?php if ($xuanzezu['cjreplay'] == 1) {
                                echo "checked";
                            } ?> type="checkbox">
                        </div>
                    </div>
                    
                </div>
                <div class="alert alert-warning">
                    <button class="close" data-dismiss="alert" type="button">×</button>
                    声明：抽奖管理采用主动推送消息，只是为了方便活动方与用户的沟通交流，请勿频繁发送或骚扰微信用户，一切后果与作者无关。
                </div>

                 <div class="widget-content padded clearfix">
                    <?php if($xuanzezu['name_switch']==1 || $xuanzezu['phone_switch']==1){ ?>
                    <div class="" style=" color:#333">
                        中奖显示：
                        <input type="radio" name="cjshownamestatus" id="cjshownamestatus_weixinnickname" class="icheck" value="1" <?php if($xuanzezu['cjshownamestatus']==1) echo 'checked'; ?>/><label for="cjshownamestatus_weixinnickname">微信昵称</label>
                        <?php if($xuanzezu['name_switch']==1){?>
                        <input type="radio" name="cjshownamestatus" class="icheck" id="cjshownamestatus_realname" value="2" <?php if($xuanzezu['cjshownamestatus']==2) echo 'checked'; ?>/><label for="cjshownamestatus_realname">真实命名</label>
                        <?php } ?>
                        <?php if($xuanzezu['phone_switch']==1){?>
                        <input type="radio" name="cjshownamestatus" class="icheck" id="cjshownamestatus_moblie" value="3" <?php if($xuanzezu['cjshownamestatus']==3) echo 'checked'; ?>/><label for="cjshownamestatus_moblie">手机号码</label>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <table class="table table-striped" id="datatable-editable">
                        <thead>
                        <tr>
                            <th class="hidden-xs">
                                序号
                            </th>
                            <th>
                                昵称
                            </th>
                            <th>
                                sn验证码
                            </th>
                            <th class="hidden-xs">
                                状态
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
                        $flag_m=new M('flag');
                        $flag_m->find('status=1');
//                        $toupiao = "SELECT * FROM  `weixin_flag` where status=1 ";
//                        $querytp = mysql_query($toupiao, $link) or die(mysql_error());
                        $querytp=$flag_m->select('status=1 order by cjtime desc');
                        foreach($querytp as $q){
//                        while ($q = mysql_fetch_row($querytp)) {
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
                                <td>
                                    <?php echo  $q['fakeid']; ?>
                                </td>
                                <td class="hidden-xs">
                                    <?php
                                    if ($q['cjstatu']) {
                                        echo '<span class="label label-success">已发</span>';
                                    } else {
                                        echo '<span class="label label-warning">待办</span>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($q['cjstatu']) {
                                        // echo '验证　发奖';
                                        echo '发奖';
                                    } else {
                                        // echo '<a href="shenhe.do.php?do=cj_verify&cid='.$q[7].'">验证</a>　<a href=shenhe.do.php?do=cj_award&cid='.$q[0].'"">发奖</a>';
                                        echo '<a href=shenhe.do.php?do=cj_award&cid=' . $q['id'] . '"">发奖</a>';
                                    }
                                    ?>
                                </td>

                            </tr>
                        <?php
//                        }
                        }
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end DataTables Example -->
        </div>
    </div>
    <?php
    $wall_config_m = new M('wall_config');
    $wall_config = $wall_config_m->find('1', '*', '');
    if($wall_config['phone_switch']==1){
    ?>
    <div class="row">
                  <div class="col-lg-12">

<div class="widget-container fluid-height clearfix">
              <div class="heading">
                <i class="icon-table"></i>内定管理
                <a class="btn btn-sm btn-primary-outline pull-right" id="add-row" href="javascript:void(0)"><i class="icon-plus"></i>增加一行</a>
              </div>
              <div class="alert alert-warning">
                      <button class="close" data-dismiss="alert" type="button">×</button>说明：
                      <p>　1、每个中奖手机号码和序号必须为唯一，请勿重复。</p>
                      <p>　2、中奖设置可设重复，同一等奖的先后要看内定用户进入游戏的先后顺序。</p>
                      <p>　3、同一个人不能同时中多个奖项</p>
                      <p>　4、第*次抽奖在前台的表现方式为，刷新页面第一次点击抽奖页面为1等奖，第二次为2等奖。</p>
                      <p>　5、前台的重新抽奖会重置所有用户重新抽奖，不论几等奖。</p>
                    </div>
              <div class="widget-content padded clearfix">
                <table class="table table-striped"  id="datatable-shady">
                  <thead>
                    <tr><th class="hidden-xs">
                      序号(用于判别中奖手机，请勿与之前序号重复)
                    </th>
                    <th>
                      手机号【填11位手机号码】
                    </th>
                    <th>
                      中奖设置（第*次抽奖）【填一个数字】
                    </th>
                    <th>
                      操作
                    </th>
                  </tr></thead>
                  <tbody>
                                           <?php
                                           $cj_shady_m=new M('cj_shady');
                   $querytp=$cj_shady_m->select();
                        foreach($querytp as $q)
                    {
                    ?>
                    <tr>
                      <td class="hidden-xs"><?php echo $q['id']; ?></td>
                      <td>
                        <?php echo $q['phone']; ?>
                      </td>
                      <td>
                        <?php echo $q['grade']; ?>
                      </td>
                      <td>
                          <a class="edit-row" href="javascript:void(0)"><i class="icon-pencil"></i></a>　<a class="delete-row" href="javascript:void(0)"><i class="icon-trash"></i></a>
                      </td>
                      
                    </tr>
                     <?php }?>
                    
                  </tbody>
                </table>
              </div>
            </div>
        <!-- end DataTables Example -->

        </div>
    </div>
    <?php
    }else{ ?>
    <div class="row">
        <div class="col-lg-12">

            <div class="widget-container fluid-height clearfix">
                <div class="heading">
                    <i class="icon-table"></i>内定管理

                </div>

                <div class="widget-content padded clearfix">
                    <div class="alert alert-warning">
                        <button class="close" data-dismiss="alert" type="button">×</button>说明：
                        必须开启记录手机号功能才能使用抽奖内容功能<a href="/myadmin/sysset.php">去开启</a>
                    </div>
                </div>
            </div>
            <!-- end DataTables Example -->

        </div>
    </div>
    <?php
    }
    ?>
<script type="text/javascript" >
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
    var cjshownamestatus=$(this).val();
    $.ajax({
        'url':'shenhe.do.php?do=cjshownamestatus',
        'data':{'cjshownamestatus':cjshownamestatus},
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
<!--   </div>
  </body>

</html> -->