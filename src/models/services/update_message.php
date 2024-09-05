<?php
require '../config/con.php';
$conn = connection();
$sedeId = 1; //$_REQUEST['sede_id'];
$query = "SELECT * FROM Messages ORDER BY id DESC LIMIT 1"; // Need to add ' WHERE sede_id = '$sedeId';
$answer = $conn->query($query);
if($answer){
    $row = $answer->fetch_array();
    echo $row['menssage_text'];
}else{
    echo 0 .'Error during the query: ' . $conn->error;
}


