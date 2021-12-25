<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['user_type'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];
        $status = -1;

        $query = "SELECT * FROM `users` WHERE (`username` = '$username' AND `password` = '$password' AND `user_type_id` = '$user_type') LIMIT 1";
        
        $data = fetchData($query);

        if($data){
            $status = 1;
            if(isset($_POST['firebase_uid'])){
                $id = $data[0]['id'];
                $fcmID = $_POST['firebase_uid'];
                $query = "UPDATE users set firebase_id = '$fcmID' WHERE id = '$id' ";
                query($query);
                $query = "INSERT INTO `online_users`(`userid`) VALUES ('$id')";
                query($query);
            }
        }

        $result = array([
            "status" => $status,
            "data" => $data
        ]);

    } else {
        $result = array([
            "status" => 0,
            "data" => "No user found"
        ]);
    }
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>