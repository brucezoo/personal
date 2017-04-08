<?php
include("./test/smarty/main1.php");
$array[] = array("newsID"=>1, "newsTitle"=>"第1条新闻");

$array[] = array("newsID"=>2, "newsTitle"=>"第2条新闻");

$array[] = array("newsID"=>3, "newsTitle"=>"第3条新闻");

$array[] = array("newsID"=>4, "newsTitle"=>"第4条新闻");

$array[] = array("newsID"=>5, "newsTitle"=>"第5条新闻");

$array[] = array("newsID"=>6, "newsTitle"=>"第6条新闻");
$tpl->assign("News", $array);
$tpl->assign("title","smarty模板");
$tpl->assign("content","在利用PHP开发大型、交互式网站时，我们时常遇到与美工如何合作
的问题，通常我们的解决方法是由美工设计页面后交付程序设计者进行开发，再交付美工对页面进行改善，
来回重复好几回，如果遇到程序设计者对HTML不熟悉，对双方来说更是个痛苦的差事，效率也更低下，
这时候如果有模板支持就显得非常重要。");
$tpl->display("smarty.tpl");
?>