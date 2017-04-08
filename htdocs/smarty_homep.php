<?php
session_start();
require ("./test/smarty/main1.php");
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
$tpl->assign("title","博客主页");
//$array=array("新闻","热点","社会","视频","娱乐","图片","科技","汽车","体育","军事","国际","教育","健康","历史","养生","文化");
//$tpl->assign("nav",$array);
//$insert="insert into article_class VALUES (null,\"新闻\"),(NULL ,\"热点\"),(NULL,\"社会\"),(NULL,\"视频\"),(NULL,\"娱乐\"),(NULL,\"图片\"),(NULL,\"科技\"),(NULL,\"汽车\"),(NULL,\"体育\"),(NULL,\"军事\"),(NULL,\"国际\"),(NULL,\"教育\"),(NULL,\"健康\"),(NULL,\"历史\"),(NULL,\"养生\"),(NULL,\"文化\");";
//$inser=$db->query($insert);
$quer="select * from article_class";
$resu=$db->query($quer);

$rownum=$resu->num_rows;
//var_dump($rownum);
for($i=0;$i<$rownum;$i++){
    $row[]=$resu->fetch_row();
}
//var_dump($row);
$tpl->assign("nav",$row);
$tpl->assign("hptitle","我的博客");
$tpl->assign("hp_subtitle","一个PHP菜鸟写的第一个博客");
//$tpl->display("smarty_homep.tpl");

$query="select id,title,author,articledate from article ";
$result=$db->query($query);

$array = $result->fetch_all();
foreach ($array as $value ){
//  var_dump($value);
//    echo "<h2 align='center'><a class='m' href='subpage.php?id={$value[0]}' style='text-decoration: none' target='_blank'>".$value[1]."</a><br /></h2>";
//    echo "<p align='center' class=\"post-meta\">Posted by <a class='m' href='subpage.php?id={$value[0]}' style='text-decoration: none' target='_blank'>".$value[2]," on  ".$value[3]."</a><br /></p>";
//    echo "  <hr>";
}
@$user=$_SESSION["valid_user"];
$qryu="select * from new WHERE account='".$user."' or nickname='".$user."'";
$relut=$db->query($qryu);
$ro=$relut->fetch_row();
$tpl->assign("head_image",$ro[4]);
$tpl->assign("va",$array);
$db->close();
$tpl->display("smarty_homep.tpl");
//session_destroy();
?>