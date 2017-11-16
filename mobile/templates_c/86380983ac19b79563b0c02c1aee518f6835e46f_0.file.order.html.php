<?php
/* Smarty version 3.1.29, created on 2017-11-15 10:08:11
  from "E:\website\cj.51ying.net\mobile\template\order.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a0ba18b003d81_47892083',
  'file_dependency' => 
  array (
    '86380983ac19b79563b0c02c1aee518f6835e46f' => 
    array (
      0 => 'E:\\website\\cj.51ying.net\\mobile\\template\\order.html',
      1 => 1510709937,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a0ba18b003d81_47892083 ($_smarty_tpl) {
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>预约</title>
    <link rel="stylesheet" href="template/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="template/static/css/style.css">
    <link rel="stylesheet" href="template/static/js/need/layer.css">
    <?php echo '<script'; ?>
 src="template/static/js/jquery-3.2.1.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var deviceWidth = document.documentElement.clientWidth;if(deviceWidth > 750)
            deviceWidth = 750;document.documentElement.style.fontSize = deviceWidth / 7.5 + 'px';
        $(window).resize(function() {
            var deviceWidth = document.documentElement.clientWidth;
            if(deviceWidth > 750)
                deviceWidth = 750;document.documentElement.style.fontSize = deviceWidth / 7.5 + 'px';
        });
    <?php echo '</script'; ?>
>
    <style>

    </style>
</head>
<body>
<div class="container form">
    <div class="form-box">
        <input type="text" class="form-control" placeholder="姓名" id="user">
    </div>
    <div class="form-box">
        <input type="tel" class="form-control" placeholder="联系电话" id="telNumber">
    </div>
    <div class="form-box">
        <p id="Input" class="clearfix">所在地区<span class="pull-right">请选择<img src="template/static/images/arrow-right.png" alt=""></span></p>
    </div>
    <div class="form-box" id='c_id'>
        <input type="text" class="form-control" placeholder="项目经理" id="manager">
    </div>
    <div class="submit-btns">
        <a href="#1" id="cancel">取消</a>
        <a href="#1" id="submit">提交</a>
    </div>
</div>
<div id="targetContainer"></div>
<?php echo '<script'; ?>
 src="template/static/js/city.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="template/static/js/MultiPicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="template/static/js/layer.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    new MultiPicker({
        input : 'Input',//点击触发插件的input的Id
        container : 'targetContainer',//插件插入的容器id
        jsonData : $city,//插入的三级联动js数据
        success : function(arr){
            var areaData;
            if(!arr[2]){
                areaData = arr[0].value+'/'+arr[1].value;
            } else {
                areaData = arr[0].value+'/'+arr[1].value+'/'+arr[2].value;
            }
            console.log(areaData);
            document.getElementById('Input').innerHTML = areaData;
        }
    });


    var submit = $('#submit');
    submit.click(function () {
		var c_id = <?php echo $_smarty_tpl->tpl_vars['c_id']->value;?>
;
		var t_name  = "<?php echo $_smarty_tpl->tpl_vars['msg']->value['t_name'];?>
";
		var times  = "<?php echo $_smarty_tpl->tpl_vars['msg']->value['time'];?>
";
        var user =  $('#user').val();
        var telNum = $('#telNumber').val();
        var input = document.getElementById('Input').innerText;
       
        var manager = $('#manager').val();
        if(user == ''){
            alert('请输入您的姓名');
            return false;
        }
        if(telNum == ''){
            alert('请填写您的手机号');
            return false;
        }
		
        if(input.trim() ==='所在地区请选择'){
            alert('请选择所在地区');
            return false;

        }
        if(manager ===''){
            alert('请填写项目经理');
            return false;
        }
        layer.open({
            anim: 'scale',
            content: '是否确定预约'+t_name+' '+times+'时段',
            btn: ['确定', '取消'],
             yes: function(index){
                 layer.close(index);
                 /***** AJAX ******/
                 $.ajax({
                     type:'post',
                     url : 'conversation.php',

                     /*******字段********/
                     data :{
                         'u_name':user,'u_phone':telNum,'u_area':input,'m_name':manager,'c_id':c_id
                     },
                     dataType :'json',
                     success : function(msg){
                         if (msg.code == 200) {
                             /*发ajax到后台 end*/
                             layer.open({
                                 type: 2,
                                 time:2,
                                 shadeClose:false,
                                 content: '提交中，请稍候...',
                                 success: function(){
                                     setTimeout(function(){
                                         alert('您已成功预约！');
                                         window.location.href = 'index.php';
                                     },1000);
                                 }
                             });
                         }else {
                             alert(msg.msg);
							 window.location.href='conversation.php';
                         }
                     }
                 });//ajax end
             }
        });
    });

<?php echo '</script'; ?>
>
</body>
</html><?php }
}
