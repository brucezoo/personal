<?php
session_start();
require ("./test/smarty/main1.php");
$classid=$_GET["classid"];
$db=new mysqli("127.0.0.1","root","root","testDataBase");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
//$array=array("新闻","热点","社会","视频","娱乐","图片","科技","汽车","体育","军事","国际","教育","健康","历史","养生","文化");
//$tpl->assign("nav",$array);
//$insert="insert into article_class VALUES (null,\"新闻\"),(NULL ,\"热点\"),(NULL,\"社会\"),(NULL,\"视频\"),(NULL,\"娱乐\"),(NULL,\"图片\"),(NULL,\"科技\"),(NULL,\"汽车\"),(NULL,\"体育\"),(NULL,\"军事\"),(NULL,\"国际\"),(NULL,\"教育\"),(NULL,\"健康\"),(NULL,\"历史\"),(NULL,\"养生\"),(NULL,\"文化\");";
//$inser=$db->query($insert);
mysqli_query($db,'set names utf8');

$que="select class_name from navs WHERE article_classid=$classid";
$res=$db->query($que);
$roww=$res->fetch_row();
//var_dump($res);
$tpl->assign("title",$roww[0]);
$quer="select * from navs";
$resu=$db->query($quer);
$rownum=$resu->num_rows;
for($i=0;$i<$rownum;$i++){
    $row[]=$resu->fetch_row();
}
//var_dump($row);
$tpl->assign("nav",$row);
$tpl->assign("hptitle","我的博客");
$tpl->assign("hp_subtitle","一个PHP菜鸟写的第一个博客");
$query="select id,title,author,articledate from article WHERE article_classid=$classid";
$result=$db->query($query);
$array = $result->fetch_all();
foreach ($array as $value ){
}
@$user=$_SESSION["valid_user"];
$qryu="select * from new WHERE account='".$user."'";
$relut=$db->query($qryu);
$ro=$relut->fetch_row();
$tpl->assign("head_image",$ro[4]);
$tpl->assign("va",$array);
$db->close();
$tpl->display("nav.tpl");
//session_destroy();
?>