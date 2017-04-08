<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/7
 * Time: 21:23
 */
//$product=array(array("tir","tires",100),
//    array("oil","oil",10),
//
//    array("spk","spark plugs",4));
//foreach ($product as $current){
//    echo $current." ";
//}
//$price=array("tires"=>100,"oil"=>10,"spark plugs"=>4);
//foreach ($price as $a=>$b){
//    echo $a."-".$b."<br />";
//}
//$test="your customer service is excellent";
//echo substr($test,5,-13)."<br />";
//$a="2";
//$b="12";
//var_dump(strnatcmp($a,$b));
//echo "<p>".strlen("hello")."</p>";
//function m(){
//    echo "m function was called";
//}
//m();
//function m(){
//
//    echo "m function was called";
//
//}
//m();
//function create_table($data){
//    echo "<table border=\"1\">";
//    reset($data);
//    $value=current($data);
//    while($value){
//        echo "<tr><td>".$value."</td></tr>\n";
//        $value=next($data);
//    }
//    echo "</table>";
//}
//$my_array=array("line one","line two","line three");
//create_table($my_array);
//function create_table2($data,$border,$cellpadding,$cellpacing){
//    echo "<table border=\"".$border."\"cellpadding=\"".$cellpadding."\"cellpacing=\"".$cellpacing."\">";
//    reset($data);
//    $value=current($data);
//   while($value){
//       echo "<tr><td>".$value."</td></tr>\n";
//        $value=next($data);
//    }
//   echo "</table>";
//    }
//$my_array=array("line one","line two","line three");
//create_table2($my_array,2,3,4);
//function var_args(){
//    echo "number of parameters:";
//    echo func_num_args();
//    echo "<br />";
//    $args=func_get_args();
//    foreach ($args as $arg){
//        echo $arg."<br />";
//    }
//}
////$a=array("line one","line two","line three");
//var_args(4,5,5,6);
//function fn(){
//    $var="contents<br />";
//    echo $var;
//}
//fn();
//echo $var;
//$var="contents 2";
//function f(){
//
//    echo "inside the function,\$var=".$var."<br />";
//
//    echo "inside the function,\$var=".$var."<br />";
//    $var="contents 2";
//}

//$var="contents 1";
//f();
//echo "outside the funtion,\$var=".$var."<br />";
////global $var;
//$var="contents";
//function h(){
//
//    global $var;
//    echo "inside the function,\$var=".$var."<br />";

//    echo "inside the function,\$var=".$var."<br />";
//    $var="contents 2";
//}

//$var="contents 1";
//h();
//echo "outside the function,\$var=".$var."<br />";
//
//function increment(&$value,$amount=1){
//
//    $value=$value+$amount;
//}
//
//$value=10;
//increment($value);
//echo $value."<br />";
//function larger($a,$b){
//    if((!isset($a))||(!isset($b))){
//        echo "this function requires 2 numberss";
//        return false;
//    }
//    elseif($a>$b){
//        return $a;
//    }else{
//        return $b;
//    }
//}
//$a=1;
//$b=2;
//echo larger($a);
function reverse_r($str){
    if(strlen($str)>0){
        reverse_r(substr($str,1));
    }
    echo substr($str,0,1)."<br />";
    return;
}
function reverse_i($str){
    for ($i=1;$i<=strlen($str);$i++){
        echo substr($str,-$i,1)."<br />";
    }
    return;
}
reverse_r("hello");
reverse_i("hello");
class c

//{
//    function __construct($p)
//    {
//    echo "constructor called with parameter".$p."<br />";
//    }
//}
//
//$a=new classname(" first");
//$b=new classname(" second");
//$c=new classname("");
{
    public $attribute;
    function operation($param)
    {
        $this->attribute=$param;

        echo $this->attribute;
    }
}
$a=new c;
$a->operation("waf");
echo "<br />";
class classname
{
    public $attribute;
}
$a=new classname;
$a->attribute="value";
echo $a->attribute;
class cl
{
    public $attribute;

    public function __get($name)
    {
        $this->$name=$this->attribute;
    }

    public function __set($name, $value)
    {
        if(($name="attribute")&&($value>=0)&&($value<=100))
       $this->attribute = $value;
    }
}
$a=new cl();
$a->__get("nduje");
$a->__set("nduje",5);
echo "<br />";
class A
{
    public $attribute=1;
    final function operation1()
    {
        echo "something<br />";
        echo "the value of \$attribute is ".$this->attribute."<br />";
    }
}
class B extends A
{
    public $attribute=2;
    function operation2()
    {
        echo "something else<br />";
        echo "the value of \$attribute is ".$this->attribute."<br />";
    }
}
//function check_hint(B $someclass)
//{
//
//}
//$b=new B();
//check_hint($b);
$a=new A;
$a->operation1();
//
//$b=new B();
//$b->operation2();

interface displayable
{
    function display();
}
class webpage implements displayable
{
    function display()
    {
        // TODO: Implement display() method.
    }
}
class math
{
//    const pi=3.14159;
static function squared ($input)
{
    return $input*$input;
}
}
//echo math::pi;
echo math::squared(5)."<br />";
class A2
{
    public  static function who()
    {
        echo __CLASS__;
    }
    public static function test()
    {
        static::who();
    }
}
class B2 extends A2
{
    public static function who()
    {
        echo __CLASS__; // TODO: Change the autogenerated stub
    }
}
A2::test();
echo "<br />";
class overload
{
    public function __call($method, $p)
    {
  if($method=="display"){
      if(is_object($p[0])){
          $this->displayobject($p[0]);
      }elseif (is_array($p[0])){
          $this->displayarray($p[0]);
      }else{
          $this->displayscalar($p[0]);
      }
  }

    }

}

$ov=new overload();
$ov->display(array(1,2,3));
$ov->display("cat");
class m
{
    public $a=5;
    public $b=7;
    public $c=9;
}
$x=new m;
foreach ($x as $k){
    echo $k."<br />";
}
echo $x->a."<br />";

class printable
{
    public $testone;
    public $testtwo;
    public function __toString()
    {
     return(var_export($this,true));   // TODO: Implement __toString() method.
    }
}

?>