<?php   
    $mysqli_connection = new mysqli("localhost", "root", "", "register");
    if ($mysqli_connection->connect_errno) {
        echo ("Connection Failure");
        exit();
    }

    $email = mysql_real_escape_string($_POST['email']);
    $name = mysql_real_escape_string($_POST['name']);
    $password = mysql_real_escape_string($_POST['password']);

    $insert = "INSERT INTO users('email','name','password') VALUES('$email','$name','$password')";
    if ($run = $mysql_connection->query($insert)) {
        echo 'Success';
        $run->free();
        $mysql_connection->close();
    } else {
        echo 'Error Inserting Content';
        exit();
    }
?>