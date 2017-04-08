<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/2
 * Time: 16:32
 */
$height=200;
$width=200;
$im=imagecreatetruecolor($width,$height);
//var_dump($im);
$white=imagecolorallocate($im,255,255,255);
//var_dump($white);
$blue=imagecolorallocate($im,0,0,64);
imagefill($im,0,0,$blue);
//imageline($im,0,0,$width,$height,$white);
//imagestring($im,4,50,150,"sales",$white);
header("content-type:image/png");
imagepng($im);
//imagepng($im,'D:\360\image.png');
imagedestroy($im);








?>