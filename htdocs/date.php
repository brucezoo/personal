<?php
/**
* Created by PhpStorm.
 * User: ertg
 */
date_default_timezone_set('prc');
//echo date("U")."<br>";
// echo time()."<br>";
//
//var_dump(getdate());
//echo "<br>";
//print_r(getdate());
////echo mktime(12,0,0);
//echo "<br>";
//echo checkdate(2,29,2014);
//echo "<br>";
//echo strftime("%c<br>");
eval("var_dump(getdate());");
echo '<br />';
class employee
{
 var $name;
 var $employee_id;
}
$this_emp=new employee();
$this_emp->name="fred";
$this_emp->employee_id=5324;
echo serialize($this_emp);
echo '<br />';
echo "function sets supported in this install are:<br>";
$extensions=get_loaded_extensions();
foreach ($extensions as $each_ext){
 echo "$each_ext<br>";
// echo "<ul>";
// $ext_funcs=get_extension_funcs($each_ext);
// foreach ($ext_funcs as $func){
//  echo "<li>$func</li>";
// }
// echo "</ul>";
}
echo '<br />';
echo get_current_user();
echo '<br />';
echo date("g:i:a,j M Y",getlastmod());
echo '<br />';
//show_source('date.php');
?>