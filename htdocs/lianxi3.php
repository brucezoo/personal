
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>博客首页</title>
    <style>
    h5 {color:white;font-size: 15pt;text-align:right;
    font-family:arial,sans-serif}
    .x{color:white;font-size: 11pt;text-align:right;
    font-family:arial,sans-serif;}
    .margin1{margin: 1.5cm 0cm -2cm 0cm;color:white;font-size: 15pt;text-align:right;
        font-family:arial,sans-serif};
    </style>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="clean-blog.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome.min.css" rel="stylesheet" type="text/css">
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

<!-- Navigation -->
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
                <li>
                    <a href="index.html">新闻</a>
                </li>
                <li>
                    <a href="index.html">热点</a>
                </li>
                <li>
                    <a href="about.html">社会</a>
                </li>
                <li>
                    <a href="post.html">视频</a>
                </li>
                <li>
                    <a href="contact.html">娱乐</a>
                </li>
                <li>
                    <a href="contact.html">图片</a>
                </li>
                <li>
                    <a href="contact.html">科技</a>
                </li>
                <li>
                    <a href="contact.html">汽车</a>
                </li>
                <li>
                    <a href="contact.html">体育</a>
                </li>
                <li>
                    <a href="contact.html">军事</a>
                </li>
                <li>
                    <a href="contact.html">国际</a>
                </li>
                <li>
                    <a href="contact.html">教育</a>
                </li>
                <li>
                    <a href="contact.html">健康</a>
                </li>
                <li>
                    <a href="contact.html">历史</a>
                </li>
                <li>
                    <a href="contact.html">养生</a>
                </li>
                <li>
                    <a href="contact.html">文化</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-image: url('home-bg.jpg')">
    <div class="container">
        <?php
        @session_start();
        if(isset($_SESSION["valid_user"])){
            echo "<p class='margin1'>当前登录账号：".$_SESSION["valid_user"]."
    <br /><a class='x'href='logout.php'style='text-decoration: none'>注销当前账号</a></p><br />";
        }else{
            echo "<p class='margin1'><a class='x'href='register.html'style='text-decoration: none'>注册账号</a></p><br />";

        }

        ?>

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
<!-- Main Content -->
<div class="container" align="center">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
            <div class="post-preview">
<?php
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}
$query="select id,title,author,articledate from article ";
$result=$db->query($query);

$array = $result->fetch_all();
foreach ($array as $value ){
//  var_dump($value);
    echo "<h2 ><a class='m' href='subpage.php?id={$value[0]}' style='text-decoration: none' target='_blank'>".$value[1]."</a><br /></h2>";
    echo "<p class=\"post-meta\">Posted by <a class='m' href='subpage.php?id={$value[0]}' style='text-decoration: none' target='_blank'>".$value[2]," on  ".$value[3]."</a><br /></p>";
    echo "  <hr>";
}
$db->close();
?>
<!--                <a href="post.html">-->
<!--                    <h2 class="post-title">-->
<!--                        江苏睢宁数千人围堵苹果专卖店 高喊“滚出中国-->
<!--                    </h2>-->
<!--                    <h3 class="post-subtitle">-->
<!--                        江苏睢宁又上头条-->
<!--                    </h3>-->
<!--                </a>-->
<!--                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 24, 2014</p>-->
<!--            </div>-->
<!--            <hr>-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                    </h2>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Science has not yet mastered prophecy
                    </h2>
                    <h3 class="post-subtitle">
                        We predict too much for the next year and yet far too little for the next ten.
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
            </div>
            <hr>
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title">
                        Failure is not an option
                    </h2>
                    <h3 class="post-subtitle">
                        Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                    </h3>
                </a>
                <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
            </div>
            <hr>
            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="#">回到顶部 &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <ul class="list-inline text-center">
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Your Website 2016</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="jqBootstrapValidation.js"></script>
<script src="contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="clean-blog.min.js"></script>

</body>

</html>
