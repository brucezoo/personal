<?php
/* Smarty version 3.1.29, created on 2017-04-20 13:52:09
  from "/Users/zhufeng/zhufeng/public/public/smarty_subp.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_58f8a0e9475b06_86423006',
  'file_dependency' => 
  array (
    '98ba1db4ca1032c28acd0ac47af1e7cec8b6313f' => 
    array (
      0 => '/Users/zhufeng/zhufeng/public/public/smarty_subp.tpl',
      1 => 1492689121,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58f8a0e9475b06_86423006 ($_smarty_tpl) {
?>
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
        <?php echo $_smarty_tpl->tpl_vars['title']->value;?>

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
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->
    <?php echo '<script'; ?>
 src="jquery-1.4.4.min.js"  type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="zh-cn.js"  type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="xheditor-1.2.2.min.js"><?php echo '</script'; ?>
>
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
                <?php
$__section_loop_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['nav']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_0_total = $__section_loop_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_0_total != 0) {
for ($__section_loop_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_0_iteration <= $__section_loop_0_total; $__section_loop_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
                <li>


                    <a href="nav.php?classid=<?php echo $_smarty_tpl->tpl_vars['nav']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][0];?>
">

                        <?php echo $_smarty_tpl->tpl_vars['nav']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][1];?>

                    </a>
                </li>

                <?php
}
}
if ($__section_loop_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_0_saved;
}
?>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<header class="intro-header" style="background-image: url('about-bg.jpg')">
    <div class="container">

        <?php if (isset($_SESSION['valid_user'])) {?>
        <a href="personnel_blog.php"><img align="right" class='margin' src="./upload/<?php echo $_smarty_tpl->tpl_vars['head_image']->value;?>
"></a>
        <h2  class='margin'><a class='x'style='text-decoration: none'href="personnel_blog.php"><?php echo $_SESSION['valid_user'];?>
</a><br><a class='x' href='logout.php' style='text-decoration: none'>退出</a></h2><br />
        <?php } else { ?>
    <img align="right" class='margin'src="./upload/default_avatar_male_50.gif">
        <h2 class='margin'><a class='x'href='register.html'style='text-decoration: none'>注册</a></h2><br />
        <?php }?>
        <div class="row">
            <div >
                <div class="page-heading">
<?php
$__section_loop_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['va']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_1_total = $__section_loop_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_1_total != 0) {
for ($__section_loop_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_1_iteration <= $__section_loop_1_total; $__section_loop_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
                    <h1><?php echo htmlentities($_smarty_tpl->tpl_vars['va']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][1]);?>
</h1>

                </div>
            </div>
        </div>
</div>
    </header>
<table width="100%"cellpadding="10%"cellspacing="10%"border="0">
    <tr >
        <td >　　　    　　　　　来源:<?php echo $_smarty_tpl->tpl_vars['va']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][3];?>
 <?php echo $_smarty_tpl->tpl_vars['va']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][4];?>
</td>
        <td align="right">浏览量：<?php echo $_smarty_tpl->tpl_vars['va']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][5];?>
  　　　　　　　　</td>
    </tr>

</table>
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-2">
           <?php echo $_smarty_tpl->tpl_vars['va']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][2];?>


            <?php
}
}
if ($__section_loop_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_1_saved;
}
?>

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
<?php if (isset($_smarty_tpl->tpl_vars['user']->value)) {?>
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
<?php if (!empty($_smarty_tpl->tpl_vars['feedback']->value)) {?>
    <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    <?php }?>
    <p>
        网友评论：
    <hr noshade="green" width='60%'align="left">
    </p>
    <?php
$__section_loop_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['a']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_2_total = $__section_loop_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_2_total != 0) {
for ($__section_loop_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_2_iteration <= $__section_loop_2_total; $__section_loop_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?><br>
    <?php echo $_smarty_tpl->tpl_vars['a']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][0];?>
 　　　<?php echo $_smarty_tpl->tpl_vars['a']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][2];?>

    <h3><?php echo htmlentities($_smarty_tpl->tpl_vars['a']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)][1]);?>
</h3><br />
<hr width='60%' align='left'>
    <?php
}
}
if ($__section_loop_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_2_saved;
}
?>
   共 <?php echo $_smarty_tpl->tpl_vars['pagenum']->value;?>
 页　
    <?php if ($_smarty_tpl->tpl_vars['page']->value != 1) {?>
    <?php echo $_smarty_tpl->tpl_vars['shang']->value;?>
　
    <?php }?>
    <?php
$__section_loop_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_loop']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop'] : false;
$__section_loop_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['show']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_loop_3_total = $__section_loop_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = new Smarty_Variable(array());
if ($__section_loop_3_total != 0) {
for ($__section_loop_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] = 0; $__section_loop_3_iteration <= $__section_loop_3_total; $__section_loop_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']++){
?>
    <?php echo $_smarty_tpl->tpl_vars['show']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_loop']->value['index'] : null)];?>

    <?php
}
}
if ($__section_loop_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_loop'] = $__section_loop_3_saved;
}
?>

    <?php if ($_smarty_tpl->tpl_vars['page']->value != $_smarty_tpl->tpl_vars['pagenum']->value) {?>
    　<?php echo $_smarty_tpl->tpl_vars['xia']->value;?>

    <?php }?>
    　共 <?php echo $_smarty_tpl->tpl_vars['total']->value;?>
 条数据 　每页 <?php echo $_smarty_tpl->tpl_vars['num']->value;?>
 条数据
    <?php } else { ?>
    　　　　　　　　　　登陆后可添加评论、查看评论
    <?php }?>
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
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<?php echo '<script'; ?>
 src="jquery.min.js"><?php echo '</script'; ?>
>

<!-- Bootstrap Core JavaScript -->
<?php echo '<script'; ?>
 src="bootstrap.min.js"><?php echo '</script'; ?>
>

<!-- Contact Form JavaScript -->
<?php echo '<script'; ?>
 src="jqBootstrapValidation.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="contact_me.js"><?php echo '</script'; ?>
>

<!-- Theme JavaScript -->
<?php echo '<script'; ?>
 src="clean-blog.min.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
