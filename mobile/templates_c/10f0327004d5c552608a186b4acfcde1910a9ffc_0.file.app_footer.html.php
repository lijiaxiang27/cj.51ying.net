<?php
/* Smarty version 3.1.29, created on 2017-11-09 04:36:52
  from "E:\website\cj.51ying.net\mobile\template\app_footer.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a03cd54cb0518_49834332',
  'file_dependency' => 
  array (
    '10f0327004d5c552608a186b4acfcde1910a9ffc' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\app_footer.html',
      1 => 1509592658,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:template/bd.html' => 1,
  ),
),false)) {
function content_5a03cd54cb0518_49834332 ($_smarty_tpl) {
?>
<style>

/*header*/

.title a{
color:#fff;
}
.title a {
    position: relative;
    display: inline-block;
    padding: 0 5px;
}
.title a::after {
    position: absolute;
    display: block;
    top: 42%;
    left: 100%;
    width: 16px;
    height: 10px;
    background: url(template/app/images/w-icon-dropdown.png) center center no-repeat;
    background-size: 16px;
    content: "";
}
.collect{
	padding:20px;
}
.collect aside {
    float: left;
    border: 1px solid #ff7101;
    background: #fff;
    padding: 4px;
    line-height: 0;
    margin-left: 10px;
    border-radius: 5px;
	margin-bottom:20px;
}
.collect aside img {
    width: 80px;
    height: 80px;
	border: 0;
}
.collect .p1 {
    padding-top: 9px;
    line-height: 25px;
	font-size: 14px;
    margin-left: 115px;
}

#toast {
    display: none;
    position: fixed;
    padding: 9px 15px;
    background-color: #333;
    z-index: 8000;
    border-radius: 5px;
	font-size: 15px;
    color: #ffffff;
    line-height: 25px;
    text-align: center;
	
}

</style>
<div class="toolbar" style="position:absolute;top:0;left:0;background-color:#04BE02;">
          <div class="toolbar-inner">
            <h1 class="title"><a href="javascript:void(0);" class="dropdown-menu has-msg"><?php if ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_qd') {?>签到<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_wall') {?>消息上墙<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_lottory') {?>抽奖<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_vote') {?>投票<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_shake') {?>摇一摇<?php } elseif ($_smarty_tpl->tpl_vars['_GPC']->value['do'] == 'app_redpack') {?>抢红包<?php }?></a></h1>
          </div>
</div>
<div id="pop_nav" class="weui-popup-container popup-bottom">
  <div class="weui-popup-overlay"></div>
  <div class="weui-popup-modal">
		<div class="toolbar">
          <div class="toolbar-inner">
            <a href="javascript:;" class="picker-button close-popup">关闭</a>
            <h1 class="title">功能列表</h1>
          </div>
        </div>
		<div class="modal-content">
          <div class="weui_grids">
      <?php
$_from = $_smarty_tpl->tpl_vars['xianchang']->value['controls'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_row_0_saved_item = isset($_smarty_tpl->tpl_vars['row']) ? $_smarty_tpl->tpl_vars['row'] : false;
$__foreach_row_0_saved_key = isset($_smarty_tpl->tpl_vars['name']) ? $_smarty_tpl->tpl_vars['name'] : false;
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['name'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['name']->value => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$__foreach_row_0_saved_local_item = $_smarty_tpl->tpl_vars['row'];
?>
			<?php if ($_smarty_tpl->tpl_vars['row']->value == 'qd') {?>
            <a href="qiandao.php?rentopenid=<?php echo $_smarty_tpl->tpl_vars['openid']->value;?>
" class="weui_grid js_grid">
              <div class="weui_grid_icon">
                <img src="template/app/images/icon/ico005.png" alt="" style="background-color: #3399cc;">
              </div>
              <p class="weui_grid_label">
                签到
              </p>
            </a>
		   <?php } elseif ($_smarty_tpl->tpl_vars['row']->value == 'wall') {?>
		   <a href="index.php?rentopenid=<?php echo $_smarty_tpl->tpl_vars['openid']->value;?>
" class="weui_grid js_grid">
              <div class="weui_grid_icon">
                <img src="template/app/images/icon/ico009.png" alt="" style="    background-color: #72C700;">
              </div>
              <p class="weui_grid_label">
                上墙
              </p>
            </a>
        <?php } elseif ($_smarty_tpl->tpl_vars['row']->value == 'shake') {?>
       <a href="shake.php?rentopenid=<?php echo $_smarty_tpl->tpl_vars['openid']->value;?>
" class="weui_grid js_grid">
              <div class="weui_grid_icon">
                <img src="template/app/images/icon/ico002.png" alt="" style=" background-color: #33cc66;">
              </div>
              <p class="weui_grid_label">
                摇一摇
              </p>
            </a>
		   <?php } elseif ($_smarty_tpl->tpl_vars['row']->value == 'vote') {?>
		   <a href="vote.php?rentopenid=<?php echo $_smarty_tpl->tpl_vars['openid']->value;?>
" class="weui_grid js_grid">
              <div class="weui_grid_icon">
                <img src="template/app/images/icon/ico004.png" alt="" style="      background-color: #ff9900;  ">
              </div>
              <p class="weui_grid_label">
                投票
              </p>
            </a>
			
		   <?php }?>
		   <?php
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_local_item;
}
if ($__foreach_row_0_saved_item) {
$_smarty_tpl->tpl_vars['row'] = $__foreach_row_0_saved_item;
}
if ($__foreach_row_0_saved_key) {
$_smarty_tpl->tpl_vars['name'] = $__foreach_row_0_saved_key;
}
?>
		   <!--TODO 报名预约交谈-->
			
		   <a href="conversation.php" class="weui_grid js_grid">
              <div class="weui_grid_icon">
                <img src="template/app/images/icon/ico009.png" alt="" style="    background-color: #72C700;">
              </div>
              <p class="weui_grid_label">
				预约商谈
              </p>
            </a>
			<!--客户经理登陆-->
			<a href="login.php" class="weui_grid js_grid">
              <div class="weui_grid_icon">
                <img src="template/app/images/icon/ico009.png" alt="" style="    background-color: #72C700;">
              </div>
              <p class="weui_grid_label">
				客户经理登陆
              </p>
            </a>
          </div>
		  <div class="collect">
                <aside>
                    <img src="<?php echo $_smarty_tpl->tpl_vars['erweima']->value;?>
" alt="请检查二维码是否上传成功">
                </aside>
                <p class="p1">
                    为便于您退出后二次进入强烈建议您长按左侧二维码进行保存
                </p>
            </div>
        </div>
  </div>
</div>
<div id="toast"></div>
 <?php echo '<script'; ?>
 src="template/app/js/jquery-weui.min.js"><?php echo '</script'; ?>
>
 <?php echo '<script'; ?>
>
  $(function() {
	$(".dropdown-menu").click(function(){	
		$("#pop_nav").popup();
	});
	});
 <?php echo '</script'; ?>
>
 <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:template/bd.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
