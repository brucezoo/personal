<?php
session_start();
include('../settings.php');
$pdo=pdoConnect('testDataBase');
$email=filter_input(INPUT_POST,"email");
$password=filter_input(INPUT_POST,"password");
$query="select password from admin where email=?";
$statement=$pdo->prepare($query);
$statement->execute(array($email));
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $result) {
    $passwordHash=$result['password'];
}
try{
    if(!$email||!$password){
        throw new Exception("账号和密码不能为空");
    }
    if(!get_magic_quotes_gpc()){
        $email=addslashes($email);
        $password=addslashes($password);
    }
    if(password_verify($password,@$passwordHash)===false){
        throw new Exception("密码错误");
    }else {
        $_SESSION["valid_user"]=$email;
        echo "登录成功！正在跳转到博客首页中......<br>";
        $url="index.php";
    }
    if(isset($_SESSION["valid_user"])){
        echo "当前登录账号：".$_SESSION["valid_user"]."";
    }else{
        if(isset($email)){
            throw new Exception("登录异常，请稍后再试");
        }else{
            throw new Exception("登录错误，尚未注册账号");
        }
    }
}catch (Exception $e){
    echo $e->getMessage();
    echo "<br>登录失败！正在跳转到登录界面中......";
    $url="login.html";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
    exit();
}

//session_destroy();
?>
<html>
<head>
    <meta http-equiv="refresh" content="2;url=<?php echo $url;?>">
</head>
</html>
