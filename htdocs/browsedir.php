<html>
<head>
    <title>browse directories</title>
</head>
<body>
<h1>browsing</h1>
<?php
//$current_dir="uploads/";
//
//$dir=opendir($current_dir);
$dir=dir("uploads/");
var_dump($dir)."<br>";
//echo "<p>upload directory is $current_dir</p>";
//echo "<p>directory listing:</p><ul>";
echo "<p>handle is $dir->handle</p>";
echo "<p>upload directory is $dir->path";
echo "<p>directory listing:</p><ul>";
//while(false!==($file=readdir($dir))){
//    var_dump($file)."<br>";
while(false!==($file=$dir->read())){

    if($file!="."&&$file!=".."){
        echo "<li><a href='filedetails.php?file=".$file."'>".$file."</a></li>";
    }

}
echo "</ul>";
$dir->close();
?>
</body>
</html>
<hr>
<html>
<head>
    <title>browse directory</title>
</head>
<body>
<h1>browsing</h1>
<?php
$dir="uploads/";
$file1=scandir($dir);
var_dump($file1)."<br>";
$file2=scandir($dir,1);
echo "<p>upload directory is $dir</p>";
echo "<p>directory listing in alphabetical order,ascending:</p><ul>";
foreach ($file2 as $file){
//    if($file!="."&&$file!=".."){
        echo "<li>$file</li>";
//    }
}
echo "</ul>";
?>
</body>
</html>