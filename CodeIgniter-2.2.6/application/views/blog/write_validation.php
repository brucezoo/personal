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
<?php
echo "<br><br>";
echo "<h1>发表成功！正在跳转到博客首页中....</h1>";
echo "<br>";
echo "<h1>可在博客首页或者导航分类栏中点击查看</h1>";
$url="http://localhost/index.php/blog";
?>
</body>
</html>

<html>
<head>
    <meta http-equiv="refresh"content="3;url=<?php echo $url;?>">
</head>
</html>
