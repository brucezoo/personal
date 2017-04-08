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
<header class="intro-header" style="background-image: url('about-bg.jpg')">
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
            <div >
                <div class="page-heading">
<!--                    <h1>我的博客</h1>-->
<!--                    <hr class="small">-->
<!--                    <span class="subheading">一个PHP菜鸟写的第一个博客</span>-->
                    <?php
                    date_default_timezone_set('prc');
                   $id=$_GET["id"];
                    $dbase=new mysqli("localhost","root","root","blog");
                    $c=$dbase->query("UPDATE article SET count=count+1 WHERE id=".$_GET['id']);
                    $qu="select * from article WHERE id=$id";
                    $resu=$dbase->query($qu);
                    @$roww=$resu->fetch_all();
                    //var_dump($roww);
                    foreach ($roww as $value){
                        echo "<h1>".$value[1]."</h1>";

//                        echo "<h2 >".$value[2]."</h2>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</header>
<article>
    <table width="100%"cellpadding="10%"cellspacing="10%"border="0">
    <tr >
        <td align='left'>   来源:<?=$value[3],$value[4]?></td>
        <td align="right">浏览量：<?=$value[5]."  "?></td>
    </tr>
    </table>
    <div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>-->
<!--            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.</p>-->
            <?php
            echo $value[2];
            if($id==1){
            ?>

            <div align="center">
            <img class="img-responsive"src="1281469068223.png">
            </div>
<!--            <span class="caption text-muted">To go places and do things that have never been done before – that’s what living is all about.</span>-->

            <p>随后，乌压压一群人径直走向位于睢宁县中山北路6号的苹果专卖店。凤凰网获得了2份现场视频，从视频中可以看到，一位男子推开了“睢宁苹果专卖店”的玻璃门，紧接着一名女子振臂而入，剩下很多人在门口围观。</p>
                <p>朱亚威是这家苹果专卖店的老板，他告诉凤凰网有几十个人喊着口号冲到了他的店里，整个过程持续了十多分钟，但“没有发生任何过激的行为”。</p>
            <p>在接受采访的过程中，朱亚威一直在强调这不是件有价值的新闻，“全国都在发生这些事”。但朱亚威并不认为几十个人冲进店里的事很恶劣，在他看来这些人“只是方式有问题”。</p>
            <div align="center">
            <img class="img-responsive"src="20160721085704479.png" align="center">
                </div>
            <p>抗议是从肯德基波及到朱亚威的苹果专卖店的。朱亚威回忆，在冲进店里的前一个小时，有人在距离苹果专卖店300米之外的肯德基喊“爱我中华”的口号，随后越来越多的人在肯德基聚集。据朱亚威回忆，聚集人数最多时达到3000人。</p>
            <p>抗议的人站在肯德基外把门给堵了，朱亚威告诉凤凰网，他们会对从肯德基出来的人进行批评教育。“人群里有100多个便衣”，除了喊口号外，没有发生任何肢体冲突。</p>
            <p>凤凰网致电事发的肯德基睢宁万象苏果店，对方以“刚从外地回来不清楚”为由拒绝回应。</p>

            <?php
            }
            ?>
            <p><b>评论专区：在文本框中输入你的评论</b></p>
<!--            <form action=""method="post">-->
<!--<textarea rows="10" cols="50" name="feedback">-->
<!--</textarea>-->
<!---->
<!--                <input type="submit"name="submit"value="提交评论">-->
<!---->
<!--            </form>-->
            <form action=""  method="post">
<!--                <div class="row control-group">-->
<!--                    <div class="form-group col-xs-12 floating-label-form-group controls">-->
<!--                        <label>Name</label>-->
<!--                        <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">-->
<!--                        <p class="help-block text-danger"></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row control-group">-->
<!--                    <div class="form-group col-xs-12 floating-label-form-group controls">-->
<!--                        <label>Email Address</label>-->
<!--                        <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">-->
<!--                        <p class="help-block text-danger"></p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="row control-group">-->
<!--                    <div class="form-group col-xs-12 floating-label-form-group controls">-->
<!--                        <label>Phone Number</label>-->
<!--                        <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">-->
<!--                        <p class="help-block text-danger"></p>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">

                        <textarea name=feedback rows="5" class="form-control" placeholder="您的评论" id="message" required data-validation-required-message="Please enter a message."></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <input type="submit" class="btn btn-default"valu>

                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
</article>
<hr>

<?php
date_default_timezone_set('prc');
//@session_start();
//if(isset($_SESSION["valid_user"])){
//    echo "<h5 class='margina'>当前登录账号：".$_SESSION["valid_user"]."
//    <br /><a class='x'href='logout.php'style='text-decoration: none'>注销当前账号</a></h5><br />";
//}else{
//    echo "<h5><a class='x'href='register.html'style='text-decoration: none'>注册账号</a></h5><br />";
//
//}

//$dbase=new mysqli("localhost","root","","blog");
//$qu="select id,title,content from article WHERE id=$id";
//$resu=$dbase->query($qu);
//@$roww=$resu->fetch_all();
////var_dump($roww);
//foreach ($roww as $value){
//
//echo "<h1 class=\"margin\">".$value[1]."</h1>";
//echo "<h2 >".$value[2]."</h2>";
//}
//    ?>
<!--<h1 class="margin">江苏睢宁数千人围堵苹果专卖店 高喊“滚出中国”</h1>-->
<!--<h2>  南海仲裁闹剧”结果出炉，许多中国人竟然开始砸苹果手机、抵制肯德基，人民日报曾评论称：爱国不是糊涂的爱。但“糊涂”的爱国行为并没有结束，据凤凰新闻20日报道，19日晚，数千人围堵了江苏徐州市睢宁县中山北路6号的苹果专卖店，一名女子用扩音器高喊“抵制美货，让苹果手机滚出中国。”这家苹果专卖店的老板称，有几十个人喊着口号冲到了他的店里，整个过程持续了十多分钟，但“没有发生任何过激的行为”。据老板回忆，在冲进店里的前一个小时，有人在距离苹果专卖店300米之外的肯德基喊“爱我中华”的口号，随后越来越多的人在肯德基聚集，聚集人数最多时达到3000人。-->
<!--    “抵制美货，让苹果手机滚出中国。”一位身穿黑白条纹的短发女人站在水泥台上，扯着嗓子借扩音器向底下围观的人高喊，旁边4个年轻男子振臂附和。这是7月19日晚上9点左右发生在江苏睢宁的一幕，围观的人也跟着短发女人喊口号。</h2>-->


<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<?php
$id=$_GET["id"];
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "对不起，数据库连接错误";
    exit();
}
@$feedback=$_POST["feedback"];
$feedbackdate=date('Y-m-d H:i:s');
//var_dump($feedback);
if(!empty($feedback)){

    $insert="insert into feedback VALUES (null,'".$_SESSION["valid_user"]."','".$feedback."','".$feedbackdate."',$id)";
$result=$db->query($insert);
    echo '<script language="javascript">{alert("评论成功");history.go(-2);}</script>';
//    echo "您的评论  ".date('y-m-d h:i:s',time());
//    echo "<h3>".$feedback."</h3>";
}
?>

