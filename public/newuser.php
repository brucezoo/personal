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
include('./settings.php');
session_start();
$pdo=pdoConnect('testDataBase');
$account=filter_input(INPUT_POST,'account');
$email=filter_input(INPUT_POST,'email');
$password=filter_input(INPUT_POST,'password');
$check_password=filter_input(INPUT_POST,'check_password');
$passwordHash=password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
$isemail=filter_var($email,FILTER_VALIDATE_EMAIL);
$ispassword=filter_var($password,FILTER_VALIDATE_INT);
$sql="select * from new WHERE account=?";
$statement1=$pdo->prepare($sql);
$statement1->execute(array($account));
$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
try{

    if(!$ispassword){
        throw new Exception('<h2>密码须为数字</h2>');
    }
    if(!$isemail){
        throw new Exception('<h2>邮箱格式不正确</h2>');
    }

    if(!$account||!$email||!$password||!$check_password){
        throw new Exception("<h2>账号，邮箱，密码不能为空</h2>");
    }

    if(strlen($password)<6){
        throw new Exception("<h2>密码不能小于6位数</h2>");
    }

    if($password<>$check_password){
        throw new Exception("<h2>您两次输入的密码不符</h2>");
    }

    if($passwordHash===false){
        throw new Exception('<h2>创建哈希密码失败</h2>');
    }
    if($result1){
        throw new Exception("<h2>该账号已存在，请重新注册</h2>");
    }else {
        $query = "insert into new VALUES (NULL ,?,?,?,'default_avatar_male_50.gif')";
        $statement3=$pdo->prepare($query);
        $statement3->execute(array($account,$email,$passwordHash));
        if ($statement3) {
            echo "<h1>注册成功！正在跳转到博客首页中......</h1>";
            $_SESSION["valid_user"]=$account;
            $url="/smarty_homep.php";
            echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
        } else {
            throw new Exception("<h2>对不起，服务器繁忙，请稍后再试.</h2><br />");
        }
    }
}catch(Exception $e){
    echo $e->getMessage();
    echo "<h1>注册失败！正在跳转到登录界面中......</h1>";
    $url="/smarty_homep.php";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
    exit();
}

//$sql2='SELECT * FROM new WHERE nickname=?';
//$statement2=$pdo->prepare($sql2);
//$statement2->execute(array($nickname));
//$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);

//    $statement3->bindValue(':account',$account,PDO::PARAM_INT);
//    $statement3->bindValue(':nickname',$nickname,PDO::PARAM_STR);
//    $statement3->bindValue(':password',$password,PDO::PARAM_INT);










?>
