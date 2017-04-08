<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>博客主页</title>
    <style type="text/css">
        body{background-image:url("about-bg.jpg");
            background-repeat: repeat-x;
            }
        h1 {color:white;font-size: 48pt;text-align: center;
            font-family:arial,sans-serif}
        h2 {color:black;font-size: 24pt;text-align: center;
            font-family:arial,sans-serif}
        h5 {color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif}
        .m{color:black;font-size: 36pt;
            font-family:arial,sans-serif;font-weight: bold}
        .n{color:white;font-size: 36pt;
            font-family:arial,sans-serif;font-weight: bold}
        .x{color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif;margin: 0cm 1.2cm 1.3cm 2cm}
        .margin1{margin: 0cm 1.2cm 1.3cm 2cm};



    </style>
</head>
<body>
<table  width="80%" align="center" cellpadding="4"cellspacing="4">
    <tr>
        <td width="25%">
            <a class="n" href=""target="_blank"style="text-decoration: none">我的首页</a></td>
        <td width="25%">
            <a class="n"href=""target="_blank"style="text-decoration: none">直播</a></td>
        <td width="25%">
           <a class="n"href=""target="_blank"style="text-decoration: none">部落</a></td>
        <td width="25%">
            <a class="n"href=""target="_blank"style="text-decoration: none">手机博客</a></td>
    </tr>
</table>
<?php

session_start();
if(isset($_SESSION["valid_user"])){
    echo "<h5 class='margin1'>当前登录账号：".$_SESSION["valid_user"]."
    <br /><a class='x'href='logout.php'style='text-decoration: none'>注销当前账号</a></h5><br />";
}else{
    echo "<h5><a class='x'href='register.html'style='text-decoration: none'>注册账号</a></h5><br />";

}

?>
<h1 class="margin1">我的博客</h1>
<hr size="10"width="30%"noshade="white">
<h1>一个PHP菜鸟写的第一个博客</h1>
</body>
</html>

<?php
$db=new mysqli("localhost","root","","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}

//$db->query("SET names utf-8");

//$q = "INSERT INTO article VALUES (1,'江苏睢宁数千人围堵苹果专卖店 高喊“滚出中国”', '“南海仲裁闹剧”结果出炉，许多中国人竟然开始砸苹果手机、抵制肯德基，人民日报曾评论称：爱国不是糊涂的爱。但“糊涂”的爱国行为并没有结束，据凤凰新闻20日报道，19日晚，数千人围堵了江苏徐州市睢宁县中山北路6号的苹果专卖店，一名女子用扩音器高喊“抵制美货，让苹果手机滚出中国。”这家苹果专卖店的老板称，有几十个人喊着口号冲到了他的店里，整个过程持续了十多分钟，但“没有发生任何过激的行为”。据老板回忆，在冲进店里的前一个小时，有人在距离苹果专卖店300米之外的肯德基喊“爱我中华”的口号，随后越来越多的人在肯德基聚集，聚集人数最多时达到3000人。
//“抵制美货，让苹果手机滚出中国。”一位身穿黑白条纹的短发女人站在水泥台上，扯着嗓子借扩音器向底下围观的人高喊，旁边4个年轻男子振臂附和。这是7月19日晚上9点左右发生在江苏睢宁的一幕，围观的人也跟着短发女人喊口号。', '观察者网', '2016-07-21 08:31:28')";
//$resut=$db->query($q);


$query="select id,title,author,articledate from article ";
$result=$db->query($query);

$array = $result->fetch_all();

//var_dump($array);
//foreach ($array as $value){
//    echo $value;
//}
foreach ($array as $value ){
//  var_dump($value);
    echo "<h2><a class='m' href='subpage.php?id={$value[0]}' style='text-decoration: none' target='_blank'>".$value[1]."</a><br /></h2>";
    echo "<h2><a class='m' href='subpage.php?id={$value[0]}' style='text-decoration: none' target='_blank'>".$value[2],"  ".$value[3]."</a><br /></h2>";
}
//$num_results=$result->num_rows;
//echo $num_results;
//for ($i = 0; $i < $num_results; $i++) {
//    $row = $result->fetch_assoc();
////    echo mb_detect_encoding($row["subtitle"]);
//
//    echo "<h2><strong>";
//    echo "<a class='m'href='subpage.php'target='_blank'style='text-decoration: none'>".$row["title"]."</a>";
//    echo "</strong><br />";
//    echo $row["subtitle"];
//    echo "<br />";
//    echo $row["author"]."  ";
//    echo $row["articledate"];
//    echo "</h2>";
//}
$db->close();














?>