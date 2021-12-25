<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
    $result = null;

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $user_type_id = $_POST['user_type_id'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nid = $_POST['nid'];

        $query = "INSERT INTO `users`(`user_type_id`, `name`, `contact`, `address`, `email`, `username`, `password`, `nid`)
                     VALUES ('$user_type_id','$name','$contact','$address','$email','$username','$password','$nid')";

        $data = query($query);

        if($data){
            $status = 1;

            $id = insertID();
            $query = "SELECT * FROM `users` WHERE id='$id'";
            $data = fetchData($query);

            if (isset($_POST['firebase_uid'])) {
                $fcmID = $_POST['firebase_uid'];
                $query = "UPDATE users set firebase_id = '$fcmID' WHERE id = '$id' ";
                query($query);
            }
        }
        else{
            $status = -1;
            $data = error();
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