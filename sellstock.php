<? ob_start(); ?>
<?php
session_start();
date_default_timezone_set('Asia/Calcutta');
$current_time = date("G");
if($current_time<0)
{	
include("conneectftest.php");
if (ISSET ($_SESSION['username']))
{
	$q= "select userid from users where username='".$_SESSION['username']."'";
	
	$r=mysql_query($q);
	$userid=mysql_result($r,0,"userid");
	if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			
				
				$q="call sellstock('".$_POST['script']."',".$_POST['qty'].",".$userid.")";
				mysql_query($q,$db);
		}
		



	?>
	<head>
	<script type="text/javascript">
	  var q=/^\d*[0-9](\d*[0-9])?$/;
	  function validate(form){
		var qt = form.qty.value;
		if (!q.test(qt)) {
		  alert("Enter a valid Number");
		   return false;
		 }
		  return true;
	  }
	 </script>
	 </head>
	 <body>
	<table border="0">
		<form action="sellstock.php" method="POST" name="sell" onSubmit="return validate(this);" >
		<?php
			$qry="select sum(u.qty*c.costnow) as amnt from userdet as u,company as c where u.script=c.script and u.userid=".$userid;
			$re=mysql_query($qry,$db);
			$amtShare=mysql_result($re,0,"amnt");
		?>
		<tr>Amount as Shares is:<?php echo $amtShare; ?> </tr>
		<tr>
		<td>Select a Script:</td>
		<td>
		<select name="script"  >
		<?php
		$query="SELECT distinct script FROM userdet where userid=".$userid;
		$result=mysql_query($query,$db);
		while($row=mysql_fetch_assoc($result))
		{
		echo "<option value=".$row['script'].">".$row['script']."</option>";
		}
		?>
		</select>
		</td>
		</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
		<td>Quantity to be sold:</td>
		<td><input type="text" name="qty"</td>
		<td><input type="submit"  value="Sell"></td>
		</tr>
		</form>
		</table>
	</body>
<?php
}
}
else
{
	include("conneectftest.php");
	$query="select users.name, sum( qty*costnow ) as shares, balance, (sum( qty*costnow )+balance) as total , users.userid  from users,ubal,userdet,company where users.userid=ubal.userid and ubal.userid=userdet.userid and company.script=userdet.script and not balance=50000  group by users.userid order by total desc limit 1 ";
	$r=mysql_query($query);
	$name=mysql_result($r,0,"name");
	$amnt=mysql_result($r,0,"total");
	echo '<Center><Strong>VSM has been won by<u> '.$name.'</u> with total of '.$amnt;
}
?>
<? ob_flush();?>