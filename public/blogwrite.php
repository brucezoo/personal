<html>
<head>
    <meta charset="UTF-8">
<title>写博客</title>
    <style type="text/css">
        h1 {color: mediumspringgreen;font-size: 36pt;text-align: center;
            font-family:arial,sans-serif}
        </style>
</head>
<body background="/home-bg.jpg">
</body>
</html>
<?php
session_start();
include('./settings.php');
date_default_timezone_set('prc');
//@$title=$_POST["title"];
$title=filter_input(INPUT_POST,'title');

@$class_name=$_POST["choose_label"];
@$author=$_SESSION["valid_user"];

$time=date('Y-m-d H:i:s');
//@$content=$_POST["content"];
$content=filter_input(INPUT_POST,'content');
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
if(!$class_name||!$title||!$content){
    echo"<h1>标签，标题，内容不能为空</h1>";
    exit();
}
if(!empty($author)){
//$insert="insert into article VALUES (null,'".$title."','".$content."','".$author."','".$time."',0,'".$class_name."')";
$insert="insert into article values (null,?,?,?,?,0,?)";
}else{
    echo "<h1>请先登录，方可写博客</h1>";
    exit();
}
$result=$pdo->prepare($insert);
$result->execute(array($title,$content,$author,$time,$class_name));
//$reslt=$db->query($insert);
var_dump($result);
exit();
echo "<br><br>";
echo "<h1>发表成功！正在跳转到博客首页中....</h1>";
echo "<br>";
echo "<h1>可在博客首页或者导航分类栏中点击查看</h1>";
$url="/smarty_homep.php";
?>
<html>
<head>
    <meta http-equiv="refresh"content="3;url=<?php echo $url;?>">
</head>
</html>
