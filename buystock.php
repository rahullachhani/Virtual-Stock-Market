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
		
			$q="select * from company where script='".$_POST['script']."'";
			$result=mysql_query($q,$db);
			$row=mysql_fetch_assoc($result) or die(mysql_error($db));
			$val=$row['costnow'];


			$query="insert into userdet values(".$userid.",
							     '".$_POST['script']."',
							      ".$_POST['qty'].",
							      ".$val.",
							      now())";

			if(isset($query))
			{
			mysql_query($query,$db)or die("<script>alert('Not Enough Balance or Not enough shares in market');parent.window.location.reload(true);</script>");
			}

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
	<form action="buystock.php" method="POST" name="buy" onSubmit="return validate(this);" >
	<?php
			$qry="select balance from ubal where userid=".$userid;
			$re=mysql_query($qry,$db);
			$amtShare=mysql_result($re,0,"balance");
		?>
		<tr>Balance is:<?php echo $amtShare; ?> </tr>
	<tr>
	<td>Select a Script:</td>
	<td>
	<select name="script">
	<?php
	$query="SELECT script FROM company";
	$result=mysql_query($query,$db);
	while($row=mysql_fetch_assoc($result))
	{
	echo "<option value=".$row['script'].">".$row['script']."</option>";
	}
	?>
	</select>
	</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>Quantity to be purchased:</td>
	<td><input type="text" name="qty"></td>
	<td><input type="submit"  value="BUY"></td>
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