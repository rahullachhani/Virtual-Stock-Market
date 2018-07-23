<?php
include("myconnectftest.php");

$table = <<<ht
<div style="text-align:center;">
<table border="1" cellpadding="1" cellspacing="2" style="width:70%";>
<tr>
<th>Rank</th>
<th>Player Name</th>
<th>Shares Worth</th>
<th>Cash Balance</th>
<th>Total</th>
</tr>
ht;
$query="select users.name, sum( qty*presentcost ) as shares, balance, (sum( qty*presentcost )+balance) as total , users.userid  from users,ubal,usershare,company where users.userid=ubal.userid and ubal.userid=usershare.userid and company.script=usershare.script and not balance=50000  group by users.userid order by total desc limit 50 ";
$result=mysql_query($query);
$rank=0;
while($row=mysql_fetch_array($result))
{
extract ($row);
$name=$row['name'];
$shares=$row['shares'];
$bal=$row['balance'];
$tot=$row['total'];
$rank=$rank+1;
$table .= <<<ht
<tr>
<td>$rank</td>
<td>$name</td>
<td>$shares</td>
<td>$bal</td>
<td>$tot</td>

</tr>
ht;
}
$table .= <<<ht
</table>
<div>
ht;
echo $table;
?>