<?php
//require '../controller/config/con.php';
require '../config/con.php';
$conn = connection();

    $id = $_REQUEST['id'];
    $query = "SELECT * FROM USERS WHERE sede_id = $id";
    $res = $conn->query($query);
    if ($res && $res->num_rows > 0 ) {
        
        $query_answer_arr = [];
        
        while($row = $res->fetch_assoc()){
            $account = array(
                'id' => $row['id'],
                'usuario' => $row['username']
            );
            $query_answer_arr[] = $account;
        }
        
        

        $conn->close();
        $ans = json_encode($query_answer_arr);

    }elseif($res && $res->num_rows == 0){
        $conn->close(); 
        $ans = json_encode(array("status" => 1, "empty" => 'Esta sede no tiene cuentas asignas'));
    }else{
        $conn->close();
        $ans = json_encode(array("status" => 0, "error" => "Error during the query: " . $conn->error));
    }

    echo $ans;


?>