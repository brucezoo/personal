<html>
<head>
    <title>更换头像</title>
</head>
<body>

<h3>成功上传头像</h3>

<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', '返回上级页面'); ?></p>

</body>
</html>