<?php
    require '../config/con.php';
    $conn = connection();
    $username = $_REQUEST['username']; // for the username is just a guess
    $pass = md5($_REQUEST['pass']);
    //$timeStamp = $_REQUEST['timeStamp']; //ADD TIMESTAAMP IN SQL TB
    $userTypeId = $_REQUEST['user_type_id'];
    $sedeId = $_REQUEST[''];



    $query = "INSERT INTO USERS(
      username,
      password,
      user_type_id,
      sede_id,
    ) VALUES (
      '$username',
      '$pass',
      '$userTypeId',
      '$sedeId'
    )";
    $res = $conn->query($query);
    if($res){
        $conn->close();
        echo 1;
    }else{
        echo 0 .'Error during the query: ' . $conn->error;
    }
?>