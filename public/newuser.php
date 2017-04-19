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
$account=filter_input(INPUT_POST,'account');
$nickname=filter_input(INPUT_POST,'nickname');
$password=filter_input(INPUT_POST,'password');
$check_password=filter_input(INPUT_POST,'check_password');
$passwordHash=password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);
$isaccount=filter_var($account,FILTER_VALIDATE_INT);
$ispassword=filter_var($account,FILTER_VALIDATE_INT);
try{
    if(!$isaccount){
    throw new Exception('<h2>账号须为数字</h2>');
    }

    if(!$ispassword){
        throw new Exception('<h2>密码须为数字</h2>');
    }

    if(!$account||!$password||!$nickname||!$check_password){
        throw new Exception("<h2>账号，昵称，密码不能为空</h2>");
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

}catch(Exception $e){
    echo $e->getMessage();
    echo "<h1>登录失败！正在跳转到登录界面中......</h1>";
    $url="http://localhost/register.html";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"5;url=$url\">";
    exit();
}
try {
    $pdo = new PDO(
            sprintf('mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['dbname'],
            $settings['port'],
            $settings['charset']
),
        $settings['username'],
        $settings['password']
);
}catch(PDOException $e){
  echo "数据库连接错误";
  exit;
}
$sql1="select * from new WHERE account=?";
$statement1=$pdo->prepare($sql);
$statement1->execute(array($account));
$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
$sql2='SELECT * FROM new WHERE nickname=?';
$statement2=$pdo->prepare($sql2);
$statement2->execute(array($nickname));
$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
if($result1){
    echo "<h2>该账号已存在，请重新注册</h2>";
}elseif ($result2){
    echo "<h2>该昵称已存在，请重新注册</h2>";
}else {
    $query = "insert into new VALUES (NULL ,?,?,?,'default_avatar_male_50.gif')";
    $statement3=$pdo->prepare($query);
//    $statement3->bindValue(':account',$account,PDO::PARAM_INT);
//    $statement3->bindValue(':nickname',$nickname,PDO::PARAM_STR);
//    $statement3->bindValue(':password',$password,PDO::PARAM_INT);
    $statement3->execute(array($account,$nickname,$passwordHash));
    if ($statement3) {
        echo "<h2>您已成功注册新账号.</h2><br />";
    } else {
        echo "<h2>对不起，服务器繁忙，请稍后再试.</h2><br />";
    }
}


echo "<h1><a class='menu' href='register.html'>返回用户注册页面</a></h1><br />";
echo "<h1><a class='menu' href='blog.html'>返回用户登录页面</a></h1><br />";









?>
