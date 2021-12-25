<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
include '../core/notification_manager.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_POST['userid']) && isset($_POST['pid']) && isset($_POST['price'])) {
        $uid = $_POST['userid'];
        $pid = $_POST['pid'];
        $price = $_POST['price'];
        $time = date('Y-m-d h:i:s');
        $status = -1;

        $query = "INSERT INTO bid (`auction_id`, `bid_price`, `users_id`, `auction_time`)
                        VALUES ('$pid','$price','$uid','$time')";

        $data = query($query);
        $id = insertID();

        if ($data && $id != 1) {
            $status = 1;
            $data = true;

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
            "data" => "No auction found"
        ]);
    }

    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>