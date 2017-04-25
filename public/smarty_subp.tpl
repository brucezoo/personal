<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <title>
        <{$title}>
    </title>
    <style>
        h5 {color:white;font-size: 15pt;text-align:right;
            font-family:arial,sans-serif}
        .x{color:white;font-size: 11pt;text-align:right;
            font-family:arial,sans-serif;}
        .margin{margin: 2.5cm -2cm 0cm 0cm;color:white;font-size: 15pt;text-align:right;
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
    <script src="jquery-1.4.4.min.js"  type="text/javascript"></script>
    <script src="zh-cn.js"  type="text/javascript"></script>
    <script type="text/javascript" src="xheditor-1.2.2.min.js"></script>
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
<header class="intro-header" style="background-image: url('about-bg.jpg')">
    <div class="container">

        <{if isset($smarty.session.valid_user)}>
        <a href="personnel_blog.php"><img align="right" class='margin' src="./upload/<{$head_image}>"></a>
        <h2  class='margin'><a class='x'style='text-decoration: none'href="personnel_blog.php"><{$smarty.session.valid_user}></a><br><a class='x' href='logout.php' style='text-decoration: none'>退出</a></h2><br />
        <{else}>
    <img align="right" class='margin'src="./upload/default_avatar_male_50.gif">
        <h2 class='margin'><a class='x'href='register.html'style='text-decoration: none'>注册</a></h2><br />
        <{/if}>
        <div class="row">
            <div >
                <div class="page-heading">
<{section name=loop loop=$va}>
                    <h1><{htmlentities($va[loop][1])}></h1>

                </div>
            </div>
        </div>
</div>
    </header>
<table width="100%"cellpadding="10%"cellspacing="10%"border="0">
    <tr >
        <td >　　　    　　　　　来源:<{$va[loop][3]}> <{$va[loop][4]}></td>
        <td align="right">浏览量：<{$va[loop][5]}>  　　　　　　　　</td>
    </tr>

</table>
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
           <{nl2br($va[loop][2])}>

            <{/section}>
            <hr>
            <p><b>评论专区：在文本框中输入你的评论</b></p>
            <form action=""  method="post">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <textarea class="xheditor"name=feedback rows="8" cols="70" placeholder="您的评论" id="message" ></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="submit"name="submit" class="btn btn-default"value="提交评论">

                    </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
<hr>
<{if isset($user)}>
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<{if !empty($feedback)}>
    <{$script}>
    <{/if}>
    <p>
        网友评论：
    <hr noshade="green" width='60%'align="left">
    </p>
    <{section name=loop loop=$a}><br>
    <{$a[loop][0]}> 　　　<{$a[loop][2]}>
    <h3><{nl2br(htmlentities($a[loop][1]))}></h3><br />
<hr width='60%' align='left'>
    <{/section}>
   共 <{$pagenum}> 页　
    <{if $page neq 1}>
    <{$shang}>　
    <{/if}>
    <{section name=loop loop=$show}>
    <{$show[loop]}>
    <{/section}>

    <{if $page neq $pagenum}>
    　<{$xia}>
    <{/if}>
    　共 <{$total}> 条数据 　每页 <{$num}> 条数据
    <{else}>
    　　　　　　　　　　登陆后可添加评论、查看评论
    <{/if}>
    <div class="row">

        <div class="site-heading">

            <ul class="pager">
                <li class="next">
                    <a href="#">回到顶部 &rarr;</a>
                </li>
            </ul>

        </div>
    </div>
</div>
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