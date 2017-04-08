<html>
<head>
    <title>book-o-rama book entry results</title>
</head>
<body>
<h1>book-o-rama book entry results</h1>
</body>
</html>
<?php
$isbn=$_POST["isbn"];
$author=$_POST["author"];
$title=$_POST["title"];
$price=$_POST["price"];
if(!$isbn||!$author||!$title||!$price){
    echo "you have not entered all the required details.<br />"."please go back and try again.";
    exit();
}
if(!get_magic_quotes_gpc()){
    $isbn=addslashes($isbn);
    $author=addslashes($author);
    $title=addslashes($title);
    $isbn=addslashes($isbn);
}
@$db=new mysqli("localhost", "root", "", "test");
if(mysqli_connect_errno()){
    echo "error";
    exit;
}
//$query="insert into books VALUES ('".$isbn."','".$author."','".$title."','".$price."')";
//$result=$db->query($query);
$query="insert into books VALUES (?,?,?,?)";
$stmt=$db->prepare($query);
$stmt->bind_param("sssd",$isbn,$author,$title,$price);
$stmt->execute();
echo $stmt->affected_rows ." book inserted into database.";
$stmt->close();
if(!$stmt){
//    echo $db->affected_rows."book inserted into database.";
//}else{
    echo "an error has occured.the item was not added.";
}
$db->close();
?>











