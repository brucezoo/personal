<?php
//require ("./test/smarty/main1.php");
include("./test/smarty/libs/Smarty.class.php");
define('SMARTY_ROOT','./test/smarty/tpls');
$tpl=new Smarty();
$tpl->template_dir=SMARTY_ROOT."/templates/";
$tpl->compile_dir=SMARTY_ROOT."/templates_c/";
$tpl->config_dir=SMARTY_ROOT."/configs/";
$tpl->cache_dir=SMARTY_ROOT."/cache/";
$tpl->caching=0;
$tpl->cache_lifetime=0;
$tpl->left_delimiter='<{';
$tpl->right_delimiter='}>';
$array[] = array("newsID"=>1, "newsTitle"=>"第1条新闻");

$array[] = array("newsID"=>2, "newsTitle"=>"第2条新闻");

$array[] = array("newsID"=>3, "newsTitle"=>"第3条新闻");

$array[] = array("newsID"=>4, "newsTitle"=>"第4条新闻");

$array[] = array("newsID"=>5, "newsTitle"=>"第5条新闻");

$array[] = array("newsID"=>6, "newsTitle"=>"第6条新闻");

$tpl->assign("News", $array);

//编译并显示位于./templates下的index.tpl模板

$tpl->display("smarty1.tpl");

?>