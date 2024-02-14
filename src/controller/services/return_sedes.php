<?php

require '../config/con.php';
$conn = connection();

$query = "SELECT * FROM Sedes WHERE status = 1";
$res = $conn->query($query);
if ($res) {
    $conn->close();

    echo 1;
} else {
    echo 0 . 'Error during the query: ' . $conn->error;
}

?>