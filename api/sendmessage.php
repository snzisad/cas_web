<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
include '../core/notification_manager.php';
// session_start(); 
// checkManager(); 
?>

<?php
$result = null;

if (isset($_POST['userid']) && isset($_POST['pid']) && isset($_POST['chat_msg'])) {
    $uid = $_POST['userid'];
    $pid = $_POST['pid'];
    $mentionID = $_POST['mentionID'];
    $message = $_POST['chat_msg'];
    $time = date('Y-m-d h:i:s');
    $status = -1;

    $query = "INSERT INTO chat (`chat_room_id`, `chat_msg`, `userid`, `chat_date`)
                     VALUES ('$pid','$message','$uid','$time')";

    $data = query($query);
    $id = insertID();

    if ($data  && $id != 1) {
        $status = 1;
        $data = true;

        //get product details
        $query = "SELECT * FROM post JOIN users ON post.userid = users.id WHERE post.id = $pid LIMIT 1";
        $post = fetchData($query);

        $post_title = $post[0]['post_title'];
        $fcmID = $post[0]['firebase_id'];
        $adminID = $post[0]['id'];

        //send message to admin's mobile
        if ($fcmID && $uid != $adminID) {
            send_message_notification($pid, $post_title, $message, $fcmID);
        }

        if ($mentionID != 0) {
            //get mentioned user information
            $query = "SELECT * FROM users WHERE id = $mentionID LIMIT 1";
            $user = fetchData($query);

            $fcmID = $user[0]['firebase_id'];

            if ($fcmID) {
                send_mention_notification($pid, $post_title, $fcmID);
            }
        }
    } else {
        $status = -1;
        $data = false;
    }

    $result = array([
        "status" => $status,
        "data" => $data
    ]);
} else {
    $result = array([
        "status" => 0,
        "data" => "No chat message found"
    ]);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?> 