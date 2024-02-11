<?php
require '../config/con.php';
$conn = connection();
$sede_name = $_REQUEST['sede']; // the wordl 'sede' it's just a guess.

$query = "INSERT INTO Sedes(
      sede_name,
    ) VALUES (
      '$sede_name',
    )";
$res = $conn->query($query);
if($res){
    $conn->close();
    echo 1;
}else{
    echo 0 .'Error during the query: ' . $conn->error;
}
?>