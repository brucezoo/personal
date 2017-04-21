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
//$tpl->assign("add","<div align=\"center\"><img class=\"img-responsive\"src=\"1281469068223.png\"></div><p>随后，乌压压一群人径直走向位于睢宁县中山北路6号的苹果专卖店。凤凰网获得了2份现场视频，从视频中可以看到，一位男子推开了“睢宁苹果专卖店”的玻璃门，紧接着一名女子振臂而入，剩下很多人在门口围观。</p> <p>朱亚威是这家苹果专卖店的老板，他告诉凤凰网有几十个人喊着口号冲到了他的店里，整个过程持续了十多分钟，但“没有发生任何过激的行为”。</p><p>在接受采访的过程中，朱亚威一直在强调这不是件有价值的新闻，“全国都在发生这些事”。但朱亚威并不认为几十个人冲进店里的事很恶劣，在他看来这些人“只是方式有问题”。</p><div align=\"center\"><img class=\"img-responsive\"src=\"20160721085704479.png\" align=\"center\"></div><p>抗议是从肯德基波及到朱亚威的苹果专卖店的。朱亚威回忆，在冲进店里的前一个小时，有人在距离苹果专卖店300米之外的肯德基喊“爱我中华”的口号，随后越来越多的人在肯德基聚集。据朱亚威回忆，聚集人数最多时达到3000人。</p><p>抗议的人站在肯德基外把门给堵了，朱亚威告诉凤凰网，他们会对从肯德基出来的人进行批评教育。“人群里有100多个便衣”，除了喊口号外，没有发生任何肢体冲突。</p><p>凤凰网致电事发的肯德基睢宁万象苏果店，对方以“刚从外地回来不清楚”为由拒绝回应。</p>");

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

$qryu="select * from new WHERE account='".$user."' or nickname='".$user."'";
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

