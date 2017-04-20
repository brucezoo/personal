<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/27
 * Time: 14:11
 */
session_start();
$old_user=$_SESSION["valid_user"];
unset($_SESSION["valid_user"]);
session_destroy();
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>注销账号</title>
    <style type="text/css">
        h1 {color: mediumspringgreen;font-size: 36pt;text-align: center;
            font-family:arial,sans-serif}
        h2 {color: palegreen;font-size: 24pt;text-align: center;
            font-family:arial,sans-serif}
        .menu {color: lightskyblue;font-size: 12pt;text-align: center;
            font-family:arial,sans-serif;font-weight: bold}



    </style>
</head>
<body background="/home-bg.jpg">
<h1>注销账号</h1>
<?php
if(!empty($old_user)){
    echo "<h2>您已成功注销账号<br /></h2>";
}else{
    echo "<h2>尚未登录，无法注销<br /></h2>";
}
?>
<h1><a class='menu' href='/blog.html'>返回用户登录界面</a></h1>
</body>
</html>
