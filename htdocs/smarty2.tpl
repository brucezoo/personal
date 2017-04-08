<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数组</title>
</head>
<body>
<{foreach from=$newsArray item=newsID}>
新闻编号：<{$newsID}>
新闻内容：<{$newsTitle}>
<{foreachelse}>
对不起，数据库中没有新闻输出!

<{/foreach}>
</body>
</html>