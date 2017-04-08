<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数组</title>
</head>
<body>
<p>这里将输出一个数组：</p>
<{section name=loop loop=$News}>
    新闻编号：<{$News[loop].newsID}>
<br>
    新闻标题：<{$News[loop].newsTitle}>
<br>
    <{sectionelse}>
    对不起，没有任何新闻输入!
    <{/section}>

</body>
</html>