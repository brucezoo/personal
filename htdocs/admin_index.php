<?php
require ("./test/smarty/main1.php");
$db=new mysqli("localhost","root","","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
$query="select * from new";
$result=$db->query($query);
$rownumm=$result->num_rows;
$queryy="select SUM(count) from article";
$resultt=$db->query($queryy);
$rownummm=$resultt->num_rows;
$rowww=$resultt->fetch_row();
$qqueryy="select * from feedback";
$rresultt=$db->query($qqueryy);
$rrownummm=$rresultt->num_rows;
$queryy="select * from article";
$resultt=$db->query($queryy);
$rownummm=$resultt->num_rows;
$tpl->assign("article",$rownummm);
$tpl->assign("feedback",$rrownummm);
$tpl->assign("view_number",$rowww[0]);
$tpl->assign("user_totalnumber",$rownumm);
$tpl->display("admin_index.tpl");
?>