<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>book-o-rama catalog search</title>
</head>
<body>
<h1>book-o-rama catalog search</h1>
</body>
</html>
<?php
$searchtype = $_POST["searchtype"];
$searchterm = trim($_POST["searchterm"]);
if (!$searchtype || !$searchterm) {
    echo "you have not entered search details.please go back and try again.";
    exit;
}
if (!get_magic_quotes_gpc()) {
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
}


$db = new mysqli("localhost", "root", "", "test");
if(mysqli_connect_errno()){
    echo "error";
    exit;
}
//if ($db->connect_error) {
//    echo $db->connect_error;
//    exit;
//}

$query = "select * from books WHERE " . $searchtype . " like '%" . $searchterm . "%'";
$result = $db->query($query);
//if (!$result){
//    die('not found');
//}
$num_results = $result->num_rows;
echo "<p>number of books found:" . $num_results . "</p>";
for ($i = 0; $i < $num_results; $i++) {
    $row = $result->fetch_assoc();
    echo "<p><strong>" . ($i + 1) . ". title:";
    echo htmlspecialchars(stripslashes($row["title"]));
    echo "</strong><br />author:";
    echo stripslashes($row["author"]);
    echo "<br />isbn:";
    echo stripslashes($row["isbn"]);
    echo "<br />price:";
    echo stripslashes($row["price"]);
    echo "</p>";
}
//$result->free();
$db->close();
?>













