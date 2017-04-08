<?php
session_start();
require ("./test/smarty/main1.php");
date_default_timezone_set('prc');
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
$quer="select * from article_class";
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
$tpl->assign("hptitle","写 博 客");
$tpl->assign("time",date('Y-m-d H:i:s'));
@$tpl->assign("title","写博客");
$tpl->assign("nav",$row);
$tpl->display("writeblog.tpl");
?>