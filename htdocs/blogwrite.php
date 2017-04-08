<html>
<head>
    <meta charset="UTF-8">
<title>写博客</title>
    <style type="text/css">
        h1 {color: mediumspringgreen;font-size: 36pt;text-align: center;
            font-family:arial,sans-serif}
        </style>
</head>
<body background="home-bg.jpg">
</body>
</html>
<?php
session_start();
date_default_timezone_set('prc');
@$title=$_POST["title"];
@$class_name=$_POST["choose_label"];
@$author=$_SESSION["valid_user"];
$time=date('Y-m-d H:i:s');
@$content=$_POST["content"];
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "<h1>服务器繁忙，请稍后再试</h1>";
    exit;
}
if(!$class_name||!$title||!$content){
    echo"<h1>标签，标题，内容不能为空</h1>";
    exit();
}
if(!empty($author)){
$insert="insert into article VALUES (null,'".$title."','".$content."','".$author."','".$time."',0,'".$class_name."')";
}else{
    echo "<h1>请先登录，方可写博客</h1>";
    exit();
}
$reslt=$db->query($insert);
echo "<br><br>";
echo "<h1>发表成功！正在跳转到博客首页中....</h1>";
echo "<br>";
echo "<h1>可在博客首页或者导航分类栏中点击查看</h1>";
$url="http://localhost/smarty_homep.php";
?>
<html>
<head>
    <meta http-equiv="refresh"content="3;url=<?php echo $url;?>">
</head>
</html>
