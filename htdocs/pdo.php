<form method="get" action="pdo.php">
<h3>查询</h3>
<input type="text" name="query">
<input type="submit">
</form>
<?php
require 'vendor/autoload.php';
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/29
 * Time: 16:34
 */

require '../settings.php';
//throw new Exception('not a pdo exception');
// PDO connection
try {
//    throw new Exception('not a pdo exception');
    $pdo = new PDO(
        sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
        ),
        $settings['username'],
        $settings['password']
    );
    if(!$pdo){
        throw new PDOException();
    }
    throw new Exception("not a pdo exception");
} catch (PDOException $e) {
    // Database connection failed
    $code=$e->getCode();
    $message=$e->getMessage();
    echo "Database connection failed:in line".$code."error:".$message;
//    exit;
}catch(Exception $e){
    echo $e->getMessage();
}finally{
    echo "always do this";
}
$sql="select account from new WHERE account like concat('%',:query,'%')";
$statement=$pdo->prepare($sql);
$query=filter_input(INPUT_GET,"query");
$statement->bindValue(":query",$query,PDO::PARAM_INT);
$statement->execute();
while(($result=$statement->fetchObject())!==false){

//    var_dump($result);
    echo $result->account,PHP_EOL;
}