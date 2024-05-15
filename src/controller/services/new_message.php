<?php
    require '../config/con.php';
    $conn = connection();
    $sender = $_REQUEST['username'];
    $sender_id = $_REQUEST['user_id'];
    $contestId = $_REQUEST['contest_id'];
    $sedeId = $_REQUEST['sede_id'];
    $mssg = $_REQUEST['message_text'];
    $time = $_REQUEST['timestamp'];

    $query = "INSERT INTO Messages(
          user_id,
          sender,
          contest_id,
          sede_id,
          message_text,
          sent_at,
        ) VALUES (
          '$sender_id',
          '$sender',
          '$contestId',
          '$sedeId',
          '$mssg',
          '$time',
        )";
    $res = $conn->query($query);
    if($res){
        $conn->close();
        echo 1; // Good query
    }else{
        echo 0 .'Error during the query: ' . $conn->error;
    }
?>

