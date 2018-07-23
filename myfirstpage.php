
<?php

$db=mysql_connect("localhost","root","") or die("Couldn't connect to server!");
$qr=mysql_select_db("techno_test",$db) or die("Couldn't select database!");
$query="select *,(presentcost-startcost) as difference, (((presentcost-startcost)/startcost)*100) as percentage from company ";
$result=mysql_query($query);
$num=mysql_numrows($result);

mysql_close();


?>

<table border="1" cellspacing="2" cellpadding="2">
<tr>
<th>Script</th>
<th>Company</th>
<th>Sector</th>
<th>Stock Available</th>
<th>Day start price</th>
<th>Current Price</th>
<th>Change (in INR)</th>
<th>Change (in %)</th>
<?php
$i=0;
while ($i < $num) {

$f1=mysql_result($result,$i,"script");
$f2=mysql_result($result,$i,"name");
$f3=mysql_result($result,$i,"sector");
$f4=mysql_result($result,$i,"quantity");
$f5=mysql_result($result,$i,"startcost");
$f6=mysql_result($result,$i,"presentcost");
$f7=mysql_result($result,$i,"difference");
$f8=mysql_result($result,$i,"percentage");

?>
<tr>
<td><font face="Arial, Helvetica, sans-serif" ><?php echo $f1; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font></td>
<td><font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font></td>
<?php
 if ($f7<0){ 
 	$temp1=$f7;
 	$f7=$f7 - (2*$f7);
 	$temp2=$f8;
 	$f8=$f8 - (2*$f8);
 ?>
 	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font><img src='down.png' /></td>
 	<td><font face="Arial, Helvetica, sans-serif"><?php echo round($f8,2); ?><img src='down.png'/></font></td>
<?php $f7=$temp1;
	  $f8=$temp2;
}
if ($f7>0) {
	?>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?><img src='up.png' /></font></td>
 	<td><font face="Arial, Helvetica, sans-serif"><?php echo round($f8,2); ?><img src='up.png' /></font></td>
 	<?php
}
if ($f7==0) {
	?>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font></td>
 	<td><font face="Arial, Helvetica, sans-serif"><?php echo round($f8,2); ?></font></td>
 	<?php
}

$i++;
}
?>