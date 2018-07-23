<?php 

session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
include("myconnectftest.php");
$query="select quantity from company where script=".$_POST['script'];
$result=mysql_query($query,$db);
$quantity=mysql_result($result,0);

if($quantity >= $_POST['qty'])
{
$q="select * from company where script='".$_POST['script']."'";
$result=mysql_query($q,$db);
$row=mysql_fetch_assoc($result) or die(mysql_error($db));
$val=$row['presentcost'];
$deduction=$val*$_POST['qty'];

$q1="select * from ubal where userid=".$_SESSION['id'];
$result1=mysql_query($q1,$db);
$row1=mysql_fetch_assoc($result1) or die(mysql_error($db));
$val1=$row1['balance'];

if($val1>=$deduction)
{
$query="update ubal set balance=balance-$deduction where userid=" . $_SESSION['id'];
mysql_query($query,$db);

$query="update company set quantity=quantity-".$_POST['qty'] ." where script=".$_POST['script'];
mysql_query($query,$db);

$query="select qty from usershare1 where script=".$_POST['script']." and userid=" .$_SESSION['id'] ;
$result=mysql_query($query,$db);
$quantity=mysql_num_rows($result);

$query="insert into usershare values(".$_SESSION['id'].", 
                   '".$_POST['script']."',
                    ".$_POST['qty'].",
                    ".$val.",
                    now())";
mysql_query($query,$db);


if($quantity > 0)
{
$query="update usershare1 set qty=qty+".$_POST['qty']." where userid=".$_SESSION['id']." and script=".$_POST[script];
mysql_query($query,$db);
}
else 
{ 

$query1="insert into usershare1 values(".$_SESSION['id'].", 
                   '".$_POST['script']."',
                    ".$_POST['qty'].")";
mysql_query($query1,$db);
}
}
else{
	die("<script>alert('Not enough balance in your account');parent.window.location.reload(true);</script>");
}



}
else { die("<script>alert('Not enough shares in market');parent.window.location.reload(true);</script>"); }

echo "<br>";
echo "<br>";

}
include("myindex.php")

?>