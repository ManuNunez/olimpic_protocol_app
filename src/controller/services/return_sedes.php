<?php
//require '../controller/config/con.php';
require '../config/con.php';
$conn = connection();

$query = "SELECT * FROM Sedes WHERE status = 1";
$res = $conn->query($query);
$query_answer_arr = [];
if ($res) {
    //$query_answer_arr = ['status'=>1];
    if($res->num_rows > 0 ){
        while($row = $res->fetch_assoc()) {
           $query_answer_arr[] = ['id' => $row['id'], 'locationName' => $row['sede_name']];
        }
    }
    $conn->close();
} else {
    echo json_encode(array("status" => 0, "error" => "Error during the query: " . $conn->error));
    $conn->close();
}
function getData(){
    return $query_answer_arr;
}
$i = 0;
/*foreach ($query_answer_arr as $value){
    echo $value;
    $i++;
}*/
echo '<br>'.json_encode($query_answer_arr);


?>