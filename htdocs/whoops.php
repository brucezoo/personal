<form method="get" action="whoops.php">
<input type="text" name="whoops">
<input type="submit">
</form>
<?php
// Use composer autoloader
require 'vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
throw new Exception();
try{
    $whoop=filter_input(INPUT_GET,"whoops");
if($whoop!=="2"){
    echo '正常输出：'.$whoop;
}else{
    throw new Exception("2不能输出");
}
}catch (Exception $e){
    echo $e->getMessage();
}




