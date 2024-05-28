<?php
require '../controller/config/con.php';
//require '../config/con.php';

function get_sedes(){
    $conn = connection();

    $query = "SELECT * FROM Sedes WHERE status = 1";
    $res = $conn->query($query);
    if ($res && $res->num_rows > 0 ) {

        $query_answer_arr = [];

        while($row = $res->fetch_assoc()){
            $sede = array(
                'id' => $row['id'],
                'locationName' => $row['sede_name']
            );
            $query_answer_arr[] = $sede;
        }

        $conn->close();
        return json_encode($query_answer_arr);

    }else{
        $conn->close();
        return json_encode(array("status" => 0, "error" => "Error during the query: " . $conn->error));
    }
}


?>