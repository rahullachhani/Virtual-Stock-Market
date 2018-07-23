
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
		<form action="sold.php" method="POST" name="sold.php" onSubmit="return validate(this);" >
		<?php
			include("myconnectftest.php");
			$qry="select sum(u.qty*c.presentcost) as amnt from usershare as u,company as c where u.script=c.script and u.userid=1";
			$re=mysql_query($qry,$db);
			$amtShare= mysql_result($re,0);
		?>
		<tr>Amount as Shares is:<?php echo $amtShare; ?> </tr>
		<tr>
		<td>Select a Script:</td>
		<td>
		<select name="script"  >
		<?php
		$query="SELECT script FROM usershare where userid=1";
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
	