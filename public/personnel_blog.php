<?php
session_start();
require ("./test/smarty/main1.php");
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
$result=$db->query("select * from article where author='".$user."'");
//var_dump($result);
$roww=$result->fetch_all();
$num=$result->num_rows;
if($num==0){
    $tpl->assign("tips","您还没有写过任何博客哦，快点击 写博客 按钮去写自己的博客吧！");
}
$qryu="select * from new WHERE account='".$user."' or nickname='".$user."'";
$relut=$db->query($qryu);
$ro=$relut->fetch_row();
$tpl->assign("head_image",$ro[4]);
$tpl->assign("article_number",$num);
$tpl->assign("va",$roww);
$tpl->assign("hptitle","个人中心");
$tpl->assign("hp_subtitle","写博客");
$tpl->assign("hp_subtitle1","更换头像");
@$tpl->assign("title",$_SESSION["valid_user"]);
$tpl->assign("nav",$row);
$tpl->display("personnel_blog.tpl");
?>