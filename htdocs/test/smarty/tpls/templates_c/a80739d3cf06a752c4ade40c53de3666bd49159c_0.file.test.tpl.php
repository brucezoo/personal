<?php
/* Smarty version 3.1.29, created on 2016-11-02 09:46:13
  from "C:\xampp\htdocs\test.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5819a7d519f3e9_33907127',
  'file_dependency' => 
  array (
    'a80739d3cf06a752c4ade40c53de3666bd49159c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\test.tpl',
      1 => 1470473272,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5819a7d519f3e9_33907127 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
<?php $_smarty_tpl->tpl_vars['bcd'] = new Smarty_Variable('world', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'bcd', 0);
echo $_smarty_tpl->tpl_vars['abc']->value;?>

<br>
<?php echo $_smarty_tpl->tpl_vars['bcd']->value;?>

<br>
<?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable('zhufeng', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);?>
my name is <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

</body>
</html><?php }
}
