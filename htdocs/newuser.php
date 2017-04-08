<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>new user</title>
    <style type="text/css">
        h1 {color: mediumspringgreen;font-size: 36pt;text-align: center;
            font-family:arial,sans-serif}
        h2 {color: palegreen;font-size: 24pt;text-align: center;
            font-family:arial,sans-serif}
        .menu {color: lightskyblue;font-size: 12pt;text-align: center;
            font-family:arial,sans-serif;font-weight: bold}
    </style>
</head>
<body background="home-bg.jpg">
<h1>注册博客</h1>
</body>
</html>
<?php
$account=$_POST["account"];
$password=$_POST["password"];
$nickname=$_POST["nickname"];
$check_password=$_POST["check_password"];
if(!$account||!$password||!$nickname||!$check_password){
    echo "<h2>账号，昵称，密码不能为空</h2>";
    exit();
}
if(strlen($password)<6){
    echo "<h2>密码不能小于6位数</h2>";
    exit();
}
if($password<>$check_password){
    echo "<h2>您两次输入的密码不符</h2>";
    exit();
}
if(!get_magic_quotes_gpc()){
    $account=addslashes($account);
    $password=addslashes($password);
    $nickname=addslashes($nickname);

}
@$db=new mysqli("localhost", "root", "root", "blog");
if(mysqli_connect_errno()){
    echo "error";
    exit;
}
$q="select * from new WHERE account='".$account."'";
$resu=$db->query($q);
$row=$resu->fetch_assoc();
$qy="select * from new WHERE nickname='".$nickname."'";
$resut=$db->query($qy);
$roww=$resut->fetch_assoc();
if($row){
    echo "<h2>该账号已存在，请重新注册</h2>";
}elseif ($roww){
    echo "<h2>该昵称已存在，请重新注册</h2>";
}else {
    $query = "insert into new VALUES (NULL ,'".$account."','".$nickname."','".$password."','default_avatar_male_50.gif')";
    $result = $db->query($query);
    if ($result) {
        echo "<h2>您已成功注册新账号.</h2><br />";
    } else {
        echo "<h2>对不起，服务器繁忙，请稍后再试.</h2><br />";
    }
}
$db->close();



echo "<h1><a class='menu' href='register.html'>返回用户注册页面</a></h1><br />";
echo "<h1><a class='menu' href='blog.html'>返回用户登录页面</a></h1><br />";









?>