<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录博客</title>
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
<h1>登录博客</h1>
</body>
</html>
<?php
session_start();
include('./settings.php');
$pdo=pdoConnect('testDataBase');
$email=filter_input(INPUT_POST,"email");
$password=filter_input(INPUT_POST,"password");
$query="select * from new where email=?";
$statement=$pdo->prepare($query);
$statement->execute(array($email));
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $result) {
    $passwordHash=$result['password'];
    $account=$result['account'];
}
try{
    if(!$email||!$password){
        throw new Exception("<h2>账号和密码不能为空</h2>");
    }
    if(strlen($password)<6){
        throw new Exception("<h2>密码不能小于6位数</h2>");
    }
    if(!get_magic_quotes_gpc()){
        $email=addslashes($email);
        $password=addslashes($password);
    }
    if(password_verify($password,@$passwordHash)===false){
        throw new Exception("<h2>账号、昵称或密码有错误</h2>");
    }else {
        $_SESSION["valid_user"]=$account;
        echo "<h1>登录成功！正在跳转到博客首页中......</h1>";
        $url="/smarty_homep.php";
    }
    if(isset($_SESSION["valid_user"])){
        echo "<h2>当前登录账号：".$_SESSION["valid_user"]."</h2><br />";
    }else{
        if(isset($account)){
            throw new Exception("<h2>登录异常，请稍后再试</h2><br />");
        }else{
            throw new Exception("<h2>登录错误，尚未注册账号</h2><br />");
        }
    }
}catch (Exception $e){
    echo $e->getMessage();
    echo "<h1>登录失败！正在跳转到登录界面中......</h1>";
    $url="/smarty_homep.php";
    echo "<META HTTP-EQUIV=\"refresh\" CONTENT=\"3;url=$url\">";
    exit();
}

//@$db=new mysqli("localhost", "root", "root", "blog");
//if(mysqli_connect_errno()){
//    echo "<h2>数据库连接出现异常</h2>";
//    exit;
//}


//$url="http://localhost/blog_homepage.php";
//    echo "<script language='JavaScript'type='text/javascript'>";
//    echo "window.location.href='$url'";
//    echo "</script>";
//    header("location:http://localhost/blog_homepage.php");
//    exit();

?>
<html>
<head>
    <meta http-equiv="refresh" content="2;url=<?php echo $url;?>">
</head>
</html>
