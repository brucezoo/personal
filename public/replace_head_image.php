<?php
session_start();
require ("./test/smarty/main1.php");
$db=new mysqli("127.0.0.1","root","root","testDatabase");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
mysqli_query($db,'set names utf8');

$quer="select * from navs";
$resu=$db->query($quer);

$rownum=$resu->num_rows;
//var_dump($rownum);
for($i=0;$i<$rownum;$i++){
    $row[]=$resu->fetch_row();
}
//var_dump($row);
@$user=$_SESSION["valid_user"];
$qryu="select * from new WHERE account='".$user."' or nickname='".$user."'";
$relut=$db->query($qryu);
$ro=$relut->fetch_row();
$tpl->assign("head_image",$ro[4]);
$tpl->assign("hptitle","更 换 头 像");
$tpl->assign("time",date('Y-m-d H:i:s'));
@$tpl->assign("title","更换头像");
$tpl->assign("nav",$row);
$tpl->display("replace_head_image.tpl");
?>