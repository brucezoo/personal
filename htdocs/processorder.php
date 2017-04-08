<html>
<head>
    <title><?php echo "bob'auto parts-order results"?></title>

</head>
<body>
<h1>bob' auto parts</h1>
<h2>order results</h2>
<p>order processed.</p>
<?php



echo "<p>order processed at".date("Y M D ;H I S");

$tireqty=$_REQUEST["tireqty"];
$oilqty=$_REQUEST["oilqty"];
$sparkqty=$_REQUEST["sparkqty"];
//$find=$_REQUEST["find"];
$totalqty=0;
$discount=0;
$address=$_POST["address"];
$DOCUMENT_ROOT=$_SERVER["DOCUMENT_ROOT"];
$date=date("YMD");
//$fp=fopen("$DOCUMENT_ROOT/../orders/orders.txt","ab");

$totalqty=$tireqty+$oilqty+$sparkqty;

echo "<p style='color: #0000bf'>your order is as follows:</p>";
if($totalqty==0) {
    echo "<p>you did not order anything on the privious page!</p>";
    die();


}

elseif($tireqty>=0&&$oilqty>=0&&$sparkqty>=0){

    echo "<p>".$tireqty." tires</p>";

    echo "<p>".$oilqty." bottom of oil</p>";

    echo "<p>".$sparkqty." spark plugs</p>";
}
elseif ($tireqty<0) {
    echo "tire不能小于0<br />";
}elseif ($oilqty<0) {
    echo "oil不能小于0<br />";
}elseif ($sparkqty<0){
    echo "spark不能小于0<br />";
}
if($tireqty<0or$oilqty<0or$sparkqty<0)
    die();

echo "<p>数量总计:".$totalqty."</p>";
$totalamount=0.00;
define("TIREPRICE",100);
define("OILPRICE",10);
define("SPARKPRICE",4);
$totalamount=$tireqty*TIREPRICE+$oilqty*OILPRICE+$sparkqty*SPARKPRICE-TIREPRICE*$discount;
echo "订单总金额:$".number_format($totalamount,2)."<br />";
$taxrate=0.10;
$totalmount=$totalamount*(1+$taxrate);
echo "实际总金额：$".number_format($totalamount,2)."<br />";
printf ("total amount of order is %.2f",$totalamount);

//echo "isset($tireqty):".isset($tireqty)."<br />";
//echo "isset($nothere):".isset($nothere)."<br />";
//echo "empty($tireqty):".empty($tireqty)."<br />";
//echo "empty($nothere):".empty($nothere)."<br />";

//if($tireqty<10){
//    $discount=0;
//}elseif(($tireqty>=10)&&($tireqty<=49)){
//    $discount=5;
//}elseif(($tireqty>=50)&&($tireqty<=99)){
//    $discount=10;
//}elseif($tireqty>=100){
//    $discount=15;
//}
//if($find=="a") {
   // echo "<p>rugular custumer.</p>";
//}elseif($find=="b"){
    //echo "<p>custumer reffered by TV advert.</p>";
//}elseif($find=="c"){
    //echo "<p>custumer reffered by phone directory.</p>";
//}elseif($find=="d"){
    //echo "<p>custumer reffered by word of mouth.</p>";
//}else{
    //echo "<p> we do not know how this custumer found us.</p>";
//}
//switch ($find) {
//    case "a":
//        echo "<p>rugular custumer.</p>";
//        break;
//    case "b":
//        echo "<p>custumer reffered by TV advert.</p>";
//        break;
//    case "c":
//        echo "<p>custumer reffered bu phone directory.<p>";
//        break;
//    case "d":
//        echo "<p>custumer reffered by word of mouth.</p>";
//        break;
//    default:
//        echo "<p>we do not knoe this custumer found us.</p>";
//        break;
//}
    echo "<p>address to ship to is ".$address."</p>";
$outputstring=$date."\t".$tireqty." tires \t".$oilqty." oil\t".$sparkqty." spark plugs\t\$".$totalamount."\t". $address."\n";
        @$fp=fopen("$DOCUMENT_ROOT/orders/orders.txt","ab");
        @flock($fp,LOCK_EX);
        if(!$fp){
            echo "<p><strong>your order could not be processed at this time.
please try again later.</strong></p></body></html>";
            throw new fileopenexception();
            exit;
        }
if(!flock($fp,LOCK_EX)){
    throw new filelockexception();
}
if(!fwrite($fp,$outputstring,strlen($outputstring))){
    throw new filewriteexception();
}
fwrite($fp,$outputstring,strlen($outputstring));
flock($fp,LOCK_UN);
fclose($fp);
echo "<p>order written.</p>";


















?>
</body>
</html>