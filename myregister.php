<html>
<head>
	<title>Page Title</title>
</head>
<body>
<form action="mylogin.php">
 User id: <input type="text" name=" userid ">
 <br>
 Username: <input type="text" name="username">
 <br>
 Name: <input type="text" name="name">
 <br>
 Eamil: <input type="text" name="email">
 <br>
Password: <input type="password" name="password">
 <br>
  College: <input type="text" name="college">
 <br>
 
 Course: <input type="text" name="course">
 <br>
 Mobile No : <input type="text" name="mob_no">
 <br>
 City: <input type="text" name="city">
 <br>
 verified: <input type="text" name="verified">
 <br>
 
 Gender: <input type="text" name="gender">
 <br>

  <input type="submit" value="Submit">
<?php
include("myconnectftest.php");
$query("insert into users values ($_POST[userid],$_POST[username],$_POST[name],$_POST[email],$_POST[password],$_POST[college],$_POST[course],$_POST[mob_no],$_POST[city],$_POST[verified],$_POST[gender]) ");
mysql_query($query,$db);
?>


</form>
</body>
</html>
