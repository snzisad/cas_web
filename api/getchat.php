<?php
include '../core/dbe.inc.php';
include '../core/core.inc.php';
    // session_start(); 
    // checkManager(); 
?>

<?php
$result = null;

if (isset($_GET['pid'])) {
    $id = $_GET['pid'];

    //get chat list
    $query = "SELECT chat_msg, userid, users.name FROM chat JOIN users ON chat.userid = users.id WHERE chat_room_id = $id ORDER BY chat.chatid DESC";
    $data = fetchData($query);
    
    $result = array([
        "status" => 1,
        "data" => $data,
    ]);

} else {
    $result = array([
        "status" => 0,
        "data" => "No product found"
    ]);
}
echo json_encode($result, JSON_UNESCAPED_UNICODE);
?>