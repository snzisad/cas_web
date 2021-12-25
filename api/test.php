<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    include '../core/notification_manager.php';
?>

<?php 
    $pid = 25;
    $message = "This is title";
    $status = 0;
    $query = "SELECT * FROM post JOIN users ON post.userid = users.id WHERE post.id = $pid LIMIT 1";
    $data = fetchData($query);

    // echo $query;
    $post_title =  $data[0]['post_title'];
    $fcmID = $data[0]['firebase_id'];

    if($fcmID){
        send_message_notification($pid, $post_title, $message, $fcmID);
    }

    if($data){
        $status = 1;
    }

    $result = array([
        "status" => $status,
        "data" => $data,
    ]);

    // echo json_encode($result, JSON_UNESCAPED_UNICODE);
    // send_message_notification(35, "This is title", 5500, "CTG");
?>