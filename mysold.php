<?php 
session_start();
include("myconnectftest.php");
$query="select presentcost from company where script=".$_POST['script'];
$result=mysql_query($query,$db);
$cost=mysql_result($result,0);

$query="update company set quantity=quantity+".$_POST['qty'] ." where script=".$_POST['script'];
mysql_query($query,$db);

$query="update ubal set balance=balance+$cost*".$_POST['qty']." where userid=".$_SESSION['id'];
mysql_query($query,$db);


$query="select qty from usershare1 where script=".$_POST['script']." and userid=".$_SESSION['id'] ;
$result=mysql_query($query,$db);
$quantity=mysql_result($result,0);


if($quantity >= $_POST['qty'])
{
$query="update usershare1 set qty=qty-".$_POST['qty']." where script=".$_POST[script]." and userid=".$_SESSION['id'];
mysql_query($query,$db);
}
else { echo "you sold too many shares than that u have please enter proper value ";}

echo "<br>";
echo "<br>";
echo "<br>";

//include("mysell1.php");
header("location:myindex.php");
?>