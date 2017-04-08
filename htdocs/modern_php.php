<?php
function mygenerator(){
    yield 'value1';
    yield 'value2';
    yield 'value3';
}
foreach (mygenerator() as $yieldedvalue){
    echo $yieldedvalue,PHP_EOL;
}
//var_dump(get_defined_constants());
//echo $_SERVER['PHP_SELF'];
function makerange($length){
//    $dataset=[];
    for($i=0;$i<$length;$i++){
        yield $i;
    }
//    return $dataset;
}
$customrange=makerange(100);
foreach ($customrange as $i){
    echo $i,PHP_EOL;
}
try {
    throw new Exception();
}
catch(Exception $ex){
//    echo 'exception',PHP_EOL;
    var_dump($ex);
}
$closure=function ($name){
    return sprintf("你好 %s",$name);
};
var_dump($closure("bruce"));
class CallableClass
{
    function __construct($x) {
        var_dump($x);
    }
    function __invoke($x) {
        var_dump($x);
    }
}
$obj = new CallableClass(5);
$obj(5);
var_dump(is_callable($obj));
$numberplusone=array_map(function($number){
    return $number+1;
},[1,2,3]);
var_dump($numberplusone);

function encloseperson($name){
    return function ($docommand) use($name){
        return sprintf("%s,%s",$name,$docommand);
    };
}
$clay=encloseperson("clay");
echo $clay("bruce"),PHP_EOL;
class app{
    protected  $routes=array();
    protected $responsestatus='200 OK';
    protected $responsecontenttype='text/html';
    protected $responsebody='hello world';
    public function addroute($routepath,$routecallback){
        $this->routes[$routepath]=$routecallback->bindTo($this,__CLASS__);
    }
    public function dispatch($currentpath){
        foreach ($this->routes as $routepath=>$callback) {
            if($routepath==$currentpath){
                $callback();
            }
        }
        header('HTTP/1.1'.$this->responsestatus);
        header('Content-type:'.$this->responsecontenttype);
        header('Content-length:'.mb_strlen($this->responsebody));
        echo $this->responsebody;
    }
}
$app=new app();
$app->addroute('/users/josh',function (){
    $this->responsecontenttype='application/json;charset=utf8';
    $this->responsebody='{"name":"josh"}';
});
$app->dispatch('/users/josh');
if(php_sapi_name()==='cli-server'){
    echo "php内置服务器";
}else{
    echo "其他服务器\n";
}
$input='<p><script>alert("you won the nigerian lottry!");</script></p>';
echo htmlentities($input,ENT_QUOTES,'UTF-8')."\n";
$email='-*+><@rowu.com';
$emailSafe=filter_var($email,FILTER_SANITIZE_EMAIL);
echo $emailSafe."\n";
$string="♪>=Iñtërnâtionàliizætiøn";
$safeString=filter_var($string,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_LOW|FILTER_FLAG_ENCODE_HIGH);
echo $safeString."\n";
$isEmail=filter_var($email,FILTER_VALIDATE_EMAIL);
if($isEmail!==false){
    echo "success\n";
}else{
    echo "fail\n";
}
//header('HTTP/1.1 302 Redirect');
//header('HTTP/1.1 400 Bad request');
//header('Location:/login.php');
date_default_timezone_set('Asia/shanghai');
echo date('H i s ')."\n";
$timezone=new DateTimeZone('Asia/Tokyo');
$datetime=new DateTime();
$datetime->setTimezone($timezone);
echo $datetime->format('Y m d H i')."\n";
$time=DateTime::createFromFormat('M j,Y H:i:s','Jan 2,2014 23:04:12');
echo $time->format('Y m d H i s'),PHP_EOL;
$interval=new DateInterval('P2W');
$datetime->sub($interval);
echo $datetime->format("Y m d H i s"),PHP_EOL;
$dateStart=new \DateTime('2015-10-03');
$dateInterval=\DateInterval::createFromDateString("-1 day");
$datePriod=new \DatePeriod($dateStart,$dateInterval,3,DatePeriod::EXCLUDE_START_DATE);
foreach ($datePriod as $date ){
    echo $date->format("Y-m-d"),PHP_EOL;
}
echo  $_SERVER["REMOTE_ADDR"],PHP_EOL;
echo 'Iñtërnâtionàliizætiøn',PHP_EOL;
$json=file_get_contents('http://localhost/pdo.php');
echo $json,PHP_EOL;
$handle=fopen('php://filter/read=string.toupper/resource=orders/urls.csv','rb');
//stream_filter_append($handle,'string.toupper');
while(feof($handle)!==true){
    echo fgets($handle);
}
fclose($handle);
$out=fopen("php://output", 'w');
fwrite($out , "this is a test");
$fd = fopen('php://output', 'w');
if ($fd) {
    fwrite($fd, "\n");
    fwrite($fd, "7777888\n");
    fclose($fd);
}
class DirtyWordsFilter extends php_user_filter
{
    public function filter($in,$out,&$consumed,$closing)
    {
        $words=array('grime','dirt','grease');
        $wordData=array();
        foreach ($words as $word){
            $replacement=array_fill(0,mb_strlen($word),'*');
            $wordData[$word]=implode('',$replacement);
//            $wordData[$word]=str_replace($word,'*****',$word);
        }
        $bad=array_keys($wordData);
        $good=array_values($wordData);
        while($bucket=stream_bucket_make_writeable($in)){
            $bucket->data=str_replace($bad,$good,$bucket->data);
            $consumed+=$bucket->datalen;
            stream_bucket_append($out,$bucket);
        }
        return PSFS_PASS_ON;
    }
}
stream_filter_register('dirty_words_filter','DirtyWordsFilter');
$handle=fopen('orders/dirty_words.txt','rb');
stream_filter_append($handle,'dirty_words_filter');
while(feof($handle)!==true){
    echo fgets($handle);
}
fclose($handle);
set_exception_handler(function(Exception $e){
    echo "\n handle message:".$e->getMessage();
});
throw new Exception('wrong message');
restore_exception_handler();












?>