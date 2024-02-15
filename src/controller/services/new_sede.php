<?php
require '../config/con.php';
$conn = connection();
$sede_name = $_REQUEST['sede_name']; // the wordl 'sede' it's just a guess.
$classroom = $_REQUEST['classrooms'];
$classroomCapacity = $_REQUEST['capacity']; // The varibl ei get from the front its juts a guess.
$completeFlag = false;
$query = "INSERT INTO Sedes(
      sede_name,
      classrooms,
      classroom_capacity
    ) VALUES (
      '$sede_name',
      '$classroom',
      '$classroomCapacity'
    )";
$res = $conn->query($query);
if($res){ // create a column in the table Sedes
    $query = "SELECT id FROM Sedes
    WHERE sede_name = '$sede_name' AND status = 1";
    $sedeIdAnswer = $conn->query($query);// Get the id from the sede just created
    $row = $sedeIdAnswer->fetch_assoc();
    $sede_id = $row['id'];
    $user_type_id = 3;
    for($i = 1 ; $i != 3 ; $i++){ // insert 2 new users type Staff
        $new_staff_account = 'STAFF' . $sede_name . '-' . $i;
        $new_staff_pass =  md5('STAFF-' .$sede_name  .  '-' . $i . '$');
        $query = "INSERT INTO USERS(
        username,
        password,
        user_type_id,
        sede_id
        ) VALUES (
        '$new_staff_account',
        '$new_staff_pass',
        '$user_type_id',
        '$sede_id'
        )";
        $new_staff_answer = $conn->query($query);
    }
    $user_type_id = 4;
    for($i = 1 ; $i != $classroom+1; $i++){ //insert every new user for the classroom acount type 4
        $new_classroom_account = $sede_name . '-' . $i;
        $newPass = md5($sede_name . '-' . $i . '$');
        $query = "INSERT INTO USERS(
        username,
        password,
        user_type_id,
        sede_id
        ) VALUES (
        '$new_classroom_account',
        '$newPass',
        '$user_type_id',
        '$sede_id'
        )";
        $new_classroom_answer = $conn->query($query);

        $query_salon_id = "INSERT INTO Salon(
        sede_id,
        name
        )VALUES (
        '$sede_id',
        'salon-$sede_name-$i'
        )";
        $salon_answer = $conn->query($query_salon_id);
    }
}else{
    $completeFlag = false;
}
if($completeFlag){
    $conn->close();
    echo json_encode(array("status" => 1));
}else{
    echo json_encode(array("status" => 0, "error" => "Error during the query: " . $conn->error));
    $conn->close();
}
?>
