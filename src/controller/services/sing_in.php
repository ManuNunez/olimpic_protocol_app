<?php
require '../config/con.php';
$conn = connection();
$username = $_REQUEST['username']; // for the username is just a guess
$pass = md5($_REQUEST['pass']);



$query = "SELECT * FROM USERS
          WHERE username = '$username' AND
          password = '$pass' AND 
          status = 1 AND deleted = 0" ;

$answer = $conn->query($query);
if($answer){
    if($answer->num_rows == 1){
        // session_start();             # unmark this when session are working.
        // $_SESSION["logged"] = true;
        $conn->close();
        echo 1;
    }
    else{
        echo 0;
    }
}else{
    echo 0 .'Error during the query: ' . $conn->error;
}


?>