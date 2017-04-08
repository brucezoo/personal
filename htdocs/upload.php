<html>
<head>
    <title>
        uploading....
    </title>
</head>
<body>
<h1>uploading file...</h1>
<?php
if($_FILES["userfile"]["error"]>0){
    echo "problem:";
    switch ($_FILES["userfile"]["error"]){
        case 1: echo "file exceeded upload_max_filesize";
            break;
        case 2: echo "file exceeded max_file_size";
            break;
        case 3: echo "file only partially uploaded";
            break;
        case 4: echo "no file uploaded";
            break;
        case 6: echo "cannot upload file: no temp directory specified";
            break;
        case 7: echo "upload failed:cannot write to disk";
            break;
    }
    exit;
}
if($_FILES["userfile"]["type"]!="text/plain")
{
    echo "problem:file is not plain text";
//    exit();
}
$upfile='uploads/'.$_FILES["userfile"]["name"];
var_dump($_SERVER["DOCUMENT_ROOT"]);
echo "<br>";
var_dump($upfile);
echo "<br>";
var_dump($_FILES["userfile"]["tmp_name"]);
echo "<br>";
if(is_uploaded_file($_FILES["userfile"]["tmp_name"])){
    if(!move_uploaded_file($_FILES["userfile"]["tmp_name"],$upfile)){
        echo "problem:could not move file to destination directory";
        exit();
    }
}else{
    echo "problem:possible file upload attack.filename:";
    echo $_FILES["userfile"]["name"];
    exit();
}
echo "file uploaded successfully<br>";
$contents=file_get_contents($upfile);
$contents=strip_tags($contents);
file_put_contents($_FILES["userfile"]["name"],$contents);
echo "<p>preview of uploaded file contents:<br /><hr>";
echo nl2br($contents);

?>



















</body>
</html>