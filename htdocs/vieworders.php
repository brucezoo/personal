
<?php
$DOCUMENT_ROOT=$_SERVER["DOCUMENT_ROOT"];
$order=file("$DOCUMENT_ROOT/orders/orders.txt");
$number_of_order=count($order);

if ($number_of_order==0){
    echo "<p><strong>no order pending.please try again later.</strong></p>";
}
echo "<table border=\"1\">\n";
echo "<tr><th bgcolor=\"#ccccff\">order date</th>
 <th bgcolor=\"#ccccff\">tires</th>
  <th bgcolor=\"#ccccff\">oil</th>
  <th bgcolor=\"#ccccff\">spark plugs</th>
  <th bgcolor=\"#ccccff\">total</th>
  <th bgcolor=\"#ccccff\">address</th>
  </tr>";
for ($i=0;$i<$number_of_order;$i++){
    $line=explode("\t",$order[$i]);
    $line[1]=intval($line[1]);
    $line[2]=intval($line[2]);
    $line[3]=intval($line[3]);
    echo "<tr>
<td>".$line[0]."</td>
<td align=\"right\">".$line[1]."</td>
<td align=\"right\">".$line[2]."</td>
<td align=\"right\">".$line[3]."</td>
<td align=\"right\">".$line[4]."</td>
<td align=\"left\">".$line[5]."</td>
</tr>";
}
echo "</table>";
//for ($i=0;$i<$number_of_order;$i++){
//    echo $order[$i]."<br />";
//}
//echo $number_of_order;













?>