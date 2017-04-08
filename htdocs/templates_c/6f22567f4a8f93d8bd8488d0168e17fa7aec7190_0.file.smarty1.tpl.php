<?php
/* Smarty version 3.1.29, created on 2016-08-05 11:19:20
  from "C:\xampp\htdocs\smarty1.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_57a45a18561a71_41906283',
  'file_dependency' => 
  array (
    '6f22567f4a8f93d8bd8488d0168e17fa7aec7190' => 
    array (
      0 => 'C:\\xampp\\htdocs\\smarty1.tpl',
      1 => 1470388596,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a45a18561a71_41906283 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>数组</title>
</head>
<body>
<p>这里将输出一个数组：</p>
<?php
$_from = $_smarty_tpl->tpl_vars['newsArray']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_newsID_0_saved_item = isset($_smarty_tpl->tpl_vars['newsID']) ? $_smarty_tpl->tpl_vars['newsID'] : false;
$_smarty_tpl->tpl_vars['newsID'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['newsID']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['newsID']->value) {
$_smarty_tpl->tpl_vars['newsID']->_loop = true;
$__foreach_newsID_0_saved_local_item = $_smarty_tpl->tpl_vars['newsID'];
?>
    新闻编号：<?php echo $_smarty_tpl->tpl_vars['newsID']->value;?>

    新闻内容：<?php echo $_smarty_tpl->tpl_vars['newsTitle']->value;?>

    <?php
$_smarty_tpl->tpl_vars['newsID'] = $__foreach_newsID_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['newsID']->_loop) {
?>
    对不起，数据库中没有新闻输出!

<?php
}
if ($__foreach_newsID_0_saved_item) {
$_smarty_tpl->tpl_vars['newsID'] = $__foreach_newsID_0_saved_item;
}
?>


</body>
</html><?php }
}
