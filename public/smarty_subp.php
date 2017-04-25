<?php
session_start();
require ("./test/smarty/main1.php");
$id=$_GET["id"];
$db=new mysqli("127.0.0.1","root","root","testDataBase");
if(mysqli_connect_errno()){
    echo "对不起，数据库连接错误";
    exit();
}
mysqli_query($db,'set names utf8');

$query="select * from article WHERE id=$id";
$resultt=$db->query($query);
$ro=$resultt->fetch_object();
$tpl->assign("title",$ro->title);
//var_dump(nl2br($ro->content));
@$_SESSION['valid_user'];
$quer="select * from navs";
$resu=$db->query($quer);
$rownum=$resu->num_rows;
//var_dump($rownum);
for($i=0;$i<$rownum;$i++){
    $row[]=$resu->fetch_row();
}
$tpl->assign("nav",$row);
//date_default_timezone_set('Asia/Shanghai');

$count=$db->query("UPDATE article SET count=count+1 WHERE id=".$_GET['id']);
$qu="select * from article WHERE id=$id";
$resu=$db->query($qu);
@$roww=$resu->fetch_all();
//foreach ($roww as $value){
//}
$tpl->assign("va",$roww);
@$feedback=$_POST["feedback"];
$feedbackdate=date('Y-m-d H:i:s');
@$user=$_SESSION["valid_user"];
if(!empty($feedback)&&!empty($user)) {
    @$insert = "insert into feedback VALUES (null,'" . $_SESSION["valid_user"] . "','" . $feedback . "','" . $feedbackdate . "',$id)";
$result=$db->query($insert);}
$page=isset($_GET["page"])? intval($_GET["page"]):1;
$num=10;
$sql="select * from feedback where id=$id;";
$res=$db->query($sql);
$total=$res->num_rows;
$pagenum=ceil($total/$num);
//If($page>$pagenum || $page == 0){
//    Echo "Error : Can Not Found The page .";
//    Exit;
//}
$offset=($page-1)*$num;
$prevpage=$page-1;
$nextpage=$page+1;
$pagecount=array();
for($i=1;$i<=$pagenum;$i++){
    $show[]=($i!=$page)?"<a href='smarty_subp.php?id=$id&page=".$i."'>$i</a>":"<b>$i</b>";
}
$q="select username,feedback,feedbackdate from feedback WHERE id=$id order by feedbackdate DESC limit $offset,$num";
$resul=$db->query($q);
$row=$resul->fetch_all();
foreach ($row as $a){
}

$qryu="select * from new WHERE account='".$user."'";
$relut=$db->query($qryu);
$ro=$relut->fetch_row();
$tpl->assign("head_image",$ro[4]);
$tpl->assign("a",$row);
$tpl->assign("user",$user);
$tpl->assign("feedback",$feedback);
$tpl->assign("script","<script language=\"javascript\">{alert(\"评论成功\");history.go(-2);}</script>");
$tpl->assign("page",$page);
$tpl->assign("prepage",$prevpage);
$tpl->assign("nextpage",$nextpage);
$tpl->assign("shang","<a href='smarty_subp.php?id=$id&page=".$prevpage."'>上一页</a>");
$tpl->assign("xia","<a href='smarty_subp.php?id=$id&page=".$nextpage."'>下一页</a>");
$tpl->assign("pagenum",$pagenum);
$tpl->assign("pagecount",$pagecount);
$tpl->assign("total",$total);
$tpl->assign("num",$num);
@$tpl->assign("show",$show);

$db->close();
$tpl->display("smarty_subp.tpl");

?>

