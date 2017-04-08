<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/5
 * Time: 22:19
 */
require ("./test/smarty/main1.php");
$tpl->assign("abc","hello ");
$tpl->display("test.tpl");
?>