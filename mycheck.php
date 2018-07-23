<?php
  
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    mysql_connect("localhost", "root", "");
    @mysql_select_db("techno_test") or die( "Unable to connect to database");
    $userid = mysql_real_escape_string($_POST['userid']);
    $password = mysql_real_escape_string($_POST['password']);
    $query="SELECT username FROM users WHERE userid='$userid' AND password='$password'";
    $result = mysql_query($query);


    if(mysql_num_rows($result) > 0) {
      session_start();
      $_SESSION['id']=$userid;
      $_SESSION['is_logged_in'] = 1;
    }
  }

  if(!isset($_SESSION['is_logged_in'])) {
    header("location:mysell1.php");
  } else {
    header("location:myindex.php");
  }
?>