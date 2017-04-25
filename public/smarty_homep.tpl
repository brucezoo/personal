<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <title><{$title}></title>
    <style>
        h5 {color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif}
        .x{color:white;font-size: 11pt;text-align:right;
            font-family:arial,sans-serif;}
        .margin{margin: 2.5cm -2cm 0cm 0cm;color:white;font-size: 15pt;text-align:right;
           font-family:arial,sans-serif}
        .m {color:#444444}

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
    <link rel="stylesheet" type="text/css" href="http://sandbox.runjs.cn/uploads/rs/55/sjckzedf/lanrenzhijia.css">
    <script type="text/javascript" src="http://sandbox.runjs.cn/uploads/rs/55/sjckzedf/jquery-1.8.0.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.theme-login').click(function(){
                $('.theme-popover-mask').fadeIn(100);
                $('.theme-popover').slideDown(200);
            });
            $('.theme-poptit .close').click(function(){
                $('.theme-popover-mask').fadeOut(100);
                $('.theme-popover').slideUp(200);
            })

        })
    </script>
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
                        <{section name=loop loop=$nav}>
                <li>


                    <a href="nav.php?classid=<{$nav[loop][0]}>">

                        <{$nav[loop][1]}>
                    </a>
                </li>

                        <{/section}>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<header class="intro-header" style="background-image: url('./home-bg.jpg')">

    <div class="container">
        <{if isset($smarty.session.valid_user)}>
    <a href="personnel_blog.php"title="用户中心"><img align="right" class='margin' src="upload/<{$head_image}>" ></a>
        <h2  class='margin'><a class='x'style='text-decoration: none' href="personnel_blog.php"title="用户中心"><{$smarty.session.valid_user}></a><br><br><a class='x' href='logout.php' style='text-decoration: none'>退出</a></h2><br />
        <{else}>
    <img align="right" class='margin'src="upload/default_avatar_male_50.gif">
        <h2 class='margin'><a class='x theme-login' href='javascript:void (0);'style='text-decoration: none'>登录</a><br><br><a class='x ' href='register.html' style='text-decoration: none' target="_blank">注册</a></h2><br />
        <{/if}>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1><{$hptitle}></h1>
                    <hr class="small">
                    <span class="subheading"><{$hp_subtitle}></span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container" align="center">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
            <div class="post-preview">
<{section name=loop loop=$va}>
<h2 align='center'><a class='m' href='smarty_subp.php?id=<{$va[loop][0]}>' style='text-decoration: none'
                      target='_blank'><{htmlentities($va[loop][1])}></a><br /></h2>
<p align='center' class=\"post-meta\">Posted by <a class='m' href='smarty_subp.php?id=<{$va[loop][0]}>'
   style='text-decoration: none' target='_blank'><strong><{$va[loop][2]}></strong></a> on <{$va[loop][3]}><br /></p>
<hr>
<{/section}>
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
                <p class="copyright text-muted">Copyright &copy; Your Website 2017</p>
                <p class="copyright text-muted"><a href="admin2/login.html" target="_blank" style='text-decoration: none' class="m">后台系统登录</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap.min.js"></script>

<!-- Contact Form JavaScript -->
<script src="jqBootstrapValidation.js"></script>
<script src="contact_me.js"></script>

<!-- Theme JavaScript -->
<script src="clean-blog.min.js"></script>
<div class="theme-popover">
    <div class="theme-poptit">
        <a href="javascript:void (0);" title="关闭" class="close">×</a>
        <h3>登录 是一种态度</h3>
    </div>
    <div class="theme-popbod dform">
        <form class="theme-signin" name="loginform" action="login.php" method="post">
            <ol>
                <br>
                <li><strong>邮箱：</strong><input class="ipt" type="text" name="email" size="20" /></li>
                <br>
                <li><strong>密码：</strong><input class="ipt" type="password" name="password" size="20" /></li>
                <br>
                <li><input class="btn btn-primary" type="submit" name="submit" value=" 登 录 " /></li>
            </ol>
        </form>
    </div>
</div>
<div class="theme-popover-mask"></div>
</body>
</html>