<?php



define("TIREPRICE",100);
echo TIREPRICE;
//phpinfo();

$a="我叫";
$b="朱峰<br />";
echo "<p>".$d=$a.$b;
// echo $d;

 //echo "<p>任重而道远</p>";




//$V=4;
//echo ++$V;
//$out=`dir c:`;
//echo "<pre>".$out."</pre>";
//class sampleclass{};
//$myobject=new sampleclass();
//if ($myobject instanceof sampleclass)
 //echo "myobject is an instance of sampleclass";
//$a=56;
//echo gettype($a)."<br />";
//settype($a,"double");
//echo gettype($a)."<br />";,
$a=array("0","1","2");
is_null($a);
//require_once("page.inc");
//$class=new reflectionclass("page");
//echo "<pre>".$class."</pre>";
class objectIterator implements Iterator
{
    private $obj;
    private $count;
    private $currentindex;
    function __construct($obj)
    {
        $this->obj=$obj;
        $this->count=count($this->obj->data);
    }
function rewind()
{
 $this->currentindex=0;   // TODO: Implement rewind() method.
}
function valid()
{
 return $this->currentindex<$this->count;   // TODO: Implement valid() method.
}
    function key()
    {
     return $this->currentindex;   // TODO: Implement key() method.
    }
    function current()
    {
     return $this->obj->data[$this->currentindex];   // TODO: Implement next() method.
    }
    function next()
    {
     $this->currentindex++;   // TODO: Implement next() method.
    }
}
class object implements IteratorAggregate
{
    public $data=array();
    function __construct($in)
    {
        $this->data=$in;
    }
    function getIterator()
    {
     return new objectIterator($this);   // TODO: Implement getIterator() method.
    }
}
$myobject=new object(array(2,4,6,8,10));
$myIterator=$myobject->getIterator();
for($myIterator->rewind();$myIterator->valid();$myIterator->next())
{
    $key=$myIterator->key();
    $value=$myIterator->current();
    echo $key."=>".$value."<br />";
}
//try{
//    throw new Exception("A terrible error has occurred",5);
//}
//catch(Exception $e){
////    echo "Exception ".$e->getCode().":".$e->getMessage()."<br />";
////    echo "in ".$e->getFile()." on line ".$e->getLine()."<br />";
//    echo $e;
//}
class Exception{
    function __construct($message=NULL,$code=0)
    {
        if(func_num_args()){
            $this->message=$message;
        }
        $this->code=$code;
        $this->file=__FILE__;
        $this->line=__LINE__;
        $this->trace=debug_backtrace();
        $this->string=StringFormat($this);
    }
    protected $message="unknown exception";
    protected $code=0;
    protected $file;
    protected $line;
    private $trace;
    private $string;
    final function getMessage(){
        return $this->message;
    }
    final  function getCode(){
        return $this->code;
    }
    final function getFile(){
        return $this->file;
    }
    final function getTrace(){
        return $this->trace;
    }
    final function getTraceAsString(){
        return self::TraceFormat($this);
    }
    function __toString()
    {
     return $this->string;   // TODO: Implement __toString() method.
    }
    static private function StringFormat(Exception $exception){

    }
    static private function TraceFormat(Exception $exception){
}
}















?>

