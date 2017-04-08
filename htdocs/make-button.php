<?php
$button_text=$_POST["button_text"];
//$color=$_POST["color"];
//if(empty($button_text)||empty($color)){
//    echo "form not filled out";
//    exit();
//}
//$im=imagecreatefrompng('AV]@FOW8CA5HD7M5KK7~C@R.png');
$im=imagecreatetruecolor(200,100);
$blue=imagecolorallocate($im,200,50,10);
imagefill($im,0,0,$blue);
$width_image=imagesx($im);
$height_image=imagesy($im);
$width_image_wo_margins=$width_image-(2*18);
$height_image_wo_margins=$height_image-(2*18);
$font_size=33;
putenv('GDFONTPATH=C:/Windows/Fonts/');
//$font='arial';
do{
    $font_size--;
    $bbox=imagettfbbox($font_size,0,$font,$button_text);
    $right_text=$bbox[2];
    $left_text=$bbox[0];
    $width_text=$right_text-$left_text;
    $height_text=abs($bbox[7]-$bbox[1]);
}
while($font_size>8 &&($height_text>$height_image_wo_margins||$width_text>$width_image_wo_margins));
if($height_text>$height_image_wo_margins||$width_text>$width_image_wo_margins){
    echo "text given will not fit on button";
    exit();
}else{
    $text_x=$width_image/3-$width_text/2.0;
    $text_y=$height_image/2.0-$height_text/2.0;
    if($left_text<0)
    $text_x +=abs($left_text);
    $above_line_text=abs($bbox[7]);
    $text_y +=$above_line_text;
    $text_y -=2;
    $white=imagecolorallocate($im,0,0,0);
    imagettftext($im,$font_size,0,$text_x,$text_y,$white,$font,$button_text);
   //imagestring($im,5,$text_x,$text_y,$button_text,$white);
    ob_clean();
    header("content-type:image/png");
    imagepng($im);
}
//header("content-type:image/png");
//imagepng($im);
imagedestroy($im);

?>















