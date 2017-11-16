<?php
function makeimg($img, $name)
{
    /*=======获取 储存头像========*/
    $filename = "{$name}.jpg";//要生成的图片名字
    //以下为写入过程
    $jpg = $img;//得到post过来的二进制原始数据

    $file = fopen("../img/pic/" . $filename, "w");//打开文件准备写入
    fwrite($file, $jpg);//写入
    fclose($file);//关闭
    $imgurl = Web_ROOT . "/img/pic/" . $filename;

    /*=======获取 结束========*/
    return $imgurl;
}
