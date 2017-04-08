<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/1
 * Time: 14:35
 */
chdir("uploads/");
echo "<pre>";
exec("dir",$result);
foreach ($result as $line)
echo "$line\n";
echo "</pre>";
echo "<br><hr>";
echo "<pre>";
passthru("dir");
echo "</pre>";
echo "<br><hr>";


?>

