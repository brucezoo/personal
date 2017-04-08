<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <title>写博客</title>
    <style>
        h5 {color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif}
        .x{color:white;font-size: 11pt;text-align:right;
            font-family:arial,sans-serif;}
        .y{color:white;font-size: 40pt;text-align:center;
            font-family:arial,sans-serif;}
        .margin{margin: 1.5cm -1.5cm 0cm 0cm;color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif};

    </style>
    <!-- Bootstrap Core CSS -->
    <link href="/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="/jquery-1.4.4.min.js"  type="text/javascript"></script>
    <script src="/zh-cn.js"  type="text/javascript"></script>
    <script type="text/javascript" src="/xheditor-1.2.2.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                Menu <i class="fa fa-bars"></i>
            </button>
            <!--<a class="navbar-brand" href="index.html">Start Bootstrap</a>-->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php foreach ($navs as $navs_item):?>
                    <li class="x">
                        <a href="http://localhost/index.php/blog/nav/<?=$navs_item["article_classid"]?>">
                            <?=$navs_item["class_name"]?>
                        </a>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<header class="intro-header" style="background-image: url('/home-bg.jpg')">

    <div class="container">
        <?php if(isset($_SESSION["valid_user"])):?>
            <a href="http://localhost/index.php/blog/personnel_blog"title="用户中心"><img align="right" class='margin' src="/uploads/<?php echo $head_image['head_image'];?>" >
            </a>
            <h2  class='margin'><a class='x'style='text-decoration: none'href="http://localhost/index.php/blog/personnel_blog"title="用户中心"><?=$_SESSION["valid_user"]?></a><br><a class='x' href='http://localhost/logout.php' style='text-decoration: none'>退出</a></h2><br />
        <?php else:?>
            <img align="right" class='margin'src="/default_avatar_male_50.gif">
            <h2 class='margin'><a class='x'href='register.html'style='text-decoration: none'>注册</a></h2><br />
        <?php endif;?>
        <h2 class='y'>写博客</h2>
        <br>
        <br>
    </div>
</header>
<body>
<?php echo validation_errors(); ?>

<?php echo form_open('blog/writeblog') ?>
<!--<form method="post"action="http://localhost/index.php/blog/validation">-->
    　　选择分类标签：<select name="choose_label">
        <option value="1">新闻<option value="2">热点<option value="3">社会<option value="4">视频<option value="5">娱乐<option value="6">图片<option value="7">科技<option value="8">汽车<option value="9">体育<option value="10">军事<option value="11">国际<option value="12">教育<option value="13">健康<option value="14">历史<option value="15">养生<option value="16">文化</option>
    </select>
    　　　　　　　　标题：<input type="text"name="title"size="40">
    　　　   时间：<?php echo date('Y-m-d H:i:s')?>
    <br>
    <br>
    <div align="center">
<textarea class="xheditor" rows="15"cols="90"name="content">
</textarea>
        <br>
        <br>
        <input  type="submit"name="submit_article"value="发表博文">
    </div>
</form>
<hr>
<h4 align="center">登录之后，可发表博客</h4>
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <ul class="pager">
                <li class="next">
                    <a href="#">回到顶部 &rarr;</a>
                </li>
            </ul>
            <p align="center" class="copyright text-muted">Copyright &copy; Your Website 2016</p>
        </div>
    </div>
</div>
</body>
</html>