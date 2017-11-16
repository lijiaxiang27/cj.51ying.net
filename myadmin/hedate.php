<?php
include('db.php');
include('biaoqing.php');
//$firstnum = $_GET['firstnum'];
//$startnum = $_GET['startnum'] - 1;
//$startnum = $firstnum - $startnum;
$lastid=$_GET['lastid'];
$wall_m=new M('wall');
$data=$wall_m->select('id>'.$lastid.' order by id asc limit 5');
//echo var_export($data);
//$sql = "SELECT * FROM  `weixin_wall` where id>{$lastid} order by id asc LIMIT 5";
//$query = mysql_query($sql);
foreach($data as $q){
    $q['nickname'] = pack('H*', $q['nickname']);
    $q['content'] = pack('H*', $q['content']);
    $q = emoji_unified_to_html(emoji_softbank_to_unified($q));
    $q['content'] = biaoqing($q['content']);
    $add[] = array(
        'id' => $q['id'],
        'content' => content($q)
    );
}
//while ($q = mysql_fetch_row($query)) {
//    $q[5] = pack('H*', $q[5]);
//    $q[4] = pack('H*', $q[4]);
//    $q = emoji_unified_to_html(emoji_softbank_to_unified($q));
//    $q[4] = biaoqing($q[4]);
//    $add[] = array(
//        'id' => $q[0],
//        'content' => content($q)
//    );
//}
echo json_encode($add);
function content($q)
{
  // echo var_export($q);
    //判断是否是审核过的 0表示未审核 1表示审核过
    if ($q['ret'] == 0) {
        //判断是否带图片，空为无
        if ($q['image'] == '') {
            $return = "
    <!-- Text Post -->
    <div class='item widget-container fluid-height social-entry texts waitshenhe' id='" . $q['id'] . "'>
      <div class='widget-content padded'>
        <div class='profile-info clearfix'>
          <img width='50' height='50' class='social-avatar pull-left' src='" . $q['avatar'] . "' />
          <div class='profile-details'>
            <a class='user-name'><strong>" . $q['nickname'] . "</strong></a>
            <p>
              <em>第" . $q['id'] . "条 type:文字消息</em>
            </p>
          </div>
        </div>
        <p class='content'>
          " . $q['content'] . "
        </p>
          <div class='btn btn-sm btn-default-outline' id='sutooltip-top' data-content='审核通过此条消息'>
            <a href='shenhe.do.php?do=shenhe&cid=" . $q['id'] . "'><i class='icon-ok-sign'></i></a>
          </div>
          <div class='btn btn-sm btn-default-outline' data-placement='top' id='sutooltip-top' data-content='删除此条消息'>
            <a href=\"javascript:if(confirm('确定删除吗？将无法恢复！')){location.href='shenhe.do.php?do=del&cid=" . $q['id'] . "'}\"><i class='icon-remove'></i></a>
        </div>
      </div>
    </div>
    <!-- end Text Post --> ";
        } else {
          //处理来自微信的信息
            $return = "
    <!-- Media Post -->
    <div class='item widget-container clearfix social-entry imgs waitshenhe' id='" . $q['id'] . "'>
      <div class='widget-content'>
        <div class='profile-info clearfix padded'>
          <img width='50' height='50' class='social-avatar pull-left' src='" . $q['avatar'] . "' />
          <div class='profile-details'>
            <a class='user-name'><strong>" . $q['nickname'] . "</strong></a>
            <p>
              <em>第" . $q['id'] . "条 type:图片消息</em>
            </p>
          </div>
        </div>
        <img width='350' class='social-content-media' src='" . $q['image'] . "' />
        <div class='padded'>
                  <div class='btn btn-sm btn-default-outline' id='sutooltip-top' data-content='审核通过此条消息'>
            <a href='shenhe.do.php?do=shenhe&cid=" . $q['id'] . "'><i class='icon-ok-sign'></i></a>
          </div>
          <div class='btn btn-sm btn-default-outline' data-placement='top' id='sutooltip-top' data-content='删除此条消息'>
            <a href=\"javascript:if(confirm('确定删除吗？将无法恢复！')){location.href='shenhe.do.php?do=del&cid=" . $q['id'] . "'}\"><i class='icon-remove'></i></a>

          </div>
        </div>
      </div>
    </div>
    <!-- end Media Post -->
     ";
        }
    } else {
        //此处为审核过的消息
        //判断是否带图片，空为无
        if ($q['image'] == '') {
            $return = "
    <!-- Text Post -->
    <div class='item widget-container fluid-height social-entry stexts shenhe' id='" . $q['id'] . "'>
      <div class='widget-content padded'>
        <div class='profile-info clearfix'>
          <img width='50' height='50' class='social-avatar pull-left' src='" . $q['avatar'] . "' />
          <div class='profile-details'>
            <a class='user-name'><strong>" . $q['nickname'] . "</strong></a>
            <p>
              <em>第" . $q['id'] . "条 type:文字消息</em>
            </p>
          </div>
        </div>
        <p class='content'>
          " . $q['content'] . "
        </p>
               <div class='alert alert-warning'>
                     此消息为已经审核通过的消息
                     <a href=\"javascript:if(confirm('确定删除吗？将无法恢复！')){location.href='shenhe.do.php?do=del&cid=" . $q['id'] . "'}\"><i class='icon-remove'></i></a>
                    </div>   

      </div>
    </div>
    <!-- end Text Post -->
	
	
	";
        } else {
            $return = "
    <!-- Media Post -->
    <div class='item widget-container clearfix social-entry simgs shenhe' id='" . $q['id'] . "'>
      <div class='widget-content'>
        <div class='profile-info clearfix padded'>
          <img width='50' height='50' class='social-avatar pull-left' src='" . $q['avatar'] . "' />
          <div class='profile-details'>
            <a class='user-name'><strong>" . $q['nickname'] . "</strong></a>
            <p>
              <em>第" . $q['id'] . "条 type:图片消息</em>
            </p>
          </div>
        </div>
        <img width='350' class='social-content-media' src='" . $q['image'] . "' />
        <div class='padded'>
               <div class='alert alert-warning'>
                      此消息为已经审核通过的消息
                      <a href=\"javascript:if(confirm('确定删除吗？将无法恢复！')){location.href='shenhe.do.php?do=del&cid=" . $q['id'] . "'}\"><i class='icon-remove'></i></a>
                    </div>   
        </div>
      </div>
    </div>
    <!-- end Media Post -->
    ";
        }
    }
    return $return;
}

;


?>