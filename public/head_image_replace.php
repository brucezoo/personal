<html>
<head>
    <meta charset="UTF-8">
    <title>更换头像</title>
    <style type="text/css">
        h1 {color: mediumspringgreen;font-size: 36pt;text-align: center;
            font-family:arial,sans-serif}
    </style>
</head>
<body background="/home-bg.jpg">
<h1>更换头像</h1>
<?php
session_start();
if($_FILES["replace_head_image"]["error"]>0){
    echo "<h1>异常:";
    switch ($_FILES["replace_head_image"]["error"]){
        case 1: echo "上传头像大小超出限制";
            break;
        case 2: echo "上传头像大小超出HTML表单元素限制";
            break;
        case 3: echo "头像只部分上传";
            break;
        case 4: echo "没有任何头像上传";
            break;
        case 6: echo "php.ini没有指定临时目录";
            break;
        case 7: echo "文件写入磁盘失败</h1>";
            break;
    }
    exit;
}
if(!$_FILES["replace_head_image"]["type"]="png/gif/jpeg")
{
    echo "<h1>异常：上传头像非图片文件</h1>";
   exit();
}
$upfile='upload/'.$_FILES["replace_head_image"]["name"];
if(is_uploaded_file($_FILES["replace_head_image"]["tmp_name"])){
    if(!move_uploaded_file($_FILES["replace_head_image"]["tmp_name"],$upfile)){
        echo "<h1>异常:无法将头像文件移到目标目录</h1>";
        exit();
    }
}else{
    echo "<h1>异常:文件受到破坏攻击.文件名:</h1>";
    echo $_FILES["replace_head_image"]["name"];
    exit();
}
echo "<h1>上传成功，正在跳转到博客首页中....</h1><br>";
$head_image=$_FILES["replace_head_image"]["name"];
$user=$_SESSION["valid_user"];
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "<h1>服务器繁忙，请稍后再试</h1>";
    exit;
}
$sql="update new set head_image='".$head_image."' where account='".$user."' or nickname='".$user."'";
$result=$db->query($sql);
$url="/smarty_homep.php";
?>
</body>
</html>
<html>
<head>
    <meta http-equiv="refresh"content="3;url=<?php echo $url;?>">
</head>
</html>