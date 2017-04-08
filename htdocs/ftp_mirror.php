<html>
<head>
    <title>mirror update</title>
</head>
<body>
<?php
$host="ftp.cs.rmit.edu.au";
$user="anonymous";
$password="me@example.com";
$remotefile="/pub/tsg/teraterm/ttssh14.rar";
$localfile="tmp/writable/ttssh14.rar";
$con=ftp_connect($host);
echo "edhuiwe";
if(!$con)
{
    echo "error:could not connect to ftp server<br>";
    exit();
}
echo "connected to $host<br>";
$result=@ftp_login($con,$user,$password);
if(!$result){
    echo "error:could not log on as $user<br>";
    ftp_quit($con);
    exit();
}
echo "logged in as $user<br>";
echo "checking file time...<br>";
if(file_exists($localfile)){
    $localtime=filemtime($localfile);
    echo "local file last update";
    echo date("G:i j-M-Y",$localtime);
    echo "<br>";
}
else $localtime=0;
    $remotetime=ftp_mdtm($con,$remotefile);
    if(!($remotetime>=0)){
        echo "can\'t access remote file time<br>";
        $remotetime=$localtime+1;
    }else{
        echo "remote file last updated";
        echo date("G:i j-M-Y",$remotetime);
        echo "<br>";
    }
if(!($remotetime>$localtime)){
    echo "local copy is up to date<br>";
    exit();
}
echo "getting file from server...<br>";
$fp=fopen($remotefile,"w");
if(!$success=ftp_get($con,$fp,$remotefile,FTP_BINARY)){
    echo "error:could not download file";
    ftp_quit($con);
    exit();
}
fclose($fp);
echo "file downloaded successfully";
ftp_quit($con);


















?>
</body>
</html>