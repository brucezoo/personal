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
<body background="home-bg.jpg">
<h1>登录博客</h1>
</body>
</html>
<?php
session_start();
$account=$_POST["account"];
$password=$_POST["password"];
$nickname=$_POST["nickname"];
if(!$account||!$password){
    echo "<h2>账号和密码不能为空</h2>";
    exit();
}
if(strlen($password)<6){
    echo "<h2>密码不能小于6位数</h2>";
    exit();
}
if(!get_magic_quotes_gpc()){
    $account=addslashes($account);
    $password=addslashes($password);
    $nickname=addslashes($nickname);
}
@$db=new mysqli("localhost", "root", "root", "blog");
if(mysqli_connect_errno()){
    echo "<h2>数据库连接出现异常</h2>";
    exit;
}
$query1="select * from new WHERE account='".$account."' and nickname='".$nickname."' and password ='".$password."'";
$query2="select * from new WHERE account='".$account."' and password ='".$password."'";
if($nickname){
$result=$db->query($query1);
}else{
    $result=$db->query($query2);
}
@$num_results = $result->num_rows;
//echo "<p>number of books found:" . $num_results . "</p>";
if($num_results==0){
    echo "<h2>账号、昵称或密码有错误</h2>";
    exit();
}else{
//    $_SESSION["valid_account"]=$account;
//    $
    $_SESSION["valid_user"]=$nickname;
    if(!$nickname){
        $_SESSION["valid_user"]=$account;
    }
//    session_regenerate_id();
//
//    $sessionid = session_id();
//    $db=new mysqli("localhost", "root", "", "blog");
//    $sql = "update new set sessionid ='".$sessionid."' where account=$account and password=$password;";
//    $query = $db->prepare($sql);
//    $query->execute();
//    $_SESSION["account"] = $account;
//    $url = "lianxi3.php?sid=".session_id();
//    unset($db);



    echo "<h1>登录成功！正在跳转到博客首页中......</h1>";
//$url="http://localhost/blog_homepage.php";
//    echo "<script language='JavaScript'type='text/javascript'>";
//    echo "window.location.href='$url'";
//    echo "</script>";
//    header("location:http://localhost/blog_homepage.php");
//    exit();
    $url="http://localhost/smarty_homep.php";
}
$db->close();
if(isset($_SESSION["valid_user"])){
    echo "<h2>当前登录账号：".$_SESSION["valid_user"]."</h2><br />";
}else{
    if(isset($account)){
        echo "<h2>登录异常，请稍后再试</h2><br />";
    }else{
        echo "<h2>登录错误，尚未注册账号</h2><br />";
    }
}
?>
<html>
<head>
<meta http-equiv="refresh"content="2;url=<?php echo $url;?>">
</head>
</html>