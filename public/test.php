<?php
/**
 * Created by PhpStorm.
 * User: zhufeng
 * Date: 2017/3/9
 * Time: 下午2:31
 */
$db=new mysqli("localhost","root","root","blog");
if(mysqli_connect_errno()){
    echo "服务器繁忙，请稍后再试";
    exit;
}else{
    echo "welcome<br>";
}
//Schema::create('articles',function(Blueprint $table) {
//    $table->increments('id');
//    $table->string('title');
//    $table->text('content')->nullable();
//    $table->string('author');
//    $table->dateTime('articledate');
//    $table->bigInteger('count');
//    $table->integer('article_classid');
//    $table->timestamp();
//});
//Schema::dropIfExists('articles');
echo "foobau"[2];
class Mytest{
    function ccc($str){
        echo $str."<br>";
    }
}
//Mytest::ccc("123456");
$object = new Mytest();
$object->ccc("123456");
echo array(1, 2, 3)[0]; echo [1, 2, 3][0];echo json_encode(array(1,2,3,4));