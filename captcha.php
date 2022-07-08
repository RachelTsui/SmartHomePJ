<?php
//创建画布
$img = imagecreatetruecolor(100, 50);
//创建颜色
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
//画布填充颜色
imagefill($img, 0, 0, $white);//背景为白色
//生成随机验证码
$code = make(5);
//设置文字
imagestring($img, 5, 10, 10, $code, $black);//黑字
//加入噪点干扰
for ($i = 0; $i <300; $i++){
    imagesetpixel($img, rand(0, 100), rand(0, 100), $black);
    imagesetpixel($img, rand(0, 100), rand(0, 100), $green);
}
//加入线段干扰
//输出验证码
header("content-type: image/png");//告诉浏览器这个文件是一个png图片
imagepng($img);
//销毁图片，释放内存
imagedestroy($img);
//生成随机验证码的函数
function make($length){
    $code = 'abcdefghijklmnopqrsruvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    //str_shuffle()函数用于打乱字符串
    return substr(str_shuffle($code), 0, $length);
}
?>