<p>
    网友评论：
    <hr noshade="green" width='60%'align="left">
</p>
    <?php
//if($id<>1){
//    exit();
//}

//$ist="insert into feedback VALUES (1,\"anfjek\",\"傻逼，盲目爱国，自以为是\",\"2016-07-24\"),
//(2,\"老远乡\",\"狗一样\",\"2016-07-24\"),
//(3,\"方合作和\",\"真几把吓人，操\",\"2016-07-24\");";
//$result=$db->query($ist);
//for ($s=1;$s<1000;$s++){

$page=isset($_GET["page"])? intval($_GET["page"]):1;
//    var_dump($page);
$num=10;
$sql="select * from feedback where id=$id;";
$res=$db->query($sql);
$total=$res->num_rows;
//var_dump($total);
$pagenum=ceil($total/$num);
//var_dump($pagenum);
If($page>$pagenum || $page == 0){
    Echo "Error : Can Not Found The page .";
    Exit;
}
$offset=($page-1)*$num;
$q="select username,feedback,feedbackdate from feedback WHERE id=$id order by feedbackdate DESC limit $offset,$num";
$resul=$db->query($q);
$row=$resul->fetch_all();
//var_dump($row);
$rownumber=$resul->num_rows;
//for($i=0;$i<$rownumber;$i++){
//    echo $row["username"]." ";
//    echo $row["feedbackdate"];
//    echo "<br />";
//    echo "<h3><p>".$row["feedback"]."</p>";
//    echo "</h3>";
//}
foreach ($row as $a){
//    var_dump($a);
    echo $a[0]." ".$a[2]."<br />";
    echo "<h3>".$a[1]."</h3><br />";
    echo "<hr width='60%' align='left'>";
}
    echo "页码  ";
    if($page!=1){
        $prevpage=$page-1;
    echo "<a href='subpage.php?id=$id&page=".$prevpage."'>上一页</a>";}
    for($i=1;$i<=$pagenum;$i++){
    $show=($i!=$page)?"<a href='subpage.php?id=$id&page=".$i."'>$i</a>":"<b>$i</b>";
    echo $show."   ";
}
    if($page!=$pagenum){
        $nextpage=$page+1;
        echo "<a href='subpage.php?id=$id&page=".$nextpage."'>下一页</a>";}

//}
//$re=$resul->fetch_array();
//foreach ($re as $a){
//    echo $a."<br />";
//}
$db->close();
?>
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


