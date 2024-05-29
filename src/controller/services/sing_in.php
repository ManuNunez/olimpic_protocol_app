<?php
require '../config/con.php';
$conn = connection();
$username = $_POST['username']; // for the username is just a guess
$pass = md5($_POST['password']);



$query = "SELECT * FROM USERS
            WHERE username = '$username' AND
            password = '$pass' AND 
            status = 1 AND deleted = 0" ;
$answer = $conn->query($query);
if($answer){
    if($answer->num_rows == 1){
        $row = $answer->fetch_assoc();
        // Asignar el userType y username a la sesión
        $user_type_id = $row['user_type_id'];
        $userType = '';
        switch ($user_type_id) {
            case 1:
                $userType = 'manager';
                break;
            case 2:
                $userType = 'organizer';
                break;
            case 3:
                $userType = 'staff';
                break;
            case 4:
                $userType = 'classroom';
                break;
            default:
                $userType = 'unknown';
        }

        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['user_type'] = $userType;
        $_SESSION['username'] = $row['username'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_sede_id'] = $row['sede_id'];
        $conn->close();
        $ans = json_encode(array(1));
        echo $ans;
    }else{
        $conn->close();
        $ans = json_encode(array(0, 'User not found'));
        echo $ans;
    }
}else{
    $conn->close();
    $ans = json_encode(array(0, $conn->error));
}


?>