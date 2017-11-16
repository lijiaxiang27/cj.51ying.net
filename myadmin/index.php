<?php
// exit();
 include('navigation.php');
// exit();
?>      <!-- End Navigation -->

<div class="container main-content">

    <div class="row">
        <div class="col-lg-12">
            <center>
                <img width="30%" src="images/banner.png"/>
            </center>
        </div>
    </div>
    <div class="row">

        <div class="stats-container">
            <div class="col-lg-12  ">

                <h2 class="number">为什么使用微信墙？</h2>

                <p>1、不需要向微信官方申请，可以直接自由使用；</p>

                <p> 2、具有较好的私密性，不会造成微博那样被刷屏的负面影响；</p>

                <p> 3、可以自由定制墙体界面、文字，达到更好的使用效果；</p>

                <p> 4、可以增加微信公众号的粉丝数量。</p>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="stats-container" data-step="1" data-intro="请注意这里的设备要求，准备好相应的设备，避免不必要的尴尬。">
            <div class="col-lg-12  ">

                <h2 class="number">现场需要的设备？</h2>

                <p>方案1. 两台电脑：一台用于大屏幕展示，一台用于信息审核，均需联网，均需安装<a target="_blank"
                                                            href="http://www.so.com/s?q=Chrome&ie=utf-8&src=se_lighten">Chrome</a>浏览器；
                </p>

                <p>方案2.如果是一台电脑，在投影时可以采用扩展模式，扩展桌面用于大屏幕展示，<bold>电脑桌面</bold>用于信息审核。
                </p>

                <p>*扩展模式的使用方法请参考：<a href="http://user.qzone.qq.com/181603816/blog/1454140850"
                                    target="_blank" se_prerender_url="complete">http://user.qzone.qq.com/181603816/blog/1454140850</a>
                </p>

                <p>网络：建议独享网络（建议2M以上，最低512K）</p>

                <p>屏幕设备：<a target="_blank"
                           href="http://www.so.com/s?q=LED%E6%B6%B2%E6%99%B6%E5%B1%8F&ie=utf-8&src=se_lighten">LED液晶屏</a>或投影幕布等
                </p>

                <p>专人审核：建议配备专人进行内容审核，防止现场有负面消息上墙。</p>

            </div>
        </div>
    </div>

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
</script>
</body>

</html>