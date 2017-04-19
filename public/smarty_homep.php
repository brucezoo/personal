<?php
session_start();
require ("./test/smarty/main1.php");
$db=new mysqli("127.0.0.1","root","root","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
$tpl->assign("title","博客主页");
//
$quer="select * from navs";
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
////$tpl->display("smarty_homep.tpl");
//
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