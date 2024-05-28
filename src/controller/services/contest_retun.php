<?php
require '../config/con.php';

$conn = connection();
$query = "SELECT * FROM Contest WHERE status = 1";
$res = $conn->query($query);

if ($res && $res->num_rows > 0) {
    $query_answer_arr = [];

    while ($row = $res->fetch_assoc()) {
        $contest = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'sede_id' => $row['sede_id'],
            'duration_minutes' => $row['duration_minutes'],
            'contest_date' => $row['contest_date'],
            'levels' => $row['levels'],
            'm_V_primaria' => $row['m_V_primaria'],
            'VI_primaria' => $row['VI_primaria'],
            'I_secundaria' => $row['I_secundaria'],
            'II_secundaria' => $row['II_secundaria'],
            'II_t_secundaria' => $row['II_t_secundaria'],
            'I_to_II_prepa' => $row['I_to_II_prepa'],
            'III_to_IV_prepa' => $row['III_to_IV_prepa'],
            'V_to_VI_prepa' => $row['V_to_VI_prepa'],
            'status' => $row['status'],
            'V_primaria' => $row['V_primaria']
        );
        $query_answer_arr[] = $contest;
    }

    $conn->close();
    echo json_encode($query_answer_arr);
} else {
    $conn->close();
    echo json_encode(array("status" => 0, "error" => "No se encontraron concursos activos."));
}
?>
