<html>
<head>
    <title>
        stock quote from nasdaq
    </title>
</head>
<body>
<?php
$symbol="AMZN";
echo "<h1>stock quote for ".$symbol."</h1>";
$url="http://finance.yahoo.com/d/quotes.csv"."?s=".$symbol."&e=.csv&f=sl1d1t1c1ohgv";
if(!($contents=file_get_contents($url))){
    die("failure to open".$url);
}
list($symbol,$quote,$date,$time)=explode(",",$contents);
$date=trim($date,'"');
$time=trim($time,'"');
echo "<p>$symbol was last sold at:$quote</p>";
echo "<p>quote current as of $date at $time</p>";
echo "<p>this information retrieved from <br><a href='".$url."'>".$url."</a>.</p>"
?>
</body>
</html>





