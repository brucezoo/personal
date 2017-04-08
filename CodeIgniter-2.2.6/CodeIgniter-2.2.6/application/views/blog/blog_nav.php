<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <title>
        <?=$title["class_name"]?>
    </title>
    <style>
        h5 {color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif}
        .x{color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif;font-weight: bold}
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
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>我的博客</h1>
                    <hr class="small">
                    <span class="subheading">一个PHP菜鸟写的第一个博客</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container" align="center">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
            <div class="post-preview">
                <?php foreach ($nav_article as $nav_article_item):?>
                    <h2 align='center'><a class='m' href='http://localhost/index.php/blog/view/<?php echo $nav_article_item['id']?>' style='text-decoration: none'
                                          target='_blank'><?=$nav_article_item["title"]?></a><br /></h2>
                    <p align='center' class=\"post-meta\">Posted by <a class='m' href='http://localhost/index.php/blog/view/<?php echo $nav_article_item['id'] ?>'
                                                                       style='text-decoration: none' target='_blank'><?=$nav_article_item["author"]?></a> on <?=$nav_article_item["articledate"]?><br /></p>
                    <hr>
                <?php endforeach;?>
                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">回到顶部 &rarr;</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
            </div>
        </div>
    </div>
</footer>

<script src="/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="/bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="/jqBootstrapValidation.js"></script>
<script src="/contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="/clean-blog.min.js"></script>
</body>
</html>