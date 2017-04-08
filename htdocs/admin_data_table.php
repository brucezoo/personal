<?php
require ("./test/smarty/main1.php");
$db=new mysqli("localhost","root","","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
$que="SHOW FULL COLUMNS FROM article_class";
$res=$db->query($que);
$rownu=$res->num_rows;
for($i=0;$i<$rownu;$i++){
    $ro[]=$res->fetch_assoc();
}
$tpl->assign("field",$ro);
$quer="select * from article_class";
$resu=$db->query($quer);
$rownum=$resu->num_rows;
for($i=0;$i<$rownum;$i++){
    $row[]=$resu->fetch_row();
}
$tpl->assign("nav",$row);
$qque="SHOW FULL COLUMNS FROM new";
$rres=$db->query($qque);
$rrownu=$rres->num_rows;
for($i=0;$i<$rrownu;$i++){
    $rro[]=$rres->fetch_assoc();
}
$tpl->assign("ffield",$rro);
$query="select * from new";
$result=$db->query($query);
$rownumm=$result->num_rows;
for($i=0;$i<$rownumm;$i++){
    $roww[]=$result->fetch_row();
}
$tpl->assign("new",$roww);
$qqque="SHOW FULL COLUMNS FROM article";
$rrres=$db->query($qqque);
$rrrownu=$rrres->num_rows;
for($i=0;$i<$rrrownu;$i++){
    $rrro[]=$rrres->fetch_assoc();
}
$tpl->assign("fffield",$rrro);
$queryy="select * from article";
$resultt=$db->query($queryy);
$rownummm=$resultt->num_rows;
for($i=0;$i<$rownummm;$i++){
    $rowww[]=$resultt->fetch_row();
}
$tpl->assign("article",$rowww);
$qqquee="SHOW FULL COLUMNS FROM feedback";
$rrress=$db->query($qqquee);
$rrrownuu=$rrress->num_rows;
for($i=0;$i<$rrrownuu;$i++){
    $rrroo[]=$rrress->fetch_assoc();
}
$tpl->assign("fffieldd",$rrroo);
$qqueryy="select * from feedback";
$rresultt=$db->query($qqueryy);
$rrownummm=$rresultt->num_rows;
for($i=0;$i<$rrownummm;$i++){
    $rrowww[]=$rresultt->fetch_row();
}
$tpl->assign("feedback",$rrowww);
$db->close();
$tpl->display("admin_data_table.tpl");
?>