<?php
$db=mysql_connect("localhost","root","") or die("Couldn't connect to server!");
$qr=mysql_select_db("techno_test",$db) or die("Couldn't select database!"); 
?>