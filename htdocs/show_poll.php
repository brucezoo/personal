<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/3
 * Time: 15:40
 */
$vote=$_POST["vote"];
if(!$db_con=new mysqli("localhost","root","root","poll")){
    echo "could not connect to db<br>";
    exit();
}
if(!empty($vote)){
    $vote=addslashes($vote);
    $query="update poll_results set num_votes=num_votes+1 WHERE candidate='$vote'";
    if(!($result=@$db_con->query($query))){
        echo "could not connect to db<br>";
        exit();
    }
}
$query="select * from poll_results";
if(!($result=@$db_con->query($query))){
    echo "could not connect to db<br>";
    exit();
}
$num_candidates=$result->num_rows;
$total_votes=0;
while($row=$result->fetch_object()){
    $total_votes+=$row->num_votes;
}
$result->data_seek(0);
putenv('GDFONTPATH=Fonts/');
$width=500;
$left_margin=50;
$right_margin=50;
$bar_height=40;
$bar_spacing=$bar_height/2;
$font='arial';
$title_size=16;
$main_size=12;
$small_size=12;
$text_indent=10;
$x=$left_margin+60;
$y=50;
$bar_unit=($width-($x+$right_margin))/100;
$height=$num_candidates*($bar_height+$bar_spacing)+50;
$im=imagecreatetruecolor($width,$height);
$white=imagecolorallocate($im,255,255,255);
$blue=imagecolorallocate($im,0,64,128);
$black=imagecolorallocate($im,0,0,0);
$pink=imagecolorallocate($im,255,78,243);
$text_color=$black;
$percent_color=$black;
$bg_color=$white;
$line_color=$black;
$bar_color=$blue;
$number_color=$pink;
imagefilledrectangle($im,0,0,$width,$height,$bg_color);
imagerectangle($im,0,0,$width-1,$height-1,$line_color);
$title="poll results";
$title_dimensions=imagettfbbox($title_size,0,$font,$title);
$title_length=$title_dimensions[2]-$title_dimensions[0];
$title_height=abs($title_dimensions[7]-$title_dimensions[1]);
$title_above_line=abs($title_dimensions[7]);
$title_x=($width-$title_length)/2;
$title_y=($y-$title_height)/2+$title_above_line;
imagettftext($im,$title_size,0,$title_x,$title_y,$text_color,$font,$title);
imagestring($im,5,$title_x,$title_y,"poll results",$black);
imageline($im,$x,$y-5,$x,$height-15,$line_color);
while($row=$result->fetch_object()){

    if($total_votes>0)
        $percent=intval(($row->num_votes/$total_votes)*100);
    else
        $percent=0;
    $percent_dimensions=imagettfbbox($main_size,0,$font,$percent.'%');
    $percent_length=$percent_dimensions[2]-$percent_dimensions[0];
    imagettftext($im,$main_size,0,$width-$percent_length-$text_indent,$y+($bar_height/2),$percent_color,$font,$percent.'%');
   imagestring($im,5,$width-$percent_length-$text_indent-20,$y+($bar_height/2),$percent.'%',$black);

    $bar_length=$x+($percent*$bar_unit);
    imagefilledrectangle($im,$x,$y-2,$bar_length,$y+$bar_height,$bar_color);
    imagettftext($im,$main_size,0,$text_indent,$y+($bar_height/2),$text_color,$font,"$row->candidate");
   imagestring($im,5,$text_indent,$y+($bar_height/2),"$row->candidate",$black);
    imagerectangle($im,$bar_length+1,$y-2,($x+(100*$bar_unit)),$y+$bar_height,$line_color);
    imagettftext($im,$small_size,0,$x+(100*$bar_unit)-70,$y+($bar_height/2),$number_color,$font,$row->num_votes.'/'.$total_votes);
   imagestring($im,5,$x+(100*$bar_unit)-60,$y+($bar_height/2),$row->num_votes.'/'.$total_votes,$black);
    $y=$y+($bar_height+$bar_spacing);
}
ob_clean();
header("content-type:image/png");
imagepng($im);
imagedestroy($im);
?>













