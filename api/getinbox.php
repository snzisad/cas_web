<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
$result = null;

if (isset($_GET['uid'])) {
    $id = $_GET['uid'];

    //get chat list
    $query = "SELECT * FROM `chat` WHERE chat_room_id = $id";
    $data = fetchData($query);

    $result = array([
        "status" => 1,
        "data" => $data,
    ]);

} else {
    $result = array([
        "status" => 0,
        "data" => "No User found"
    ]);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>