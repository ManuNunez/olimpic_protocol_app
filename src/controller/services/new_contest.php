<?php
require '../config/con.php';
$conn = connection();

function getData(){ //create a array with all the inputs
    $contest  = array(
        "contestName" => $_REQUEST['contest_name'],
        "sede" => $_REQUEST['sede'],
        "contestDate" => $_REQUEST['contest_date'],
        "contestDuration" => $_REQUEST['contest_duration'], //falta recibir la duracion de contest por ahorita el defecto es 90 en todos
    );
    return $contest;
}
function getSedeId($sedeinput,$conn){
    $query ="SELECT id FROM Sedes WHERE status = 1 AND sede_name = '$sedeinput'";
    $res = $conn->query($query);
    try{
        $row = $res->fetch_assoc();
        return $row['id'];
    }catch (mysqli_sql_exception){
        return null;
    }
}
function insertContest($contest, $conn){
    try{
        $query =  "INSERT INTO Contest (name, sede_id, contest_date,duration_minutes) VALUES ('$contest[contestName]', '$contest[sede_id]', '$contest[contestDate]','$contest[contestDuration]')";
        $res = $conn->query($query);
        //return json_encode(array("status"=>"1"));
        return array("status"=>"1");
    }
    catch(mysqli_sql_exception){
        //return json_encode(array("status"=>"0","error"=>"Error during the insertContest function ".$conn->error));
        return array("status"=>"0","error"=>"Error during the insertContest function ".$conn->error);
    }
}

function gradeUpdateValues($id,$conn){
    $levels = $_REQUEST['levels'];
    $rows = 0;
    try{
        foreach ($levels as $level) {
            if ($level == 'Menores de 5to de Primaria') {
                $query = "UPDATE Contest SET `m_V_primaria` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '5to de Primaria') {
                $query = "UPDATE Contest SET `V_primaria` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '6to de Primaria') {
                $query = "UPDATE Contest SET `VI_primaria` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '1ro de Secundaria') {
                $query = "UPDATE Contest SET `I_secundaria` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '2do de Secundaria') {
                $query = "UPDATE Contest SET `II_secundaria` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '3ro de Secundaria') {
                $query = "UPDATE Contest SET `III_secundaria` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '1ro-2do de Prepa') {
                $query = "UPDATE Contest SET `I_to_II_prepa` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '3ro-4to de Prepa') {
                $query = "UPDATE Contest SET `III_to_IV_prepa` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
            if ($level == '5to-6to de Prepa') {
                $query = "UPDATE Contest SET `V_to_IV_repa` = 1 WHERE id = '$id' AND status = 1";
                $res = $conn->query($query);
                $rows++;
            }
        }
        return array("status" => 1, "error"=>"Values updated: " . $rows);

    }catch (mysqli_sql_exception){
        return array("status" => 0, "error"=>"Error during the gradeUpdateValues ". $conn->error );
    }



}

function getContestId($contest, $conn){
    $query ="SELECT id FROM Contest WHERE status = 1 AND name = '$contest[contestName]'";
    $res = $conn->query($query);
    try{
        $row = $res->fetch_assoc();
        return $row['id'];
    }catch (mysqli_sql_exception){
        return null;
    }
}


$contest = getData(); // array with the contest info
$sede_id = getSedeId($contest['sede'],$conn); // get the sede id from the table sede with the name Selected



if($sede_id != null){
    $contest['sede_id'] = $sede_id;
    $inserAnswer = insertContest($contest,$conn);
    if($inserAnswer['status'] == 1){
        $contestId = getContestId($contest,$conn);
        if($contestId != null){
            $updateValuesAns = gradeUpdateValues($contestId,$conn);
            echo json_encode($updateValuesAns);
        }
    }else{
        echo json_encode($inserAnswer);
    }
}else{
    echo json_encode(array("status"=>"0","error"=>"Error during the getSedeId function"));
}
$conn->close();


