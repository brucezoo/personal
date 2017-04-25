<?php
include ('../settings.php');
$name=filter_input(INPUT_POST,'name');
$email=filter_input(INPUT_POST,'email');
$password=filter_input(INPUT_POST,'password');
$checkbox=filter_input(INPUT_POST,'checkbox');
$check_password=filter_input(INPUT_POST,'check_password');
$passwordHash=password_hash($password,PASSWORD_DEFAULT,['cost'=>12]);

//var_dump($checkbox);
$pdo=pdoConnect('testDataBase');
try{

    if(!$name||!$password||!$check_password){
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

}catch(Exception $e){
    echo $e->getMessage();
    echo "<h1>登录失败！正在跳转到注册界面中......</h1>";
    $url="register.html";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"5;url=$url\">";
    exit();
}
$sql1="select * from admin WHERE name=?";
$statement1=$pdo->prepare($sql1);
$statement1->execute(array($name));
$result1=$statement1->fetchAll(PDO::FETCH_ASSOC);
$sql2='SELECT * FROM admin WHERE email=?';
$statement2=$pdo->prepare($sql2);
$statement2->execute(array($email));
$result2=$statement2->fetchAll(PDO::FETCH_ASSOC);
if($result1){
    echo "<h2>该账号已存在，请重新注册</h2>";
}elseif ($result2){
    echo "<h2>该邮箱已存在，请重新注册</h2>";
}else {
    $query = "insert into admin VALUES (NULL ,?,?,?)";
    $statement3=$pdo->prepare($query);
//    $statement3->bindValue(':account',$account,PDO::PARAM_INT);
//    $statement3->bindValue(':nickname',$nickname,PDO::PARAM_STR);
//    $statement3->bindValue(':password',$password,PDO::PARAM_INT);
    $statement3->execute(array($name,$email,$passwordHash));
    if ($statement3) {
        echo "<h2>您已成功注册新账号.</h2><br />";
    } else {
        echo "<h2>对不起，服务器繁忙，请稍后再试.</h2><br />";
    }
}


echo "<h1><a class='menu' href='register.html'>返回用户注册页面</a></h1><br />";
echo "<h1><a class='menu' href='login.html'>返回用户登录页面</a></h1><br />";
?>