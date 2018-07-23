<? ob_start(); ?>
<?php
session_start();
include("conneectftest.php");
if (ISSET ($_SESSION['username']))
{
	$q= "select userid from users where username='".$_SESSION['username']."'";
	
	$r=mysql_query($q);
	$userid=mysql_result($r,0,"userid");
	$query="select c.script,u.qty,u.cost ,c.costnow as totcost,(c.costnow-u.cost) as difference,((c.costnow-u.cost)*100/u.cost) as percentage
	from ubal as ub,userdet as u,company as c
	where ub.userid=u.userid and u.script=c.script and ub.userid=".$userid." order by c.script";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
	
	mysql_close();
	
	
	?>
	<table border="1" cellspacing="2" cellpadding="2">
	<tr>
	<th>Company</th>
	<th>Quantity</th>
	<th>Purchase Price</th>
	<th>Current Price</th>
	<th>Change (in INR)</th>
	<th>Change (int %)</th></tr>
	<?php
	$i=0;
	while ($i < $num) {
	
	$f1=mysql_result($result,$i,"c.script");
	$f2=mysql_result($result,$i,"u.qty");
	$f3=mysql_result($result,$i,"u.cost");
	$f4=mysql_result($result,$i,"totcost");
	$f5=mysql_result($result,$i,"difference");
	$f6=mysql_result($result,$i,"percentage");
	
	?>
	
	<tr>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font></td>
	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font></td>
	<?php
	 if ($f5<0){ 
	 ?>
	 	<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font><img src='down.png' /></td>
	 	<td><font face="Arial, Helvetica, sans-serif"><?php echo round($f6,2); ?><img src='down.png'/></font></td>
	<?php }
	if ($f5>0){
		?>
		<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?><img src='up.png' /></font></td>
	 	<td><font face="Arial, Helvetica, sans-serif"><?php echo round($f6,2); ?><img src='up.png' /></font></td>
	 	<?php
	}
	if ($f5==0) {
		?>
		<td><font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font></td>
	 	<td><font face="Arial, Helvetica, sans-serif"><?php echo round($f6,2); ?></font></td>
	 	<?php
	}	
	
	$i++;
	}
	?>
	</tr>
	<?php } ?>
<? ob_flush();?>

