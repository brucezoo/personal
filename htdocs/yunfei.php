<html>
<head>
    <title><?php echo 'ashduiahd'?></title>
</head>
<body>
<table border="0" cellpadding="3">
    <tr>
        <td bgcolor="#cccccc"align="center">distance</td>
        <td bgcolor="ccccccc"align="center">cost</td>
        </tr>

<?php
$distance=50;
while($distance<=250){
    
    echo "<tr>
    <td align=\"right\">".$distance."</td>
    <td align=\"right\">".($distance/10)."</td>
    </tr>\n";
    $distance+=50;
    }

?>
</table>
</body>
</html>