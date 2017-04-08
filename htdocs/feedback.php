<html>
<head>
    <title>bob's auto parts-feedback submitted</title>
</head>
<body>
<h1>feedback submitted</h1>
<p>your feedback has been sent.</p>

</body>
</html>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/7
 * Time: 16:41
 */
$name=trim($_POST["name"]);
$email=$_POST["email"];
$feedback=$_POST["feedback"];
$toaddress="feedback@example.com";
$subject="feedback from web site";
$mailcontent="customer name:".$name."\n".
    "customer email:".$email."\n".
    "customer comments:\n".$feedback."\n";
$fromaddress="From:webserver@example.com";
if (strlen($email)<6){
    echo "that email address is not valid";

}


if (!eregi('^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$',$email)){
    echo "<p>that is not a valid email address.</p>";

}
$feedback=eregi_replace("a|b|c","neur",$feedback);
echo $feedback;
//$new=split("\.|@",$email);
$address="username@example.com";
$arr=split('\.|@',$address);
while (list($key,$value)=each($arr)){
    echo "<br />".$value;
}
//mail($toaddress,$subject,$mailcontent,$fromaddress);
//echo nl2br($mailcontent);
//echo $mailcontent;
//echo "<p>your name is $name.";
//printf ("<p>my name is %s.",$name);
//$feedback=addcslashes($_POST["feedback"]," ");

//echo "<p>".ucfirst($feedback);
//if(get_magic_quotes_gpc()){
//    $feedback=ucfirst($_POST["feedback"]);
//}else{
//    $feedback=ucwords($_POST["feedback"]);
//}
//echo $feedback."<br />";
//$token=strtok($feedback,"a");
//echo $token."<br />";
//while ($token!="a"){
//    $token=strtok(" ");
//    echo $token."<br />";
//}
//var_dump(strstr($feedback,"a"));
//$test="hello world";
//echo strrpos($test,"o");
//$result=strpos($test,"h");
//if ($result===false){
//    echo "not found";
//}else{
//    echo "found at position ".$result;
//}
//$feedback=str_replace("fuck","%!@*",$feedback);
//$feedback=substr_replace($feedback,"j",2,-2);
//echo "<p>".$feedback;









?>
