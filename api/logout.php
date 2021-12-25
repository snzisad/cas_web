<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
// session_start(); 
// checkManager(); 
?>
<!-- nnet -->
<?php
$result = null;

if (isset($_GET['uid'])) {
    $id = $_GET['uid'];

    //get product details
    $query = "UPDATE users SET firebase_id = NUll where id = '$id' ";
    query($query);

    $query = "DELETE FROM `online_users` WHERE `userid` = '$id'";
    query($query);

    $result = array([
        "status" => 1,
        "data" => "Success",
    ]);
} else {
    $result = array([
        "status" => 0,
        "data" => "No user found"
    ]);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?> 