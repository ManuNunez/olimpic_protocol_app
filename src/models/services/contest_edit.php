<?php
require '../config/con.php';
$conn = connection();

function getData(){
    $contest = array(
        "contestName" => $_REQUEST['contest_name'],
        "sede" => $_REQUEST['sede'],
        "contestDate" => $_REQUEST['contest_date'],
        "contestDuration" => 90, // Default duration, to be updated with received value
    );
    return $contest;
}

function getSedeId($sedeinput, $conn){
    $query = "SELECT id FROM Sedes WHERE status = 1 AND sede_name = '$sedeinput'";
    $res = $conn->query($query);
    try {
        $row = $res->fetch_assoc();
        return $row['id'];
    } catch (mysqli_sql_exception $e) {
        return null;
    }
}

function updateContest($contest, $conn){
    try {
        $contestId = getContestId($contest, $conn);
        if ($contestId) {
            $query = "UPDATE Contest SET name = '$contest[contestName]', contest_date = '$contest[contestDate]' WHERE id = '$contestId'";
            $res = $conn->query($query);
            return array("status" => 1, "message" => "Contest updated successfully");
        } else {
            return array("status" => 0, "error" => "Contest not found or inactive");
        }
    } catch (mysqli_sql_exception $e) {
        return array("status" => 0, "error" => "Error during contest update: " . $conn->error);
    }
}

function gradeUpdateValues($id, $conn){
    $levels = $_REQUEST['levels'];
    $rows = 0;
    try {
        foreach ($levels as $level) {
            switch ($level) {
                case 'Menores de 5to de Primaria':
                    $query = "UPDATE Contest SET m_V_primaria = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '5to de Primaria':
                    $query = "UPDATE Contest SET V_primaria = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '6to de Primaria':
                    $query = "UPDATE Contest SET VI_primaria = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '1ro de Secundaria':
                    $query = "UPDATE Contest SET I_secundaria = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '2do de Secundaria':
                    $query = "UPDATE Contest SET II_secundaria = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '3ro de Secundaria':
                    $query = "UPDATE Contest SET III_secundaria = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '1ro-2do de Prepa':
                    $query = "UPDATE Contest SET I_to_II_prepa = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '3ro-4to de Prepa':
                    $query = "UPDATE Contest SET III_to_IV_prepa = 1 WHERE id = '$id' AND status = 1";
                    break;
                case '5to-6to de Prepa':
                    $query = "UPDATE Contest SET V_to_VI_prepa = 1 WHERE id = '$id' AND status = 1";
                    break;
                default:
                    continue;
            }
            $res = $conn->query($query);
            $rows++;
        }
        return array("status" => 1, "message" => "Values updated: " . $rows);
    } catch (mysqli_sql_exception $e) {
        return array("status" => 0, "error" => "Error during grade update: " . $conn->error);
    }
}

function getContestId($contest, $conn){
    $query = "SELECT id FROM Contest WHERE status = 1 AND name = '$contest[contestName]'";
    $res = $conn->query($query);
    try {
        $row = $res->fetch_assoc();
        return $row ? $row['id'] : null;
    } catch (mysqli_sql_exception $e) {
        return null;
    }
}

$contest = getData(); 

$contestId = getContestId($contest, $conn);

if ($contestId) {
    $updateAnswer = updateContest($contest, $conn);
    if ($updateAnswer['status'] == 1) {
        $updateValuesAns = gradeUpdateValues($contestId, $conn);
        echo json_encode($updateValuesAns);
    } else {
        echo json_encode($updateAnswer);
    }
} else {
    echo json_encode(array("status" => "0", "error" => "Contest not found or inactive"));
}

$conn->close();
?>
